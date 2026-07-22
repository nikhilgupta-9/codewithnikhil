<?php
include 'config/connect.php';
include 'util/function.php';

// ── Auto-create blog_comments table if it doesn't exist ───────────────────
$conn->query("CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `blog_slug`  VARCHAR(255) NOT NULL,
  `name`       VARCHAR(100) NOT NULL,
  `email`      VARCHAR(150) NOT NULL,
  `website`    VARCHAR(200) DEFAULT NULL,
  `comment`    TEXT NOT NULL,
  `status`     TINYINT(1) DEFAULT 0 COMMENT '0=pending, 1=approved',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  INDEX `idx_slug`   (`blog_slug`),
  INDEX `idx_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

// ── Validate slug ──────────────────────────────────────────────────────────
$slug = trim($_GET['alias'] ?? '');
if (empty($slug)) {
    header("Location: {$site}blogs/");
    exit();
}

$blog    = fetch_blog_detail($slug);   // redirects to 404 internally if not found
$contact = contact_us();

// ── Handle comment submission ──────────────────────────────────────────────
$commentSuccess = false;
$commentError   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
    $c_name    = trim(strip_tags($_POST['c_name']    ?? ''));
    $c_email   = trim(strip_tags($_POST['c_email']   ?? ''));
    $c_website = trim(strip_tags($_POST['c_website'] ?? ''));
    $c_comment = trim(strip_tags($_POST['c_comment'] ?? ''));

    if (empty($c_name) || empty($c_email) || empty($c_comment)) {
        $commentError = 'Please fill in your name, email address, and comment.';
    } elseif (!filter_var($c_email, FILTER_VALIDATE_EMAIL)) {
        $commentError = 'Please enter a valid email address.';
    } else {
        $stmt = $conn->prepare(
            "INSERT INTO `blog_comments` (`blog_slug`, `name`, `email`, `website`, `comment`, `status`)
             VALUES (?, ?, ?, ?, ?, 0)"
        );
        $stmt->bind_param('sssss', $slug, $c_name, $c_email, $c_website, $c_comment);
        if ($stmt->execute()) {
            $commentSuccess = true;
        } else {
            $commentError = 'Something went wrong. Please try again later.';
        }
        $stmt->close();
    }
}

// ── Fetch sidebar & related data ───────────────────────────────────────────
$approvedComments = get_blog_comments($slug);
$commentCount     = count($approvedComments);
$recentPosts      = get_recent_blogs(4);
$allTags          = get_all_blog_tags(15);

// Reading time  (avg 200 wpm)
$wordCount   = str_word_count(strip_tags($blog['content']));
$readingTime = max(1, ceil($wordCount / 200));

// Related posts (latest 3, excluding current)
$escapedSlug  = mysqli_real_escape_string($conn, $slug);
$relatedSQL   = "SELECT `id`, `title`, `slug_url`, `image`, `author`, `created_at`, `meta_description`
                 FROM `blogs`
                 WHERE `slug_url` != '$escapedSlug'
                 ORDER BY `created_at` DESC
                 LIMIT 3";
$relatedRes   = mysqli_query($conn, $relatedSQL);
$relatedPosts = [];
if ($relatedRes) {
    while ($r = mysqli_fetch_assoc($relatedRes)) {
        $relatedPosts[] = $r;
    }
}

// ── SEO variables ──────────────────────────────────────────────────────────
$metaTitle     = !empty($blog['meta_title'])       ? $blog['meta_title']       : $blog['title'];
$metaDesc      = !empty($blog['meta_description']) ? $blog['meta_description'] : mb_substr(strip_tags($blog['content']), 0, 155);
$blogImage     = $site . 'admin/uploads/blogs/' . $blog['image'];
$canonicalURL  = $site . 'blog/' . $blog['slug_url'];
$datePublished = date('c', strtotime($blog['created_at']));
$dateModified  = date('c', strtotime(!empty($blog['updated_at']) ? $blog['updated_at'] : $blog['created_at']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?= htmlspecialchars($metaTitle) ?> | NikhilWorks Blog</title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($blog['tags'] ?? '') ?>">
  <meta name="author" content="<?= htmlspecialchars($blog['author']) ?>">
  <link rel="canonical" href="<?= $canonicalURL ?>">

  <!-- hreflang for international readers -->
  <link rel="alternate" hreflang="en"       href="<?= $canonicalURL ?>">
  <link rel="alternate" hreflang="x-default" href="<?= $canonicalURL ?>">

  <!-- Open Graph -->
  <meta property="og:type"        content="article">
  <meta property="og:title"       content="<?= htmlspecialchars($metaTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:image"       content="<?= $blogImage ?>">
  <meta property="og:url"         content="<?= $canonicalURL ?>">
  <meta property="og:site_name"   content="NikhilWorks">
  <meta property="article:published_time" content="<?= $datePublished ?>">
  <meta property="article:modified_time"  content="<?= $dateModified ?>">
  <meta property="article:author"         content="<?= htmlspecialchars($blog['author']) ?>">
  <meta property="og:locale"              content="en_US">
  <meta property="og:locale:alternate"    content="en_GB">
  <meta property="og:locale:alternate"    content="en_AU">

  <!-- Twitter Card -->
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= htmlspecialchars($metaTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="twitter:image"       content="<?= $blogImage ?>">

  <!-- JSON-LD: BlogPosting -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "mainEntityOfPage": {
      "@type": "WebPage",
      "@id": "<?= $canonicalURL ?>"
    },
    "headline": "<?= htmlspecialchars($blog['title'], ENT_QUOTES) ?>",
    "description": "<?= htmlspecialchars($metaDesc, ENT_QUOTES) ?>",
    "image": "<?= $blogImage ?>",
    "author": {
      "@type": "Person",
      "name": "<?= htmlspecialchars($blog['author'], ENT_QUOTES) ?>",
      "url": "<?= $site ?>about/"
    },
    "publisher": {
      "@type": "Organization",
      "name": "NikhilWorks",
      "url": "<?= $site ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?= $site ?>assets/img/logo/fav-logo1.png"
      }
    },
    "datePublished": "<?= $datePublished ?>",
    "dateModified":  "<?= $dateModified ?>",
    "keywords": "<?= htmlspecialchars($blog['tags'] ?? '', ENT_QUOTES) ?>",
    "wordCount": <?= $wordCount ?>,
    "timeRequired": "PT<?= $readingTime ?>M"
  }
  </script>

  <!-- JSON-LD: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home",    "item": "<?= $site ?>"},
      {"@type": "ListItem", "position": 2, "name": "Blog",    "item": "<?= $site ?>blogs/"},
      {"@type": "ListItem", "position": 3, "name": "<?= htmlspecialchars($blog['title'], ENT_QUOTES) ?>", "item": "<?= $canonicalURL ?>"}
    ]
  }
  </script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo1.png" type="image/x-icon">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/sidebar.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/slick-slider.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/nice-select.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">

  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    /* ── Reading time & meta bar ── */
    .blog-meta-bar { display:flex; flex-wrap:wrap; gap:14px; align-items:center; margin-bottom:18px; }
    .blog-meta-bar span { font-size:13px; color:#666; display:flex; align-items:center; gap:6px; }
    .blog-meta-bar span i { color:#104041; }

    /* ── Social share strip ── */
    .social-share { display:flex; flex-wrap:wrap; gap:10px; align-items:center; margin:28px 0; }
    .social-share .share-label { font-weight:600; font-size:14px; color:#333; }
    .share-btn { display:inline-flex; align-items:center; gap:7px; padding:8px 16px;
                 border-radius:6px; font-size:13px; font-weight:600; text-decoration:none;
                 transition:opacity .2s; }
    .share-btn:hover { opacity:.85; text-decoration:none; }
    .share-wa  { background:#25D366; color:#fff; }
    .share-fb  { background:#1877F2; color:#fff; }
    .share-tw  { background:#000;    color:#fff; }
    .share-li  { background:#0A66C2; color:#fff; }

    /* ── Author bio card ── */
    .author-bio { display:flex; gap:20px; align-items:flex-start; background:#f8f9fa;
                  border-left:4px solid #104041; border-radius:8px; padding:24px; margin:36px 0; }
    .author-bio .author-avatar { width:80px; height:80px; border-radius:50%;
                                  object-fit:cover; flex-shrink:0; }
    .author-bio .author-avatar-placeholder { width:80px; height:80px; border-radius:50%;
      background:#104041; display:flex; align-items:center; justify-content:center;
      font-size:28px; color:#ADFF1C; font-weight:700; flex-shrink:0; }
    .author-bio h5 { margin:0 0 4px; font-size:16px; font-weight:700; color:#104041; }
    .author-bio .author-role { font-size:12px; color:#888; margin-bottom:8px; }
    .author-bio p { font-size:14px; color:#555; margin:0; line-height:1.6; }

    /* ── Comment boxes ── */
    .comment-card { background:#f8f9fa; border-radius:10px; padding:20px; margin-bottom:18px; }
    .comment-card .commenter-meta { display:flex; align-items:center; gap:12px; margin-bottom:10px; }
    .comment-card .commenter-avatar { width:44px; height:44px; border-radius:50%;
      background:#104041; display:flex; align-items:center; justify-content:center;
      font-size:18px; color:#ADFF1C; font-weight:700; flex-shrink:0; }
    .comment-card .commenter-name { font-weight:700; font-size:15px; color:#222; }
    .comment-card .commenter-date { font-size:12px; color:#999; }
    .comment-card p { margin:0; color:#555; line-height:1.7; }

    /* ── Comment form alert ── */
    .comment-success { background:#d4edda; border:1px solid #c3e6cb; color:#155724;
                       border-radius:8px; padding:16px 20px; margin-bottom:20px; }
    .comment-error   { background:#f8d7da; border:1px solid #f5c6cb; color:#721c24;
                       border-radius:8px; padding:16px 20px; margin-bottom:20px; }

    /* ── Tags sidebar ── */
    .tag-cloud { display:flex; flex-wrap:wrap; gap:8px; }
    .tag-cloud a { background:#f0f0f0; color:#333; padding:5px 12px; border-radius:20px;
                   font-size:12px; text-decoration:none; transition:all .2s; }
    .tag-cloud a:hover { background:#104041; color:#ADFF1C; }

    /* ── Related posts ── */
    .related-post-card { border-radius:10px; overflow:hidden; box-shadow:0 2px 12px rgba(0,0,0,.08); }
    .related-post-card img { width:100%; height:180px; object-fit:cover; }
    .related-post-card .rp-body { padding:16px; }
    .related-post-card .rp-date { font-size:12px; color:#888; margin-bottom:6px; }
    .related-post-card .rp-title { font-size:15px; font-weight:700; color:#222; line-height:1.4;
                                    text-decoration:none; display:block; }
    .related-post-card .rp-title:hover { color:#104041; }
  
    /* ═══════════════════════════════════════════════
       BLOG CONTENT BODY — Professional Typography
    ═══════════════════════════════════════════════ */

    /* Overall blog content wrapper */
    .blog-content-body {
        padding: 10px 0 20px;
    }

    /* Base paragraph styling */
    .blog-content-body p {
        font-size: 16.5px;
        line-height: 1.85;
        color: #3d4c5e;
        margin-bottom: 20px;
    }

    /* First paragraph after image gets a bit more top space */
    .blog-content-body p:first-child {
        margin-top: 8px;
    }

    /* Headings inside blog content (h1–h4) */
    .blog-content-body h1,
    .blog-content-body h2,
    .blog-content-body h3,
    .blog-content-body h4 {
        font-weight: 700;
        color: #1a2433;
        margin-top: 38px;
        margin-bottom: 14px;
        line-height: 1.35;
    }
    .blog-content-body h2 { font-size: 26px; }
    .blog-content-body h3 { font-size: 21px; }
    .blog-content-body h4 { font-size: 18px; }

    /* Unordered & ordered lists */
    .blog-content-body ul,
    .blog-content-body ol {
        margin: 6px 0 22px 0;
        padding-left: 26px;
    }
    .blog-content-body ul li,
    .blog-content-body ol li {
        font-size: 16px;
        line-height: 1.75;
        color: #3d4c5e;
        margin-bottom: 8px;
    }

    /* Strong / bold emphasis */
    .blog-content-body strong,
    .blog-content-body b {
        color: #1a2433;
        font-weight: 700;
    }

    /* Inline code */
    .blog-content-body code {
        background: #f0f4f8;
        color: #c0392b;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 14.5px;
        font-family: 'Courier New', monospace;
    }

    /* Block quotes */
    .blog-content-body blockquote {
        border-left: 4px solid #104041;
        background: #f7fafa;
        margin: 28px 0;
        padding: 18px 24px;
        border-radius: 0 8px 8px 0;
    }
    .blog-content-body blockquote p {
        margin-bottom: 0;
        font-style: italic;
        font-size: 17px;
        color: #2c3e50;
    }

    /* Images inside content */
    .blog-content-body img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        margin: 24px 0;
        box-shadow: 0 4px 16px rgba(0,0,0,.08);
    }

    /* Horizontal rules */
    .blog-content-body hr {
        border: none;
        border-top: 2px solid #e8ecf0;
        margin: 36px 0;
    }

    /* Links inside content */
    .blog-content-body a {
        color: #104041;
        text-decoration: underline;
        font-weight: 600;
    }
    .blog-content-body a:hover {
        color: #ADFF1C;
        text-decoration: none;
    }

    /* ─── Section/header dividers in the blog body ─── */
    /* The blog stores section headings as <p> tags — we visually distinguish
       them by detecting the context via first-of-type or sibling selectors is
       unreliable, so we make ALL paragraphs readable and just rely on good line
       spacing. The headings in the DB should use <h2>/<h3> ideally. */

    /* ─── Blog title (featured image section) ─── */
    .blog-hedaer-area h1,
    .blog-hedaer-area .blog-title-main {
        font-size: clamp(24px, 4vw, 40px);
        font-weight: 800;
        line-height: 1.3;
        color: #1a2433;
        margin-bottom: 18px;
    }

    /* Blog featured image */
    .blog-auhtor-sidebar-area .blog-img img,
    .blog-auhtor-sidebar-area > img,
    .blog-detail-img {
        border-radius: 14px;
        width: 100%;
        margin-bottom: 30px;
        box-shadow: 0 6px 28px rgba(0,0,0,.10);
    }

    /* ─── Tags section ─── */
    .blog-tags {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e8ecf0;
    }
    .blog-tags a {
        display: inline-block;
        background: #f0f4f8;
        color: #104041;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        margin: 4px 3px;
        text-decoration: none;
        border: 1px solid #d0dde6;
        transition: all .2s;
    }
    .blog-tags a:hover {
        background: #104041;
        color: #ADFF1C;
        border-color: #104041;
    }

    /* ─── Author box ─── */
    .blog-author-boxarea {
        background: #f8fafa;
        border: 1px solid #e0eaec;
        border-radius: 14px;
        padding: 28px;
        margin-top: 36px;
        display: flex;
        align-items: flex-start;
        gap: 20px;
    }
    .blog-author-boxarea img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
    }
    .blog-author-boxarea h4,
    .blog-author-boxarea h3 {
        margin: 0 0 4px;
        font-size: 18px;
        font-weight: 700;
        color: #1a2433;
    }
    .blog-author-boxarea p {
        margin: 0;
        color: #5a6a7a;
        font-size: 14.5px;
        line-height: 1.65;
    }

    /* ─── Comment section ─── */
    .blog-comment-section {
        margin-top: 48px;
        padding-top: 32px;
        border-top: 2px solid #e8ecf0;
    }
    .blog-comment-section h3,
    .blog-comment-section h4 {
        font-size: 22px;
        font-weight: 700;
        color: #1a2433;
        margin-bottom: 22px;
    }

    /* ─── Comment form fields ─── */
    .comment-form input,
    .comment-form textarea {
        border: 1.5px solid #d0dde6;
        border-radius: 8px;
        padding: 12px 16px;
        font-size: 15px;
        width: 100%;
        margin-bottom: 16px;
        transition: border-color .2s;
        background: #fff;
        color: #1a2433;
    }
    .comment-form input:focus,
    .comment-form textarea:focus {
        outline: none;
        border-color: #104041;
        box-shadow: 0 0 0 3px rgba(16,64,65,.08);
    }
    .comment-form textarea {
        min-height: 130px;
        resize: vertical;
    }

    /* ─── Sidebar spacing ─── */
    .blog-sidebar-area > * + * {
        margin-top: 32px;
    }

    /* ─── Section spacing ─── */
    .blog-auhtor-section-area.sp1 {
        padding-top: 60px;
        padding-bottom: 60px;
    }

  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO / BREADCRUMB =======-->
  <div class="about-header-area" style="background-image:url(<?= $site ?>assets/img/bg/inner-header.png); background-repeat:no-repeat; background-size:cover; background-position:center;">
    <img src="<?= $site ?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="<?= $site ?>assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1 class="fs-3"><?= htmlspecialchars($blog['title']) ?></h1>
            <nav aria-label="breadcrumb">
              <a href="<?= $site ?>">Home</a>
              <i class="fa-solid fa-angle-right mx-1"></i>
              <a href="<?= $site ?>blogs/">Blog</a>
              <i class="fa-solid fa-angle-right mx-1"></i>
              <span><?= htmlspecialchars(mb_substr($blog['title'], 0, 50)) ?><?= mb_strlen($blog['title']) > 50 ? '…' : '' ?></span>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO ENDS =======-->

  <!--===== BLOG DETAIL =======-->
  <div class="blog-auhtor-section-area sp1">
    <div class="container">
      <div class="row">

        <!-- ── Main Content ── -->
        <div class="col-lg-8">
          <div class="blog-auhtor-sidebar-area heading2">

            <!-- Meta bar -->
            <div class="blog-meta-bar">
              <span><i class="fa-solid fa-user"></i> <?= htmlspecialchars($blog['author']) ?></span>
              <span><i class="fa-regular fa-calendar"></i> <?= date('d M Y', strtotime($blog['created_at'])) ?></span>
              <span><i class="fa-regular fa-clock"></i> <?= $readingTime ?> min read</span>
              <span><i class="fa-regular fa-comment"></i> <?= $commentCount ?> comment<?= $commentCount != 1 ? 's' : '' ?></span>
            </div>

            <h2><?= htmlspecialchars($blog['title']) ?></h2>
            <div class="space24"></div>

            <!-- Featured image -->
            <?php if (!empty($blog['image'])): ?>
            <div class="img1">
              <img src="<?= $blogImage ?>" alt="<?= htmlspecialchars($blog['title']) ?>"
                   style="max-width:100%; border-radius:10px; width:100%;">
            </div>
            <div class="space24"></div>
            <?php endif; ?>

            <!-- Blog content -->
            <div class="blog-content-body">
              <?= $blog['content'] ?>
            </div>

            <!-- Tags -->
            <?php if (!empty($blog['tags'])): ?>
            <div class="space24"></div>
            <div class="d-flex flex-wrap align-items-center gap-2">
              <strong style="font-size:13px;">Tags:</strong>
              <?php foreach (array_map('trim', preg_split('/[,;\|]+/', $blog['tags'])) as $tag): ?>
                <?php if ($tag !== ''): ?>
                <a href="<?= $site ?>blogs/?tag=<?= urlencode($tag) ?>"
                   style="background:#f0f0f0;color:#333;padding:4px 12px;border-radius:20px;font-size:12px;text-decoration:none;">
                  #<?= htmlspecialchars($tag) ?>
                </a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <!-- Social Share -->
            <div class="social-share-wrapper mt-4 pt-3 border-top">
    <!-- Share Section -->
    <div class="share-section mb-4">
        <span class="share-label d-block mb-2 fw-semibold" style="color: #104041; font-size: 14px;">
            <i class="fa-regular fa-share-from-square me-2"></i>Share this article:
        </span>
        <div class="d-flex flex-wrap gap-2">
            <a href="https://api.whatsapp.com/send?text=<?= urlencode($metaTitle . ' ' . $canonicalURL) ?>"
               target="_blank" rel="noopener noreferrer" 
               class="btn btn-sm btn-success rounded-pill px-3"
               style="background: #25D366; border-color: #25D366;">
                <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($canonicalURL) ?>"
               target="_blank" rel="noopener noreferrer" 
               class="btn btn-sm rounded-pill px-3"
               style="background: #1877F2; border-color: #1877F2; color: #fff;">
                <i class="fa-brands fa-facebook-f me-1"></i> Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url=<?= urlencode($canonicalURL) ?>&text=<?= urlencode($metaTitle) ?>"
               target="_blank" rel="noopener noreferrer" 
               class="btn btn-sm rounded-pill px-3"
               style="background: #000000; border-color: #000000; color: #fff;">
                <i class="fa-brands fa-x-twitter me-1"></i> X / Twitter
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($canonicalURL) ?>"
               target="_blank" rel="noopener noreferrer" 
               class="btn btn-sm rounded-pill px-3"
               style="background: #0A66C2; border-color: #0A66C2; color: #fff;">
                <i class="fa-brands fa-linkedin-in me-1"></i> LinkedIn
            </a>
            <!-- Copy Link Button -->
            <button onclick="copyToClipboard('<?= $canonicalURL ?>')" 
                    class="btn btn-sm btn-outline-secondary rounded-pill px-3 copy-link-btn"
                    style="border-color: #104041; color: #104041;">
                <i class="fa-regular fa-copy me-1"></i> Copy Link
            </button>
        </div>
    </div>

    <!-- Read on Platforms Section -->
    <div class="platforms-section">
        <span class="share-label d-block mb-2 fw-semibold" style="color: #104041; font-size: 14px;">
            <i class="fa-regular fa-newspaper me-2"></i>Read our articles on:
        </span>
        <div class="d-flex flex-wrap gap-3 align-items-center">
            <?php if (!empty($contact['devto'])): ?>
                <a href="<?= htmlspecialchars($contact['devto']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="Dev.to">
                    <i class="fab fa-dev"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($contact['hashnode'])): ?>
                <a href="<?= htmlspecialchars($contact['hashnode']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="Hashnode">
                    <i class="fa-solid fa-hashtag"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($contact['discord'])): ?>
                <a href="<?= htmlspecialchars($contact['discord']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="Discord">
                    <i class="fa-brands fa-discord"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($contact['producthunt'])): ?>
                <a href="<?= htmlspecialchars($contact['producthunt']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="Product Hunt">
                    <i class="fa-brands fa-product-hunt"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($contact['medium'])): ?>
                <a href="<?= htmlspecialchars($contact['medium']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="Medium">
                    <i class="fa-brands fa-medium"></i>
                </a>
            <?php endif; ?>
            
            <?php if (!empty($contact['github'])): ?>
                <a href="<?= htmlspecialchars($contact['github']) ?>" 
                   target="_blank" rel="noopener noreferrer" 
                   class="platform-link"
                   style="color: #104041; font-size: 22px; transition: all 0.3s;"
                   title="GitHub">
                    <i class="fa-brands fa-github"></i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    /* Social Share Styles */
    .social-share-wrapper {
        padding-top: 20px;
    }
    
    .share-label {
        font-weight: 600;
        color: #104041;
    }
    
    /* Platform Links Hover Effect */
    .platform-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #f8f9fa;
        transition: all 0.3s ease;
        text-decoration: none;
        border: 1px solid #e9ecef;
    }
    
    .platform-link:hover {
        transform: translateY(-3px);
        background: #104041;
        color: #ffffff !important;
        border-color: #104041;
        box-shadow: 0 8px 20px rgba(16, 64, 65, 0.15);
    }
    
    .platform-link:hover i {
        color: #ffffff !important;
    }
    
    /* Share Buttons Hover */
    .share-section .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        opacity: 0.9;
    }
    
    /* Copy Link Button */
    .copy-link-btn:hover {
        background: #104041 !important;
        color: #ffffff !important;
        border-color: #104041 !important;
    }
    
    /* Responsive */
    @media (max-width: 576px) {
        .share-section .btn {
            font-size: 12px;
            padding: 5px 12px;
        }
        
        .platform-link {
            width: 38px;
            height: 38px;
            font-size: 18px !important;
        }
        
        .share-section .d-flex {
            gap: 6px !important;
        }
    }
</style>


            <!-- Author Bio -->
            <div class="author-bio">
              <div class="author-avatar-placeholder">N</div>
              <div>
                <h5><?= htmlspecialchars($blog['author']) ?></h5>
                <p class="author-role">Full-Stack Web Developer &amp; SEO Specialist · Delhi, India</p>
                <p>Nikhil is a passionate web developer with expertise in PHP, Laravel, MERN stack, and digital marketing. He has delivered 100+ projects for clients across UAE, UK, Australia, Canada, and India. He writes practical guides to help businesses grow online.</p>
              </div>
            </div>

            <!-- Comments Section -->
            <div class="space30"></div>
            <h3>
              <?php if ($commentCount > 0): ?>
                <?= $commentCount ?> Comment<?= $commentCount != 1 ? 's' : '' ?>
              <?php else: ?>
                No Comments Yet — Be the First!
              <?php endif; ?>
            </h3>
            <div class="space20"></div>

            <?php if ($commentCount > 0): ?>
              <?php foreach ($approvedComments as $comment): ?>
              <div class="comment-card">
                <div class="commenter-meta">
                  <div class="commenter-avatar"><?= strtoupper(mb_substr($comment['name'], 0, 1)) ?></div>
                  <div>
                    <div class="commenter-name">
                      <?= htmlspecialchars($comment['name']) ?>
                      <?php if (!empty($comment['website'])): ?>
                        <a href="<?= htmlspecialchars($comment['website']) ?>" target="_blank" rel="nofollow noopener"
                           style="font-size:11px;color:#888;font-weight:400;margin-left:8px;">
                          <i class="fa-solid fa-link"></i> website
                        </a>
                      <?php endif; ?>
                    </div>
                    <div class="commenter-date"><?= date('d M Y', strtotime($comment['created_at'])) ?></div>
                  </div>
                </div>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
              </div>
              <?php endforeach; ?>
            <?php endif; ?>

            <!-- Comment Form -->
            <div class="space32"></div>
            <div class="contact-form-area">
              <h4>Leave a Reply</h4>
              <div class="space12"></div>
              <p style="color:#666;font-size:14px;">Your email address will not be published. Comments are reviewed before appearing.</p>
              <div class="space16"></div>

              <?php if ($commentSuccess): ?>
              <div class="comment-success">
                <i class="fa-solid fa-circle-check me-2"></i>
                <strong>Thank you!</strong> Your comment has been received and is awaiting moderation.
              </div>
              <?php endif; ?>

              <?php if ($commentError): ?>
              <div class="comment-error">
                <i class="fa-solid fa-circle-exclamation me-2"></i>
                <?= htmlspecialchars($commentError) ?>
              </div>
              <?php endif; ?>

              <?php if (!$commentSuccess): ?>
              <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="POST" id="commentForm">
                <input type="hidden" name="submit_comment" value="1">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <div class="input-area">
                      <input type="text" name="c_name" placeholder="Your Name *"
                             value="<?= htmlspecialchars($_POST['c_name'] ?? '') ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <div class="input-area">
                      <input type="email" name="c_email" placeholder="Email Address *"
                             value="<?= htmlspecialchars($_POST['c_email'] ?? '') ?>" required>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="input-area">
                      <input type="url" name="c_website" placeholder="Website (optional)"
                             value="<?= htmlspecialchars($_POST['c_website'] ?? '') ?>">
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="input-area">
                      <textarea name="c_comment" placeholder="Write your comment here..." rows="5" required><?= htmlspecialchars($_POST['c_comment'] ?? '') ?></textarea>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="space12"></div>
                    <button type="submit" class="header-btn11">
                      Post Comment <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                  </div>
                </div>
              </form>
              <?php endif; ?>
            </div>

          </div>
        </div>
        <!-- ── End Main Content ── -->

        <!-- ── Sidebar ── -->
        <div class="col-lg-4">
          <div class="blog-sidebar-area">

            <!-- Search -->
            <div class="search-area">
              <h3>Search</h3>
              <form action="<?= $site ?>blogs/" method="GET">
                <input type="text" name="q" placeholder="Search articles...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div>

            <div class="space32"></div>

            <!-- Recent Posts -->
            <div class="posts-area">
              <h3>Recent Posts</h3>
              <?php if (!empty($recentPosts)): ?>
                <?php foreach ($recentPosts as $rp): ?>
                <div class="post-auhtor-area <?= $rp !== reset($recentPosts) ? 'box2' : '' ?>">
                  <div class="img1">
                    <img src="<?= $site ?>admin/uploads/blogs/<?= htmlspecialchars($rp['image']) ?>"
                         alt="<?= htmlspecialchars($rp['title']) ?>"
                         onerror="this.src='<?= $site ?>assets/img/all-images/post-img1.png'">
                  </div>
                  <div class="content">
                    <a href="<?= $site ?>blog/<?= htmlspecialchars($rp['slug_url']) ?>" class="date">
                      <img src="<?= $site ?>assets/img/icons/calender1.svg" alt="">
                      <?= date('d M Y', strtotime($rp['created_at'])) ?>
                    </a>
                    <a href="<?= $site ?>blog/<?= htmlspecialchars($rp['slug_url']) ?>" class="head">
                      <?= htmlspecialchars(mb_substr($rp['title'], 0, 60)) ?><?= mb_strlen($rp['title']) > 60 ? '…' : '' ?>
                    </a>
                  </div>
                </div>
                <?php endforeach; ?>
              <?php else: ?>
                <p style="color:#999;font-size:14px;">No recent posts found.</p>
              <?php endif; ?>
            </div>

            <div class="space32"></div>

            <!-- Popular Tags -->
            <div class="tags-area">
              <h3>Popular Tags</h3>
              <?php if (!empty($allTags)): ?>
              <div class="tag-cloud mt-2">
                <?php foreach ($allTags as $tag): ?>
                <a href="<?= $site ?>blogs/?tag=<?= urlencode($tag) ?>"><?= htmlspecialchars($tag) ?></a>
                <?php endforeach; ?>
              </div>
              <?php else: ?>
              <div class="tag-cloud mt-2">
                <a href="#">Web Development</a>
                <a href="#">PHP</a>
                <a href="#">SEO</a>
                <a href="#">Laravel</a>
                <a href="#">React</a>
              </div>
              <?php endif; ?>
            </div>

            <div class="space32"></div>

            <!-- Contact CTA -->
            <div class="others-area">
              <h3>Need Help? Let's Talk</h3>
              <p style="font-size:13px;color:#666;margin:10px 0 16px;">
                Whether it's a website, SEO, or a full digital strategy — I'm available for projects worldwide.
              </p>
              <div class="btn-area">
                <a href="tel:+91<?= preg_replace('/\D/', '', $contact['phone'] ?? '') ?>"
                   class="header-btn11">
                  <i class="fa-solid fa-phone me-1"></i> Call Now
                  <span><i class="fa-solid fa-arrow-right"></i></span>
                </a>
              </div>
              <div class="mt-2">
                <a href="<?= $site ?>contact/" style="font-size:13px;color:#104041;">
                  Or send a message &rarr;
                </a>
              </div>
            </div>

          </div>
        </div>
        <!-- ── End Sidebar ── -->

      </div>
    </div>
  </div>
  <!--===== BLOG DETAIL ENDS =======-->

  <!--===== RELATED POSTS =======-->
<?php if (!empty($relatedPosts)): ?>
<section class="blog1-section-area sp2 bg-light py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <div class="blog-header-area">
                    <h2 class="mb-2" style="color: #104041; font-weight: 700;">More Blogs &amp; News</h2>
                    <p class="text-muted" style="font-size: 15px;">Keep reading — more useful articles for you</p>
                </div>
            </div>
        </div>
        
        <!-- Related Posts Grid -->
        <div class="row g-4">
            <?php foreach ($relatedPosts as $relatedBlog): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm" style="border-radius: 16px; overflow: hidden; transition: all 0.3s ease;">
                    <!-- Blog Image -->
                    <div class="card-img-top" style="height: 220px; overflow: hidden; background: #f8f9fa; position: relative;">
                        <img 
                            src="<?= $site ?>admin/uploads/blogs/<?= htmlspecialchars($relatedBlog['image']) ?>"
                            alt="<?= htmlspecialchars($relatedBlog['title']) ?>"
                            class="w-100 h-100"
                            style="object-fit: cover; transition: all 0.3s ease;"
                            onerror="this.src='<?= $site ?>assets/img/all-images/post-img1.png'"
                            loading="lazy"
                        >
                        <!-- Optional Category Badge -->
                        <?php if (!empty($relatedBlog['category'])): ?>
                        <span class="position-absolute top-0 start-0 m-3 badge" 
                              style="background: #104041; padding: 6px 14px; font-weight: 500; border-radius: 50px;">
                            <?= htmlspecialchars($relatedBlog['category']) ?>
                        </span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Blog Content -->
                    <div class="card-body d-flex flex-column p-4">
                        <!-- Meta Info -->
                        <div class="d-flex align-items-center gap-3 mb-2" style="font-size: 13px; color: #6c757d;">
                            <?php if (!empty($relatedBlog['author'])): ?>
                            <span>
                                <i class="fa-regular fa-user me-1" style="color: #104041;"></i>
                                <?= htmlspecialchars($relatedBlog['author']) ?>
                            </span>
                            <?php endif; ?>
                            
                            <span>
                                <i class="fa-regular fa-calendar me-1" style="color: #104041;"></i>
                                <?= date('d M Y', strtotime($relatedBlog['created_at'])) ?>
                            </span>
                            
                            <?php if (!empty($relatedBlog['read_time'])): ?>
                            <span>
                                <i class="fa-regular fa-clock me-1" style="color: #104041;"></i>
                                <?= htmlspecialchars($relatedBlog['read_time']) ?> min read
                            </span>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Title -->
                        <h5 class="card-title mb-2" style="font-weight: 600; font-size: 18px; line-height: 1.4;">
                            <a href="<?= $site ?>blog/<?= htmlspecialchars($relatedBlog['slug_url']) ?>" 
                               class="text-decoration-none" 
                               style="color: #104041; transition: color 0.3s;">
                                <?= htmlspecialchars($relatedBlog['title']) ?>
                            </a>
                        </h5>
                        
                        <!-- Excerpt -->
                        <p class="card-text text-muted flex-grow-1" style="font-size: 14px; line-height: 1.6;">
                            <?php 
                            $description = $relatedBlog['meta_description'] ?? $relatedBlog['short_description'] ?? '';
                            echo htmlspecialchars(mb_substr($description, 0, 100));
                            echo mb_strlen($description) > 100 ? '…' : '';
                            ?>
                        </p>
                        
                        <!-- Read More Link -->
                        <div class="mt-3 pt-2 border-top" style="border-color: #f0f0f0 !important;">
                            <a href="<?= $site ?>blog/<?= htmlspecialchars($relatedBlog['slug_url']) ?>" 
                               class="text-decoration-none fw-semibold d-inline-flex align-items-center gap-2"
                               style="color: #104041; font-size: 14px; transition: all 0.3s;">
                                Read More
                                <i class="fa-solid fa-arrow-right" style="font-size: 12px; transition: transform 0.3s;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    /* Card Hover Effects */
    .blog1-section-area .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.10) !important;
    }
    
    .blog1-section-area .card:hover .card-img-top img {
        transform: scale(1.05);
    }
    
    .blog1-section-area .card-title a:hover {
        color: #1a6b6d !important;
    }
    
    .blog1-section-area .readmore-link:hover i {
        transform: translateX(5px);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .blog1-section-area .card-img-top {
            height: 180px !important;
        }
        
        .blog1-section-area .card-body {
            padding: 20px !important;
        }
        
        .blog1-section-area .card-title {
            font-size: 16px !important;
        }
    }
    
    @media (max-width: 576px) {
        .blog1-section-area .card-img-top {
            height: 160px !important;
        }
        
        .blog1-section-area .d-flex.align-items-center.gap-3 {
            flex-wrap: wrap;
            gap: 6px !important;
            font-size: 12px !important;
        }
    }
</style>
<?php endif; ?>
<!--===== RELATED POSTS ENDS =======-->

  <!--===== CTA =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">
              Contact Nikhil Gupta<br class="d-md-block d-none">
              Professional Web Developer &amp; SEO Expert
            </h2>
            <p data-aos="fade-up" data-aos-duration="1000">
              Looking to build a website, rank on Google, or grow your business online?
              I work with clients in UAE, UK, Australia, Canada, India &amp; 30+ countries.
              <br class="d-md-block d-none">Reach out — I usually respond within 24 hours.
            </p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">
                Get A Free Consultation <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA ENDS =======-->

  <?php include_once "includes/footer.php" ?>


  <!-- Blog content heading enhancer -->
  <script>
  (function() {
    var contentBody = document.querySelector('.blog-content-body');
    if (!contentBody) return;
    var paras = contentBody.querySelectorAll('p');
    paras.forEach(function(p) {
      var text = p.textContent.trim();
      var wordCount = text.split(/\s+/).length;
      var hasChild = p.children.length > 0;
      // Detect section headings: short text (< 12 words), no nested tags, ends without punctuation
      if (wordCount < 12 && !hasChild && text.length > 5 && !/[.!?,]$/.test(text)) {
        var isNumberedItem = /^\d+\./.test(text);
        if (isNumberedItem) {
          // Numbered items like "1. World-Class Skills..."
          p.style.cssText = 'font-size:19px;font-weight:700;color:#104041;margin-top:32px;margin-bottom:10px;line-height:1.4;';
        } else {
          // Section headings like "Why International Clients Trust..."
          p.style.cssText = 'font-size:22px;font-weight:800;color:#1a2433;margin-top:40px;margin-bottom:14px;line-height:1.35;padding-bottom:8px;border-bottom:2px solid #f0f4f8;';
        }
      }
    });
  })();
  </script>
  
  
<script>
// Copy to clipboard function
function copyToClipboard(text) {
    // Use modern clipboard API if available
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => {
            showCopyNotification('Link copied to clipboard!');
        }).catch(() => {
            fallbackCopy(text);
        });
    } else {
        fallbackCopy(text);
    }
}

function fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.opacity = '0';
    textarea.style.left = '-9999px';
    textarea.style.top = '-9999px';
    document.body.appendChild(textarea);
    textarea.select();
    try {
        document.execCommand('copy');
        showCopyNotification('Link copied to clipboard!');
    } catch (e) {
        showCopyNotification('Failed to copy link. Please copy manually.');
    }
    document.body.removeChild(textarea);
}

function showCopyNotification(message) {
    // Create notification element
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #104041;
        color: #ffffff;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        z-index: 9999;
        box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        animation: slideUp 0.3s ease;
    `;
    document.body.appendChild(notification);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transition = 'opacity 0.3s';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Add slideUp animation
const styleSheet = document.createElement("style");
styleSheet.textContent = `
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateX(-50%) translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    }
`;
document.head.appendChild(styleSheet);
</script>
</body>
</html>
