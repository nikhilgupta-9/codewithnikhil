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
    : 'Deep technical case studies on real-time Fintech WebSocket engines, Flutter mobile applications, and scalable multi-vendor e-commerce architectures by Nikhil Gupta.';

$ogImage = rtrim($site, '/') . '/assets/img/preview.png';
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

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">

  <style>
    :root {
      --cs-bg-dark: #041213;
      --cs-teal: #104041;
      --cs-teal-light: #165355;
      --cs-lime: #ADFF1C;
      --cs-card-bg: rgba(255, 255, 255, 0.04);
      --cs-card-border: rgba(255, 255, 255, 0.1);
      --cs-card-border-hover: rgba(173, 255, 28, 0.4);
    }

    body.cs-body {
      background-color: var(--cs-bg-dark);
      color: #e2e8f0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .cs-hero {
      position: relative;
      padding: 130px 0 60px;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.12) 0%, transparent 40%),
                  radial-gradient(circle at 20% 80%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #041213 0%, #082829 60%, #041213 100%);
      border-bottom: 1px solid rgba(173, 255, 28, 0.2);
    }

    .cs-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: var(--cs-lime);
      padding: 6px 16px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      margin-bottom: 18px;
    }

    .cs-hero-title {
      font-size: 2.8rem;
      font-weight: 800;
      color: #ffffff;
      line-height: 1.25;
      margin-bottom: 20px;
    }

    .cs-hero-sub {
      font-size: 1.15rem;
      color: #94a3b8;
      max-width: 800px;
      line-height: 1.6;
      margin-bottom: 30px;
    }

    /* Metric Cards */
    .metric-card {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--cs-card-border);
      border-radius: 16px;
      padding: 24px 20px;
      text-align: center;
      transition: all 0.3s ease;
      backdrop-filter: blur(10px);
    }
    .metric-card:hover {
      border-color: var(--cs-lime);
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
    }
    .metric-val {
      font-size: 2.4rem;
      font-weight: 800;
      color: var(--cs-lime);
      line-height: 1.1;
      margin-bottom: 6px;
    }
    .metric-label {
      font-size: 0.95rem;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4px;
    }
    .metric-desc {
      font-size: 0.8rem;
      color: #94a3b8;
    }

    /* Content Cards */
    .cs-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--cs-card-border);
      border-radius: 18px;
      padding: 36px 30px;
      margin-bottom: 30px;
      backdrop-filter: blur(8px);
    }

    .cs-card-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      padding-bottom: 16px;
    }

    .cs-card-title {
      font-size: 1.45rem;
      font-weight: 700;
      color: #ffffff;
      margin: 0;
    }

    /* Architecture Grid */
    .arch-step-box {
      background: rgba(16, 64, 65, 0.25);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 14px;
      padding: 20px;
      height: 100%;
      transition: border-color 0.2s ease;
    }
    .arch-step-box:hover {
      border-color: var(--cs-lime);
    }
    .arch-step-num {
      display: inline-block;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background: var(--cs-lime);
      color: #041213;
      font-weight: 800;
      font-size: 13px;
      line-height: 28px;
      text-align: center;
      margin-bottom: 12px;
    }
    .arch-step-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 8px;
    }
    .arch-step-desc {
      font-size: 0.9rem;
      color: #94a3b8;
      line-height: 1.5;
    }

    /* Tech Stack Pills */
    .tech-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.12);
      color: #f1f5f9;
      font-size: 0.85rem;
      font-weight: 600;
      padding: 6px 14px;
      border-radius: 30px;
      margin: 4px;
    }

    /* Booking Sticky Sidebar */
    .cs-sidebar-sticky {
      position: sticky;
      top: 100px;
      background: linear-gradient(135deg, rgba(16, 64, 65, 0.5) 0%, rgba(4, 18, 19, 0.8) 100%);
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
    }

    .btn-lime {
      background: var(--cs-lime);
      color: #041213;
      font-weight: 800;
      padding: 14px 28px;
      border-radius: 40px;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      transition: all 0.25s ease;
      font-size: 1rem;
      width: 100%;
    }
    .btn-lime:hover {
      background: #c3ff47;
      color: #041213;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(173, 255, 28, 0.4);
    }

    /* Listing Page Cards */
    .cs-list-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--cs-card-border);
      border-radius: 20px;
      padding: 35px 30px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.3s ease;
    }
    .cs-list-card:hover {
      border-color: var(--cs-lime);
      transform: translateY(-5px);
      box-shadow: 0 16px 40px rgba(0, 0, 0, 0.4);
    }
  </style>
