<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-ads-cities.php';
$pages = include __DIR__ . '/data/services-ads.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-ads-content.php';
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
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'ads') : null) ?? ($site . 'assets/img/all-images/service-img11.png');
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
  'serviceType' => 'Google and Meta Ads Management',
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

  .ads-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .ads-hero-pill {
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

  .ads-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .ads-hero-sub {
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
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
  }
  .btn-lime:hover {
    background: #c3ff4f;
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(173, 255, 28, 0.35);
  }

  .btn-outline-glass {
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff !important;
    border: 1px solid rgba(255, 255, 255, 0.25);
    font-weight: 600;
    padding: 14px 28px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
    backdrop-filter: blur(8px);
  }
  .btn-outline-glass:hover {
    background: rgba(255, 255, 255, 0.18);
    border-color: rgba(255, 255, 255, 0.5);
    color: #ffffff !important;
    transform: translateY(-2px);
  }

  .ads-badge-group {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 25px;
  }
  .ads-badge-item {
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 13px;
    color: #d1e7e4;
    display: inline-flex;
    align-items: center;
    gap: 7px;
  }
  .ads-badge-item i {
    color: #ADFF1C;
  }

  /* ADS MOCKUP CARD */
  .ads-mockup-card {
    background: #0d2829;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.45);
    position: relative;
    overflow: hidden;
  }
  .ads-mockup-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, #ADFF1C, #104041, #ADFF1C);
  }
  .ads-mockup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    margin-bottom: 15px;
  }
  .ads-kpi-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
  }
  .ads-kpi-box {
    background: rgba(16, 64, 65, 0.4);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 10px;
    padding: 12px;
  }
  .ads-kpi-label {
    font-size: 11px;
    color: #9cb5b4;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
  }
  .ads-kpi-val {
    font-size: 20px;
    font-weight: 800;
    color: #ffffff;
    display: flex;
    align-items: baseline;
    gap: 6px;
  }
  .ads-kpi-delta {
    font-size: 11px;
    color: #ADFF1C;
    font-weight: 700;
  }

  .ads-channel-row {
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.07);
    border-radius: 8px;
    padding: 10px 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
  }

  /* SERVICE CARDS */
  .service-card-modern {
    background: #ffffff;
    border-radius: 16px;
    border: 1px solid #e1eceb;
    padding: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    transition: all 0.35s ease;
    box-shadow: 0 10px 30px rgba(16, 64, 65, 0.04);
  }
  .service-card-modern:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 45px rgba(16, 64, 65, 0.12);
    border-color: #ADFF1C;
  }
  .service-icon-box {
    width: 56px;
    height: 56px;
    border-radius: 12px;
    background: rgba(16, 64, 65, 0.08);
    color: #104041;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 20px;
    transition: all 0.3s ease;
  }
  .service-card-modern:hover .service-icon-box {
    background: #104041;
    color: #ADFF1C;
  }

  /* DARK CTA BANNER */
  .ads-cta-banner {
    background: radial-gradient(circle at 90% 10%, rgba(173, 255, 28, 0.15) 0%, transparent 40%),
                linear-gradient(135deg, #051617 0%, #104041 100%);
    padding: 85px 0;
    color: #ffffff;
    text-align: center;
    border-radius: 24px;
    margin: 40px 0;
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!-- HERO SECTION -->
<section class="ads-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-7">
        <div class="ads-hero-pill">
          <i class="fa-solid fa-bullseye"></i> High-ROI Paid Traffic & Lead Generation
        </div>
        <h1><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="ads-hero-sub"><?= htmlspecialchars($c['hero_sub']) ?></p>
        
        <div class="d-flex flex-wrap gap-3">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get an Ads Strategy Call</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-glass">
            <span>View Case Studies</span>
          </a>
        </div>

        <div class="ads-badge-group">
          <div class="ads-badge-item">
            <i class="fa-solid fa-chart-line"></i> <strong>4.8x</strong> Avg Client ROAS
          </div>
          <div class="ads-badge-item">
            <i class="fa-solid fa-filter-circle-dollar"></i> <strong>-38%</strong> Lower Cost Per Lead
          </div>
          <div class="ads-badge-item">
            <i class="fa-solid fa-shield-halved"></i> <strong>Zero</strong> Ad Spend Waste
          </div>
        </div>

        <div class="mt-4">
          <?= $isHub ? render_remote_badges() : '' ?>
        </div>
      </div>

      <div class="col-lg-5">
        <div class="ads-mockup-card">
          <div class="ads-mockup-header">
            <div class="d-flex align-items-center gap-2">
              <span style="width:10px;height:10px;background:#ADFF1C;border-radius:50%;display:inline-block;box-shadow:0 0 10px #ADFF1C;"></span>
              <span class="text-white fw-bold" style="font-size:14px;">Ads Performance Hub (Live)</span>
            </div>
            <span class="badge" style="background:rgba(173,255,28,0.15);color:#ADFF1C;border:1px solid rgba(173,255,28,0.3);font-size:11px;">Active Optimization</span>
          </div>

          <div class="ads-kpi-grid">
            <div class="ads-kpi-box">
              <div class="ads-kpi-label">Return on Ad Spend</div>
              <div class="ads-kpi-val">4.82x <span class="ads-kpi-delta">+34%</span></div>
            </div>
            <div class="ads-kpi-box">
              <div class="ads-kpi-label">Cost Per Qualified Lead</div>
              <div class="ads-kpi-val"><?= htmlspecialchars($c['currency'] ?? '$') ?>34.50 <span class="ads-kpi-delta">-28%</span></div>
            </div>
            <div class="ads-kpi-box">
              <div class="ads-kpi-label">High Intent Conversions</div>
              <div class="ads-kpi-val">342 <span class="ads-kpi-delta">+52%</span></div>
            </div>
            <div class="ads-kpi-box">
              <div class="ads-kpi-label">Click-Through Rate</div>
              <div class="ads-kpi-val">6.18% <span class="ads-kpi-delta">+2.4%</span></div>
            </div>
          </div>

          <div class="mb-3">
            <div class="ads-channel-row">
              <div class="d-flex align-items-center gap-2">
                <i class="fa-brands fa-google text-warning"></i>
                <span class="text-white" style="font-size:13px;">Google Search (High Intent)</span>
              </div>
              <span style="color:#ADFF1C;font-size:12px;font-weight:700;">5.4x ROAS</span>
            </div>
            <div class="ads-channel-row">
              <div class="d-flex align-items-center gap-2">
                <i class="fa-brands fa-meta text-info"></i>
                <span class="text-white" style="font-size:13px;">Meta Retargeting & Lookalikes</span>
              </div>
              <span style="color:#ADFF1C;font-size:12px;font-weight:700;">4.4x ROAS</span>
            </div>
          </div>

          <div class="p-2 rounded text-center" style="background:rgba(255,255,255,0.06);font-size:12px;color:#c0dedb;">
            <i class="fa-solid fa-circle-check text-success me-1"></i> Conversion API & Server-side tracking 100% synced
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INTRO & COMPARISON SECTION -->
<?php
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 order-lg-2">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);border:1px solid rgba(16,64,65,0.1);">
          <img src="' . $heroImage . '" alt="Google and Meta ads management for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">PROVEN AD FRAMEWORK</div>
        <h2 class="fw-bold mb-3" style="color:#0f2d2e;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem;line-height:1.7;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">STRATEGIC CHANNEL SELECTION</div>
        <h2 class="fw-bold mb-3" style="color:#0f2d2e;">Google Ads or Meta Ads — Which Do You Need?</h2>
        <p class="text-muted mb-4" style="line-height:1.7;">We run the platform that actually fits how your customers buy, not just the one everyone talks about. Google Ads captures people actively searching for what you sell, right when they\'re ready to buy. Meta Ads reaches the right audience with targeting and creative before they\'re even searching. Many businesses need both, working together.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2 p-2 rounded" style="background:#fff;border:1px solid #e1eceb;">
              <i class="fa-brands fa-google text-warning mt-1"></i>
              <span style="font-weight:600;font-size:14px;color:#0f2d2e;">Google Ads (Search & Shopping)</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2 p-2 rounded" style="background:#fff;border:1px solid #e1eceb;">
              <i class="fa-brands fa-meta text-info mt-1"></i>
              <span style="font-weight:600;font-size:14px;color:#0f2d2e;">Meta Ads (FB & Instagram)</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2 p-2 rounded" style="background:#fff;border:1px solid #e1eceb;">
              <i class="fa-solid fa-users text-primary mt-1"></i>
              <span style="font-weight:600;font-size:14px;color:#0f2d2e;">Precise Audience Retargeting</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2 p-2 rounded" style="background:#fff;border:1px solid #e1eceb;">
              <i class="fa-solid fa-chart-pie text-success mt-1"></i>
              <span style="font-weight:600;font-size:14px;color:#0f2d2e;">Transparent Live Reporting</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);border:1px solid rgba(16,64,65,0.1);">
          <img src="' . $site . 'assets/img/all-images/service-img12.png" alt="Ad campaign performance dashboard for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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

<!-- WHAT'S INCLUDED SECTION -->
<section class="py-5" style="background:#f8fbfb;">
  <div class="container">
    <div class="text-center mb-5">
      <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">END-TO-END MANAGEMENT</div>
      <h2 class="fw-bold" style="color:#0f2d2e;">Everything Included in Your Campaign</h2>
      <p class="text-muted" style="max-width:600px;margin:0 auto;">From creative production to negative keyword hygiene and landing page tuning.</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-sliders"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">Campaign Setup</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">BUILT RIGHT FROM DAY ONE</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Account structure, audience research, negative keyword filters, and conversion tracking configured correctly from the start.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> Clean account structure setup</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Server-side conversion tracking</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> In-depth audience research</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-pen-nib"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">Ad Creative & Copy</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">STOPS THE SCROLL</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Ad copy, high-impact graphics, and scroll-stopping creative variants engineered to earn the click, not just the impression.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> High-converting copywriting</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Custom static & banner assets</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Multi-variant testing sets</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-users"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">Audience Targeting</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">SPEND ON PEOPLE WHO BUY</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Precise demographic, geographic, and intent-based targeting so budget goes strictly toward people who convert.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> Intent & demographic filtering</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Custom retargeting funnels</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> High-value lookalike cohorts</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-flask"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">A/B Testing</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">LOWER COST PER LEAD OVER TIME</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Continuous systematic split testing of hooks, copy, calls-to-action, and bidding strategies to progressively lower CAC.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> Creative hook split testing</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Audience segment testing</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Weekly bid adjustments</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-arrow-right-to-bracket"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">Landing Page Alignment</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">CLICKS THAT ACTUALLY CONVERT</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Landing pages matched to user ad intent so paid traffic converts into leads instead of bouncing off generic homepages.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> Message match audit</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Fast loading speed alignment</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> CRO-optimized form triggers</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card-modern">
          <div class="service-icon-box"><i class="fa-solid fa-chart-pie"></i></div>
          <h4 class="fw-bold mb-2" style="color:#0f2d2e;">Transparent Reporting</h4>
          <div class="text-uppercase fw-bold mb-3" style="font-size:11px;color:#104041;letter-spacing:0.5px;">NO VANITY IMPRESSIONS</div>
          <p class="text-muted mb-4" style="font-size:14px;line-height:1.6;">Spend, cost per lead, ROAS, and net pipeline value reported monthly in plain English with zero hidden markup.</p>
          <ul class="list-unstyled mb-4 mt-auto" style="font-size:14px;line-height:1.9;">
            <li><i class="fa-solid fa-check text-success me-2"></i> Live 24/7 dashboard access</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> Exact cost-per-lead tracking</li>
            <li><i class="fa-solid fa-check text-success me-2"></i> 100% direct ad account ownership</li>
          </ul>
          <a href="<?= $site ?>contact/" class="btn btn-outline-dark w-100 py-2 fw-bold" style="border-radius:8px;">Get Strategy Call</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <div class="badge px-3 py-2 rounded-pill mb-2" style="background:rgba(16,64,65,0.08);color:#104041;font-weight:700;">TRANSPARENT ANSWERS</div>
      <h2 class="fw-bold" style="color:#0f2d2e;">Frequently Asked Questions</h2>
      <p class="text-muted">Clear answers about budgets, expectations, and reporting.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="adsFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#ads<?= $i ?>" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="ads<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#adsFaq">
              <div class="accordion-body" style="color:#557273;line-height:1.7;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border:1px solid #e1eceb;border-radius:12px;overflow:hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#adsBonus" style="font-weight:700;color:#0f2d2e;background:#fcfdfe;">
                Do you also build the landing pages the ads point to?
              </button>
            </h3>
            <div id="adsBonus" class="accordion-collapse collapse" data-bs-parent="#adsFaq">
              <div class="accordion-body" style="color:#557273;line-height:1.7;">
                Yes — we can build dedicated high-converting <a href="<?= $site ?>website-redesign-usa/" style="color:#104041;font-weight:600;">landing pages</a> matched to your ad campaigns, or review and optimize your existing pages to maximize conversion rate.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA BANNER -->
<div class="container">
  <div class="ads-cta-banner">
    <div class="container px-4">
      <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(173,255,28,0.15);color:#ADFF1C;font-weight:700;">START SCALING REVENUE</div>
      <h2 class="text-white fw-bold mb-3" style="font-size:clamp(1.8rem, 3.5vw, 2.6rem);">Start Getting Qualified Leads From <?= htmlspecialchars($c['country_name']) ?> Today</h2>
      <p class="text-light mb-4" style="font-size:1.15rem;max-width:650px;margin:0 auto;color:#d1e7e4 !important;">Management fee from <?= htmlspecialchars($c['price_range']) ?>. Book a free 30-minute ads audit & strategy roadmap before committing.</p>
      <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get an Ads Strategy Call</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="<?= $site ?>portfolio/" class="btn-outline-glass">
          <span>See Our Proven Results</span>
        </a>
      </div>
    </div>
  </div>
</div>

<?= $isHub ? render_hub_crosslinks($site, $c['schema_country'], $page . '/') : '' ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
