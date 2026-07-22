<?php
include "config/connect.php";
include_once "util/function.php";

$tests = testimonial();

// Sort featured first, then by display_order
usort($tests, function ($a, $b) {
    if (($b['featured'] ?? 0) !== ($a['featured'] ?? 0)) {
        return ($b['featured'] ?? 0) <=> ($a['featured'] ?? 0);
    }
    return ($a['display_order'] ?? 0) <=> ($b['display_order'] ?? 0);
});

$reviewCount = count($tests);
$avgRating   = 0;
if ($reviewCount > 0) {
    $ratingSum = array_sum(array_map(fn($t) => (int)($t['rating'] ?? 0), $tests));
    $avgRating = round($ratingSum / $reviewCount, 1);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-1HVPGR81RL');
  </script>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Client Testimonials & Reviews | NikhilWorks — Web Development & SEO</title>
  <meta name="description" content="Real client reviews for NikhilWorks — web development and SEO projects delivered for businesses across India, Dubai, USA, UK and Australia. See what clients say.">
  <meta name="keywords" content="nikhilworks reviews, nikhilworks testimonials, web developer reviews india, client feedback nikhil gupta">

  <!-- Canonical & hreflang -->
  <link rel="canonical" href="<?= $site ?>testimonials/">
  <link rel="alternate" hreflang="en" href="<?= $site ?>testimonials/">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>testimonials/">

  <!-- Open Graph -->
  <meta property="og:title" content="Client Testimonials & Reviews | NikhilWorks">
  <meta property="og:description" content="Real client reviews for web development and SEO projects delivered for businesses across India, Dubai, USA, UK and Australia.">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.png">
  <meta property="og:url" content="<?= $site ?>testimonials/">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Client Testimonials & Reviews | NikhilWorks">
  <meta name="twitter:description" content="Real client reviews for web development and SEO projects.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/preview.png">

  <!--=====FAB ICON=======-->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!--===== CSS LINK =======-->
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

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      {"@type": "ListItem", "position": 1, "name": "Home", "item": "<?= $site ?>"},
      {"@type": "ListItem", "position": 2, "name": "Testimonials", "item": "<?= $site ?>testimonials/"}
    ]
  }
  </script>

  <?php if ($reviewCount > 0): ?>
  <!-- Schema: AggregateRating -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks",
    "url": "<?= $site ?>",
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?= $avgRating ?>",
      "reviewCount": "<?= $reviewCount ?>",
      "bestRating": "5"
    }
  }
  </script>
  <?php endif; ?>

  <style>
    /* Custom Styles */
    .testimonial-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 30px 25px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.06);
      transition: all 0.3s ease;
      height: 100%;
      border: 1px solid rgba(0,0,0,0.04);
      position: relative;
    }
    
    .testimonial-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 60px rgba(0,0,0,0.10);
      border-color: rgba(16, 64, 65, 0.1);
    }
    
    .testimonial-card .client-avatar {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: linear-gradient(135deg, #104041, #1a6b6d);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      font-weight: 700;
      flex-shrink: 0;
    }
    
    .testimonial-card .client-info {
      flex: 1;
      min-width: 0;
    }
    
    .testimonial-card .client-name {
      font-weight: 700;
      font-size: 18px;
      color: #104041;
      margin-bottom: 2px;
    }
    
    .testimonial-card .client-title {
      font-size: 14px;
      color: #6c757d;
      display: block;
    }
    
    .testimonial-card .stars {
      color: #FFBA00;
      font-size: 14px;
      letter-spacing: 2px;
    }
    
    .testimonial-card .stars .fa-star {
      margin-right: 2px;
    }
    
    .testimonial-card .testimonial-text {
      color: #4a5568;
      line-height: 1.8;
      font-size: 15px;
      margin-top: 15px;
      padding-top: 15px;
      border-top: 1px solid #f0f0f0;
    }
    
    .testimonial-card .project-tag {
      display: inline-block;
      background: #f8f9fa;
      padding: 4px 14px;
      border-radius: 20px;
      font-size: 12px;
      color: #6c757d;
      margin-top: 12px;
    }
    
    .testimonial-card .featured-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: #FFBA00;
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      padding: 3px 12px;
      border-radius: 20px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    
    /* Rating Summary */
    .rating-summary-wrapper {
      background: linear-gradient(135deg, #f8f9fa, #ffffff);
      border-radius: 20px;
      padding: 40px;
      margin-bottom: 50px;
      border: 1px solid rgba(0,0,0,0.04);
      box-shadow: 0 5px 20px rgba(0,0,0,0.04);
    }
    
    .rating-number {
      font-size: 4rem;
      font-weight: 800;
      color: #104041;
      line-height: 1;
    }
    
    .rating-number .out-of {
      font-size: 1.5rem;
      font-weight: 400;
      color: #6c757d;
    }
    
    .rating-stars-large {
      font-size: 28px;
      color: #FFBA00;
      letter-spacing: 4px;
    }
    
    .rating-stars-large .fa-star {
      margin-right: 4px;
    }
    
    .rating-count-text {
      color: #6c757d;
      font-size: 16px;
      font-weight: 500;
    }
    
    .rating-bar {
      height: 8px;
      background: #e9ecef;
      border-radius: 10px;
      overflow: hidden;
      margin-top: 15px;
      max-width: 300px;
      margin-left: auto;
      margin-right: auto;
    }
    
    .rating-bar-fill {
      height: 100%;
      background: linear-gradient(90deg, #FFBA00, #FFA500);
      border-radius: 10px;
      transition: width 1s ease;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
      .testimonial-card {
        padding: 25px 20px;
      }
      
      .rating-summary-wrapper {
        padding: 25px 20px;
      }
      
      .rating-number {
        font-size: 3rem;
      }
      
      .rating-stars-large {
        font-size: 22px;
      }
    }
    
    @media (max-width: 576px) {
      .testimonial-card .client-avatar {
        width: 50px;
        height: 50px;
        font-size: 20px;
      }
      
      .testimonial-card .client-name {
        font-size: 16px;
      }
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?= $site ?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="<?= $site ?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1" aria-hidden="true">
    <img src="<?= $site ?>assets/img/elements/star2.png" alt="" class="star2 keyframe5" aria-hidden="true">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>Client Testimonials</h1>
            <nav aria-label="Breadcrumb">
              <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right" aria-hidden="true"></i> <span>Testimonials</span></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== TESTIMONIALS SECTION =======-->
  <section class="testimonial4-section-area sp1 py-5">
    <div class="container">

      <?php if ($reviewCount > 0): ?>
      <!-- Rating Summary -->
      <div class="rating-summary-wrapper" data-aos="fade-up" data-aos-duration="800">
        <div class="row align-items-center">
          <div class="col-md-4 text-center text-md-start">
            <div class="rating-number">
              <?= $avgRating ?>
              <span class="out-of">/ 5</span>
            </div>
            <div class="rating-stars-large mt-2" role="img" aria-label="Rating: <?= $avgRating ?> out of 5 stars">
              <?php for ($i = 1; $i <= 5; $i++): ?>
                <i class="<?= $i <= round($avgRating) ? 'fa-solid' : 'fa-regular' ?> fa-star" aria-hidden="true"></i>
              <?php endfor; ?>
            </div>
            <div class="rating-count-text mt-1">
              Based on <?= $reviewCount ?> client review<?= $reviewCount === 1 ? '' : 's' ?>
            </div>
          </div>
          <div class="col-md-8 mt-3 mt-md-0">
            <div class="row g-2">
              <?php
              // Calculate rating distribution
              $ratings = array_fill(1, 5, 0);
              foreach ($tests as $test) {
                  $r = (int)($test['rating'] ?? 0);
                  if ($r >= 1 && $r <= 5) {
                      $ratings[$r]++;
                  }
              }
              
              for ($i = 5; $i >= 1; $i--):
                  $count = $ratings[$i] ?? 0;
                  $percentage = $reviewCount > 0 ? ($count / $reviewCount) * 100 : 0;
              ?>
              <div class="col-12">
                <div class="d-flex align-items-center gap-2">
                  <span class="fw-bold" style="min-width: 20px; color: #104041;"><?= $i ?></span>
                  <i class="fa-solid fa-star" style="color: #FFBA00; font-size: 13px;"></i>
                  <div class="flex-grow-1" style="max-width: 200px;">
                    <div class="rating-bar">
                      <div class="rating-bar-fill" style="width: <?= $percentage ?>%;"></div>
                    </div>
                  </div>
                  <span style="font-size: 13px; color: #6c757d; min-width: 30px;"><?= $count ?></span>
                </div>
              </div>
              <?php endfor; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Testimonials Grid -->
      <div class="row g-4" data-aos="fade-up" data-aos-duration="1000">
        <?php foreach ($tests as $test): ?>
          <div class="col-lg-4 col-md-6">
            <div class="testimonial-card" itemscope itemtype="https://schema.org/Review">
              <?php if (!empty($test['featured']) && $test['featured'] == 1): ?>
                <span class="featured-badge">Featured</span>
              <?php endif; ?>
              
              <div class="d-flex align-items-center gap-3">
                <div class="client-avatar" aria-hidden="true">
                  <?= strtoupper(substr($test['client_name'], 0, 1)) ?>
                </div>
                <div class="client-info">
                  <div class="client-name" itemprop="author"><?= htmlspecialchars($test['client_name']) ?></div>
                  <?php if (!empty($test['client_title'])): ?>
                    <span class="client-title" itemprop="jobTitle"><?= htmlspecialchars($test['client_title']) ?></span>
                  <?php endif; ?>
                  <div class="stars mt-1" role="img" aria-label="Rating: <?= (int)($test['rating'] ?? 0) ?> out of 5 stars">
                    <?php
                    $rating = (int)($test['rating'] ?? 0);
                    for ($i = 1; $i <= 5; $i++):
                    ?>
                      <i class="<?= $i <= $rating ? 'fa-solid' : 'fa-regular' ?> fa-star" aria-hidden="true"></i>
                    <?php endfor; ?>
                  </div>
                </div>
              </div>
              
              <div class="testimonial-text" itemprop="reviewBody">
                <?= htmlspecialchars($test['testimonial_text']) ?>
              </div>
              
              <?php if (!empty($test['project_name'])): ?>
                <span class="project-tag" itemprop="about">
                  <i class="fa-regular fa-folder-open" aria-hidden="true"></i>
                  <?= htmlspecialchars($test['project_name']) ?>
                </span>
              <?php endif; ?>
              
              <meta itemprop="datePublished" content="<?= date('Y-m-d', strtotime($test['created_at'] ?? 'now')) ?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
        <!-- No Reviews Message -->
        <div class="text-center py-5" data-aos="fade-up" data-aos-duration="800">
          <div class="card shadow-sm" style="max-width: 600px; margin: 0 auto; border: none;">
            <div class="card-body p-5">
              <i class="fa-regular fa-message" style="font-size: 48px; color: #104041; opacity: 0.3; margin-bottom: 20px;"></i>
              <h4 style="color: #104041;">No Reviews Yet</h4>
              <p class="text-muted">Client reviews are being added soon. Be the first to share your experience!</p>
              <a href="<?= $site ?>contact/" class="btn btn-primary mt-3 px-4 py-2" style="background: #104041; border-color: #104041; border-radius: 50px;">
                Start Your Project <i class="fa-solid fa-arrow-right ms-2"></i>
              </a>
            </div>
          </div>
        </div>
      <?php endif; ?>
      
    </div>
  </section>
  <!--===== TESTIMONIALS SECTION ENDS =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area py-5" style="background: #104041; position: relative; overflow: hidden;">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2" aria-hidden="true" style="position: absolute; opacity: 0.1;">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1" aria-hidden="true" style="position: absolute; opacity: 0.1;">
    <div class="container position-relative">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="text-white mb-3" style="font-weight: 700;">Ready to Become Our Next Success Story?</h2>
          <p class="text-white-50" style="font-size: 18px; max-width: 600px; margin: 0 auto;">
            Join businesses across India, Dubai, USA, UK and Australia who've grown with a NikhilWorks website.
          </p>
          <div class="mt-4" data-aos="fade-up" data-aos-duration="1200">
            <a href="<?= $site ?>contact/" class="btn btn-light px-5 py-3" style="border-radius: 50px; font-weight: 600; color: #104041; background: #fff; transition: all 0.3s;">
              Get A Free Quote <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Scripts -->
  <script src="<?= $site ?>assets/js/plugins/bootstrap.bundle.min.js"></script>
  <script src="<?= $site ?>assets/js/plugins/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init({
      once: true,
      offset: 50
    });
  </script>
</body>
</html>