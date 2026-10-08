<?php
include "db-conn.php";

// Check admin authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Helper to extract youtube ID
function extract_yt_id($url) {
    if (empty($url)) return null;
    if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
        return $matches[1];
    }
    return null;
}

// --- Handle AJAX Requests (POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $is_ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

    // Helper function to send JSON response and exit
    function sendJsonResponse($status, $message, $extraData = []) {
        echo json_encode(array_merge(['status' => $status, 'message' => $message], $extraData));
        exit();
    }

    // Handle Add Testimonial
    if (isset($_POST['add-testimonial'])) {
        if (empty($_POST['client_name']) || empty($_POST['testimonial_text']) || empty($_POST['rating'])) {
            if ($is_ajax) sendJsonResponse('error', 'Please fill in Client Name, Testimonial Text, and Rating.');
            $_SESSION['error'] = 'Please fill in Client Name, Testimonial Text, and Rating.';
        } else {
            $client_name = mysqli_real_escape_string($conn, trim($_POST['client_name']));
            $client_title = mysqli_real_escape_string($conn, trim($_POST['client_title'] ?? ''));
            $client_company = mysqli_real_escape_string($conn, trim($_POST['client_company'] ?? ''));
            $testimonial_text = mysqli_real_escape_string($conn, trim($_POST['testimonial_text']));
            $rating = intval($_POST['rating'] ?? 5);
            $review_source = mysqli_real_escape_string($conn, trim($_POST['review_source'] ?? 'google'));
            $google_review_url = mysqli_real_escape_string($conn, trim($_POST['google_review_url'] ?? ''));
            $video_url = mysqli_real_escape_string($conn, trim($_POST['video_url'] ?? ''));
            $youtube_video_id = extract_yt_id($video_url);
            $project_name = mysqli_real_escape_string($conn, trim($_POST['project_name'] ?? ''));
            $project_date = !empty($_POST['project_date']) ? mysqli_real_escape_string($conn, trim($_POST['project_date'])) : null;
            $featured = isset($_POST['featured']) ? 1 : 0;
            $display_order = intval($_POST['display_order'] ?? 0);

            if ($rating < 1 || $rating > 5) $rating = 5;

            $upload_dir = '../uploads/testimonials/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Handle client photo
            $client_photo = '';
            if (isset($_FILES['client_photo']) && $_FILES['client_photo']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['client_photo']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $file_name = 'client_' . time() . '_' . uniqid() . '.' . $ext;
                    if (move_uploaded_file($_FILES['client_photo']['tmp_name'], $upload_dir . $file_name)) {
                        $client_photo = $file_name;
                    }
                }
            }

            // Handle video thumbnail
            $video_thumbnail = '';
            if (isset($_FILES['video_thumbnail']) && $_FILES['video_thumbnail']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['video_thumbnail']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $file_name = 'video_thumb_' . time() . '_' . uniqid() . '.' . $ext;
                    if (move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $upload_dir . $file_name)) {
                        $video_thumbnail = $file_name;
                    }
                }
            }

            $stmt = $conn->prepare("INSERT INTO testimonials (
                client_name, client_title, client_company, client_photo, testimonial_text,
                rating, review_source, google_review_url, video_url, video_thumbnail, youtube_video_id,
                project_name, project_date, featured, display_order, created_at, updated_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

            $stmt->bind_param(
                "sssssisssssssii",
                $client_name,
                $client_title,
                $client_company,
                $client_photo,
                $testimonial_text,
                $rating,
                $review_source,
                $google_review_url,
                $video_url,
                $video_thumbnail,
                $youtube_video_id,
                $project_name,
                $project_date,
                $featured,
                $display_order
            );

            if ($stmt->execute()) {
                $new_id = $stmt->insert_id;
                if ($is_ajax) {
                    sendJsonResponse('success', 'Testimonial added successfully!', ['testimonial_id' => $new_id]);
                } else {
                    $_SESSION['message'] = 'Testimonial added successfully!';
                    header("Location: view-testimonials.php");
                    exit();
                }
            } else {
                if ($is_ajax) sendJsonResponse('error', 'Database error: ' . $conn->error);
                $_SESSION['error'] = 'Database error: ' . $conn->error;
            }
        }
    }

    // Handle Update Testimonial
    if (isset($_POST['update-testimonial']) && isset($_POST['testimonial_id'])) {
        $testimonial_id = intval($_POST['testimonial_id']);

        if (empty($_POST['client_name']) || empty($_POST['testimonial_text']) || empty($_POST['rating'])) {
            if ($is_ajax) sendJsonResponse('error', 'Please fill in Client Name, Testimonial Text, and Rating.');
            $_SESSION['error'] = 'Please fill in Client Name, Testimonial Text, and Rating.';
        } else {
            $client_name = mysqli_real_escape_string($conn, trim($_POST['client_name']));
            $client_title = mysqli_real_escape_string($conn, trim($_POST['client_title'] ?? ''));
            $client_company = mysqli_real_escape_string($conn, trim($_POST['client_company'] ?? ''));
            $testimonial_text = mysqli_real_escape_string($conn, trim($_POST['testimonial_text']));
            $rating = intval($_POST['rating'] ?? 5);
            $review_source = mysqli_real_escape_string($conn, trim($_POST['review_source'] ?? 'google'));
            $google_review_url = mysqli_real_escape_string($conn, trim($_POST['google_review_url'] ?? ''));
            $video_url = mysqli_real_escape_string($conn, trim($_POST['video_url'] ?? ''));
            $youtube_video_id = extract_yt_id($video_url);
            $project_name = mysqli_real_escape_string($conn, trim($_POST['project_name'] ?? ''));
            $project_date = !empty($_POST['project_date']) ? mysqli_real_escape_string($conn, trim($_POST['project_date'])) : null;
            $featured = isset($_POST['featured']) ? 1 : 0;
            $display_order = intval($_POST['display_order'] ?? 0);

            if ($rating < 1 || $rating > 5) $rating = 5;

            // Fetch existing
            $stmt = $conn->prepare("SELECT client_photo, video_thumbnail FROM testimonials WHERE id = ?");
            $stmt->bind_param("i", $testimonial_id);
            $stmt->execute();
            $existing = $stmt->get_result()->fetch_assoc();
            $stmt->close();

            $client_photo = $existing['client_photo'] ?? '';
            $video_thumbnail = $existing['video_thumbnail'] ?? '';

            $upload_dir = '../uploads/testimonials/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            // Handle client photo
            if (isset($_FILES['client_photo']) && $_FILES['client_photo']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['client_photo']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $file_name = 'client_' . time() . '_' . uniqid() . '.' . $ext;
                    if (move_uploaded_file($_FILES['client_photo']['tmp_name'], $upload_dir . $file_name)) {
                        if (!empty($client_photo) && file_exists($upload_dir . $client_photo)) {
                            @unlink($upload_dir . $client_photo);
                        }
                        $client_photo = $file_name;
                    }
                }
            }

            // Handle video thumbnail
            if (isset($_FILES['video_thumbnail']) && $_FILES['video_thumbnail']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['video_thumbnail']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $file_name = 'video_thumb_' . time() . '_' . uniqid() . '.' . $ext;
                    if (move_uploaded_file($_FILES['video_thumbnail']['tmp_name'], $upload_dir . $file_name)) {
                        if (!empty($video_thumbnail) && file_exists($upload_dir . $video_thumbnail)) {
                            @unlink($upload_dir . $video_thumbnail);
                        }
                        $video_thumbnail = $file_name;
                    }
                }
            }

            $stmt = $conn->prepare("UPDATE testimonials SET
                client_name = ?, client_title = ?, client_company = ?, client_photo = ?, testimonial_text = ?,
                rating = ?, review_source = ?, google_review_url = ?, video_url = ?, video_thumbnail = ?, youtube_video_id = ?,
                project_name = ?, project_date = ?, featured = ?, display_order = ?, updated_at = NOW()
                WHERE id = ?");

            $stmt->bind_param(
                "sssssisssssssiii",
                $client_name,
                $client_title,
                $client_company,
                $client_photo,
                $testimonial_text,
                $rating,
                $review_source,
                $google_review_url,
                $video_url,
                $video_thumbnail,
                $youtube_video_id,
                $project_name,
                $project_date,
                $featured,
                $display_order,
                $testimonial_id
            );

            if ($stmt->execute()) {
                if ($is_ajax) {
                    sendJsonResponse('success', 'Testimonial updated successfully!');
                } else {
                    $_SESSION['message'] = 'Testimonial updated successfully!';
                    header("Location: view-testimonials.php");
                    exit();
                }
            } else {
                if ($is_ajax) sendJsonResponse('error', 'Database error: ' . $conn->error);
                $_SESSION['error'] = 'Database error: ' . $conn->error;
            }
        }
    }
}

