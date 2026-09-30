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
$yearsExperience = years_in_business(2021);
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
  ], $c['faqs']),
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
    background: radial-gradient(circle at 85% 20%, rgba(173, 255, 28, 0.12) 0%, transparent 50%),
                linear-gradient(135deg, #071e1f 0%, #104041 55%, #051617 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }
  .loc-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(173,255,28,0.08) 0%, transparent 70%);
    pointer-events: none;
  }
  .loc-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(173, 255, 28, 0.15);
    border: 1px solid rgba(173, 255, 28, 0.35);
    padding: 7px 18px;
    border-radius: 999px;
    color: var(--nw-accent);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    margin-bottom: 20px;
  }
  .loc-hero-title {
    font-size: 3.1rem;
    font-weight: 800;
    line-height: 1.2;
    color: #FFFFFF;
    margin-bottom: 20px;
  }
  .loc-hero-sub {
    font-size: 1.2rem;
    line-height: 1.6;
    color: #D3E8E8;
    max-width: 680px;
    margin-bottom: 30px;
  }
  .loc-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--nw-accent);
    color: #072223;
    font-weight: 700;
    padding: 14px 32px;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 8px 24px rgba(173, 255, 28, 0.25);
  }
  .loc-btn-primary:hover {
    background: #c3ff4f;
    color: #072223;
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(173, 255, 28, 0.4);
  }
  .loc-btn-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: #FFFFFF;
    font-weight: 600;
    padding: 14px 28px;
    border-radius: 12px;
    text-decoration: none;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
  }
  .loc-btn-secondary:hover {
    background: rgba(255, 255, 255, 0.18);
    color: #FFFFFF;
    border-color: #FFFFFF;
    transform: translateY(-3px);
  }
  .loc-stat-card {
    background: rgba(16, 64, 65, 0.55);
    backdrop-filter: blur(16px);
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 24px;
    padding: 35px 25px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.35);
  }
  .loc-stat-num {
    font-size: 2.8rem;
    font-weight: 800;
    color: var(--nw-accent);
    line-height: 1;
    margin-bottom: 6px;
  }
  .loc-stat-label {
    font-size: 0.95rem;
    color: #D3E8E8;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 600;
  }

  /* Intro Section */
  .loc-intro-section {
    padding: 90px 0;
    background: #F7FAFA;
  }
  .loc-img-wrapper {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(16, 64, 65, 0.15);
    border: 2px solid rgba(16, 64, 65, 0.08);
  }
  .loc-img-wrapper img {
    width: 100%;
    height: auto;
    display: block;
    transition: transform 0.6s ease;
  }
  .loc-img-wrapper:hover img {
    transform: scale(1.03);
  }
  .loc-floating-pill {
    position: absolute;
    bottom: 20px;
    left: 20px;
    background: rgba(16, 64, 65, 0.92);
    backdrop-filter: blur(10px);
    color: #fff;
    padding: 12px 22px;
    border-radius: 16px;
    border: 1px solid rgba(173, 255, 28, 0.4);
    display: flex;
    align-items: center;
    gap: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.3);
  }

  /* Why Hire Card */
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
    .loc-stat-card { margin-top: 30px; }
  }
</style>
</head>
<body class="homepage4-body">

<?php include_once "includes/header.php" ?>

<!--===== HERO SECTION =====-->
<section class="loc-hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8" data-aos="fade-right">
        <div class="loc-badge">
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

      <div class="col-lg-4" data-aos="fade-left" data-aos-delay="150">
        <div class="loc-stat-card text-center">
          <div class="mb-4">
            <div class="loc-stat-num"><span class="footer-counter"><?= $projectCount ?></span>+</div>
            <div class="loc-stat-label">Websites &amp; Projects Delivered</div>
          </div>
          <div class="mb-4 pt-3 border-top border-secondary border-opacity-25">
            <div class="loc-stat-num"><span class="footer-counter"><?= $yearsExperience ?></span>+</div>
            <div class="loc-stat-label">Years of Development Experience</div>
          </div>
          <div class="pt-3 border-top border-secondary border-opacity-25">
            <div class="loc-stat-num"><?= $avgRating ?>★</div>
            <div class="loc-stat-label">Verified Client Satisfaction</div>
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
        <div class="loc-img-wrapper">
          <img src="<?= $heroImage ?>" alt="Web developer for businesses in <?= htmlspecialchars($c['city_name']) ?>">
          <div class="loc-floating-pill">
            <i class="fa-solid fa-shield-halved text-success" style="font-size: 1.4rem;"></i>
            <div>
              <strong style="font-size: 0.95rem; display:block;">Full Code Ownership</strong>
              <small style="color: #ADFF1C;">Direct 1-on-1 Communication</small>
            </div>
          </div>
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
          <p class="text-muted mt-2">Get Silicon Valley / London agency standard quality at highly competitive rates without agency overheads.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="loc-why-card">
          <div class="loc-why-icon"><i class="fa-solid fa-comments"></i></div>
          <h3 class="h5 fw-bold" style="color: var(--nw-text-dark);">Direct Communication</h3>
          <p class="text-muted mt-2">No account managers or middle layers. Speak directly with the developer building your product via Zoom, Google Meet &amp; Slack.</p>
        </div>
      </div>
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="loc-why-card">
          <div class="loc-why-icon"><i class="fa-solid fa-award"></i></div>
          <h3 class="h5 fw-bold" style="color: var(--nw-text-dark);">Proven Global Track Record</h3>
          <p class="text-muted mt-2">Delivered <?= $projectCount ?>+ websites across USA, UK, UAE, Australia, and Canada with an average <?= $avgRating ?>★ client rating.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== SERVICES SECTION =====-->
<section class="py-5" style="background: #FFFFFF;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">What We Offer</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Services Offered in <?= htmlspecialchars($c['city_name']) ?></h2>
    </div>

    <div class="row g-4">
      <?php foreach ($c['services'] as $idx => $s): ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $idx * 100 ?>">
        <div class="loc-service-card">
          <div>
            <div class="loc-why-icon"><i class="fa-solid fa-code"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);"><?= htmlspecialchars($s['name']) ?></h3>
            <p class="text-muted my-3"><?= htmlspecialchars($s['desc']) ?></p>
          </div>
          <a href="<?= $site ?>contact/" class="loc-btn-primary justify-content-center text-center">
            <span>Get Quote</span> <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!--===== FAQ SECTION =====-->
<section class="py-5" style="background: #F7FAFA;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Got Questions?</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);"><?= htmlspecialchars($c['faqs_heading']) ?></h2>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <?php foreach ($c['faqs'] as $idx => $faq): ?>
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
