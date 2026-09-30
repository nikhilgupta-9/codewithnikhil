<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-maintenance-cities.php';
$pages = include __DIR__ . '/data/services-maintenance.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-maintenance-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$isHub = in_array($page, $hubSlugs, true);
$seoSlugs = ['US' => 'seo-services-usa/', 'GB' => 'seo-services-uk/', 'IN' => 'seo-services-india/', 'AE' => 'seo-services-uae/', 'CA' => 'seo-services-canada/', 'AU' => 'seo-services-australia/'];
$seoLink = $seoSlugs[$c['schema_country']] ?? 'services/';
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'maintenance') : null) ?? ($site . 'assets/img/all-images/service-img3.png');
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
  'serviceType' => 'Website Maintenance and Support',
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

  .maint-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .maint-hero-pill {
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

  .maint-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .maint-hero h1 span.highlight {
    color: #ADFF1C;
    position: relative;
  }

  .maint-hero-sub {
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

  /* Right-Side Interactive Maintenance Monitor Mockup */
  .maint-monitor-wrap {
    position: relative;
  }

  .maint-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .maint-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .maint-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .maint-dot.red { background: #ff5f56; }
  .maint-dot.yellow { background: #ffbd2e; }
  .maint-dot.green { background: #27c93f; }

  .maint-url-bar {
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

  .maint-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .maint-status-row {
    background: rgba(16, 64, 65, 0.5);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 12px;
    padding: 14px 16px;
    margin-bottom: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .maint-status-info {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .maint-pulse-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #27c93f;
    box-shadow: 0 0 10px #27c93f;
    animation: maintPulse 1.8s infinite;
  }

  @keyframes maintPulse {
    0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(39, 201, 63, 0.7); }
    70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(39, 201, 63, 0); }
    100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(39, 201, 63, 0); }
  }

  .maint-check-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.08);
    font-size: 13px;
    color: #c4dedb;
  }

  .maint-check-item:last-child {
    border-bottom: none;
  }

  .maint-check-item i {
    color: #ADFF1C;
    margin-right: 6px;
  }

  .maint-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 14px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .maint-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .maint-floating-badge {
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

  .maint-badge-top {
    top: -16px;
    right: 16px;
  }

  .maint-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .maint-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .maint-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .maint-stat-item span {
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

  .maint-feature-box {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .maint-feature-box:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  /* Dark CTA banner */
  .maint-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .maint-hero {
      padding: 100px 0 60px;
    }
    .maint-floating-badge {
      display: none;
    }
    .maint-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="maint-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="maint-hero-pill">
          <i class="fa-solid fa-shield-halved"></i>
          <span><?= htmlspecialchars($c['flag']) ?> Website Maintenance &amp; Support SLA</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="maint-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Zero downtime emergencies, security patches applied within hours, daily off-site cloud backups, and direct developer access.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get a Maintenance Plan</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20website%20maintenance%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Interactive Monitor Card -->
      <div class="col-lg-5">
        <div class="maint-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="maint-floating-badge maint-badge-top">
            <span class="maint-pulse-dot"></span>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">99.9% Uptime SLA</div>
              <div style="font-size:10px; color:#ADFF1C;">24/7 Automated Monitoring</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="maint-monitor-card">
            <div class="maint-monitor-header">
              <span class="maint-dot red"></span>
              <span class="maint-dot yellow"></span>
              <span class="maint-dot green"></span>
              <div class="maint-url-bar">https://nikhilworks.com/monitor/<?= htmlspecialchars($page) ?></div>
            </div>

            <div class="maint-monitor-body">
              <div class="maint-status-row">
                <div class="maint-status-info">
                  <span class="maint-pulse-dot"></span>
                  <div>
                    <div style="font-size:13px; font-weight:700; color:#fff;">Status: All Systems Operational</div>
                    <div style="font-size:11px; color:#a3c4c0;">Location: <?= htmlspecialchars($c['country_name']) ?></div>
                  </div>
                </div>
                <span style="background: rgba(173,255,28,0.15); color: #ADFF1C; font-size: 11px; padding: 3px 8px; border-radius: 4px; font-weight: 700;">ACTIVE</span>
              </div>

              <div class="maint-check-item">
                <span><i class="fa-solid fa-shield-virus"></i> Security &amp; Firewall</span>
                <span style="color:#27c93f; font-weight:600;">0 Vulnerabilities</span>
              </div>
              <div class="maint-check-item">
                <span><i class="fa-solid fa-cloud-arrow-up"></i> Last Off-Site Backup</span>
                <span style="color:#ADFF1C; font-weight:600;">Today, 03:00 AM</span>
              </div>
              <div class="maint-check-item">
                <span><i class="fa-solid fa-bolt"></i> Avg Server Response</span>
                <span style="color:#ADFF1C; font-weight:600;">180ms Ultra-Fast</span>
              </div>
              <div class="maint-check-item">
                <span><i class="fa-solid fa-cubes"></i> Core &amp; Plugins</span>
                <span style="color:#27c93f; font-weight:600;">Up to Date</span>
              </div>

              <div class="maint-tech-pills">
                <span class="maint-tech-pill">WordPress</span>
                <span class="maint-tech-pill">WooCommerce</span>
                <span class="maint-tech-pill">PHP 8.x</span>
                <span class="maint-tech-pill">Laravel</span>
                <span class="maint-tech-pill">MySQL</span>
                <span class="maint-tech-pill">React</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="maint-stats-strip">
              <div class="maint-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Sites Managed</span>
              </div>
              <div class="maint-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="maint-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="maint-floating-badge maint-badge-bottom">
            <i class="fa-solid fa-database" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Daily Cloud Backups</div>
              <div style="font-size:10px; color:#a3c4c0;">1-Click Fast Restore</div>
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
          <img src="' . $heroImage . '" alt="Website maintenance for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Dedicated Care &amp; Upkeep</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '
        <div class="mt-4">
          <a href="' . $site . 'contact/" class="btn-service" style="display:inline-block; padding:12px 24px;">Discuss Your Website Needs <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Proactive Risk Prevention</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">What Happens If Your Website Isn\'t Maintained?</h2>
        <p class="text-muted mb-4" style="font-size:1.05rem; line-height:1.65;">Most website problems are silent until they become costly emergencies. Outdated plugins sit unpatched until hackers exploit them. Broken pages slip through until a customer complains. Rankings slowly drop while competitors improve. A professional maintenance plan stops all of this before it impacts your business.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="maint-feature-box">
              <i class="fa-solid fa-lock mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Security Vulnerabilities</div>
              <p class="text-muted mb-0" style="font-size:12px;">Unpatched CMS &amp; plugins are easy targets.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="maint-feature-box">
              <i class="fa-solid fa-bug mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Downtime &amp; Broken Links</div>
              <p class="text-muted mb-0" style="font-size:12px;">Unmonitored crashes cost leads and sales.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="maint-feature-box">
              <i class="fa-solid fa-chart-line mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Slipping Google Rankings</div>
              <p class="text-muted mb-0" style="font-size:12px;">Slow speed and errors hurt search rank.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="maint-feature-box">
              <i class="fa-solid fa-database mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">No Clean Backups</div>
              <p class="text-muted mb-0" style="font-size:12px;">One bad update can erase years of work.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $site . 'assets/img/all-images/service-img4.png" alt="Website maintenance plan checklist for ' . htmlspecialchars($c['country_name']) . '" style="width:100%; display:block;">
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
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Complete Technical Care</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What's Included in Every Plan</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">Everything needed to keep your website fast, secure, backed up and ranking high.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Security &amp; Malware Protection</h3>
          <p class="service-tagline">CLOSE THE DOOR ON HACKERS</p>
          <p class="service-description">Core PHP, CMS, and plugin updates applied safely with vulnerability scans and firewall tuning.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Core &amp; framework security patches</li>
            <li><i class="fa-solid fa-check"></i> Plugin &amp; extension updates</li>
            <li><i class="fa-solid fa-check"></i> Continuous malware scanning</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-database"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Daily Automated Backups</h3>
          <p class="service-tagline">NEVER MORE THAN A DAY AWAY</p>
          <p class="service-description">Automated off-site cloud backups so your business is always one quick click away from clean restore.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Daily automated snapshots</li>
            <li><i class="fa-solid fa-check"></i> Secure off-site cloud storage</li>
            <li><i class="fa-solid fa-check"></i> 1-Click tested emergency restore</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-server"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>24/7 Uptime Monitoring</h3>
          <p class="service-tagline">KNOW BEFORE CUSTOMERS DO</p>
          <p class="service-description">Automated health checks every 60 seconds with instant emergency developer alerts upon any glitch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 24/7 global server heartbeat</li>
            <li><i class="fa-solid fa-check"></i> Instant downtime alerting</li>
            <li><i class="fa-solid fa-check"></i> Monthly uptime &amp; SLA reports</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-pen-to-square"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Content &amp; Banner Updates</h3>
          <p class="service-tagline">NO CODE REQUIRED ON YOUR END</p>
          <p class="service-description">Send text, images, products, pricing updates or new pages and have them published seamlessly.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Text, image &amp; banner updates</li>
            <li><i class="fa-solid fa-check"></i> Product &amp; pricing additions</li>
            <li><i class="fa-solid fa-check"></i> 24-48 hour fast turnaround</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
          <p class="service-tagline">STAYS LIGHTNING-FAST AS YOU GROW</p>
          <p class="service-description">Ongoing database cleanup, server caching tuning, and asset compression to maintain 90+ PageSpeed.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Monthly speed &amp; CWV audits</li>
            <li><i class="fa-solid fa-check"></i> Image &amp; WebP optimization</li>
            <li><i class="fa-solid fa-check"></i> Database optimization &amp; caching</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-bolt"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Priority Bug Fixes</h3>
          <p class="service-tagline">DIRECT DEVELOPER ACCESS</p>
          <p class="service-description">Direct WhatsApp and email channel to your developer — no annoying support tickets or junior handoffs.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Priority SLA response time</li>
            <li><i class="fa-solid fa-check"></i> Direct 1-on-1 developer contact</li>
            <li><i class="fa-solid fa-check"></i> Emergency weekend on-call support</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get a Plan <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
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
      <p class="text-muted">Everything you need to know about website maintenance plans in <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="maintFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#mnt<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="mnt<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#maintFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mntBonus" style="font-weight:700; color:#104041;">
                Do you also offer ongoing SEO alongside website maintenance?
              </button>
            </h3>
            <div id="mntBonus" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Yes — we offer full-suite <a href="<?= $site . $seoLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">SEO &amp; Organic Ranking Services</a> if you want keyword ranks and organic traffic proactively grown alongside technical maintenance.
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
    <div class="maint-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Never Worry About Your <?= htmlspecialchars($c['country_name']) ?> Website Again</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        Transparent monthly care in <?= htmlspecialchars($c['currency']) ?> starting from <?= htmlspecialchars($c['price_range']) ?>. No long-term lock-ins. Cancel or change plans anytime.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get a Maintenance Plan</span>
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
