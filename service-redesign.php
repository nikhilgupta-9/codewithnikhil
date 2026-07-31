<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-redesign-cities.php';
$pages = include __DIR__ . '/data/services-redesign.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-redesign-content.php';
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
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'redesign') : null) ?? ($site . 'assets/img/all-images/service-img5.png');
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
  'serviceType' => 'Website Redesign',
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
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<section style="background:linear-gradient(135deg,#5f2c82,#49a09d);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Website Redesign for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get a Free Redesign Quote</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
        <?= $isHub ? render_remote_badges() : '' ?>
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $heroImage . '" alt="Website redesign for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Signs Your Website Needs a Redesign</h2>
        <p class="text-muted mb-4">An outdated website costs you more than it looks like. More than half your visitors are on mobile, and a layout that isn\'t built for that loses them instantly. Old code and bloated themes push people away before the page even loads. And if traffic is fine but it\'s not turning into leads or sales, the design — not the marketing — is usually the problem.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-mobile-screen text-warning mt-1"></i>
              <span>Not Mobile-Friendly</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-hourglass-half text-warning mt-1"></i>
              <span>Slow Load Times</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-chart-line text-warning mt-1"></i>
              <span>Low Conversions</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-palette text-warning mt-1"></i>
              <span>Dated, Off-Brand Look</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img6.png" alt="Redesign checklist for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;">
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
      <h2 class="fw-bold">What's Included in a Redesign</h2>
      <p class="text-muted">A fresh site, with none of your rankings or content lost</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-palette fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Fresh, Modern Design</h3>
          <p class="service-tagline">YOUR BRAND, TODAY</p>
          <p class="service-description">A conversion-focused layout that reflects your brand now, not five years ago.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Conversion-focused layout</li>
            <li><i class="fa-solid fa-check"></i> Modern visual design</li>
            <li><i class="fa-solid fa-check"></i> Brand consistency</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass-chart fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>SEO-Safe Migration</h3>
          <p class="service-tagline">NO TRAFFIC LOST</p>
          <p class="service-description">Existing rankings and URLs preserved with proper redirects during the switch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 301 redirect mapping</li>
            <li><i class="fa-solid fa-check"></i> Ranking preservation</li>
            <li><i class="fa-solid fa-check"></i> Zero downtime launch</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-mobile-screen fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Mobile-First Rebuild</h3>
          <p class="service-tagline">WORKS ON EVERY SCREEN</p>
          <p class="service-description">Fully responsive across phones, tablets and desktops from the ground up.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Mobile-first layout</li>
            <li><i class="fa-solid fa-check"></i> Cross-device testing</li>
            <li><i class="fa-solid fa-check"></i> Touch-friendly UI</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-gauge-high fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Speed Optimization</h3>
          <p class="service-tagline">FASTER FROM DAY ONE</p>
          <p class="service-description">Faster load times through clean code, image optimization and modern hosting practices.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Clean, lean codebase</li>
            <li><i class="fa-solid fa-check"></i> Image optimization</li>
            <li><i class="fa-solid fa-check"></i> Core Web Vitals tuning</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-box-archive fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Content Migration</h3>
          <p class="service-tagline">NOTHING GETS LEFT BEHIND</p>
          <p class="service-description">All your existing pages, blog posts and media moved over cleanly.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Full content audit</li>
            <li><i class="fa-solid fa-check"></i> Clean page migration</li>
            <li><i class="fa-solid fa-check"></i> Media library transfer</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-chart-simple fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Analytics Continuity</h3>
          <p class="service-tagline">YOUR DATA HISTORY STAYS INTACT</p>
          <p class="service-description">Tracking and conversion goals carried over so nothing resets to zero.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Analytics re-linked</li>
            <li><i class="fa-solid fa-check"></i> Conversion goals preserved</li>
            <li><i class="fa-solid fa-check"></i> Historical data intact</li>
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
        <div class="accordion" id="redesignFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#rd<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="rd<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#redesignFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rdBonus">Do you offer ongoing support after the redesign launches?</button></h3>
            <div id="rdBonus" class="accordion-collapse collapse" data-bs-parent="#redesignFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — security patches, updates and uptime monitoring are all covered after launch.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#5f2c82,#49a09d);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Give Your <?= htmlspecialchars($c['country_name']) ?> Website a Fresh Start</h2>
    <p class="text-light mb-4">Fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours. No rankings lost.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Free Redesign Quote</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?= $isHub ? render_hub_crosslinks($site, $c['schema_country'], $page . '/') : '' ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
