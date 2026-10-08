<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Invoice Generator — Custom Branding, PDF, Multi-Currency & History | NikhilWorks";
$metaDesc = "Create customized, professional business & client invoices with custom logo, colors, fonts, tax calculations, payment QR, and browser invoice history. 100% free.";
$canonical = $site . "tools/invoice/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
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
    "name": "Free Custom Invoice Generator",
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
        "name": "Can I download the invoice as a PDF with my brand logo and colors?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! You can upload your business logo, choose your primary brand colors, adjust typography, and click 'Print / Save as PDF' for a clean, watermark-free document." }
      },
      {
        "@type": "Question",
        "name": "Is my client and billing history stored securely?",
        "acceptedAnswer": { "@type": "Answer", "text": "All invoice history and customization settings are stored 100% locally in your browser's LocalStorage. Nothing is uploaded or stored on any server." }
      },
      {
        "@type": "Question",
        "name": "Can I reopen and edit previous invoices?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! The Invoice History panel allows you to view, reload into the editor, duplicate, or delete any previously saved invoices." }
      }
    ]
  }
  </script>

  <!--=====FAB ICON=======-->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!--===== Google Fonts for Invoice Customization =======-->
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

    /* Customizer Panel & Control Bar */
    .customizer-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.04);
      margin-bottom: 25px;
      overflow: hidden;
    }
    .customizer-header {
      background: #f8fafc;
      padding: 14px 20px;
      border-bottom: 1px solid #e2e8f0;
      display: flex;
      align-items: center;
      justify-content: space-between;
      cursor: pointer;
      user-select: none;
    }
    .customizer-header h6 {
      margin: 0;
      font-weight: 700;
      color: #1e293b;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .customizer-body {
      padding: 20px;
    }

    .color-swatch-btn {
      width: 32px;
      height: 32px;
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

    .template-card-choice {
      border: 2px solid #e2e8f0;
      border-radius: 10px;
      padding: 10px 14px;
      cursor: pointer;
      transition: all 0.2s;
      background: #fff;
      text-align: center;
    }
    .template-card-choice:hover, .template-card-choice.active {
      border-color: var(--brand-teal);
      background: #f0fdfa;
    }
    .template-card-choice.active {
      box-shadow: 0 0 0 1px var(--brand-teal);
    }

    /* Printable Invoice Sheet Styling */
    .invoice-wrapper {
      max-width: 920px;
      margin: 0 auto;
      position: relative;
    }
    .invoice-sheet {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      border-radius: 14px;
      padding: 45px 50px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.06);
      font-family: var(--inv-font);
      color: var(--inv-text);
      position: relative;
      transition: font-family 0.2s, font-size 0.2s;
    }

    /* Size variants */
    .invoice-sheet.size-compact { font-size: 13px; padding: 30px 35px; }
    .invoice-sheet.size-standard { font-size: 14.5px; padding: 45px 50px; }
    .invoice-sheet.size-spacious { font-size: 16px; padding: 55px 60px; }

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
      margin: -45px -50px 30px -50px;
      padding: 35px 50px;
      border-radius: 13px 13px 0 0;
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

    .editable-input {
      border: 1px dashed transparent;
      padding: 4px 8px;
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
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(-30deg);
      font-size: 80px;
      font-weight: 900;
      text-transform: uppercase;
      letter-spacing: 6px;
      pointer-events: none;
      user-select: none;
      z-index: 10;
      opacity: 0.12;
      border: 8px dashed currentColor;
      padding: 10px 40px;
      border-radius: 16px;
      display: none;
    }
    .invoice-watermark.watermark-paid { color: #16a34a; display: block; }
    .invoice-watermark.watermark-draft { color: #64748b; display: block; }
    .invoice-watermark.watermark-pending { color: #d97706; display: block; }
    .invoice-watermark.watermark-overdue { color: #dc2626; display: block; }

    /* Logo upload styling */
    .logo-uploader-wrap {
      max-width: 180px;
      position: relative;
    }
    .logo-preview-box {
      max-height: 75px;
      max-width: 200px;
      object-fit: contain;
      cursor: pointer;
      border-radius: 6px;
      display: block;
    }
    .logo-placeholder-btn {
      border: 2px dashed #cbd5e1;
      border-radius: 8px;
      padding: 14px 18px;
      text-align: center;
      cursor: pointer;
      background: #f8fafc;
      transition: all 0.2s;
      font-size: 13px;
      color: #64748b;
    }
    .logo-placeholder-btn:hover {
      border-color: var(--brand-teal);
      color: var(--brand-teal);
      background: #f0fdfa;
    }

    /* History Drawer / Offcanvas */
    .history-card-item {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 12px;
      transition: all 0.2s;
    }
    .history-card-item:hover {
      border-color: var(--brand-teal);
      box-shadow: 0 4px 14px rgba(16, 64, 65, 0.08);
    }
    .badge-paid { background: #dcfce7; color: #15803d; }
    .badge-pending { background: #fef3c7; color: #b45309; }
    .badge-draft { background: #f1f5f9; color: #475569; }
    .badge-overdue { background: #fee2e2; color: #b91c1c; }

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
          <span class="bc-current">Invoice Generator</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Custom Brand Invoice &amp; Receipt Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Build personalized, professional client invoices with custom logo, brand color presets, typography, QR payments, and client history memory.
      </p>
    </div>
  </div>

  <div class="container my-5">
    
    <div class="invoice-wrapper">
      
      <!-- TOP ACTION BAR -->
      <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2 no-print">
        <div class="d-flex align-items-center gap-2 flex-wrap">
          <button type="button" class="btn btn-dark btn-sm fw-bold" id="toggleCustomizerBtn" onclick="toggleCustomizer()">
            <i class="fa-solid fa-palette me-1 text-warning"></i> Brand &amp; Design <i class="fa-solid fa-angle-down ms-1" id="custToggleIcon"></i>
          </button>
          
          <button type="button" class="btn btn-outline-dark btn-sm fw-bold position-relative" data-bs-toggle="modal" data-bs-target="#historyModal" onclick="renderHistoryList()">
            <i class="fa-solid fa-clock-rotate-left me-1 text-primary"></i> Saved Invoices
            <span class="badge bg-danger rounded-pill ms-1" id="historyCountBadge">0</span>
          </button>

          <button type="button" class="btn btn-outline-success btn-sm fw-bold" onclick="saveCurrentInvoiceToHistory()">
            <i class="fa-solid fa-floppy-disk me-1"></i> Save to History
          </button>
        </div>

        <div class="d-flex gap-2 flex-wrap">
          <button type="button" class="btn btn-primary fw-bold" onclick="window.print()">
            <i class="fa-solid fa-print me-1"></i> Print / Save as PDF
          </button>
          <button type="button" class="btn btn-outline-secondary btn-sm" onclick="createNewInvoice()">
            <i class="fa-solid fa-file-circle-plus me-1"></i> New Invoice
          </button>
        </div>
      </div>

      <!-- COLLAPSIBLE BRAND & DESIGN CUSTOMIZER -->
      <div class="customizer-card no-print" id="customizerSection" style="display: none;">
        <div class="customizer-header" onclick="toggleCustomizer()">
          <h6><i class="fa-solid fa-sliders text-primary"></i> Brand &amp; Layout Customization</h6>
          <small class="text-muted"><i class="fa-solid fa-chevron-up"></i> Click to collapse</small>
        </div>
        <div class="customizer-body">
          <div class="row g-4">
            
            <!-- 1. Brand Logo -->
            <div class="col-md-4">
              <label class="form-label fw-bold text-dark small d-flex justify-content-between">
                <span>1. Business Logo</span>
                <a href="javascript:void(0)" class="text-danger small" id="removeLogoBtn" style="display:none;" onclick="removeBrandLogo()">Remove</a>
              </label>
              <div class="logo-uploader-wrap">
                <input type="file" id="logoFileInput" accept="image/*" style="display:none;" onchange="handleLogoUpload(this)">
                <div id="logoPlaceholder" class="logo-placeholder-btn" onclick="$('#logoFileInput').click()">
                  <i class="fa-solid fa-cloud-arrow-up fs-4 d-block mb-1 text-secondary"></i>
                  <span>Upload Logo (.png, .jpg, .svg)</span>
                </div>
                <img id="logoImgPreview" class="logo-preview-box" src="" alt="Brand Logo" style="display:none;" onclick="$('#logoFileInput').click()" title="Click to replace logo">
              </div>
            </div>

            <!-- 2. Brand Color Presets & Custom Picker -->
            <div class="col-md-4">
              <label class="form-label fw-bold text-dark small">2. Brand Primary Color</label>
              <div class="d-flex align-items-center gap-2 mb-2">
                <button type="button" class="color-swatch-btn active" style="background:#104041;" data-color="#104041" onclick="setBrandColor('#104041')" title="Teal Emerald"></button>
                <button type="button" class="color-swatch-btn" style="background:#2563eb;" data-color="#2563eb" onclick="setBrandColor('#2563eb')" title="Royal Blue"></button>
                <button type="button" class="color-swatch-btn" style="background:#0f172a;" data-color="#0f172a" onclick="setBrandColor('#0f172a')" title="Sleek Slate"></button>
                <button type="button" class="color-swatch-btn" style="background:#7c3aed;" data-color="#7c3aed" onclick="setBrandColor('#7c3aed')" title="Imperial Purple"></button>
                <button type="button" class="color-swatch-btn" style="background:#dc2626;" data-color="#dc2626" onclick="setBrandColor('#dc2626')" title="Ruby Crimson"></button>
                <button type="button" class="color-swatch-btn" style="background:#d97706;" data-color="#d97706" onclick="setBrandColor('#d97706')" title="Warm Amber"></button>
              </div>
              <div class="input-group input-group-sm">
                <span class="input-group-text"><i class="fa-solid fa-eye-dropper"></i></span>
                <input type="color" id="customColorPicker" class="form-control form-control-color" value="#104041" onchange="setBrandColor(this.value)" style="max-width: 50px;">
                <input type="text" id="customColorHex" class="form-control" value="#104041" oninput="setBrandColor(this.value)" placeholder="#104041">
              </div>
            </div>

            <!-- 3. Typography & Text Size -->
            <div class="col-md-4">
              <label class="form-label fw-bold text-dark small">3. Font &amp; Text Density</label>
              <div class="row g-2 mb-2">
                <div class="col-6">
                  <select id="invFontFamily" class="form-select form-select-sm" onchange="changeFontFamily(this.value)">
                    <option value="'Inter', sans-serif" selected>Inter (Modern)</option>
                    <option value="'Poppins', sans-serif">Poppins (Clean)</option>
                    <option value="'Roboto', sans-serif">Roboto (Tech)</option>
                    <option value="'Merriweather', serif">Merriweather (Classic)</option>
                    <option value="'Roboto Mono', monospace">Monospace (Code)</option>
                  </select>
                </div>
                <div class="col-6">
                  <select id="invDensity" class="form-select form-select-sm" onchange="changeDensity(this.value)">
                    <option value="compact">Compact Size</option>
                    <option value="standard" selected>Standard Size</option>
                    <option value="spacious">Spacious / Large</option>
                  </select>
                </div>
              </div>

              <!-- Watermark Status Badge -->
              <div class="d-flex align-items-center gap-2 mt-2">
                <span class="small fw-bold text-muted">Watermark:</span>
                <select id="watermarkSelect" class="form-select form-select-sm" onchange="changeWatermark(this.value)">
                  <option value="none" selected>None</option>
                  <option value="PAID">PAID</option>
                  <option value="DRAFT">DRAFT</option>
                  <option value="PENDING">PENDING</option>
                  <option value="OVERDUE">OVERDUE</option>
                </select>
              </div>
            </div>

            <!-- 4. Layout Templates -->
            <div class="col-12 pt-2 border-top">
              <label class="form-label fw-bold text-dark small mb-2">4. Invoice Layout Template</label>
              <div class="row g-2">
                <div class="col-md-4">
                  <div class="template-card-choice active" data-template="modern" onclick="setTemplate('modern')">
                    <strong class="d-block text-dark small">Modern Minimal</strong>
                    <span class="text-muted" style="font-size: 11px;">Clean top border, colored item header</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="template-card-choice" data-template="corporate" onclick="setTemplate('corporate')">
                    <strong class="d-block text-dark small">Classic Corporate</strong>
                    <span class="text-muted" style="font-size: 11px;">Full colored header banner with light text</span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="template-card-choice" data-template="minimal" onclick="setTemplate('minimal')">
                    <strong class="d-block text-dark small">Refined Clean</strong>
                    <span class="text-muted" style="font-size: 11px;">Elegant typography, subtle borders</span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- PRINTABLE INVOICE SHEET -->
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
              <input type="text" id="invoiceNumberInput" class="form-control form-control-sm editable-input fw-bold text-end" style="width: 140px;" value="INV-2026-001">
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

        <div class="d-flex justify-content-between align-items-center mb-4 no-print flex-wrap gap-2">
          <button type="button" class="btn btn-outline-primary btn-sm fw-bold" onclick="addItemRow()">
            <i class="fa-solid fa-plus me-1"></i> Add Item Line
          </button>

          <div class="d-flex align-items-center gap-2">
            <span class="small fw-bold text-muted">Currency:</span>
            <select id="invCurrency" class="form-select form-select-sm" style="width: 120px;" onchange="recalculateInvoice()">
              <option value="₹" selected>INR (₹)</option>
              <option value="$">USD ($)</option>
              <option value="€">EUR (€)</option>
              <option value="£">GBP (£)</option>
              <option value="AED ">AED</option>
              <option value="C$">CAD (C$)</option>
              <option value="A$">AUD (A$)</option>
              <option value="S$">SGD (S$)</option>
            </select>
          </div>
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
                  <span class="text-muted" style="font-size:11px;">Scan with GooglePay / PhonePe / Paytm / Banking App</span>
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
                <input type="text" id="taxLabelInput" class="editable-input fw-bold text-muted small p-0" value="GST / Tax" style="width: 80px;" placeholder="Tax Label">
                <span class="text-muted fw-bold">(%):</span>
                <input type="number" id="taxPercent" class="form-control form-control-sm editable-input text-end" style="width: 65px;" value="18" min="0" max="100" step="any" oninput="recalculateInvoice()">
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
            <textarea id="termsConditionsInput" class="form-control editable-input small text-muted" rows="2" placeholder="1. Payment due within specified period. 2. Please mention invoice number in payment reference.">1. Payment is requested within 15 days of invoice date.&#10;2. Goods/services once delivered are subject to our standard SLA.</textarea>
          </div>
          <div class="col-md-5 text-md-end mt-3 mt-md-0">
            <input type="text" id="signatoryNameInput" class="form-control editable-input fw-bold text-md-end text-dark" value="Nikhil Gupta" placeholder="Authorized Signatory Name">
            <small class="text-muted d-block">Authorized Signatory / Founder</small>
          </div>
        </div>

      </div>

    </div>

    <!-- SAVED INVOICE HISTORY MODAL -->
    <div class="modal fade no-print" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header bg-light">
            <h5 class="modal-title fw-bold" id="historyModalLabel">
              <i class="fa-solid fa-clock-rotate-left text-primary me-2"></i> Your Saved Invoice History
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="small text-muted mb-3">
              <i class="fa-solid fa-shield-halved text-success me-1"></i> 
              Invoices are stored privately inside your browser's LocalStorage. You can re-open, edit, duplicate, or delete them anytime.
            </p>

            <div id="historyListContainer">
              <!-- Dynamically populated via JS -->
            </div>

            <div id="emptyHistoryMsg" class="text-center py-5 text-muted" style="display:none;">
              <i class="fa-solid fa-receipt fs-1 mb-2 opacity-50"></i>
              <h6>No saved invoices found yet.</h6>
              <p class="small">Click "Save to History" in the toolbar to bookmark your current invoice.</p>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-outline-danger btn-sm" onclick="clearAllHistory()">
              <i class="fa-solid fa-trash-can me-1"></i> Clear All History
            </button>
            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5 no-print" style="max-width: 920px; margin: 0 auto;">
      <h2>How to Generate Customized Invoices Online</h2>
      <ol>
        <li><strong>Brand Your Invoice:</strong> Click <em>"Brand &amp; Design"</em> to upload your business logo, pick your corporate palette, and select modern fonts.</li>
        <li><strong>Fill Billing Details:</strong> Click directly into any text area or table cell to edit your deliverables, quantities, rates, and GST / tax percentage.</li>
        <li><strong>Save &amp; Reuse:</strong> Click <em>"Save to History"</em> to preserve this record in your browser memory for 1-click loading and duplicating in future billing cycles.</li>
        <li><strong>Print or Export PDF:</strong> Click <em>"Print / Save as PDF"</em> to generate an official, high-resolution document ready to send to clients.</li>
      </ol>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Will my brand customizations stay saved for next time?</summary>
        <p>Yes! Your logo, primary color, selected font, currency, and invoice templates are preserved in your local session and history records.</p>
      </details>
      <details class="faq-card">
        <summary>Can I download the invoice as an Indian GST compliant invoice?</summary>
        <p>Yes. You can add your 15-digit GSTIN number, Client GSTIN, SAC/HSN codes, and customize the 18%, 12%, or 5% tax slab.</p>
      </details>
      <details class="faq-card">
        <summary>Is my financial data uploaded to any third-party server?</summary>
        <p>No. Everything runs 100% locally in your client browser. Your financial information remains private and secure on your own device.</p>
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

    function getCur() {
      return $('#invCurrency').val();
    }

    function formatMoney(val) {
      const cur = getCur();
      return cur + Number(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function toggleCustomizer() {
      const sec = $('#customizerSection');
      sec.slideToggle(200, function() {
        const isVisible = sec.is(':visible');
        $('#custToggleIcon').toggleClass('fa-angle-up', isVisible).toggleClass('fa-angle-down', !isVisible);
      });
    }

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
      $('.template-card-choice').removeClass('active');
      $(`.template-card-choice[data-template="${tpl}"]`).addClass('active');
      $('#printableInvoice')
        .removeClass('template-modern template-corporate template-minimal')
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
      const qrBox = document.getElementById('invoiceQrBox');
      qrBox.innerHTML = '';
      const text = 'upi://pay?pa=8368552640@upi&pn=NikhilWorks&cu=INR';
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
      $('.item-row').each(function() {
        const qty = parseFloat($(this).find('.item-qty').val()) || 0;
        const price = parseFloat($(this).find('.item-price').val()) || 0;
        const rowTotal = qty * price;
        subtotal += rowTotal;
        $(this).find('.item-total').text(formatMoney(rowTotal));
      });

      const taxP = parseFloat($('#taxPercent').val()) || 0;
      const taxAmt = (subtotal * taxP) / 100;
      const discount = parseFloat($('#discountAmount').val()) || 0;
      const grandTotal = Math.max(0, (subtotal + taxAmt) - discount);

      $('#subTotalDisplay').text(formatMoney(subtotal));
      $('#taxAmountDisplay').text(formatMoney(taxAmt));
      $('#discountDisplay').text('-' + formatMoney(discount));
      $('#grandTotalDisplay').text(formatMoney(grandTotal));
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
        termsConditions: $('#termsConditionsInput').val(),
        signatoryName: $('#signatoryNameInput').val(),
        brandColor: currentBrandColor,
        fontFamily: $('#invFontFamily').val(),
        density: $('#invDensity').val(),
        watermark: $('#watermarkSelect').val(),
        template: $('.template-card-choice.active').data('template') || 'modern',
        logoBase64: currentLogoBase64,
        items: items,
        savedAt: new Date().toISOString()
      };
    }

    function loadInvoiceObject(inv) {
      $('#invoiceNumberInput').val(inv.invoiceNumber);
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
      $('#termsConditionsInput').val(inv.termsConditions);
      $('#signatoryNameInput').val(inv.signatoryName);

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
    }

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
        alert('Could not save to LocalStorage (quota exceeded).');
      }
    }

    function updateHistoryCount() {
      const history = getSavedHistory();
      $('#historyCountBadge').text(history.length);
    }

    function saveCurrentInvoiceToHistory() {
      const inv = getInvoiceObject();
      const history = getSavedHistory();

      // Check if existing invoice # is in history
      const existingIdx = history.findIndex(h => h.invoiceNumber === inv.invoiceNumber);
      if (existingIdx >= 0) {
        history[existingIdx] = inv;
      } else {
        history.unshift(inv);
      }

      saveHistoryArray(history);
      alert(`Invoice "${inv.invoiceNumber}" saved to your browser history!`);
    }

    function renderHistoryList() {
      const history = getSavedHistory();
      const container = $('#historyListContainer');
      const emptyMsg = $('#emptyHistoryMsg');

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
        const dateStr = inv.invoiceDate ? new Date(inv.invoiceDate).toLocaleDateString() : 'N/A';

        const statusClass = (inv.watermark && inv.watermark !== 'none') ? `badge-${inv.watermark.toLowerCase()}` : 'badge-draft';

        const itemHtml = `
          <div class="history-card-item d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
              <div class="d-flex align-items-center gap-2">
                <strong class="text-dark fs-6">${inv.invoiceNumber}</strong>
                <span class="badge ${statusClass}">${inv.watermark || 'Standard'}</span>
              </div>
              <div class="small text-muted mt-1">
                <i class="fa-solid fa-user me-1"></i> <strong>${inv.clientName || 'Unnamed Client'}</strong> · 
                <i class="fa-solid fa-calendar-day ms-2 me-1"></i> ${dateStr}
              </div>
            </div>

            <div class="d-flex align-items-center gap-3">
              <div class="text-end">
                <strong class="fs-6 text-primary">${(inv.currency || '₹') + total.toLocaleString('en-US', {minimumFractionDigits:2})}</strong>
                <span class="d-block small text-muted">${(inv.items || []).length} items</span>
              </div>

              <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-primary" onclick="loadHistoryItem(${index})" title="Open in Editor">
                  <i class="fa-solid fa-folder-open me-1"></i> Open
                </button>
                <button type="button" class="btn btn-outline-secondary" onclick="duplicateHistoryItem(${index})" title="Duplicate Invoice">
                  <i class="fa-solid fa-copy"></i>
                </button>
                <button type="button" class="btn btn-outline-danger" onclick="deleteHistoryItem(${index})" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </button>
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
        const modal = bootstrap.Modal.getInstance(document.getElementById('historyModal'));
        if (modal) modal.hide();
      }
    }

    function duplicateHistoryItem(index) {
      const history = getSavedHistory();
      if (history[index]) {
        const clone = JSON.parse(JSON.stringify(history[index]));
        clone.id = 'inv_' + Date.now();
        clone.invoiceNumber = clone.invoiceNumber + '-COPY';
        clone.invoiceDate = new Date().toISOString().split('T')[0];
        history.unshift(clone);
        saveHistoryArray(history);
        renderHistoryList();
      }
    }

    function deleteHistoryItem(index) {
      if (confirm('Delete this invoice from your browser history?')) {
        const history = getSavedHistory();
        history.splice(index, 1);
        saveHistoryArray(history);
        renderHistoryList();
      }
    }

    function clearAllHistory() {
      if (confirm('Are you sure you want to clear all saved invoice history? This cannot be undone.')) {
        localStorage.removeItem(STORAGE_KEY);
        renderHistoryList();
        updateHistoryCount();
      }
    }

    function createNewInvoice() {
      if (confirm('Create a new blank invoice? Any unsaved edits on the current invoice will be replaced.')) {
        const nextInvNum = 'INV-' + new Date().getFullYear() + '-' + Math.floor(100 + Math.random() * 900);
        $('#invoiceNumberInput').val(nextInvNum);
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

    $(document).ready(function() {
      recalculateInvoice();
      renderPaymentQR();
      updateHistoryCount();
    });
  </script>
</body>
</html>
