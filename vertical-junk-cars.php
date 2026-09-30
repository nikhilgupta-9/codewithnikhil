<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/verticals-junk-cars.php';
$content = include __DIR__ . '/data/verticals-junk-cars-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = hub_image_url($site, 'verticals', 'junk-cars-' . hub_country_slug($c['schema_country'])) ?? ($site . 'assets/img/all-images/service-img14.png');
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
  'serviceType' => 'Junk Car Website Design',
  'provider' => [
    '@type' => 'ProfessionalService',
    'name' => 'NikhilWorks',
    'url' => 'https://nikhilworks.com',
    'logo' => 'https://nikhilworks.com/assets/img/logo/preloader4.png',
    'image' => 'https://nikhilworks.com/assets/img/preview.png',
    'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']
  ],
  'areaServed' => ['@type' => 'Country', 'name' => $c['country_name']],
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

  .tech-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.6) 0%, transparent 50%),
                linear-gradient(135deg, #06191a 0%, #104041 60%, #030e0e 100%);
    padding: 135px 0 95px;
    overflow: hidden;
    color: #fff;
  }
  .tech-grid-bg {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(173, 255, 28, 0.04) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(173, 255, 28, 0.04) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
    opacity: 0.8;
  }
  .tech-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(16, 64, 65, 0.85);
    border: 1px solid rgba(173, 255, 28, 0.4);
    padding: 8px 20px;
    border-radius: 999px;
    color: var(--nw-accent);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 22px;
    box-shadow: 0 0 20px rgba(173, 255, 28, 0.15);
  }
  .tech-ping {
    width: 9px;
    height: 9px;
    background: var(--nw-accent);
    border-radius: 50%;
    position: relative;
    box-shadow: 0 0 10px var(--nw-accent);
    animation: pingDot 2s infinite ease-in-out;
  }
  @keyframes pingDot {
    0% { transform: scale(0.9); opacity: 0.8; }
    50% { transform: scale(1.3); opacity: 1; filter: drop-shadow(0 0 6px #ADFF1C); }
    100% { transform: scale(0.9); opacity: 0.8; }
  }
  .tech-hero-title {
    font-size: 3.2rem;
    font-weight: 800;
    line-height: 1.18;
    color: #FFFFFF;
    margin-bottom: 22px;
  }
  .tech-hero-sub {
    font-size: 1.22rem;
    line-height: 1.65;
    color: #D6EBEB;
    max-width: 680px;
    margin-bottom: 32px;
  }
  .tech-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--nw-accent);
    color: #072223;
    font-weight: 700;
    padding: 15px 34px;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 10px 25px rgba(173, 255, 28, 0.3);
  }
  .tech-btn-primary:hover {
    background: #c2ff4d;
    color: #072223;
    transform: translateY(-3px);
    box-shadow: 0 14px 35px rgba(173, 255, 28, 0.45);
  }
  .tech-btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.22);
    color: #FFFFFF;
    font-weight: 600;
    padding: 15px 30px;
    border-radius: 12px;
    text-decoration: none;
    backdrop-filter: blur(12px);
    transition: all 0.3s ease;
  }
  .tech-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.18);
    color: #FFFFFF;
    border-color: #FFFFFF;
    transform: translateY(-3px);
  }

  .tech-visual-card {
    position: relative;
    border-radius: 26px;
    background: rgba(16, 64, 65, 0.4);
    border: 1px solid rgba(173, 255, 28, 0.3);
    padding: 18px;
    backdrop-filter: blur(18px);
    box-shadow: 0 30px 70px rgba(0, 0, 0, 0.45);
  }
  .tech-img-frame {
    border-radius: 20px;
    overflow: hidden;
    position: relative;
  }
  .tech-img-frame img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.6s ease;
  }
  .tech-visual-card:hover .tech-img-frame img {
    transform: scale(1.04);
  }
  .tech-floating-tag {
    position: absolute;
    bottom: -15px;
    left: 25px;
    background: #082223;
    border: 1px solid rgba(173, 255, 28, 0.4);
    padding: 12px 22px;
    border-radius: 14px;
    color: #FFFFFF;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
    z-index: 3;
  }
  .tech-stats-bar {
    background: rgba(16, 64, 65, 0.65);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 18px;
    padding: 22px 28px;
    margin-top: 25px;
    display: flex;
    justify-content: space-around;
    text-align: center;
    backdrop-filter: blur(10px);
  }
  .tech-stat-unit strong {
    font-size: 2rem;
    font-weight: 800;
    color: var(--nw-accent);
    display: block;
    line-height: 1;
  }
  .tech-stat-unit span {
    font-size: 0.85rem;
    color: #D6EBEB;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-top: 5px;
    display: block;
  }

  .vertical-intro {
    padding: 95px 0;
    background: #F7FAFA;
  }
  .vertical-card {
    background: #FFFFFF;
    border: 1px solid #E5EFEF;
    border-radius: 20px;
    padding: 35px 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.35s ease;
    box-shadow: 0 6px 20px rgba(16, 64, 65, 0.05);
  }
  .vertical-card:hover {
    transform: translateY(-8px);
    border-color: var(--nw-accent);
    box-shadow: 0 20px 40px rgba(16, 64, 65, 0.12);
  }
  .vertical-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: rgba(16, 64, 65, 0.07);
    color: var(--nw-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 22px;
  }
  .vertical-card:hover .vertical-icon {
    background: var(--nw-primary);
    color: var(--nw-accent);
  }

  .vertical-faq-item {
    background: #FFFFFF;
    border: 1px solid #E2EDED;
    border-radius: 16px;
    margin-bottom: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  .vertical-faq-btn {
    width: 100%;
    text-align: left;
    padding: 22px 25px;
    background: none;
    border: none;
    font-weight: 700;
    font-size: 1.1rem;
    color: var(--nw-text-dark);
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
  }
  .vertical-faq-content {
    padding: 0 25px 22px;
    color: var(--nw-text-muted);
    line-height: 1.7;
  }

  @media (max-width: 991px) {
    .tech-hero { padding: 95px 0 65px; text-align: center; }
    .tech-hero-title { font-size: 2.3rem; }
    .tech-hero-sub { margin-left: auto; margin-right: auto; }
    .tech-visual-card { margin-top: 35px; }
  }
</style>
</head>
<body class="homepage4-body">

<?php include_once "includes/header.php" ?>

<!--===== HIGH-TECH HERO SECTION =====-->
<section class="tech-hero">
  <div class="tech-grid-bg"></div>
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center">
      <div class="col-lg-7" data-aos="fade-right">
        <div class="tech-badge">
          <span class="tech-ping"></span>
          <span><?= htmlspecialchars($c['flag']) ?> Auto Recycling &amp; Junk Car Funnel Specialist</span>
        </div>
        <h1 class="tech-hero-title"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="tech-hero-sub"><?= htmlspecialchars($c['hero_sub']) ?></p>
        
        <div class="d-flex flex-wrap gap-3 align-items-center">
          <a href="<?= $site ?>contact/" class="tech-btn-primary">
            <span>Get Quote &amp; Funnel Demo</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="tech-btn-secondary">
            <span>View Auto Portals</span>
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
          </a>
        </div>
        
        <div class="mt-4 pt-2">
          <?= render_remote_badges() ?>
        </div>
      </div>

      <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
        <div class="tech-visual-card">
          <div class="tech-img-frame">
            <img src="<?= $heroImage ?>" alt="Junk car website design for <?= htmlspecialchars($c['country_name']) ?>">
          </div>
          <div class="tech-floating-tag">
            <i class="fa-solid fa-calculator text-success" style="font-size: 1.5rem;"></i>
            <div>
              <strong style="font-size: 0.95rem; display:block;">Instant VIN &amp; Price Quote Form</strong>
              <small style="color: #ADFF1C;">Auto Dispatch &amp; SMS Routing</small>
            </div>
          </div>
        </div>

        <div class="tech-stats-bar">
          <div class="tech-stat-unit">
            <strong><?= $projectCount ?>+</strong>
            <span>Sites Shipped</span>
          </div>
          <div class="tech-stat-unit border-start border-end border-secondary border-opacity-25 px-3">
            <strong><?= $yearsExperience ?>+</strong>
            <span>Years Exp</span>
          </div>
          <div class="tech-stat-unit">
            <strong><?= $avgRating ?>★</strong>
            <span>Client Rating</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== INTRO & VALUE PROPOSITION =====-->
<section class="vertical-intro">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>" data-aos="fade-up">
        <div style="border-radius:24px;overflow:hidden;box-shadow:0 25px 60px rgba(16,64,65,0.15); border: 2px solid rgba(16,64,65,0.08);">
          <img src="<?= $heroImage ?>" alt="Junk car website design for <?= htmlspecialchars($c['country_name']) ?>" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>" data-aos="fade-up" data-aos-delay="100">
        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">High-Conversion Lead Engines</span>
        <h2 class="fw-bold my-3" style="color: var(--nw-text-dark); font-size: 2.2rem; line-height: 1.3;">
          <?= htmlspecialchars($u['intro_heading']) ?>
        </h2>
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.7;"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- SERVICES TILES -->
    <div class="text-center mb-5 mt-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">High-Impact Architecture</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Essential Features for Cash-For-Cars &amp; Scrap Yards</h2>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="vertical-card">
          <div>
            <div class="vertical-icon"><i class="fa-solid fa-car-burst"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Instant Quote Calculator</h3>
            <p class="text-muted my-3">Step-by-step vehicle valuation form with automatic mileage, damage rating, and zip code pricing algorithms.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Real-time SMS &amp; Email Dispatch</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Photo Upload Support</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> 2-Step Mobile Checkout</li>
            </ul>
          </div>
          <a href="<?= $site ?>contact/" class="tech-btn-primary justify-content-center text-center">
            <span>Get Started</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="vertical-card">
          <div>
            <div class="vertical-icon"><i class="fa-solid fa-truck-pickup"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Dispatch &amp; Tow Scheduling</h3>
            <p class="text-muted my-3">Allow car sellers to select pick-up dates and time slots with automated driver routing and job tracking.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Multi-City Service Radius</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Automated Tow Driver Notifications</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> CRM Lead Capture</li>
            </ul>
          </div>
          <a href="<?= $site ?>contact/" class="tech-btn-primary justify-content-center text-center">
            <span>Get Started</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="vertical-card">
          <div>
            <div class="vertical-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Hyper-Local 'Cash For Cars' SEO</h3>
            <p class="text-muted my-3">Dominate local search queries for every suburb, county, and metro area in <?= htmlspecialchars($c['country_name']) ?>.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Dynamic City Landing Pages</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> AutoRepair &amp; Salvage Schema</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Google Ads / PPC Landing Pages</li>
            </ul>
          </div>
          <a href="<?= $site ?>service/search-engine-optimization/" class="tech-btn-primary justify-content-center text-center">
            <span>Explore SEO</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== FAQ SECTION =====-->
<section class="py-5" style="background: #FFFFFF;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Answers to Common Questions</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Junk Car Website Design FAQs</h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <?php foreach ($u['faqs'] as $idx => $faq): ?>
        <div class="vertical-faq-item">
          <button class="vertical-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faqJunk<?= $idx ?>" aria-expanded="<?= $idx === 0 ? 'true' : 'false' ?>">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <i class="fa-solid fa-chevron-down ms-2" style="font-size: 0.9rem;"></i>
          </button>
          <div id="faqJunk<?= $idx ?>" class="collapse <?= $idx === 0 ? 'show' : '' ?>">
            <div class="vertical-faq-content">
              <?= htmlspecialchars($faq['a']) ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!--===== REGIONAL CROSSLINKS =====-->
<?php if (function_exists('render_hub_crosslinks') && !empty($c['schema_country'])): ?>
<section class="py-4" style="background: #F4F8F8;">
  <div class="container">
    <?= render_hub_crosslinks($site, $c['schema_country'], $c['canonical'], 'verticals') ?>
  </div>
</section>
<?php endif; ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
