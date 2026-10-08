<?php
require_once __DIR__ . '/config/connect.php';
require_once __DIR__ . '/util/function.php';

$pageTitle = "HTML Sitemap — Explore All Pages, Services, Tools & Blogs | NikhilWorks";
$metaDesc = "Explore the complete directory of NikhilWorks. Quick navigation to all web development services, CRM solutions, SEO tools, blog posts, and global delivery locations.";
$canonical = $site . "sitemap/";
$currentTool = '';

// Fetch all published blogs
$blogsList = [];
$bSql = "SELECT `title`, `slug_url`, `created_at` FROM `blogs` WHERE `status` = 'published' ORDER BY `id` DESC";
$bRes = mysqli_query($conn, $bSql);
if ($bRes) {
    while ($bRow = mysqli_fetch_assoc($bRes)) {
        $blogsList[] = $bRow;
    }
}

// Fetch all active services
$servicesList = [];
$sSql = "SELECT `categories`, `slug_url` FROM `sub_categories` WHERE `status` = 1 ORDER BY `id` ASC";
$sRes = mysqli_query($conn, $sSql);
if ($sRes) {
    while ($sRow = mysqli_fetch_assoc($sRes)) {
        $servicesList[] = $sRow;
    }
}

// Load International Locations Data
$intlLocations = [];
$intlFile = __DIR__ . '/data/locations-international.php';
if (file_exists($intlFile)) {
    $intlLocations = include $intlFile;
}

