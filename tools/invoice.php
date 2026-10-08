<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Canva-Style A4 GST Invoice Generator & Studio | NikhilWorks";
$metaDesc = "Create beautiful A4 GST invoices in Canva-style studio. Drag, drop logo, live A4 print preview, UPI QR code, PDF export & WhatsApp share. Free online tool.";
$canonical = $site . "tools/invoice/";
$metaKeywords = "canva invoice generator, a4 gst invoice maker, free invoice maker india, pdf invoice creator a4 size, online bill maker upi qr";
$currentTool = 'invoice';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="site-url" content="<?= $site ?>">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&family=Inter:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700&family=Merriweather:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>tools/assets/tool-app.css">

  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <style>
    :root {
      --inv-primary: #0f766e;
      --inv-secondary: #0d9488;
      --inv-accent: #f59e0b;
      --inv-font: 'Inter', sans-serif;
    }

    /* Canva Workspace Main Layout */
    .canva-workspace {
      display: flex;
      height: calc(100vh - 120px);
      min-height: 720px;
      background: #0a0f14;
      border: 1px solid var(--border-subtle);
      border-radius: 16px;
      overflow: hidden;
      position: relative;
    }

    @media (max-width: 991px) {
      .canva-workspace {
        height: auto;
        min-height: calc(100vh - 140px);
        flex-direction: column;
      }
    }

    /* Left Dock Slim Bar (Canva Icon Navigation) */
    .canva-icon-bar {
      width: 72px;
      background: #050b0d;
      border-right: 1px solid var(--border-subtle);
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 12px 0;
      gap: 6px;
      z-index: 15;
      flex-shrink: 0;
    }

    .canva-nav-icon-btn {
      width: 60px;
      height: 56px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: transparent;
      border: none;
      color: var(--text-muted);
      border-radius: 10px;
      font-size: 10px;
      font-weight: 600;
      gap: 4px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .canva-nav-icon-btn i {
      font-size: 17px;
    }
    .canva-nav-icon-btn:hover {
      color: #ffffff;
      background: rgba(255, 255, 255, 0.05);
    }
    .canva-nav-icon-btn.active {
      color: var(--brand-teal);
      background: rgba(6, 182, 212, 0.12);
    }

    /* Expanding Drawer / Panel */
    .canva-drawer-panel {
      width: 320px;
      background: #0c1417;
      border-right: 1px solid var(--border-subtle);
      display: flex;
      flex-direction: column;
      z-index: 14;
      flex-shrink: 0;
      overflow-y: auto;
    }

    @media (max-width: 991px) {
      .canva-icon-bar {
        width: 100%;
        height: auto;
        flex-direction: row;
        overflow-x: auto;
        padding: 6px 8px;
        border-right: none;
        border-bottom: 1px solid var(--border-subtle);
      }
      .canva-nav-icon-btn {
        width: auto;
        min-width: 68px;
        height: 48px;
        padding: 4px 8px;
      }
      .canva-drawer-panel {
        width: 100%;
        max-height: 400px;
        border-right: none;
        border-bottom: 1px solid var(--border-subtle);
      }
      .canva-drawer-panel.mobile-collapsed {
        display: none !important;
      }
    }

    .drawer-header {
      padding: 14px 18px;
      border-bottom: 1px solid var(--border-subtle);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .drawer-body {
      padding: 18px;
      overflow-y: auto;
      flex: 1;
    }

    /* Canvas Center Artboard */
    .canva-artboard-container {
      flex: 1;
      background: #0e171b;
      background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
      background-size: 20px 20px;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    /* Artboard Floating Top Controls */
    .artboard-topbar {
      height: 48px;
      background: rgba(12, 20, 23, 0.85);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border-subtle);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 16px;
      z-index: 10;
      flex-wrap: wrap;
      gap: 8px;
    }

    .artboard-scroll-area {
      flex: 1;
      overflow: auto;
      padding: 30px 16px 80px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    @media (max-width: 768px) {
      .artboard-scroll-area {
        padding: 12px 6px 60px;
      }
    }

    /* True A4 Paper Page Dimensions (Ratio: 1 : 1.414) */
    .a4-wrapper {
      transform-origin: top center;
      transition: transform 0.15s ease;
    }

    .a4-page {
      width: 794px; /* Standard A4 96 DPI: 210mm x 297mm */
      min-height: 1123px;
      background: #ffffff;
      color: #0f172a;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.1);
      border-radius: 4px;
      padding: 48px 50px;
      font-family: var(--inv-font);
      position: relative;
      box-sizing: border-box;
      margin: 0 auto;
    }

    /* Watermark Badge */
    .a4-watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) rotate(-35deg);
      font-size: 90px;
      font-weight: 900;
      color: rgba(220, 38, 38, 0.09);
      border: 8px dashed rgba(220, 38, 38, 0.15);
      padding: 14px 40px;
      border-radius: 16px;
      pointer-events: none;
      user-select: none;
      z-index: 1;
      display: none;
      letter-spacing: 4px;
    }

    /* A4 Editable Sheet Inputs */
    .a4-input {
      border: 1px dashed transparent;
      border-radius: 4px;
      padding: 3px 6px;
      color: #0f172a;
      background: transparent;
      transition: all 0.2s;
      width: 100%;
    }
    .a4-input:hover {
      border-color: #cbd5e1;
      background: rgba(241, 245, 249, 0.5);
    }
    .a4-input:focus {
      border-color: var(--inv-primary);
      background: #ffffff;
      outline: none;
      box-shadow: 0 0 0 2px rgba(15, 118, 110, 0.15);
    }

    /* Template Variations */
    .a4-page.tpl-modern .a4-header-bar {
      border-bottom: 3px solid var(--inv-primary);
      padding-bottom: 20px;
    }
    .a4-page.tpl-modern .a4-table th {
      background: var(--inv-primary);
      color: #ffffff;
    }

    .a4-page.tpl-corporate .a4-header-bar {
      background: var(--inv-primary);
      color: #ffffff;
      margin: -48px -50px 30px -50px;
      padding: 35px 50px;
      border-radius: 4px 4px 0 0;
    }
    .a4-page.tpl-corporate .a4-header-bar input,
    .a4-page.tpl-corporate .a4-header-bar textarea {
      color: #ffffff !important;
    }
    .a4-page.tpl-corporate .a4-header-bar .text-muted {
      color: rgba(255, 255, 255, 0.8) !important;
    }
    .a4-page.tpl-corporate .a4-table th {
      background: #f1f5f9;
      color: #0f172a;
      border-top: 2px solid var(--inv-primary);
    }

    .a4-page.tpl-minimal .a4-header-bar {
      border-bottom: 1px solid #e2e8f0;
      padding-bottom: 16px;
    }
    .a4-page.tpl-minimal .a4-table th {
      background: transparent;
      color: #0f172a;
      border-bottom: 2px solid #0f172a;
    }

    .a4-page.tpl-accent .a4-header-bar {
      border-left: 6px solid var(--inv-primary);
      padding-left: 20px;
      margin-bottom: 25px;
    }
    .a4-page.tpl-accent .a4-table th {
      background: var(--inv-primary);
      color: #ffffff;
    }

    /* A4 Table */
    .a4-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin: 24px 0;
    }
    .a4-table th {
      font-size: 11.5px;
      font-weight: 700;
      text-transform: uppercase;
      padding: 10px 12px;
      letter-spacing: 0.5px;
    }
    .a4-table td {
      padding: 8px 10px;
      border-bottom: 1px solid #f1f5f9;
      vertical-align: middle;
      font-size: 13.5px;
    }

    /* Palette Swatches */
    .swatch-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
      margin-bottom: 12px;
    }
    .swatch-btn {
      height: 36px;
      border-radius: 8px;
      border: 2px solid transparent;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 13px;
      transition: transform 0.2s;
    }
    .swatch-btn:hover { transform: scale(1.05); }
    .swatch-btn.active { border-color: #ffffff; box-shadow: 0 0 8px rgba(255,255,255,0.6); }

    /* Template Cards in Drawer */
    .tpl-select-card {
      padding: 12px;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--border-subtle);
      margin-bottom: 8px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.2s;
    }
    .tpl-select-card:hover, .tpl-select-card.active {
      background: rgba(6, 182, 212, 0.12);
      border-color: var(--brand-teal);
    }
    .tpl-icon-box {
      width: 38px;
      height: 38px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.05);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      color: var(--brand-teal);
    }

    /* Print Setup for Exact A4 PDF */
    @page {
      size: A4 portrait;
      margin: 0;
    }
    @media print {
      body, html {
        background: #ffffff !important;
        margin: 0 !important;
        padding: 0 !important;
        width: 210mm !important;
        height: 297mm !important;
      }
      .tools-app-body, .app-wrapper, .canva-workspace, .artboard-scroll-area {
        background: #ffffff !important;
        padding: 0 !important;
        margin: 0 !important;
        border: none !important;
        overflow: visible !important;
      }
      .app-topbar, .app-sidebar, .canva-icon-bar, .canva-drawer-panel, .artboard-topbar, .tool-workspace-header, .no-print {
        display: none !important;
      }
      .a4-wrapper {
        transform: none !important;
        margin: 0 !important;
        padding: 0 !important;
      }
      .a4-page {
        width: 210mm !important;
        min-height: 297mm !important;
        box-shadow: none !important;
        border: none !important;
        border-radius: 0 !important;
        padding: 15mm 15mm !important;
        margin: 0 !important;
      }
      .a4-input {
        border: none !important;
        background: transparent !important;
        padding: 0 !important;
      }
    }
  </style>
