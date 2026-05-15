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
  <meta property="og:title" content="International Web Development Services | Code With Nikhil">
  <meta property="og:description" content="Professional web developer serving clients in USA, Australia, Europe, Dubai & India. Remote development with 24/7 support.">
  <meta property="og:image" content="https://codewithnikhil.in/assets/img/web-development-global.jpg">
  <meta property="og:url" content="https://codewithnikhil.in/services">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_AU">
  <meta property="og:locale:alternate" content="en_GB">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="International Web Development Services | Code With Nikhil">
  <meta name="twitter:description" content="Professional web developer serving clients in USA, Australia, Europe, Dubai & India.">
  <meta name="twitter:image" content="https://codewithnikhil.in/assets/img/web-development-global.jpg">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="https://codewithnikhil.in/services/">
  
  <!-- Hreflang Tags - ONLY if you have actual pages -->
  <!-- Remove these if you don't have /us/, /au/, /uk/ directories -->
  <!-- 
  <link rel="alternate" hreflang="en-in" href="https://codewithnikhil.in">
  <link rel="alternate" hreflang="en-us" href="https://codewithnikhil.in/us">
  <link rel="alternate" hreflang="en-au" href="https://codewithnikhil.in/au">
  <link rel="alternate" hreflang="en-gb" href="https://codewithnikhil.in/uk">
  <link rel="alternate" hreflang="en" href="https://codewithnikhil.in/international">
  <link rel="alternate" hreflang="x-default" href="https://codewithnikhil.in">
  -->
  
  <!-- Combined Schema - Single, accurate representation -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "Code With Nikhil - International Web Development",
    "image": "https://codewithnikhil.in/assets/img/logo.png",
    "@id": "https://codewithnikhil.in",
    "url": "https://codewithnikhil.in",
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
      "serviceUrl": "https://codewithnikhil.in/contact"
    },
    "sameAs": [
      "https://www.facebook.com/profile.php?id=61559869365624",
      "https://github.com/nikhilgupta-9",
      "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
      "https://x.com/NikhilG69581514"
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
            <h2>Why Choose Code With Nikhil?</h2>
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