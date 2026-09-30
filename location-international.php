<?php
include_once "config/connect.php";
include_once "util/function.php";

$page = $_GET['page'] ?? 'hire-freelance-web-developer';

$pages = include __DIR__ . '/data/locations-international.php';

if (!isset($pages[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$contact = contact_us();
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

include_once "includes/hub-crosslinks.php";
$heroImage = hub_image_url($site, 'locations', hub_country_slug($c['schema_country'])) ?? ($site . 'assets/img/all-images/about-img6.png');
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
  'serviceType' => 'Web Development',
  'provider' => [
    '@type' => 'ProfessionalService',
    'name' => 'NikhilWorks',
    'url' => 'https://nikhilworks.com',
    'logo' => 'https://nikhilworks.com/assets/img/logo/preloader4.png',
    'image' => 'https://nikhilworks.com/assets/img/preview.png',
    'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN'],
  ],
  'areaServed' => ['@type' => 'Country', 'name' => $c['city_name']],
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
  ], $c['faqs'] ?? []),
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

  /* HIGH-TECH HERO SECTION */
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
  .loc-hero-title span.highlight {
    background: linear-gradient(135deg, #FFFFFF 20%, #ADFF1C 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
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

  /* Interactive Floating Badges */
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

  /* Tech Stack Pills Bar */
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

  /* Compact Hero Stats Strip */
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
  .loc-why-card {
    background: #FFFFFF;
    border: 1px solid #E5EFEF;
    border-radius: 20px;
    padding: 35px 28px;
    height: 100%;
    transition: all 0.3s ease;
    box-shadow: 0 6px 20px rgba(16, 64, 65, 0.05);
  }
  .loc-why-card:hover {
    transform: translateY(-6px);
    border-color: var(--nw-accent);
    box-shadow: 0 18px 36px rgba(16, 64, 65, 0.12);
  }
  .loc-why-icon {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    background: rgba(16, 64, 65, 0.08);
    color: var(--nw-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 20px;
  }

  /* Services Grid */
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

  /* FAQ Accordion */
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
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7" data-aos="fade-right">
        <div class="loc-badge">
          <span class="loc-ping"></span>
          <span><?= htmlspecialchars($c['flag']) ?> Available for <?= htmlspecialchars($c['city_name']) ?> Clients</span>
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
          <div><strong class="text-white"><i class="fa-solid fa-globe text-warning me-2"></i>Remote-First</strong><br><small class="text-light opacity-75">Smooth Global Collaboration</small></div>
          <div><strong class="text-white"><i class="fa-solid fa-bolt text-warning me-2"></i>Fast Delivery</strong><br><small class="text-light opacity-75">7-21 Day Turnaround</small></div>
          <div><strong class="text-white"><i class="fa-solid fa-clock text-warning me-2"></i>Timezone Friendly</strong><br><small class="text-light opacity-75">Flexible Overlapping Hours</small></div>
        </div>
      </div>

      <!-- Right Column: High-Tech Interactive Visual Showcase -->
      <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
        <div class="hero-mockup-wrapper">
          <div class="mockup-window-header">
            <div class="window-dots">
              <span class="window-dot dot-red"></span>
              <span class="window-dot dot-yellow"></span>
              <span class="window-dot dot-green"></span>
            </div>
            <div class="window-url-bar">https://nikhilworks.com/<?= htmlspecialchars($page) ?>/</div>
          </div>

          <div class="mockup-media-container">
            <img src="<?= $heroImage ?>" alt="Web development project for <?= htmlspecialchars($c['city_name']) ?>">
            
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
            <span class="tech-pill"><i class="fa-solid fa-chart-line"></i> Top SEO</span>
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
      <div class="col-lg-6<?= $c['layout'] === 'B' ? ' order-lg-2' : '' ?>" data-aos="fade-up">
        <div class="loc-img-wrapper" style="border-radius:24px;overflow:hidden;box-shadow:0 25px 60px rgba(16,64,65,0.15); border: 2px solid rgba(16,64,65,0.08);">
          <img src="<?= $heroImage ?>" alt="Web developer for businesses in <?= htmlspecialchars($c['city_name']) ?>" style="width:100%;display:block;">
        </div>
      </div>

      <div class="col-lg-6<?= $c['layout'] === 'B' ? ' order-lg-1' : '' ?>" data-aos="fade-up" data-aos-delay="100">
        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Why International Brands Choose Us</span>
        <h2 class="fw-bold my-3" style="color: var(--nw-text-dark); font-size: 2.2rem; line-height: 1.3;">
          <?= htmlspecialchars($c['intro_heading']) ?>
        </h2>
        
        <?php foreach ($c['intro'] as $para): ?>
        <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.7;"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- WHY HIRE CARDS -->
    <div class="text-center mb-5 mt-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">The Strategic Advantage</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Why Hire a Freelance Developer for <?= htmlspecialchars($c['city_name']) ?>?</h2>
    </div>

    <div class="row g-4">
      <div class="col-md-4" data-aos="fade-up">
        <div class="loc-why-card">
          <div class="loc-why-icon"><i class="fa-solid fa-piggy-bank"></i></div>
          <h3 class="h5 fw-bold" style="color: var(--nw-text-dark);">Save 60-70% on Costs</h3>
          <p class="text-muted mt-2">Get Silicon Valley / London agency standard quality at highly competitive rates without paying for agency office overheads or account manager salaries.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="loc-why-card">
          <div class="loc-why-icon"><i class="fa-solid fa-comments"></i></div>
          <h3 class="h5 fw-bold" style="color: var(--nw-text-dark);">Direct Communication</h3>
          <p class="text-muted mt-2">No account managers or bureaucratic ticket queues. Speak directly with Nikhil Gupta via WhatsApp, Google Meet, Zoom, or Slack for rapid decisions.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="loc-why-card">
          <div class="loc-why-icon"><i class="fa-solid fa-bolt"></i></div>
          <h3 class="h5 fw-bold" style="color: var(--nw-text-dark);">Agile Sprints &amp; Fast Delivery</h3>
          <p class="text-muted mt-2">Websites delivered in <strong>3–7 days</strong> and custom applications in <strong>2–3 weeks</strong>. Work proceeds without red tape delays.</p>
        </div>
      </div>
    </div>

    <!-- FREELANCER VS AGENCY COMPARISON MATRIX -->
    <div class="mt-5 pt-3" data-aos="fade-up">
      <div class="text-center mb-4">
        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Honest Comparison</span>
        <h3 class="fw-bold mt-1" style="color: var(--nw-text-dark);">Freelance Developer (NikhilWorks) vs Traditional Agency</h3>
      </div>

      <div class="table-responsive" style="background:#ffffff;border-radius:18px;border:1px solid #e1eceb;overflow:hidden;box-shadow:0 10px 30px rgba(16,64,65,0.05);">
        <table class="table mb-0" style="font-size:14.5px;">
          <thead style="background:#082223;color:#ffffff;">
            <tr>
              <th class="py-3 px-4" style="width:30%;">Key Aspect</th>
              <th class="py-3 px-4" style="color:#ADFF1C;width:35%;">NikhilWorks (Freelance Engineer)</th>
              <th class="py-3 px-4" style="color:#adb5bd;width:35%;">Traditional Agency</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-3 px-4"><strong>Cost &amp; Billing</strong></td>
              <td class="py-3 px-4" style="color:#104041;font-weight:700;"><i class="fa-solid fa-check text-success me-1"></i> Fixed Milestone or $15-$45/hr (60-70% lower)</td>
              <td class="py-3 px-4 text-muted"><i class="fa-solid fa-xmark text-danger me-1"></i> $100-$250/hr with heavy overhead markup</td>
            </tr>
            <tr>
              <td class="py-3 px-4"><strong>Communication</strong></td>
              <td class="py-3 px-4" style="color:#104041;font-weight:700;"><i class="fa-solid fa-check text-success me-1"></i> Direct 1-on-1 with Nikhil via WhatsApp / Zoom</td>
              <td class="py-3 px-4 text-muted"><i class="fa-solid fa-xmark text-danger me-1"></i> Filtered through account managers &amp; ticket queues</td>
            </tr>
            <tr>
              <td class="py-3 px-4"><strong>Speed &amp; Agility</strong></td>
              <td class="py-3 px-4" style="color:#104041;font-weight:700;"><i class="fa-solid fa-check text-success me-1"></i> Rapid 3–14 days turnaround per sprint</td>
              <td class="py-3 px-4 text-muted"><i class="fa-solid fa-xmark text-danger me-1"></i> 6–12 weeks average project timeline</td>
            </tr>
            <tr>
              <td class="py-3 px-4"><strong>Working Flexibility</strong></td>
              <td class="py-3 px-4" style="color:#104041;font-weight:700;"><i class="fa-solid fa-check text-success me-1"></i> Flexible hours overlapping with your timezone</td>
              <td class="py-3 px-4 text-muted"><i class="fa-solid fa-xmark text-danger me-1"></i> Rigid 9-to-5 working boundaries</td>
            </tr>
            <tr>
              <td class="py-3 px-4"><strong>Code Ownership</strong></td>
              <td class="py-3 px-4" style="color:#104041;font-weight:700;"><i class="fa-solid fa-check text-success me-1"></i> 100% IP rights &amp; Git repository ownership</td>
              <td class="py-3 px-4 text-muted"><i class="fa-solid fa-xmark text-danger me-1"></i> Proprietary lock-ins or recurring license fees</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>

<!--===== FLEXIBLE ENGAGEMENT MODELS =====-->
<section class="py-5" style="background: #ffffff;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Flexible Collaboration</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Choose Your Preferred Working Model</h2>
      <p class="text-muted" style="max-width:650px;margin:0 auto;">Whether you have a well-defined project scope or need ongoing agile sprints, I adapt to your business needs.</p>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="loc-service-card">
          <div>
            <div class="loc-why-icon"><i class="fa-solid fa-bullseye"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Fixed-Price Project</h3>
            <p class="text-muted my-3">Ideal for websites, portals, and defined web applications. Scope, milestone deliverables, and budget are locked upfront with zero surprise invoices.</p>
            <ul class="list-unstyled mb-4" style="font-size:14px;color:#557273;line-height:1.9;">
              <li><i class="fa-solid fa-check text-success me-2"></i> Clearly defined milestone scope</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Guaranteed delivery deadlines</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> 30-Day post-launch warranty</li>
            </ul>
          </div>
          <a href="<?= $site ?>contact/" class="loc-btn-primary justify-content-center text-center">
            <span>Get Fixed Scope Quote</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="loc-service-card" style="border-color:#ADFF1C;box-shadow:0 12px 35px rgba(16,64,65,0.08);">
          <div>
            <div class="loc-why-icon" style="background:#104041;color:#ADFF1C;"><i class="fa-solid fa-clock"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Hourly On-Demand</h3>
            <p class="text-muted my-3">Best for ongoing enhancements, bug fixing, API integration, and speed tuning. Transparent time-tracking with weekly or bi-weekly invoices.</p>
            <ul class="list-unstyled mb-4" style="font-size:14px;color:#557273;line-height:1.9;">
              <li><i class="fa-solid fa-check text-success me-2"></i> $15 – $45 / hour</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Pay only for actual coding hours</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Cancel or pause anytime</li>
            </ul>
          </div>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20Hourly%20Freelance%20Development%20support." target="_blank" rel="noopener" class="loc-btn-primary justify-content-center text-center">
            <span>Book Hourly Support</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="loc-service-card">
          <div>
            <div class="loc-why-icon"><i class="fa-solid fa-handshake"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Dedicated Monthly Retainer</h3>
            <p class="text-muted my-3">Dedicated full-stack developer capacity (20 to 40 hrs/week) exclusively for your business. Perfect for fast-growing startups and agencies needing white-label dev.</p>
            <ul class="list-unstyled mb-4" style="font-size:14px;color:#557273;line-height:1.9;">
              <li><i class="fa-solid fa-check text-success me-2"></i> Guaranteed weekly availability</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Daily standup &amp; Slack integration</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Priority turnaround for urgent tasks</li>
            </ul>
          </div>
          <a href="<?= $site ?>contact/" class="loc-btn-primary justify-content-center text-center">
            <span>Hire Dedicated Dev</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== SERVICES SECTION =====-->
<?php
$servicesList = $c['services'] ?? [
  [
    'name' => 'Custom Website Design & Development',
    'desc' => 'High-performance, bespoke websites tailored for ' . htmlspecialchars($c['city_name']) . ' businesses with clean code, fast load times, and SEO foundations.',
    'link' => 'service/website-design-development/'
  ],
  [
    'name' => 'Full-Stack Web Applications & CRM',
    'desc' => 'Scalable custom PHP/MySQL and React platforms with automated workflows, customer dashboards, and API integrations.',
    'link' => 'service/custom-php-development-/'
  ],
  [
    'name' => 'Search Engine Optimization (SEO)',
    'desc' => 'Technical, On-Page, and conversion-focused SEO to boost organic search rankings across ' . htmlspecialchars($c['city_name']) . ' search queries.',
    'link' => 'service/search-engine-optimization/'
  ]
];
$faqsHeading = $c['faqs_heading'] ?? ('Frequently Asked Questions for ' . htmlspecialchars($c['city_name']));
$faqsList = $c['faqs'] ?? [];
?>
<section class="py-5" style="background: #F8FBFB;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">What We Offer</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Core Development Capabilities</h2>
    </div>

    <div class="row g-4">
      <?php foreach ($servicesList as $idx => $s): 
        $targetLink = str_starts_with($s['link'], 'http') ? $s['link'] : ($site . ltrim($s['link'], '/'));
      ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
        <div class="loc-service-card">
          <div>
            <div class="loc-why-icon"><i class="fa-solid fa-code"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);"><?= htmlspecialchars($s['name']) ?></h3>
            <p class="text-muted my-3"><?= htmlspecialchars($s['desc']) ?></p>
          </div>
          <a href="<?= htmlspecialchars($targetLink) ?>" class="loc-btn-primary justify-content-center text-center">
            <span>Learn More</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!--===== FAQ SECTION =====-->
<section class="py-5" style="background: #FFFFFF;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Got Questions?</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);"><?= htmlspecialchars($faqsHeading) ?></h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <?php foreach ($faqsList as $idx => $faq): ?>
        <div class="loc-faq-item">
          <button class="loc-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faqInt<?= $idx ?>" aria-expanded="<?= $idx === 0 ? 'true' : 'false' ?>">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <i class="fa-solid fa-chevron-down ms-2" style="font-size: 0.9rem;"></i>
          </button>
          <div id="faqInt<?= $idx ?>" class="collapse <?= $idx === 0 ? 'show' : '' ?>">
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

<!--===== CTA BANNER =====-->
<div class="container">
  <div style="background:radial-gradient(circle at 90% 10%, rgba(173,255,28,0.16) 0%, transparent 40%), linear-gradient(135deg, #051617 0%, #0d3536 100%);padding:85px 0;color:#ffffff;text-align:center;border-radius:24px;margin:40px 0;">
    <div class="container px-4">
      <div class="badge px-3 py-2 rounded-pill mb-3" style="background:rgba(173,255,28,0.15);color:#ADFF1C;font-weight:700;">START COLLABORATION TODAY</div>
      <h2 class="text-white fw-bold mb-3" style="font-size:clamp(1.8rem, 3.5vw, 2.6rem);">Hire Nikhil Gupta as Your Dedicated Freelance Web Developer</h2>
      <p class="text-light mb-4" style="font-size:1.15rem;max-width:680px;margin:0 auto;color:#d1e7e4 !important;">
        Flexible hours, rapid execution, and direct communication. Get a fixed proposal within 24 hours.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <a href="<?= $site ?>contact/" class="loc-btn-primary">
          <span>Get Free Proposal</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20want%20to%20hire%20you%20as%20a%20freelance%20web%20developer." 
           class="loc-btn-secondary" target="_blank" rel="noopener">
          <i class="fa-brands fa-whatsapp text-success me-1"></i>
          <span>Chat on WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</div>

<!--===== REGIONAL CROSSLINKS =====-->
<?php if (function_exists('render_hub_crosslinks') && !empty($c['schema_country'])): ?>
<section class="py-4" style="background: #F4F8F8;">
  <div class="container">
    <?= render_hub_crosslinks($site, $c['schema_country'], $c['canonical'], 'locations') ?>
  </div>
</section>
<?php endif; ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