</head>

<body class="tools-app-body">

  <?php include_once __DIR__ . "/includes/tool-header.php"; ?>

  <div class="app-wrapper">
    
    <?php include_once __DIR__ . "/includes/tool-sidebar.php"; ?>

    <main class="app-main-content">
      
      <!-- Workspace Card -->
      <div class="tool-workspace-card">
        
        <!-- Header -->
        <div class="tool-workspace-header mb-3">
          <div class="tool-header-left">
            <div class="tool-header-icon icon-emerald">
              <i class="fa-solid fa-file-invoice-dollar"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Canva-Style A4 GST Invoice Studio</h1>
              <p class="tool-header-desc">True A4 printable paper workspace with live editable canvas, instant templates, brand color synchronization, line items, auto-tax, and UPI QR code.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('invoice')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Invoice History
            </button>
          </div>
        </div>

        <!-- Canva Studio Container -->
        <div class="canva-workspace">
          
          <!-- 1. SLIM ICON BAR -->
          <nav class="canva-icon-bar">
            <button type="button" class="canva-nav-icon-btn active" data-tab="templates" onclick="openDrawerTab('templates')">
              <i class="fa-solid fa-layer-group"></i>
              <span>Templates</span>
            </button>
            <button type="button" class="canva-nav-icon-btn" data-tab="branding" onclick="openDrawerTab('branding')">
              <i class="fa-solid fa-palette"></i>
              <span>Brand</span>
            </button>
            <button type="button" class="canva-nav-icon-btn" data-tab="items" onclick="openDrawerTab('items')">
              <i class="fa-solid fa-list-check"></i>
              <span>Items</span>
            </button>
            <button type="button" class="canva-nav-icon-btn" data-tab="client" onclick="openDrawerTab('client')">
              <i class="fa-solid fa-user-tie"></i>
              <span>Client</span>
            </button>
            <button type="button" class="canva-nav-icon-btn" data-tab="payment" onclick="openDrawerTab('payment')">
              <i class="fa-solid fa-qrcode"></i>
              <span>UPI &amp; Pay</span>
            </button>
            <button type="button" class="canva-nav-icon-btn" data-tab="settings" onclick="openDrawerTab('settings')">
              <i class="fa-solid fa-sliders"></i>
              <span>Settings</span>
            </button>
          </nav>

          <!-- 2. EXPANDABLE DRAWER PANEL -->
          <aside class="canva-drawer-panel" id="drawerPanel">
            
            <!-- PANEL: TEMPLATES -->
            <div class="drawer-tab-view" id="tabTemplates">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-layer-group text-info me-2"></i> Choose A4 Layout</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <div class="tpl-select-card active" data-template="modern" onclick="selectTemplate('modern')">
                  <div class="tpl-icon-box"><i class="fa-solid fa-gem"></i></div>
                  <div>
                    <strong class="text-white small d-block">Modern Studio</strong>
                    <span class="text-muted" style="font-size:11px;">Clean top stripe with colored table headers</span>
                  </div>
                </div>

                <div class="tpl-select-card" data-template="corporate" onclick="selectTemplate('corporate')">
                  <div class="tpl-icon-box"><i class="fa-solid fa-building-columns"></i></div>
                  <div>
                    <strong class="text-white small d-block">Corporate Executive</strong>
                    <span class="text-muted" style="font-size:11px;">Full top brand header banner block</span>
                  </div>
                </div>

                <div class="tpl-select-card" data-template="accent" onclick="selectTemplate('accent')">
                  <div class="tpl-icon-box"><i class="fa-solid fa-sparkles"></i></div>
                  <div>
                    <strong class="text-white small d-block">Creative Accent</strong>
                    <span class="text-muted" style="font-size:11px;">Bold vertical stripe with clean divider</span>
                  </div>
                </div>

                <div class="tpl-select-card" data-template="minimal" onclick="selectTemplate('minimal')">
                  <div class="tpl-icon-box"><i class="fa-solid fa-feather"></i></div>
                  <div>
                    <strong class="text-white small d-block">Minimal Elegance</strong>
                    <span class="text-muted" style="font-size:11px;">Refined monochrome hairlines</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- PANEL: BRAND & LOGO -->
            <div class="drawer-tab-view d-none" id="tabBranding">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-palette text-warning me-2"></i> Brand &amp; Colors</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <!-- Logo Uploader -->
                <div class="mb-4">
                  <label class="form-label small text-muted d-flex justify-content-between">
                    <span>Company Logo</span>
                    <a href="javascript:void(0)" class="text-danger small" id="btnRemLogo" style="display:none;" onclick="removeBrandLogo()">Remove</a>
                  </label>
                  <input type="file" id="logoUploadInput" accept="image/*" style="display:none;" onchange="onLogoChosen(this)">
                  <div class="p-3 text-center rounded border border-secondary border-opacity-25" style="background:rgba(255,255,255,0.02); cursor:pointer;" onclick="$('#logoUploadInput').click()">
                    <i class="fa-solid fa-cloud-arrow-up text-info fs-3 d-block mb-1"></i>
                    <span class="small text-muted" id="logoChosenText">Upload PNG / JPG / SVG</span>
                  </div>
                </div>

                <!-- Palette -->
                <div class="mb-4">
                  <label class="form-label small text-muted">Primary Brand Palette</label>
                  <div class="swatch-grid">
                    <button type="button" class="swatch-btn active" style="background:#0f766e;" onclick="setPrimaryColor('#0f766e')"><i class="fa-solid fa-check"></i></button>
                    <button type="button" class="swatch-btn" style="background:#2563eb;" onclick="setPrimaryColor('#2563eb')"></button>
                    <button type="button" class="swatch-btn" style="background:#7c3aed;" onclick="setPrimaryColor('#7c3aed')"></button>
                    <button type="button" class="swatch-btn" style="background:#dc2626;" onclick="setPrimaryColor('#dc2626')"></button>
                    <button type="button" class="swatch-btn" style="background:#d97706;" onclick="setPrimaryColor('#d97706')"></button>
                    <button type="button" class="swatch-btn" style="background:#0f172a;" onclick="setPrimaryColor('#0f172a')"></button>
                    <button type="button" class="swatch-btn" style="background:#059669;" onclick="setPrimaryColor('#059669')"></button>
                    <button type="button" class="swatch-btn" style="background:#be123c;" onclick="setPrimaryColor('#be123c')"></button>
                  </div>
                  <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="fa-solid fa-eye-dropper"></i></span>
                    <input type="color" id="hexPicker" class="form-control form-control-color" value="#0f766e" onchange="setPrimaryColor(this.value)" style="max-width: 45px;">
                    <input type="text" id="hexVal" class="form-control" value="#0f766e" oninput="setPrimaryColor(this.value)">
                  </div>
                </div>

                <!-- Font -->
                <div class="mb-3">
                  <label class="form-label small text-muted">A4 Typography Font</label>
                  <select id="selFont" class="form-select form-select-sm" onchange="applyFont(this.value)">
                    <option value="'Inter', sans-serif" selected>Inter (Standard Clean)</option>
                    <option value="'Poppins', sans-serif">Poppins (Modern Creative)</option>
                    <option value="'Roboto', sans-serif">Roboto (Corporate Neutral)</option>
                    <option value="'Merriweather', serif">Merriweather (Classic Serif)</option>
                  </select>
                </div>

                <!-- Watermark -->
                <div class="mb-3">
                  <label class="form-label small text-muted">Watermark Stamp</label>
                  <select id="selWatermark" class="form-select form-select-sm" onchange="applyWatermark(this.value)">
                    <option value="none" selected>None (Clean)</option>
                    <option value="PAID">PAID</option>
                    <option value="DRAFT">DRAFT</option>
                    <option value="PENDING">PENDING</option>
                    <option value="OVERDUE">OVERDUE</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- PANEL: ITEMS & SERVICES -->
            <div class="drawer-tab-view d-none" id="tabItems">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-list-check text-success me-2"></i> Line Items &amp; Presets</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <p class="text-muted small mb-2">1-Click Add Common Services:</p>
                <div class="d-flex flex-wrap gap-2 mb-3">
                  <button type="button" class="btn btn-sm btn-dark border text-light py-1" onclick="insertItemRow('Custom Website Design & Development', 1, 35000)">+ Web Dev</button>
                  <button type="button" class="btn btn-sm btn-dark border text-light py-1" onclick="insertItemRow('SEO & PageSpeed Optimization', 1, 12000)">+ SEO</button>
                  <button type="button" class="btn btn-sm btn-dark border text-light py-1" onclick="insertItemRow('Annual Cloud Hosting & Domain Maintenance', 1, 8500)">+ Hosting</button>
                  <button type="button" class="btn btn-sm btn-dark border text-light py-1" onclick="insertItemRow('Custom API & Payment Gateway Integration', 1, 15000)">+ API</button>
                </div>

                <button type="button" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center mb-3" onclick="insertItemRow('', 1, 1000)">
                  <i class="fa-solid fa-plus me-1"></i> Add Blank Item
                </button>

                <!-- Tax & Discount -->
                <div class="p-3 rounded mb-3" style="background:rgba(255,255,255,0.02); border:1px solid var(--border-subtle);">
                  <div class="mb-2">
                    <label class="form-label small text-muted">GST / Tax Rate (%)</label>
                    <select id="drawerTaxRate" class="form-select form-select-sm" onchange="$('#taxRateVal').val(this.value); recalculateSheet();">
                      <option value="0">0% (Exempt)</option>
                      <option value="5">5% GST</option>
                      <option value="12">12% GST</option>
                      <option value="18" selected>18% GST (Standard)</option>
                      <option value="28">28% GST</option>
                    </select>
                  </div>
                  <div>
                    <label class="form-label small text-muted">Discount Amount</label>
                    <input type="number" id="drawerDiscount" class="form-control form-control-sm" value="0" min="0" oninput="$('#discountVal').val(this.value); recalculateSheet();">
                  </div>
                </div>
              </div>
            </div>

            <!-- PANEL: CLIENT & SENDER -->
            <div class="drawer-tab-view d-none" id="tabClient">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-user-tie text-info me-2"></i> Client &amp; Billing Data</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <div class="mb-3">
                  <label class="form-label small text-muted">Client / Company Name</label>
                  <input type="text" class="form-control form-control-sm" id="dClientName" value="Acme Corporation Ltd." oninput="$('#cName').val(this.value);">
                </div>
                <div class="mb-3">
                  <label class="form-label small text-muted">Client GSTIN / Address</label>
                  <textarea class="form-control form-control-sm" id="dClientAddress" rows="3" oninput="$('#cAddress').val(this.value);">Connaught Place, Central Delhi, 110001
