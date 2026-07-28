<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/verticals-real-estate.php';
$content = include __DIR__ . '/data/verticals-real-estate-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'GB' => 'website-maintenance-uk/', 'CA' => 'website-maintenance-canada/', 'AE' => 'website-maintenance-uae/'];
$maintenanceLink = $maintenanceSlugs[$c['schema_country']] ?? 'services/';
$projectCount = count_portfolio_projects();
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
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
  'serviceType' => 'Real Estate Website Design',
  'provider' => ['@type' => 'ProfessionalService', 'name' => 'NikhilWorks', 'url' => 'https://nikhilworks.com', 'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']],
  'areaServed' => ['@type' => 'Place', 'name' => $c['country_name']],
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
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<section style="background:linear-gradient(135deg,#283e51,#485563);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Real Estate Websites for <?= htmlspecialchars($c['flag']) ?></p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="<?=$site?>/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get a Free Quote</a>
          <a href="<?=$site?>/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
      </div>
      <div class="col-lg-4 text-center mt-4 mt-lg-0">
        <div style="background:rgba(255,255,255,0.15);border-radius:20px;padding:30px;">
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $site . 'assets/img/all-images/service-img15.png" alt="Real estate website design for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Built to Sell Listings, Not Just Display Them</h2>
        <p class="text-muted mb-4">Buyers scroll past listing sites that load slowly or bury the search filters they actually need. A real estate website has one job: get a buyer from "browsing" to "I want to see this one" as fast as possible. That means live listing feeds, fast filtering, and a clear path to contact an agent — not a static gallery that goes stale the day it launches.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-house text-warning mt-1"></i>
              <span>IDX/MLS Integration</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-magnifying-glass text-warning mt-1"></i>
              <span>Advanced Property Search</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-envelope text-warning mt-1"></i>
              <span>Lead Capture Built In</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-map-location-dot text-warning mt-1"></i>
              <span>Map-Based Search</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img16.png" alt="Property listing search interface for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything a modern real estate website needs</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-images fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Listing Pages</h3>
          <p class="service-tagline">EVERY PROPERTY, PRESENTED WELL</p>
          <p class="service-description">Photo galleries, virtual tour embeds and detailed property info on every listing page.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Photo & video galleries</li>
            <li><i class="fa-solid fa-check"></i> Virtual tour embeds</li>
            <li><i class="fa-solid fa-check"></i> Full property details</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-id-card fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Agent Profiles</h3>
          <p class="service-tagline">A FACE BUYERS TRUST</p>
          <p class="service-description">Individual agent pages that build credibility and drive direct contact.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Bio & credentials</li>
            <li><i class="fa-solid fa-check"></i> Active listings per agent</li>
            <li><i class="fa-solid fa-check"></i> Direct contact CTAs</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-calculator fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Mortgage Calculators</h3>
          <p class="service-tagline">KEEP BUYERS ENGAGED</p>
          <p class="service-description">Built-in tools that keep buyers on the page longer and reduce drop-off.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Monthly payment estimates</li>
            <li><i class="fa-solid fa-check"></i> Down payment scenarios</li>
            <li><i class="fa-solid fa-check"></i> Embedded on listings</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-map fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Map-Based Search</h3>
          <p class="service-tagline">BROWSE BY NEIGHBORHOOD</p>
          <p class="service-description">Interactive map search so buyers can explore listings by area, not just a filtered list.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Interactive map view</li>
            <li><i class="fa-solid fa-check"></i> Neighborhood boundaries</li>
            <li><i class="fa-solid fa-check"></i> Cluster pins for density</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-map-location-dot fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Local SEO</h3>
          <p class="service-tagline">FOUND BY THE RIGHT BUYERS</p>
          <p class="service-description">Rank for neighborhood and city-specific property searches, not just your brand name.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Neighborhood pages</li>
            <li><i class="fa-solid fa-check"></i> Google Business Profile</li>
            <li><i class="fa-solid fa-check"></i> Local keyword targeting</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Ongoing Support</h3>
          <p class="service-tagline">LISTINGS STAY CURRENT</p>
          <p class="service-description">Listing feed maintenance, updates and uptime monitoring so nothing goes stale.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Feed sync monitoring</li>
            <li><i class="fa-solid fa-check"></i> Security patches</li>
            <li><i class="fa-solid fa-check"></i> Uptime monitoring</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="realEstateFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#re<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="re<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#realEstateFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#reBonus">Can you also handle ongoing listing/content updates?</button></h3>
            <div id="reBonus" class="accordion-collapse collapse" data-bs-parent="#realEstateFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — feed monitoring, new agent pages and security updates are all covered.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#283e51,#485563);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Get a Real Estate Website That Converts Browsers Into Buyers</h2>
    <p class="text-light mb-4">Fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="<?=$site?>/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Free Quote</a>
    <a href="<?=$site?>/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
