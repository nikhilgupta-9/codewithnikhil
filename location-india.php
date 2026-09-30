<?php
include_once "config/connect.php";
include_once "util/function.php";

$page = $_GET['page'] ?? 'web-developer-india';
$city = $_GET['city'] ?? 'india';

$pages = include __DIR__ . '/data/locations-india.php';
$content = include __DIR__ . '/data/locations-india-content.php';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$contact = contact_us();
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

$isPriorityHub = in_array($page, ['web-developer-india', 'seo-services-india'], true);
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isPriorityHub ? hub_image_url($site, 'locations', 'india') : null) ?? ($site . 'assets/img/all-images/about-img6.png');
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

  /* Hero Section */
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

  /* Intro Showcase Section */
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

  /* Modern Service Cards */
  .loc-service-card {
    background: #FFFFFF;
    border: 1px solid #E5EFEF;
    border-radius: 20px;
    padding: 35px 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
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
    transition: all 0.3s ease;
  }
  .loc-service-card:hover .loc-service-icon {
    background: var(--nw-primary);
    color: var(--nw-accent);
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
          <i class="fa-solid fa-location-dot"></i>
          <span>Verified Local Presence • <?= htmlspecialchars($c['city_name']) ?></span>
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
        
        <div class="mt-4 pt-2">
          <?= $isPriorityHub ? render_remote_badges() : '' ?>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-left" data-aos-delay="150">
        <div class="loc-stat-card text-center">
          <div class="mb-4">
            <div class="loc-stat-num"><span class="footer-counter"><?= $yearsExperience ?></span>+</div>
            <div class="loc-stat-label">Years of Industry Experience</div>
          </div>
          <div class="mb-4 pt-3 border-top border-secondary border-opacity-25">
            <div class="loc-stat-num"><span class="footer-counter"><?= $projectCount ?></span>+</div>
            <div class="loc-stat-label">Websites &amp; Projects Delivered</div>
          </div>
          <div class="pt-3 border-top border-secondary border-opacity-25">
            <div class="loc-stat-num"><?= $avgRating ?>★</div>
            <div class="loc-stat-label">Average Client Rating</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== INTRO & VALUE PROPOSITION =====-->
<section class="loc-intro-section">
  <div class="container">
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>" data-aos="fade-up">
        <div class="loc-img-wrapper">
          <img src="<?= $heroImage ?>" alt="Web development and SEO in <?= htmlspecialchars($c['city_name']) ?>">
          <div class="loc-floating-pill">
            <i class="fa-solid fa-circle-check text-success" style="font-size: 1.4rem;"></i>
            <div>
              <strong style="font-size: 0.95rem; display:block;">100% Custom Coded</strong>
              <small style="color: #ADFF1C;">Clean, Fast &amp; High-Converting</small>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>" data-aos="fade-up" data-aos-delay="100">
        <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">Local Expertise</span>
        <h2 class="fw-bold my-3" style="color: var(--nw-text-dark); font-size: 2.2rem; line-height: 1.3;">
          <?= htmlspecialchars($u['intro_heading']) ?>
        </h2>
        
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3" style="font-size: 1.05rem; line-height: 1.7;"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>

        <div class="row g-3 mt-3">
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-bolt"></i>
              <strong>90+ PageSpeed Score</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-chart-line"></i>
              <strong>SEO-First Architecture</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-mobile-screen"></i>
              <strong>Mobile-First Responsive</strong>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="loc-feature-chip">
              <i class="fa-solid fa-shield-halved"></i>
              <strong>Direct Developer Support</strong>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SERVICES TILES -->
    <div class="text-center mb-5 mt-5">
      <span class="text-uppercase fw-bold text-muted" style="letter-spacing: 1.5px; font-size: 0.85rem;">What I Deliver</span>
      <h2 class="fw-bold mt-2" style="color: var(--nw-text-dark);">Core Digital Services for <?= htmlspecialchars($c['city_name']) ?></h2>
    </div>

    <div class="row g-4">
      <div class="col-lg-4 col-md-6" data-aos="fade-up">
        <div class="loc-service-card">
          <div>
            <div class="loc-service-icon"><i class="fa-solid fa-code"></i></div>
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Custom Web Development</h3>
            <p class="text-muted my-3">Tailored PHP, MySQL, and full-stack solutions built for speed, responsiveness, and conversion without unnecessary bloat.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Custom Admin Panels</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> API &amp; CRM Integrations</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Clean, Scalable Code</li>
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
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">Search Engine Optimization (SEO)</h3>
            <p class="text-muted my-3">Data-driven On-Page, Technical, and Local SEO strategies to dominate Google search results in <?= htmlspecialchars($c['city_name']) ?>.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Targeted Keyword Research</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Schema JSON-LD &amp; Speed Boost</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Google Business Optimization</li>
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
            <h3 class="h4 fw-bold" style="color: var(--nw-text-dark);">E-Commerce &amp; Portals</h3>
            <p class="text-muted my-3">High-converting online stores and B2B platforms equipped with instant checkout, payment gateways, and inventory controls.</p>
            <ul class="list-unstyled text-muted mb-4">
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Razorpay &amp; Stripe Setup</li>
              <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Automated WhatsApp Alerts</li>
              <li><i class="fa-solid fa-check text-success me-2"></i> Fast &amp; Secure Checkout</li>
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

<!--===== FAQ ACCORDION SECTION =====-->
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
          <button class="loc-faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq<?= $idx ?>" aria-expanded="<?= $idx === 0 ? 'true' : 'false' ?>">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <i class="fa-solid fa-chevron-down ms-2" style="font-size: 0.9rem;"></i>
          </button>
          <div id="faq<?= $idx ?>" class="collapse <?= $idx === 0 ? 'show' : '' ?>">
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

<!--===== BOTTOM REGIONAL CROSSLINKS =====-->
<?php if ($isPriorityHub && function_exists('render_hub_crosslinks')): ?>
<section class="py-4" style="background: #F4F8F8;">
  <div class="container">
    <?= render_hub_crosslinks($site, 'IN', $c['canonical'], 'locations') ?>
  </div>
</section>
<?php endif; ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>