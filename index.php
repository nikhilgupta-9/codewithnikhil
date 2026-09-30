<?php
include_once "config/connect.php";
include_once "util/function.php";

$yearsExperience = years_in_business(2022, 8);
$projectCount = count_portfolio_projects();
if ($projectCount < 25) $projectCount = 25;
$ratingData = average_client_rating();
$avgRating = ($ratingData['avg'] > 0) ? $ratingData['avg'] : '4.9';
$totalReviews = ($ratingData['count'] > 0) ? $ratingData['count'] : 18;

$limit = 3;
$blogs = get_blog($limit);
$canonical_url = rtrim($site, '/') . '/';
$og_image = rtrim($site, '/') . '/assets/img/preview.png';
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
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary SEO Meta Tags (High-End Keyword Optimised) -->
  <title>NikhilWorks | Freelance Web Developer, AI Solutions & SEO Expert India</title>
  <meta name="description" content="Hire Nikhil Gupta — Senior Freelance Web Developer & AI Solutions Engineer in India. Custom PHP, MERN stack, WordPress, 24/7 AI Chatbots, n8n automations & Technical SEO services across Delhi NCR, Mumbai, Bangalore, USA, UK, UAE & Australia.">
  <meta name="keywords" content="freelance web developer india, web developer delhi ncr, full stack web developer india, ai integration services, ai chatbot developer, custom php developer, mern stack developer, wordpress developer delhi, ecommerce website developer india, local seo expert delhi, hire web developer india, website cost calculator india, n8n automation developer">
  <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
  <meta name="author" content="Nikhil Gupta - NikhilWorks">

  <!-- Geo Meta Tags for Delhi NCR & Local SEO -->
  <meta name="geo.region" content="IN-DL">
  <meta name="geo.placename" content="Delhi">
  <meta name="geo.position" content="28.6678;77.1378">
  <meta name="ICBM" content="28.6678, 77.1378">

  <!-- Canonical & International Hreflang Tags -->
  <link rel="canonical" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-IN" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-US" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-GB" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AE" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AU" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="x-default" href="<?= $canonical_url ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_IN">
  <meta property="og:title" content="NikhilWorks — Freelance Web Developer, AI Solutions & SEO Expert">
  <meta property="og:description" content="High-performance custom web applications, e-commerce stores, AI chatbots & technical SEO for businesses in India, USA, UK, UAE & Australia.">
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:image" content="<?= $og_image ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="NikhilWorks - Web Development, AI Integration and SEO Services">
  <meta name="google-site-verification" content="CDIIrOxAgIwGM82moWkxmu4MN4lrxpLE6HdPVFlvXPE" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@NikhilG69581514">
  <meta name="twitter:creator" content="@NikhilG69581514">
  <meta name="twitter:title" content="NikhilWorks — Freelance Web Developer & AI Solutions Engineer">
  <meta name="twitter:description" content="Custom full-stack web applications, e-commerce platforms, AI chatbots, and technical SEO with 100% code ownership.">
  <meta name="twitter:image" content="<?= $og_image ?>">

  <!-- ============================================
       SCHEMA JSON-LD — COMPREHENSIVE SET
       ============================================ -->

  <!-- 1. ProfessionalService Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "@id": "https://nikhilworks.com/#organization",
    "name": "NikhilWorks",
    "alternateName": "CodeWithNikhil",
    "description": "Professional full-stack web development, custom AI integrations, e-commerce engineering, and technical SEO services for startups and enterprises across India, USA, UK, UAE, and Australia.",
    "url": "https://nikhilworks.com/",
    "logo": "https://nikhilworks.com/assets/img/logo/preloader4.png",
    "image": "https://nikhilworks.com/assets/img/preview.png",
    "email": "contact@nikhilworks.com",
    "telephone": "+91-8368552640",
    "foundingDate": "2022-08",
    "priceRange": "₹₹",
    "currenciesAccepted": "INR, USD, GBP, AED, EUR, AUD",
    "paymentAccepted": "UPI, Credit Card, Debit Card, Bank Transfer, PayPal, Razorpay",
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
      "latitude": "28.6678",
      "longitude": "77.1378"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?= $avgRating ?>",
      "reviewCount": "<?= $totalReviews ?>",
      "bestRating": "5",
      "worstRating": "1"
    },
    "areaServed": [
      { "@type": "City", "name": "Delhi" },
      { "@type": "City", "name": "Noida" },
      { "@type": "City", "name": "Gurgaon" },
      { "@type": "City", "name": "Mumbai" },
      { "@type": "City", "name": "Bangalore" },
      { "@type": "City", "name": "Hyderabad" },
      { "@type": "City", "name": "Pune" },
      { "@type": "City", "name": "Chennai" },
      { "@type": "Country", "name": "India" },
      { "@type": "Country", "name": "United States" },
      { "@type": "Country", "name": "United Kingdom" },
      { "@type": "Country", "name": "United Arab Emirates" },
      { "@type": "Country", "name": "Australia" }
    ],
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Web Development & AI Engineering Packages",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "WordPress Website Development",
            "url": "https://nikhilworks.com/service/wordpress-website-development/"
          },
          "price": "7999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Dynamic Custom PHP/MySQL Website",
            "url": "https://nikhilworks.com/service/website-design-development/"
          },
          "price": "9999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "MERN Stack Application Development",
            "url": "https://nikhilworks.com/service/website-design-development/"
          },
          "price": "18999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "E-Commerce Online Store Platform",
            "url": "https://nikhilworks.com/service/e-commerce-website-development/"
          },
          "price": "21999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "AI Integration & Workflow Automation",
            "url": "https://nikhilworks.com/ai-integration-services/"
          },
          "price": "11999",
          "priceCurrency": "INR"
        }
      ]
    },
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

  <!-- 2. Person Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "@id": "https://nikhilworks.com/#person",
    "name": "Nikhil Gupta",
    "givenName": "Nikhil",
    "familyName": "Gupta",
    "jobTitle": "Senior Freelance Full-Stack Developer & AI Solutions Engineer",
    "description": "Nikhil Gupta is a leading freelance web developer and AI solutions architect based in Delhi NCR, India. He builds high-speed custom PHP applications, MERN stack platforms, AI chatbots, and Google #1 ranking SEO architectures.",
    "url": "https://nikhilworks.com/",
    "image": "https://nikhilworks.com/assets/img/all-images/auhtor-img1.png",
    "email": "contact@nikhilworks.com",
    "telephone": "+91-8368552640",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "New Delhi",
      "addressRegion": "Delhi",
      "addressCountry": "IN"
    },
    "worksFor": {
      "@id": "https://nikhilworks.com/#organization"
    },
    "knowsAbout": [
      "Full-Stack Web Development",
      "PHP 8.2 & MySQL",
      "React.js & Next.js",
      "Node.js & Express",
      "MERN Stack",
      "Google Gemini API Integration",
      "OpenAI GPT-4o Integration",
      "RAG Vector Search Pipelines",
      "n8n & Zapier Workflow Automation",
      "Technical SEO & Schema Markup",
      "E-Commerce Payment Gateways",
      "WordPress & WooCommerce"
    ]
  }
  </script>

  <!-- 3. WebSite Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "@id": "https://nikhilworks.com/#website",
    "name": "NikhilWorks",
    "url": "https://nikhilworks.com/",
    "description": "Professional web development, AI integration, and SEO engineering for high-growth businesses.",
    "publisher": {
      "@id": "https://nikhilworks.com/#person"
    }
  }
  </script>

  <!-- 4. FAQPage Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Why should I hire NikhilWorks as a freelance web developer instead of an agency?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "When you hire NikhilWorks, you work directly 1-on-1 with a senior full-stack engineer. You get 3x faster delivery, zero agency management overhead, 60% lower costs, and 100% direct source code ownership with zero vendor lock-in."
        }
      },
      {
        "@type": "Question",
        "name": "How much does website development cost in India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Fixed transparent pricing: WordPress websites start at ₹7,999 ($99), Dynamic custom database websites start at ₹9,999 ($129), full-stack MERN applications start at ₹18,999 ($249), and full E-Commerce online stores start at ₹21,999 ($289)."
        }
      },
      {
        "@type": "Question",
        "name": "Can you integrate AI Chatbots and automated workflows into my existing website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! We build 24/7 AI customer support bots trained on your company knowledge base, implement Google Gemini & OpenAI GPT-4o embeddings, setup RAG vector search, and build automated n8n/Zapier workflows."
        }
      },
      {
        "@type": "Question",
        "name": "Do you work with international clients outside India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes, we regularly work with businesses across the USA, United Kingdom, UAE (Dubai), Australia, Canada, and Europe. All projects are managed remotely via WhatsApp, Zoom, and GitHub, with payments accepted in USD, AED, GBP, and INR."
        }
      },
      {
        "@type": "Question",
        "name": "What is the typical turnaround time for delivering a website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Standard WordPress and static websites are delivered in 3–5 business days. Dynamic web applications and e-commerce stores take 1–3 weeks, and complex full-stack SaaS portals take 3–6 weeks."
        }
      },
      {
        "@type": "Question",
        "name": "Do you provide post-launch warranty and SEO optimization?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Every project includes a 30 to 90-day bug-free warranty, built-in Core Web Vitals speed optimization (90+ score), mobile-first responsiveness, and complete JSON-LD Schema on-page SEO."
        }
      }
    ]
  }
  </script>

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

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* ---- HERO SECTION UPGRADE ---- */
    .home-hero-section {
      position: relative;
      background: radial-gradient(circle at 85% 15%, rgba(173, 255, 28, 0.18) 0%, transparent 45%),
                  radial-gradient(circle at 10% 85%, rgba(16, 64, 65, 0.9) 0%, transparent 55%),
                  linear-gradient(135deg, #041213 0%, #0a292a 50%, #030d0e 100%);
      padding: 145px 0 90px;
      overflow: hidden;
      color: #fff;
    }
    .loc-grid-overlay {
      position: absolute;
      inset: 0;
      background-image: 
        linear-gradient(to right, rgba(173, 255, 28, 0.05) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(173, 255, 28, 0.05) 1px, transparent 1px);
      background-size: 38px 38px;
      pointer-events: none;
      z-index: 1;
    }
    .hero-status-pill {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.4);
      color: #ADFF1C;
      padding: 7px 20px;
      border-radius: 50px;
      font-size: 13.5px;
      font-weight: 700;
      margin-bottom: 22px;
      backdrop-filter: blur(8px);
      letter-spacing: 0.3px;
    }
    .hero-status-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: #ADFF1C;
      border-radius: 50%;
      box-shadow: 0 0 12px #ADFF1C;
      animation: pulseDot 2s infinite;
    }
    @keyframes pulseDot {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.35; transform: scale(0.8); }
    }
    .home-hero-section h1 {
      font-size: clamp(2.3rem, 4.8vw, 3.6rem);
      font-weight: 800;
      line-height: 1.15;
      color: #ffffff;
      margin-bottom: 22px;
      letter-spacing: -0.5px;
    }
    .home-hero-section h1 span.highlight {
      color: #ADFF1C;
      background: linear-gradient(120deg, #ADFF1C 0%, #7dffb3 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .home-hero-section p.lead-text {
      font-size: clamp(1.05rem, 1.8vw, 1.2rem);
      color: #d6ecea;
      max-width: 860px;
      margin: 0 auto 34px;
      line-height: 1.7;
    }
    .hero-action-buttons {
      display: flex;
      gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 45px;
    }
    .btn-hero-main {
      background: #ADFF1C;
      color: #082223 !important;
      font-weight: 800;
      font-size: 15.5px;
      padding: 14px 30px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      gap: 9px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 30px rgba(173, 255, 28, 0.28);
      text-decoration: none;
    }
    .btn-hero-main:hover {
      background: #ffffff;
      color: #082223 !important;
      transform: translateY(-3px);
      box-shadow: 0 14px 35px rgba(255, 255, 255, 0.35);
    }
    .btn-hero-sec {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff !important;
      border: 1px solid rgba(255, 255, 255, 0.22);
      font-weight: 600;
      font-size: 15px;
      padding: 14px 26px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      backdrop-filter: blur(8px);
      text-decoration: none;
    }
    .btn-hero-sec:hover {
      background: rgba(255, 255, 255, 0.18);
      border-color: #ffffff;
      transform: translateY(-3px);
    }

    /* ---- LIVE TRUST STATS ROW ---- */
    .hero-trust-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
      justify-content: center;
      align-items: center;
      padding-top: 25px;
      border-top: 1px solid rgba(255, 255, 255, 0.12);
    }
    .hero-stat-pill {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.14);
      padding: 8px 16px;
      border-radius: 50px;
      font-size: 13px;
      color: #e0f2f1;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .hero-stat-pill strong {
      color: #ADFF1C;
    }

    /* ---- QUICK UTILITIES COMMAND CENTER ---- */
    .command-center-section {
      background: #082223;
      padding: 30px 0 45px;
      border-bottom: 1px solid rgba(173, 255, 28, 0.2);
    }
    .tool-quick-card {
      background: rgba(16, 64, 65, 0.4);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 16px;
      padding: 22px 20px;
      display: flex;
      align-items: center;
      gap: 16px;
      text-decoration: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      height: 100%;
    }
    .tool-quick-card:hover {
      background: rgba(173, 255, 28, 0.12);
      border-color: #ADFF1C;
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    .tool-icon-circle {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }
    .tool-info-title {
      font-size: 15px;
      font-weight: 800;
      color: #ffffff;
      margin-bottom: 2px;
    }
    .tool-info-sub {
      font-size: 12px;
      color: #9ebdbb;
      margin: 0;
    }

    /* ---- SERVICES SECTION ---- */
    .services-modern-grid {
      padding: 85px 0 95px;
      background: #f7faf9;
    }
    .service-card-main {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 35px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
      position: relative;
    }
    .service-card-main:hover {
      border-color: #104041;
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.1);
    }
    .service-card-main.featured-ai {
      background: linear-gradient(180deg, #ffffff 0%, #f3fcf8 100%);
      border: 2px solid #104041;
    }
    .service-icon-box {
      width: 58px;
      height: 58px;
      background: #f0f7f6;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: #104041;
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    .service-card-main:hover .service-icon-box {
      background: #104041;
      color: #ADFF1C;
      transform: rotate(6deg) scale(1.05);
    }
    .service-heading-title {
      font-size: 1.3rem;
      font-weight: 800;
      color: #0f2d2e;
      margin-bottom: 10px;
    }
    .service-desc-text {
      font-size: 14px;
      color: #557273;
      line-height: 1.7;
      margin-bottom: 20px;
      flex-grow: 1;
    }
    .service-bullets {
      list-style: none;
      padding: 0;
      margin: 0 0 22px;
    }
    .service-bullets li {
      font-size: 13px;
      color: #2b4546;
      padding: 5px 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .service-bullets li i {
      color: #25D366;
      font-size: 12px;
    }
    .service-btn-group {
      display: flex;
      gap: 10px;
      align-items: center;
      margin-top: auto;
    }
    .btn-card-action {
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
    .btn-card-action:hover {
      background: #082223;
      color: #ffffff !important;
      transform: translateY(-2px);
    }
    .btn-card-wa {
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
    .btn-card-wa:hover {
      background: #1da851;
      transform: translateY(-2px);
    }

    /* ---- FREELANCER VS AGENCY COMPARISON ---- */
    .compare-section {
      background: #ffffff;
      padding: 85px 0;
    }
    .compare-table-box {
      background: #f7faf9;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(16, 64, 65, 0.06);
    }
    .compare-header-row {
      background: #082223;
      color: #ffffff;
      padding: 22px 28px;
    }
    .compare-item-row {
      padding: 18px 28px;
      border-bottom: 1px solid #e5efee;
      display: flex;
      align-items: center;
    }
    .compare-item-row:last-child {
      border-bottom: none;
    }

    /* ---- PRICING SECTION ---- */
    .pricing-home-section {
      background: #f7faf9;
      padding: 90px 0;
    }
    .home-pricing-card {
      background: #ffffff;
      border: 2px solid #e1eceb;
      border-radius: 22px;
      padding: 38px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
      position: relative;
    }
    .home-pricing-card.featured {
      background: #082223;
      border-color: #ADFF1C;
      color: #ffffff;
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
    }
    .home-pricing-card:hover {
      border-color: #ADFF1C;
      transform: translateY(-8px);
      box-shadow: 0 18px 45px rgba(16, 64, 65, 0.12);
    }
    .home-price-val {
      font-size: 2.2rem;
      font-weight: 800;
      margin: 16px 0 8px;
    }
    .price-popular-badge {
      position: absolute;
      top: -14px;
      right: 25px;
      background: #ADFF1C;
      color: #082223;
      font-size: 11px;
      font-weight: 800;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 20px;
    }

    /* ---- LOCAL SEO MATRIX ---- */
    .loc-seo-home-section {
      background: #082223;
      padding: 90px 0;
      color: #ffffff;
    }
    .delhi-ncr-deep-grid {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(173, 255, 28, 0.3);
      border-radius: 20px;
      padding: 35px 28px;
      margin-top: 35px;
    }
    .locality-chip-link {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #d6ecea;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 500;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }
    .locality-chip-link:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
      transform: translateY(-2px);
    }

    /* ---- FAQ SECTION ---- */
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

<body class="homepage4-body pt-0">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="home-hero-section">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          
          <div class="hero-status-pill" data-aos="fade-down">
            <span class="pulse-dot"></span>
            Senior Freelance Full-Stack Developer &amp; AI Engineer · Delhi NCR &amp; Global
          </div>

          <h1 data-aos="fade-up" data-aos-duration="700">
            Custom Web Applications, <span class="highlight">AI Workflows</span> &amp; High-Rank SEO Systems
          </h1>

          <p class="lead-text" data-aos="fade-up" data-aos-duration="900">
            Get lightning-fast, custom-coded web solutions built for maximum conversions. Specializing in PHP 8.2, MERN Stack, WordPress, 24/7 AI Chatbots, n8n automations, and Google Local #1 SEO rankings with 100% direct communication &amp; complete code ownership.
          </p>

          <div class="hero-action-buttons" data-aos="fade-up" data-aos-duration="1100">
            <a href="<?= $site ?>contact/" class="btn-hero-main">
              <i class="fa-solid fa-paper-plane"></i> Start Your Project
            </a>
            <a href="<?= $site ?>website-cost-calculator/" class="btn-hero-sec">
              <i class="fa-solid fa-calculator"></i> Calculate Cost Instant
            </a>
            <a href="<?= $site ?>seo-auditor/" class="btn-hero-sec">
              <i class="fa-solid fa-stethoscope"></i> Free SEO Audit
            </a>
            <a href="<?= $site ?>ai-integration-services/" class="btn-hero-sec" style="border-color:#ADFF1C; color:#ADFF1C !important;">
              <i class="fa-solid fa-sparkles"></i> AI Services
            </a>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20discussing%20a%20project" target="_blank" rel="noopener" class="btn-hero-sec" style="background:#25D366; border-color:#25D366; color:#fff !important;">
              <i class="fa-brands fa-whatsapp"></i> WhatsApp
            </a>
          </div>

          <!-- Hero Trust Metrics Strip -->
          <div class="hero-trust-bar" data-aos="fade-up" data-aos-duration="1300">
            <div class="hero-stat-pill"><i class="fa-solid fa-star text-warning"></i> Google Rating: <strong><?= $avgRating ?>★ (<?= $totalReviews ?> Reviews)</strong></div>
            <div class="hero-stat-pill"><i class="fa-solid fa-rocket text-success"></i> Delivered: <strong><?= $projectCount ?>+ Projects</strong></div>
            <div class="hero-stat-pill"><i class="fa-solid fa-calendar-check text-info"></i> Experience: <strong><?= $yearsExperience ?>+ Years (Since Aug 2022)</strong></div>
            <div class="hero-stat-pill"><i class="fa-solid fa-shield-halved text-accent-dot"></i> Code Transfer: <strong>100% IP Ownership</strong></div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== QUICK UTILITIES COMMAND CENTER =======-->
  <section class="command-center-section">
    <div class="container">
      <div class="row g-3">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <a href="<?= $site ?>website-cost-calculator/" class="tool-quick-card">
            <div class="tool-icon-circle"><i class="fa-solid fa-calculator"></i></div>
            <div>
              <div class="tool-info-title">Cost Calculator</div>
              <p class="tool-info-sub">Instant accurate project price estimator</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <a href="<?= $site ?>seo-auditor/" class="tool-quick-card">
            <div class="tool-icon-circle"><i class="fa-solid fa-stethoscope"></i></div>
            <div>
              <div class="tool-info-title">Free SEO Auditor</div>
              <p class="tool-info-sub">Audit on-page SEO, speed &amp; score</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <a href="<?= $site ?>ai-integration-services/" class="tool-quick-card">
            <div class="tool-icon-circle" style="background:rgba(173,255,28,0.2);"><i class="fa-solid fa-brain"></i></div>
            <div>
              <div class="tool-info-title">AI &amp; Automations</div>
              <p class="tool-info-sub">Gemini, GPT-4o &amp; n8n workflows</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <a href="<?= $site ?>pay/" class="tool-quick-card">
            <div class="tool-icon-circle"><i class="fa-solid fa-qrcode"></i></div>
            <div>
              <div class="tool-info-title">Pay Online</div>
              <p class="tool-info-sub">Instant zero-fee UPI / QR checkout</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!--===== CORE SERVICES GRID =======-->
  <section class="services-modern-grid">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Core Capabilities</h5>
          <h2>Engineered for Performance, Speed &amp; Search Dominance</h2>
          <p class="text-muted">Explore high-end digital engineering services built without bloated page builders or vendor lock-in.</p>
        </div>
      </div>

      <div class="row g-4">
        <!-- 1. Custom Web Application Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="service-card-main">
            <div class="service-icon-box"><i class="fa-solid fa-code"></i></div>
            <h3 class="service-heading-title">Custom Web Development</h3>
            <p class="service-desc-text">
              High-performance dynamic websites and portals built with PHP 8.2, MySQL, REST APIs, and modern JavaScript. Sub-second load times and robust admin control panels.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> 100% Mobile &amp; Tablet Responsive</li>
              <li><i class="fa-solid fa-check"></i> Sub-Second 95+ Core Web Vitals Score</li>
              <li><i class="fa-solid fa-check"></i> Secure SQL injection &amp; XSS protection</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>service/website-design-development/" class="btn-card-action">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20Custom%20Web%20Development" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 2. AI Integration & Automation (Featured) -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="service-card-main featured-ai">
            <div class="service-icon-box" style="background:#104041; color:#ADFF1C;"><i class="fa-solid fa-brain"></i></div>
            <h3 class="service-heading-title">AI &amp; Workflow Automation</h3>
            <p class="service-desc-text">
              Integrate Google Gemini, OpenAI GPT-4o, and RAG vector search into your web apps. 24/7 smart customer chatbots and zero-click n8n/Zapier business workflows.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> 24/7 Knowledge Base AI Chatbot</li>
              <li><i class="fa-solid fa-check"></i> Multi-Document RAG Vector Search</li>
              <li><i class="fa-solid fa-check"></i> n8n Auto Lead Scoring &amp; CRM Sync</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>ai-integration-services/" class="btn-card-action" style="background:#104041; color:#ADFF1C !important;">Explore AI Solutions <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20AI%20Integration" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 3. E-Commerce Store Development -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="service-card-main">
            <div class="service-icon-box"><i class="fa-solid fa-cart-shopping"></i></div>
            <h3 class="service-heading-title">E-Commerce Development</h3>
            <p class="service-desc-text">
              Complete online shopping platforms with Razorpay, Stripe, and Cashfree gateways, inventory management, abandoned cart recovery, and instant WhatsApp order notifications.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> Multi-Currency &amp; GST Invoicing</li>
              <li><i class="fa-solid fa-check"></i> Automated Shipping &amp; Logistics Sync</li>
              <li><i class="fa-solid fa-check"></i> Instant WhatsApp &amp; SMS Order Alerts</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>service/e-commerce-website-development/" class="btn-card-action">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20need%20an%20E-Commerce%20Website" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 4. WordPress & Headless CMS -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="service-card-main">
            <div class="service-icon-box"><i class="fa-brands fa-wordpress"></i></div>
            <h3 class="service-heading-title">WordPress Development</h3>
            <p class="service-desc-text">
              Custom WordPress websites engineered without slow page-builder bloat. Easily manage blogs, media, products, and landing pages with custom Gutenberg blocks.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> Custom Lightweight Theme Architecture</li>
              <li><i class="fa-solid fa-check"></i> Security Hardening &amp; Spam Filtering</li>
              <li><i class="fa-solid fa-check"></i> Easy Drag &amp; Drop Client Handover</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>service/wordpress-website-development/" class="btn-card-action">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20need%20a%20WordPress%20Website" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 5. Technical SEO & Local Pack Rankings -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="service-card-main">
            <div class="service-icon-box"><i class="fa-solid fa-chart-line"></i></div>
            <h3 class="service-heading-title">SEO Services &amp; Local Pack</h3>
            <p class="service-desc-text">
              Dominate organic Google searches and the Google Maps 3-Pack. Technical on-page audits, structured Schema JSON-LD markup, and high-intent keyword clustering.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> Google Business Profile 3-Pack Optimization</li>
              <li><i class="fa-solid fa-check"></i> Schema.org Entity &amp; Rich Snippets</li>
              <li><i class="fa-solid fa-check"></i> 100% White-Hat Algorithm Compliance</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>seo-services-india/" class="btn-card-action">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20to%20rank%20#1%20on%20Google" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <!-- 6. Custom CRM & Operations Systems -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="service-card-main">
            <div class="service-icon-box"><i class="fa-solid fa-diagram-project"></i></div>
            <h3 class="service-heading-title">Custom CRM Development</h3>
            <p class="service-desc-text">
              Tailor-made CRM and ERP dashboards engineered around your specific workflow. Role-based user authentication (RBAC), lead tracking, automated quotes, and analytics.
            </p>
            <ul class="service-bullets">
              <li><i class="fa-solid fa-check"></i> Multi-Role RBAC Security Controls</li>
              <li><i class="fa-solid fa-check"></i> WhatsApp &amp; Email Communication Webhooks</li>
              <li><i class="fa-solid fa-check"></i> Real-time Business Analytics &amp; Reports</li>
            </ul>
            <div class="service-btn-group">
              <a href="<?= $site ?>crm-development-india/" class="btn-card-action">Explore Service <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20need%20Custom%20CRM%20Development" target="_blank" rel="noopener" class="btn-card-wa"><i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== WHY HIRE NIKHILWORKS (FREELANCER VS AGENCY) =======-->
  <section class="compare-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto heading2">
          <h5>The Freelancer Advantage</h5>
          <h2>Why Businesses Choose NikhilWorks Over Traditional Agencies</h2>
          <p class="text-muted">Direct communication, faster turnarounds, zero agency markups, and pure technical focus.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="compare-table-box" data-aos="fade-up">
            <div class="compare-header-row d-flex justify-content-between align-items-center">
              <div class="fw-bold" style="flex: 2;">Project Factor</div>
              <div class="fw-bold text-center" style="flex: 2; color:#ADFF1C;">Working with NikhilWorks</div>
              <div class="fw-bold text-center text-white-50" style="flex: 2;">Traditional Agencies</div>
            </div>

            <div class="compare-item-row">
              <div style="flex: 2; font-weight:700; color:#0f2d2e;">Direct Communication</div>
              <div style="flex: 2;" class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> Direct 1-on-1 with Developer</div>
              <div style="flex: 2;" class="text-center text-muted">Middlemen &amp; Account Managers</div>
            </div>

            <div class="compare-item-row">
              <div style="flex: 2; font-weight:700; color:#0f2d2e;">Turnaround Speed</div>
              <div style="flex: 2;" class="text-center text-success fw-bold"><i class="fa-solid fa-bolt me-1"></i> 3x Faster (3–7 Days MVP)</div>
              <div style="flex: 2;" class="text-center text-muted">Weeks of Meetings &amp; Red Tape</div>
            </div>

            <div class="compare-item-row">
              <div style="flex: 2; font-weight:700; color:#0f2d2e;">Pricing &amp; Cost</div>
              <div style="flex: 2;" class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> 50–60% Lower (Zero Overhead)</div>
              <div style="flex: 2;" class="text-center text-muted">High Agency Retainers &amp; Markups</div>
            </div>

            <div class="compare-item-row">
              <div style="flex: 2; font-weight:700; color:#0f2d2e;">Source Code Ownership</div>
              <div style="flex: 2;" class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> 100% IP Transfer &amp; GitHub Access</div>
              <div style="flex: 2;" class="text-center text-muted">Proprietary Lock-in &amp; Host Retainers</div>
            </div>

            <div class="compare-item-row">
              <div style="flex: 2; font-weight:700; color:#0f2d2e;">Post-Launch Warranty</div>
              <div style="flex: 2;" class="text-center text-success fw-bold"><i class="fa-solid fa-circle-check me-1"></i> 30–90 Days Free Warranty Included</div>
              <div style="flex: 2;" class="text-center text-muted">Charged Extra for Every Small Fix</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== PRICING PACKAGES (INTERNATIONAL STANDARD) =======-->
  <section class="pricing-home-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Fixed-Price Investment</h5>
          <h2>Transparent, International-Standard Pricing</h2>
          <p class="text-muted">No hidden fees, no recurring surprises. 100% complete source code transfer and post-launch warranty included.</p>
        </div>
      </div>

      <div class="row g-4">
        <!-- 1. WordPress Website -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="home-pricing-card">
            <h4>WordPress Website</h4>
            <p class="text-muted small">Ideal for corporate websites, blogs &amp; service businesses.</p>
            <div class="home-price-val" style="color: #104041;">₹7,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $99</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> 1-5 Custom WordPress Pages</li>
              <li><i class="fa-solid fa-check"></i> Elementor / Block Editor Ready</li>
              <li><i class="fa-solid fa-check"></i> Contact Form + WhatsApp Chat</li>
              <li><i class="fa-solid fa-check"></i> Mobile Responsive &amp; Fast Speed</li>
              <li><i class="fa-solid fa-check"></i> 30-Day Bug-Free Warranty</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20WordPress%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center mt-auto">
              Choose WordPress <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- 2. Dynamic Website (Featured) -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="home-pricing-card featured">
            <span class="price-popular-badge">Most Popular</span>
            <h4 class="text-white">Dynamic Website</h4>
            <p class="text-white-50 small">Custom PHP &amp; MySQL with powerful admin dashboard.</p>
            <div class="home-price-val text-white" style="color: #ADFF1C !important;">₹9,999 <span style="font-size:14px; font-weight:500; color:#d8ecea;">/ $129</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> 5-10 Custom Dynamic Pages</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Admin Panel for CMS Control</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Lead Management &amp; Email Alerts</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> On-Page SEO &amp; Schema Markup</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> 60-Day Dedicated Support</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Dynamic%20Website%20Package" target="_blank" rel="noopener" class="header-btn8 w-100 text-center mt-auto" style="background:#ADFF1C; color:#082223 !important; font-weight:700;">
              Choose Dynamic <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- 3. MERN Web App -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="home-pricing-card">
            <h4>MERN Full-Stack</h4>
            <p class="text-muted small">React.js, Node.js &amp; MongoDB for scalable web apps.</p>
            <div class="home-price-val" style="color: #104041;">₹18,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $249</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Single Page React (SPA) / Next.js</li>
              <li><i class="fa-solid fa-check"></i> REST API Backend Architecture</li>
              <li><i class="fa-solid fa-check"></i> JWT Auth &amp; Role-Based Access</li>
              <li><i class="fa-solid fa-check"></i> MongoDB Database Design</li>
              <li><i class="fa-solid fa-check"></i> 90-Day Priority Support</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20MERN%20Full-Stack%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center mt-auto">
              Choose MERN <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- 4. E-Commerce Store -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="home-pricing-card">
            <h4>E-Commerce Store</h4>
            <p class="text-muted small">Complete online store with payment gateway.</p>
            <div class="home-price-val" style="color: #104041;">₹21,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $289</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Product Catalog &amp; Category System</li>
              <li><i class="fa-solid fa-check"></i> Razorpay / Stripe / PayPal Gateway</li>
              <li><i class="fa-solid fa-check"></i> Cart, Checkout &amp; Order Invoices</li>
              <li><i class="fa-solid fa-check"></i> Inventory &amp; Coupon Management</li>
              <li><i class="fa-solid fa-check"></i> 90-Day VIP Support &amp; Training</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Ecommerce%20Store%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center mt-auto">
              Choose E-Commerce <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== LOCAL SEO MATRIX: DELHI NCR & PAN-INDIA TECH HUBS =======-->
  <section class="loc-seo-home-section">
    <div class="container">
      <div class="row text-center mb-4">
        <div class="col-lg-9 mx-auto">
          <span class="badge px-3 py-2 text-uppercase mb-2" style="background:#eaf8e2; color:#104041; font-weight:800; letter-spacing:0.5px;">
            Geographic Coverage
          </span>
          <h2 class="h1 fw-bold text-white">Serving Delhi NCR Micro-Markets &amp; Major Indian Commercial Hubs</h2>
          <p class="text-white-50">
            Available on-site across Delhi NCR (Karampura, Connaught Place, Pitampura, NSP, Noida, Gurgaon) and 100% remote across Mumbai, Bangalore, Pune, Hyderabad, and global markets.
          </p>
        </div>
      </div>

      <div class="delhi-ncr-deep-grid" data-aos="fade-up">
        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> West &amp; Central Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Karampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Connaught Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Punjabi Bagh</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Patel Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Rajouri Garden</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Janakpuri</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Dwarka</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Kirti Nagar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> South &amp; East Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Nehru Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Saket</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Hauz Khas</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Greater Kailash</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Okhla Industrial</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Laxmi Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Preet Vihar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> North &amp; Outer Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Netaji Subhash Place (NSP)</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Pitampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Rohini</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Model Town</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Civil Lines</a>
              <a href="<?= $site ?>web-designer-delhi/" class="locality-chip-link">Wazirpur</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> NCR Corporate Hubs</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-chip-link">Cyber City Gurgaon</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-chip-link">Golf Course Road</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-chip-link">Udyog Vihar</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-chip-link">Noida Sector 62</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-chip-link">Noida Sector 18</a>
              <a href="<?= $site ?>web-developer-noida/" class="locality-chip-link">Indirapuram Ghaziabad</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="locality-chip-link">Faridabad</a>
            </div>
          </div>
        </div>

        <!-- Pan-India Major Cities -->
        <div class="pt-3 mt-4 border-top border-secondary">
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="text-white-50 small fw-bold me-2"><i class="fa-solid fa-globe" style="color:#ADFF1C;"></i> Other Major Indian Tech Hubs:</span>
            <a href="<?= $site ?>web-developer-mumbai/" class="locality-chip-link">Mumbai</a>
            <a href="<?= $site ?>web-developer-bangalore/" class="locality-chip-link">Bangalore</a>
            <a href="<?= $site ?>web-developer-hyderabad/" class="locality-chip-link">Hyderabad</a>
            <a href="<?= $site ?>web-developer-pune/" class="locality-chip-link">Pune</a>
            <a href="<?= $site ?>web-developer-chennai/" class="locality-chip-link">Chennai</a>
            <a href="<?= $site ?>web-developer-kolkata/" class="locality-chip-link">Kolkata</a>
            <a href="<?= $site ?>web-developer-ahmedabad/" class="locality-chip-link">Ahmedabad</a>
            <a href="<?= $site ?>web-developer-surat/" class="locality-chip-link">Surat</a>
            <a href="<?= $site ?>web-developer-jaipur/" class="locality-chip-link">Jaipur</a>
            <a href="<?= $site ?>web-developer-chandigarh/" class="locality-chip-link">Chandigarh</a>
            <a href="<?= $site ?>web-developer-lucknow/" class="locality-chip-link">Lucknow</a>
            <a href="<?= $site ?>web-developer-indore/" class="locality-chip-link">Indore</a>
            <a href="<?= $site ?>web-developer-kochi/" class="locality-chip-link">Kochi</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== FAQ SECTION =======-->
  <section class="sp1 bg-white">
    <div class="container">
      <div class="row mb-5 text-center">
        <div class="col-lg-7 mx-auto heading2">
          <h5>Got Questions?</h5>
          <h2>Frequently Asked Questions</h2>
          <p class="text-muted">Clear answers regarding hiring, technical stack, pricing, and project workflows.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion d-flex flex-column gap-3" id="homeFaqAccordion">
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq1" aria-expanded="true">
                  Why should I hire NikhilWorks instead of a large agency?
                </button>
              </h3>
              <div id="hfaq1" class="accordion-collapse collapse show" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted">
                  You work directly 1-on-1 with a senior developer without slow account managers or bureaucratic bottlenecks. You get <strong>3x faster turnarounds</strong>, <strong>60% lower costs</strong>, and <strong>100% full source code ownership</strong> with zero ongoing vendor lock-in.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq2" aria-expanded="false">
                  How much does a website cost in India?
                </button>
              </h3>
              <div id="hfaq2" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted">
                  We offer transparent fixed pricing: <strong>WordPress websites start at ₹7,999 ($99)</strong>, <strong>Dynamic custom PHP/MySQL websites start at ₹9,999 ($129)</strong>, <strong>MERN full-stack web apps start at ₹18,999 ($249)</strong>, and <strong>E-commerce stores start at ₹21,999 ($289)</strong>.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq3" aria-expanded="false">
                  Can you integrate AI Chatbots and automated workflows into my web app?
                </button>
              </h3>
              <div id="hfaq3" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! We build custom <strong>24/7 AI customer service chatbots</strong> trained on your company knowledge base, integrate <strong>Google Gemini &amp; OpenAI GPT-4o APIs</strong>, setup RAG vector search, and build zero-click automated workflows on n8n and Zapier.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq4" aria-expanded="false">
                  Do you work with international clients in the USA, UK, UAE &amp; Australia?
                </button>
              </h3>
              <div id="hfaq4" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes, we regularly deliver projects for clients in the <strong>USA, UK, UAE (Dubai), Australia, Canada, and Europe</strong>. Communication happens seamlessly via WhatsApp, Zoom, or email, with international payments accepted via Stripe, PayPal, and Bank Wire.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hfaq5" aria-expanded="false">
                  Will my website be mobile-responsive and rank on Google?
                </button>
              </h3>
              <div id="hfaq5" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! Every website is built mobile-first, scores <strong>90+ on Google Core Web Vitals</strong>, and includes comprehensive on-page technical SEO: JSON-LD Schema markup, XML sitemaps, open-graph tags, and keyword-targeted headings.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== TESTIMONIALS SLIDER =======-->
  <div class="testimonial1-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="testimonial-header heading2 text-center">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star2 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star3 keyframe5">
            <h5>Testimonials</h5>
            <h2>What Clients Say On Google Reviews</h2>
            <p>Verified 5-star reviews from business owners, founders, and entrepreneurs.</p>
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
        <div class="col-lg-10 mx-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">Ready to Scale Your Business with a High-Performance Website &amp; AI?</h2>
            <p data-aos="fade-up" data-aos-duration="1000">
              Get an instant quotation, clear technical roadmap, and start development with 100% direct communication today.
            </p>
            <div class="btn-area text-center d-flex gap-3 justify-content-center flex-wrap" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get A Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20ready%20to%20start%20my%20project" target="_blank" rel="noopener" class="header-btn8" style="background:#25D366; color:#fff !important;">
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