GSTIN: 07BBBBB1111B1Z2 | contact@acmecorp.com</textarea>
                </div>
                <hr class="border-secondary opacity-25">
                <div class="mb-3">
                  <label class="form-label small text-muted">Invoice Number</label>
                  <input type="text" class="form-control form-control-sm" id="dInvNum" value="INV-2026-001" oninput="$('#iNum').val(this.value);">
                </div>
              </div>
            </div>

            <!-- PANEL: PAYMENTS & QR -->
            <div class="drawer-tab-view d-none" id="tabPayment">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-qrcode text-warning me-2"></i> UPI QR &amp; Bank Details</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <div class="mb-3">
                  <label class="form-label small text-muted">UPI ID for Dynamic QR</label>
                  <input type="text" class="form-control form-control-sm" id="upiId" value="8368552640@upi" oninput="drawUPIQRCode()">
                </div>
                <div class="mb-3">
                  <label class="form-label small text-muted">Bank Details &amp; Terms</label>
                  <textarea class="form-control form-control-sm" id="dNotes" rows="4" oninput="$('#iNotes').val(this.value);">Bank: HDFC Bank | A/C: 50200012345678 | IFSC: HDFC0001234
Terms: 100% due within 15 days of invoice issue date. Thank you for your business!</textarea>
                </div>
              </div>
            </div>

            <!-- PANEL: SETTINGS & CURRENCY -->
            <div class="drawer-tab-view d-none" id="tabSettings">
              <div class="drawer-header">
                <strong class="text-white small"><i class="fa-solid fa-sliders text-primary me-2"></i> Currency &amp; Signatory</strong>
                <button type="button" class="btn btn-sm btn-link text-muted p-0 d-lg-none" onclick="toggleDrawer()"><i class="fa-solid fa-xmark"></i></button>
              </div>
              <div class="drawer-body">
                <div class="mb-3">
                  <label class="form-label small text-muted">Currency Symbol</label>
                  <select id="selCurrency" class="form-select form-select-sm" onchange="applyCurrency(this.value)">
                    <option value="₹" selected>INR (₹) - Indian Rupee</option>
                    <option value="$">USD ($) - US Dollar</option>
                    <option value="€">EUR (€) - Euro</option>
                    <option value="£">GBP (£) - British Pound</option>
                    <option value="AED ">AED - UAE Dirham</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label small text-muted">Authorized Signatory Name</label>
                  <input type="text" class="form-control form-control-sm" id="dSignName" value="Nikhil Gupta (Authorized Signatory)" oninput="$('#signName').val(this.value);">
                </div>
              </div>
            </div>

          </aside>

          <!-- 3. ARTBOARD CENTER CANVAS -->
          <main class="canva-artboard-container">
            
            <!-- Top Controls Floating Bar -->
            <div class="artboard-topbar">
              
              <!-- Left: Drawer Toggle & Page Status -->
              <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn btn-sm btn-dark border text-light py-1 px-2" onclick="toggleDrawer()" title="Toggle Edit Panel">
                  <i class="fa-solid fa-bars-staggered me-1"></i> <span class="d-none d-sm-inline">Panel</span>
                </button>
                <span class="badge bg-dark border text-muted small"><i class="fa-solid fa-file-lines text-info me-1"></i> A4 (210 &times; 297 mm)</span>
              </div>

              <!-- Center: Zoom Controls -->
              <div class="d-flex align-items-center gap-1">
                <button type="button" class="btn btn-sm btn-dark border py-0 px-2 text-light" onclick="zoomCanvas(0.85)" title="Zoom Out"><i class="fa-solid fa-minus"></i></button>
                <button type="button" class="btn btn-sm btn-dark border py-0 px-2 text-light small" id="zoomLevelDisplay" onclick="fitCanvasToScreen()">Fit</button>
                <button type="button" class="btn btn-sm btn-dark border py-0 px-2 text-light" onclick="zoomCanvas(1.15)" title="Zoom In"><i class="fa-solid fa-plus"></i></button>
              </div>

              <!-- Right: Export Actions -->
              <div class="d-flex align-items-center gap-2">
                <button type="button" class="topbar-btn topbar-btn-ghost py-1 px-2 small text-success border-success" onclick="sendInvoiceWhatsApp()" title="Send WhatsApp">
                  <i class="fa-brands fa-whatsapp"></i> <span class="d-none d-md-inline">WhatsApp</span>
                </button>
                <button type="button" class="topbar-btn topbar-btn-primary py-1 px-3 small" onclick="window.print()" title="Print / PDF">
                  <i class="fa-solid fa-print me-1"></i> Print / PDF
                </button>
                <button type="button" class="topbar-btn topbar-btn-ghost py-1 px-2 small text-warning border-warning" onclick="saveToCloudHistory()" title="Save to History">
                  <i class="fa-solid fa-floppy-disk"></i>
                </button>
              </div>

            </div>

            <!-- Artboard Scrollable Area -->
            <div class="artboard-scroll-area" id="artboardScrollArea">
              
              <div class="a4-wrapper" id="a4Wrapper">
                
                <!-- TRUE A4 INVOICE SHEET -->
                <div class="a4-page tpl-modern" id="a4InvoiceSheet">
                  
                  <div class="a4-watermark" id="a4WatermarkText">PAID</div>

                  <!-- A4 Header Row -->
                  <div class="row g-3 align-items-center a4-header-bar mb-4">
                    <div class="col-7">
                      <div id="a4LogoBox" class="mb-2" style="display:none;">
                        <img id="a4LogoImage" src="" alt="Brand Logo" style="max-height: 52px; max-width: 170px;">
                      </div>
                      <input type="text" class="a4-input fw-extrabold fs-4 mb-1 text-primary" id="iHeading" value="TAX INVOICE" style="color: var(--inv-primary) !important;">
                      <input type="text" class="a4-input fw-bold fs-6 mb-1" id="bName" value="NikhilWorks Technologies">
                      <textarea class="a4-input small" id="bAddress" rows="2">Plot 45, Okhla Phase 3, New Delhi, 110020
