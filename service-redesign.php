<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-redesign-cities.php';
$pages = include __DIR__ . '/data/services-redesign.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-redesign-content.php';
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
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'redesign') : null) ?? ($site . 'assets/img/all-images/service-img2.png');
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
  'serviceType' => 'Website Redesign Services',
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

  .redesign-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .redesign-hero-pill {
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

  .redesign-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .redesign-hero-sub {
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

  /* Right-Side Interactive Redesign Before/After Mockup */
  .redesign-monitor-wrap {
    position: relative;
  }

  .redesign-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .redesign-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .redesign-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .redesign-dot.red { background: #ff5f56; }
  .redesign-dot.yellow { background: #ffbd2e; }
  .redesign-dot.green { background: #27c93f; }

  .redesign-url-bar {
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

  .redesign-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .redesign-compare-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-bottom: 14px;
  }

  .redesign-compare-box {
    background: rgba(5, 21, 22, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 10px;
    padding: 12px;
  }

  .redesign-compare-box.after {
    background: rgba(16, 64, 65, 0.5);
    border-color: rgba(173, 255, 28, 0.35);
  }

  .redesign-compare-box .lbl {
    font-size: 10px;
    text-transform: uppercase;
    font-weight: 700;
    color: #a3c4c0;
    margin-bottom: 4px;
  }

  .redesign-compare-box .score {
    font-size: 18px;
    font-weight: 800;
  }

  .redesign-check-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px dashed rgba(255, 255, 255, 0.08);
    font-size: 13px;
    color: #c4dedb;
  }

  .redesign-check-item:last-child {
    border-bottom: none;
  }

  .redesign-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .redesign-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .redesign-floating-badge {
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

  .redesign-badge-top {
    top: -16px;
    right: 16px;
  }

  .redesign-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .redesign-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .redesign-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .redesign-stat-item span {
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

  .redesign-feature-box {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .redesign-feature-box:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  /* Dark CTA banner */
  .redesign-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .redesign-hero {
      padding: 100px 0 60px;
    }
    .redesign-floating-badge {
      display: none;
    }
    .redesign-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="redesign-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="redesign-hero-pill">
          <i class="fa-solid fa-wand-magic-sparkles"></i>
          <span><?= htmlspecialchars($c['flag']) ?> Modern UI/UX &amp; Conversion Redesign</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="redesign-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Turn your outdated, slow website into a high-converting, modern digital sales engine with zero lost SEO rankings.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get Free Redesign Proposal</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20website%20redesign%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Before vs After Card -->
      <div class="col-lg-5">
        <div class="redesign-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="redesign-floating-badge redesign-badge-top">
            <i class="fa-solid fa-gauge-high" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">⚡ 99/100 Core Web Vitals</div>
              <div style="font-size:10px; color:#ADFF1C;">3x Faster Loading Speed</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="redesign-monitor-card">
            <div class="redesign-monitor-header">
              <span class="redesign-dot red"></span>
              <span class="redesign-dot yellow"></span>
              <span class="redesign-dot green"></span>
              <div class="redesign-url-bar">https://nikhilworks.com/redesign-preview/<?= htmlspecialchars($page) ?></div>
            </div>

            <div class="redesign-monitor-body">
              
              <div class="redesign-compare-row">
                <div class="redesign-compare-box">
                  <div class="lbl">Before Redesign</div>
                  <div class="score" style="color:#ff5f56;">41 / 100</div>
                  <div style="font-size:10px; color:#a3c4c0;">Slow, Cluttered UI</div>
                </div>
                <div class="redesign-compare-box after">
                  <div class="lbl" style="color:#ADFF1C;">After NikhilWorks</div>
                  <div class="score" style="color:#ADFF1C;">98 / 100</div>
                  <div style="font-size:10px; color:#27c93f;">⚡ High-Converting</div>
                </div>
              </div>

              <div class="redesign-check-item">
                <span><i class="fa-solid fa-mobile-screen-button me-2" style="color:#ADFF1C;"></i> Mobile First Experience</span>
                <span style="color:#27c93f; font-weight:600;">100% Fluid</span>
              </div>
              <div class="redesign-check-item">
                <span><i class="fa-solid fa-shield-halved me-2" style="color:#ADFF1C;"></i> SEO Rankings Preservation</span>
                <span style="color:#ADFF1C; font-weight:600;">301 Safe Map</span>
              </div>
              <div class="redesign-check-item">
                <span><i class="fa-solid fa-cart-shopping me-2" style="color:#ADFF1C;"></i> Conversion Rate Lift</span>
                <span style="color:#ADFF1C; font-weight:600;">+185% Leads</span>
              </div>

              <div class="redesign-tech-pills">
                <span class="redesign-tech-pill">Modern UI/UX</span>
                <span class="redesign-tech-pill">Tailwind/Bootstrap</span>
                <span class="redesign-tech-pill">PHP 8.x / React</span>
                <span class="redesign-tech-pill">SEO Retained</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="redesign-stats-strip">
              <div class="redesign-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Redesigns</span>
              </div>
              <div class="redesign-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="redesign-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="redesign-floating-badge redesign-badge-bottom">
            <i class="fa-solid fa-arrow-up-right-dots" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Zero Traffic Drops</div>
              <div style="font-size:10px; color:#a3c4c0;">Guaranteed 301 URL Mapping</div>
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
          <img src="' . $heroImage . '" alt="Website redesign for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Modern Transformation</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '
        <div class="mt-4">
          <a href="' . $site . 'contact/" class="btn-service" style="display:inline-block; padding:12px 24px;">Request Redesign Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Why Modernize Now?</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">Why Most Website Redesigns Go Wrong</h2>
        <p class="text-muted mb-4" style="font-size:1.05rem; line-height:1.65;">Many agencies build pretty mockups but destroy years of established Google search rankings by carelessly changing URL structures and deleting content. We preserve every single organic ranking with strict 301 redirection maps while creating a high-speed, modern UI that converts visitors.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="redesign-feature-box">
              <i class="fa-solid fa-chart-line mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">SEO Rankings Preserved</div>
              <p class="text-muted mb-0" style="font-size:12px;">Zero drops in existing Google organic traffic.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="redesign-feature-box">
              <i class="fa-solid fa-bolt mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Instant Page Load</div>
              <p class="text-muted mb-0" style="font-size:12px;">Lightweight code for 90+ Core Web Vitals.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="redesign-feature-box">
              <i class="fa-solid fa-mobile mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Mobile-First UI</div>
              <p class="text-muted mb-0" style="font-size:12px;">Engineered specifically for smartphone buyers.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="redesign-feature-box">
              <i class="fa-solid fa-filter-circle-dollar mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Conversion Architecture</div>
              <p class="text-muted mb-0" style="font-size:12px;">Strategic call-to-actions that drive real leads.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $site . 'assets/img/all-images/service-img3.png" alt="Website redesign process for ' . htmlspecialchars($c['country_name']) . '" style="width:100%; display:block;">
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

<!--===== WHAT'S INCLUDED IN REDESIGN =======-->
<section class="py-5" style="background: #fbfdfc;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Complete Overhaul</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What Every Redesign Includes</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">Everything needed to transform your brand look, improve user experience, and boost sales conversions.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-palette"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Modern UI/UX Visual Refresh</h3>
          <p class="service-tagline">STAND OUT FROM COMPETITORS</p>
          <p class="service-description">Contemporary aesthetics, clean typography, engaging brand colors, and intuitive layout hierarchy.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom high-tech layout</li>
            <li><i class="fa-solid fa-check"></i> Brand identity refinement</li>
            <li><i class="fa-solid fa-check"></i> Interactive UI components</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-mobile-screen"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Responsive Mobile-First Overhaul</h3>
          <p class="service-tagline">PERFECT ON EVERY SCREEN</p>
          <p class="service-description">Fully fluid responsive design crafted for effortless touch navigation on iPhones, Android, tablets, and desktops.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 100% Touch-friendly navigation</li>
            <li><i class="fa-solid fa-check"></i> Rapid viewport adaptation</li>
            <li><i class="fa-solid fa-check"></i> Cross-browser tested</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-gauge-high"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Core Web Vitals &amp; Speed Boost</h3>
          <p class="service-tagline">LIGHTNING FAST PERFORMANCE</p>
          <p class="service-description">Clean modern code structure, WebP asset optimization, and streamlined caching for sub-second load times.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 90+ Google PageSpeed score</li>
            <li><i class="fa-solid fa-check"></i> Instant interaction feedback</li>
            <li><i class="fa-solid fa-check"></i> Asset and code minification</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>SEO Migration &amp; 301 Protection</h3>
          <p class="service-tagline">ZERO TRAFFIC LOSS GUARANTEE</p>
          <p class="service-description">Exhaustive URL mapping, metadata preservation, and structured schema implementation so rankings stay intact.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Complete 301 redirect map</li>
            <li><i class="fa-solid fa-check"></i> Meta tags &amp; heading hierarchy</li>
            <li><i class="fa-solid fa-check"></i> XML Sitemap update</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-filter-circle-dollar"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Conversion Rate Optimization</h3>
          <p class="service-tagline">DESIGNED TO CAPTURE LEADS</p>
          <p class="service-description">Strategic button placements, prominent WhatsApp &amp; phone CTAs, and frictionless lead forms.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> High-contrast CTA buttons</li>
            <li><i class="fa-solid fa-check"></i> Fast AJAX contact forms</li>
            <li><i class="fa-solid fa-check"></i> Trust proof &amp; review badges</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-code"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Clean CMS / Code Architecture</h3>
          <p class="service-tagline">EASY TO MANAGE &amp; SCALE</p>
          <p class="service-description">Built with modern PHP, WordPress, Laravel, or headless tech — allowing simple content updates without breaking layout.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Intuitive admin dashboard</li>
            <li><i class="fa-solid fa-check"></i> Clean, modular codebase</li>
            <li><i class="fa-solid fa-check"></i> Full code ownership provided</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
      <p class="text-muted">Everything you need to know about website redesign services in <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="redesignFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#rd<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="rd<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#redesignFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rdBonus" style="font-weight:700; color:#104041;">
                Do you also handle ongoing SEO after the redesign launches?
              </button>
            </h3>
            <div id="rdBonus" class="accordion-collapse collapse" data-bs-parent="#redesignFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Yes — once the new website is live with 100% SEO migration safety, we offer ongoing <a href="<?= $site . $seoLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">SEO &amp; keyword promotion services</a> to proactively scale organic traffic.
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
    <div class="redesign-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Ready to Transform Your <?= htmlspecialchars($c['country_name']) ?> Website?</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        Get a complimentary UI/UX &amp; performance audit of your current website. Fixed-price quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get Free Redesign Quote</span>
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
