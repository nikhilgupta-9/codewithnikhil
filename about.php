<?php
include_once "config/connect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About CodeWithNikhil | Freelance Web Developer & SEO Expert Delhi NCR</title>
  <meta name="description" content="Meet Nikhil Gupta - Professional freelance web developer & SEO expert in Delhi NCR. 3+ years experience in website development, SEO services, and digital marketing solutions.">
  <meta name="keywords" content="freelance web developer Delhi, SEO expert India, website developer NCR, freelance web designer, SEO services Delhi, digital marketing expert, WordPress developer Delhi, MERN stack developer">

  <!-- Canonical URL -->
  <link rel="canonical" href="<?= $site ?>about/" />

  <!-- Open Graph Tags -->
  <meta property="og:title" content="About CodeWithNikhil | Freelance Web Developer & SEO Expert">
  <meta property="og:description" content="Professional freelance web developer & SEO expert in Delhi NCR. Website development, SEO services, and digital marketing solutions.">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-about.jpg">
  <meta property="og:url" content="<?= $site ?>about/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="CodeWithNikhil">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="About CodeWithNikhil | Freelance Web Developer Delhi">
  <meta name="twitter:description" content="Professional web development & SEO services in Delhi NCR. 3+ years experience building successful websites.">

  <!-- Structured Data -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Nikhil Gupta",
      "jobTitle": "Freelance Web Developer & SEO Expert",
      "description": "Professional freelance web developer and SEO expert based in Delhi NCR with 3+ years of experience",
      "url": "<?= $site ?>",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Karampura",
        "addressRegion": "Delhi",
        "addressCountry": "IN"
      },
      "email": "nik007guptadu@gmail.com",
      "telephone": "+91-8368552640",
      "knowsAbout": ["Web Development", "SEO", "Digital Marketing", "WordPress", "MERN Stack", "PHP", "JavaScript"],
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
        "https://www.linkedin.com/in/nikhil-gupta-b30627327/",
        "https://github.com/nikhilgupta-9",
        "https://x.com/NikhilG69581514"
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
            <h1>About CodeWithNikhil</h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>About</span></a>
          </div>
          <div class="text-center">

            <p class="mt-3 text-dark">Professional Freelance Web Developer & SEO Expert in Delhi NCR</p>
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
            <h3 class="h4 text-primary mb-3">Freelance Web Developer & SEO Expert</h3>
            <p>Welcome to CodeWithNikhil! I'm a passionate freelance web developer and SEO expert based in Delhi NCR with <strong>3+ years of hands-on experience</strong> in creating stunning, high-performance websites and driving organic growth for businesses.</p>

            <div class="space32"></div>

            <!-- Point 1 -->
            <div class="works-content-box">
              <div class="icons">
                <i class="fa-solid fa-laptop-code" style="font-size:24px; color:#104041;"></i>
              </div>
              <div class="content">
                <a href="#">Full-Stack Development</a>
                <p>Expert in <strong>MERN Stack, PHP, WordPress, and custom web applications</strong>. I build responsive, scalable websites that convert visitors into customers.</p>
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
                <a href="#">Business Growth Focus</a>
                <p>Every project is designed to deliver <strong>measurable business results</strong> - whether it's more leads, higher conversions, or better online visibility.</p>
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
                  <img src="<?= $site ?>assets/img/all-images/about-img6.png" alt="Web Development Projects">
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="img2 image-anime">
                  <img src="<?= $site ?>assets/img/all-images/about-img5.png" alt="SEO Services Delhi">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== INTRODUCTION AREA ENDS =======-->



    <!--===== PROCESS AREA STARTS =======-->
  <div class="process-section-area sp2 bg-light">
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
              <img src="<?= $site ?>assets/img/all-images/service-img1.png" alt="Freelance Web Developer Delhi">
            </div>
            <div class="content-area">
              <h5>My Mission</h5>
              <a href="<?= $site ?>services/" class="text">Empowering Businesses with Powerful Digital Solutions</a>
              <p>To provide affordable, high-quality web development and SEO services that help businesses establish a strong online presence and achieve their growth objectives. I focus on delivering solutions that are not just technically sound but also drive real business results.</p>
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
                    <a href="<?= $site ?>contact/">Proven Expertise & Reliable Service</a>
                    <p>With BA, MA qualifications and ongoing MCA studies, combined with 3+ years of practical experience, I bring both academic knowledge and real-world skills to every project.</p>
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
                    <p>To become the go-to freelance web developer and SEO expert for businesses in Delhi NCR and beyond, known for delivering innovative, scalable, and results-driven digital solutions.</p>
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
            <h2 class="counter" data-count="50">20+</h2>
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
            <h2 class="counter" data-count="45">15+</h2>
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
            <h1 class="text-anime-style-1 text-light">Ready to Start Your Project?</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Looking for a <strong>reliable freelance web developer in Delhi NCR</strong> or an <strong>SEO expert to grow your business</strong>? Let's discuss your project requirements and create a solution that drives results. I serve clients across India and internationally.</p>
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