GSTIN: 07AAAAA0000A1Z5 | Email: contact@nikhilworks.com</textarea>
                    </div>

                    <div class="col-5 text-end">
                      <div class="p-2 rounded bg-light border text-start">
                        <div class="row g-1">
                          <div class="col-5 text-muted small fw-bold">Invoice #:</div>
                          <div class="col-7"><input type="text" class="a4-input py-0 small fw-bold" id="iNum" value="INV-2026-001" oninput="$('#dInvNum').val(this.value);"></div>
                          <div class="col-5 text-muted small fw-bold">Issue Date:</div>
                          <div class="col-7"><input type="date" class="a4-input py-0 small" id="iDate" value="<?= date('Y-m-d') ?>"></div>
                          <div class="col-5 text-muted small fw-bold">Due Date:</div>
                          <div class="col-7"><input type="date" class="a4-input py-0 small" id="iDueDate" value="<?= date('Y-m-d', strtotime('+15 days')) ?>"></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Client Info & Payment QR -->
                  <div class="row g-3 mb-4">
                    <div class="col-7">
                      <small class="text-muted text-uppercase fw-bold d-block mb-1">Billed To (Client):</small>
                      <input type="text" class="a4-input fw-bold mb-1" id="cName" value="Acme Corporation Ltd." oninput="$('#dClientName').val(this.value);">
                      <textarea class="a4-input small" id="cAddress" rows="2" oninput="$('#dClientAddress').val(this.value);">Connaught Place, Central Delhi, 110001
