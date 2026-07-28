<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-crm-cities.php';
$pages = include __DIR__ . '/data/services-crm.php';
$pages += $cityPages;
$content = include __DIR__ . '/data/services-crm-content.php';
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
  'serviceType' => 'CRM Development',
  'provider' => ['@type' => 'ProfessionalService', 'name' => 'NikhilWorks', 'url' => 'https://nikhilworks.com', 'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']],
  'areaServed' => $c['country_name'],
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
        <p class="text-warning mb-2 fw-bold">CRM Development for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free Quote</a>
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

<section class="py-5<?= $u['layout'] === 'B' ? ' bg-light' : '' ?>">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-2' : '' ?>">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Custom CRM development for <?= htmlspecialchars($c['country_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6<?= $u['layout'] === 'B' ? ' order-lg-1' : '' ?>">
        <h2 class="fw-bold mb-3"><?= htmlspecialchars($u['intro_heading']) ?></h2>
        <?php foreach ($u['intro'] as $para): ?>
        <p class="text-muted mb-3"><?= htmlspecialchars($para) ?></p>
        <?php endforeach; ?>
        <div class="row g-3 mt-2">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-diagram-project text-warning mt-1"></i>
              <span>Matches Your Sales Process</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-link text-warning mt-1"></i>
              <span>Connects to Your Stack</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-sack-dollar text-warning mt-1"></i>
              <span>No Per-Seat Licensing</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-database text-warning mt-1"></i>
              <span>You Own Your Data</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5<?= $u['layout'] === 'A' ? ' bg-light' : '' ?>">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything needed to run your sales process from one system</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-layer-group fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Custom CRM Build</h3>
          <p class="service-tagline">BUILT AROUND YOUR PROCESS</p>
          <p class="service-description">Lead capture, pipeline stages, contact management and reporting built around how you actually sell.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom pipeline stages</li>
            <li><i class="fa-solid fa-check"></i> Contact & deal tracking</li>
            <li><i class="fa-solid fa-check"></i> Built-in reporting</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-puzzle-piece fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Zoho / HubSpot / Salesforce Customization</h3>
          <p class="service-tagline">EXTEND WHAT YOU ALREADY USE</p>
          <p class="service-description">Custom modules, fields, workflows and third-party integrations on top of your existing CRM.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom modules & fields</li>
            <li><i class="fa-solid fa-check"></i> Third-party integrations</li>
            <li><i class="fa-solid fa-check"></i> Workflow automation</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-import fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Data Migration</h3>
          <p class="service-tagline">NO LOST RECORDS</p>
          <p class="service-description">Clean migration from spreadsheets or a legacy CRM, verified record by record.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Spreadsheet/CSV import</li>
            <li><i class="fa-solid fa-check"></i> Legacy CRM migration</li>
            <li><i class="fa-solid fa-check"></i> Data validation</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-robot fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Workflow Automation</h3>
          <p class="service-tagline">NOTHING FALLS THROUGH</p>
          <p class="service-description">Automatic follow-up reminders, lead assignment and status updates on autopilot.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Follow-up reminders</li>
            <li><i class="fa-solid fa-check"></i> Auto lead assignment</li>
            <li><i class="fa-solid fa-check"></i> Status update triggers</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-chart-line fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Dashboards & Reporting</h3>
          <p class="service-tagline">SEE WHAT'S ACTUALLY HAPPENING</p>
          <p class="service-description">Real-time visibility into pipeline value, conversion rates and team performance.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Pipeline value tracking</li>
            <li><i class="fa-solid fa-check"></i> Conversion rate reports</li>
            <li><i class="fa-solid fa-check"></i> Team performance views</li>
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
          <p class="service-tagline">GROWS WITH YOUR PROCESS</p>
          <p class="service-description">Bug fixes, new modules and adjustments as your sales process evolves over time.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Bug fixes</li>
            <li><i class="fa-solid fa-check"></i> New module builds</li>
            <li><i class="fa-solid fa-check"></i> Process adjustments</li>
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
        <div class="accordion" id="crmFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i > 0 ? ' collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#crmfaq<?= $i ?>">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="crmfaq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#crmFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#crmMaint">Do you also handle ongoing support after the CRM launches?</button></h3>
            <div id="crmMaint" class="accordion-collapse collapse" data-bs-parent="#crmFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> if you'd like the same ongoing coverage for your website alongside the CRM — bug fixes, new modules and process adjustments are covered either way as your business evolves.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How We Build Your CRM</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Map Your Process</h4><p class="text-muted small">We document how your team actually sells, stage by stage.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Proposal</h4><p class="text-muted small">A fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Build & Integrate</h4><p class="text-muted small">Development with regular check-ins and a working demo before launch.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Train & Launch</h4><p class="text-muted small">Team onboarding, data migration and go-live support.</p></div></div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Let's Build a CRM Your <?= htmlspecialchars($c['country_name']) ?> Team Will Actually Use</h2>
    <p class="text-light mb-4">Free consultation. No obligation. Get a quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Start a Project</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
