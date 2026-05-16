<?php
include "config/connect.php";
include_once "util/function.php";

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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Web Development Portfolio | NikhilWorks - Professional Web Developer</title>
  <meta name="description" content="Explore the portfolio of Nikhil Gupta - Expert web developer and SEO specialist. View responsive websites, e-commerce solutions, and digital marketing projects.">
  <meta name="keywords" content="web development portfolio, website portfolio, SEO projects, NikhilWorks portfolio, web developer India">

  <!-- Open Graph Tags -->
  <meta property="og:title" content="Web Development Portfolio | NikhilWorks">
  <meta property="og:description" content="Professional portfolio of Nikhil Gupta - Web Developer & SEO Expert.">
  <meta property="og:image" content="<?= $site ?>assets/img/portfolio-banner.jpg">
  <meta property="og:url" content="<?= $site ?>portfolio/">
  <meta property="og:site_name" content="NikhilWorks">
  <meta property="og:type" content="website">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Web Development Portfolio | NikhilWorks">
  <meta name="twitter:description" content="Professional portfolio of Nikhil Gupta - Web Developer & SEO Expert.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/portfolio-banner.jpg">

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

  <!-- Portfolio Page Specific Styles -->
  <style>
    .portfolio-filter {
      margin-bottom: 30px;
      text-align: center;
    }

    .portfolio-filter button {
      background: transparent;
      border: 1px solid #104041;
      color: #104041;
      padding: 8px 20px;
      margin: 5px;
      border-radius: 30px;
      transition: all 0.3s ease;
    }

    .portfolio-filter button:hover,
    .portfolio-filter button.active {
      background: #104041;
      color: #ADFF1C;
    }

    .portfolio-item {
      margin-bottom: 30px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(16, 64, 65, 0.1);
      transition: all 0.3s ease;
    }

    .portfolio-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(16, 64, 65, 0.2);
    }

    .portfolio-img {
      position: relative;
      overflow: hidden;
    }

    .portfolio-img img {
      width: 100%;
      height: 250px;
      object-fit: cover;
      transition: all 0.5s ease;
    }

    .portfolio-item:hover .portfolio-img img {
      transform: scale(1.05);
    }

    .portfolio-overlay {
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
      transition: all 0.3s ease;
    }

    .portfolio-item:hover .portfolio-overlay {
      opacity: 1;
    }

    .portfolio-overlay a {
      color: #fff;
      background: #ADFF1C;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin: 0 5px;
      transition: all 0.3s ease;
    }

    .portfolio-overlay a:hover {
      background: #104041;
      transform: translateY(-3px);
    }

    .portfolio-content {
      padding: 20px;
      background: #fff;
    }

    .portfolio-content h3 {
      font-size: 20px;
      margin-bottom: 10px;
      color: #104041;
    }

    .portfolio-content p {
      color: #666;
      margin-bottom: 15px;
    }

    .portfolio-tags {
      display: flex;
      flex-wrap: wrap;
    }

    .portfolio-tags span {
      background: #f1f1f1;
      color: #104041;
      padding: 3px 10px;
      border-radius: 15px;
      font-size: 12px;
      margin-right: 5px;
      margin-bottom: 5px;
    }

    .portfolio-header {
      text-align: center;
      margin-bottom: 50px;
    }

    .portfolio-header h1 {
      color: #104041;
      margin-bottom: 15px;
    }

    .portfolio-header p {
      color: #666;
      max-width: 700px;
      margin: 0 auto;
    }

    .theme-bg {
      background-color: #104041;
    }

    .theme-color {
      color: #ADFF1C;
    }

    .portfolio-category {
      font-size: 14px;
      color: #ADFF1C;
      background: #104041;
      padding: 3px 10px;
      border-radius: 15px;
      display: inline-block;
      margin-bottom: 10px;
    }

    .error-message {
      text-align: center;
      padding: 50px 0;
      color: #d9534f;
    }
  </style>

  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [{
          "@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "<?= $site ?>"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Portfolio",
          "item": "<?= $site ?>/portfolio"
        }
      ]
    }
  </script>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?=$site?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>My Portfolio</h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>Portfolio</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== PORTFOLIO AREA STARTS =======-->
  <div class="portfolio-section-area sp1 bg2">
    <div class="container">
      <div class="portfolio-header" data-aos="fade-up" data-aos-duration="1000">
        <h1>My Creative Work</h1>
        <p>Explore my latest web development projects, SEO success stories, and digital marketing campaigns. Each project represents my dedication to quality and client satisfaction.</p>
      </div>

      <div class="portfolio-filter" data-aos="fade-up" data-aos-duration="1000">
        <?php
        // Query sub-categories based on parent_id
        $sql1 = "SELECT `slug_url`, `categories` FROM `sub_categories` WHERE `parent_id` = '30797'";
        $res = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($res) > 0) {
          $isFirst = true; // flag for first button
          while ($row = mysqli_fetch_assoc($res)) {
        ?>
            <button class="<?= $isFirst ? 'active' : ''; ?>" data-filter="<?= htmlspecialchars($row['slug_url']); ?>">
              <?= htmlspecialchars($row['categories']); ?>
            </button>
        <?php
            $isFirst = false; // after first button, set false
          }
        } else {
          echo "<p>No sub-categories found.</p>";
        }
        ?>
      </div>


      <div class="row portfolio-container">
        <?php if (!empty($portfolios)): ?>
          <?php foreach ($portfolios as $portfolio):
            // Default category
            $category = 'portfolio';

            // Use actual portfolio category or project name
            if (!empty($portfolio['category'])) {
              $categoryName = strtolower($portfolio['category']);
            } else {
              $categoryName = strtolower($portfolio['pro_name']);
            }

            switch (true) {
              case strpos($categoryName, "ecommerce") !== false:
                $category = 'ecommerce';
                break;

              case strpos($categoryName, "static") !== false:
                $category = 'static-website';
                break;

              case strpos($categoryName, "dynamic") !== false:
                $category = 'dynamic-website';
                break;

              case strpos($categoryName, "wordpress") !== false:
                $category = 'wordpress';
                break;

              case strpos($categoryName, "laravel") !== false:
                $category = 'laravel';
                break;

              case strpos($categoryName, "mern") !== false:
                $category = 'mern-stack';
                break;

              case strpos($categoryName, "application") !== false:
                $category = 'application';
                break;

              case strpos($categoryName, "business") !== false:
                $category = 'business-website';
                break;

              case strpos($categoryName, "b2b") !== false:
                $category = 'b2b-platform';
                break;

              case strpos($categoryName, "crm") !== false:
                $category = 'crm';
                break;
            }
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item" data-category="<?php echo $category; ?>">
              <div class="portfolio-img">
                <img src="<?= $site ?>admin/assets/img/uploads/<?php echo $portfolio['pro_img']; ?>" alt="<?php echo $portfolio['pro_name']; ?>">
                <div class="portfolio-overlay">
                  <a href="<?= $site ?>admin/assets/img/uploads/<?php echo $portfolio['pro_img']; ?>" class="image-popup"><i class="fa fa-search"></i></a>
                  <?php if (!empty($portfolio['slug_url'])): ?>
                    <a href="<?php echo $portfolio['slug_url']; ?>" target="_blank"><i class="fa fa-link"></i></a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="portfolio-content">
                <span class="portfolio-category"><?php echo ucfirst($category); ?></span>
                <h3><?php echo $portfolio['brand_name']; ?></h3>
                <p><?php echo substr($portfolio['short_desc'], 0, 100); ?>...</p>
                <div class="portfolio-tags">
                  <span>Web Design</span>
                  <span>Development</span>
                  <span>Responsive</span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="error-message">
              <h3>No Portfolio Items Available</h3>
              <p>We're currently updating our portfolio. Please check back soon!</p>
              <p>In the meantime, feel free to <a href="contact.php">contact us</a> to discuss your project.</p>
            </div>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </div>
  <!--===== PORTFOLIO AREA ENDS =======-->

  <!--===== CTA AREA STARTS =======-->
  <div class="cta4-section-area">
    <img src="assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h1 class="text-anime-style-1 text-light">Ready to Start Your Project?</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Let's work together to create something amazing. I specialize in responsive web design, SEO optimization, and digital marketing strategies that deliver results.</p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="contact.php" class="header-btn9"> Get A Free Quote <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== CTA AREA ENDS =======-->

  <?php include_once "includes/footer.php" ?>

  <!-- Portfolio Filter Script -->
  <script>
    $(document).ready(function() {
      $('.portfolio-filter button').on('click', function() {
        var filterValue = $(this).attr('data-filter');

        $('.portfolio-filter button').removeClass('active');
        $(this).addClass('active');

        if (filterValue === 'all') {
          $('.portfolio-item').show();
        } else {
          $('.portfolio-item').hide();
          $('.portfolio-item[data-category="' + filterValue + '"]').show();
        }
      });

      // Initialize image popup
      $('.image-popup').magnificPopup({
        type: 'image',
        gallery: {
          enabled: true
        }
      });
    });
  </script>
</body>

</html>