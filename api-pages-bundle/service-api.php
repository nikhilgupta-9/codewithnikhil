<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/services-api.php';
$content = include __DIR__ . '/data/services-api-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$isPillar = !empty($c['is_pillar']);
$projectCount = count_portfolio_projects();
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
include_once "includes/remote-badges.php";
include_once "includes/api-crosslinks.php";
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
  'serviceType' => $c['h1'],
  'provider' => ['@type' => 'ProfessionalService', 'name' => 'NikhilWorks', 'url' => 'https://nikhilworks.com', 'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']],
  'areaServed' => ['@type' => 'Country', 'name' => $c['country_name']],
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
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<section style="background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold"><i class="<?= htmlspecialchars($c['category_icon']) ?> me-2"></i>API Integration for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free Quote</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
        <?= render_remote_badges() ?>
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

<section class="py-5<?= $u['layout'] === 'B' ? ' bg-light' : '' ?>">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);background:linear-gradient(135deg,#0d6efd,#0a58ca);padding:60px 40px;text-align:center;">
          <i class="<?= htmlspecialchars($c['category_icon']) ?>" style="font-size:8rem;color:#fff;"></i>
          <div class="row g-3 mt-4 text-start">
            <?php foreach (array_slice($u['features'], 0, 3) as $f): ?>
            <div class="col-12">
              <div class="d-flex align-items-center gap-2" style="background:rgba(255,255,255,0.12);border-radius:10px;padding:12px 16px;">
                <i class="<?= htmlspecialchars($f['icon']) ?> text-warning"></i>
                <span class="text-white fw-semibold small"><?= htmlspecialchars($f['title']) ?></span>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>">
        <h2 class="fw-bold mb-3"><?= htmlspecialchars($u['intro_heading']) ?></h2>
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="py-5<?= $u['layout'] === 'A' ? ' bg-light' : '' ?>">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything needed to get this API live, tested and reliable</p>
    </div>
    <div class="row g-4">
      <?php foreach ($u['features'] as $f): ?>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="<?= htmlspecialchars($f['icon']) ?> fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3><?= htmlspecialchars($f['title']) ?></h3>
          <p class="service-tagline"><?= htmlspecialchars($f['tagline']) ?></p>
          <p class="service-description"><?= htmlspecialchars($f['desc']) ?></p>
          <ul class="service-features">
            <?php foreach ($f['points'] as $pt): ?>
            <li><i class="fa-solid fa-check"></i> <?= htmlspecialchars($pt) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php if ($isPillar): ?>
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Browse Integration Categories</h2>
      <p class="text-muted">Jump straight to the API you need connected</p>
    </div>
    <div class="row g-4">
      <?php foreach ($pages as $slug => $p): if (!empty($p['is_pillar'])) continue; ?>
      <div class="col-lg-4 col-md-6">
        <a href="<?= $site . $slug ?>/" class="text-decoration-none">
          <div class="card border-0 shadow-sm p-4 h-100" style="transition:transform .2s;">
            <i class="<?= htmlspecialchars($p['category_icon']) ?> fa-2x text-primary mb-3"></i>
            <h3 class="h5 fw-bold text-dark"><?= htmlspecialchars($p['h1']) ?></h3>
            <p class="text-muted small mb-0"><?= htmlspecialchars($p['hero_sub']) ?></p>
          </div>
        </a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="apiFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i > 0 ? ' collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#apifaq<?= $i ?>">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="apifaq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#apiFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How the Integration Gets Built</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Review the API</h4><p class="text-muted small">Docs, auth method and rate limits checked before scoping.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Fixed-Scope Quote</h4><p class="text-muted small">A quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Build & Sandbox Test</h4><p class="text-muted small">Integration built and tested in a sandbox/staging environment first.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Go Live & Verify</h4><p class="text-muted small">Switched to production and verified with a real end-to-end test.</p></div></div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Let's Get This API Connected and Tested</h2>
    <p class="text-light mb-4">Free consultation. No obligation. Get a fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Start a Project</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?= render_api_crosslinks($site, $pages, $page) ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
