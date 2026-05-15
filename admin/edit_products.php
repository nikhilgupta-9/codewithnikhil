<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db-conn.php";
include "functions.php";

if (!isset($_GET['edit_product_details'])) {
    die("Product ID is missing from the URL.");
}

$product_id = intval($_GET['edit_product_details']);

// Fetch product details
$sql = "SELECT * FROM products WHERE pro_id = $product_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
} else {
    die("Product not found.");
}

// Fetch categories
$category_query = "SELECT * FROM `categories` ORDER BY id DESC";
$categories = mysqli_query($conn, $category_query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit Product | Admin Panel</title>
    <link rel="icon" href="assets/img/logo.png" type="image/png">
    <?php include "links.php"; ?>
    <style>
        .product-form {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 30px;
        }
        .form-label {
            font-weight: 500;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 6px;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
        }
        .form-control:focus, .form-select:focus {
            border-color: #7367f0;
            box-shadow: 0 0 0 3px rgba(115,103,240,.15);
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px 30px;
        }
        .main-title h2 {
            color: #2c2c2c;
            font-weight: 600;
        }
        .btn-primary {
            background-color: #7367f0;
            border-color: #7367f0;
            padding: 10px 25px;
            border-radius: 6px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
        .btn-primary:hover {
            background-color: #5d50e6;
            border-color: #5d50e6;
        }
        .image-preview {
            max-width: 150px;
            max-height: 150px;
            margin-top: 10px;
            border-radius: 4px;
            border: 1px dashed #ddd;
            padding: 5px;
        }
        .image-thumbnail {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
        }
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
        .status-active {
            background-color: #e8f5e9;
            color: #2e7d32;
        }
        .status-inactive {
            background-color: #ffebee;
            color: #c62828;
        }
        .price-input {
            position: relative;
        }
        .price-input:before {
            content: "₹";
            position: absolute;
            left: 1px;
            top: 1px;
            font-weight: 500;
            color: #495057;
        }
        .price-input input {
            padding-left: 25px;
        }
    </style>
</head>

<body class="crm_body_bg">
    <?php include "header.php"; ?>

    <section class="main_content dashboard_part">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <?php include "top_nav.php"; ?>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="page-header mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <h2 class="mb-0">Edit Product</h2>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="product-form">
                            <form action="update-product.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="pro_id" value="<?= $product['pro_id'] ?>">
                                
                                <div class="row">
                                    <!-- Basic Information -->
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="pro_name" 
                                            value="<?= htmlspecialchars($product['pro_name']) ?>" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Category <span class="text-danger">*</span></label>
                                        <select class="form-select" name="pro_cate" required onchange="get_subcategory(this.value)">
                                            <!-- <option value="">Select Category</option> -->
                                            <?php while ($category = mysqli_fetch_assoc($categories)): ?>
                                                <?php $_SESSION['cate_id'] = $category['cate_id'] ?>
                                                <option value="<?= $category['cate_id'] ?>" <?= ($category['cate_id'] == $product['pro_cate']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars(ucwords($category['categories'])) ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <?php
                                        $cate_id = $_SESSION['cate_id'];
                                        $sql_sub_cat = "SELECT * FROM `sub_categories` where `parent_id` = $cate_id";
                                        $res_sub_cate = mysqli_query($conn, $sql_sub_cat);
                                        ?>
                                        <label class="form-label">Sub Category</label>
                                        <select class="form-select" name="pro_sub_cate" id="subcate_id">
                                            <!-- <option value="">Select Sub Category</option> -->
                                            <?php while ($category = mysqli_fetch_assoc($res_sub_cate)): ?>
                                                <option value="<?= $category['cate_id'] ?>" <?= ($category['cate_id'] == $product['pro_cate']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars(ucwords($category['categories'])) ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Stock <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="stock" 
                                            value="<?= htmlspecialchars($product['stock']) ?>" required>
                                    </div>
                                    
                                    <div class="col-md-3 mb-4">
                                        <label class="form-label">Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="qty" 
                                            value="<?= htmlspecialchars($product['qty']) ?>" required>
                                    </div>
                                    
                                    <!-- Pricing -->
                                    <div class="col-md-3 mb-4 price-input">
                                        <label class="form-label">MRP <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="mrp" 
                                            value="<?= htmlspecialchars($product['mrp']) ?>" required>
                                    </div>
                                    
                                    <div class="col-md-3 mb-4 price-input">
                                        <label class="form-label">Selling Price <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="selling_price" 
                                            value="<?= htmlspecialchars($product['selling_price']) ?>" required>
                                    </div>
                                    
                                    <div class="col-md-3 mb-4 price-input">
                                        <label class="form-label">Wholesale Price</label>
                                        <input type="number" step="0.01" class="form-control" name="whole_sale_selling_price" 
                                            value="<?= htmlspecialchars($product['whole_sale_selling_price']) ?>">
                                    </div>
                                    

                                     <!-- Flags -->
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label text-danger">Make Special Offer</label>
                                        <select class="form-select" name="new_arrival" required>
                                            <option value="0" <?= $product['new_arrival'] == 0 ? 'selected' : '' ?>>No</option>
                                            <option value="1" <?= $product['new_arrival'] == 1 ? 'selected' : '' ?>>Yes</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Trending</label>
                                        <select class="form-select" name="trending" required>
                                            <option value="0" <?= $product['trending'] == 0 ? 'selected' : '' ?>>No</option>
                                            <option value="1" <?= $product['trending'] == 1 ? 'selected' : '' ?>>Yes</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select" name="status" required>
                                            <option value="1" <?= $product['status'] == 1 ? 'selected' : '' ?>>Active</option>
                                            <option value="0" <?= $product['status'] == 0 ? 'selected' : '' ?>>Inactive</option>
                                        </select>
                                    </div>
                                    


                                    <!-- Images -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Product Images</label>
                                        <input type="file" class="form-control" name="pro_img[]" multiple>
                                        
                                        <?php if (!empty($product['pro_img'])): ?>
                                            <div class="mt-3">
                                                <label class="form-label">Current Images:</label>
                                                <div class="d-flex flex-wrap">
                                                    <?php 
                                                    $images = explode(',', $product['pro_img']);
                                                    foreach ($images as $img): 
                                                        if (!empty(trim($img))): ?>
                                                            <div class="position-relative me-2 mb-2">
                                                                <img src="assets/img/uploads/<?= htmlspecialchars(trim($img)) ?>" 
                                                                    class="image-thumbnail">
                                                            </div>
                                                        <?php endif;
                                                    endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Descriptions -->
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="short_desc" id="short_desc" rows="3" ><?= htmlspecialchars($product['short_desc']) ?></textarea>
                                    </div>
                                    
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Long Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="pro_desc" id="pro_desc" rows="5" required><?= htmlspecialchars($product['description']) ?></textarea>
                                    </div>
                                    
                                   
                                    <!-- SEO -->
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" 
                                            value="<?= htmlspecialchars($product['meta_title']) ?>">
                                    </div>
                                    
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" class="form-control" name="meta_key" 
                                            value="<?= htmlspecialchars($product['meta_key']) ?>">
                                    </div>
                                    
                                    <div class="col-md-12 mb-4">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_desc" rows="2"><?= htmlspecialchars($product['meta_desc']) ?></textarea>
                                    </div>
                                    
                                    <!-- Submit -->
                                    <div class="col-12 mt-4">
                                        <button type="submit" name="update-product" class="btn btn-primary me-2">
                                            <i class="fas fa-save me-2"></i> Update Product
                                        </button>
                                        <a href="show-products.php" class="btn btn-outline-secondary">
                                            <i class="fas fa-times me-2"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "footer.php"; ?>

        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('pro_desc');
            CKEDITOR.replace('short_desc');
            
            function get_subcategory(cate_id) {
                $.ajax({
                    url: 'functions.php',
                    method: 'post',
                    data: { cate_id: cate_id },
                    error: function() {
                        alert("Something went wrong");
                    },
                    success: function(data) {
                        $("#subcate_id").html(data);
                    }
                });
            }
        </script>
    </body>
</html>