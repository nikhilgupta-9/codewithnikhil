<?php
include "db-conn.php";

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $title = trim($_POST['title'] ?? '');
    $slug_input = trim($_POST['slug_url'] ?? '');
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $tags = trim($_POST['tags'] ?? '');
    $content = $_POST['content'] ?? '';
    $author = trim($_POST['author'] ?? 'Nikhil Gupta');
    $status = in_array($_POST['status'] ?? '', ['draft', 'published', 'archived'], true) ? $_POST['status'] : 'published';
    
    if (empty($title)) {
        $error = "Article Title is required.";
    } elseif (empty($content)) {
        $error = "Article Content cannot be empty.";
    } else {
        // Generate or clean slug
        if (!empty($slug_input)) {
            $slug_url = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $slug_input), '-'));
        } else {
            $slug_url = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $title), '-'));
        }
        if (empty($slug_url)) {
            $slug_url = 'blog-' . time();
        }

        // Check if slug is unique, append timestamp if duplicate
        $slug_check = $conn->prepare("SELECT id FROM blogs WHERE slug_url = ? LIMIT 1");
        $slug_check->bind_param("s", $slug_url);
        $slug_check->execute();
        $slug_check->store_result();
        if ($slug_check->num_rows > 0) {
            $slug_url .= '-' . time();
        }
        $slug_check->close();

        // File upload handling
        $upload_success = false;
        $image_name = '';
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = "uploads/blogs/";
            
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $fileName = basename($_FILES['image']['name']);
            $fileTmp = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            
            $newFileName = uniqid('blog_', true) . '.' . $fileType;
            $uploadPath = $uploadDir . $newFileName;

            $allowedTypes = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
            if (in_array($fileType, $allowedTypes)) {
                if ($fileSize <= 5242880) { // 5MB max
                    if (move_uploaded_file($fileTmp, $uploadPath)) {
                        $upload_success = true;
                        $image_name = $newFileName;
                    } else {
                        $error = "Failed to upload image. Please check directory permissions.";
                    }
                } else {
                    $error = "Image is too large. Maximum allowed size is 5MB.";
                }
            } else {
                $error = "Invalid image format. Only JPG, JPEG, PNG, WEBP & GIF files are allowed.";
            }
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $error = "File upload encountered an error. Code: " . $_FILES['image']['error'];
        }

        // Only proceed if no errors
        if (empty($error)) {
            $sql = "INSERT INTO blogs (title, meta_title, meta_description, tags, content, slug_url, image, author, status, created_at, updated_at) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "sssssssss", $title, $meta_title, $meta_description, $tags, $content, $slug_url, $image_name, $author, $status);
            
            if (mysqli_stmt_execute($stmt)) {
                $newBlogId = mysqli_insert_id($conn);

                // Automatically generate social media drafts with Gemini AI
                try {
                    require_once dirname(__DIR__) . '/lib/Env.php';
                    require_once dirname(__DIR__) . '/lib/Database.php';
                    require_once dirname(__DIR__) . '/lib/Logger.php';
                    require_once dirname(__DIR__) . '/services/GeminiService.php';
                    require_once dirname(__DIR__) . '/lib/SocialDraftGenerator.php';

                    $generator = new \NikhilWorks\Lib\SocialDraftGenerator();
                    $generator->createDraftsForBlog((int)$newBlogId, $title, $content, $meta_description, $image_name, $slug_url);
                } catch (\Throwable $t) {
                    error_log("Social draft generation error for Blog #{$newBlogId}: " . $t->getMessage());
                }

                $_SESSION['success'] = "Article created successfully! AI has generated ready-to-review social media drafts in your queue.";
                header("Location: view-all-blog.php");
                exit();
            } else {
                $error = "Database error: " . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Write New Article | NikhilWorks Admin</title>
    <link rel="icon" href="assets/img/logo/preloader4.png" type="image/png">
    
    <?php include "links.php"; ?>
    
    <!-- CKEditor 4 CDN -->
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    
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

        .editor-container-card {
            border: 1px solid var(--border-color);
            border-radius: 14px;
            background: #ffffff;
            box-shadow: 0 4px 16px -2px rgba(0, 0, 0, 0.04);
            margin-bottom: 24px;
            overflow: hidden;
            transition: box-shadow 0.2s ease;
        }
        .editor-container-card:hover {
            box-shadow: 0 8px 24px -4px rgba(0, 0, 0, 0.07);
        }

        .card-header-styled {
            background: #f8fafc;
            border-bottom: 1px solid var(--border-color);
            padding: 16px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-styled h5 {
            font-size: 15px;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-body-styled {
            padding: 24px;
        }

        .form-label-custom {
            font-size: 13px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-control-custom {
            border: 1.5px solid #cbd5e1;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 14px;
            color: var(--text-dark);
            transition: all 0.2s ease;
        }
        .form-control-custom:focus {
            border-color: var(--brand-teal);
            box-shadow: 0 0 0 3px rgba(16, 64, 65, 0.12);
            outline: none;
        }

        /* Slug bar */
        .slug-preview-box {
            background: #f1f5f9;
            border: 1px dashed #cbd5e1;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12.5px;
            color: #475569;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }
        .slug-preview-box code {
            color: var(--brand-teal);
            font-weight: 600;
            background: rgba(16, 64, 65, 0.08);
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* Image dropzone */
        .image-dropzone-area {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 24px 16px;
            text-align: center;
            background: #f8fafc;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }
        .image-dropzone-area:hover, .image-dropzone-area.dragover {
            border-color: var(--brand-teal);
            background: rgba(16, 64, 65, 0.03);
        }
        .image-preview-wrapper {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            display: none;
            background: #000;
            max-height: 240px;
        }
        .image-preview-wrapper img {
            width: 100%;
            height: auto;
            max-height: 240px;
            object-fit: cover;
            display: block;
        }
        .image-remove-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(239, 68, 68, 0.9);
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: 0.2s;
        }
        .image-remove-btn:hover {
            background: #dc2626;
            transform: scale(1.05);
        }

        /* Google SERP Snippet Preview */
        .serp-preview-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 16px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.02);
            font-family: Arial, sans-serif;
        }
        .serp-url-row {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #202124;
            margin-bottom: 4px;
        }
        .serp-favicon {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: var(--brand-teal);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--brand-lime);
            font-size: 9px;
            font-weight: 800;
        }
        .serp-url-text {
            color: #4d5156;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .serp-title-text {
            font-size: 17px;
            line-height: 1.3;
            color: #1a0dab;
            font-weight: 400;
            cursor: pointer;
            margin-bottom: 4px;
            word-break: break-word;
        }
        .serp-desc-text {
            font-size: 13px;
            line-height: 1.4;
            color: #4d5156;
            word-break: break-word;
        }

        /* Tag chips */
        .tag-chip {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            background: #f1f5f9;
            color: #334155;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s ease;
            border: 1px solid #e2e8f0;
        }
        .tag-chip:hover {
            background: #e2e8f0;
            color: var(--brand-teal);
        }

        /* Sticky action sidebar */
        @media (min-width: 992px) {
            .sticky-action-sidebar {
                position: sticky;
                top: 20px;
                z-index: 10;
            }
        }

        .btn-publish-primary {
            background: var(--brand-teal);
            color: #ffffff;
            font-weight: 700;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(16, 64, 65, 0.2);
        }
        .btn-publish-primary:hover {
            background: #0a2d2e;
            color: var(--brand-lime);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(16, 64, 65, 0.28);
        }

        .char-counter {
            font-size: 11.5px;
            color: var(--text-muted);
            font-weight: 500;
        }
        .char-counter.good { color: #16a34a; }
        .char-counter.warn { color: #ea580c; }
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

                <!-- Page Header Breadcrumb -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                    <div>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-1 text-muted small">
                                <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="view-all-blog.php" class="text-decoration-none">Blog Articles</a></li>
                                <li class="breadcrumb-item active fw-bold text-dark" aria-current="page">New Article</li>
                            </ol>
                        </nav>
                        <h2 class="mb-0 fw-extrabold text-dark d-flex align-items-center gap-2">
                            <i class="fas fa-feather-alt text-primary"></i> Create New Blog Article
                        </h2>
                    </div>
                    <div class="d-flex gap-2 mt-2 mt-md-0">
                        <a href="view-all-blog.php" class="btn btn-outline-secondary px-3">
                            <i class="fas fa-arrow-left me-1"></i> All Articles
                        </a>
                    </div>
                </div>

                <!-- Alerts -->
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i> <?= htmlspecialchars($error) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i> <?= htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <!-- Form -->
                <form method="POST" enctype="multipart/form-data" id="blogForm">
                    <div class="row">
                        <!-- Main Content Column (Left - 8 cols) -->
                        <div class="col-lg-8">
                            
                            <!-- Article Content Card -->
                            <div class="editor-container-card">
                                <div class="card-header-styled">
                                    <h5><i class="fas fa-edit text-primary"></i> Article Content</h5>
                                    <span class="badge bg-light text-dark border">Main Body</span>
                                </div>
                                <div class="card-body-styled">
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <label class="form-label-custom" for="blogTitle">
                                            <span>Article Title <span class="text-danger">*</span></span>
                                            <span class="char-counter" id="titleCounter">0 chars</span>
                                        </label>
                                        <input type="text" id="blogTitle" name="title" class="form-control form-control-custom form-control-lg fw-bold" 
                                               placeholder="e.g. 10 Proven Web Design Strategies to 10x Conversions" required 
                                               value="<?= isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '' ?>">
                                    </div>

                                    <!-- Auto URL Slug Bar -->
                                    <div class="mb-4">
                                        <label class="form-label-custom">
                                            <span>URL Slug &amp; Permalinks</span>
                                            <button type="button" class="btn btn-sm btn-link p-0 text-decoration-none" id="toggleSlugEdit">
                                                <i class="fas fa-pen fa-xs me-1"></i>Edit Slug
                                            </button>
                                        </label>
                                        <div class="slug-preview-box">
                                            <span><i class="fas fa-link text-muted me-1"></i> Preview:</span>
                                            <code>https://nikhilworks.com/blog/<span id="slugPreviewText">your-article-slug</span>/</code>
                                        </div>
                                        <div id="customSlugField" class="mt-2" style="display: none;">
                                            <input type="text" id="slugInput" name="slug_url" class="form-control form-control-custom form-control-sm"
                                                   placeholder="custom-slug-url" value="<?= isset($_POST['slug_url']) ? htmlspecialchars($_POST['slug_url']) : '' ?>">
                                            <small class="text-muted">Only lowercase letters, numbers, and dashes are allowed.</small>
                                        </div>
                                    </div>

                                    <!-- Content WYSIWYG Editor -->
                                    <div class="mb-2">
                                        <label class="form-label-custom mb-2">
                                            <span>Full Article Content <span class="text-danger">*</span></span>
                                        </label>
                                        <textarea name="content" id="editor" rows="18" required><?= isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '' ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Engine Optimization (SEO) Card -->
                            <div class="editor-container-card">
                                <div class="card-header-styled">
                                    <h5><i class="fab fa-google text-primary"></i> Search Engine Optimization (SEO)</h5>
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">SERP Live Preview</span>
                                </div>
                                <div class="card-body-styled">
                                    <!-- Google SERP Snippet Preview Box -->
                                    <div class="mb-4">
                                        <label class="form-label-custom mb-2">
                                            <span>Google Search Result Snippet</span>
                                            <small class="text-muted">Real-time simulation</small>
                                        </label>
                                        <div class="serp-preview-card">
                                            <div class="serp-url-row">
                                                <span class="serp-favicon">N</span>
                                                <span class="serp-url-text">https://nikhilworks.com › blog › <span id="serpSlugPreview">your-article-slug</span></span>
                                            </div>
                                            <div class="serp-title-text" id="serpTitlePreview">Article Title Will Appear Here | NikhilWorks</div>
                                            <div class="serp-desc-text" id="serpDescPreview">Provide a meta description to see how your article snippet will be presented on Google and other major search engines...</div>
                                        </div>
                                    </div>

                                    <!-- Meta Title -->
                                    <div class="mb-3">
                                        <label class="form-label-custom" for="metaTitleInput">
                                            <span>Meta Title (SEO Title)</span>
                                            <span class="char-counter" id="metaTitleCounter">0 / 60</span>
                                        </label>
                                        <input type="text" id="metaTitleInput" name="meta_title" class="form-control form-control-custom" 
                                               placeholder="Defaults to Article Title if left blank"
                                               value="<?= isset($_POST['meta_title']) ? htmlspecialchars($_POST['meta_title']) : '' ?>">
                                    </div>

                                    <!-- Meta Description -->
                                    <div class="mb-0">
                                        <label class="form-label-custom" for="metaDescInput">
                                            <span>Meta Description (SEO Summary)</span>
                                            <span class="char-counter" id="metaDescCounter">0 / 160</span>
                                        </label>
                                        <textarea id="metaDescInput" name="meta_description" class="form-control form-control-custom" rows="3"
                                                  placeholder="Provide a compelling 140-160 character summary to maximize click-through rates from search results."><?= isset($_POST['meta_description']) ? htmlspecialchars($_POST['meta_description']) : '' ?></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Sidebar Settings Column (Right - 4 cols) -->
                        <div class="col-lg-4">
                            <div class="sticky-action-sidebar">

                                <!-- Publish Card -->
                                <div class="editor-container-card">
                                    <div class="card-header-styled">
                                        <h5><i class="fas fa-paper-plane text-primary"></i> Publishing Control</h5>
                                    </div>
                                    <div class="card-body-styled">
                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label class="form-label-custom">Status</label>
                                            <select name="status" id="blogStatus" class="form-select form-control-custom">
                                                <option value="published" <?= (!isset($_POST['status']) || $_POST['status'] === 'published') ? 'selected' : '' ?>>🟢 Published (Live Immediately)</option>
                                                <option value="draft" <?= (isset($_POST['status']) && $_POST['status'] === 'draft') ? 'selected' : '' ?>>🟡 Draft (Save for Review)</option>
                                                <option value="archived" <?= (isset($_POST['status']) && $_POST['status'] === 'archived') ? 'selected' : '' ?>>⚪ Archived (Hidden)</option>
                                            </select>
                                        </div>

                                        <!-- Author -->
                                        <div class="mb-3">
                                            <label class="form-label-custom">Author Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                                <input type="text" name="author" class="form-control form-control-custom border-start-0" required
                                                       value="<?= isset($_POST['author']) ? htmlspecialchars($_POST['author']) : 'Nikhil Gupta' ?>">
                                            </div>
                                        </div>

                                        <!-- AI Social Cross-Post Alert -->
                                        <div class="p-3 bg-light rounded-3 border mb-3 small text-muted">
                                            <div class="d-flex align-items-center gap-2 mb-1 text-dark fw-bold">
                                                <i class="fas fa-robot text-primary"></i> AI Social Automation Active
                                            </div>
                                            <span>Upon publishing, Gemini AI will automatically generate 4 optimized drafts (LinkedIn, X/Twitter, Facebook, Instagram) in your Social Queue.</span>
                                        </div>

                                        <!-- Action CTA -->
                                        <button type="submit" id="submitBtn" class="btn-publish-primary">
                                            <i class="fas fa-cloud-upload-alt"></i> Publish &amp; Queue Social Posts
                                        </button>
                                    </div>
                                </div>

                                <!-- Featured Image Card -->
                                <div class="editor-container-card">
                                    <div class="card-header-styled">
                                        <h5><i class="fas fa-image text-primary"></i> Featured Cover Image</h5>
                                    </div>
                                    <div class="card-body-styled">
                                        <div class="image-dropzone-area" id="dropzoneArea" onclick="document.getElementById('imageFileInput').click();">
                                            <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-2"></i>
                                            <div class="fw-bold text-dark mb-1">Click to browse or drag image</div>
                                            <div class="small text-muted">Recommended: 1200 &times; 630px (Max 5MB)</div>
                                            <div class="small text-muted mt-1">Supports JPG, PNG, WEBP, GIF</div>
                                        </div>
                                        
                                        <input type="file" id="imageFileInput" name="image" class="d-none" accept="image/jpeg,image/png,image/webp,image/gif">

                                        <!-- Live Image Preview -->
                                        <div class="image-preview-wrapper mt-3" id="imagePreviewContainer">
                                            <img id="imagePreviewElem" src="#" alt="Featured Image Preview">
                                            <button type="button" class="image-remove-btn" id="removeImageBtn" title="Remove selected image">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tags & Taxonomies Card -->
                                <div class="editor-container-card">
                                    <div class="card-header-styled">
                                        <h5><i class="fas fa-tags text-primary"></i> Tags &amp; Topics</h5>
                                    </div>
                                    <div class="card-body-styled">
                                        <div class="mb-3">
                                            <label class="form-label-custom">Comma-Separated Tags</label>
                                            <input type="text" name="tags" id="tagsInput" class="form-control form-control-custom"
                                                   placeholder="e.g. Web Development, SEO, React" 
                                                   value="<?= isset($_POST['tags']) ? htmlspecialchars($_POST['tags']) : '' ?>">
                                            <small class="text-muted">Separate multiple tags with commas.</small>
                                        </div>

                                        <div>
                                            <label class="form-label-custom mb-2">Quick Tag Suggestions</label>
                                            <div class="d-flex flex-wrap gap-1">
                                                <span class="tag-chip" onclick="addSuggestedTag('Web Development')">+ Web Development</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('SEO Optimization')">+ SEO Optimization</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('Digital Marketing')">+ Digital Marketing</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('Full Stack')">+ Full Stack</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('AI Tools')">+ AI Tools</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('Next.js')">+ Next.js</span>
                                                <span class="tag-chip" onclick="addSuggestedTag('PHP & MySQL')">+ PHP & MySQL</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <?php include "footer.php"; ?>

        <script>
            // Initialize CKEditor 4 with modern custom configuration
            CKEDITOR.replace('editor', {
                height: 480,
                removeButtons: 'About,Save,NewPage,Preview,Print,Templates',
                toolbarGroups: [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'links' },
                    { name: 'insert' },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'tools' }
                ],
                extraPlugins: 'uploadimage,justify,colorbutton',
                contentsCss: 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap',
                bodyClass: 'ckeditor-article-body'
            });

            // Helper to generate clean slug
            function createSlug(str) {
                return str
                    .toLowerCase()
                    .trim()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }

            // Real-time Title & Slug & SEO Updates
            const blogTitle = document.getElementById('blogTitle');
            const slugPreviewText = document.getElementById('slugPreviewText');
            const slugInput = document.getElementById('slugInput');
            const titleCounter = document.getElementById('titleCounter');
            const serpTitlePreview = document.getElementById('serpTitlePreview');
            const serpSlugPreview = document.getElementById('serpSlugPreview');
            const serpDescPreview = document.getElementById('serpDescPreview');
            const metaTitleInput = document.getElementById('metaTitleInput');
            const metaDescInput = document.getElementById('metaDescInput');
            const metaTitleCounter = document.getElementById('metaTitleCounter');
            const metaDescCounter = document.getElementById('metaDescCounter');

            let isCustomSlugManuallyEdited = false;

            function updateTitleAndSlug() {
                const titleVal = blogTitle.value.trim();
                titleCounter.textContent = `${titleVal.length} chars`;

                // Update slug if not manually altered
                if (!isCustomSlugManuallyEdited) {
                    const generatedSlug = createSlug(titleVal) || 'your-article-slug';
                    slugPreviewText.textContent = generatedSlug;
                    serpSlugPreview.textContent = generatedSlug;
                    slugInput.value = generatedSlug;
                }

                // Update SERP Title
                if (metaTitleInput.value.trim() === '') {
                    serpTitlePreview.textContent = (titleVal || 'Article Title Will Appear Here') + ' | NikhilWorks';
                }
            }

            blogTitle.addEventListener('input', updateTitleAndSlug);

            slugInput.addEventListener('input', function() {
                isCustomSlugManuallyEdited = true;
                const clean = createSlug(this.value);
                slugPreviewText.textContent = clean || 'your-article-slug';
                serpSlugPreview.textContent = clean || 'your-article-slug';
            });

            document.getElementById('toggleSlugEdit').addEventListener('click', function() {
                const field = document.getElementById('customSlugField');
                if (field.style.display === 'none') {
                    field.style.display = 'block';
                    slugInput.focus();
                } else {
                    field.style.display = 'none';
                }
            });

            // Meta Title & Counter
            metaTitleInput.addEventListener('input', function() {
                const len = this.value.length;
                metaTitleCounter.textContent = `${len} / 60`;
                metaTitleCounter.className = 'char-counter ' + (len > 0 && len <= 60 ? 'good' : (len > 60 ? 'warn' : ''));
                serpTitlePreview.textContent = (this.value.trim() || blogTitle.value.trim() || 'Article Title Will Appear Here') + ' | NikhilWorks';
            });

            // Meta Description & Counter
            metaDescInput.addEventListener('input', function() {
                const len = this.value.length;
                metaDescCounter.textContent = `${len} / 160`;
                metaDescCounter.className = 'char-counter ' + (len > 0 && len <= 160 ? 'good' : (len > 160 ? 'warn' : ''));
                serpDescPreview.textContent = this.value.trim() || 'Provide a meta description to see how your article snippet will be presented on Google and other major search engines...';
            });

            // Image Upload & Live Preview
            const imageFileInput = document.getElementById('imageFileInput');
            const dropzoneArea = document.getElementById('dropzoneArea');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const imagePreviewElem = document.getElementById('imagePreviewElem');
            const removeImageBtn = document.getElementById('removeImageBtn');

            imageFileInput.addEventListener('change', function() {
                handleImageSelect(this.files);
            });

            function handleImageSelect(files) {
                if (files && files[0]) {
                    const file = files[0];
                    if (!file.type.match('image.*')) {
                        alert('Please select an image file (JPG, PNG, WEBP, GIF).');
                        return;
                    }
                    if (file.size > 5242880) {
                        alert('Image file size exceeds 5MB limit.');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreviewElem.src = e.target.result;
                        imagePreviewContainer.style.display = 'block';
                        dropzoneArea.style.display = 'none';
                    }
                    reader.readAsDataURL(file);
                }
            }

            removeImageBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                imageFileInput.value = '';
                imagePreviewElem.src = '#';
                imagePreviewContainer.style.display = 'none';
                dropzoneArea.style.display = 'block';
            });

            // Drag and drop events
            ['dragenter', 'dragover'].forEach(eventName => {
                dropzoneArea.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzoneArea.classList.add('dragover');
                }, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                dropzoneArea.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzoneArea.classList.remove('dragover');
                }, false);
            });

            dropzoneArea.addEventListener('drop', (e) => {
                const dt = e.dataTransfer;
                const files = dt.files;
                if (files && files.length > 0) {
                    imageFileInput.files = files;
                    handleImageSelect(files);
                }
            });

            // Suggested tags quick adder
            window.addSuggestedTag = function(tag) {
                const tagsInput = document.getElementById('tagsInput');
                let currentTags = tagsInput.value.split(',').map(t => t.trim()).filter(t => t.length > 0);
                if (!currentTags.includes(tag)) {
                    currentTags.push(tag);
                    tagsInput.value = currentTags.join(', ');
                }
                tagsInput.focus();
            };

            // Loading state on form submit
            document.getElementById('blogForm').addEventListener('submit', function() {
                const btn = document.getElementById('submitBtn');
                btn.disabled = true;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing &amp; Generating Social Drafts...';
            });
        </script>
</body>
</html>