// Load City Locations Data
$cityLocations = [];
$cityFile = __DIR__ . '/data/locations-cities.php';
if (file_exists($cityFile)) {
    $cityLocations = include $cityFile;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="keywords" content="html sitemap, nikhilworks site directory, web developer delhi sitemap, free tools directory, all services nikhilworks, xml sitemap">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Breadcrumb Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?= $site ?>" },
      { "@type": "ListItem", "position": 2, "name": "HTML Sitemap", "item": "<?= $canonical ?>" }
    ]
  }
  </script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">

  <style>
    :root {
      --nw-primary: #104041;
      --nw-primary-dark: #082223;
      --nw-accent: #ADFF1C;
      --nw-accent-hover: #96e014;
      --nw-surface: #ffffff;
      --nw-bg: #f8fafc;
      --nw-border: #e2e8f0;
      --nw-text: #1e293b;
      --nw-text-muted: #64748b;
      --nw-radius: 16px;
    }

    body {
      background-color: var(--nw-bg);
      font-family: 'Inter', sans-serif;
      color: var(--nw-text);
    }

    h1, h2, h3, h4, h5, h6 {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Hero Section */
    .sitemap-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.85) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 70px;
      color: #fff;
      overflow: hidden;
    }

    .sitemap-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
      background-size: 24px 24px;
      opacity: 0.4;
      pointer-events: none;
    }

    .sitemap-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: var(--nw-accent);
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 0.5px;
      margin-bottom: 18px;
    }

    .sitemap-title {
      font-size: 42px;
      font-weight: 800;
      color: #ffffff;
      line-height: 1.2;
      margin-bottom: 16px;
    }
    @media (max-width: 768px) {
      .sitemap-title { font-size: 30px; }
      .sitemap-hero { padding: 110px 0 50px; }
    }

    .sitemap-desc {
      font-size: 16px;
      color: rgba(255, 255, 255, 0.82);
      max-width: 680px;
      margin: 0 auto 28px;
      line-height: 1.6;
    }

    /* Search & XML Quick Bar */
    .sitemap-search-wrap {
      max-width: 620px;
      margin: 0 auto 24px;
      position: relative;
    }

    .sitemap-search-input {
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      border: 2px solid rgba(173, 255, 28, 0.4);
      border-radius: 50px;
      padding: 15px 24px 15px 50px;
      font-size: 15px;
      color: #0f172a;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      transition: all 0.25s ease;
      outline: none;
    }

    .sitemap-search-input:focus {
      background: #ffffff;
      border-color: var(--nw-accent);
      box-shadow: 0 10px 35px rgba(173, 255, 28, 0.35);
    }

    .sitemap-search-icon {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: #104041;
      font-size: 18px;
      pointer-events: none;
    }

    .sitemap-xml-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin-top: 15px;
    }

    .sitemap-xml-btn {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #ffffff;
      font-size: 12.5px;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 30px;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .sitemap-xml-btn:hover {
      background: var(--nw-accent);
      color: #051617;
      border-color: var(--nw-accent);
      transform: translateY(-2px);
    }

    /* Stats Ribbon */
    .sitemap-stats-ribbon {
      background: #ffffff;
      border-bottom: 1px solid var(--nw-border);
      padding: 18px 0;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    }

    .sitemap-stat-item {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 6px 15px;
    }

    .sitemap-stat-icon {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(16, 64, 65, 0.08);
      color: var(--nw-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      flex-shrink: 0;
    }

    .sitemap-stat-num {
      font-size: 18px;
      font-weight: 800;
      color: #0f172a;
      line-height: 1.1;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .sitemap-stat-label {
      font-size: 12px;
      color: var(--nw-text-muted);
      font-weight: 600;
    }

    /* Navigation Filter Tabs */
    .sitemap-filter-nav {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--nw-border);
      padding: 12px 0;
    }

    .filter-pills-wrap {
      display: flex;
      gap: 8px;
      overflow-x: auto;
      padding-bottom: 4px;
      scrollbar-width: thin;
    }

    .filter-pills-wrap::-webkit-scrollbar {
      height: 4px;
    }

    .filter-pill {
      background: #f1f5f9;
      color: #475569;
      border: 1px solid transparent;
      padding: 7px 16px;
      border-radius: 30px;
      font-size: 13px;
      font-weight: 600;
      text-decoration: none;
      white-space: nowrap;
      transition: all 0.2s ease;
      cursor: pointer;
    }

    .filter-pill:hover,
    .filter-pill.active {
      background: var(--nw-primary);
      color: #ffffff;
    }

    /* Sitemap Directory Cards */
    .sitemap-section {
      padding: 40px 0;
    }

    .sitemap-card {
      background: var(--nw-surface);
      border: 1px solid var(--nw-border);
      border-radius: var(--nw-radius);
      padding: 28px 24px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
      position: relative;
    }

    .sitemap-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 36px rgba(16, 64, 65, 0.08);
      border-color: #cbd5e1;
    }

    .sitemap-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      padding-bottom: 14px;
      border-bottom: 2px solid #f1f5f9;
    }

    .sitemap-card-title {
      font-size: 19px;
      font-weight: 800;
      color: #0f172a;
      display: flex;
      align-items: center;
      gap: 12px;
      margin: 0;
    }

    .sitemap-card-title-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: linear-gradient(135deg, rgba(16, 64, 65, 0.1) 0%, rgba(173, 255, 28, 0.15) 100%);
      color: var(--nw-primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }

    .sitemap-count-badge {
      background: #f1f5f9;
      color: #64748b;
      font-size: 11.5px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
    }

    .sitemap-links-grid {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 11px;
    }

    .sitemap-link-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 4px 0;
      transition: all 0.2s ease;
    }

    .sitemap-link-item a {
      color: #334155;
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      transition: color 0.2s ease, transform 0.2s ease;
      flex-grow: 1;
    }

    .sitemap-link-item a i.link-arrow {
      color: #94a3b8;
      font-size: 11px;
      transition: all 0.2s ease;
    }

    .sitemap-link-item a:hover {
      color: #0f766e;
      transform: translateX(4px);
    }

    .sitemap-link-item a:hover i.link-arrow {
      color: #0f766e;
      transform: translateX(3px);
    }

    .sitemap-tag-pill {
      font-size: 10.5px;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 6px;
      text-transform: uppercase;
      letter-spacing: 0.3px;
    }

    .tag-highlight {
      background: rgba(173, 255, 28, 0.25);
      color: #0c3334;
      border: 1px solid rgba(173, 255, 28, 0.6);
    }

    .tag-featured {
      background: #ecfdf5;
      color: #059669;
      border: 1px solid #a7f3d0;
    }

    .tag-new {
      background: #fef3c7;
      color: #d97706;
      border: 1px solid #fde68a;
    }

    /* Custom Scrollbox for long lists */
    .sitemap-scroll-box {
      max-height: 420px;
      overflow-y: auto;
      padding-right: 8px;
      scrollbar-width: thin;
      scrollbar-color: #cbd5e1 transparent;
    }

    .sitemap-scroll-box::-webkit-scrollbar {
      width: 5px;
    }

    .sitemap-scroll-box::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }

    /* City Hubs Collapsible / Explorer */
    .city-group-title {
      font-size: 14px;
      font-weight: 700;
      color: #0f172a;
      margin: 14px 0 8px;
      padding-bottom: 6px;
      border-bottom: 1px dashed #e2e8f0;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .city-chip-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 15px;
    }

    .city-chip {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      color: #475569;
      font-size: 12.5px;
      font-weight: 500;
      padding: 5px 12px;
      border-radius: 8px;
      text-decoration: none;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .city-chip:hover {
      background: #ffffff;
      border-color: #0f766e;
      color: #0f766e;
      box-shadow: 0 4px 10px rgba(0,0,0,0.04);
      transform: translateY(-2px);
    }

    /* No results message */
    #sitemapNoResults {
      display: none;
      text-align: center;
      padding: 60px 20px;
      background: #ffffff;
      border-radius: 16px;
      border: 2px dashed #cbd5e1;
      margin-top: 30px;
    }

    /* Breadcrumb styling */
    .sitemap-breadcrumb {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      font-size: 13px;
      color: rgba(255, 255, 255, 0.7);
      margin-bottom: 16px;
    }
    .sitemap-breadcrumb a {
      color: rgba(255, 255, 255, 0.85);
      text-decoration: none;
    }
    .sitemap-breadcrumb a:hover {
      color: var(--nw-accent);
    }
  </style>
