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
    header("Location: view-testimonials.php");
    exit();
}

// Counts for quick stats
$total_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials");
$total_count = $total_count_res->fetch_assoc()['c'] ?? 0;

$google_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials WHERE review_source = 'google' OR (review_source IS NULL AND (video_url IS NULL OR video_url = ''))");
$google_count = $google_count_res->fetch_assoc()['c'] ?? 0;

$video_count_res = $conn->query("SELECT COUNT(*) AS c FROM testimonials WHERE review_source = 'video' OR (video_url IS NOT NULL AND video_url != '')");
$video_count = $video_count_res->fetch_assoc()['c'] ?? 0;

$avg_rating_res = $conn->query("SELECT AVG(rating) AS a FROM testimonials WHERE rating IS NOT NULL");
$avg_rating = round($avg_rating_res->fetch_assoc()['a'] ?? 5, 1);

// Fetch all testimonials
$result = $conn->query("SELECT * FROM testimonials ORDER BY featured DESC, display_order ASC, created_at DESC");

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
            width: 48px;
            height: 48px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #e2e8f0;
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
        }
        .filter-btn.active, .filter-btn:hover {
            background: #104041;
            color: #fff;
            border-color: #104041;
        }

        .action-btns .btn {
            padding: 0.35rem 0.6rem;
            font-size: 0.85rem;
            border-radius: 6px;
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
                                        <small class="text-muted">Control all Google Profile reviews and Video Testimonials shown on website</small>
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

                                <!-- Filter Buttons -->
                                <div class="d-flex gap-2 mb-3 flex-wrap align-items-center">
                                    <span class="fw-bold text-muted me-1" style="font-size: 13px;">Filter By:</span>
                                    <button class="filter-btn active" onclick="filterTable('all', this)">All (<?= $total_count ?>)</button>
                                    <button class="filter-btn" onclick="filterTable('google', this)"><i class="fab fa-google text-primary me-1"></i> Google (<?= $google_count ?>)</button>
                                    <button class="filter-btn" onclick="filterTable('video', this)"><i class="fab fa-youtube text-danger me-1"></i> Video (<?= $video_count ?>)</button>
                                    <button class="filter-btn" onclick="filterTable('direct', this)"><i class="fas fa-user-check text-success me-1"></i> Direct</button>
                                </div>
                                
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
                                                <tr data-source="<?= htmlspecialchars($source) ?>">
                                                    <td><span class="text-muted fw-bold">#<?= htmlspecialchars($t['id']); ?></span></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <?php if (!empty($t['client_photo'])): ?>
                                                                <img src="../uploads/testimonials/<?= htmlspecialchars($t['client_photo']); ?>" 
                                                                     alt="<?= htmlspecialchars($t['client_name']); ?>" 
                                                                     class="testimonial-img me-3">
                                                            <?php else: ?>
                                                                <div class="testimonial-img bg-light d-flex align-items-center justify-content-center me-3 text-primary fw-bold" style="font-size: 16px;">
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
                                                                <i class="fab fa-youtube"></i> Video Testimonial
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
                                                        No testimonials found. Click "Add Testimonial" to create your first review.
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
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

        function filterTable(type, btn) {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const rows = document.querySelectorAll('#testimonialsTable tbody tr');
            rows.forEach(row => {
                if (type === 'all') {
                    row.style.display = '';
                } else {
                    const rowSource = row.getAttribute('data-source');
                    if (rowSource === type) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
        }
    </script>
</body>
</html>