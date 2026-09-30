<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-crm-cities.php';
$pages = include __DIR__ . '/data/services-crm.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-crm-content.php';
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
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'crm') : null) ?? ($site . 'assets/img/all-images/about-img6.png');
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
  'serviceType' => 'CRM Development',
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
  'mainEntity' => array_map(fn($faq) => [
    '@type' => 'Question',
    'name' => $faq['q'],
    'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
  ], $u['faqs']),
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

  .crm-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .crm-hero-pill {
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

  .crm-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .crm-hero-sub {
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

  /* Right-Side Interactive CRM Pipeline Mockup */
  .crm-monitor-wrap {
    position: relative;
  }

  .crm-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .crm-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .crm-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .crm-dot.red { background: #ff5f56; }
  .crm-dot.yellow { background: #ffbd2e; }
  .crm-dot.green { background: #27c93f; }

  .crm-url-bar {
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

  .crm-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .crm-pipeline-row {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 8px;
    margin-bottom: 14px;
  }

  .crm-stage-card {
    background: rgba(16, 64, 65, 0.4);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 10px;
    padding: 10px;
    text-align: center;
  }

  .crm-stage-card .stage-name {
    font-size: 10px;
    color: #a3c4c0;
    text-transform: uppercase;
    font-weight: 700;
  }

  .crm-stage-card .stage-count {
    font-size: 16px;
    font-weight: 800;
    color: #ADFF1C;
    margin: 4px 0;
  }

  .crm-stage-card .stage-val {
    font-size: 10px;
    color: #ffffff;
  }

  .crm-lead-preview {
    background: rgba(5, 21, 22, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 8px;
    padding: 10px 12px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 8px;
  }

  .crm-lead-name {
    font-size: 12px;
    font-weight: 700;
    color: #ffffff;
  }

  .crm-lead-sub {
    font-size: 10px;
    color: #a3c4c0;
  }

  .crm-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .crm-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .crm-floating-badge {
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

  .crm-badge-top {
    top: -16px;
    right: 16px;
  }

  .crm-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .crm-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .crm-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .crm-stat-item span {
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

  .crm-step-card {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .crm-step-card:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  .crm-step-num {
    font-size: 2.2rem;
    font-weight: 800;
    color: #104041;
    line-height: 1;
    margin-bottom: 10px;
  }

  /* Dark CTA banner */
  .crm-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .crm-hero {
      padding: 100px 0 60px;
    }
    .crm-floating-badge {
      display: none;
    }
    .crm-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="crm-hero" style="position: relative; overflow: hidden;">
  <div class="loc-grid-overlay"></div>
  <div class="container" style="position: relative; z-index: 2;">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="crm-hero-pill">
          <i class="fa-solid fa-diagram-project"></i>
          <span><?= htmlspecialchars($c['flag']) ?> Custom CRM &amp; Pipeline Automation</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="crm-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Eliminate recurring per-user SaaS license fees with tailored CRM software that maps 100% to your sales and lead management workflow.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get Free CRM Proposal</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20custom%20CRM%20development%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Interactive CRM Pipeline Mockup -->
      <div class="col-lg-5">
        <div class="crm-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="crm-floating-badge crm-badge-top">
            <i class="fa-solid fa-bolt" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">No Per-Seat Monthly Fees</div>
              <div style="font-size:10px; color:#ADFF1C;">100% Code &amp; Data Ownership</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="crm-monitor-card">
            <div class="crm-monitor-header">
              <span class="crm-dot red"></span>
              <span class="crm-dot yellow"></span>
              <span class="crm-dot green"></span>
              <div class="crm-url-bar">https://nikhilworks.com/crm-dashboard/<?= htmlspecialchars($page) ?></div>
            </div>

            <div class="crm-monitor-body">
              <div class="crm-pipeline-row">
                <div class="crm-stage-card">
                  <div class="stage-name">Qualified</div>
                  <div class="stage-count">24</div>
                  <div class="stage-val">Active</div>
                </div>
                <div class="crm-stage-card" style="border-color: #ADFF1C;">
                  <div class="stage-name" style="color:#ADFF1C;">Proposal</div>
                  <div class="stage-count">12</div>
                  <div class="stage-val">Follow-up</div>
                </div>
                <div class="crm-stage-card">
                  <div class="stage-name">Closed Won</div>
                  <div class="stage-count" style="color:#27c93f;">18</div>
                  <div class="stage-val">Converted</div>
                </div>
              </div>

              <div class="crm-lead-preview">
                <div>
                  <div class="crm-lead-name">Apex Global Logistics</div>
                  <div class="crm-lead-sub">WhatsApp Auto-Followup Sent • 2m ago</div>
                </div>
                <span style="color:#ADFF1C; font-weight:700; font-size:12px;">Hot Deal</span>
              </div>

              <div class="crm-lead-preview">
                <div>
                  <div class="crm-lead-name">Medix Healthcare Group</div>
                  <div class="crm-lead-sub">Custom Invoice Auto-Generated</div>
                </div>
                <span style="color:#27c93f; font-weight:700; font-size:12px;">Won</span>
              </div>

              <div class="crm-tech-pills">
                <span class="crm-tech-pill">PHP 8.x</span>
                <span class="crm-tech-pill">MySQL</span>
                <span class="crm-tech-pill">REST APIs</span>
                <span class="crm-tech-pill">WhatsApp Bot</span>
                <span class="crm-tech-pill">Webhook Sync</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="crm-stats-strip">
              <div class="crm-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Projects Done</span>
              </div>
              <div class="crm-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="crm-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="crm-floating-badge crm-badge-bottom">
            <i class="fa-solid fa-lock" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Self-Hosted &amp; Secure</div>
              <div style="font-size:10px; color:#a3c4c0;">Full Database Control</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!--===== HERO AREA ENDS =======-->

<section class="py-5<?= $u['layout'] === 'B' ? ' bg-light' : '' ?>">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="<?= $heroImage ?>" alt="Custom CRM development for <?= htmlspecialchars($c['country_name']) ?> businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Custom Sales Engineering</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;"><?= htmlspecialchars($u['intro_heading']) ?></h2>
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
        <div class="row g-3 mt-2">
          <div class="col-6">
            <div class="crm-step-card">
              <i class="fa-solid fa-diagram-project mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Matches Your Sales Process</div>
              <p class="text-muted mb-0" style="font-size:12px;">Built to mirror exactly how you close deals.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="crm-step-card">
              <i class="fa-solid fa-link mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Connects to Your Stack</div>
              <p class="text-muted mb-0" style="font-size:12px;">Payment gateways, WhatsApp &amp; ERP integrations.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="crm-step-card">
              <i class="fa-solid fa-sack-dollar mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Zero Per-Seat License Fees</div>
              <p class="text-muted mb-0" style="font-size:12px;">Add 10 or 1,000 team members without extra costs.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="crm-step-card">
              <i class="fa-solid fa-database mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">100% Data Ownership</div>
              <p class="text-muted mb-0" style="font-size:12px;">Your sensitive customer database stays strictly yours.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== SERVICES INCLUDED GRID =======-->
<section class="py-5" style="background: #fbfdfc;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Complete Solution Modules</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What's Included in Your Custom CRM</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">Everything needed to run lead capture, pipeline follow-ups, and automated sales reporting.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-layer-group"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Custom CRM Build</h3>
          <p class="service-tagline">BUILT AROUND YOUR PROCESS</p>
          <p class="service-description">Lead capture, pipeline stages, contact management and reporting built around how you actually sell.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom pipeline stages</li>
            <li><i class="fa-solid fa-check"></i> Contact &amp; deal tracking</li>
            <li><i class="fa-solid fa-check"></i> Built-in reporting</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-puzzle-piece"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>HubSpot / Zoho Customization</h3>
          <p class="service-tagline">EXTEND WHAT YOU ALREADY USE</p>
          <p class="service-description">Custom modules, custom fields, webhook automations, and third-party integrations for existing CRMs.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom modules &amp; fields</li>
            <li><i class="fa-solid fa-check"></i> Third-party API integrations</li>
            <li><i class="fa-solid fa-check"></i> Workflow automation rules</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-file-import"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Data Migration &amp; Cleansing</h3>
          <p class="service-tagline">NO LOST RECORDS</p>
          <p class="service-description">Clean migration from spreadsheets, legacy databases, or old SaaS platforms, verified record by record.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Spreadsheet/CSV data mapping</li>
            <li><i class="fa-solid fa-check"></i> Legacy CRM database migration</li>
            <li><i class="fa-solid fa-check"></i> Strict validation &amp; deduplication</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-robot"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Workflow Automation</h3>
          <p class="service-tagline">NOTHING FALLS THROUGH</p>
          <p class="service-description">Automatic follow-up reminders, instant WhatsApp lead notifications, and deal status triggers on autopilot.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Automated follow-up reminders</li>
            <li><i class="fa-solid fa-check"></i> Dynamic lead round-robin</li>
            <li><i class="fa-solid fa-check"></i> WhatsApp &amp; Email triggers</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-chart-line"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Dashboards &amp; Reporting</h3>
          <p class="service-tagline">ACTIONABLE SALES VISIBILITY</p>
          <p class="service-description">Real-time pipeline value, conversion rates, sales executive performance, and forecast revenue charts.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Pipeline value tracking</li>
            <li><i class="fa-solid fa-check"></i> Conversion rate breakdown</li>
            <li><i class="fa-solid fa-check"></i> Team activity &amp; closure metrics</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-shield-halved"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Ongoing Support &amp; Evolution</h3>
          <p class="service-tagline">GROWS WITH YOUR TEAM</p>
          <p class="service-description">Direct developer access for new module builds, API updates, and tweaks as your business scales.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Dedicated developer support</li>
            <li><i class="fa-solid fa-check"></i> Fast module feature additions</li>
            <li><i class="fa-solid fa-check"></i> Security &amp; database optimization</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote <i class="fa-solid fa-arrow-right ms-1"></i></a>
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
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Structured Delivery</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">How We Build Your Custom CRM</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="crm-step-card text-center">
          <div class="crm-step-num">01</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Map Your Process</h4>
          <p class="text-muted small mb-0">We document how your team actually sells, stage by stage, without generic fluff.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="crm-step-card text-center">
          <div class="crm-step-num">02</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Fixed Proposal</h4>
          <p class="text-muted small mb-0">A transparent fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="crm-step-card text-center">
          <div class="crm-step-num">03</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Build &amp; Integrate</h4>
          <p class="text-muted small mb-0">Agile development with regular interactive check-ins and a working demo before launch.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="crm-step-card text-center">
          <div class="crm-step-num">04</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Train &amp; Launch</h4>
          <p class="text-muted small mb-0">Team onboarding, data migration, and comprehensive go-live support.</p>
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
      <p class="text-muted">Everything you need to know about custom CRM development for <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="crmFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#crmfaq<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="crmfaq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#crmFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crmMaint" style="font-weight:700; color:#104041;">
                Do you also handle ongoing support after the CRM launches?
              </button>
            </h3>
            <div id="crmMaint" class="accordion-collapse collapse" data-bs-parent="#crmFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Yes, through our <a href="<?= $site . $maintenanceLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">website &amp; app maintenance plans</a> if you'd like ongoing coverage for your CRM system alongside your main web properties.
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
    <div class="crm-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Let's Build a CRM Your <?= htmlspecialchars($c['country_name']) ?> Team Will Love Using</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        No recurring per-user fees. Transparent quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours. Let's discuss your sales pipeline.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Start Your CRM Project</span>
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
