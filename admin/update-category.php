<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include database connection
include 'db-conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_category'])) {
    // Get form data
    $cat_id = intval($_POST['cat_id']);
    $cate_name = trim($_POST['cate_name']);
    $slug_url = trim($_POST['slug_url']);
    $status = ($_POST['status'] == 'Active' || $_POST['status'] == '1') ? 1 : 0;

    // Fetch the existing category to get the old image
    $stmt = $conn->prepare("SELECT image FROM categories WHERE id = ?");
    $stmt->bind_param("i", $cat_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $category = $result->fetch_assoc();

    if (!$category) {
        $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Category not found."];
        header("Location: view-categories.php");
        exit();
    }

    $image_name = $category['image']; // Keep old image by default

    // Image upload handling
    if (!empty($_FILES['imageUpload']['name'])) {
        $upload_dir = "uploads/category/";
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $ext = strtolower(pathinfo($_FILES["imageUpload"]["name"], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
        if (!in_array($ext, $allowed)) {
            $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Invalid image format. Allowed: JPG, PNG, WEBP, SVG."];
            header("Location: view-categories.php");
            exit();
        }

        $image_name = time() . "_" . preg_replace('/[^a-zA-Z0-9_\.-]/', '', basename($_FILES["imageUpload"]["name"]));
        $target_file = $upload_dir . $image_name;

        // Move uploaded file
        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
            // Delete old image if it exists
            if (!empty($category['image']) && file_exists($upload_dir . $category['image'])) {
                @unlink($upload_dir . $category['image']);
            }
        } else {
            $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Image upload failed."];
            header("Location: view-categories.php");
            exit();
        }
    }

    // Update query
    $update_query = "UPDATE categories SET categories = ?, slug_url = ?, status = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssisi", $cate_name, $slug_url, $status, $image_name, $cat_id);

    if ($stmt->execute()) {
        try {
            require_once dirname(__DIR__) . '/util/sitemap_generator.php';
            generate_all_sitemaps($conn, true);
        } catch (\Throwable $t) {}
        $_SESSION['flash_msg'] = ['type' => 'success', 'text' => "Category \"$cate_name\" updated successfully!"];
    } else {
        $_SESSION['flash_msg'] = ['type' => 'danger', 'text' => "Error updating category: " . $stmt->error];
    }

    $stmt->close();
    $conn->close();
    header("Location: view-categories.php");
    exit();
} else {
    header("Location: view-categories.php");
    exit();
}
?>