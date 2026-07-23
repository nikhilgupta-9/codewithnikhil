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
<body class="homepage4-body">

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
    <div class="row align-items-center g-5 mb-5">
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Web developer for <?= htmlspecialchars($c['city_name']) ?> businesses" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Everything You Need to Succeed Online</h2>
        <p class="text-muted mb-4">Most <?= htmlspecialchars($c['city_name']) ?> businesses don't need a dozen vendors — one developer who can handle design, development, SEO and ongoing support end to end is faster and cheaper than coordinating between an agency, a freelancer and a marketing consultant separately.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-code text-primary mt-1"></i>
              <span>Custom Website Design</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-magnifying-glass text-primary mt-1"></i>
              <span>SEO Services</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-cart-shopping text-primary mt-1"></i>
              <span>E-Commerce Development</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-shield-halved text-primary mt-1"></i>
              <span>Ongoing Maintenance</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-code fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Website Design</h3>
          <p class="service-tagline">TAILORED TO YOUR BUSINESS</p>
          <p class="service-description">Custom, responsive websites tailored to your business needs, not a generic template.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Responsive design</li>
            <li><i class="fa-solid fa-check"></i> Fast loading speed</li>
            <li><i class="fa-solid fa-check"></i> SEO optimized</li>
          </ul>
          <div class="service-cta"><a href="/service/website-design-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-magnifying-glass fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>SEO Services</h3>
          <p class="service-tagline">RANK HIGHER, LOCALLY</p>
          <p class="service-description">Rank higher on Google and get more organic traffic from <?= htmlspecialchars($c['city_name']) ?>.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Keyword research</li>
            <li><i class="fa-solid fa-check"></i> Local SEO</li>
            <li><i class="fa-solid fa-check"></i> Monthly reporting</li>
          </ul>
          <div class="service-cta"><a href="/service/search-engine-optimization/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-cart-shopping fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>E-Commerce</h3>
          <p class="service-tagline">LAUNCH YOUR ONLINE STORE</p>
          <p class="service-description">Launch your online store with secure payment gateway integration.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Secure checkout</li>
            <li><i class="fa-solid fa-check"></i> Inventory management</li>
            <li><i class="fa-solid fa-check"></i> Order tracking</li>
          </ul>
          <div class="service-cta"><a href="/service/e-commerce-website-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-brands fa-wordpress fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>WordPress</h3>
          <p class="service-tagline">EASY TO MANAGE</p>
          <p class="service-description">Professional WordPress websites with custom themes and plugins.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Custom theme development</li>
            <li><i class="fa-solid fa-check"></i> Plugin customization</li>
            <li><i class="fa-solid fa-check"></i> WooCommerce stores</li>
          </ul>
          <div class="service-cta"><a href="/service/wordpress-website-development/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-bullhorn fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Social Media Marketing</h3>
          <p class="service-tagline">GROW YOUR BRAND</p>
          <p class="service-description">Grow your brand on Instagram, Facebook and LinkedIn with strategic content and ads.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Content strategy</li>
            <li><i class="fa-solid fa-check"></i> Paid ad management</li>
            <li><i class="fa-solid fa-check"></i> Audience targeting</li>
          </ul>
          <div class="service-cta"><a href="/service/social-media-marketing/" class="btn-service">Learn More</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Website Maintenance</h3>
          <p class="service-tagline">STAYS SECURE AND FAST</p>
          <p class="service-description">Keep your website secure, updated and running smoothly after launch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Security patches</li>
            <li><i class="fa-solid fa-check"></i> Daily backups</li>
            <li><i class="fa-solid fa-check"></i> Uptime monitoring</li>
          </ul>
          <div class="service-cta"><a href="/website-maintenance-india/" class="btn-service">Learn More</a></div>
        </div>
      </div>
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

<section class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Frequently Asked Questions</h2>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="indiaCityFaq">
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ic1">Do you work with clients outside <?= htmlspecialchars($c['city_name']) ?> too?</button></h3>
            <div id="ic1" class="accordion-collapse collapse show" data-bs-parent="#indiaCityFaq">
              <div class="accordion-body">Yes — most of the work happens remotely over video calls, WhatsApp and email, so location isn't a constraint. In-person meetings can be arranged where practical.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ic2">How much does a website cost?</button></h3>
            <div id="ic2" class="accordion-collapse collapse" data-bs-parent="#indiaCityFaq">
              <div class="accordion-body">Direct freelancer rates start at ₹7,999 for a basic business website, with pricing scaling based on pages, features and e-commerce needs. See our <a href="/website-development-cost-india/">website development cost guide</a> for a full breakdown, or get a fixed-scope quote for your specific project.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ic3">How long does a project take?</button></h3>
            <div id="ic3" class="accordion-collapse collapse" data-bs-parent="#indiaCityFaq">
              <div class="accordion-body">Most business websites are delivered in 7-21 days. E-commerce stores and custom applications typically take longer, with a specific timeline confirmed at the quote stage.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ic4">What happens after the website launches?</button></h3>
            <div id="ic4" class="accordion-collapse collapse" data-bs-parent="#indiaCityFaq">
              <div class="accordion-body">Every project includes 3 months of free support after delivery. Beyond that, <a href="/website-maintenance-india/">ongoing maintenance plans</a> cover security patches, backups and updates.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ic5">Can you also help with SEO and marketing, not just the website?</button></h3>
            <div id="ic5" class="accordion-collapse collapse" data-bs-parent="#indiaCityFaq">
              <div class="accordion-body">Yes — <a href="/seo-services-india/">SEO</a>, social media marketing, CRM development and paid ads are all available alongside the website build or as standalone services.</div>
            </div>
          </div>
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