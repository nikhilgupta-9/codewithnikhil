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
  <link rel="alternate" hreflang="en-NZ" href="<?= $canonical_url ?>">
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
      {"@type": "Country", "name": "New Zealand"},
      {"@type": "Country", "name": "Canada"},
      {"@type": "Country", "name": "Australia"},
      {"@type": "Country", "name": "India"}
    ]
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

    body.sol-body {
      background-color: var(--nw-bg);
      color: var(--nw-text-muted);
      font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    /* ---- LIGHT HERO SECTION ---- */
    .sol-hero {
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

    .sol-breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13.5px;
      color: var(--nw-text-subtle);
      margin-bottom: 18px;
    }
    .sol-breadcrumb a {
      color: var(--nw-teal);
      text-decoration: none;
      font-weight: 600;
    }
    .sol-breadcrumb a:hover {
      color: var(--nw-primary);
      text-decoration: underline;
    }

    .sol-hero-pill {
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
    .sol-hero-pill .pulse-dot {
      width: 8px;
      height: 8px;
      background: var(--nw-teal);
      border-radius: 50%;
      box-shadow: 0 0 8px rgba(15, 118, 110, 0.5);
    }

    .sol-hero h1 {
      font-size: clamp(2rem, 3.8vw, 3.1rem);
      font-weight: 800;
      line-height: 1.22;
      color: var(--nw-text-dark);
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }
    .sol-hero p.lead-text {
      font-size: clamp(1.02rem, 1.6vw, 1.15rem);
      color: var(--nw-text-muted);
      max-width: 860px;
      line-height: 1.7;
      margin-bottom: 30px;
    }

    /* ---- CONTENT CARDS ---- */
    .sol-card {
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 18px;
      padding: 34px 30px;
      margin-bottom: 28px;
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
    }

    .feature-box {
      background: #F8FAFC;
      border: 1px solid var(--nw-border);
      border-radius: 14px;
      padding: 22px;
      height: 100%;
      transition: all 0.25s ease;
    }
    .feature-box:hover {
      border-color: var(--nw-teal);
      background: #FFFFFF;
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(15, 118, 110, 0.1);
    }

    /* ---- RISK CARDS ---- */
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

    /* ---- SIDEBAR & BUTTONS ---- */
    .sol-sidebar-sticky {
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

    .sol-list-card {
      background: #FFFFFF;
      border: 1px solid var(--nw-border);
      border-radius: 20px;
      padding: 34px 28px;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: all 0.3s ease;
      box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
    }
    .sol-list-card:hover {
      border-color: var(--nw-teal);
      transform: translateY(-5px);
      box-shadow: 0 14px 35px rgba(15, 118, 110, 0.12);
    }
    .sol-list-btn {
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
    .sol-list-btn:hover {
      background: var(--nw-teal);
      transform: translateY(-2px);
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
        <span class="text-dark fw-bold"><?= htmlspecialchars($sol['badge']) ?></span>
      </div>

      <div class="sol-hero-pill">
        <span class="pulse-dot"></span>
        <span><?= htmlspecialchars($sol['badge']) ?></span>
      </div>

      <h1><?= htmlspecialchars($sol['hero_heading']) ?></h1>
      <p class="lead-text"><?= htmlspecialchars($sol['hero_sub']) ?></p>

      <div class="d-flex flex-wrap gap-3 mt-4">
        <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20interested%20in%20your%20<?= urlencode($sol['badge']) ?>%20solutions." target="_blank" class="btn-whatsapp-consult" style="width: auto; padding: 12px 28px;">
          <i class="fa-brands fa-whatsapp fa-lg"></i> Discuss Your Architecture
        </a>
        <a href="<?= $site ?>case-studies/<?= $sol['related_case_study'] ?>/" class="btn btn-outline-dark rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2" style="font-weight: 600;">
          <i class="fa-solid fa-diagram-project text-teal" style="color: var(--nw-teal);"></i> View Production Case Study &rarr;
        </a>
      </div>
    </div>
  </section>

  <main class="py-5" style="background: var(--nw-bg);">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-8">

          <!-- 1. The Strategy / Core Approach -->
          <div class="sol-card">
            <h2 class="h4 fw-bold mb-3" style="color: var(--nw-text-dark);">Enterprise Architectural Philosophy</h2>
            <p style="font-size: 1.05rem; line-height: 1.8; color: var(--nw-text-muted);"><?= nl2br(htmlspecialchars($sol['lead_text'])) ?></p>
          </div>

          <!-- 2. Core Capabilities Matrix -->
          <div class="sol-card">
            <h2 class="h4 fw-bold mb-4" style="color: var(--nw-text-dark);">Core Engineering Capabilities</h2>
            <div class="row g-3">
              <?php foreach ($sol['features'] as $f): ?>
              <div class="col-md-6">
                <div class="feature-box">
                  <h3 class="h6 fw-bold mb-2" style="color: var(--nw-text-dark);"><i class="fa-solid fa-circle-check text-success me-2"></i><?= htmlspecialchars($f['title']) ?></h3>
                  <p class="small text-muted mb-0" style="line-height: 1.6;"><?= htmlspecialchars($f['desc']) ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- 3. Production Risks Eliminated -->
          <div class="sol-card">
            <h2 class="h4 fw-bold mb-3" style="color: var(--nw-text-dark);">Production Risks We Eliminate</h2>
            <div>
              <?php foreach ($sol['risks_eliminated'] as $risk): ?>
              <div class="risk-card-item">
                <i class="fa-solid fa-shield-halved text-success mt-1"></i>
                <span><?= htmlspecialchars($risk) ?></span>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- 4. Technology Stack -->
          <div class="sol-card">
            <h2 class="h4 fw-bold mb-3" style="color: var(--nw-text-dark);">Supported Technical Stack</h2>
            <div>
              <?php foreach ($sol['tech_stack'] as $t): ?>
              <span class="tech-pill"><i class="fa-solid fa-code" style="color: var(--nw-teal);"></i> <?= htmlspecialchars($t) ?></span>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

        <!-- Sticky Sidebar -->
        <div class="col-lg-4">
          <div class="sol-sidebar-sticky">
            <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-3 py-1 mb-3 rounded-pill" style="font-size: 12px;">
              🟢 Direct Founder Engineering
            </span>
            <h3 class="h5 fw-bold mb-2" style="color: var(--nw-text-dark);">Book a Technical Discovery Session</h3>
            <p class="small text-muted mb-4">Discuss your product specs directly with lead software architect Nikhil Gupta. Zero sales reps.</p>

            <div class="p-3 rounded-3 mb-4" style="background: #F8FAFC; border: 1px dashed var(--nw-border);">
              <div class="small text-muted mb-1"><i class="fa-solid fa-diagram-project text-teal me-1" style="color: var(--nw-teal);"></i> Related Production Proof:</div>
              <a href="<?= $site ?>case-studies/<?= $sol['related_case_study'] ?>/" class="fw-bold text-decoration-none" style="color: var(--nw-teal);">
                <?= htmlspecialchars($sol['case_study_title']) ?> &rarr;
              </a>
            </div>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil,%20I%20am%20reviewing%20your%20<?= urlencode($sol['badge']) ?>%20architecture%20and%20would%20like%20to%20schedule%20a%20call." target="_blank" class="btn-whatsapp-consult mb-3">
              <i class="fa-brands fa-whatsapp fa-lg"></i> Book 30-Min Discovery
            </a>

            <a href="<?= $site ?>contact/" class="btn-primary-consult">
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
        <span class="text-dark fw-bold">Solutions</span>
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

  <main class="py-5" style="background: var(--nw-bg);">
    <div class="container">
      <div class="row g-4">
        <?php foreach ($solutions as $slugKey => $item): ?>
        <div class="col-lg-6">
          <div class="sol-list-card">
            <div>
              <div class="sol-hero-pill mb-3" style="font-size: 11px; padding: 4px 12px;">
                <span class="pulse-dot"></span>
                <span><?= htmlspecialchars($item['badge']) ?></span>
              </div>
              <h2 class="h5 fw-bold text-dark mb-2"><?= htmlspecialchars($item['hero_heading']) ?></h2>
              <p class="small text-muted mb-4"><?= htmlspecialchars($item['hero_sub']) ?></p>

              <div class="row g-2 mb-4">
                <?php foreach (array_slice($item['features'], 0, 2) as $feat): ?>
                <div class="col-12">
                  <div class="small p-2 rounded-3" style="background: #F8FAFC; border: 1px solid var(--nw-border);">
                    <strong class="text-dark"><?= htmlspecialchars($feat['title']) ?>:</strong> 
                    <span class="text-muted"><?= htmlspecialchars($feat['desc']) ?></span>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>

            <div>
              <a href="<?= $site ?>solutions/<?= $slugKey ?>/" class="sol-list-btn">
                Explore Solution Architecture <i class="fa-solid fa-arrow-right"></i>
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