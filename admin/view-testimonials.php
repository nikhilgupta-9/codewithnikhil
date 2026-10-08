<?php
session_start();
include "db-conn.php";

// Check admin authentication
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Delete testimonial
if (isset($_GET['deleteId'])) {
    $delete_id = intval($_GET['deleteId']);
    
    // First get the photo and video thumbnail paths to delete the files
    $stmt = $conn->prepare("SELECT client_photo, video_thumbnail FROM testimonials WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $testimonial = $result->fetch_assoc();
    $stmt->close();
    
    if ($testimonial) {
        $upload_dir = "../uploads/testimonials/";
        if (!empty($testimonial['client_photo']) && file_exists($upload_dir . $testimonial['client_photo'])) {
            @unlink($upload_dir . $testimonial['client_photo']);
        }
        if (!empty($testimonial['video_thumbnail']) && file_exists($upload_dir . $testimonial['video_thumbnail'])) {
            @unlink($upload_dir . $testimonial['video_thumbnail']);
        }
    }
    
    // Now delete the record
    $stmt = $conn->prepare("DELETE FROM testimonials WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    
    $_SESSION['message'] = "Testimonial deleted successfully!";
    
    // Preserve current query params on delete redirect
    $redirect_params = $_GET;
    unset($redirect_params['deleteId']);
    $qs = !empty($redirect_params) ? '?' . http_build_query($redirect_params) : '';
    header("Location: view-testimonials.php" . $qs);
    exit();
}

// Global Counts for quick stats
$total_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials");
$total_count = $total_count_res->fetch_assoc()['c'] ?? 0;

$google_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials WHERE review_source = 'google' OR (review_source IS NULL AND (video_url IS NULL OR video_url = ''))");
$google_count = $google_count_res->fetch_assoc()['c'] ?? 0;

$video_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials WHERE review_source = 'video' OR (video_url IS NOT NULL AND video_url != '')");
$video_count = $video_count_res->fetch_assoc()['c'] ?? 0;

$avg_rating_res = $conn->query("SELECT AVG(rating) AS a FROM testimonials WHERE rating IS NOT NULL");
$avg_rating = round($avg_rating_res->fetch_assoc()['a'] ?? 5, 1);

// ── Pagination & Filter Settings ──
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = isset($_GET['limit']) ? max(5, intval($_GET['limit'])) : 10;
$source_filter = isset($_GET['source']) ? trim($_GET['source']) : 'all';
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Build WHERE clause
$where_clauses = ["1=1"];
$params = [];
$types = "";

if ($source_filter === 'google') {
    $where_clauses[] = "(review_source = 'google' OR (review_source IS NULL AND (video_url IS NULL OR video_url = '')))";
} elseif ($source_filter === 'video') {
    $where_clauses[] = "(review_source = 'video' OR (video_url IS NOT NULL AND video_url != ''))";
} elseif ($source_filter === 'direct') {
    $where_clauses[] = "(review_source = 'direct')";
}

if (!empty($search)) {
    $where_clauses[] = "(client_name LIKE ? OR client_company LIKE ? OR testimonial_text LIKE ? OR project_name LIKE ?)";
    $search_param = "%" . $search . "%";
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $types .= "ssss";
}

$where_sql = implode(" AND ", $where_clauses);

// Count total matching records for pagination
$count_query = "SELECT COUNT(*) AS total FROM testimonials WHERE $where_sql";
if (!empty($params)) {
    $stmt_count = $conn->prepare($count_query);
    $stmt_count->bind_param($types, ...$params);
    $stmt_count->execute();
    $total_filtered = $stmt_count->get_result()->fetch_assoc()['total'] ?? 0;
    $stmt_count->close();
} else {
    $count_res = $conn->query($count_query);
    $total_filtered = $count_res->fetch_assoc()['total'] ?? 0;
}

$total_pages = max(1, ceil($total_filtered / $limit));
if ($page > $total_pages) $page = $total_pages;
$offset = ($page - 1) * $limit;

// Fetch paginated records
$data_query = "SELECT * FROM testimonials WHERE $where_sql ORDER BY featured DESC, display_order ASC, id DESC LIMIT ?, ?";
$types_with_limit = $types . "ii";
$params_with_limit = array_merge($params, [$offset, $limit]);

$stmt_data = $conn->prepare($data_query);
$stmt_data->bind_param($types_with_limit, ...$params_with_limit);
$stmt_data->execute();
$result = $stmt_data->get_result();

// Helper to extract embed url
function get_video_embed($url) {
    if (empty($url)) return '';
    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
        return "https://www.youtube.com/embed/" . $matches[1] . "?autoplay=1";
    }
    if (preg_match('/loom\.com\/(?:share|embed)\/([a-zA-Z0-9]+)/i', $url, $matches)) {
        return "https://www.loom.com/embed/" . $matches[1] . "?autoplay=1";
    }
    if (preg_match('/vimeo\.com\/(?:video\/)?([0-9]+)/i', $url, $matches)) {
        return "https://player.vimeo.com/video/" . $matches[1] . "?autoplay=1";
    }
    return $url;
}

// Helper function to build page link
function build_page_url($p) {
    $params = $_GET;
    $params['page'] = $p;
    return '?' . http_build_query($params);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Manage Testimonials & Reviews | Admin Panel</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <?php include "links.php"; ?>
    
    <style>
        :root {
            --primary-color: #104041;
            --primary-accent: #1a6b6d;
            --google-blue: #4285F4;
            --video-red: #FF0000;
        }
        
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 1.2rem 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #eef2f5;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: transform 0.2s ease;
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .stat-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }
        
        .testimonial-img {
            width: 44px;
            height: 44px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e2e8f0;
            flex-shrink: 0;
        }
        
        .rating-stars {
            color: #ffb703;
            font-size: 13px;
        }
        
        .featured-badge {
            background: linear-gradient(135deg, #104041, #1a6b6d);
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
        }

        .source-pill {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .source-pill.google {
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #bfdbfe;
        }
        .source-pill.video {
            background: #fff1f2;
            color: #be123c;
            border: 1px solid #fecdd3;
        }
        .source-pill.direct {
            background: #f0fdf4;
            color: #15803d;
            border: 1px solid #bbf7d0;
        }
        
        .filter-btn {
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #cbd5e1;
            background: #fff;
            color: #475569;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        .filter-btn.active, .filter-btn:hover {
            background: #104041;
            color: #fff !important;
            border-color: #104041;
        }

        .action-btns .btn {
            padding: 0.35rem 0.6rem;
            font-size: 0.85rem;
            border-radius: 6px;
        }

        /* Custom Pagination Styling */
        .admin-pagination .page-item .page-link {
            color: #104041;
            border-radius: 8px;
            margin: 0 3px;
            border: 1px solid #e2e8f0;
            font-weight: 600;
            font-size: 13.5px;
            padding: 6px 14px;
            transition: all 0.2s;
        }
        .admin-pagination .page-item.active .page-link {
            background-color: #104041;
            border-color: #104041;
            color: #ffffff;
            box-shadow: 0 4px 10px rgba(16, 64, 65, 0.25);
        }
        .admin-pagination .page-item.disabled .page-link {
            color: #94a3b8;
            background-color: #f8fafc;
            border-color: #e2e8f0;
        }
        .admin-pagination .page-item .page-link:hover:not(.active) {
            background-color: #f1f5f9;
            color: #104041;
        }
    </style>
</head>

<body class="crm_body_bg">

    <?php include "header.php"; ?>
    
    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <?php include "top_nav.php"; ?>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid p-0 sm_padding_15px">

                <!-- Stats Overview Row -->
                <div class="row g-3 mb-4">
                    <div class="col-lg-3 col-sm-6">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper" style="background: #e6fffa; color: #0d9488;">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold"><?= $total_count ?></h4>
                                <small class="text-muted">Total Reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper" style="background: #eff6ff; color: #2563eb;">
                                <i class="fab fa-google"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold"><?= $google_count ?></h4>
                                <small class="text-muted">Google Reviews</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper" style="background: #fff1f2; color: #e11d48;">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold"><?= $video_count ?></h4>
                                <small class="text-muted">Video Testimonials</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="stat-card">
                            <div class="stat-icon-wrapper" style="background: #fffbeb; color: #d97706;">
                                <i class="fas fa-star"></i>
                            </div>
                            <div>
                                <h4 class="mb-0 fw-bold"><?= $avg_rating ?> / 5.0</h4>
                                <small class="text-muted">Average Rating</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0 d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <div>
                                        <h2 class="m-0 fw-bold">Testimonials & Reviews</h2>
                                        <small class="text-muted">Manage all <?= $total_count ?> client reviews, Google profile feedback, and video stories</small>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="add-testimonial.php" class="btn btn-primary" style="background: #104041; border-color: #104041;">
                                            <i class="fas fa-plus me-1"></i> Add Testimonial
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="white_card_body">
                                <?php if (isset($_SESSION['message'])): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= $_SESSION['message']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['message']); ?>
                                <?php endif; ?>

                                <!-- Controls & Search Row -->
                                <div class="row g-3 mb-3 align-items-center justify-content-between">
                                    
                                    <!-- Filter Buttons -->
                                    <div class="col-lg-7 col-md-12">
                                        <div class="d-flex gap-2 flex-wrap align-items-center">
                                            <span class="fw-bold text-muted me-1" style="font-size: 13px;">Filter:</span>
                                            
                                            <?php
                                            function filter_link($src) {
                                                $p = $_GET;
                                                $p['source'] = $src;
                                                $p['page'] = 1;
                                                return '?' . http_build_query($p);
                                            }
                                            ?>
                                            <a href="<?= filter_link('all') ?>" class="filter-btn <?= $source_filter === 'all' ? 'active' : '' ?>">
                                                All (<?= $total_count ?>)
                                            </a>
                                            <a href="<?= filter_link('google') ?>" class="filter-btn <?= $source_filter === 'google' ? 'active' : '' ?>">
                                                <i class="fab fa-google text-primary me-1"></i> Google (<?= $google_count ?>)
                                            </a>
                                            <a href="<?= filter_link('video') ?>" class="filter-btn <?= $source_filter === 'video' ? 'active' : '' ?>">
                                                <i class="fab fa-youtube text-danger me-1"></i> Video (<?= $video_count ?>)
                                            </a>
                                            <a href="<?= filter_link('direct') ?>" class="filter-btn <?= $source_filter === 'direct' ? 'active' : '' ?>">
                                                <i class="fas fa-user-check text-success me-1"></i> Direct
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Search & Per-Page Controls -->
                                    <div class="col-lg-5 col-md-12">
                                        <form method="GET" action="view-testimonials.php" class="d-flex gap-2 justify-content-lg-end">
                                            <input type="hidden" name="source" value="<?= htmlspecialchars($source_filter) ?>">
                                            
                                            <div class="input-group" style="max-width: 260px;">
                                                <input type="text" name="search" class="form-control form-control-sm" 
                                                       placeholder="Search reviewer, project..." 
                                                       value="<?= htmlspecialchars($search) ?>">
                                                <button class="btn btn-sm btn-outline-secondary" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <?php if (!empty($search)): ?>
                                                    <a href="?source=<?= htmlspecialchars($source_filter) ?>" class="btn btn-sm btn-outline-danger" title="Clear Search">
                                                        <i class="fas fa-times"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>

                                            <select name="limit" class="form-select form-select-sm" style="width: 100px;" onchange="this.form.submit()">
                                                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>10 / page</option>
                                                <option value="20" <?= $limit == 20 ? 'selected' : '' ?>>20 / page</option>
                                                <option value="32" <?= $limit == 32 ? 'selected' : '' ?>>32 (All)</option>
                                                <option value="50" <?= $limit == 50 ? 'selected' : '' ?>>50 / page</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                
                                <!-- Testimonials Table -->
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle" id="testimonialsTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 50px;">ID</th>
                                                <th>Client / Reviewer</th>
                                                <th>Source & Type</th>
                                                <th>Rating & Review</th>
                                                <th>Project / Service</th>
                                                <th>Display</th>
                                                <th style="width: 130px;" class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if ($result && $result->num_rows > 0):
                                                while ($t = $result->fetch_assoc()): 
                                                    $source = !empty($t['review_source']) ? $t['review_source'] : (!empty($t['video_url']) ? 'video' : 'google');
                                                    $has_video = !empty($t['video_url']);
                                                    $embed_url = get_video_embed($t['video_url'] ?? '');
                                            ?>
                                                <tr>
                                                    <td><span class="text-muted fw-bold">#<?= htmlspecialchars($t['id']); ?></span></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <?php if (!empty($t['client_photo'])): ?>
                                                                <img src="../uploads/testimonials/<?= htmlspecialchars($t['client_photo']); ?>" 
                                                                     alt="<?= htmlspecialchars($t['client_name']); ?>" 
                                                                     class="testimonial-img me-3">
                                                            <?php else: ?>
                                                                <div class="testimonial-img bg-light d-flex align-items-center justify-content-center me-3 text-primary fw-bold" style="font-size: 15px;">
                                                                    <?= strtoupper(substr($t['client_name'], 0, 1)) ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <div>
                                                                <strong class="text-dark"><?= htmlspecialchars($t['client_name']); ?></strong><br>
                                                                <small class="text-muted">
                                                                    <?= htmlspecialchars($t['client_title'] ?? ''); ?>
                                                                    <?= (!empty($t['client_company'])) ? ' • ' . htmlspecialchars($t['client_company']) : '' ?>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if ($source == 'google'): ?>
                                                            <span class="source-pill google">
                                                                <i class="fab fa-google"></i> Google Review
                                                            </span>
                                                            <?php if (!empty($t['google_review_url'])): ?>
                                                                <a href="<?= htmlspecialchars($t['google_review_url']) ?>" target="_blank" class="d-block mt-1 text-primary" style="font-size: 11px;">
                                                                    <i class="fas fa-external-link-alt"></i> View on Maps
                                                                </a>
                                                            <?php endif; ?>
                                                        <?php elseif ($source == 'video' || $has_video): ?>
                                                            <span class="source-pill video">
                                                                <i class="fab fa-youtube"></i> Video Story
                                                            </span>
                                                            <?php if (!empty($embed_url)): ?>
                                                                <button type="button" class="btn btn-sm btn-outline-danger d-block mt-1 py-0 px-2" style="font-size: 11px;" 
                                                                        onclick="playVideoModal('<?= htmlspecialchars($embed_url, ENT_QUOTES) ?>', '<?= htmlspecialchars($t['client_name'], ENT_QUOTES) ?>')">
                                                                    <i class="fas fa-play me-1"></i> Watch Video
                                                                </button>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <span class="source-pill direct">
                                                                <i class="fas fa-check-circle"></i> Direct Client
                                                            </span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <div class="rating-stars mb-1">
                                                            <?php 
                                                            $r = intval($t['rating'] ?? 5);
                                                            for ($i = 1; $i <= 5; $i++): 
                                                            ?>
                                                                <i class="<?= $i <= $r ? 'fas' : 'far' ?> fa-star"></i>
                                                            <?php endfor; ?>
                                                            <span class="text-dark fw-bold ms-1">(<?= $r ?>.0)</span>
                                                        </div>
                                                        <div class="text-truncate text-muted" style="max-width: 280px; font-size: 13px;" title="<?= htmlspecialchars($t['testimonial_text']); ?>">
                                                            <?= htmlspecialchars($t['testimonial_text']); ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($t['project_name'])): ?>
                                                            <strong style="font-size: 13px; color: #104041;"><?= htmlspecialchars($t['project_name']); ?></strong><br>
                                                            <?php if (!empty($t['project_date'])): ?>
                                                                <small class="text-muted">
                                                                    <?= date('M d, Y', strtotime($t['project_date'])); ?>
                                                                </small>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <span class="text-muted" style="font-size: 13px;">Web & SEO</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php if (!empty($t['featured']) && $t['featured'] == 1): ?>
                                                            <span class="featured-badge"><i class="fas fa-star me-1"></i>Featured</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-light text-muted border">Standard</span>
                                                        <?php endif; ?>
                                                        <div class="text-muted mt-1" style="font-size: 11px;">Order: <?= intval($t['display_order'] ?? 0) ?></div>
                                                    </td>
                                                    <td class="action-btns text-end">
                                                        <a href="add-testimonial.php?edit=<?= $t['id']; ?>" 
                                                           class="btn btn-outline-primary" title="Edit Review">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button class="btn btn-outline-danger" 
                                                                data-bs-toggle="modal" 
                                                                data-bs-target="#deleteModal<?= $t['id']; ?>"
                                                                title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                        
                                                        <!-- Delete Confirmation Modal -->
                                                        <div class="modal fade text-start" id="deleteModal<?= $t['id']; ?>" tabindex="-1"
                                                            aria-labelledby="deleteModalLabel<?= $t['id']; ?>" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="deleteModalLabel<?= $t['id']; ?>">
                                                                            Confirm Testimonial Deletion
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Are you sure you want to permanently delete the review from 
                                                                        <strong><?= htmlspecialchars($t['client_name']); ?></strong>?
                                                                        <br><br>
                                                                        <span class="text-danger"><i class="fas fa-exclamation-triangle me-1"></i> This action cannot be undone.</span>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                        <a href="?deleteId=<?= $t['id']; ?>" class="btn btn-danger">Delete Review</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php 
                                                endwhile; 
                                            else:
                                            ?>
                                                <tr>
                                                    <td colspan="7" class="text-center py-4 text-muted">
                                                        <i class="fas fa-inbox fa-3x mb-2 text-muted opacity-50 d-block"></i>
                                                        No testimonials found matching your filter criteria.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination & Summary Bar -->
                                <?php if ($total_filtered > 0): 
                                    $from_item = $offset + 1;
                                    $to_item = min($offset + $limit, $total_filtered);
                                ?>
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mt-4 pt-3 border-top">
                                    <div class="text-muted" style="font-size: 13.5px;">
                                        Showing <strong class="text-dark"><?= $from_item ?></strong> to <strong class="text-dark"><?= $to_item ?></strong> of <strong class="text-dark"><?= $total_filtered ?></strong> reviews
                                    </div>

                                    <?php if ($total_pages > 1): ?>
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination pagination-sm mb-0 admin-pagination">
                                            <!-- First Page -->
                                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= build_page_url(1) ?>" title="First Page">
                                                    <i class="fas fa-angle-double-left"></i>
                                                </a>
                                            </li>

                                            <!-- Previous Page -->
                                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= build_page_url($page - 1) ?>">
                                                    <i class="fas fa-chevron-left me-1"></i> Prev
                                                </a>
                                            </li>

                                            <!-- Numbered Page Links -->
                                            <?php
                                            $start_p = max(1, $page - 2);
                                            $end_p = min($total_pages, $page + 2);

                                            if ($start_p > 1) {
                                                echo '<li class="page-item"><a class="page-link" href="' . build_page_url(1) . '">1</a></li>';
                                                if ($start_p > 2) echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                            }

                                            for ($i = $start_p; $i <= $end_p; $i++):
                                            ?>
                                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                                    <a class="page-link" href="<?= build_page_url($i) ?>"><?= $i ?></a>
                                                </li>
                                            <?php 
                                            endfor; 

                                            if ($end_p < $total_pages) {
                                                if ($end_p < $total_pages - 1) echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                                                echo '<li class="page-item"><a class="page-link" href="' . build_page_url($total_pages) . '">' . $total_pages . '</a></li>';
                                            }
                                            ?>

                                            <!-- Next Page -->
                                            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= build_page_url($page + 1) ?>">
                                                    Next <i class="fas fa-chevron-right ms-1"></i>
                                                </a>
                                            </li>

                                            <!-- Last Page -->
                                            <li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
                                                <a class="page-link" href="<?= build_page_url($total_pages) ?>" title="Last Page">
                                                    <i class="fas fa-angle-double-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>
    </section>

    <!-- Admin Video Player Modal -->
    <div class="modal fade" id="adminVideoModal" tabindex="-1" aria-labelledby="adminVideoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title" id="adminVideoModalLabel"><i class="fab fa-youtube text-danger me-2"></i>Video Testimonial</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="stopVideoModal()"></button>
                </div>
                <div class="modal-body p-0">
                    <div style="position: relative; padding-top: 56.25%; width: 100%;">
                        <iframe id="adminVideoIframe" src="" style="position: absolute; top:0; left:0; width:100%; height:100%; border:0;" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function playVideoModal(url, clientName) {
            document.getElementById('adminVideoModalLabel').innerHTML = '<i class="fab fa-youtube text-danger me-2"></i> Video: ' + clientName;
            document.getElementById('adminVideoIframe').src = url;
            var myModal = new bootstrap.Modal(document.getElementById('adminVideoModal'));
            myModal.show();
        }

        function stopVideoModal() {
            document.getElementById('adminVideoIframe').src = '';
        }

        document.getElementById('adminVideoModal').addEventListener('hidden.bs.modal', function () {
            stopVideoModal();
        });
    </script>
</body>
</html>