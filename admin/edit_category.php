<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "functions.php";

// Admin Authentication Check
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: auth/login.php");
    exit();
}

// Get category id from URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $cat_id = $_GET['id'];
    $category = get_category_by_id($cat_id);
    if (!$category) {
        $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Category not found."];
        header("Location: view-categories.php");
        exit();
    }
} else {
    $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Invalid category ID specified."];
    header("Location: view-categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/themefy_icon.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 Apr 2023 14:08:14 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Category</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">

    <?php include "links.php"; ?>
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

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="container-fluid p-4">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="card shadow-sm border-0">
                                                <div class="card-header bg-primary text-white">
                                                    <h4 class="mb-0">Edit Category</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form action="update-category.php" method="post"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="cat_id"
                                                            value="<?= htmlspecialchars($category['id']) ?>">

                                                        <!-- Category Name -->
                                                        <div class="mb-3">
                                                            <label for="cate_name" class="form-label fw-bold">Category
                                                                Name</label>
                                                            <input type="text" id="cate_name" name="cate_name"
                                                                value="<?= htmlspecialchars($category['categories']) ?>"
                                                                class="form-control" required>
                                                        </div>

                                                        <!-- Slug -->
                                                        <div class="mb-3">
                                                            <label for="slug_url" class="form-label fw-bold">Slug
                                                                URL</label>
                                                            <input type="text" id="slug_url" name="slug_url"
                                                                value="<?= htmlspecialchars($category['slug_url']) ?>"
                                                                class="form-control" required>
                                                        </div>

                                                        <!-- Status -->
                                                        <div class="mb-3">
                                                            <label for="status"
                                                                class="form-label fw-bold">Status</label>
                                                            <select id="status" name="status" class="form-select"
                                                                required>
                                                                <option value="1"
                                                                    <?= ($category['status'] == 1 || $category['status'] === 'Active') ? 'selected' : '' ?>>Active</option>
                                                                <option value="0"
                                                                    <?= ($category['status'] == 0 || $category['status'] === 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                                            </select>
                                                        </div>

                                                        <!-- Current Image -->
                                                        <div class="mb-3">
                                                            <label class="form-label fw-bold">Current Image</label><br>
                                                            <?php if (!empty($category['image'])): ?>
                                                                <img src="uploads/category/<?= htmlspecialchars($category['image']) ?>"
                                                                    alt="Category Image" class="img-thumbnail mb-2"
                                                                    style="max-height:120px;">
                                                            <?php else: ?>
                                                                <p class="text-muted">No image uploaded.</p>
                                                            <?php endif; ?>
                                                        </div>

                                                        <!-- Upload New Image -->
                                                        <div class="mb-3">
                                                            <label for="imageUpload" class="form-label fw-bold">Upload
                                                                New Image</label>
                                                            <input type="file" id="imageUpload" name="imageUpload"
                                                                class="form-control">
                                                        </div>

                                                        <!-- Buttons -->
                                                        <div class="d-flex justify-content-between">
                                                            <a href="view-categories.php"
                                                                class="btn btn-outline-secondary">Cancel</a>
                                                            <button type="submit" name="update_category"
                                                                class="btn btn-primary">
                                                                Update Category
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>