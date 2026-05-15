<?php
include_once "config/connect.php";
include_once "util/function.php";

$limit = 2;
$blogs = get_blog($limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Primary Title for International Reach -->
  <title>NikhilWorks | Web Development & SEO Services - India, Dubai, USA, UK, Australia</title>

  <!-- Multilingual and Geographic Targeting -->
  <meta name="description" content="Professional Web Developer & SEO Expert Nikhil provides custom web solutions and digital marketing services for businesses in India (Mumbai, Delhi NCR, Bangalore, Pune), Dubai, USA, UK, Australia, New Zealand, and Western Europe. Let's build your online presence together.">

  <!-- Location-Specific Keywords -->
  <meta name="keywords" content="Web Developer India, Web Development Dubai, SEO Expert USA, Website Developer UK, Digital Marketing Australia, Web Design New Zealand, Freelance Developer Mumbai, SEO Services Delhi, Bangalore Web Developer, Pune IT Services, European Web Development, Dubai Digital Agency">

  <!-- Local Business Schema - Important for Google -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "NikhilWorks",
      "description": "Web Development and SEO Services",
      "url": "<?= $site ?>",
      "serviceArea": {
        "@type": "GeoCircle",
        "geoMidpoint": {
          "@type": "GeoCoordinates",
          "latitude": "20.5937",
          "longitude": "78.9629"
        },
        "geoRadius": "10000000",
        "description": "Serving clients in India, Dubai, USA, UK, Australia, New Zealand, and Western Europe"
      },
      "areaServed": [{
          "@type": "City",
          "name": "Mumbai"
        },
        {
          "@type": "City",
          "name": "Delhi NCR"
        },
        {
          "@type": "City",
          "name": "Bangalore"
        },
        {
          "@type": "City",
          "name": "Pune"
        },
        {
          "@type": "Country",
          "name": "United Arab Emirates"
        },
        {
          "@type": "Country",
          "name": "United Kingdom"
        },
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
          "name": "New Zealand"
        }
      ],
      "availableLanguage": ["English", "Hindi"]
    }
  </script>

  <!-- WebSite Schema — Google entity recognition + Sitelinks -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "NikhilWorks",
      "url": "<?= $site ?>",
      "description": "Professional web development and SEO services for businesses in India, UAE, USA, UK, and Australia.",
      "inLanguage": "en",
      "publisher": {
        "@type": "Person",
        "name": "Nikhil Gupta"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": {
          "@type": "EntryPoint",
          "urlTemplate": "<?= $site ?>?s={search_term_string}"
        },
        "query-input": "required name=search_term_string"
      }
    }
  </script>

  <!-- Person Schema — AI systems identify Nikhil as a known entity -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Nikhil Gupta",
      "jobTitle": "Freelance Web Developer & SEO Expert",
      "description": "Professional freelance web developer and SEO expert based in Delhi NCR. 3+ years of experience building websites and digital marketing solutions for businesses globally.",
      "url": "<?= $site ?>",
      "image": "<?= $site ?>assets/img/all-images/auhtor-img1.png",
      "email": "contact@nikhilworks.com",
      "telephone": "+91-8368552640",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Karampura",
        "addressRegion": "Delhi",
        "addressCountry": "IN"
      },
      "knowsAbout": [
        "Web Development",
        "SEO",
        "Digital Marketing",
        "PHP",
        "MySQL",
        "WordPress",
        "MERN Stack",
        "JavaScript",
        "E-commerce Development"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Web & Digital Services",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Website Development",
              "description": "Custom responsive website development for businesses"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "SEO Services",
              "description": "Search engine optimization for higher Google rankings"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "E-commerce Development",
              "description": "Online store development with payment integration"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Social Media Marketing",
              "description": "Social media management and paid ad campaigns"
            }
          }
        ]
      },
      "sameAs": [
        "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
        "https://github.com/nikhilgupta-9",
        "https://x.com/NikhilG69581514"
      ]
    }
  </script>

  <!-- FAQPage Schema — AI systems extract these directly for answers -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "What web development services does NikhilWorks offer?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "NikhilWorks offers custom website development, e-commerce solutions, WordPress development, SEO services, social media marketing, landing page design, and website redesign. All services are available for clients in India, UAE, USA, UK, and Australia."
          }
        },
        {
          "@type": "Question",
          "name": "How much does a website cost in India?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Website development costs in India vary by type. A basic static website starts from ₹5,000–₹15,000, a dynamic business website ranges from ₹15,000–₹50,000, and a full e-commerce website starts from ₹30,000 onwards. NikhilWorks offers affordable packages tailored to your budget."
          }
        },
        {
          "@type": "Question",
          "name": "Do you work with international clients outside India?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. NikhilWorks works with clients globally — including businesses in Dubai (UAE), United States, United Kingdom, Australia, and New Zealand. All communication is in English and projects are delivered remotely."
          }
        },
        {
          "@type": "Question",
          "name": "How long does it take to build a website?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "A basic static website typically takes 3–5 days. A dynamic business website with a CMS takes 1–2 weeks. A full e-commerce website can take 2–4 weeks depending on the number of products and features required."
          }
        },
        {
          "@type": "Question",
          "name": "Do you provide SEO services for international markets?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Yes. NikhilWorks provides international SEO services targeting markets in USA, UK, UAE, Australia, and other global regions. Services include keyword research, on-page optimization, backlink building, and Google Search Console setup."
          }
        },
        {
          "@type": "Question",
          "name": "What technologies does Nikhil use for web development?",
          "acceptedAnswer": {
            "@type": "Answer",
            "text": "Nikhil uses PHP, MySQL, HTML5, CSS3, JavaScript, Bootstrap, WordPress, and the MERN stack (MongoDB, Express.js, React, Node.js) for web development projects."
          }
        }
      ]
    }
  </script>

  <!-- Open Graph with International Appeal -->
  <meta property="og:title" content="NikhilWorks - Web Development & SEO for Global Businesses">
  <meta property="og:description" content="Building websites and SEO strategies for businesses worldwide. Based in India, serving clients in Dubai, USA, UK, Australia, New Zealand, and major Indian cities including Mumbai, Delhi, Bangalore, Pune.">
  <meta property="og:image" content="<?= $site ?>assets/img/preview.jpg">
  <meta property="og:url" content="<?= $site ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:locale" content="en_US">
  <meta property="og:locale:alternate" content="en_GB">
  <meta property="og:locale:alternate" content="en_AU">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="NikhilWorks - Web Development & SEO for Global Businesses">
  <meta name="twitter:description" content="Professional web development & SEO services. Based in India, serving clients globally in UAE, USA, UK, Australia.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/preview.jpg">

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $site ?>">

  <!-- Hreflang Tags for International Targeting -->
  <link rel="alternate" hreflang="en" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-in" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-us" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-gb" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-au" href="<?= $site ?>">
  <link rel="alternate" hreflang="en-nz" href="<?= $site ?>">
  <link rel="alternate" hreflang="x-default" href="<?= $site ?>">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins/aos.css">
  <link rel="stylesheet" href="assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
  <link rel="stylesheet" href="assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="assets/css/plugins/sidebar.css">
  <link rel="stylesheet" href="assets/css/plugins/slick-slider.css">
  <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- JS Script -->
  <script src="assets/js/plugins/jquery-3-6-0.min.js"></script>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="hero5-section-area"
    style="background-image: url(<?= $site ?>assets/img/bg/header-bg5.png);  background-repeat: no-repeat; background-size: cover;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="header-content-area heading9">
            <h5><img src="<?= $site ?>assets/img/icons/logo-icons5.svg" alt="">Top Web Developer & SEO Expert in Delhi NCR</h5>
            <h1 class="text-anime-style-2">Boost Your Business With Professional Website & SEO Services</h1>
            <p data-aos="fade-left" data-aos-duration="1000">NikhilWorks provides expert web development and SEO services in Delhi NCR, Uttar Pradesh, Gujarat, and across India. We help businesses increase online visibility, drive targeted traffic, and generate more customers through effective digital marketing strategies.</p>
            <div class="btn-area1" data-aos="fade-left" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="<?= $site ?>portfolio.php" class="header-btn10">View Our Work <i class="fa-solid fa-arrow-right"></i></a>
            </div>

            <!-- Local SEO Badges -->
            <div class="local-seo-badges" data-aos="fade-up" data-aos-duration="1500">
              <span class="badge">Web Developer Delhi</span>
              <span class="badge">SEO Expert NCR</span>
              <span class="badge">Website Developer UP</span>
              <span class="badge">SEO Services Gujarat</span>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="hero-images-area">
            <div class="imges">
              <img src="<?= $site ?>assets/img/all-images/header-img8.png" alt="" data-aos="zoom-in" data-aos-duration="1000">
            </div>
            <div class="imges1">
              <img src="<?= $site ?>assets/img/bg/header-bg6.png" alt="">
            </div>
            <div class="auhtor-images">
              <div class="img1">
                <img src="<?= $site ?>assets/img/all-images/auhtor-img1.png" alt="" class="author-img1 aniamtion-key-2">
                <img src="<?= $site ?>assets/img/icons/sound-icons3.svg" alt="" class="sound-icons3 aniamtion-key-1">
                <img src="<?= $site ?>assets/img/icons/lite-icons2.svg" alt="" class="lite-icons2 aniamtion-key-1">
                <img src="<?= $site ?>assets/img/elements/elements11.svg" alt="" class="elements11">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== ABOUT AREA STARTS =======-->
  <!-- <div class="about5-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto">
          <div class="about5-header text-center heading10">
            <h5><img src="<?= $site ?>assets/img/icons/logo-icons6.svg" alt="">Welcome to SEO Agency</h5>
            <h2 class="text-anime-style-3">Meet NikhilWorks Your Trusted SEO & Digital Marketing Partner</h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1 image-anime reveal">
                  <img src="<?= $site ?>assets/img/all-images/about-img5.png" alt="">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2 image-anime reveal">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about5-content-area heading10">
            <h3 class="text-anime-style-3">Expert Web Development & SEO Services to Grow Your Business Online</h3>
            <p data-aos="fade-left" data-aos-duration="1000">At NikhilWorks, I understand that every business in Delhi NCR and across India has unique digital needs. With years of hands-on experience in web development and SEO, I provide personalized solutions that actually work. Unlike large agencies, I offer direct communication and focused attention to ensure your website not only looks great but also ranks well on Google.</p>
            <div class="space32"></div>
            <div class="about5-boxarea">
              <div class="row">
                <div class="col-lg-12">
                  <div class="about5-boxes" data-aos="fade-left" data-aos-duration="1200">
                    <h3>Web Development Expertise</h3>
                    <div class="about5-bar">
                      <span class="about5-per" style="width: 92%">
                        <span class="per">92%</span>
                      </span>
                    </div>
                    <p class="skill-desc">Custom websites, e-commerce solutions, and responsive designs that work perfectly on all devices</p>
                  </div>
                  <div class="space40"></div>
                </div>

                <div class="col-lg-12">
                  <div class="about5-boxes" data-aos="fade-left" data-aos-duration="1300">
                    <h3>SEO & Digital Marketing</h3>
                    <div class="about5-bar2">
                      <span class="about5-per2" style="width: 88%">
                        <span class="per">88%</span>
                      </span>
                    </div>
                    <p class="skill-desc">Proven strategies to improve your Google rankings, attract more customers, and increase conversions</p>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="about5-boxes" data-aos="fade-left" data-aos-duration="1350">
                    <h3>Client Satisfaction</h3>
                    <div class="about5-bar3">
                      <span class="about5-per3" style="width: 95%">
                        <span class="per">95%</span>
                      </span>
                    </div>
                    <p class="skill-desc">Dedicated support and ongoing maintenance to ensure your website continues to perform well</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="space32"></div>
            <div class="btn-area1" data-aos="fade-left" data-aos-duration="1400">
              <a href="<?= $site ?>contact.php" class="header-btn11">See How I Can Help <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!--===== ABOUT AREA ENDS =======-->

  <!--===== SLIDER AREA STARTS =======-->
  <div class="slider5-section-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="slider-all-boxarea">
            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/website-design-services" title="Professional Web Design Services in Delhi">Web Design Delhi</a>
              </div>
              <div class="img1 reveal">
                <img src="assets/img/all-images/brand-img2.png" alt="Professional Web Design Services in Delhi by NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/seo-services-delhi" title="Best SEO Company in Delhi NCR">SEO Services Delhi</a>
              </div>
              <div class="img1 reveal">
                <img src="assets/img/all-images/brand-img3.png" alt="Top SEO Services in Delhi by NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/ecommerce-website-delhi" title="E-commerce Website Development Delhi">E-commerce Development</a>
              </div>
              <div class="img1 reveal">
                <img src="assets/img/all-images/brand-img1.png" alt="E-commerce Website Development in Delhi by NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/wordpress-developer-delhi" title="WordPress Developer in Delhi">WordPress Developer</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img2.png" alt="Expert WordPress Developer in Delhi - NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/digital-marketing-delhi" title="Digital Marketing Agency Delhi">Digital Marketing</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img3.png" alt="Digital Marketing Services in Delhi by NikhilWorks">
              </div>
            </div>
          </div>

          <div class="slider-all-boxarea2">
            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/website-redesign-delhi" title="Website Redesign Services Delhi">Website Redesign</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img4.png" alt="Website Redesign Services in Delhi - NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/seo-company-delhi" title="SEO Expert in Delhi NCR">SEO Expert Delhi</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img5.png" alt="SEO Expert in Delhi - NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/web-development-delhi" title="Web Development Company Delhi">Web Development</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img6.png" alt="Web Development Company in Delhi - NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/responsive-web-design" title="Responsive Web Design Delhi">Responsive Design</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img7.png" alt="Responsive Web Design Services in Delhi - NikhilWorks">
              </div>
            </div>

            <div class="slider-boxarea">
              <div class="content">
                <a href="<?= $site ?>service-details/local-seo-delhi" title="Local SEO Services Delhi">Local SEO Delhi</a>
              </div>
              <div class="img1">
                <img src="assets/img/all-images/brand-img8.png" alt="Local SEO Services for Delhi Businesses - NikhilWorks">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== SLIDER AREA ENDS =======>
  
  <!--===== who we are start here  =======-->
  <div class="testimonial4-section-area sp1">
    <div class="container">
      <div class="row align-items-center">

        <!-- Left Content -->
        <div class="col-lg-6">
          <div class="about-header heading8">
            <h5 data-aos="fade-up" data-aos-duration="800">
              Who We Are
            </h5>

            <h2 class="text-anime-style-1">
              About <span>NikhilWorks
                <img src="<?= $site ?>assets/img/elements/line-img1.png" alt="">
              </span>
            </h2>

            <div class="space10 d-lg-block d-none"></div>

            <p data-aos="fade-up" data-aos-duration="1000">
              NikhilWorks is a freelance web development and SEO brand led by
              <strong>Nikhil Gupta</strong>, focused on helping businesses build a strong,
              scalable, and result-driven online presence.
            </p>

            <p data-aos="fade-up" data-aos-duration="1100">
              With <strong>3+ years of hands-on experience</strong>, we specialize in
              modern web development, performance optimization, and search engine
              visibility—ensuring every website is fast, secure, and built to convert.
            </p>

            <!-- Key Points -->
            <div class="space20"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1200">
              <div class="icons">
                <i class="fa-solid fa-laptop-code" style="font-size:22px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">Full-Stack Web Development</a>
                <p>
                  Expertise in <strong>MERN Stack, PHP, WordPress, and custom solutions</strong>
                  to build responsive, scalable websites for real business needs.
                </p>
              </div>
            </div>

            <div class="space16"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1300">
              <div class="icons">
                <i class="fa-solid fa-chart-line" style="font-size:22px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">SEO & Growth Strategy</a>
                <p>
                  Strong focus on <strong>Google rankings, organic traffic, and technical SEO</strong>
                  to help brands grow visibility and leads consistently.
                </p>
              </div>
            </div>

            <div class="space16"></div>

            <div class="works-content-box" data-aos="fade-up" data-aos-duration="1400">
              <div class="icons">
                <i class="fa-solid fa-rocket" style="font-size:22px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">Business-First Approach</a>
                <p>
                  Every project is designed with one goal in mind:
                  <strong>measurable results</strong>—more leads, better conversions,
                  and long-term growth.
                </p>
              </div>
            </div>

            <div class="space32"></div>

            <div class="btn-area1" data-aos="fade-up" data-aos-duration="1500">
              <a href="<?= $site ?>about/" class="header-btn11">
                More About Me <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>

        <!-- Right Images -->
        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1 image-anime">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Web Development Projects">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2 image-anime">
                  <img src="<?= $site ?>assets/img/all-images/about-img5.png" alt="SEO Services Delhi NCR">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!--===== SLIDER AREA ENDS =======>
  <!--===== CASE AREA STARTS =======-->
  <div class="case1-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="case-header-area heading2 text-center">
            <h2 class="text-anime-style-3">What I Offer</h2>
            <h3>Complete Digital Solutions for Your Business</h3>
            <h5>With over 12 years of experience, we provide end-to-end web development and digital marketing services to help your business succeed online.</h5>
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
                <a href="<?= $site ?>website-development/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>ecommerce-development/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>wordpress-development/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>php-development/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>mobile-app-development/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>website-maintenance/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>seo-services/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>digital-marketing/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>graphic-design/" class="btn-service-outline">Learn More</a>
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
                <a href="<?= $site ?>logo-design/" class="btn-service-outline">Learn More</a>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- View More Button -->
      <div class="btn-area1 text-center" data-aos="fade-up" data-aos-duration="1200">
        <a href="<?= $site ?>services/" class="header-btn11">View All Services <i class="fa-solid fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <!--===== CASE AREA ENDS =======-->


  <!--===== PORTFOLIO AREA STARTS =======-->
  <div class="portfolio-section-area sp2">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="portfolio-header heading8">
            <h5 data-aos="fade-up" data-aos-duration="800">
              My Work
            </h5>
            <h2 class="text-anime-style-1">See What <span>I've Built <img src="<?= $site ?>assets/img/elements/line-img1.png" alt=""></span></h2>
            <div class="space10 d-lg-block d-none"></div>
            <p data-aos="fade-up" data-aos-duration="1000">Real websites I've created for businesses. Click to see them live online.</p>
            <div class="space32"></div>
            <div class="btn-area1" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>portfolio/" class="header-btn11">See All Projects <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-7">
          <div class="portfolio-images">
            <figure class="image-anime reveal">
              <img src="<?= $site ?>assets/img/all-images/case-img8.png" alt="My Website Projects">
            </figure>
          </div>
        </div>
        <div class="space50"></div>
      </div>

      <!-- Simple Portfolio Grid -->
      <div class="row">

        <!-- Project 1: Restaurant Website -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="800">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <img src="<?= $site ?>assets/img/portfolio/rejuvenate-digital-health.jpeg" alt="Restaurant Website">
              <div class="view-overlay">
                <a href="#" class="view-details">View Details</a>
              </div>
            </div>
            <div class="project-info">
              <h3>Rejuvenate Digital Health</h3>
              <p class="project-type">Restaurant Website</p>
              <p class="project-desc">A website for a Digital Health Services with online health services booking.</p>
              <div class="project-links">
                <button class="details-btn" data-project="restaurant">
                  <i class="fa-solid fa-info-circle"></i> See Details
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Project 2: Earnova - Education Website -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="1000">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://earnova.co.in/" target="_blank">
                <img src="<?= $site ?>assets/img/portfolio/earnova.png" alt="Earnova Education Website">
                <div class="live-badge">Live Website</div>
              </a>
            </div>
            <div class="project-info">
              <h3>Earnova.co.in</h3>
              <p class="project-type">Education Portal</p>
              <p class="project-desc">An education website with courses, learning materials, and student resources.</p>
              <div class="project-links">
                <a href="https://earnova.co.in/" target="_blank" class="view-btn">
                  <i class="fa-solid fa-external-link-alt"></i> Visit Website
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Project 3: Market Mind Insight -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://marketmindinsight.com/" target="_blank">
                <img src="<?= $site ?>assets/img/portfolio/market-mind-dashboard.png" alt="Market Mind Insight">
                <div class="live-badge">Live Website</div>
              </a>
            </div>
            <div class="project-info">
              <h3>MarketMindInsight.com</h3>
              <p class="project-type">Business Dashboard</p>
              <p class="project-desc">A dashboard for businesses to track data and make better decisions.</p>
              <div class="project-links">
                <a href="https://marketmindinsight.com/" target="_blank" class="view-btn">
                  <i class="fa-solid fa-external-link-alt"></i> Visit Website
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Project 4: Bestok - Shopping Website -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="800">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="https://bestok.in/" target="_blank">
                <img src="<?= $site ?>assets/img/portfolio/bestok-thumb.png" alt="Bestok Shopping Website">
                <div class="live-badge">Live Website</div>
              </a>
            </div>
            <div class="project-info">
              <h3>Bestok.in</h3>
              <p class="project-type">Online Shopping Store</p>
              <p class="project-desc">A complete online store where customers can browse products and shop easily.</p>
              <div class="project-links">
                <a href="https://bestok.in/" target="_blank" class="view-btn">
                  <i class="fa-solid fa-external-link-alt"></i> Visit Website
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Project 5: SEO Success -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <a href="#" target="_blank">
                <img src="<?= $site ?>assets/img/portfolio/maple-stripe.png" alt="Market Mind Insight">
                <div class="live-badge">Live Website</div>
              </a>
            </div>
            <div class="project-info">
              <h3>Maple Stripe</h3>
              <p class="project-type">Online Book Store</p>
              <p class="project-desc">A Online Canda based book store, sale online books.</p>
              <div class="project-links">
                <a href="#" target="_blank" class="view-btn">
                  <i class="fa-solid fa-external-link-alt"></i> Visit Website
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Project 6: Mobile App -->
        <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in" data-aos-duration="1200">
          <div class="simple-portfolio-card">
            <div class="project-image">
              <img src="<?= $site ?>assets/img/portfolio/dubey-printers.png" alt="Mobile App">
              <div class="view-overlay">
                <a href="#" class="view-details">View App</a>
              </div>
            </div>
            <div class="project-info">
              <h3>Mobile App</h3>
              <p class="project-type">Mobile Application</p>
              <p class="project-desc">A mobile app for shopping with easy browsing and checkout.</p>
              <div class="project-links">
                <button class="details-btn" data-project="mobile-app">
                  <i class="fa-solid fa-mobile-screen"></i> See Details
                </button>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Simple View All Button -->
      <div class="row mt-4">
        <div class="col-lg-12 text-center">
          <p class="mb-3">Want to see more of my work?</p>
          <a href="<?= $site ?>portfolio/" class="header-btn9">View All Projects <i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>

    </div>
  </div>
  <!--===== PORTFOLIO AREA ENDS =======-->

  <!-- Simple Project Details Modal -->
  <div class="simple-modal" id="projectModal">
    <div class="simple-modal-content">
      <span class="simple-close">&times;</span>
      <div id="modalContent">
        <!-- Content will be loaded here -->
      </div>
    </div>
  </div>

  <style>
    /* Simple Portfolio Styles */
    .portfolio-section-area {
      background: #f8f9fa;
    }

    .simple-portfolio-card {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
      height: 100%;
    }

    .simple-portfolio-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .project-image {
      position: relative;
      height: 200px;
      overflow: hidden;
    }

    .project-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .live-badge {
      position: absolute;
      top: 15px;
      right: 15px;
      background: #28a745;
      color: white;
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .view-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(16, 64, 65, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .simple-portfolio-card:hover .view-overlay {
      opacity: 1;
    }

    .view-details {
      color: white;
      background: #104041;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
    }

    .project-info {
      padding: 20px;
    }

    .project-info h3 {
      color: #104041;
      font-size: 18px;
      margin-bottom: 5px;
      font-weight: 700;
    }

    .project-type {
      color: #666;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    .project-desc {
      color: #666;
      font-size: 14px;
      line-height: 1.5;
      margin-bottom: 15px;
    }

    .project-links {
      display: flex;
      gap: 10px;
    }

    .view-btn {
      background: #104041;
      color: white;
      padding: 8px 16px;
      border-radius: 5px;
      text-decoration: none;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }

    .view-btn:hover {
      background: #0a2b2c;
      color: white;
      transform: translateY(-2px);
    }

    .details-btn {
      background: #f0f0f0;
      color: #104041;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      font-weight: 600;
    }

    .details-btn:hover {
      background: #104041;
      color: white;
      transform: translateY(-2px);
    }

    /* Simple Modal */
    .simple-modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      z-index: 9999;
      align-items: center;
      justify-content: center;
    }

    .simple-modal-content {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      width: 90%;
      max-width: 500px;
      position: relative;
      max-height: 80vh;
      overflow-y: auto;
    }

    .simple-close {
      position: absolute;
      top: 15px;
      right: 15px;
      font-size: 24px;
      cursor: pointer;
      color: #666;
    }

    .simple-close:hover {
      color: #333;
    }

    /* Simple Message Styling */
    #modalContent h2 {
      color: #104041;
      margin-bottom: 15px;
    }

    #modalContent p {
      color: #666;
      line-height: 1.6;
      margin-bottom: 15px;
    }

    #modalContent ul {
      padding-left: 20px;
      margin-bottom: 20px;
    }

    #modalContent li {
      color: #666;
      margin-bottom: 8px;
    }
  </style>

  <script>
    $(document).ready(function() {
      // Simple Modal for Project Details
      $('.details-btn').click(function() {
        const project = $(this).data('project');
        showProjectDetails(project);
      });

      $('.simple-close').click(function() {
        $('.simple-modal').hide();
      });

      // Close modal when clicking outside
      $(window).click(function(event) {
        if ($(event.target).hasClass('simple-modal')) {
          $('.simple-modal').hide();
        }
      });

      function showProjectDetails(project) {
        const modalContent = $('#modalContent');
        let content = '';

        switch (project) {
          case 'restaurant':
            content = `
          <h2>Restaurant Website</h2>
          <p><strong>Project:</strong> Food Court Restaurant Website</p>
          <p><strong>What I Did:</strong> Created a complete website for a restaurant with:</p>
          <ul>
            <li>Beautiful menu display</li>
            <li>Online table booking system</li>
            <li>Contact form for reservations</li>
            <li>Gallery of food photos</li>
            <li>Mobile-friendly design</li>
          </ul>
          <p><strong>Result:</strong> The restaurant gets more online bookings and customers can easily view the menu.</p>
        `;
            break;

          case 'seo':
            content = `
          <h2>SEO Success Story</h2>
          <p><strong>Project:</strong> SEO for Local Business</p>
          <p><strong>What I Did:</strong> Helped a business get found on Google by:</p>
          <ul>
            <li>Optimizing their website for search</li>
            <li>Adding local keywords</li>
            <li>Improving website speed</li>
            <li>Creating better content</li>
          </ul>
          <p><strong>Results in 6 Months:</strong></p>
          <ul>
            <li>300% more website visitors</li>
            <li>50+ keywords on Google first page</li>
            <li>More phone calls from customers</li>
            <li>Better online reputation</li>
          </ul>
        `;
            break;

          case 'mobile-app':
            content = `
          <h2>Shopping Mobile App</h2>
          <p><strong>Project:</strong> Mobile Shopping Application</p>
          <p><strong>What I Built:</strong> A shopping app with these features:</p>
          <ul>
            <li>Easy product browsing</li>
            <li>Secure login for users</li>
            <li>Shopping cart</li>
            <li>Order tracking</li>
            <li>Push notifications for deals</li>
          </ul>
          <p><strong>Works On:</strong> Both Android and iPhone</p>
          <p><strong>Result:</strong> Customers can shop easily from their phones anytime.</p>
        `;
            break;
        }

        modalContent.html(content);
        $('.simple-modal').show();
      }

      // Smooth scroll for anchor links
      $('a[href^="#"]').click(function(e) {
        e.preventDefault();
        const target = $(this.hash);
        if (target.length) {
          $('html, body').animate({
            scrollTop: target.offset().top - 100
          }, 1000);
        }
      });
    });
  </script>

  <!--===== PRICING AREA STARTS =======-->
  <div class="pricing-section-area sp2">
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
            <h4>WordPress Website</h4>
            <p>Easy to manage, perfect for blogs and businesses.</p>
            <h1>₹5,999 <span>One-Time</span></h1>
            <div class="space20"></div>
            <ul>
              <li><i class="fa-solid fa-check text-success"></i> Premium Theme Setup</li>
              <li><i class="fa-solid fa-check text-success"></i> Essential Plugins Installed</li>
              <li><i class="fa-solid fa-check text-success"></i> Blog + Contact Form</li>
              <li><i class="fa-solid fa-check text-success"></i> 1 Month Support</li>
            </ul>
            <div class="space24"></div>
            <a href="https://wa.me/918368552640" class="header-btn11">Get Started <span><i class="fa-solid fa-arrow-right"></i></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== PRICING AREA ENDS =======-->


  <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="testimonial4-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 m-auto">
          <div class="testimonia4-header text-center heading8">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="assets/img/icons/logo-icons6.svg" alt="">Client Testimonials</h5>
            <h2 class="text-anime-style-1">“What Our <span>Clients Say” <img src="assets/img/elements/line-img2.png" alt=""></span> </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-out" data-aos-duration="1200">
          <div class="testimonial4-slider-area owl-carousel">
            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"Nikhil from nikhilworks.com transformed our Delhi-based business with his exceptional web development skills. His SEO strategies helped us rank on Google's first page within 3 months. Highly recommended for businesses in India!"</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Rajesh Sharma</a>
                  <span>Delhi-based E-commerce Business</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"As a startup founder in Mumbai, I was struggling with my online presence until I found nikhilworks.com. Nikhil Gupta created a stunning website and implemented SEO strategies that brought us genuine customers. His pricing is very reasonable for Indian businesses."</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Priya Patel</a>
                  <span>Mumbai Startup Founder</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"I run a small business in Bangalore and needed an affordable web developer. Nikhil from nikhilworks.com exceeded my expectations. He created a responsive website and helped with local SEO. Now we're getting more customers from Google searches."</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Vikram Singh</a>
                  <span>Bangalore Small Business Owner</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"nikhilworks.com provided excellent WordPress development services for my consultancy in Hyderabad. Nikhil's technical expertise and understanding of Indian market needs made all the difference. Our website traffic increased by 200% after his SEO work."</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Ananya Reddy</a>
                  <span>Hyderabad Consultancy Firm</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"As an NRI looking to establish business in India, I found nikhilworks.com to be the perfect partner. Nikhil Gupta understood my vision and created a website that works perfectly for both Indian and international audiences. His SEO knowledge is impressive!"</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Amit Verma</a>
                  <span>NRI Business Owner</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <img src="assets/img/icons/quito7.svg" alt="" class="quito">
              <p>"I contacted nikhilworks.com for my restaurant website in Delhi. Nikhil created a beautiful, responsive site and optimized it for local SEO. Now we appear in 'near me' searches and our online orders have increased significantly. Great service for Indian businesses!"</p>
              <div class="space48"></div>
              <div class="auhtor-logo">
                <div class="text">
                  <a href="javascript:void(0)">Sunita Kapoor</a>
                  <span>Delhi Restaurant Owner</span>
                  <ul>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                    <li><i class="fa-solid fa-star"></i></li>
                  </ul>
                </div>
                <div class="logo">
                  <img src="assets/img/icons/google1.svg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== TESTIMONIAL AREA ENDS =======-->

  <!--===== BLOG AREA STARTS =======-->
  <div class="blog4-section-area sp2">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 m-auto">
          <div class="blog4-header text-center heading8">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="assets/img/icons/logo-icons6.svg" alt="">Blog &
              News</h5>
            <h2 class="text-anime-style-1">"Insights & Updates <span>Digital Marketing <img
                  src="assets/img/elements/line-img1.png" alt=""></span> </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($blogs as $blog) {
        ?>
          <div class="col-lg-6 col-md-6" data-aos="zoom-out" data-aos-duration="1000">
            <div class="blog-auhtor-boxarea">
              <div class="blog-content-area">
                <ul>
                  <li><a href="#"><i class="fa-regular fa-circle-user"></i><?= $blog['author'] ?></a></li>
                  <li><a href="#"><i class="fa-solid fa-calendar-days"></i><?= date('d M Y h:i A', strtotime($blog['created_at'])) ?> </a></li>
                </ul>
                <div class="space16"></div>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>"><?= $blog['title'] ?></a>
                <div class="space16"></div>
                <p><?= $blog['meta_description'] ?></p>
                <a href="<?= $site ?>blog/<?= $blog['slug_url'] ?>" class="readmore">Learn More<i class="fa-solid fa-arrow-right"></i></a>
              </div>
              <div class="space24"></div>
              <div class="img1">
                <figure class="image-anime">
                  <img src="<?= $site ?>admin/uploads/blogs/<?= $blog['image'] ?>" alt="">
                </figure>
              </div>
            </div>
          </div>
        <?php
        }
        ?>


      </div>
    </div>
  </div>
  <!--===== BLOG AREA ENDS =======-->

  <!--===== BLOG AREA STARTS =======-->
  <div class="choose-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 m-auto">
          <div class="choose-header-area text-center heading2">
            <h5 data-aos="fade-up" data-aos-duration="1000"><img src="assets/img/icons/logo-icons5.svg" alt="">FAQ</h5>
            <h2 class="text-anime-style-1">
              Frequently Asked <span>Questions <img src="assets/img/elements/line-img1.png" alt=""></span>
            </h2>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="accordian-tabs-area">
            <div class="accordion accordion-flush" id="accordionFlushExample">

              <!-- FAQ 1 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseOne" aria-expanded="true"
                    aria-controls="flush-collapseOne">
                    1. What services does NikhilWorks provide?
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse show"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    NikhilWorks offers professional web design and development services including
                    static websites, dynamic websites, custom web applications, and SEO-friendly solutions.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    I work with modern technologies like MERN Stack, PHP, Laravel, and WordPress to deliver
                    scalable and secure websites.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- FAQ 2 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                    aria-controls="flush-collapseTwo">
                    2. Can you build a website from scratch for my business?
                  </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Yes. I design and develop websites completely from scratch based on your business goals,
                    brand identity, and target audience.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    From UI/UX design to backend development and deployment, everything is handled end-to-end.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- FAQ 3 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                    aria-controls="flush-collapseThree">
                    3. Will my website be mobile-friendly and SEO optimized?
                  </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Absolutely. Every website is built using a mobile-first approach and follows
                    SEO best practices for better Google rankings.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    This includes responsive layouts, fast loading speed, clean code, and proper meta tags.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- FAQ 4 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFour" aria-expanded="false"
                    aria-controls="flush-collapseFour">
                    4. How long does it take to develop a website?
                  </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Project timelines depend on complexity. A basic website usually takes 2–4 weeks,
                    while dynamic or custom web applications may take 4–8 weeks.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    Clear timelines and milestones are shared before starting the project.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- FAQ 5 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseFive" aria-expanded="false"
                    aria-controls="flush-collapseFive">
                    5. Do you provide website maintenance and support?
                  </button>
                </h2>
                <div id="flush-collapseFive" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Yes. I provide ongoing support, updates, bug fixes, and performance optimization
                    after project delivery.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    Long-term maintenance plans are available based on your business needs.
                  </div>
                </div>
              </div>
              <div class="space24"></div>

              <!-- FAQ 6 -->
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapseSix" aria-expanded="false"
                    aria-controls="flush-collapseSix">
                    6. How do I get started with NikhilWorks?
                  </button>
                </h2>
                <div id="flush-collapseSix" class="accordion-collapse collapse"
                  data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    Getting started is simple. Contact me via WhatsApp or the contact form to discuss
                    your project requirements.
                  </div>
                  <div class="space10"></div>
                  <div class="accordion-body body2">
                    I offer a free initial consultation to understand your goals and suggest the best solution.
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

</body>


</html>