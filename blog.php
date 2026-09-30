<?php
include "config/connect.php";
include_once "util/function.php";

$limit = 24;
$blogs = get_blog($limit);
$canonical = $site . "blogs/";
$is_tag_page = !empty($_GET['tag']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-1HVPGR81RL');
  </script>

  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="robots" content="index, follow">
  <title>Engineering & SEO Insights | NikhilWorks Tech Blog</title>
  <meta name="description" content="Read in-depth guides and actionable articles on Web Development, PHP, Laravel, WordPress, SEO strategies, Core Web Vitals, and conversion optimization by Nikhil Gupta.">
  <meta name="keywords" content="web development blog, SEO tips, Laravel tutorials, PHP development guide, WordPress optimization, Core Web Vitals guide, NikhilWorks">

  <!-- Canonical -->
  <link rel="canonical" href="<?= $canonical ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="Engineering & SEO Insights | NikhilWorks Tech Blog">
  <meta property="og:description" content="Read expert guides on Web Development, SEO strategies, Core Web Vitals, and conversion optimization.">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.png">
  <meta property="og:url" content="<?= $canonical ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Engineering & SEO Insights | NikhilWorks Tech Blog">
  <meta name="twitter:description" content="Read expert guides on Web Development, SEO strategies, Core Web Vitals, and conversion optimization.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/preview.png">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?= rtrim($site, '/') ?>/"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Blogs",
        "item": "<?= $canonical ?>"
      }
    ]
  }
  </script>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* ---- HERO SECTION ---- */
    .blogs-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 85px;
      overflow: hidden;
      color: #fff;
    }

    .blogs-hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
      letter-spacing: 0.3px;
    }

    .blogs-hero h1 {
      font-size: clamp(2.1rem, 4vw, 3.2rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }

    .blogs-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 680px;
      margin: 0 auto;
    }

    /* ---- MODERN BLOG CARDS ---- */
    .blog-card-modern {
      background: #ffffff;
      border-radius: 18px;
      border: 1px solid #e2eceb;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
      box-shadow: 0 8px 24px rgba(16, 64, 65, 0.04);
    }
    .blog-card-modern:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 45px rgba(16, 64, 65, 0.12);
      border-color: rgba(173, 255, 28, 0.6);
    }

    .blog-thumb-wrap {
      position: relative;
      height: 220px;
      overflow: hidden;
      background: #0a2728;
    }
    .blog-thumb-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .blog-card-modern:hover .blog-thumb-wrap img {
      transform: scale(1.08);
    }

    .blog-thumb-overlay {
      position: absolute;
      top: 14px;
      left: 14px;
      display: flex;
      gap: 8px;
    }
    .blog-badge-tag {
      background: rgba(8, 34, 35, 0.85);
      border: 1px solid rgba(173, 255, 28, 0.4);
      color: #ADFF1C;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 12px;
      border-radius: 30px;
      backdrop-filter: blur(6px);
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .blog-body-modern {
      padding: 24px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }

    .blog-meta-row {
      display: flex;
      align-items: center;
      gap: 14px;
      font-size: 13px;
      color: #7b9493;
      margin-bottom: 12px;
    }
    .blog-meta-row span {
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .blog-meta-row i {
      color: #104041;
    }

    .blog-title-link {
      font-size: 1.22rem;
      font-weight: 700;
      color: #0f2d2e;
      line-height: 1.38;
      margin-bottom: 12px;
      text-decoration: none;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      transition: color 0.25s ease;
    }
    .blog-title-link:hover {
      color: #104041;
      text-decoration: none;
    }

    .blog-desc-text {
      color: #557273;
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 20px;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
      overflow: hidden;
    }

    .blog-card-footer-modern {
      margin-top: auto;
      padding-top: 16px;
      border-top: 1px solid #edf4f3;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .blog-read-btn {
      color: #104041;
      font-weight: 700;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .blog-read-btn:hover {
      color: #082223;
      gap: 10px;
    }
    .blog-read-btn i {
      color: #104041;
      transition: transform 0.25s ease;
    }
    .blog-card-modern:hover .blog-read-btn i {
      transform: translateX(4px);
    }

    .blog-author-avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #104041;
      color: #ADFF1C;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
    }

    /* ---- CTA BANNER ---- */
    .blog-cta-banner {
      background: radial-gradient(circle at 90% 10%, rgba(173, 255, 28, 0.16) 0%, transparent 40%),
                  linear-gradient(135deg, #051617 0%, #0d3536 100%);
      padding: 85px 0;
      color: #ffffff;
      text-align: center;
      border-radius: 24px;
      margin: 40px 0;
    }
    .btn-lime {
      background: #ADFF1C;
      color: #082223 !important;
      font-weight: 700;
      padding: 14px 28px;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      transition: all 0.3s ease;
      border: none;
      text-decoration: none;
    }
    .btn-lime:hover {
      background: #c3ff4f;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(173, 255, 28, 0.35);
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="blogs-hero">
    <div class="container">
      <div class="row text-center">
        <div class="col-lg-9 mx-auto">
          <div class="blogs-hero-pill">
            <i class="fa-solid fa-code"></i> Web Architecture, SEO &amp; Growth Insights
          </div>
          <h1>Technical Insights &amp; Growth Guides</h1>
          <p class="blogs-hero-sub">
            Practical strategies, in-depth tutorials on modern web development, search engine optimization, Core Web Vitals tuning, and revenue-driven engineering.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== BLOG LISTING STARTS =======-->
  <section class="py-5" style="background: #f8fbfb;">
    <div class="container py-4">
      <div class="row g-4">
        <?php if (!empty($blogs)): ?>
          <?php foreach ($blogs as $blog):
            $articleUrl = $site . 'blog/' . htmlspecialchars($blog['slug_url']) . '/';
            $blogImg = !empty($blog['image']) && file_exists(__DIR__ . '/admin/uploads/blogs/' . $blog['image'])
                          ? $site . 'admin/uploads/blogs/' . htmlspecialchars($blog['image'])
                          : $site . 'assets/img/all-images/post-img1.png';
            $authorName = !empty($blog['author']) ? $blog['author'] : 'Nikhil Gupta';
            $authorInitial = strtoupper(substr($authorName, 0, 1));
            $publishDate = !empty($blog['created_at']) ? date('M d, Y', strtotime($blog['created_at'])) : date('M d, Y');
            $desc = !empty($blog['meta_description']) ? $blog['meta_description'] : strip_tags($blog['content'] ?? '');
          ?>
            <div class="col-lg-4 col-md-6">
              <div class="blog-card-modern">
                <div class="blog-thumb-wrap">
                  <a href="<?= $articleUrl ?>">
                    <img src="<?= $blogImg ?>" alt="<?= htmlspecialchars($blog['title']) ?>" loading="lazy">
                  </a>
                  <div class="blog-thumb-overlay">
                    <span class="blog-badge-tag">Tech &amp; SEO</span>
                  </div>
                </div>

                <div class="blog-body-modern">
                  <div class="blog-meta-row">
                    <span><i class="fa-regular fa-calendar"></i> <?= $publishDate ?></span>
                    <span><i class="fa-regular fa-clock"></i> 5 min read</span>
                  </div>

                  <a href="<?= $articleUrl ?>" class="blog-title-link">
                    <?= htmlspecialchars($blog['title']) ?>
                  </a>

                  <p class="blog-desc-text">
                    <?= htmlspecialchars($desc) ?>
                  </p>

                  <div class="blog-card-footer-modern">
                    <div class="d-flex align-items-center gap-2">
                      <div class="blog-author-avatar"><?= $authorInitial ?></div>
                      <span style="font-size:13px;font-weight:600;color:#0f2d2e;"><?= htmlspecialchars($authorName) ?></span>
                    </div>
                    <a href="<?= $articleUrl ?>" class="blog-read-btn">
                      <span>Read</span>
                      <i class="fa-solid fa-arrow-right fa-xs"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5">
            <i class="fa-solid fa-newspaper fa-3x mb-3 text-muted"></i>
            <h4>No Articles Published Yet</h4>
            <p class="text-muted">Stay tuned for new web engineering and SEO guides.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!--===== BLOG LISTING ENDS =======-->

  <!--===== CTA BANNER STARTS =======-->
  <div class="container">
    <div class="blog-cta-banner">
      <div class="container px-4">
        <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(173,255,28,0.15);color:#ADFF1C;font-weight:700;">GROW YOUR ONLINE BUSINESS</div>
        <h2 class="text-white fw-bold mb-3" style="font-size:clamp(1.8rem, 3.5vw, 2.6rem);">Need an Expert Web Developer or SEO Strategist?</h2>
        <p class="text-light mb-4" style="font-size:1.15rem;max-width:680px;margin:0 auto;color:#d1e7e4 !important;">
          Whether you need a high-speed custom website, Laravel application, CRM, or rank-improving SEO campaign — let's make it happen.
        </p>
        <div class="d-flex justify-content-center gap-3">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get A Free Consultation</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA BANNER ENDS =======-->

  <?php include_once "includes/footer.php" ?>

</body>
</html>
