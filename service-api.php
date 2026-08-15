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

<section style="background-image:url(<?= $site ?>assets/img/api-img/api-banner-2.png);background-size:cover;background-position:center;background-repeat:no-repeat;padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="hero-glass-panel">
          <p class="mb-2 fw-bold" style="color:var(--ztc-text-text-11);"><i class="<?= htmlspecialchars($c['category_icon']) ?> me-2"></i>API Integration for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
          <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
          <p class=" mt-3" style="font-size:1.2rem; color:var(--ztc-text-text-11);"><?= $c['hero_sub'] ?></p>
          <div class="mt-4">
            <a href="/contact/" class="header-btn11 me-3">Get Free Quote</a>
            <a href="/portfolio/" class="btn btn-lg" style="border:2px solid var(--ztc-text-text-11);color:var(--ztc-text-text-11);">View My Work</a>
          </div>
          <?= render_remote_badges() ?>
        </div>
      </div>
      <div class="col-lg-5 text-center mt-4 mt-lg-0 d-none">
        <div style="background:rgba(255,255,255,0.1);border-radius:20px;padding:30px;">
          <div style="font-size:3rem;font-weight:800;color:var(--ztc-text-text-11);"><?= $projectCount ?>+</div><div class="text-white">Projects Done</div>
          <div class="mt-3" style="font-size:3rem;font-weight:800;color:var(--ztc-text-text-11);"><?= $yearsExperience ?>+</div><div class="text-white">Years Experience</div>
          <?php if ($rating['count'] > 0): ?>
          <div class="mt-3" style="font-size:2rem;font-weight:800;color:var(--ztc-text-text-11);"><?= $rating['avg'] ?>/5</div><div class="text-white">Client Rating</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.feature-showcase-panel {
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(16, 64, 65, 0.25);
  background: linear-gradient(135deg, var(--ztc-text-text-6), var(--ztc-text-text-12));
  padding: 60px 40px;
  text-align: center;
}
.feature-showcase-panel > i {
  font-size: 8rem;
  color: var(--ztc-text-text-11);
}
.feature-showcase-panel .feature-pill {
  background: rgba(255, 255, 255, 0.12);
  border-radius: 10px;
  padding: 12px 16px;
}
.process-step-card {
  border-radius: 16px;
  border: 1px solid rgba(16, 64, 65, 0.08) !important;
  transition: all 0.3s ease;
}
.process-step-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 15px 35px rgba(16, 64, 65, 0.12);
}
.step-number {
  width: 64px;
  height: 64px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--ztc-text-text-6), var(--ztc-text-text-12));
  color: var(--ztc-text-text-11);
  font-size: 1.6rem;
  font-weight: 800;
}
.comparison-table {
  border-collapse: separate;
  border-spacing: 0;
  width: 100%;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(16, 64, 65, 0.08);
}
.comparison-table thead th {
  background: linear-gradient(135deg, var(--ztc-text-text-6), var(--ztc-text-text-12));
  color: #fff;
  padding: 16px;
  text-align: left;
  font-weight: 700;
  white-space: nowrap;
}
.comparison-table tbody td {
  padding: 16px;
  border-bottom: 1px solid rgba(16, 64, 65, 0.08);
  background: #fff;
  vertical-align: top;
}
.comparison-table tbody tr:last-child td {
  border-bottom: none;
}
.comparison-table tbody tr:hover td {
  background: rgba(16, 64, 65, 0.03);
}
.mistake-card {
  border-radius: 16px;
  border: 1px solid rgba(16, 64, 65, 0.08) !important;
  border-left: 4px solid var(--ztc-text-text-6) !important;
  transition: all 0.3s ease;
}
.mistake-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 15px 35px rgba(16, 64, 65, 0.1);
}
.mistake-card i {
  color: var(--ztc-text-text-6);
  font-size: 1.6rem;
}
.api-cta-section {
  background: linear-gradient(135deg, var(--ztc-text-text-6), var(--ztc-text-text-12));
  padding: 80px 0;
  position: relative;
  overflow: hidden;
}
.api-cta-section::before {
  content: "";
  position: absolute;
  width: 400px;
  height: 400px;
  top: -120px;
  right: -120px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(173, 255, 28, 0.15), transparent 70%);
}
.api-cta-section .container {
  position: relative;
  z-index: 1;
}
</style>

<section class="py-5<?= $u['layout'] === 'B' ? ' bg-light' : '' ?>">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>">
        <div class="feature-showcase-panel">
          <i class="<?= htmlspecialchars($c['category_icon']) ?>"></i>
          <div class="row g-3 mt-4 text-start">
            <?php foreach (array_slice($u['features'], 0, 3) as $f): ?>
            <div class="col-12">
              <div class="d-flex align-items-center gap-2 feature-pill">
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

<section>
      <div class="container-fluid p-0">
        <a href="<?=$site?>contact/">
        <img src="<?=$site?>assets/img/api-img/api-banner-1.png" alt="">
        </a>
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

<?php if (!empty($u['comparison'])): ?>
<section class="py-5<?= $u['layout'] === 'B' ? '' : ' bg-light' ?>">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold"><?= htmlspecialchars($u['comparison']['heading']) ?></h2>
      <?php if (!empty($u['comparison']['sub'])): ?>
      <p class="text-muted"><?= htmlspecialchars($u['comparison']['sub']) ?></p>
      <?php endif; ?>
    </div>
    <div class="table-responsive">
      <table class="comparison-table">
        <thead>
          <tr>
            <th>Option</th>
            <th>Best For</th>
            <th>Worth Knowing</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($u['comparison']['items'] as $row): ?>
          <tr>
            <td class="fw-bold"><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['best_for']) ?></td>
            <td class="text-muted"><?= htmlspecialchars($row['note']) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (!empty($u['mistakes'])): ?>
<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Where This Usually Goes Wrong</h2>
      <p class="text-muted">Issues seen often enough on real projects to plan around from day one</p>
    </div>
    <div class="row g-4">
      <?php foreach ($u['mistakes'] as $m): ?>
      <div class="col-md-4">
        <div class="card border-0 p-4 h-100 mistake-card">
          <i class="fa-solid fa-triangle-exclamation mb-3"></i>
          <h4 class="h6 fw-bold"><?= htmlspecialchars($m['title']) ?></h4>
          <p class="text-muted small mb-0"><?= htmlspecialchars($m['desc']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="py-5<?= $u['layout'] === 'A' ? '' : ' bg-light' ?>">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How the Integration Gets Built</h2>
    </div>
    <div class="row g-4">
      <?php foreach ($u['process'] as $i => $step): ?>
      <div class="col-md-3 text-center">
        <div class="card border-0 p-4 process-step-card">
          <div class="step-number"><?= $i + 1 ?></div>
          <h4 class="h6 fw-bold mt-3"><?= htmlspecialchars($step['title']) ?></h4>
          <p class="text-muted small"><?= htmlspecialchars($step['desc']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="api-cta-section">
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
