<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "db-conn.php";

// Admin Authentication Check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}

$alert = null;

// Auto-sync sitemaps helper
if (!function_exists('auto_sync_sitemaps_cat')) {
    function auto_sync_sitemaps_cat($conn) {
        try {
            require_once dirname(__DIR__) . '/util/sitemap_generator.php';
            generate_all_sitemaps($conn, true);
        } catch (\Throwable $t) {
            error_log("Sitemap generation error: " . $t->getMessage());
        }
    }
}

// 1. Handle Quick Add Category Form Submission
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && isset($_POST['quick_add_category'])) {
    $cate_name   = trim($_POST['cate_name'] ?? '');
    $meta_title  = trim($_POST['meta_title'] ?? '') ?: $cate_name;
    $meta_key    = trim($_POST['meta_key'] ?? '') ?: $cate_name;
    $meta_desc   = trim($_POST['meta_desc'] ?? '') ?: $cate_name;
    $status      = isset($_POST['status']) ? intval($_POST['status']) : 1;
    $slug_input  = trim($_POST['slug_url'] ?? '');
    
    // Generate clean slug
    if (!empty($slug_input)) {
        $slug_url = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $slug_input), '-'));
    } else {
        $slug_url = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $cate_name), '-'));
    }
    if (empty($slug_url)) {
        $slug_url = 'cat-' . time();
    }

    if (empty($cate_name)) {
        $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => 'Category name cannot be empty.'];
    } else {
        $cate_id = mt_rand(11111, 99999);
        $image_name = '';

        // Handle image upload if provided
        if (!empty($_FILES['imageUpload']['name'])) {
            $upload_dir = "uploads/category/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }
            $ext = strtolower(pathinfo($_FILES['imageUpload']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
            if (in_array($ext, $allowed)) {
                $image_name = time() . "_" . preg_replace('/[^a-zA-Z0-9_\.-]/', '', basename($_FILES['imageUpload']['name']));
                move_uploaded_file($_FILES['imageUpload']['tmp_name'], $upload_dir . $image_name);
            }
        }

        $stmtAdd = $conn->prepare("INSERT INTO `categories` (`cate_id`, `categories`, `meta_title`, `meta_desc`, `meta_key`, `image`, `slug_url`, `status`, `added_on`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        if ($stmtAdd) {
            $stmtAdd->bind_param("issssssi", $cate_id, $cate_name, $meta_title, $meta_desc, $meta_key, $image_name, $slug_url, $status);
            if ($stmtAdd->execute()) {
                auto_sync_sitemaps_cat($conn);
                $_SESSION['flash_msg'] = ['type' => 'success', 'text' => "Category \"$cate_name\" created successfully!"];
            } else {
                $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Database error: " . $conn->error];
            }
            $stmtAdd->close();
        }
    }
    header("Location: view-categories.php");
    exit();
}

// 2. Handle Status Toggle
if (isset($_GET['action']) && $_GET['action'] === 'toggle_status' && isset($_GET['id'])) {
    $toggle_id = intval($_GET['id']);
    $stmtTog = $conn->prepare("UPDATE `categories` SET `status` = IF(`status` = 1, 0, 1) WHERE `cate_id` = ?");
    if ($stmtTog) {
        $stmtTog->bind_param("i", $toggle_id);
        if ($stmtTog->execute()) {
            auto_sync_sitemaps_cat($conn);
            $_SESSION['flash_msg'] = ['type' => 'success', 'text' => "Category #$toggle_id status updated."];
        } else {
            $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Failed to update status: " . $conn->error];
        }
        $stmtTog->close();
    }
    header("Location: view-categories.php");
    exit();
}

// 3. Handle Category Deletion
if ((isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) || (isset($_POST['delete_category']) && isset($_POST['cat_id']))) {
    $del_id = isset($_POST['cat_id']) ? intval($_POST['cat_id']) : intval($_GET['id']);
    if ($del_id > 0) {
        // Fetch image to delete from disk
        $stmtImg = $conn->prepare("SELECT `image` FROM `categories` WHERE `cate_id` = ?");
        if ($stmtImg) {
            $stmtImg->bind_param("i", $del_id);
            $stmtImg->execute();
            $resImg = $stmtImg->get_result();
            if ($rowImg = $resImg->fetch_assoc()) {
                if (!empty($rowImg['image']) && file_exists('uploads/category/' . $rowImg['image'])) {
                    @unlink('uploads/category/' . $rowImg['image']);
                }
            }
            $stmtImg->close();
        }

        $stmtDel = $conn->prepare("DELETE FROM `categories` WHERE `cate_id` = ?");
        if ($stmtDel) {
            $stmtDel->bind_param("i", $del_id);
            if ($stmtDel->execute()) {
                auto_sync_sitemaps_cat($conn);
                $_SESSION['flash_msg'] = ['type' => 'success', 'text' => "Category #$del_id deleted successfully."];
            } else {
                $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Error deleting category: " . $conn->error];
            }
            $stmtDel->close();
        }
    }
    header("Location: view-categories.php");
    exit();
}

// Flash Message Processing
if (isset($_SESSION['flash_msg'])) {
    $alert = $_SESSION['flash_msg'];
    unset($_SESSION['flash_msg']);
}
if (isset($_SESSION['success'])) {
    $alert = ['type' => 'success', 'text' => $_SESSION['success']];
    unset($_SESSION['success']);
}

// 4. Fetch Metrics
$statTotal = 0;
$statActive = 0;
$statInactive = 0;
$totalProjectsCount = 0;

$countQ = $conn->query("SELECT `status`, COUNT(*) as cnt FROM `categories` GROUP BY `status`");
if ($countQ) {
    while ($r = $countQ->fetch_assoc()) {
        $c = (int)$r['cnt'];
        $statTotal += $c;
        if ((int)$r['status'] === 1) {
            $statActive += $c;
        } else {
            $statInactive += $c;
        }
    }
}

$prodQ = $conn->query("SELECT COUNT(*) FROM `products`");
if ($prodQ) {
    $totalProjectsCount = (int)$prodQ->fetch_row()[0];
}

// 5. Fetch All Categories with linked items count
$categories = [];
$sql = "SELECT c.*, 
        (SELECT COUNT(*) FROM `products` p WHERE p.pro_cate = c.cate_id) AS product_count,
        (SELECT COUNT(*) FROM `sub_categories` sc WHERE sc.parent_id = c.cate_id) AS subcat_count
        FROM `categories` c 
        ORDER BY c.id DESC";
$resCat = $conn->query($sql);
if ($resCat) {
    while ($row = $resCat->fetch_assoc()) {
        $categories[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Category Management | NikhilWorks Executive Suite</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">

    <?php include "links.php"; ?>

    <style>
        .cat-thumb {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
            background-color: #f8fafc;
            transition: transform 0.2s ease;
        }
        .cat-thumb:hover {
            transform: scale(1.15);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .cat-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #e0e7ff 0%, #ede9fe 100%);
            color: #6366f1;
            font-size: 18px;
            font-weight: 700;
        }
        .stat-card {
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid #f1f5f9;
            box-shadow: 0 2px 6px rgba(0,0,0,0.03);
            padding: 18px 20px;
            transition: all 0.25s ease;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.06);
        }
        .status-badge {
            cursor: pointer;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            border-radius: 20px;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }
        .status-badge.active-status {
            background-color: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
        }
        .status-badge.active-status:hover {
            background-color: #d1fae5;
            color: #047857;
        }
        .status-badge.inactive-status {
            background-color: #f3f4f6;
            color: #6b7280;
            border: 1px solid #e5e7eb;
        }
        .status-badge.inactive-status:hover {
            background-color: #e5e7eb;
            color: #374151;
        }
        .search-container {
            max-width: 320px;
        }
        .table-responsive {
            border-radius: 10px;
        }
        .action-icon-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            text-decoration: none;
        }
        .action-icon-btn:hover {
            transform: translateY(-2px);
        }
        .slug-pill {
            background-color: #f1f5f9;
            color: #475569;
            padding: 3px 10px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 12px;
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

                <!-- Flash Alert -->
                <?php if ($alert): ?>
                    <div class="alert alert-<?= htmlspecialchars($alert['type']) ?> alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-<?= $alert['type'] === 'success' ? 'check-circle' : 'exclamation-circle' ?> me-2"></i>
                        <?= htmlspecialchars($alert['text']) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Stats Overview Row -->
                <div class="row g-3 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="stat-card d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Total Categories</div>
                                <h3 class="fw-bold mb-0 mt-1 text-dark"><?= $statTotal ?></h3>
                            </div>
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 text-primary">
                                <i class="fas fa-folder fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Active Status</div>
                                <h3 class="fw-bold mb-0 mt-1 text-success"><?= $statActive ?></h3>
                            </div>
                            <div class="rounded-circle bg-success bg-opacity-10 p-3 text-success">
                                <i class="fas fa-check-circle fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Inactive Status</div>
                                <h3 class="fw-bold mb-0 mt-1 text-secondary"><?= $statInactive ?></h3>
                            </div>
                            <div class="rounded-circle bg-secondary bg-opacity-10 p-3 text-secondary">
                                <i class="fas fa-eye-slash fa-lg"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-card d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Linked Projects</div>
                                <h3 class="fw-bold mb-0 mt-1 text-info"><?= $totalProjectsCount ?></h3>
                            </div>
                            <div class="rounded-circle bg-info bg-opacity-10 p-3 text-info">
                                <i class="fas fa-laptop-code fa-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Card -->
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="white_card card_height_100 mb_30 shadow-sm border-0">
                            
                            <!-- Card Header -->
                            <div class="white_card_header py-3 px-4 border-bottom">
                                <div class="row align-items-center gy-3">
                                    <div class="col-lg-5">
                                        <div class="main-title">
                                            <h3 class="m-0 fw-bold text-dark">Portfolio &amp; Project Categories</h3>
                                            <p class="text-muted mb-0 small mt-1">
                                                Manage project classifications, slug endpoints, SEO metadata, and active visibility.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="d-flex flex-wrap align-items-center justify-content-lg-end gap-2">
                                            <!-- Live Search -->
                                            <div class="search-container position-relative">
                                                <input type="text" id="catSearchInput" class="form-control form-control-sm ps-5" placeholder="Search category or slug...">
                                                <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                            </div>

                                            <!-- Status Filter -->
                                            <select id="statusFilter" class="form-select form-select-sm" style="width: auto;">
                                                <option value="all">All Statuses</option>
                                                <option value="active">Active Only</option>
                                                <option value="inactive">Inactive Only</option>
                                            </select>

                                            <!-- Quick Add Modal Trigger Button -->
                                            <button type="button" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                                <i class="fas fa-plus me-1"></i> Add Category
                                            </button>

                                            <!-- Full Page Link -->
                                            <a href="add-categories.php" class="btn btn-outline-secondary btn-sm rounded-pill px-3" title="Advanced Form">
                                                <i class="fas fa-external-link-alt me-1"></i> Full Page
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body Table -->
                            <div class="white_card_body p-4">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0" id="categoriesTable">
                                        <thead class="table-light text-uppercase text-muted small" style="letter-spacing: 0.5px;">
                                            <tr>
                                                <th scope="col" class="text-center" style="width: 50px;">#</th>
                                                <th scope="col" style="width: 80px;">Thumbnail</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Slug URL</th>
                                                <th scope="col" class="text-center">Projects</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Added Date</th>
                                                <th scope="col" class="text-end" style="width: 140px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (empty($categories)): ?>
                                                <tr>
                                                    <td colspan="8" class="text-center py-5 text-muted">
                                                        <i class="fas fa-folder-open fa-3x mb-3 text-secondary opacity-50"></i>
                                                        <h6>No categories found.</h6>
                                                        <p class="small">Click "Add Category" above to create your first portfolio category.</p>
                                                    </td>
                                                </tr>
                                            <?php else: ?>
                                                <?php 
                                                $sno = 1;
                                                foreach ($categories as $cat): 
                                                    $isActive = ((int)$cat['status'] === 1 || $cat['status'] === 'Active');
                                                    $catImg = !empty($cat['image']) && file_exists('uploads/category/' . $cat['image']) 
                                                        ? 'uploads/category/' . htmlspecialchars($cat['image']) 
                                                        : '';
                                                ?>
                                                    <tr class="cat-row" data-name="<?= htmlspecialchars(strtolower($cat['categories'])) ?>" data-slug="<?= htmlspecialchars(strtolower($cat['slug_url'])) ?>" data-status="<?= $isActive ? 'active' : 'inactive' ?>">
                                                        <td class="text-center text-muted small fw-bold">
                                                            <?= $sno++ ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($catImg)): ?>
                                                                <img src="<?= $catImg ?>" alt="<?= htmlspecialchars($cat['categories']) ?>" class="cat-thumb shadow-sm">
                                                            <?php else: ?>
                                                                <div class="cat-placeholder">
                                                                    <?= strtoupper(substr(trim($cat['categories']), 0, 1)) ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <div class="fw-bold text-dark mb-0">
                                                                <a href="edit_category.php?id=<?= $cat['cate_id'] ?>" class="text-dark text-decoration-none hover-primary">
                                                                    <?= htmlspecialchars($cat['categories']) ?>
                                                                </a>
                                                            </div>
                                                            <div class="text-muted small">
                                                                <span class="badge bg-light text-muted border py-0 px-2">ID: #<?= htmlspecialchars($cat['cate_id']) ?></span>
                                                                <?php if (!empty($cat['meta_title']) && $cat['meta_title'] !== $cat['categories']): ?>
                                                                    &bull; <span class="text-muted" title="Meta Title"><?= htmlspecialchars($cat['meta_title']) ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="slug-pill">
                                                                /<?= htmlspecialchars($cat['slug_url']) ?>
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="show-products.php" class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-3 py-2 text-decoration-none fw-semibold" title="View linked projects">
                                                                <i class="fas fa-layer-group me-1"></i><?= (int)$cat['product_count'] ?> items
                                                            </a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="view-categories.php?action=toggle_status&id=<?= $cat['cate_id'] ?>" 
                                                               class="status-badge <?= $isActive ? 'active-status' : 'inactive-status' ?>"
                                                               title="Click to toggle status">
                                                                <i class="fas fa-circle fa-xs"></i> <?= $isActive ? 'Active' : 'Inactive' ?>
                                                            </a>
                                                        </td>
                                                        <td class="text-center text-muted small">
                                                            <?= !empty($cat['added_on']) ? date('M d, Y', strtotime($cat['added_on'])) : 'N/A' ?>
                                                        </td>
                                                        <td class="text-end">
                                                            <div class="d-inline-flex gap-1">
                                                                <!-- Edit -->
                                                                <a href="edit_category.php?id=<?= $cat['cate_id'] ?>" class="action-icon-btn btn btn-sm btn-outline-primary" title="Edit Category">
                                                                    <i class="fas fa-pen fa-xs"></i>
                                                                </a>
                                                                <!-- Status Toggle -->
                                                                <a href="view-categories.php?action=toggle_status&id=<?= $cat['cate_id'] ?>" class="action-icon-btn btn btn-sm btn-outline-secondary" title="Toggle Active/Inactive">
                                                                    <i class="fas fa-power-off fa-xs"></i>
                                                                </a>
                                                                <!-- Delete -->
                                                                <a href="view-categories.php?action=delete&id=<?= $cat['cate_id'] ?>" 
                                                                   onclick="return confirm('Are you sure you want to delete category \'<?= htmlspecialchars(addslashes($cat['categories'])) ?>\'? Linked projects may become unassigned.');"
                                                                   class="action-icon-btn btn btn-sm btn-outline-danger" title="Delete Category">
                                                                    <i class="fas fa-trash fa-xs"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Table Footer Info -->
                                <div class="d-flex flex-wrap justify-content-between align-items-center mt-3 pt-3 border-top text-muted small">
                                    <div>
                                        Showing <strong id="visibleRowCount"><?= count($categories) ?></strong> of <strong><?= count($categories) ?></strong> categories
                                    </div>
                                    <div class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i> Changes auto-sync with global XML sitemaps
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <!-- Quick Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px;">
                <div class="modal-header bg-light py-3 px-4" style="border-top-left-radius: 16px; border-top-right-radius: 16px;">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-2 text-primary">
                            <i class="fas fa-folder-plus"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold text-dark mb-0" id="addCategoryModalLabel">Add New Category</h5>
                            <small class="text-muted">Create a new classification for portfolio projects &amp; services</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="view-categories.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="quick_add_category" value="1">
                    <div class="modal-body p-4">
                        <div class="row g-3">
                            <!-- Category Name -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="cate_name" id="modalCatName" class="form-control" placeholder="e.g. E-Commerce Platforms" required>
                            </div>

                            <!-- Slug URL -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Slug URL (Auto-Generated)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-muted small">/</span>
                                    <input type="text" name="slug_url" id="modalSlugUrl" class="form-control" placeholder="e-commerce-platforms">
                                </div>
                            </div>

                            <!-- Meta Title -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Meta Title (SEO)</label>
                                <input type="text" name="meta_title" id="modalMetaTitle" class="form-control" placeholder="SEO Title for category archive">
                            </div>

                            <!-- Status -->
                            <div class="col-md-6">
                                <label class="form-label small fw-bold text-dark">Status</label>
                                <select name="status" class="form-select">
                                    <option value="1" selected>Active (Visible publicly)</option>
                                    <option value="0">Inactive (Draft / Hidden)</option>
                                </select>
                            </div>

                            <!-- Meta Keywords -->
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Meta Keywords</label>
                                <input type="text" name="meta_key" class="form-control" placeholder="e.g. web design, custom software, full stack developer">
                            </div>

                            <!-- Meta Description -->
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Meta Description</label>
                                <textarea name="meta_desc" rows="2" class="form-control" placeholder="Brief search snippet description..."></textarea>
                            </div>

                            <!-- Image Upload -->
                            <div class="col-12">
                                <label class="form-label small fw-bold text-dark">Category Banner Image</label>
                                <input type="file" name="imageUpload" id="modalImageInput" class="form-control" accept="image/*">
                                <div class="form-text small">Accepted formats: JPG, PNG, WEBP, SVG (Max 5MB).</div>
                                
                                <div id="modalImagePreviewContainer" class="mt-2" style="display: none;">
                                    <img id="modalImagePreview" src="" alt="Preview" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light py-3 px-4" style="border-bottom-left-radius: 16px; border-bottom-right-radius: 16px;">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-save me-1"></i> Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Real-time Search and Filter functionality
        const searchInput = document.getElementById('catSearchInput');
        const statusFilter = document.getElementById('statusFilter');
        const rows = document.querySelectorAll('.cat-row');
        const counterEl = document.getElementById('visibleRowCount');

        function filterCategories() {
            const query = searchInput.value.toLowerCase().trim();
            const status = statusFilter.value;
            let visibleCount = 0;

            rows.forEach(row => {
                const name = row.getAttribute('data-name') || '';
                const slug = row.getAttribute('data-slug') || '';
                const rowStatus = row.getAttribute('data-status') || '';

                const matchesQuery = query === '' || name.includes(query) || slug.includes(query);
                const matchesStatus = status === 'all' || rowStatus === status;

                if (matchesQuery && matchesStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            if (counterEl) {
                counterEl.innerText = visibleCount;
            }
        }

        if (searchInput) searchInput.addEventListener('input', filterCategories);
        if (statusFilter) statusFilter.addEventListener('change', filterCategories);

        // Auto-generate Slug in Modal
        const nameInput = document.getElementById('modalCatName');
        const slugInput = document.getElementById('modalSlugUrl');
        const metaTitleInput = document.getElementById('modalMetaTitle');

        if (nameInput && slugInput) {
            nameInput.addEventListener('input', function() {
                const val = this.value;
                const slug = val.toLowerCase()
                                .replace(/[^a-z0-9]+/g, '-')
                                .replace(/^-+|-+$/g, '');
                slugInput.value = slug;
                if (metaTitleInput && metaTitleInput.value === '') {
                    metaTitleInput.placeholder = val;
                }
            });
        }

        // Live Image Preview in Modal
        const imageInput = document.getElementById('modalImageInput');
        const previewContainer = document.getElementById('modalImagePreviewContainer');
        const previewImg = document.getElementById('modalImagePreview');

        if (imageInput && previewContainer && previewImg) {
            imageInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImg.src = e.target.result;
                        previewContainer.style.display = 'block';
                    };
                    reader.readAsDataURL(file);
                } else {
                    previewContainer.style.display = 'none';
                }
            });
        }
    </script>

    <?php include "footer.php"; ?>
