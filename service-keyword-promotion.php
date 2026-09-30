<?php
include_once "config/connect.php";
include_once "util/function.php";

$cityPages = include __DIR__ . '/data/services-keyword-promotion-cities.php';
$pages = include __DIR__ . '/data/services-keyword-promotion.php';
$hubSlugs = array_keys($pages);
$pages += $cityPages;
$content = include __DIR__ . '/data/services-keyword-promotion-content.php';
$page = $_GET['slug'] ?? '';

if (!isset($pages[$page]) || !isset($content[$page])) {
  include_once "404.php";
  exit;
}

$c = $pages[$page];
$u = $content[$page];
$isHub = in_array($page, $hubSlugs, true);
$seoSlugs = ['US' => 'seo-services-usa/', 'GB' => 'seo-services-uk/', 'IN' => 'seo-services-india/', 'AE' => 'seo-services-uae/', 'CA' => 'seo-services-canada/', 'AU' => 'seo-services-australia/'];
$seoLink = $seoSlugs[$c['schema_country']] ?? 'services/';
$projectCount = count_portfolio_projects();
if ($projectCount < 20) $projectCount = 25;
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';
include_once "includes/remote-badges.php";
include_once "includes/hub-crosslinks.php";
$heroImage = ($isHub ? hub_image_url($site, 'services-type', 'keyword') : null) ?? ($site . 'assets/img/all-images/service-img2.png');
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
<meta property="og:image" content="https://nikhilworks.com/assets/img/preview.png">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json">
<?= json_encode([
  '@context' => 'https://schema.org',
  '@type' => 'Service',
  'serviceType' => 'Keyword Promotion and Ranking Services',
  'provider' => ['@type' => 'ProfessionalService', 'name' => 'NikhilWorks', 'url' => 'https://nikhilworks.com', 'address' => ['@type' => 'PostalAddress', 'addressCountry' => 'IN']],
  'areaServed' => ['@type' => $isHub ? 'Country' : 'City', 'name' => $c['country_name']],
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

<style>
  :root {
    --nw-primary: #104041;
    --nw-accent: #ADFF1C;
    --nw-dark: #082223;
    --nw-card-bg: #FFFFFF;
    --nw-text-dark: #0f2d2e;
    --nw-text-muted: #557273;
  }

  .kw-hero {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.75) 0%, transparent 50%),
                linear-gradient(135deg, #051617 0%, #0d3435 50%, #041213 100%);
    padding: 130px 0 90px;
    overflow: hidden;
    color: #fff;
  }

  .kw-hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(173, 255, 28, 0.12);
    border: 1px solid rgba(173, 255, 28, 0.35);
    color: #ADFF1C;
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 20px;
    backdrop-filter: blur(8px);
  }

  .kw-hero h1 {
    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;
    line-height: 1.2;
    color: #ffffff;
    margin-bottom: 20px;
    letter-spacing: -0.5px;
  }

  .kw-hero-sub {
    font-size: 1.15rem;
    line-height: 1.65;
    color: #c4dedb;
    max-width: 620px;
    margin-bottom: 30px;
  }

  .btn-lime {
    background: #ADFF1C;
    color: #082223 !important;
    font-weight: 700;
    padding: 14px 28px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 2px solid #ADFF1C;
    box-shadow: 0 8px 24px rgba(173, 255, 28, 0.25);
  }

  .btn-lime:hover {
    background: #c3ff4d;
    transform: translateY(-2px);
    box-shadow: 0 12px 28px rgba(173, 255, 28, 0.35);
  }

  .btn-outline-lime {
    background: transparent;
    color: #fff !important;
    font-weight: 600;
    padding: 14px 26px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.25s ease;
    border: 1.5px solid rgba(255, 255, 255, 0.3);
  }

  .btn-outline-lime:hover {
    background: rgba(255, 255, 255, 0.1);
    border-color: #ADFF1C;
    color: #ADFF1C !important;
    transform: translateY(-2px);
  }

  /* Right-Side Interactive Keyword Tracker Card */
  .kw-monitor-wrap {
    position: relative;
  }

  .kw-monitor-card {
    background: #092021;
    border: 1px solid rgba(173, 255, 28, 0.25);
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.55);
    position: relative;
  }

  .kw-monitor-header {
    background: #051516;
    padding: 12px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
  }

  .kw-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    display: inline-block;
  }
  .kw-dot.red { background: #ff5f56; }
  .kw-dot.yellow { background: #ffbd2e; }
  .kw-dot.green { background: #27c93f; }

  .kw-url-bar {
    background: rgba(255, 255, 255, 0.06);
    border-radius: 6px;
    padding: 4px 12px;
    font-size: 11px;
    color: #8faea9;
    font-family: monospace;
    flex-grow: 1;
    margin-left: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .kw-monitor-body {
    padding: 24px;
    background: #071b1c;
  }

  .kw-rank-item {
    background: rgba(16, 64, 65, 0.4);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 10px;
    padding: 10px 14px;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .kw-rank-item .term {
    font-size: 13px;
    font-weight: 700;
    color: #ffffff;
  }

  .kw-rank-item .pos {
    background: rgba(173, 255, 28, 0.15);
    color: #ADFF1C;
    font-weight: 800;
    font-size: 12px;
    padding: 3px 8px;
    border-radius: 6px;
  }

  .kw-tech-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 12px;
    padding-top: 12px;
    border-top: 1px solid rgba(255, 255, 255, 0.08);
  }

  .kw-tech-pill {
    font-size: 11px;
    background: rgba(173, 255, 28, 0.08);
    border: 1px solid rgba(173, 255, 28, 0.25);
    color: #ADFF1C;
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
  }

  /* Floating Badges */
  .kw-floating-badge {
    position: absolute;
    background: rgba(8, 34, 35, 0.95);
    border: 1px solid rgba(173, 255, 28, 0.4);
    backdrop-filter: blur(12px);
    border-radius: 12px;
    padding: 10px 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
    z-index: 2;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .kw-badge-top {
    top: -16px;
    right: 16px;
  }

  .kw-badge-bottom {
    bottom: -18px;
    left: 16px;
  }

  .kw-stats-strip {
    display: flex;
    justify-content: space-around;
    background: rgba(16, 64, 65, 0.4);
    border-top: 1px solid rgba(173, 255, 28, 0.15);
    padding: 14px 10px;
    text-align: center;
  }

  .kw-stat-item strong {
    display: block;
    color: #ADFF1C;
    font-size: 18px;
    font-weight: 800;
  }

  .kw-stat-item span {
    font-size: 11px;
    color: #a3c4c0;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  /* Content Cards & Sections */
  .service-card {
    background: #fff;
    border-radius: 16px;
    padding: 28px;
    border: 1px solid #e1eeeb;
    box-shadow: 0 8px 24px rgba(16, 64, 65, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .service-card:hover {
    transform: translateY(-5px);
    border-color: #ADFF1C;
    box-shadow: 0 16px 36px rgba(16, 64, 65, 0.12);
  }

  .service-card .service-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    background: rgba(16, 64, 65, 0.08);
    color: #104041;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    margin-bottom: 18px;
  }

  .service-card:hover .service-icon {
    background: #104041;
    color: #ADFF1C;
  }

  .service-experience span {
    background: #104041;
    color: #ADFF1C;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
  }

  .service-card h3 {
    color: #104041;
    font-size: 1.28rem;
    font-weight: 700;
    margin-bottom: 6px;
  }

  .service-tagline {
    color: #104041;
    font-weight: 700;
    font-size: 0.8rem;
    letter-spacing: 0.5px;
    margin-bottom: 12px;
  }

  .service-description {
    color: #557273;
    font-size: 0.95rem;
    line-height: 1.55;
    margin-bottom: 18px;
  }

  .service-features {
    list-style: none;
    padding: 0;
    margin: 0 0 20px 0;
    flex-grow: 1;
  }

  .service-features li {
    font-size: 13.5px;
    color: #385253;
    padding: 5px 0;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .service-features li i {
    color: #104041;
    font-size: 12px;
  }

  .btn-service {
    background: #104041;
    color: #ADFF1C !important;
    padding: 10px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 700;
    text-align: center;
    display: block;
    transition: all 0.25s ease;
  }

  .btn-service:hover {
    background: #082223;
    color: #fff !important;
    transform: translateY(-2px);
  }

  .kw-step-card {
    background: #ffffff;
    border: 1px solid #e1eeeb;
    border-radius: 16px;
    padding: 24px;
    height: 100%;
    transition: all 0.3s ease;
  }

  .kw-step-card:hover {
    border-color: #104041;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(16, 64, 65, 0.08);
  }

  .kw-step-num {
    font-size: 2.2rem;
    font-weight: 800;
    color: #104041;
    line-height: 1;
    margin-bottom: 10px;
  }

  /* Dark CTA banner */
  .kw-cta-banner {
    background: linear-gradient(135deg, #051617 0%, #104041 100%);
    border-radius: 24px;
    padding: 60px 40px;
    color: #fff;
    position: relative;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(8, 34, 35, 0.3);
  }

  @media (max-width: 767px) {
    .kw-hero {
      padding: 100px 0 60px;
    }
    .kw-floating-badge {
      display: none;
    }
    .kw-cta-banner {
      padding: 40px 20px;
    }
  }
</style>
</head>
<body class="homepage4-body">
<?php include_once "includes/header.php" ?>

<!--===== HERO AREA STARTS =======-->
<section class="kw-hero">
  <div class="container">
    <div class="row align-items-center g-5">
      
      <!-- Left Column: Copy & CTAs -->
      <div class="col-lg-7">
        <div class="kw-hero-pill">
          <i class="fa-solid fa-ranking-star"></i>
          <span><?= htmlspecialchars($c['flag']) ?> High-Intent Keyword Ranking Campaigns</span>
        </div>

        <h1>
          <?= htmlspecialchars($c['h1']) ?>
        </h1>

        <p class="kw-hero-sub">
          <?= htmlspecialchars($c['hero_sub']) ?> Push your most profitable target keywords to Google Page 1 with laser-focused content clustering and authority link building.
        </p>

        <div class="d-flex flex-wrap gap-3 align-items-center mb-4">
          <a href="<?= $site ?>contact/" class="btn-lime">
            <span>Get My Keywords Ranking</span>
            <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
            <i class="fa-solid fa-eye"></i>
            <span>View My Work</span>
          </a>
          <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20am%20interested%20in%20keyword%20promotion%20for%20<?= urlencode($c['country_name']) ?>" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.5); color: #25D366 !important;" aria-label="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
            <span>WhatsApp</span>
          </a>
        </div>

        <?= $isHub ? render_remote_badges() : '' ?>
      </div>

      <!-- Right Column: Interactive Keyword Tracker Card -->
      <div class="col-lg-5">
        <div class="kw-monitor-wrap">
          
          <!-- Floating Top Badge -->
          <div class="kw-floating-badge kw-badge-top">
            <i class="fa-solid fa-arrow-up-right-dots" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Target: Top 3 Positions</div>
              <div style="font-size:10px; color:#ADFF1C;">High-Converting Keywords</div>
            </div>
          </div>

          <!-- Main Monitor Window -->
          <div class="kw-monitor-card">
            <div class="kw-monitor-header">
              <span class="kw-dot red"></span>
              <span class="kw-dot yellow"></span>
              <span class="kw-dot green"></span>
              <div class="kw-url-bar">https://nikhilworks.com/rank-tracker/<?= htmlspecialchars($page) ?></div>
            </div>

            <div class="kw-monitor-body">
              
              <div class="kw-rank-item">
                <div>
                  <div class="term"><?= htmlspecialchars($c['country_name']) ?> Developer Services</div>
                  <div style="font-size:10px; color:#a3c4c0;">Volume: High • Intent: Commercial</div>
                </div>
                <div class="pos">#1 Position</div>
              </div>

              <div class="kw-rank-item">
                <div>
                  <div class="term">Custom Web Apps in <?= htmlspecialchars($c['country_name']) ?></div>
                  <div style="font-size:10px; color:#a3c4c0;">Difficulty: Medium • Clicks: +320%</div>
                </div>
                <div class="pos">#2 Position</div>
              </div>

              <div class="kw-rank-item">
                <div>
                  <div class="term">Top SEO Expert <?= htmlspecialchars($c['country_name']) ?></div>
                  <div style="font-size:10px; color:#a3c4c0;">Intent: Transactional</div>
                </div>
                <div class="pos">#1 Position</div>
              </div>

              <div class="kw-tech-pills">
                <span class="kw-tech-pill">Topic Clusters</span>
                <span class="kw-tech-pill">Entity Optimization</span>
                <span class="kw-tech-pill">Tier-1 Backlinks</span>
                <span class="kw-tech-pill">SERP CTR Tuning</span>
              </div>
            </div>

            <!-- Bottom Stats Strip -->
            <div class="kw-stats-strip">
              <div class="kw-stat-item">
                <strong><?= $projectCount ?>+</strong>
                <span>Campaigns</span>
              </div>
              <div class="kw-stat-item">
                <strong><?= $yearsExperience ?>+</strong>
                <span>Years Exp</span>
              </div>
              <div class="kw-stat-item">
                <strong><?= $avgRating ?>★</strong>
                <span>Client Rating</span>
              </div>
            </div>

          </div>

          <!-- Floating Bottom Badge -->
          <div class="kw-floating-badge kw-badge-bottom">
            <i class="fa-solid fa-trophy" style="color:#ADFF1C; font-size:18px;"></i>
            <div>
              <div style="font-size:12px; font-weight:700; color:#fff;">Guaranteed White-Hat</div>
              <div style="font-size:10px; color:#a3c4c0;">Sustainable Long-Term Gains</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
<!--===== HERO AREA ENDS =======-->

<?php
$introSection = '
<section class="py-5' . ($u['layout'] === 'B' ? ' bg-light' : '') . '">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6 order-lg-2">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $heroImage . '" alt="Keyword promotion for ' . htmlspecialchars($c['country_name']) . ' businesses" style="width:100%; display:block;">
        </div>
      </div>
      <div class="col-lg-6 order-lg-1">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Targeted Search Dominance</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">' . htmlspecialchars($u['intro_heading']) . '</h2>';
foreach ($u['intro'] as $para) {
  $introSection .= '<p class="text-muted mb-3" style="font-size:1.05rem; line-height:1.65;">' . htmlspecialchars($para) . '</p>';
}
$introSection .= '
        <div class="mt-4">
          <a href="' . $site . 'contact/" class="btn-service" style="display:inline-block; padding:12px 24px;">Start Ranking for Keywords <i class="fa-solid fa-arrow-right ms-1"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>';

$whyUsSection = '
<section class="py-5' . ($u['layout'] === 'A' ? ' bg-light' : '') . '">
  <div class="container py-4">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Precision Over Volume</span>
        <h2 class="fw-bold mb-3 mt-1" style="color:#104041;">Why Individual Keyword Focus Matters</h2>
        <p class="text-muted mb-4" style="font-size:1.05rem; line-height:1.65;">Instead of spreading efforts thin across hundreds of unrelated search terms, we isolate the 10-20 core commercial queries that drive 80% of sales in ' . htmlspecialchars($c['country_name']) . '. We optimize landing pages, build authoritative topical clusters, and secure contextual backlinks to push each keyword to Top 3.</p>
        <div class="row g-3">
          <div class="col-6">
            <div class="kw-step-card">
              <i class="fa-solid fa-crosshairs mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">High-Value Terms Only</div>
              <p class="text-muted mb-0" style="font-size:12px;">Rank for keywords with real commercial intent.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="kw-step-card">
              <i class="fa-solid fa-layer-group mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Topical Authority Clusters</div>
              <p class="text-muted mb-0" style="font-size:12px;">Supporting content that signals niche expertise.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="kw-step-card">
              <i class="fa-solid fa-link mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Anchor-Targeted Links</div>
              <p class="text-muted mb-0" style="font-size:12px;">High-DR editorial backlinks with exact keywords.</p>
            </div>
          </div>
          <div class="col-6">
            <div class="kw-step-card">
              <i class="fa-solid fa-chart-line mb-2" style="color:#104041; font-size:20px;"></i>
              <div class="fw-bold" style="color:#104041; font-size:14px;">Daily Rank Tracking</div>
              <p class="text-muted mb-0" style="font-size:12px;">Transparent position tracking in real time.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div style="border-radius:20px; overflow:hidden; box-shadow:0 20px 40px rgba(16,64,65,0.12); border: 1px solid #e1eeeb;">
          <img src="' . $site . 'assets/img/all-images/service-img4.png" alt="Keyword ranking strategy for ' . htmlspecialchars($c['country_name']) . '" style="width:100%; display:block;">
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

<!--===== SERVICES INCLUDED GRID =======-->
<section class="py-5" style="background: #fbfdfc;">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Execution Strategy</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">What Every Keyword Campaign Covers</h2>
      <p class="text-muted" style="max-width:600px; margin:0 auto;">Everything required to push target search terms past competitors on Google.</p>
    </div>
    
    <div class="row g-4">
      
      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-crosshairs"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Keyword Selection &amp; Intent Analysis</h3>
          <p class="service-tagline">TARGET WHAT CONVERTS</p>
          <p class="service-description">Identify buyer-intent keywords that actual decision makers type when looking for your products or services.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Transactional keyword mapping</li>
            <li><i class="fa-solid fa-check"></i> Competitor position gaps</li>
            <li><i class="fa-solid fa-check"></i> Search volume vs. difficulty</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-file-pen"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Landing Page &amp; Content Architecture</h3>
          <p class="service-tagline">MATCH EXACT SEARCH INTENT</p>
          <p class="service-description">Dedicated landing page optimization ensuring titles, headings, and copy satisfy Google's helpful content criteria.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Optimized H1/H2 heading hierarchy</li>
            <li><i class="fa-solid fa-check"></i> Semantic LSI keyword integration</li>
            <li><i class="fa-solid fa-check"></i> Meta titles &amp; descriptions</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-sitemap"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Topical Cluster &amp; Internal Linking</h3>
          <p class="service-tagline">BUILD UNSTOPPABLE TOPICAL AUTHORITY</p>
          <p class="service-description">Create supporting blog articles and deep internal links directing maximum link equity to your money pages.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Pillar &amp; cluster content plan</li>
            <li><i class="fa-solid fa-check"></i> Contextual internal link siloing</li>
            <li><i class="fa-solid fa-check"></i> Schema Entity markup</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-link"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Contextual Authority Backlinks</h3>
          <p class="service-tagline">SAFE, RELEVANT &amp; POWERFUL</p>
          <p class="service-description">Secure high-DR contextual backlinks from authoritative niche sites to pass domain rank authority.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Manual outreach &amp; guest posting</li>
            <li><i class="fa-solid fa-check"></i> Diverse anchor text profile</li>
            <li><i class="fa-solid fa-check"></i> 100% White-hat safety</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-mouse-pointer"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>CTR &amp; Snippet Optimization</h3>
          <p class="service-tagline">WIN MORE CLICKS ON PAGE 1</p>
          <p class="service-description">Optimize search snippet titles and FAQ schema to capture rich snippets and maximize organic click-through rates.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Click-magnet meta titles</li>
            <li><i class="fa-solid fa-check"></i> FAQ &amp; Review rich snippets</li>
            <li><i class="fa-solid fa-check"></i> Featured snippet targeting</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="service-card">
          <div class="d-flex justify-content-between align-items-start mb-3">
            <div class="service-icon"><i class="fa-solid fa-chart-line"></i></div>
            <div class="service-experience"><span>Since Aug 2022</span></div>
          </div>
          <h3>Weekly Rank Tracking &amp; Reports</h3>
          <p class="service-tagline">WATCH YOUR RANKS CLIMB</p>
          <p class="service-description">Transparent weekly position updates showing exact ranking movements, impressions, and conversions.</p>
          <ul class="service-features">
            <li><i class="fa-solid fa-check"></i> Live rank tracking dashboard</li>
            <li><i class="fa-solid fa-check"></i> Google Search Console verification</li>
            <li><i class="fa-solid fa-check"></i> Monthly strategic adjustments</li>
          </ul>
          <div class="mt-auto">
            <a href="<?= $site ?>contact/" class="btn-service">Get Free Audit <i class="fa-solid fa-arrow-right ms-1"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!--===== 4-STEP PROCESS SECTION =======-->
<section class="py-5 bg-light">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Proven Ranking Framework</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">How We Push Keywords to Page 1</h2>
    </div>
    <div class="row g-4">
      <div class="col-md-3">
        <div class="kw-step-card text-center">
          <div class="kw-step-num">01</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Keyword Opportunity Audit</h4>
          <p class="text-muted small mb-0">Identify target high-intent terms with highest commercial conversion potential.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="kw-step-card text-center">
          <div class="kw-step-num">02</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">On-Page &amp; Content Optimization</h4>
          <p class="text-muted small mb-0">Re-engineer landing pages with semantic headings, structured data, and high-quality copy.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="kw-step-card text-center">
          <div class="kw-step-num">03</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Authority Backlinks</h4>
          <p class="text-muted small mb-0">Earn high-quality contextual links with natural anchor distribution.</p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="kw-step-card text-center">
          <div class="kw-step-num">04</div>
          <h4 class="fw-bold mb-2" style="font-size:16px; color:#104041;">Rank &amp; Convert</h4>
          <p class="text-muted small mb-0">Track movements to Top 3 positions and optimize conversion funnels.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== FAQ SECTION =======-->
<section class="py-5">
  <div class="container py-4">
    <div class="text-center mb-5">
      <span style="color:#104041; font-weight:700; font-size:13px; text-transform:uppercase; letter-spacing:1px;">Clear Answers</span>
      <h2 class="fw-bold mt-1" style="color:#104041;">Frequently Asked Questions</h2>
      <p class="text-muted">Everything you need to know about keyword ranking campaigns in <?= htmlspecialchars($c['country_name']) ?>.</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="accordion" id="kwFaq">
          <?php foreach ($u['faqs'] as $i => $faq): ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button<?= $i === 0 ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#kwfaq<?= $i ?>" style="font-weight:700; color:#104041;">
                <?= htmlspecialchars($faq['q']) ?>
              </button>
            </h3>
            <div id="kwfaq<?= $i ?>" class="accordion-collapse collapse<?= $i === 0 ? ' show' : '' ?>" data-bs-parent="#kwFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                <?= htmlspecialchars($faq['a']) ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <div class="accordion-item mb-3" style="border: 1px solid #e1eeeb; border-radius: 12px; overflow: hidden;">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kwBonus" style="font-weight:700; color:#104041;">
                How does keyword promotion differ from full SEO services?
              </button>
            </h3>
            <div id="kwBonus" class="accordion-collapse collapse" data-bs-parent="#kwFaq">
              <div class="accordion-body" style="color:#557273; font-size:15px; line-height:1.6;">
                Keyword promotion zeroes in aggressively on ranking specific high-value commercial search terms, whereas our <a href="<?= $site . $seoLink ?>" style="color:#104041; font-weight:700; text-decoration:underline;">full SEO services</a> cover overall domain-wide crawlability, local map pack optimization, and sitewide architecture.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--===== BOTTOM CTA BANNER =======-->
<section class="py-5">
  <div class="container">
    <div class="kw-cta-banner text-center">
      <h2 class="text-white fw-bold mb-3">Ready to Rank #1 for Your Target Keywords in <?= htmlspecialchars($c['country_name']) ?>?</h2>
      <p style="color:#c4dedb; max-width:650px; margin:0 auto 28px; font-size:1.1rem;">
        Get a free keyword opportunity audit. Transparent plans in <?= htmlspecialchars($c['currency']) ?>. Zero long-term contracts.
      </p>
      <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="<?= $site ?>contact/" class="btn-lime">
          <span>Get Free Keyword Audit</span>
          <i class="fa-solid fa-arrow-right"></i>
        </a>
        <a href="<?= $site ?>portfolio/" class="btn-outline-lime">
          <i class="fa-solid fa-briefcase"></i>
          <span>See Portfolio</span>
        </a>
        <a href="https://wa.me/918368552640" target="_blank" rel="noopener" class="btn-outline-lime" style="border-color: rgba(37, 211, 102, 0.6); color:#25D366 !important;">
          <i class="fa-brands fa-whatsapp"></i>
          <span>Chat on WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</section>

<?= $isHub ? render_hub_crosslinks($site, $c['schema_country'], $page . '/') : '' ?>

<?php include_once "includes/footer.php" ?>
</body>
</html>