GSTIN: 07BBBBB1111B1Z2 | contact@acmecorp.com</textarea>
                    </div>

                    <div class="col-5">
                      <small class="text-muted text-uppercase fw-bold d-block mb-1">Instant Payment QR:</small>
                      <div class="d-flex align-items-center gap-3 p-2 rounded bg-light border">
                        <div id="a4QrBox"></div>
                        <div class="small">
                          <strong class="d-block text-dark">Scan via GPay / PhonePe / Paytm</strong>
                          <span class="text-muted" style="font-size:11px;" id="a4UpiDisplay">8368552640@upi</span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Line Items Table -->
                  <table class="a4-table" id="a4ItemsTable">
                    <thead>
                      <tr>
                        <th style="width: 48%;">Item / Description</th>
                        <th style="width: 14%;" class="text-center">Qty / Hrs</th>
                        <th style="width: 18%;" class="text-end">Rate (<span class="cur-tag">₹</span>)</th>
                        <th style="width: 15%;" class="text-end">Amount</th>
                        <th style="width: 5%;" class="text-center no-print"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="a4-row">
                        <td><input type="text" class="a4-input row-desc" value="Full-Stack Web Development &amp; Custom API Integration"></td>
                        <td><input type="number" class="a4-input text-center row-qty" value="1" min="1" step="any" oninput="recalculateSheet()"></td>
                        <td><input type="number" class="a4-input text-end row-rate" value="35000" min="0" step="any" oninput="recalculateSheet()"></td>
                        <td class="text-end fw-bold row-amount">35,000.00</td>
                        <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                      </tr>
                      <tr class="a4-row">
                        <td><input type="text" class="a4-input row-desc" value="SEO Optimization, Speed Audit &amp; Cloud Deployment"></td>
                        <td><input type="number" class="a4-input text-center row-qty" value="1" min="1" step="any" oninput="recalculateSheet()"></td>
                        <td><input type="number" class="a4-input text-end row-rate" value="12000" min="0" step="any" oninput="recalculateSheet()"></td>
                        <td class="text-end fw-bold row-amount">12,000.00</td>
                        <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeRow(this)"><i class="fa-solid fa-trash"></i></button></td>
                      </tr>
                    </tbody>
                  </table>

                  <button type="button" class="btn btn-sm btn-outline-secondary no-print mb-4" onclick="insertItemRow('', 1, 1000)">
                    <i class="fa-solid fa-plus me-1"></i> Add Line Item
                  </button>

                  <!-- Calculation & Notes Row -->
                  <div class="row g-4">
                    <div class="col-6">
                      <small class="text-muted fw-bold d-block mb-1">Terms &amp; Bank Details:</small>
                      <textarea class="a4-input small" id="iNotes" rows="4">Bank: HDFC Bank | A/C: 50200012345678 | IFSC: HDFC0001234
