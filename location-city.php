<?php
include_once "config/connect.php";
include_once "util/function.php";

$slug = $_GET['slug'] ?? 'web-developer-noida';

$pages = include __DIR__ . '/data/locations-cities.php';
$content = include __DIR__ . '/data/locations-cities-content.php';

if (!isset($pages[$slug]) || !isset($content[$slug])) {
  include_once "404.php";
  exit;
}

$c = $pages[$slug];
$u = $content[$slug];
$contact = contact_us();
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

$heroImage = $site . 'assets/img/all-images/about-img6.png';
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
  '@type' => 'ProfessionalService',
  'name' => 'NikhilWorks',
  'url' => 'https://nikhilworks.com',
  'logo' => 'https://nikhilworks.com/assets/img/logo/preloader4.png',
  'image' => 'https://nikhilworks.com/assets/img/preview.png',
  'description' => $c['description'],
  'address' => [
    '@type' => 'PostalAddress',
    'addressLocality' => $c['schema_city'],
    'addressRegion' => $c['schema_region'],
    'addressCountry' => $c['schema_country'],
  ],
  'geo' => ['@type' => 'GeoCoordinates', 'latitude' => $c['lat'], 'longitude' => $c['lng']],
  'areaServed' => $c['city_name'],
  'priceRange' => '₹₹',
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
  ], $u['faqs'] ?? []),
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

  .loc-hero {
    position: relative;
    background: radial-gradient(circle at 75% 25%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.7) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }
  .loc-grid-overlay {
    position: absolute;
    inset: 0;
    background-image: linear-gradient(rgba(173, 255, 28, 0.04) 1px, transparent 1px),
                      linear-gradient(90deg, rgba(173, 255, 28, 0.04) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
    opacity: 0.85;
  }
  .loc-badge {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(16, 64, 65, 0.8);
    border: 1px solid rgba(173, 255, 28, 0.45);
    padding: 8px 20px;
    border-radius: 999px;
    color: var(--nw-accent);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 22px;
    box-shadow: 0 0 20px rgba(173, 255, 28, 0.15);
  }
  .loc-ping {
    width: 8px;
    height: 8px;
    background: var(--nw-accent);
    border-radius: 50%;
    box-shadow: 0 0 10px var(--nw-accent);
    animation: pingPulse 2s infinite ease-in-out;
  }
  @keyframes pingPulse {
    0% { transform: scale(0.9); opacity: 0.8; }
    50% { transform: scale(1.35); opacity: 1; filter: drop-shadow(0 0 6px #ADFF1C); }
    100% { transform: scale(0.9); opacity: 0.8; }
  }
  .loc-hero-title {
    font-size: 3.2rem;
    font-weight: 800;
    line-height: 1.18;
    color: #FFFFFF;
    margin-bottom: 20px;
  }
  .loc-hero-sub {
    font-size: 1.2rem;
    line-height: 1.65;
    color: #D6EBEB;
    max-width: 650px;
    margin-bottom: 32px;
  }
  .loc-btn-primary {
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
  .loc-btn-primary:hover {
    background: #c3ff4f;
    color: #072223;
    transform: translateY(-3px);
    box-shadow: 0 14px 35px rgba(173, 255, 28, 0.45);
  }
  .loc-btn-secondary {
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
  .loc-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.18);
    color: #FFFFFF;
    border-color: #FFFFFF;
    transform: translateY(-3px);
  }

  /* HIGH TECH DEVELOPER MOCKUP CARD */
  .hero-mockup-wrapper {
    position: relative;
    border-radius: 24px;
    background: rgba(16, 64, 65, 0.45);
    border: 1px solid rgba(173, 255, 28, 0.3);
    padding: 16px;
    backdrop-filter: blur(16px);
    box-shadow: 0 30px 70px rgba(0, 0, 0, 0.5);
  }
  .mockup-window-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 12px 14px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    margin-bottom: 12px;
  }
  .window-dots {
    display: flex;
    gap: 6px;
  }
  .window-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
  }
  .dot-red { background: #FF5F56; }
  .dot-yellow { background: #FFBD2E; }
  .dot-green { background: #27C93F; }
  .window-url-bar {
    background: rgba(0, 0, 0, 0.35);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 6px;
    padding: 3px 14px;
    font-size: 11px;
    color: #A3C9CA;
    font-family: monospace;
  }
  .mockup-media-container {
    border-radius: 16px;
    overflow: hidden;
    position: relative;
    max-height: 250px;
  }
  .mockup-media-container img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    display: block;
    transition: transform 0.6s ease;
  }
  .hero-mockup-wrapper:hover .mockup-media-container img {
    transform: scale(1.04);
  }

  .float-badge-speed {
    position: absolute;
    top: 14px;
    right: 14px;
    background: rgba(8, 34, 35, 0.92);
    border: 1px solid rgba(173, 255, 28, 0.45);
    padding: 8px 14px;
    border-radius: 12px;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    z-index: 2;
  }
  .float-badge-trust {
    position: absolute;
    bottom: 14px;
    left: 14px;
    background: rgba(8, 34, 35, 0.92);
    border: 1px solid rgba(173, 255, 28, 0.45);
    padding: 8px 14px;
    border-radius: 12px;
    color: #FFFFFF;
    font-size: 12px;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.4);
    z-index: 2;
  }

  .tech-pills-bar {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-top: 14px;
  }
  .tech-pill {
    background: rgba(16, 64, 65, 0.6);
    border: 1px solid rgba(173, 255, 28, 0.2);
    padding: 5px 12px;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 600;
    color: #D6EBEB;
    display: inline-flex;
    align-items: center;
    gap: 5px;
  }
  .tech-pill i {
    color: var(--nw-accent);
  }

  .hero-stats-strip {
    background: rgba(16, 64, 65, 0.65);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 16px;
    padding: 16px 20px;
    margin-top: 16px;
    display: flex;
    justify-content: space-around;
    text-align: center;
    backdrop-filter: blur(10px);
  }
  .hero-stat-box strong {
    font-size: 1.6rem;
    font-weight: 800;
    color: var(--nw-accent);
    display: block;
    line-height: 1;
  }
  .hero-stat-box span {
    font-size: 0.78rem;
    color: #D6EBEB;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 4px;
    display: block;
  }

  /* Intro Section */
  .loc-intro-section {
    padding: 90px 0;
    background: #F7FAFA;
  }
  .loc-feature-chip {
    background: #FFFFFF;
    border: 1px solid #E2EDED;
    border-radius: 12px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 4px 12px rgba(16, 64, 65, 0.04);
    transition: all 0.3s ease;
  }
  .loc-feature-chip:hover {
    border-color: var(--nw-primary);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(16, 64, 65, 0.08);
  }
  .loc-feature-chip i {
    color: var(--nw-primary);
    font-size: 1.25rem;
    width: 28px;
    text-align: center;
  }

  .loc-service-card {
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
  .loc-service-card:hover {
    transform: translateY(-8px);
    border-color: var(--nw-accent);
    box-shadow: 0 20px 40px rgba(16, 64, 65, 0.12);
  }
  .loc-service-icon {
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
  .loc-service-card:hover .loc-service-icon {
    background: var(--nw-primary);
    color: var(--nw-accent);
  }

  .loc-faq-item {
    background: #FFFFFF;
    border: 1px solid #E2EDED;
    border-radius: 16px;
    margin-bottom: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
  }
  .loc-faq-item:hover {
    border-color: var(--nw-primary);
  }
  .loc-faq-btn {
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
  .loc-faq-content {
    padding: 0 25px 22px;
    color: var(--nw-text-muted);
    line-height: 1.7;
    font-size: 1rem;
  }

  @media (max-width: 991px) {
    .loc-hero { padding: 90px 0 60px; text-align: center; }
    .loc-hero-title { font-size: 2.3rem; }
    .loc-hero-sub { margin-left: auto; margin-right: auto; }
    .hero-mockup-wrapper { margin-top: 35px; }
  }
</style>
</head>
<body class="homepage4-body">

<?php include_once "includes/header.php" ?>

<!--===== HIGH-TECH HERO SECTION =====-->
<section class="loc-hero">
  <div class="loc-grid-overlay"></div>
  <div class="container position-relative" style="z-index: 2;">
    <div class="row align-items-center">
      
      <!-- Left Column -->
      <div class="col-lg-7" data-aos="fade-right">
        <div class="loc-badge">
          <span class="loc-ping"></span>
          <span>Serving <?= htmlspecialchars($c['city_name']) ?></span>
        </div>
        <h1 class="loc-hero-title"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="loc-hero-sub"><?= htmlspecialchars($c['hero_sub']) ?></p>
        
        <div class="d-flex flex-wrap gap-3 align-items-center">
          <a href="<?= $site ?>contact/" class="loc-btn-primary">
            <span>Get Free Quote</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="loc-btn-secondary">
            <span>Explore Portfolio</span>
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
          </a>
        </div>
        
        <div class="mt-4 pt-2 d-flex flex-wrap gap-4">
          <div><strong class="text-white"><i class="fa-solid fa-bolt text-warning me-2"></i>Speed Optimized</strong><br><small class="text-light opacity-75">Sub-second load times</small></div>
          <div><strong class="text-white"><i class="fa-solid fa-chart-line text-warning me-2"></i>Top Google Rankings</strong><br><small class="text-light opacity-75">Local Search Domination</small></div>
          <div><strong class="text-white"><i class="fa-solid fa-lock text-warning me-2"></i>100% Security</strong><br><small class="text-light opacity-75">Clean &amp; Protected Code</small></div>
        </div>
      </div>

      <!-- Right Column: Visual Mockup Showcase -->
      <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
        <div class="hero-mockup-wrapper">
          <div class="mockup-window-header">
            <div class="window-dots">
              <span class="window-dot dot-red"></span>
              <span class="window-dot dot-yellow"></span>
              <span class="window-dot dot-green"></span>
            </div>
            <div class="window-url-bar">https://nikhilworks.com/<?= htmlspecialchars($slug) ?>/</div>
          </div>

          <div class="mockup-media-container">
            <img src="<?= $heroImage ?>" alt="Web development project in <?= htmlspecialchars($c['city_name']) ?>">
            
            <div class="float-badge-speed">
              <i class="fa-solid fa-bolt text-warning"></i>
              <span>99/100 PageSpeed</span>
            </div>

            <div class="float-badge-trust">
              <i class="fa-solid fa-shield-check text-success"></i>
              <span>100% Code Ownership</span>
            </div>
          </div>

          <!-- Tech Stack Tags -->
          <div class="tech-pills-bar">
            <span class="tech-pill"><i class="fa-brands fa-php"></i> Custom PHP</span>
            <span class="tech-pill"><i class="fa-brands fa-wordpress"></i> WordPress</span>
            <span class="tech-pill"><i class="fa-brands fa-react"></i> React / JS</span>
            <span class="tech-pill"><i class="fa-solid fa-database"></i> MySQL</span>
            <span class="tech-pill"><i class="fa-solid fa-chart-line"></i> Local SEO</span>
          </div>

          <!-- Integrated Stats Strip -->
          <div class="hero-stats-strip">
            <div class="hero-stat-box">
              <strong><?= $projectCount ?>+</strong>
              <span>Projects</span>
            </div>
            <div class="hero-stat-box border-start border-end border-secondary border-opacity-25 px-3">
              <strong><?= $yearsExperience ?>+</strong>
              <span>Years Exp</span>
            </div>
            <div class="hero-stat-box">
              <strong><?= $avgRating ?>★</strong>
              <span>Rating</span>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--===== INTRO SHOWCASE SECTION =====-->
<section class="loc-intro-section">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>" data-aos="fade-up">
        <div style="border-radius:24px;overflow:hidden;box-shadow:0 25px 60px rgba(16,64,65,0.15); border: 2px solid rgba(16,64,65,0.08);">
          <img src="<?= $heroImage ?>" alt="Web developer in <?= htmlspecialchars($c['city_name']) ?>" style="width:100%;display:block;">
        </div>
      </div>

      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>" data-aos="fade-up" data-aos-delay="100">
        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Local Digital Excellence</span>
        <h2 class="fw-bold my-3" style="color: var(--nw-text-dark); font-size: 2.2rem; line-height: 1.3;">
          <?= htmlspecialchars($u['intro_heading']) ?>
        </h2>
        
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.7;"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>

        <div class="row g-3 mt-3">
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-wallet"></i>
              <strong>Save 60-70% on Cost</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-comments"></i>
              <strong>Direct Communication</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-award"></i>
              <strong><?= $projectCount ?>+ Real Projects</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-headset"></i>
              <strong>Post-Launch Support</strong>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SERVICES TILES -->
    <div class="text-center mb-5 mt-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Solutions</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Services Offered in <?= htmlspecialchars($c['city_name']) ?></h2>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="loc-service-card">
          <div>
            <div class="loc-service-icon"><i class="fa-solid fa-code"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Custom Website Design</h3>
            <p class="text-muted my-3">Modern, blazing-fast responsive websites tailored to your brand identity and business goals.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Custom HTML5 / PHP</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Lightning Fast Speeds</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> SEO Ready Code</li>
            </ul>
          </div>
          <a href="<?= $site ?>service/website-design-development/" class="loc-btn-primary justify-content-center text-center">
            <span>Learn More</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="loc-service-card">
          <div>
            <div class="loc-service-icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Local &amp; Global SEO</h3>
            <p class="text-muted my-3">Target high-intent buyer keywords and dominate search engine results across <?= htmlspecialchars($c['city_name']) ?>.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Keyword &amp; Competitor Audit</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Google Map Pack Ranking</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Schema &amp; Rich Snippets</li>
            </ul>
          </div>
          <a href="<?= $site ?>service/search-engine-optimization/" class="loc-btn-primary justify-content-center text-center">
            <span>Explore SEO</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="loc-service-card">
          <div>
            <div class="loc-service-icon"><i class="fa-solid fa-cart-shopping"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">E-Commerce Stores</h3>
            <p class="text-muted my-3">Scalable online storefronts with integrated payment systems, automated invoices, and CRM tracking.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Secure Payment Processing</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Mobile-Optimized Cart</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Customer Management</li>
            </ul>
          </div>
          <a href="<?= $site ?>service/e-commerce-website-development/" class="loc-btn-primary justify-content-center text-center">
            <span>View E-Commerce</span> <i class="fa-solid fa-arrow-right"></i>
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
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Got Questions?</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Frequently Asked Questions for <?= htmlspecialchars($c['city_name']) ?></h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <?php foreach ($u['faqs'] as $idx => $faq): ?>
        <div class="loc-faq-item">
          <button class="loc-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faqCity<?= $idx ?>" aria-expanded="<?= $idx === 0 ? 'true' : 'false' ?>">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <i class="fa-solid fa-chevron-down ms-2" style="font-size: 0.9rem;"></i>
          </button>
          <div id="faqCity<?= $idx ?>" class="collapse <?= $idx === 0 ? 'show' : '' ?>">
            <div class="loc-faq-content">
              <?= htmlspecialchars($faq['a']) ?>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
