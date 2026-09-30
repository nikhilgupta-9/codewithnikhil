<?php
include "config/connect.php";
include_once "util/function.php";

$portfolios = get_portfolio();
$projectCount = count_portfolio_projects();
if ($projectCount < 25) $projectCount = 35;
$yearsExperience = years_in_business(2022, 8);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-1HVPGR81RL');
  </script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Web Development Portfolio | NikhilWorks — Projects for USA, UAE, UK, Australia & More</title>
  <meta name="description" content="Explore Nikhil Gupta's web development portfolio — PHP, Laravel, MERN Stack & WordPress projects for clients in USA, UAE, UK, Australia, Canada, South Africa & Europe.">
  <meta name="keywords" content="web development portfolio, PHP developer UAE, Laravel developer Australia, web developer UK, affordable web developer Canada, MERN stack developer South Africa, remote web developer India, web developer Dubai, NikhilWorks portfolio">

  <!-- Canonical & hreflang -->
  <link rel="canonical" href="<?= $site ?>portfolio/">
  <link rel="alternate" hreflang="en" href="<?= $site ?>portfolio/">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>portfolio/">

  <!-- Open Graph -->
  <meta property="og:title" content="Web Development Portfolio | NikhilWorks — Remote Developer for Global Clients">
  <meta property="og:description" content="PHP, Laravel, MERN Stack & WordPress projects for clients in USA, UAE, UK, Australia, Canada, Europe & Africa. Affordable, professional, remote.">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.png">
  <meta property="og:url" content="<?= $site ?>portfolio/">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Web Development Portfolio | NikhilWorks — Global Projects">
  <meta name="twitter:description" content="PHP, Laravel & MERN Stack projects for USA, UAE, UK, Australia, Canada, Africa & Asia clients.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/preview.png">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/magnific-popup.css">
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
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= $site ?>"},
      {"@type": "ListItem", "position": 2, "name": "Portfolio", "item": "<?= $site ?>portfolio/"}
    ]
  }
  </script>

  <!-- Schema: ProfessionalService -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks",
    "url": "<?= $site ?>",
    "image": "<?= $site ?>assets/img/logo/preloader4.png",
    "telephone": "+91-8368552640",
    "email": "contact@nikhilworks.com",
    "description": "Professional web development services by Nikhil Gupta — PHP, Laravel, MERN Stack, WordPress — serving clients in USA, UAE, UK, Australia, Canada, and worldwide.",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "New Delhi",
      "addressRegion": "Delhi",
      "addressCountry": "IN"
    }
  }
  </script>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-dark-surface: #0a2728;
      --nw-border: #e1eceb;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* ---- MODERN HERO ---- */
    .portfolio-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 85px;
      overflow: hidden;
      color: #fff;
    }

    .portfolio-hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 7px 16px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 22px;
      backdrop-filter: blur(8px);
      letter-spacing: 0.3px;
    }

    .portfolio-hero h1 {
      font-size: clamp(2.2rem, 4.2vw, 3.4rem);
      font-weight: 800;
      line-height: 1.18;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }

    .portfolio-hero-sub {
      font-size: 1.15rem;
      line-height: 1.7;
      color: #c4dedb;
      max-width: 720px;
      margin: 0 auto 30px;
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

    .btn-outline-glass {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff !important;
      border: 1px solid rgba(255, 255, 255, 0.25);
      font-weight: 600;
      padding: 14px 28px;
      border-radius: 10px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      text-decoration: none;
      backdrop-filter: blur(8px);
    }
    .btn-outline-glass:hover {
      background: rgba(255, 255, 255, 0.18);
      border-color: rgba(255, 255, 255, 0.5);
      transform: translateY(-2px);
    }

    /* ---- STATS BAR ---- */
    .portfolio-stats-bar {
      background: #082223;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 30px 0;
    }
    .portfolio-stat-card {
      text-align: center;
      padding: 15px 10px;
      border-right: 1px solid rgba(255, 255, 255, 0.08);
    }
    .portfolio-stat-card:last-child {
      border-right: none;
    }
    .portfolio-stat-val {
      font-size: clamp(2rem, 3.5vw, 2.7rem);
      font-weight: 800;
      color: #ADFF1C;
      line-height: 1;
      margin-bottom: 6px;
    }
    .portfolio-stat-label {
      color: #b7cfcb;
      font-size: 0.9rem;
      margin: 0;
      font-weight: 500;
    }

    /* ---- MODERN FILTER PILLS ---- */
    .portfolio-filter-wrap {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-bottom: 40px;
    }
    .portfolio-filter-btn {
      background: #ffffff;
      border: 1px solid #d4e3e2;
      color: #104041;
      padding: 10px 22px;
      border-radius: 50px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 2px 8px rgba(16, 64, 65, 0.04);
    }
    .portfolio-filter-btn:hover {
      border-color: #104041;
      color: #104041;
      transform: translateY(-2px);
    }
    .portfolio-filter-btn.active {
      background: #104041;
      color: #ADFF1C;
      border-color: #104041;
      box-shadow: 0 6px 18px rgba(16, 64, 65, 0.2);
    }

    /* ---- MODERN PROJECT CARDS ---- */
    .project-card {
      background: #ffffff;
      border-radius: 18px;
      border: 1px solid #e2eceb;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
      box-shadow: 0 10px 30px rgba(16, 64, 65, 0.05);
    }
    .project-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 22px 50px rgba(16, 64, 65, 0.14);
      border-color: rgba(173, 255, 28, 0.6);
    }

    /* BROWSER BAR */
    .browser-header-bar {
      background: #082223;
      padding: 10px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }
    .browser-dots {
      display: flex;
      gap: 6px;
    }
    .browser-dot {
      width: 9px;
      height: 9px;
      border-radius: 50%;
    }
    .browser-dot.red { background: #ff5f56; }
    .browser-dot.yellow { background: #ffbd2e; }
    .browser-dot.green { background: #27c93f; }
    .browser-url-pill {
      font-size: 11px;
      color: #9cb5b4;
      background: rgba(255, 255, 255, 0.08);
      padding: 2px 10px;
      border-radius: 12px;
      max-width: 190px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    /* CARD IMAGE */
    .project-img-wrap {
      position: relative;
      height: 230px;
      overflow: hidden;
      background: #0a2728;
    }
    .project-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top;
      transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .project-card:hover .project-img-wrap img {
      transform: scale(1.07);
    }

    .project-img-overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(8, 34, 35, 0.82);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      opacity: 0;
      transition: opacity 0.3s ease;
      backdrop-filter: blur(4px);
    }
    .project-card:hover .project-img-overlay {
      opacity: 1;
    }

    .overlay-action-btn {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: #ADFF1C;
      color: #082223;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .overlay-action-btn:hover {
      background: #ffffff;
      color: #104041;
      transform: translateY(-3px) scale(1.08);
    }

    /* CARD BODY */
    .project-body {
      padding: 24px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .project-cat-badge {
      display: inline-block;
      align-self: flex-start;
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      border: 1px solid rgba(16, 64, 65, 0.15);
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      padding: 4px 12px;
      border-radius: 20px;
      margin-bottom: 12px;
    }
    .project-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: #0f2d2e;
      margin-bottom: 10px;
      line-height: 1.35;
    }
    .project-desc {
      color: #557273;
      font-size: 14px;
      line-height: 1.6;
      margin-bottom: 18px;
    }

    .project-tags-wrap {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-top: auto;
      padding-top: 15px;
      border-top: 1px solid #edf4f3;
    }
    .project-tag {
      background: #f2f7f6;
      color: #104041;
      font-size: 11px;
      font-weight: 600;
      padding: 3px 10px;
      border-radius: 12px;
    }

    .project-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: 16px;
    }
    .btn-live-preview {
      background: #104041;
      color: #ADFF1C !important;
      padding: 8px 16px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      transition: all 0.25s ease;
      flex: 1;
      justify-content: center;
    }
    .btn-live-preview:hover {
      background: #082223;
      color: #ffffff !important;
      transform: translateY(-2px);
    }
    .btn-card-inquire {
      background: #25D366;
      color: #ffffff !important;
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      text-decoration: none;
      transition: all 0.25s ease;
    }
    .btn-card-inquire:hover {
      background: #1da851;
      transform: translateY(-2px);
    }

    /* ---- REGION & COUNTRIES SECTION ---- */
    .region-card-box {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 16px;
      padding: 24px;
      height: 100%;
      box-shadow: 0 4px 18px rgba(16, 64, 65, 0.04);
      transition: all 0.3s ease;
    }
    .region-card-box:hover {
      border-color: #104041;
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(16, 64, 65, 0.1);
    }
    .region-card-title {
      font-size: 14px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #104041;
      border-bottom: 2px solid #ADFF1C;
      padding-bottom: 8px;
      margin-bottom: 16px;
      display: inline-block;
    }
    .country-chip {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #f3f8f7;
      border: 1px solid #d9e8e6;
      border-radius: 30px;
      padding: 5px 12px;
      margin: 3px;
      font-size: 13px;
      font-weight: 600;
      color: #104041;
      transition: all 0.25s ease;
    }
    .country-chip:hover {
      background: #104041;
      color: #ADFF1C;
      border-color: #104041;
      transform: translateY(-2px);
    }

    /* ---- WHY HIRE CARDS ---- */
    .why-hire-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 16px;
      padding: 30px 24px;
      height: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 6px 20px rgba(16, 64, 65, 0.04);
    }
    .why-hire-card:hover {
      border-color: #ADFF1C;
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.12);
      transform: translateY(-6px);
    }
    .why-icon-box {
      width: 54px;
      height: 54px;
      border-radius: 14px;
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    .why-hire-card:hover .why-icon-box {
      background: #104041;
      color: #ADFF1C;
    }

    /* PAYMENT BADGES */
    .payment-chip {
      background: #ffffff;
      border: 1px solid #d4e5e3;
      border-radius: 10px;
      padding: 10px 20px;
      font-size: 14px;
      font-weight: 700;
      color: #104041;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 2px 8px rgba(16, 64, 65, 0.04);
    }

    /* ---- CTA SECTION ---- */
    .portfolio-cta-banner {
      background: radial-gradient(circle at 90% 10%, rgba(173, 255, 28, 0.16) 0%, transparent 40%),
                  linear-gradient(135deg, #051617 0%, #0d3536 100%);
      padding: 85px 0;
      color: #ffffff;
      text-align: center;
      border-radius: 24px;
      margin: 40px 0;
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="portfolio-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row align-items-center text-center">
        <div class="col-lg-9 mx-auto">
          <div class="portfolio-hero-pill">
            <i class="fa-solid fa-layer-group"></i> Handcrafted Web & App Engineering Showcase
          </div>
          <h1>Real Projects. Proven Results. Global Reach.</h1>
          <p class="portfolio-hero-sub">
            Explore custom web applications, high-converting eCommerce stores, CRMs, and responsive business platforms developed for clients across <strong>USA, UAE, UK, Australia, Canada, and India</strong>.
          </p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= $site ?>contact/" class="btn-lime">
              <span>Start Your Project</span>
              <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20saw%20your%20portfolio%20and%20want%20to%20discuss%20a%20new%20project."
               class="btn-outline-glass" target="_blank" rel="noopener">
              <i class="fa-brands fa-whatsapp text-success"></i>
              <span>Chat on WhatsApp</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== GLOBAL STATS BAR =======-->
  <section class="portfolio-stats-bar">
    <div class="container">
      <div class="row g-3 justify-content-center">
        <div class="col-6 col-md-3">
          <div class="portfolio-stat-card">
            <div class="portfolio-stat-val"><?= $projectCount ?>+</div>
            <p class="portfolio-stat-label">Projects Delivered</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="portfolio-stat-card">
            <div class="portfolio-stat-val">20+</div>
            <p class="portfolio-stat-label">Countries Served</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="portfolio-stat-card">
            <div class="portfolio-stat-val"><?= $yearsExperience ?>+</div>
            <p class="portfolio-stat-label">Years Experience</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="portfolio-stat-card">
            <div class="portfolio-stat-val">100%</div>
            <p class="portfolio-stat-label">On-Time SLA Guarantee</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== GLOBAL STATS BAR END =======-->

  <!--===== PORTFOLIO SHOWCASE AREA STARTS =======-->
  <section class="py-5" style="background: #f8fbfb;">
    <div class="container py-3">

      <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">CURATED WORK</div>
        <h2 class="fw-bold" style="color:#0f2d2e;font-size:clamp(1.9rem, 3.2vw, 2.5rem);">Featured Client Case Studies</h2>
        <p class="text-muted mt-2" style="max-width: 680px; margin: 0 auto; font-size: 1.05rem;">
          Every project is built with clean architecture, fast loading speed, mobile-responsiveness, and SEO-friendly markup.
        </p>
      </div>

      <?php
      /*
       * Fetch all categories linked with portfolio products
       */
      $sql_cats = "SELECT `cate_id`, `slug_url`, `categories`
                   FROM `sub_categories`
                   WHERE `parent_id` = '30797'
                   ORDER BY `categories` ASC";
      $res_cats = mysqli_query($conn, $sql_cats);
      $subCatMap = [];   // cate_id => slug_url
      $subCatName = [];  // cate_id => display name
      $filterCategories = []; // slug_url => display name

      if ($res_cats) {
        while ($sc = mysqli_fetch_assoc($res_cats)) {
          $subCatMap[$sc['cate_id']] = $sc['slug_url'];
          $subCatName[$sc['cate_id']] = $sc['categories'];
          $filterCategories[$sc['slug_url']] = $sc['categories'];
        }
      }
      ?>

      <!-- Filter Buttons -->
      <div class="portfolio-filter-wrap" data-aos="fade-up" data-aos-duration="900">
        <button class="portfolio-filter-btn active" data-filter="all">All Projects (<?= count($portfolios) ?>)</button>
        <?php foreach ($filterCategories as $slug => $label): ?>
          <button class="portfolio-filter-btn" data-filter="<?= htmlspecialchars($slug) ?>">
            <?= htmlspecialchars($label) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Portfolio Grid -->
      <div class="row g-4" id="portfolioGrid">
        <?php if (!empty($portfolios)): ?>
          <?php foreach ($portfolios as $portfolio):
            $cateId = $portfolio['pro_sub_cate'] ?? '';
            $categorySlug = $subCatMap[$cateId] ?? 'web-development';
            $categoryLabel = $subCatName[$cateId] ?? (!empty($portfolio['pro_name']) ? $portfolio['pro_name'] : 'Web Project');
            
            $displayName = !empty($portfolio['brand_name'])
                              ? $portfolio['brand_name']
                              : (!empty($portfolio['pro_name']) ? $portfolio['pro_name'] : 'Web Project');
            
            $rawDesc = strip_tags($portfolio['short_desc'] ?? $portfolio['description'] ?? '');
            $shortDesc = !empty($rawDesc) ? substr($rawDesc, 0, 115) . '…' : 'High-performance web development with custom UI and responsive layout.';

            $imgPath = !empty($portfolio['pro_img']) && file_exists(__DIR__ . '/admin/assets/img/uploads/' . $portfolio['pro_img'])
                          ? $site . 'admin/assets/img/uploads/' . htmlspecialchars($portfolio['pro_img'])
                          : $site . 'assets/img/all-images/service-img1.png';
            
            $isLiveUrl = !empty($portfolio['slug_url']) && (str_starts_with($portfolio['slug_url'], 'http://') || str_starts_with($portfolio['slug_url'], 'https://'));
            $liveUrl = $isLiveUrl ? $portfolio['slug_url'] : '';
            
            $domainPill = $isLiveUrl ? parse_url($liveUrl, PHP_URL_HOST) : 'nikhilworks.com/portfolio';
            $waProjectMsg = urlencode("Hi Nikhil, I saw your portfolio project '{$displayName}' and would like to discuss building something similar for my business.");
          ?>
          
          <div class="col-lg-4 col-md-6 portfolio-col" data-category="<?= htmlspecialchars($categorySlug) ?>">
            <div class="project-card">
              <!-- Browser Header -->
              <div class="browser-header-bar">
                <div class="browser-dots">
                  <span class="browser-dot red"></span>
                  <span class="browser-dot yellow"></span>
                  <span class="browser-dot green"></span>
                </div>
                <div class="browser-url-pill"><?= htmlspecialchars($domainPill) ?></div>
              </div>

              <!-- Project Image with Actions -->
              <div class="project-img-wrap">
                <img src="<?= $imgPath ?>"
                     alt="<?= htmlspecialchars($displayName) ?> — Web Development by NikhilWorks"
                     loading="lazy">
                <div class="project-img-overlay">
                  <a href="<?= $imgPath ?>" class="overlay-action-btn image-popup" title="Preview Full Screenshot">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </a>
                  <?php if ($isLiveUrl): ?>
                    <a href="<?= htmlspecialchars($liveUrl) ?>" target="_blank" rel="noopener noreferrer" class="overlay-action-btn" title="Open Live Website">
                      <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                  <?php endif; ?>
                  <a href="https://wa.me/918368552640?text=<?= $waProjectMsg ?>" target="_blank" rel="noopener noreferrer" class="overlay-action-btn" title="Inquire About This Project">
                    <i class="fa-brands fa-whatsapp"></i>
                  </a>
                </div>
              </div>

              <!-- Project Body -->
              <div class="project-body">
                <span class="project-cat-badge"><?= htmlspecialchars($categoryLabel) ?></span>
                <h3 class="project-title"><?= htmlspecialchars($displayName) ?></h3>
                <p class="project-desc"><?= htmlspecialchars($shortDesc) ?></p>

                <div class="project-tags-wrap">
                  <span class="project-tag">⚡ Fast Load</span>
                  <span class="project-tag">📱 Mobile-First</span>
                  <span class="project-tag">🔒 SSL Secured</span>
                </div>

                <div class="project-card-footer">
                  <?php if ($isLiveUrl): ?>
                    <a href="<?= htmlspecialchars($liveUrl) ?>" target="_blank" rel="noopener noreferrer" class="btn-live-preview">
                      <span>Visit Live Site</span>
                      <i class="fa-solid fa-arrow-up-right-from-square fa-xs"></i>
                    </a>
                  <?php else: ?>
                    <a href="<?= $site ?>contact/" class="btn-live-preview">
                      <span>Request Demo</span>
                      <i class="fa-solid fa-envelope fa-xs"></i>
                    </a>
                  <?php endif; ?>
                  <a href="https://wa.me/918368552640?text=<?= $waProjectMsg ?>" target="_blank" rel="noopener noreferrer" class="btn-card-inquire" title="Inquire on WhatsApp">
                    <i class="fa-brands fa-whatsapp"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center py-5">
            <i class="fa-solid fa-folder-open fa-3x mb-3 text-muted"></i>
            <h4>Portfolio Updating</h4>
            <p class="text-muted">We are refreshing our latest client case studies. <a href="<?= $site ?>contact/" style="color:#104041;font-weight:700;">Get in touch</a> to request custom samples!</p>
          </div>
        <?php endif; ?>

        <!-- Filter Empty State -->
        <div class="col-12 text-center py-5 d-none" id="filterNoResults">
          <i class="fa-solid fa-filter-circle-xmark fa-3x mb-3" style="color:#adb5bd;"></i>
          <h5 class="text-muted">No projects found in this category yet.</h5>
          <p class="text-muted">Contact us to see tailored case studies in this tech stack.</p>
        </div>
      </div>

    </div>
  </section>
  <!--===== PORTFOLIO SHOWCASE AREA ENDS =======-->

  <!--===== COUNTRIES WE SERVE =======-->
  <section class="py-5" style="background: #ffffff;">
    <div class="container py-3">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
          <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">INTERNATIONAL FOOTPRINT</div>
          <h2 class="fw-bold" style="color:#0f2d2e;">Serving Clients Across 6 Continents</h2>
          <p class="text-muted mt-2">I collaborate remotely with businesses worldwide — from ambitious startups to high-growth companies. Seamless communication across all timezones.</p>
        </div>
      </div>

      <div class="row g-4">
        <!-- Middle East -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌍 Middle East &amp; GCC</div>
            <div>
              <span class="country-chip">🇦🇪 UAE / Dubai</span>
              <span class="country-chip">🇸🇦 Saudi Arabia</span>
              <span class="country-chip">🇶🇦 Qatar</span>
              <span class="country-chip">🇰🇼 Kuwait</span>
              <span class="country-chip">🇧🇭 Bahrain</span>
              <span class="country-chip">🇴🇲 Oman</span>
              <span class="country-chip">🇯🇴 Jordan</span>
            </div>
          </div>
        </div>

        <!-- Europe -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌍 Europe &amp; UK</div>
            <div>
              <span class="country-chip">🇬🇧 United Kingdom</span>
              <span class="country-chip">🇩🇪 Germany</span>
              <span class="country-chip">🇫🇷 France</span>
              <span class="country-chip">🇳🇱 Netherlands</span>
              <span class="country-chip">🇮🇹 Italy</span>
              <span class="country-chip">🇪🇸 Spain</span>
              <span class="country-chip">🇸🇪 Sweden</span>
            </div>
          </div>
        </div>

        <!-- Oceania -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌏 Australia &amp; Oceania</div>
            <div>
              <span class="country-chip">🇦🇺 Australia</span>
              <span class="country-chip">🇳🇿 New Zealand</span>
              <span class="country-chip">🇫🇯 Fiji</span>
              <span class="country-chip">🇵🇬 Papua New Guinea</span>
              <span class="country-chip">🇼🇸 Samoa</span>
            </div>
          </div>
        </div>

        <!-- Americas -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌎 USA, Canada &amp; Americas</div>
            <div>
              <span class="country-chip">🇺🇸 United States</span>
              <span class="country-chip">🇨🇦 Canada</span>
              <span class="country-chip">🇧🇷 Brazil</span>
              <span class="country-chip">🇲🇽 Mexico</span>
              <span class="country-chip">🇦🇷 Argentina</span>
              <span class="country-chip">🇨🇱 Chile</span>
            </div>
          </div>
        </div>

        <!-- Asia-Pacific -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌏 Asia-Pacific &amp; ASEAN</div>
            <div>
              <span class="country-chip">🇮🇳 India</span>
              <span class="country-chip">🇸🇬 Singapore</span>
              <span class="country-chip">🇲🇾 Malaysia</span>
              <span class="country-chip">🇵🇭 Philippines</span>
              <span class="country-chip">🇮🇩 Indonesia</span>
              <span class="country-chip">🇻🇳 Vietnam</span>
            </div>
          </div>
        </div>

        <!-- Africa -->
        <div class="col-lg-4 col-md-6">
          <div class="region-card-box">
            <div class="region-card-title">🌍 Africa</div>
            <div>
              <span class="country-chip">🇿🇦 South Africa</span>
              <span class="country-chip">🇳🇬 Nigeria</span>
              <span class="country-chip">🇰🇪 Kenya</span>
              <span class="country-chip">🇬🇭 Ghana</span>
              <span class="country-chip">🇪🇬 Egypt</span>
              <span class="country-chip">🇹🇿 Tanzania</span>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <p class="text-muted" style="font-size:14px;">
          <i class="fa-solid fa-circle-check text-success me-1"></i>
          Available for remote full-stack engineering worldwide.
          <a href="<?= $site ?>contact/" style="color:#104041;font-weight:700;margin-left:4px;">Request a Custom Portfolio Walkthrough →</a>
        </p>
      </div>
    </div>
  </section>
  <!--===== COUNTRIES WE SERVE END =======-->

  <!--===== WHY WORK WITH ME =======-->
  <section class="py-5" style="background: #f8fbfb;">
    <div class="container py-3">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
          <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">DEVELOPER ADVANTAGE</div>
          <h2 class="fw-bold" style="color:#0f2d2e;">Why Global Businesses Choose NikhilWorks</h2>
          <p class="text-muted mt-2">Direct developer collaboration with zero agency bureaucracy, rapid turnaround, and institutional quality.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">60–70% Cost Efficiency</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">Get elite enterprise-grade code quality at a fraction of high Western agency overheads, with zero compromise on precision.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-comments"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Direct &amp; Fast Communication</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">Speak directly with the engineer coding your application via WhatsApp, Zoom, or Slack. Clear documentation and daily progress notes.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-clock"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Timezone Overlap</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">Convenient daily overlaps with US Eastern, UK/Europe afternoons, UAE mornings, and Australian evenings for real-time syncing.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">100% IP Transfer &amp; NDA</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">We sign standard Non-Disclosure Agreements. Every line of code, repository asset, and design file belongs entirely to you upon completion.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-bolt"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Agile &amp; Rapid Milestones</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">Landing pages and redesigns in <strong>3–5 days</strong>, full dynamic platforms in <strong>2–3 weeks</strong> with clear sprint checkpoints.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="why-hire-card">
            <div class="why-icon-box"><i class="fa-solid fa-headset"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Post-Launch Warranty</h5>
            <p class="text-muted" style="font-size:14px;line-height:1.65;">30-day post-delivery bug-free warranty and handover support included with every custom build for total peace of mind.</p>
          </div>
        </div>
      </div>

      <!-- Payment Badges -->
      <div class="text-center mt-5 pt-3">
        <p class="text-muted mb-3 fw-bold" style="font-size:13px;letter-spacing:0.5px;text-transform:uppercase;">Seamless International Billing</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <span class="payment-chip"><i class="fa-brands fa-paypal text-primary"></i> PayPal</span>
          <span class="payment-chip"><i class="fa-solid fa-money-bill-transfer text-info"></i> Wise / Wire</span>
          <span class="payment-chip"><i class="fa-brands fa-stripe text-primary"></i> Stripe / Card</span>
          <span class="payment-chip"><i class="fa-solid fa-building-columns text-success"></i> Direct Bank Transfer</span>
          <span class="payment-chip"><i class="fa-brands fa-bitcoin text-warning"></i> USDT / Crypto</span>
        </div>
      </div>
    </div>
  </section>
  <!--===== WHY WORK WITH ME END =======-->

  <!--===== CTA BANNER =======-->
  <div class="container">
    <div class="portfolio-cta-banner">
      <div class="container px-4">
        <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(173,255,28,0.15);color:#ADFF1C;font-weight:700;">HAVE A PROJECT IN MIND?</div>
        <h2 class="text-white fw-bold mb-3" style="font-size:clamp(1.8rem, 3.5vw, 2.6rem);">Let's Build Your High-Performance Web Solution</h2>
        <p class="text-light mb-4" style="font-size:1.15rem;max-width:680px;margin:0 auto;color:#d1e7e4 !important;">
          Get a transparent fixed-price estimate and architectural breakdown within 24 hours. Free initial consultation.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get A Free Quote</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20saw%20your%20portfolio%20and%20want%20to%20discuss%20a%20new%20project."
             class="btn-outline-glass" target="_blank" rel="noopener">
            <i class="fa-brands fa-whatsapp text-success"></i>
            <span>WhatsApp Quick Connect</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA BANNER END =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Portfolio Filter & Lightbox Script -->
  <script>
    $(document).ready(function () {
      // Filter functionality
      $('.portfolio-filter-btn').on('click', function () {
        var filter = $(this).attr('data-filter');
        $('.portfolio-filter-btn').removeClass('active');
        $(this).addClass('active');

        var visibleCount = 0;
        if (filter === 'all') {
          $('.portfolio-col').stop(true, true).fadeIn(300);
          visibleCount = $('.portfolio-col').length;
        } else {
          $('.portfolio-col').each(function () {
            if ($(this).data('category') === filter) {
              $(this).stop(true, true).fadeIn(300);
              visibleCount++;
            } else {
              $(this).stop(true, true).hide();
            }
          });
        }

        if (visibleCount === 0) {
          $('#filterNoResults').removeClass('d-none');
        } else {
          $('#filterNoResults').addClass('d-none');
        }
      });

      // Magnific Popup lightbox
      if ($.fn.magnificPopup) {
        $('.image-popup').magnificPopup({
          type: 'image',
          gallery: { enabled: true },
          image: { verticalFit: true }
        });
      }
    });
  </script>

</body>
</html>
