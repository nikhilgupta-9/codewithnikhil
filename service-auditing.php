<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-auditing-cities.php';
$pages = include __DIR__ . '/data/services-auditing.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-auditing-content.php';
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
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'auditing') : null) ?? ($site . 'assets/img/all-images/service-img7.png');
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
  'serviceType' => 'Website Audit',
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

<section style="background:linear-gradient(135deg,#232526,#414345);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Website Audit for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get My Website Audit</a>
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $heroImage . '" alt="Website audit for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Every Angle That Affects Whether Your Site Ranks, Loads and Converts</h2>
        <p class="text-muted mb-4">Most "audits" are auto-generated reports that dump 50 flagged issues with no sense of what actually matters. Ours combines automated scanning with a manual review, then ranks every issue by real impact — so you know exactly what to fix first, and what can wait.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-gears text-warning mt-1"></i>
              <span>Technical SEO</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-gauge-high text-warning mt-1"></i>
              <span>Performance</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-shield-halved text-warning mt-1"></i>
              <span>Security</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-mobile-screen text-warning mt-1"></i>
              <span>Mobile Experience</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img8.png" alt="Website audit checklist for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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
      <h2 class="fw-bold">What the Audit Covers</h2>
      <p class="text-muted">A full picture, not a partial report</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-gears fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Technical SEO</h3>
          <p class="service-tagline">FIX WHAT GOOGLE CAN'T SEE</p>
          <p class="service-description">Crawlability, indexing issues, structured data and site architecture problems.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Crawl & index review</li>
            <li><i class="fa-solid fa-check"></i> Structured data check</li>
            <li><i class="fa-solid fa-check"></i> Site architecture review</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-gauge-high fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Performance</h3>
          <p class="service-tagline">FIND WHAT'S SLOWING YOU DOWN</p>
          <p class="service-description">Page speed, Core Web Vitals and what's actually holding your site back.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Core Web Vitals scoring</li>
            <li><i class="fa-solid fa-check"></i> Asset/image analysis</li>
            <li><i class="fa-solid fa-check"></i> Hosting/server review</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Security</h3>
          <p class="service-tagline">BEFORE IT'S EXPLOITED</p>
          <p class="service-description">Outdated software, exposed files and other vulnerabilities checked proactively.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Software version check</li>
            <li><i class="fa-solid fa-check"></i> Exposed file scan</li>
            <li><i class="fa-solid fa-check"></i> Vulnerability report</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-lines fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>On-Page Content</h3>
          <p class="service-tagline">CLOSE THE GAP TO COMPETITORS</p>
          <p class="service-description">Titles, meta tags, headings and keyword targeting gaps versus competitors.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Title/meta review</li>
            <li><i class="fa-solid fa-check"></i> Keyword gap analysis</li>
            <li><i class="fa-solid fa-check"></i> Competitor comparison</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-arrow-pointer fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>UX & Conversion</h3>
          <p class="service-tagline">FIND WHERE VISITORS DROP OFF</p>
          <p class="service-description">Where visitors leave and what's blocking them from converting.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Funnel drop-off review</li>
            <li><i class="fa-solid fa-check"></i> CTA effectiveness</li>
            <li><i class="fa-solid fa-check"></i> Form friction analysis</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-mobile-screen fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Mobile Experience</h3>
          <p class="service-tagline">TESTED ON REAL PHONES</p>
          <p class="service-description">How your site actually performs and looks on real devices, not just a simulator.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Real-device testing</li>
            <li><i class="fa-solid fa-check"></i> Touch target review</li>
            <li><i class="fa-solid fa-check"></i> Mobile speed check</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Audit</a></div>
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
        <div class="accordion" id="auditFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#aud<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="aud<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#auditFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audBonus">Do you offer ongoing monitoring after the audit?</button></h3>
            <div id="audBonus" class="accordion-collapse collapse" data-bs-parent="#auditFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — uptime monitoring, security patches and performance tuning are all covered on an ongoing basis.</div>
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
      <h2 class="fw-bold">How the Audit Works</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Full Scan</h4><p class="text-muted small">Automated and manual review across SEO, speed, security and UX.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Prioritized Report</h4><p class="text-muted small">Issues ranked by impact, in <?= htmlspecialchars($c['currency']) ?> plans, delivered within 3-5 days.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Walkthrough Call</h4><p class="text-muted small">We explain the findings in plain language, not jargon.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Fix It (Optional)</h4><p class="text-muted small">We can implement the fixes ourselves, or hand the report to your team.</p></div></div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#232526,#414345);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Know Exactly What's Wrong With Your <?= htmlspecialchars($c['country_name']) ?> Website</h2>
    <p class="text-light mb-4">Get a prioritized audit in <?= htmlspecialchars($c['currency']) ?> within 3-5 days.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get My Website Audit</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?= $isHub ? render_hub_crosslinks($site, $c['schema_country'], $page . '/') : '' ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
