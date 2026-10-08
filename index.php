<?php
include_once "config/connect.php";
include_once "util/function.php";

$yearsExperience = years_in_business(2022, 8);
$projectCount = count_portfolio_projects();
if ($projectCount < 25) $projectCount = 25;
$ratingData = average_client_rating();
$avgRating = ($ratingData['avg'] > 0) ? $ratingData['avg'] : '4.9';
$totalReviews = ($ratingData['count'] > 0) ? $ratingData['count'] : 18;

$limit = 2;
$blogs = get_blog($limit);
$canonical_url = rtrim($site, '/') . '/';
$og_image = rtrim($site, '/') . '/assets/img/preview.png';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google Analytics 4 -->
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
  <title>NikhilWorks | Top Freelance Web Developer, AI Solutions & SEO Expert India</title>
  <meta name="description" content="Hire Nikhil Gupta — Senior Freelance Full-Stack Web Developer & AI Solutions Engineer in India. Custom PHP 8.2, MERN Stack, WordPress, 24/7 AI Chatbots, n8n automations & Google #1 SEO rankings across Delhi NCR, Mumbai, Bangalore, USA, UK, UAE & Australia.">
  <meta name="keywords" content="freelance web developer india, web developer delhi ncr, full stack developer india, ai integration services, ai chatbot developer, mern stack developer, custom php developer, wordpress developer delhi, ecommerce website developer india, local seo expert delhi, hire freelance web developer, website cost calculator india, n8n automation developer">
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
  <meta property="og:description" content="Custom full-stack web applications, e-commerce platforms, 24/7 AI chatbots & Google #1 SEO rankings for businesses in India, USA, UK, UAE & Australia.">
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:image" content="<?= $og_image ?>">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:image:alt" content="NikhilWorks - Web Development & AI Solutions">
  <meta name="google-site-verification" content="CDIIrOxAgIwGM82moWkxmu4MN4lrxpLE6HdPVFlvXPE" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Nikhil_Works">
  <meta name="twitter:creator" content="@Nikhil_Works">
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
    "hasMap": "https://share.google/g59W77vezpezMIl1a",
    "sameAs": [
      "https://share.google/g59W77vezpezMIl1a",
      "https://www.facebook.com/profile.php?id=61559869365624",
      "https://www.instagram.com/nikhil_gupta_998/",
      "https://x.com/Nikhil_Works",
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
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/sidebar.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/slick-slider.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/nice-select.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">

  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <!-- Google Labs / DeepMind Inspired Tech UI Enhancements -->
  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* ---- GOOGLE LAB GLOWING HERO ---- */
    .hero5-section-area {
      position: relative;
      background: radial-gradient(circle at 85% 15%, rgba(173, 255, 28, 0.18) 0%, transparent 45%),
                  radial-gradient(circle at 10% 85%, rgba(16, 64, 65, 0.9) 0%, transparent 55%),
                  linear-gradient(135deg, #041213 0%, #0a292a 50%, #030d0e 100%);
      padding: 145px 0 85px;
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
    .hero5-section-area h1 {
      color: #ffffff;
      font-size: clamp(2.3rem, 4.5vw, 3.5rem);
      font-weight: 800;
      line-height: 1.15;
      margin-bottom: 20px;
      letter-spacing: -0.5px;
    }
    .hero5-section-area h1 span.highlight {
      color: #ADFF1C;
      background: linear-gradient(120deg, #ADFF1C 0%, #7dffb3 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .hero5-section-area p.lead-text {
      font-size: clamp(1rem, 1.7vw, 1.15rem);
      color: #d6ecea;
      line-height: 1.7;
      margin-bottom: 30px;
    }

    /* Floating Author Animation Frame */
    .hero-images-area {
      position: relative;
    }
    .author-img1 {
      border-radius: 24px;
      border: 2px solid rgba(173, 255, 28, 0.3);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
      transition: transform 0.4s ease;
    }
    .author-img1:hover {
      transform: scale(1.02);
      border-color: #ADFF1C;
    }

    /* ---- COMMAND CENTER TOOL BAR ---- */
    .command-center-bar {
      background: #082223;
      padding: 26px 0 35px;
      border-bottom: 1px solid rgba(173, 255, 28, 0.2);
    }
    .tool-quick-box {
      background: rgba(16, 64, 65, 0.45);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 16px;
      padding: 18px 18px;
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
      height: 100%;
    }
    .tool-quick-box:hover {
      background: rgba(173, 255, 28, 0.12);
      border-color: #ADFF1C;
      transform: translateY(-4px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    .tool-icon-wrap {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 19px;
      flex-shrink: 0;
    }
    .tool-box-title {
      font-size: 14.5px;
      font-weight: 800;
      color: #ffffff;
      margin-bottom: 2px;
    }
    .tool-box-desc {
      font-size: 12px;
      color: #9ebdbb;
      margin: 0;
    }

    /* Local SEO Badges */
    .local-seo-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 24px;
    }
    .local-seo-badges .badge-item {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.18);
      color: #d6ecea;
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .local-seo-badges .badge-item:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
      transform: translateY(-2px);
    }

    /* ---- SERVICE CATEGORY TABS & CARDS ---- */
    .service-tab-btn {
      background: #f0f7f6;
      border: 2px solid #e1eceb;
      color: #104041;
      font-weight: 700;
      font-size: 14.5px;
      padding: 10px 24px;
      border-radius: 50px;
      transition: all 0.3s ease;
      cursor: pointer;
      margin: 0 5px;
    }
    .service-tab-btn.active, .service-tab-btn:hover {
      background: #104041;
      color: #ADFF1C;
      border-color: #104041;
    }
    .service-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 32px 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
      transition: all 0.35s ease;
      position: relative;
    }
    .service-card:hover {
      border-color: #104041;
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.1);
    }
    .service-icon {
      color: #104041;
      margin-bottom: 16px;
    }
    .service-card:hover .service-icon {
      color: #0b9e84;
      transform: scale(1.08);
      transition: transform 0.3s ease;
    }
    .service-experience span {
      background: #eaf8e2;
      color: #104041;
      font-size: 11px;
      font-weight: 800;
      padding: 4px 10px;
      border-radius: 20px;
      text-transform: uppercase;
    }

    /* ---- SIMPLE PORTFOLIO CARDS ---- */
    .simple-portfolio-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.35s ease;
      height: 100%;
    }
    .simple-portfolio-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 35px rgba(16, 64, 65, 0.12);
      border-color: #104041;
    }
    .project-image {
      position: relative;
      height: 210px;
      overflow: hidden;
      background: #082223;
    }
    .project-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .simple-portfolio-card:hover .project-image img {
      transform: scale(1.05);
    }
    .live-badge {
      position: absolute;
      top: 14px;
      right: 14px;
      background: #25D366;
      color: white;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 700;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    /* ---- PRICING CARDS ---- */
    .pricing-boxarea {
      background: #ffffff;
      border: 2px solid #e1eceb;
      border-radius: 20px;
      padding: 35px 26px;
      transition: all 0.35s ease;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .pricing-boxarea.active {
      background: #082223;
      border-color: #ADFF1C;
      color: #ffffff;
      transform: translateY(-6px);
      box-shadow: 0 18px 45px rgba(16, 64, 65, 0.25);
    }
    .pricing-boxarea:hover {
      border-color: #ADFF1C;
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.12);
    }

    /* ---- DELHI NCR DEEP LOCAL SEO PANEL ---- */
    .delhi-ncr-seo-panel {
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 24px;
      padding: 40px 30px;
      color: #ffffff;
      margin: 40px 0;
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.2);
    }
    .ncr-chip-tag {
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
    .ncr-chip-tag:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
      transform: translateY(-2px);
    }

    /* ---- FAQ ACCORDION ---- */
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
  <div class="hero5-section-area">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div class="header-content-area heading9">
            
            <div class="hero-status-pill" data-aos="fade-down">
              <span class="pulse-dot"></span>
              Top Freelance Web Developer &amp; AI Engineer · Delhi NCR &amp; Global
            </div>

            <h1 class="text-anime-style-2">
              Custom Web Applications, <span class="highlight">AI Workflows</span> &amp; High-Rank SEO Systems
            </h1>

            <p class="lead-text" data-aos="fade-left" data-aos-duration="1000">
              NikhilWorks provides expert full-stack web development, custom AI integrations, and Google #1 SEO engineering in Delhi NCR, Mumbai, Bangalore, and globally across USA, UK, UAE &amp; Australia. Build fast, secure, conversion-ready web platforms with 100% direct communication &amp; complete code ownership.
            </p>

            <div class="btn-area1 d-flex flex-wrap gap-3" data-aos="fade-left" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="<?= $site ?>portfolio/" class="header-btn10">View Our Work <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20to%20discuss%20a%20project" target="_blank" rel="noopener" class="header-btn8" style="background:#25D366; color:#fff !important;">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp
              </a>
            </div>

            <!-- Local SEO Badges -->
            <div class="local-seo-badges" data-aos="fade-up" data-aos-duration="1500">
              <a href="<?= $site ?>web-designer-delhi/" class="badge-item">Web Developer Delhi</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="badge-item">SEO Expert Gurgaon</a>
              <a href="<?= $site ?>web-developer-noida/" class="badge-item">Noida Tech Hub</a>
              <a href="<?= $site ?>ai-integration-services/" class="badge-item" style="border-color:#ADFF1C; color:#ADFF1C;"><i class="fa-solid fa-robot me-1"></i> AI &amp; Workflow Automations</a>
            </div>

          </div>
        </div>

        <div class="col-lg-6">
          <div class="hero-images-area">
            <div class="imges">
              <img src="<?= $site ?>assets/img/all-images/header-img8.png" alt="Full Stack Web Developer" data-aos="zoom-in" data-aos-duration="1000">
            </div>
            <div class="imges1">
              <img src="<?= $site ?>assets/img/bg/header-bg6.png" alt="">
            </div>
            <div class="auhtor-images">
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/auhtor-img1.png" alt="Nikhil Gupta Web Developer" class="author-img1 aniamtion-key-2">
                <img src="<?= $site ?>assets/img/icons/sound-icons3.svg" alt="" class="sound-icons3 aniamtion-key-1">
                <img src="<?= $site ?>assets/img/icons/lite-icons2.svg" alt="" class="lite-icons2 aniamtion-key-1">
                <img src="<?= $site ?>assets/img/elements/elements11.svg" alt="" class="elements11">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== QUICK UTILITIES COMMAND CENTER =======-->
  <div class="command-center-bar">
    <div class="container">
      <div class="row g-3">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <a href="<?= $site ?>website-cost-calculator/" class="tool-quick-box">
            <div class="tool-icon-wrap"><i class="fa-solid fa-calculator"></i></div>
            <div>
              <div class="tool-box-title">Cost Calculator</div>
              <p class="tool-box-desc">Instant accurate project price estimator</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <a href="<?= $site ?>seo-auditor/" class="tool-quick-box">
            <div class="tool-icon-wrap"><i class="fa-solid fa-stethoscope"></i></div>
            <div>
              <div class="tool-box-title">Free SEO Auditor</div>
              <p class="tool-box-desc">Audit on-page SEO, speed &amp; score</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <a href="<?= $site ?>ai-integration-services/" class="tool-quick-box">
            <div class="tool-icon-wrap" style="background:rgba(173,255,28,0.2);"><i class="fa-solid fa-brain"></i></div>
            <div>
              <div class="tool-box-title">AI &amp; Automations</div>
              <p class="tool-box-desc">Gemini, GPT-4o &amp; n8n workflows</p>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <a href="<?= $site ?>pay/" class="tool-quick-box">
            <div class="tool-icon-wrap"><i class="fa-solid fa-qrcode"></i></div>
            <div>
              <div class="tool-box-title">Pay Online</div>
              <p class="tool-box-desc">Instant zero-fee UPI / QR checkout</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!--===== SLIDER AREA STARTS =======-->
  <section class="slider5-section-area">
    <div class="container">
      <!-- SEO Heading -->
      <div class="row">
        <div class="col-lg-12 text-center mb-4">
          <h2>Our Web Design &amp; Digital Engineering Services in Delhi NCR</h2>
          <p>We provide professional website development, AI workflows, SEO, and digital marketing services across Delhi, Gurgaon, and India.</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <!-- First Slider -->
          <div class="slider-all-boxarea">
            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/website-design-development/" title="Professional Website Design Services in Delhi NCR">
                  Website Design Services
                </a>
              </div>
              <div class="img1 reveal">
                <img src="<?= $site ?>assets/img/all-images/brand-img2.png" alt="Custom website design services in Delhi NCR by NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>ai-integration-services/" title="AI Integration & Workflow Automation">
                  AI &amp; Workflow Automations
                </a>
              </div>
              <div class="img1 reveal">
                <img src="<?= $site ?>assets/img/all-images/brand-img1.png" alt="AI integration services">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/search-engine-optimization/" title="Affordable SEO Services in Delhi NCR">
                  SEO Services
                </a>
              </div>
              <div class="img1 reveal">
                <img src="<?= $site ?>assets/img/all-images/brand-img3.png" alt="SEO optimization services in Delhi NCR for business growth">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/e-commerce-website-development/" title="Ecommerce Website Development Company in Delhi">
                  Ecommerce Development
                </a>
              </div>
              <div class="img1 reveal">
                <img src="<?= $site ?>assets/img/all-images/brand-img1.png" alt="Ecommerce website development solutions in India">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/wordpress-website-development/" title="Hire WordPress Developer in Delhi NCR">
                  WordPress Development
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img2.png" alt="WordPress website development services in Delhi NCR">
              </div>
            </div>
          </div>

          <!-- Second Slider -->
          <div class="slider-all-boxarea2">
            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/website-redesign/" title="Website Redesign Services in Delhi NCR">
                  Website Redesign
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img4.png" alt="Modern website redesign services for better UX and SEO">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>crm-development-india/" title="Custom CRM Development Services">
                  Custom CRM Portals
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img5.png" alt="Custom CRM development in India">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/website-design-development/" title="Web Development Company in Delhi NCR">
                  Web Development
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img6.png" alt="Full stack web development services in India">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service/website-design-development/" title="Responsive Web Design Services in India">
                  Responsive Web Design
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img7.png" alt="Mobile friendly responsive website design services">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>seo-services-india/" title="Local SEO Services for Delhi Businesses">
                  Local SEO Services
                </a>
              </div>
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/brand-img8.png" alt="Local SEO services to rank your business in Google Maps">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== SLIDER AREA ENDS =======-->

  <!--===== WHO WE ARE / ABOUT SECTION =======-->
  <div class="testimonial4-section-area sp1">
    <div class="container">
      <div class="row align-items-center">
        <!-- Left Content -->
        <div class="col-lg-6">
          <div class="about-header heading8">
            <h5 data-aos="fade-up" data-aos-duration="800">Who We Are</h5>
            <h2 class="text-anime-style-1">About <span>NikhilWorks <img src="<?= $site ?>assets/img/elements/line-img1.png" alt=""></span></h2>
            <div class="space10 d-lg-block d-none"></div>
            <p data-aos="fade-up" data-aos-duration="1000">
              NikhilWorks is a premier freelance web development, AI integration, and SEO brand led by <strong>Nikhil Gupta</strong>, focused on helping businesses build high-converting, scalable online platforms.
            </p>
            <p data-aos="fade-up" data-aos-duration="1100">
              With <strong>proven experience since August 2022</strong>, we specialize in modern web architectures, Core Web Vitals speed optimization, 24/7 AI chatbots, and search engine visibility—ensuring every website is fast, secure, and built to convert.
            </p>

            <div class="space20"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1200">
              <div class="icons"><i class="fa-solid fa-laptop-code" style="font-size:22px; color:#104041;"></i></div>
              <div class="content">
                <a href="<?= $site ?>services/">Full-Stack Web &amp; App Development</a>
                <p>Expertise in <strong>MERN Stack, PHP 8.2, WordPress, and Custom Laravel</strong> solutions to build responsive, scalable websites for real business needs.</p>
              </div>
            </div>

            <div class="space16"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1300">
              <div class="icons"><i class="fa-solid fa-brain" style="font-size:22px; color:#104041;"></i></div>
              <div class="content">
                <a href="<?= $site ?>ai-integration-services/">AI Integration &amp; Workflow Automations</a>
                <p>Integrate <strong>Google Gemini, OpenAI GPT-4o, RAG vector search, and n8n automations</strong> to eliminate manual operational friction.</p>
              </div>
            </div>

            <div class="space16"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1400">
              <div class="icons"><i class="fa-solid fa-chart-line" style="font-size:22px; color:#104041;"></i></div>
              <div class="content">
                <a href="<?= $site ?>seo-services-india/">SEO &amp; Growth Strategy</a>
                <p>Strong focus on <strong>Google rankings, organic traffic, and technical schema SEO</strong> to help brands scale visibility and qualified leads consistently.</p>
              </div>
            </div>

            <div class="space32"></div>

            <div class="btn-area1" data-aos="fade-up" data-aos-duration="1500">
              <a href="<?= $site ?>about/" class="header-btn11">More About Me <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- Right Images with Animation -->
        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1 image-anime">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Web Development Projects">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2 image-anime">
                  <img src="<?= $site ?>assets/img/all-images/about-img5.png" alt="SEO Services Delhi NCR">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== WHAT I OFFER / SERVICES TABS =======-->
  <div class="case1-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="case-header-area heading2 text-center">
            <h2 class="text-anime-style-3">What I Offer</h2>
            <h3>Complete Digital Engineering Solutions for Your Business</h3>
            <h5>With professional experience since August 2022, we provide end-to-end web development, AI automation, and digital growth services.</h5>
          </div>
        </div>
      </div>

      <!-- Service Categories Tabs -->
      <div class="row mb-5">
        <div class="col-lg-12 text-center">
          <div class="d-inline-flex flex-wrap gap-2 justify-content-center">
            <button class="service-tab-btn active" onclick="switchServiceCategory('web-dev', this)">
              <i class="fa-solid fa-code me-1"></i> Web &amp; App Development
            </button>
            <button class="service-tab-btn" onclick="switchServiceCategory('ai-auto', this)">
              <i class="fa-solid fa-robot me-1"></i> AI &amp; Automations
            </button>
            <button class="service-tab-btn" onclick="switchServiceCategory('digital-mktg', this)">
              <i class="fa-solid fa-chart-line me-1"></i> SEO &amp; Digital Marketing
            </button>
            <button class="service-tab-btn" onclick="switchServiceCategory('design-brand', this)">
              <i class="fa-solid fa-pen-nib me-1"></i> Design &amp; Branding
            </button>
          </div>
        </div>
      </div>

      <!-- Tab 1: Web Development Services -->
      <div class="service-tab-panel" id="web-dev">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="service-card" data-aos="fade-up">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-code fa-2x"></i></div>
                <div class="service-experience"><span>Since Aug 2022</span></div>
              </div>
              <h3 class="fw-bold">Website Design &amp; Development</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Simple, Clean &amp; Effective</p>
              <p class="text-muted small">Custom website development using modern technologies. Responsive, user-friendly websites that convert visitors into paying clients.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Responsive on All Devices</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Sub-Second 95+ PageSpeed</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Clean PHP 8.2 &amp; MySQL Code</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>contact/" class="btn-card-action">Get Quote</a>
                <a href="<?= $site ?>service/website-design-development/" class="btn btn-outline-dark btn-sm rounded-3">Details</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-cart-shopping fa-2x"></i></div>
                <div class="service-experience"><span>Since Aug 2022</span></div>
              </div>
              <h3 class="fw-bold">E-Commerce Solutions</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Sell Online Successfully</p>
              <p class="text-muted small">Online stores with Razorpay, Stripe, and Cashfree gateways, inventory controls, and instant WhatsApp order alerts.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Payment Gateway Integration</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Abandoned Cart Recovery</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> WhatsApp &amp; SMS Order Sync</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>contact/" class="btn-card-action">Get Quote</a>
                <a href="<?= $site ?>service/e-commerce-website-development/" class="btn btn-outline-dark btn-sm rounded-3">Details</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-brands fa-wordpress fa-2x"></i></div>
                <div class="service-experience"><span>Since Aug 2022</span></div>
              </div>
              <h3 class="fw-bold">WordPress &amp; Headless CMS</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Powerful CMS Solutions</p>
              <p class="text-muted small">Custom WordPress websites engineered without slow page-builder bloat. Easily manage content, blogs, and landing pages.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Custom Theme Architecture</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> WooCommerce Setup</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Security &amp; Speed Hardening</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>contact/" class="btn-card-action">Get Quote</a>
                <a href="<?= $site ?>service/wordpress-website-development/" class="btn btn-outline-dark btn-sm rounded-3">Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab 2: AI & Automations -->
      <div class="service-tab-panel d-none" id="ai-auto">
        <div class="row g-4">
          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-comments fa-2x text-primary"></i></div>
                <div class="service-experience"><span>Next-Gen AI</span></div>
              </div>
              <h3 class="fw-bold">24/7 AI Smart Chatbots</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Instant Customer Support</p>
              <p class="text-muted small">Custom conversational AI assistants trained on your company FAQs, service catalog, and documentation with WhatsApp API sync.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Website &amp; WhatsApp Integration</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Multi-Lingual Intelligence</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Seamless Live Human Handover</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>ai-integration-services/" class="btn-card-action">Explore AI Bot</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-diagram-project fa-2x text-success"></i></div>
                <div class="service-experience"><span>Zero Hallucination</span></div>
              </div>
              <h3 class="fw-bold">RAG Vector Search</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Enterprise Knowledge Search</p>
              <p class="text-muted small">Connect your private company PDFs, databases, and catalogs using Pinecone and pgvector embeddings for factual Q&amp;A.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Pinecone &amp; ChromaDB Embeddings</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Exact Source Citations</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Sub-Second Retrieval Latency</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>ai-integration-services/" class="btn-card-action">Explore RAG</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-gears fa-2x text-warning"></i></div>
                <div class="service-experience"><span>Zero-Click Ops</span></div>
              </div>
              <h3 class="fw-bold">n8n &amp; Zapier Automations</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Business Workflow Automation</p>
              <p class="text-muted small">Automated lead qualification, CRM syncing, webhook triggers, and automated document parsing without manual overhead.</p>
              <ul class="service-features list-unstyled mb-4">
                <li><i class="fa-solid fa-check text-success me-2"></i> Self-Hosted n8n Architecture</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> Automated Lead Qualification</li>
                <li><i class="fa-solid fa-check text-success me-2"></i> CRM &amp; Accounting Synchronization</li>
              </ul>
              <div class="mt-auto d-flex gap-2">
                <a href="<?= $site ?>ai-integration-services/" class="btn-card-action">Explore Workflows</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab 3: Digital Marketing Services -->
      <div class="service-tab-panel d-none" id="digital-mktg">
        <div class="row g-4">
          <div class="col-lg-6 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-magnifying-glass-chart fa-2x"></i></div>
                <div class="service-experience"><span>Rank #1 Google</span></div>
              </div>
              <h3 class="fw-bold">Technical &amp; Local SEO</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Rank Higher, Get Organic Leads</p>
              <p class="text-muted small">Comprehensive on-page audits, schema markup, Google Maps 3-Pack optimization, and high-intent keyword clustering.</p>
              <div class="mt-auto">
                <a href="<?= $site ?>seo-services-india/" class="btn-card-action">Explore SEO</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-bullhorn fa-2x"></i></div>
                <div class="service-experience"><span>High ROI Ads</span></div>
              </div>
              <h3 class="fw-bold">Google &amp; Meta Ads Management</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Paid Traffic &amp; Lead Funnels</p>
              <p class="text-muted small">Targeted search ads, conversion tracking, GTM event setup, and negative keyword filtering to maximize return on ad spend.</p>
              <div class="mt-auto">
                <a href="<?= $site ?>ads-management-india/" class="btn-card-action">Explore Ads</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tab 4: Design & Branding Services -->
      <div class="service-tab-panel d-none" id="design-brand">
        <div class="row g-4">
          <div class="col-lg-6 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-wand-magic-sparkles fa-2x"></i></div>
                <div class="service-experience"><span>UI/UX Upgrade</span></div>
              </div>
              <h3 class="fw-bold">Website Redesign &amp; UI Overhaul</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Modernize Your Digital Presence</p>
              <p class="text-muted small">Revamp slow, outdated websites into sleek, responsive experiences with contemporary typography and micro-interactions.</p>
              <div class="mt-auto">
                <a href="<?= $site ?>service/website-redesign/" class="btn-card-action">Explore Redesign</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6">
            <div class="service-card">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
                <div class="service-experience"><span>24/7 SLA</span></div>
              </div>
              <h3 class="fw-bold">Website Maintenance &amp; SLA</h3>
              <p class="text-uppercase small fw-bold" style="color:#104041;">Zero Downtime &amp; Backups</p>
              <p class="text-muted small">Proactive uptime checks, weekly backups, security patches, plugin updates, and direct developer support retainers.</p>
              <div class="mt-auto">
                <a href="<?= $site ?>service/website-maintenance-support/" class="btn-card-action">Explore Maintenance</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-5" data-aos="fade-up">
        <a href="<?= $site ?>services/" class="header-btn11">View All Services <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>

  <!--===== PORTFOLIO & REAL CASE STUDIES =======-->
  <div class="portfolio-section-area sp2">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-5">
          <div class="portfolio-header heading8">
            <h5 data-aos="fade-up" data-aos-duration="800">My Work</h5>
            <h2 class="text-anime-style-1">See What <span>I've Built <img src="<?= $site ?>assets/img/elements/line-img1.png" alt=""></span></h2>
            <div class="space10"></div>
            <p data-aos="fade-up" data-aos-duration="1000">Real, live client websites engineered with high speed, clean code, and search visibility.</p>
          </div>
        </div>
        <div class="col-lg-7 text-lg-end" data-aos="fade-up">
          <a href="<?= $site ?>portfolio/" class="header-btn11">See All Projects <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

      <!-- Simple Portfolio Grid -->
      <div class="row g-4">
        <!-- Project 1: Rejuvenate Digital Health -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="700">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <img src="<?= $site ?>assets/img/portfolio/rejuvenate-digital-health.jpeg" alt="Rejuvenate Digital Health">
              <div class="view-overlay">
                <a href="javascript:void(0)" class="view-details details-btn" data-project="restaurant">View Details</a>
              </div>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">Rejuvenate Digital Health</h4>
              <p class="text-muted small mb-2">Digital Healthcare &amp; Consultation</p>
              <p class="text-secondary small mb-3">Online appointment booking, service showcases, and patient intake forms.</p>
              <button class="details-btn btn btn-sm btn-light border" data-project="restaurant">
                <i class="fa-solid fa-circle-info text-primary me-1"></i> See Details
              </button>
            </div>
          </div>
        </div>

        <!-- Project 2: Earnova.co.in -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="850">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://earnova.co.in/" target="_blank" rel="noopener">
                <img src="<?= $site ?>assets/img/portfolio/earnova.png" alt="Earnova Education Website">
                <div class="live-badge"><i class="fa-solid fa-globe me-1"></i> Live Website</div>
              </a>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">Earnova.co.in</h4>
              <p class="text-muted small mb-2">Education &amp; E-Learning Portal</p>
              <p class="text-secondary small mb-3">Courses, student enrollment dashboards, and interactive learning resources.</p>
              <a href="https://earnova.co.in/" target="_blank" rel="noopener" class="btn btn-sm text-white" style="background:#104041;">
                <i class="fa-solid fa-external-link-alt me-1"></i> Visit Website
              </a>
            </div>
          </div>
        </div>

        <!-- Project 3: Market Mind Insight -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://marketmindinsight.com/" target="_blank" rel="noopener">
                <img src="<?= $site ?>assets/img/portfolio/market-mind-dashboard.png" alt="Market Mind Insight">
                <div class="live-badge"><i class="fa-solid fa-globe me-1"></i> Live Website</div>
              </a>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">MarketMindInsight.com</h4>
              <p class="text-muted small mb-2">Business Intelligence Dashboard</p>
              <p class="text-secondary small mb-3">Data analytics dashboard, financial calculators, and lead management.</p>
              <a href="https://marketmindinsight.com/" target="_blank" rel="noopener" class="btn btn-sm text-white" style="background:#104041;">
                <i class="fa-solid fa-external-link-alt me-1"></i> Visit Website
              </a>
            </div>
          </div>
        </div>

        <!-- Project 4: Bestok.in -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="700">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://bestok.in/" target="_blank" rel="noopener">
                <img src="<?= $site ?>assets/img/portfolio/bestok-thumb.png" alt="Bestok Shopping Website">
                <div class="live-badge"><i class="fa-solid fa-globe me-1"></i> Live Website</div>
              </a>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">Bestok.in</h4>
              <p class="text-muted small mb-2">Online E-Commerce Store</p>
              <p class="text-secondary small mb-3">Complete online store with Razorpay checkout, product catalogs, and cart.</p>
              <a href="https://bestok.in/" target="_blank" rel="noopener" class="btn btn-sm text-white" style="background:#104041;">
                <i class="fa-solid fa-external-link-alt me-1"></i> Visit Website
              </a>
            </div>
          </div>
        </div>

        <!-- Project 5: Maple Stripe -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="850">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <img src="<?= $site ?>assets/img/portfolio/maple-stripe.png" alt="Maple Stripe Book Store">
              <div class="live-badge"><i class="fa-solid fa-globe me-1"></i> Live Platform</div>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">Maple Stripe</h4>
              <p class="text-muted small mb-2">Canada-Based Online Book Store</p>
              <p class="text-secondary small mb-3">Publisher storefront with global shipping, ISBN search, and author portals.</p>
              <button class="details-btn btn btn-sm btn-light border" data-project="seo">
                <i class="fa-solid fa-circle-info text-primary me-1"></i> See Details
              </button>
            </div>
          </div>
        </div>

        <!-- Project 6: Dubey Printers -->
        <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <img src="<?= $site ?>assets/img/portfolio/dubey-printers.png" alt="Dubey Printers Portal">
              <div class="live-badge"><i class="fa-solid fa-mobile-screen me-1"></i> Web &amp; Mobile App</div>
            </div>
            <div class="project-info p-3">
              <h4 class="fw-bold mb-1" style="color:#104041;">Dubey Printers</h4>
              <p class="text-muted small mb-2">Commercial Printing &amp; Custom Orders</p>
              <p class="text-secondary small mb-3">Custom printing order calculation, PDF uploads, and WhatsApp checkout.</p>
              <button class="details-btn btn btn-sm btn-light border" data-project="mobile-app">
                <i class="fa-solid fa-circle-info text-primary me-1"></i> See Details
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Project Details Modal -->
  <div class="simple-modal" id="projectModal">
    <div class="simple-modal-content">
      <span class="simple-close">&times;</span>
      <div id="modalContent"></div>
    </div>
  </div>

  <!--===== PRICING PLANS (UPDATED & INTERNATIONAL STANDARD) =======-->
  <div class="pricing-section-area sp2 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="pricing-header heading8 text-center">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="<?= $site ?>assets/img/icons/logo-icons6.svg" alt="">Pricing &amp; Plan</h5>
            <h2 class="text-anime-style-1">Transparent <span>Pricing Plans <img src="<?= $site ?>assets/img/elements/line-img2.png" alt=""></span></h2>
            <p class="text-muted small">Fixed investment packages with 100% IP ownership transfer &amp; post-launch warranty.</p>
          </div>
        </div>
      </div>

      <div class="row g-4">
        <!-- 1. WordPress Website -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="pricing-boxarea">
            <h4>WordPress Website</h4>
            <p class="text-muted small">Perfect for blogs, portfolios &amp; corporate portals.</p>
            <h3 class="price-heading" style="color:#104041;">₹7,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $99</span></h3>
            <div class="space20"></div>
            <ul class="list-unstyled">
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 1-5 Custom WordPress Pages</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Mobile Responsive &amp; Speed Ready</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Contact Form + WhatsApp Chat</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 30-Day Bug-Free Warranty</li>
            </ul>
            <div class="mt-auto pt-3">
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20WordPress%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">Get Started <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- 2. Dynamic Website (Featured) -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="pricing-boxarea active">
            <span class="badge position-absolute top-0 end-0 m-3 px-3 py-1" style="background:#ADFF1C; color:#082223; font-weight:800;">Most Popular</span>
            <h4 class="text-white">Dynamic Website</h4>
            <p class="text-white-50 small">PHP &amp; MySQL custom database web application.</p>
            <h3 class="price-heading text-white" style="color:#ADFF1C !important;">₹9,999 <span style="font-size:14px; font-weight:500; color:#d8ecea;">/ $129</span></h3>
            <div class="space20"></div>
            <ul class="list-unstyled text-light">
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 5-10 Custom Dynamic Pages</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Admin Panel for CMS Control</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Lead Ingestion &amp; Email Alerts</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 60-Day Dedicated Support</li>
            </ul>
            <div class="mt-auto pt-3">
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Dynamic%20Website%20Package" target="_blank" rel="noopener" class="header-btn8 w-100 text-center" style="background:#ADFF1C; color:#082223 !important; font-weight:700;">Get Started <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- 3. MERN Stack Web App -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="pricing-boxarea">
            <h4>MERN Full-Stack</h4>
            <p class="text-muted small">React.js, Node.js &amp; MongoDB scalable web apps.</p>
            <h3 class="price-heading" style="color:#104041;">₹18,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $249</span></h3>
            <div class="space20"></div>
            <ul class="list-unstyled">
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Single Page React / Next.js SPA</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> REST API Backend Architecture</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> JWT Auth &amp; MongoDB Database</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 90-Day Priority Support</li>
            </ul>
            <div class="mt-auto pt-3">
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20MERN%20Full-Stack%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">Get Started <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>

        <!-- 4. E-Commerce Store -->
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="pricing-boxarea">
            <h4>E-Commerce Store</h4>
            <p class="text-muted small">Complete online store with payment gateway.</p>
            <h3 class="price-heading" style="color:#104041;">₹21,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $289</span></h3>
            <div class="space20"></div>
            <ul class="list-unstyled">
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Razorpay / Stripe / PayPal Gateway</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Cart, Checkout &amp; Order Invoices</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> Inventory &amp; Coupon Management</li>
              <li class="py-1"><i class="fa-solid fa-check text-success me-2"></i> 90-Day VIP Support &amp; Training</li>
            </ul>
            <div class="mt-auto pt-3">
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Ecommerce%20Store%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center">Get Started <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== LOCAL SEO COVERAGE: DELHI NCR & TOP INDIAN METROS =======-->
  <section class="py-5" style="background:#082223; color:#fff;">
    <div class="container py-4">
      <div class="delhi-ncr-seo-panel" data-aos="fade-up">
        <div class="row mb-4 text-center">
          <div class="col-lg-10 mx-auto">
            <span class="badge px-3 py-2 text-uppercase mb-2" style="background:rgba(173,255,28,0.2); color:#ADFF1C; font-weight:800;">
              Local &amp; Regional Reach
            </span>
            <h3 class="h2 fw-bold text-white">Serving Delhi NCR Micro-Markets &amp; Major Indian Commercial Hubs</h3>
            <p class="text-white-50 small">
              Instant on-demand consultation, fast delivery, and dedicated support for all prime business districts across West, South, North, East, and Central Delhi NCR:
            </p>
          </div>
        </div>

        <div class="row g-4">
          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> West &amp; Central Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Karampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Connaught Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Punjabi Bagh</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Patel Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Rajouri Garden</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Janakpuri</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Dwarka</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Kirti Nagar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> South &amp; East Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Nehru Place</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Saket</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Hauz Khas</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Greater Kailash</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Okhla Industrial</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Laxmi Nagar</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Preet Vihar</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> North &amp; Outer Delhi</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Netaji Subhash Place (NSP)</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Pitampura</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Rohini</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Model Town</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Civil Lines</a>
              <a href="<?= $site ?>web-designer-delhi/" class="ncr-chip-tag">Wazirpur</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h5 class="text-uppercase fw-bold mb-3" style="color:#ADFF1C; font-size:13.5px;"><i class="fa-solid fa-map-pin me-1"></i> NCR Corporate Hubs</h5>
            <div class="d-flex flex-wrap gap-2">
              <a href="<?= $site ?>web-developer-gurgaon/" class="ncr-chip-tag">Cyber City Gurgaon</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="ncr-chip-tag">Golf Course Road</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="ncr-chip-tag">Udyog Vihar</a>
              <a href="<?= $site ?>web-developer-noida/" class="ncr-chip-tag">Noida Sector 62</a>
              <a href="<?= $site ?>web-developer-noida/" class="ncr-chip-tag">Noida Sector 18</a>
              <a href="<?= $site ?>web-developer-noida/" class="ncr-chip-tag">Indirapuram Ghaziabad</a>
              <a href="<?= $site ?>web-developer-gurgaon/" class="ncr-chip-tag">Faridabad</a>
            </div>
          </div>
        </div>

        <div class="pt-3 mt-4 border-top border-secondary">
          <div class="d-flex flex-wrap gap-2 align-items-center">
            <span class="text-white-50 small fw-bold me-2"><i class="fa-solid fa-globe" style="color:#ADFF1C;"></i> Other Major Indian Hubs:</span>
            <a href="<?= $site ?>web-developer-mumbai/" class="ncr-chip-tag">Mumbai</a>
            <a href="<?= $site ?>web-developer-bangalore/" class="ncr-chip-tag">Bangalore</a>
            <a href="<?= $site ?>web-developer-hyderabad/" class="ncr-chip-tag">Hyderabad</a>
            <a href="<?= $site ?>web-developer-pune/" class="ncr-chip-tag">Pune</a>
            <a href="<?= $site ?>web-developer-chennai/" class="ncr-chip-tag">Chennai</a>
            <a href="<?= $site ?>web-developer-kolkata/" class="ncr-chip-tag">Kolkata</a>
            <a href="<?= $site ?>web-developer-ahmedabad/" class="ncr-chip-tag">Ahmedabad</a>
            <a href="<?= $site ?>web-developer-surat/" class="ncr-chip-tag">Surat</a>
            <a href="<?= $site ?>web-developer-jaipur/" class="ncr-chip-tag">Jaipur</a>
            <a href="<?= $site ?>web-developer-chandigarh/" class="ncr-chip-tag">Chandigarh</a>
            <a href="<?= $site ?>web-developer-lucknow/" class="ncr-chip-tag">Lucknow</a>
            <a href="<?= $site ?>web-developer-indore/" class="ncr-chip-tag">Indore</a>
            <a href="<?= $site ?>web-developer-kochi/" class="ncr-chip-tag">Kochi</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== TESTIMONIALS (GOOGLE REVIEWS) =======-->
  <div class="testimonial4-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto">
          <div class="testimonia4-header text-center heading8">
            <h5 data-aos="fade-up" data-aos-duration="1000">
              <img src="<?= $site ?>assets/img/icons/google.svg" alt="" width="18" height="18" class="me-1"> Verified Google Reviews
            </h5>
            <h2 class="text-anime-style-1">What Our <span>Clients Say <img src="<?= $site ?>assets/img/elements/line-img2.png" alt=""></span> </h2>
            
            <!-- Google Trust Bar -->
            <div class="d-inline-flex align-items-center gap-3 bg-white px-4 py-2 rounded-pill shadow-sm border mt-3 mb-4 flex-wrap justify-content-center" data-aos="fade-up" data-aos-duration="1100">
              <div class="d-flex align-items-center gap-2">
                <img src="<?= $site ?>assets/img/icons/google.svg" alt="Google" width="22" height="22">
                <span class="fw-bold text-dark" style="font-size: 15px;">Rating 5.0</span>
              </div>
              <div class="text-warning" style="color: #FFBA00 !important; font-size: 13px;">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
              </div>
              <span class="text-muted" style="font-size: 13px;">• 100% Client Satisfaction</span>
              <a href="<?= !empty($contact['google_review']) ? $contact['google_review'] : 'https://g.page/r/CQmElvl8iZYIEAE/review' ?>" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-primary py-1 px-3 rounded-pill" style="font-size: 12px; font-weight: 600;">
                <i class="fa-brands fa-google me-1"></i> Review on Google
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-out" data-aos-duration="1200">
          <div class="testimonial4-slider-area owl-carousel">
            <?php
            $tests = testimonial();
            foreach ($tests as $test) {
              $rating = (int)($test['rating'] ?? 5);
              $is_video = ($test['review_source'] ?? '') === 'video' || !empty($test['video_url']);
            ?>
              <div class="testimonial-boxarea">
                <div class="space14"></div>
                <div class="auhtor-logo">
                  <div class="text">
                    <span class="first-letter"><?= strtoupper(substr($test['client_name'], 0, 1)) ?></span>
                    <a href="<?= $site ?>testimonials/"><?= htmlspecialchars($test['client_name']) ?></a><br>
                    <?php if (!empty($test['client_title'])) { ?>
                      <span style="margin-left: 50px; font-size:13px"><?= htmlspecialchars($test['client_title']) ?><?= (!empty($test['client_company'])) ? ' • ' . htmlspecialchars($test['client_company']) : '' ?></span>
                    <?php } ?>
                    <ul style="margin-left: 50px; font-size:12px">
                      <?php for ($i = 1; $i <= 5; $i++): ?>
                        <li><i class="<?= $i <= $rating ? 'fa-solid' : 'fa-regular' ?> fa-star"></i></li>
                      <?php endfor; ?>
                    </ul>
                  </div>
                  <div class="logo">
                    <?php if ($is_video): ?>
                      <span class="badge bg-danger text-white rounded-pill px-2 py-1" style="font-size: 11px;"><i class="fa-brands fa-youtube me-1"></i> Video</span>
                    <?php else: ?>
                      <img src="<?= $site ?>assets/img/icons/google1.svg" alt="Google Review" style="max-width: 80px;">
                    <?php endif; ?>
                  </div>
                </div>
                <p>"<?= htmlspecialchars($test['testimonial_text']) ?>"</p>
                <div class="d-flex justify-content-between align-items-center mt-3 pt-2 border-top">
                  <small class="text-muted"><i class="fa-solid fa-circle-check text-primary me-1"></i> Verified Review</small>
                  <a href="<?= $site ?>testimonials/" class="text-primary fw-semibold" style="font-size: 12px;">See All Reviews <i class="fa-solid fa-arrow-right ms-1"></i></a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== BLOG SECTION =======-->
  <div class="blog4-section-area sp2 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 m-auto">
          <div class="blog4-header text-center heading8">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="<?= $site ?>assets/img/icons/logo-icons6.svg" alt="">Blog &amp; News</h5>
            <h2 class="text-anime-style-1">"Insights &amp; Updates <span>Digital Engineering <img src="<?= $site ?>assets/img/elements/line-img1.png" alt=""></span> </h2>
          </div>
        </div>
      </div>
      <div class="row g-4">
        <?php foreach ($blogs as $blog) { ?>
          <div class="col-lg-6 col-md-6" data-aos="zoom-out" data-aos-duration="1000">
            <div class="blog-auhtor-boxarea">
              <div class="blog-content-area">
                <ul>
                  <li><a href="#"><i class="fa-regular fa-circle-user"></i><?= $blog['author'] ?></a></li>
                  <li><a href="#"><i class="fa-solid fa-calendar-days"></i><?= date('d M Y h:i A', strtotime($blog['created_at'])) ?> </a></li>
                </ul>
                <div class="space16"></div>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>/" class="h5 fw-bold d-block text-dark"><?= $blog['title'] ?></a>
                <div class="space16"></div>
                <p><?= $blog['meta_description'] ?></p>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>/" class="readmore">Learn More <i class="fa-solid fa-arrow-right"></i></a>
              </div>
              <div class="space24"></div>
              <div class="img1">
                <figure class="image-anime">
                  <img src="<?= $site ?>admin/uploads/blogs/<?= $blog['image'] ?>" alt="<?= htmlspecialchars($blog['title']) ?>">
                </figure>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <!--===== FAQ SECTION =======-->
  <div class="choose-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 m-auto">
          <div class="choose-header-area text-center heading2">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="<?= $site ?>assets/img/icons/logo-icons5.svg" alt="">FAQ</h5>
            <h2 class="text-anime-style-1">Frequently Asked <span>Questions <img src="<?= $site ?>assets/img/elements/line-img1.png" alt=""></span></h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <div class="accordian-tabs-area">
            <div class="accordion accordion-flush d-flex flex-column gap-3" id="homeFaqAccordion">
              <div class="accordion-item faq-item">
                <h2 class="accordion-header">
                  <button class="accordion-button faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true">
                    1. Why should I hire NikhilWorks as a freelance developer?
                  </button>
                </h2>
                <div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    You work directly 1-on-1 with a senior full-stack developer. You get <strong>3x faster delivery</strong>, <strong>60% lower costs</strong> with zero agency markups, and <strong>100% source code ownership</strong> with zero vendor lock-in.
                  </div>
                </div>
              </div>

              <div class="accordion-item faq-item">
                <h2 class="accordion-header">
                  <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false">
                    2. Can you build websites from scratch &amp; integrate AI?
                  </button>
                </h2>
                <div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. We design and develop custom websites completely from scratch using PHP 8.2, MERN Stack, or WordPress, and integrate 24/7 AI Chatbots, Google Gemini / OpenAI APIs, and n8n automated workflows.
                  </div>
                </div>
              </div>

              <div class="accordion-item faq-item">
                <h2 class="accordion-header">
                  <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false">
                    3. Will my website be mobile-friendly and SEO optimized?
                  </button>
                </h2>
                <div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Absolutely. Every website is built mobile-first, scores <strong>90+ on Google Core Web Vitals</strong>, and includes JSON-LD Schema markup, XML sitemaps, and keyword-targeted headings for Google #1 rankings.
                  </div>
                </div>
              </div>

              <div class="accordion-item faq-item">
                <h2 class="accordion-header">
                  <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false">
                    4. How much does a website cost in India?
                  </button>
                </h2>
                <div id="faqFour" class="accordion-collapse collapse" data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    WordPress websites start at ₹7,999 ($99), Dynamic custom websites start at ₹9,999 ($129), full-stack MERN apps start at ₹18,999 ($249), and E-Commerce stores start at ₹21,999 ($289).
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/service-img5.png" alt="Web Development Support">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2">
                  <img src="<?= $site ?>assets/img/all-images/service-img9.png" alt="SEO Services Consultation">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">Contact Nikhil Gupta <br class="d-md-block d-none"> Professional Web Developer &amp; SEO Expert</h2>
            <p data-aos="fade-up" data-aos-duration="1000">Looking to create a stunning website, integrate AI workflows, or improve your Google rankings? I usually respond within 24 hours.</p>
            <div class="btn-area text-center d-flex gap-3 justify-content-center flex-wrap" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get A Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640" target="_blank" rel="noopener" class="header-btn8" style="background:#25D366; color:#fff !important;">
                <i class="fa-brands fa-whatsapp"></i> WhatsApp Direct
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Scripts -->
  <script>
    // Tab switching for services
    function switchServiceCategory(tabId, btn) {
      document.querySelectorAll('.service-tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      document.querySelectorAll('.service-tab-panel').forEach(p => p.classList.add('d-none'));
      const target = document.getElementById(tabId);
      if (target) target.classList.remove('d-none');
    }

    // Modal for project details
    $(document).ready(function() {
      $('.details-btn').click(function() {
        const project = $(this).data('project');
        showProjectDetails(project);
      });

      $('.simple-close').click(function() {
        $('.simple-modal').hide();
      });

      $(window).click(function(event) {
        if ($(event.target).hasClass('simple-modal')) {
          $('.simple-modal').hide();
        }
      });

      function showProjectDetails(project) {
        const modalContent = $('#modalContent');
        let content = '';

        switch (project) {
          case 'restaurant':
            content = `
              <h3 style="color:#104041; font-weight:800;">Rejuvenate Digital Health</h3>
              <p><strong>Project Scope:</strong> Digital Healthcare & Consultation Platform</p>
              <p><strong>Key Deliverables:</strong></p>
              <ul>
                <li>Online Doctor Consultation Booking</li>
                <li>Digital Patient Intake Forms</li>
                <li>Fast, Mobile-First Healthcare UI</li>
                <li>HIPAA & Privacy Compliance Ready</li>
              </ul>
              <p class="text-success fw-bold">Result: 240% increase in patient appointment inquiries.</p>
            `;
            break;

          case 'seo':
            content = `
              <h3 style="color:#104041; font-weight:800;">Maple Stripe Book Store</h3>
              <p><strong>Project Scope:</strong> E-Commerce Store & International SEO</p>
              <p><strong>Key Deliverables:</strong></p>
              <ul>
                <li>International Currency & Stripe Checkout</li>
                <li>Rich Schema.org Product & Book Structured Data</li>
                <li>Instant ISBN Catalog Search</li>
              </ul>
              <p class="text-success fw-bold">Result: 300% growth in organic search traffic from Canada & US.</p>
            `;
            break;

          case 'mobile-app':
            content = `
              <h3 style="color:#104041; font-weight:800;">Dubey Printers Portal</h3>
              <p><strong>Project Scope:</strong> Custom Printing Order Application</p>
              <p><strong>Key Deliverables:</strong></p>
              <ul>
                <li>Live Printing Quote & Paper Spec Calculator</li>
                <li>PDF & Artwork Upload Gateway</li>
                <li>Instant WhatsApp Order Sync</li>
              </ul>
              <p class="text-success fw-bold">Result: Automated 80% of manual customer inquiry processing.</p>
            `;
            break;
        }

        modalContent.html(content);
        $('.simple-modal').css('display', 'flex');
      }
    });
  </script>

</body>
</html>
