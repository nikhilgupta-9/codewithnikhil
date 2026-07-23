<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-maintenance-cities.php';
$pages = include __DIR__ . '/data/services-maintenance.php';
$pages += $cityPages;
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
  "serviceType": "Website Maintenance and Support",
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

<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="<?= $site ?>assets/img/all-images/case-img1.png" alt="Website maintenance for <?= htmlspecialchars($c['country_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">What Happens If Your Website Isn't Maintained?</h2>
        <p class="text-muted mb-4">Most website problems are silent until they aren't. Outdated plugins sit unpatched until they're the entry point for a hack. Broken pages go unnoticed until a customer complains. Rankings slip quietly while competitors keep publishing and improving. A maintenance plan catches all of this before it becomes an emergency.</p>
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
    </div>
  </div>
</section>

<section class="py-5 bg-light">
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
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#mnt1">Do you support sites you didn't originally build?</button></h3>
            <div id="mnt1" class="accordion-collapse collapse show" data-bs-parent="#maintFaq">
              <div class="accordion-body">Yes — we start with a quick technical review to understand the current setup, then bring it onto a maintenance plan regardless of who originally built it.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mnt2">Can I cancel anytime?</button></h3>
            <div id="mnt2" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body">Yes, plans are month-to-month with no long-term lock-in. You keep full ownership of your site and hosting regardless.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mnt3">What happens if my site goes down outside business hours?</button></h3>
            <div id="mnt3" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body">Uptime monitoring runs 24/7 and triggers an alert the moment downtime is detected, so investigation starts immediately rather than waiting until you notice or a customer reports it.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mnt4">How many content update requests are included?</button></h3>
            <div id="mnt4" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body">This depends on the plan tier — lighter plans cover occasional small updates, higher tiers include regular ongoing changes. We'll match the plan to how often you actually need updates.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mnt5">What does a maintenance plan typically cost?</button></h3>
            <div id="mnt5" class="accordion-collapse collapse" data-bs-parent="#maintFaq">
              <div class="accordion-body">For <?= htmlspecialchars($c['country_name']) ?>, plans range <?= htmlspecialchars($c['price_range']) ?>, depending on site complexity and how much update/support coverage you need.</div>
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
