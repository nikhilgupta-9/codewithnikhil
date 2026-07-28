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
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'CA' => 'website-maintenance-canada/'];
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
  'serviceType' => 'Junk Car Buyer Website Design',
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

<section style="background:linear-gradient(135deg,#3a1c1c,#6e2b2b);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Junk Car Websites for <?= htmlspecialchars($c['flag']) ?></p>
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $site . 'assets/img/all-images/service-img17.png" alt="Junk car buyer website design for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Built for Speed — Sellers Want an Answer Now</h2>
        <p class="text-muted mb-4">Someone searching "sell my junk car" wants a number in seconds, not a contact form they\'ll never hear back from. If your site makes them dig for a phone number or fill out a long form, they\'ll hit the back button and call the next result instead. We build for that exact moment — fast quotes, one-tap calling, and zero friction.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-money-bill-wave text-warning mt-1"></i>
              <span>Instant Quote Form</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-car text-warning mt-1"></i>
              <span>VIN Lookup</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-phone text-warning mt-1"></i>
              <span>Click-to-Call Everywhere</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-mobile-screen text-warning mt-1"></i>
              <span>Mobile-First Design</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img1.png" alt="Instant junk car quote form for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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
      <p class="text-muted">Everything built to turn a search into a sold car</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-lines fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Lead Capture Forms</h3>
          <p class="service-tagline">SHORT AND HIGH-CONVERTING</p>
          <p class="service-description">Forms tuned for junk car sellers — year, make, model, condition — not a generic contact form.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 4-field quick quote</li>
            <li><i class="fa-solid fa-check"></i> Instant estimate range</li>
            <li><i class="fa-solid fa-check"></i> Mobile-optimized</li>
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
          <p class="service-tagline">SHOW UP WHEN THEY SEARCH</p>
          <p class="service-description">Rank for "sell my car [city]" and "junk car buyer near me" searches in your service area.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Local keyword targeting</li>
            <li><i class="fa-solid fa-check"></i> Google Business Profile</li>
            <li><i class="fa-solid fa-check"></i> Review generation</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-location-dot fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Service Area Pages</h3>
          <p class="service-tagline">EVERY CITY YOU COVER</p>
          <p class="service-description">Dedicated pages for every city and zip code you actually service, not one generic page.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> City-specific pages</li>
            <li><i class="fa-solid fa-check"></i> Local phone numbers</li>
            <li><i class="fa-solid fa-check"></i> Service radius map</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-heart fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Trust Signals</h3>
          <p class="service-tagline">OVERCOME SCAM SKEPTICISM</p>
          <p class="service-description">Reviews, licensing info and clear process steps that reassure a wary seller.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Review widgets</li>
            <li><i class="fa-solid fa-check"></i> Licensing/certifications</li>
            <li><i class="fa-solid fa-check"></i> Clear 3-step process</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-mobile-screen-button fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Mobile-First Build</h3>
          <p class="service-tagline">MOST SELLERS ARE ON THEIR PHONE</p>
          <p class="service-description">Most sellers search from their phone standing next to the car — the site is built for that first.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> One-tap calling</li>
            <li><i class="fa-solid fa-check"></i> Thumb-friendly forms</li>
            <li><i class="fa-solid fa-check"></i> Fast on mobile data</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-bolt fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Fast Load Times</h3>
          <p class="service-tagline">NO PATIENCE FOR SLOW SITES</p>
          <p class="service-description">A slow site loses impatient sellers to the next Google result within seconds.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Optimized images</li>
            <li><i class="fa-solid fa-check"></i> Minimal page weight</li>
            <li><i class="fa-solid fa-check"></i> Fast hosting setup</li>
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
        <div class="accordion" id="junkCarFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#jc<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="jc<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#junkCarFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jcBonus">Can you also handle ongoing updates after launch?</button></h3>
            <div id="jcBonus" class="accordion-collapse collapse" data-bs-parent="#junkCarFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — new service areas, security patches and uptime monitoring are all covered.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#3a1c1c,#6e2b2b);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Turn More Searches Into Sold Cars in <?= htmlspecialchars($c['country_name']) ?></h2>
    <p class="text-light mb-4">Fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="<?=$site?>/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Free Quote</a>
    <a href="<?=$site?>/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
