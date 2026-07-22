<?php
include "config/connect.php";
include_once "util/function.php";

$limit = 3;
$contact = contact_us();
$blogs = get_blog($limit);
// Get portfolio items using your function
$portfolios = get_portfolio();
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
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Web Development Services Delhi | NikhilWorks</title>
  <meta name="description" content="Hire Nikhil Gupta, Delhi's top freelance web developer for custom websites, e-commerce solutions & responsive web design. Get affordable web development services with SEO optimization.">
  <meta name="keywords" content="web developer Delhi, web development company Delhi, e-commerce website developer, WordPress developer India, responsive web design, SEO services Delhi, freelance web developer">

  <!-- Open Graph Tags -->
  <meta property="og:title" content="Professional Web Development Services Delhi | NikhilWorks">
  <meta property="og:description" content="Hire Delhi's top freelance web developer for custom websites, e-commerce solutions & responsive web design.">
  <meta property="og:image" content="<?= $site ?>assets/img/web-development-services-delhi.jpg">
  <meta property="og:url" content="<?= $site ?>services/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Professional Web Development Services Delhi | NikhilWorks">
  <meta name="twitter:description" content="Hire Delhi's top freelance web developer for custom websites, e-commerce solutions & responsive web design.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/web-development-services-delhi.jpg">

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $site ?>services/">
  <!-- International SEO: hreflang tags -->
  <link rel="alternate" hreflang="en" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="en-IN" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="en-AE" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="en-US" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="en-GB" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="en-AU" href="<?= $site ?>services/">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>services/">

  <!-- Local Business Schema -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "NikhilWorks",
      "image": "<?= $site ?>assets/img/logo.png",
      "@id": "<?= $site ?>",
      "url": "<?= $site ?>",
      "telephone": "+91-8368552640",
      "priceRange": "₹₹",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Karampura",
        "addressLocality": "New Delhi",
        "addressRegion": "Delhi",
        "postalCode": "110015",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.6678,
        "longitude": 77.1378
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "09:00",
        "closes": "18:00"
      },
      "sameAs": [
        "https://www.facebook.com/profile.php?id=61559869365624",
        "https://www.instagram.com/nikhil_gupta_998/",
        "https://x.com/NikhilG69581514",
        "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
        "https://github.com/nikhilgupta-9",
        "https://dev.to/nikhil_gupta_c55a17d81e36",
        "https://hashnode.com/@nikhilworks",
        "https://www.producthunt.com/@nikhilgupta_9"
      ]
    }
  </script>


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

  <!--=====  JS SCRIPT LINK =======-->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?= $site ?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="<?= $site ?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="<?= $site ?>assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>Web Development Services</h1>
            <p class="text-dark">Build your online presence with high-quality, responsive, and SEO-friendly websites.</p>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> Services </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->


  <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="slider-section-area slider-inner sp5 d-none">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-2">
          <div class="sldier-head">
            <p>Trusted by <br class="d-lg-block d-none"> Top Companies</p>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="slider-images-area owl-carousel">
            <div class="img1">
              <img src="<?= $site ?>assets/img/elements/brand-img1.png" alt="">
            </div>
            <div class="img1">
              <img src="<?= $site ?>assets/img/elements/brand-img2.png" alt="">
            </div>
            <div class="img1">
              <img src="<?= $site ?>assets/img/elements/brand-img3.png" alt="">
            </div>
            <div class="img1">
              <img src="<?= $site ?>assets/img/elements/brand-img4.png" alt="">
            </div>
            <div class="img1">
              <img src="<?= $site ?>assets/img/elements/brand-img5.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== TESTIMONIAL AREA ENDS =======-->

  <!--===== CASE AREA STARTS =======-->
  <div class="case1-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="case-header-area heading2 text-center">
            <h2 class="text-anime-style-3">What I Offer</h2>
            <h3>Complete Digital Solutions for Your Business</h3>
            <h5>With over 5 years of experience, we provide end-to-end web development and digital marketing services to help your business succeed online.</h5>
          </div>
        </div>
      </div>
       <!-- Service Categories Tabs -->
      <div class="row mb-5">
        <div class="col-lg-12">
          <div class="service-categories text-center">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-outline-primary active">
                <input type="radio" name="options" id="option1" checked> Web Development
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="option2"> Digital Marketing
              </label>
              <label class="btn btn-outline-primary">
                <input type="radio" name="options" id="option3"> Design & Branding
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- Web Development Services -->
      <div class="service-category-content" id="web-development">
        <div class="row">

          <!-- Website Design & Development -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-code fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Website Design & Development</h3>
              <p class="service-tagline">SIMPLE, CLEAN & EFFECTIVE</p>
              <p class="service-description">Custom website development using modern technologies. We create responsive, user-friendly websites that convert visitors into customers and drive business growth.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Responsive Design</li>
                <li><i class="fa-solid fa-check"></i> Fast Loading Speed</li>
                <li><i class="fa-solid fa-check"></i> SEO Optimized</li>
                <li><i class="fa-solid fa-check"></i> Cross-browser Compatible</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/website-design-development/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- E-Commerce Development -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-cart-shopping fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>E-Commerce Solutions</h3>
              <p class="service-tagline">SELL ONLINE SUCCESSFULLY</p>
              <p class="service-description">Complete e-commerce website development with secure payment gateways, product management, and order processing systems to help you sell online effectively.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Payment Gateway Integration</li>
                <li><i class="fa-solid fa-check"></i> Inventory Management</li>
                <li><i class="fa-solid fa-check"></i> Mobile Shopping Cart</li>
                <li><i class="fa-solid fa-check"></i> Order Tracking System</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/e-commerce-website-development/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- WordPress Development -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-brands fa-wordpress fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>WordPress Development</h3>
              <p class="service-tagline">POWERFUL CMS SOLUTIONS</p>
              <p class="service-description">Custom WordPress websites and themes development. Easy-to-manage CMS solutions that give you full control over your website content.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Custom Theme Development</li>
                <li><i class="fa-solid fa-check"></i> Plugin Customization</li>
                <li><i class="fa-solid fa-check"></i> WooCommerce Setup</li>
                <li><i class="fa-solid fa-check"></i> Security Optimization</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/wordpress-website-development/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- PHP Development -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-brands fa-php fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>PHP Development</h3>
              <p class="service-tagline">PHP5 & PHP7 SOLUTIONS</p>
              <p class="service-description">Custom PHP web applications and dynamic websites built with Laravel, CodeIgniter, and custom frameworks for scalable business solutions.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Laravel Development</li>
                <li><i class="fa-solid fa-check"></i> CodeIgniter Framework</li>
                <li><i class="fa-solid fa-check"></i> Custom PHP Applications</li>
                <li><i class="fa-solid fa-check"></i> API Development</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/custom-php-development/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- Mobile App Development -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-mobile-screen-button fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Mobile App Development</h3>
              <p class="service-tagline">ANDROID & IOS APPS</p>
              <p class="service-description">Native and cross-platform mobile app development for Android and iOS. Create engaging mobile experiences for your customers.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> React Native Apps</li>
                <li><i class="fa-solid fa-check"></i> iOS App Development</li>
                <li><i class="fa-solid fa-check"></i> Android App Development</li>
                <li><i class="fa-solid fa-check"></i> App Store Optimization</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/mobile-app-development-services/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- Web Maintenance -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="200">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-screwdriver-wrench fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Website Maintenance</h3>
              <p class="service-tagline">QUICK & RELIABLE SUPPORT</p>
              <p class="service-description">Ongoing website maintenance, updates, and support services to keep your website running smoothly and securely.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Regular Updates</li>
                <li><i class="fa-solid fa-check"></i> Security Monitoring</li>
                <li><i class="fa-solid fa-check"></i> Backup Services</li>
                <li><i class="fa-solid fa-check"></i> Performance Optimization</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/website-maintenance-support/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Digital Marketing Services -->
      <div class="service-category-content d-none" id="digital-marketing">
        <div class="row">

          <!-- SEO Services -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-magnifying-glass-chart fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>SEO Services</h3>
              <p class="service-tagline">RANK HIGHER, GET MORE TRAFFIC</p>
              <p class="service-description">Comprehensive SEO services to improve your Google rankings and drive organic traffic to your website. Technical, on-page, and off-page SEO strategies.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Technical SEO Audit</li>
                <li><i class="fa-solid fa-check"></i> On-page Optimization</li>
                <li><i class="fa-solid fa-check"></i> Content Strategy</li>
                <li><i class="fa-solid fa-check"></i> Local SEO</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/search-engine-optimization/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- Digital Marketing -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-bullhorn fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Digital Marketing</h3>
              <p class="service-tagline">GROW YOUR ONLINE PRESENCE</p>
              <p class="service-description">Complete digital marketing strategies including social media marketing, content marketing, and online advertising to grow your brand online.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Social Media Marketing</li>
                <li><i class="fa-solid fa-check"></i> Content Strategy</li>
                <li><i class="fa-solid fa-check"></i> PPC Advertising</li>
                <li><i class="fa-solid fa-check"></i> Analytics & Reporting</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/website-redesign/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Design & Branding Services -->
      <div class="service-category-content d-none" id="design-branding">
        <div class="row">

          <!-- Graphic Design -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-pen-nib fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Graphic Design</h3>
              <p class="service-tagline">VISUALLY STUNNING DESIGNS</p>
              <p class="service-description">Creative graphic design services including brochures, banners, social media graphics, and marketing materials that reflect your brand identity.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Brand Identity Design</li>
                <li><i class="fa-solid fa-check"></i> Marketing Materials</li>
                <li><i class="fa-solid fa-check"></i> Social Media Graphics</li>
                <li><i class="fa-solid fa-check"></i> Print Design</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/landing-page-design/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

          <!-- Logo Design -->
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-card" data-aos="fade-up" data-aos-delay="100">
              <div class="service-header">
                <div class="service-icon">
                  <i class="fa-solid fa-copyright fa-2x"></i>
                </div>
                <div class="service-experience">
                  <span>Since 2021</span>
                </div>
              </div>
              <h3>Logo Design</h3>
              <p class="service-tagline">MEMORABLE BRAND IDENTITY</p>
              <p class="service-description">Professional logo design services that create memorable brand identities. We design logos that communicate your brand values and attract your target audience.</p>
              <ul class="service-features">
                <li><i class="fa-solid fa-check"></i> Custom Logo Design</li>
                <li><i class="fa-solid fa-check"></i> Brand Style Guide</li>
                <li><i class="fa-solid fa-check"></i> Multiple Concepts</li>
                <li><i class="fa-solid fa-check"></i> Vector Format Delivery</li>
              </ul>
              <div class="service-cta">
                <a href="<?= $site ?>contact/" class="btn-service">Get Quote</a>
                <a href="<?= $site ?>service/landing-page-design/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!--===== CASE AREA ENDS =======-->

  <!--===== PRICING AREA STARTS =======-->
  <div class="pricing-inner-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 m-auto">
          <div class="pricing-header heading8 text-center">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="assets/img/icons/logo-icons6.svg" alt="">Pricing &
              Plan</h5>
            <h2 class="text-anime-style-1">NikhilWorks <span>Pricing Plan <img src="assets/img/elements/line-img2.png"
                  alt=""></span></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Static Website -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea" data-aos="fade-up">
            <div class="pricing-badge">Most Popular</div>
            <h4>Static Website</h4>
            <p>Perfect for startups & personal portfolios</p>
            <div class="price-india">
              <h1>₹3,999 <span>One-Time</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>$49 <span>One-Time</span></h1>
            </div>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> 3-5 Pages (HTML5, CSS3, Bootstrap)</li>
              <li><i class="fa-solid fa-check text-success"></i> Mobile-First Responsive Design</li>
              <li><i class="fa-solid fa-check text-success"></i> JavaScript/jQuery Interactions</li>
              <li><i class="fa-solid fa-check text-success"></i> SEO Optimized Structure</li>
              <li><i class="fa-solid fa-check text-success"></i> Free Hosting Guidance</li>
              <li><i class="fa-solid fa-check text-success"></i> 1 Month Technical Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in Static Website package (₹3,499)" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- Dynamic Website -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea active" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-badge">Best Value</div>
            <h4>Dynamic Website</h4>
            <p>Database-driven business websites</p>
            <div class="price-india">
              <h1>₹8,999 <span>One-Time</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>$99 <span>One-Time</span></h1>
            </div>
            <div class="space20"></div>
            <ul class="text-light">
              <li><i class="fa-solid fa-check text-success"></i> 5-10 Pages (PHP + MySQL)</li>
              <li><i class="fa-solid fa-check text-success"></i> Admin Dashboard Panel</li>
              <li><i class="fa-solid fa-check text-success"></i> Contact Form + Email System</li>
              <li><i class="fa-solid fa-check text-success"></i> User Registration & Login</li>
              <li><i class="fa-solid fa-check text-success"></i> Content Management System</li>
              <li><i class="fa-solid fa-check text-success"></i> 3 Months Support & Maintenance</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in Dynamic Website package (₹7,999)" class="header-btn9">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- WordPress Website -->
       <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea" data-aos="fade-up" data-aos-delay="200">
            <h4>WordPress Website</h4>
            <p>Easy-to-manage CMS solution</p>
            <div class="price-india">
              <h1>₹5,999 <span>One-Time</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>$79 <span>One-Time</span></h1>
            </div>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> Premium Theme Installation</li>
              <li><i class="fa-solid fa-check text-success"></i> Essential Plugins Setup</li>
              <li><i class="fa-solid fa-check text-success"></i> Blog + Contact Forms</li>
              <li><i class="fa-solid fa-check text-success"></i> SEO Optimization</li>
              <li><i class="fa-solid fa-check text-success"></i> Basic Security Configuration</li>
              <li><i class="fa-solid fa-check text-success"></i> 2 Months Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in WordPress Website package (₹5,999)" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- View More Button -->
        <div class="btn-area1 text-center" data-aos="fade-up" data-aos-duration="1200">
          <a href="<?= $site ?>pricing/" class="header-btn11">View All Pricing <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!--===== PRICING AREA ENDS =======-->



  <!--===== CHOOSE AREA STARTS =======-->
  <div class="choose-section-area sp1">
    <img src="<?= $site ?>assets/img/bg/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto">
          <div class="choose-header-area text-center heading2">
            <h5>Why Choose Us</h5>
            <h2>Why Choose NikhilWorks?</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="accordian-tabs-area">
            <div class="accordion accordion-flush" id="accordionFlushExample">

              <!-- Item 1 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="true"
                    aria-controls="flush-collapseOne">
                    1. Custom Web Solutions
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    I build responsive, performance-focused websites using the latest technologies
                    like MERN stack, Laravel, and WordPress—tailored to your business goals.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    Whether it’s an e-commerce store or a personal portfolio, I ensure
                    scalable code and clean UI/UX.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- Item 2 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                    aria-controls="flush-collapseTwo">
                    2. Transparent Communication
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    I provide regular progress updates, clear timelines, and open
                    communication so you’re never left guessing.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    From kickoff to launch, every milestone is shared and documented.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- Item 3 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                    aria-controls="flush-collapseThree">
                    3. Proven Results
                  </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    My projects consistently improve client visibility, conversions,
                    and performance across devices and search engines.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    Real-world results: faster load times, higher SEO rankings, and measurable growth.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- Item 4 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                    aria-controls="flush-collapseFour">
                    4. End-to-End Support
                  </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    From concept and design to deployment and maintenance,
                    I provide full support for smooth project delivery.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    Need updates or new features later? I’m here for long-term collaboration.
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/service-img5.png" alt="">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2">
                  <img src="<?= $site ?>assets/img/all-images/service-img9.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CHOOSE AREA ENDS =======-->


  <!--===== BLOG AREA STARTS =======-->
  <div class="blog1-scetion-area sp2 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="blog-hedaer-area heading2 text-center">
            <h2>More Blogs & News</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($blogs as $blog) {
        ?>
          <div class="col-lg-4 col-md-6">
            <div class="blog-author-boxarea">
              <div class="img1">
                <img src="<?= $site ?>admin/uploads/blogs/<?= $blog['image'] ?>" alt="">
              </div>
              <div class="content-area">
                <div class="tags-area">
                  <ul>
                    <li><a href="#"><img src="<?= $site ?>assets/img/icons/contact1.svg" alt=""><?= $blog['author'] ?></a></li>
                    <li><a href="#"><img src="<?= $site ?>assets/img/icons/calender1.svg" alt=""><?= date('d M Y h:i A', strtotime($blog['created_at'])) ?></a></li>
                  </ul>
                </div>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>"><?= $blog['title'] ?></a>
                <p><?= $blog['meta_description'] ?> </p>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
              </div>
            </div>
            <div class="space30"></div>
          </div>
        <?php
        }
        ?>


      </div>
    </div>
  </div>
  <!--===== BLOG AREA ENDS =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h1 class="text-anime-style-1 text-light">Contact Nikhil Gupta <br class="d-md-block d-none"> Professional Web Developer & SEO Expert</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Looking to create a stunning website or improve your Google rankings? <br class="d-md-block d-none">Have a project in mind? Looking for a reliable <strong>web developer</strong> or <strong>SEO expert in India</strong> to grow your business online? I’m here to help! Whether you need a responsive website, a complete <strong>SEO strategy</strong>, or <strong>digital marketing solutions</strong>, feel free to reach out. I usually respond within 24 hours.</p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9"> Get A Free Consultation <i
                  class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Service Categories Script -->
  <script>
  $(document).ready(function() {
    $('.btn-group-toggle label').click(function() {
      var target = $(this).find('input').attr('id');
      
      // Hide all service categories
      $('.service-category-content').addClass('d-none');
      
      // Show selected category
      if (target === 'option1') {
        $('#web-development').removeClass('d-none');
      } else if (target === 'option2') {
        $('#digital-marketing').removeClass('d-none');
      } else if (target === 'option3') {
        $('#design-branding').removeClass('d-none');
      }
    });
  });
  </script>

  <style>
  .service-card {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    height: 100%;
  }
  
  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
  }
  
  .service-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
  }
  
  .service-icon {
    color: #104041;
  }
  
  .service-experience span {
    background: #104041;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }
  
  .service-card h3 {
    color: #104041;
    margin-bottom: 5px;
    font-size: 1.5rem;
  }
  
  .service-tagline {
    color: #666;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 0.9rem;
  }
  
  .service-description {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
  }
  
  .service-features {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
  }
  
  .service-features li {
    padding: 5px 0;
    color: #555;
  }
  
  .service-features i {
    color: #28a745;
    margin-right: 10px;
  }
  
  .service-cta {
    display: flex;
    gap: 10px;
  }
  
  .btn-service {
    background: #ADFF1C;
    color: #0a2b2c;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    flex: 1;
    text-align: center;
    transition: all 0.3s ease;
  }
  
  .btn-service:hover {
    background: #0a2b2c;
    color: white;
    transform: translateY(-2px);
  }
  
  .btn-service-outline {
    border: 2px solid #104041;
    color: #104041;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    flex: 1;
    text-align: center;
    transition: all 0.3s ease;
  }
  
  .btn-service-outline:hover {
    background: #104041;
    color: white;
  }
  
  .service-categories {
    margin-bottom: 40px;
  }
  
  .service-categories .btn {
    margin: 0 5px;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 600;
  }
  </style>

</body>

<!-- Mirrored from seoc-html-v2.vercel.app/service3.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 07 Sep 2025 00:36:18 GMT -->

</html>