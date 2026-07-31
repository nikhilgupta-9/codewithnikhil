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
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
$gradient = $c['gradient'] ?? 'linear-gradient(135deg,#1a1a2e,#16213e,#0f3460)';
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
<meta property="og:image" content="https://nikhilworks.com/assets/img/logo/logo.png">
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
</head>
<body class="homepage4-body">

<?php include_once "includes/header.php" ?>

<section style="background:<?= $gradient ?>;padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Available for <?= htmlspecialchars($c['flag']) ?> Clients</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="<?= $site ?>contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free Quote</a>
          <a href="<?= $site ?>portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
        <div class="mt-4 d-flex gap-4">
          <div><span class="text-warning fw-bold">Remote-First</span><br><small class="text-light">Work from anywhere</small></div>
          <div><span class="text-warning fw-bold">Fast Delivery</span><br><small class="text-light">7-21 day turnaround</small></div>
          <div><span class="text-warning fw-bold">Timezone Friendly</span><br><small class="text-light">Flexible availability</small></div>
        </div>
      </div>
      <div class="col-lg-4 text-center mt-4 mt-lg-0">
        <div style="background:rgba(255,255,255,0.1);border-radius:20px;padding:30px;">
          <div class="text-warning" style="font-size:3rem;font-weight:800;"><?= $projectCount ?>+</div><div class="text-white">Projects Done</div>
          <div class="text-warning mt-3" style="font-size:3rem;font-weight:800;"><?= $yearsExperience ?>+</div><div class="text-white">Years Experience</div>
          <?php if ($rating['count'] > 0): ?>
          <div class="text-warning mt-3" style="font-size:2rem;font-weight:800;"><?= $rating['avg'] ?>/5</div><div class="text-white">Client Rating</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
// Section order alternates by 'layout' to avoid every page reading as an identical template shape.
$introSection = '
<section class="py-5' . ($c['layout'] === 'B' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6' . ($c['layout'] === 'B' ? ' order-lg-2' : '') . '">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $heroImage . '" alt="Web developer for businesses in ' . htmlspecialchars($c['city_name']) . '" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6' . ($c['layout'] === 'B' ? ' order-lg-1' : '') . '">
        <h2 class="fw-bold mb-3">' . htmlspecialchars($c['intro_heading']) . '</h2>
        ' . implode('', array_map(fn($p) => '<p class="text-muted mb-3">' . htmlspecialchars($p) . '</p>', $c['intro'])) . '
      </div>
    </div>
  </div>
</section>';

$whyUsSection = '
<section class="py-5' . ($c['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Why Hire a Freelance Developer from India?</h2>
      <p class="text-muted">The smart choice for ' . htmlspecialchars($c['city_name']) . ' businesses</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#128176;</div>
          <h3 class="h5 fw-bold mt-3">Save 60-70% on Cost</h3>
          <p class="text-muted">Get the same quality as local agencies at a fraction of the cost. Indian developer rates are highly competitive.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#127760;</div>
          <h3 class="h5 fw-bold mt-3">Global Communication</h3>
          <p class="text-muted">Fluent in English, experienced working with international clients. Video calls, Slack, email — all covered.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#9989;</div>
          <h3 class="h5 fw-bold mt-3">Proven Track Record</h3>
          <p class="text-muted">' . $projectCount . '+ successful projects delivered' . ($rating['count'] > 0 ? ', averaging ' . $rating['avg'] . '/5 from real client reviews' : '') . '.</p>
        </div>
      </div>
    </div>
  </div>
</section>';

if ($c['layout'] === 'A') {
  echo $introSection;
  echo $whyUsSection;
} else {
  echo $whyUsSection;
  echo $introSection;
}
?>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Services Available for <?= htmlspecialchars($c['city_name']) ?></h2>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-code fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Custom Website Development</h3>
          <p class="service-tagline">SIMPLE, CLEAN & EFFECTIVE</p>
          <p class="service-description">PHP, HTML, CSS, JavaScript — bespoke websites built from scratch.</p>
          <div class="service-cta"><a href="<?= $site ?>service/website-design-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-brands fa-wordpress fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>WordPress Development</h3>
          <p class="service-tagline">EASY TO MANAGE, BUILT TO LAST</p>
          <p class="service-description">Custom themes, plugins, WooCommerce stores and WordPress migrations.</p>
          <div class="service-cta"><a href="<?= $site ?>service/wordpress-website-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-cart-shopping fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>E-Commerce Development</h3>
          <p class="service-tagline">SELL ONLINE SUCCESSFULLY</p>
          <p class="service-description">Online stores with payment gateways supporting <?= htmlspecialchars($c['currency']) ?> and global payments.</p>
          <div class="service-cta"><a href="<?= $site ?>service/e-commerce-website-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>SEO Services</h3>
          <p class="service-tagline">RANK WHERE IT MATTERS</p>
          <p class="service-description">International SEO, local SEO in <?= htmlspecialchars($c['city_name']) ?> and content strategy.</p>
          <div class="service-cta"><a href="<?= $site ?>service/search-engine-optimization/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-arrows-rotate fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Website Redesign</h3>
          <p class="service-tagline">A FRESH START, RANKINGS INTACT</p>
          <p class="service-description">Modernize your outdated website with a fresh, conversion-focused design.</p>
          <div class="service-cta"><a href="<?= $site ?>service/website-redesign-services/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Monthly Maintenance</h3>
          <p class="service-tagline">STAYS SECURE AND FAST</p>
          <p class="service-description">Ongoing support, updates, security patches and performance monitoring.</p>
          <div class="service-cta"><a href="<?= $site ?>service/website-maintenance/" class="btn-service">Learn More</a></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How We Work with <?= htmlspecialchars($c['city_name']) ?> Clients</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Discovery Call</h4><p class="text-muted small">We discuss your project requirements via video call or email.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Proposal</h4><p class="text-muted small">You receive a detailed quote in <?= htmlspecialchars($c['currency']) ?> within 24 hours.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Development</h4><p class="text-muted small">Regular updates and demos throughout the development process.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Launch</h4><p class="text-muted small">Go live with ongoing support. Payments via PayPal, Wise, bank transfer.</p></div></div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="countryFaq">
          <?php foreach ($c['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i > 0 ? ' collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#cfaq<?= $i ?>">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="cfaq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#countryFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:<?= $gradient ?>;padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Let's Build Something Great for <?= htmlspecialchars($c['city_name']) ?></h2>
    <p class="text-light mb-4">Free consultation. No obligation. Get a quote in <?= htmlspecialchars($c['currency']) ?> within 24 hours.</p>
    <a href="<?= $site ?>contact/" class="btn btn-warning btn-lg fw-bold me-3">Start a Project</a>
    <a href="<?= $site ?>portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?= render_hub_crosslinks($site, $c['schema_country'], $page . '/') ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
