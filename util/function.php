<?php
include_once "./config/connect.php";

// get category 
function get_category() {
    global $conn;

    $sql = "SELECT * FROM `categories` WHERE status = 1";
    $res = mysqli_query($conn, $sql);

    $categories = [];

    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $categories[] = $row;
        }
    }

    return $categories;
}

// get abouts 
function fetch_about()
{
    global $conn;

    $sql = "SELECT * FROM `about_us`";
    $sql_query = $conn->query($sql);

    if ($sql_query && $sql_query->num_rows > 0) {
        $result = $sql_query->fetch_assoc();

        return [
            'title' => $result['title'] ?? '',
            'content' => $result['content'] ?? '',
            'image' => $result['image_url'] ?? ''
        ];
    } else {
        return [
            'title' => '',
            'content' => 'No about us record found.',
            'image' => ''
        ];
    }
}

// logo 
function get_logo()
{
    global $conn;

    $sql_logo = "SELECT * FROM `logos` order by id desc limit 1";
    $re_logo = mysqli_query($conn, $sql_logo);
    if (mysqli_num_rows($re_logo)) {
        $row = mysqli_fetch_assoc($re_logo);

        return "admin/uploads/" . $row['logo_path'];
    }

    // return "assets/img/logo/logo1.png";
}

// fetch banners 
function fetch_banner()
{
    global $conn;

    $banners = [];
    $sql_banner = "SELECT * FROM `banners` WHERE status = 1";
    $res_banner = mysqli_query($conn, $sql_banner);

    if ($res_banner) {
        while ($row_banner = mysqli_fetch_assoc($res_banner)) {
            $banners[] = $row_banner;
        }
    }

    return $banners;
}


// get contact us page 
function contact_us()
{
    global $conn;

    if (!$conn || !$conn->ping()) {
        // Connection is not available or already closed
        return null;
    }

    $query = "SELECT * FROM `contacts` LIMIT 1";
    $sql_query = $conn->query($query);

    if ($sql_query && $sql_query->num_rows > 0) {
        $result = $sql_query->fetch_assoc();

        return [
            'phone' => $result['phone'] ?? '',
            'wp_number' => $result['wp_number'] ?? '',
            'telephone' => $result['telephone'] ?? '',
            'address' => $result['address'] ?? '',
            'address2' => $result['address2'] ?? '',
            'email' => $result['email'] ?? '',
            'contact_email' => $result['contact_email'] ?? '',
            'facebook' => $result['facebook'] ?? '',
            'instagram' => $result['instagram'] ?? '',
            'twitter' => $result['twitter'] ?? '',
            'linkdin' => $result['linkdin'] ?? '',
            'map' => $result['map'] ?? ''
        ];
    }

    return null; // Or return [] if you prefer
}


// get gallery images 
function get_gallery()
{
    global $conn;

    $sql = "SELECT * FROM `gallery`";
    $sql_query = $conn->query($sql);

    $images = [];

    if ($sql_query && $sql_query->num_rows > 0) {
        while ($result = $sql_query->fetch_assoc()) {
            $images[] = "admin/" . ($result['image_path'] ?? '');
        }
    }

    return $images; // returns an empty array if no records
}


// get products for home page
function get_services(): array
{
    global $conn;

    $sql_pro = "SELECT * FROM `products` WHERE status = 1";
    $res_pro = mysqli_query($conn, $sql_pro);

    $products = [];

    if ($res_pro) {
        while ($row_pro = mysqli_fetch_assoc($res_pro)) {
            $products[] = $row_pro;
        }
    }

    return $products; // returns an array of 6 latest active products
}

function get_sub_category($limit)
{
    global $conn;
    $sub_category = [];

    // Use prepared statement to prevent SQL injection
    $sql = "SELECT * FROM `sub_categories` WHERE `parent_id` = 56019 limit $limit"; // Assuming it's a boolean/bit field

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Log error or handle it appropriately
        error_log("Database error: " . mysqli_error($conn));
        return $sub_category; // Return empty array on error
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $sub_category[] = $row;
    }

    return $sub_category;
}

// fetching trending product 
function get_trending_product(){
    global $conn;

    $sql = "SELECT * FROM `products` where `trending` = 1 order by id desc limit 8";
    $res = mysqli_query($conn, $sql);

    
    if (!$res) {
        header("Location: 500.php"); 
                exit(); 
    }

    $trendingProducts = []; // ✅ Initialize the array before using
    while ($row = mysqli_fetch_assoc($res)) {
        $trendingProducts[] = $row;
    }

    return $trendingProducts; // ✅ Return the result
}

// blog fetch for home page 
function get_blog_home()
{
    global $conn;

    $sql_blog = "SELECT * FROM `blogs` limit 3";
    $res_blog = mysqli_query($conn, $sql_blog);

    if (!$res_blog) {
        header("Location: 500.php"); // ✅ Remove spaces around colon
        exit(); // ✅ Always add exit after header redirect
    }

    $blog = []; // ✅ Initialize the array before using
    while ($row = mysqli_fetch_assoc($res_blog)) {
        $blog[] = $row;
    }

    return $blog; // ✅ Return the result
}


