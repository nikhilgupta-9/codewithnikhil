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

// --- Handle AJAX Requests (POST) ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');

    // Helper function to send JSON response and exit
    function sendJsonResponse($status, $message, $extraData = []) {
        echo json_encode(array_merge(['status' => $status, 'message' => $message], $extraData));
        exit();
    }

    // Handle Add Testimonial
    if (isset($_POST['add-testimonial'])) {
        // Validate required fields
        if (empty($_POST['client_name']) || empty($_POST['client_title']) || empty($_POST['testimonial_text']) || empty($_POST['rating'])) {
            sendJsonResponse('error', 'Please fill in all required fields (Client Name, Title, Testimonial Text, Rating).');
        }

        // Sanitize and validate inputs
        $client_name = mysqli_real_escape_string($conn, trim($_POST['client_name']));
        $client_title = mysqli_real_escape_string($conn, trim($_POST['client_title']));
        $client_company = mysqli_real_escape_string($conn, trim($_POST['client_company'] ?? ''));
        $testimonial_text = mysqli_real_escape_string($conn, trim($_POST['testimonial_text']));
        $rating = intval($_POST['rating']);
        $project_name = mysqli_real_escape_string($conn, trim($_POST['project_name'] ?? ''));
        $project_date = mysqli_real_escape_string($conn, trim($_POST['project_date'] ?? ''));
        $featured = isset($_POST['featured']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);

        if ($rating < 1 || $rating > 5) {
            sendJsonResponse('error', 'Rating must be between 1 and 5.');
        }

        // Handle file upload
        $client_photo = '';
        if (isset($_FILES['client_photo']) && $_FILES['client_photo']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/testimonials/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $_FILES['client_photo']['tmp_name']);
            finfo_close($finfo);
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if (!in_array($mime_type, $allowed_types)) {
                sendJsonResponse('error', 'Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.');
            }

            $file_extension = strtolower(pathinfo($_FILES['client_photo']['name'], PATHINFO_EXTENSION));
            $file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $target_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES['client_photo']['tmp_name'], $target_path)) {
                $client_photo = $file_name;
            } else {
                sendJsonResponse('error', 'Failed to move uploaded file.');
            }
        }

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO testimonials (
            client_name, client_title, client_company, client_photo, testimonial_text,
            rating, project_name, project_date, featured, display_order, created_at, updated_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())");

        $stmt->bind_param(
            "sssssisssi",
            $client_name,
            $client_title,
            $client_company,
            $client_photo,
            $testimonial_text,
            $rating,
            $project_name,
            $project_date,
            $featured,
            $display_order
        );

        if ($stmt->execute()) {
            sendJsonResponse('success', 'Testimonial added successfully!', ['testimonial_id' => $stmt->insert_id]);
        } else {
            sendJsonResponse('error', 'Database error: ' . $conn->error);
        }
    }

    // Handle Update Testimonial
    if (isset($_POST['update-testimonial']) && isset($_POST['testimonial_id'])) {
        $testimonial_id = intval($_POST['testimonial_id']);

        // Validate required fields
        if (empty($_POST['client_name']) || empty($_POST['client_title']) || empty($_POST['testimonial_text']) || empty($_POST['rating'])) {
            sendJsonResponse('error', 'Please fill in all required fields.');
        }

        // Sanitize inputs
        $client_name = mysqli_real_escape_string($conn, trim($_POST['client_name']));
        $client_title = mysqli_real_escape_string($conn, trim($_POST['client_title']));
        $client_company = mysqli_real_escape_string($conn, trim($_POST['client_company'] ?? ''));
        $testimonial_text = mysqli_real_escape_string($conn, trim($_POST['testimonial_text']));
        $rating = intval($_POST['rating']);
        $project_name = mysqli_real_escape_string($conn, trim($_POST['project_name'] ?? ''));
        $project_date = mysqli_real_escape_string($conn, trim($_POST['project_date'] ?? ''));
        $featured = isset($_POST['featured']) ? 1 : 0;
        $display_order = intval($_POST['display_order'] ?? 0);

        if ($rating < 1 || $rating > 5) {
            sendJsonResponse('error', 'Rating must be between 1 and 5.');
        }

        // Fetch existing photo to potentially delete old one
        $stmt = $conn->prepare("SELECT client_photo FROM testimonials WHERE id = ?");
        $stmt->bind_param("i", $testimonial_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $existing = $result->fetch_assoc();
        $old_photo = $existing['client_photo'] ?? '';
        $stmt->close();

        // Handle file upload
        $client_photo = $old_photo; // Default to old photo
        if (isset($_FILES['client_photo']) && $_FILES['client_photo']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = '../uploads/testimonials/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0755, true);
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($finfo, $_FILES['client_photo']['tmp_name']);
            finfo_close($finfo);
            $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

            if (!in_array($mime_type, $allowed_types)) {
                sendJsonResponse('error', 'Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.');
            }

            $file_extension = strtolower(pathinfo($_FILES['client_photo']['name'], PATHINFO_EXTENSION));
            $file_name = time() . '_' . uniqid() . '.' . $file_extension;
            $target_path = $upload_dir . $file_name;

            if (move_uploaded_file($_FILES['client_photo']['tmp_name'], $target_path)) {
                $client_photo = $file_name;
                // Delete old photo if it exists and is different
                if (!empty($old_photo) && file_exists($upload_dir . $old_photo) && $old_photo !== $file_name) {
                    unlink($upload_dir . $old_photo);
                }
            } else {
                sendJsonResponse('error', 'Failed to move uploaded file.');
            }
        }

        // Update database
        $stmt = $conn->prepare("UPDATE testimonials SET
            client_name = ?, client_title = ?, client_company = ?, client_photo = ?, testimonial_text = ?,
            rating = ?, project_name = ?, project_date = ?, featured = ?, display_order = ?, updated_at = NOW()
            WHERE id = ?");

        $stmt->bind_param(
            "sssssisssii",
            $client_name,
            $client_title,
            $client_company,
            $client_photo,
            $testimonial_text,
            $rating,
            $project_name,
            $project_date,
            $featured,
            $display_order,
            $testimonial_id
        );

        if ($stmt->execute()) {
            sendJsonResponse('success', 'Testimonial updated successfully!');
        } else {
            sendJsonResponse('error', 'Database error: ' . $conn->error);
        }
    }

    // If no valid action
    sendJsonResponse('error', 'Invalid request.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Manage Testimonials | Admin Panel</title>
    <link rel="icon" href="img/logo.png" type="image/png">

    <?php include "links.php"; ?>

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --dark-color: #1a1a2e;
            --light-color: #f8f9fa;
            --success-color: #4bb543;
        }

        .testimonial-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            transition: all 0.3s ease;
            margin-bottom: 2rem;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .section-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background: var(--primary-color);
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 201, 240, 0.25);
        }

        .btn-submit {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s;
            color: white;
        }

        .btn-submit:hover {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            transform: translateY(-2px);
        }

        .image-preview-container {
            display: none;
            margin-top: 1rem;
            text-align: center;
        }

        .image-preview {
            max-width: 200px;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #eee;
        }

        .file-upload-wrapper {
            position: relative;
            margin-bottom: 1rem;
        }

        .file-upload-label {
            display: block;
            padding: 0.75rem 1rem;
            border: 1px dashed #ddd;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-label:hover {
            border-color: var(--primary-color);
            background-color: rgba(67, 97, 238, 0.05);
        }

        .file-upload-label i {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .rating-stars {
            display: flex;
            gap: 5px;
            margin-top: 5px;
        }

        .rating-stars i {
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
            font-size: 1.5rem;
        }

        .rating-stars i.active {
            color: #ffc107;
        }

        .featured-toggle {
            position: relative;
            display: inline-block;
            width: 50px;
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
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .featured-slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked+.featured-slider {
            background-color: var(--primary-color);
        }

        input:checked+.featured-slider:before {
            transform: translateX(26px);
        }

        /* Notification Toast */
        .notification-toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .notification-toast.show {
            opacity: 1;
        }
        .notification-toast.success { background-color: #28a745; }
        .notification-toast.error { background-color: #dc3545; }
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
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h2 class="m-0"><?php echo isset($_GET['edit']) ? 'Edit' : 'Add New'; ?> Testimonial</h2>
                                    </div>
                                    <div class="add_button ms-2">
                                        <a href="view-testimonials.php" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-list me-1"></i> View Testimonials
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="testimonial-card">
                                    <h3 class="section-title">Testimonial Details</h3>
                                    <form id="testimonialForm" action="" method="post" enctype="multipart/form-data">
                                        <?php
                                        $testimonial = null;
                                        if (isset($_GET['edit'])) {
                                            $testimonial_id = intval($_GET['edit']);
                                            $stmt = $conn->prepare("SELECT * FROM testimonials WHERE id = ?");
                                            $stmt->bind_param("i", $testimonial_id);
                                            $stmt->execute();
                                            $result = $stmt->get_result();
                                            $testimonial = $result->fetch_assoc();
                                            $stmt->close();
                                            if (!$testimonial) {
                                                echo '<div class="alert alert-danger">Testimonial not found.</div>';
                                                exit;
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="testimonial_id" value="<?php echo $testimonial['id'] ?? ''; ?>">

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_name">Client Name*</label>
                                                <input type="text" class="form-control" name="client_name" id="client_name"
                                                    placeholder="Enter client name"
                                                    value="<?php echo htmlspecialchars($testimonial['client_name'] ?? ''); ?>"
                                                    required />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_title">Client Title*</label>
                                                <input type="text" class="form-control" name="client_title" id="client_title"
                                                    placeholder="Enter client title/position"
                                                    value="<?php echo htmlspecialchars($testimonial['client_title'] ?? ''); ?>"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="client_company">Client Company</label>
                                                <input type="text" class="form-control" name="client_company" id="client_company"
                                                    placeholder="Enter client company"
                                                    value="<?php echo htmlspecialchars($testimonial['client_company'] ?? ''); ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="project_name">Project Name</label>
                                                <input type="text" class="form-control" name="project_name" id="project_name"
                                                    placeholder="Enter project name"
                                                    value="<?php echo htmlspecialchars($testimonial['project_name'] ?? ''); ?>" />
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="project_date">Project Date</label>
                                                <input type="date" class="form-control" name="project_date" id="project_date"
                                                    value="<?php echo htmlspecialchars($testimonial['project_date'] ?? ''); ?>" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Rating*</label>
                                                <input type="hidden" name="rating" id="ratingValue"
                                                    value="<?php echo $testimonial['rating'] ?? '5'; ?>" required>
                                                <div class="rating-stars" id="ratingStars">
                                                    <i class="fas fa-star" data-value="1"></i>
                                                    <i class="fas fa-star" data-value="2"></i>
                                                    <i class="fas fa-star" data-value="3"></i>
                                                    <i class="fas fa-star" data-value="4"></i>
                                                    <i class="fas fa-star" data-value="5"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label" for="testimonial_text">Testimonial Text*</label>
                                                <textarea class="form-control" name="testimonial_text" id="testimonial_text"
                                                    rows="4" placeholder="Enter the testimonial content" required><?php echo htmlspecialchars($testimonial['testimonial_text'] ?? ''); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Featured Testimonial</label>
                                                <div class="d-flex align-items-center">
                                                    <label class="featured-toggle me-2">
                                                        <input type="checkbox" name="featured" <?php echo (isset($testimonial) && $testimonial['featured']) ? 'checked' : ''; ?>>
                                                        <span class="featured-slider"></span>
                                                    </label>
                                                    <span>Mark as featured</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="display_order">Display Order</label>
                                                <input type="number" class="form-control" name="display_order" id="display_order"
                                                    value="<?php echo htmlspecialchars($testimonial['display_order'] ?? '0'); ?>" />
                                                <small class="text-muted">Lower numbers appear first</small>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Client Photo</label>
                                                <div class="file-upload-wrapper">
                                                    <label for="clientPhoto" class="file-upload-label">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                        <p class="mb-0">Click to upload or drag and drop</p>
                                                        <small class="text-muted">PNG, JPG up to 5MB</small>
                                                    </label>
                                                    <input type="file" class="form-control d-none" name="client_photo"
                                                        id="clientPhoto" accept="image/*" />
                                                </div>
                                                <div class="image-preview-container" id="imagePreviewContainer" style="<?php echo (isset($testimonial) && !empty($testimonial['client_photo'])) ? 'display: block;' : 'display: none;'; ?>">
                                                    <img id="imagePreview" class="image-preview" src="<?php echo (isset($testimonial) && !empty($testimonial['client_photo'])) ? '../uploads/testimonials/' . htmlspecialchars($testimonial['client_photo']) : ''; ?>" />
                                                    <button type="button" class="btn btn-sm btn-danger mt-2" onclick="removeImage()">
                                                        <i class="fas fa-trash me-1"></i> Remove
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end mt-4">
                                            <button type="reset" class="btn btn-outline-secondary me-3">
                                                <i class="fas fa-undo me-1"></i> Reset
                                            </button>
                                            <button type="submit" class="btn btn-submit" name="<?php echo isset($_GET['edit']) ? 'update-testimonial' : 'add-testimonial'; ?>" id="submitBtn">
                                                <i class="fas fa-save me-1"></i> <?php echo isset($_GET['edit']) ? 'Update' : 'Save'; ?> Testimonial
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
        // DOM Elements
        const form = document.getElementById('testimonialForm');
        const submitBtn = document.getElementById('submitBtn');
        const ratingStars = document.querySelectorAll('#ratingStars i');
        const ratingValueInput = document.getElementById('ratingValue');
        const photoInput = document.getElementById('clientPhoto');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imagePreview = document.getElementById('imagePreview');

        // Helper to show notification
        function showNotification(message, type = 'success') {
            const toast = document.getElementById('notificationToast');
            toast.textContent = message;
            toast.className = `notification-toast ${type} show`;
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Initialize rating stars
        function initRatingStars() {
            const currentRating = parseInt(ratingValueInput.value) || 0;
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

        // Image preview
        function previewImage(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreviewContainer.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }

        photoInput.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                previewImage(e.target.files[0]);
            } else {
                imagePreviewContainer.style.display = 'none';
            }
        });

        window.removeImage = function() {
            photoInput.value = '';
            imagePreviewContainer.style.display = 'none';
            imagePreview.src = '';
        };

        // Drag and drop
        const uploadLabel = document.querySelector('.file-upload-label');
        if (uploadLabel) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadLabel.addEventListener(eventName, preventDefaults, false);
            });
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            ['dragenter', 'dragover'].forEach(eventName => {
                uploadLabel.addEventListener(eventName, () => uploadLabel.classList.add('bg-light'), false);
            });
            ['dragleave', 'drop'].forEach(eventName => {
                uploadLabel.addEventListener(eventName, () => uploadLabel.classList.remove('bg-light'), false);
            });
            uploadLabel.addEventListener('drop', handleDrop, false);
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files.length) {
                    photoInput.files = files;
                    previewImage(files[0]);
                }
            }
        }

        // Form validation
        function validateForm() {
            const clientName = document.getElementById('client_name').value.trim();
            const clientTitle = document.getElementById('client_title').value.trim();
            const testimonialText = document.getElementById('testimonial_text').value.trim();
            const rating = parseInt(ratingValueInput.value);

            if (!clientName) {
                showNotification('Client Name is required.', 'error');
                return false;
            }
            if (!clientTitle) {
                showNotification('Client Title is required.', 'error');
                return false;
            }
            if (!testimonialText) {
                showNotification('Testimonial Text is required.', 'error');
                return false;
            }
            if (isNaN(rating) || rating < 1 || rating > 5) {
                showNotification('Please select a valid rating (1-5).', 'error');
                return false;
            }
            return true;
        }

        // AJAX form submission
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            if (!validateForm()) {
                return;
            }

            // Determine action
            const isEdit = <?php echo isset($_GET['edit']) ? 'true' : 'false'; ?>;
            const action = isEdit ? 'update-testimonial' : 'add-testimonial';
            
            const formData = new FormData(form);
            formData.append(action, '1'); // Add the action button

            // Show loading state
            const originalBtnHtml = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Processing...';

            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();

                if (data.status === 'success') {
                    showNotification(data.message, 'success');
                    if (!isEdit) {
                        // Reset form for new entry
                        form.reset();
                        // Reset rating to 5
                        ratingValueInput.value = '5';
                        initRatingStars();
                        // Clear image preview
                        removeImage();
                        // Optional: redirect to edit page after short delay
                        // setTimeout(() => { window.location.href = 'testimonials.php?edit=' + data.testimonial_id; }, 1500);
                    } else {
                        // Update success, maybe stay on page
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                } else {
                    showNotification(data.message, 'error');
                }
            } catch (error) {
                console.error('Error:', error);
                showNotification('An unexpected error occurred. Please try again.', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnHtml;
            }
        });

        // Initialize
        initRatingStars();
        // If editing and there's an existing photo, ensure preview is shown
        <?php if (isset($testimonial) && !empty($testimonial['client_photo'])): ?>
            imagePreviewContainer.style.display = 'block';
        <?php endif; ?>
    </script>
</body>

</html>