<?php
include_once "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

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
  <title>About Nikhil Gupta | Web Developer & SEO Expert | NikhilWorks</title>
  <meta name="description" content="Meet Nikhil Gupta — web developer & SEO expert with a unique background in Political Science, Economics & International Relations. Serving clients in India, Dubai, USA & UK.">
  <meta name="keywords" content="freelance web developer Delhi, SEO expert India, website developer NCR, freelance web designer, SEO services Delhi, digital marketing expert, WordPress developer Delhi, MERN stack developer">

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $site ?>about/" />

  <!-- Open Graph Tags -->
  <meta property="og:title" content="About Nikhil Gupta | Web Developer & SEO Expert | NikhilWorks">
  <meta property="og:description" content="From Political Science & UPSC prep to Web Development — a different kind of developer. Web development & SEO for businesses in India, Dubai, USA & UK.">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-about.jpg">
  <meta property="og:url" content="<?= $site ?>about/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="About Nikhil Gupta | Web Developer & SEO Expert">
  <meta name="twitter:description" content="From Political Science & UPSC prep to Web Development — a different kind of developer.">

  <!-- Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "@id": "<?= $site ?>#person",
      "name": "Nikhil Gupta",
      "jobTitle": "Web Developer & SEO Expert",
      "description": "Web developer and SEO expert based in Delhi NCR with a background in Political Science, Economics, and International Relations — now serving clients in India, Dubai, USA, and UK.",
      "url": "<?= $site ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Karampura",
        "addressRegion": "Delhi",
        "addressCountry": "IN"
      },
      "email": "contact@nikhilworks.com",
      "telephone": "+91-8368552640",
      "alumniOf": [
        {
          "@type": "CollegeOrUniversity",
          "name": "University of Delhi"
        },
        {
          "@type": "CollegeOrUniversity",
          "name": "IGNOU"
        }
      ],
      "knowsAbout": ["Web Development", "SEO", "Digital Marketing", "WordPress", "MERN Stack", "PHP", "JavaScript", "Economics", "International Relations", "Political Science"],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Web Development Services",
        "itemListElement": [{
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Website Development",
              "description": "Custom website development services"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "SEO Services",
              "description": "Search engine optimization services"
            }
          }
        ]
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
            <h1>Not Your Typical Developer</h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>About</span></a>
          </div>
          <div class="text-center">
            <p class="mt-3 text-dark">I build websites differently — because my background isn't typical either.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== INTRODUCTION AREA STARTS =======-->
  <div class="works-inner-section-area sp1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="works-header-area heading2">
            <h5>About Me</h5>
            <h1>Nikhil Gupta</h1>
            <h3 class="h4 text-primary mb-3">Web Developer & SEO Expert</h3>
            <p>I'm a web developer and SEO expert based in Delhi, India — working with businesses across India, Dubai, the UK, and the USA. But before I wrote a single line of code, I spent years studying Political Science, International Relations, and Economics — even preparing for India's UPSC Civil Services Examination.</p>
            <div class="space16"></div>
            <p>That background changes how I approach your project. I'm not just writing code — I'm thinking about your market, your competitors, and where your industry is heading.</p>

            <div class="space32"></div>

            <!-- Point 1 -->
            <div class="works-content-box">
              <div class="icons">
                <i class="fa-solid fa-laptop-code" style="font-size:24px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">Full-Stack Development</a>
                <p>Expert in <strong>PHP, MySQL, MERN Stack, WordPress, and custom web applications</strong>. I build responsive, scalable websites that convert visitors into customers.</p>
              </div>
            </div>
            <div class="space20"></div>

            <!-- Point 2 -->
            <div class="works-content-box">
              <div class="icons">
                <i class="fa-solid fa-chart-line" style="font-size:24px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">SEO & Digital Marketing</a>
                <p>Proven track record of improving <strong>Google rankings and driving organic traffic</strong> through technical SEO, on-page optimization, and content strategy.</p>
              </div>
            </div>
            <div class="space20"></div>

            <!-- Point 3 -->
            <div class="works-content-box">
              <div class="icons">
                <i class="fa-solid fa-rocket" style="font-size:24px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">Strategic, Business-First Thinking</a>
                <p>Years of analyzing <strong>economics, markets, and global trends</strong> means every project is built with your bigger business picture in mind — not just code.</p>
              </div>
            </div>

            <div class="space32"></div>
            <div class="btn-area">
              <a href="<?= $site ?>contact/" class="header-btn9 " style="margin-right:5px;">Start Your Project <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640" class="header-btn11 ">Chat on WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="about-all-images-area">
            <img src="<?= $site ?>assets/img/elements/elements12.png" alt="" class="elements12 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="elements13 keyframe5">
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="img1 image-anime">
                  <div class="space100"></div>
                  <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Nikhil Gupta - Web Developer">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2 image-anime">
                  <img src="<?= $site ?>assets/img/all-images/about-img5.png" alt="NikhilWorks - SEO and Web Development">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== INTRODUCTION AREA ENDS =======-->


  <!--===== MY JOURNEY AREA STARTS =======-->
  <div class="process-section-area sp2 bg-light">
    <div class="container">

      <!-- Section Header -->
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="process-header text-center heading2">
            <h5 data-aos="fade-up">My Journey</h5>
            <h2 data-aos="fade-up" data-aos-delay="100">
              From UPSC Aspirant to Web Developer
            </h2>
            <p data-aos="fade-up" data-aos-delay="200">
              An unusual path — and exactly what makes NikhilWorks different.
            </p>
          </div>
        </div>
      </div>

      <!-- Journey Steps -->
      <div class="row mt-4">

        <!-- Step 1 -->
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-graduation-cap fa-2x"></i>
              <span class="step-number">01</span>
            </div>
            <h4>BA & MA, Political Science</h4>
            <p>
              Studied Political Science (Honours) at Zakir Hussain Delhi College and
              MA Political Science from the University of Delhi — with years of
              active debate and competitive analysis.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-globe fa-2x"></i>
              <span class="step-number">02</span>
            </div>
            <h4>UPSC Preparation (2019-2023)</h4>
            <p>
              Years of deep study in International Relations, Economics, and
              current affairs — understanding how global events shape markets
              and businesses.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-code fa-2x"></i>
              <span class="step-number">03</span>
            </div>
            <h4>Web Development (2023)</h4>
            <p>
              In 2023, moved into technology — starting professional web
              development training to apply this analytical thinking in a
              more practical way.
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-laptop-code fa-2x"></i>
              <span class="step-number">04</span>
            </div>
            <h4>MCA, IGNOU (2024-Present)</h4>
            <p>
              Currently pursuing MCA at IGNOU — combining academic depth with
              real client projects through NikhilWorks.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--===== MY JOURNEY AREA ENDS =======-->


  <!--===== PROCESS AREA STARTS =======-->
  <div class="process-section-area sp2">
    <div class="container">

      <!-- Section Header -->
      <div class="row">
        <div class="col-lg-7 m-auto">
          <div class="process-header text-center heading2">
            <h5 data-aos="fade-up">My Process</h5>
            <h2 data-aos="fade-up" data-aos-delay="100">
              A Simple, Transparent & Result-Driven Workflow
            </h2>
            <p data-aos="fade-up" data-aos-delay="200">
              From idea to launch, I follow a clear process that ensures quality,
              timely delivery, and complete transparency at every step.
            </p>
          </div>
        </div>
      </div>

      <!-- Process Steps -->
      <div class="row mt-4">

        <!-- Step 1 -->
        <div class="col-lg-3 col-md-6 text-center " data-aos="fade-up">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-comments fa-2x"></i>
              <span class="step-number">01</span>
            </div>
            <h4>Discovery & Consultation</h4>
            <p>
              A free consultation to understand your business, goals, audience,
              and technical requirements before starting.
            </p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-3 col-md-6 text-center " data-aos="fade-up" data-aos-delay="100">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-pen-ruler fa-2x"></i>
              <span class="step-number">02</span>
            </div>
            <h4>Strategy & Planning</h4>
            <p>
              I create a clear roadmap including design approach, technology stack,
              timelines, and transparent pricing—no hidden surprises.
            </p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-3 col-md-6 text-center " data-aos="fade-up" data-aos-delay="200">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-code fa-2x"></i>
              <span class="step-number">03</span>
            </div>
            <h4>Design & Development</h4>
            <p>
              Clean UI, scalable code, and SEO-friendly structure using modern
              technologies with regular progress updates.
            </p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="col-lg-3 col-md-6 text-center " data-aos="fade-up" data-aos-delay="300">
          <div class="process-box h-100 my-process-card">
            <div class="icon-box">
              <i class="fa-solid fa-rocket fa-2x"></i>
              <span class="step-number">04</span>
            </div>
            <h4>Launch, SEO & Support</h4>
            <p>
              Final testing, smooth deployment, SEO optimization, and reliable
              post-launch support to keep your website performing.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--===== PROCESS AREA ENDS =======-->

  <!--===== SERVICE AREA STARTS =======-->
  <div class="service2-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="service2-header heading2 text-center">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star2 keyframe5">
            <img src="<?= $site ?>assets/img/elements/elements13.png" alt="" class="star3 keyframe5">
            <h5>My Approach</h5>
            <h2>Client-Focused Web Development & SEO Services</h2>
            <p>I believe in building long-term relationships with clients by delivering exceptional results and outstanding service</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7">
          <div class="images-content-area">
            <div class="img1">
              <img src="<?= $site ?>assets/img/all-images/service-img1.png" alt="NikhilWorks - Web Development & SEO">
            </div>
            <div class="content-area">
              <h5>My Mission</h5>
              <a href="<?= $site ?>services/" class="text">Empowering Businesses with Powerful Digital Solutions</a>
              <p>To provide high-quality web development and SEO services that help businesses establish a strong online presence and achieve their growth objectives — built on an understanding of markets, not just code. I focus on delivering solutions that are technically sound and aligned with real business outcomes.</p>
              <div class="btn-area">
                <a href="<?= $site ?>services/" class="header-btn11">View Services <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
            <div class="arrow-area">
              <a href="<?= $site ?>services/"><i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="service-all-boxes">
            <div class="row">
              <div class="col-lg-12 col-md-6">
                <div class="service2-auhtor-boxarea">
                  <div class="arrow">
                    <a href="<?= $site ?>contact/"><i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                  <div class="content-area">
                    <h5>Why Choose Me?</h5>
                    <a href="<?= $site ?>contact/">A Strategic Mind Behind Every Project</a>
                    <p>With two Master's degrees — Political Science and Computer Applications (MCA, in progress) — plus years of competitive exam preparation, I bring structured thinking, deep research skills, and clear communication to every project, alongside technical expertise.</p>
                  </div>
                </div>
              </div>

              <div class="col-lg-12 col-md-6">
                <div class="service2-auhtor2-boxarea">
                  <div class="arrow">
                    <a href="<?= $site ?>portfolio/"><i class="fa-solid fa-arrow-right"></i></a>
                  </div>
                  <div class="content-area">
                    <h5>My Vision</h5>
                    <a href="<?= $site ?>portfolio/">To Be Your Trusted Digital Partner</a>
                    <p>To be the go-to web developer and SEO expert for businesses in India and internationally — known for combining technical execution with a genuine understanding of business and markets.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== SERVICE AREA ENDS =======-->

  <!--===== SKILLS AREA STARTS =======-->
  <div class="skills-section-area sp2">
    <img src="<?= $site ?>assets/img/bg/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?= $site ?>assets/img/bg/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 m-auto">
          <div class="skills-header text-center heading2">
            <h5>Technical Skills</h5>
            <h2>My Expertise</h2>
            <p class="text-light">Comprehensive web development and digital marketing skills</p>
          </div>
        </div>
      </div>
      <div class="col-lg-10 m-auto">
        <div class="circle-progress-area">
          <div class="row">

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle" data-percent="95">
                    <canvas></canvas>
                    <div>95%</div>
                  </div>
                </div>
                <p>HTML5 / CSS3 / Bootstrap</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle two" data-percent="90">
                    <canvas></canvas>
                    <div>90%</div>
                  </div>
                </div>
                <p>JavaScript / jQuery</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle three" data-percent="88">
                    <canvas></canvas>
                    <div>88%</div>
                  </div>
                </div>
                <p>React.js / React Native</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle four" data-percent="85">
                    <canvas></canvas>
                    <div>85%</div>
                  </div>
                </div>
                <p>Node.js / Express.js</p>
              </div>
            </div>

          </div>

          <div class="row mt-4">
            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle" data-percent="80">
                    <canvas></canvas>
                    <div>80%</div>
                  </div>
                </div>
                <p>MongoDB / MySQL</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle two" data-percent="92">
                    <canvas></canvas>
                    <div>92%</div>
                  </div>
                </div>
                <p>PHP / Laravel / CodeIgniter</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle three" data-percent="97">
                    <canvas></canvas>
                    <div>97%</div>
                  </div>
                </div>
                <p>WordPress Development</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                  <div class="circle four" data-percent="85">
                    <canvas></canvas>
                    <div>85%</div>
                  </div>
                </div>
                <p>SEO & Digital Marketing</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!--===== SKILLS AREA ENDS =======-->

  <!--===== STATS AREA STARTS =======-->
  <div class="stats-section-area sp2 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
          <div class="stat-box">
            <h2 class="counter" data-count="20">20+</h2>
            <p>Projects Completed</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
          <div class="stat-box">
            <h2 class="counter" data-count="3">3+</h2>
            <p>Years Experience</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
          <div class="stat-box">
            <h2 class="counter" data-count="15">15+</h2>
            <p>Happy Clients</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <div class="stat-box">
            <h2 class="counter" data-count="15">15+</h2>
            <p>SEO Projects</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== STATS AREA ENDS =======-->

    <!--===== TESTIMONIAL AREA STARTS =======-->
  <div class="testimonial1-section-area sp1 bg2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="testimonial-header heading2 text-center">
            <img src="<?=$site?>assets/img/elements/elements13.png" alt="" class="star2 keyframe5">
            <img src="<?=$site?>assets/img/elements/elements13.png" alt="" class="star3 keyframe5">
            <h5>Testimonials</h5>
            <h2>What Our Clients Say <br class="d-md-block d-none"> On Google Reviews</h2>
            <p>Don't just take our word for it. Hear what our satisfied clients <br class="d-md-block d-none"> have to say about their experience partnering with NikhilWorks</p>
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
                    <p>"NikhilWorks built my business website <a href="https://bestok.in/">Bestok</a> and handled everything from design to SEO. Very professional and supportive throughout the process. Highly recommended!"</p>
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
                      <img src="<?=$site?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?=$site?>assets/img/all-images/testimonials-img4.jpg" alt="">
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
                      <img src="<?=$site?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?=$site?>assets/img/all-images/testimonials-img5.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-boxarea">
              <div class="row">
                <div class="col-lg-5">
                  <div class="pera">
                    <p>"Sameer here from Saharanpur. NikhilWorks made my business visible online. I got more customers after the website <a href="https://earnova.co.in/">Earnova</a> launch. SEO work is also great!"</p>
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
                      <img src="<?=$site?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?=$site?>assets/img/all-images/testimonials-img3.jpg" alt="">
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
                      <img src="<?=$site?>assets/img/icons/google.svg" alt="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="images">
                    <img src="<?=$site?>assets/img/all-images/testimonials-img6.jpg" alt="">
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
            <h1 class="text-anime-style-1 text-light">Let's Build Something Smarter Together</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Looking for a <strong>web developer</strong> who thinks beyond code, or an <strong>SEO expert</strong> who understands markets? Let's discuss your project and create a solution built on strategy as much as code. I serve clients across India, Dubai, USA and UK.</p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?= $site ?>contact/" class="header-btn9"> Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
              <a href="https://wa.me/918368552640" class="header-btn11 ml-3"> WhatsApp Now <i class="fa-brands fa-whatsapp"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Counter Animation Script -->
  <script>
    $(document).ready(function() {
      $('.counter').each(function() {
        $(this).prop('Counter', 0).animate({
          Counter: $(this).text()
        }, {
          duration: 2000,
          easing: 'swing',
          step: function(now) {
            $(this).text(Math.ceil(now));
          }
        });
      });
    });
  </script>

</body>

</html>