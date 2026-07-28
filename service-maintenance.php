<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-maintenance-cities.php';
$pages = include __DIR__ . '/data/services-maintenance.php';
$pages += $cityPages;
$content = include __DIR__ . '/data/services-maintenance-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$seoSlugs = ['US' => 'seo-services-usa/', 'GB' => 'seo-services-uk/', 'IN' => 'seo-services-india/', 'AE' => 'seo-services-uae/', 'CA' => 'seo-services-canada/', 'AU' => 'seo-services-australia/'];
$seoLink = $seoSlugs[$c['schema_country']] ?? 'services/';
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
  'serviceType' => 'Website Maintenance and Support',
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

<section style="background:linear-gradient(135deg,#134e5e,#71b280);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Website Maintenance for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get a Maintenance Plan</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
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
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $site . 'assets/img/all-images/service-img3.png" alt="Website maintenance for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">What Happens If Your Website Isn\'t Maintained?</h2>
        <p class="text-muted mb-4">Most website problems are silent until they aren\'t. Outdated plugins sit unpatched until they\'re the entry point for a hack. Broken pages go unnoticed until a customer complains. Rankings slip quietly while competitors keep publishing and improving. A maintenance plan catches all of this before it becomes an emergency.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-lock text-warning mt-1"></i>
              <span>Security Vulnerabilities</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-bug text-warning mt-1"></i>
              <span>Broken Pages & Downtime</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-chart-line text-warning mt-1"></i>
              <span>Slipping Google Rankings</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-database text-warning mt-1"></i>
              <span>No Recent Backups</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img4.png" alt="Website maintenance plan checklist for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
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
      <h2 class="fw-bold">What's Included in Every Plan</h2>
      <p class="text-muted">Everything needed to keep your site secure, fast and online</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Security Patches</h3>
          <p class="service-tagline">CLOSE THE DOOR ON HACKERS</p>
          <p class="service-description">Core, plugin and dependency updates applied as soon as they're released.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Core software updates</li>
            <li><i class="fa-solid fa-check"></i> Plugin/dependency patches</li>
            <li><i class="fa-solid fa-check"></i> Vulnerability scanning</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-database fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Daily Backups</h3>
          <p class="service-tagline">NEVER MORE THAN A DAY AWAY</p>
          <p class="service-description">Automated off-site backups so you're always a quick restore away from clean.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Automated daily backups</li>
            <li><i class="fa-solid fa-check"></i> Off-site storage</li>
            <li><i class="fa-solid fa-check"></i> Tested restore process</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-server fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Uptime Monitoring</h3>
          <p class="service-tagline">KNOW BEFORE YOUR CUSTOMERS DO</p>
          <p class="service-description">24/7 monitoring with alerts the moment your site goes down.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> 24/7 monitoring</li>
            <li><i class="fa-solid fa-check"></i> Instant downtime alerts</li>
            <li><i class="fa-solid fa-check"></i> Uptime reports</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-pen-to-square fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Content Updates</h3>
          <p class="service-tagline">NO CODE REQUIRED ON YOUR END</p>
          <p class="service-description">Text, image and product updates handled without you touching code.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Text & image updates</li>
            <li><i class="fa-solid fa-check"></i> Product/service updates</li>
            <li><i class="fa-solid fa-check"></i> Fast turnaround</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-gauge-high fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Speed Optimization</h3>
          <p class="service-tagline">STAYS FAST AS YOU GROW</p>
          <p class="service-description">Ongoing performance tuning so your site doesn't slow down over time.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Performance audits</li>
            <li><i class="fa-solid fa-check"></i> Image/asset optimization</li>
            <li><i class="fa-solid fa-check"></i> Caching tuning</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-bolt fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Priority Bug Fixes</h3>
          <p class="service-tagline">A REAL PERSON TO CALL</p>
          <p class="service-description">Fast turnaround on anything that breaks, with direct access to your developer.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Priority response time</li>
            <li><i class="fa-solid fa-check"></i> Direct developer access</li>
            <li><i class="fa-solid fa-check"></i> No ticket queue</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get a Plan</a></div>
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
        <div class="accordion" id="maintFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#mnt<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="mnt<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#maintFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mntBonus">Do you also offer ongoing SEO alongside maintenance?</button></h3>
            <div id="mntBonus" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body">Yes — we also offer dedicated <a href="<?= $site . $seoLink ?>">SEO services</a> if you want organic rankings actively worked on alongside the technical upkeep.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#134e5e,#71b280);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Never Worry About Your <?= htmlspecialchars($c['country_name']) ?> Website Again</h2>
    <p class="text-light mb-4">Plans in <?= htmlspecialchars($c['currency']) ?> starting from <?= htmlspecialchars($c['price_range']) ?>. Cancel anytime.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Maintenance Plan</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
