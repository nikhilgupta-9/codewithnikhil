<?php
include_once "config/connect.php";
include_once "util/function.php";

$contact = contact_us();
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

$isIndiaCostPage = (strpos($_SERVER['REQUEST_URI'] ?? '', 'website-development-cost-india') !== false);
$pageTitle = $isIndiaCostPage ? "Website Development Cost in India (2026 Price Calculator) - Nikhil Gupta" : "Website Cost Calculator India 2026 | Instant Real-Time Project Estimator";
$pageDesc = "Calculate accurate website development costs in India (2026). Transparent pricing for WordPress, Custom PHP, MERN Stack, and eCommerce stores with multi-currency estimator.";
$pageKeywords = "website cost calculator india, website development cost in india, web design price estimator, calculate website cost, ecommerce website price india, freelance web developer cost";
$canonicalUrl = $isIndiaCostPage ? "https://nikhilworks.com/website-development-cost-india/" : "https://nikhilworks.com/website-cost-calculator/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://nikhilworks.com/assets/img/preview.png">
  <meta name="twitter:card" content="summary_large_image">

  <!-- SoftwareApplication Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "NikhilWorks Interactive Website Cost Calculator",
    "operatingSystem": "All",
    "applicationCategory": "BusinessApplication",
    "offers": {
      "@type": "AggregateOffer",
      "lowPrice": "7999",
      "highPrice": "49999",
      "priceCurrency": "INR"
    },
    "description": "Interactive real-time web development price calculator for businesses, startups, and agencies across India and international markets."
  }
  </script>

  <!-- FAQPage Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "How much does a 5-page business website cost in India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A standard 5-page custom responsive business website starts at ₹7,999 to ₹9,999 ($149 - $199 USD) with full mobile responsiveness, contact forms, and basic SEO."
        }
      },
      {
        "@type": "Question",
        "name": "How much does an e-commerce website cost in India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A full-featured e-commerce store with payment gateway (Razorpay/Stripe), product catalog, shopping cart, customer accounts, and order management starts at ₹21,999 ($449 USD)."
        }
      },
      {
        "@type": "Question",
        "name": "Are there any hidden costs in website development?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No hidden costs when working with Nikhil Gupta. Domain (~₹800/yr) and hosting (~₹2,500/yr) are purchased under your own name so you retain 100% ownership and zero recurring lock-in fees."
        }
      },
      {
        "@type": "Question",
        "name": "Why is freelance developer pricing more cost-effective than agencies?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Agencies charge 3x to 5x higher to cover corporate overheads, office leases, and multiple account managers. With NikhilWorks, you work directly with the senior engineer building your project with direct communication and faster turnaround."
        }
      }
    ]
  }
  </script>

  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
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

    /* HERO */
    .calc-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 85px;
      overflow: hidden;
      color: #fff;
    }
    .calc-hero-pill {
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
    }
    .calc-hero h1 {
      font-size: clamp(2.2rem, 4.2vw, 3.4rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }
    .calc-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 750px;
      margin: 0 auto 30px;
    }

    /* CURRENCY SELECTOR */
    .currency-switch-wrap {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin: 20px auto 0;
      max-width: 580px;
      background: rgba(255, 255, 255, 0.08);
      padding: 6px;
      border-radius: 50px;
      border: 1px solid rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
    }
    .calc-curr-btn {
      border: none;
      background: transparent;
      padding: 8px 16px;
      border-radius: 40px;
      font-size: 13.5px;
      font-weight: 700;
      color: #ffffff;
      cursor: pointer;
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .calc-curr-btn:hover {
      background: rgba(255, 255, 255, 0.12);
    }
    .calc-curr-btn.active {
      background: #ADFF1C;
      color: #082223;
      box-shadow: 0 4px 15px rgba(173, 255, 28, 0.35);
    }

    /* CALCULATOR CONTAINER */
    .calc-section {
      padding: 70px 0 100px;
      background: #f7faf9;
    }
    .calc-card-step {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 32px 28px;
      margin-bottom: 28px;
      box-shadow: 0 6px 24px rgba(16, 64, 65, 0.04);
      transition: all 0.3s ease;
    }
    .calc-card-step:hover {
      border-color: #104041;
      box-shadow: 0 10px 30px rgba(16, 64, 65, 0.08);
    }
    .step-header {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 22px;
      padding-bottom: 14px;
      border-bottom: 1px solid #edf4f3;
    }
    .step-number {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #104041;
      color: #ADFF1C;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      font-weight: 800;
      flex-shrink: 0;
    }
    .step-title {
      font-size: 1.25rem;
      font-weight: 800;
      color: #0f2d2e;
      margin: 0;
    }
    .step-desc {
      font-size: 13.5px;
      color: #637f7e;
      margin: 0;
    }

    /* OPTION CARDS (SELECTABLE TILES) */
    .option-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
    }
    .option-tile {
      background: #ffffff;
      border: 2px solid #e3eeec;
      border-radius: 16px;
      padding: 20px 18px;
      cursor: pointer;
      position: relative;
      transition: all 0.25s ease;
      display: flex;
      flex-direction: column;
      user-select: none;
    }
    .option-tile:hover {
      border-color: #104041;
      transform: translateY(-3px);
      box-shadow: 0 8px 20px rgba(16, 64, 65, 0.08);
    }
    .option-tile.selected {
      border-color: #104041;
      background: #f0f7f6;
      box-shadow: 0 8px 24px rgba(16, 64, 65, 0.12);
    }
    .option-tile.selected::after {
      content: "\f00c";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      position: absolute;
      top: 12px;
      right: 14px;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background: #104041;
      color: #ADFF1C;
      font-size: 11px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .option-icon {
      font-size: 26px;
      color: #104041;
      margin-bottom: 12px;
    }
    .option-name {
      font-size: 15px;
      font-weight: 700;
      color: #0f2d2e;
      margin-bottom: 6px;
    }
    .option-info {
      font-size: 12.5px;
      color: #637f7e;
      line-height: 1.45;
      margin-bottom: 12px;
      flex-grow: 1;
    }
    .option-price-tag {
      font-size: 14px;
      font-weight: 800;
      color: #104041;
      background: rgba(16, 64, 65, 0.08);
      padding: 4px 10px;
      border-radius: 8px;
      display: inline-block;
      align-self: flex-start;
    }
    .option-tile.selected .option-price-tag {
      background: #104041;
      color: #ADFF1C;
    }

    /* CHECKBOX TILES */
    .checkbox-tile {
      display: flex;
      align-items: flex-start;
      gap: 14px;
      background: #ffffff;
      border: 1.5px solid #e3eeec;
      border-radius: 14px;
      padding: 16px 18px;
      cursor: pointer;
      transition: all 0.25s ease;
      user-select: none;
    }
    .checkbox-tile:hover {
      border-color: #104041;
      transform: translateY(-2px);
    }
    .checkbox-tile.checked {
      border-color: #104041;
      background: #f0f7f6;
    }
    .custom-check {
      width: 22px;
      height: 22px;
      border-radius: 6px;
      border: 2px solid #b2cbca;
      background: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      margin-top: 2px;
      transition: all 0.2s ease;
      font-size: 12px;
      color: transparent;
    }
    .checkbox-tile.checked .custom-check {
      background: #104041;
      border-color: #104041;
      color: #ADFF1C;
    }
    .check-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #0f2d2e;
      margin-bottom: 2px;
    }
    .check-sub {
      font-size: 12px;
      color: #637f7e;
      margin: 0;
    }
    .check-price {
      margin-left: auto;
      font-size: 13.5px;
      font-weight: 800;
      color: #104041;
      white-space: nowrap;
      padding-left: 10px;
    }

    /* STICKY QUOTE SUMMARY SIDEBAR */
    .calc-summary-sidebar {
      position: sticky;
      top: 100px;
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 22px;
      padding: 32px 26px;
      color: #ffffff;
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.25);
    }
    .calc-badge-live {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(173, 255, 28, 0.15);
      border: 1px solid rgba(173, 255, 28, 0.4);
      color: #ADFF1C;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 11.5px;
      font-weight: 800;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      margin-bottom: 16px;
    }
    .calc-live-ping {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: #ADFF1C;
      animation: pingPulse 1.8s infinite ease-in-out;
    }
    .summary-total-label {
      font-size: 13px;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: #a3c9ca;
      margin-bottom: 6px;
    }
    .summary-price-value {
      font-size: clamp(2rem, 3.2vw, 2.6rem);
      font-weight: 900;
      color: #ADFF1C;
      line-height: 1.1;
      margin-bottom: 8px;
      letter-spacing: -0.5px;
    }
    .summary-timeline-tag {
      font-size: 13px;
      color: #d6ecea;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 24px;
      background: rgba(255, 255, 255, 0.08);
      padding: 5px 12px;
      border-radius: 20px;
    }
    .summary-breakdown-list {
      border-top: 1px solid rgba(255, 255, 255, 0.12);
      padding-top: 18px;
      margin-bottom: 24px;
      max-height: 230px;
      overflow-y: auto;
    }
    .summary-item {
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      color: #c7dedd;
      margin-bottom: 10px;
      padding-bottom: 8px;
      border-bottom: 1px dashed rgba(255, 255, 255, 0.08);
    }
    .summary-item:last-child {
      border-bottom: none;
    }
    .summary-item strong {
      color: #ffffff;
      white-space: nowrap;
      margin-left: 10px;
    }
    .btn-calc-wa {
      background: #25D366;
      color: #ffffff !important;
      font-weight: 800;
      font-size: 15px;
      padding: 14px 20px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 6px 20px rgba(37, 211, 102, 0.35);
      border: none;
      cursor: pointer;
      margin-bottom: 12px;
    }
    .btn-calc-wa:hover {
      background: #1da851;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(37, 211, 102, 0.45);
    }
    .btn-calc-copy {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #ffffff !important;
      font-weight: 600;
      font-size: 13.5px;
      padding: 10px 16px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      cursor: pointer;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .btn-calc-copy:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    /* COMPARISON & INFO SECTIONS */
    .calc-info-section {
      padding: 80px 0;
      background: #ffffff;
    }
    .info-box-card {
      background: #f7faf9;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      padding: 28px;
      height: 100%;
      transition: all 0.3s ease;
    }
    .info-box-card:hover {
      border-color: #104041;
      transform: translateY(-4px);
    }
    .info-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      margin-bottom: 16px;
    }

    /* TABLE */
    .cost-table-wrapper {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(16, 64, 65, 0.05);
      margin: 40px 0;
    }
    .cost-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14.5px;
    }
    .cost-table th {
      background: #082223;
      color: #ffffff;
      padding: 16px 20px;
      font-weight: 700;
      text-align: left;
    }
    .cost-table td {
      padding: 16px 20px;
      border-bottom: 1px solid #edf4f3;
      color: #496362;
    }
    .cost-table tr:hover td {
      background: #f7faf9;
    }

    /* FAQ ACCORDION STYLES */
    .loc-faq-item {
      background: #FFFFFF;
      border: 1px solid #E2EDED;
      border-radius: 16px;
      margin-bottom: 16px;
      overflow: hidden;
      transition: all 0.3s ease;
      box-shadow: 0 4px 14px rgba(16, 64, 65, 0.04);
    }
    .loc-faq-item:hover {
      border-color: #104041;
      box-shadow: 0 8px 24px rgba(16, 64, 65, 0.08);
    }
    .loc-faq-btn {
      width: 100%;
      text-align: left;
      padding: 22px 25px;
      background: #ffffff;
      border: none;
      font-weight: 700;
      font-size: 1.08rem;
      color: #0f2d2e;
      display: flex;
      justify-content: space-between;
      align-items: center;
      cursor: pointer;
      transition: background 0.2s ease, color 0.2s ease;
    }
    .loc-faq-btn:hover {
      background: #f7faf9;
      color: #104041;
    }
    .loc-faq-btn i {
      color: #104041;
      font-size: 14px;
      transition: transform 0.25s ease;
      flex-shrink: 0;
      margin-left: 14px;
    }
    .loc-faq-content {
      padding: 0 25px 22px;
      color: #557273;
      line-height: 1.7;
      font-size: 1rem;
      border-top: 1px solid #edf4f3;
      padding-top: 16px;
    }

    @keyframes pingPulse {
      0% { transform: scale(0.9); opacity: 0.8; }
      50% { transform: scale(1.35); opacity: 1; filter: drop-shadow(0 0 6px #ADFF1C); }
      100% { transform: scale(0.9); opacity: 0.8; }
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="calc-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="calc-hero-pill">
            <i class="fa-solid fa-calculator"></i> 2026 Interactive Web Price Estimator
          </div>
          <h1>Calculate Your Website Development Cost</h1>
          <p class="calc-hero-sub">
            Get an instant, 100% transparent quote tailored to your exact tech stack, feature set, design depth, and business requirements. Zero hidden agency markups.
          </p>

          <!-- Currency Switcher -->
          <div class="currency-switch-wrap">
            <button type="button" class="calc-curr-btn active" data-currency="INR">🇮🇳 INR (₹)</button>
            <button type="button" class="calc-curr-btn" data-currency="USD">🇺🇸 USD ($)</button>
            <button type="button" class="calc-curr-btn" data-currency="AED">🇦🇪 AED (د.إ)</button>
            <button type="button" class="calc-curr-btn" data-currency="GBP">🇬🇧 GBP (£)</button>
            <button type="button" class="calc-curr-btn" data-currency="AUD">🇦🇺 AUD (A$)</button>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== CALCULATOR ENGINE STARTS =======-->
  <section class="calc-section">
    <div class="container">
      <div class="row g-4">

        <!-- LEFT COLUMN: Interactive Steps -->
        <div class="col-lg-8">

          <!-- STEP 1: Website Category / Architecture -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">1</div>
              <div>
                <h3 class="step-title">Select Website Type &amp; Architecture</h3>
                <p class="step-desc">Choose the foundational structure that best matches your project goals.</p>
              </div>
            </div>

            <div class="option-grid">
              <div class="option-tile selected" data-type="wp" data-base-inr="7999" data-base-usd="149" data-base-aed="549" data-base-gbp="120" data-base-aud="225" data-time="7-12 Days">
                <div class="option-icon"><i class="fa-brands fa-wordpress"></i></div>
                <div class="option-name">WordPress Website</div>
                <div class="option-info">Modern Elementor/Gutenberg CMS, blog engine, mobile responsive &amp; SEO ready.</div>
                <div class="option-price-tag" data-cost-tag="base">₹7,999</div>
              </div>

              <div class="option-tile" data-type="dynamic" data-base-inr="9999" data-base-usd="199" data-base-aed="749" data-base-gbp="155" data-base-aud="299" data-time="10-15 Days">
                <div class="option-icon"><i class="fa-brands fa-php"></i></div>
                <div class="option-name">Custom Dynamic PHP / Laravel</div>
                <div class="option-info">High-speed database-driven portal, custom admin panel, lightweight &amp; ultra secure.</div>
                <div class="option-price-tag" data-cost-tag="base">₹9,999</div>
              </div>

              <div class="option-tile" data-type="mern" data-base-inr="18999" data-base-usd="399" data-base-aed="1449" data-base-gbp="310" data-base-aud="599" data-time="14-21 Days">
                <div class="option-icon"><i class="fa-brands fa-react"></i></div>
                <div class="option-name">MERN Stack Single Page App</div>
                <div class="option-info">React.js, Node.js, Express, MongoDB. Lightning-fast app experience &amp; real-time APIs.</div>
                <div class="option-price-tag" data-cost-tag="base">₹18,999</div>
              </div>

              <div class="option-tile" data-type="ecom" data-base-inr="21999" data-base-usd="449" data-base-aed="1649" data-base-gbp="350" data-base-aud="675" data-time="15-25 Days">
                <div class="option-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="option-name">Full E-Commerce Store</div>
                <div class="option-info">WooCommerce/Shopify/Custom Cart, payment gateways, inventory, order tracking &amp; coupons.</div>
                <div class="option-price-tag" data-cost-tag="base">₹21,999</div>
              </div>

              <div class="option-tile" data-type="redesign" data-base-inr="8999" data-base-usd="179" data-base-aed="649" data-base-gbp="140" data-base-aud="269" data-time="7-14 Days">
                <div class="option-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                <div class="option-name">Website Redesign &amp; Speed Fix</div>
                <div class="option-info">Modernize UI/UX, upgrade mobile responsiveness, improve conversion rate &amp; Core Web Vitals.</div>
                <div class="option-price-tag" data-cost-tag="base">₹8,999</div>
              </div>

              <div class="option-tile" data-type="saas" data-base-inr="34999" data-base-usd="699" data-base-aed="2599" data-base-gbp="540" data-base-aud="1049" data-time="20-35 Days">
                <div class="option-icon"><i class="fa-solid fa-diagram-project"></i></div>
                <div class="option-name">Custom Web Portal / CRM</div>
                <div class="option-info">Multi-role permissions, lead pipelines, webhook integrations, PDF generators &amp; dashboards.</div>
                <div class="option-price-tag" data-cost-tag="base">₹34,999</div>
              </div>
            </div>
          </div>

          <!-- STEP 2: Number of Pages -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">2</div>
              <div>
                <h3 class="step-title">Estimated Number of Pages</h3>
                <p class="step-desc">Content volume and dedicated layout depth needed for your brand.</p>
              </div>
            </div>

            <div class="option-grid">
              <div class="option-tile selected" data-pages="1-5" data-cost-inr="0" data-cost-usd="0" data-cost-aed="0" data-cost-gbp="0" data-cost-aud="0">
                <div class="option-name">1 to 5 Pages</div>
                <div class="option-info">Home, About, Services, Contact, Blog/Gallery. Perfect for startups.</div>
                <div class="option-price-tag">Included</div>
              </div>

              <div class="option-tile" data-pages="6-10" data-cost-inr="2500" data-cost-usd="49" data-cost-aed="180" data-cost-gbp="40" data-cost-aud="75">
                <div class="option-name">6 to 10 Pages</div>
                <div class="option-info">Dedicated service landing pages, case studies, team &amp; location pages.</div>
                <div class="option-price-tag">+ ₹2,500</div>
              </div>

              <div class="option-tile" data-pages="11-20" data-cost-inr="5500" data-cost-usd="99" data-cost-aed="360" data-cost-gbp="80" data-cost-aud="150">
                <div class="option-name">11 to 20 Pages</div>
                <div class="option-info">Comprehensive corporate portal, multiple category landing pages.</div>
                <div class="option-price-tag">+ ₹5,500</div>
              </div>

              <div class="option-tile" data-pages="20+" data-cost-inr="11000" data-cost-usd="199" data-cost-aed="720" data-cost-gbp="160" data-cost-aud="300">
                <div class="option-name">20+ Pages (Enterprise)</div>
                <div class="option-info">Extensive programmatic catalog, city hubs, multi-service ecosystems.</div>
                <div class="option-price-tag">+ ₹11,000</div>
              </div>
            </div>
          </div>

          <!-- STEP 3: UI/UX & Visual Design Quality -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">3</div>
              <div>
                <h3 class="step-title">Design Depth &amp; Visual Experience</h3>
                <p class="step-desc">From clean modern layouts to bespoke interactive animations.</p>
              </div>
            </div>

            <div class="option-grid">
              <div class="option-tile selected" data-design="standard" data-cost-inr="0" data-cost-usd="0" data-cost-aed="0" data-cost-gbp="0" data-cost-aud="0">
                <div class="option-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                <div class="option-name">Modern Clean Responsive</div>
                <div class="option-info">Sleek brand typography, clean layout, mobile-first optimization &amp; fast loading.</div>
                <div class="option-price-tag">Included</div>
              </div>

              <div class="option-tile" data-design="bespoke" data-cost-inr="4000" data-cost-usd="79" data-cost-aed="290" data-cost-gbp="65" data-cost-aud="120">
                <div class="option-icon"><i class="fa-solid fa-bezier-curve"></i></div>
                <div class="option-name">Bespoke Custom UI/UX</div>
                <div class="option-info">Custom Figma layouts, micro-interactions, dark/light styling &amp; conversion design.</div>
                <div class="option-price-tag">+ ₹4,000</div>
              </div>

              <div class="option-tile" data-design="high-end" data-cost-inr="9500" data-cost-usd="189" data-cost-aed="690" data-cost-gbp="150" data-cost-aud="285">
                <div class="option-icon"><i class="fa-solid fa-cubes"></i></div>
                <div class="option-name">High-Tech 3D &amp; GSAP</div>
                <div class="option-info">Interactive 3D canvas, smooth scroll motion, glassmorphism &amp; interactive widgets.</div>
                <div class="option-price-tag">+ ₹9,500</div>
              </div>
            </div>
          </div>

          <!-- STEP 4: Features & Integrations (Multi-Select Checkboxes) -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">4</div>
              <div>
                <h3 class="step-title">Features &amp; Third-Party Integrations</h3>
                <p class="step-desc">Select optional power tools and business automation features (select all that apply).</p>
              </div>
            </div>

            <div class="row g-3">
              <div class="col-md-6">
                <div class="checkbox-tile" data-feature="payment" data-cost-inr="2500" data-cost-usd="49" data-cost-aed="180" data-cost-gbp="40" data-cost-aud="75">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">Payment Gateway</div>
                    <p class="check-sub">Razorpay, Stripe, PayPal, Instamojo</p>
                  </div>
                  <div class="check-price">+ ₹2,500</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="checkbox-tile" data-feature="auth" data-cost-inr="4500" data-cost-usd="89" data-cost-aed="330" data-cost-gbp="70" data-cost-aud="135">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">User Login &amp; Portal</div>
                    <p class="check-sub">Secure JWT authentication &amp; member dashboard</p>
                  </div>
                  <div class="check-price">+ ₹4,500</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="checkbox-tile checked" data-feature="whatsapp" data-cost-inr="0" data-cost-usd="0" data-cost-aed="0" data-cost-gbp="0" data-cost-aud="0">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">WhatsApp Lead Capture</div>
                    <p class="check-sub">Direct WhatsApp floating widget &amp; form triggers</p>
                  </div>
                  <div class="check-price">Free</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="checkbox-tile" data-feature="api" data-cost-inr="4000" data-cost-usd="79" data-cost-aed="290" data-cost-gbp="65" data-cost-aud="120">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">Custom API / CRM Webhook</div>
                    <p class="check-sub">HubSpot, Zoho, Zapier, Google Sheets sync</p>
                  </div>
                  <div class="check-price">+ ₹4,000</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="checkbox-tile" data-feature="multilang" data-cost-inr="3000" data-cost-usd="59" data-cost-aed="220" data-cost-gbp="48" data-cost-aud="90">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">Multi-Language Support</div>
                    <p class="check-sub">Arabic, English, French, Hindi localization</p>
                  </div>
                  <div class="check-price">+ ₹3,000</div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="checkbox-tile" data-feature="booking" data-cost-inr="3500" data-cost-usd="69" data-cost-aed="250" data-cost-gbp="55" data-cost-aud="105">
                  <div class="custom-check"><i class="fa-solid fa-check"></i></div>
                  <div>
                    <div class="check-title">Booking &amp; Appointments</div>
                    <p class="check-sub">Calendar booking with slot confirmations</p>
                  </div>
                  <div class="check-price">+ ₹3,500</div>
                </div>
              </div>
            </div>
          </div>

          <!-- STEP 5: SEO & Performance Optimization -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">5</div>
              <div>
                <h3 class="step-title">SEO &amp; PageSpeed Optimization</h3>
                <p class="step-desc">Ensure your new website ranks top on Google search right after launch.</p>
              </div>
            </div>

            <div class="option-grid">
              <div class="option-tile selected" data-seo="basic" data-cost-inr="0" data-cost-usd="0" data-cost-aed="0" data-cost-gbp="0" data-cost-aud="0">
                <div class="option-name">Basic SEO Setup</div>
                <div class="option-info">Meta tags, canonicals, XML sitemap &amp; Google Search Console indexing.</div>
                <div class="option-price-tag">Included</div>
              </div>

              <div class="option-tile" data-seo="advanced" data-cost-inr="3000" data-cost-usd="59" data-cost-aed="220" data-cost-gbp="48" data-cost-aud="90">
                <div class="option-name">Advanced Technical SEO</div>
                <div class="option-info">Schema.org JSON-LD, OpenGraph tags, Image WebP compression &amp; 90+ PageSpeed.</div>
                <div class="option-price-tag">+ ₹3,000</div>
              </div>

              <div class="option-tile" data-seo="pro" data-cost-inr="6500" data-cost-usd="129" data-cost-aed="470" data-cost-gbp="105" data-cost-aud="195">
                <div class="option-name">Full 360 Organic Dominance</div>
                <div class="option-info">Keyword clustering, competitor audit, Google Business Profile optimization &amp; 98+ PageSpeed.</div>
                <div class="option-price-tag">+ ₹6,500</div>
              </div>
            </div>
          </div>

          <!-- STEP 6: Maintenance & Warranty Support -->
          <div class="calc-card-step" data-aos="fade-up">
            <div class="step-header">
              <div class="step-number">6</div>
              <div>
                <h3 class="step-title">Maintenance &amp; Post-Launch Support</h3>
                <p class="step-desc">Keep your website secure, backed up, and updated without technical headaches.</p>
              </div>
            </div>

            <div class="option-grid">
              <div class="option-tile selected" data-maint="free" data-cost-inr="0" data-cost-usd="0" data-cost-aed="0" data-cost-gbp="0" data-cost-aud="0">
                <div class="option-name">30-Day Free Warranty</div>
                <div class="option-info">Free post-deployment bug fixing and technical handover support.</div>
                <div class="option-price-tag">Included</div>
              </div>

              <div class="option-tile" data-maint="6m" data-cost-inr="5999" data-cost-usd="119" data-cost-aed="440" data-cost-gbp="95" data-cost-aud="180">
                <div class="option-name">6 Months Priority AMC</div>
                <div class="option-info">Monthly cloud backups, plugin updates, security patch monitoring &amp; content edits.</div>
                <div class="option-price-tag">+ ₹5,999</div>
              </div>

              <div class="option-tile" data-maint="12m" data-cost-inr="10999" data-cost-usd="219" data-cost-aed="799" data-cost-gbp="175" data-cost-aud="330">
                <div class="option-name">12 Months Complete Care</div>
                <div class="option-info">24/7 uptime alerts, continuous speed tuning, quarterly SEO audits &amp; direct developer priority.</div>
                <div class="option-price-tag">+ ₹10,999</div>
              </div>
            </div>
          </div>

        </div>

        <!-- RIGHT COLUMN: Sticky Real-Time Live Quote Summary -->
        <div class="col-lg-4">
          <div class="calc-summary-sidebar">
            <div class="calc-badge-live">
              <span class="calc-live-ping"></span> Live Real-Time Quote
            </div>

            <div class="summary-total-label">Estimated Total Investment</div>
            <div class="summary-price-value" id="calcPriceDisplay">₹7,999</div>

            <div class="summary-timeline-tag">
              <i class="fa-regular fa-clock text-warning"></i>
              <span>Estimated Delivery: <strong id="calcTimelineDisplay">7-12 Days</strong></span>
            </div>

            <!-- Breakdown -->
            <div class="summary-breakdown-list" id="calcBreakdownList">
              <!-- Dynamically populated by JS -->
            </div>

            <!-- Action Buttons -->
            <a href="#" id="calcWhatsAppBtn" class="btn-calc-wa" target="_blank" rel="noopener">
              <i class="fa-brands fa-whatsapp fs-5"></i>
              <span>Lock In Quote on WhatsApp</span>
            </a>

            <button type="button" id="calcCopyBtn" class="btn-calc-copy">
              <i class="fa-regular fa-copy"></i>
              <span>Copy Full Quote Breakdown</span>
            </button>

            <div class="mt-4 pt-3 text-center border-top border-secondary border-opacity-25">
              <div class="d-flex align-items-center justify-content-center gap-2 text-white-50 small mb-2">
                <i class="fa-solid fa-shield-check text-success"></i> 100% Code Ownership • No Lock-in
              </div>
              <div class="d-flex align-items-center justify-content-center gap-2 text-white-50 small">
                <i class="fa-solid fa-check-double text-success"></i> Direct Senior Developer Contact
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!--===== CALCULATOR ENGINE ENDS =======-->

  <!--===== TRANSPARENT PRICING MATRIX TABLE =======-->
  <section class="calc-info-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold mb-2">Market Benchmark</span>
          <h2 class="fw-bold" style="color: #0f2d2e; font-size: clamp(1.8rem, 3.2vw, 2.5rem);">Freelance Developer vs. Agency Cost Comparison</h2>
          <p class="text-muted">Why hiring NikhilWorks saves you 60-70% of typical corporate agency costs while delivering faster, higher-quality engineering.</p>
        </div>
      </div>

      <div class="cost-table-wrapper">
        <table class="cost-table">
          <thead>
            <tr>
              <th>Feature / Metric</th>
              <th>Traditional Indian Agency</th>
              <th>Overseas US/UK Agency</th>
              <th style="background: #104041; color: #ADFF1C;">NikhilWorks (Freelancer)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>5-Page Business Website</strong></td>
              <td>₹25,000 – ₹45,000</td>
              <td>$1,500 – $3,500</td>
              <td><strong class="text-success">₹7,999 – ₹9,999 ($149 – $199)</strong></td>
            </tr>
            <tr>
              <td><strong>Full E-Commerce Store</strong></td>
              <td>₹60,000 – ₹1,20,000</td>
              <td>$4,000 – $10,000</td>
              <td><strong class="text-success">₹21,999 ($449)</strong></td>
            </tr>
            <tr>
              <td><strong>Direct Developer Communication</strong></td>
              <td>❌ No (Junior Account Managers)</td>
              <td>❌ No (Tiered Support Tickets)</td>
              <td><strong class="text-success">✅ Direct 1-on-1 via WhatsApp/Call</strong></td>
            </tr>
            <tr>
              <td><strong>Average Delivery Time</strong></td>
              <td>4 – 8 Weeks</td>
              <td>6 – 12 Weeks</td>
              <td><strong class="text-success">✅ 7 – 21 Days</strong></td>
            </tr>
            <tr>
              <td><strong>Full Source Code Ownership</strong></td>
              <td>⚠️ Often Proprietary / Locked</td>
              <td>⚠️ Vendor Retainer Lock-in</td>
              <td><strong class="text-success">✅ 100% Transfer to Your Git / Host</strong></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- FAQ Section -->
      <div class="row mt-5 pt-3">
        <div class="col-lg-8 mx-auto">
          <h3 class="fw-bold text-center mb-4" style="color: #0f2d2e;">Frequently Asked Questions About Website Pricing</h3>
          
          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>Why do website development prices vary so widely across India?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              Very cheap quotes (under ₹3,000) usually rely on pirated nulled themes or non-responsive static templates without security, mobile optimization, or code ownership. Professional quotes (₹7,999+) include clean custom code, security hardening, SEO structure, and dedicated developer support.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>Are domain and hosting included in the estimated price?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              To ensure 100% security and independence, I assist you in registering domain and hosting directly under your name on platforms like Hostinger, AWS, or Namecheap. This prevents developers from holding your site hostage.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>How does payment work for clients?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              Payment is milestone-based: 50% initial advance to start the project architecture, and the remaining 50% upon final sign-off and deployment on your live server. Accepted via UPI, Bank Transfer, PayPal, Wise, and Stripe.
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <?php include_once "includes/footer.php" ?>

  <!--===== CALCULATOR JAVASCRIPT ENGINE =======-->
  <script>
    (function() {
      // Currency configurations & rates
      const currencies = {
        INR: { symbol: '₹', rate: 1, pos: 'left' },
        USD: { symbol: '$', rate: 0.012, pos: 'left' },
        AED: { symbol: 'AED ', rate: 0.044, pos: 'left' },
        GBP: { symbol: '£', rate: 0.0094, pos: 'left' },
        AUD: { symbol: 'A$', rate: 0.018, pos: 'left' }
      };
      let currentCurrency = 'INR';

      function formatPrice(amountINR, customCurrKey = null) {
        const currKey = customCurrKey || currentCurrency;
        const curr = currencies[currKey] || currencies.INR;
        if (currKey === 'INR') {
          return '₹' + amountINR.toLocaleString('en-IN');
        } else {
          const val = Math.round(amountINR * curr.rate);
          return curr.symbol + val.toLocaleString();
        }
      }

      function updateCalculator() {
        const selectedType = document.querySelector('.calc-card-step:nth-child(1) .option-tile.selected');
        const selectedPages = document.querySelector('.calc-card-step:nth-child(2) .option-tile.selected');
        const selectedDesign = document.querySelector('.calc-card-step:nth-child(3) .option-tile.selected');
        const checkedFeatures = document.querySelectorAll('.checkbox-tile.checked');
        const selectedSeo = document.querySelector('.calc-card-step:nth-child(5) .option-tile.selected');
        const selectedMaint = document.querySelector('.calc-card-step:nth-child(6) .option-tile.selected');

        let totalINR = 0;
        let breakdown = [];
        let deliveryTimeline = selectedType ? selectedType.getAttribute('data-time') : '7-14 Days';

        // 1. Base Architecture
        if (selectedType) {
          const baseINR = parseInt(selectedType.getAttribute('data-base-inr')) || 0;
          totalINR += baseINR;
          breakdown.push({
            name: selectedType.querySelector('.option-name').innerText,
            costINR: baseINR
          });
        }

        // 2. Pages
        if (selectedPages) {
          const pageCostINR = parseInt(selectedPages.getAttribute('data-cost-inr')) || 0;
          if (pageCostINR > 0) {
            totalINR += pageCostINR;
            breakdown.push({
              name: 'Pages: ' + selectedPages.querySelector('.option-name').innerText,
              costINR: pageCostINR
            });
          }
        }

        // 3. Design
        if (selectedDesign) {
          const designCostINR = parseInt(selectedDesign.getAttribute('data-cost-inr')) || 0;
          if (designCostINR > 0) {
            totalINR += designCostINR;
            breakdown.push({
              name: 'Design: ' + selectedDesign.querySelector('.option-name').innerText,
              costINR: designCostINR
            });
          }
        }

        // 4. Features
        checkedFeatures.forEach(feat => {
          const featCostINR = parseInt(feat.getAttribute('data-cost-inr')) || 0;
          if (featCostINR > 0) {
            totalINR += featCostINR;
            breakdown.push({
              name: feat.querySelector('.check-title').innerText,
              costINR: featCostINR
            });
          }
        });

        // 5. SEO
        if (selectedSeo) {
          const seoCostINR = parseInt(selectedSeo.getAttribute('data-cost-inr')) || 0;
          if (seoCostINR > 0) {
            totalINR += seoCostINR;
            breakdown.push({
              name: 'SEO: ' + selectedSeo.querySelector('.option-name').innerText,
              costINR: seoCostINR
            });
          }
        }

        // 6. Maintenance
        if (selectedMaint) {
          const maintCostINR = parseInt(selectedMaint.getAttribute('data-cost-inr')) || 0;
          if (maintCostINR > 0) {
            totalINR += maintCostINR;
            breakdown.push({
              name: 'Support: ' + selectedMaint.querySelector('.option-name').innerText,
              costINR: maintCostINR
            });
          }
        }

        // Render Total & Timeline
        document.getElementById('calcPriceDisplay').innerText = formatPrice(totalINR);
        document.getElementById('calcTimelineDisplay').innerText = deliveryTimeline;

        // Render Breakdown List
        const listEl = document.getElementById('calcBreakdownList');
        listEl.innerHTML = '';
        breakdown.forEach(item => {
          const row = document.createElement('div');
          row.className = 'summary-item';
          row.innerHTML = `<span>${item.name}</span><strong>${formatPrice(item.costINR)}</strong>`;
          listEl.appendChild(row);
        });

        // Prepare WhatsApp link
        let waText = `Hi Nikhil, I calculated a website project cost on your website:%0A`;
        waText += `• Type: ${selectedType ? selectedType.querySelector('.option-name').innerText : ''}%0A`;
        waText += `• Pages: ${selectedPages ? selectedPages.querySelector('.option-name').innerText : ''}%0A`;
        waText += `• Design: ${selectedDesign ? selectedDesign.querySelector('.option-name').innerText : ''}%0A`;
        waText += `• Total Estimated: ${formatPrice(totalINR)}%0A`;
        waText += `• Timeline: ${deliveryTimeline}%0A`;
        waText += `I would like to discuss and get started with this project!`;

        document.getElementById('calcWhatsAppBtn').href = `https://wa.me/918368552640?text=${waText}`;

        // Update Copy Button handler
        document.getElementById('calcCopyBtn').onclick = function() {
          let copyText = `NikhilWorks Website Cost Estimate:\n`;
          breakdown.forEach(b => {
            copyText += `• ${b.name}: ${formatPrice(b.costINR)}\n`;
          });
          copyText += `Total Investment: ${formatPrice(totalINR)} (Est. Time: ${deliveryTimeline})\n`;
          copyText += `Contact Nikhil Gupta: https://nikhilworks.com/contact/ | WhatsApp: +91 83685 52640`;

          navigator.clipboard.writeText(copyText).then(() => {
            alert('Quotation breakdown copied to clipboard!');
          });
        };
      }

      // Currency Switch Click
      document.querySelectorAll('.calc-curr-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          document.querySelectorAll('.calc-curr-btn').forEach(b => b.classList.remove('active'));
          this.classList.add('active');
          currentCurrency = this.getAttribute('data-currency');
          updateCalculator();
        });
      });

      // Single select option tiles
      document.querySelectorAll('.calc-card-step').forEach(step => {
        const tiles = step.querySelectorAll('.option-tile');
        tiles.forEach(tile => {
          tile.addEventListener('click', function() {
            tiles.forEach(t => t.classList.remove('selected'));
            this.classList.add('selected');
            updateCalculator();
          });
        });
      });

      // Checkbox tiles
      document.querySelectorAll('.checkbox-tile').forEach(cb => {
        cb.addEventListener('click', function() {
          // If free item like whatsapp, allow toggle or keep
          this.classList.toggle('checked');
          updateCalculator();
        });
      });

      // FAQ accordion
      document.querySelectorAll('.loc-faq-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const content = this.nextElementSibling;
          const icon = this.querySelector('i');
          if (content.style.display === 'block') {
            content.style.display = 'none';
            icon.className = 'fa-solid fa-plus';
          } else {
            content.style.display = 'block';
            icon.className = 'fa-solid fa-minus';
          }
        });
      });

      // Initial run
      updateCalculator();
    })();
  </script>

</body>
</html>
