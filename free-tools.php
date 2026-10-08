<?php
include_once "config/connect.php";
include_once "util/function.php";

$contact = contact_us();
$pageTitle = "100% Free Online Web, SEO & Business Tools | NikhilWorks";
$pageDesc = "Explore 12+ free online developer, SEO, and business productivity tools by NikhilWorks. Generate WhatsApp links, QR codes, GST calculations, Schema JSON-LD, Invoices & more.";
$pageKeywords = "free online tools, whatsapp link generator, qr code generator, gst calculator online, schema markup generator, invoice generator free, pagespeed checker, meta tag preview, robots txt validator, nikhilworks tools";
$canonicalUrl = $site . "free-tools/";
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
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">

  <!-- Schema: CollectionPage & ItemList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "name": "NikhilWorks Free Web, SEO & Business Tools Hub",
    "description": "<?= addslashes($pageDesc) ?>",
    "url": "<?= $canonicalUrl ?>",
    "mainEntity": {
      "@type": "ItemList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "WhatsApp Link Generator", "url": "<?= $site ?>tools/whatsapp-link/" },
        { "@type": "ListItem", "position": 2, "name": "QR Code Generator", "url": "<?= $site ?>tools/qr-code/" },
        { "@type": "ListItem", "position": 3, "name": "GST Calculator India", "url": "<?= $site ?>tools/gst-calculator/" },
        { "@type": "ListItem", "position": 4, "name": "Profit Margin Calculator", "url": "<?= $site ?>tools/profit-calculator/" },
        { "@type": "ListItem", "position": 5, "name": "Google PageSpeed Insights Checker", "url": "<?= $site ?>tools/pagespeed/" },
        { "@type": "ListItem", "position": 6, "name": "Google Index & Cache Checker", "url": "<?= $site ?>tools/index-checker/" },
        { "@type": "ListItem", "position": 7, "name": "Meta Tags & SERP Preview", "url": "<?= $site ?>tools/meta-preview/" },
        { "@type": "ListItem", "position": 8, "name": "Schema JSON-LD Generator", "url": "<?= $site ?>tools/schema-generator/" },
        { "@type": "ListItem", "position": 9, "name": "Free Invoice Generator", "url": "<?= $site ?>tools/invoice/" },
        { "@type": "ListItem", "position": 10, "name": "SSL & Domain Security Checker", "url": "<?= $site ?>tools/ssl-checker/" },
        { "@type": "ListItem", "position": 11, "name": "Privacy Policy Generator", "url": "<?= $site ?>tools/privacy-policy/" },
        { "@type": "ListItem", "position": 12, "name": "Robots.txt Validator & Tester", "url": "<?= $site ?>tools/robots-validator/" }
      ]
    }
  }
  </script>

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?= $site ?>" },
      { "@type": "ListItem", "position": 2, "name": "Free Tools", "item": "<?= $canonicalUrl ?>" }
    ]
  }
  </script>

  <!-- Schema: FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Are these tools 100% free to use?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! All tools provided on NikhilWorks are 100% free with no sign-up, credit card, or subscription required."
        }
      },
      {
        "@type": "Question",
        "name": "Do you store any personal or financial data entered in the tools?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. All calculations, link generations, QR codes, and invoices are processed locally in your browser. We respect your privacy and never store your data."
        }
      },
      {
        "@type": "Question",
        "name": "Can I use the generated invoices and policies for my commercial business?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! All generated outputs including PDFs, QR codes, schema markups, and policy templates are completely free for commercial and personal usage."
        }
      }
    ]
  }
  </script>

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

  <!--=====  JS SCRIPT LINK =======-->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
      --brand-accent: #0284c7;
      --text-dark: #0f172a;
      --text-muted: #64748b;
      --card-bg: #ffffff;
      --border-color: #e2e8f0;
    }

    .tools-hub-hero {
      background: linear-gradient(135deg, #072223 0%, #104041 55%, #0f172a 100%);
      padding: 70px 0 60px;
      color: #ffffff;
      position: relative;
      overflow: hidden;
    }
    .tools-hub-hero::before {
      content: "";
      position: absolute;
      top: -50px;
      right: -50px;
      width: 250px;
      height: 250px;
      background: radial-gradient(circle, rgba(173, 255, 28, 0.15) 0%, rgba(0,0,0,0) 70%);
      border-radius: 50%;
      pointer-events: none;
    }
    .tools-badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(173, 255, 28, 0.12);
      color: var(--brand-lime);
      border: 1px solid rgba(173, 255, 28, 0.3);
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 13px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 16px;
    }
    .tools-breadcrumb a {
      color: rgba(255,255,255,0.7);
      text-decoration: none;
      transition: color 0.2s;
    }
    .tools-breadcrumb a:hover {
      color: var(--brand-lime);
    }

    .tools-search-box {
      max-width: 650px;
      margin: 25px auto 0;
      position: relative;
    }
    .tools-search-box input {
      width: 100%;
      padding: 16px 22px 16px 52px;
      border-radius: 50px;
      border: 2px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(10px);
      color: #ffffff;
      font-size: 16px;
      outline: none;
      transition: all 0.3s ease;
    }
    .tools-search-box input:focus {
      background: #ffffff;
      color: #0f172a;
      border-color: var(--brand-lime);
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .tools-search-box input::placeholder {
      color: rgba(255,255,255,0.6);
    }
    .tools-search-box input:focus::placeholder {
      color: #94a3b8;
    }
    .tools-search-icon {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--brand-lime);
      font-size: 18px;
    }

    /* Category Filter Pills */
    .filter-pills-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
      margin: 35px 0 20px;
    }
    .filter-pill-btn {
      padding: 8px 18px;
      border-radius: 30px;
      border: 1px solid #e2e8f0;
      background: #ffffff;
      color: #475569;
      font-size: 13.5px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .filter-pill-btn:hover, .filter-pill-btn.active {
      background: var(--brand-teal);
      color: #ffffff;
      border-color: var(--brand-teal);
      box-shadow: 0 4px 12px rgba(16, 64, 65, 0.15);
    }

    /* Tool Cards */
    .tool-card {
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 16px;
      padding: 24px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.3s ease;
      position: relative;
      box-shadow: 0 4px 14px rgba(0,0,0,0.03);
    }
    .tool-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 14px 30px rgba(16, 64, 65, 0.1);
      border-color: rgba(16, 64, 65, 0.25);
    }
    .tool-icon-wrapper {
      width: 54px;
      height: 54px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-bottom: 18px;
      transition: transform 0.2s;
    }
    .tool-card:hover .tool-icon-wrapper {
      transform: scale(1.08);
    }

    /* Color themes */
    .icon-green { background: rgba(34, 197, 94, 0.12); color: #16a34a; }
    .icon-blue { background: rgba(2, 132, 199, 0.12); color: #0284c7; }
    .icon-purple { background: rgba(147, 51, 234, 0.12); color: #9333ea; }
    .icon-amber { background: rgba(245, 158, 11, 0.12); color: #d97706; }
    .icon-teal { background: rgba(16, 64, 65, 0.12); color: var(--brand-teal); }
    .icon-indigo { background: rgba(99, 102, 241, 0.12); color: #4f46e5; }
    .icon-rose { background: rgba(244, 63, 94, 0.12); color: #e11d48; }

    .tool-title {
      font-size: 18px;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 8px;
    }
    .tool-desc {
      font-size: 13.5px;
      color: var(--text-muted);
      line-height: 1.55;
      margin-bottom: 18px;
      flex-grow: 1;
    }
    .tool-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1px solid #f1f5f9;
      padding-top: 14px;
      font-size: 12.5px;
    }
    .tool-tag {
      background: #f1f5f9;
      color: #475569;
      padding: 3px 9px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 11.5px;
    }
    .btn-launch-tool {
      color: var(--brand-teal);
      font-weight: 700;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: gap 0.2s;
    }
    .tool-card:hover .btn-launch-tool {
      gap: 10px;
      color: #0d2e2f;
    }

    /* FAQ accordion styling */
    .faq-custom-card {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      background: #ffffff;
      margin-bottom: 14px;
      overflow: hidden;
    }
    .faq-custom-card summary {
      padding: 18px 22px;
      font-weight: 700;
      font-size: 16px;
      cursor: pointer;
      color: var(--text-dark);
      user-select: none;
      list-style: none;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .faq-custom-card summary::-webkit-details-marker { display: none; }
    .faq-custom-card summary::after {
      content: "\f078";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      font-size: 13px;
      color: var(--brand-teal);
      transition: transform 0.2s;
    }
    .faq-custom-card[open] summary::after {
      transform: rotate(180deg);
    }
    .faq-custom-card p {
      padding: 0 22px 18px;
      color: var(--text-muted);
      font-size: 14.5px;
      margin-bottom: 0;
      line-height: 1.6;
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!-- HERO SECTION -->
  <section class="tools-hub-hero">
    <div class="container text-center">
      <div class="tools-badge">
        <i class="fa-solid fa-wand-magic-sparkles"></i> 100% Free Developer &amp; Business Utilities
      </div>
      <h1 class="display-5 fw-extrabold mb-3">
        Free Web, SEO &amp; Business Tools Hub
      </h1>
      <p class="lead opacity-90 mx-auto" style="max-width: 720px; font-size: 17px;">
        High-utility, client-side tools designed for businesses, developers, marketers, and daily webmasters. 
        Instant results, zero ads, no sign-ups required.
      </p>

      <!-- Live Search Box -->
      <div class="tools-search-box">
        <i class="fa-solid fa-magnifying-glass tools-search-icon"></i>
        <input type="text" id="toolSearchInput" placeholder="Search by tool name, keyword (e.g. WhatsApp, GST, SEO, Schema)..." autocomplete="off">
      </div>

      <!-- Breadcrumb -->
      <nav class="tools-breadcrumb mt-4 small" aria-label="breadcrumb">
        <a href="<?= $site ?>">Home</a> &rsaquo; 
        <span class="text-white fw-bold">Free Tools</span>
      </nav>
    </div>
  </section>

  <!-- MAIN TOOLS DIRECTORY -->
  <section class="py-5 bg-light">
    <div class="container">
      
      <!-- Category Filter Pills -->
      <div class="filter-pills-row">
        <button type="button" class="filter-pill-btn active" data-filter="all">
          <i class="fa-solid fa-border-all"></i> All Tools (12)
        </button>
        <button type="button" class="filter-pill-btn" data-filter="marketing">
          <i class="fa-solid fa-bullhorn"></i> Marketing &amp; Business
        </button>
        <button type="button" class="filter-pill-btn" data-filter="seo">
          <i class="fa-solid fa-magnifying-glass-chart"></i> SEO &amp; SERP
        </button>
        <button type="button" class="filter-pill-btn" data-filter="performance">
          <i class="fa-solid fa-bolt"></i> Speed &amp; Security
        </button>
        <button type="button" class="filter-pill-btn" data-filter="legal">
          <i class="fa-solid fa-scale-balanced"></i> Legal &amp; Policy
        </button>
      </div>

      <!-- Tools Grid -->
      <div class="row g-4 mt-2" id="toolsGrid">

        <!-- 1. WhatsApp Link Generator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="marketing" data-keywords="whatsapp link wa.me chat click to chat insta bio message">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-green">
                <i class="fa-brands fa-whatsapp"></i>
              </div>
              <h3 class="tool-title">WhatsApp Link Generator</h3>
              <p class="tool-desc">
                Generate clean, custom <code>wa.me</code> click-to-chat links with pre-filled messages and instant QR codes for Instagram bio, Facebook ads, and print cards.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Marketing</span>
              <a href="<?= $site ?>tools/whatsapp-link/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 2. QR Code Generator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="marketing" data-keywords="qr code generator custom color download svg png vcard wifi url">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-teal">
                <i class="fa-solid fa-qrcode"></i>
              </div>
              <h3 class="tool-title">QR Code Generator</h3>
              <p class="tool-desc">
                Create high-resolution, customized QR codes for URLs, Contact vCards, WiFi networks, and text. Download in sharp PNG &amp; vector SVG formats.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Utilities</span>
              <a href="<?= $site ?>tools/qr-code/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 3. GST Calculator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="marketing" data-keywords="gst calculator india cgst sgst igst tax reverse slab 5% 12% 18% 28%">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-amber">
                <i class="fa-solid fa-calculator"></i>
              </div>
              <h3 class="tool-title">GST Calculator India</h3>
              <p class="tool-desc">
                Accurate Indian Goods and Services Tax calculator. Calculate Inclusive or Exclusive GST with CGST, SGST, and IGST breakdowns for 5%, 12%, 18%, and 28% slabs.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Finance</span>
              <a href="<?= $site ?>tools/gst-calculator/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 4. Profit Margin Calculator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="marketing" data-keywords="profit margin calculator markup cost selling price revenue gross profit break even">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-indigo">
                <i class="fa-solid fa-chart-line"></i>
              </div>
              <h3 class="tool-title">Profit Margin Calculator</h3>
              <p class="tool-desc">
                Calculate Gross Profit, Markup Percentage, and Selling Price effortlessly. Perfect for eCommerce founders, retail stores, and service agencies.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Business</span>
              <a href="<?= $site ?>tools/profit-calculator/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 5. PageSpeed Checker -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="performance" data-keywords="pagespeed insights checker core web vitals lcp cls inp fcp performance audit mobile desktop">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-rose">
                <i class="fa-solid fa-gauge-high"></i>
              </div>
              <h3 class="tool-title">Google PageSpeed Checker</h3>
              <p class="tool-desc">
                Analyze live website speed and Core Web Vitals (LCP, INP, CLS) powered by Google Lighthouse. Get actionable optimization recommendations for mobile &amp; desktop.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Performance</span>
              <a href="<?= $site ?>tools/pagespeed/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 6. Google Index Checker -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="seo" data-keywords="google index checker serp status cache date indexed url site query search console">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-blue">
                <i class="fa-brands fa-google"></i>
              </div>
              <h3 class="tool-title">Google Index &amp; Cache Checker</h3>
              <p class="tool-desc">
                Quickly inspect if your webpage is indexed on Google, view Google's cached version snapshot, and verify robots crawling indexability in one click.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">SEO</span>
              <a href="<?= $site ?>tools/index-checker/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 7. Meta Tags Preview -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="seo" data-keywords="meta tag preview open graph og twitter card serp simulator google snippet social preview">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-purple">
                <i class="fa-solid fa-tags"></i>
              </div>
              <h3 class="tool-title">Meta Tags &amp; Social Preview</h3>
              <p class="tool-desc">
                Simulate how your webpage looks on Google SERP, Facebook, X (Twitter), and LinkedIn. Validate title character counts, meta descriptions, and OG image banners.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">SEO &amp; Social</span>
              <a href="<?= $site ?>tools/meta-preview/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 8. Schema JSON-LD Generator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="seo" data-keywords="schema generator json ld localbusiness person organization faq article product rich snippet">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-teal">
                <i class="fa-solid fa-code"></i>
              </div>
              <h3 class="tool-title">Schema JSON-LD Generator</h3>
              <p class="tool-desc">
                Build clean, valid Schema.org structured data for LocalBusiness, Organization, Person, Article, FAQ, and Product to earn Google Rich Snippets stars.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Technical SEO</span>
              <a href="<?= $site ?>tools/schema-generator/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 9. Invoice Generator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="marketing" data-keywords="invoice generator pdf billing receipt gst invoice freelance payment download print">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-green">
                <i class="fa-solid fa-file-invoice-dollar"></i>
              </div>
              <h3 class="tool-title">Free Invoice Generator</h3>
              <p class="tool-desc">
                Create beautiful, professional client invoices with custom logo, itemized billings, GST tax calculations, and currency selection. Print directly to PDF.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Billing</span>
              <a href="<?= $site ?>tools/invoice/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 10. SSL Checker -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="performance" data-keywords="ssl checker certificate expiry issuer tls https domain security test">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-indigo">
                <i class="fa-solid fa-shield-halved"></i>
              </div>
              <h3 class="tool-title">SSL &amp; Domain Security Checker</h3>
              <p class="tool-desc">
                Inspect SSL certificate validity, issuer authority, expiration date countdown, TLS protocol versions, and HTTPS configuration grade for any domain.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Security</span>
              <a href="<?= $site ?>tools/ssl-checker/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 11. Privacy Policy Generator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="legal" data-keywords="privacy policy generator gdpr ccpa india dpdp compliance legal template website terms">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-amber">
                <i class="fa-solid fa-scale-balanced"></i>
              </div>
              <h3 class="tool-title">Privacy Policy Generator</h3>
              <p class="tool-desc">
                Generate customized, legally compliant Privacy Policy documents tailored for websites, blogs, and SaaS apps complying with GDPR, CCPA, and India DPDP standards.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Compliance</span>
              <a href="<?= $site ?>tools/privacy-policy/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- 12. Robots.txt Validator -->
        <div class="col-lg-4 col-md-6 tool-item" data-category="seo" data-keywords="robots txt validator tester crawl syntax disallow allow sitemap user agent search bot">
          <div class="tool-card">
            <div>
              <div class="tool-icon-wrapper icon-rose">
                <i class="fa-solid fa-robot"></i>
              </div>
              <h3 class="tool-title">Robots.txt Validator &amp; Tester</h3>
              <p class="tool-desc">
                Test and validate your <code>robots.txt</code> file for syntax errors, check Googlebot crawler directives, verify sitemap locations, and simulate URL blocking.
              </p>
            </div>
            <div class="tool-meta">
              <span class="tool-tag">Technical SEO</span>
              <a href="<?= $site ?>tools/robots-validator/" class="btn-launch-tool">
                Launch Tool <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

      </div>

      <div id="noToolsFoundMsg" class="text-center py-5 d-none">
        <i class="fa-solid fa-magnifying-glass fa-3x text-muted mb-3"></i>
        <h4 class="fw-bold text-dark">No matching tools found</h4>
        <p class="text-muted">Try searching with different keywords or switch categories above.</p>
      </div>

    </div>
  </section>

  <!-- FAQ SECTION -->
  <section class="py-5 bg-white">
    <div class="container" style="max-width: 860px;">
      <div class="text-center mb-4">
        <h2 class="fw-bold text-dark">Frequently Asked Questions</h2>
        <p class="text-muted">Everything you need to know about using NikhilWorks free web &amp; business tools.</p>
      </div>

      <details class="faq-custom-card" open>
        <summary>Are all tools on this hub completely free?</summary>
        <p>Yes! Every tool listed on NikhilWorks is 100% free with unlimited usage. There are no paywalls, subscriptions, or credit card requirements.</p>
      </details>

      <details class="faq-custom-card">
        <summary>Is my data secure when using these tools?</summary>
        <p>Absolutely. Most tools (like WhatsApp link creator, QR code generator, GST calculator, and Invoice maker) run entirely on your browser using modern client-side JavaScript. We do not store, track, or sell any inputted data.</p>
      </details>

      <details class="faq-custom-card">
        <summary>Can I use these tools for commercial clients and business projects?</summary>
        <p>Yes. The invoices, QR codes, schema JSON-LD scripts, and policies generated can be used directly for personal or commercial projects without attribution.</p>
      </details>

      <details class="faq-custom-card">
        <summary>Do you offer custom API integrations or custom tool development?</summary>
        <p>Yes! If your business needs a tailored calculator, CRM integration, WhatsApp Business API chatbot, or custom automation tool, feel free to <a href="<?= $site ?>contact/" class="text-primary fw-bold">reach out to Nikhil Gupta</a> for custom engineering.</p>
      </details>
    </div>
  </section>

  <!-- CTA SECTION -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need a Custom Web Application or Automation Tool?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        From custom business calculators to full-stack SaaS portals and AI agent workflows, NikhilWorks builds bespoke solutions that scale your business.
      </p>
      <div class="d-flex justify-content-center gap-3 flex-wrap">
        <a href="<?= $site ?>contact/" class="header-btn9">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
        <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20custom%20tool%20development." target="_blank" class="header-btn11">
          <i class="fa-brands fa-whatsapp me-1"></i> WhatsApp Now
        </a>
      </div>
    </div>
  </div>

  <?php include_once "includes/footer.php" ?>

  <!-- Live Filter and Search JS -->
  <script>
    $(document).ready(function() {
      const searchInput = $('#toolSearchInput');
      const filterPills = $('.filter-pill-btn');
      const toolItems = $('.tool-item');
      const noFound = $('#noToolsFoundMsg');

      function filterTools() {
        const query = searchInput.val().toLowerCase().trim();
        const activeCat = $('.filter-pill-btn.active').data('filter');
        let visibleCount = 0;

        toolItems.each(function() {
          const item = $(this);
          const cat = item.data('category');
          const keywords = (item.data('keywords') || '') + ' ' + item.find('.tool-title').text() + ' ' + item.find('.tool-desc').text();
          const matchesQuery = !query || keywords.toLowerCase().includes(query);
          const matchesCat = (activeCat === 'all' || cat === activeCat);

          if (matchesQuery && matchesCat) {
            item.show();
            visibleCount++;
          } else {
            item.hide();
          }
        });

        if (visibleCount === 0) {
          noFound.removeClass('d-none');
        } else {
          noFound.addClass('d-none');
        }
      }

      searchInput.on('input', filterTools);

      filterPills.on('click', function() {
        filterPills.removeClass('active');
        $(this).addClass('active');
        filterTools();
      });
    });
  </script>

</body>
</html>
