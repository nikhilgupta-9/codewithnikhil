<?php
include 'config/connect.php'; // DB connection
include 'util/function.php';

$limit = 3;
$contact = contact_us();
$blogs = get_blog($limit); 
// Get blog by slug
$slug = $_GET['alias'] ?? '';
$blog = fetch_blog_detail($slug);

if (!$blog) {
  header("HTTP/1.0 404 Not Found");
  echo "Blog not found!";
  exit();
}

// SEO variables
$metaTitle = $blog['meta_title'] ?: $blog['title'];
$metaDesc = $blog['meta_description'] ?: substr(strip_tags($blog['content']), 0, 150);
$blogImage = "uploads/" . $blog['image'];
$siteURL = "https://codewithnikhil.in/blog/" . $blog['slug_url'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($metaTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($blog['tags']) ?>">

  <!-- Open Graph for Social Media -->
  <meta property="og:title" content="<?= htmlspecialchars($metaTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:image" content="<?= $blogImage ?>">
  <meta property="og:url" content="<?= $siteURL ?>">
  <meta property="og:type" content="article">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($metaTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="twitter:image" content="<?= $blogImage ?>">

  <!-- JSON-LD Schema -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BlogPosting",
      "headline": "<?= htmlspecialchars($blog['title']) ?>",
      "image": "<?= $blogImage ?>",
      "author": {
        "@type": "Person",
        "name": "<?= htmlspecialchars($blog['author']) ?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "CodeWithNikhil",
        "logo": {
          "@type": "ImageObject",
          "url": "https://codewithnikhil.in/assets/img/logo.png"
        }
      },
      "datePublished": "<?= $blog['created_at'] ?>",
      "dateModified": "<?= $blog['updated_at'] ?>"
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
            <h1 class="fs-3"><?= $blog['title'] ?></h1>
            <a href="<?= $site ?>">Home <i class="fa-solid fa-angle-right"></i> <span>Our Blog</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== HERO AREA ENDS =======-->

  <!--===== BLOG AREA STARTS =======-->
  <div class="blog-auhtor-section-area sp1">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-auhtor-sidebar-area heading2">
            <div class="tags-area">
              <ul>
                <li><a href="#"><img src="<?= $site ?>assets/img/icons/contact1.svg" alt=""><?= $blog['author'] ?></a></li>
                <li><a href="#"><img src="<?= $site ?>assets/img/icons/calender1.svg" alt=""><?= date('d M Y h:i A', strtotime($blog['created_at'])) ?></a></li>
              </ul>
            </div>
            <h2><?= $blog['title'] ?></h2>
            <div class="space34"></div>
            <div class="img1">
              <img src="<?= $site ?>admin/uploads/blogs/<?= $blog['image'] ?>" alt="">
            </div>
            <div class="space24"></div>
            <?= $blog['content'] ?>



            <div class="space50"></div>
            <h3>Blog Comments (2)</h3>
            <div class="space32"></div>
            <div class="comments-boxarea">
              <div class="comments-boxes">
                <div class="comments-auhtor-box">
                  <div class="img3">
                    <img src="assets/img/all-images/comments-img1.png" alt="">
                  </div>
                  <div class="content">
                    <a href="#" class="name">Mr. Ana Ritchie</a>
                    <a href="#" class="date">12 May 2024</a>
                  </div>
                </div>
                <a href="#" class="reply">Reply</a>
              </div>
              <div class="space16"></div>
              <p>"This is a fantastic guide on PPC advertising! I've been struggling to good ROI with my campaigns, but your tips on keyword research ad copywriting have given me some great ideas to try. Thanks for sharing such valuable information!"</p>
            </div>
            <div class="space30"></div>
            <div class="comments-boxarea box2">
              <div class="comments-boxes">
                <div class="comments-auhtor-box">
                  <div class="img3">
                    <img src="assets/img/all-images/comments-img2.png" alt="">
                  </div>
                  <div class="content">
                    <a href="#" class="name">Matthew Kuhnemann</a>
                    <a href="#" class="date">12 May 2024</a>
                  </div>
                </div>
                <a href="#" class="reply">Reply</a>
              </div>
              <div class="space16"></div>
              <p>"Great article! I especially appreciate the section on ad extensions. I've been neglecting them in my campaigns, but now I see how they can really enhance the visibility and effectiveness of my ads. Time to make some changes!" </p>
            </div>
            <div class="space50"></div>

            <div class="contact-form-area">
              <h4>Leave a Reply</h4>
              <div class="space16"></div>
              <p>Provide clear contact information, including phone number, email, and address.</p>
              <div class="space12"></div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="text" placeholder="First Name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="text" placeholder="Last Name">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="input-area">
                    <input type="number" placeholder="Phone">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="input-area">
                    <input type="text" placeholder="Subject">
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="input-area">
                    <textarea placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="space24"></div>
                  <div class="input-area">
                    <button type="submit" class="header-btn11">Submit <span><i class="fa-solid fa-arrow-right"></i></span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="blog-sidebar-area">
            <div class="search-area">
              <h3>Search</h3>
              <form>
                <input type="text" placeholder="Search...">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
              </form>
            </div>
            <div class="space32"></div>
            <div class="categories-area">
              <h3>Categories</h3>
              <ul>
                <li><a href="#">PPC Advertising</a></li>
                <li><a href="#">Digital Marketing</a></li>
                <li><a href="#">Social Media Marketing</a></li>
                <li><a href="#">SEO Analysis</a></li>
                <li><a href="#">Content Marketing</a></li>
              </ul>
            </div>
            <div class="space32"></div>
            <div class="posts-area">
              <h3>Recent Post</h3>
              <div class="post-auhtor-area">
                <div class="img1">
                  <img src="<?=$site?>assets/img/all-images/post-img1.png" alt="">
                </div>
                <div class="content">
                  <a href="#" class="date"><img src="<?=$site?>assets/img/icons/calender1.svg" alt="">16 August 2023</a>
                  <a href="#" class="head">The Importance of Responsive Web Design in the Mobile Age</a>
                </div>
              </div>

              <div class="post-auhtor-area box2">
                <div class="img1">
                  <img src="<?=$site?>assets/img/all-images/post-img2.png" alt="">
                </div>
                <div class="content">
                  <a href="#" class="date"><img src="<?=$site?>assets/img/icons/calender1.svg" alt="">16 August 2023</a>
                  <a href="#" class="head">The Power of Content Marketing How to Drive... </a>
                </div>
              </div>

              <div class="post-auhtor-area">
                <div class="img1">
                  <img src="<?=$site?>assets/img/all-images/post-img3.png" alt="">
                </div>
                <div class="content">
                  <a href="#" class="date"><img src="<?=$site?>assets/img/icons/calender1.svg" alt="">16 August 2023</a>
                  <a href="#" class="head">The Power of Social Media Marketing: How to Build Your...</a>
                </div>
              </div>

              <div class="post-auhtor-area">
                <div class="img1">
                  <img src="<?=$site?>assets/img/all-images/post-img4.png" alt="">
                </div>
                <div class="content">
                  <a href="#" class="date"><img src="<?=$site?>assets/img/icons/calender1.svg" alt="">16 August 2023</a>
                  <a href="#" class="head">Social Media Marketing Strategies Drive Engagement..</a>
                </div>
              </div>
            </div>
            <div class="space32"></div>
            <div class="tags-area">
              <h3>Popular Tags</h3>
              <ul>
                <li><a href="#">SEO</a></li>
                <li><a href="#">Digital Marketing</a></li>
                <li><a href="#" class="m-0">PPC</a></li>
              </ul>
              <ul>
                <li><a href="#">Keyword Research</a></li>
                <li><a href="#" class="m-0">Content</a></li>
              </ul>
              <ul>
                <li><a href="#">Email Marketing</a></li>
                <li><a href="#" class="m-0">Social Media</a></li>
              </ul>
            </div>
            <div class="space32"></div>
            <div class="others-area">
              <h3>If You Need Any Help Contact With Us</h3>
              <div class="space16"></div>
              <div class="btn-area">
                <a href="tel:<?=$contact['phone']?>" class="header-btn11">+91-<?=$contact['phone']?> <span><i class="fa-solid fa-arrow-right"></i></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--===== BLOG AREA ENDS =======-->

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
        foreach($blogs as $blog){
        ?>
        <div class="col-lg-4 col-md-6">
          <div class="blog-author-boxarea">
            <div class="img1">
              <img src="<?=$site?>admin/uploads/blogs/<?=$blog['image']?>" alt="">
            </div>
            <div class="content-area">
              <div class="tags-area">
                <ul>
                  <li><a href="#"><img src="<?=$site?>assets/img/icons/contact1.svg" alt=""><?=$blog['author']?></a></li>
                  <li><a href="#"><img src="<?=$site?>assets/img/icons/calender1.svg" alt=""><?= date('d M Y h:i A', strtotime($blog['created_at'])) ?></a></li>
                </ul>
              </div>
              <a href="<?=$site?>blog/<?=$blog['slug_url']?>"><?=$blog['title']?></a>
              <p><?=$blog['meta_description']?> </p>
              <a href="<?=$site?>blog/<?=$blog['slug_url']?>" class="readmore">Read More <i class="fa-solid fa-arrow-right"></i></a>
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