// blog fetch for blog page 
function get_blog($limit)
{
    global $conn;

    $sql_blog = "SELECT * FROM `blogs` limit $limit ";
    $res_blog = mysqli_query($conn, $sql_blog);

    if (!$res_blog) {
        header("Location: 500.php"); // ✅ Remove spaces around colon
        exit(); // ✅ Always add exit after header redirect
    }

    $blog = []; // ✅ Initialize the array before using
    while ($row = mysqli_fetch_assoc($res_blog)) {
        $blog[] = $row;
    }

    return $blog; // ✅ Return the result
}

// blog details fetch 
function fetch_blog_detail($slug)
{
    global $conn;
    global $site;

    $blog_slug = mysqli_real_escape_string($conn, $slug);
    // die($slug);

    $sql_blog = "SELECT * FROM `blogs` WHERE `slug_url` = '$blog_slug' LIMIT 1";
    $res_blog = mysqli_query($conn, $sql_blog);

    if (!$res_blog) {
        header("Location: 500.php");
        exit();
    }

    $blog_det = mysqli_fetch_assoc($res_blog);

    if (!$blog_det) {
        header("Location: ".$site."404.php");
        exit();
    }

    return $blog_det;
}

// portfolio function 
function get_portfolio(){
    global $conn;

    // Corrected SQL query - LIMIT comes after WHERE clause
    $sql_foot = "SELECT * FROM `products` WHERE `pro_cate` = '30797' LIMIT 12";
    $res_foot = mysqli_query($conn, $sql_foot);

    $product = [];

    if (!$res_foot) {
        // More detailed error information for debugging
        die("Query failed: " . mysqli_error($conn));
    }
    
    while ($row = mysqli_fetch_assoc($res_foot)) {
        $product[] = $row;
    }
    
    return $product;
}
// product page fetch product 
function fetch_product_page()
{
    global $conn;

    if (!isset($_GET['alias'])) {
        header("Location: index.php");
        exit();
    }

    $alias = mysqli_real_escape_string($conn, $_GET['alias']);

    // Get subcategory information
    $sql1 = "SELECT * FROM `sub_categories` WHERE `slug_url` = '$alias'";
    $res = mysqli_query($conn, $sql1);

    if (!$res || mysqli_num_rows($res) == 0) {
        header("Location: 404.php");
        exit();
    }

    $sub_cat = mysqli_fetch_assoc($res);
    $pro_sub_cate = $sub_cat['cate_id'];
    $_SESSION['sub_cat_name'] = $sub_cat['categories'];
    $meta_title = $sub_cat['meta_title'];
    $meta_key = $sub_cat['meta_key'];
    $meta_desc = $sub_cat['meta_desc'];

}

function fetch_product_details($cate_id)
{
    global $conn;

    // if (!isset($_GET['alias']) || empty($_GET['alias'])) {
    //     die("Invalid product URL. Alias parameter is missing.");
    // }

    // $alias = mysqli_real_escape_string($conn, $_GET['alias']);

    $sql = "SELECT * FROM `products` WHERE `pro_sub_cate` = '$cate_id' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        return [
            'pro_name' => $row['pro_name'] ?? '',
            'short_desc' => $row['short_desc'] ?? '',
            'description' => $row['description'] ?? '',
            'pro_sub_cate' => $row['pro_sub_cate'] ?? '',
            'pro_img' => $row['pro_img'] ?? 'image/product-not-found.gif',
            'slug_url' => $row['slug_url'] ?? '',
            'mrp' => $row['mrp']?? '00',
            'selling_price' => $row['selling_price']?? '00',
            'meta_title' => $row['meta_title'] ?? '',
            'meta_desc' => $row['meta_desc'] ?? '',
            'meta_key' => $row['meta_key'] ?? ''
        ];
    } else {
        // If product not found, return default values
        return [
            'pro_name' => 'No Product Available',
            'short_desc' => '',
            'description' => '',
            'pro_sub_cate' => '',
            'pro_img' => 'image/product-not-found.gif',
            'slug_url' => '',
            'meta_title' => 'Product Not Found',
            'meta_desc' => '',
            'meta_key' => ''
        ];
    }
}


// footer product 
function footer_product()
{
    global $conn;

    $sql_foot = "SELECT * FROM `products` limit 8";
    $res_foot = mysqli_query($conn, $sql_foot);

    $product = [];

    if (!$res_foot) {
        header('Location: 500.php');
    }
    while ($row = mysqli_fetch_assoc($res_foot)) {
        if (!$row) {
            header("Location: 404.php");
        } else {
            $product[] = $row;
        }
    }
    return $product;
}

function testimonial(){
    global $conn;

    $sql_test = "SELECT * FROM `testimonials` ";
    $res_test = mysqli_query($conn, $sql_test);

    $test = [];

    if(!$res_test){
        header('Location: 500.php');
    }else{
        while($row = mysqli_fetch_assoc($res_test)){
            if(!$row){
                header('Location: 404.php');
            }else{
                $test[] = $row;
            }
        }
    }
    return $test;
}
?>