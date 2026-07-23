<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-keyword-promotion-cities.php';
$pages = include __DIR__ . '/data/services-keyword-promotion.php';
$pages += $cityPages;
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
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
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Keyword Promotion",
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
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<section style="background:linear-gradient(135deg,#0f2027,#2c5364);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Keyword Promotion for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get My Keywords Ranking</a>
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

<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="<?= $site ?>assets/img/all-images/service-img1.png" alt="Keyword promotion for <?= htmlspecialchars($c['country_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Why Keyword Promotion, Not Just "SEO"</h2>
        <p class="text-muted mb-4">General SEO retainers spread effort thin across dozens of pages and hundreds of possible keywords. Keyword promotion is different — you pick the specific terms that matter to your revenue, and every hour of work goes toward pushing exactly those terms up, with weekly tracking so you can see it happening.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-bullseye text-warning mt-1"></i>
              <span>You Pick the Keywords</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-chart-simple text-warning mt-1"></i>
              <span>Weekly Position Tracking</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-square-check text-warning mt-1"></i>
              <span>Clear Success Criteria</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-file-invoice text-warning mt-1"></i>
              <span>Monthly Ranking Reports</span>
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
      <h2 class="fw-bold">How It Works</h2>
      <p class="text-muted">A focused process built around the keywords you choose</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-bullseye fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Keyword Shortlist</h3>
          <p class="service-tagline">FOCUSED ON REVENUE, NOT VOLUME</p>
          <p class="service-description">We narrow down to the keywords with real search volume and buying intent for your business.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Search volume analysis</li>
            <li><i class="fa-solid fa-check"></i> Buyer-intent filtering</li>
            <li><i class="fa-solid fa-check"></i> Difficulty assessment</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-lines fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Content & On-Page Work</h3>
          <p class="service-tagline">EVERY PAGE TARGETS A KEYWORD</p>
          <p class="service-description">Pages built or optimized specifically to target each keyword on your shortlist.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Targeted page builds</li>
            <li><i class="fa-solid fa-check"></i> On-page optimization</li>
            <li><i class="fa-solid fa-check"></i> Internal linking</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-link fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Authority Building</h3>
          <p class="service-tagline">PUSH YOUR PRIORITY PAGES UP</p>
          <p class="service-description">Backlinks and signals focused specifically on the pages you're targeting.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Targeted link building</li>
            <li><i class="fa-solid fa-check"></i> Page-level authority</li>
            <li><i class="fa-solid fa-check"></i> White-hat methods only</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-chart-line fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Weekly Position Tracking</h3>
          <p class="service-tagline">NO GUESSING</p>
          <p class="service-description">See exactly where each keyword ranks, updated weekly, not once a quarter.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Weekly rank checks</li>
            <li><i class="fa-solid fa-check"></i> Position history</li>
            <li><i class="fa-solid fa-check"></i> Competitor comparison</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-square-check fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Clear Success Criteria</h3>
          <p class="service-tagline">YOU KNOW WHAT "DONE" MEANS</p>
          <p class="service-description">You know upfront what "ranking" means for your plan and how progress is measured.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Defined target positions</li>
            <li><i class="fa-solid fa-check"></i> Agreed timelines</li>
            <li><i class="fa-solid fa-check"></i> No moving goalposts</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-file-invoice fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Monthly Ranking Reports</h3>
          <p class="service-tagline">PROOF, NOT PROMISES</p>
          <p class="service-description">A monthly report showing exact position changes for every tracked keyword.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Position change reports</li>
            <li><i class="fa-solid fa-check"></i> Traffic impact estimates</li>
            <li><i class="fa-solid fa-check"></i> Plain-language summary</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get My Keywords Ranking</a></div>
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
        <div class="accordion" id="kwFaq">
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#kw1">How many keywords can we target?</button></h3>
            <div id="kw1" class="accordion-collapse collapse show" data-bs-parent="#kwFaq">
              <div class="accordion-body">Plans typically cover a focused set of 5-20 priority keywords rather than spreading effort across hundreds — this keeps the work concentrated on what actually moves revenue.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kw2">How is this different from your general SEO service?</button></h3>
            <div id="kw2" class="accordion-collapse collapse" data-bs-parent="#kwFaq">
              <div class="accordion-body">Our <a href="<?= $site ?>seo-services-usa/">SEO service</a> covers the full technical/on-page/content picture. Keyword promotion is narrower and more aggressive — all effort concentrated on a specific keyword shortlist you choose.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kw3">Can I change the target keywords later?</button></h3>
            <div id="kw3" class="accordion-collapse collapse" data-bs-parent="#kwFaq">
              <div class="accordion-body">Yes — as keywords hit their target position or your business priorities shift, we can swap them out for new targets at the next review point.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kw4">Do you also handle site maintenance alongside this?</button></h3>
            <div id="kw4" class="accordion-collapse collapse" data-bs-parent="#kwFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> if you want technical health covered alongside the ranking work.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kw5">What does keyword promotion typically cost?</button></h3>
            <div id="kw5" class="accordion-collapse collapse" data-bs-parent="#kwFaq">
              <div class="accordion-body">For <?= htmlspecialchars($c['country_name']) ?>, plans range <?= htmlspecialchars($c['price_range']) ?>, depending on how many keywords and how competitive they are.</div>
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
      <h2 class="fw-bold">How We Rank Your Keywords</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Keyword Shortlist</h4><p class="text-muted small">We narrow down to the keywords with real search volume and buying intent.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Content & On-Page Work</h4><p class="text-muted small">Pages built or optimized specifically to target each keyword.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Authority Building</h4><p class="text-muted small">Backlinks and signals focused on pushing your priority pages up.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Ranking Reports</h4><p class="text-muted small">Monthly report in <?= htmlspecialchars($c['currency']) ?> plans showing exact position changes.</p></div></div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#0f2027,#2c5364);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Get Your <?= htmlspecialchars($c['country_name']) ?> Keywords on Page 1</h2>
    <p class="text-light mb-4">Plans starting from <?= htmlspecialchars($c['price_range']) ?>. Clear reporting every month.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get My Keywords Ranking</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
