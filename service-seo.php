<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-seo-cities.php';
$pages = include __DIR__ . '/data/services-seo.php';
$pages += $cityPages;
$content = include __DIR__ . '/data/services-seo-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'GB' => 'website-maintenance-uk/', 'IN' => 'website-maintenance-india/', 'AE' => 'website-maintenance-uae/', 'CA' => 'website-maintenance-canada/', 'AU' => 'website-maintenance-australia/'];
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
  'serviceType' => 'Search Engine Optimization',
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

<section style="background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">SEO Services for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free SEO Audit</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $site . 'assets/img/all-images/service-img1.png" alt="SEO services for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">A Full-Funnel Approach, Not Just Keyword Stuffing</h2>
        <p class="text-muted mb-4">Ranking for the wrong keywords is a wasted effort — traffic that never converts. Our SEO process starts with finding the terms your actual customers search, then fixes the technical issues holding your site back, optimizes the pages that matter, and builds authority the right way. You get monthly reports on rankings, traffic and conversions, not vanity metrics.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-magnifying-glass text-warning mt-1"></i>
              <span>Keyword Research</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-gears text-warning mt-1"></i>
              <span>Technical SEO</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-map-location-dot text-warning mt-1"></i>
              <span>Local SEO</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-link text-warning mt-1"></i>
              <span>Link Building</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img2.png" alt="SEO strategy process for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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
      <h2 class="fw-bold">What Our SEO Service Covers</h2>
      <p class="text-muted">Every layer that affects your Google rankings</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Keyword Research</h3>
          <p class="service-tagline">RANK FOR TERMS THAT CONVERT</p>
          <p class="service-description">Find the exact terms your customers search, ranked by intent and competition, not just volume.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Intent-based targeting</li>
            <li><i class="fa-solid fa-check"></i> Competitor gap analysis</li>
            <li><i class="fa-solid fa-check"></i> Buyer-intent keywords</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-gears fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Technical SEO</h3>
          <p class="service-tagline">FIX WHAT'S HOLDING YOU BACK</p>
          <p class="service-description">Site speed, crawlability, structured data and mobile performance fixes Google actually rewards.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Core Web Vitals fixes</li>
            <li><i class="fa-solid fa-check"></i> Crawlability & indexing</li>
            <li><i class="fa-solid fa-check"></i> Structured data markup</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-lines fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>On-Page Optimization</h3>
          <p class="service-description">Titles, meta descriptions, headings and content aligned to the keywords you actually want to rank for.</p>
          <p class="service-tagline">CONTENT THAT MATCHES INTENT</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Title & meta optimization</li>
            <li><i class="fa-solid fa-check"></i> Content restructuring</li>
            <li><i class="fa-solid fa-check"></i> Internal linking</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-map-location-dot fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Local SEO</h3>
          <p class="service-tagline">SHOW UP NEARBY</p>
          <p class="service-description">Google Business Profile optimization, local citations and location-targeted content.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Google Business Profile</li>
            <li><i class="fa-solid fa-check"></i> Local citations</li>
            <li><i class="fa-solid fa-check"></i> Location-targeted pages</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-link fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Link Building</h3>
          <p class="service-tagline">AUTHORITY, THE RIGHT WAY</p>
          <p class="service-description">Earn quality backlinks that build domain authority instead of risking a Google penalty.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> White-hat outreach</li>
            <li><i class="fa-solid fa-check"></i> Editorial backlinks</li>
            <li><i class="fa-solid fa-check"></i> Domain authority tracking</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-chart-line fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Monthly Reporting</h3>
          <p class="service-tagline">NO VANITY METRICS</p>
          <p class="service-description">Clear rankings, traffic and conversion reports so you know exactly what's working.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Ranking position tracking</li>
            <li><i class="fa-solid fa-check"></i> Organic traffic reports</li>
            <li><i class="fa-solid fa-check"></i> Conversion tracking</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Free Audit</a></div>
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
        <div class="accordion" id="seoFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#seo<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="seo<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#seoFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seoBonus">Do you also handle website maintenance alongside SEO?</button></h3>
            <div id="seoBonus" class="accordion-collapse collapse" data-bs-parent="#seoFaq">
              <div class="accordion-body">Yes — many technical SEO fixes overlap with general site health. We also offer dedicated <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> if you want ongoing updates and monitoring covered too.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How We Approach SEO for <?= htmlspecialchars($c['country_name']) ?> Businesses</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">SEO Audit</h4><p class="text-muted small">Full technical and content audit of your current site.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Strategy & Quote</h4><p class="text-muted small">A prioritized plan and quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Execution</h4><p class="text-muted small">Technical fixes, content and link building rolled out month over month.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Report & Refine</h4><p class="text-muted small">Monthly reporting with adjustments based on real ranking data.</p></div></div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Ready to Rank Higher in <?= htmlspecialchars($c['country_name']) ?>?</h2>
    <p class="text-light mb-4">Free SEO audit. No obligation. Get a quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get Free Audit</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
