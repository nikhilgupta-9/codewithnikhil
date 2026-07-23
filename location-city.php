<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/locations-cities.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$countrySlugs = ['US' => 'usa', 'GB' => 'uk', 'CA' => 'canada', 'AU' => 'australia', 'IN' => 'india', 'AE' => 'uae'];
$countrySlug = $countrySlugs[$c['schema_country']] ?? null;
$maintenanceLink = $countrySlug ? "website-maintenance-{$countrySlug}/" : 'services/';
$seoLink = $countrySlug && in_array($c['schema_country'], ['US', 'GB', 'AE', 'CA', 'AU'], true) ? "seo-services-{$countrySlug}/" : 'services/';
$redesignLink = $countrySlug ? "website-redesign-{$countrySlug}/" : 'services/';
$contact = contact_us();
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
  "@type": "ProfessionalService",
  "name": "NikhilWorks",
  "url": "https://nikhilworks.com",
  "logo": "https://nikhilworks.com/assets/img/logo/logo.png",
  "description": "<?= addslashes($c['description']) ?>",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "<?= htmlspecialchars($c['city_name']) ?>",
    "addressRegion": "<?= htmlspecialchars($c['schema_region']) ?>",
    "addressCountry": "<?= htmlspecialchars($c['schema_country']) ?>"
  },
  "areaServed": "<?= htmlspecialchars($c['city_name']) ?>",
  "priceRange": "<?= htmlspecialchars($c['price_range']) ?>",
  "availableLanguage": "English"
}
</script>
<link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/magnific-popup.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/sidebar.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/slick-slider.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/plugins/nice-select.css">
<link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
<script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>
<body class="homepage4-body">

<?php include_once "includes/header.php" ?>

