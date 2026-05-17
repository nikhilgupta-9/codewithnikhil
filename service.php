<?php
include "config/connect.php";
include_once "util/function.php";

/* Check alias */
$cat_slug = $_GET['alias'] ?? '';

// if (empty($cat_slug)) {
//     header("Location: $site");
//     exit;
// }

/* Secure query */
$cat_slug = mysqli_real_escape_string($conn, $cat_slug);

$sql = "SELECT slug_url, cate_id FROM sub_categories WHERE slug_url = '$cat_slug'";
$res = mysqli_query($conn, $sql);

if (!$res || mysqli_num_rows($res) == 0) {
  // No category found
  header("Location: $site");
  exit;
}

$row = mysqli_fetch_assoc($res);
$cate_id = $row['cate_id'];

/* Other data */
$limit = 3;
$contact = contact_us();
$product_details = fetch_product_details($cate_id);
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
  
  <!-- Dynamic Title - Update your PHP to include international keywords -->
  <title><?= $product_details['meta_title'] ?> | Web Development for USA, Australia, Europe, Dubai, India</title>
  
  <!-- Dynamic Description - Update your PHP variables -->
  <meta name="description" content="<?= $product_details['meta_desc'] ?>">
  <meta name="keywords" content="<?= $product_details['meta_key'] ?>">
  
  <!-- Single Geo Tag - Choose ONE primary location -->
  <meta name="geo.region" content="IN-DL">
  <meta name="geo.placename" content="Delhi">
  <meta name="geo.position" content="28.6139;77.2090">
  <meta name="ICBM" content="28.6139, 77.2090">
  
  <!-- Open Graph - Make it global-friendly -->
  <meta property="og:title" content="International Web Development Services | NikhilWorks">
  <meta property="og:description" content="Professional web developer serving clients in USA, Australia, Europe, Dubai & India. Remote development with 24/7 support.">
  <meta property="og:image" content="<?= $site ?>assets/img/web-development-global.jpg">
  <meta property="og:url" content="<?= $site ?>/services">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_AU">
  <meta property="og:locale:alternate" content="en_GB">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="International Web Development Services | NikhilWorks">
  <meta name="twitter:description" content="Professional web developer serving clients in USA, Australia, Europe, Dubai & India.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/web-development-global.jpg">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $site ?>/services/">
  
  <!-- Hreflang Tags - ONLY if you have actual pages -->
  <!-- Remove these if you don't have /us/, /au/, /uk/ directories -->
  <!-- 
  <link rel="alternate" hreflang="en-in" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-us" href="<?= $site ?>/us">
  <link rel="alternate" hreflang="en-au" href="<?= $site ?>/au">
  <link rel="alternate" hreflang="en-gb" href="<?= $site ?>/uk">
  <link rel="alternate" hreflang="en" href="<?= $site ?>/international">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>">
  -->
  
  <!-- Combined Schema - Single, accurate representation -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "NikhilWorks - International Web Development",
    "image": "<?= $site ?>assets/img/logo.png",
    "@id": "<?= $site ?>",
    "url": "<?= $site ?>",
    "telephone": "+91-8368552640",
    "priceRange": "$$",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Delhi",
      "addressRegion": "Delhi",
      "addressCountry": "IN"
    },
    "areaServed": [
      {
        "@type": "Country",
        "name": "United States"
      },
      {
        "@type": "Country",
        "name": "Australia"
      },
      {
        "@type": "Country", 
        "name": "United Kingdom"
      },
      {
        "@type": "Country",
        "name": "United Arab Emirates"
      },
      {
        "@type": "Country",
        "name": "India"
      }
    ],
    "availableChannel": {
      "@type": "ServiceChannel",
      "serviceUrl": "<?= $site ?>/contact"
    },
    "sameAs": [
      "https://www.facebook.com/profile.php?id=61559869365624",
      "https://github.com/nikhilgupta-9",
      "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
      "https://x.com/NikhilG69581514"
    ]
  }
  </script>

  <!-- FAQPage Schema for AI & Featured Snippets -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "How long does it take to build a website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "A static website typically takes 3–5 days, a dynamic website with admin panel takes 1–3 weeks, and complex web applications take 4–8 weeks depending on features and requirements."
        }
      },
      {
        "@type": "Question",
        "name": "Do you provide website maintenance after launch?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. All plans include post-launch support — 1 month for static sites, 3 months for dynamic sites, and ongoing support for custom web applications."
        }
      },
      {
        "@type": "Question",
        "name": "Will my website be mobile-friendly and responsive?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Absolutely. Every website I build is fully responsive and tested across mobile, tablet, and desktop devices. Mobile-first design is a standard part of my development process."
        }
      },
      {
        "@type": "Question",
        "name": "Do you provide SEO optimization with the website?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. Every website includes on-page SEO basics — meta tags, schema markup, XML sitemap, robots.txt, and fast loading speed. Advanced SEO campaigns are available as separate packages."
        }
      },
      {
        "@type": "Question",
        "name": "Can you work with clients outside India?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes! I work remotely with clients from the USA, UK, Australia, UAE, and Canada. Communication happens via WhatsApp, Zoom, or email, and international payments are accepted."
        }
      },
      {
        "@type": "Question",
        "name": "What information do you need to start a web development project?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "To get started I need your business name, project goals, reference websites you like, logo/brand assets, and content (text and images). I can also help with content and design if you don't have them ready."
        }
      }
    ]
  }
  </script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
  
  <!-- CSS Links -->
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
  
  <!-- JS -->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    /* ---- Stats Counter ---- */
    .stat-number {
      font-size: 3rem;
      font-weight: 800;
      color: #ADFF1C;
      margin-bottom: 6px;
      line-height: 1.1;
    }

    /* ---- Process Steps ---- */
    .process-step-box {
      background: #fff;
      border: 2px solid #e8f0e8;
      border-radius: 16px;
      transition: all 0.35s ease;
    }
    .process-step-box:hover {
      border-color: #ADFF1C;
      box-shadow: 0 14px 38px rgba(16, 64, 65, 0.12);
      transform: translateY(-6px);
    }
    .step-number {
      font-size: 2.8rem;
      font-weight: 900;
      -webkit-text-stroke: 2px #104041;
      color: transparent;
      line-height: 1;
      font-family: 'Courier New', monospace;
    }

    /* ---- Tech Badges ---- */
    .tech-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #fff;
      border: 2px solid #e0e0e0;
      border-radius: 10px;
      padding: 10px 20px;
      font-weight: 600;
      color: #104041;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      cursor: default;
      white-space: nowrap;
    }
    .tech-badge:hover {
      border-color: #104041;
      background: #104041;
      color: #ADFF1C;
    }
    .tech-badge i { font-size: 1.2em; }

    /* ---- FAQ Accordion ---- */
    .faq-item {
      border: 1px solid #dde9dd !important;
      border-radius: 12px !important;
      overflow: hidden;
      background: #fff;
    }
    .faq-btn {
      background: #fff;
      color: #104041;
      font-weight: 600;
      font-size: 1rem;
      box-shadow: none !important;
      padding: 18px 22px;
    }
    .faq-btn:not(.collapsed) {
      background: #104041;
      color: #ADFF1C;
    }
    .faq-btn:not(.collapsed)::after {
      filter: brightness(10);
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?= $site ?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="<?= $site ?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="<?= $site ?>assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="about-inner-header heading9 text-center">
          <h1><?= $product_details['pro_name'] ?></h1>
          <p class="text-dark mt-3">
            I design and develop fast, secure, and SEO-optimized websites that help
            businesses grow online. Serving startups, local businesses, and enterprises
            across <strong>Delhi NCR</strong>.
          </p>
          <a href="<?= $site ?>contact/" class="header-btn8 mt-3 text-light">
            Get Free Consultation <i class="fa-solid fa-arrow-right"></i>
          </a>
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

  <!-- Service Overview -->
  <section class="container py-5">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <h2 class="h1 mb-3"><?= $product_details['pro_name'] ?></h2>
        <?= $product_details['short_desc'] ?>
        <br>
        <?= $product_details['description'] ?>
      </div>

      <div class="col-lg-6">
        <img src="<?= $site ?>admin/assets/img/uploads/<?= $product_details['pro_img'] ?>"
          class="img-fluid rounded "
          alt="Professional Web Development Services in Delhi NCR">
      </div>
    </div>
  </section>

  <!--===== STATS AREA STARTS =======-->
  <section class="py-5" style="background: #104041;">
    <div class="container">
      <div class="row g-4 text-center text-white">
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="600">
          <h2 class="stat-number">50+</h2>
          <p class="mb-0 opacity-75">Projects Completed</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="800">
          <h2 class="stat-number">3+</h2>
          <p class="mb-0 opacity-75">Years of Experience</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="1000">
          <h2 class="stat-number">100%</h2>
          <p class="mb-0 opacity-75">Client Satisfaction</p>
        </div>
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-duration="1200">
          <h2 class="stat-number">24/7</h2>
          <p class="mb-0 opacity-75">Support Available</p>
        </div>
      </div>
    </div>
  </section>
  <!--===== STATS AREA ENDS =======-->


  <section class="bg-light py-5">
    <div class="container">
      <h2 class="h1 text-center mb-5">Types of Websites I Build</h2>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="service-card text-center p-4 shadow-sm h-100">
            <i class="fa-solid fa-code fa-2x text-primary mb-3"></i>
            <h5>Static Websites</h5>
            <p>
              Clean, fast, and lightweight websites ideal for portfolios,
              landing pages, and small businesses.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card text-center p-4 shadow-sm h-100">
            <i class="fa-solid fa-database fa-2x text-primary mb-3"></i>
            <h5>Dynamic Websites</h5>
            <p>
              PHP / MySQL based websites with admin panels, forms, dashboards,
              and custom functionality.
            </p>
          </div>
        </div>

        <div class="col-md-4">
          <div class="service-card text-center p-4 shadow-sm h-100">
            <i class="fa-solid fa-cart-shopping fa-2x text-primary mb-3"></i>
            <h5>Custom Web Applications</h5>
            <p>
              Advanced applications built using MERN, Laravel, or custom stacks
              for scalable business needs.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--===== PROCESS AREA STARTS =======-->
  <section class="sp1">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 m-auto text-center heading2">
          <h5>My Workflow</h5>
          <h2>How I Deliver Your Project</h2>
          <p class="text-muted">A proven 4-step process that turns your idea into a live, high-performing website — on time, every time.</p>
        </div>
      </div>
      <div class="row g-4">

        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="600">
          <div class="process-step-box text-center p-4 h-100">
            <div class="step-number">01</div>
            <div class="my-3"><i class="fa-solid fa-magnifying-glass fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Discovery</h5>
            <p class="text-muted small mb-0">We discuss your goals, target audience, and project requirements in detail.</p>
          </div>
        </div>

        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="800">
          <div class="process-step-box text-center p-4 h-100">
            <div class="step-number">02</div>
            <div class="my-3"><i class="fa-solid fa-pen-nib fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Design</h5>
            <p class="text-muted small mb-0">UI/UX wireframes and design mockups tailored to your brand identity.</p>
          </div>
        </div>

        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
          <div class="process-step-box text-center p-4 h-100">
            <div class="step-number">03</div>
            <div class="my-3"><i class="fa-solid fa-code fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Development</h5>
            <p class="text-muted small mb-0">Clean, scalable code with regular progress updates and feedback loops.</p>
          </div>
        </div>

        <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1200">
          <div class="process-step-box text-center p-4 h-100">
            <div class="step-number">04</div>
            <div class="my-3"><i class="fa-solid fa-rocket fa-2x" style="color:#104041;"></i></div>
            <h5 class="fw-bold">Launch</h5>
            <p class="text-muted small mb-0">Testing, deployment, and post-launch support to ensure everything runs perfectly.</p>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!--===== PROCESS AREA ENDS =======-->

  <!--===== TECH STACK AREA STARTS =======-->
  <section class="py-5 bg2">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 m-auto text-center heading2">
          <h5>Technologies</h5>
          <h2>Tech Stack I Work With</h2>
          <p class="text-muted">Modern, battle-tested technologies to build reliable, scalable, and lightning-fast web solutions.</p>
        </div>
      </div>
      <div class="row g-3 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-php" style="color:#7a86b8;"></i> PHP</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-solid fa-database" style="color:#00758f;"></i> MySQL</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-js" style="color:#f7df1e;"></i> JavaScript</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-react" style="color:#61dafb;"></i> React.js</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-laravel" style="color:#ff2d20;"></i> Laravel</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-wordpress" style="color:#21759b;"></i> WordPress</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-bootstrap" style="color:#7952b3;"></i> Bootstrap</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-node-js" style="color:#68a063;"></i> Node.js</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-html5" style="color:#e34c26;"></i> HTML5</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-css3-alt" style="color:#264de4;"></i> CSS3</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-brands fa-git-alt" style="color:#f05032;"></i> Git</div></div>
        <div class="col-auto"><div class="tech-badge"><i class="fa-solid fa-leaf" style="color:#4db33d;"></i> MongoDB</div></div>
      </div>
    </div>
  </section>
  <!--===== TECH STACK AREA ENDS =======-->


  <!-- Key Features / Benefits -->
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


  <!--===== PRICING AREA STARTS =======-->
  <div class="pricing-section-area sp2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 m-auto">
          <div class="pricing-header heading8 text-center">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="assets/img/icons/logo-icons6.svg" alt="">Pricing &
              Plan</h5>
            <h2 class="text-anime-style-1">
              Transparent <span>Pricing Plans <img src="assets/img/elements/line-img2.png" alt=""></span>
            </h2>

          </div>
        </div>
      </div>
      <div class="row">
        <!-- Static Website -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-boxarea">
            <h4>Static Website</h4>
            <p>Perfect for personal portfolios or small businesses.</p>
            <h1>₹3,999 <span>One-Time</span></h1>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> 1-5 Pages (HTML, CSS, Bootstrap)</li>
              <li><i class="fa-solid fa-check text-success"></i> Mobile Responsive Design</li>
              <li><i class="fa-solid fa-check text-success"></i> Free Hosting Guidance</li>
              <li><i class="fa-solid fa-check text-success"></i> 1 Month Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- Dynamic Website -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-boxarea active">
            <h4>Dynamic Website</h4>
            <p>Great for businesses needing database-driven features.</p>
            <h1>₹8,999 <span>One-Time</span></h1>
            <div class="space20"></div>
            <ul class="text-light">
              <li><i class="fa-solid fa-check text-success"></i> 5-10 Pages (PHP + MySQL)</li>
              <li><i class="fa-solid fa-check text-success"></i> Admin Panel for Management</li>
              <li><i class="fa-solid fa-check text-success"></i> Contact Form + Email Integration</li>
              <li><i class="fa-solid fa-check text-success"></i> 3 Months Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640" class="header-btn9">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- WordPress Website -->
        <div class="col-lg-4 col-md-6">
          <div class="pricing-boxarea">
            <h4>Custom Web Application</h4>
            <p>Tailor-made solutions for your unique requirements.</p>
            <h1>Contact Us <span>For Pricing</span></h1>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> Built on any Technology (PHP, MERN, Laravel)</li>
              <li><i class="fa-solid fa-check text-success"></i> Custom Features</li>
              <li><i class="fa-solid fa-check text-success"></i> Scalable & Secure</li>
              <li><i class="fa-solid fa-check text-success"></i> Full Support & Maintenance</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640" class="header-btn11">Contact Now <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== PRICING AREA ENDS =======-->

  <!--===== FAQ AREA STARTS =======-->
  <section class="sp1">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-7 m-auto text-center heading2">
          <h5>FAQs</h5>
          <h2>Frequently Asked Questions</h2>
          <p class="text-muted">Got questions? I've got answers. Here are the most common things clients ask before starting a project.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="accordion d-flex flex-column gap-3" id="serviceFaqAccordion">

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true">
                  How long does it take to build a website?
                </button>
              </h3>
              <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  A <strong>static website</strong> typically takes <strong>3–5 days</strong>, a dynamic website with a custom admin panel takes <strong>1–3 weeks</strong>, and complex web applications may take <strong>4–8 weeks</strong> depending on features and requirements.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false">
                  Do you provide website maintenance after launch?
                </button>
              </h3>
              <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! All plans include post-launch support — <strong>1 month</strong> for static sites, <strong>3 months</strong> for dynamic sites, and <strong>ongoing support</strong> for custom web applications. Long-term maintenance contracts are also available.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false">
                  Will my website be mobile-friendly and responsive?
                </button>
              </h3>
              <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Absolutely. Every website I build is <strong>fully responsive</strong> and thoroughly tested across mobile, tablet, and desktop devices. Mobile-first design is a standard part of my development workflow.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false">
                  Do you provide SEO optimization with the website?
                </button>
              </h3>
              <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes. Every website I deliver includes <strong>on-page SEO basics</strong> — meta tags, schema markup (JSON-LD), XML sitemap, robots.txt, image optimization, and fast page load speed. Advanced monthly SEO campaigns are available as a separate package.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false">
                  Can you work with clients outside India?
                </button>
              </h3>
              <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  Yes! I work remotely with clients from the <strong>USA, UK, Australia, UAE, Canada,</strong> and beyond. All communication happens via WhatsApp, Zoom, or email. International payments are fully supported.
                </div>
              </div>
            </div>

            <div class="accordion-item faq-item">
              <h3 class="accordion-header">
                <button class="accordion-button faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false">
                  What do I need to provide to start the project?
                </button>
              </h3>
              <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#serviceFaqAccordion">
                <div class="accordion-body text-muted">
                  To get started I need your business name, project goals, reference websites you like, your logo/brand assets, and content (text and images). No worries if you don't have everything ready — I can help with copywriting and design too.
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--===== FAQ AREA ENDS =======-->

  <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="testimonial1-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="testimonial-header heading2 text-center">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star2 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star3 keyframe5">
            <h5>Testimonials</h5>
            <h2>What Our Client Say <br class="d-md-block d-none"> On Google Reviews</h2>
            <p>Don't just take our word for it. Hear what our satisfied clients <br class="d-md-block d-none"> have to say about their experience partnering with SEOC</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="testimonials-slider-area owl-carousel">
            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"CodeByNikhil built my business website <a href="https://bestok.in/">Bestok</a> and handled everything from design to SEO. Very professional and supportive throughout the process. Highly recommended!"</p>
                    <div class="space100"></div>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Priya (Noida)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img4.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Amazing work! Harsh Bhai Patel here. Nikhil developed an e-commerce website for my shop and integrated online payments. Great experience working with him!"</p>
                    <div class="space100"></div>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Harsh Bhai Patel (Nasik)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img5.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Sameer here from Saharanpur. CodeByNikhil made my business visible online. I got more customers after the website <a href="https://earnova.co.in/">Earnova</a> launch. SEO work is also great!"</p>
                    <div class="space100"></div>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Sameer Gaur (Saharanpur)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img3.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Rohit Kumar here from Delhi. Nikhil helped me design a custom Dashboard website <a href="https://marketmindinsight.com/">Market Mind Insight</a> and guided me in digital marketing. Excellent communication and support!"</p>
                    <div class="space100"></div>
                    <div class="space30"></div>
                    <div class="list-area">
                      <div class="list">
                        <ul>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                          <li><i class="fa-solid fa-star"></i></li>
                        </ul>
                        <a href="#">Rohit Kumar (Karampura, Delhi)</a>
                      </div>
                      <img src="<?= $site ?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?= $site ?>assets/img/all-images/testimonials-img6.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== TESTIMONIAL AREA ENDS =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="<?= $site ?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h1 class="text-anime-style-1 text-light">Freelance Web Developer in Delhi NCR – Serving Moti Nagar, Punjabi Bagh & Karampura</h1>
            <p data-aos="fade-up" data-aos-duration="1000">
              Looking for a reliable <strong>freelance web developer in Delhi NCR</strong>?
              I serve businesses in Moti Nagar, Punjabi Bagh, Karampura, and nearby areas
              with professional web development and SEO services.
            </p>

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

  </main>

  <?php include_once "includes/footer.php"; ?>

  <script src="assets/js/plugins/bootstrap.bundle.min.js"></script>
</body>

</html>