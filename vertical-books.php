<?php
include_once "config/connect.php";
include_once "util/function.php";

$pages = include __DIR__ . '/data/verticals-books.php';
$content = include __DIR__ . '/data/verticals-books-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$maintenanceSlugs = ['US' => 'website-maintenance-usa/', 'GB' => 'website-maintenance-uk/'];
$maintenanceLink = $maintenanceSlugs[$c['schema_country']] ?? 'services/';
$projectCount = count_portfolio_projects();
$yearsExperience = years_in_business(2021);
$rating = average_client_rating();
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = hub_image_url($site, 'verticals', 'books-' . hub_country_slug($c['schema_country'])) ?? ($site . 'assets/img/all-images/service-img2.png');
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
  'serviceType' => 'Book & Bookstore Website Design',
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
  'mainEntity' => array_map(function ($faq) {
    return [
      '@type' => 'Question',
      'name' => $faq['q'],
      'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
    ];
  }, $u['faqs']),
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

<section style="background:linear-gradient(135deg,#3e1e68,#5f2c82);padding:120px 0 80px;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <p class="text-warning mb-2 fw-bold">Book Websites for <?= htmlspecialchars($c['flag']) ?></p>
        <h1 class="text-white fw-bold" style="font-size:2.8rem;"><?= htmlspecialchars($c['h1']) ?></h1>
        <p class="text-light mt-3" style="font-size:1.2rem;"><?= htmlspecialchars($c['hero_sub']) ?></p>
        <div class="mt-4">
          <a href="/contact/" class="btn btn-warning btn-lg me-3 fw-bold">Get a Free Quote</a>
          <a href="/portfolio/" class="btn btn-outline-light btn-lg">View My Work</a>
        </div>
        <?= render_remote_badges() ?>
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

<?php
$introSection = '<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '"><div class="container"><div class="row align-items-center g-5"><div class="col-lg-6 order-lg-2"><div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);"><img src="' . $heroImage . '" alt="Book and bookstore website design for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;"></div></div><div class="col-lg-6 order-lg-1"><h2 class="fw-bold mb-3">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '</div></div></div></section>';

$whyUsSection = '<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="fw-bold mb-3">Built for Authors, Publishers and Bookstores Alike</h2>
        <p class="text-muted mb-4">A book website has to do two things well: help readers discover the right title, and make buying it effortless once they\'ve decided. Whether you\'re an independent author with one series or a bookstore with thousands of titles, the same principles apply — a clean catalog, real previews, and checkout that doesn\'t lose the sale at the last step.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-book text-warning mt-1"></i>
              <span>Book Catalog & Previews</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-credit-card text-warning mt-1"></i>
              <span>E-Commerce Checkout</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-pen-nib text-warning mt-1"></i>
              <span>Author Landing Pages</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-start gap-2">
              <i class="fa-solid fa-envelope-open-text text-warning mt-1"></i>
              <span>Newsletter Signup</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px;overflow:hidden;box-shadow:0 20px 40px rgba(0,0,0,0.12);">
          <img src="' . $site . 'assets/img/all-images/service-img3.png" alt="Book catalog and checkout preview for ' . htmlspecialchars($c['country_name']) . '" style="width:100%;display:block;">
        </div>
      </div>
    </div>
  </div>
</section>';

if ($u['layout'] === 'A') {
  echo $introSection;
  echo $whyUsSection;
} else {
  echo $whyUsSection;
  echo $introSection;
}
?>

<section class="py-5">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">What's Included</h2>
      <p class="text-muted">Everything a book, publisher or bookstore website needs</p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-palette fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Custom Design</h3>
          <p class="service-tagline">MATCHES YOUR GENRE & BRAND</p>
          <p class="service-description">A look built around your genre and brand, not a generic store template everyone else uses.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Genre-appropriate design</li>
            <li><i class="fa-solid fa-check"></i> Mobile-first layout</li>
            <li><i class="fa-solid fa-check"></i> Fast load times</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-credit-card fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Payment Integration</h3>
          <p class="service-tagline">DIRECT SALES, NO MIDDLEMAN CUT</p>
          <p class="service-description">Secure checkout supporting <?= htmlspecialchars($c['currency']) ?> and major payment methods for print, e-books and merch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Print & e-book checkout</li>
            <li><i class="fa-solid fa-check"></i> Multiple payment methods</li>
            <li><i class="fa-solid fa-check"></i> No per-sale platform cut</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-calendar-days fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Events & Signings</h3>
          <p class="service-tagline">BRING READERS TO YOU</p>
          <p class="service-description">A calendar for book signings, launches and in-store events readers can RSVP to.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Event calendar</li>
            <li><i class="fa-solid fa-check"></i> RSVP/ticketing links</li>
            <li><i class="fa-solid fa-check"></i> Past event archive</li>
          </ul>
          <div class="service-cta"><a href="<?= $site ?>contact/" class="btn-service">Get Quote</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="service-header">
            <div class="service-icon"><i class="fa-solid fa-envelope-open-text fa-2x"></i></div>
            <div class="service-experience"><span>Since 2021</span></div>
          </div>
          <h3>Newsletter Signup</h3>
          <p class="service-tagline">BUILD A READER LIST</p>
          <p class="service-description">Grow a mailing list you actually own, ready for your next release or launch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Signup forms sitewide</li>
            <li><i class="fa-solid fa-check"></i> Email tool integration</li>
            <li><i class="fa-solid fa-check"></i> Lead magnets/excerpts</li>
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
          <h3>SEO for Discovery</h3>
          <p class="service-tagline">FOUND BY NEW READERS</p>
          <p class="service-description">Rank for genre, author name and book title searches so new readers can actually find you.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Book/author schema markup</li>
            <li><i class="fa-solid fa-check"></i> Genre keyword targeting</li>
            <li><i class="fa-solid fa-check"></i> Fast, crawlable pages</li>
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
          <p class="service-tagline">CATALOG STAYS CURRENT</p>
          <p class="service-description">Catalog updates, security patches and uptime monitoring after launch.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> New title uploads</li>
            <li><i class="fa-solid fa-check"></i> Security patches</li>
            <li><i class="fa-solid fa-check"></i> Uptime monitoring</li>
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
        <div class="accordion" id="booksFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#bk<?= $i ?>"><?= htmlspecialchars($faq['q']) ?></button></h3>
            <div id="bk<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#booksFaq">
              <div class="accordion-body"><?= htmlspecialchars($faq['a']) ?></div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item">
            <h3 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bkBonus">Do you handle ongoing catalog updates after launch?</button></h3>
            <div id="bkBonus" class="accordion-collapse collapse" data-bs-parent="#booksFaq">
              <div class="accordion-body">Yes, through our <a href="<?= $site . $maintenanceLink ?>">website maintenance plans</a> — new titles, security patches and uptime monitoring are all covered.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section style="background:linear-gradient(135deg,#3e1e68,#5f2c82);padding:80px 0;">
  <div class="container text-center">
    <h2 class="text-white fw-bold mb-3">Give Your Books a Home Online in <?= htmlspecialchars($c['country_name']) ?></h2>
    <p class="text-light mb-4">Fixed-scope quote in <?= htmlspecialchars($c['currency']) ?> within 24-48 hours.</p>
    <a href="/contact/" class="btn btn-warning btn-lg fw-bold me-3">Get a Free Quote</a>
    <a href="/portfolio/" class="btn btn-outline-light btn-lg">See My Work</a>
  </div>
</section>

<?= render_hub_crosslinks($site, $c['schema_country'], $page . '/') ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
