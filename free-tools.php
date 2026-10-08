<?php
include_once "config/connect.php";
include_once "util/function.php";

$contact = contact_us();
$pageTitle = "Free Online Tools Suite — SEO, QR Code, GST, Invoice & Developer Utilities | NikhilWorks";
$pageDesc = "14+ free high-performance online tools for businesses, marketers, and developers. SEO auditor, QR code maker, GST calculator, invoice maker, schema generator & more. 100% free, no signup.";
$pageKeywords = "free online tools suite, developer tools hub, free seo tools india, free business tools online india, canva style tools dashboard, online tools for small business india, free digital marketing tools 2026";
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
  <meta property="og:site_name" content="NikhilWorks Tools Suite">
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
    "name": "NikhilWorks Free Web, SEO & Business Tools Suite",
    "description": "<?= addslashes($pageDesc) ?>",
    "url": "<?= $canonicalUrl ?>",
    "mainEntity": {
      "@type": "ItemList",
      "itemListElement": [
        { "@type": "ListItem", "position": 1, "name": "WhatsApp Link Generator", "url": "<?= $site ?>tools/whatsapp-link/" },
        { "@type": "ListItem", "position": 2, "name": "QR Code Generator", "url": "<?= $site ?>tools/qr-code/" },
        { "@type": "ListItem", "position": 3, "name": "Free Invoice Generator", "url": "<?= $site ?>tools/invoice/" },
        { "@type": "ListItem", "position": 4, "name": "GST Calculator India", "url": "<?= $site ?>tools/gst-calculator/" },
        { "@type": "ListItem", "position": 5, "name": "Profit Margin Calculator", "url": "<?= $site ?>tools/profit-calculator/" },
        { "@type": "ListItem", "position": 6, "name": "Website Cost Calculator", "url": "<?= $site ?>website-cost-calculator/" },
        { "@type": "ListItem", "position": 7, "name": "Free SEO Audit Tool", "url": "<?= $site ?>seo-auditor/" },
        { "@type": "ListItem", "position": 8, "name": "Google PageSpeed Insights Checker", "url": "<?= $site ?>tools/pagespeed/" },
        { "@type": "ListItem", "position": 9, "name": "Google Index & Cache Checker", "url": "<?= $site ?>tools/index-checker/" },
        { "@type": "ListItem", "position": 10, "name": "Meta Tags & SERP Preview", "url": "<?= $site ?>tools/meta-preview/" },
        { "@type": "ListItem", "position": 11, "name": "Schema JSON-LD Generator", "url": "<?= $site ?>tools/schema-generator/" },
        { "@type": "ListItem", "position": 12, "name": "SSL & Domain Security Checker", "url": "<?= $site ?>tools/ssl-checker/" },
        { "@type": "ListItem", "position": 13, "name": "Privacy Policy Generator", "url": "<?= $site ?>tools/privacy-policy/" },
        { "@type": "ListItem", "position": 14, "name": "Robots.txt Validator & Tester", "url": "<?= $site ?>tools/robots-validator/" }
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
      { "@type": "ListItem", "position": 2, "name": "Free Tools Suite", "item": "<?= $canonicalUrl ?>" }
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
          "text": "Yes! All 14+ tools provided on NikhilWorks are 100% free with zero sign-up, no subscriptions, and unlimited client-side usage."
        }
      },
      {
        "@type": "Question",
        "name": "Do you store any personal or business data?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "No. All calculations, link generations, QR codes, and invoices are processed locally in your browser. We never store or log your inputs."
        }
      },
      {
        "@type": "Question",
        "name": "Can I use the outputs for commercial projects?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! All generated outputs including PDFs, QR codes, schema markups, and policy templates are 100% free for commercial and personal usage."
        }
      }
    ]
  }
  </script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">

  <style>
    :root {
      --app-font: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
      --code-font: 'JetBrains Mono', monospace;
      
      /* Color Palette */
      --app-bg: #071314;
      --sidebar-bg: #0b1f20;
      --card-bg: #10292a;
      --card-hover-bg: #143537;
      --topbar-bg: rgba(11, 31, 32, 0.88);
      
      --brand-lime: #ADFF1C;
      --brand-lime-glow: rgba(173, 255, 28, 0.25);
      --brand-teal: #104041;
      --brand-teal-light: #1b5b5d;
      
      --text-main: #f8fafc;
      --text-muted: #94a3b8;
      --text-dim: #64748b;
      
      --border-subtle: rgba(255, 255, 255, 0.08);
      --border-focus: rgba(173, 255, 28, 0.4);
      --border-active: #ADFF1C;
      
      --sidebar-width: 270px;
      --topbar-height: 70px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: var(--app-font);
      background-color: var(--app-bg);
      color: var(--text-main);
      min-height: 100vh;
      overflow-x: hidden;
      -webkit-font-smoothing: antialiased;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }
    ::-webkit-scrollbar-track {
      background: var(--app-bg);
    }
    ::-webkit-scrollbar-thumb {
      background: rgba(255, 255, 255, 0.15);
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: var(--brand-lime);
    }

    /* Layout Structure */
    .app-wrapper {
      display: flex;
      min-height: 100vh;
    }

    /* =========================================
       1. CANVA-STYLE TOP APP BAR
       ========================================= */
    .app-topbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      height: var(--topbar-height);
      background: var(--topbar-bg);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--border-subtle);
      z-index: 1030;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 24px;
      transition: all 0.3s ease;
    }

    .topbar-brand {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
      min-width: 240px;
    }

    .brand-logo-badge {
      width: 42px;
      height: 42px;
      border-radius: 12px;
      background: linear-gradient(135deg, #104041 0%, #051a1b 100%);
      border: 1px solid rgba(173, 255, 28, 0.3);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 0 15px rgba(173, 255, 28, 0.15);
    }

    .brand-logo-badge img {
      max-width: 24px;
      height: auto;
    }

    .brand-title-group {
      display: flex;
      flex-direction: column;
    }

    .brand-main-title {
      font-size: 17px;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -0.3px;
      line-height: 1.2;
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .brand-main-title span {
      color: var(--brand-lime);
    }

    .brand-sub-badge {
      font-size: 11px;
      font-weight: 700;
      color: var(--text-muted);
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    /* Topbar Search input */
    .topbar-search-container {
      flex: 1;
      max-width: 520px;
      margin: 0 24px;
      position: relative;
    }

    .topbar-search-input {
      width: 100%;
      height: 44px;
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border-subtle);
      border-radius: 12px;
      padding: 0 44px 0 42px;
      color: #ffffff;
      font-size: 14px;
      font-family: var(--app-font);
      outline: none;
      transition: all 0.25s ease;
    }

    .topbar-search-input:focus {
      background: rgba(255, 255, 255, 0.09);
      border-color: var(--brand-lime);
      box-shadow: 0 0 0 3px rgba(173, 255, 28, 0.12);
    }

    .topbar-search-input::placeholder {
      color: var(--text-dim);
    }

    .topbar-search-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--text-dim);
      font-size: 14px;
      pointer-events: none;
    }

    .topbar-search-kbd {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 6px;
      padding: 2px 7px;
      font-size: 11px;
      font-family: var(--code-font);
      color: var(--text-muted);
      pointer-events: none;
    }

    /* Topbar Actions */
    .topbar-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .topbar-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 16px;
      border-radius: 10px;
      font-size: 13.5px;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
      cursor: pointer;
      border: none;
    }

    .topbar-btn-ghost {
      background: rgba(255, 255, 255, 0.06);
      color: var(--text-main);
      border: 1px solid var(--border-subtle);
    }

    .topbar-btn-ghost:hover {
      background: rgba(255, 255, 255, 0.12);
      color: #ffffff;
      border-color: rgba(255, 255, 255, 0.2);
    }

    .topbar-btn-primary {
      background: var(--brand-lime);
      color: #071314;
      font-weight: 700;
    }

    .topbar-btn-primary:hover {
      background: #c2ff4d;
      box-shadow: 0 0 16px var(--brand-lime-glow);
      color: #000;
    }

    .mobile-menu-toggle {
      display: none;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid var(--border-subtle);
      color: #ffffff;
      width: 40px;
      height: 40px;
      border-radius: 10px;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    /* =========================================
       2. CANVA-STYLE APP SIDEBAR
       ========================================= */
    .app-sidebar {
      width: var(--sidebar-width);
      background: var(--sidebar-bg);
      border-right: 1px solid var(--border-subtle);
      position: fixed;
      top: var(--topbar-height);
      left: 0;
      bottom: 0;
      overflow-y: auto;
      padding: 24px 16px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      z-index: 1020;
      transition: transform 0.3s ease;
    }

    .sidebar-section-title {
      font-size: 11px;
      font-weight: 800;
      color: var(--text-dim);
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 0 12px;
      margin-bottom: 10px;
    }

    .sidebar-nav-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 4px;
      margin-bottom: 24px;
    }

    .sidebar-nav-link {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 14px;
      border-radius: 10px;
      color: var(--text-muted);
      text-decoration: none;
      font-size: 13.5px;
      font-weight: 600;
      transition: all 0.2s ease;
      cursor: pointer;
      border: 1px solid transparent;
    }

    .sidebar-nav-link:hover {
      background: rgba(255, 255, 255, 0.05);
      color: #ffffff;
    }

    .sidebar-nav-link.active {
      background: rgba(173, 255, 28, 0.1);
      color: var(--brand-lime);
      border-color: rgba(173, 255, 28, 0.25);
      font-weight: 700;
    }

    .sidebar-nav-link i {
      width: 20px;
      font-size: 14px;
      margin-right: 8px;
    }

    .nav-count-pill {
      font-size: 11px;
      font-weight: 700;
      padding: 2px 7px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.08);
      color: var(--text-muted);
    }

    .sidebar-nav-link.active .nav-count-pill {
      background: var(--brand-lime);
      color: #071314;
    }

    /* Sidebar Pro Card */
    .sidebar-pro-card {
      background: linear-gradient(145deg, #104041 0%, #082122 100%);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 14px;
      padding: 16px;
      margin-top: auto;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .sidebar-pro-header {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 10px;
    }

    .pro-avatar {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: var(--brand-lime);
      color: #071314;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 14px;
    }

    .pro-title {
      font-size: 13px;
      font-weight: 700;
      color: #ffffff;
      line-height: 1.2;
    }

    .pro-subtitle {
      font-size: 11.5px;
      color: #a3c9c9;
    }

    .sidebar-pro-card p {
      font-size: 12px;
      color: #d1e7e7;
      line-height: 1.4;
      margin-bottom: 12px;
    }

    .sidebar-pro-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      width: 100%;
      padding: 8px 12px;
      background: var(--brand-lime);
      color: #071314;
      border-radius: 8px;
      font-size: 12.5px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .sidebar-pro-btn:hover {
      background: #c2ff4d;
      color: #000;
      box-shadow: 0 0 12px var(--brand-lime-glow);
    }

    /* =========================================
       3. MAIN WORKSPACE / DASHBOARD
       ========================================= */
    .app-main-content {
      margin-left: var(--sidebar-width);
      margin-top: var(--topbar-height);
      padding: 32px 36px 60px;
      flex: 1;
      min-width: 0;
    }

    /* Canvas Hero Banner */
    .canvas-hero-card {
      background: radial-gradient(circle at 90% 10%, rgba(173, 255, 28, 0.15) 0%, transparent 50%),
                  radial-gradient(circle at 10% 90%, rgba(16, 64, 65, 0.7) 0%, transparent 60%),
                  linear-gradient(135deg, #0a2425 0%, #0e3738 50%, #06191a 100%);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 20px;
      padding: 36px 40px;
      position: relative;
      overflow: hidden;
      margin-bottom: 36px;
      box-shadow: 0 12px 35px rgba(0,0,0,0.3);
    }

    .canvas-hero-card::before {
      content: "";
      position: absolute;
      inset: 0;
      background-image: radial-gradient(rgba(255, 255, 255, 0.08) 1px, transparent 1px);
      background-size: 20px 20px;
      opacity: 0.6;
      pointer-events: none;
    }

    .hero-pill-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(173, 255, 28, 0.12);
      color: var(--brand-lime);
      border: 1px solid rgba(173, 255, 28, 0.35);
      padding: 5px 14px;
      border-radius: 30px;
      font-size: 12px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.6px;
      margin-bottom: 14px;
    }

    .hero-pill-badge i {
      animation: pulseGlow 2s infinite ease-in-out;
    }

    @keyframes pulseGlow {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.2); opacity: 0.8; }
    }

    .canvas-hero-title {
      font-size: 32px;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -0.5px;
      line-height: 1.25;
      margin-bottom: 12px;
    }

    .canvas-hero-desc {
      font-size: 15px;
      color: #cbe3e1;
      max-width: 680px;
      line-height: 1.6;
      margin-bottom: 22px;
    }

    .hero-stat-badges {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .stat-chip {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, 0.07);
      border: 1px solid rgba(255, 255, 255, 0.12);
      border-radius: 20px;
      padding: 5px 12px;
      font-size: 12px;
      font-weight: 600;
      color: #ffffff;
    }

    .stat-chip i {
      color: var(--brand-lime);
      font-size: 11px;
    }

    /* Workspace Action Bar */
    .workspace-controls-bar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      margin-bottom: 28px;
      padding-bottom: 20px;
      border-bottom: 1px solid var(--border-subtle);
    }

    .category-quick-filters {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }

    .cat-filter-btn {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border-subtle);
      color: var(--text-muted);
      border-radius: 10px;
      padding: 8px 14px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s ease;
    }

    .cat-filter-btn:hover {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff;
      border-color: rgba(255, 255, 255, 0.18);
    }

    .cat-filter-btn.active {
      background: var(--brand-teal);
      border-color: var(--brand-lime);
      color: #ffffff;
      box-shadow: 0 0 12px rgba(173, 255, 28, 0.15);
    }

    .cat-filter-btn.active i {
      color: var(--brand-lime);
    }

    .view-toggles {
      display: flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border-subtle);
      border-radius: 10px;
      padding: 4px;
    }

    .view-btn {
      width: 32px;
      height: 32px;
      border-radius: 8px;
      border: none;
      background: transparent;
      color: var(--text-dim);
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .view-btn:hover {
      color: #ffffff;
    }

    .view-btn.active {
      background: rgba(255, 255, 255, 0.12);
      color: var(--brand-lime);
    }

    /* =========================================
       4. SECTION HEADERS & TOOL CARDS
       ========================================= */
    .tools-section {
      margin-bottom: 48px;
      scroll-margin-top: 90px;
    }

    .section-header-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .section-title-group {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .section-icon-badge {
      width: 36px;
      height: 36px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
    }

    .badge-popular { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); }
    .badge-marketing { background: rgba(34, 197, 94, 0.15); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3); }
    .badge-finance { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.3); }
    .badge-seo { background: rgba(99, 102, 241, 0.15); color: #818cf8; border: 1px solid rgba(99, 102, 241, 0.3); }
    .badge-performance { background: rgba(236, 72, 153, 0.15); color: #f472b6; border: 1px solid rgba(236, 72, 153, 0.3); }
    .badge-legal { background: rgba(14, 165, 233, 0.15); color: #38bdf8; border: 1px solid rgba(14, 165, 233, 0.3); }

    .section-title {
      font-size: 20px;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -0.3px;
      margin: 0;
    }

    .section-count {
      font-size: 12px;
      font-weight: 700;
      background: rgba(255, 255, 255, 0.08);
      color: var(--text-muted);
      padding: 3px 9px;
      border-radius: 20px;
    }

    /* Grid Layout */
    .tools-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 20px;
    }

    /* List Layout Switch */
    .tools-grid.list-view {
      grid-template-columns: 1fr;
    }

    .tools-grid.list-view .tool-card {
      flex-direction: row;
      align-items: center;
      padding: 18px 24px;
      gap: 20px;
    }

    .tools-grid.list-view .tool-card-body {
      flex: 1;
    }

    .tools-grid.list-view .tool-desc {
      margin-bottom: 0;
    }

    .tools-grid.list-view .tool-card-footer {
      border-top: none;
      padding-top: 0;
      min-width: 220px;
      justify-content: flex-end;
    }

    /* Tool Card UI */
    .tool-card {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: 16px;
      padding: 22px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      transition: all 0.28s cubic-bezier(0.16, 1, 0.3, 1);
      box-shadow: 0 4px 18px rgba(0,0,0,0.18);
    }

    .tool-card:hover {
      background: var(--card-hover-bg);
      transform: translateY(-4px);
      border-color: rgba(173, 255, 28, 0.35);
      box-shadow: 0 12px 30px rgba(0,0,0,0.35), 0 0 15px rgba(173, 255, 28, 0.1);
    }

    .tool-card-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      margin-bottom: 16px;
    }

    .tool-icon-box {
      width: 48px;
      height: 48px;
      border-radius: 13px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      transition: transform 0.2s ease;
    }

    .tool-card:hover .tool-icon-box {
      transform: scale(1.08);
    }

    /* Icon Theme styles */
    .icon-emerald { background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.25); }
    .icon-teal { background: rgba(20, 184, 166, 0.15); color: #2dd4bf; border: 1px solid rgba(20, 184, 166, 0.25); }
    .icon-amber { background: rgba(245, 158, 11, 0.15); color: #fbbf24; border: 1px solid rgba(245, 158, 11, 0.25); }
    .icon-indigo { background: rgba(99, 102, 241, 0.15); color: #818cf8; border: 1px solid rgba(99, 102, 241, 0.25); }
    .icon-blue { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.25); }
    .icon-purple { background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.25); }
    .icon-rose { background: rgba(244, 63, 94, 0.15); color: #fb7185; border: 1px solid rgba(244, 63, 94, 0.25); }
    .icon-cyan { background: rgba(6, 182, 212, 0.15); color: #22d3ee; border: 1px solid rgba(6, 182, 212, 0.25); }
    .icon-orange { background: rgba(249, 115, 22, 0.15); color: #fb923c; border: 1px solid rgba(249, 115, 22, 0.25); }

    .tool-actions-top {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .star-tool-btn {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border-subtle);
      color: var(--text-dim);
      width: 32px;
      height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      font-size: 13px;
      transition: all 0.2s ease;
    }

    .star-tool-btn:hover {
      color: #fbbf24;
      background: rgba(251, 191, 36, 0.1);
      border-color: rgba(251, 191, 36, 0.3);
    }

    .star-tool-btn.starred {
      color: #fbbf24;
      background: rgba(251, 191, 36, 0.15);
      border-color: #fbbf24;
    }

    .tool-title {
      font-size: 17px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 6px;
      line-height: 1.3;
    }

    .tool-desc {
      font-size: 13.5px;
      color: var(--text-muted);
      line-height: 1.5;
      margin-bottom: 16px;
    }

    .tool-tags-list {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
      margin-bottom: 18px;
    }

    .tool-tag-pill {
      font-size: 11px;
      font-weight: 600;
      background: rgba(255, 255, 255, 0.05);
      color: #c4d7d7;
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 6px;
      padding: 2px 7px;
    }

    .tool-card-footer {
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-top: 1px solid rgba(255, 255, 255, 0.06);
      padding-top: 14px;
      gap: 8px;
    }

    .copy-tool-link-btn {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border-subtle);
      color: var(--text-muted);
      border-radius: 8px;
      padding: 6px 10px;
      font-size: 12px;
      font-weight: 600;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.2s ease;
    }

    .copy-tool-link-btn:hover {
      background: rgba(255, 255, 255, 0.09);
      color: #ffffff;
    }

    .launch-tool-btn {
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.3);
      color: var(--brand-lime);
      border-radius: 8px;
      padding: 7px 14px;
      font-size: 13px;
      font-weight: 700;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.2s ease;
    }

    .launch-tool-btn:hover {
      background: var(--brand-lime);
      color: #071314;
      box-shadow: 0 0 14px var(--brand-lime-glow);
    }

    .launch-tool-btn i {
      transition: transform 0.2s ease;
    }

    .launch-tool-btn:hover i {
      transform: translateX(3px);
    }

    /* Empty state */
    .empty-search-state {
      background: var(--card-bg);
      border: 1px dashed rgba(255, 255, 255, 0.15);
      border-radius: 16px;
      padding: 48px 24px;
      text-align: center;
      margin: 20px 0;
    }

    .empty-search-state i {
      font-size: 42px;
      color: var(--text-dim);
      margin-bottom: 14px;
    }

    .empty-search-state h4 {
      font-size: 18px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 6px;
    }

    .empty-search-state p {
      color: var(--text-muted);
      font-size: 14px;
      margin-bottom: 16px;
    }

    /* =========================================
       5. FAQ & PRO CTA BANNER (CANVA STYLE)
       ========================================= */
    .app-faq-section {
      background: var(--card-bg);
      border: 1px solid var(--border-subtle);
      border-radius: 18px;
      padding: 32px 36px;
      margin-bottom: 40px;
    }

    .faq-title {
      font-size: 22px;
      font-weight: 800;
      color: #ffffff;
      margin-bottom: 8px;
    }

    .faq-subtitle {
      color: var(--text-muted);
      font-size: 14px;
      margin-bottom: 24px;
    }

    .app-faq-item {
      border-bottom: 1px solid rgba(255, 255, 255, 0.06);
      padding: 16px 0;
    }

    .app-faq-item:last-child {
      border-bottom: none;
      padding-bottom: 0;
    }

    .app-faq-item summary {
      font-size: 15px;
      font-weight: 700;
      color: #ffffff;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: space-between;
      user-select: none;
      list-style: none;
    }

    .app-faq-item summary::-webkit-details-marker { display: none; }

    .app-faq-item summary::after {
      content: "\f078";
      font-family: "Font Awesome 6 Free";
      font-weight: 900;
      font-size: 12px;
      color: var(--brand-lime);
      transition: transform 0.2s ease;
    }

    .app-faq-item[open] summary::after {
      transform: rotate(180deg);
    }

    .app-faq-item p {
      font-size: 14px;
      color: var(--text-muted);
      line-height: 1.6;
      margin-top: 10px;
      margin-bottom: 0;
    }

    /* SaaS App Footer Bar */
    .app-status-footer {
      background: var(--sidebar-bg);
      border: 1px solid var(--border-subtle);
      border-radius: 16px;
      padding: 20px 28px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 16px;
      font-size: 13px;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      color: #34d399;
      font-weight: 600;
    }

    .status-badge .dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #34d399;
      box-shadow: 0 0 8px #34d399;
      animation: pulseGreen 2s infinite ease-in-out;
    }

    @keyframes pulseGreen {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.3); opacity: 0.7; }
    }

    .footer-links-group {
      display: flex;
      align-items: center;
      gap: 18px;
    }

    .footer-links-group a {
      color: var(--text-muted);
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
    }

    .footer-links-group a:hover {
      color: var(--brand-lime);
    }

    /* Toast Notification */
    .app-toast {
      position: fixed;
      bottom: 24px;
      right: 24px;
      background: #104041;
      border: 1px solid var(--brand-lime);
      color: #ffffff;
      padding: 12px 20px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
      z-index: 1090;
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 13.5px;
      font-weight: 600;
      transform: translateY(100px);
      opacity: 0;
      transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
      pointer-events: none;
    }

    .app-toast.show {
      transform: translateY(0);
      opacity: 1;
      pointer-events: auto;
    }

    /* Modal Styling */
    .modal-content.app-modal {
      background: #0d2728;
      border: 1px solid rgba(173, 255, 28, 0.3);
      border-radius: 18px;
      color: #ffffff;
    }

    .modal-content.app-modal .modal-header {
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding: 20px 24px;
    }

    .modal-content.app-modal .modal-footer {
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      padding: 16px 24px;
    }

    .modal-content.app-modal .form-control {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--border-subtle);
      color: #ffffff;
      border-radius: 10px;
      padding: 10px 14px;
    }

    .modal-content.app-modal .form-control:focus {
      background: rgba(255, 255, 255, 0.08);
      border-color: var(--brand-lime);
      box-shadow: 0 0 0 3px rgba(173, 255, 28, 0.15);
      color: #ffffff;
    }

    /* =========================================
       6. RESPONSIVE BREAKPOINTS
       ========================================= */
    @media (max-width: 991px) {
      .mobile-menu-toggle {
        display: flex;
      }
      .app-sidebar {
        transform: translateX(-100%);
        width: 280px;
        box-shadow: 10px 0 30px rgba(0,0,0,0.5);
      }
      .app-sidebar.show {
        transform: translateX(0);
      }
      .app-main-content {
        margin-left: 0;
        padding: 24px 16px 40px;
      }
      .topbar-brand {
        min-width: auto;
      }
      .topbar-search-container {
        margin: 0 12px;
      }
      .canvas-hero-card {
        padding: 26px 20px;
      }
      .canvas-hero-title {
        font-size: 24px;
      }
    }

    @media (max-width: 576px) {
      .topbar-search-kbd {
        display: none;
      }
      .topbar-actions .topbar-btn span {
        display: none;
      }
      .topbar-actions .topbar-btn {
        padding: 8px 12px;
      }
      .canvas-hero-card {
        padding: 20px 16px;
      }
      .tools-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

  <!-- =========================================
       APP TOP BAR (CANVA-STYLE NAVIGATION)
       ========================================= -->
  <header class="app-topbar">
    <div class="d-flex align-items-center gap-2">
      <button type="button" class="mobile-menu-toggle" id="sidebarToggleBtn" aria-label="Toggle Sidebar Menu">
        <i class="fa-solid fa-bars"></i>
      </button>

      <a href="<?= $site ?>free-tools/" class="topbar-brand">
        <div class="brand-logo-badge">
          <img src="<?= $site ?>assets/img/logo/fav-logo5.png" alt="NikhilWorks Logo">
        </div>
        <div class="brand-title-group">
          <div class="brand-main-title">Nikhil<span>Works</span></div>
          <div class="brand-sub-badge">Tools Studio • Pro Suite</div>
        </div>
      </a>
    </div>

    <!-- Live Universal Search -->
    <div class="topbar-search-container">
      <i class="fa-solid fa-magnifying-glass topbar-search-icon"></i>
      <input type="text" id="appToolSearch" class="topbar-search-input" placeholder="Search 14+ tools (e.g. WhatsApp, GST, Invoice, SEO, Schema)..." autocomplete="off">
      <span class="topbar-search-kbd">/</span>
    </div>

    <!-- Topbar Actions -->
    <div class="topbar-actions">
      <button type="button" class="topbar-btn topbar-btn-ghost" id="filterStarredBtn" title="View Starred Tools">
        <i class="fa-solid fa-star text-warning"></i>
        <span>Starred (<b id="topbarFavCount">0</b>)</span>
      </button>

      <button type="button" class="topbar-btn topbar-btn-ghost" data-bs-toggle="modal" data-bs-target="#requestToolModal" title="Request a New Tool">
        <i class="fa-solid fa-wand-magic-sparkles text-info"></i>
        <span>Request Tool</span>
      </button>

      <a href="<?= $site ?>" class="topbar-btn topbar-btn-primary" title="Return to Main Portfolio Website">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Main Website</span>
      </a>
    </div>
  </header>

  <div class="app-wrapper">

    <!-- =========================================
         CANVA-STYLE LEFT APP SIDEBAR
         ========================================= -->
    <aside class="app-sidebar" id="appSidebar">
      <div>
        <div class="sidebar-section-title">Suite Workspace</div>
        <ul class="sidebar-nav-list">
          <li>
            <a href="#all" class="sidebar-nav-link active" data-category="all">
              <span><i class="fa-solid fa-border-all"></i> All Tools</span>
              <span class="nav-count-pill">14</span>
            </a>
          </li>
          <li>
            <a href="#popular" class="sidebar-nav-link" data-category="popular">
              <span><i class="fa-solid fa-fire text-danger"></i> Most Popular</span>
              <span class="nav-count-pill">4</span>
            </a>
          </li>
          <li>
            <a href="#marketing" class="sidebar-nav-link" data-category="marketing">
              <span><i class="fa-solid fa-bullhorn text-success"></i> Marketing &amp; Social</span>
              <span class="nav-count-pill">3</span>
            </a>
          </li>
          <li>
            <a href="#finance" class="sidebar-nav-link" data-category="finance">
              <span><i class="fa-solid fa-calculator text-warning"></i> Finance &amp; Billing</span>
              <span class="nav-count-pill">4</span>
            </a>
          </li>
          <li>
            <a href="#seo" class="sidebar-nav-link" data-category="seo">
              <span><i class="fa-solid fa-magnifying-glass-chart text-primary"></i> SEO &amp; Indexing</span>
              <span class="nav-count-pill">4</span>
            </a>
          </li>
          <li>
            <a href="#performance" class="sidebar-nav-link" data-category="performance">
              <span><i class="fa-solid fa-bolt text-danger"></i> Speed &amp; Security</span>
              <span class="nav-count-pill">2</span>
            </a>
          </li>
          <li>
            <a href="#legal" class="sidebar-nav-link" data-category="legal">
              <span><i class="fa-solid fa-scale-balanced text-info"></i> Legal &amp; Policy</span>
              <span class="nav-count-pill">1</span>
            </a>
          </li>
        </ul>

        <div class="sidebar-section-title">Core Standards</div>
        <div class="px-2 mb-4 d-flex flex-column gap-2" style="font-size: 12.5px; color: #a3c9c9;">
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-shield-halved text-success"></i> 100% Client-Side Safe
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-bolt-lightning text-warning"></i> Instant Real-Time Output
          </div>
          <div class="d-flex align-items-center gap-2">
            <i class="fa-solid fa-user-xmark text-info"></i> Zero Signup or Cookies
          </div>
        </div>
      </div>

      <!-- Developer & Custom Project Card -->
      <div class="sidebar-pro-card">
        <div class="sidebar-pro-header">
          <div class="pro-avatar">NG</div>
          <div>
            <div class="pro-title">Nikhil Gupta</div>
            <div class="pro-subtitle">Full-Stack &amp; AI Architect</div>
          </div>
        </div>
        <p>Need custom automation, a CRM tool, or SaaS web application built for your business?</p>
        <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20need%20custom%20tool%2Fsoftware%20development." target="_blank" class="sidebar-pro-btn">
          <i class="fa-brands fa-whatsapp"></i> Chat with Nikhil
        </a>
      </div>
    </aside>

    <!-- =========================================
         CANVA-STYLE MAIN WORKSPACE / DASHBOARD
         ========================================= -->
    <main class="app-main-content">

      <!-- Hero Canvas Banner -->
      <div class="canvas-hero-card">
        <div class="hero-pill-badge">
          <i class="fa-solid fa-wand-magic-sparkles"></i> 14 Free High-Power Web Utilities
        </div>
        <h1 class="canvas-hero-title">
          Developer &amp; Business Productivity Suite
        </h1>
        <p class="canvas-hero-desc">
          High-utility, client-side tools designed for businesses, developers, marketers, and daily webmasters. 
          Instant results, zero ads, no sign-ups required.
        </p>

        <div class="hero-stat-badges">
          <div class="stat-chip"><i class="fa-solid fa-check"></i> 14 Verified Tools</div>
          <div class="stat-chip"><i class="fa-solid fa-bolt"></i> Instant In-Browser Execution</div>
          <div class="stat-chip"><i class="fa-solid fa-lock"></i> 100% Privacy-First</div>
          <div class="stat-chip"><i class="fa-solid fa-infinity"></i> Free Forever</div>
        </div>
      </div>

      <!-- Workspace Action Bar -->
      <div class="workspace-controls-bar">
        <!-- Quick category filter chips -->
        <div class="category-quick-filters">
          <button type="button" class="cat-filter-btn active" data-category="all">
            <i class="fa-solid fa-border-all"></i> All (14)
          </button>
          <button type="button" class="cat-filter-btn" data-category="popular">
            <i class="fa-solid fa-fire text-danger"></i> Popular
          </button>
          <button type="button" class="cat-filter-btn" data-category="marketing">
            <i class="fa-solid fa-bullhorn text-success"></i> Marketing
          </button>
          <button type="button" class="cat-filter-btn" data-category="finance">
            <i class="fa-solid fa-calculator text-warning"></i> Finance
          </button>
          <button type="button" class="cat-filter-btn" data-category="seo">
            <i class="fa-solid fa-magnifying-glass-chart text-primary"></i> SEO
          </button>
          <button type="button" class="cat-filter-btn" data-category="performance">
            <i class="fa-solid fa-bolt text-danger"></i> Speed &amp; Security
          </button>
          <button type="button" class="cat-filter-btn" data-category="legal">
            <i class="fa-solid fa-scale-balanced text-info"></i> Legal
          </button>
        </div>

        <!-- Grid / List View Toggle -->
        <div class="view-toggles">
          <button type="button" class="view-btn active" id="viewGridBtn" title="Grid Cards View">
            <i class="fa-solid fa-grip"></i>
          </button>
          <button type="button" class="view-btn" id="viewListBtn" title="Compact List View">
            <i class="fa-solid fa-list"></i>
          </button>
        </div>
      </div>

      <!-- Empty Search Result Container -->
      <div id="appEmptyState" class="empty-search-state d-none">
        <i class="fa-solid fa-magnifying-glass"></i>
        <h4>No matching tools found</h4>
        <p>Try searching for keywords like "WhatsApp", "GST", "Invoice", "SEO", or "QR Code".</p>
        <button type="button" class="topbar-btn topbar-btn-primary" id="resetSearchBtn">
          Clear Search &amp; View All Tools
        </button>
      </div>

      <!-- =========================================
           SECTION 1: MOST POPULAR ESSENTIALS
           ========================================= -->
      <section class="tools-section" id="popularSection" data-section-category="popular">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-popular">
              <i class="fa-solid fa-fire"></i>
            </div>
            <h2 class="section-title">Most Popular &amp; Essential Utilities</h2>
          </div>
          <span class="section-count">4 Tools</span>
        </div>

        <div class="tools-grid">

          <!-- 1. Free Invoice Generator -->
          <div class="tool-card" data-tool-id="invoice" data-category="finance popular" data-keywords="invoice generator billing tax gst invoice freelance receipt download pdf print">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-emerald">
                  <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="invoice" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Free Invoice Generator</h3>
                <p class="tool-desc">
                  Create beautiful, professional client invoices with custom company logo, itemized billing, Indian GST tax rates, and instant PDF printing.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">PDF Export</span>
                  <span class="tool-tag-pill">GST Ready</span>
                  <span class="tool-tag-pill">No Watermark</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/invoice/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/invoice/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- 2. WhatsApp Link Generator -->
          <div class="tool-card" data-tool-id="whatsapp" data-category="marketing popular" data-keywords="whatsapp link generator wa.me click to chat insta bio message business url">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-emerald">
                  <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="whatsapp" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">WhatsApp Link Generator</h3>
                <p class="tool-desc">
                  Generate clean <code>wa.me</code> click-to-chat links with custom pre-filled messages and instant QR codes for Instagram bio, Facebook ads, and print cards.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">wa.me Link</span>
                  <span class="tool-tag-pill">Pre-filled Chat</span>
                  <span class="tool-tag-pill">Instant QR</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/whatsapp-link/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/whatsapp-link/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- 3. QR Code Generator -->
          <div class="tool-card" data-tool-id="qrcode" data-category="marketing popular" data-keywords="qr code generator custom color download svg png vcard wifi text scanner">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-teal">
                  <i class="fa-solid fa-qrcode"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="qrcode" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">QR Code Generator</h3>
                <p class="tool-desc">
                  Create high-resolution, customized QR codes for URLs, Contact vCards, WiFi networks, and text. Download in sharp PNG &amp; vector SVG formats.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Vector SVG</span>
                  <span class="tool-tag-pill">WiFi &amp; vCard</span>
                  <span class="tool-tag-pill">Color Customizer</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/qr-code/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/qr-code/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- 4. GST Calculator India -->
          <div class="tool-card" data-tool-id="gst" data-category="finance popular" data-keywords="gst calculator india cgst sgst igst tax reverse slab 5% 12% 18% 28%">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-amber">
                  <i class="fa-solid fa-calculator"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="gst" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">GST Calculator India</h3>
                <p class="tool-desc">
                  Calculate Inclusive or Exclusive GST with CGST, SGST, and IGST breakdowns for 5%, 12%, 18%, and 28% tax slabs. Features reverse tax deduction.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">All Tax Slabs</span>
                  <span class="tool-tag-pill">Reverse GST</span>
                  <span class="tool-tag-pill">State / Inter-State</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/gst-calculator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/gst-calculator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           SECTION 2: MARKETING & SOCIAL GROWTH
           ========================================= -->
      <section class="tools-section" id="marketingSection" data-section-category="marketing">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-marketing">
              <i class="fa-solid fa-bullhorn"></i>
            </div>
            <h2 class="section-title">Marketing &amp; Social Growth</h2>
          </div>
          <span class="section-count">3 Tools</span>
        </div>

        <div class="tools-grid">

          <!-- WhatsApp Link -->
          <div class="tool-card" data-tool-id="whatsapp-m" data-category="marketing" data-keywords="whatsapp link generator wa.me click to chat insta bio message business url">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-emerald">
                  <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="whatsapp" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">WhatsApp Link Generator</h3>
                <p class="tool-desc">
                  Generate instant <code>wa.me</code> click-to-chat links with custom pre-filled message encoding and printable QR code for social bios and ads.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Social Bio</span>
                  <span class="tool-tag-pill">Ad Campaigns</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/whatsapp-link/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/whatsapp-link/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- QR Code Generator -->
          <div class="tool-card" data-tool-id="qrcode-m" data-category="marketing" data-keywords="qr code generator custom color download svg png vcard wifi text scanner">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-teal">
                  <i class="fa-solid fa-qrcode"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="qrcode" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">QR Code Generator</h3>
                <p class="tool-desc">
                  Create high-resolution, customized QR codes for URLs, Contact vCards, WiFi networks, and text. Download in PNG &amp; SVG formats.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Vector SVG</span>
                  <span class="tool-tag-pill">High Precision</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/qr-code/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/qr-code/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Meta Tags Preview -->
          <div class="tool-card" data-tool-id="metatags" data-category="marketing seo" data-keywords="meta tag preview open graph og twitter card serp simulator google snippet social preview facebook linkedin">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-purple">
                  <i class="fa-solid fa-tags"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="metatags" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Meta Tags &amp; Social Preview</h3>
                <p class="tool-desc">
                  Simulate how your webpage looks on Google SERP, Facebook, X (Twitter), and LinkedIn. Validate title character counts, descriptions, and OG banners.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Live Preview</span>
                  <span class="tool-tag-pill">OG Card Test</span>
                  <span class="tool-tag-pill">SERP Snippet</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/meta-preview/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/meta-preview/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           SECTION 3: FINANCE & BUSINESS CALCULATORS
           ========================================= -->
      <section class="tools-section" id="financeSection" data-section-category="finance">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-finance">
              <i class="fa-solid fa-calculator"></i>
            </div>
            <h2 class="section-title">Finance, Invoicing &amp; Tax Calculators</h2>
          </div>
          <span class="section-count">4 Tools</span>
        </div>

        <div class="tools-grid">

          <!-- Invoice Generator -->
          <div class="tool-card" data-tool-id="invoice-f" data-category="finance" data-keywords="invoice generator billing tax gst invoice freelance receipt download pdf print">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-emerald">
                  <i class="fa-solid fa-file-invoice-dollar"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="invoice" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Free Invoice Generator</h3>
                <p class="tool-desc">
                  Create clean, branded invoices with itemized billing lines, automatic tax rate calculations, currency switcher, and 1-click PDF download.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">PDF Export</span>
                  <span class="tool-tag-pill">GST Compliant</span>
                  <span class="tool-tag-pill">Custom Logo</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/invoice/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/invoice/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- GST Calculator -->
          <div class="tool-card" data-tool-id="gst-f" data-category="finance" data-keywords="gst calculator india cgst sgst igst tax reverse slab 5% 12% 18% 28%">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-amber">
                  <i class="fa-solid fa-calculator"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="gst" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">GST Calculator India</h3>
                <p class="tool-desc">
                  Calculate Inclusive or Exclusive GST with CGST, SGST, and IGST breakdowns for 5%, 12%, 18%, and 28% slabs.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Inclusive / Exclusive</span>
                  <span class="tool-tag-pill">All Indian Slabs</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/gst-calculator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/gst-calculator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Profit Margin Calculator -->
          <div class="tool-card" data-tool-id="profit" data-category="finance" data-keywords="profit margin calculator markup cost selling price revenue gross profit break even">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-indigo">
                  <i class="fa-solid fa-chart-line"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="profit" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Profit Margin Calculator</h3>
                <p class="tool-desc">
                  Calculate Gross Profit, Markup Percentage, and Selling Price effortlessly. Perfect for eCommerce founders, retail stores, and service agencies.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Gross Margin</span>
                  <span class="tool-tag-pill">Markup Multiplier</span>
                  <span class="tool-tag-pill">Break-Even</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/profit-calculator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/profit-calculator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Website Cost Calculator -->
          <div class="tool-card" data-tool-id="cost-calc" data-category="finance" data-keywords="website cost calculator estimate price quote pricing web design development cost india">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-blue">
                  <i class="fa-solid fa-laptop-code"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="cost-calc" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Website Cost Estimator</h3>
                <p class="tool-desc">
                  Calculate realistic development costs for custom business websites, eCommerce portals, and SaaS applications with granular feature selection.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Interactive Scope</span>
                  <span class="tool-tag-pill">Instant Quote</span>
                  <span class="tool-tag-pill">Tech Stack Breakdown</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>website-cost-calculator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>website-cost-calculator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           SECTION 4: SEO, INDEXING & STRUCTURED DATA
           ========================================= -->
      <section class="tools-section" id="seoSection" data-section-category="seo">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-seo">
              <i class="fa-solid fa-magnifying-glass-chart"></i>
            </div>
            <h2 class="section-title">SEO, Indexing &amp; Structured Data</h2>
          </div>
          <span class="section-count">4 Tools</span>
        </div>

        <div class="tools-grid">

          <!-- SEO Auditor -->
          <div class="tool-card" data-tool-id="seo-audit" data-category="seo" data-keywords="free seo audit tool on page seo analyzer score technical seo backlinks meta heading checker">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-purple">
                  <i class="fa-solid fa-magnifying-glass-chart"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="seo-audit" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Free SEO Audit Tool</h3>
                <p class="tool-desc">
                  Comprehensive on-page and technical SEO auditor. Checks title tags, meta descriptions, heading structures, image alt texts, and indexability scores.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">On-Page Audit</span>
                  <span class="tool-tag-pill">Technical Score</span>
                  <span class="tool-tag-pill">Actionable Fixes</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>seo-auditor/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>seo-auditor/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Google Index Checker -->
          <div class="tool-card" data-tool-id="index-chk" data-category="seo" data-keywords="google index checker serp status cache date indexed url site query search console">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-blue">
                  <i class="fa-brands fa-google"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="index-chk" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Google Index &amp; Cache Checker</h3>
                <p class="tool-desc">
                  Quickly inspect if your webpage is indexed on Google, view Google's cached snapshot date, and verify robots crawling indexability in one click.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Index Status</span>
                  <span class="tool-tag-pill">Cache Snapshot</span>
                  <span class="tool-tag-pill">SERP Check</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/index-checker/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/index-checker/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Schema Generator -->
          <div class="tool-card" data-tool-id="schema-gen" data-category="seo" data-keywords="schema generator json ld localbusiness person organization faq article product rich snippet">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-cyan">
                  <i class="fa-solid fa-code"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="schema-gen" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Schema JSON-LD Generator</h3>
                <p class="tool-desc">
                  Build clean, valid Schema.org structured data for LocalBusiness, Organization, Person, Article, FAQ, and Product to earn Google Rich Snippets stars.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">JSON-LD</span>
                  <span class="tool-tag-pill">Rich Snippets</span>
                  <span class="tool-tag-pill">1-Click Copy</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/schema-generator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/schema-generator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- Robots.txt Validator -->
          <div class="tool-card" data-tool-id="robots-val" data-category="seo" data-keywords="robots txt validator tester crawl syntax disallow allow sitemap user agent search bot">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-orange">
                  <i class="fa-solid fa-robot"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="robots-val" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Robots.txt Validator &amp; Tester</h3>
                <p class="tool-desc">
                  Test and validate your <code>robots.txt</code> file for syntax errors, check Googlebot crawler directives, verify sitemap locations, and simulate URL blocking.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Syntax Check</span>
                  <span class="tool-tag-pill">Googlebot Test</span>
                  <span class="tool-tag-pill">Sitemap Directives</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/robots-validator/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/robots-validator/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           SECTION 5: SPEED, PERFORMANCE & SECURITY
           ========================================= -->
      <section class="tools-section" id="performanceSection" data-section-category="performance">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-performance">
              <i class="fa-solid fa-bolt"></i>
            </div>
            <h2 class="section-title">Speed, Performance &amp; Security</h2>
          </div>
          <span class="section-count">2 Tools</span>
        </div>

        <div class="tools-grid">

          <!-- PageSpeed Checker -->
          <div class="tool-card" data-tool-id="pagespeed" data-category="performance" data-keywords="pagespeed insights checker core web vitals lcp cls inp fcp performance audit mobile desktop">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-rose">
                  <i class="fa-solid fa-gauge-high"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="pagespeed" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Google PageSpeed Checker</h3>
                <p class="tool-desc">
                  Analyze live website speed and Core Web Vitals (LCP, INP, CLS) powered by Google Lighthouse. Get actionable performance fixes for mobile &amp; desktop.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Core Web Vitals</span>
                  <span class="tool-tag-pill">Lighthouse API</span>
                  <span class="tool-tag-pill">Mobile vs Desktop</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/pagespeed/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/pagespeed/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

          <!-- SSL Checker -->
          <div class="tool-card" data-tool-id="ssl" data-category="performance" data-keywords="ssl checker certificate expiry issuer tls https domain security test">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-indigo">
                  <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="ssl" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">SSL &amp; Security Checker</h3>
                <p class="tool-desc">
                  Inspect SSL certificate validity, issuer authority, expiration date countdown, TLS protocol versions, and HTTPS configuration grade for any domain.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">Expiry Countdown</span>
                  <span class="tool-tag-pill">TLS Protocols</span>
                  <span class="tool-tag-pill">Security Grade</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/ssl-checker/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/ssl-checker/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           SECTION 6: LEGAL & COMPLIANCE
           ========================================= -->
      <section class="tools-section" id="legalSection" data-section-category="legal">
        <div class="section-header-row">
          <div class="section-title-group">
            <div class="section-icon-badge badge-legal">
              <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <h2 class="section-title">Legal &amp; Policy Compliance</h2>
          </div>
          <span class="section-count">1 Tool</span>
        </div>

        <div class="tools-grid">

          <!-- Privacy Policy Generator -->
          <div class="tool-card" data-tool-id="privacy" data-category="legal" data-keywords="privacy policy generator gdpr ccpa india dpdp compliance legal template website terms cookies">
            <div>
              <div class="tool-card-top">
                <div class="tool-icon-box icon-amber">
                  <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <div class="tool-actions-top">
                  <button type="button" class="star-tool-btn" data-tool-id="privacy" title="Bookmark to Starred">
                    <i class="fa-regular fa-star"></i>
                  </button>
                </div>
              </div>
              <div class="tool-card-body">
                <h3 class="tool-title">Privacy Policy Generator</h3>
                <p class="tool-desc">
                  Generate customized, legally compliant Privacy Policy documents tailored for websites, blogs, and SaaS apps complying with GDPR, CCPA, and India DPDP standards.
                </p>
                <div class="tool-tags-list">
                  <span class="tool-tag-pill">GDPR &amp; CCPA</span>
                  <span class="tool-tag-pill">India DPDP</span>
                  <span class="tool-tag-pill">HTML / Markdown</span>
                </div>
              </div>
            </div>
            <div class="tool-card-footer">
              <button type="button" class="copy-tool-link-btn" data-url="<?= $site ?>tools/privacy-policy/">
                <i class="fa-solid fa-link"></i> Copy Link
              </button>
              <a href="<?= $site ?>tools/privacy-policy/" class="launch-tool-btn">
                Launch <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>

        </div>
      </section>

      <!-- =========================================
           FAQ SECTION (APP ACCORDION)
           ========================================= -->
      <section class="app-faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>
        <p class="faq-subtitle">Everything you need to know about NikhilWorks free tools suite.</p>

        <details class="app-faq-item" open>
          <summary>Are all 14 tools on this hub 100% free?</summary>
          <p>Yes! Every tool listed in this suite is 100% free with unlimited usage. There are no paywalls, hidden limits, watermarks, or credit card requirements.</p>
        </details>

        <details class="app-faq-item">
          <summary>Is my data secure when using these tools?</summary>
          <p>Absolutely. All tools run locally in your browser using modern client-side JavaScript. We do not store, log, or track your entered business figures, phone numbers, or invoices.</p>
        </details>

        <details class="app-faq-item">
          <summary>Can I use generated invoices, QR codes &amp; schemas commercially?</summary>
          <p>Yes! All generated outputs including PDF invoices, QR codes, structured schema JSON-LD, and policy agreements can be used directly for client projects and personal business without attribution.</p>
        </details>

        <details class="app-faq-item">
          <summary>Can Nikhil Gupta build custom software or APIs for my business?</summary>
          <p>Yes! From bespoke ERP/CRM portals to WhatsApp automation bots, payment gateway flows, and AI agents, Nikhil Gupta provides custom full-stack web and software engineering.</p>
        </details>
      </section>

      <!-- =========================================
           CANVA-STYLE APP FOOTER STATUS BAR
           ========================================= -->
      <footer class="app-status-footer">
        <div class="status-badge">
          <span class="dot"></span>
          <span>14/14 Tools Operational • 100% Client-Side</span>
        </div>

        <div class="footer-links-group">
          <a href="<?= $site ?>">Portfolio</a>
          <a href="<?= $site ?>services/">Services</a>
          <a href="<?= $site ?>pricing/">Pricing</a>
          <a href="<?= $site ?>testimonials/">Reviews</a>
          <a href="<?= $site ?>contact/">Contact</a>
          <a href="https://wa.me/918368552640" target="_blank" class="text-success"><i class="fa-brands fa-whatsapp"></i> +91 8368552640</a>
        </div>

        <div class="text-dim" style="font-size: 12px;">
          &copy; <?= date('Y') ?> NikhilWorks. Engineering High-Impact Web Solutions.
        </div>
      </footer>

    </main>
  </div>

  <!-- =========================================
       REQUEST A TOOL MODAL
       ========================================= -->
  <div class="modal fade" id="requestToolModal" tabindex="-1" aria-labelledby="requestToolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content app-modal">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="requestToolModalLabel">
            <i class="fa-solid fa-wand-magic-sparkles text-info me-2"></i> Request a New Free Tool
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-muted small mb-3">
            Have an idea for a calculator, generator, or developer utility that would save you time? Tell Nikhil and we'll build it!
          </p>
          <form id="toolRequestForm">
            <div class="mb-3">
              <label class="form-label text-light small fw-bold">Tool Name / Concept</label>
              <input type="text" class="form-control" id="reqToolName" placeholder="e.g. Bulk URL Shortener, Markdown to HTML, CSS Grid Builder" required>
            </div>
            <div class="mb-3">
              <label class="form-label text-light small fw-bold">How should it work?</label>
              <textarea class="form-control" id="reqToolDesc" rows="3" placeholder="Describe key inputs, outputs, or calculations needed..." required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label text-light small fw-bold">Your Email / WhatsApp (Optional)</label>
              <input type="text" class="form-control" id="reqContact" placeholder="To notify you once it goes live">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="topbar-btn topbar-btn-ghost" data-bs-dismiss="modal">Close</button>
          <button type="button" class="topbar-btn topbar-btn-primary" id="submitToolRequestBtn">
            <i class="fa-solid fa-paper-plane"></i> Send via WhatsApp
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Interactive Toast -->
  <div class="app-toast" id="appToast">
    <i class="fa-solid fa-circle-check text-success" id="toastIcon"></i>
    <span id="toastMsg">Link copied to clipboard!</span>
  </div>

  <!-- Core Scripts -->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <script src="<?= $site ?>assets/js/plugins/bootstrap.min.js"></script>

  <!-- =========================================
       CANVA-STYLE APP CONTROLLER JAVASCRIPT
       ========================================= -->
  <script>
    $(document).ready(function() {
      // Elements
      const searchInput = $('#appToolSearch');
      const toolCards = $('.tool-card');
      const sections = $('.tools-section');
      const emptyState = $('#appEmptyState');
      const toast = $('#appToast');
      const sidebar = $('#appSidebar');
      const sidebarToggleBtn = $('#sidebarToggleBtn');
      const filterPills = $('.cat-filter-btn, .sidebar-nav-link');
      const topbarFavCount = $('#topbarFavCount');
      let isStarredFilterActive = false;

      // 1. Toast Notification Helper
      function showToast(msg, iconClass = 'fa-solid fa-circle-check text-success') {
        $('#toastMsg').text(msg);
        $('#toastIcon').attr('class', iconClass);
        toast.addClass('show');
        setTimeout(() => toast.removeClass('show'), 2800);
      }

      // 2. Favorites / Starred System via LocalStorage
      function getStarredTools() {
        try {
          return JSON.parse(localStorage.getItem('nikhilworks_starred_tools')) || [];
        } catch(e) {
          return [];
        }
      }

      function updateStarredUI() {
        const starred = getStarredTools();
        topbarFavCount.text(starred.length);

        $('.star-tool-btn').each(function() {
          const btn = $(this);
          const toolId = btn.data('tool-id');
          if (starred.includes(toolId)) {
            btn.addClass('starred');
            btn.find('i').removeClass('fa-regular').addClass('fa-solid');
          } else {
            btn.removeClass('starred');
            btn.find('i').removeClass('fa-solid').addClass('fa-regular');
          }
        });
      }

      updateStarredUI();

      $(document).on('click', '.star-tool-btn', function(e) {
        e.preventDefault();
        e.stopPropagation();
        const toolId = $(this).data('tool-id');
        let starred = getStarredTools();

        if (starred.includes(toolId)) {
          starred = starred.filter(id => id !== toolId);
          showToast('Removed from Starred favorites', 'fa-solid fa-star-half-stroke text-warning');
        } else {
          starred.push(toolId);
          showToast('Added to Starred favorites! ⭐', 'fa-solid fa-star text-warning');
        }

        localStorage.setItem('nikhilworks_starred_tools', JSON.stringify(starred));
        updateStarredUI();

        if (isStarredFilterActive) {
          filterTools();
        }
      });

      // 3. Filter Starred Button Toggle
      $('#filterStarredBtn').on('click', function() {
        isStarredFilterActive = !isStarredFilterActive;
        $(this).toggleClass('topbar-btn-primary topbar-btn-ghost', isStarredFilterActive);
        
        if (isStarredFilterActive) {
          $('.cat-filter-btn, .sidebar-nav-link').removeClass('active');
          showToast('Showing Starred Tools only ⭐');
        } else {
          $('[data-category="all"]').addClass('active');
        }
        filterTools();
      });

      // 4. Copy Direct Tool Link
      $(document).on('click', '.copy-tool-link-btn', function() {
        const url = $(this).data('url');
        if (navigator.clipboard) {
          navigator.clipboard.writeText(url).then(() => {
            showToast('Direct Tool link copied to clipboard! 📋');
          });
        } else {
          const temp = $('<input>');
          $('body').append(temp);
          temp.val(url).select();
          document.execCommand('copy');
          temp.remove();
          showToast('Direct Tool link copied to clipboard! 📋');
        }
      });

      // 5. Universal Search & Category Filter Engine
      function filterTools() {
        const query = searchInput.val().toLowerCase().trim();
        const activeCategory = $('.cat-filter-btn.active, .sidebar-nav-link.active').first().data('category') || 'all';
        const starred = getStarredTools();
        let totalVisible = 0;

        sections.each(function() {
          const sec = $(this);
          const secCat = sec.data('section-category');
          let secVisibleCount = 0;

          sec.find('.tool-card').each(function() {
            const card = $(this);
            const cardCat = card.data('category') || '';
            const cardKeywords = (card.data('keywords') || '') + ' ' + card.find('.tool-title').text() + ' ' + card.find('.tool-desc').text();
            const toolId = card.data('tool-id');

            const matchesQuery = !query || cardKeywords.toLowerCase().includes(query);
            const matchesCategory = (activeCategory === 'all' || cardCat.includes(activeCategory) || secCat === activeCategory);
            const matchesStarred = !isStarredFilterActive || starred.includes(toolId);

            if (matchesQuery && matchesCategory && matchesStarred) {
              card.show();
              secVisibleCount++;
              totalVisible++;
            } else {
              card.hide();
            }
          });

          if (secVisibleCount === 0) {
            sec.hide();
          } else {
            sec.show();
          }
        });

        if (totalVisible === 0) {
          emptyState.removeClass('d-none');
        } else {
          emptyState.addClass('d-none');
        }
      }

      searchInput.on('input', function() {
        if (isStarredFilterActive) {
          isStarredFilterActive = false;
          $('#filterStarredBtn').removeClass('topbar-btn-primary').addClass('topbar-btn-ghost');
        }
        filterTools();
      });

      // Reset search button inside empty state
      $('#resetSearchBtn').on('click', function() {
        searchInput.val('');
        isStarredFilterActive = false;
        $('#filterStarredBtn').removeClass('topbar-btn-primary').addClass('topbar-btn-ghost');
        $('[data-category]').removeClass('active');
        $('[data-category="all"]').addClass('active');
        filterTools();
      });

      // 6. Category Filter Button Click
      $(document).on('click', '[data-category]', function(e) {
        const cat = $(this).data('category');
        isStarredFilterActive = false;
        $('#filterStarredBtn').removeClass('topbar-btn-primary').addClass('topbar-btn-ghost');

        $('[data-category]').removeClass('active');
        $(`[data-category="${cat}"]`).addClass('active');

        // If clicking a sidebar section link, smooth scroll on mobile/desktop
        const targetSection = $(`#${cat}Section`);
        if (targetSection.length && cat !== 'all') {
          $('html, body').animate({
            scrollTop: targetSection.offset().top - 90
          }, 350);
        }

        filterTools();

        // Close sidebar on mobile after clicking
        if ($(window).width() < 992) {
          sidebar.removeClass('show');
        }
      });

      // 7. Grid vs List View Switcher
      $('#viewGridBtn').on('click', function() {
        $('#viewGridBtn').addClass('active');
        $('#viewListBtn').removeClass('active');
        $('.tools-grid').removeClass('list-view');
      });

      $('#viewListBtn').on('click', function() {
        $('#viewListBtn').addClass('active');
        $('#viewGridBtn').removeClass('active');
        $('.tools-grid').addClass('list-view');
      });

      // 8. Mobile Sidebar Toggle
      sidebarToggleBtn.on('click', function() {
        sidebar.toggleClass('show');
      });

      $(document).on('click', function(e) {
        if ($(window).width() < 992) {
          if (!$(e.target).closest('#appSidebar, #sidebarToggleBtn').length) {
            sidebar.removeClass('show');
          }
        }
      });

      // 9. Keyboard Shortcut ('/' or 'Cmd+K' to focus search)
      $(document).on('keydown', function(e) {
        if ((e.key === '/' || (e.ctrlKey && e.key === 'k') || (e.metaKey && e.key === 'k')) && !$(e.target).is('input, textarea')) {
          e.preventDefault();
          searchInput.focus();
          searchInput.select();
        } else if (e.key === 'Escape') {
          if (searchInput.is(':focus')) {
            searchInput.blur();
          }
        }
      });

      // 10. Request Tool WhatsApp Dispatcher
      $('#submitToolRequestBtn').on('click', function() {
        const name = $('#reqToolName').val().trim();
        const desc = $('#reqToolDesc').val().trim();
        const contact = $('#reqContact').val().trim();

        if (!name || !desc) {
          alert('Please enter a tool concept and description.');
          return;
        }

        let msg = `Hi Nikhil, I have a feature/tool request for the NikhilWorks Tools Suite:%0A%0A*Tool Name:* ${encodeURIComponent(name)}%0A*Details:* ${encodeURIComponent(desc)}`;
        if (contact) {
          msg += `%0A*My Contact:* ${encodeURIComponent(contact)}`;
        }

        window.open(`https://wa.me/918368552640?text=${msg}`, '_blank');
        $('#requestToolModal').modal('hide');
        $('#toolRequestForm')[0].reset();
      });

    });
  </script>

</body>
</html>
