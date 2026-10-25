<?php
include_once "config/connect.php";
include_once "util/function.php";

$caseStudies = include __DIR__ . "/data/case-studies-data.php";
$slug = trim($_GET['slug'] ?? '');

// If slug provided but invalid, show 404
if (!empty($slug) && !isset($caseStudies[$slug])) {
    include_once "404.php";
    exit;
}

$isDetail = !empty($slug);
$cs = $isDetail ? $caseStudies[$slug] : null;

$yearsExperience = years_in_business(2022, 8);
$canonical_url = $isDetail 
    ? rtrim($site, '/') . '/case-studies/' . $slug . '/'
    : rtrim($site, '/') . '/case-studies/';

$pageTitle = $isDetail 
    ? $cs['title']
    : 'Engineering Case Studies & Production Architectures | NikhilWorks';

$pageDesc = $isDetail 
    ? $cs['meta_description']
    : 'Deep technical case studies on national ABHA healthcare systems, NZ cloud accounting platforms, real-time Fintech WebSocket engines, and scalable multi-vendor e-commerce by Nikhil Gupta.';

$ogImage = ($isDetail && !empty($cs['image']))
    ? rtrim($site, '/') . '/' . ltrim($cs['image'], '/')
    : rtrim($site, '/') . '/assets/img/preview.png';
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

  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="robots" content="index, follow">
  <meta name="author" content="Nikhil Gupta - NikhilWorks Product Engineering Studio">

  <!-- Canonical & hreflang -->
  <link rel="canonical" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-US" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-GB" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AE" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-AU" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="en-NZ" href="<?= $canonical_url ?>">
  <link rel="alternate" hreflang="x-default" href="<?= $canonical_url ?>">

  <!-- Open Graph -->
  <meta property="og:type" content="article">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:url" content="<?= $canonical_url ?>">
  <meta property="og:image" content="<?= $ogImage ?>">
  <meta property="og:site_name" content="NikhilWorks">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="twitter:image" content="<?= $ogImage ?>">

  <!-- Schema.org JSON-LD -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= rtrim($site, '/') ?>/"},
      {"@type": "ListItem", "position": 2, "name": "Case Studies", "item": "<?= rtrim($site, '/') ?>/case-studies/"}<?php if ($isDetail): ?>,
      {"@type": "ListItem", "position": 3, "name": "<?= htmlspecialchars($cs['client']) ?>", "item": "<?= $canonical_url ?>"}
      <?php endif; ?>
    ]
  }
  </script>

  <?php if ($isDetail): ?>
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "CreativeWork",
    "name": "<?= htmlspecialchars($cs['title']) ?>",
    "headline": "<?= htmlspecialchars($cs['hero_heading']) ?>",
    "description": "<?= htmlspecialchars($cs['meta_description']) ?>",
    "image": "<?= $ogImage ?>",
    "author": {
      "@type": "Person",
      "name": "Nikhil Gupta",
      "jobTitle": "Lead Software Architect",
      "url": "https://nikhilworks.com/about/"
    },
    "provider": {
      "@type": "ProfessionalService",
      "name": "NikhilWorks Product Engineering Studio",
      "url": "https://nikhilworks.com"
    },
    "about": "<?= htmlspecialchars($cs['category']) ?>"
  }
  </script>
  <?php endif; ?>

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
      --nw-teal: #0F766E;
      --nw-teal-light: #E6F4F2;
      --nw-accent: #ADFF1C;
      --nw-bg: #F8FAFC;
      --nw-card: #FFFFFF;
      --nw-border: #E2E8F0;
      --nw-text-dark: #0F172A;
      --nw-text-muted: #475569;
      --nw-text-subtle: #64748B;
    }

    body.cs-body {
      background-color: var(--nw-bg);
      color: var(--nw-text-muted);
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* ---- LIGHT HERO SECTION ---- */
    .cs-hero {
      position: relative;
      background: linear-gradient(180deg, #EDF7F6 0%, #F8FAFC 100%);
      padding: 145px 0 65px;
      overflow: hidden;
      border-bottom: 1px solid var(--nw-border);
    }

    .loc-grid-overlay {
      position: absolute;
      inset: 0;
      background-image: 
        linear-gradient(to right, rgba(16, 64, 65, 0.04) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(16, 64, 65, 0.04) 1px, transparent 1px);
      background-size: 32px 32px;
      pointer-events: none;
      z-index: 1;
    }

    .cs-breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13.5px;
      color: var(--nw-text-subtle);
      margin-bottom: 18px;
    }
    .cs-breadcrumb a {
      color: var(--nw-teal);
      text-decoration: none;
      font-weight: 600;
    }
    .cs-breadcrumb a:hover {
      color: var(--nw-primary);
      text-decoration: underline;
    }

    .cs-hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      background: var(--nw-teal-light);
      border: 1px solid #A5D8D3;
      color: var(--nw-teal);
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 12.5px;
      font-weight: 700;
      margin-bottom: 18px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    .cs-hero-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: var(--nw-teal);
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(15, 118, 110, 0.5);
    }

    .cs-hero h1 {
      font-size: clamp(2rem, 3.8vw, 3.1rem);
      font-weight: 800;
      line-height: 1.22;
      color: var(--nw-text-dark);
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }
    .cs-hero p.lead-text {
      font-size: clamp(1.02rem, 1.6vw, 1.15rem);
      color: var(--nw-text-muted);
      max-width: 860px;
      line-height: 1.7;
      margin-bottom: 30px;
    }

    /* ---- METRIC CARDS ---- */
    .metric-card {
      background: #ffffff;
      border: 1px solid var(--nw-border);
      border-radius: 16px;
      padding: 22px 18px;
      text-align: center;
      transition: all 0.25s ease;
      box-shadow: 0 4px 18px rgba(16, 64, 65, 0.05);
      height: 100%;
    }
    .metric-card:hover {
      border-color: var(--nw-teal);
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(15, 118, 110, 0.12);
    }
    .metric-val {
      font-size: clamp(1.9rem, 3vw, 2.4rem);
      font-weight: 800;
      color: var(--nw-teal);
      line-height: 1.1;
      margin-bottom: 6px;
    }
    .metric-label {
      font-size: 0.95rem;
      font-weight: 700;
      color: var(--nw-text-dark);
      margin-bottom: 4px;
    }
    .metric-desc {
      font-size: 0.82rem;
      color: var(--nw-text-subtle);
      line-height: 1.4;
    }

    /* ---- BROWSER MOCKUP SHOWCASE ---- */
    .cs-browser-frame {
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
      margin-bottom: 32px;
    }
    .cs-browser-bar {
      background: #F1F5F9;
      border-bottom: 1px solid var(--nw-border);
      padding: 12px 18px;
      display: flex;
      align-items: center;
      gap: 14px;
    }
    .cs-browser-dots {
      display: flex;
      gap: 6px;
    }
    .cs-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
    }
    .cs-dot-red { background: #EF4444; }
    .cs-dot-yellow { background: #F59E0B; }
    .cs-dot-green { background: #10B981; }
    .cs-browser-url {
      flex: 1;
      background: #FFFFFF;
      border: 1px solid #CBD5E1;
      border-radius: 20px;
      padding: 5px 14px;
      font-size: 12.5px;
      color: #475569;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
    .cs-browser-img-wrap {
      background: #0f172a;
      text-align: center;
    }
    .cs-browser-img-wrap img {
      width: 100%;
      height: auto;
      display: block;
      max-height: 520px;
      object-fit: cover;
    }

    /* ---- CONTENT CARDS ---- */
    .cs-content-card {
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 18px;
      padding: 34px 30px;
      margin-bottom: 28px;
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
    }
    .cs-card-header {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 20px;
      border-bottom: 1px solid #F1F5F9;
      padding-bottom: 14px;
    }
    .cs-card-icon-wrap {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: var(--nw-teal-light);
      color: var(--nw-teal);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 19px;
    }
    .cs-card-title {
      font-size: 1.35rem;
      font-weight: 800;
      color: var(--nw-text-dark);
      margin: 0;
    }

    /* ---- ARCHITECTURE BLUEPRINT ---- */
    .arch-step-box {
      background: #F8FAFC;
      border: 1px solid var(--nw-border);
      border-radius: 14px;
      padding: 22px 20px;
      height: 100%;
      transition: all 0.25s ease;
    }
    .arch-step-box:hover {
      border-color: var(--nw-teal);
      background: #FFFFFF;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(15, 118, 110, 0.1);
    }
    .arch-step-num {
      display: inline-block;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background: var(--nw-primary);
      color: var(--nw-accent);
      font-weight: 800;
      font-size: 13px;
      line-height: 30px;
      text-align: center;
      margin-bottom: 12px;
    }
    .arch-step-title {
      font-size: 1.05rem;
      font-weight: 700;
      color: var(--nw-text-dark);
      margin-bottom: 8px;
    }
    .arch-step-desc {
      font-size: 0.92rem;
      color: var(--nw-text-muted);
      line-height: 1.55;
    }

    /* ---- RISK ELIMINATED ITEMS ---- */
    .risk-card-item {
      background: #F0FDF4;
      border: 1px solid #BBF7D0;
      border-radius: 12px;
      padding: 14px 18px;
      margin-bottom: 12px;
      display: flex;
      align-items: flex-start;
      gap: 12px;
    }
    .risk-card-item span {
      font-size: 0.96rem;
      color: #166534;
      font-weight: 600;
      line-height: 1.5;
    }

    /* ---- TECH PILLS ---- */
    .tech-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #FFFFFF;
      border: 1px solid #CBD5E1;
      color: var(--nw-text-dark);
      font-size: 0.88rem;
      font-weight: 600;
      padding: 8px 16px;
      border-radius: 30px;
      margin: 4px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
      transition: all 0.2s ease;
    }
    .tech-pill:hover {
      background: var(--nw-primary);
      color: var(--nw-accent);
      border-color: var(--nw-primary);
      transform: translateY(-2px);
    }

    /* ---- STICKY DISCOVERY SIDEBAR ---- */
    .cs-sidebar-sticky {
      position: sticky;
      top: 100px;
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 20px;
      padding: 32px 28px;
      box-shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
    }
    .btn-whatsapp-consult {
      background: #25D366;
      color: #FFFFFF !important;
      font-weight: 700;
      font-size: 15px;
      padding: 14px 24px;
      border-radius: 12px;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      transition: all 0.25s ease;
      width: 100%;
      box-shadow: 0 6px 18px rgba(37, 211, 102, 0.25);
    }
    .btn-whatsapp-consult:hover {
      background: #1EBE5D;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(37, 211, 102, 0.35);
    }
    .btn-primary-consult {
      background: var(--nw-primary);
      color: #FFFFFF !important;
      font-weight: 700;
      font-size: 14px;
      padding: 12px 22px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      text-decoration: none;
      width: 100%;
      transition: all 0.25s ease;
    }
    .btn-primary-consult:hover {
      background: var(--nw-teal);
      transform: translateY(-2px);
    }

    /* ---- LISTING CARDS ---- */
    .cs-list-card {
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 20px;
      overflow: hidden;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.3s ease;
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
    }
    .cs-list-card:hover {
      border-color: var(--nw-teal);
      transform: translateY(-5px);
      box-shadow: 0 14px 35px rgba(15, 118, 110, 0.12);
    }
    .cs-list-thumb {
      height: 210px;
      overflow: hidden;
      background: #F1F5F9;
      position: relative;
    }
    .cs-list-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .cs-list-card:hover .cs-list-thumb img {
      transform: scale(1.05);
    }
    .cs-list-content {
      padding: 26px 24px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .cs-list-btn {
      background: var(--nw-primary);
      color: #FFFFFF !important;
      font-weight: 700;
      font-size: 14px;
      padding: 11px 22px;
      border-radius: 50px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      text-decoration: none;
      transition: all 0.25s ease;
      width: 100%;
    }
    .cs-list-btn:hover {
      background: var(--nw-teal);
      transform: translateY(-2px);
    }
  </style>
</head>
<body class="homepage4-body cs-body">

  <?php include "includes/header.php"; ?>

  <?php if ($isDetail): ?>
  <!-- ══════════════ CASE STUDY DETAIL VIEW ══════════════ -->
  <section class="cs-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
      
      <!-- Breadcrumb -->
      <div class="cs-breadcrumb">
        <a href="<?= $site ?>"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span>/</span>
        <a href="<?= $site ?>case-studies/">Case Studies</a>
        <span>/</span>
        <span class="text-dark fw-bold"><?= htmlspecialchars($cs['client']) ?></span>
      </div>

      <div class="cs-hero-pill">
        <span class="pulse-dot"></span>
        <span><?= htmlspecialchars($cs['badge']) ?></span>
      </div>

      <h1><?= htmlspecialchars($cs['hero_heading']) ?></h1>
      <p class="lead-text"><?= htmlspecialchars($cs['hero_sub']) ?></p>

      <!-- Key System Metrics Ribbon -->
      <div class="row g-3 pt-2">
        <?php foreach ($cs['metrics'] as $m): ?>
        <div class="col-6 col-md-3">
          <div class="metric-card">
            <div class="metric-val"><?= htmlspecialchars($m['val']) ?></div>
            <div class="metric-label"><?= htmlspecialchars($m['label']) ?></div>
            <div class="metric-desc"><?= htmlspecialchars($m['desc']) ?></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <main class="py-5" style="background: var(--nw-bg);">
    <div class="container">
      <div class="row g-5">
        <!-- Main Case Study Content -->
        <div class="col-lg-8">

          <!-- Live Mockup / Project Screenshot Frame -->
          <?php if (!empty($cs['image'])): ?>
          <div class="cs-browser-frame">
            <div class="cs-browser-bar">
              <div class="cs-browser-dots">
                <span class="cs-dot cs-dot-red"></span>
                <span class="cs-dot cs-dot-yellow"></span>
                <span class="cs-dot cs-dot-green"></span>
              </div>
              <div class="cs-browser-url">
                <span><i class="fa-solid fa-lock text-success me-1"></i> <?= htmlspecialchars($cs['live_url'] ?: 'https://nikhilworks.com/case-studies/' . $slug . '/') ?></span>
                <?php if (!empty($cs['live_url'])): ?>
                <a href="<?= htmlspecialchars($cs['live_url']) ?>" target="_blank" rel="noopener noreferrer" class="badge bg-primary text-white text-decoration-none px-2 py-1">
                  Visit Live Site <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
                </a>
                <?php endif; ?>
              </div>
            </div>
            <div class="cs-browser-img-wrap">
              <img src="<?= $site . ltrim($cs['image'], '/') ?>" alt="<?= htmlspecialchars($cs['title']) ?>" class="img-fluid" loading="lazy">
            </div>
          </div>
          <?php endif; ?>

          <!-- 1. The Challenge -->
          <div class="cs-content-card">
            <div class="cs-card-header">
              <div class="cs-card-icon-wrap">
                <i class="fa-solid fa-triangle-exclamation text-warning"></i>
              </div>
              <h2 class="cs-card-title">The Engineering Challenge</h2>
            </div>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--nw-text-muted);"><?= nl2br(htmlspecialchars($cs['challenge'])) ?></p>
          </div>

          <!-- 2. The Architectural Solution -->
          <div class="cs-content-card">
            <div class="cs-card-header">
              <div class="cs-card-icon-wrap">
                <i class="fa-solid fa-diagram-project"></i>
              </div>
              <h2 class="cs-card-title">System Architecture Blueprint</h2>
            </div>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--nw-text-muted); margin-bottom: 25px;"><?= nl2br(htmlspecialchars($cs['solution'])) ?></p>
            
            <div class="row g-3">
              <?php $stepIdx = 1; foreach ($cs['architecture'] as $arch): ?>
              <div class="col-md-6">
                <div class="arch-step-box">
                  <span class="arch-step-num"><?= $stepIdx++ ?></span>
                  <h3 class="arch-step-title"><?= htmlspecialchars($arch['title']) ?></h3>
                  <p class="arch-step-desc mb-0"><?= htmlspecialchars($arch['desc']) ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- 3. Production Risks Eliminated -->
          <div class="cs-content-card">
            <div class="cs-card-header">
              <div class="cs-card-icon-wrap">
                <i class="fa-solid fa-shield-halved text-success"></i>
              </div>
              <h2 class="cs-card-title">Critical Production Risks Eliminated</h2>
            </div>
            <div>
              <?php foreach ($cs['risks_eliminated'] as $risk): ?>
              <div class="risk-card-item">
                <i class="fa-solid fa-circle-check text-success mt-1"></i>
                <span><?= htmlspecialchars($risk) ?></span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- 4. Production Tech Stack -->
          <div class="cs-content-card">
            <div class="cs-card-header">
              <div class="cs-card-icon-wrap">
                <i class="fa-solid fa-layer-group"></i>
              </div>
              <h2 class="cs-card-title">Verified Production Stack</h2>
            </div>
            <div>
              <?php foreach ($cs['tech_stack'] as $tech): ?>
              <span class="tech-pill"><i class="fa-solid fa-microchip text-teal" style="color: var(--nw-teal);"></i> <?= htmlspecialchars($tech) ?></span>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <!-- Sticky Booking Sidebar -->
        <div class="col-lg-4">
          <div class="cs-sidebar-sticky">
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-1 mb-3 rounded-pill" style="font-size: 12px;">
              🟢 Accepting Selected H2 Projects
            </span>
            <h3 class="h4 fw-bold mb-2" style="color: var(--nw-text-dark);">Build Your Next Engine with Nikhil Gupta</h3>
            <p class="small text-muted mb-4">Direct architect-to-founder consultation. Available across US (EST/PST), UK (GMT), UAE (GST), New Zealand (NZST) and Indian time zones.</p>

            <div class="mb-4 p-3 rounded-3" style="background: #F8FAFC; border: 1px dashed var(--nw-border);">
              <div class="small text-muted mb-1"><i class="fa-solid fa-user-tie text-teal me-1" style="color: var(--nw-teal);"></i> Lead Architect:</div>
              <div class="fw-bold text-dark">Nikhil Gupta</div>
              <div class="small text-muted mt-2"><i class="fa-solid fa-clock text-warning me-1"></i> Typical Overlap Window:</div>
              <div class="fw-semibold text-dark small">8:00 AM – 1:00 PM EST / 1:00 PM – 6:00 PM GMT</div>
            </div>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20reviewed%20your%20<?= urlencode($cs['client']) ?>%20case%20study%20and%20would%20like%20to%20discuss%20an%20engineering%20project." target="_blank" class="btn-whatsapp-consult mb-3">
              <i class="fa-brands fa-whatsapp fa-lg"></i> Schedule Discovery Call
            </a>

            <a href="<?= $site ?>contact/" class="btn-primary-consult">
              <i class="fa-solid fa-envelope me-1"></i> Submit Technical Scope
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php else: ?>
  <!-- ══════════════ CASE STUDIES LISTING VIEW ══════════════ -->
  <section class="cs-hero text-center">
    <div class="loc-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
      
      <!-- Breadcrumb -->
      <div class="cs-breadcrumb justify-content-center">
        <a href="<?= $site ?>"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span>/</span>
        <span class="text-dark fw-bold">Case Studies</span>
      </div>

      <div class="cs-hero-pill">
        <span class="pulse-dot"></span>
        <span>Production Engineering Showcase</span>
      </div>
      <h1>Production Case Studies & Systems</h1>
      <p class="lead-text mx-auto">
        Explore detailed architectural teardowns, compliance frameworks, and real-time platforms engineered for national health systems, Kiwi cloud accounting, high-frequency fintech engines, and enterprise e-commerce.
      </p>
    </div>
  </section>

  <main class="py-5" style="background: var(--nw-bg);">
    <div class="container">
      <div class="row g-4">
        <?php foreach ($caseStudies as $slugKey => $item): ?>
        <div class="col-lg-6 col-md-6">
          <div class="cs-list-card">
            <?php if (!empty($item['image'])): ?>
            <div class="cs-list-thumb">
              <img src="<?= $site . ltrim($item['image'], '/') ?>" alt="<?= htmlspecialchars($item['client']) ?>" loading="lazy">
            </div>
            <?php endif; ?>

            <div class="cs-list-content">
              <div>
                <div class="cs-hero-pill mb-2" style="font-size: 11px; padding: 4px 12px;">
                  <span class="pulse-dot"></span>
                  <span><?= htmlspecialchars($item['badge']) ?></span>
                </div>
                <h2 class="h5 fw-bold text-dark mb-1"><?= htmlspecialchars($item['client']) ?></h2>
                <p class="small text-muted mb-3"><?= htmlspecialchars($item['category']) ?></p>
                
                <div class="mb-3 p-3 rounded-3" style="background: #F8FAFC; border: 1px solid var(--nw-border);">
                  <div class="d-flex justify-content-between align-items-center py-1 border-bottom border-light">
                    <span class="small text-muted"><?= htmlspecialchars($item['metrics'][0]['label']) ?></span>
                    <span class="fw-bold" style="color: var(--nw-teal);"><?= htmlspecialchars($item['metrics'][0]['val']) ?></span>
                  </div>
                  <div class="d-flex justify-content-between align-items-center py-1 pt-2">
                    <span class="small text-muted"><?= htmlspecialchars($item['metrics'][1]['label']) ?></span>
                    <span class="fw-bold text-dark"><?= htmlspecialchars($item['metrics'][1]['val']) ?></span>
                  </div>
                </div>

                <p class="small text-muted mb-4" style="line-height: 1.6;"><?= htmlspecialchars(mb_substr($item['challenge'], 0, 150)) ?>...</p>
              </div>

              <a href="<?= $site ?>case-studies/<?= $slugKey ?>/" class="cs-list-btn">
                View Architecture Teardown <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </main>
  <?php endif; ?>

  <?php include "includes/footer.php"; ?>

</body>
</html>