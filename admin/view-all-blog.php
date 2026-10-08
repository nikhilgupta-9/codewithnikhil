<?php
include "db-conn.php";

$alert = null;

// Handle deletion
if (isset($_POST['delete_id']) && is_numeric($_POST['delete_id'])) {
    $delId = (int)$_POST['delete_id'];
    
    // Get image filename before deleting to clean up file storage
    $stmtImg = $conn->prepare("SELECT image FROM blogs WHERE id = ?");
    $stmtImg->bind_param("i", $delId);
    $stmtImg->execute();
    $resImg = $stmtImg->get_result();
    if ($rowImg = $resImg->fetch_assoc()) {
        if (!empty($rowImg['image']) && file_exists('uploads/blogs/' . $rowImg['image'])) {
            @unlink('uploads/blogs/' . $rowImg['image']);
        }
    }
    $stmtImg->close();

    // Delete blog record
    $stmtDel = $conn->prepare("DELETE FROM blogs WHERE id = ?");
    $stmtDel->bind_param("i", $delId);
    if ($stmtDel->execute()) {
        $_SESSION['delete_message'] = [
            'type' => 'success',
            'text' => "Article #$delId deleted successfully."
        ];
    } else {
        $_SESSION['delete_message'] = [
            'type' => 'danger',
            'text' => "Failed to delete article: " . $conn->error
        ];
    }
    $stmtDel->close();

    header("Location: view-all-blog.php");
    exit();
}

// Flash message
if (isset($_SESSION['delete_message'])) {
    $alert = $_SESSION['delete_message'];
    unset($_SESSION['delete_message']);
}
if (isset($_SESSION['success'])) {
    $alert = ['type' => 'success', 'text' => $_SESSION['success']];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    $alert = ['type' => 'danger', 'text' => $_SESSION['error']];
    unset($_SESSION['error']);
}

// Status filter
$filterStatus = $_GET['status'] ?? 'all';

// Fetch stats
$statTotal = 0;
$statPublished = 0;
$statDraft = 0;
$statArchived = 0;

$countRes = $conn->query("SELECT status, COUNT(*) as cnt FROM blogs GROUP BY status");
if ($countRes) {
    while ($r = $countRes->fetch_assoc()) {
        $st = $r['status'];
        if ($st === 'published') $statPublished = (int)$r['cnt'];
        if ($st === 'draft') $statDraft = (int)$r['cnt'];
        if ($st === 'archived') $statArchived = (int)$r['cnt'];
        $statTotal += (int)$r['cnt'];
    }
}

// Fetch comments stats
$totalComments = 0;
$pendingComments = 0;
$cRes = $conn->query("SELECT status, COUNT(*) as cnt FROM blog_comments GROUP BY status");
if ($cRes) {
    while ($cr = $cRes->fetch_assoc()) {
        if ($cr['status'] === 'pending') $pendingComments += (int)$cr['cnt'];
        $totalComments += (int)$cr['cnt'];
    }
}

// Query blogs with counts
$sql = "SELECT b.*, 
        (SELECT COUNT(*) FROM blog_comments bc WHERE bc.blog_slug = b.slug_url) AS comment_count,
        (SELECT COUNT(*) FROM social_jobs sj WHERE sj.blog_id = b.id) AS social_drafts_count
        FROM blogs b ";

if (in_array($filterStatus, ['published', 'draft', 'archived'], true)) {
    $escapedStatus = $conn->real_escape_string($filterStatus);
    $sql .= "WHERE b.status = '$escapedStatus' ";
}

