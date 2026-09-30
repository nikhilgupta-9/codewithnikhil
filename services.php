<?php
include "config/connect.php";
include_once "util/function.php";

$limit = 3;
$contact = contact_us();
$blogs = get_blog($limit);
$portfolios = get_portfolio();
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

$pageTitle = "Web Development & SEO Services India | Delhi NCR, Mumbai, Bangalore, Pune, Hyderabad";
$pageDesc = "Hire Nikhil Gupta, senior freelance web developer & SEO consultant. Custom business websites, e-commerce stores, MERN stack apps & CRM development across Delhi NCR, Mumbai, Bangalore, Pune, Chennai, Hyderabad & global clients.";
$pageKeywords = "web development services delhi, web developer mumbai, web developer bangalore, web developer pune, web developer hyderabad, web developer chennai, freelance web developer india, custom php development, ecommerce website developer, seo services delhi ncr";
$canonicalUrl = "https://nikhilworks.com/services/";
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
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
  <link rel="canonical" href="<?= $canonicalUrl ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.png">
  <meta property="og:url" content="<?= $canonicalUrl ?>">
  <meta property="og:type" content="website">
  <meta name="twitter:card" content="summary_large_image">

  <!-- Schema: Service & LocalBusiness with Deep Delhi NCR & Metro Cities Coverage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks - Web Development & SEO Services",
    "url": "https://nikhilworks.com/services/",
    "logo": "https://nikhilworks.com/assets/img/logo/preloader4.png",
    "image": "https://nikhilworks.com/assets/img/preview.png",
    "description": "<?= addslashes($pageDesc) ?>",
    "telephone": "+91-8368552640",
    "email": "contact@nikhilworks.com",
    "priceRange": "₹₹",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Karampura",
      "addressLocality": "New Delhi",
      "addressRegion": "Delhi",
      "postalCode": "110015",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 28.6678,
      "longitude": 77.1378
    },
    "areaServed": [
      { "@type": "City", "name": "Delhi" },
      { "@type": "City", "name": "New Delhi" },
      { "@type": "AdministrativeArea", "name": "Delhi NCR" },
      { "@type": "City", "name": "Noida" },
      { "@type": "City", "name": "Greater Noida" },
      { "@type": "City", "name": "Gurgaon" },
      { "@type": "City", "name": "Faridabad" },
      { "@type": "City", "name": "Ghaziabad" },
      { "@type": "City", "name": "Mumbai" },
      { "@type": "City", "name": "Bangalore" },
      { "@type": "City", "name": "Hyderabad" },
      { "@type": "City", "name": "Pune" },
      { "@type": "City", "name": "Chennai" },
      { "@type": "City", "name": "Kolkata" },
      { "@type": "City", "name": "Ahmedabad" },
      { "@type": "City", "name": "Jaipur" },
      { "@type": "City", "name": "Chandigarh" },
      { "@type": "City", "name": "Indore" },
      { "@type": "City", "name": "Lucknow" },
      { "@type": "City", "name": "Kochi" },
      { "@type": "City", "name": "Coimbatore" },
      { "@type": "City", "name": "Surat" }
    ],
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Web Development & Digital Services",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "Custom Web Design & Development" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "E-Commerce Store Development" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "WordPress CMS Development" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "MERN Stack Web Applications" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "Technical SEO & Keyword Ranking Promotion" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "Custom CRM Development & Pipeline Automation" }
        },
        {
          "@type": "Offer",
          "itemOffered": { "@type": "Service", "name": "Website Maintenance & Support SLA" }
        }
      ]
    }
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
    .services-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 85px;
      overflow: hidden;
      color: #fff;
    }
    .services-hero-pill {
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
    .services-hero h1 {
      font-size: clamp(2.2rem, 4.4vw, 3.4rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }
    .services-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 780px;
      margin: 0 auto 30px;
    }

    /* HERO STATS BAR */
    .hero-stats-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 25px;
    }
    .hero-stat-pill {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      padding: 8px 20px;
      border-radius: 40px;
      font-size: 13.5px;
      color: #e4f2f0;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .hero-stat-pill strong {
      color: #ADFF1C;
      font-weight: 800;
    }

    /* SERVICES GRID SECTION */
    .services-main-section {
      padding: 80px 0 60px;
      background: #f7faf9;
    }
    .service-card-modern {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 34px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      position: relative;
      transition: all 0.35s ease;
      box-shadow: 0 6px 24px rgba(16, 64, 65, 0.04);
    }
    .service-card-modern:hover {
      border-color: #104041;
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.12);
    }
    .service-card-icon {
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
    .service-card-modern:hover .service-card-icon {
      background: #104041;
      color: #ADFF1C;
      transform: scale(1.08);
    }
    .service-badge-exp {
      position: absolute;
      top: 28px;
      right: 28px;
      background: #f0f7f6;
      border: 1px solid #d4e5e3;
      color: #104041;
      font-size: 11px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
    }
    .service-title {
      font-size: 1.35rem;
      font-weight: 800;
      color: #0f2d2e;
      margin-bottom: 8px;
      line-height: 1.3;
    }
    .service-tagline {
      font-size: 11.5px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      color: #728f8d;
      margin-bottom: 14px;
    }
    .service-desc {
      font-size: 14px;
      line-height: 1.6;
      color: #557273;
      margin-bottom: 20px;
      flex-grow: 1;
    }
    .service-feature-checklist {
      list-style: none;
      padding: 0;
      margin: 0 0 24px;
      border-top: 1px solid #edf4f3;
      padding-top: 16px;
    }
    .service-feature-checklist li {
      font-size: 13px;
      color: #3b5655;
      margin-bottom: 8px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .service-feature-checklist li i {
      color: #25D366;
      font-size: 12px;
    }
    .service-card-footer {
      display: flex;
      gap: 10px;
      align-items: center;
    }
    .btn-service-primary {
      background: #104041;
      color: #ADFF1C !important;
      font-weight: 700;
      font-size: 13.5px;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      flex: 1;
      text-align: center;
      transition: all 0.25s ease;
    }
    .btn-service-primary:hover {
      background: #082223;
      color: #ffffff !important;
      transform: translateY(-2px);
    }
    .btn-service-wa {
      background: #25D366;
      color: #ffffff !important;
      padding: 10px 14px;
      border-radius: 10px;
      font-size: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.25s ease;
    }
    .btn-service-wa:hover {
      background: #1da851;
      transform: translateY(-2px);
    }

    /* LOCAL SEO HUBS SECTION */
    .loc-seo-hub-section {
      padding: 85px 0 95px;
      background: #ffffff;
    }
    .city-card-box {
      background: #f7faf9;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      padding: 26px 22px;
      height: 100%;
      transition: all 0.3s ease;
      display: flex;
      flex-direction: column;
    }
    .city-card-box:hover {
      border-color: #104041;
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(16, 64, 65, 0.08);
      background: #ffffff;
    }
    .city-card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 14px;
    }
    .city-name-title {
      font-size: 1.25rem;
      font-weight: 800;
      color: #0f2d2e;
      margin: 0;
    }
    .city-badge-hub {
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      font-size: 11px;
      font-weight: 800;
      padding: 4px 10px;
      border-radius: 20px;
      text-transform: uppercase;
    }
    .city-micro-list {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin: 12px 0 18px;
      flex-grow: 1;
    }
    .city-micro-chip {
      background: #ffffff;
      border: 1px solid #d4e3e2;
      border-radius: 6px;
      padding: 3px 8px;
      font-size: 11.5px;
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

    /* DELHI NCR DEEP MATRIX */
    .delhi-deep-panel {
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 24px;
      padding: 45px 35px;
      color: #ffffff;
      margin: 50px 0 30px;
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.2);
    }
    .delhi-ncr-zone-title {
      color: #ADFF1C;
      font-size: 14.5px;
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
      margin-bottom: 22px;
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
    }
    .locality-tag:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
    }

    /* CTA BANNER */
    .services-cta-banner {
      background: radial-gradient(circle at 90% 10%, rgba(173, 255, 28, 0.16) 0%, transparent 40%),
                  linear-gradient(135deg, #051617 0%, #0d3536 100%);
      padding: 75px 40px;
      color: #ffffff;
      text-align: center;
      border-radius: 24px;
      margin: 40px 0 20px;
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="services-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="services-hero-pill">
            <i class="fa-solid fa-code"></i> Enterprise &amp; Startup Web Engineering Hub
          </div>
          <h1>Full-Stack Web Development &amp; SEO Services</h1>
          <p class="services-hero-sub">
            Engineered for high speed, search engine dominance, and measurable conversion. Delivering bespoke digital platforms across <strong>Delhi NCR, Mumbai, Bangalore, Pune, Hyderabad, Chennai</strong>, and international markets.
          </p>

          <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="<?= $site ?>contact/" class="btn btn-lime px-4 py-3 fw-bold rounded-3" style="background:#ADFF1C; color:#082223;">
              <span>Start Your Project</span>
              <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
            <a href="<?= $site ?>website-cost-calculator/" class="btn btn-outline-light px-4 py-3 fw-bold rounded-3">
              <i class="fa-solid fa-calculator me-2"></i>
              <span>Calculate Cost Instant</span>
            </a>
            <a href="<?= $site ?>seo-auditor/" class="btn btn-outline-light px-4 py-3 fw-bold rounded-3">
              <i class="fa-solid fa-stethoscope me-2"></i>
              <span>Free SEO Audit Tool</span>
            </a>
          </div>

          <div class="hero-stats-row">
            <div class="hero-stat-pill">
              <i class="fa-solid fa-star text-warning"></i>
              <span>Google Rating: <strong><?= $avgRating ?>★</strong></span>
            </div>
            <div class="hero-stat-pill">
              <i class="fa-solid fa-rocket text-success"></i>
              <span>Projects Delivered: <strong><?= $projectCount ?>+</strong></span>
            </div>
            <div class="hero-stat-pill">
              <i class="fa-solid fa-business-time text-info"></i>
              <span>In Business: <strong><?= $yearsExperience ?>+ Years (Since Aug 2022)</strong></span>
            </div>
            <div class="hero-stat-pill">
              <i class="fa-solid fa-shield-check text-accent-dot"></i>
              <span>Code Ownership: <strong>100% Transfer</strong></span>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== CORE SERVICES GRID STARTS =======-->
  <section class="services-main-section">
    <div class="container">
      
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold mb-2">Capabilities &amp; Tech Stacks</span>
          <h2 class="fw-bold" style="color: #0f2d2e; font-size: clamp(1.8rem, 3.2vw, 2.5rem);">End-to-End Digital Engineering Solutions</h2>
          <p class="text-muted">From lightning-fast business websites to multi-tenant SaaS platforms and technical SEO campaigns.</p>
        </div>
      </div>

      <div class="row g-4">

        <!-- 1. Custom Website Design & Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="service-card-modern">
            <div class="service-badge-exp">Core Speciality</div>
            <div class="service-card-icon"><i class="fa-solid fa-laptop-code"></i></div>
            <h3 class="service-title">Web Design &amp; Development</h3>
            <div class="service-tagline">Clean, Modern &amp; Conversion-Driven</div>
            <p class="service-desc">Bespoke responsive websites engineered with clean semantic HTML5, modern CSS/Bootstrap, PHP, and JavaScript. Zero bloated page builders.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> 100% Mobile &amp; Tablet Responsive</li>
              <li><i class="fa-solid fa-check"></i> Sub-second 95+ PageSpeed Score</li>
              <li><i class="fa-solid fa-check"></i> On-Page SEO &amp; Schema Built-In</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>service/website-design-development/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20Web%20Design%20%26%20Development" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 2. E-Commerce Store Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card-modern">
            <div class="service-badge-exp">High Conversion</div>
            <div class="service-card-icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <h3 class="service-title">E-Commerce Development</h3>
            <div class="service-tagline">WooCommerce, Shopify &amp; Custom Cart</div>
            <p class="service-desc">Scalable online storefronts with Razorpay, Stripe, Paytm, and Cashfree payment gateways, automated inventory, and instant WhatsApp order alerts.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Multi-Currency &amp; GST Invoicing</li>
              <li><i class="fa-solid fa-check"></i> Abandoned Cart Recovery Funnels</li>
              <li><i class="fa-solid fa-check"></i> Shipping &amp; Logistics API Sync</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>service/e-commerce-website-development/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20an%20E-Commerce%20Website" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 3. WordPress Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card-modern">
            <div class="service-badge-exp">Easy CMS</div>
            <div class="service-card-icon"><i class="fa-brands fa-wordpress"></i></div>
            <h3 class="service-title">WordPress Development</h3>
            <div class="service-tagline">Custom Elementor &amp; Gutenberg</div>
            <p class="service-desc">Custom WordPress builds engineered for simplicity. Manage blogs, testimonials, products, and landing pages without writing a single line of code.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Custom Lightweight Theme Architecture</li>
              <li><i class="fa-solid fa-check"></i> Security Hardening &amp; Spam Shield</li>
              <li><i class="fa-solid fa-check"></i> Easy Drag &amp; Drop Client Handover</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>service/wordpress-website-development/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20a%20WordPress%20Website" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 4. Custom CRM & Portal Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="service-card-modern">
            <div class="service-badge-exp">Enterprise</div>
            <div class="service-card-icon"><i class="fa-solid fa-diagram-project"></i></div>
            <h3 class="service-title">Custom CRM Development</h3>
            <div class="service-tagline">Lead Pipelines &amp; Operations Automation</div>
            <p class="service-desc">Bespoke CRM solutions tailored to your business workflow. Role-based user dashboards, automated lead assignment, PDF quote generation, and webhook triggers.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Multi-Role RBAC Security Permissions</li>
              <li><i class="fa-solid fa-check"></i> WhatsApp &amp; SMS Communication Sync</li>
              <li><i class="fa-solid fa-check"></i> Real-time Analytics &amp; Reports</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>crm-development-india/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20CRM%20Development" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 5. Technical SEO & Organic Ranking -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card-modern">
            <div class="service-badge-exp">Rank #1 Google</div>
            <div class="service-card-icon"><i class="fa-solid fa-chart-line"></i></div>
            <h3 class="service-title">SEO Services &amp; Promotion</h3>
            <div class="service-tagline">Technical, On-Page &amp; Local Pack</div>
            <p class="service-desc">Dominate Google organic search and Google Maps 3-pack for high-intent business keywords. Comprehensive crawl audits, Schema JSON-LD, and keyword clusters.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Google Local Business Profile Optimization</li>
              <li><i class="fa-solid fa-check"></i> Schema.org Entity &amp; Rich Snippets</li>
              <li><i class="fa-solid fa-check"></i> 100% White-Hat Algorithm Compliance</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>seo-services-india/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20want%20to%20grow%20my%20SEO%20rankings" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 6. Website Maintenance & Support -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card-modern">
            <div class="service-badge-exp">Peace of Mind</div>
            <div class="service-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <h3 class="service-title">Website Maintenance SLA</h3>
            <div class="service-tagline">24/7 Security, Backups &amp; Bugfixes</div>
            <p class="service-desc">Ensure zero downtime with proactive maintenance. Includes daily/weekly cloud backups, malware scanning, plugin updates, speed monitoring, and content additions.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> 24/7 Server Uptime &amp; Speed Monitoring</li>
              <li><i class="fa-solid fa-check"></i> Database Optimization &amp; Backups</li>
              <li><i class="fa-solid fa-check"></i> Priority Direct Developer Support</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>service/website-maintenance-support/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20Website%20Maintenance" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 7. Website Redesign & Conversion Fix -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="service-card-modern">
            <div class="service-badge-exp">Modernization</div>
            <div class="service-card-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
            <h3 class="service-title">Website Redesign</h3>
            <div class="service-tagline">UI/UX Upgrade &amp; Speed Overhaul</div>
            <p class="service-desc">Transform outdated, slow websites into high-converting modern experiences with contemporary typography, glassmorphism, micro-interactions, and mobile speed.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Modern UI/UX Wireframes &amp; Layouts</li>
              <li><i class="fa-solid fa-check"></i> Zero SEO Loss with 301 Redirect Mapping</li>
              <li><i class="fa-solid fa-check"></i> Higher Conversion Rate &amp; Lower Bounce</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>service/website-redesign/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20want%20to%20Redesign%20my%20Website" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 8. API & Third-Party Integrations -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-card-modern">
            <div class="service-badge-exp">Seamless Connect</div>
            <div class="service-card-icon"><i class="fa-solid fa-network-wired"></i></div>
            <h3 class="service-title">API &amp; System Integration</h3>
            <div class="service-tagline">Payment, WhatsApp, CRM &amp; Logistics</div>
            <p class="service-desc">Connect your web platform with Razorpay, Stripe, Meta Graph APIs, WhatsApp Cloud API, Shiprocket logistics, Zoho, HubSpot, and custom REST/GraphQL endpoints.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Secure Webhook Handling &amp; Logging</li>
              <li><i class="fa-solid fa-check"></i> Instant Event Notifications</li>
              <li><i class="fa-solid fa-check"></i> Custom Third-Party Middleware</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>api-integration-services-india/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20API%20Integration%20Services" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 9. Google & Meta Ads Management -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-card-modern">
            <div class="service-badge-exp">Paid Traffic</div>
            <div class="service-card-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3 class="service-title">Google &amp; Meta Ads</h3>
            <div class="service-tagline">High-ROI Paid Lead Generation</div>
            <p class="service-desc">Precision paid advertising campaigns on Google Search, Performance Max, Facebook, and Instagram to generate qualified B2B and B2C sales inquiries from day one.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> Negative Keyword Filtering &amp; Low CPC</li>
              <li><i class="fa-solid fa-check"></i> Conversion Tracking &amp; GTM Setup</li>
              <li><i class="fa-solid fa-check"></i> Transparent Analytics &amp; ROAS Reporting</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>ads-management-india/" class="btn-service-primary">Explore Service <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20want%20to%20run%20Google%20or%20Meta%20Ads" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 10. AI Integration & Workflow Automation -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-card-modern" style="border: 2px solid #104041; background: linear-gradient(180deg, #ffffff 0%, #f4fbf9 100%);">
            <div class="service-badge-exp" style="background:#104041; color:#ADFF1C;"><i class="fa-solid fa-robot me-1"></i> Next-Gen AI</div>
            <div class="service-card-icon" style="background:#104041; color:#ADFF1C;"><i class="fa-solid fa-brain"></i></div>
            <h3 class="service-title">AI &amp; Workflow Automation</h3>
            <div class="service-tagline">Gemini, OpenAI, RAG &amp; n8n Workflows</div>
            <p class="service-desc">Supercharge web applications with custom LLMs, 24/7 AI customer service chatbots, enterprise RAG vector search, and automated zero-click business workflows.</p>
            <ul class="service-feature-checklist">
              <li><i class="fa-solid fa-check"></i> 24/7 AI Chatbot for Web &amp; WhatsApp</li>
              <li><i class="fa-solid fa-check"></i> Private Document Q&amp;A Vector Search</li>
              <li><i class="fa-solid fa-check"></i> n8n / Zapier Automated Workflows</li>
            </ul>
            <div class="service-card-footer">
              <a href="<?= $site ?>ai-integration-services/" class="btn-service-primary" style="background:#104041; color:#ADFF1C !important;">Explore AI Services <i class="fa-solid fa-arrow-right fa-xs"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20AI%20Integration%20and%20Automation" class="btn-service-wa" target="_blank" rel="noopener"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!--===== CORE SERVICES GRID ENDS =======-->

  <!--===== DEEP LOCAL SEO HUBS SECTION (DELHI NCR & ALL MAJOR METROS) =======-->
  <section class="loc-seo-hub-section">
    <div class="container">
      
      <div class="row text-center mb-5">
        <div class="col-lg-9 mx-auto">
          <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold mb-2">Localized Delivery Network</span>
          <h2 class="fw-bold" style="color: #0f2d2e; font-size: clamp(1.8rem, 3.2vw, 2.5rem);">Web Development &amp; SEO Services Across India</h2>
          <p class="text-muted">Serving startups, local businesses, manufacturers, corporate enterprises, and export houses across Delhi NCR and every major commercial city in India.</p>
        </div>
      </div>

      <!-- Tier 1 Metros Grid -->
      <div class="row g-4">
        
        <!-- Delhi NCR Hub -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Delhi NCR</h3>
              <span class="city-badge-hub">Local HQ</span>
            </div>
            <p class="text-muted small mb-1">In-person consultations available across all Delhi districts &amp; NCR satellite cities.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Karampura</span>
              <span class="city-micro-chip">Connaught Place</span>
              <span class="city-micro-chip">Nehru Place</span>
              <span class="city-micro-chip">Noida Sec 62</span>
              <span class="city-micro-chip">Gurgaon Cyber City</span>
              <span class="city-micro-chip">Dwarka</span>
              <span class="city-micro-chip">Janakpuri</span>
              <span class="city-micro-chip">Pitampura</span>
            </div>
            <a href="<?= $site ?>web-designer-delhi/" class="city-card-link">Web Developer Delhi <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Mumbai -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Mumbai</h3>
              <span class="city-badge-hub">Financial Hub</span>
            </div>
            <p class="text-muted small mb-1">Web development for finance, trading, Bollywood entertainment, and retail brands.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">BKC</span>
              <span class="city-micro-chip">Nariman Point</span>
              <span class="city-micro-chip">Andheri East/West</span>
              <span class="city-micro-chip">Lower Parel</span>
              <span class="city-micro-chip">Powai</span>
              <span class="city-micro-chip">Navi Mumbai</span>
              <span class="city-micro-chip">Thane</span>
            </div>
            <a href="<?= $site ?>web-developer-mumbai/" class="city-card-link">Web Developer Mumbai <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Bangalore -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Bangalore (Bengaluru)</h3>
              <span class="city-badge-hub">IT &amp; Startup Capital</span>
            </div>
            <p class="text-muted small mb-1">Product-focused, high-tech web applications and SaaS platforms for tech startups.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Whitefield</span>
              <span class="city-micro-chip">Electronic City</span>
              <span class="city-micro-chip">Koramangala</span>
              <span class="city-micro-chip">Indiranagar</span>
              <span class="city-micro-chip">HSR Layout</span>
              <span class="city-micro-chip">Manyata Tech Park</span>
            </div>
            <a href="<?= $site ?>web-developer-bangalore/" class="city-card-link">Web Developer Bangalore <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Hyderabad -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Hyderabad</h3>
              <span class="city-badge-hub">Cyberabad &amp; Pharma</span>
            </div>
            <p class="text-muted small mb-1">High-speed web portals, pharma B2B sites, and modern IT service business platforms.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Hitech City</span>
              <span class="city-micro-chip">Gachibowli</span>
              <span class="city-micro-chip">Madhapur</span>
              <span class="city-micro-chip">Jubilee Hills</span>
              <span class="city-micro-chip">Banjara Hills</span>
              <span class="city-micro-chip">Secunderabad</span>
            </div>
            <a href="<?= $site ?>web-developer-hyderabad/" class="city-card-link">Web Developer Hyderabad <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Pune -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Pune</h3>
              <span class="city-badge-hub">IT &amp; Auto Hub</span>
            </div>
            <p class="text-muted small mb-1">B2B industrial supplier websites, automotive portals, and IT tech consulting sites.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Hinjewadi IT Park</span>
              <span class="city-micro-chip">Magarpatta</span>
              <span class="city-micro-chip">Viman Nagar</span>
              <span class="city-micro-chip">Baner</span>
              <span class="city-micro-chip">Kharadi</span>
              <span class="city-micro-chip">Kothrud</span>
            </div>
            <a href="<?= $site ?>web-developer-pune/" class="city-card-link">Web Developer Pune <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Chennai -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Chennai</h3>
              <span class="city-badge-hub">SaaS &amp; Manufacturing</span>
            </div>
            <p class="text-muted small mb-1">Engineering, healthcare, SaaS tools, and export enterprise web platforms.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">OMR IT Corridor</span>
              <span class="city-micro-chip">T. Nagar</span>
              <span class="city-micro-chip">Guindy</span>
              <span class="city-micro-chip">Anna Nagar</span>
              <span class="city-micro-chip">Velachery</span>
              <span class="city-micro-chip">Nungambakkam</span>
            </div>
            <a href="<?= $site ?>web-developer-chennai/" class="city-card-link">Web Developer Chennai <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Kolkata -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Kolkata</h3>
              <span class="city-badge-hub">East India Hub</span>
            </div>
            <p class="text-muted small mb-1">Websites for manufacturing, logistics, tea exports, and professional service agencies.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Salt Lake Sector V</span>
              <span class="city-micro-chip">Rajarhat</span>
              <span class="city-micro-chip">New Town</span>
              <span class="city-micro-chip">Park Street</span>
              <span class="city-micro-chip">Howrah</span>
            </div>
            <a href="<?= $site ?>web-developer-kolkata/" class="city-card-link">Web Developer Kolkata <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Ahmedabad & Gujarat -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="50">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">Ahmedabad &amp; Surat</h3>
              <span class="city-badge-hub">Trade &amp; Textile</span>
            </div>
            <p class="text-muted small mb-1">E-Commerce catalogs, chemical suppliers, diamond &amp; textile manufacturers.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">SG Highway</span>
              <span class="city-micro-chip">Prahlad Nagar</span>
              <span class="city-micro-chip">GIFT City</span>
              <span class="city-micro-chip">Surat Ring Road</span>
              <span class="city-micro-chip">Varachha</span>
            </div>
            <a href="<?= $site ?>web-developer-ahmedabad/" class="city-card-link">Web Developer Ahmedabad <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

        <!-- Tier 2 Tech & Business Hubs -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="city-card-box">
            <div class="city-card-header">
              <h3 class="city-name-title">North &amp; Central Hubs</h3>
              <span class="city-badge-hub">Emerging Hubs</span>
            </div>
            <p class="text-muted small mb-1">Fast-growing businesses in Rajasthan, Punjab, MP, and UP looking for modern sites.</p>
            <div class="city-micro-list">
              <span class="city-micro-chip">Jaipur</span>
              <span class="city-micro-chip">Chandigarh</span>
              <span class="city-micro-chip">Indore</span>
              <span class="city-micro-chip">Lucknow</span>
              <span class="city-micro-chip">Kanpur</span>
              <span class="city-micro-chip">Ludhiana</span>
              <span class="city-micro-chip">Bhopal</span>
            </div>
            <a href="<?= $site ?>web-developer-jaipur/" class="city-card-link">Explore Regional Hubs <i class="fa-solid fa-arrow-right fa-xs"></i></a>
          </div>
        </div>

      </div>

      <!-- DELHI NCR DEEP LOCALITY MATRIX (Special High-Tech Block) -->
      <div class="delhi-deep-panel" data-aos="fade-up">
        <div class="row align-items-center mb-4">
          <div class="col-lg-8">
            <span class="badge bg-success text-white px-3 py-1 rounded-pill fw-bold mb-2">HQ Presence • Delhi NCR</span>
            <h3 class="fw-bold mb-2" style="font-size: 1.6rem; color: #ADFF1C;">Deep Local Coverage Across All Delhi &amp; NCR Localities</h3>
            <p class="text-light small mb-0">From small business storefronts to corporate headquarters, we provide fast delivery, localized on-page SEO, and optional in-person kickoff meetings.</p>
          </div>
          <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20from%20Delhi%20NCR%20and%20need%20a%20website" class="btn btn-outline-light px-4 py-2 fw-bold rounded-pill" target="_blank" rel="noopener" style="border-color:#ADFF1C; color:#ADFF1C;">
              <i class="fa-brands fa-whatsapp me-2"></i> Discuss Delhi Project
            </a>
          </div>
        </div>

        <div class="row g-4">
          
          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> West &amp; Central Delhi</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">Karampura (Base)</span>
              <span class="locality-tag">Connaught Place</span>
              <span class="locality-tag">Patel Nagar</span>
              <span class="locality-tag">Rajouri Garden</span>
              <span class="locality-tag">Janakpuri</span>
              <span class="locality-tag">Dwarka</span>
              <span class="locality-tag">Punjabi Bagh</span>
              <span class="locality-tag">Kirti Nagar</span>
              <span class="locality-tag">Naraina Ind. Area</span>
              <span class="locality-tag">Tilak Nagar</span>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> South &amp; East Delhi</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">Nehru Place (IT Hub)</span>
              <span class="locality-tag">Saket</span>
              <span class="locality-tag">Hauz Khas</span>
              <span class="locality-tag">Greater Kailash (GK)</span>
              <span class="locality-tag">Okhla Ind. Estate</span>
              <span class="locality-tag">Laxmi Nagar</span>
              <span class="locality-tag">Preet Vihar</span>
              <span class="locality-tag">Mayur Vihar</span>
              <span class="locality-tag">Defence Colony</span>
              <span class="locality-tag">Kalkaji</span>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> North Delhi &amp; NSP</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">Netaji Subhash Place (NSP)</span>
              <span class="locality-tag">Pitampura</span>
              <span class="locality-tag">Rohini</span>
              <span class="locality-tag">Model Town</span>
              <span class="locality-tag">Civil Lines</span>
              <span class="locality-tag">Ashok Vihar</span>
              <span class="locality-tag">Shalimar Bagh</span>
              <span class="locality-tag">Kamla Nagar</span>
              <span class="locality-tag">GT Karnal Road</span>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> Noida &amp; Greater Noida</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">Sector 62 (IT Park)</span>
              <span class="locality-tag">Sector 18 (Atta)</span>
              <span class="locality-tag">Sector 63 / 64 / 65</span>
              <span class="locality-tag">Noida Expressway</span>
              <span class="locality-tag">Sector 135 / 142</span>
              <span class="locality-tag">Greater Noida Knowledge Park</span>
              <span class="locality-tag">Pari Chowk</span>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> Gurgaon (Gurugram)</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">DLF Cyber City</span>
              <span class="locality-tag">Golf Course Road</span>
              <span class="locality-tag">Udyog Vihar</span>
              <span class="locality-tag">Sohna Road</span>
              <span class="locality-tag">MG Road</span>
              <span class="locality-tag">Sector 29</span>
              <span class="locality-tag">Manesar IMT</span>
              <span class="locality-tag">Cyber Hub</span>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="delhi-ncr-zone-title"><i class="fa-solid fa-location-crosshairs"></i> Faridabad &amp; Ghaziabad</div>
            <div class="locality-tags-cloud">
              <span class="locality-tag">Indirapuram</span>
              <span class="locality-tag">Vaishali</span>
              <span class="locality-tag">Kaushambi</span>
              <span class="locality-tag">Raj Nagar Ext.</span>
              <span class="locality-tag">Sector 15 Faridabad</span>
              <span class="locality-tag">Mathura Road Ind. Area</span>
              <span class="locality-tag">Mohan Cooperative</span>
            </div>
          </div>

        </div>
      </div>

      <!-- Free Tools & Calculator CTA Banner -->
      <div class="services-cta-banner">
        <div class="row align-items-center">
          <div class="col-lg-8 text-lg-start mb-4 mb-lg-0">
            <h3 class="fw-bold mb-2" style="font-size: 1.8rem;">Ready to Build or Upgrade Your Website?</h3>
            <p class="text-white-50 mb-0">Get a 100% transparent quote using our real-time calculator or chat with Nikhil on WhatsApp.</p>
          </div>
          <div class="col-lg-4 text-lg-end">
            <a href="<?= $site ?>website-cost-calculator/" class="btn btn-lime px-4 py-3 fw-bold rounded-3" style="background:#ADFF1C; color:#082223;">
              <i class="fa-solid fa-calculator me-2"></i> Use Cost Calculator
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!--===== DEEP LOCAL SEO HUBS SECTION ENDS =======-->

  <?php include_once "includes/footer.php" ?>

</body>
</html>