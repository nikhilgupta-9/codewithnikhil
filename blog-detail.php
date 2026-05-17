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
            <div class="social-share">
              <span class="share-label">Share this article:</span>
              <a href="https://api.whatsapp.com/send?text=<?= urlencode($metaTitle . ' ' . $canonicalURL) ?>"
                 target="_blank" rel="noopener" class="share-btn share-wa">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp
              </a>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($canonicalURL) ?>"
                 target="_blank" rel="noopener" class="share-btn share-fb">
                <i class="fa-brands fa-facebook-f"></i> Facebook
              </a>
              <a href="https://twitter.com/intent/tweet?url=<?= urlencode($canonicalURL) ?>&text=<?= urlencode($metaTitle) ?>"
                 target="_blank" rel="noopener" class="share-btn share-tw">
                <i class="fa-brands fa-x-twitter"></i> X / Twitter
              </a>
              <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($canonicalURL) ?>"
                 target="_blank" rel="noopener" class="share-btn share-li">
                <i class="fa-brands fa-linkedin-in"></i> LinkedIn
              </a>
            </div>

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
  <div class="blog1-scetion-area sp2 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="blog-hedaer-area heading2 text-center">
            <h2>More Blogs &amp; News</h2>
            <p style="color:#666;font-size:15px;">Keep reading — more useful articles for you</p>
          </div>
        </div>
      </div>
      <div class="space30"></div>
      <div class="row">
        <?php foreach ($relatedPosts as $relatedBlog): ?>
        <div class="col-lg-4 col-md-6">
          <div class="blog-author-boxarea">
            <div class="img1">
              <img src="<?= $site ?>admin/uploads/blogs/<?= htmlspecialchars($relatedBlog['image']) ?>"
                   alt="<?= htmlspecialchars($relatedBlog['title']) ?>"
                   onerror="this.src='<?= $site ?>assets/img/all-images/post-img1.png'">
            </div>
            <div class="content-area">
              <div class="tags-area">
                <ul>
                  <li>
                    <a href="#">
                      <img src="<?= $site ?>assets/img/icons/contact1.svg" alt="">
                      <?= htmlspecialchars($relatedBlog['author']) ?>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <img src="<?= $site ?>assets/img/icons/calender1.svg" alt="">
                      <?= date('d M Y', strtotime($relatedBlog['created_at'])) ?>
                    </a>
                  </li>
                </ul>
              </div>
              <a href="<?= $site ?>blog/<?= htmlspecialchars($relatedBlog['slug_url']) ?>">
                <?= htmlspecialchars($relatedBlog['title']) ?>
              </a>
              <p><?= htmlspecialchars(mb_substr($relatedBlog['meta_description'] ?? '', 0, 100)) ?><?= mb_strlen($relatedBlog['meta_description'] ?? '') > 100 ? '…' : '' ?></p>
              <a href="<?= $site ?>blog/<?= htmlspecialchars($relatedBlog['slug_url']) ?>" class="readmore">
                Read More <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
          <div class="space30"></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
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

</body>
</html>
