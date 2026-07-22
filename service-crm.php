<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/services-crm.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
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
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "CRM Development",
  "provider": {"@type": "ProfessionalService", "name": "NikhilWorks", "url": "https://nikhilworks.com"},
  "areaServed": "<?= htmlspecialchars($c['country_name']) ?>",
  "description": "<?= addslashes($c['description']) ?>",
  "priceRange": "<?= htmlspecialchars($c['price_range']) ?>"
}
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
<body>
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

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Why Build a Custom CRM Instead of Buying One?</h2>
      <p class="text-muted">Off-the-shelf CRMs force your team to adapt to their workflow. A custom CRM adapts to yours.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#128200;</div>
          <h3 class="h5 fw-bold mt-3">Matches Your Sales Process</h3>
          <p class="text-muted">No forcing your pipeline into someone else's stages, fields and terminology.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#128279;</div>
          <h3 class="h5 fw-bold mt-3">Connects to Your Stack</h3>
          <p class="text-muted">Integrates with your website, WhatsApp, email, payment gateway and existing tools instead of living in a silo.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm p-4 h-100 text-center">
          <div style="font-size:3rem;">&#128176;</div>
          <h3 class="h5 fw-bold mt-3">No Per-Seat Licensing</h3>
          <p class="text-muted">Pay once for the build instead of monthly per-user fees that scale against you as you grow.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Custom CRM Build</h3><p class="text-muted">Lead capture, pipeline stages, contact management and reporting built around your process.</p></div></div>
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Zoho / HubSpot / Salesforce Customization</h3><p class="text-muted">Custom modules, fields, workflows and third-party integrations on top of the CRM you already use.</p></div></div>
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Data Migration</h3><p class="text-muted">Clean migration from spreadsheets or a legacy CRM with no lost records.</p></div></div>
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Workflow Automation</h3><p class="text-muted">Automatic follow-up reminders, lead assignment and status updates so nothing falls through.</p></div></div>
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Dashboards & Reporting</h3><p class="text-muted">Real-time visibility into pipeline value, conversion rates and team performance.</p></div></div>
      <div class="col-md-4"><div class="card border-0 shadow-sm p-4 h-100"><h3 class="h5 fw-bold">Ongoing Support</h3><p class="text-muted">Bug fixes, new modules and adjustments as your sales process evolves.</p></div></div>
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
