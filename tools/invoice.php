<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Invoice Generator India — PDF with GST | NikhilWorks";
$metaDesc = "Create professional GST invoices online free. Add logo, items, tax and download PDF instantly. Perfect for freelancers & small businesses India.";
$canonical = $site . "tools/invoice/";
$metaKeywords = "invoice generator free india, gst invoice generator online, pdf invoice creator free, freelance invoice generator india, online bill maker free download";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">

  <!-- Schema: SoftwareApplication -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Canva-Style Online Invoice Studio",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Web Browser",
    "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
    "provider": {
      "@type": "Person",
      "name": "Nikhil Gupta",
      "url": "https://nikhilworks.com"
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
      { "@type": "ListItem", "position": 2, "name": "Free Tools", "item": "<?= $site ?>free-tools/" },
      { "@type": "ListItem", "position": 3, "name": "Invoice Generator" }
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
        "name": "Can I download the invoice as a PDF with my custom brand logo and colors?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! Use the Canva-style left sidebar to upload your business logo, select your brand palette, pick modern fonts, and click 'Print / PDF' for a clean, watermark-free document." }
      },
      {
        "@type": "Question",
        "name": "Is my client and billing history stored securely?",
        "acceptedAnswer": { "@type": "Answer", "text": "All invoice history and customization settings are stored 100% locally in your browser's LocalStorage. Nothing is uploaded or stored on any server." }
      },
      {
        "@type": "Question",
        "name": "Can I share the generated invoice directly on WhatsApp?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! The right inspector panel includes a 1-click 'Send via WhatsApp' button with preformatted invoice summary, total due, and client greetings." }
      }
    ]
  }
  </script>

  <!--=====FAB ICON=======-->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!--===== Google Fonts for Studio Customization =======-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Merriweather:ital,wght@0,400;0,700;1,300&family=Poppins:wght@400;500;600;700;800&family=Roboto+Mono:wght@400;600;700&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

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
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
      --inv-primary: #104041;
      --inv-accent: #0284c7;
      --inv-bg: #ffffff;
      --inv-text: #0f172a;
      --inv-font: 'Inter', sans-serif;
    }
    .tool-hero {
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 65px;
      color: #fff;
      position: relative;
      overflow: hidden;
    }
    @media (max-width: 991px) {
      .tool-hero {
        padding: 110px 0 50px;
      }
    }
    .site-breadcrumb {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 30px;
      padding: 6px 18px;
      margin-bottom: 20px;
      font-size: 13.5px;
      backdrop-filter: blur(8px);
    }
    .site-breadcrumb a {
      color: #cbe3e1;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .site-breadcrumb a:hover {
      color: var(--brand-lime);
    }
    .site-breadcrumb .bc-sep {
      color: rgba(255, 255, 255, 0.4);
      font-size: 10px;
    }
    .site-breadcrumb .bc-current {
      color: var(--brand-lime);
      font-weight: 700;
    }

    /* =========================================================
       CANVA-STYLE STUDIO WORKSPACE
       ========================================================= */
    .canva-studio-wrapper {
      background: #f1f5f9;
      border: 1px solid #cbd5e1;
      border-radius: 20px;
      box-shadow: 0 16px 45px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      margin-bottom: 50px;
    }

    /* Studio Top Navbar */
    .canva-topbar {
      background: #0b1f20;
      color: #ffffff;
      padding: 12px 24px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      flex-wrap: wrap;
      gap: 12px;
    }
    .canva-topbar-title {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .canva-topbar-badge {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border: 1px solid rgba(173, 255, 28, 0.35);
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .autosave-pill {
      font-size: 12px;
      color: #94a3b8;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .pulse-save-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #22c55e;
      box-shadow: 0 0 8px #22c55e;
    }

    /* Main 3-Column Grid */
    .canva-studio-grid {
      display: grid;
      grid-template-columns: 310px 1fr 290px;
      min-height: 860px;
      position: relative;
    }
    @media (max-width: 1200px) {
      .canva-studio-grid {
        grid-template-columns: 280px 1fr 270px;
      }
    }
    @media (max-width: 991px) {
      .canva-studio-grid {
        grid-template-columns: 1fr;
      }
    }

    /* LEFT TOOL DOCK (CANVA-STYLE) */
    .canva-left-dock {
      background: #ffffff;
      border-right: 1px solid #e2e8f0;
      display: flex;
      flex-direction: column;
      z-index: 5;
    }
    .canva-nav-tabs {
      display: flex;
      border-bottom: 1px solid #e2e8f0;
      background: #f8fafc;
      overflow-x: auto;
    }
    .canva-nav-tab {
      padding: 12px 10px;
      font-size: 11.5px;
      font-weight: 700;
      color: #64748b;
      cursor: pointer;
      border: none;
      background: transparent;
      flex: 1;
      text-align: center;
      white-space: nowrap;
      transition: all 0.2s;
      border-bottom: 2px solid transparent;
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 4px;
    }
    .canva-nav-tab i {
      font-size: 14px;
    }
    .canva-nav-tab:hover {
      color: var(--brand-teal);
      background: #f1f5f9;
    }
    .canva-nav-tab.active {
      color: var(--brand-teal);
      background: #ffffff;
      border-bottom-color: var(--brand-teal);
    }

    .canva-tab-content-panel {
      padding: 20px;
      overflow-y: auto;
      max-height: 800px;
    }

    /* Template Cards in Sidebar */
    .tpl-sidebar-card {
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      padding: 10px 12px;
      cursor: pointer;
      transition: all 0.2s;
      background: #ffffff;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .tpl-sidebar-card:hover, .tpl-sidebar-card.active {
      border-color: var(--brand-teal);
      background: #f0fdfa;
      box-shadow: 0 4px 12px rgba(16, 64, 65, 0.08);
    }
    .tpl-icon-box {
      width: 38px;
      height: 38px;
      border-radius: 8px;
      background: #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      color: #334155;
      flex-shrink: 0;
    }
    .tpl-sidebar-card.active .tpl-icon-box {
      background: var(--brand-teal);
      color: #ADFF1C;
    }

    /* Color Swatches */
    .color-swatch-row {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 12px;
    }
    .color-swatch-btn {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      border: 2px solid #ffffff;
      box-shadow: 0 0 0 1px #cbd5e1;
      cursor: pointer;
      display: inline-block;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .color-swatch-btn:hover, .color-swatch-btn.active {
      transform: scale(1.15);
      box-shadow: 0 0 0 2px #0f172a;
    }

    /* Logo Uploader in Sidebar */
    .logo-dropzone {
      border: 2px dashed #cbd5e1;
      border-radius: 12px;
      padding: 16px;
      text-align: center;
      cursor: pointer;
      background: #f8fafc;
      transition: all 0.2s;
    }
    .logo-dropzone:hover {
      border-color: var(--brand-teal);
      background: #f0fdfa;
    }

    /* CENTER CANVAS (INVOICE SHEET) */
    .canva-center-canvas {
      padding: 30px 25px;
      background: #e2e8f0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      overflow-x: auto;
    }
    .canvas-viewport {
      width: 100%;
      max-width: 860px;
      transform-origin: top center;
      transition: transform 0.2s ease;
    }

    /* Printable Invoice Sheet */
    .invoice-sheet {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 45px 45px;
      box-shadow: 0 15px 35px rgba(0,0,0,0.08);
      font-family: var(--inv-font);
      color: var(--inv-text);
      position: relative;
      transition: all 0.2s ease;
      min-height: 980px;
    }

    /* Size variants */
    .invoice-sheet.size-compact { font-size: 13px; padding: 30px 30px; }
    .invoice-sheet.size-standard { font-size: 14.5px; padding: 45px 45px; }
    .invoice-sheet.size-spacious { font-size: 16px; padding: 55px 55px; }

    /* Template Variants */
    .invoice-sheet.template-modern .invoice-header-banner {
      border-bottom: 3px solid var(--inv-primary);
      padding-bottom: 20px;
    }
    .invoice-sheet.template-modern .invoice-table thead {
      background: var(--inv-primary);
      color: #ffffff;
    }
    .invoice-sheet.template-modern .invoice-table thead th {
      color: #ffffff;
      border-color: var(--inv-primary);
    }
    .invoice-sheet.template-corporate .invoice-header-banner {
      background: var(--inv-primary);
      color: #ffffff;
      margin: -45px -45px 30px -45px;
      padding: 35px 45px;
      border-radius: 11px 11px 0 0;
    }
    .invoice-sheet.template-corporate .invoice-header-banner input,
    .invoice-sheet.template-corporate .invoice-header-banner textarea {
      color: #ffffff !important;
    }
    .invoice-sheet.template-corporate .invoice-header-banner .text-muted {
      color: rgba(255,255,255,0.8) !important;
    }
    .invoice-sheet.template-corporate .invoice-table thead {
      background: #f1f5f9;
      color: #0f172a;
      border-top: 2px solid var(--inv-primary);
    }
    .invoice-sheet.template-minimal .invoice-header-banner {
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 15px;
    }
    .invoice-sheet.template-minimal .invoice-table thead {
      background: transparent;
      border-bottom: 2px solid #0f172a;
    }
    .invoice-sheet.template-vibrant .invoice-header-banner {
      border-left: 6px solid var(--inv-primary);
      padding-left: 20px;
      margin-bottom: 25px;
    }

    .editable-input {
      border: 1px dashed transparent;
      padding: 4px 6px;
      border-radius: 6px;
      transition: all 0.2s;
      background: transparent;
      color: inherit;
    }
    .editable-input:hover, .editable-input:focus {
      border-color: #94a3b8;
      background: #f8fafc;
      outline: none;
    }

    .invoice-header-title {
      font-size: 32px;
      font-weight: 900;
      color: var(--inv-primary);
      letter-spacing: -0.5px;
      line-height: 1.1;
    }

    /* Watermark Badge */
    .invoice-watermark {
      position: absolute;
      top: 45%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(-30deg);
      font-size: 76px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 6px;
      pointer-events: none;
      user-select: none;
      z-index: 10;
      opacity: 0.12;
      border: 7px dashed currentColor;
      padding: 10px 35px;
      border-radius: 16px;
      display: none;
    }
    .invoice-watermark.watermark-paid { color: #16a34a; display: block; }
    .invoice-watermark.watermark-draft { color: #64748b; display: block; }
    .invoice-watermark.watermark-pending { color: #d97706; display: block; }
    .invoice-watermark.watermark-overdue { color: #dc2626; display: block; }

    /* RIGHT INSPECTOR DOCK (CANVA-STYLE) */
    .canva-right-dock {
      background: #ffffff;
      border-left: 1px solid #e2e8f0;
      padding: 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      z-index: 5;
    }
    .inspector-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 16px;
    }
    .inspector-title {
      font-size: 13px;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      color: #334155;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    /* History list item */
    .history-mini-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      padding: 10px;
      margin-bottom: 8px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .history-mini-card:hover {
      border-color: var(--brand-teal);
      background: #f0fdfa;
    }

    /* Print styling */
    @media print {
      body * { visibility: hidden; }
      #printableInvoice, #printableInvoice * { visibility: visible; }
      #printableInvoice {
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
        border: none !important;
        box-shadow: none !important;
        padding: 20px 30px !important;
        margin: 0 !important;
        min-height: auto !important;
      }
      .no-print { display: none !important; }
      .editable-input { border: none !important; padding: 0 !important; }
      .invoice-header-banner input, .invoice-header-banner textarea { color: inherit !important; }
    }

    .content-section h2 {
      font-size: 22px;
      font-weight: 800;
      color: #0f172a;
      margin-top: 35px;
      margin-bottom: 15px;
    }
    .content-section p, .content-section li {
      color: #475569;
      font-size: 15px;
      line-height: 1.7;
    }
    .faq-card {
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      margin-bottom: 12px;
      background: #fff;
    }
    .faq-card summary {
      padding: 15px 20px;
      font-weight: 700;
      cursor: pointer;
      color: #0f172a;
    }
    .faq-card p {
      padding: 0 20px 15px;
      color: #64748b;
      margin: 0;
    }
  </style>
</head>
<body class="homepage4-body">

  <?php include_once dirname(__DIR__) . "/includes/header.php" ?>

  <!-- HERO -->
  <div class="tool-hero text-center no-print">
    <div class="container">
      <nav aria-label="breadcrumb">
        <div class="site-breadcrumb">
          <a href="<?= $site ?>"><i class="fa-solid fa-house fa-xs"></i> Home</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <a href="<?= $site ?>free-tools/">Free Tools</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <span class="bc-current">Invoice Studio</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Invoice Generator India — PDF Download with GST</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 720px; font-size: 16px;">
        Interactive dual-dock workspace with drag-and-drop templates, custom corporate branding, live QR generation, and browser history storage.
      </p>
    </div>
  </div>

  <div class="container-fluid px-lg-4 my-4 no-print">
    
    <!-- =======================================================
         CANVA-STYLE STUDIO APP CONTAINER
         ======================================================= -->
    <div class="canva-studio-wrapper">
      
      <!-- Studio Top Navbar -->
      <div class="canva-topbar">
        <div class="canva-topbar-title">
          <span class="canva-topbar-badge"><i class="fa-solid fa-wand-magic-sparkles me-1"></i> Invoice Studio</span>
          <span class="fw-bold text-white small" id="activeInvoiceNameDisplay">INV-2026-001</span>
          <span class="autosave-pill ms-2"><span class="pulse-save-dot"></span> LocalStorage Synced</span>
        </div>

        <!-- Zoom & Viewport Controls -->
        <div class="d-none d-md-flex align-items-center gap-2 bg-dark px-3 py-1 rounded-pill border border-secondary">
          <small class="text-white-50">Zoom:</small>
          <button type="button" class="btn btn-sm btn-link text-white p-0" onclick="adjustZoom(-0.1)" title="Zoom Out"><i class="fa-solid fa-magnifying-glass-minus"></i></button>
          <span class="small fw-bold text-light" id="zoomLevelDisplay">100%</span>
          <button type="button" class="btn btn-sm btn-link text-white p-0" onclick="adjustZoom(0.1)" title="Zoom In"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
          <button type="button" class="btn btn-sm btn-link text-warning p-0 ms-2" onclick="resetZoom()" title="Reset Zoom">Fit</button>
        </div>

        <!-- Quick Action Buttons -->
        <div class="d-flex align-items-center gap-2 flex-wrap">
          <button type="button" class="btn btn-success btn-sm fw-bold" onclick="saveCurrentInvoiceToHistory()">
            <i class="fa-solid fa-floppy-disk me-1"></i> Save Draft
          </button>
          <button type="button" class="btn btn-primary btn-sm fw-bold px-3" onclick="window.print()">
            <i class="fa-solid fa-print me-1"></i> Print / PDF
          </button>
        </div>
      </div>

      <!-- 3-Column Studio Grid -->
      <div class="canva-studio-grid">
        
        <!-- ===================================================
             1. LEFT DOCK: TOOLS & DESIGN (CANVA STYLE)
             =================================================== -->
        <div class="canva-left-dock">
          
          <!-- Nav Tabs -->
          <div class="canva-nav-tabs">
            <button type="button" class="canva-nav-tab active" data-tab="templates">
              <i class="fa-solid fa-layer-group"></i> Templates
            </button>
            <button type="button" class="canva-nav-tab" data-tab="brand">
              <i class="fa-solid fa-palette"></i> Brand &amp; Logo
            </button>
            <button type="button" class="canva-nav-tab" data-tab="typography">
              <i class="fa-solid fa-font"></i> Typography
            </button>
            <button type="button" class="canva-nav-tab" data-tab="payment">
              <i class="fa-solid fa-qrcode"></i> Pay &amp; QR
            </button>
            <button type="button" class="canva-nav-tab" data-tab="history">
              <i class="fa-solid fa-clock-rotate-left"></i> History
            </button>
          </div>

          <!-- Tab Panels -->
          <div class="canva-tab-content-panel">
            
            <!-- PANEL 1: TEMPLATES -->
            <div class="tab-pane-view" id="pane-templates">
              <label class="form-label fw-bold text-dark small mb-2">Choose Layout Template</label>
              
              <div class="tpl-sidebar-card active" data-template="modern" onclick="setTemplate('modern')">
                <div class="tpl-icon-box"><i class="fa-solid fa-cube"></i></div>
                <div>
                  <strong class="d-block text-dark small">Modern Minimal</strong>
                  <span class="text-muted" style="font-size: 11px;">Teal colored head bar, crisp border</span>
                </div>
              </div>

              <div class="tpl-sidebar-card" data-template="corporate" onclick="setTemplate('corporate')">
                <div class="tpl-icon-box"><i class="fa-solid fa-building-columns"></i></div>
                <div>
                  <strong class="d-block text-dark small">Classic Corporate</strong>
                  <span class="text-muted" style="font-size: 11px;">Full top header brand banner</span>
                </div>
              </div>

              <div class="tpl-sidebar-card" data-template="vibrant" onclick="setTemplate('vibrant')">
                <div class="tpl-icon-box"><i class="fa-solid fa-sparkles"></i></div>
                <div>
                  <strong class="d-block text-dark small">Creative Accent</strong>
                  <span class="text-muted" style="font-size: 11px;">Bold colored border stripe &amp; pill badges</span>
                </div>
              </div>

              <div class="tpl-sidebar-card" data-template="minimal" onclick="setTemplate('minimal')">
                <div class="tpl-icon-box"><i class="fa-solid fa-feather"></i></div>
                <div>
                  <strong class="d-block text-dark small">Refined Clean</strong>
                  <span class="text-muted" style="font-size: 11px;">Elegant typography, subtle dividers</span>
                </div>
              </div>
            </div>

            <!-- PANEL 2: BRAND & LOGO -->
            <div class="tab-pane-view" id="pane-brand" style="display: none;">
              
              <!-- Logo Upload -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark small d-flex justify-content-between">
                  <span>Business Logo</span>
                  <a href="javascript:void(0)" class="text-danger small" id="removeLogoBtn" style="display:none;" onclick="removeBrandLogo()">Remove</a>
                </label>
                <input type="file" id="logoFileInput" accept="image/*" style="display:none;" onchange="handleLogoUpload(this)">
                <div id="logoPlaceholder" class="logo-dropzone" onclick="$('#logoFileInput').click()">
                  <i class="fa-solid fa-cloud-arrow-up fs-3 text-secondary d-block mb-1"></i>
                  <span class="small text-muted">Upload Logo (.png, .jpg, .svg)</span>
                </div>
                <img id="logoImgPreview" src="" alt="Brand Logo" class="img-fluid rounded border p-2 bg-white" style="display:none; max-height: 70px; cursor:pointer;" onclick="$('#logoFileInput').click()" title="Click to change logo">
              </div>

              <!-- Brand Colors -->
              <div class="mb-4">
                <label class="form-label fw-bold text-dark small">Brand Primary Color</label>
                <div class="color-swatch-row">
                  <button type="button" class="color-swatch-btn active" style="background:#104041;" data-color="#104041" onclick="setBrandColor('#104041')" title="Teal Emerald"></button>
                  <button type="button" class="color-swatch-btn" style="background:#2563eb;" data-color="#2563eb" onclick="setBrandColor('#2563eb')" title="Royal Blue"></button>
                  <button type="button" class="color-swatch-btn" style="background:#0f172a;" data-color="#0f172a" onclick="setBrandColor('#0f172a')" title="Sleek Slate"></button>
                  <button type="button" class="color-swatch-btn" style="background:#7c3aed;" data-color="#7c3aed" onclick="setBrandColor('#7c3aed')" title="Imperial Purple"></button>
                  <button type="button" class="color-swatch-btn" style="background:#dc2626;" data-color="#dc2626" onclick="setBrandColor('#dc2626')" title="Ruby Crimson"></button>
                  <button type="button" class="color-swatch-btn" style="background:#d97706;" data-color="#d97706" onclick="setBrandColor('#d97706')" title="Warm Amber"></button>
                </div>
                <div class="input-group input-group-sm">
                  <span class="input-group-text"><i class="fa-solid fa-eye-dropper"></i></span>
                  <input type="color" id="customColorPicker" class="form-control form-control-color" value="#104041" onchange="setBrandColor(this.value)" style="max-width: 45px;">
                  <input type="text" id="customColorHex" class="form-control" value="#104041" oninput="setBrandColor(this.value)" placeholder="#104041">
                </div>
              </div>

              <!-- Watermark -->
              <div>
                <label class="form-label fw-bold text-dark small">Watermark Stamp</label>
                <select id="watermarkSelect" class="form-select form-select-sm" onchange="changeWatermark(this.value)">
                  <option value="none" selected>None (Clean)</option>
                  <option value="PAID">PAID</option>
                  <option value="DRAFT">DRAFT</option>
                  <option value="PENDING">PENDING</option>
                  <option value="OVERDUE">OVERDUE</option>
                </select>
              </div>

            </div>

            <!-- PANEL 3: TYPOGRAPHY & STYLE -->
            <div class="tab-pane-view" id="pane-typography" style="display: none;">
              
              <div class="mb-3">
                <label class="form-label fw-bold text-dark small">Font Family</label>
                <select id="invFontFamily" class="form-select form-select-sm" onchange="changeFontFamily(this.value)">
                  <option value="'Inter', sans-serif" selected>Inter (Modern Sans)</option>
                  <option value="'Poppins', sans-serif">Poppins (Clean &amp; Bold)</option>
                  <option value="'Roboto', sans-serif">Roboto (Tech Standard)</option>
                  <option value="'Merriweather', serif">Merriweather (Classic Serif)</option>
                  <option value="'Roboto Mono', monospace">Monospace (Code / Tech)</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold text-dark small">Document Spacing</label>
                <select id="invDensity" class="form-select form-select-sm" onchange="changeDensity(this.value)">
                  <option value="compact">Compact (Fit more items)</option>
                  <option value="standard" selected>Standard Layout</option>
                  <option value="spacious">Spacious / Large</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold text-dark small">Currency Symbol</label>
                <select id="invCurrency" class="form-select form-select-sm" onchange="recalculateInvoice()">
                  <option value="₹" selected>INR (₹)</option>
                  <option value="$">USD ($)</option>
                  <option value="€">EUR (€)</option>
                  <option value="£">GBP (£)</option>
                  <option value="AED ">AED (United Arab Emirates)</option>
                  <option value="C$">CAD (C$)</option>
                  <option value="A$">AUD (A$)</option>
                  <option value="S$">SGD (S$)</option>
                </select>
              </div>

              <div>
                <label class="form-label fw-bold text-dark small">Tax Configuration</label>
                <div class="input-group input-group-sm mb-2">
                  <span class="input-group-text">Label</span>
                  <input type="text" id="taxLabelInput" class="form-control" value="GST / Tax" placeholder="e.g. GST, VAT">
                </div>
                <div class="input-group input-group-sm">
                  <span class="input-group-text">Rate %</span>
                  <input type="number" id="taxPercent" class="form-control" value="18" min="0" max="100" step="any" oninput="recalculateInvoice()">
                </div>
              </div>

            </div>

            <!-- PANEL 4: PAYMENT & QR -->
            <div class="tab-pane-view" id="pane-payment" style="display: none;">
              
              <div class="mb-3">
                <label class="form-label fw-bold text-dark small">UPI ID for Pay QR</label>
                <input type="text" id="upiIdInput" class="form-control form-control-sm" value="8368552640@upi" placeholder="e.g. yourname@upi" oninput="renderPaymentQR()">
                <small class="text-muted" style="font-size:11px;">Generates live scan-to-pay QR code on invoice.</small>
              </div>

              <div class="mb-3">
                <label class="form-label fw-bold text-dark small">Authorized Signatory</label>
                <input type="text" id="signatoryNameInput" class="form-control form-control-sm" value="Nikhil Gupta" placeholder="Your Name" oninput="$('#signatoryDisplay').val(this.value)">
              </div>

              <div>
                <label class="form-label fw-bold text-dark small">Terms &amp; Conditions Preset</label>
                <select class="form-select form-select-sm" onchange="$('#termsConditionsInput').val(this.value)">
                  <option value="1. Payment is requested within 15 days of invoice date.&#10;2. Goods/services once delivered are subject to our standard SLA.">Standard Net 15</option>
                  <option value="1. Payment is due immediately upon receipt.&#10;2. Late payments subject to 2% monthly interest fee.">Due Upon Receipt</option>
                  <option value="1. 50% milestone payment received. Balance due upon final deployment.&#10;2. Source code transfer upon full settlement.">Milestone / Staged</option>
                </select>
              </div>

            </div>

            <!-- PANEL 5: HISTORY -->
            <div class="tab-pane-view" id="pane-history" style="display: none;">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <label class="form-label fw-bold text-dark small mb-0">Saved Invoices (<span id="historyCountSidebar">0</span>)</label>
                <button type="button" class="btn btn-link text-danger p-0 small" style="font-size:11px;" onclick="clearAllHistory()">Clear All</button>
              </div>

              <div id="sidebarHistoryList">
                <!-- Populated via JS -->
              </div>

              <div id="sidebarEmptyHistory" class="text-center py-4 text-muted">
                <i class="fa-solid fa-receipt fs-3 opacity-50 mb-1"></i>
                <p class="small mb-0">No saved invoices yet.<br>Click "Save Draft" to bookmark.</p>
              </div>
            </div>

          </div>

        </div>

        <!-- ===================================================
             2. CENTER CANVAS: LIVE A4 INVOICE SHEET
             =================================================== -->
        <div class="canva-center-canvas">
          <div class="canvas-viewport" id="canvasViewport">
            
            <div class="invoice-sheet template-modern size-standard" id="printableInvoice">
              
              <!-- Watermark -->
              <div id="watermarkOverlay" class="invoice-watermark">PAID</div>

              <!-- Top Header Banner -->
              <div class="invoice-header-banner row align-items-start mb-4">
                <div class="col-md-7">
                  
                  <!-- Logo inside invoice -->
                  <div id="invoiceLogoContainer" class="mb-3" style="display:none;">
                    <img id="invoiceLogoImg" src="" alt="Business Logo" style="max-height: 65px; max-width: 220px; object-fit: contain;">
                  </div>

                  <input type="text" id="businessNameInput" class="form-control form-control-lg fw-bold editable-input fs-4 text-dark mb-1" value="NikhilWorks" placeholder="Your Business / Agency Name">
                  <textarea id="businessDetailsInput" class="form-control editable-input small text-muted" rows="3" placeholder="Your Address, City, GSTIN, Email, Phone">Karampura, New Delhi, India 110015&#10;Email: contact@nikhilworks.com&#10;Phone: +91 8368552640</textarea>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                  <div class="invoice-header-title" id="invoiceHeadingText">INVOICE</div>
                  <div class="d-flex align-items-center justify-content-md-end gap-2 mt-2">
                    <span class="small fw-bold text-muted">Invoice #:</span>
                    <input type="text" id="invoiceNumberInput" class="form-control form-control-sm editable-input fw-bold text-end" style="width: 140px;" value="INV-2026-001" oninput="$('#activeInvoiceNameDisplay').text(this.value)">
                  </div>
                  <div class="d-flex align-items-center justify-content-md-end gap-2 mt-1">
                    <span class="small fw-bold text-muted">Date:</span>
                    <input type="date" id="invoiceDateInput" class="form-control form-control-sm editable-input text-end" style="width: 140px;" value="<?= date('Y-m-d') ?>">
                  </div>
                  <div class="d-flex align-items-center justify-content-md-end gap-2 mt-1">
                    <span class="small fw-bold text-muted">Due Date:</span>
                    <input type="date" id="invoiceDueDateInput" class="form-control form-control-sm editable-input text-end" style="width: 140px;" value="<?= date('Y-m-d', strtotime('+15 days')) ?>">
                  </div>
                </div>
              </div>

              <!-- Bill To & Payment Terms -->
              <div class="row g-3 py-3 border-top border-bottom mb-4">
                <div class="col-md-7">
                  <small class="text-uppercase fw-bold text-muted d-block mb-1">Billed To:</small>
                  <input type="text" id="clientNameInput" class="form-control editable-input fw-bold text-dark fs-6" value="Acme Corporation" placeholder="Client Name / Business Name">
                  <textarea id="clientDetailsInput" class="form-control editable-input small text-muted mt-1" rows="2" placeholder="Client Address, Email, GSTIN / VAT Number">123 Business Boulevard, Tech City&#10;Email: billing@client.com</textarea>
                </div>
                <div class="col-md-5 text-md-end">
                  <small class="text-uppercase fw-bold text-muted d-block mb-1">Payment Status / Terms:</small>
                  <input type="text" id="paymentStatusInput" class="form-control editable-input fw-bold text-md-end text-success" value="Net 15 Days (Due Upon Receipt)" placeholder="e.g. Paid in Full / Due in 15 Days">
                  <div class="d-flex align-items-center justify-content-md-end gap-2 mt-2">
                    <span class="small fw-bold text-muted">PO Number:</span>
                    <input type="text" id="poNumberInput" class="form-control form-control-sm editable-input text-end" style="width: 130px;" placeholder="Optional PO#">
                  </div>
                </div>
              </div>

              <!-- Line Items Table -->
              <div class="table-responsive mb-3">
                <table class="table table-bordered align-middle invoice-table" id="itemsTable">
                  <thead>
                    <tr>
                      <th style="min-width: 250px;">Item / Service Description</th>
                      <th style="width: 90px;" class="text-center">Qty / Hrs</th>
                      <th style="width: 140px;" class="text-end">Rate (<span class="cur-symbol">₹</span>)</th>
                      <th style="width: 140px;" class="text-end">Total (<span class="cur-symbol">₹</span>)</th>
                      <th style="width: 40px;" class="no-print"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="item-row">
                      <td><input type="text" class="form-control editable-input fw-semibold item-desc" value="Custom Website Design &amp; Development" placeholder="Description of service or item"></td>
                      <td><input type="number" class="form-control editable-input text-center item-qty" value="1" min="1" step="any" oninput="recalculateInvoice()"></td>
                      <td><input type="number" class="form-control editable-input text-end item-price" value="15000" min="0" step="any" oninput="recalculateInvoice()"></td>
                      <td class="text-end fw-bold item-total">₹15,000.00</td>
                      <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                    <tr class="item-row">
                      <td><input type="text" class="form-control editable-input fw-semibold item-desc" value="Technical SEO Setup &amp; Speed Optimization" placeholder="Description of service or item"></td>
                      <td><input type="number" class="form-control editable-input text-center item-qty" value="1" min="1" step="any" oninput="recalculateInvoice()"></td>
                      <td><input type="number" class="form-control editable-input text-end item-price" value="5000" min="0" step="any" oninput="recalculateInvoice()"></td>
                      <td class="text-end fw-bold item-total">₹5,000.00</td>
                      <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="mb-4 no-print">
                <button type="button" class="btn btn-outline-primary btn-sm fw-bold" onclick="addItemRow()">
                  <i class="fa-solid fa-plus me-1"></i> Add Line Item
                </button>
              </div>

              <!-- Totals & Tax Row -->
              <div class="row justify-content-between align-items-start mt-2">
                
                <!-- Payment Info & QR -->
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="p-3 bg-light rounded-3 border">
                    <small class="text-uppercase fw-bold text-muted d-block mb-1">Bank &amp; Payment Instructions:</small>
                    <textarea id="paymentNotesInput" class="form-control editable-input small text-muted" rows="3" placeholder="UPI ID: nikhil@upi | Bank: HDFC Bank | A/C: 123456789 | IFSC: HDFC0001234">UPI ID: 8368552640@upi&#10;Bank Transfer / IMPS / Wire accepted.&#10;Thank you for partnering with us!</textarea>
                    
                    <!-- Optional Payment QR Box -->
                    <div class="mt-2 pt-2 border-top d-flex align-items-center gap-3">
                      <div id="invoiceQrBox" style="width: 70px; height: 70px; background:#fff; padding:4px; border:1px solid #cbd5e1; border-radius:6px;"></div>
                      <div class="small">
                        <strong class="d-block text-dark">Instant Pay QR</strong>
                        <span class="text-muted" style="font-size:11px;">Scan with GooglePay / PhonePe / Paytm / Bank App</span>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Calculations Column -->
                <div class="col-md-5">
                  <div class="d-flex justify-content-between py-1">
                    <span class="text-muted fw-bold">Subtotal:</span>
                    <strong id="subTotalDisplay">₹20,000.00</strong>
                  </div>
                  
                  <div class="d-flex justify-content-between align-items-center py-1">
                    <div class="d-flex align-items-center gap-1">
                      <span class="text-muted fw-bold" id="displayTaxLabel">GST / Tax (%):</span>
                    </div>
                    <strong id="taxAmountDisplay">₹3,600.00</strong>
                  </div>

                  <div class="d-flex justify-content-between align-items-center py-1">
                    <div class="d-flex align-items-center gap-1">
                      <span class="text-muted fw-bold">Discount (<span class="cur-symbol">₹</span>):</span>
                      <input type="number" id="discountAmount" class="form-control form-control-sm editable-input text-end" style="width: 85px;" value="0" min="0" step="any" oninput="recalculateInvoice()">
                    </div>
                    <strong class="text-danger" id="discountDisplay">-₹0.00</strong>
                  </div>

                  <div class="d-flex justify-content-between py-2 border-top border-2 border-dark mt-2" style="border-color: var(--inv-primary) !important;">
                    <span class="fs-5 fw-extrabold text-dark">Total Due:</span>
                    <strong class="fs-5 fw-extrabold" style="color: var(--inv-primary);" id="grandTotalDisplay">₹23,600.00</strong>
                  </div>
                </div>

              </div>

              <!-- Terms & Authorized Signatory -->
              <div class="row align-items-end mt-4 pt-3 border-top">
                <div class="col-md-7">
                  <small class="text-uppercase fw-bold text-muted d-block mb-1">Terms &amp; Conditions:</small>
                  <textarea id="termsConditionsInput" class="form-control editable-input small text-muted" rows="2" placeholder="Terms and conditions">1. Payment is requested within 15 days of invoice date.&#10;2. Goods/services once delivered are subject to our standard SLA.</textarea>
                </div>
                <div class="col-md-5 text-md-end mt-3 mt-md-0">
                  <input type="text" id="signatoryDisplay" class="form-control editable-input fw-bold text-md-end text-dark" value="Nikhil Gupta" placeholder="Authorized Signatory Name" oninput="$('#signatoryNameInput').val(this.value)">
                  <small class="text-muted d-block">Authorized Signatory / Founder</small>
                </div>
              </div>

            </div>

          </div>
        </div>

        <!-- ===================================================
             3. RIGHT DOCK: SUMMARY, EXPORT & QUICK ACTIONS
             =================================================== -->
        <div class="canva-right-dock">
          
          <!-- Live Summary Card -->
          <div class="inspector-card">
            <div class="inspector-title"><i class="fa-solid fa-receipt text-primary"></i> Invoice Summary</div>
            <div class="d-flex justify-content-between mb-1 small">
              <span class="text-muted">Total Due:</span>
              <strong class="text-dark fs-5" id="inspectorTotalDisplay">₹23,600.00</strong>
            </div>
            <div class="d-flex justify-content-between mb-2 small text-muted">
              <span>Items Count:</span>
              <strong id="inspectorItemCountDisplay">2 items</strong>
            </div>
            <div class="d-grid gap-2 mt-3">
              <button type="button" class="btn btn-primary fw-bold" onclick="window.print()">
                <i class="fa-solid fa-file-pdf me-1"></i> Download PDF / Print
              </button>
              <button type="button" class="btn btn-outline-success fw-bold" onclick="sendInvoiceWhatsApp()">
                <i class="fa-brands fa-whatsapp me-1"></i> Send via WhatsApp
              </button>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="inspector-card">
            <div class="inspector-title"><i class="fa-solid fa-bolt text-warning"></i> Quick Tools</div>
            <div class="d-grid gap-2">
              <button type="button" class="btn btn-outline-dark btn-sm text-start" onclick="copyInvoiceTextSummary()">
                <i class="fa-regular fa-copy me-2 text-secondary"></i> Copy Text Receipt
              </button>
              <button type="button" class="btn btn-outline-dark btn-sm text-start" onclick="duplicateCurrentInvoice()">
                <i class="fa-regular fa-clone me-2 text-secondary"></i> Duplicate as New
              </button>
              <button type="button" class="btn btn-outline-secondary btn-sm text-start" onclick="createNewInvoice()">
                <i class="fa-solid fa-file-circle-plus me-2 text-secondary"></i> Clear &amp; New Invoice
              </button>
            </div>
          </div>

          <!-- Trust & Privacy Badge -->
          <div class="text-center p-2 rounded-3 bg-light border small text-muted">
            <i class="fa-solid fa-shield-halved text-success me-1"></i> <strong>100% Private &amp; Offline</strong>
            <div style="font-size:11px;" class="mt-1">Processed locally on your device. Zero cloud data storage.</div>
          </div>

        </div>

      </div>

    </div>

    <!-- CONTENT SECTION (SEO & Instructions) -->
    <div class="content-section mt-5 no-print" style="max-width: 960px; margin: 0 auto;">
      <h2>How to Generate Custom Invoices with the Studio</h2>
      <ol>
        <li><strong>Select a Template:</strong> Browse the left dock to choose between Modern Minimal, Classic Corporate, Creative Accent, or Refined Clean.</li>
        <li><strong>Brand Your Invoice:</strong> Upload your company logo, pick your corporate brand color or enter your exact hex code, and select your font.</li>
        <li><strong>Fill Billing Deliverables:</strong> Edit item descriptions, quantities, unit prices, and GST/VAT percentage.</li>
        <li><strong>Save, Print or Share:</strong> Download your water-mark free PDF or instantly send a pre-filled invoice reminder to your client via WhatsApp.</li>
      </ol>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Will my invoices stay saved when I close the browser?</summary>
        <p>Yes! Every time you click "Save Draft", the invoice is safely stored in your browser's private LocalStorage memory. You can reload or duplicate it anytime from the History tab.</p>
      </details>
      <details class="faq-card">
        <summary>Can I download the invoice as a PDF with Indian GST calculations?</summary>
        <p>Yes. You can add your 15-digit GSTIN number, client GSTIN, SAC/HSN codes, and customize the 18%, 12%, or 5% tax slab.</p>
      </details>
      <details class="faq-card">
        <summary>Is my data uploaded to any server?</summary>
        <p>No. Everything runs 100% locally in your client browser. Your financial details remain completely private to your device.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/gst-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-calculator text-warning me-1"></i> GST Calculator</a></h6>
            <small class="text-muted">Calculate GST Inclusive &amp; Exclusive tax amounts.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/profit-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-chart-line text-primary me-1"></i> Profit Calculator</a></h6>
            <small class="text-muted">Calculate markup &amp; profit margin percentages.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/whatsapp-link/" class="text-decoration-none text-dark"><i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp Link Generator</a></h6>
            <small class="text-muted">Generate direct click-to-chat links with prefilled invoice reminders.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1 no-print" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Custom Invoicing &amp; CRM Billing Software?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks develops bespoke SaaS billing platforms, recurring invoice engines, automated PDF dispatch, and payment gateway webhooks.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Custom Software Quote <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    const STORAGE_KEY = 'nikhilworks_invoice_history_v1';
    let currentBrandColor = '#104041';
    let currentLogoBase64 = '';
    let currentZoom = 1.0;

    function getCur() {
      return $('#invCurrency').val();
    }

    function formatMoney(val) {
      const cur = getCur();
      return cur + Number(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    /* Tab Switching in Left Dock */
    $('.canva-nav-tab').on('click', function() {
      $('.canva-nav-tab').removeClass('active');
      $(this).addClass('active');
      const target = $(this).data('tab');
      $('.tab-pane-view').hide();
      $('#pane-' + target).fadeIn(150);
      if (target === 'history') {
        renderSidebarHistoryList();
      }
    });

    /* Zoom Controls */
    function adjustZoom(delta) {
      currentZoom = Math.min(1.3, Math.max(0.6, currentZoom + delta));
      $('#canvasViewport').css('transform', `scale(${currentZoom})`);
      $('#zoomLevelDisplay').text(Math.round(currentZoom * 100) + '%');
    }
    function resetZoom() {
      currentZoom = 1.0;
      $('#canvasViewport').css('transform', 'none');
      $('#zoomLevelDisplay').text('100%');
    }

    /* Branding & Styling */
    function setBrandColor(color) {
      if (!color) return;
      currentBrandColor = color;
      document.documentElement.style.setProperty('--inv-primary', color);
      $('#customColorPicker').val(color);
      $('#customColorHex').val(color);
      
      $('.color-swatch-btn').each(function() {
        if ($(this).data('color') === color) {
          $(this).addClass('active');
        } else {
          $(this).removeClass('active');
        }
      });
    }

    function changeFontFamily(font) {
      document.documentElement.style.setProperty('--inv-font', font);
    }

    function changeDensity(density) {
      $('#printableInvoice')
        .removeClass('size-compact size-standard size-spacious')
        .addClass('size-' + density);
    }

    function changeWatermark(status) {
      const wm = $('#watermarkOverlay');
      wm.removeClass('watermark-paid watermark-draft watermark-pending watermark-overdue');
      if (status !== 'none') {
        wm.text(status).addClass('watermark-' + status.toLowerCase());
      }
    }

    function setTemplate(tpl) {
      $('.tpl-sidebar-card').removeClass('active');
      $(`.tpl-sidebar-card[data-template="${tpl}"]`).addClass('active');
      $('#printableInvoice')
        .removeClass('template-modern template-corporate template-minimal template-vibrant')
        .addClass('template-' + tpl);
    }

    function handleLogoUpload(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          currentLogoBase64 = e.target.result;
          $('#logoImgPreview').attr('src', currentLogoBase64).show();
          $('#logoPlaceholder').hide();
          $('#removeLogoBtn').show();
          
          $('#invoiceLogoImg').attr('src', currentLogoBase64);
          $('#invoiceLogoContainer').show();
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    function removeBrandLogo() {
      currentLogoBase64 = '';
      $('#logoFileInput').val('');
      $('#logoImgPreview').hide().attr('src', '');
      $('#logoPlaceholder').show();
      $('#removeLogoBtn').hide();
      $('#invoiceLogoContainer').hide().find('img').attr('src', '');
    }

    function renderPaymentQR() {
      const upi = $('#upiIdInput').val() || '8368552640@upi';
      const qrBox = document.getElementById('invoiceQrBox');
      qrBox.innerHTML = '';
      const text = `upi://pay?pa=${encodeURIComponent(upi)}&pn=NikhilWorks&cu=INR`;
      try {
        new QRCode(qrBox, {
          text: text,
          width: 62,
          height: 62,
          colorDark: "#104041",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.M
        });
      } catch (e) {
        console.log('QR error', e);
      }
    }

    function recalculateInvoice() {
      const cur = getCur();
      $('.cur-symbol').text(cur);

      let subtotal = 0;
      let itemCount = 0;
      $('.item-row').each(function() {
        const qty = parseFloat($(this).find('.item-qty').val()) || 0;
        const price = parseFloat($(this).find('.item-price').val()) || 0;
        const rowTotal = qty * price;
        subtotal += rowTotal;
        itemCount++;
        $(this).find('.item-total').text(formatMoney(rowTotal));
      });

      const taxLabel = $('#taxLabelInput').val() || 'GST / Tax';
      const taxP = parseFloat($('#taxPercent').val()) || 0;
      $('#displayTaxLabel').text(`${taxLabel} (${taxP}%):`);

      const taxAmt = (subtotal * taxP) / 100;
      const discount = parseFloat($('#discountAmount').val()) || 0;
      const grandTotal = Math.max(0, (subtotal + taxAmt) - discount);

      $('#subTotalDisplay').text(formatMoney(subtotal));
      $('#taxAmountDisplay').text(formatMoney(taxAmt));
      $('#discountDisplay').text('-' + formatMoney(discount));
      $('#grandTotalDisplay').text(formatMoney(grandTotal));

      // Update Right Inspector
      $('#inspectorTotalDisplay').text(formatMoney(grandTotal));
      $('#inspectorItemCountDisplay').text(`${itemCount} item${itemCount === 1 ? '' : 's'}`);
    }

    function addItemRow(desc = '', qty = 1, price = 1000) {
      const newRow = `
        <tr class="item-row">
          <td><input type="text" class="form-control editable-input fw-semibold item-desc" value="${desc}" placeholder="New Item / Service Description"></td>
          <td><input type="number" class="form-control editable-input text-center item-qty" value="${qty}" min="1" step="any" oninput="recalculateInvoice()"></td>
          <td><input type="number" class="form-control editable-input text-end item-price" value="${price}" min="0" step="any" oninput="recalculateInvoice()"></td>
          <td class="text-end fw-bold item-total">${formatMoney(qty * price)}</td>
          <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
      `;
      $('#itemsTable tbody').append(newRow);
      recalculateInvoice();
    }

    function removeItemRow(btn) {
      if ($('.item-row').length > 1) {
        $(btn).closest('.item-row').remove();
        recalculateInvoice();
      } else {
        alert('Invoice must contain at least one line item.');
      }
    }

    /* Invoice Data Serializer */
    function getInvoiceObject() {
      const items = [];
      $('.item-row').each(function() {
        items.push({
          desc: $(this).find('.item-desc').val(),
          qty: parseFloat($(this).find('.item-qty').val()) || 0,
          price: parseFloat($(this).find('.item-price').val()) || 0
        });
      });

      return {
        id: 'inv_' + Date.now(),
        invoiceNumber: $('#invoiceNumberInput').val() || 'INV-001',
        invoiceDate: $('#invoiceDateInput').val(),
        invoiceDueDate: $('#invoiceDueDateInput').val(),
        businessName: $('#businessNameInput').val(),
        businessDetails: $('#businessDetailsInput').val(),
        clientName: $('#clientNameInput').val(),
        clientDetails: $('#clientDetailsInput').val(),
        paymentStatus: $('#paymentStatusInput').val(),
        poNumber: $('#poNumberInput').val(),
        currency: $('#invCurrency').val(),
        taxLabel: $('#taxLabelInput').val(),
        taxPercent: parseFloat($('#taxPercent').val()) || 0,
        discountAmount: parseFloat($('#discountAmount').val()) || 0,
        paymentNotes: $('#paymentNotesInput').val(),
        upiId: $('#upiIdInput').val(),
        termsConditions: $('#termsConditionsInput').val(),
        signatoryName: $('#signatoryNameInput').val(),
        brandColor: currentBrandColor,
        fontFamily: $('#invFontFamily').val(),
        density: $('#invDensity').val(),
        watermark: $('#watermarkSelect').val(),
        template: $('.tpl-sidebar-card.active').data('template') || 'modern',
        logoBase64: currentLogoBase64,
        items: items,
        savedAt: new Date().toISOString()
      };
    }

    function loadInvoiceObject(inv) {
      $('#invoiceNumberInput').val(inv.invoiceNumber);
      $('#activeInvoiceNameDisplay').text(inv.invoiceNumber);
      $('#invoiceDateInput').val(inv.invoiceDate);
      $('#invoiceDueDateInput').val(inv.invoiceDueDate);
      $('#businessNameInput').val(inv.businessName);
      $('#businessDetailsInput').val(inv.businessDetails);
      $('#clientNameInput').val(inv.clientName);
      $('#clientDetailsInput').val(inv.clientDetails);
      $('#paymentStatusInput').val(inv.paymentStatus);
      $('#poNumberInput').val(inv.poNumber || '');
      $('#invCurrency').val(inv.currency || '₹');
      $('#taxLabelInput').val(inv.taxLabel || 'GST / Tax');
      $('#taxPercent').val(inv.taxPercent || 0);
      $('#discountAmount').val(inv.discountAmount || 0);
      $('#paymentNotesInput').val(inv.paymentNotes);
      if (inv.upiId) $('#upiIdInput').val(inv.upiId);
      $('#termsConditionsInput').val(inv.termsConditions);
      $('#signatoryNameInput').val(inv.signatoryName);
      $('#signatoryDisplay').val(inv.signatoryName);

      if (inv.brandColor) setBrandColor(inv.brandColor);
      if (inv.fontFamily) {
        $('#invFontFamily').val(inv.fontFamily);
        changeFontFamily(inv.fontFamily);
      }
      if (inv.density) {
        $('#invDensity').val(inv.density);
        changeDensity(inv.density);
      }
      if (inv.watermark) {
        $('#watermarkSelect').val(inv.watermark);
        changeWatermark(inv.watermark);
      }
      if (inv.template) setTemplate(inv.template);

      if (inv.logoBase64) {
        currentLogoBase64 = inv.logoBase64;
        $('#logoImgPreview').attr('src', currentLogoBase64).show();
        $('#logoPlaceholder').hide();
        $('#removeLogoBtn').show();
        $('#invoiceLogoImg').attr('src', currentLogoBase64);
        $('#invoiceLogoContainer').show();
      } else {
        removeBrandLogo();
      }

      // Populate Items
      $('#itemsTable tbody').empty();
      if (inv.items && inv.items.length > 0) {
        inv.items.forEach(item => addItemRow(item.desc, item.qty, item.price));
      } else {
        addItemRow('Service item', 1, 1000);
      }

      recalculateInvoice();
      renderPaymentQR();
    }

    /* LocalStorage History Functions */
    function getSavedHistory() {
      try {
        const raw = localStorage.getItem(STORAGE_KEY);
        return raw ? JSON.parse(raw) : [];
      } catch (e) {
        return [];
      }
    }

    function saveHistoryArray(arr) {
      try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(arr));
        updateHistoryCount();
      } catch (e) {
        alert('Could not save to LocalStorage (storage limit exceeded).');
      }
    }

    function updateHistoryCount() {
      const history = getSavedHistory();
      $('#historyCountSidebar').text(history.length);
    }

    function saveCurrentInvoiceToHistory() {
      const inv = getInvoiceObject();
      const history = getSavedHistory();

      const existingIdx = history.findIndex(h => h.invoiceNumber === inv.invoiceNumber);
      if (existingIdx >= 0) {
        history[existingIdx] = inv;
      } else {
        history.unshift(inv);
      }

      saveHistoryArray(history);
      renderSidebarHistoryList();
      alert(`Invoice "${inv.invoiceNumber}" saved to your browser history!`);
    }

    function renderSidebarHistoryList() {
      const history = getSavedHistory();
      const container = $('#sidebarHistoryList');
      const emptyMsg = $('#sidebarEmptyHistory');

      container.empty();
      if (history.length === 0) {
        emptyMsg.show();
        return;
      }
      emptyMsg.hide();

      history.forEach((inv, index) => {
        let subtotal = 0;
        (inv.items || []).forEach(i => subtotal += (i.qty * i.price));
        const taxAmt = (subtotal * (inv.taxPercent || 0)) / 100;
        const total = Math.max(0, (subtotal + taxAmt) - (inv.discountAmount || 0));

        const itemHtml = `
          <div class="history-mini-card">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <strong class="d-block text-dark small">${inv.invoiceNumber}</strong>
                <span class="text-muted" style="font-size:11px;">${inv.clientName || 'Unnamed'} · ${(inv.currency || '₹') + total.toLocaleString()}</span>
              </div>
              <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-primary btn-sm p-1" onclick="loadHistoryItem(${index})" title="Open"><i class="fa-solid fa-folder-open"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm p-1" onclick="deleteHistoryItem(${index})" title="Delete"><i class="fa-solid fa-trash"></i></button>
              </div>
            </div>
          </div>
        `;
        container.append(itemHtml);
      });
    }

    function loadHistoryItem(index) {
      const history = getSavedHistory();
      if (history[index]) {
        loadInvoiceObject(history[index]);
      }
    }

    function deleteHistoryItem(index) {
      if (confirm('Delete this invoice from your history?')) {
        const history = getSavedHistory();
        history.splice(index, 1);
        saveHistoryArray(history);
        renderSidebarHistoryList();
      }
    }

    function clearAllHistory() {
      if (confirm('Are you sure you want to clear all invoice history?')) {
        localStorage.removeItem(STORAGE_KEY);
        renderSidebarHistoryList();
        updateHistoryCount();
      }
    }

    function duplicateCurrentInvoice() {
      const inv = getInvoiceObject();
      inv.id = 'inv_' + Date.now();
      inv.invoiceNumber = inv.invoiceNumber + '-COPY';
      inv.invoiceDate = new Date().toISOString().split('T')[0];
      loadInvoiceObject(inv);
      saveCurrentInvoiceToHistory();
    }

    function createNewInvoice() {
      if (confirm('Create a new blank invoice? Any unsaved edits will be replaced.')) {
        const nextInvNum = 'INV-' + new Date().getFullYear() + '-' + Math.floor(100 + Math.random() * 900);
        $('#invoiceNumberInput').val(nextInvNum);
        $('#activeInvoiceNameDisplay').text(nextInvNum);
        $('#invoiceDateInput').val(new Date().toISOString().split('T')[0]);
        $('#clientNameInput').val('');
        $('#clientDetailsInput').val('');
        $('#paymentStatusInput').val('Due Upon Receipt');
        $('#poNumberInput').val('');
        $('#discountAmount').val('0');
        $('#taxPercent').val('18');

        $('#itemsTable tbody').empty();
        addItemRow('Service Deliverable 1', 1, 5000);
        recalculateInvoice();
      }
    }

    /* WhatsApp & Text Receipt Sharing */
    function sendInvoiceWhatsApp() {
      const invNum = $('#invoiceNumberInput').val();
      const client = $('#clientNameInput').val() || 'Client';
      const total = $('#grandTotalDisplay').text();
      const date = $('#invoiceDateInput').val();
      const dueDate = $('#invoiceDueDateInput').val();

      let msg = `Hello ${client},\n\nPlease find the details for Invoice *${invNum}*:\n`;
      msg += `📅 Date: ${date}\n`;
      msg += `⏳ Due Date: ${dueDate}\n`;
      msg += `💰 Total Due: *${total}*\n\n`;
      msg += `Kindly process the payment at your earliest convenience. Let us know if you need any clarification.\n\nThank you!`;

      const waUrl = `https://api.whatsapp.com/send?text=${encodeURIComponent(msg)}`;
      window.open(waUrl, '_blank');
    }

    function copyInvoiceTextSummary() {
      const invNum = $('#invoiceNumberInput').val();
      const client = $('#clientNameInput').val() || 'Client';
      const total = $('#grandTotalDisplay').text();
      const date = $('#invoiceDateInput').val();
      
      let text = `INVOICE RECEIPT\n`;
      text += `Invoice #: ${invNum}\n`;
      text += `Date: ${date}\n`;
      text += `Billed To: ${client}\n`;
      text += `Total Due: ${total}\n`;

      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(() => alert('Invoice summary copied to clipboard!'));
      } else {
        alert('Invoice summary:\n' + text);
      }
    }

    $(document).ready(function() {
      recalculateInvoice();
      renderPaymentQR();
      updateHistoryCount();
    });
  </script>
</body>
</html>