</head>
<body class="homepage4-body cs-body">

  <?php include "includes/header.php"; ?>

  <?php if ($isDetail): ?>
  <!-- ══════════════ CASE STUDY DETAIL VIEW ══════════════ -->
  <section class="cs-hero">
    <div class="container">
      <div class="cs-badge">
        <i class="fa-solid fa-code-branch"></i> <?= htmlspecialchars($cs['badge']) ?>
      </div>
      <h1 class="cs-hero-title"><?= htmlspecialchars($cs['hero_heading']) ?></h1>
      <p class="cs-hero-sub"><?= htmlspecialchars($cs['hero_sub']) ?></p>

      <!-- Key System Metrics Ribbon -->
      <div class="row g-3">
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

  <main class="py-5">
    <div class="container">
      <div class="row g-5">
        <!-- Main Case Study Content -->
        <div class="col-lg-8">

          <!-- 1. The Challenge -->
          <div class="cs-card">
            <div class="cs-card-header">
              <i class="fa-solid fa-triangle-exclamation text-warning fa-lg"></i>
              <h2 class="cs-card-title">The Engineering Challenge</h2>
            </div>
            <p style="font-size: 1.05rem; line-height: 1.7; color: #cbd5e1;"><?= nl2br(htmlspecialchars($cs['challenge'])) ?></p>
          </div>

          <!-- 2. The Architectural Solution -->
          <div class="cs-card">
            <div class="cs-card-header">
              <i class="fa-solid fa-diagram-project text-info fa-lg"></i>
              <h2 class="cs-card-title">System Architecture Blueprint</h2>
            </div>
            <p style="font-size: 1.05rem; line-height: 1.7; color: #cbd5e1; margin-bottom: 25px;"><?= nl2br(htmlspecialchars($cs['solution'])) ?></p>
            
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
          <div class="cs-card">
            <div class="cs-card-header">
              <i class="fa-solid fa-shield-halved text-success fa-lg"></i>
              <h2 class="cs-card-title">Critical Production Risks Eliminated</h2>
            </div>
            <ul class="list-unstyled mb-0">
              <?php foreach ($cs['risks_eliminated'] as $risk): ?>
              <li class="d-flex align-items-start gap-3 mb-3" style="font-size: 1rem; color: #cbd5e1;">
                <i class="fa-solid fa-check-circle mt-1" style="color: var(--cs-lime);"></i>
                <span><?= htmlspecialchars($risk) ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- 4. Production Tech Stack -->
          <div class="cs-card">
            <div class="cs-card-header">
              <i class="fa-solid fa-layer-group text-primary fa-lg"></i>
              <h2 class="cs-card-title">Verified Production Stack</h2>
            </div>
            <div>
              <?php foreach ($cs['tech_stack'] as $tech): ?>
              <span class="tech-pill"><i class="fa-solid fa-microchip" style="color: var(--cs-lime);"></i> <?= htmlspecialchars($tech) ?></span>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <!-- Sticky Booking & Founder Discovery Sidebar -->
        <div class="col-lg-4">
          <div class="cs-sidebar-sticky">
            <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 px-3 py-1 mb-3 rounded-pill" style="font-size: 12px;">
              🟢 Accepting Selected H2 Projects
            </span>
            <h3 class="h4 fw-bold text-white mb-2">Build Your Next Engine with Nikhil Gupta</h3>
            <p class="small text-white-50 mb-4">Direct architect-to-founder consultation. Available across US (EST/PST), UK (GMT), UAE (GST) and Indian time zones.</p>

            <div class="mb-4 p-3 rounded-3" style="background: rgba(0, 0, 0, 0.3); border: 1px dashed rgba(255,255,255,0.15);">
              <div class="small text-white-50 mb-1"><i class="fa-solid fa-user-tie text-info me-1"></i> Lead Architect:</div>
              <div class="fw-bold text-white">Nikhil Gupta</div>
              <div class="small text-white-50 mt-2"><i class="fa-solid fa-clock text-warning me-1"></i> Typical Overlap Window:</div>
              <div class="fw-semibold text-white small">8:00 AM – 1:00 PM EST / 1:00 PM – 6:00 PM GMT</div>
            </div>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20reviewed%20your%20<?= urlencode($cs['client']) ?>%20case%20study%20and%20would%20like%20to%20discuss%20an%20engineering%20project." target="_blank" class="btn-lime mb-3">
              <i class="fa-brands fa-whatsapp fa-lg"></i> Schedule Discovery Call
            </a>

            <a href="<?= $site ?>contact/" class="btn btn-outline-light w-100 rounded-pill py-2 text-white-50">
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
    <div class="container">
      <div class="cs-badge">
        <i class="fa-solid fa-award"></i> Production Engineering Portfolio
      </div>
      <h1 class="cs-hero-title">Deep Technical Case Studies</h1>
      <p class="cs-hero-sub mx-auto">
        Explore detailed architectural teardowns, latency metrics, and production frameworks built for fintech trading engines, enterprise mobile platforms, and high-volume e-commerce.
      </p>
    </div>
  </section>

  <main class="py-5">
    <div class="container">
      <div class="row g-4">
        <?php foreach ($caseStudies as $slugKey => $item): ?>
        <div class="col-lg-4 col-md-6">
          <div class="cs-list-card">
            <div>
              <div class="cs-badge mb-2" style="font-size: 11px;"><?= htmlspecialchars($item['badge']) ?></div>
              <h2 class="h5 fw-bold text-white mb-2"><?= htmlspecialchars($item['client']) ?></h2>
              <p class="small text-white-50 mb-3"><?= htmlspecialchars($item['category']) ?></p>
              
              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-secondary border-opacity-25">
                  <span class="small text-white-50">Key Metric</span>
                  <span class="fw-bold" style="color: var(--cs-lime);"><?= htmlspecialchars($item['metrics'][0]['val']) ?></span>
                </div>
                <div class="d-flex justify-content-between align-items-center py-2 border-bottom border-secondary border-opacity-25">
                  <span class="small text-white-50">Throughput</span>
                  <span class="fw-bold text-white"><?= htmlspecialchars($item['metrics'][1]['val']) ?></span>
                </div>
              </div>

              <p class="small text-white-50 mb-4"><?= htmlspecialchars(mb_substr($item['challenge'], 0, 140)) ?>...</p>
            </div>

            <a href="<?= $site ?>case-studies/<?= $slugKey ?>/" class="btn btn-outline-light w-100 rounded-pill py-2" style="border-color: rgba(173,255,28,0.4); color: var(--cs-lime);">
              View Architecture &rarr;
            </a>
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