</head>

<body>

  <?php include "includes/header.php"; ?>

  <!-- Hero Section -->
  <section class="sitemap-hero">
    <div class="container text-center position-relative">
      
      <!-- Breadcrumb -->
      <div class="sitemap-breadcrumb">
        <a href="<?= $site ?>"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span>/</span>
        <span class="text-white">HTML Sitemap</span>
      </div>

      <div class="sitemap-badge-pill">
        <i class="fa-solid fa-sitemap"></i> Master Architecture Directory
      </div>

      <h1 class="sitemap-title">Website HTML Sitemap &amp; Pages</h1>
      
      <p class="sitemap-desc">
        Explore complete structured navigation across all web development services, free business utilities, published articles, Indian metro hubs, and international delivery locations.
      </p>

      <!-- Live Search Box -->
      <div class="sitemap-search-wrap">
        <i class="fa-solid fa-magnifying-glass sitemap-search-icon"></i>
        <input type="text" id="sitemapSearchInput" class="sitemap-search-input" placeholder="Search 650+ services, tools, blogs, or city hubs..." autocomplete="off">
      </div>

      <!-- Quick XML Sitemaps Access Bar -->
      <div class="sitemap-xml-bar">
        <span class="text-white-50 small align-self-center me-1 d-none d-sm-inline">Direct XML Feeds:</span>
        <a href="<?= $site ?>sitemap.xml" class="sitemap-xml-btn" target="_blank">
          <i class="fa-solid fa-file-code text-warning"></i> sitemap.xml (Index)
        </a>
        <a href="<?= $site ?>sitemap-main.xml" class="sitemap-xml-btn" target="_blank">
          <i class="fa-solid fa-file-lines text-info"></i> sitemap-main.xml
        </a>
        <a href="<?= $site ?>sitemap-blogs.xml" class="sitemap-xml-btn" target="_blank">
          <i class="fa-solid fa-newspaper text-success"></i> sitemap-blogs.xml
        </a>
        <a href="<?= $site ?>sitemap-locations.xml" class="sitemap-xml-btn" target="_blank">
          <i class="fa-solid fa-map-location-dot text-danger"></i> sitemap-locations.xml
        </a>
      </div>

    </div>
  </section>

  <!-- Quick Stats Ribbon -->
  <div class="sitemap-stats-ribbon">
    <div class="container">
      <div class="row g-3 justify-content-center">
        <div class="col-6 col-md-3 col-lg-2">
          <div class="sitemap-stat-item">
            <div class="sitemap-stat-icon"><i class="fa-solid fa-globe"></i></div>
            <div>
              <div class="sitemap-stat-num">650+</div>
              <div class="sitemap-stat-label">Total URLs</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <div class="sitemap-stat-item">
            <div class="sitemap-stat-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
            <div>
              <div class="sitemap-stat-num">14</div>
              <div class="sitemap-stat-label">Free Tools</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <div class="sitemap-stat-item">
            <div class="sitemap-stat-icon"><i class="fa-solid fa-code"></i></div>
            <div>
              <div class="sitemap-stat-num"><?= count($servicesList) + 8 ?></div>
              <div class="sitemap-stat-label">Web Services</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <div class="sitemap-stat-icon"><i class="fa-solid fa-newspaper"></i></div>
          <div>
            <div class="sitemap-stat-num"><?= count($blogsList) ?></div>
            <div class="sitemap-stat-label">Tech Blogs</div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-2">
          <div class="sitemap-stat-item">
            <div class="sitemap-stat-icon"><i class="fa-solid fa-city"></i></div>
            <div>
              <div class="sitemap-stat-num">500+</div>
              <div class="sitemap-stat-label">Regional Hubs</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation Filter Pills -->
  <div class="sitemap-filter-nav">
    <div class="container">
      <div class="filter-pills-wrap">
        <a href="#all" class="filter-pill active" data-target="all"><i class="fa-solid fa-border-all me-1"></i> All Categories</a>
        <a href="#sec-core" class="filter-pill" data-target="sec-core"><i class="fa-solid fa-house me-1"></i> Core Pages</a>
        <a href="#sec-tools" class="filter-pill" data-target="sec-tools"><i class="fa-solid fa-screwdriver-wrench me-1"></i> Free Tools (14)</a>
        <a href="#sec-services" class="filter-pill" data-target="sec-services"><i class="fa-solid fa-laptop-code me-1"></i> Web Services</a>
        <a href="#sec-blogs" class="filter-pill" data-target="sec-blogs"><i class="fa-solid fa-newspaper me-1"></i> Tech Articles (<?= count($blogsList) ?>)</a>
        <a href="#sec-metro" class="filter-pill" data-target="sec-metro"><i class="fa-solid fa-city me-1"></i> Indian Metro Hubs</a>
        <a href="#sec-intl" class="filter-pill" data-target="sec-intl"><i class="fa-solid fa-earth-americas me-1"></i> International</a>
        <a href="#sec-cities" class="filter-pill" data-target="sec-cities"><i class="fa-solid fa-map-location-dot me-1"></i> All Cities Directory</a>
      </div>
    </div>
  </div>

  <!-- Main Content Grid -->
  <main class="sitemap-section">
    <div class="container">

      <!-- No Results State -->
      <div id="sitemapNoResults">
        <i class="fa-solid fa-search fa-3x text-muted mb-3"></i>
        <h4 class="fw-bold text-dark">No matching pages found</h4>
        <p class="text-muted mb-0">Try searching for a different keyword like "invoice", "delhi", "seo", or "calculator".</p>
      </div>

      <div class="row g-4" id="sitemapCardsGrid">

        <!-- 1. Core Pages Card -->
        <div class="col-lg-4 col-md-6 sitemap-category-box" id="sec-core">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-house"></i></span>
                <span>Core Pages</span>
              </h2>
              <span class="sitemap-count-badge">12 Pages</span>
            </div>
            <ul class="sitemap-links-grid">
              <li class="sitemap-link-item">
                <a href="<?= $site ?>"><i class="fa-solid fa-chevron-right link-arrow"></i> Homepage (NikhilWorks)</a>
                <span class="sitemap-tag-pill tag-featured">Main</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>about/"><i class="fa-solid fa-chevron-right link-arrow"></i> About Nikhil Gupta</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>services/"><i class="fa-solid fa-chevron-right link-arrow"></i> All Services Directory</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>portfolio/"><i class="fa-solid fa-chevron-right link-arrow"></i> Client Portfolio &amp; Showcase</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>pricing/"><i class="fa-solid fa-chevron-right link-arrow"></i> Transparent Pricing Plans</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>contact/"><i class="fa-solid fa-chevron-right link-arrow"></i> Contact &amp; Consultation</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>blogs/"><i class="fa-solid fa-chevron-right link-arrow"></i> Tech Blog &amp; Insights</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>testimonials/"><i class="fa-solid fa-chevron-right link-arrow"></i> Client Reviews &amp; Testimonials</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>ai-integration-services/"><i class="fa-solid fa-chevron-right link-arrow"></i> AI Integration &amp; Automation</a>
                <span class="sitemap-tag-pill tag-new">AI</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>pay/"><i class="fa-solid fa-chevron-right link-arrow"></i> Pay Online (UPI / QR Portal)</a>
                <span class="sitemap-tag-pill tag-highlight">Payment</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>privacy-policy/"><i class="fa-solid fa-chevron-right link-arrow"></i> Privacy Policy</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>terms-and-conditions/"><i class="fa-solid fa-chevron-right link-arrow"></i> Terms &amp; Conditions</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- 2. Free Developer Tools Card -->
        <div class="col-lg-4 col-md-6 sitemap-category-box" id="sec-tools">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-screwdriver-wrench"></i></span>
                <span>Free Online Tools</span>
              </h2>
              <span class="sitemap-count-badge">14 Tools</span>
            </div>
            <ul class="sitemap-links-grid">
              <li class="sitemap-link-item">
                <a href="<?= $site ?>free-tools/"><i class="fa-solid fa-chevron-right link-arrow"></i> <strong>Free Tools Main Hub</strong></a>
                <span class="sitemap-tag-pill tag-highlight">Canva Style</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/qr-code/"><i class="fa-solid fa-chevron-right link-arrow"></i> Custom QR Code Generator</a>
                <span class="sitemap-tag-pill tag-featured">Popular</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/invoice/"><i class="fa-solid fa-chevron-right link-arrow"></i> Canva-Style A4 GST Invoice Maker</a>
                <span class="sitemap-tag-pill tag-new">A4 Print</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/whatsapp-link/"><i class="fa-solid fa-chevron-right link-arrow"></i> WhatsApp Direct Link Generator</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/gst-calculator/"><i class="fa-solid fa-chevron-right link-arrow"></i> GST &amp; Tax Calculator India</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/profit-calculator/"><i class="fa-solid fa-chevron-right link-arrow"></i> Profit Margin &amp; Markup Tool</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/schema-generator/"><i class="fa-solid fa-chevron-right link-arrow"></i> JSON-LD Schema Markup Builder</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/pagespeed/"><i class="fa-solid fa-chevron-right link-arrow"></i> Core Web Vitals &amp; PageSpeed Test</a>
                <span class="sitemap-tag-pill tag-featured">Lighthouse</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/meta-preview/"><i class="fa-solid fa-chevron-right link-arrow"></i> SERP &amp; Open Graph Meta Preview</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/ssl-checker/"><i class="fa-solid fa-chevron-right link-arrow"></i> SSL Certificate &amp; Security Inspector</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/index-checker/"><i class="fa-solid fa-chevron-right link-arrow"></i> Google Index Status Checker</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/robots-validator/"><i class="fa-solid fa-chevron-right link-arrow"></i> Robots.txt Tester &amp; Validator</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>tools/privacy-policy/"><i class="fa-solid fa-chevron-right link-arrow"></i> Interactive Privacy Policy Studio</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>website-cost-calculator/"><i class="fa-solid fa-chevron-right link-arrow"></i> Website Development Cost Calculator</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>seo-auditor/"><i class="fa-solid fa-chevron-right link-arrow"></i> Free Website SEO Auditor</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- 3. Web & SEO Services Card -->
        <div class="col-lg-4 col-md-6 sitemap-category-box" id="sec-services">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-code"></i></span>
                <span>Web Services</span>
              </h2>
              <span class="sitemap-count-badge"><?= count($servicesList) + 8 ?> Services</span>
            </div>
            <ul class="sitemap-links-grid">
              <?php foreach ($servicesList as $s): ?>
                <li class="sitemap-link-item">
                  <a href="<?= $site ?>service/<?= $s['slug_url'] ?>/">
                    <i class="fa-solid fa-chevron-right link-arrow"></i> <?= htmlspecialchars($s['categories']) ?>
                  </a>
                </li>
              <?php endforeach; ?>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>crm-development-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Custom CRM &amp; ERP Solutions</a>
                <span class="sitemap-tag-pill tag-featured">CRM</span>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>seo-services-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Full-Service Technical SEO</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>keyword-promotion-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Google Keyword Ranking Promotion</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>ads-management-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Google &amp; Meta Ads Management</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>api-integration-services-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> API &amp; Payment Integrations</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>website-maintenance-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Website Maintenance &amp; AMC</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>website-redesign-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Website Redesign &amp; Modernization</a>
              </li>
              <li class="sitemap-link-item">
                <a href="<?= $site ?>website-auditing-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> Website Speed &amp; Security Audit</a>
              </li>
            </ul>
          </div>
        </div>

        <!-- 4. Tech Blogs Card -->
        <div class="col-lg-6 col-md-12 sitemap-category-box" id="sec-blogs">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-newspaper"></i></span>
                <span>Published Tech Articles</span>
              </h2>
              <span class="sitemap-count-badge"><?= count($blogsList) ?> Articles</span>
            </div>
            <div class="sitemap-scroll-box">
              <ul class="sitemap-links-grid">
                <?php if (!empty($blogsList)): ?>
                  <?php foreach ($blogsList as $b): ?>
                    <li class="sitemap-link-item">
                      <a href="<?= $site ?>blog/<?= $b['slug_url'] ?>/">
                        <i class="fa-solid fa-chevron-right link-arrow"></i> <?= htmlspecialchars($b['title']) ?>
                      </a>
                      <?php if (!empty($b['created_at'])): ?>
                        <span class="text-muted small" style="font-size: 11px;"><?= date('M Y', strtotime($b['created_at'])) ?></span>
                      <?php endif; ?>
                    </li>
                  <?php endforeach; ?>
                <?php else: ?>
                  <li class="text-muted small py-2">No blogs found.</li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- 5. Indian Metro Hubs Card -->
        <div class="col-lg-6 col-md-12 sitemap-category-box" id="sec-metro">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-city"></i></span>
                <span>Top Indian IT &amp; Metro Hubs</span>
              </h2>
              <span class="sitemap-count-badge">National &amp; Tier 1</span>
            </div>
            <div class="row g-2">
              <div class="col-sm-6">
                <ul class="sitemap-links-grid">
                  <li class="sitemap-link-item">
                    <a href="<?= $site ?>web-developer-india/"><i class="fa-solid fa-chevron-right link-arrow"></i> India (National Hub)</a>
                    <span class="sitemap-tag-pill tag-featured">National</span>
                  </li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-designer-delhi/"><i class="fa-solid fa-chevron-right link-arrow"></i> Delhi NCR</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-noida/"><i class="fa-solid fa-chevron-right link-arrow"></i> Noida &amp; Greater Noida</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-gurgaon/"><i class="fa-solid fa-chevron-right link-arrow"></i> Gurgaon (Gurugram)</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-bangalore/"><i class="fa-solid fa-chevron-right link-arrow"></i> Bengaluru (Bangalore)</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-mumbai/"><i class="fa-solid fa-chevron-right link-arrow"></i> Mumbai</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-hyderabad/"><i class="fa-solid fa-chevron-right link-arrow"></i> Hyderabad</a></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="sitemap-links-grid">
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-pune/"><i class="fa-solid fa-chevron-right link-arrow"></i> Pune</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-chennai/"><i class="fa-solid fa-chevron-right link-arrow"></i> Chennai</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-kolkata/"><i class="fa-solid fa-chevron-right link-arrow"></i> Kolkata</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-ahmedabad/"><i class="fa-solid fa-chevron-right link-arrow"></i> Ahmedabad</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-jaipur/"><i class="fa-solid fa-chevron-right link-arrow"></i> Jaipur</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-lucknow/"><i class="fa-solid fa-chevron-right link-arrow"></i> Lucknow</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-chandigarh/"><i class="fa-solid fa-chevron-right link-arrow"></i> Chandigarh</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 6. International Delivery Hubs Card -->
        <div class="col-lg-6 col-md-12 sitemap-category-box" id="sec-intl">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-earth-americas"></i></span>
                <span>International Delivery Hubs</span>
              </h2>
              <span class="sitemap-count-badge">Global Clients</span>
            </div>
            <div class="row g-2">
              <div class="col-sm-6">
                <ul class="sitemap-links-grid">
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-usa/"><i class="fa-solid fa-chevron-right link-arrow"></i> United States (USA)</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-uk/"><i class="fa-solid fa-chevron-right link-arrow"></i> United Kingdom (UK)</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-canada/"><i class="fa-solid fa-chevron-right link-arrow"></i> Canada</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-australia/"><i class="fa-solid fa-chevron-right link-arrow"></i> Australia</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-dubai/"><i class="fa-solid fa-chevron-right link-arrow"></i> UAE (Dubai &amp; Abu Dhabi)</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-saudi-arabia/"><i class="fa-solid fa-chevron-right link-arrow"></i> Saudi Arabia</a></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="sitemap-links-grid">
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-germany/"><i class="fa-solid fa-chevron-right link-arrow"></i> Germany</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-singapore/"><i class="fa-solid fa-chevron-right link-arrow"></i> Singapore</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-new-zealand/"><i class="fa-solid fa-chevron-right link-arrow"></i> New Zealand</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-switzerland/"><i class="fa-solid fa-chevron-right link-arrow"></i> Switzerland</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>web-developer-south-africa/"><i class="fa-solid fa-chevron-right link-arrow"></i> South Africa</a></li>
                  <li class="sitemap-link-item"><a href="<?= $site ?>hire-freelance-web-developer/"><i class="fa-solid fa-chevron-right link-arrow"></i> <strong>All Global Countries &rarr;</strong></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- 7. All Cities Directory Card (Searchable & Crawlable) -->
        <div class="col-lg-6 col-md-12 sitemap-category-box" id="sec-cities">
          <div class="sitemap-card">
            <div class="sitemap-card-header">
              <h2 class="sitemap-card-title">
                <span class="sitemap-card-title-icon"><i class="fa-solid fa-map-location-dot"></i></span>
                <span>All-India City Directory</span>
              </h2>
              <span class="sitemap-count-badge"><?= !empty($cityLocations) ? count($cityLocations) : '500+' ?> Cities</span>
            </div>
            
            <p class="text-muted small mb-2">Dedicated local web design and development landing hubs across Indian districts and cities:</p>
            
            <div class="sitemap-scroll-box" style="max-height: 280px;">
              <div class="city-chip-grid">
                <?php if (!empty($cityLocations)): ?>
                  <?php 
                  $cityIndex = 0;
                  foreach ($cityLocations as $cSlug => $cData): 
                    $cityName = !empty($cData['city_name']) ? $cData['city_name'] : ucwords(str_replace('-', ' ', str_replace('web-developer-', '', $cSlug)));
                  ?>
                    <a href="<?= $site ?><?= $cSlug ?>/" class="city-chip">
                      <i class="fa-solid fa-location-dot text-danger" style="font-size: 10px;"></i> <?= htmlspecialchars($cityName) ?>
                    </a>
                  <?php endforeach; ?>
                <?php else: ?>
                  <a href="<?= $site ?>web-developer-india/" class="city-chip">All Indian Cities</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </main>

  <!-- Live Search & Filtering Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var searchInput = document.getElementById('sitemapSearchInput');
      var linkItems = document.querySelectorAll('.sitemap-link-item, .city-chip');
      var categoryBoxes = document.querySelectorAll('.sitemap-category-box');
      var noResults = document.getElementById('sitemapNoResults');
      var filterPills = document.querySelectorAll('.filter-pill');

      // Live Search Filter
      searchInput.addEventListener('input', function() {
        var query = this.value.toLowerCase().trim();
        var matchCount = 0;

        if (query === '') {
          linkItems.forEach(function(item) { item.style.display = ''; });
          categoryBoxes.forEach(function(box) { box.style.display = ''; });
          noResults.style.display = 'none';
          return;
        }

        linkItems.forEach(function(item) {
          var text = item.textContent.toLowerCase();
          if (text.includes(query)) {
            item.style.display = '';
            matchCount++;
          } else {
            item.style.display = 'none';
          }
        });

        // Hide empty category boxes
        categoryBoxes.forEach(function(box) {
          var visibleItems = box.querySelectorAll('.sitemap-link-item:not([style*="display: none"]), .city-chip:not([style*="display: none"])');
          if (visibleItems.length === 0) {
            box.style.display = 'none';
          } else {
            box.style.display = '';
          }
        });

        noResults.style.display = matchCount === 0 ? 'block' : 'none';
      });

      // Filter Pill Tabs
      filterPills.forEach(function(pill) {
        pill.addEventListener('click', function(e) {
          e.preventDefault();
          filterPills.forEach(function(p) { p.classList.remove('active'); });
          this.classList.add('active');

          var targetId = this.getAttribute('data-target');
          if (targetId === 'all') {
            categoryBoxes.forEach(function(box) { box.style.display = ''; });
            if (searchInput.value.trim() !== '') {
              searchInput.dispatchEvent(new Event('input'));
            }
          } else {
            categoryBoxes.forEach(function(box) {
              if (box.id === targetId) {
                box.style.display = '';
                // Smooth scroll into view
                box.scrollIntoView({ behavior: 'smooth', block: 'start' });
              } else {
                box.style.display = 'none';
              }
            });
          }
        });
      });
    });
  </script>

  <?php include "includes/footer.php"; ?>

</body>
</html>
