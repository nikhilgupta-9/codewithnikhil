<?php
include "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Affordable Web Development Pricing Plans India | CodeWithNikhil</title>
  <meta name="description" content="Professional web development pricing plans by Nikhil Gupta. Affordable static, dynamic, WordPress, MERN stack, and e-commerce website development in Delhi, India.">
  <meta name="keywords" content="web developer pricing india, website development cost delhi, affordable web design moti nagar, WordPress developer india, MERN stack developer, e-commerce website price, PHP developer delhi, freelance web developer rates">
  
  <!-- Canonical URL -->
  <link rel="canonical" href="<?=$site?>pricing/" />
  
  <!-- Open Graph Tags -->
  <meta property="og:title" content="Affordable Web Development Pricing Plans | CodeWithNikhil">
  <meta property="og:description" content="Professional web development services in Delhi. Static, Dynamic, WordPress, MERN Stack & E-commerce solutions at competitive prices.">
  <meta property="og:image" content="<?=$site?>assets/img/logo/og-pricing.jpg">
  <meta property="og:url" content="<?=$site?>pricing/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="CodeWithNikhil">
  
  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Web Development Pricing Plans | CodeWithNikhil">
  <meta name="twitter:description" content="Affordable web development solutions in Delhi, India. Get your website built with modern technologies.">
  
  <!-- Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Service",
    "name": "Web Development Services",
    "provider": {
      "@type": "Person",
      "name": "Nikhil Gupta",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Karampura",
        "addressRegion": "Delhi",
        "addressCountry": "IN"
      }
    },
    "areaServed": ["IN", "AE", "SA", "US", "GB", "CA", "AU"],
    "serviceType": "Web Development",
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Web Development Packages",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Static Website Development",
            "description": "Professional static website with HTML, CSS, JavaScript"
          },
          "price": "3999",
          "priceCurrency": "INR"
        },
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Service",
            "name": "Dynamic Website Development",
            "description": "PHP MySQL dynamic website with admin panel"
          },
          "price": "8999",
          "priceCurrency": "INR"
        }
      ]
    }
  }
  </script>

  <!--=====FAB ICON=======-->
  <link rel="shortcut icon" href="<?=$site?>assets/img/logo/fav-logo1.png" type="image/x-icon">

  <!--===== CSS LINK =======-->
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/sidebar.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/slick-slider.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/plugins/nice-select.css">
  <link rel="stylesheet" href="<?=$site?>assets/css/main.css">

  <!--=====  JS SCRIPT LINK =======-->
  <script src="<?=$site?>assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?=$site?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="<?=$site?>assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="<?=$site?>assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>Web Development Pricing Plans</h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>Pricing</span></a>
          </div>
          <div class="text-center">

            <p class="mt-3 text-dark">Transparent pricing for web development services across India & International markets</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== PRICING AREA STARTS =======-->
  <div class="pricing-inner-section-area sp2">
    <div class="container">
      <div class="heading2 text-center mb-5">
        <h5>Choose Your Plan</h5>
        <h2>Professional Web Development Packages</h2>
        <p>Competitive pricing for Indian market with international quality standards</p>
      </div>
      
      <!-- Pricing Tabs for Different Regions -->
      <div class="row justify-content-center mb-4">
        <div class="col-lg-8">
          <div class="pricing-region-tabs text-center">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-outline-primary active" data-region="india">India Pricing (₹)</button>
              <button type="button" class="btn btn-outline-primary" data-region="international">International ($)</button>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Static Website - Indian Price -->
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
              <li><i class="fa-solid fa-check text-success"></i> Free Domain & Hosting Guidance</li>
              <li><i class="fa-solid fa-check text-success"></i> 1 Month Technical Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in Static Website package (₹3,499)" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- Dynamic Website - Indian Price -->
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

        <!-- WordPress Website - Indian Price -->
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

        <!-- MERN Stack Website - Indian Price -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea" data-aos="fade-up">
            <h4>MERN Stack Application</h4>
            <p>Modern full-stack web applications</p>
            <div class="price-india">
              <h1>₹13,999 <span>One-Time</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>$159 <span>One-Time</span></h1>
            </div>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> React.js Frontend Development</li>
              <li><i class="fa-solid fa-check text-success"></i> Node.js + Express Backend</li>
              <li><i class="fa-solid fa-check text-success"></i> MongoDB Database Integration</li>
              <li><i class="fa-solid fa-check text-success"></i> RESTful API Development</li>
              <li><i class="fa-solid fa-check text-success"></i> Real-time Features</li>
              <li><i class="fa-solid fa-check text-success"></i> 4 Months Technical Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in MERN Stack package (₹12,999)" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- E-Commerce Website - Indian Price -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing-badge">Hot Deal</div>
            <h4>E-Commerce Store</h4>
            <p>Complete online selling solution</p>
            <div class="price-india">
              <h1>₹16,999 <span>One-Time</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>$209 <span>One-Time</span></h1>
            </div>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> Complete Online Store Setup</li>
              <li><i class="fa-solid fa-check text-success"></i> Payment Gateway Integration</li>
              <li><i class="fa-solid fa-check text-success"></i> Product Management System</li>
              <li><i class="fa-solid fa-check text-success"></i> Order & Inventory Management</li>
              <li><i class="fa-solid fa-check text-success"></i> Admin + Customer Panels</li>
              <li><i class="fa-solid fa-check text-success"></i> 6 Months Support & Updates</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I'm interested in E-Commerce package (₹16,999)" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

        <!-- Custom Web App - Indian Price -->
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="pricing-boxarea" data-aos="fade-up" data-aos-delay="200">
            <h4>Custom Enterprise Solution</h4>
            <p>Tailored solutions for unique needs</p>
            <div class="price-india">
              <h1>Custom Pricing <span>Project Basis</span></h1>
            </div>
            <div class="price-international d-none">
              <h1>Custom Pricing <span>Project Basis</span></h1>
            </div>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> Laravel / CodeIgniter / MERN</li>
              <li><i class="fa-solid fa-check text-success"></i> Custom Feature Development</li>
              <li><i class="fa-solid fa-check text-success"></i> Scalable Architecture</li>
              <li><i class="fa-solid fa-check text-success"></i> Advanced Security Features</li>
              <li><i class="fa-solid fa-check text-success"></i> Third-party API Integrations</li>
              <li><i class="fa-solid fa-check text-success"></i> Ongoing Maintenance & Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640?text=Hi! I need Custom Enterprise Solution - please share details" class="header-btn11">Discuss Project <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>

      </div>

      <!-- Additional Info Section -->
      <div class="row mt-5">
        <div class="col-lg-12">
          <div class="pricing-features-info text-center">
            <h3>Why Choose CodeWithNikhil?</h3>
            <div class="row mt-4">
              <div class="col-md-4" data-aos="fade-up">
                <div class="feature-item">
                  <i class="fa-solid fa-globe fa-2x codewithnikhil-primary-color mb-3"></i>
                  <h5>Global Delivery</h5>
                  <p>Serving clients across India, Middle East, Europe & USA</p>
                </div>
              </div>
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-item">
                  <i class="fa-solid fa-shield-alt fa-2x codewithnikhil-primary-color mb-3"></i>
                  <h5>Quality Assurance</h5>
                  <p>Enterprise-level code quality with best practices</p>
                </div>
              </div>
              <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-item">
                  <i class="fa-solid fa-headset fa-2x codewithnikhil-primary-color mb-3"></i>
                  <h5>24/7 Support</h5>
                  <p>Round-the-clock technical support available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== PRICING AREA ENDS =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="<?=$site?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?=$site?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h1 class="text-anime-style-1 text-light">Professional Web Developer & Digital Solutions Expert</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Serving clients across <strong>India (Delhi NCR, Mumbai, Bangalore)</strong>, <strong>Middle East (UAE, Saudi Arabia)</strong>, <strong>Europe (UK, Germany)</strong>, and <strong>North America</strong>. Specialized in creating high-performance websites that drive business growth and digital transformation.</p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?=$site?>contact/" class="header-btn9"> Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640" class="header-btn11 ml-3"> WhatsApp Now <i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Pricing Region Switch Script -->
  <script>
  $(document).ready(function() {
    $('[data-region="india"]').on('click', function() {
      $('[data-region="india"]').addClass('active');
      $('[data-region="international"]').removeClass('active');
      $('.price-india').removeClass('d-none');
      $('.price-international').addClass('d-none');
    });
    
    $('[data-region="international"]').on('click', function() {
      $('[data-region="international"]').addClass('active');
      $('[data-region="india"]').removeClass('active');
      $('.price-international').removeClass('d-none');
      $('.price-india').addClass('d-none');
    });
  });
  </script>

</body>
</html>