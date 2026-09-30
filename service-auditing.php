<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-auditing-cities.php';
$pages = include __DIR__ . '/data/services-auditing.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-auditing-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$isHub = in_array($page, $hubSlugs, true);
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'GB' => 'website-maintenance-uk/', 'IN' => 'website-maintenance-india/', 'AE' => 'website-maintenance-uae/', 'CA' => 'website-maintenance-canada/', 'AU' => 'website-maintenance-australia/'];
$maintenanceLink = $maintenanceSlugs[$c['schema_country']] ?? 'services/';
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'auditing') : null) ?? ($site . 'assets/img/all-images/service-img4.png');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($c['title']) ?></title>
<meta name="description" content="<?= htmlspecialchars($c['description']) ?>">
<meta name="keywords" content="<?= htmlspecialchars($c['keywords']) ?>">
<link rel="canonical" href="<?= htmlspecialchars($c['canonical']) ?>">
<meta property="og:title" content="<?= htmlspecialchars($c['title']) ?>">
<meta property="og:description" content="<?= htmlspecialchars($c['description']) ?>">
<meta property="og:url" content="<?= htmlspecialchars($c['canonical']) ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="https://nikhilworks.com/assets/img/preview.png">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Service',
  'serviceType' => 'Website Audit Services',
  'provider' => ['@type' => 'ProfessionalService', 'name' => 'NikhilWorks', 'url' => 'https://nikhilworks.com', 'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']],
  'areaServed' => ['@type' => $isHub ? 'Country' : 'City', 'name' => $c['country_name']],
  'description' => $c['description'],
  'offers' => ['@type' => 'Offer', 'priceCurrency' => $c['currency'], 'priceRange' => $c['price_range']],
], JSON_UNESCAPED_SLASHES) ?>
</script>
<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'FAQPage',
  'mainEntity' => array_map(function ($faq) {
    return [
      '@type' => 'Question',
      'name' => $faq['q'],
      'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
    ];
  }, $u['faqs']),
], JSON_UNESCAPED_SLASHES) ?>
</script>
<link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
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

  .audit-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .audit-hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(173, 255, 28, 0.12);
    border: 1px solid rgba(173, 255, 28, 0.35);
    color: #ADFF1C;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
    backdrop-filter: blur(8px);
  }

  .audit-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .audit-hero-sub {
    font-size: 1.15rem;
    line-height: 1.65;
    color: #c4dedb;
    max-width: 620px;
    margin-bottom: 30px;
  }

  .btn-lime {
    background: #ADFF1C;
    color: #082223 !important;
    font-weight: 700;
    padding: 14px 28px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 2px solid #ADFF1C;
    box-shadow: 0 8px 24px rgba(173, 255, 28, 0.25);
  }

  .btn-lime:hover {
    background: #c3ff4d;
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(173, 255, 28, 0.35);
  }

  .btn-outline-lime {
    background: transparent;
    color: #fff !important;
    font-weight: 600;
    padding: 14px 26px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid rgba(255, 255, 255, 0.3);
  }

  .btn-outline-lime:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: #ADFF1C;
    color: #ADFF1C !important;
    transform: translateY(-2px);
  }

  /* Right-Side Interactive Audit Diagnostic Mockup */
  .audit-monitor-wrap {
    position: relative;
  }

  .audit-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .audit-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .audit-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .audit-dot.red { background: #ff5f56; }
  .audit-dot.yellow { background: #ffbd2e; }
  .audit-dot.green { background: #27c93f; }

  .audit-url-bar {
    background: rgba(255, 255, 255, 0.06);
    border-radius: 6px;
    padding: 4px 12px;
    font-size: 11px;
    color: #8faea9;
    font-family: monospace;
    flex-grow: 1;
    margin-left: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .audit-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .audit-score-grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 8px;
    margin-bottom: 14px;
  }

  .audit-score-card {
    background: rgba(16, 64, 65, 0.4);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 10px;
    padding: 10px;
    text-align: center;
  }

  .audit-score-card .title {
    font-size: 10px;
    color: #a3c4c0;
    text-transform: uppercase;
    font-weight: 700;
  }

  .audit-score-card .score {
    font-size: 16px;
    font-weight: 800;
    color: #ADFF1C;
    margin: 4px 0;
  }

  .audit-check-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.08);
    font-size: 13px;
    color: #c4dedb;
  }

  .audit-check-item:last-child {
    border-bottom: none;
  }

  .audit-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .audit-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .audit-floating-badge {
    position: absolute;
    background: rgba(8, 34, 35, 0.95);
    border: 1px solid rgba(173, 255, 28, 0.4);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    padding: 10px 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .audit-badge-top {
    top: -16px;
    right: 16px;
  }

  .audit-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .audit-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .audit-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .audit-stat-item span {
    font-size: 11px;
    color: #a3c4c0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Cards & Sections */
  .service-card {
    background: #fff;
    border-radius: 16px;
    padding: 28px;
    border: 1px solid #e1eeeb;
    box-shadow: 0 8px 24px rgba(16, 64, 65, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .service-card:hover {
    transform: translateY(-5px);
    border-color: #ADFF1C;
    box-shadow: 0 16px 36px rgba(16, 64, 65, 0.12);
  }

  .service-card .service-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: rgba(16, 64, 65, 0.08);
    color: #104041;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
  }

  .service-card:hover .service-icon {
    background: #104041;
    color: #ADFF1C;
  }

  .service-experience span {
    background: #104041;
    color: #ADFF1C;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
  }

  .service-card h3 {
    color: #104041;
    font-size: 1.28rem;
    font-weight: 700;
    margin-bottom: 6px;
  }

  .service-tagline {
    color: #104041;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
  }

  .service-description {
    color: #557273;
    font-size: 0.95rem;
    line-height: 1.55;
    margin-bottom: 18px;
  }

  .service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    flex-grow: 1;
  }

  .service-features li {
    font-size: 13.5px;
    color: #385253;
    padding: 5px 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .service-features li i {
    color: #104041;
    font-size: 12px;
  }

  .btn-service {
    background: #104041;
    color: #ADFF1C !important;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 700;
    text-align: center;
    display: block;
    transition: all 0.25s ease;
  }

  .btn-service:hover {
    background: #082223;
    color: #fff !important;
    transform: translateY(-2px);
  }

  .audit-step-card {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .audit-step-card:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  .audit-step-num {
    font-size: 2.2rem;
    font-weight: 800;
    color: #104041;
    line-height: 1;
    margin-bottom: 10px;
  }

  /* Dark CTA banner */
  .audit-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .audit-hero {
      padding: 100px 0 60px;
    }
    .audit-floating-badge {
      display: none;
    }
    .audit-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="audit-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="audit-hero-pill">
          <i class="fa-solid fa-stethoscope"></i>
          <span><?= htmlspecialchars($c['flag']) ?> Comprehensive Technical &amp; SEO Audit</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="audit-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Identify hidden bottlenecks, security risks, crawl errors, and conversion leaks before they cost you business revenue.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get Full Website Audit</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20a%20website%20audit%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Interactive Audit Diagnostic Card -->
      <div class="col-lg-5">
        <div class="audit-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="audit-floating-badge audit-badge-top">
            <i class="fa-solid fa-file-circle-check" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">50+ Checkpoint Scan</div>
              <div style="font-size:10px; color:#ADFF1C;">SEO, Speed, Security &amp; UX</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="audit-monitor-card">
            <div class="audit-monitor-header">
              <span class="audit-dot red"></span>
              <span class="audit-dot yellow"></span>
              <span class="audit-dot green"></span>
              <div class="audit-url-bar">https://nikhilworks.com/audit-report/<?= htmlspecialchars($page) ?></div>
            </div>

            <div class="audit-monitor-body">
              <div class="audit-score-grid">
                <div class="audit-score-card">
                  <div class="title">SEO Health</div>
                  <div class="score">96%</div>
                  <div style="font-size:10px; color:#27c93f;">Passed</div>
                </div>
                <div class="audit-score-card">
                  <div class="title">Core Vitals</div>
                  <div class="score">94%</div>
                  <div style="font-size:10px; color:#27c93f;">Fast</div>
                </div>
                <div class="audit-score-card">
                  <div class="title">Security</div>
                  <div class="score">100%</div>
                  <div style="font-size:10px; color:#27c93f;">Secure</div>
                </div>
              </div>

              <div class="audit-check-item">
                <span><i class="fa-solid fa-circle-check me-2" style="color:#27c93f;"></i> Technical Indexing &amp; Sitemap</span>
                <span style="color:#27c93f; font-weight:600;">Verified</span>
              </div>
              <div class="audit-check-item">
                <span><i class="fa-solid fa-circle-check me-2" style="color:#27c93f;"></i> Structured Schema Markup</span>
                <span style="color:#27c93f; font-weight:600;">Optimal</span>
              </div>
              <div class="audit-check-item">
                <span><i class="fa-solid fa-triangle-exclamation me-2" style="color:#ffbd2e;"></i> Mobile UX Friction Points</span>
                <span style="color:#ffbd2e; font-weight:600;">Actionable</span>
              </div>

              <div class="audit-tech-pills">
                <span class="audit-tech-pill">Technical SEO</span>
                <span class="audit-tech-pill">Core Web Vitals</span>
                <span class="audit-tech-pill">Security Audit</span>
                <span class="audit-tech-pill">CRO Analysis</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="audit-stats-strip">
              <div class="audit-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Audits Done</span>
              </div>
              <div class="audit-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="audit-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="audit-floating-badge audit-badge-bottom">
            <i class="fa-solid fa-chart-pie" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Prioritized Action Plan</div>
              <div style="font-size:10px; color:#a3c4c0;">Plain English, No Jargon</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!--===== HERO AREA ENDS =======-->

<?php
$introSection = '
<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 order-lg-2">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $heroImage . '" alt="Website audit for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Deep Code &amp; SEO Diagnostics</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '
        <div class="mt-4">
          <a href="' . $site . 'contact/" class="btn-service" style="display:inline-block; padding:12px 24px;">Request Your Audit Today <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>';

$whyUsSection = '
<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Clarity Over Guesswork</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">Why a Professional Audit Pays for Itself</h2>
        <p class="text-muted mb-4" style="font-size:1.05rem; line-height:1.65;">Most business owners guess why their website isn\'t ranking or converting. Our audit cuts through the noise with deep code analysis, crawl diagnostics, PageSpeed evaluations, and UX reviews — delivered as a clear, prioritized checklist ranked by revenue impact.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="audit-step-card">
              <i class="fa-solid fa-magnifying-glass mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Technical SEO Obstacles</div>
              <p class="text-muted mb-0" style="font-size:12px;">Crawl errors &amp; indexing issues unmasked.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="audit-step-card">
              <i class="fa-solid fa-gauge-high mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Core Web Vitals Leaks</div>
              <p class="text-muted mb-0" style="font-size:12px;">Pinpoint slow scripts and bloated assets.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="audit-step-card">
              <i class="fa-solid fa-user-xmark mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Conversion Bottlenecks</div>
              <p class="text-muted mb-0" style="font-size:12px;">Identify where prospective buyers drop off.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="audit-step-card">
              <i class="fa-solid fa-shield-halved mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Security &amp; Vulnerabilities</div>
              <p class="text-muted mb-0" style="font-size:12px;">Uncover unpatched scripts before breaches.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $site . 'assets/img/all-images/service-img1.png" alt="Audit process breakdown for ' . htmlspecialchars($c['country_name']) . '" style="width:100%; display:block;">
        </div>
      </div>
    </div>
  </div>
</section>';

if ($u['layout'] === 'A') {
  echo $introSection;
  echo $whyUsSection;
} else {
  echo $whyUsSection;
  echo $introSection;
}
?>

<!--===== SERVICES INCLUDED GRID =======-->
<section class="py-5" style="background: #fbfdfc;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Diagnostic Scope</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What Every Audit Inspects</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">A complete 360-degree review of your technical foundation, search rankings, speed, and user journey.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Technical SEO &amp; Indexing</h3>
          <p class="service-tagline">CAN GOOGLE CRAWL YOU EASILY?</p>
          <p class="service-description">Full inspection of robots.txt, XML sitemaps, canonical tags, 404 broken links, duplicate content, and indexing directives.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Crawl depth and canonical check</li>
            <li><i class="fa-solid fa-check"></i> Broken link and redirect audit</li>
            <li><i class="fa-solid fa-check"></i> Schema markup validation</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-gauge-high"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Speed &amp; Core Web Vitals</h3>
          <p class="service-tagline">WHY IS YOUR SITE SLUGGISH?</p>
          <p class="service-description">LCP, INP, and CLS performance analysis with explicit code-level recommendations to hit 90+ on Google PageSpeed.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Real user CWV metrics</li>
            <li><i class="fa-solid fa-check"></i> Asset and script bloat check</li>
            <li><i class="fa-solid fa-check"></i> Server TTFB response analysis</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Security &amp; Vulnerability Check</h3>
          <p class="service-tagline">IS YOUR DATA AT RISK?</p>
          <p class="service-description">Inspection of SSL certificates, security headers, unpatched plugins/CMS versions, and sensitive directory exposure.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> SSL &amp; HTTPS security headers</li>
            <li><i class="fa-solid fa-check"></i> Outdated script detection</li>
            <li><i class="fa-solid fa-check"></i> Malware / Blacklist verification</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-mobile-screen"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Mobile Usability &amp; UX Flow</h3>
          <p class="service-tagline">HOW DO PHONE USERS EXPERIENCE IT?</p>
          <p class="service-description">Evaluation of viewport scaling, touch-target sizes, font readability, and navigation simplicity on mobile screens.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Responsive breakpoint check</li>
            <li><i class="fa-solid fa-check"></i> Mobile navigation evaluation</li>
            <li><i class="fa-solid fa-check"></i> Tap-target accessibility</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-filter-circle-dollar"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Conversion Rate &amp; CTA Review</h3>
          <p class="service-tagline">WHERE ARE VISITORS DROPPING OFF?</p>
          <p class="service-description">Analysis of value propositions, contact form friction, call-to-action visibility, and trust elements.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Form friction &amp; validation check</li>
            <li><i class="fa-solid fa-check"></i> CTA contrast and placement</li>
            <li><i class="fa-solid fa-check"></i> Trust proof placement</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-file-contract"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Prioritized Action Report</h3>
          <p class="service-tagline">NO FLUFF, CLEAR ROADMAP</p>
          <p class="service-description">A plain-language PDF checklist ranking issues by business impact: High, Medium, and Quick-Wins.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Prioritized impact matrix</li>
            <li><i class="fa-solid fa-check"></i> Developer-ready fix instructions</li>
            <li><i class="fa-solid fa-check"></i> Optional implementation quote</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--===== 4-STEP PROCESS SECTION =======-->
<section class="py-5 bg-light">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Straightforward Process</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">How the Audit Works</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="audit-step-card text-center">
          <div class="audit-step-num">01</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Comprehensive Scan</h4>
          <p class="text-muted small mb-0">Automated and manual review across SEO, speed, security, and mobile UX.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="audit-step-card text-center">
          <div class="audit-step-num">02</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Prioritized Report</h4>
          <p class="text-muted small mb-0">Issues categorized by impact with transparent fixed pricing in <?= htmlspecialchars($c['currency']) ?>.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="audit-step-card text-center">
          <div class="audit-step-num">03</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Walkthrough Call</h4>
          <p class="text-muted small mb-0">We explain every finding in plain, practical language without confusing technical jargon.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="audit-step-card text-center">
          <div class="audit-step-num">04</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Fix It (Optional)</h4>
          <p class="text-muted small mb-0">We can implement every fix directly for you, or hand the checklist over to your internal team.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== FAQ SECTION =======-->
<section class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Clear Answers</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">Frequently Asked Questions</h2>
      <p class="text-muted">Everything you need to know about website audit reports in <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="auditFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#aud<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="aud<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#auditFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audBonus" style="font-weight:700; color:#104041;">
                Can you also implement the fixes identified in the audit?
              </button>
            </h3>
            <div id="audBonus" class="accordion-collapse collapse" data-bs-parent="#auditFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Yes — we can implement all recommended technical, SEO, speed, and security fixes directly under our <a href="<?= $site . $maintenanceLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">website maintenance and optimization support plans</a>.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== BOTTOM CTA BANNER =======-->
<section class="py-5">
  <div class="container">
    <div class="audit-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Know Exactly What's Holding Your <?= htmlspecialchars($c['country_name']) ?> Website Back</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        Get a prioritized audit report in <?= htmlspecialchars($c['currency']) ?> within 3-5 business days. No technical jargon. Just clear results.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get Your Website Audit</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
          <i class="fa-solid fa-briefcase"></i>
          <span>See Portfolio</span>
        </a>
        <a href="https://wa.me/918368552640" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.6); color:#25D366 !important;">
          <i class="fa-brands fa-whatsapp"></i>
          <span>Chat on WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?= $isHub ? render_hub_crosslinks($site, $c['schema_country'], $page . '/') : '' ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
