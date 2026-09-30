<?php
include "config/connect.php";
include_once "util/function.php";

/* Check alias */
$cat_slug = $_GET['alias'] ?? '';

/* Secure query */
$cat_slug = mysqli_real_escape_string($conn, $cat_slug);
$sql = "SELECT slug_url, cate_id FROM sub_categories WHERE slug_url = '$cat_slug'";
$res = mysqli_query($conn, $sql);
if (!$res || mysqli_num_rows($res) == 0) {
  header("Location: $site");
  exit;
}
$row = mysqli_fetch_assoc($res);
$cate_id = $row['cate_id'];

/* Other data */
$limit = 3;
$contact = contact_us();
$product_details = fetch_product_details($cate_id);
$yearsExperience = years_in_business(2022, 8);
$projectCount = count_portfolio_projects();

/* Build full canonical URL for this service page */
$canonical_url = rtrim($site, '/') . '/service/' . $cat_slug . '/';

/* Build og:image — use service image if available, else fallback */
$og_image = !empty($product_details['pro_img'])
  ? rtrim($site, '/') . '/admin/assets/img/uploads/' . $product_details['pro_img']
  : rtrim($site, '/') . '/assets/img/web-development-global.jpg';
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

  <!-- Dynamic title -->
  <title><?= htmlspecialchars($product_details['meta_title'] ?: $product_details['pro_name'] . ' Services | NikhilWorks') ?></title>

  <!-- Dynamic meta tags -->
  <meta name="description" content="<?= htmlspecialchars($product_details['meta_desc'] ?: 'Professional ' . $product_details['pro_name'] . ' services by Nikhil Gupta. Fast, high-converting, SEO-optimized solutions across Delhi NCR and global clients.') ?>">
  <meta name="keywords" content="<?= htmlspecialchars($product_details['meta_key'] ?: $product_details['pro_name'] . ', web development, Delhi NCR, freelance developer') ?>">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Nikhil Gupta - NikhilWorks">

  <!-- Geo Tags -->
  <meta name="geo.region" content="IN-DL">
  <meta name="geo.placename" content="Delhi">
  <meta name="geo.position" content="28.6139;77.2090">
  <meta name="ICBM" content="28.6139, 77.2090">

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $canonical_url ?>">
  <!-- International SEO: hreflang tags -->
  <link rel="alternate" hreflang="en" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-IN" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AE" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-US" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-GB" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AU" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="x-default" href="<?= $canonical_url ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($product_details['meta_title'] ?: $product_details['pro_name']) ?> | NikhilWorks">
  <meta property="og:description" content="<?= htmlspecialchars($product_details['meta_desc']) ?>">
  <meta property="og:image" content="<?= $og_image ?>">
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_IN">
  <meta property="og:locale:alternate" content="en_AU">
  <meta property="og:locale:alternate" content="en_GB">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($product_details['meta_title'] ?: $product_details['pro_name']) ?> | NikhilWorks">
  <meta name="twitter:description" content="<?= htmlspecialchars($product_details['meta_desc']) ?>">
  <meta name="twitter:image" content="<?= $og_image ?>">
  <meta name="twitter:site" content="@NikhilG69581514">

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= rtrim($site, '/') ?>/"},
      {"@type": "ListItem", "position": 2, "name": "Services", "item": "<?= rtrim($site, '/') ?>/services/"},
      {"@type": "ListItem", "position": 3, "name": "<?= json_ld_esc($product_details['pro_name']) ?>", "item": "<?= $canonical_url ?>"}
    ]
  }
  </script>

  <!-- Schema: ProfessionalService + Service -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "<?= json_ld_esc($product_details['pro_name']) ?>",
    "description": "<?= json_ld_esc(strip_tags($product_details['meta_desc'])) ?>",
    "url": "<?= $canonical_url ?>",
    "provider": {
      "@type": "ProfessionalService",
      "name": "NikhilWorks",
      "url": "<?= rtrim($site, '/') ?>/",
      "image": "<?= rtrim($site, '/') ?>/assets/img/logo/fav-logo5.png",
      "telephone": "+91-8368552640",
      "email": "contact@nikhilworks.com",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Karampura",
        "addressRegion": "Delhi",
        "postalCode": "110015",
        "addressCountry": "IN"
      },
      "areaServed": [
        { "@type": "City", "name": "Delhi" },
        { "@type": "City", "name": "Mumbai" },
        { "@type": "City", "name": "Bangalore" },
        { "@type": "City", "name": "Hyderabad" },
        { "@type": "City", "name": "Pune" },
        { "@type": "City", "name": "Chennai" },
        { "@type": "City", "name": "Noida" },
        { "@type": "City", "name": "Gurgaon" },
        { "@type": "Country", "name": "India" },
        { "@type": "Country", "name": "United States" },
        { "@type": "Country", "name": "United Kingdom" },
        { "@type": "Country", "name": "United Arab Emirates" },
        { "@type": "Country", "name": "Australia" }
      ],
      "sameAs": [
        "https://www.facebook.com/profile.php?id=61559869365624",
        "https://www.instagram.com/nikhil_gupta_998/",
        "https://x.com/NikhilG69581514",
        "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
        "https://github.com/nikhilgupta-9"
      ]
    }
  }
  </script>

  <!-- FAQPage Schema for Featured Snippets -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "How long does it take to deliver <?= htmlspecialchars($product_details['pro_name']) ?>?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Delivery typically takes 3–5 business days for standard sites and 1–3 weeks for custom dynamic or enterprise web applications."
        }
      },
      {
        "@type": "Question",
        "name": "Do you provide post-launch support and maintenance?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. Every project includes comprehensive post-launch warranty and ongoing maintenance support to ensure 100% uptime and speed."
        }
      },
      {
        "@type": "Question",
        "name": "Will my project be fully mobile-responsive and SEO-ready?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Absolutely. Every deliverable features 100% responsive design across all devices and built-in technical SEO with schema markup."
        }
      },
      {
        "@type": "Question",
        "name": "Do you serve clients outside Delhi NCR?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! We serve clients across all major Indian cities including Mumbai, Bangalore, Pune, Hyderabad, Chennai, as well as global clients in the USA, UK, UAE, and Australia."
        }
      }
    ]
  }
  </script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Links -->
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

  <!-- JS -->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* GRID OVERLAY HERO */
    .service-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.85) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0d3435 55%, #041213 100%);
      padding: 135px 0 85px;
      overflow: hidden;
      color: #fff;
    }
    .loc-grid-overlay {
      position: absolute;
      inset: 0;
      background-image: 
        linear-gradient(to right, rgba(173, 255, 28, 0.04) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(173, 255, 28, 0.04) 1px, transparent 1px);
      background-size: 38px 38px;
      pointer-events: none;
      z-index: 1;
    }
    .hero-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
      letter-spacing: 0.3px;
    }
    .hero-badge-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: #ADFF1C;
      border-radius: 50%;
      box-shadow: 0 0 10px #ADFF1C;
      animation: pulseAnim 2s infinite;
    }
    @keyframes pulseAnim {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.4; transform: scale(0.85); }
    }
    .service-hero h1 {
      font-size: clamp(2.2rem, 4.5vw, 3.4rem);
      font-weight: 800;
      line-height: 1.18;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }
    .service-hero h1 span.highlight {
      color: #ADFF1C;
      position: relative;
    }
    .service-hero p.lead-text {
      font-size: clamp(1rem, 1.8vw, 1.15rem);
      color: #d1e4e3;
      max-width: 820px;
      margin: 0 auto 32px;
      line-height: 1.7;
    }
    .hero-action-group {
      display: flex;
      gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 40px;
    }
    .btn-hero-primary {
      background: #ADFF1C;
      color: #082223 !important;
      font-weight: 700;
      font-size: 15px;
      padding: 13px 28px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 25px rgba(173, 255, 28, 0.25);
      text-decoration: none;
    }
    .btn-hero-primary:hover {
      background: #ffffff;
      color: #082223 !important;
      transform: translateY(-3px);
      box-shadow: 0 14px 30px rgba(255, 255, 255, 0.3);
    }
    .btn-hero-outline {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff !important;
      border: 1px solid rgba(255, 255, 255, 0.25);
      font-weight: 600;
      font-size: 15px;
      padding: 13px 26px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      backdrop-filter: blur(8px);
      text-decoration: none;
    }
    .btn-hero-outline:hover {
      background: rgba(255, 255, 255, 0.18);
      border-color: #ffffff;
      transform: translateY(-3px);
    }

    /* STATS STRIP */
    .service-stats-strip {
      background: #082223;
      border-top: 1px solid rgba(173, 255, 28, 0.2);
      border-bottom: 1px solid rgba(173, 255, 28, 0.2);
      padding: 30px 0;
    }
    .stat-number {
      font-size: 2.5rem;
      font-weight: 800;
      color: #ADFF1C;
      margin-bottom: 4px;
      line-height: 1.1;
    }

    /* OVERVIEW CARD */
    .overview-card {
      background: #ffffff;
      border-radius: 20px;
      border: 1px solid #e1eceb;
      padding: 40px;
      box-shadow: 0 15px 40px rgba(16, 64, 65, 0.06);
    }
    .overview-img-box {
      position: relative;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
      border: 2px solid #e8f3f2;
    }
    .overview-img-box img {
      width: 100%;
      height: auto;
      display: block;
      transition: transform 0.4s ease;
    }
    .overview-img-box:hover img {
      transform: scale(1.03);
    }

    /* PRICING CARDS */
    .service-pricing-card {
      background: #ffffff;
      border: 2px solid #e6f0ee;
      border-radius: 20px;
      padding: 35px 28px;
      transition: all 0.35s ease;
      position: relative;
      display: flex;
      flex-direction: column;
      height: 100%;
    }
    .service-pricing-card.featured {
      background: #082223;
      border-color: #ADFF1C;
      color: #ffffff;
      transform: translateY(-6px);
      box-shadow: 0 18px 45px rgba(16, 64, 65, 0.25);
    }
    .service-pricing-card:hover {
      border-color: #ADFF1C;
      transform: translateY(-8px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.12);
    }
    .pricing-popular-badge {
      position: absolute;
      top: -14px;
      right: 25px;
      background: #ADFF1C;
      color: #082223;
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      padding: 5px 14px;
      border-radius: 20px;
    }
    .price-value {
      font-size: 2.2rem;
      font-weight: 800;
      margin: 16px 0 8px;
    }
    .price-features-list {
      list-style: none;
      padding: 0;
      margin: 24px 0;
      flex-grow: 1;
    }
    .price-features-list li {
      padding: 8px 0;
      font-size: 14px;
      display: flex;
      align-items: center;
      gap: 10px;
      border-bottom: 1px dashed rgba(0, 0, 0, 0.06);
    }
    .service-pricing-card.featured .price-features-list li {
      border-bottom-color: rgba(255, 255, 255, 0.1);
      color: #d8ecea;
    }
    .price-features-list li i {
      color: #25D366;
    }

    /* PROCESS STEP */
    .process-step-box {
      background: #fff;
      border: 2px solid #e8f0e8;
      border-radius: 16px;
      transition: all 0.35s ease;
      padding: 30px 20px;
      height: 100%;
    }
    .process-step-box:hover {
      border-color: #ADFF1C;
      box-shadow: 0 14px 38px rgba(16, 64, 65, 0.12);
      transform: translateY(-6px);
    }
    .step-number {
      font-size: 2.5rem;
      font-weight: 900;
      -webkit-text-stroke: 2px #104041;
      color: transparent;
      line-height: 1;
      font-family: 'Courier New', monospace;
    }

    /* TECH BADGES */
    .tech-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #fff;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: 600;
      color: #104041;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      cursor: default;
      white-space: nowrap;
    }
    .tech-badge:hover {
      border-color: #104041;
      background: #104041;
      color: #ADFF1C;
    }

    /* LOCAL SEO HUBS & DELHI NCR */
    .loc-seo-hub-section {
      padding: 85px 0 95px;
      background: #f7faf9;
    }
    .city-card-box {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      padding: 24px 20px;
      height: 100%;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .city-card-box:hover {
      border-color: #104041;
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(16, 64, 65, 0.08);
    }
    .city-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }
    .city-name-title {
      font-size: 1.2rem;
      font-weight: 800;
      color: #0f2d2e;
      margin: 0;
    }
    .city-badge-hub {
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      font-size: 11px;
      font-weight: 800;
      padding: 3px 8px;
      border-radius: 20px;
      text-transform: uppercase;
    }
    .city-micro-list {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin: 10px 0 16px;
      flex-grow: 1;
    }
    .city-micro-chip {
      background: #f1f7f6;
      border: 1px solid #d4e3e2;
      border-radius: 6px;
      padding: 3px 8px;
      font-size: 11px;
      color: #496362;
      font-weight: 600;
    }
    .city-card-link {
      color: #104041;
      font-size: 13px;
      font-weight: 800;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s ease;
      margin-top: auto;
    }
    .city-card-link:hover {
      color: #082223;
      gap: 10px;
    }

    .delhi-deep-panel {
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 24px;
      padding: 40px 30px;
      color: #ffffff;
      margin: 45px 0 25px;
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.2);
    }
    .delhi-ncr-zone-title {
      color: #ADFF1C;
      font-size: 14px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .locality-tags-cloud {
      display: flex;
      flex-wrap: wrap;
      gap: 7px;
      margin-bottom: 20px;
    }
    .locality-tag {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #d6ecea;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 500;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .locality-tag:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
    }

    /* FAQ ACCORDION */
    .faq-item {
      border: 1px solid #dde9dd !important;
      border-radius: 12px !important;
      overflow: hidden;
      background: #fff;
    }
    .faq-btn {
      background: #fff;
      color: #104041;
      font-weight: 600;
      font-size: 1rem;
      box-shadow: none !important;
      padding: 18px 22px;
    }
    .faq-btn:not(.collapsed) {
      background: #104041;
      color: #ADFF1C;
    }
    .faq-btn:not(.collapsed)::after {
      filter: brightness(10);
    }
  </style>
</head>
<body class="homepage4-body">
  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA =======-->
  <section class="service-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="hero-badge-pill" data-aos="fade-down">
            <span class="pulse-dot"></span>
            Professional Freelance Service · Delhi NCR & Global
          </div>
          <h1 data-aos="fade-up" data-aos-duration="700">
            <?= htmlspecialchars($product_details['pro_name']) ?>
          </h1>
          <p class="lead-text" data-aos="fade-up" data-aos-duration="900">
            <?= htmlspecialchars($product_details['meta_desc'] ?: 'High-performance, search-engine-ready, and conversion-focused web development tailored for businesses in Delhi NCR, Mumbai, Bangalore, and international markets.') ?>
          </p>
          <div class="hero-action-group" data-aos="fade-up" data-aos-duration="1100">
            <a href="<?= $site ?>contact/" class="btn-hero-primary">
              <i class="fa-solid fa-paper-plane"></i> Get Free Consultation
            </a>
            <a href="<?= $site ?>website-development-cost-india/" class="btn-hero-outline">
              <i class="fa-solid fa-calculator"></i> Cost Calculator
            </a>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20<?= urlencode($product_details['pro_name']) ?>" target="_blank" rel="noopener" class="btn-hero-outline" style="background:#25D366; border-color:#25D366; color:#fff !important;">
              <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== STATS STRIP =======-->
  <section class="service-stats-strip">
    <div class="container">
      <div class="row g-4 text-center text-white">
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="500">
          <div class="stat-number"><?= $projectCount ?>+</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Delivered Projects</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="700">
          <div class="stat-number"><?= $yearsExperience ?>+</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Years Experience</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="900">
          <div class="stat-number">100%</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Client Satisfaction</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="1100">
          <div class="stat-number">24/7</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Direct Support</p>
        </div>
      </div>
    </div>
  </section>

  <!--===== SERVICE OVERVIEW =======-->
  <section class="py-5" style="background: #ffffff;">
    <div class="container py-4">
      <div class="overview-card" data-aos="fade-up">
        <div class="row align-items-center g-5">
          <?php if (!empty($product_details['pro_img'])): ?>
          <div class="col-lg-6">
            <span class="badge text-uppercase px-3 py-2 mb-3" style="background:#eaf8e2; color:#104041; font-weight:700;">
              Service Details
            </span>
            <h2 class="h1 mb-3 text-dark fw-bold"><?= htmlspecialchars($product_details['pro_name']) ?></h2>
            <div class="mb-3 lead text-muted"><?= $product_details['short_desc'] ?></div>
            <div class="text-secondary" style="line-height: 1.8;">
              <?= $product_details['description'] ?>
            </div>
            <div class="mt-4 pt-2 d-flex gap-3 flex-wrap">
              <a href="<?= $site ?>contact/" class="header-btn11">Start Your Project <i class="fa-solid fa-arrow-right"></i></a>
              <a href="<?= $site ?>portfolio/" class="header-btn10">View Portfolio <i class="fa-solid fa-eye"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="overview-img-box">
              <img
                src="<?= $site ?>admin/assets/img/uploads/<?= $product_details['pro_img'] ?>"
                class="img-fluid"
                alt="<?= htmlspecialchars($product_details['pro_name']) ?>"
                loading="lazy"
                width="600"
                height="400">
            </div>
          </div>
          <?php else: ?>
          <div class="col-lg-12">
            <span class="badge text-uppercase px-3 py-2 mb-3" style="background:#eaf8e2; color:#104041; font-weight:700;">
              Service Overview
            </span>
            <h2 class="h1 mb-3 text-dark fw-bold"><?= htmlspecialchars($product_details['pro_name']) ?></h2>
            <div class="mb-3 lead text-muted"><?= $product_details['short_desc'] ?></div>
            <div class="text-secondary" style="line-height: 1.8;">
              <?= $product_details['description'] ?>
            </div>
            <div class="mt-4 pt-2 d-flex gap-3 flex-wrap">
              <a href="<?= $site ?>contact/" class="header-btn11">Start Your Project <i class="fa-solid fa-arrow-right"></i></a>
              <a href="<?= $site ?>pricing/" class="header-btn10">View Pricing <i class="fa-solid fa-tag"></i></a>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!--===== PROCESS WORKFLOW =======-->
  <section class="sp1 bg-light">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 m-auto text-center heading2">
          <h5>Proven Delivery System</h5>
          <h2>How I Deliver Your <?= htmlspecialchars($product_details['pro_name']) ?> Project</h2>
          <p class="text-muted">A clear, milestone-driven workflow ensuring on-time delivery, bug-free execution, and seamless launch.</p>
        </div>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="process-step-box text-center">
            <div class="step-number">01</div>
            <div class="my-3"><i class="fa-solid fa-magnifying-glass fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Requirement & Scope</h5>
            <p class="text-muted small mb-0">Deep dive into your business goals, target audience, reference sites, and technical architecture.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="process-step-box text-center">
            <div class="step-number">02</div>
            <div class="my-3"><i class="fa-solid fa-pen-ruler fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">UI/UX & Wireframing</h5>
            <p class="text-muted small mb-0">Modern, mobile-responsive layout crafted to maximize user engagement and conversion rate.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="process-step-box text-center">
            <div class="step-number">03</div>
            <div class="my-3"><i class="fa-solid fa-code fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Clean Development</h5>
            <p class="text-muted small mb-0">Speed-optimized coding, secure backend databases, and seamless 3rd-party API integrations.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="process-step-box text-center">
            <div class="step-number">04</div>
            <div class="my-3"><i class="fa-solid fa-rocket fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">SEO & Deployment</h5>
            <p class="text-muted small mb-0">Core Web Vitals check, JSON-LD Schema integration, domain setup, SSL, and post-launch warranty.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== TECH STACK =======-->
  <section class="py-5" style="background: #082223; color:#fff;">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 m-auto text-center heading2 text-white">
          <h5 class="text-uppercase" style="color:#ADFF1C;">Modern Technologies</h5>
          <h2 class="text-white">Tech Stack Engineered for Scale & Speed</h2>
          <p class="text-white-50">Industry standard frameworks and database systems ensuring top Core Web Vitals and zero security loopholes.</p>
        </div>
      </div>
      <div class="row g-3 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-php" style="color:#7a86b8;"></i> PHP 8.2+</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-solid fa-database" style="color:#00758f;"></i> MySQL</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-react" style="color:#61dafb;"></i> React.js</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-node-js" style="color:#68a063;"></i> Node.js</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-laravel" style="color:#ff2d20;"></i> Laravel</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-wordpress" style="color:#21759b;"></i> WordPress / WooCommerce</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-js" style="color:#f7df1e;"></i> Modern ES6+</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-bootstrap" style="color:#7952b3;"></i> Bootstrap 5</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-solid fa-leaf" style="color:#4db33d;"></i> MongoDB</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-git-alt" style="color:#f05032;"></i> Git & GitHub</div></div>
      </div>
    </div>
  </section>

  <!--===== PRICING PLANS (UPDATED & INTERNATIONAL STANDARD) =======-->
  <section class="sp2" style="background: #f7faf9;">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-8 m-auto text-center heading2">
          <h5>Transparent Pricing</h5>
          <h2>Fixed-Price Investment Packages</h2>
          <p class="text-muted">No hidden recurring fees. Complete source code ownership, NDA confidentiality, and post-launch bug warranty included.</p>
        </div>
      </div>
      <div class="row g-4">
        <!-- WordPress Website -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="service-pricing-card">
            <h4>WordPress Website</h4>
            <p class="text-muted small">Ideal for blogs, corporate portals & service businesses.</p>
            <div class="price-value" style="color: #104041;">₹7,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $99</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> 1-5 Custom WordPress Pages</li>
              <li><i class="fa-solid fa-check"></i> Elementor / Block Editor Ready</li>
              <li><i class="fa-solid fa-check"></i> Contact Form + WhatsApp Chat</li>
              <li><i class="fa-solid fa-check"></i> Mobile Responsive & Fast Speed</li>
              <li><i class="fa-solid fa-check"></i> 30-Day Bug-Free Warranty</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20WordPress%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">
              Choose WordPress <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Dynamic PHP/MySQL (Featured) -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="service-pricing-card featured">
            <span class="pricing-popular-badge">Most Popular</span>
            <h4 class="text-white">Dynamic Website</h4>
            <p class="text-white-50 small">Custom PHP & MySQL with powerful admin dashboard.</p>
            <div class="price-value text-white" style="color: #ADFF1C !important;">₹9,999 <span style="font-size:14px; font-weight:500; color:#d8ecea;">/ $129</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> 5-10 Custom Dynamic Pages</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Admin Panel for CMS Control</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Lead Management & Email Alerts</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> On-Page SEO & Schema Markup</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> 60-Day Dedicated Support</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Dynamic%20Website%20Package" target="_blank" rel="noopener" class="header-btn8 w-100 text-center" style="background:#ADFF1C; color:#082223 !important; font-weight:700;">
              Choose Dynamic <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- MERN Web App -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="service-pricing-card">
            <h4>MERN Full-Stack</h4>
            <p class="text-muted small">React.js, Node.js & MongoDB for scalable web apps.</p>
            <div class="price-value" style="color: #104041;">₹18,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $249</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Single Page React (SPA) / Next.js</li>
              <li><i class="fa-solid fa-check"></i> REST API Backend Architecture</li>
              <li><i class="fa-solid fa-check"></i> JWT Auth & Role-Based Access</li>
              <li><i class="fa-solid fa-check"></i> MongoDB Database Design</li>
              <li><i class="fa-solid fa-check"></i> 90-Day Priority Support</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20MERN%20Full-Stack%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">
              Choose MERN <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- E-Commerce Store -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="service-pricing-card">
            <h4>E-Commerce Store</h4>
            <p class="text-muted small">Complete online store with payment gateway.</p>
            <div class="price-value" style="color: #104041;">₹21,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $289</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Product Catalog & Category System</li>
              <li><i class="fa-solid fa-check"></i> Razorpay / Stripe / PayPal Gateway</li>
              <li><i class="fa-solid fa-check"></i> Cart, Checkout & Order Invoices</li>
              <li><i class="fa-solid fa-check"></i> Inventory & Coupon Management</li>
              <li><i class="fa-solid fa-check"></i> 90-Day VIP Support & Training</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Ecommerce%20Store%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">
              Choose E-Commerce <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Quick Action Footnote -->
      <div class="text-center mt-5">
        <p class="text-muted">Need a custom feature set or enterprise contract? <a href="<?= $site ?>contact/" class="fw-bold text-dark text-decoration-underline">Request a Custom Quote</a> or <a href="<?= $site ?>website-development-cost-india/" class="fw-bold text-dark text-decoration-underline">Calculate Online Cost</a>.</p>
      </div>
    </div>
  </section>

  <!--===== LOCAL SEO SECTION: DELHI NCR & TOP INDIAN METROS =======-->
  <section class="loc-seo-hub-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-9 mx-auto">
          <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#eaf8e2; color:#104041; font-weight:800; letter-spacing:0.5px;">
            Local & Regional Reach
          </span>
          <h2 class="h1 fw-bold text-dark">Serving Businesses Across Delhi NCR & Major Indian Tech Hubs</h2>
          <p class="text-muted">
            Whether you are a startup in Bangalore, an enterprise in Mumbai, or a local business in Delhi NCR (Karampura, Connaught Place, Pitampura, Noida, Gurgaon), get dedicated freelance web engineering with on-site availability in Delhi and 100% remote availability nationwide.
          </p>
        </div>
      </div>

      <!-- Major Metro City Cards -->
      <div class="row g-4">
        <!-- Delhi Hub -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Delhi NCR</h3>
              <span class="city-badge-hub">HQ Base</span>
            </div>
            <p class="text-muted small mb-2">Karampura, Connaught Place, Nehru Place, Pitampura, NSP & Janakpuri.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Karampura</span>
              <span class="city-micro-chip">CP</span>
              <span class="city-micro-chip">Nehru Place</span>
              <span class="city-micro-chip">Rohini</span>
            </div>
            <a href="<?= $site ?>web-designer-delhi/" class="city-card-link">
              Delhi Web Services <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Mumbai Hub -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Mumbai</h3>
              <span class="city-badge-hub">Financial Hub</span>
            </div>
            <p class="text-muted small mb-2">BKC, Andheri, Lower Parel, Powai, Navi Mumbai & Thane.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">BKC</span>
              <span class="city-micro-chip">Andheri</span>
              <span class="city-micro-chip">Powai</span>
              <span class="city-micro-chip">Lower Parel</span>
            </div>
            <a href="<?= $site ?>web-developer-mumbai/" class="city-card-link">
              Mumbai Web Services <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Bangalore Hub -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Bangalore</h3>
              <span class="city-badge-hub">Silicon Valley</span>
            </div>
            <p class="text-muted small mb-2">Koramangala, Indiranagar, Whitefield, HSR Layout & Electronic City.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Koramangala</span>
              <span class="city-micro-chip">HSR Layout</span>
              <span class="city-micro-chip">Whitefield</span>
            </div>
            <a href="<?= $site ?>web-developer-bangalore/" class="city-card-link">
              Bangalore Services <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Gurgaon / Noida Hub -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Gurgaon & Noida</h3>
              <span class="city-badge-hub">Corporate NCR</span>
            </div>
            <p class="text-muted small mb-2">Cyber City, Golf Course Road, Sector 62, Sector 18 & Expressway.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Cyber City</span>
              <span class="city-micro-chip">Sec 62</span>
              <span class="city-micro-chip">Sec 18</span>
            </div>
            <a href="<?= $site ?>web-developer-gurgaon/" class="city-card-link">
              NCR Corporate Web <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Deep Delhi NCR Locality Panel -->
      <div class="delhi-deep-panel" data-aos="fade-up">
        <div class="row mb-4">
          <div class="col-lg-12">
            <h3 class="text-white fw-bold mb-2">
              <i class="fa-solid fa-location-dot" style="color: #ADFF1C;"></i> Direct Coverage Across All Delhi NCR Micro-Markets
            </h3>
            <p class="text-white-50 mb-0 small">
              Instant on-demand consultation, fast delivery, and dedicated support for all prime business districts across West, South, North, East, and Central Delhi NCR:
            </p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-map-pin"></i> West & Central Delhi</div>
            <div class="locality-tags-cloud">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Karampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Connaught Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Punjabi Bagh</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Patel Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Rajouri Garden</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Janakpuri</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Dwarka</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Kirti Nagar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-map-pin"></i> South & East Delhi</div>
            <div class="locality-tags-cloud">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Nehru Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Saket</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Hauz Khas</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Greater Kailash</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Okhla Industrial</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Laxmi Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Preet Vihar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-map-pin"></i> North & Outer Delhi</div>
            <div class="locality-tags-cloud">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Netaji Subhash Place (NSP)</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Pitampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Rohini</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Model Town</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Civil Lines</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-tag">Wazirpur</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-map-pin"></i> Noida, Gurgaon & NCR</div>
            <div class="locality-tags-cloud">
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-tag">Cyber City Gurgaon</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-tag">Golf Course Road</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-tag">Udyog Vihar</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-tag">Noida Sector 62</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-tag">Noida Sector 18</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-tag">Indirapuram Ghaziabad</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-tag">Faridabad</a>
            </div>
          </div>
        </div>

        <!-- Pan-India City Crosslink Strip -->
        <div class="pt-3 border-top border-secondary">
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="text-white-50 small fw-bold me-2"><i class="fa-solid fa-globe" style="color:#ADFF1C;"></i> Other Major Indian Hubs:</span>
            <a href="<?= $site ?>web-developer-hyderabad/" class="locality-tag">Hyderabad</a>
            <a href="<?= $site ?>web-developer-pune/" class="locality-tag">Pune</a>
            <a href="<?= $site ?>web-developer-chennai/" class="locality-tag">Chennai</a>
            <a href="<?= $site ?>web-developer-kolkata/" class="locality-tag">Kolkata</a>
            <a href="<?= $site ?>web-developer-ahmedabad/" class="locality-tag">Ahmedabad</a>
            <a href="<?= $site ?>web-developer-surat/" class="locality-tag">Surat</a>
            <a href="<?= $site ?>web-developer-jaipur/" class="locality-tag">Jaipur</a>
            <a href="<?= $site ?>web-developer-chandigarh/" class="locality-tag">Chandigarh</a>
            <a href="<?= $site ?>web-developer-lucknow/" class="locality-tag">Lucknow</a>
            <a href="<?= $site ?>web-developer-indore/" class="locality-tag">Indore</a>
            <a href="<?= $site ?>web-developer-kochi/" class="locality-tag">Kochi</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== FAQ SECTION =======-->
  <section class="sp1 bg-white">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 m-auto text-center heading2">
          <h5>Got Questions?</h5>
          <h2>Frequently Asked Questions</h2>
          <p class="text-muted">Common queries clients have before initiating their <?= htmlspecialchars($product_details['pro_name']) ?> project.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="accordion d-flex flex-column gap-3" id="serviceFaqAccordion">
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                  How long does it take to deliver <?= htmlspecialchars($product_details['pro_name']) ?>?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  A standard WordPress or static website typically takes <strong>3–5 business days</strong>, dynamic database-driven applications take <strong>1–2 weeks</strong>, and customized enterprise portals or full-stack MERN apps take <strong>2–4 weeks</strong> depending on feature complexity.
                </div>
              </div>
            </div>
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                  Do you provide post-launch maintenance & warranty?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! All plans include a comprehensive <strong>30 to 90-day bug-free warranty</strong> and post-launch support. Ongoing monthly maintenance and SLA retainers are also available.
                </div>
              </div>
            </div>
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                  Will my website be mobile-friendly and Google SEO optimized?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Absolutely. Every build follows a <strong>mobile-first responsive architecture</strong> and incorporates full on-page technical SEO: JSON-LD Schema markup, meta tags, Core Web Vitals optimization, and XML sitemaps.
                </div>
              </div>
            </div>
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                  Can I hire you for projects in Delhi NCR or internationally?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes. I am based in Delhi NCR (Karampura) for local in-person or online meetings, and I regularly deliver remote projects for clients across the <strong>USA, UK, UAE, Australia, Canada, and Europe</strong>.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== TESTIMONIALS =======-->
  <div class="testimonial1-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="testimonial-header heading2 text-center">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star2 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star3 keyframe5">
            <h5>Testimonials</h5>
            <h2>What Clients Say On Google Reviews</h2>
            <p>Verified feedback from business owners and founders who trust NikhilWorks.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="testimonials-slider-area owl-carousel">
            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Nikhil built my business website Bestok and handled everything from design to SEO. Very professional, fast, and supportive. Highly recommended!"</p>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Priya (Noida)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="Google Review">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img4.jpg" alt="Client Priya Noida">
                  </div>
                </div>
              </div>
            </div>
            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Amazing work! Nikhil developed an e-commerce website for my shop and integrated online payments seamlessly. Great experience!"</p>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Harsh Patel (Nasik)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="Google Review">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img5.jpg" alt="Client Harsh Patel">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== CTA BANNER =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">Ready to Scale with High-Performance <?= htmlspecialchars($product_details['pro_name']) ?>?</h2>
            <p data-aos="fade-up" data-aos-duration="1000">
              Get an instant quotation, direct milestone roadmap, and 100% transparent pricing for your project today.
            </p>
            <div class="btn-area text-center d-flex gap-3 justify-content-center flex-wrap" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get A Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640" target="_blank" rel="noopener" class="header-btn8" style="background:#25D366; color:#fff !important;">
                <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once "includes/footer.php"; ?>
  <script src="<?= $site ?>assets/js/plugins/bootstrap.bundle.min.js"></script>
</body>
</html>