<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/verticals-healthcare-cities.php';
$pages = include __DIR__ . '/data/verticals-healthcare.php';
$pages += $cityPages;
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'GB' => 'website-maintenance-uk/', 'IN' => 'website-maintenance-india/'];
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
  "serviceType": "Healthcare Website Design",
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

<section style="background:linear-gradient(135deg,#0f9b8e,#1a5276);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Healthcare Website Design for <?= htmlspecialchars($c['flag']) ?></p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="<?=$site?>/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get a Free Quote</a>
          <a href="<?=$site?>/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
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
          <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Healthcare consultation for <?= htmlspecialchars($c['country_name']) ?> patients" style="width:100%;display:block;">
        </div>
      </div>
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Patients Judge Trust Before They Ever Call You</h2>
        <p class="text-muted mb-4">Most patients now research a clinic or hospital online before booking — checking whether the website looks credible, whether they can see doctor availability, and whether booking is actually easy. A dated or confusing website loses that patient to the next Google result, no matter how good the care is in person. We build sites that turn that first visit into a booked appointment.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-calendar-check text-warning mt-1"></i>
              <span>Online Appointment Booking</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-user-doctor text-warning mt-1"></i>
              <span>Doctor & Service Profiles</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-lock text-warning mt-1"></i>
              <span>Privacy-Conscious Forms</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-mobile-screen text-warning mt-1"></i>
              <span>Mobile-First Design</span>
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
      <h2 class="fw-bold">Recent Healthcare Work</h2>
      <p class="text-muted">Real projects, not stock examples.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card border-0 shadow-sm p-4 h-100">
          <h3 class="h5 fw-bold">Rejuvenate Digital Health <span class="badge bg-secondary">India</span></h3>
          <p class="text-muted">A digital healthcare platform integrated with <strong>ABHA (Ayushman Bharat Health Account)</strong>, India's national digital health ID system — letting patients link and manage their health records.</p>
          <a href="https://rejuvenatedigitalhealth.com/" target="_blank" rel="noopener noreferrer">View Live Site <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card border-0 shadow-sm p-4 h-100">
          <h3 class="h5 fw-bold">Care With Gratitude <span class="badge bg-secondary">Australia</span></h3>
          <p class="text-muted">A geriatric (aged) home care website for the Australian market, helping families find and enquire about trusted elder care with a clear, low-stress booking flow.</p>
          <a href="https://carewithgratitude.com.au/" target="_blank" rel="noopener noreferrer">View Live Site <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything a modern healthcare practice website needs</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-palette fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Custom Design</h3>
          <p class="service-tagline">BUILDS TRUST FROM VISIT ONE</p>
          <p class="service-description">A clean, professional site designed around how patients actually browse and decide, not a generic template.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Mobile-first layout</li>
            <li><i class="fa-solid fa-check"></i> Fast load times</li>
            <li><i class="fa-solid fa-check"></i> Accessible forms</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-calendar-check fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Appointment Booking</h3>
          <p class="service-tagline">FEWER MISSED APPOINTMENTS</p>
          <p class="service-description">Integrated online booking with calendar sync and automated email/SMS reminders.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Calendar sync</li>
            <li><i class="fa-solid fa-check"></i> SMS/email reminders</li>
            <li><i class="fa-solid fa-check"></i> No-show reduction</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-map-location-dot fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Local SEO</h3>
          <p class="service-tagline">FOUND WHEN IT MATTERS</p>
          <p class="service-description">Show up on Google Maps and local search when patients search for care nearby.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Google Business Profile</li>
            <li><i class="fa-solid fa-check"></i> Local keyword targeting</li>
            <li><i class="fa-solid fa-check"></i> Review generation</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-user-doctor fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Doctor & Service Profiles</h3>
          <p class="service-tagline">CLARITY BEFORE THE VISIT</p>
          <p class="service-description">Clear profiles for each doctor and service so patients know exactly who they'll see.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Individual doctor pages</li>
            <li><i class="fa-solid fa-check"></i> Specialties & credentials</li>
            <li><i class="fa-solid fa-check"></i> Service breakdowns</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-star fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Reviews & Testimonials</h3>
          <p class="service-tagline">SOCIAL PROOF THAT CONVERTS</p>
          <p class="service-description">Showcase real patient reviews to build credibility with visitors who don't know you yet.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Google review widget</li>
            <li><i class="fa-solid fa-check"></i> Testimonial sections</li>
            <li><i class="fa-solid fa-check"></i> Trust badges</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-shield-halved fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Ongoing Support</h3>
          <p class="service-tagline">LAUNCH IS JUST THE START</p>
          <p class="service-description">Content updates, security patches and uptime monitoring so the site stays reliable.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Security patches</li>
            <li><i class="fa-solid fa-check"></i> Uptime monitoring</li>
            <li><i class="fa-solid fa-check"></i> Content updates</li>
          </ul>
          <div class="service-cta">
            <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
          </div>
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
        <div class="accordion" id="healthcareFaq">
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#hf1">How long does a healthcare website take to build?</button></h3>
            <div id="hf1" class="accordion-collapse collapse show" data-bs-parent="#healthcareFaq">
              <div class="accordion-body">Most single-clinic sites with booking take 2-4 weeks from kickoff to launch. Multi-location practices or ones needing custom EHR/patient-portal integration usually take 4-8 weeks depending on scope.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hf2">Can you integrate with our existing booking or EHR system?</button></h3>
            <div id="hf2" class="accordion-collapse collapse" data-bs-parent="#healthcareFaq">
              <div class="accordion-body">In most cases, yes. We've integrated with calendar-based booking tools and, for the Indian market, ABHA (Ayushman Bharat Health Account) for national digital health record linking. Share your current system during the discovery call and we'll confirm feasibility upfront.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hf3">Will the website handle patient data securely?</button></h3>
            <div id="hf3" class="accordion-collapse collapse" data-bs-parent="#healthcareFaq">
              <div class="accordion-body">Yes — intake and contact forms are built with encrypted transmission and minimal data retention by default. We'll discuss your specific regulatory requirements (e.g. HIPAA in the US) during discovery so the build matches what your practice is legally required to handle.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hf4">Do you also handle ongoing content updates after launch?</button></h3>
            <div id="hf4" class="accordion-collapse collapse" data-bs-parent="#healthcareFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — new doctor profiles, service pages, security patches and uptime monitoring are all covered so you're not stuck editing code yourself.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hf5">What does a healthcare website typically cost?</button></h3>
            <div id="hf5" class="accordion-collapse collapse" data-bs-parent="#healthcareFaq">
              <div class="accordion-body">For <?= htmlspecialchars($c['country_name']) ?>, typical projects range <?= htmlspecialchars($c['price_range']) ?>, depending on the number of pages, whether booking/EHR integration is needed, and how many locations or providers the site covers. You'll get a fixed-scope quote before any work starts.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#0f9b8e,#1a5276);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Give Your <?= htmlspecialchars($c['country_name']) ?> Practice a Website Patients Trust</h2>
    <p class="text-light mb-4">Fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="<?=$site?>/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Free Quote</a>
    <a href="<?=$site?>/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?php include_once "includes/footer.php" ?>
</body>
</html>
