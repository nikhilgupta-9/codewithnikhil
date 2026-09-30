<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-seo-cities.php';
$pages = include __DIR__ . '/data/services-seo.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-seo-content.php';
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
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'seo') : null) ?? ($site . 'assets/img/all-images/service-img1.png');
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
  'serviceType' => 'Search Engine Optimization',
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

  .seo-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .seo-hero-pill {
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

  .seo-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .seo-hero-sub {
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

  /* Right-Side Google SERP & Rank Tracker Mockup */
  .seo-monitor-wrap {
    position: relative;
  }

  .seo-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .seo-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .seo-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .seo-dot.red { background: #ff5f56; }
  .seo-dot.yellow { background: #ffbd2e; }
  .seo-dot.green { background: #27c93f; }

  .seo-url-bar {
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

  .seo-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .seo-serp-preview {
    background: rgba(16, 64, 65, 0.5);
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 12px;
    padding: 14px 16px;
    margin-bottom: 14px;
  }

  .seo-serp-url {
    font-size: 11px;
    color: #ADFF1C;
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 4px;
  }

  .seo-serp-title {
    font-size: 14px;
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 4px;
  }

  .seo-serp-snippet {
    font-size: 12px;
    color: #a3c4c0;
    line-height: 1.4;
    margin: 0;
  }

  .seo-metrics-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 12px;
  }

  .seo-metric-box {
    background: rgba(5, 21, 22, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 8px;
    padding: 10px 12px;
  }

  .seo-metric-box span {
    font-size: 11px;
    color: #a3c4c0;
    display: block;
  }

  .seo-metric-box strong {
    font-size: 14px;
    color: #ADFF1C;
  }

  .seo-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .seo-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .seo-floating-badge {
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

  .seo-badge-top {
    top: -16px;
    right: 16px;
  }

  .seo-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .seo-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .seo-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .seo-stat-item span {
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

  .seo-step-card {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .seo-step-card:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  .seo-step-num {
    font-size: 2.2rem;
    font-weight: 800;
    color: #104041;
    line-height: 1;
    margin-bottom: 10px;
  }

  /* Dark CTA banner */
  .seo-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .seo-hero {
      padding: 100px 0 60px;
    }
    .seo-floating-badge {
      display: none;
    }
    .seo-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="seo-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="seo-hero-pill">
          <i class="fa-solid fa-chart-line"></i>
          <span><?= htmlspecialchars($c['flag']) ?> SEO &amp; Organic Ranking Strategy</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="seo-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Drive high-intent buyer traffic, outrank local competitors, and scale revenue with 100% white-hat technical and on-page SEO.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get Free SEO Audit</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20SEO%20services%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Interactive SERP Monitor -->
      <div class="col-lg-5">
        <div class="seo-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="seo-floating-badge seo-badge-top">
            <i class="fa-solid fa-arrow-trend-up" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">+240% Organic Growth</div>
              <div style="font-size:10px; color:#ADFF1C;">Rank #1 Target Positions</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="seo-monitor-card">
            <div class="seo-monitor-header">
              <span class="seo-dot red"></span>
              <span class="seo-dot yellow"></span>
              <span class="seo-dot green"></span>
              <div class="seo-url-bar">google.com/search?q=top+services+in+<?= urlencode(strtolower($c['country_name'])) ?></div>
            </div>

            <div class="seo-monitor-body">
              <div class="seo-serp-preview">
                <div class="seo-serp-url">
                  <i class="fa-brands fa-google"></i>
                  <span>https://nikhilworks.com › <?= htmlspecialchars($page) ?></span>
                </div>
                <div class="seo-serp-title">Top-Ranked Provider in <?= htmlspecialchars($c['country_name']) ?> | Verified #1</div>
                <p class="seo-serp-snippet">High-converting SEO, technical optimization, Core Web Vitals speed &amp; localized ranking campaigns for <?= htmlspecialchars($c['country_name']) ?> businesses.</p>
              </div>

              <div class="seo-metrics-row">
                <div class="seo-metric-box">
                  <span>Target Rank</span>
                  <strong>#1 - #3 on Google</strong>
                </div>
                <div class="seo-metric-box">
                  <span>Audit Score</span>
                  <strong>98/100 Core Vitals</strong>
                </div>
              </div>

              <div class="seo-tech-pills">
                <span class="seo-tech-pill">Technical SEO</span>
                <span class="seo-tech-pill">Schema JSON-LD</span>
                <span class="seo-tech-pill">Keyword Gap</span>
                <span class="seo-tech-pill">Link Building</span>
                <span class="seo-tech-pill">Local Map Pack</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="seo-stats-strip">
              <div class="seo-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Projects Done</span>
              </div>
              <div class="seo-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="seo-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="seo-floating-badge seo-badge-bottom">
            <i class="fa-solid fa-shield-halved" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">100% White-Hat SEO</div>
              <div style="font-size:10px; color:#a3c4c0;">Zero Penalty Risk</div>
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
          <img src="' . $heroImage . '" alt="SEO services for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Proven Ranking Framework</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '
        <div class="mt-4">
          <a href="' . $site . 'contact/" class="btn-service" style="display:inline-block; padding:12px 24px;">Request Free SEO Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Strategic Growth</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">A Full-Funnel Approach, Not Just Keyword Stuffing</h2>
        <p class="text-muted mb-4" style="font-size:1.05rem; line-height:1.65;">Ranking for random high-volume keywords with zero commercial intent is a waste of money. Our SEO process starts with identifying high-converting buyer searches, fixing every technical bottleneck holding your site back, optimizing landing pages, and building domain authority ethically.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="seo-step-card">
              <i class="fa-solid fa-magnifying-glass mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Buyer Intent Targeting</div>
              <p class="text-muted mb-0" style="font-size:12px;">Keywords that convert to real revenue.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="seo-step-card">
              <i class="fa-solid fa-code mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Technical SEO Foundation</div>
              <p class="text-muted mb-0" style="font-size:12px;">Crawlability, speed &amp; Schema markup.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="seo-step-card">
              <i class="fa-solid fa-file-lines mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">On-Page Architecture</div>
              <p class="text-muted mb-0" style="font-size:12px;">Content that matches search intent.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="seo-step-card">
              <i class="fa-solid fa-link mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Quality Authority Links</div>
              <p class="text-muted mb-0" style="font-size:12px;">White-hat editorial link acquisition.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $site . 'assets/img/all-images/service-img2.png" alt="SEO strategy process for ' . htmlspecialchars($c['country_name']) . '" style="width:100%; display:block;">
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
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">End-to-End Ranking Framework</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What Our SEO Service Covers</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">Every technical, structural, and off-page layer that impacts your Google rankings.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Keyword Research &amp; Intent Mapping</h3>
          <p class="service-tagline">RANK FOR TERMS THAT CONVERT</p>
          <p class="service-description">Find the exact phrases your target buyers search in <?= htmlspecialchars($c['country_name']) ?>, prioritizing commercial intent.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Buyer-intent keyword mapping</li>
            <li><i class="fa-solid fa-check"></i> Competitor search gap analysis</li>
            <li><i class="fa-solid fa-check"></i> Low-competition high-ROI terms</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-gears"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Technical SEO &amp; Core Web Vitals</h3>
          <p class="service-tagline">FIX WHAT HOLDS YOU BACK</p>
          <p class="service-description">Fix crawl errors, duplicate content, slow page load speeds, and structured data markup that Google rewards.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Core Web Vitals &amp; PageSpeed tuning</li>
            <li><i class="fa-solid fa-check"></i> Crawlability &amp; indexing audit</li>
            <li><i class="fa-solid fa-check"></i> Schema JSON-LD structured data</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-file-lines"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>On-Page &amp; Content Optimization</h3>
          <p class="service-tagline">CONTENT THAT MATCHES INTENT</p>
          <p class="service-description">Titles, meta descriptions, headings, and landing page content crafted to outrank competing websites.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Meta titles &amp; description rewrites</li>
            <li><i class="fa-solid fa-check"></i> Strategic internal linking structure</li>
            <li><i class="fa-solid fa-check"></i> Single H1 tag hierarchy &amp; density</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-map-location-dot"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Local SEO &amp; Google Map Pack</h3>
          <p class="service-tagline">DOMINATE YOUR CITY &amp; REGION</p>
          <p class="service-description">Google Business Profile optimization, local citations, geo-tagged signals, and regional landing page structure.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Google Business Profile optimization</li>
            <li><i class="fa-solid fa-check"></i> High-authority local citations</li>
            <li><i class="fa-solid fa-check"></i> Location-targeted landing pages</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-link"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>White-Hat Authority Link Building</h3>
          <p class="service-tagline">AUTHORITY, THE RIGHT WAY</p>
          <p class="service-description">Earn genuine high-DR backlinks from niche-relevant websites to build sustainable domain rank authority.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> High-DR editorial backlinks</li>
            <li><i class="fa-solid fa-check"></i> Manual PR &amp; blogger outreach</li>
            <li><i class="fa-solid fa-check"></i> Zero spam / 100% penalty safe</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-chart-line"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Monthly Ranking &amp; Lead Reports</h3>
          <p class="service-tagline">NO VANITY METRICS</p>
          <p class="service-description">Transparent monthly tracking on keyword positions, organic impressions, clicks, and real lead conversions.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Real-time keyword position tracking</li>
            <li><i class="fa-solid fa-check"></i> Google Search Console &amp; GA4 insights</li>
            <li><i class="fa-solid fa-check"></i> Conversion &amp; lead ROI reports</li>
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
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Transparent Execution</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">How We Approach SEO for <?= htmlspecialchars($c['country_name']) ?> Businesses</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="seo-step-card text-center">
          <div class="seo-step-num">01</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Comprehensive Audit</h4>
          <p class="text-muted small mb-0">Deep crawl analysis of current technical health, backlink profile &amp; keyword rankings.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="seo-step-card text-center">
          <div class="seo-step-num">02</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Roadmap &amp; Strategy</h4>
          <p class="text-muted small mb-0">Prioritized 90-day action plan with clear deliverables priced transparently in <?= htmlspecialchars($c['currency']) ?>.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="seo-step-card text-center">
          <div class="seo-step-num">03</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Execution &amp; Fixes</h4>
          <p class="text-muted small mb-0">On-page upgrades, speed optimizations, Schema markup rollout, and white-hat outreach.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="seo-step-card text-center">
          <div class="seo-step-num">04</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Rank &amp; Scale</h4>
          <p class="text-muted small mb-0">Monthly keyword tracking, continuous ranking improvements &amp; scaling organic traffic.</p>
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
      <p class="text-muted">Everything you need to know about SEO rankings in <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="seoFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#seo<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="seo<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#seoFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoBonus" style="font-weight:700; color:#104041;">
                Do you also handle website maintenance alongside SEO?
              </button>
            </h3>
            <div id="seoBonus" class="accordion-collapse collapse" data-bs-parent="#seoFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Yes — technical SEO and site health work hand-in-hand. We also offer dedicated <a href="<?= $site . $maintenanceLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">website maintenance &amp; care plans</a> to keep your site 100% secure, backed up, and updated.
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
    <div class="seo-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Ready to Outrank Competitors in <?= htmlspecialchars($c['country_name']) ?>?</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        Get a complimentary technical SEO audit with prioritized action items. No obligations. Detailed strategy delivered within 24-48 hours.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get Free SEO Audit</span>
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
