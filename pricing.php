<?php
include "config/connect.php";
include_once "util/function.php";

$yearsExperience = years_in_business(2022, 8);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
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
  <title>Transparent Web Development Pricing Plans | NikhilWorks — India & Global</title>
  <meta name="description" content="Fixed-price, transparent web development pricing by Nikhil Gupta. WordPress ₹7,999 ($99), Dynamic web apps ₹9,999 ($129), MERN full-stack ₹18,999 ($249), E-commerce ₹21,999 ($289). Serving clients in India, UAE, UK, USA, Australia.">
  <meta name="keywords" content="web development pricing india, website development cost, WordPress development price, MERN stack cost, ecommerce website price, freelance web developer rates, NikhilWorks pricing">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?=$site?>pricing/" />
  
  <!-- Open Graph Tags -->
  <meta property="og:title" content="Transparent Web Development Pricing Plans | NikhilWorks">
  <meta property="og:description" content="Fixed-price web development packages: WordPress, Dynamic PHP, MERN Stack, E-commerce, and Custom Enterprise platforms.">
  <meta property="og:image" content="<?=$site?>assets/img/preview.png">
  <meta property="og:url" content="<?=$site?>pricing/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Web Development Pricing Plans | NikhilWorks">
  <meta name="twitter:description" content="Fixed-price web development packages with 100% IP transfer, NDA, and post-launch warranty.">
  <meta name="twitter:image" content="<?=$site?>assets/img/preview.png">
  
  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Web Development Services",
    "provider": {
      "@type": "Person",
      "name": "Nikhil Gupta",
      "url": "<?=$site?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi",
        "addressCountry": "IN"
      }
    },
    "areaServed": ["IN", "AE", "SA", "US", "GB", "CA", "AU"],
    "serviceType": "Web Development",
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Web Development Packages",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "WordPress Website Development",
            "description": "Custom WordPress theme, SEO setup, responsive layout"
          },
          "price": "7999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Dynamic Website Development",
            "description": "PHP & MySQL custom database application with admin panel"
          },
          "price": "9999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "MERN Stack Application Development",
            "description": "React, Node.js, Express, MongoDB full-stack web app"
          },
          "price": "18999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "E-Commerce Store Development",
            "description": "Complete online store with payment gateway, cart, inventory"
          },
          "price": "21999",
          "priceCurrency": "INR"
        }
      ]
    }
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
        "name": "What is included in each package?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Every package includes custom UI design, clean mobile-responsive coding, SEO-ready structure, SSL configuration, security hardening, and a 30-day post-launch bug-free warranty."
        }
      },
      {
        "@type": "Question",
        "name": "Are there any hidden recurring fees?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. All packages are one-time fixed investment fees. You own 100% of your source code, domain, and hosting accounts with zero vendor lock-in."
        }
      },
      {
        "@type": "Question",
        "name": "How do payments work for international clients?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "International clients can pay via PayPal, Wise, Stripe, Bank Wire, or Crypto. Payment is milestone-based: 50% deposit to start, 50% upon final sign-off before deployment."
        }
      },
      {
        "@type": "Question",
        "name": "How fast is delivery?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Static & WordPress websites are typically delivered in 3-5 business days. Dynamic and MERN applications take 1-2 weeks, and E-commerce stores take 2-3 weeks."
        }
      }
    ]
  }
  </script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?=$site?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Plugins -->
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/main.css">
  <script src="<?=$site?>assets/js/plugins/jquery-3-6-0.min.js"></script>

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
    .pricing-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 85px;
      overflow: hidden;
      color: #fff;
    }

    .pricing-hero-pill {
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

    .pricing-hero h1 {
      font-size: clamp(2.2rem, 4.2vw, 3.3rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }

    .pricing-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 700px;
      margin: 0 auto;
    }

    /* ---- CURRENCY SWITCHER ---- */
    .currency-switcher-bar {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 8px;
      margin: 30px auto 45px;
      max-width: 620px;
      background: #ffffff;
      padding: 6px;
      border-radius: 50px;
      border: 1px solid #d4e3e2;
      box-shadow: 0 4px 20px rgba(16, 64, 65, 0.08);
    }
    .currency-btn {
      border: none;
      background: transparent;
      padding: 8px 18px;
      border-radius: 40px;
      font-size: 13.5px;
      font-weight: 700;
      color: #104041;
      cursor: pointer;
      transition: all 0.25s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .currency-btn:hover {
      background: rgba(16, 64, 65, 0.06);
    }
    .currency-btn.active {
      background: #104041;
      color: #ADFF1C;
      box-shadow: 0 4px 12px rgba(16, 64, 65, 0.25);
    }

    /* ---- PRICING CARDS ---- */
    .pricing-card-modern {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 34px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
      transition: all 0.35s ease;
      box-shadow: 0 8px 25px rgba(16, 64, 65, 0.04);
    }
    .pricing-card-modern:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 48px rgba(16, 64, 65, 0.12);
      border-color: #ADFF1C;
    }

    /* FEATURED CARD */
    .pricing-card-modern.featured {
      background: #082223;
      color: #ffffff;
      border-color: rgba(173, 255, 28, 0.4);
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.3);
      transform: scale(1.02);
    }
    .pricing-card-modern.featured:hover {
      transform: scale(1.02) translateY(-8px);
      border-color: #ADFF1C;
    }

    .card-ribbon {
      position: absolute;
      top: -14px;
      right: 24px;
      background: #ADFF1C;
      color: #082223;
      font-size: 11.5px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      padding: 4px 14px;
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(173, 255, 28, 0.4);
    }

    .plan-name {
      font-size: 1.35rem;
      font-weight: 800;
      margin-bottom: 6px;
    }
    .pricing-card-modern:not(.featured) .plan-name {
      color: #0f2d2e;
    }
    .pricing-card-modern.featured .plan-name {
      color: #ffffff;
    }

    .plan-tagline {
      font-size: 13.5px;
      margin-bottom: 20px;
      line-height: 1.4;
    }
    .pricing-card-modern:not(.featured) .plan-tagline {
      color: #6a8281;
    }
    .pricing-card-modern.featured .plan-tagline {
      color: #b7cfcb;
    }

    .plan-price-wrap {
      margin-bottom: 22px;
      padding-bottom: 20px;
      border-bottom: 1px solid #edf4f3;
    }
    .pricing-card-modern.featured .plan-price-wrap {
      border-color: rgba(255, 255, 255, 0.1);
    }

    .price-number {
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1;
      display: flex;
      align-items: baseline;
      gap: 4px;
    }
    .pricing-card-modern:not(.featured) .price-number {
      color: #104041;
    }
    .pricing-card-modern.featured .price-number {
      color: #ADFF1C;
    }

    .price-unit {
      font-size: 13px;
      font-weight: 600;
      color: #7b9493;
    }
    .pricing-card-modern.featured .price-unit {
      color: #9cb5b4;
    }

    .plan-delivery-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 6px;
      margin-top: 10px;
    }
    .pricing-card-modern:not(.featured) .plan-delivery-badge {
      background: #f0f7f6;
      color: #104041;
    }
    .pricing-card-modern.featured .plan-delivery-badge {
      background: rgba(255, 255, 255, 0.08);
      color: #ADFF1C;
    }

    .plan-features-list {
      list-style: none;
      padding: 0;
      margin: 0 0 28px;
      flex-grow: 1;
    }
    .plan-features-list li {
      font-size: 14px;
      margin-bottom: 12px;
      display: flex;
      align-items: flex-start;
      gap: 10px;
      line-height: 1.45;
    }
    .pricing-card-modern:not(.featured) .plan-features-list li {
      color: #3b5352;
    }
    .pricing-card-modern.featured .plan-features-list li {
      color: #d1e7e4;
    }
    .plan-features-list li i {
      color: #27c93f;
      margin-top: 2px;
      flex-shrink: 0;
    }

    .btn-plan-action {
      width: 100%;
      padding: 13px 20px;
      border-radius: 10px;
      font-weight: 700;
      font-size: 14px;
      text-align: center;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: all 0.3s ease;
      border: none;
    }
    .pricing-card-modern:not(.featured) .btn-plan-action {
      background: #104041;
      color: #ADFF1C !important;
    }
    .pricing-card-modern:not(.featured) .btn-plan-action:hover {
      background: #082223;
      color: #ffffff !important;
      transform: translateY(-2px);
    }
    .pricing-card-modern.featured .btn-plan-action {
      background: #ADFF1C;
      color: #082223 !important;
    }
    .pricing-card-modern.featured .btn-plan-action:hover {
      background: #c3ff4f;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(173, 255, 28, 0.4);
    }

    /* ---- COMPARISON TABLE ---- */
    .comparison-table-wrapper {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(16, 64, 65, 0.05);
      margin-top: 40px;
    }
    .comparison-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 14px;
    }
    .comparison-table th {
      background: #082223;
      color: #ffffff;
      padding: 16px 20px;
      font-weight: 700;
      text-align: left;
    }
    .comparison-table td {
      padding: 15px 20px;
      border-bottom: 1px solid #edf4f3;
      color: #3b5352;
    }
    .comparison-table tr:last-child td {
      border-bottom: none;
    }
    .comparison-table tr:hover td {
      background: #fbfdfd;
    }

    /* ---- GUARANTEE PILLS ---- */
    .trust-pill-box {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 14px;
      padding: 22px;
      text-align: center;
      height: 100%;
      transition: all 0.3s ease;
    }
    .trust-pill-box:hover {
      border-color: #104041;
      transform: translateY(-4px);
    }
    .trust-pill-icon {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      margin-bottom: 12px;
    }

    /* ---- PAYMENT CHIPS ---- */
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

    /* ---- CTA BANNER ---- */
    .pricing-cta-banner {
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
  <section class="pricing-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-9 mx-auto">
          <div class="pricing-hero-pill">
            <i class="fa-solid fa-tags"></i> Transparent, Fixed-Price Web Packages
          </div>
          <h1>Transparent Web Development Pricing</h1>
          <p class="pricing-hero-sub">
            No surprise invoices, no hourly scope creep. Fixed-price web development engineered to international standards with 100% IP transfer and 30-day post-launch warranty.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== PRICING PACKAGES STARTS =======-->
  <section class="py-5" style="background: #f8fbfb;">
    <div class="container py-3">

      <!-- Currency Switcher -->
      <div class="currency-switcher-bar">
        <button class="currency-btn active" data-currency="inr">
          <span>🇮🇳 INR (₹)</span>
        </button>
        <button class="currency-btn" data-currency="usd">
          <span>🇺🇸 USD ($)</span>
        </button>
        <button class="currency-btn" data-currency="aed">
          <span>🇦🇪 AED (د.إ)</span>
        </button>
        <button class="currency-btn" data-currency="gbp">
          <span>🇬🇧 GBP (£)</span>
        </button>
        <button class="currency-btn" data-currency="aud">
          <span>🇦🇺 AUD (A$)</span>
        </button>
      </div>

      <!-- Pricing Cards Grid -->
      <div class="row g-4 justify-content-center">

        <!-- 1. Starter / Static Website -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern">
            <h3 class="plan-name">Static Website</h3>
            <p class="plan-tagline">Ideal for personal portfolios, landing pages &amp; local businesses.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span class="curr-val" data-inr="₹4,999" data-usd="$69" data-aed="د.إ 249" data-gbp="£55" data-aud="A$99">₹4,999</span>
                <span class="price-unit">/ one-time</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> 3–5 Days Turnaround
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>Up to 5 Pages</strong> (HTML5, CSS3, JS)</li>
              <li><i class="fa-solid fa-circle-check"></i> 100% Mobile &amp; Tablet Responsive</li>
              <li><i class="fa-solid fa-circle-check"></i> Contact Form + Lead Notification</li>
              <li><i class="fa-solid fa-circle-check"></i> Google Maps &amp; WhatsApp Integration</li>
              <li><i class="fa-solid fa-circle-check"></i> On-Page SEO Meta Tags</li>
              <li><i class="fa-solid fa-circle-check"></i> Free SSL &amp; Hosting Setup Assistance</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>30-Day</strong> Bug-Fix Warranty</li>
            </ul>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20the%20Static%20Website%20Package." 
               target="_blank" rel="noopener" class="btn-plan-action">
              <span>Choose Static Plan</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

        <!-- 2. WordPress CMS Website (₹7,999) -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern">
            <h3 class="plan-name">WordPress Website</h3>
            <p class="plan-tagline">Easy-to-manage CMS site for content-heavy businesses &amp; agencies.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span class="curr-val" data-inr="₹7,999" data-usd="$99" data-aed="د.إ 369" data-gbp="£79" data-aud="A$149">₹7,999</span>
                <span class="price-unit">/ one-time</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> 4–6 Days Turnaround
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>Custom WordPress Theme</strong></li>
              <li><i class="fa-solid fa-circle-check"></i> Full Admin CMS Control (Edit text &amp; images)</li>
              <li><i class="fa-solid fa-circle-check"></i> Blog System + Category Manager</li>
              <li><i class="fa-solid fa-circle-check"></i> Yoast / RankMath SEO Configuration</li>
              <li><i class="fa-solid fa-circle-check"></i> Speed Optimization &amp; Caching Setup</li>
              <li><i class="fa-solid fa-circle-check"></i> Security &amp; Anti-Spam Hardening</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>45-Day</strong> Technical Support</li>
            </ul>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20the%20WordPress%20Package%20(₹7,999)." 
               target="_blank" rel="noopener" class="btn-plan-action">
              <span>Choose WordPress Plan</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

        <!-- 3. Dynamic Web App (PHP + MySQL - ₹9,999) -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern featured">
            <div class="card-ribbon">Most Popular</div>
            <h3 class="plan-name">Dynamic Web App</h3>
            <p class="plan-tagline">Custom database web application with dedicated Admin dashboard.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span class="curr-val" data-inr="₹9,999" data-usd="$129" data-aed="د.إ 479" data-gbp="£99" data-aud="A$199">₹9,999</span>
                <span class="price-unit">/ one-time</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> 7–10 Days Turnaround
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>PHP &amp; MySQL Custom Backend</strong></li>
              <li><i class="fa-solid fa-circle-check"></i> Custom Admin Panel with Analytics</li>
              <li><i class="fa-solid fa-circle-check"></i> Dynamic Lead &amp; Inquiry Management</li>
              <li><i class="fa-solid fa-circle-check"></i> User Authentication &amp; Role Access</li>
              <li><i class="fa-solid fa-circle-check"></i> REST API Integration Ready</li>
              <li><i class="fa-solid fa-circle-check"></i> Automated Email Triggers (SMTP)</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>60-Day</strong> Full Warranty &amp; Backups</li>
            </ul>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20the%20Dynamic%20Website%20Package%20(₹9,999)." 
               target="_blank" rel="noopener" class="btn-plan-action">
              <span>Get Started Now</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

        <!-- 4. MERN Stack Full-Stack App (₹18,999) -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern">
            <div class="card-ribbon" style="background:#00d8ff;color:#000;">Modern Stack</div>
            <h3 class="plan-name">MERN Stack App</h3>
            <p class="plan-tagline">Single Page Applications (SPA) with lightning React frontend.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span class="curr-val" data-inr="₹18,999" data-usd="$249" data-aed="د.إ 899" data-gbp="£199" data-aud="A$379">₹18,999</span>
                <span class="price-unit">/ one-time</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> 10–14 Days Turnaround
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>React.js / Next.js</strong> UI Frontend</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>Node.js &amp; Express</strong> Microservice Backend</li>
              <li><i class="fa-solid fa-circle-check"></i> MongoDB / PostgreSQL Cloud Database</li>
              <li><i class="fa-solid fa-circle-check"></i> JWT Secure Authentication &amp; Sessions</li>
              <li><i class="fa-solid fa-circle-check"></i> Real-Time State Management (Redux/Zustand)</li>
              <li><i class="fa-solid fa-circle-check"></i> Docker / Vercel / AWS Cloud Deployment</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>90-Day</strong> SLA Maintenance Support</li>
            </ul>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20the%20MERN%20Stack%20Package%20(₹18,999)." 
               target="_blank" rel="noopener" class="btn-plan-action">
              <span>Choose MERN Plan</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

        <!-- 5. E-Commerce Store (₹21,999) -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern">
            <div class="card-ribbon" style="background:#ffbd2e;color:#000;">Revenue Ready</div>
            <h3 class="plan-name">E-Commerce Store</h3>
            <p class="plan-tagline">Complete online storefront with payment gateway &amp; order tracking.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span class="curr-val" data-inr="₹21,999" data-usd="$289" data-aed="د.إ 999" data-gbp="£229" data-aud="A$429">₹21,999</span>
                <span class="price-unit">/ one-time</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> 14–20 Days Turnaround
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>Unlimited Products &amp; Categories</strong></li>
              <li><i class="fa-solid fa-circle-check"></i> Razorpay / Stripe / PayPal Gateway Setup</li>
              <li><i class="fa-solid fa-circle-check"></i> Shopping Cart, Wishlist &amp; One-Page Checkout</li>
              <li><i class="fa-solid fa-circle-check"></i> Inventory &amp; Order Notification System</li>
              <li><i class="fa-solid fa-circle-check"></i> Discount Coupon &amp; Promotional Engine</li>
              <li><i class="fa-solid fa-circle-check"></i> Customer Dashboard + Invoice PDF Gen</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>90-Day</strong> Full E-Commerce Support</li>
            </ul>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20the%20E-Commerce%20Package%20(₹21,999)." 
               target="_blank" rel="noopener" class="btn-plan-action">
              <span>Choose E-Commerce Plan</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

        <!-- 6. Custom Enterprise / CRM -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-card-modern">
            <h3 class="plan-name">Enterprise / CRM</h3>
            <p class="plan-tagline">Custom business automation, SaaS platforms &amp; third-party integrations.</p>
            
            <div class="plan-price-wrap">
              <div class="price-number">
                <span style="font-size:1.8rem;font-weight:800;color:#104041;">Custom Scope</span>
              </div>
              <div class="plan-delivery-badge">
                <i class="fa-solid fa-bolt"></i> Milestone Based Sprints
              </div>
            </div>

            <ul class="plan-features-list">
              <li><i class="fa-solid fa-circle-check"></i> <strong>Laravel / Node / React Architecture</strong></li>
              <li><i class="fa-solid fa-circle-check"></i> Custom CRM, ERP or Workflow Automation</li>
              <li><i class="fa-solid fa-circle-check"></i> Multi-Tenant SaaS Architecture</li>
              <li><i class="fa-solid fa-circle-check"></i> Complex 3rd-Party API &amp; Webhook Sync</li>
              <li><i class="fa-solid fa-circle-check"></i> Database Optimization &amp; Caching</li>
              <li><i class="fa-solid fa-circle-check"></i> Comprehensive NDA &amp; Code Ownership</li>
              <li><i class="fa-solid fa-circle-check"></i> <strong>Dedicated</strong> Retainer Support</li>
            </ul>

            <a href="<?= $site ?>contact/" class="btn-plan-action">
              <span>Request Custom Proposal</span>
              <i class="fa-solid fa-arrow-right fa-xs"></i>
            </a>
          </div>
        </div>

      </div>

      <!-- Feature Comparison Table -->
      <div class="comparison-table-wrapper" data-aos="fade-up">
        <div class="table-responsive">
          <table class="comparison-table">
            <thead>
              <tr>
                <th>Package Features</th>
                <th>Static</th>
                <th>WordPress</th>
                <th>Dynamic (PHP)</th>
                <th>MERN Stack</th>
                <th>E-Commerce</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong>Page Capacity</strong></td>
                <td>Up to 5 Pages</td>
                <td>Up to 10 Pages</td>
                <td>Up to 15 Pages</td>
                <td>Unlimited (SPA)</td>
                <td>Unlimited Products</td>
              </tr>
              <tr>
                <td><strong>Admin Dashboard</strong></td>
                <td><i class="fa-solid fa-xmark text-muted"></i></td>
                <td><i class="fa-solid fa-check text-success"></i> WordPress Admin</td>
                <td><i class="fa-solid fa-check text-success"></i> Custom Admin</td>
                <td><i class="fa-solid fa-check text-success"></i> Custom React Admin</td>
                <td><i class="fa-solid fa-check text-success"></i> Store Manager Panel</td>
              </tr>
              <tr>
                <td><strong>Database Integration</strong></td>
                <td><i class="fa-solid fa-xmark text-muted"></i></td>
                <td>MySQL</td>
                <td>MySQL / MariaDB</td>
                <td>MongoDB / PostgreSQL</td>
                <td>MySQL / PostgreSQL</td>
              </tr>
              <tr>
                <td><strong>Payment Gateway</strong></td>
                <td><i class="fa-solid fa-xmark text-muted"></i></td>
                <td>Optional Add-on</td>
                <td>Optional Add-on</td>
                <td>API Integrated</td>
                <td><i class="fa-solid fa-check text-success"></i> Included</td>
              </tr>
              <tr>
                <td><strong>SEO &amp; Meta Configuration</strong></td>
                <td>Basic</td>
                <td>RankMath / Yoast</td>
                <td>Dynamic Schema</td>
                <td>Server-Side Meta (SSR)</td>
                <td>Full E-Com Schema</td>
              </tr>
              <tr>
                <td><strong>Delivery Timeline</strong></td>
                <td>3–5 Days</td>
                <td>4–6 Days</td>
                <td>7–10 Days</td>
                <td>10–14 Days</td>
                <td>14–20 Days</td>
              </tr>
              <tr>
                <td><strong>Warranty &amp; Support</strong></td>
                <td>30 Days</td>
                <td>45 Days</td>
                <td>60 Days</td>
                <td>90 Days</td>
                <td>90 Days</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
  <!--===== PRICING PACKAGES ENDS =======-->

  <!--===== VALUE PROMISES & TRUST =======-->
  <section class="py-5" style="background: #ffffff;">
    <div class="container py-3">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
          <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">INTERNATIONAL STANDARDS</div>
          <h2 class="fw-bold" style="color:#0f2d2e;">What Makes NikhilWorks Pricing Different</h2>
          <p class="text-muted mt-2">Guaranteed delivery with institutional transparency and developer-first accountability.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="600">
          <div class="trust-pill-box">
            <div class="trust-pill-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">100% IP &amp; NDA</h5>
            <p class="text-muted mb-0" style="font-size:13.5px;line-height:1.6;">You own all repositories, assets, and design files upon project completion.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="750">
          <div class="trust-pill-box">
            <div class="trust-pill-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Zero Hidden Fees</h5>
            <p class="text-muted mb-0" style="font-size:13.5px;line-height:1.6;">Fixed-price quotes. No per-seat license taxes or surprise maintenance charges.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="trust-pill-box">
            <div class="trust-pill-icon"><i class="fa-solid fa-headset"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Direct Engineer Access</h5>
            <p class="text-muted mb-0" style="font-size:13.5px;line-height:1.6;">Communicate directly with Nikhil Gupta on WhatsApp or Slack without account managers.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1050">
          <div class="trust-pill-box">
            <div class="trust-pill-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
            <h5 class="fw-bold mb-2" style="color:#0f2d2e;">Post-Launch Warranty</h5>
            <p class="text-muted mb-0" style="font-size:13.5px;line-height:1.6;">Every package includes a bug-free guarantee and free post-delivery tweaks.</p>
          </div>
        </div>
      </div>

      <!-- International Payment Channels -->
      <div class="text-center mt-5 pt-3">
        <p class="text-muted mb-3 fw-bold" style="font-size:13px;letter-spacing:0.5px;text-transform:uppercase;">Accepted International Payment Methods</p>
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
  <!--===== VALUE PROMISES ENDS =======-->

  <!--===== PRICING FAQ AREA STARTS =======-->
  <section class="py-5" style="background: #f8fbfb;">
    <div class="container py-3">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
          <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">TRANSPARENT CLARIFICATIONS</div>
          <h2 class="fw-bold" style="color:#0f2d2e;">Frequently Asked Questions</h2>
          <p class="text-muted">Clear, upfront answers about payments, timelines, and deliverables.</p>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-9">
          <div class="accordion" id="pricingFaqAccordion">

            <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
              <h3 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqOne" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                  What's included in each package price?
                </button>
              </h3>
              <div id="pricingFaqOne" class="accordion-collapse collapse show" data-bs-parent="#pricingFaqAccordion">
                <div class="accordion-body" style="color:#557273;line-height:1.7;">
                  Every package includes custom UI design, clean mobile-responsive coding, SEO-ready structure, SSL configuration, security hardening, and the specified post-launch warranty period. Domain registration and hosting are configured on your account so you maintain full direct ownership.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqTwo" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                  How do international payments and milestones work?
                </button>
              </h3>
              <div id="pricingFaqTwo" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                <div class="accordion-body" style="color:#557273;line-height:1.7;">
                  International payments are handled easily via PayPal, Wise, Stripe, Bank Wire, or Crypto in your local currency (USD, AED, GBP, AUD, EUR, CAD, INR). Projects run on milestone stages: 50% deposit to commence work, and the remaining 50% upon final sign-off before server deployment.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqThree" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                  Can I upgrade or customize a package later?
                </button>
              </h3>
              <div id="pricingFaqThree" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                <div class="accordion-body" style="color:#557273;line-height:1.7;">
                  Yes! All our code is modular and scalable. You can start with a Static or WordPress build and later expand to a custom Dynamic database or full E-Commerce store by paying only the scope difference.
                </div>
              </div>
            </div>

            <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
              <h3 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pricingFaqFour" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                  What happens after the post-launch warranty ends?
                </button>
              </h3>
              <div id="pricingFaqFour" class="accordion-collapse collapse" data-bs-parent="#pricingFaqAccordion">
                <div class="accordion-body" style="color:#557273;line-height:1.7;">
                  Your website continues running smoothly. If you require continuous security patching, content updates, speed optimization, and backups, you can opt for our affordable <a href="<?= $site ?>service/website-maintenance-support/" style="color:#104041;font-weight:600;">Website Maintenance Plans</a>.
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== PRICING FAQ AREA ENDS =======-->

  <!--===== CTA BANNER STARTS =======-->
  <div class="container">
    <div class="pricing-cta-banner">
      <div class="container px-4">
        <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(173,255,28,0.15);color:#ADFF1C;font-weight:700;">READY TO COMMENCE?</div>
        <h2 class="text-white fw-bold mb-3" style="font-size:clamp(1.8rem, 3.5vw, 2.6rem);">Let's Build Your High-Performance Web Solution</h2>
        <p class="text-light mb-4" style="font-size:1.15rem;max-width:680px;margin:0 auto;color:#d1e7e4 !important;">
          Get a free consultation and project scope roadmap within 24 hours. Serving businesses in India and 30+ countries worldwide.
        </p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get A Free Quote</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20saw%20your%20pricing%20plans%20and%20want%20to%20discuss%20a%20package."
             class="btn btn-outline-light btn-lg px-4 py-3" style="border-radius:10px;font-weight:600;" target="_blank" rel="noopener">
            <i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp Instant Connect
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA BANNER ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Currency Switcher Script -->
  <script>
  $(document).ready(function() {
    $('.currency-btn').on('click', function() {
      var curr = $(this).data('currency');
      $('.currency-btn').removeClass('active');
      $(this).addClass('active');

      $('.curr-val').each(function() {
        var val = $(this).data(curr);
        if (val) {
          $(this).text(val);
        }
      });
    });
  });
  </script>

</body>
</html>