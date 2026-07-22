<?php
include "config/connect.php";
include_once "util/function.php";

$portfolios = get_portfolio();
$projectCount = count_portfolio_projects();
$yearsExperience = years_in_business(2021);
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

  <title>Web Development Portfolio | NikhilWorks — Projects for UAE, UK, Australia, Canada & More</title>
  <meta name="description" content="Explore Nikhil Gupta's web development portfolio — PHP, Laravel, MERN Stack & WordPress projects for clients in UAE, Saudi Arabia, UK, Australia, Canada, South Africa & Europe. Affordable remote developer from India.">
  <meta name="keywords" content="web development portfolio, PHP developer UAE, Laravel developer Australia, web developer UK, affordable web developer Canada, MERN stack developer South Africa, remote web developer India, web developer Malaysia, web developer Nigeria, web developer Dubai, web developer Saudi Arabia, web developer Singapore, NikhilWorks portfolio">

  <!-- Canonical & hreflang -->
  <link rel="canonical" href="<?= $site ?>portfolio/">
  <link rel="alternate" hreflang="en" href="<?= $site ?>portfolio/">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>portfolio/">

  <!-- Open Graph -->
  <meta property="og:title" content="Web Development Portfolio | NikhilWorks — Remote Developer for Global Clients">
  <meta property="og:description" content="PHP, Laravel, MERN Stack & WordPress projects for clients in UAE, UK, Australia, Canada, Europe & Africa. Affordable, professional, remote.">
  <meta property="og:image" content="<?= $site ?>assets/img/portfolio-banner.jpg">
  <meta property="og:url" content="<?= $site ?>portfolio/">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_GB">
  <meta property="og:locale:alternate" content="en_AU">
  <meta property="og:locale:alternate" content="en_AE">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Web Development Portfolio | NikhilWorks — Global Projects">
  <meta name="twitter:description" content="PHP, Laravel & MERN Stack projects for UAE, UK, Australia, Canada, Africa & Asia clients.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/portfolio-banner.jpg">

  <!--=====FAB ICON=======-->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!--===== CSS LINK =======-->
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

  <!-- Schema: ProfessionalService — Global areaServed (AI + Google visibility) -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks",
    "url": "<?= $site ?>",
    "image": "<?= $site ?>assets/img/logo.png",
    "telephone": "+91-8368552640",
    "email": "contact@nikhilworks.com",
    "description": "Professional web development services by Nikhil Gupta — PHP, Laravel, MERN Stack, WordPress — serving clients in UAE, Saudi Arabia, Qatar, Kuwait, UK, Germany, Australia, New Zealand, Canada, Brazil, Malaysia, Singapore, Nigeria, South Africa, Kenya and more.",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "New Delhi",
      "addressRegion": "Delhi",
      "addressCountry": "IN"
    },
    "areaServed": [
      {"@type": "Country", "name": "United Arab Emirates"},
      {"@type": "Country", "name": "Saudi Arabia"},
      {"@type": "Country", "name": "Qatar"},
      {"@type": "Country", "name": "Kuwait"},
      {"@type": "Country", "name": "Bahrain"},
      {"@type": "Country", "name": "Oman"},
      {"@type": "Country", "name": "Jordan"},
      {"@type": "Country", "name": "Egypt"},
      {"@type": "Country", "name": "United Kingdom"},
      {"@type": "Country", "name": "Germany"},
      {"@type": "Country", "name": "France"},
      {"@type": "Country", "name": "Netherlands"},
      {"@type": "Country", "name": "Italy"},
      {"@type": "Country", "name": "Spain"},
      {"@type": "Country", "name": "Sweden"},
      {"@type": "Country", "name": "Poland"},
      {"@type": "Country", "name": "Australia"},
      {"@type": "Country", "name": "New Zealand"},
      {"@type": "Country", "name": "Canada"},
      {"@type": "Country", "name": "Brazil"},
      {"@type": "Country", "name": "Argentina"},
      {"@type": "Country", "name": "Mexico"},
      {"@type": "Country", "name": "Chile"},
      {"@type": "Country", "name": "Colombia"},
      {"@type": "Country", "name": "Malaysia"},
      {"@type": "Country", "name": "Singapore"},
      {"@type": "Country", "name": "Philippines"},
      {"@type": "Country", "name": "Indonesia"},
      {"@type": "Country", "name": "Nigeria"},
      {"@type": "Country", "name": "South Africa"},
      {"@type": "Country", "name": "Kenya"},
      {"@type": "Country", "name": "Ghana"},
      {"@type": "Country", "name": "India"}
    ],
    "sameAs": [
      "https://www.facebook.com/profile.php?id=61559869365624",
      "https://www.instagram.com/nikhil_gupta_998/",
      "https://x.com/NikhilG69581514",
      "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
      "https://github.com/nikhilgupta-9",
      "https://dev.to/nikhil_gupta_c55a17d81e36",
      "https://hashnode.com/@nikhilworks",
      "https://www.producthunt.com/@nikhilgupta_9"
    ]
  }
  </script>

  <!-- Schema: ItemList for Portfolio Projects -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "Web Development Portfolio — NikhilWorks",
    "description": "A curated showcase of web development projects built for businesses worldwide",
    "itemListElement": [
      <?php
      $pos = 1;
      $schemaItems = [];
      foreach ($portfolios as $p) {
          $name = addslashes(strip_tags($p['pro_name'] ?? $p['brand_name'] ?? 'Web Project'));
          $desc = addslashes(strip_tags(substr($p['short_desc'] ?? '', 0, 120)));
          $schemaItems[] = '{"@type":"ListItem","position":' . $pos++ . ',"name":"' . $name . '","description":"' . $desc . '"}';
      }
      echo implode(",\n      ", $schemaItems);
      ?>
    ]
  }
  </script>

  <style>
    /* ---- Portfolio Filter ---- */
    .portfolio-filter button {
      background: transparent;
      border: 1px solid #104041;
      color: #104041;
      padding: 8px 22px;
      margin: 5px;
      border-radius: 30px;
      transition: all 0.3s ease;
      font-weight: 500;
      cursor: pointer;
    }
    .portfolio-filter button:hover,
    .portfolio-filter button.active {
      background: #104041;
      color: #ADFF1C;
    }

    /* ---- Portfolio Cards ---- */
    .portfolio-item {
      margin-bottom: 30px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 5px 18px rgba(16, 64, 65, 0.1);
      transition: all 0.35s ease;
      background: #fff;
    }
    .portfolio-item:hover {
      transform: translateY(-6px);
      box-shadow: 0 18px 40px rgba(16, 64, 65, 0.2);
    }
    .portfolio-img { position: relative; overflow: hidden; }
    .portfolio-img img {
      width: 100%;
      height: 240px;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    .portfolio-item:hover .portfolio-img img { transform: scale(1.06); }
    .portfolio-overlay {
      position: absolute; top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(16, 64, 65, 0.85);
      display: flex; align-items: center; justify-content: center;
      opacity: 0; transition: opacity 0.3s ease;
    }
    .portfolio-item:hover .portfolio-overlay { opacity: 1; }
    .portfolio-overlay a {
      color: #104041;
      background: #ADFF1C;
      width: 44px; height: 44px;
      border-radius: 50%;
      display: inline-flex; align-items: center; justify-content: center;
      margin: 0 6px;
      font-size: 16px;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    .portfolio-overlay a:hover { background: #fff; transform: translateY(-3px); }
    .portfolio-content { padding: 20px; }
    .portfolio-content h3 { font-size: 18px; margin-bottom: 8px; color: #104041; font-weight: 700; }
    .portfolio-content p { color: #666; font-size: 14px; margin-bottom: 12px; line-height: 1.6; }
    .portfolio-category {
      font-size: 12px; color: #ADFF1C;
      background: #104041;
      padding: 3px 12px; border-radius: 20px;
      display: inline-block; margin-bottom: 10px; font-weight: 600;
    }
    .portfolio-tags span {
      background: #f0f7f0; color: #104041;
      padding: 3px 10px; border-radius: 15px;
      font-size: 11px; margin-right: 5px; margin-bottom: 5px;
      display: inline-block; font-weight: 500;
    }

    /* ---- Global Stats Bar ---- */
    .global-stat { text-align: center; padding: 18px 10px; }
    .global-stat h3 { font-size: 2.4rem; font-weight: 800; color: #ADFF1C; margin-bottom: 4px; line-height: 1; }
    .global-stat p { color: rgba(255,255,255,0.78); margin: 0; font-size: 0.88rem; }

    /* ---- Countries Section ---- */
    .region-block { margin-bottom: 10px; }
    .region-label {
      font-size: 0.72rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 1.2px;
      color: #104041;
      border-bottom: 2px solid #ADFF1C;
      padding-bottom: 5px;
      margin-bottom: 14px;
      display: inline-block;
    }
    .country-chip {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      background: #fff;
      border: 1px solid #dde9dd;
      border-radius: 30px;
      padding: 6px 14px;
      margin: 4px;
      font-size: 0.83rem;
      font-weight: 600;
      color: #104041;
      transition: all 0.3s ease;
      white-space: nowrap;
    }
    .country-chip:hover {
      background: #104041;
      color: #ADFF1C;
      border-color: #104041;
    }
    .country-chip .flag { font-size: 1rem; }

    /* ---- Why Hire Cards ---- */
    .why-card {
      background: #fff;
      border: 2px solid #e8f0e8;
      border-radius: 14px;
      padding: 28px 24px;
      height: 100%;
      transition: all 0.35s ease;
    }
    .why-card:hover {
      border-color: #ADFF1C;
      box-shadow: 0 14px 36px rgba(16, 64, 65, 0.12);
      transform: translateY(-5px);
    }
    .why-card .icon-wrap {
      width: 52px; height: 52px;
      background: #f0f7f0;
      border-radius: 12px;
      display: flex; align-items: center; justify-content: center;
      margin-bottom: 16px;
    }
    .why-card h5 { color: #104041; font-weight: 700; margin-bottom: 10px; font-size: 1.05rem; }
    .why-card p { color: #666; font-size: 0.9rem; line-height: 1.65; margin: 0; }

    /* ---- WhatsApp CTA ---- */
    .btn-whatsapp {
      background: #25D366;
      color: #fff !important;
      border: 2px solid #25D366;
      padding: 12px 28px;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }
    .btn-whatsapp:hover { background: #1da851; border-color: #1da851; transform: translateY(-2px); }

    .payment-badge {
      background: #fff;
      border: 1px solid #dde;
      border-radius: 8px;
      padding: 8px 18px;
      font-size: 0.9rem;
      font-weight: 700;
      color: #104041;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    .error-message { text-align: center; padding: 60px 0; color: #aaa; }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?= $site ?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="<?= $site ?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="<?= $site ?>assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>My Portfolio</h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>Portfolio</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== GLOBAL STATS BAR =======-->
  <section style="background: #104041;" class="py-4">
    <div class="container">
      <div class="row g-2 justify-content-center">
        <div class="col-6 col-md-3">
          <div class="global-stat">
            <h3><?= $projectCount ?>+</h3>
            <p>Projects Delivered</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="global-stat">
            <h3>20+</h3>
            <p>Countries Served</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="global-stat">
            <h3><?= $yearsExperience ?>+</h3>
            <p>Years Experience</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="global-stat">
            <h3>100%</h3>
            <p>Client Satisfaction</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== GLOBAL STATS BAR END =======-->

  <!--===== COUNTRIES WE SERVE =======-->
  <section class="py-5" style="background: #f8fdf8;">
    <div class="container">
      <div class="row mb-4">
        <div class="col-lg-8 m-auto text-center heading2">
          <h5>Global Reach</h5>
          <h2>Serving Clients Across 6 Continents</h2>
          <p class="text-muted">I work remotely with businesses of all sizes — from startups to enterprises — across the globe. Different timezone? No problem. Great work knows no borders.</p>
        </div>
      </div>

      <div class="row g-4">

        <!-- Middle East -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌍 Middle East</div>
            <div>
              <span class="country-chip"><span class="flag">🇦🇪</span> UAE</span>
              <span class="country-chip"><span class="flag">🇸🇦</span> Saudi Arabia</span>
              <span class="country-chip"><span class="flag">🇶🇦</span> Qatar</span>
              <span class="country-chip"><span class="flag">🇰🇼</span> Kuwait</span>
              <span class="country-chip"><span class="flag">🇧🇭</span> Bahrain</span>
              <span class="country-chip"><span class="flag">🇴🇲</span> Oman</span>
              <span class="country-chip"><span class="flag">🇯🇴</span> Jordan</span>
              <span class="country-chip"><span class="flag">🇪🇬</span> Egypt</span>
            </div>
          </div>
        </div>

        <!-- Europe -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌍 Europe</div>
            <div>
              <span class="country-chip"><span class="flag">🇬🇧</span> United Kingdom</span>
              <span class="country-chip"><span class="flag">🇩🇪</span> Germany</span>
              <span class="country-chip"><span class="flag">🇫🇷</span> France</span>
              <span class="country-chip"><span class="flag">🇳🇱</span> Netherlands</span>
              <span class="country-chip"><span class="flag">🇮🇹</span> Italy</span>
              <span class="country-chip"><span class="flag">🇪🇸</span> Spain</span>
              <span class="country-chip"><span class="flag">🇸🇪</span> Sweden</span>
              <span class="country-chip"><span class="flag">🇵🇱</span> Poland</span>
            </div>
          </div>
        </div>

        <!-- Oceania -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌏 Oceania &amp; Pacific</div>
            <div>
              <span class="country-chip"><span class="flag">🇦🇺</span> Australia</span>
              <span class="country-chip"><span class="flag">🇳🇿</span> New Zealand</span>
              <span class="country-chip"><span class="flag">🇫🇯</span> Fiji</span>
              <span class="country-chip"><span class="flag">🇵🇬</span> Papua New Guinea</span>
              <span class="country-chip"><span class="flag">🇼🇸</span> Samoa</span>
              <span class="country-chip"><span class="flag">🇹🇴</span> Tonga</span>
            </div>
          </div>
        </div>

        <!-- Americas -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌎 South America &amp; Canada</div>
            <div>
              <span class="country-chip"><span class="flag">🇨🇦</span> Canada</span>
              <span class="country-chip"><span class="flag">🇧🇷</span> Brazil</span>
              <span class="country-chip"><span class="flag">🇦🇷</span> Argentina</span>
              <span class="country-chip"><span class="flag">🇲🇽</span> Mexico</span>
              <span class="country-chip"><span class="flag">🇨🇱</span> Chile</span>
              <span class="country-chip"><span class="flag">🇨🇴</span> Colombia</span>
              <span class="country-chip"><span class="flag">🇵🇪</span> Peru</span>
              <span class="country-chip"><span class="flag">🇺🇾</span> Uruguay</span>
            </div>
          </div>
        </div>

        <!-- Asia-Pacific / Southeast Asia / Polynesia -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌏 Asia-Pacific &amp; Malaysia</div>
            <div>
              <span class="country-chip"><span class="flag">🇲🇾</span> Malaysia</span>
              <span class="country-chip"><span class="flag">🇸🇬</span> Singapore</span>
              <span class="country-chip"><span class="flag">🇵🇭</span> Philippines</span>
              <span class="country-chip"><span class="flag">🇮🇩</span> Indonesia</span>
              <span class="country-chip"><span class="flag">🇻🇳</span> Vietnam</span>
              <span class="country-chip"><span class="flag">🇹🇭</span> Thailand</span>
              <span class="country-chip"><span class="flag">🇧🇩</span> Bangladesh</span>
              <span class="country-chip"><span class="flag">🇱🇰</span> Sri Lanka</span>
            </div>
          </div>
        </div>

        <!-- Africa -->
        <div class="col-lg-4 col-md-6">
          <div class="region-block">
            <div class="region-label">🌍 Africa</div>
            <div>
              <span class="country-chip"><span class="flag">🇳🇬</span> Nigeria</span>
              <span class="country-chip"><span class="flag">🇿🇦</span> South Africa</span>
              <span class="country-chip"><span class="flag">🇰🇪</span> Kenya</span>
              <span class="country-chip"><span class="flag">🇬🇭</span> Ghana</span>
              <span class="country-chip"><span class="flag">🇪🇹</span> Ethiopia</span>
              <span class="country-chip"><span class="flag">🇹🇿</span> Tanzania</span>
              <span class="country-chip"><span class="flag">🇺🇬</span> Uganda</span>
              <span class="country-chip"><span class="flag">🇷🇼</span> Rwanda</span>
            </div>
          </div>
        </div>

      </div>

      <div class="text-center mt-4">
        <p class="text-muted">
          <i class="fa-solid fa-circle-info me-1" style="color:#104041;"></i>
          Not seeing your country? I'm open to working with clients from <strong>anywhere in the world</strong>.
          <a href="<?= $site ?>contact/" style="color:#104041; font-weight:700;">Let's Talk →</a>
        </p>
      </div>
    </div>
  </section>
  <!--===== COUNTRIES WE SERVE END =======-->

  <!--===== PORTFOLIO AREA STARTS =======-->
  <div class="portfolio-section-area sp1 bg2">
    <div class="container">

      <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="heading2">
          <h5>My Work</h5>
          <h2>Real Projects. Real Results.</h2>
        </div>
        <p class="text-muted mt-3" style="max-width: 720px; margin: 0 auto;">
          Every project below was built with performance, mobile-responsiveness, and real business goals in mind —
          for clients across <strong>India, UAE, UK, Australia</strong>, and beyond.
        </p>
      </div>

      <?php
      /*
       * FIX 1: Pre-fetch ALL sub-categories for parent 30797 into a lookup map.
       * Key   = cate_id (what each product stores in pro_sub_cate)
       * Value = slug_url (what the filter buttons use as data-filter)
       * This ensures filter buttons and portfolio data-category always match.
       */
      $sql_cats = "SELECT `cate_id`, `slug_url`, `categories`
                   FROM `sub_categories`
                   WHERE `parent_id` = '30797'
                   ORDER BY `categories` ASC";
      $res_cats  = mysqli_query($conn, $sql_cats);
      $subCatMap = [];   // cate_id  => slug_url
      $subCatName = [];  // slug_url => display name
      while ($sc = mysqli_fetch_assoc($res_cats)) {
          $subCatMap[$sc['slug_url']]       = $sc['slug_url'];
          $subCatName[$sc['slug_url']]     = $sc['slug_url'];
      }
      ?>

      <!-- Filter Buttons — pulled from same DB query used for data-category -->
      <div class="portfolio-filter text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
        <button class="active" data-filter="all">All Projects</button>
        <?php foreach ($subCatName as $slug => $label): ?>
          <button data-filter="<?= htmlspecialchars($slug) ?>">
            <?= htmlspecialchars(ucwords($label)) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Portfolio Grid -->
      <div class="row portfolio-container" id="portfolioGrid">
        <?php if (!empty($portfolios)): ?>
          <?php foreach ($portfolios as $portfolio):
            /*
             * FIX 2: category comes from DB (pro_sub_cate → slug_url).
             * No more keyword-guessing that never matched the filter buttons.
             */
            $category    = $subCatMap[$portfolio['pro_name'] ?? ''] ?? 'other';
            $displayName = !empty($portfolio['brand_name'])
                              ? $portfolio['brand_name']
                              : ($portfolio['pro_name'] ?? 'Project');
            $categoryLabel = $subCatName[$category] ?? ucfirst(str_replace('-', ' ', $category));
            $imgPath = !empty($portfolio['pro_img'])
                          ? $site . 'admin/assets/img/uploads/' . htmlspecialchars($portfolio['pro_img'])
                          : $site . 'assets/img/all-images/post-img1.png';
          ?>
          <!--
            FIX 3: data-category is on the OUTER column div (portfolio-col).
            JS hides/shows the column — no empty grid gaps.
          -->
          <div class="col-lg-4 col-md-6 mb-4 portfolio-col" data-category="<?= htmlspecialchars($category) ?>">
            <div class="portfolio-item">
              <div class="portfolio-img">
                <img src="<?= $imgPath ?>"
                     alt="<?= htmlspecialchars($displayName) ?> — Web Development by NikhilWorks"
                     loading="lazy">
                <div class="portfolio-overlay">
                  <a href="<?= $imgPath ?>" class="image-popup" title="View Full Image">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </a>
                  <?php if (!empty($portfolio['slug_url'])): ?>
                    <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20saw%20your%20portfolio%20project%20and%20I%27m%20interested%20in%20your%20services."
                       target="_blank"
                       rel="noopener noreferrer"
                       title="Chat on WhatsApp">
                      <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <?php endif; ?>
                </div>
              </div>
              <div class="portfolio-content">
                <span class="portfolio-category"><?= htmlspecialchars(ucwords($categoryLabel)) ?></span>
                <h3><?= htmlspecialchars($displayName) ?></h3>
                <p><?= htmlspecialchars(substr(strip_tags($portfolio['short_desc'] ?? ''), 0, 100)) ?>…</p>
                <div class="portfolio-tags">
                  <span>Web Design</span>
                  <span>Development</span>
                  <span>Responsive</span>
                </div>
              </div>
            </div>
          </div>

          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 error-message">
            <i class="fa-solid fa-folder-open fa-3x mb-3" style="color:#ccc; display:block;"></i>
            <h4>Portfolio Coming Soon</h4>
            <p>We're uploading our latest work.
              <a href="<?= $site ?>contact/" style="color:#104041; font-weight:700;">Contact us</a>
              to discuss your project in the meantime!
            </p>
          </div>
        <?php endif; ?>

        <!-- No results message (shown by JS when filter has 0 matches) -->
        <div class="col-12 text-center py-5 d-none" id="noResults">
          <i class="fa-solid fa-filter-circle-xmark fa-3x mb-3" style="color:#ccc;"></i>
          <h5 class="text-muted">No projects found in this category yet.</h5>
        </div>
      </div>

    </div>
  </div>
  <!--===== PORTFOLIO AREA ENDS =======-->

  <!--===== WHY HIRE FROM INDIA =======-->
  <section class="sp1" style="background: #f8fdf8;">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 m-auto text-center heading2">
          <h5>Why Work With Me</h5>
          <h2>Why Global Clients Choose NikhilWorks</h2>
          <p class="text-muted">Hiring a skilled Indian developer isn't just cost-effective — it's a smart strategic move for businesses in the UAE, UK, Australia, Canada, and beyond.</p>
        </div>
      </div>
      <div class="row g-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="600">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-piggy-bank fa-lg" style="color:#104041;"></i></div>
            <h5>60–70% Cost Savings</h5>
            <p>Get premium-quality web development at a fraction of what developers in the USA, UK, or Australia charge — without any compromise on quality, speed, or communication.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-comments fa-lg" style="color:#104041;"></i></div>
            <h5>Fluent English Communication</h5>
            <p>Clear, professional communication via WhatsApp, Zoom, Slack, or email. Detailed project documentation and regular milestone updates — every step of the way.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-earth-asia fa-lg" style="color:#104041;"></i></div>
            <h5>Flexible Timezone Coverage</h5>
            <p>IST (UTC+5:30) overlaps with UAE mornings, UK afternoons, Australia evenings, and US nights — meaning fast responses regardless of where you're located.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-credit-card fa-lg" style="color:#104041;"></i></div>
            <h5>International Payments Accepted</h5>
            <p>Pay via <strong>PayPal, Wise, bank transfer</strong>, or crypto. Invoices issued in USD, AED, GBP, AUD, CAD, EUR, or any currency you prefer.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-shield-halved fa-lg" style="color:#104041;"></i></div>
            <h5>NDA &amp; Full IP Transfer</h5>
            <p>I sign an NDA before every project begins. Full intellectual property rights are transferred to you on completion — your code, your business asset, forever.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="why-card">
            <div class="icon-wrap"><i class="fa-solid fa-rocket fa-lg" style="color:#104041;"></i></div>
            <h5>Fast, Predictable Delivery</h5>
            <p>Static websites in <strong>3–5 days</strong>, dynamic websites in <strong>1–3 weeks</strong>. Agile milestones so you always know exactly where your project stands.</p>
          </div>
        </div>

      </div>

      <!-- Accepted Payment Methods -->
      <div class="text-center mt-5 pt-3">
        <p class="text-muted mb-3 fw-semibold">Accepted Payment Methods</p>
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <span class="payment-badge"><i class="fa-brands fa-paypal" style="color:#003087;"></i> PayPal</span>
          <span class="payment-badge"><i class="fa-solid fa-money-bill-transfer" style="color:#00b9ff;"></i> Wise (TransferWise)</span>
          <span class="payment-badge"><i class="fa-solid fa-building-columns" style="color:#104041;"></i> Bank Transfer</span>
          <span class="payment-badge"><i class="fa-brands fa-bitcoin" style="color:#f7931a;"></i> Crypto</span>
        </div>
      </div>

    </div>
  </section>
  <!--===== WHY HIRE FROM INDIA END =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">Ready to Build Something Amazing?</h2>
            <p data-aos="fade-up" data-aos-duration="1000">
              Whether you're in <strong>Dubai, London, Sydney, Toronto, Lagos, or Kuala Lumpur</strong> —
              let's collaborate remotely and build a website that grows your business.
              I typically respond within <strong>4–6 hours</strong>.
            </p>
            <div class="d-flex gap-3 justify-content-center flex-wrap mt-4" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get A Free Quote <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20saw%20your%20portfolio%20and%20want%20to%20discuss%20a%20project."
                 class="btn-whatsapp" target="_blank" rel="noopener">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp Now
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Portfolio Filter & Lightbox Script -->
  <script>
    $(document).ready(function () {

      // Filter with smooth fade
      $('.portfolio-filter button').on('click', function () {
        var filter = $(this).attr('data-filter');
        $('.portfolio-filter button').removeClass('active');
        $(this).addClass('active');

        if (filter === 'all') {
          $('.portfolio-item').fadeIn(300);
        } else {
          $('.portfolio-item').fadeOut(150);
          setTimeout(function () {
            $('.portfolio-item[data-category="' + filter + '"]').fadeIn(300);
          }, 200);
        }
      });

      // Magnific Popup lightbox
      $('.image-popup').magnificPopup({
        type: 'image',
        gallery: { enabled: true },
        image: { verticalFit: true }
      });

    });
  </script>

</body>
</html>
