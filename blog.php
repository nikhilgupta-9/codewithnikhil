<?php
include "config/connect.php";
include_once "util/function.php";


$limit = 20;
$blogs = get_blog($limit);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latest Blogs on Web Development, SEO & Digital Marketing | NikhilWorks</title>
  <meta name="description" content="Read expert blogs on Web Development, SEO, Digital Marketing, and more at NikhilWorks. Stay updated with the latest tips and strategies for growing your business online.">
  <meta name="keywords" content="web development blogs, SEO blogs, digital marketing blogs, NikhilWorks">

  <!-- Open Graph Tags -->
  <meta property="og:title" content="Latest Blogs on Web Development, SEO & Digital Marketing | NikhilWorks">
  <meta property="og:description" content="Read expert blogs on Web Development, SEO, Digital Marketing, and more.">
  <meta property="og:image" content="<?= $site ?>assets/img/blogs-banner.jpg">
  <meta property="og:url" content="<?= $site ?>blogs/">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="NikhilWorks">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Latest Blogs on Web Development, SEO & Digital Marketing | NikhilWorks">
  <meta name="twitter:description" content="Read expert blogs on Web Development, SEO, Digital Marketing, and more.">
  <meta name="twitter:image" content="<?= $site ?>assets/img/blogs-banner.jpg">


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
          "name": "Blogs",
          "item": "<?= $site ?>/blogs"
        }
      ]
    }
  </script>

</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <div class="about-header-area" style="background-image: url(<?= $site ?>assets/img/bg/cta-bg7.png); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <img src="assets/img/elements/elements1.png" alt="" class="elements1 aniamtion-key-1">
    <img src="assets/img/elements/star2.png" alt="" class="star2 keyframe5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="about-inner-header heading9 text-center">
            <h1>Our Blog</h1>
            <a href="<?=$site?>">Home <i class="fa-solid fa-angle-right"></i> <span>Our Blog</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== BLOG AREA STARTS =======-->

  <div class="blog1-scetion-area sp1 bg2">
    <div class="container">
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
    <img src="<?=$site?>assets/img/bg/cta-bg5.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="<?=$site?>assets/img/bg/cta-bg4.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 m-auto">
          <div class="cta-header-area text-center sp4 heading2">
            <h1 class="text-anime-style-1 text-light">Contact Nikhil Gupta <br class="d-md-block d-none"> Professional Web Developer & SEO Expert</h1>
            <p data-aos="fade-up" data-aos-duration="1000">Looking to create a stunning website or improve your Google rankings? <br class="d-md-block d-none">Have a project in mind? Looking for a reliable <strong>web developer</strong> or <strong>SEO expert in India</strong> to grow your business online? I’m here to help! Whether you need a responsive website, a complete <strong>SEO strategy</strong>, or <strong>digital marketing solutions</strong>, feel free to reach out. I usually respond within 24 hours.</p>
            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
              <a href="<?=$site?>contact/" class="header-btn9"> Get A Free Consultation <i
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