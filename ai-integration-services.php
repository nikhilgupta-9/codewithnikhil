<?php
include_once "config/connect.php";
include_once "util/function.php";

$yearsExperience = years_in_business(2022, 8);
$projectCount = count_portfolio_projects();
$canonical_url = rtrim($site, '/') . '/ai-integration-services/';
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary SEO Meta Tags -->
  <title>AI Integration & Workflow Automation Services | Website & App AI Solutions — NikhilWorks</title>
  <meta name="description" content="Integrate custom AI into your website, web apps, and business workflows. Expert Google Gemini API, OpenAI GPT-4o, Claude 3.5, RAG pipelines, 24/7 AI Chatbots, WhatsApp bots, and n8n/Zapier automations by Nikhil Gupta.">
  <meta name="keywords" content="ai integration services, ai chatbot website integration, google gemini api integration, openai gpt-4o integration, ai workflow automation, n8n automation services, rag pipeline development, ai web developer india, custom ai agent development, whatsapp ai bot, ai app development delhi ncr">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Nikhil Gupta - NikhilWorks">

  <!-- Geo Meta Tags -->
  <meta name="geo.region" content="IN-DL">
  <meta name="geo.placename" content="Delhi">
  <meta name="geo.position" content="28.6139;77.2090">
  <meta name="ICBM" content="28.6139, 77.2090">

  <!-- Canonical & Alternate Links -->
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
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:title" content="AI Integration & Workflow Automation Services | NikhilWorks">
  <meta property="og:description" content="Supercharge your website and business with Google Gemini, OpenAI, RAG systems, AI Chatbots, and automated n8n workflows.">
  <meta property="og:image" content="<?= $og_image ?>">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:locale" content="en_US">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="AI Integration & Workflow Automation Services | NikhilWorks">
  <meta name="twitter:description" content="Custom AI solutions: Gemini API, ChatGPT, RAG Search, WhatsApp AI Bots, and n8n Automations for high-growth businesses.">
  <meta name="twitter:image" content="<?= $og_image ?>">
  <meta name="twitter:site" content="@Nikhil_Works">
  <meta name="twitter:creator" content="@Nikhil_Works">

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= rtrim($site, '/') ?>/"},
      {"@type": "ListItem", "position": 2, "name": "Services", "item": "<?= rtrim($site, '/') ?>/services/"},
      {"@type": "ListItem", "position": 3, "name": "AI Integration & Workflow Automation", "item": "<?= $canonical_url ?>"}
    ]
  }
  </script>

  <!-- Schema: Service + OfferCatalog -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "AI Integration and Workflow Automation Services",
    "serviceType": "Artificial Intelligence Integration, LLM Development, Workflow Automation",
    "description": "End-to-end artificial intelligence integration for websites, SaaS applications, and business workflows using Google Gemini API, OpenAI GPT-4o, Claude 3.5, RAG architectures, n8n, and custom WhatsApp bots.",
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
        {"@type": "Country", "name": "India"},
        {"@type": "Country", "name": "United States"},
        {"@type": "Country", "name": "United Kingdom"},
        {"@type": "Country", "name": "United Arab Emirates"},
        {"@type": "Country", "name": "Australia"}
      ]
    },
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "AI Integration Packages",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Smart AI Chatbot & Customer Support Integration",
            "description": "24/7 custom-trained AI chatbot for websites and WhatsApp with fallback to live agent."
          },
          "price": "11999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "AI Business Workflow Automation (n8n / Zapier)",
            "description": "Automated lead ingestion, CRM scoring, invoice OCR parsing, and instant customer notifications."
          },
          "price": "19999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "RAG Pipeline & Enterprise Vector Search",
            "description": "Private knowledge-base AI search with zero hallucination using Pinecone, pgvector, and Gemini/OpenAI."
          },
          "price": "34999",
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
        "name": "What AI models and APIs can you integrate into my website or app?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We integrate all leading commercial and open-source models: Google Gemini 1.5 Pro / Flash, OpenAI GPT-4o, Anthropic Claude 3.5 Sonnet, Meta Llama 3, DeepSeek, and Whisper for speech-to-text."
        }
      },
      {
        "@type": "Question",
        "name": "How does an AI Chatbot trained on my business data work?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We index your company documentation, product catalogs, service pricing, and FAQs into a secure Vector Database. When a user asks a question, the system retrieves exact relevant context (RAG) and generates a precise, hallucination-free response with 24/7 instant availability."
        }
      },
      {
        "@type": "Question",
        "name": "What is AI workflow automation with n8n or Zapier?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "AI workflow automation connects your website forms, emails, CRM, and communication tools. For example: incoming leads are automatically analyzed and scored by AI, enriched with company details, added to your CRM, and given an instant personalized WhatsApp/Email response without manual effort."
        }
      },
      {
        "@type": "Question",
        "name": "Is my proprietary business data safe and private?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. We use enterprise API endpoints where inputs are NOT used to train public models. All vector databases and backend keys are encrypted with industry-standard security protocols."
        }
      },
      {
        "@type": "Question",
        "name": "How long does it take to deploy a custom AI integration?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Standard AI chatbots and n8n automations take 3 to 7 business days. Complex RAG pipelines and custom full-stack AI applications typically take 1 to 3 weeks."
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

    /* ---- AI HERO SECTION ---- */
    .ai-hero {
      position: relative;
      background: radial-gradient(circle at 85% 15%, rgba(173, 255, 28, 0.18) 0%, transparent 45%),
                  radial-gradient(circle at 10% 85%, rgba(16, 64, 65, 0.9) 0%, transparent 55%),
                  linear-gradient(135deg, #041213 0%, #0a292a 50%, #030d0e 100%);
      padding: 145px 0 95px;
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
    .ai-hero-pill {
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
      letter-spacing: 0.4px;
    }
    .ai-hero-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: #ADFF1C;
      border-radius: 50%;
      box-shadow: 0 0 12px #ADFF1C;
      animation: pulseAI 2s infinite;
    }
    @keyframes pulseAI {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.35; transform: scale(0.8); }
    }
    .ai-hero h1 {
      font-size: clamp(2.3rem, 4.8vw, 3.6rem);
      font-weight: 800;
      line-height: 1.15;
      color: #ffffff;
      margin-bottom: 22px;
      letter-spacing: -0.5px;
    }
    .ai-hero h1 span.highlight {
      color: #ADFF1C;
      background: linear-gradient(120deg, #ADFF1C 0%, #7dffb3 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    .ai-hero p.lead-text {
      font-size: clamp(1.05rem, 1.9vw, 1.2rem);
      color: #d6ecea;
      max-width: 840px;
      margin: 0 auto 34px;
      line-height: 1.7;
    }
    .ai-hero-actions {
      display: flex;
      gap: 14px;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 45px;
    }
    .btn-ai-primary {
      background: #ADFF1C;
      color: #082223 !important;
      font-weight: 700;
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
    .btn-ai-primary:hover {
      background: #ffffff;
      color: #082223 !important;
      transform: translateY(-3px);
      box-shadow: 0 14px 35px rgba(255, 255, 255, 0.35);
    }
    .btn-ai-outline {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff !important;
      border: 1px solid rgba(255, 255, 255, 0.22);
      font-weight: 600;
      font-size: 15px;
      padding: 14px 28px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      backdrop-filter: blur(8px);
      text-decoration: none;
    }
    .btn-ai-outline:hover {
      background: rgba(255, 255, 255, 0.18);
      border-color: #ffffff;
      transform: translateY(-3px);
    }

    /* Model Pill Cloud in Hero */
    .ai-models-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      justify-content: center;
      align-items: center;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .ai-model-chip {
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.14);
      padding: 6px 14px;
      border-radius: 20px;
      font-size: 12.5px;
      color: #e0f2f1;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .ai-model-chip i {
      color: #ADFF1C;
    }

    /* STATS STRIP */
    .ai-stats-strip {
      background: #082223;
      border-top: 1px solid rgba(173, 255, 28, 0.2);
      border-bottom: 1px solid rgba(173, 255, 28, 0.2);
      padding: 32px 0;
    }
    .stat-number {
      font-size: 2.6rem;
      font-weight: 800;
      color: #ADFF1C;
      margin-bottom: 4px;
      line-height: 1.1;
    }

    /* SERVICE PILLARS (THE 6 PILLARS) */
    .ai-pillar-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 35px 28px;
      height: 100%;
      transition: all 0.35s ease;
      display: flex;
      flex-direction: column;
      position: relative;
    }
    .ai-pillar-card:hover {
      border-color: #104041;
      transform: translateY(-6px);
      box-shadow: 0 16px 40px rgba(16, 64, 65, 0.1);
    }
    .ai-card-icon {
      width: 60px;
      height: 60px;
      background: #f0f7f6;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      color: #104041;
      margin-bottom: 20px;
      transition: all 0.3s ease;
    }
    .ai-pillar-card:hover .ai-card-icon {
      background: #104041;
      color: #ADFF1C;
      transform: rotate(6deg) scale(1.05);
    }
    .ai-card-title {
      font-size: 1.35rem;
      font-weight: 800;
      color: #0f2d2e;
      margin-bottom: 12px;
    }
    .ai-card-desc {
      font-size: 14px;
      color: #557273;
      line-height: 1.7;
      margin-bottom: 20px;
      flex-grow: 1;
    }
    .ai-features-check {
      list-style: none;
      padding: 0;
      margin: 0 0 22px;
    }
    .ai-features-check li {
      font-size: 13.5px;
      color: #2b4546;
      padding: 5px 0;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .ai-features-check li i {
      color: #25D366;
      font-size: 12px;
    }

    /* ARCHITECTURE PIPELINE SECTION */
    .ai-pipeline-section {
      background: #082223;
      padding: 90px 0;
      color: #fff;
      position: relative;
    }
    .pipeline-step-box {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(173, 255, 28, 0.25);
      border-radius: 18px;
      padding: 28px 22px;
      text-align: center;
      height: 100%;
      transition: all 0.3s ease;
      position: relative;
    }
    .pipeline-step-box:hover {
      background: rgba(173, 255, 28, 0.08);
      border-color: #ADFF1C;
      transform: translateY(-4px);
    }
    .pipeline-number {
      font-size: 1.8rem;
      font-weight: 900;
      color: #ADFF1C;
      margin-bottom: 8px;
      font-family: monospace;
    }

    /* INTERACTIVE AI ESTIMATOR CALCULATOR */
    .ai-calc-box {
      background: #ffffff;
      border: 2px solid #e1eceb;
      border-radius: 24px;
      padding: 45px 35px;
      box-shadow: 0 20px 50px rgba(16, 64, 65, 0.08);
    }
    .calc-check-item {
      background: #f7faf9;
      border: 1px solid #d4e5e4;
      border-radius: 12px;
      padding: 16px 20px;
      cursor: pointer;
      transition: all 0.25s ease;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 12px;
    }
    .calc-check-item:hover {
      background: #eef6f5;
      border-color: #104041;
    }
    .calc-check-item.active {
      background: #e6f6f5;
      border-color: #104041;
      box-shadow: 0 4px 15px rgba(16, 64, 65, 0.08);
    }
    .calc-summary-panel {
      background: #082223;
      border-radius: 20px;
      padding: 35px 28px;
      color: #ffffff;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .calc-grand-total {
      font-size: 2.5rem;
      font-weight: 900;
      color: #ADFF1C;
      margin: 15px 0;
    }

    /* PRICING PLANS */
    .ai-pricing-card {
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
    .ai-pricing-card.featured {
      background: #082223;
      border-color: #ADFF1C;
      color: #ffffff;
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
    }
    .ai-pricing-card:hover {
      border-color: #ADFF1C;
      transform: translateY(-8px);
      box-shadow: 0 18px 45px rgba(16, 64, 65, 0.12);
    }
    .price-badge-top {
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
    .ai-price-num {
      font-size: 2.2rem;
      font-weight: 800;
      margin: 16px 0 8px;
    }

    /* TECH STACK BADGES */
    .ai-tech-badge {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: #ffffff;
      border: 2px solid #e1eceb;
      border-radius: 12px;
      padding: 12px 22px;
      font-weight: 700;
      color: #104041;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }
    .ai-tech-badge:hover {
      border-color: #104041;
      background: #104041;
      color: #ADFF1C;
      transform: translateY(-3px);
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

  <!--===== HERO SECTION =======-->
  <section class="ai-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="ai-hero-pill" data-aos="fade-down">
            <span class="pulse-dot"></span>
            Next-Gen AI Integration & Workflow Automation
          </div>
          <h1 data-aos="fade-up" data-aos-duration="700">
            Intelligent <span class="highlight">AI Integration & Automation</span> for Modern Websites & Web Apps
          </h1>
          <p class="lead-text" data-aos="fade-up" data-aos-duration="900">
            Transform manual operations into 24/7 automated engines. From Google Gemini & OpenAI GPT-4o embeddings to zero-hallucination RAG pipelines and n8n/Zapier business workflows — I engineer enterprise AI solutions that 10x your business efficiency.
          </p>

          <div class="ai-hero-actions" data-aos="fade-up" data-aos-duration="1100">
            <a href="<?= $site ?>contact/" class="btn-ai-primary">
              <i class="fa-solid fa-microchip"></i> Book AI Consultation
            </a>
            <a href="#aiCalculator" class="btn-ai-outline">
              <i class="fa-solid fa-sliders"></i> Calculate AI ROI / Scope
            </a>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20AI%20Integration%20and%20Automation%20services" target="_blank" rel="noopener" class="btn-ai-outline" style="background:#25D366; border-color:#25D366; color:#fff !important;">
              <i class="fa-brands fa-whatsapp"></i> Chat on WhatsApp
            </a>
          </div>

          <!-- Supported AI Frameworks Bar -->
          <div class="ai-models-bar" data-aos="fade-up" data-aos-duration="1300">
            <span class="text-white-50 small me-2"><i class="fa-solid fa-bolt" style="color:#ADFF1C;"></i> Models & Stacks:</span>
            <div class="ai-model-chip"><i class="fa-solid fa-wand-magic-sparkles"></i> Google Gemini 1.5 Pro / Flash</div>
            <div class="ai-model-chip"><i class="fa-solid fa-brain"></i> OpenAI GPT-4o & Embeddings</div>
            <div class="ai-model-chip"><i class="fa-solid fa-network-wired"></i> Claude 3.5 Sonnet</div>
            <div class="ai-model-chip"><i class="fa-solid fa-gears"></i> n8n & Make Automations</div>
            <div class="ai-model-chip"><i class="fa-solid fa-database"></i> Pinecone / pgvector RAG</div>
            <div class="ai-model-chip"><i class="fa-brands fa-whatsapp"></i> WhatsApp AI Agent</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== STATS STRIP =======-->
  <section class="ai-stats-strip">
    <div class="container">
      <div class="row g-4 text-center text-white">
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="500">
          <div class="stat-number">10x</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Speed & Response Efficiency</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="700">
          <div class="stat-number">24/7</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Autonomous Operations</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="900">
          <div class="stat-number">0.3s</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Average Vector Search Latency</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="1100">
          <div class="stat-number">100%</div>
          <p class="mb-0 text-white-50 small text-uppercase fw-bold">Confidential & Private Data</p>
        </div>
      </div>
    </div>
  </section>

  <!--===== CORE AI SERVICES (THE 6 PILLARS) =======-->
  <section class="py-5" style="background: #ffffff;">
    <div class="container py-5">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Core AI Services</h5>
          <h2>Full-Stack AI Integration & Automation Capabilities</h2>
          <p class="text-muted">From customer-facing smart conversational interfaces to backend autonomous pipeline execution.</p>
        </div>
      </div>

      <div class="row g-4">
        <!-- 1. AI Chatbots & Customer Assistants -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-comments"></i></div>
            <h3 class="ai-card-title">24/7 AI Smart Chatbots</h3>
            <p class="ai-card-desc">
              Custom AI assistants trained directly on your company knowledge base, product documentation, and FAQs. Handles multi-turn conversations with zero human lag.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> Website widget & WhatsApp integration</li>
              <li><i class="fa-solid fa-check"></i> Multi-language conversational support</li>
              <li><i class="fa-solid fa-check"></i> Seamless live-human handover trigger</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Build AI Chatbot <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- 2. RAG Pipelines & Vector Search -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-diagram-project"></i></div>
            <h3 class="ai-card-title">RAG & Enterprise Vector Search</h3>
            <p class="ai-card-desc">
              Retrieval-Augmented Generation (RAG) connecting your private databases, PDF catalogs, and ERP records into high-speed vector embeddings for zero hallucination.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> Pinecone, pgvector & ChromaDB integration</li>
              <li><i class="fa-solid fa-check"></i> Exact source document citation & links</li>
              <li><i class="fa-solid fa-check"></i> Hybrid semantic + keyword search</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Deploy RAG Pipeline <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- 3. Business Workflow Automation -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-gears"></i></div>
            <h3 class="ai-card-title">n8n & Zapier Workflow Setup</h3>
            <p class="ai-card-desc">
              Zero-click business operations. Connect your web forms, CRM, Gmail, WhatsApp, Stripe, and Google Sheets to automated AI evaluation workflows.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> Automatic lead enrichment & scoring</li>
              <li><i class="fa-solid fa-check"></i> Self-hosted n8n instance setup & webhooks</li>
              <li><i class="fa-solid fa-check"></i> Automated invoice & document processing</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Automate Workflows <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- 4. LLM API Integration into Web/Mobile Apps -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-code"></i></div>
            <h3 class="ai-card-title">Custom LLM SaaS & Web Apps</h3>
            <p class="ai-card-desc">
              Integrate Gemini, OpenAI, or Claude into PHP, React, Node.js, and WordPress applications with secure authentication, streaming responses, and quota throttling.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> Real-time token streaming UX</li>
              <li><i class="fa-solid fa-check"></i> Strict JSON structured output mode</li>
              <li><i class="fa-solid fa-check"></i> User credits, billing & rate limit gates</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Integrate LLM API <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- 5. AI Vision, OCR & Document Extraction -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-eye"></i></div>
            <h3 class="ai-card-title">Multimodal Vision & OCR Agents</h3>
            <p class="ai-card-desc">
              Extract structured fields from receipts, invoices, government IDs, medical reports, or images directly into your database with state-of-the-art vision models.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> PDF/Image to JSON automated parsing</li>
              <li><i class="fa-solid fa-check"></i> Product image tagging & moderation</li>
              <li><i class="fa-solid fa-check"></i> 99.4% accuracy on structured tables</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Implement OCR AI <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>

        <!-- 6. AI-Powered SEO & Programmatic Content -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="ai-pillar-card">
            <div class="ai-card-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
            <h3 class="ai-card-title">AI SEO & Programmatic Engines</h3>
            <p class="ai-card-desc">
              Scale content generation, metadata generation, and category optimization safely with quality control guardrails, schema generation, and human validation loops.
            </p>
            <ul class="ai-features-check">
              <li><i class="fa-solid fa-check"></i> Automated product description generator</li>
              <li><i class="fa-solid fa-check"></i> Dynamic JSON-LD Schema builder</li>
              <li><i class="fa-solid fa-check"></i> Multi-city programmatic SEO architectures</li>
            </ul>
            <a href="<?= $site ?>contact/" class="header-btn11 w-100 text-center mt-auto">Explore AI SEO <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== ARCHITECTURE FLOW (HOW AI INTEGRATES) =======-->
  <section class="ai-pipeline-section">
    <div class="container">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto heading2 text-white">
          <h5 class="text-uppercase" style="color:#ADFF1C;">Engineered Architecture</h5>
          <h2 class="text-white">How AI Seamlessly Plugs Into Your Existing Web App</h2>
          <p class="text-white-50">Enterprise-grade security, zero data leaks, high-throughput streaming, and sub-second response times.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="pipeline-step-box">
            <div class="pipeline-number">STEP 01</div>
            <h4 class="text-white fw-bold mb-3"><i class="fa-solid fa-arrow-right-to-bracket text-success"></i> Input & Auth</h4>
            <p class="text-white-50 small mb-0">Web visitor question, API webhook, uploaded document, or WhatsApp message received via secure gateway.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="pipeline-step-box">
            <div class="pipeline-number">STEP 02</div>
            <h4 class="text-white fw-bold mb-3"><i class="fa-solid fa-database text-warning"></i> Vector Retrieval</h4>
            <p class="text-white-50 small mb-0">Embeddings search across Pinecone/pgvector fetches the exact matching knowledge base chunks with strict security filters.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="pipeline-step-box">
            <div class="pipeline-number">STEP 03</div>
            <h4 class="text-white fw-bold mb-3"><i class="fa-solid fa-microchip" style="color:#ADFF1C;"></i> LLM Reasoning</h4>
            <p class="text-white-50 small mb-0">Gemini 1.5 / GPT-4o processes the context, applies system rules, and synthesizes accurate, structured, zero-hallucination answers.</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1100">
          <div class="pipeline-step-box">
            <div class="pipeline-number">STEP 04</div>
            <h4 class="text-white fw-bold mb-3"><i class="fa-solid fa-bolt text-info"></i> Automated Action</h4>
            <p class="text-white-50 small mb-0">Streams live response to user, updates CRM lead record, triggers WhatsApp notification, or executes n8n business flow.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== INTERACTIVE AI ESTIMATOR CALCULATOR =======-->
  <section class="py-5" id="aiCalculator" style="background: #f7faf9;">
    <div class="container py-5">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Interactive Scoper</h5>
          <h2>Configure Your AI Solution & Instant Estimate</h2>
          <p class="text-muted">Select the AI modules your project requires to see an estimated investment and delivery timeline.</p>
        </div>
      </div>

      <div class="ai-calc-box">
        <div class="row g-5">
          <!-- Left: Options Checklist -->
          <div class="col-lg-7">
            <h4 class="fw-bold mb-4 text-dark"><i class="fa-solid fa-cubes-stacked text-success"></i> Select AI Features:</h4>
            
            <div class="calc-check-item active" onclick="toggleAICalc(this, 11999, '24/7 AI Website Chatbot')">
              <div>
                <h6 class="fw-bold mb-1 text-dark">24/7 Website AI Chatbot</h6>
                <p class="text-muted small mb-0">Trained on your business FAQs, services & knowledge base.</p>
              </div>
              <span class="badge bg-dark text-white px-3 py-2">₹11,999 ($149)</span>
            </div>

            <div class="calc-check-item" onclick="toggleAICalc(this, 8999, 'WhatsApp AI Assistant Bot')">
              <div>
                <h6 class="fw-bold mb-1 text-dark">WhatsApp AI Assistant Bot</h6>
                <p class="text-muted small mb-0">Instant conversational support and lead capture via WhatsApp API.</p>
              </div>
              <span class="badge bg-dark text-white px-3 py-2">+₹8,999 ($110)</span>
            </div>

            <div class="calc-check-item" onclick="toggleAICalc(this, 14999, 'RAG Document & PDF Vector Search')">
              <div>
                <h6 class="fw-bold mb-1 text-dark">RAG Multi-Document Vector Search</h6>
                <p class="text-muted small mb-0">Index catalogs, PDFs, manuals with Pinecone/pgvector.</p>
              </div>
              <span class="badge bg-dark text-white px-3 py-2">+₹14,999 ($189)</span>
            </div>

            <div class="calc-check-item" onclick="toggleAICalc(this, 12999, 'n8n / Zapier Automated Workflows')">
              <div>
                <h6 class="fw-bold mb-1 text-dark">n8n / Zapier Workflow Automations</h6>
                <p class="text-muted small mb-0">Auto lead scoring, CRM sync, email alerts & webhooks.</p>
              </div>
              <span class="badge bg-dark text-white px-3 py-2">+₹12,999 ($160)</span>
            </div>

            <div class="calc-check-item" onclick="toggleAICalc(this, 9999, 'OCR Document & Invoice Parsing')">
              <div>
                <h6 class="fw-bold mb-1 text-dark">Multimodal OCR & Document Extractor</h6>
                <p class="text-muted small mb-0">Automated extraction from images and receipts into database.</p>
              </div>
              <span class="badge bg-dark text-white px-3 py-2">+₹9,999 ($125)</span>
            </div>
          </div>

          <!-- Right: Live Summary Panel -->
          <div class="col-lg-5">
            <div class="calc-summary-panel">
              <div>
                <span class="badge mb-3" style="background:rgba(173,255,28,0.2); color:#ADFF1C; font-weight:700;">LIVE ESTIMATE</span>
                <h3 class="text-white fw-bold">Project Summary</h3>
                <p class="text-white-50 small">Selected AI modules dynamically aggregated:</p>
                <ul id="selectedModulesList" class="text-white-50 small ps-3 mb-4">
                  <li>24/7 AI Website Chatbot</li>
                </ul>
              </div>

              <div>
                <div class="text-white-50 small text-uppercase fw-bold">Estimated Fixed Investment</div>
                <div class="calc-grand-total" id="calcTotalPrice">₹11,999 <span style="font-size:16px; font-weight:500; color:#d8ecea;">(~$149)</span></div>
                <p class="text-white-50 small mb-4"><i class="fa-solid fa-clock text-warning"></i> Estimated Delivery: <strong class="text-white" id="calcDeliveryTime">3–5 Business Days</strong></p>
                
                <a href="#" id="calcWhatsAppBtn" target="_blank" rel="noopener" class="header-btn8 w-100 text-center" style="background:#ADFF1C; color:#082223 !important; font-weight:700;">
                  <i class="fa-brands fa-whatsapp"></i> Start Project with this Scope
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== FIXED-PRICE AI PACKAGES =======-->
  <section class="sp2" style="background: #ffffff;">
    <div class="container">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Fixed-Price Packages</h5>
          <h2>Transparent AI Packages & Pricing</h2>
          <p class="text-muted">No hidden fees. Full source code ownership, complete prompt & pipeline documentation, and post-deployment warranty.</p>
        </div>
      </div>

      <div class="row g-4">
        <!-- Tier 1: AI Chatbot Starter -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="500">
          <div class="ai-pricing-card">
            <h4>AI Chatbot Starter</h4>
            <p class="text-muted small">Ideal for websites needing 24/7 automated customer support.</p>
            <div class="ai-price-num" style="color: #104041;">₹11,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $149</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Custom Website Chat Widget UI</li>
              <li><i class="fa-solid fa-check"></i> Trained on company FAQs & services</li>
              <li><i class="fa-solid fa-check"></i> Google Gemini / OpenAI GPT integration</li>
              <li><i class="fa-solid fa-check"></i> Human fallback & Lead capture form</li>
              <li><i class="fa-solid fa-check"></i> 30-Day Support & Warranty</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20AI%20Chatbot%20Starter%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center mt-auto">
              Choose AI Chatbot <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Tier 2: Workflow Automation Pro (Featured) -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="700">
          <div class="ai-pricing-card featured">
            <span class="price-badge-top">Most Popular</span>
            <h4 class="text-white">AI Automation Pro</h4>
            <p class="text-white-50 small">Automate lead intake, CRM sync, WhatsApp & emails with n8n.</p>
            <div class="ai-price-num" style="color: #ADFF1C !important;">₹19,999 <span style="font-size:14px; font-weight:500; color:#d8ecea;">/ $249</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Self-hosted / Cloud n8n workflow setup</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> AI Lead qualification & CRM ingestion</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Automated WhatsApp / Email auto-responses</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> Multi-app webhook orchestration</li>
              <li><i class="fa-solid fa-check" style="color:#ADFF1C;"></i> 60-Day Dedicated Support</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20AI%20Automation%20Pro%20Package" target="_blank" rel="noopener" class="header-btn8 w-100 text-center mt-auto" style="background:#ADFF1C; color:#082223 !important; font-weight:700;">
              Choose Automation Pro <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Tier 3: Enterprise RAG & Custom SaaS -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
          <div class="ai-pricing-card">
            <h4>Enterprise RAG & SaaS</h4>
            <p class="text-muted small">Multi-document vector intelligence & custom full-stack LLM apps.</p>
            <div class="ai-price-num" style="color: #104041;">₹34,999 <span style="font-size:14px; font-weight:500; color:#6c757d;">/ $449</span></div>
            <ul class="price-features-list">
              <li><i class="fa-solid fa-check"></i> Pinecone / pgvector Vector Database</li>
              <li><i class="fa-solid fa-check"></i> RAG pipeline with live document citation</li>
              <li><i class="fa-solid fa-check"></i> Role-based access & API rate limiting</li>
              <li><i class="fa-solid fa-check"></i> Custom Admin Analytics Dashboard</li>
              <li><i class="fa-solid fa-check"></i> 90-Day VIP Support & Training</li>
            </ul>
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20want%20the%20Enterprise%20RAG%20and%20SaaS%20Package" target="_blank" rel="noopener" class="header-btn11 w-100 text-center mt-auto">
              Choose Enterprise RAG <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== TECH STACK CLOUD =======-->
  <section class="py-5" style="background: #f7faf9;">
    <div class="container py-4">
      <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto heading2">
          <h5>Technologies</h5>
          <h2>Modern AI Stacks & Orchestration Frameworks</h2>
          <p class="text-muted">High-performance tools, battle-tested APIs, and secure vector databases.</p>
        </div>
      </div>

      <div class="row g-3 justify-content-center" data-aos="fade-up">
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-wand-magic-sparkles text-warning"></i> Google Gemini SDK</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-brain text-success"></i> OpenAI API (GPT-4o)</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-network-wired text-danger"></i> Anthropic Claude</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-link text-primary"></i> LangChain & LlamaIndex</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-database text-info"></i> Pinecone Vector DB</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-solid fa-gears text-success"></i> n8n Automation Engine</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-brands fa-python text-primary"></i> Python FastAPIs</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-brands fa-node-js text-success"></i> Node.js & Express</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-brands fa-react text-info"></i> React.js / Next.js</div></div>
        <div class="col-auto"><div class="ai-tech-badge"><i class="fa-brands fa-whatsapp text-success"></i> WhatsApp Cloud API</div></div>
      </div>
    </div>
  </section>

  <!--===== FAQ SECTION =======-->
  <section class="sp1 bg-white">
    <div class="container">
      <div class="row mb-5 text-center">
        <div class="col-lg-7 mx-auto heading2">
          <h5>Got Questions?</h5>
          <h2>Frequently Asked Questions About AI Integration</h2>
          <p class="text-muted">Clear answers regarding data privacy, model performance, pricing, and deployment timelines.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="accordion d-flex flex-column gap-3" id="aiFaqAccordion">
            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                  What AI models and APIs can you integrate into my website or app?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#aiFaqAccordion">
                <div class="accordion-body text-muted">
                  We integrate all leading commercial and open-source models including <strong>Google Gemini 1.5 Pro / Flash</strong>, <strong>OpenAI GPT-4o</strong>, <strong>Anthropic Claude 3.5 Sonnet</strong>, Meta Llama 3, DeepSeek, and Whisper for real-time speech transcription.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                  How does an AI Chatbot trained on my business data work?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#aiFaqAccordion">
                <div class="accordion-body text-muted">
                  We index your company documentation, product catalogs, pricing sheets, and FAQs into a secure Vector Database using RAG (Retrieval-Augmented Generation). When a user asks a query, the system retrieves only the exact relevant paragraphs and instructs the AI to generate a precise, factual response without hallucinations.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                  What is AI workflow automation with n8n or Zapier?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#aiFaqAccordion">
                <div class="accordion-body text-muted">
                  AI workflow automation connects your website forms, emails, CRM, and communication tools. For example: incoming leads are automatically analyzed and scored by AI, enriched with company details, added to your CRM, and sent an instant personalized WhatsApp/Email reply without any human intervention.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                  Is my company data confidential and secure?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#aiFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes, 100%. We utilize official enterprise API endpoints where inputs are <strong>strictly not used for model training</strong>. All API keys, vector embeddings, and database credentials are stored in encrypted environment configurations with role-based authentication.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
                  Do you serve clients in Delhi NCR, Pan-India, and internationally?
                </button>
              </h3>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#aiFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! We provide on-site and remote consultation across Delhi NCR (Karampura, Connaught Place, Pitampura, Noida, Gurgaon) as well as Mumbai, Bangalore, Hyderabad, Pune, and globally for clients across the USA, UK, UAE, and Australia.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== CTA BANNER =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h2 class="text-anime-style-1 text-light">Ready to Build Your Custom AI System & Automate Operations?</h2>
            <p data-aos="fade-up" data-aos-duration="1000">
              Schedule a 1-on-1 strategy call to map out your AI architecture, calculate API operational costs, and launch within days.
            </p>
            <div class="btn-area text-center d-flex gap-3 justify-content-center flex-wrap" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get Free AI Strategy Session <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20Let%27s%20discuss%20my%20AI%20Integration%20Project" target="_blank" rel="noopener" class="header-btn8" style="background:#25D366; color:#fff !important;">
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

  <!-- Interactive AI Calculator Script -->
  <script>
    let selectedAIModules = [
      { name: '24/7 AI Website Chatbot', price: 11999, days: 3 }
    ];

    function toggleAICalc(element, price, name) {
      element.classList.toggle('active');
      const isSelected = element.classList.contains('active');

      if (isSelected) {
        let days = (name.includes('RAG') || name.includes('Workflow')) ? 5 : 2;
        selectedAIModules.push({ name: name, price: price, days: days });
      } else {
        selectedAIModules = selectedAIModules.filter(m => m.name !== name);
      }

      if (selectedAIModules.length === 0) {
        element.classList.add('active');
        selectedAIModules.push({ name: name, price: price, days: 3 });
      }

      updateAICalcView();
    }

    function updateAICalcView() {
      let totalPrice = selectedAIModules.reduce((sum, item) => sum + item.price, 0);
      let usdPrice = Math.round(totalPrice / 80);
      let totalDays = Math.min(18, 3 + selectedAIModules.length * 2);

      document.getElementById('calcTotalPrice').innerHTML = '₹' + totalPrice.toLocaleString('en-IN') + ' <span style="font-size:16px; font-weight:500; color:#d8ecea;">(~$' + usdPrice + ')</span>';
      document.getElementById('calcDeliveryTime').innerText = totalDays + '–' + (totalDays + 4) + ' Business Days';

      let listHtml = '';
      selectedAIModules.forEach(item => {
        listHtml += '<li>' + item.name + ' (₹' + item.price.toLocaleString('en-IN') + ')</li>';
      });
      document.getElementById('selectedModulesList').innerHTML = listHtml;

      let msg = encodeURIComponent("Hi Nikhil, I configured an AI Solution with: " + selectedAIModules.map(m => m.name).join(', ') + ". Estimated price: ₹" + totalPrice.toLocaleString('en-IN') + " (~$" + usdPrice + "). Let's discuss starting this project!");
      document.getElementById('calcWhatsAppBtn').href = 'https://wa.me/918368552640?text=' + msg;
    }

    // Initialize on load
    document.addEventListener('DOMContentLoaded', updateAICalcView);
  </script>
</body>
</html>