$sql .= "ORDER BY b.created_at DESC";
$result = $conn->query($sql);
$blogs = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $blogs[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Blog Management | NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    
    <?php include "links.php"; ?>
    
    <style>
        :root {
            --brand-teal: #104041;
            --brand-lime: #ADFF1C;
            --brand-accent: #0284c7;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --text-dark: #0f172a;
            --text-muted: #64748b;
        }

        /* Stat metric cards */
        .metric-card-styled {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 4px 16px -2px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .metric-card-styled:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px -4px rgba(0, 0, 0, 0.08);
        }
        .metric-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        .metric-icon-teal { background: rgba(16, 64, 65, 0.1); color: var(--brand-teal); }
        .metric-icon-green { background: rgba(16, 185, 129, 0.12); color: #10b981; }
        .metric-icon-amber { background: rgba(245, 158, 11, 0.12); color: #f59e0b; }
        .metric-icon-purple { background: rgba(147, 51, 234, 0.12); color: #9333ea; }

        /* Main Table Container */
        .blog-table-container {
            background: #ffffff;
            border: 1px solid var(--border-color);
            border-radius: 14px;
            box-shadow: 0 4px 16px -2px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .blog-thumb-img {
            width: 72px;
            height: 48px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
            background: #f1f5f9;
            transition: transform 0.2s ease;
        }
        .blog-thumb-img:hover {
            transform: scale(1.15);
            z-index: 5;
            position: relative;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .table-custom th {
            background: #f8fafc;
            color: #475569;
            font-size: 12.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 14px 16px;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }
        .table-custom td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
            font-size: 13.5px;
        }
        .table-custom tr:hover td {
            background-color: #f8fafc;
        }

        /* Status badges */
        .status-badge-published {
            background: #dcfce7;
            color: #15803d;
            font-weight: 600;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .status-badge-draft {
            background: #fef3c7;
            color: #b45309;
            font-weight: 600;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .status-badge-archived {
            background: #f1f5f9;
            color: #64748b;
            font-weight: 600;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .social-pill {
            font-size: 11.5px;
            padding: 3px 8px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            font-weight: 600;
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
            transition: all 0.15s;
        }
        .social-pill:hover {
            background: #dcfce7;
            color: #14532d;
        }
        .social-pill-empty {
            background: #f8fafc;
            color: #94a3b8;
            border: 1px dashed #cbd5e1;
        }

        .btn-action {
            width: 32px;
            height: 32px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            font-size: 13px;
            transition: all 0.15s;
        }

        .btn-primary-gradient {
            background: var(--brand-teal);
            color: #ffffff;
            font-weight: 600;
            border: none;
            padding: 10px 18px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(16, 64, 65, 0.15);
        }
        .btn-primary-gradient:hover {
            background: #0a2d2e;
            color: var(--brand-lime);
            transform: translateY(-1px);
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

                <!-- Alert Message -->
                <?php if ($alert): ?>
                    <div class="alert alert-<?= $alert['type'] ?> alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
                        <i class="fas <?= $alert['type'] === 'success' ? 'fa-check-circle' : 'fa-exclamation-triangle' ?> me-2"></i>
                        <?= htmlspecialchars($alert['text']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Page Header Title & CTA -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-1 text-muted small">
                                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">Blog Management</li>
                            </ol>
                        </nav>
                        <h2 class="mb-0 fw-extrabold text-dark d-flex align-items-center gap-2">
                            <i class="fas fa-newspaper text-primary"></i> Blog Articles &amp; Content Hub
                        </h2>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-2 mt-md-0">
                        <a href="blog-comments.php" class="btn btn-outline-secondary px-3">
                            <i class="fas fa-comments me-1"></i> Comments Moderation
                            <?php if ($pendingComments > 0): ?>
                                <span class="badge bg-danger ms-1"><?= $pendingComments ?></span>
                            <?php endif; ?>
                        </a>
                        <a href="social-queue.php" class="btn btn-outline-dark px-3">
                            <i class="fas fa-share-nodes me-1"></i> Social Automation
                        </a>
                        <a href="add-blog.php" class="btn-primary-gradient">
                            <i class="fas fa-plus"></i> Write New Article
                        </a>
                    </div>
                </div>

                <!-- Stats Overview Cards -->
                <div class="row g-3 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="metric-card-styled">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase">Total Articles</div>
                                <h3 class="mb-0 fw-extrabold text-dark mt-1"><?= $statTotal ?></h3>
                            </div>
                            <div class="metric-icon-box metric-icon-teal">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="metric-card-styled">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase">Published Live</div>
                                <h3 class="mb-0 fw-extrabold text-success mt-1"><?= $statPublished ?></h3>
                            </div>
                            <div class="metric-icon-box metric-icon-green">
                                <i class="fas fa-globe"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="metric-card-styled">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase">Drafts / In-Progress</div>
                                <h3 class="mb-0 fw-extrabold text-warning mt-1"><?= $statDraft ?></h3>
                            </div>
                            <div class="metric-icon-box metric-icon-amber">
                                <i class="fas fa-edit"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="metric-card-styled">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase">Total Comments</div>
                                <h3 class="mb-0 fw-extrabold text-purple mt-1"><?= $totalComments ?></h3>
                            </div>
                            <div class="metric-icon-box metric-icon-purple">
                                <i class="fas fa-comments"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters and Search Toolbar -->
                <div class="blog-table-container mb-4">
                    <div class="p-3 border-bottom bg-light d-flex flex-wrap justify-content-between align-items-center gap-3">
                        <!-- Status Filter Pills -->
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <span class="fw-bold text-muted small me-1"><i class="fas fa-filter me-1"></i> Filter:</span>
                            <a href="view-all-blog.php?status=all" class="btn btn-sm rounded-pill <?= $filterStatus === 'all' ? 'btn-dark' : 'btn-outline-secondary' ?>">
                                All (<?= $statTotal ?>)
                            </a>
                            <a href="view-all-blog.php?status=published" class="btn btn-sm rounded-pill <?= $filterStatus === 'published' ? 'btn-success' : 'btn-outline-success' ?>">
                                Live (<?= $statPublished ?>)
                            </a>
                            <a href="view-all-blog.php?status=draft" class="btn btn-sm rounded-pill <?= $filterStatus === 'draft' ? 'btn-warning text-dark' : 'btn-outline-warning' ?>">
                                Drafts (<?= $statDraft ?>)
                            </a>
                            <?php if ($statArchived > 0): ?>
                                <a href="view-all-blog.php?status=archived" class="btn btn-sm rounded-pill <?= $filterStatus === 'archived' ? 'btn-secondary' : 'btn-outline-secondary' ?>">
                                    Archived (<?= $statArchived ?>)
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Live Search Input -->
                        <div style="min-width: 260px; max-width: 360px;" class="w-100 w-sm-auto">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="fas fa-search"></i></span>
                                <input type="text" id="tableSearchInput" class="form-control border-start-0" placeholder="Search by title, author, or tag...">
                            </div>
                        </div>
                    </div>

                    <!-- Articles Table -->
                    <div class="table-responsive">
                        <table class="table table-custom mb-0 align-middle" id="blogsTable">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">#</th>
                                    <th style="width: 80px;">Cover</th>
                                    <th>Article Details</th>
                                    <th style="width: 130px;">Author</th>
                                    <th style="width: 120px;">Status</th>
                                    <th style="width: 130px;">Social Queue</th>
                                    <th style="width: 140px;">Date</th>
                                    <th style="width: 120px;" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($blogs)): ?>
                                    <tr>
                                        <td colspan="8" class="text-center py-5">
                                            <div class="text-muted">
                                                <i class="fas fa-newspaper fa-3x mb-3 text-secondary opacity-50"></i>
                                                <h5 class="fw-bold text-dark">No Articles Found</h5>
                                                <p class="small text-muted mb-3">No blog posts match the selected filter criteria.</p>
                                                <a href="add-blog.php" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-plus me-1"></i> Write Your First Article
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php $index = 1; foreach ($blogs as $b): 
                                        $hasImage = !empty($b['image']) && file_exists('uploads/blogs/' . $b['image']);
                                        $imgUrl = $hasImage ? 'uploads/blogs/' . htmlspecialchars($b['image']) : 'assets/img/icon/empty-box.png';
                                    ?>
                                        <tr class="blog-row" data-search="<?= htmlspecialchars(strtolower($b['title'] . ' ' . $b['author'] . ' ' . $b['tags'] . ' ' . $b['slug_url'])) ?>">
                                            <td class="text-muted fw-bold"><?= $index++ ?></td>
                                            <td>
                                                <a href="edit-blog.php?id=<?= $b['id'] ?>">
                                                    <img src="<?= $imgUrl ?>" class="blog-thumb-img" alt="Cover thumbnail" onerror="this.src='https://placehold.co/120x80/e2e8f0/64748b?text=Cover'">
                                                </a>
                                            </td>
                                            <td>
                                                <div class="fw-bold text-dark mb-1">
                                                    <a href="edit-blog.php?id=<?= $b['id'] ?>" class="text-dark text-decoration-none hover-primary">
                                                        <?= htmlspecialchars($b['title']) ?>
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-wrap align-items-center gap-2 small text-muted">
                                                    <span><i class="fas fa-link fa-xs me-1"></i> /blog/<?= htmlspecialchars($b['slug_url']) ?>/</span>
                                                    <?php if ($b['comment_count'] > 0): ?>
                                                        <a href="blog-comments.php" class="badge bg-light text-primary border text-decoration-none">
                                                            <i class="fas fa-comment me-1"></i> <?= $b['comment_count'] ?> comments
                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-1 small text-dark fw-semibold">
                                                    <i class="fas fa-user-circle text-muted"></i>
                                                    <span><?= htmlspecialchars($b['author']) ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($b['status'] === 'published'): ?>
                                                    <span class="status-badge-published">
                                                        <i class="fas fa-check-circle fa-xs"></i> Live
                                                    </span>
                                                <?php elseif ($b['status'] === 'draft'): ?>
                                                    <span class="status-badge-draft">
                                                        <i class="fas fa-pen-nib fa-xs"></i> Draft
                                                    </span>
                                                <?php else: ?>
                                                    <span class="status-badge-archived">
                                                        <i class="fas fa-archive fa-xs"></i> Archived
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($b['social_drafts_count'] > 0): ?>
                                                    <a href="social-queue.php?blog_id=<?= $b['id'] ?>" class="social-pill" title="View scheduled & generated AI social posts">
                                                        <i class="fas fa-robot text-success"></i> <?= $b['social_drafts_count'] ?> Drafts
                                                    </a>
                                                <?php else: ?>
                                                    <a href="social-queue.php" class="social-pill social-pill-empty" title="Queue social media draft">
                                                        <i class="fas fa-plus fa-xs"></i> Create
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="small fw-semibold text-dark"><?= date('d M Y', strtotime($b['created_at'])) ?></div>
                                                <div class="text-muted" style="font-size: 11.5px;"><?= date('h:i A', strtotime($b['created_at'])) ?></div>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-inline-flex gap-1">
                                                    <a href="../blog-detail.php?alias=<?= urlencode($b['slug_url']) ?>" target="_blank" class="btn btn-action btn-outline-info" title="View live on website">
                                                        <i class="fas fa-external-link-alt"></i>
                                                    </a>
                                                    <a href="edit-blog.php?id=<?= $b['id'] ?>" class="btn btn-action btn-outline-primary" title="Edit Article">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-action btn-outline-danger" 
                                                            onclick="openDeleteModal(<?= $b['id'] ?>, '<?= addslashes(htmlspecialchars($b['title'])) ?>')"
                                                            title="Delete Article">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header bg-danger text-white border-0 py-3">
                        <h5 class="modal-title fw-bold" id="deleteModalLabel">
                            <i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete Article
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="view-all-blog.php">
                        <div class="modal-body p-4">
                            <p class="mb-2">Are you sure you want to permanently delete this blog post?</p>
                            <div class="p-3 bg-light rounded border mb-3">
                                <strong class="text-dark d-block" id="deleteArticleTitle"></strong>
                                <small class="text-muted" id="deleteArticleId"></small>
                            </div>
                            <div class="text-danger small">
                                <i class="fas fa-info-circle me-1"></i> This action cannot be undone and will delete the associated featured cover image as well.
                            </div>
                            <input type="hidden" name="delete_id" id="deleteInputId" value="">
                        </div>
                        <div class="modal-footer border-0 bg-light py-2">
                            <button type="button" class="btn btn-secondary px-3" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger px-3">
                                <i class="fas fa-trash-alt me-1"></i> Yes, Delete Permanently
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

        <script>
            // Live Search Filter
            document.getElementById('tableSearchInput').addEventListener('input', function() {
                const query = this.value.toLowerCase().trim();
                const rows = document.querySelectorAll('.blog-row');
                
                rows.forEach(row => {
                    const searchData = row.getAttribute('data-search') || '';
                    if (searchData.includes(query)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Delete Modal Trigger
            function openDeleteModal(id, title) {
                document.getElementById('deleteInputId').value = id;
                document.getElementById('deleteArticleTitle').textContent = title;
                document.getElementById('deleteArticleId').textContent = 'Article ID #' + id;
                
                const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
                deleteModal.show();
            }
        </script>
</body>
</html>