Terms: 100% due within 15 days of invoice issue date. Thank you for your business!</textarea>
                      
                      <div class="mt-4 pt-3 border-top">
                        <small class="text-muted d-block" style="font-size:11px;">Authorized Signatory:</small>
                        <input type="text" class="a4-input fw-bold small" id="signName" value="Nikhil Gupta (Authorized Signatory)">
                      </div>
                    </div>

                    <div class="col-6 text-end">
                      <div class="p-3 rounded bg-light border text-start">
                        <div class="d-flex justify-content-between mb-2">
                          <span class="text-muted small">Subtotal:</span>
                          <strong><span class="cur-tag">₹</span> <span id="valSubtotal">47,000.00</span></strong>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                          <span class="text-muted small">GST / Tax Rate:</span>
                          <div class="d-flex align-items-center gap-1" style="max-width: 100px;">
                            <input type="number" class="a4-input text-end py-0 small" id="taxRateVal" value="18" min="0" max="100" oninput="recalculateSheet()">
                            <span class="small text-muted">%</span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                          <span class="text-muted small">Tax Amount:</span>
                          <span class="text-muted"><span class="cur-tag">₹</span> <span id="valTaxAmount">8,460.00</span></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                          <span class="text-muted small">Discount:</span>
                          <div class="d-flex align-items-center gap-1" style="max-width: 100px;">
                            <input type="number" class="a4-input text-end py-0 small" id="discountVal" value="0" min="0" oninput="recalculateSheet()">
                          </div>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex justify-content-between fs-6 fw-extrabold text-dark">
                          <span>Total Amount Due:</span>
                          <span class="text-success"><span class="cur-tag">₹</span> <span id="valGrandTotal">55,460.00</span></span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>

            </div>

          </main>

        </div>

      </div>

      <?php include_once __DIR__ . "/includes/tool-footer.php"; ?>

    </main>
  </div>

  <?php include_once __DIR__ . "/includes/tool-auth-modal.php"; ?>
  <?php include_once __DIR__ . "/includes/tool-history-drawer.php"; ?>

  <script src="<?= $site ?>assets/js/plugins/bootstrap.min.js"></script>
  <script src="<?= $site ?>tools/assets/tool-app.js"></script>

  <script>
    let activeZoom = 1.0;
    let brandLogoBase64 = '';
    let currentCurrency = '₹';
    let currentTemplate = 'modern';

    function openDrawerTab(tab) {
      $('.canva-nav-icon-btn').removeClass('active');
      $(`.canva-nav-icon-btn[data-tab="${tab}"]`).addClass('active');

      $('.drawer-tab-view').addClass('d-none');
      const tabMap = {
        'templates': '#tabTemplates',
        'branding': '#tabBranding',
        'items': '#tabItems',
        'client': '#tabClient',
        'payment': '#tabPayment',
        'settings': '#tabSettings'
      };
      $(tabMap[tab]).removeClass('d-none');
      $('#drawerPanel').removeClass('mobile-collapsed');
    }

    function toggleDrawer() {
      $('#drawerPanel').toggleClass('mobile-collapsed');
    }

    function fitCanvasToScreen() {
      const container = document.getElementById('artboardScrollArea');
      if (!container) return;
      const availableWidth = container.clientWidth - (window.innerWidth < 768 ? 20 : 60);
      const baseWidth = 794; // A4 standard width
      let scale = availableWidth / baseWidth;
      if (scale > 1.05 && window.innerWidth >= 992) scale = 1.0;
      activeZoom = Math.max(0.35, Math.min(1.4, scale));
      applyZoom();
    }

    function zoomCanvas(factor) {
      activeZoom = Math.max(0.35, Math.min(1.6, activeZoom * factor));
      applyZoom();
    }

    function applyZoom() {
      $('#a4Wrapper').css('transform', `scale(${activeZoom})`);
      $('#zoomLevelDisplay').text(Math.round(activeZoom * 100) + '%');
    }

    function selectTemplate(tpl) {
      currentTemplate = tpl;
      $('.tpl-select-card').removeClass('active');
      $(`.tpl-select-card[data-template="${tpl}"]`).addClass('active');

      $('#a4InvoiceSheet')
        .removeClass('tpl-modern tpl-corporate tpl-minimal tpl-accent')
        .addClass('tpl-' + tpl);
    }

    function setPrimaryColor(hex) {
      document.documentElement.style.setProperty('--inv-primary', hex);
      $('#hexPicker, #hexVal').val(hex);
      $('.swatch-btn').removeClass('active');
      $(`.swatch-btn[style*="${hex}"]`).addClass('active');

      $('.a4-table th').css('background', hex);
      $('#iHeading').css('color', hex);
      drawUPIQRCode();
    }

    function applyFont(font) {
      document.documentElement.style.setProperty('--inv-font', font);
      $('#a4InvoiceSheet').css('font-family', font);
    }

    function applyWatermark(wm) {
      if (wm === 'none') {
        $('#a4WatermarkText').hide();
      } else {
        $('#a4WatermarkText').text(wm).show();
      }
    }

    function applyCurrency(cur) {
      currentCurrency = cur;
      $('.cur-tag').text(cur);
      recalculateSheet();
    }

    function onLogoChosen(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          brandLogoBase64 = e.target.result;
          $('#a4LogoImage').attr('src', brandLogoBase64);
          $('#a4LogoBox').show();
          $('#btnRemLogo').show();
          $('#logoChosenText').text('Change Logo');
        };
        reader.readAsDataURL(input.files[0]);
      }
    }

    function removeBrandLogo() {
      brandLogoBase64 = '';
      $('#logoUploadInput').val('');
      $('#a4LogoImage').attr('src', '');
      $('#a4LogoBox').hide();
      $('#btnRemLogo').hide();
      $('#logoChosenText').text('Upload PNG / JPG / SVG');
    }

    function drawUPIQRCode() {
      const upi = $('#upiId').val().trim() || '8368552640@upi';
      $('#a4UpiDisplay').text(upi);
      const box = document.getElementById('a4QrBox');
      box.innerHTML = '';
      const text = `upi://pay?pa=${encodeURIComponent(upi)}&pn=NikhilWorks&cu=INR`;
      try {
        new QRCode(box, {
          text: text,
          width: 54,
          height: 54,
          colorDark: $('#hexVal').val() || '#0f766e',
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.M
        });
      } catch (e) {
        console.error(e);
      }
    }

    function insertItemRow(desc = '', qty = 1, rate = 1000) {
      const row = `
        <tr class="a4-row">
          <td><input type="text" class="a4-input row-desc" value="${desc}" placeholder="Item description"></td>
          <td><input type="number" class="a4-input text-center row-qty" value="${qty}" min="1" step="any" oninput="recalculateSheet()"></td>
          <td><input type="number" class="a4-input text-end row-rate" value="${rate}" min="0" step="any" oninput="recalculateSheet()"></td>
          <td class="text-end fw-bold row-amount">0.00</td>
          <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeRow(this)"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
      `;
      $('#a4ItemsTable tbody').append(row);
      recalculateSheet();
      ToolsApp.showToast('Item added to invoice! ➕');
    }

    function removeRow(btn) {
      if ($('.a4-row').length > 1) {
        $(btn).closest('.a4-row').remove();
        recalculateSheet();
      } else {
        alert('Invoice must have at least one line item.');
      }
    }

    function recalculateSheet() {
      let subtotal = 0;
      $('.a4-row').each(function() {
        const qty = parseFloat($(this).find('.row-qty').val()) || 0;
        const rate = parseFloat($(this).find('.row-rate').val()) || 0;
        const amt = qty * rate;
        subtotal += amt;
        $(this).find('.row-amount').text(amt.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
      });

      const taxRate = parseFloat($('#taxRateVal').val()) || 0;
      const discount = parseFloat($('#discountVal').val()) || 0;
      const taxAmt = (subtotal * taxRate) / 100;
      const grandTotal = Math.max(0, (subtotal + taxAmt) - discount);

      $('#valSubtotal').text(subtotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
      $('#valTaxAmount').text(taxAmt.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
      $('#valGrandTotal').text(grandTotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
    }

    function sendInvoiceWhatsApp() {
      const num = $('#iNum').val();
      const client = $('#cName').val();
      const total = $('#valGrandTotal').text();
      const cur = currentCurrency;
      const msg = `Hello ${client},\n\nPlease find your Invoice details:\nInvoice #: ${num}\nTotal Amount: ${cur} ${total}\nPayment UPI: ${$('#upiId').val()}\n\nThank you!`;
      window.open(`https://api.whatsapp.com/send?text=${encodeURIComponent(msg)}`, '_blank');
    }

    function saveToCloudHistory() {
      const num = $('#iNum').val() || 'INV-001';
      const client = $('#cName').val() || 'Client';
      const total = $('#valGrandTotal').text();

      const items = [];
      $('.a4-row').each(function() {
        items.push({
          desc: $(this).find('.row-desc').val(),
          qty: $(this).find('.row-qty').val(),
          rate: $(this).find('.row-rate').val()
        });
      });

      const payload = {
        iNum: num,
        iDate: $('#iDate').val(),
        iDueDate: $('#iDueDate').val(),
        bName: $('#bName').val(),
        bAddress: $('#bAddress').val(),
        cName: client,
        cAddress: $('#cAddress').val(),
        upi: $('#upiId').val(),
        brandColor: $('#hexVal').val(),
        template: currentTemplate,
        font: $('#selFont').val(),
        taxRate: $('#taxRateVal').val(),
        discount: $('#discountVal').val(),
        notes: $('#iNotes').val(),
        signName: $('#signName').val(),
        logo: brandLogoBase64,
        currency: currentCurrency,
        items: items
      };

      ToolsApp.saveHistory('invoice', `Invoice: ${num} (${client})`, `Total: ${currentCurrency} ${total}`, payload);
      ToolsApp.showToast('Invoice saved to your history! 💾');
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'invoice' && payload) {
        if (payload.iNum) $('#iNum, #dInvNum').val(payload.iNum);
        if (payload.iDate) $('#iDate').val(payload.iDate);
        if (payload.iDueDate) $('#iDueDate').val(payload.iDueDate);
        if (payload.bName) $('#bName').val(payload.bName);
        if (payload.bAddress) $('#bAddress').val(payload.bAddress);
        if (payload.cName) $('#cName, #dClientName').val(payload.cName);
        if (payload.cAddress) $('#cAddress, #dClientAddress').val(payload.cAddress);
        if (payload.upi) $('#upiId').val(payload.upi);
        if (payload.brandColor) setPrimaryColor(payload.brandColor);
        if (payload.template) selectTemplate(payload.template);
        if (payload.font) {
          $('#selFont').val(payload.font);
          applyFont(payload.font);
        }
        if (payload.taxRate) $('#taxRateVal, #drawerTaxRate').val(payload.taxRate);
        if (payload.discount) $('#discountVal, #drawerDiscount').val(payload.discount);
        if (payload.notes) $('#iNotes, #dNotes').val(payload.notes);
        if (payload.signName) $('#signName, #dSignName').val(payload.signName);
        if (payload.currency) {
          $('#selCurrency').val(payload.currency);
          applyCurrency(payload.currency);
        }

        if (payload.logo) {
          brandLogoBase64 = payload.logo;
          $('#a4LogoImage').attr('src', brandLogoBase64);
          $('#a4LogoBox').show();
          $('#btnRemLogo').show();
        } else {
          removeBrandLogo();
        }

        if (payload.items && payload.items.length > 0) {
          $('#a4ItemsTable tbody').empty();
          payload.items.forEach(it => {
            const row = `
              <tr class="a4-row">
                <td><input type="text" class="a4-input row-desc" value="${it.desc}" placeholder="Item description"></td>
                <td><input type="number" class="a4-input text-center row-qty" value="${it.qty}" min="1" step="any" oninput="recalculateSheet()"></td>
                <td><input type="number" class="a4-input text-end row-rate" value="${it.rate}" min="0" step="any" oninput="recalculateSheet()"></td>
                <td class="text-end fw-bold row-amount">0.00</td>
                <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeRow(this)"><i class="fa-solid fa-trash"></i></button></td>
              </tr>
            `;
            $('#a4ItemsTable tbody').append(row);
          });
        }

        recalculateSheet();
        drawUPIQRCode();
      }
    });

    $(window).on('resize', fitCanvasToScreen);

    $(document).ready(function() {
      recalculateSheet();
      drawUPIQRCode();
      fitCanvasToScreen();
    });
  </script>
</body>
</html>
