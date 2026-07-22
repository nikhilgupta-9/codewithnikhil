<?php
include_once "config/connect.php";
include_once "util/function.php";

$page = $_GET['page'] ?? 'web-developer-india';
$city = $_GET['city'] ?? 'india';

$pages = include __DIR__ . '/data/locations-india.php';

$c = $pages[$page] ?? $pages['web-developer-india'];
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
    "addressLocality": "<?= $c['schema_city'] ?>",
    "addressRegion": "<?= $c['schema_region'] ?>",
    "addressCountry": "<?= $c['schema_country'] ?>"
  },
  "geo": {"@type": "GeoCoordinates","latitude": "<?= $c['lat'] ?>","longitude": "<?= $c['lng'] ?>"},
  "areaServed": "<?= htmlspecialchars($c['city_name']) ?>",
  "priceRange": "INR 5000 - 200000"
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
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get Free Quote</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View Portfolio</a>
        </div>
      </div>
      <div class="col-lg-4 text-center mt-4 mt-lg-0">
        <div style="background:rgba(255,255,255,0.1);border-radius:20px;padding:30px;">
          <div class="text-warning" style="font-size:3rem;font-weight:800;"><?= $yearsExperience ?>+</div><div class="text-white">Years Experience</div>
          <div class="text-warning mt-3" style="font-size:3rem;font-weight:800;"><?= $projectCount ?>+</div><div class="text-white">Projects Delivered</div>
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
      <h2 class="fw-bold">Services for <?= htmlspecialchars($c['city_name']) ?> Businesses</h2>
      <p class="text-muted">Everything you need to succeed online</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#128187;</div><h3 class="h5 fw-bold mt-3">Website Design</h3><p class="text-muted">Custom, responsive websites tailored to your business needs.</p><a href="/service/website-design-development/" class="text-primary fw-bold">Learn More</a></div></div>
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#128269;</div><h3 class="h5 fw-bold mt-3">SEO Services</h3><p class="text-muted">Rank higher on Google and get more organic traffic from <?= htmlspecialchars($c['city_name']) ?>.</p><a href="/service/search-engine-optimization/" class="text-primary fw-bold">Learn More</a></div></div>
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#128722;</div><h3 class="h5 fw-bold mt-3">E-Commerce</h3><p class="text-muted">Launch your online store with payment gateway integration.</p><a href="/service/e-commerce-website-development/" class="text-primary fw-bold">Learn More</a></div></div>
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#128241;</div><h3 class="h5 fw-bold mt-3">WordPress</h3><p class="text-muted">Professional WordPress websites with custom themes and plugins.</p><a href="/service/wordpress-website-development/" class="text-primary fw-bold">Learn More</a></div></div>
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#128226;</div><h3 class="h5 fw-bold mt-3">Social Media Marketing</h3><p class="text-muted">Grow your brand on Instagram, Facebook and LinkedIn.</p><a href="/service/social-media-marketing/" class="text-primary fw-bold">Learn More</a></div></div>
      <div class="col-md-4"><div class="card h-100 shadow-sm border-0 p-4"><div style="font-size:2.5rem;">&#9881;</div><h3 class="h5 fw-bold mt-3">Website Maintenance</h3><p class="text-muted">Keep your website secure, updated and running smoothly.</p><a href="/service/website-maintenance/" class="text-primary fw-bold">Learn More</a></div></div>
    </div>
  </div>
</section>

<section style="background:#f8f9fa;padding:60px 0;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-4">Why Choose NikhilWorks?</h2>
        <ul class="list-unstyled">
          <li class="mb-3"><strong style="color:green;">✓ Affordable Pricing</strong> — No agency markup. Direct freelancer rates starting ₹7,999.</li>
          <li class="mb-3"><strong style="color:green;">✓ Fast Delivery</strong> — Most projects delivered in 7-21 days.</li>
          <li class="mb-3"><strong style="color:green;">✓ SEO-Ready</strong> — Every website is built with Google ranking in mind.</li>
          <li class="mb-3"><strong style="color:green;">✓ Mobile-First</strong> — 100% responsive on all devices.</li>
          <li class="mb-3"><strong style="color:green;">✓ Free Support</strong> — 3 months free support after delivery.</li>
          <li class="mb-3"><strong style="color:green;">✓ Transparent</strong> — Regular updates throughout the project.</li>
        </ul>
        <a href="/contact/" class="btn btn-primary btn-lg mt-3">Start Your Project</a>
      </div>
      <div class="col-lg-6 mt-4 mt-lg-0">
        <div class="row g-3">
          <div class="col-6"><div class="card border-0 shadow-sm text-center p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;"><?= $projectCount ?>+</div><small class="text-muted">Projects Completed</small></div></div>
          <div class="col-6"><div class="card border-0 shadow-sm text-center p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;"><?= $yearsExperience ?>+</div><small class="text-muted">Years Experience</small></div></div>
          <div class="col-6"><div class="card border-0 shadow-sm text-center p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;"><?= $projectCount ?>+</div><small class="text-muted">Happy Clients</small></div></div>
          <div class="col-6"><div class="card border-0 shadow-sm text-center p-4"><div style="font-size:2.5rem;font-weight:800;color:#0d6efd;">&lt;24 Hrs</div><small class="text-muted">Avg. Response Time</small></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Ready to Grow Your Business in <?= htmlspecialchars($c['city_name']) ?>?</h2>
    <p class="text-light mb-4">Get a free consultation and custom quote within 24 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get Free Quote</a>
    <a href="/pricing/" class="btn btn-outline-light btn-lg">View Pricing</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>