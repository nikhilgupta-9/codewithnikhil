<?php
include_once "config/connect.php";
include_once "util/function.php";

$solutions = include __DIR__ . "/data/solutions-data.php";
$slug = trim($_GET['slug'] ?? '');

if (!empty($slug) && !isset($solutions[$slug])) {
    include_once "404.php";
    exit;
}

$isDetail = !empty($slug);
$sol = $isDetail ? $solutions[$slug] : null;

$canonical_url = $isDetail 
    ? rtrim($site, '/') . '/solutions/' . $slug . '/'
    : rtrim($site, '/') . '/solutions/';

$pageTitle = $isDetail 
    ? $sol['title']
    : 'Global Product Engineering & Software Solutions | NikhilWorks';

$pageDesc = $isDetail 
    ? $sol['meta_description']
    : 'Location-agnostic software engineering solutions: Fintech WebSocket systems, Flutter mobile applications, custom SaaS architectures, and high-volume e-commerce platforms.';

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
  <meta property="og:type" content="website">
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

  <!-- Breadcrumb Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= rtrim($site, '/') ?>/"},
      {"@type": "ListItem", "position": 2, "name": "Solutions", "item": "<?= rtrim($site, '/') ?>/solutions/"}<?php if ($isDetail): ?>,
      {"@type": "ListItem", "position": 3, "name": "<?= htmlspecialchars($sol['badge']) ?>", "item": "<?= $canonical_url ?>"}
      <?php endif; ?>
    ]
  }
  </script>

  <?php if ($isDetail): ?>
  <!-- Service Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "serviceType": "<?= htmlspecialchars($sol['badge']) ?>",
    "name": "<?= htmlspecialchars($sol['hero_heading']) ?>",
    "description": "<?= htmlspecialchars($sol['meta_description']) ?>",
    "provider": {
      "@type": "ProfessionalService",
      "name": "NikhilWorks Product Engineering Studio",
      "url": "https://nikhilworks.com"
    },
    "areaServed": [
      {"@type": "Country", "name": "United States"},
      {"@type": "Country", "name": "United Kingdom"},
      {"@type": "Country", "name": "United Arab Emirates"},
      {"@type": "Country", "name": "Canada"},
      {"@type": "Country", "name": "Australia"},
      {"@type": "Country", "name": "India"}
    ]
  }
  </script>
  <?php endif; ?>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Plugins - Verified Paths -->
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
      --nw-dark: #041213;
      --nw-dark-card: #082223;
      --nw-border: rgba(173, 255, 28, 0.2);
    }

    body.sol-body {
      background-color: var(--nw-dark);
      color: #e2e8f0;
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .sol-hero {
      position: relative;
      background: radial-gradient(circle at 85% 15%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 10% 85%, rgba(16, 64, 65, 0.9) 0%, transparent 55%),
                  linear-gradient(135deg, #041213 0%, #0a292a 50%, #030d0e 100%);
      padding: 155px 0 75px;
      overflow: hidden;
      color: #fff;
      border-bottom: 1px solid var(--nw-border);
    }

    .loc-grid-overlay {
      position: absolute;
      inset: 0;
      background-image: 
        linear-gradient(to right, rgba(173, 255, 28, 0.04) 1px, transparent 1px),
        linear-gradient(to bottom, rgba(173, 255, 28, 0.04) 1px, transparent 1px);
      background-size: 38px 38px;
      pointer-events: none;
      z-index: 1;
    }

    .sol-breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      color: rgba(255, 255, 255, 0.65);
      margin-bottom: 20px;
    }
    .sol-breadcrumb a {
      color: rgba(255, 255, 255, 0.85);
      text-decoration: none;
    }
    .sol-breadcrumb a:hover {
      color: var(--nw-accent);
    }

    .sol-hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.4);
      color: var(--nw-accent);
      padding: 7px 20px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 20px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    .sol-hero-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: var(--nw-accent);
      border-radius: 50%;
      box-shadow: 0 0 10px var(--nw-accent);
      animation: pulseSol 2s infinite;
    }
    @keyframes pulseSol {
      0%, 100% { opacity: 1; transform: scale(1); }
      50% { opacity: 0.35; transform: scale(0.8); }
    }

    .sol-hero h1 {
      font-size: clamp(2.1rem, 4.2vw, 3.2rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 18px;
      letter-spacing: -0.5px;
    }
    .sol-hero p.lead-text {
      font-size: clamp(1.05rem, 1.8vw, 1.2rem);
      color: #d6ecea;
      max-width: 850px;
      line-height: 1.7;
      margin-bottom: 30px;
    }

    .sol-card {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 18px;
      padding: 34px 30px;
      margin-bottom: 30px;
      backdrop-filter: blur(8px);
    }

    .feature-box {
      background: rgba(16, 64, 65, 0.28);
      border: 1px solid rgba(173, 255, 28, 0.2);
      border-radius: 14px;
      padding: 22px;
      height: 100%;
      transition: all 0.25s ease;
    }
    .feature-box:hover {
      border-color: var(--nw-accent);
      transform: translateY(-2px);
    }

    .btn-lime {
      background: var(--nw-accent);
      color: #041213 !important;
      font-weight: 800;
      font-size: 15.5px;
      padding: 14px 28px;
      border-radius: 12px;
      border: none;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 10px 30px rgba(173, 255, 28, 0.25);
    }
    .btn-lime:hover {
      background: #ffffff;
      color: #041213 !important;
      transform: translateY(-2px);
      box-shadow: 0 12px 35px rgba(255, 255, 255, 0.35);
    }

    .tech-pill {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid rgba(255, 255, 255, 0.14);
      color: #f1f5f9;
      font-size: 0.88rem;
      font-weight: 600;
      padding: 7px 15px;
      border-radius: 30px;
      margin: 4px;
    }
  </style>
</head>
<body class="homepage4-body sol-body">

  <?php include "includes/header.php"; ?>

  <?php if ($isDetail): ?>
  <!-- ══════════════ SOLUTION DETAIL VIEW ══════════════ -->
  <section class="sol-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
      
      <!-- Breadcrumb -->
      <div class="sol-breadcrumb">
        <a href="<?= $site ?>"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span>/</span>
        <a href="<?= $site ?>solutions/">Solutions</a>
        <span>/</span>
        <span class="text-white"><?= htmlspecialchars($sol['badge']) ?></span>
      </div>

      <div class="sol-hero-pill">
        <span class="pulse-dot"></span>
        <span><?= htmlspecialchars($sol['badge']) ?></span>
      </div>

      <h1><?= htmlspecialchars($sol['hero_heading']) ?></h1>
      <p class="lead-text"><?= htmlspecialchars($sol['hero_sub']) ?></p>

      <div class="d-flex flex-wrap gap-3 mt-4">
        <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20your%20<?= urlencode($sol['badge']) ?>%20solutions." target="_blank" class="btn-lime">
          <i class="fa-brands fa-whatsapp fa-lg"></i> Discuss Your Architecture
        </a>
        <a href="<?= $site ?>case-studies/<?= $sol['related_case_study'] ?>/" class="btn btn-outline-light rounded-pill px-4 py-3 d-inline-flex align-items-center gap-2" style="border-color: rgba(255,255,255,0.25);">
          <i class="fa-solid fa-diagram-project text-info"></i> View Related Case Study &rarr;
        </a>
      </div>
    </div>
  </section>

  <main class="py-5">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-8">

          <!-- 1. The Strategy / Core Approach -->
          <div class="sol-card">
            <h2 class="h4 fw-bold text-white mb-3">Enterprise Architectural Philosophy</h2>
            <p style="font-size: 1.05rem; line-height: 1.75; color: #cbd5e1;"><?= nl2br(htmlspecialchars($sol['lead_text'])) ?></p>
          </div>

          <!-- 2. Core Capabilities Matrix -->
          <div class="sol-card">
            <h2 class="h4 fw-bold text-white mb-4">Core Engineering Capabilities</h2>
            <div class="row g-3">
              <?php foreach ($sol['features'] as $f): ?>
              <div class="col-md-6">
                <div class="feature-box">
                  <h3 class="h6 fw-bold text-white mb-2"><i class="fa-solid fa-check text-success me-2"></i><?= htmlspecialchars($f['title']) ?></h3>
                  <p class="small text-white-50 mb-0"><?= htmlspecialchars($f['desc']) ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- 3. Production Risks Eliminated -->
          <div class="sol-card">
            <h2 class="h4 fw-bold text-white mb-3">Production Risks We Eliminate</h2>
            <ul class="list-unstyled mb-0">
              <?php foreach ($sol['risks_eliminated'] as $risk): ?>
              <li class="d-flex align-items-start gap-3 mb-3" style="font-size: 1rem; color: #cbd5e1;">
                <i class="fa-solid fa-shield-halved mt-1" style="color: var(--nw-accent);"></i>
                <span><?= htmlspecialchars($risk) ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <!-- 4. Technology Stack -->
          <div class="sol-card">
            <h2 class="h4 fw-bold text-white mb-3">Supported Technical Stack</h2>
            <div>
              <?php foreach ($sol['tech_stack'] as $t): ?>
              <span class="tech-pill"><i class="fa-solid fa-code" style="color: var(--nw-accent);"></i> <?= htmlspecialchars($t) ?></span>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <!-- Sticky Sidebar -->
        <div class="col-lg-4">
          <div class="sol-card" style="position: sticky; top: 100px; border-color: rgba(173,255,28,0.35); background: linear-gradient(135deg, rgba(16, 64, 65, 0.6) 0%, rgba(4, 18, 19, 0.95) 100%);">
            <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-25 px-3 py-1 mb-3 rounded-pill" style="font-size: 12px;">
              Direct Founder Engineering
            </span>
            <h3 class="h5 fw-bold text-white mb-2">Book a Technical Discovery Session</h3>
            <p class="small text-white-50 mb-4">Discuss your product specs directly with lead software architect Nikhil Gupta. Zero sales reps.</p>

            <div class="p-3 rounded-3 mb-4" style="background: rgba(0,0,0,0.35); border: 1px dashed rgba(255,255,255,0.15);">
              <div class="small text-white-50 mb-1">Related Production Proof:</div>
              <a href="<?= $site ?>case-studies/<?= $sol['related_case_study'] ?>/" class="fw-bold text-decoration-none" style="color: var(--nw-accent);">
                <?= htmlspecialchars($sol['case_study_title']) ?> &rarr;
              </a>
            </div>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20reviewing%20your%20<?= urlencode($sol['badge']) ?>%20architecture%20and%20would%20like%20to%20schedule%20a%20call." target="_blank" class="btn-lime w-100 mb-3">
              <i class="fa-brands fa-whatsapp fa-lg"></i> Book 30-Min Discovery
            </a>

            <a href="<?= $site ?>contact/" class="btn btn-outline-light w-100 rounded-pill py-2 text-white-50">
              <i class="fa-solid fa-envelope me-1"></i> Submit RFC / Specs
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php else: ?>
  <!-- ══════════════ SOLUTIONS DIRECTORY VIEW ══════════════ -->
  <section class="sol-hero text-center">
    <div class="loc-grid-overlay"></div>
    <div class="container position-relative" style="z-index: 2;">
      
      <!-- Breadcrumb -->
      <div class="sol-breadcrumb justify-content-center">
        <a href="<?= $site ?>"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span>/</span>
        <span class="text-white">Solutions</span>
      </div>

      <div class="sol-hero-pill">
        <span class="pulse-dot"></span>
        <span>Global Engineering Pillars</span>
      </div>
      <h1>Location-Agnostic Software Architecture</h1>
      <p class="lead-text mx-auto">
        Specialized engineering capabilities designed for high-scale fintech systems, cross-platform mobile apps, enterprise SaaS, and sub-second e-commerce platforms.
      </p>
    </div>
  </section>

  <main class="py-5">
    <div class="container">
      <div class="row g-4">
        <?php foreach ($solutions as $slugKey => $item): ?>
        <div class="col-lg-6">
          <div class="sol-card h-100 d-flex flex-column justify-content-between">
            <div>
              <div class="sol-hero-pill mb-3" style="font-size: 11px; padding: 4px 12px;">
                <span class="pulse-dot"></span>
                <span><?= htmlspecialchars($item['badge']) ?></span>
              </div>
              <h2 class="h5 fw-bold text-white mb-2"><?= htmlspecialchars($item['hero_heading']) ?></h2>
              <p class="small text-white-50 mb-4"><?= htmlspecialchars($item['hero_sub']) ?></p>

              <div class="row g-2 mb-4">
                <?php foreach (array_slice($item['features'], 0, 2) as $feat): ?>
                <div class="col-12">
                  <div class="small p-2 rounded" style="background: rgba(16,64,65,0.25); border: 1px solid rgba(173,255,28,0.15);">
                    <strong class="text-white"><?= htmlspecialchars($feat['title']) ?>:</strong> 
                    <span class="text-white-50"><?= htmlspecialchars($feat['desc']) ?></span>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div>
              <a href="<?= $site ?>solutions/<?= $slugKey ?>/" class="btn btn-outline-light w-100 rounded-pill py-2" style="border-color: rgba(173,255,28,0.4); color: var(--nw-accent);">
                Explore Architecture &rarr;
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
