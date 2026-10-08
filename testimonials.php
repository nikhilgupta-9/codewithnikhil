<?php
include "config/connect.php";
include_once "util/function.php";

$tests = testimonial();
$contact = contact_us() ?? [];

// Sort featured first, then by display_order
usort($tests, function ($a, $b) {
    if (($b['featured'] ?? 0) !== ($a['featured'] ?? 0)) {
        return ($b['featured'] ?? 0) <=> ($a['featured'] ?? 0);
    }
    return ($a['display_order'] ?? 0) <=> ($b['display_order'] ?? 0);
});

$reviewCount = count($tests);
$avgRating   = 5.0;
if ($reviewCount > 0) {
    $ratingSum = array_sum(array_map(fn($t) => (int)($t['rating'] ?? 5), $tests));
    $avgRating = round($ratingSum / $reviewCount, 1);
}

// Counts by type
$googleReviews = array_filter($tests, fn($t) => empty($t['review_source']) || $t['review_source'] === 'google' || (empty($t['video_url']) && empty($t['review_source'])));
$videoReviews  = array_filter($tests, fn($t) => ($t['review_source'] ?? '') === 'video' || !empty($t['video_url']));
$googleCount   = count($googleReviews);
$videoCount    = count($videoReviews);

$googleReviewLink = !empty($contact['google_review']) ? $contact['google_review'] : 'https://g.page/r/CQmElvl8iZYIEAE/review';
$googleMapLink    = !empty($contact['map']) ? $contact['map'] : 'https://maps.app.goo.gl/PLfRrejwQurxbFbKA';
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

  <title>Client Testimonials & Google Reviews | NikhilWorks</title>
  <meta name="description" content="Verified client reviews & video testimonials for NikhilWorks. Real feedback from business owners across India, Dubai, USA, UK, and Australia for web development & SEO.">
  <meta name="keywords" content="nikhilworks reviews, nikhilworks google reviews, client video testimonials web developer, verified client reviews nikhil gupta">

  <!-- Canonical & hreflang -->
  <link rel="canonical" href="<?= $site ?>testimonials/">
  <link rel="alternate" hreflang="en" href="<?= $site ?>testimonials/">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>testimonials/">

  <!-- Open Graph -->
  <meta property="og:title" content="Client Testimonials & Google Reviews | NikhilWorks">
  <meta property="og:description" content="Verified client reviews and video testimonials from businesses across India, Dubai, USA, UK, and Australia.">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.png">
  <meta property="og:url" content="<?= $site ?>testimonials/">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Client Testimonials & Google Reviews | NikhilWorks">
  <meta name="twitter:description" content="Verified client reviews and video testimonials for web development and SEO projects.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/preview.png">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS LINK -->
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
  <!-- Schema: AggregateRating & ProfessionalService -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks",
    "url": "<?= $site ?>",
    "image": "<?= $site ?>assets/img/preview.png",
    "priceRange": "$$",
    "telephone": "+918368552640",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "New Delhi",
      "addressCountry": "IN"
    },
    "aggregateRating": {
      "@type": "AggregateRating",
      "ratingValue": "<?= $avgRating ?>",
      "reviewCount": "<?= $reviewCount ?>",
      "bestRating": "5",
      "worstRating": "1"
    }
  }
  </script>
  <?php endif; ?>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
    }

    /* ---- MODERN HERO LIKE PORTFOLIO ---- */
    .page-modern-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 70px;
      overflow: hidden;
      color: #fff;
    }
    @media (max-width: 991px) {
      .page-modern-hero {
        padding: 110px 0 50px;
      }
    }

    .site-breadcrumb {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 30px;
      padding: 6px 18px;
      margin-bottom: 20px;
      font-size: 13.5px;
      backdrop-filter: blur(8px);
    }
    .site-breadcrumb a {
      color: #cbe3e1;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .site-breadcrumb a:hover {
      color: #ADFF1C;
    }
    .site-breadcrumb .bc-sep {
      color: rgba(255, 255, 255, 0.4);
      font-size: 10px;
    }
    .site-breadcrumb .bc-current {
      color: #ADFF1C;
      font-weight: 700;
    }

    .hero-pill-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 7px 16px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 18px;
      backdrop-filter: blur(8px);
      letter-spacing: 0.3px;
    }

    .page-modern-hero h1 {
      font-size: clamp(2.2rem, 4.2vw, 3.2rem);
      font-weight: 800;
      line-height: 1.18;
      color: #ffffff;
      margin-bottom: 16px;
      letter-spacing: -0.5px;
    }

    .page-modern-hero-sub {
      font-size: 1.12rem;
      line-height: 1.7;
      color: #c4dedb;
      max-width: 720px;
      margin: 0 auto;
    }

    /* Google Business Profile Showcase Box */
    .google-profile-card {
      background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
      border-radius: 20px;
      padding: 35px 30px;
      border: 1px solid #e2e8f0;
      box-shadow: 0 10px 30px rgba(66, 133, 244, 0.08);
      position: relative;
      overflow: hidden;
      margin-bottom: 45px;
    }
    .google-profile-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 5px;
      background: linear-gradient(90deg, #4285F4 0%, #EA4335 25%, #FBBC05 50%, #34A853 100%);
    }

    .google-logo-badge {
      width: 54px;
      height: 54px;
      background: #fff;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      border: 1px solid #eee;
    }

    .google-rating-score {
      font-size: 3.4rem;
      font-weight: 800;
      color: #1a202c;
      line-height: 1;
      letter-spacing: -1px;
    }

    .verified-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #e8f5e9;
      color: #2e7d32;
      font-size: 13px;
      font-weight: 700;
      padding: 5px 12px;
      border-radius: 20px;
      border: 1px solid #c8e6c9;
    }

    /* Interactive Filter Tabs */
    .testimonial-filter-nav {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 12px;
      margin-bottom: 40px;
      flex-wrap: wrap;
    }

    .filter-tab-btn {
      background: #ffffff;
      color: #4a5568;
      border: 2px solid #e2e8f0;
      border-radius: 50px;
      padding: 10px 24px;
      font-size: 15px;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .filter-tab-btn:hover {
      border-color: #104041;
      color: #104041;
      transform: translateY(-2px);
    }
    .filter-tab-btn.active {
      background: #104041;
      border-color: #104041;
      color: #ffffff;
      box-shadow: 0 6px 20px rgba(16, 64, 65, 0.25);
    }
    .filter-tab-btn .badge-count {
      background: rgba(0, 0, 0, 0.08);
      color: inherit;
      padding: 2px 8px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 700;
    }
    .filter-tab-btn.active .badge-count {
      background: rgba(255, 255, 255, 0.25);
    }

    /* Cards Common */
    .review-grid-item {
      transition: all 0.35s ease;
    }

    .testimonial-card-v2 {
      background: #ffffff;
      border-radius: 18px;
      padding: 28px 24px;
      box-shadow: 0 8px 30px rgba(0,0,0,0.05);
      transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
      height: 100%;
      border: 1px solid #f1f5f9;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .testimonial-card-v2:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 45px rgba(0,0,0,0.09);
      border-color: rgba(16, 64, 65, 0.15);
    }

    .google-badge-tag {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 11.5px;
      font-weight: 700;
      color: #1d4ed8;
      background: #eff6ff;
      padding: 4px 10px;
      border-radius: 20px;
      border: 1px solid #dbeafe;
    }

    /* Video Testimonial Card */
    .video-thumb-container {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 aspect */
      border-radius: 14px;
      overflow: hidden;
      margin-bottom: 18px;
      background: #0f172a;
      cursor: pointer;
    }
    .video-thumb-container img {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      transition: transform 0.4s ease;
    }
    .video-thumb-container:hover img {
      transform: scale(1.05);
    }
    .video-play-overlay {
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(15, 23, 42, 0.35);
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.3s ease;
    }
    .video-thumb-container:hover .video-play-overlay {
      background: rgba(15, 23, 42, 0.2);
    }
    .play-btn-circle {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background: #FF0000;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      box-shadow: 0 0 25px rgba(255, 0, 0, 0.7);
      transition: all 0.3s ease;
      padding-left: 4px;
    }
    .video-thumb-container:hover .play-btn-circle {
      transform: scale(1.15);
      background: #e60000;
      box-shadow: 0 0 35px rgba(255, 0, 0, 0.9);
    }
    .video-duration-badge {
      position: absolute;
      bottom: 10px;
      right: 10px;
      background: rgba(0, 0, 0, 0.8);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      padding: 3px 8px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      gap: 4px;
    }

    .client-avatar-v2 {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: linear-gradient(135deg, #104041, #1a6b6d);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      font-weight: 700;
      flex-shrink: 0;
      overflow: hidden;
      border: 2px solid #e2e8f0;
    }
    .client-avatar-v2 img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .client-name-v2 {
      font-weight: 700;
      font-size: 16.5px;
      color: #104041;
      margin-bottom: 2px;
    }

    .client-title-v2 {
      font-size: 13px;
      color: #64748b;
      display: block;
    }

    .stars-v2 {
      color: #FFBA00;
      font-size: 13.5px;
      letter-spacing: 2px;
    }

    .review-body-text {
      color: #475569;
      font-size: 14.5px;
      line-height: 1.7;
      margin-top: 14px;
      flex-grow: 1;
    }

    .card-footer-tags {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      margin-top: 18px;
      padding-top: 14px;
      border-top: 1px solid #f1f5f9;
      font-size: 12px;
      flex-wrap: wrap;
    }

    .project-pill-tag {
      background: #f8fafc;
      color: #475569;
      padding: 4px 12px;
      border-radius: 20px;
      border: 1px solid #e2e8f0;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }

    .external-review-link {
      color: #2563eb;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      transition: color 0.2s;
    }
    .external-review-link:hover {
      color: #1d4ed8;
      text-decoration: underline;
    }

    /* Video Lightbox Modal */
    .video-modal .modal-content {
      background: #000;
      border: none;
      border-radius: 16px;
      overflow: hidden;
    }
    .video-modal .modal-header {
      border: none;
      padding: 15px 20px;
      position: absolute;
      top: 0; right: 0; left: 0;
      z-index: 10;
      background: linear-gradient(180deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
    }
    .video-modal-ratio {
      position: relative;
      width: 100%;
      padding-top: 56.25%; /* 16:9 */
    }
    .video-modal-ratio iframe {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      border: 0;
    }

    @media (max-width: 768px) {
      .google-profile-card {
        padding: 25px 20px;
      }
      .google-rating-score {
        font-size: 2.8rem;
      }
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="page-modern-hero">
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row align-items-center text-center">
        <div class="col-lg-9 mx-auto">
          <!-- Site Breadcrumb Standard (Like Portfolio) -->
          <div class="site-breadcrumb" data-aos="fade-down" data-aos-duration="600">
            <a href="<?= $site ?>"><i class="fa-solid fa-house"></i> Home</a>
            <span class="bc-sep"><i class="fa-solid fa-angle-right"></i></span>
            <span class="bc-current">Testimonials & Reviews</span>
          </div>

          <div class="hero-pill-badge" data-aos="fade-up" data-aos-duration="700">
            <i class="fa-solid fa-star text-warning"></i> 100% Verified Client Feedback & Video Stories
          </div>
          <h1 data-aos="fade-up" data-aos-duration="800">Client Testimonials & Google Reviews</h1>
          <p class="page-modern-hero-sub" data-aos="fade-up" data-aos-duration="900">
            Real feedback, Google ratings & video case studies from business founders across <strong>India, Dubai, USA, UK & Australia</strong>.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== TESTIMONIALS SECTION =======-->
  <section class="testimonial4-section-area sp1 py-5">
    <div class="container">

      <!-- Google Business Profile Header Showcase Card -->
      <div class="google-profile-card" data-aos="fade-up" data-aos-duration="700">
        <div class="row align-items-center g-4">
          <div class="col-lg-4 col-md-5 text-center text-md-start">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-2">
              <div class="google-logo-badge">
                <img src="<?= $site ?>assets/img/icons/google.svg" alt="Google" width="30" height="30">
              </div>
              <div>
                <h5 class="mb-0 fw-bold" style="color: #104041;">Google Business Rating</h5>
                <span class="verified-pill mt-1">
                  <i class="fa-solid fa-circle-check"></i> 100% Verified Reviews
                </span>
              </div>
            </div>
            
            <div class="d-flex align-items-baseline justify-content-center justify-content-md-start gap-2 mt-3">
              <span class="google-rating-score"><?= number_format($avgRating, 1) ?></span>
              <div>
                <div class="stars-v2" role="img" aria-label="5 out of 5 stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
                <div class="text-muted fw-semibold" style="font-size: 13px;">
                  Based on <?= $reviewCount ?> client experiences
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-3 text-center border-start-md border-end-md py-2">
            <div class="row g-2">
              <div class="col-6">
                <div class="p-2 rounded-3 bg-white border">
                  <div class="fw-bold fs-4 text-primary"><?= $googleCount ?></div>
                  <div class="text-muted" style="font-size: 12px;">Google Reviews</div>
                </div>
              </div>
              <div class="col-6">
                <div class="p-2 rounded-3 bg-white border">
                  <div class="fw-bold fs-4 text-danger"><?= $videoCount ?></div>
                  <div class="text-muted" style="font-size: 12px;">Video Stories</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 text-center text-md-end">
            <div class="d-flex flex-column gap-2 justify-content-center">
              <a href="<?= htmlspecialchars($googleReviewLink) ?>" target="_blank" rel="noopener noreferrer" 
                 class="btn btn-primary px-4 py-2 fw-semibold" 
                 style="background: #104041; border-color: #104041; border-radius: 50px; font-size: 14px;">
                <i class="fa-brands fa-google me-2"></i> Write a Review on Google
              </a>
              <a href="<?= htmlspecialchars($googleMapLink) ?>" target="_blank" rel="noopener noreferrer" 
                 class="btn btn-outline-secondary px-4 py-2 fw-semibold" 
                 style="border-radius: 50px; font-size: 13px;">
                <i class="fa-solid fa-location-dot me-2 text-danger"></i> View on Google Maps
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Interactive Filter Tabs -->
      <div class="testimonial-filter-nav" data-aos="fade-up" data-aos-duration="800">
        <button class="filter-tab-btn active" onclick="filterReviews('all', this)">
          <i class="fa-solid fa-border-all"></i> All Reviews <span class="badge-count"><?= $reviewCount ?></span>
        </button>
        <button class="filter-tab-btn" onclick="filterReviews('google', this)">
          <img src="<?= $site ?>assets/img/icons/google.svg" alt="" width="16" height="16"> Google Reviews <span class="badge-count"><?= $googleCount ?></span>
        </button>
        <button class="filter-tab-btn" onclick="filterReviews('video', this)">
          <i class="fa-brands fa-youtube text-danger"></i> Video Stories <span class="badge-count"><?= $videoCount ?></span>
        </button>
      </div>

      <!-- Testimonials Grid -->
      <?php if ($reviewCount > 0): ?>
      <div class="row g-4" id="testimonialsGrid">
        <?php 
        foreach ($tests as $test): 
          $is_video = ($test['review_source'] ?? '') === 'video' || !empty($test['video_url']);
          $category = $is_video ? 'video' : 'google';
          $embed_url = $is_video ? get_video_embed_url($test['video_url'] ?? '') : '';
          $thumb_url = $is_video ? get_video_thumbnail_url($test['video_url'] ?? '', $test['video_thumbnail'] ?? '', $site) : '';
          $rating_val = intval($test['rating'] ?? 5);
          $avatar_img = !empty($test['client_photo']) ? $site . 'uploads/testimonials/' . htmlspecialchars($test['client_photo']) : '';
        ?>
          <div class="col-lg-4 col-md-6 review-grid-item" data-category="<?= $category ?>" data-aos="fade-up" data-aos-duration="600">
            <div class="testimonial-card-v2" itemscope itemtype="https://schema.org/Review">
              
              <!-- Source Badge -->
              <?php if ($is_video): ?>
                <span class="google-badge-tag" style="color: #e11d48; background: #fff1f2; border-color: #fecdd3;">
                  <i class="fa-brands fa-youtube text-danger"></i> Video Story
                </span>
              <?php else: ?>
                <span class="google-badge-tag">
                  <i class="fa-brands fa-google text-primary"></i> Verified Review
                </span>
              <?php endif; ?>

              <!-- Video Thumbnail Player Trigger (if video) -->
              <?php if ($is_video && !empty($embed_url)): ?>
                <div class="video-thumb-container" onclick="openVideoPlayer('<?= htmlspecialchars($embed_url, ENT_QUOTES) ?>', '<?= htmlspecialchars($test['client_name'], ENT_QUOTES) ?>')">
                  <img src="<?= htmlspecialchars($thumb_url) ?>" alt="<?= htmlspecialchars($test['client_name']) ?> Video Review" loading="lazy">
                  <div class="video-play-overlay">
                    <div class="play-btn-circle" title="Watch Video">
                      <i class="fa-solid fa-play"></i>
                    </div>
                  </div>
                  <div class="video-duration-badge">
                    <i class="fa-brands fa-youtube"></i> Watch
                  </div>
                </div>
              <?php endif; ?>

              <!-- Client Info Header -->
              <div class="d-flex align-items-center gap-3">
                <div class="client-avatar-v2" aria-hidden="true">
                  <?php if (!empty($avatar_img)): ?>
                    <img src="<?= $avatar_img ?>" alt="<?= htmlspecialchars($test['client_name']) ?>">
                  <?php else: ?>
                    <?= strtoupper(substr($test['client_name'], 0, 1)) ?>
                  <?php endif; ?>
                </div>
                <div>
                  <div class="client-name-v2" itemprop="author"><?= htmlspecialchars($test['client_name']) ?></div>
                  <span class="client-title-v2" itemprop="jobTitle">
                    <?= htmlspecialchars($test['client_title'] ?? 'Client') ?>
                    <?php if (!empty($test['client_company'])): ?>
                      • <strong><?= htmlspecialchars($test['client_company']) ?></strong>
                    <?php endif; ?>
                  </span>
                  
                  <div class="stars-v2 mt-1" role="img" aria-label="Rating: <?= $rating_val ?> out of 5 stars">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                      <i class="<?= $i <= $rating_val ? 'fa-solid' : 'fa-regular' ?> fa-star" aria-hidden="true"></i>
                    <?php endfor; ?>
                  </div>
                </div>
              </div>

              <!-- Review Text Body -->
              <div class="review-body-text" itemprop="reviewBody">
                "<?= htmlspecialchars($test['testimonial_text']) ?>"
              </div>

              <!-- Footer with project tag & link -->
              <div class="card-footer-tags">
                <span class="project-pill-tag" itemprop="about">
                  <i class="fa-regular fa-folder-open text-primary" aria-hidden="true"></i>
                  <?= htmlspecialchars(!empty($test['project_name']) ? $test['project_name'] : 'Web & SEO Project') ?>
                </span>

                <?php if ($is_video && !empty($embed_url)): ?>
                  <button type="button" class="btn btn-sm btn-link p-0 text-danger fw-bold text-decoration-none" onclick="openVideoPlayer('<?= htmlspecialchars($embed_url, ENT_QUOTES) ?>', '<?= htmlspecialchars($test['client_name'], ENT_QUOTES) ?>')">
                    <i class="fa-solid fa-play-circle me-1"></i> Play Story
                  </button>
                <?php elseif (!empty($test['google_review_url'])): ?>
                  <a href="<?= htmlspecialchars($test['google_review_url']) ?>" target="_blank" rel="noopener noreferrer" class="external-review-link">
                    <i class="fa-brands fa-google text-primary"></i> View on Maps <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 10px;"></i>
                  </a>
                <?php else: ?>
                  <span class="text-muted" style="font-size: 11.5px;">
                    <i class="fa-solid fa-shield-check text-success"></i> 100% Authentic
                  </span>
                <?php endif; ?>
              </div>

              <meta itemprop="datePublished" content="<?= date('Y-m-d', strtotime($test['project_date'] ?? $test['created_at'] ?? 'now')) ?>">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php else: ?>
        <!-- No Reviews State -->
        <div class="text-center py-5" data-aos="fade-up" data-aos-duration="800">
          <div class="card shadow-sm" style="max-width: 550px; margin: 0 auto; border: none; border-radius: 16px;">
            <div class="card-body p-5">
              <i class="fa-brands fa-google" style="font-size: 48px; color: #4285F4; opacity: 0.5; margin-bottom: 20px;"></i>
              <h4 style="color: #104041;">Be Our First Reviewer</h4>
              <p class="text-muted">Work with NikhilWorks and share your success story with our global clients.</p>
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

  <!-- Video Lightbox Player Modal -->
  <div class="modal fade video-modal" id="videoPlayerModal" tabindex="-1" aria-labelledby="videoPlayerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title text-white fw-bold mb-0" id="videoPlayerModalLabel">
            <i class="fa-brands fa-youtube text-danger me-2"></i> Client Video Testimonial
          </h6>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="closeVideoPlayer()"></button>
        </div>
        <div class="modal-body p-0">
          <div class="video-modal-ratio">
            <iframe id="videoPlayerIframe" src="" allowfullscreen allow="autoplay; encrypted-media"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area py-5" style="background: #104041; position: relative; overflow: hidden;">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2" aria-hidden="true" style="position: absolute; opacity: 0.1;">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1" aria-hidden="true" style="position: absolute; opacity: 0.1;">
    <div class="container position-relative">
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <h2 class="text-white mb-3" style="font-weight: 700;">Ready to Scale Your Business Like Them?</h2>
          <p class="text-white-50" style="font-size: 18px; max-width: 600px; margin: 0 auto;">
            Get high-performing web development and ROI-focused SEO built for speed and sales.
          </p>
          <div class="mt-4 d-flex justify-content-center gap-3 flex-wrap" data-aos="fade-up" data-aos-duration="1000">
            <a href="<?= $site ?>contact/" class="btn btn-light px-5 py-3" style="border-radius: 50px; font-weight: 700; color: #104041; background: #fff; transition: all 0.3s;">
              Get A Free Quote <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
            <a href="<?= htmlspecialchars($googleReviewLink) ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-light px-4 py-3" style="border-radius: 50px; font-weight: 600;">
              <i class="fa-brands fa-google me-1"></i> Leave a Google Review
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
    AOS.init({
      once: true,
      offset: 50
    });

    // Video Player Modal
    let playerModal = null;
    document.addEventListener('DOMContentLoaded', function() {
      const modalEl = document.getElementById('videoPlayerModal');
      if (modalEl) {
        playerModal = new bootstrap.Modal(modalEl);
        modalEl.addEventListener('hidden.bs.modal', function () {
          closeVideoPlayer();
        });
      }
    });

    function openVideoPlayer(embedUrl, clientName) {
      const titleEl = document.getElementById('videoPlayerModalLabel');
      const iframeEl = document.getElementById('videoPlayerIframe');
      if (titleEl) titleEl.innerHTML = '<i class="fa-brands fa-youtube text-danger me-2"></i> ' + clientName + ' — Client Story';
      if (iframeEl) iframeEl.src = embedUrl;
      if (playerModal) playerModal.show();
    }

    function closeVideoPlayer() {
      const iframeEl = document.getElementById('videoPlayerIframe');
      if (iframeEl) iframeEl.src = '';
    }

    // Filter Reviews (All / Google / Video)
    function filterReviews(category, btn) {
      document.querySelectorAll('.filter-tab-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const items = document.querySelectorAll('.review-grid-item');
      items.forEach(item => {
        const itemCat = item.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
          item.style.display = 'block';
          item.style.opacity = '1';
        } else {
          item.style.display = 'none';
          item.style.opacity = '0';
        }
      });
    }
  </script>
</body>
</html>