// Fetch testimonial for editing if edit param is present
$testimonial = null;
$is_edit = false;
if (isset($_GET['edit'])) {
    $testimonial_id = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM testimonials WHERE id = ?");
    $stmt->bind_param("i", $testimonial_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $testimonial = $result->fetch_assoc();
    $stmt->close();
    if ($testimonial) {
        $is_edit = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title><?= $is_edit ? 'Edit Testimonial #' . $testimonial['id'] : 'Add New Testimonial' ?> | Admin Panel</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <?php include "links.php"; ?>

    <style>
        :root {
            --primary-color: #104041;
            --primary-accent: #1a6b6d;
            --google-blue: #4285F4;
            --video-red: #FF0000;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
        }

        .testimonial-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.06);
            padding: 2.2rem;
            margin-bottom: 2rem;
            border: 1px solid #eef2f5;
        }

        .source-selector-card {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.25s ease;
            text-align: center;
            height: 100%;
            background: #fcfdfe;
        }
        .source-selector-card:hover {
            border-color: #cbd5e1;
            transform: translateY(-2px);
        }
        .source-selector-card.active {
            border-color: var(--primary-color);
            background: rgba(16, 64, 65, 0.05);
            box-shadow: 0 4px 12px rgba(16, 64, 65, 0.12);
        }
        .source-selector-card.active.google-type {
            border-color: var(--google-blue);
            background: rgba(66, 133, 244, 0.06);
        }
        .source-selector-card.active.video-type {
            border-color: var(--video-red);
            background: rgba(255, 0, 0, 0.06);
        }

        .section-badge-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 18px;
            padding-bottom: 8px;
            border-bottom: 2px solid #f1f5f9;
        }

        .form-label {
            font-weight: 600;
            font-size: 13.5px;
            color: #2d3748;
            margin-bottom: 0.4rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.7rem 1rem;
            border: 1px solid #cbd5e1;
            font-size: 14px;
            transition: all 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(16, 64, 65, 0.15);
        }

        .btn-submit {
            background: linear-gradient(135deg, #104041, #1a6b6d);
            border: none;
            padding: 0.8rem 2.5rem;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.3px;
            transition: all 0.3s;
            color: white;
            font-size: 15px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #1a6b6d, #104041);
            transform: translateY(-2px);
            color: white;
            box-shadow: 0 6px 16px rgba(16, 64, 65, 0.25);
        }

        .rating-stars {
            display: flex;
            gap: 8px;
            margin-top: 5px;
        }

        .rating-stars i {
            color: #cbd5e1;
            cursor: pointer;
            transition: color 0.2s, transform 0.15s;
            font-size: 1.6rem;
        }

        .rating-stars i:hover {
            transform: scale(1.15);
        }

        .rating-stars i.active {
            color: #ffb703;
        }

        .featured-toggle {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }

        .featured-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .featured-slider {
            position: absolute;
            cursor: pointer;
            top: 0; left: 0; right: 0; bottom: 0;
            background-color: #cbd5e1;
            transition: .3s;
            border-radius: 24px;
        }

        .featured-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .3s;
            border-radius: 50%;
        }

        input:checked + .featured-slider {
            background-color: var(--primary-color);
        }

        input:checked + .featured-slider:before {
            transform: translateX(24px);
        }

        .video-preview-box {
            background: #0f172a;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            padding-top: 56.25%; /* 16:9 */
            display: none;
            margin-top: 15px;
        }

        .video-preview-box iframe {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            border: 0;
        }

        .notification-toast {
            position: fixed;
            top: 25px;
            right: 25px;
            z-index: 99999;
            min-width: 320px;
            padding: 14px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            opacity: 0;
            transform: translateY(-20px);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        .notification-toast.show {
            opacity: 1;
            transform: translateY(0);
        }
        .notification-toast.success { background: #10b981; }
        .notification-toast.error { background: #ef4444; }
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
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h2 class="m-0"><?= $is_edit ? '<i class="fas fa-edit me-2"></i>Edit' : '<i class="fas fa-plus-circle me-2"></i>Add New' ?> Testimonial & Review</h2>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="view-testimonials.php" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-list me-1"></i> View All Testimonials
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="white_card_body">
                                <div class="testimonial-card">

                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>

                                    <form id="testimonialForm" action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="testimonial_id" value="<?= htmlspecialchars($testimonial['id'] ?? '') ?>">

                                        <!-- Step 1: Select Review Source / Type -->
                                        <div class="section-badge-title">
                                            <i class="fas fa-shield-alt text-primary"></i> 1. Review Source & Type
                                        </div>

                                        <?php 
                                        $current_source = $testimonial['review_source'] ?? 'google';
                                        if (empty($current_source) && !empty($testimonial['video_url'])) {
                                            $current_source = 'video';
                                        }
                                        ?>
                                        <input type="hidden" name="review_source" id="reviewSourceInput" value="<?= htmlspecialchars($current_source) ?>">

                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="source-selector-card <?= $current_source == 'google' ? 'active google-type' : '' ?>" onclick="selectSource('google')">
                                                    <i class="fab fa-google fa-2x text-primary mb-2"></i>
                                                    <h6 class="mb-1 fw-bold">Google Review</h6>
                                                    <small class="text-muted d-block">Verified Google Business profile review</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="source-selector-card <?= $current_source == 'video' ? 'active video-type' : '' ?>" onclick="selectSource('video')">
                                                    <i class="fab fa-youtube fa-2x text-danger mb-2"></i>
                                                    <h6 class="mb-1 fw-bold">Video Testimonial</h6>
                                                    <small class="text-muted d-block">YouTube, Loom, or Vimeo video review</small>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="source-selector-card <?= $current_source == 'direct' ? 'active' : '' ?>" onclick="selectSource('direct')">
                                                    <i class="fas fa-user-check fa-2x text-success mb-2"></i>
                                                    <h6 class="mb-1 fw-bold">Direct Feedback</h6>
                                                    <small class="text-muted d-block">Client case study or WhatsApp message</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Video specific settings (if video selected) -->
                                        <div id="videoSettingsBlock" class="p-3 mb-4 rounded-3" style="background: #fff5f5; border: 1px solid #fed7d7; <?= $current_source == 'video' ? '' : 'display: none;' ?>">
                                            <div class="fw-bold text-danger mb-2">
                                                <i class="fab fa-youtube me-1"></i> Video Testimonial Settings
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-8">
                                                    <label class="form-label" for="video_url">Video Embed / Share URL *</label>
                                                    <input type="url" class="form-control" name="video_url" id="video_url"
                                                        placeholder="e.g. https://www.youtube.com/watch?v=XXXX or https://www.loom.com/share/XXXX"
                                                        value="<?= htmlspecialchars($testimonial['video_url'] ?? '') ?>" />
                                                    <small class="text-muted">Supports YouTube (Watch/Shorts), Loom, and Vimeo links.</small>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" for="video_thumbnail">Custom Video Poster (Optional)</label>
                                                    <input type="file" class="form-control" name="video_thumbnail" id="video_thumbnail" accept="image/*" />
                                                    <small class="text-muted">Auto-uses YouTube HQ thumbnail if left blank.</small>
                                                </div>
                                            </div>

                                            <div class="video-preview-box mt-3" id="videoPreviewBox">
                                                <iframe id="videoPreviewIframe" src="" allowfullscreen allow="autoplay; encrypted-media"></iframe>
                                            </div>
                                        </div>

                                        <!-- Google review settings (if google selected) -->
                                        <div id="googleSettingsBlock" class="p-3 mb-4 rounded-3" style="background: #eff6ff; border: 1px solid #bfdbfe; <?= $current_source == 'google' ? '' : 'display: none;' ?>">
                                            <div class="fw-bold text-primary mb-2">
                                                <i class="fab fa-google me-1"></i> Google Business Review Link
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-12">
                                                    <label class="form-label" for="google_review_url">Google Review / Maps Link (Optional)</label>
                                                    <input type="url" class="form-control" name="google_review_url" id="google_review_url"
                                                        placeholder="e.g. https://maps.app.goo.gl/... or leave empty to use default Google business link"
                                                        value="<?= htmlspecialchars($testimonial['google_review_url'] ?? '') ?>" />
                                                    <small class="text-muted">Link directly to the client's review on Google Maps so visitors can verify it.</small>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Step 2: Client Details -->
                                        <div class="section-badge-title">
                                            <i class="fas fa-user text-primary"></i> 2. Client & Project Details
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_name">Client / Reviewer Name *</label>
                                                <input type="text" class="form-control" name="client_name" id="client_name"
                                                    placeholder="e.g. Amit Sharma"
                                                    value="<?= htmlspecialchars($testimonial['client_name'] ?? ''); ?>"
                                                    required />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_title">Client Title / Designation</label>
                                                <input type="text" class="form-control" name="client_title" id="client_title"
                                                    placeholder="e.g. Founder & CEO, Marketing Head"
                                                    value="<?= htmlspecialchars($testimonial['client_title'] ?? ''); ?>" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_company">Company / Brand Name</label>
                                                <input type="text" class="form-control" name="client_company" id="client_company"
                                                    placeholder="e.g. TechPulse Solutions"
                                                    value="<?= htmlspecialchars($testimonial['client_company'] ?? ''); ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="project_name">Project / Service Delivered</label>
                                                <input type="text" class="form-control" name="project_name" id="project_name"
                                                    placeholder="e.g. E-Commerce Website & SEO Growth"
                                                    value="<?= htmlspecialchars($testimonial['project_name'] ?? ''); ?>" />
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="project_date">Review Date</label>
                                                <input type="date" class="form-control" name="project_date" id="project_date"
                                                    value="<?= htmlspecialchars($testimonial['project_date'] ?? date('Y-m-d')); ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Star Rating *</label>
                                                <input type="hidden" name="rating" id="ratingValue"
                                                    value="<?= htmlspecialchars($testimonial['rating'] ?? '5'); ?>" required>
                                                <div class="rating-stars" id="ratingStars">
                                                    <i class="fas fa-star" data-value="1"></i>
                                                    <i class="fas fa-star" data-value="2"></i>
                                                    <i class="fas fa-star" data-value="3"></i>
                                                    <i class="fas fa-star" data-value="4"></i>
                                                    <i class="fas fa-star" data-value="5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Step 3: Testimonial Text -->
                                        <div class="section-badge-title">
                                            <i class="fas fa-quote-left text-primary"></i> 3. Testimonial Content
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="testimonial_text">Review Text / Video Summary *</label>
                                                <textarea class="form-control" name="testimonial_text" id="testimonial_text"
                                                    rows="4" placeholder="Write what the client said about NikhilWorks..." required><?= htmlspecialchars($testimonial['testimonial_text'] ?? ''); ?></textarea>
                                            </div>
                                        </div>

                                        <!-- Step 4: Media & Display Settings -->
                                        <div class="section-badge-title">
                                            <i class="fas fa-cog text-primary"></i> 4. Media & Display Settings
                                        </div>

                                        <div class="row mb-4 align-items-center">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="clientPhoto">Client Photo / Avatar</label>
                                                <input type="file" class="form-control" name="client_photo" id="clientPhoto" accept="image/*" />
                                                <small class="text-muted">JPG, PNG, WebP up to 5MB. Leave empty to use initial avatar.</small>
                                                <?php if (!empty($testimonial['client_photo'])): ?>
                                                    <div class="mt-2 d-flex align-items-center gap-2">
                                                        <img src="../uploads/testimonials/<?= htmlspecialchars($testimonial['client_photo']) ?>" 
                                                             style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid #e2e8f0;">
                                                        <span class="badge bg-light text-dark border">Current Photo</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-3 col-6 mb-3">
                                                <label class="form-label">Featured Review</label>
                                                <div class="d-flex align-items-center mt-1">
                                                    <label class="featured-toggle me-2">
                                                        <input type="checkbox" name="featured" <?= (!empty($testimonial['featured'])) ? 'checked' : ''; ?>>
                                                        <span class="featured-slider"></span>
                                                    </label>
                                                    <span class="fw-semibold" style="font-size: 13px;">Highlight</span>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-6 mb-3">
                                                <label class="form-label" for="display_order">Display Order</label>
                                                <input type="number" class="form-control" name="display_order" id="display_order"
                                                    value="<?= htmlspecialchars($testimonial['display_order'] ?? '0'); ?>" />
                                                <small class="text-muted">0 = Top Priority</small>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                            <a href="view-testimonials.php" class="btn btn-outline-secondary px-4">
                                                <i class="fas fa-arrow-left me-1"></i> Back
                                            </a>
                                            <button type="submit" class="btn btn-submit" name="<?= $is_edit ? 'update-testimonial' : 'add-testimonial'; ?>" id="submitBtn">
                                                <i class="fas fa-save me-1"></i> <?= $is_edit ? 'Update Testimonial' : 'Publish Testimonial' ?>
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

        <?php include "footer.php"; ?>
    </section>

    <!-- Notification Toast -->
    <div id="notificationToast" class="notification-toast"></div>

    <script>
        const form = document.getElementById('testimonialForm');
        const submitBtn = document.getElementById('submitBtn');
        const ratingStars = document.querySelectorAll('#ratingStars i');
        const ratingValueInput = document.getElementById('ratingValue');
        const reviewSourceInput = document.getElementById('reviewSourceInput');
        const videoSettingsBlock = document.getElementById('videoSettingsBlock');
        const googleSettingsBlock = document.getElementById('googleSettingsBlock');
        const videoUrlInput = document.getElementById('video_url');
        const videoPreviewBox = document.getElementById('videoPreviewBox');
        const videoPreviewIframe = document.getElementById('videoPreviewIframe');

        // Review Source selector
        function selectSource(source) {
            reviewSourceInput.value = source;
            document.querySelectorAll('.source-selector-card').forEach(c => {
                c.classList.remove('active', 'google-type', 'video-type');
            });
            if (source === 'google') {
                event.currentTarget.classList.add('active', 'google-type');
                googleSettingsBlock.style.display = 'block';
                videoSettingsBlock.style.display = 'none';
            } else if (source === 'video') {
                event.currentTarget.classList.add('active', 'video-type');
                googleSettingsBlock.style.display = 'none';
                videoSettingsBlock.style.display = 'block';
                updateVideoPreview();
            } else {
                event.currentTarget.classList.add('active');
                googleSettingsBlock.style.display = 'none';
                videoSettingsBlock.style.display = 'none';
            }
        }

        // Parse video embed link
        function getEmbedUrl(url) {
            if (!url) return '';
            // YouTube
            const ytMatch = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/|youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i);
            if (ytMatch && ytMatch[1]) {
                return 'https://www.youtube.com/embed/' + ytMatch[1];
            }
            // Loom
            const loomMatch = url.match(/loom\.com\/(?:share|embed)\/([a-zA-Z0-9]+)/i);
            if (loomMatch && loomMatch[1]) {
                return 'https://www.loom.com/embed/' + loomMatch[1];
            }
            // Vimeo
            const vimeoMatch = url.match(/vimeo\.com\/(?:video\/)?([0-9]+)/i);
            if (vimeoMatch && vimeoMatch[1]) {
                return 'https://player.vimeo.com/video/' + vimeoMatch[1];
            }
            return url;
        }

        function updateVideoPreview() {
            const val = videoUrlInput ? videoUrlInput.value.trim() : '';
            const embed = getEmbedUrl(val);
            if (embed && (embed.includes('youtube.com') || embed.includes('loom.com') || embed.includes('vimeo.com'))) {
                videoPreviewIframe.src = embed;
                videoPreviewBox.style.display = 'block';
            } else {
                videoPreviewBox.style.display = 'none';
                videoPreviewIframe.src = '';
            }
        }

        if (videoUrlInput) {
            videoUrlInput.addEventListener('input', updateVideoPreview);
            // Run initially if URL exists
            if (videoUrlInput.value) {
                updateVideoPreview();
            }
        }

        // Rating Stars
        function initRatingStars() {
            const currentRating = parseInt(ratingValueInput.value) || 5;
            ratingStars.forEach(star => {
                const value = parseInt(star.getAttribute('data-value'));
                if (value <= currentRating) {
                    star.classList.add('active');
                } else {
                    star.classList.remove('active');
                }
                star.addEventListener('click', function() {
                    const newRating = parseInt(this.getAttribute('data-value'));
                    ratingValueInput.value = newRating;
                    ratingStars.forEach(s => {
                        const val = parseInt(s.getAttribute('data-value'));
                        if (val <= newRating) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
                        }
                    });
                });
            });
        }
        initRatingStars();

        // Notification Toast
        function showNotification(message, type = 'success') {
            const toast = document.getElementById('notificationToast');
            toast.textContent = message;
            toast.className = `notification-toast ${type} show`;
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Form Submit via AJAX
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const clientName = document.getElementById('client_name').value.trim();
            const testimonialText = document.getElementById('testimonial_text').value.trim();

            if (!clientName || !testimonialText) {
                showNotification('Please fill in Client Name and Testimonial content.', 'error');
                return;
            }

            const isEdit = <?= $is_edit ? 'true' : 'false' ?>;
            const action = isEdit ? 'update-testimonial' : 'add-testimonial';

            const formData = new FormData(form);
            formData.append(action, '1');

            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Saving...';

            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (data.status === 'success') {
                    showNotification(data.message, 'success');
                    setTimeout(() => {
                        window.location.href = 'view-testimonials.php';
                    }, 1200);
                } else {
                    showNotification(data.message || 'Error occurred', 'error');
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnHtml;
                }
            } catch (err) {
                console.error(err);
                // Fallback normal submit if fetch fails
                form.submit();
            }
        });
    </script>
</body>
</html>