<section style="background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Available for <?= htmlspecialchars($c['flag']) ?> Clients</p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free Quote</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
        <div class="mt-4 d-flex gap-4">
          <div><span class="text-warning fw-bold">Remote-First</span><br><small class="text-light">Work from anywhere</small></div>
          <div><span class="text-warning fw-bold">Fast Delivery</span><br><small class="text-light">7-21 day turnaround</small></div>
          <div><span class="text-warning fw-bold">Timezone Friendly</span><br><small class="text-light">Flexible availability</small></div>
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
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Web developer for <?= htmlspecialchars($c['city_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Why Hire a Freelance Developer from India?</h2>
        <p class="text-muted mb-4">The smart choice for <?= htmlspecialchars($c['city_name']) ?> businesses is a developer who delivers agency-quality work without the agency overhead. You get direct access to the person building your site, competitive rates, and clear communication throughout — not a project manager relaying messages between you and an offshore team you never talk to.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-sack-dollar text-warning mt-1"></i>
              <span>Save 60-70% on Cost</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-earth-americas text-warning mt-1"></i>
              <span>Global Communication</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-circle-check text-warning mt-1"></i>
              <span><?= $projectCount ?>+ Projects Delivered</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-comments text-warning mt-1"></i>
              <span>Direct Developer Access</span>
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
      <h2 class="fw-bold">Services Available for <?= htmlspecialchars($c['city_name']) ?></h2>
      <p class="text-muted">Everything needed to build and grow your online presence</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-code fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Custom Website Development</h3>
          <p class="service-tagline">SIMPLE, CLEAN & EFFECTIVE</p>
          <p class="service-description">PHP, HTML, CSS, JavaScript — bespoke websites built from scratch, not a page-builder template.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Responsive design</li>
            <li><i class="fa-solid fa-check"></i> Fast loading speed</li>
            <li><i class="fa-solid fa-check"></i> SEO optimized</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-brands fa-wordpress fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>WordPress Development</h3>
          <p class="service-tagline">EASY TO MANAGE, BUILT TO LAST</p>
          <p class="service-description">Custom themes, plugins, WooCommerce stores and WordPress migrations.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom theme development</li>
            <li><i class="fa-solid fa-check"></i> WooCommerce stores</li>
            <li><i class="fa-solid fa-check"></i> Site migrations</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-cart-shopping fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>E-Commerce Development</h3>
          <p class="service-tagline">SELL ONLINE SUCCESSFULLY</p>
          <p class="service-description">Online stores with payment gateways supporting <?= htmlspecialchars($c['currency']) ?> and global payments.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Secure checkout</li>
            <li><i class="fa-solid fa-check"></i> Inventory management</li>
            <li><i class="fa-solid fa-check"></i> Multi-currency support</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>SEO Services</h3>
          <p class="service-tagline">RANK WHERE IT MATTERS</p>
          <p class="service-description">International SEO, local SEO in <?= htmlspecialchars($c['city_name']) ?> and content strategy.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Keyword research</li>
            <li><i class="fa-solid fa-check"></i> Local SEO</li>
            <li><i class="fa-solid fa-check"></i> Monthly reporting</li>
          </ul>
          <div class="service-cta"><a href="<?= $site . $seoLink ?>" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-arrows-rotate fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Website Redesign</h3>
          <p class="service-tagline">A FRESH START, RANKINGS INTACT</p>
          <p class="service-description">Modernize your outdated website with a fresh, conversion-focused design.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Modern design refresh</li>
            <li><i class="fa-solid fa-check"></i> SEO-safe migration</li>
            <li><i class="fa-solid fa-check"></i> Mobile-first rebuild</li>
          </ul>
          <div class="service-cta"><a href="<?= $site . $redesignLink ?>" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Monthly Maintenance</h3>
          <p class="service-tagline">STAYS SECURE AND FAST</p>
          <p class="service-description">Ongoing support, updates, security patches and performance monitoring.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Security patches</li>
            <li><i class="fa-solid fa-check"></i> Daily backups</li>
            <li><i class="fa-solid fa-check"></i> Uptime monitoring</li>
          </ul>
          <div class="service-cta"><a href="<?= $site . $maintenanceLink ?>" class="btn-service">Learn More</a></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">How We Work with <?= htmlspecialchars($c['city_name']) ?> Clients</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">1</div><h4 class="h6 fw-bold mt-2">Discovery Call</h4><p class="text-muted small">We discuss your project requirements via video call or email.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">2</div><h4 class="h6 fw-bold mt-2">Proposal</h4><p class="text-muted small">You receive a detailed quote in <?= htmlspecialchars($c['currency']) ?> within 24 hours.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">3</div><h4 class="h6 fw-bold mt-2">Development</h4><p class="text-muted small">Regular updates and demos throughout the development process.</p></div></div>
      <div class="col-md-3 text-center"><div class="card border-0 p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">4</div><h4 class="h6 fw-bold mt-2">Launch</h4><p class="text-muted small">Go live with ongoing support. Payments via PayPal, Wise, bank transfer.</p></div></div>
    </div>
  </div>
</section>

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="cityFaq">
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#city1">Do you work with clients in different time zones?</button></h3>
            <div id="city1" class="accordion-collapse collapse show" data-bs-parent="#cityFaq">
              <div class="accordion-body">Yes — most communication happens over video call, email and WhatsApp, and we schedule discovery calls and check-ins at times that work for <?= htmlspecialchars($c['city_name']) ?> business hours, not just ours.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#city2">How do payments work internationally?</button></h3>
            <div id="city2" class="accordion-collapse collapse" data-bs-parent="#cityFaq">
              <div class="accordion-body">Payments in <?= htmlspecialchars($c['currency']) ?> are accepted via PayPal, Wise or direct bank transfer, whichever is most convenient on your end. Pricing and invoices are quoted in your local currency, not a foreign one you have to convert.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#city3">How long does a typical website project take?</button></h3>
            <div id="city3" class="accordion-collapse collapse" data-bs-parent="#cityFaq">
              <div class="accordion-body">Most business websites are delivered in 7-21 days depending on scope. E-commerce stores and custom applications typically take longer — you'll get a specific timeline with your quote.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#city4">Do you offer ongoing support after launch?</button></h3>
            <div id="city4" class="accordion-collapse collapse" data-bs-parent="#cityFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — security patches, backups, uptime monitoring and content updates are all covered.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#city5">What does a website typically cost for <?= htmlspecialchars($c['city_name']) ?> businesses?</button></h3>
            <div id="city5" class="accordion-collapse collapse" data-bs-parent="#cityFaq">
              <div class="accordion-body">Typical projects range <?= htmlspecialchars($c['price_range']) ?>, depending on complexity, number of pages and whether e-commerce or custom features are involved. You'll get a fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24 hours.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#1a1a2e,#16213e,#0f3460);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Let's Build Something Great for <?= htmlspecialchars($c['city_name']) ?></h2>
    <p class="text-light mb-4">Free consultation. No obligation. Get a quote in <?= htmlspecialchars($c['currency']) ?> within 24 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Start a Project</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
