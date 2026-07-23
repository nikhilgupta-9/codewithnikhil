<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-ads-cities.php';
$pages = include __DIR__ . '/data/services-ads.php';
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
  "serviceType": "Google and Meta Ads Management",
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

<section style="background:linear-gradient(135deg,#42275a,#734b6d);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Google & Meta Ads for <?= htmlspecialchars($c['flag']) ?> Businesses</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get an Ads Strategy Call</a>
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
          <img src="<?= $site ?>assets/img/all-images/service-img1.png" alt="Google and Meta ads management for <?= htmlspecialchars($c['country_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Google Ads or Meta Ads — Which Do You Need?</h2>
        <p class="text-muted mb-4">We run the platform that actually fits how your customers buy, not just the one everyone talks about. Google Ads captures people actively searching for what you sell, right when they're ready to buy. Meta Ads reaches the right audience with targeting and creative before they're even searching. Many businesses need both, working together.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-brands fa-google text-warning mt-1"></i>
              <span>Google Ads (Search & Shopping)</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-brands fa-meta text-warning mt-1"></i>
              <span>Meta Ads (Facebook & Instagram)</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-users text-warning mt-1"></i>
              <span>Precise Audience Targeting</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-chart-pie text-warning mt-1"></i>
              <span>Transparent Reporting</span>
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
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything needed to run ads that actually generate leads</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-sliders fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Campaign Setup</h3>
          <p class="service-tagline">BUILT RIGHT FROM DAY ONE</p>
          <p class="service-description">Account structure, audience research and conversion tracking configured correctly from the start.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Account structure setup</li>
            <li><i class="fa-solid fa-check"></i> Conversion tracking</li>
            <li><i class="fa-solid fa-check"></i> Audience research</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-pen-nib fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Ad Creative & Copy</h3>
          <p class="service-tagline">STOPS THE SCROLL</p>
          <p class="service-description">Ad copy, images and video creative built to earn the click, not just the impression.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Ad copywriting</li>
            <li><i class="fa-solid fa-check"></i> Image/video creative</li>
            <li><i class="fa-solid fa-check"></i> Multiple ad variants</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-users fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Audience Targeting</h3>
          <p class="service-tagline">SPEND ON PEOPLE WHO CONVERT</p>
          <p class="service-description">Precise targeting so budget goes toward people who actually buy, not just click.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Interest/demographic targeting</li>
            <li><i class="fa-solid fa-check"></i> Retargeting setup</li>
            <li><i class="fa-solid fa-check"></i> Lookalike audiences</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-flask fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>A/B Testing</h3>
          <p class="service-tagline">LOWER COST PER LEAD OVER TIME</p>
          <p class="service-description">Continuous testing of creative, copy and targeting to keep improving results.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Creative split testing</li>
            <li><i class="fa-solid fa-check"></i> Audience testing</li>
            <li><i class="fa-solid fa-check"></i> Ongoing optimization</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-arrow-right-to-bracket fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Landing Page Alignment</h3>
          <p class="service-tagline">CLICKS THAT ACTUALLY CONVERT</p>
          <p class="service-description">Landing pages matched to ad intent so the click doesn't go to waste.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Message match review</li>
            <li><i class="fa-solid fa-check"></i> Landing page recommendations</li>
            <li><i class="fa-solid fa-check"></i> Conversion rate focus</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-chart-pie fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Transparent Reporting</h3>
          <p class="service-tagline">NO VANITY IMPRESSIONS</p>
          <p class="service-description">Spend, cost per lead and ROI reported monthly in plain language.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Monthly performance report</li>
            <li><i class="fa-solid fa-check"></i> Cost-per-lead tracking</li>
            <li><i class="fa-solid fa-check"></i> Full spend transparency</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Strategy Call</a></div>
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
        <div class="accordion" id="adsFaq">
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ads1">Do I need a separate budget for ad spend?</button></h3>
            <div id="ads1" class="accordion-collapse collapse show" data-bs-parent="#adsFaq">
              <div class="accordion-body">Yes — our fee covers strategy, setup, creative and ongoing management. Ad spend goes directly to Google/Meta on top of that, and we'll recommend a starting budget based on your goals during the strategy call.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ads2">How soon will we see leads?</button></h3>
            <div id="ads2" class="accordion-collapse collapse" data-bs-parent="#adsFaq">
              <div class="accordion-body">Unlike SEO, paid ads can generate traffic and leads within days of launch. The first 2-3 weeks are typically spent optimizing based on real performance data before scaling budget up.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ads3">Should we run Google Ads, Meta Ads, or both?</button></h3>
            <div id="ads3" class="accordion-collapse collapse" data-bs-parent="#adsFaq">
              <div class="accordion-body">It depends on how your customers buy. High-intent searches (like "emergency plumber near me") favor Google Ads. Consideration-heavy purchases favor Meta's targeting and creative. We'll recommend a mix based on your specific business during the strategy call.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ads4">Do you also build the landing pages the ads point to?</button></h3>
            <div id="ads4" class="accordion-collapse collapse" data-bs-parent="#adsFaq">
              <div class="accordion-body">Yes — we can build dedicated <a href="<?= $site ?>website-redesign-usa/">landing pages</a> matched to your ad campaigns, or review your existing pages for conversion issues if you'd rather keep what you have.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ads5">What does ads management typically cost?</button></h3>
            <div id="ads5" class="accordion-collapse collapse" data-bs-parent="#adsFaq">
              <div class="accordion-body">For <?= htmlspecialchars($c['country_name']) ?>, management fees range <?= htmlspecialchars($c['price_range']) ?>, on top of your ad spend budget. You'll get a clear breakdown before starting.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#42275a,#734b6d);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Start Getting Leads From <?= htmlspecialchars($c['country_name']) ?> Today</h2>
    <p class="text-light mb-4">Management fee from <?= htmlspecialchars($c['price_range']) ?>. Free strategy call before you commit.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get an Ads Strategy Call</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
