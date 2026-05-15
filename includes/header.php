<?php
include_once "util/function.php";
$contact = contact_us();

$limit = 10;
$services = get_sub_category($limit);
?>
<!--===== PRELOADER STARTS =======-->
<div class="preloader preloader3">
  <div class="loading-container">
    <div class="loading"></div>
    <div id="loading-icon"><img src="<?= $site ?>assets/img/logo/preloader4.png" alt=""></div>
  </div>
</div>
<!--===== PRELOADER ENDS =======-->

<!--===== PROGRESS STARTS=======-->
<div class="paginacontainer">
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
</div>
<!--===== PROGRESS ENDS=======-->

<!--=====HEADER START=======-->
<header>
  <div class="header-area homepage4 header header-sticky d-none d-lg-block " id="header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-elements">
            <div class="site-logo">
              <a href="<?= $site ?>">
                <h2 class="logo_header">CodeWithNikhil</h2>
              </a>
            </div>
            <div class="main-menu">
              <ul>
                <li><a href="<?= $site ?>">Home </a> </li>
                <li><a href="<?=$site?>about/">About</a></li>
                <li><a href="<?=$site?>services/">Services <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <?php
                    foreach ($services as $serv) {
                    ?>
                      <li><a href="<?= $site ?>service/<?= $serv['slug_url'] ?>/"><?= $serv['categories'] ?></a></li>
                    <?php
                    }
                    ?>

                  </ul>
                </li>

                <li><a href="<?= $site ?>portfolio/">Portfolio</a></li>
                <!-- <li><a href="#">Blogs <i class="fa-solid fa-angle-down"></i></a>
                    <ul class="dropdown-padding">
                      <li><a href="blog.php">Blog One</a></li>
                      <li><a href="blog-detail.php">Blog Right</a></li>
                    </ul>
                  </li> -->
                <li><a href="<?=$site?>pricing/">Pricing Plan</a>
                  <!-- <ul class="dropdown-padding">
                      <li><a href="case.html">Case Study</a></li>
                      <li><a href="case-single.html">Case Study Single</a></li>
                      <li><a href="team.html">Our Team</a></li>
                      <li><a href="pricing.html">Pricing Plan</a></li>
                      <li><a href="testimonials.html">Testimonials</a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="404-2.html">404</a></li>
                    </ul> -->
                </li>
                <li><a href="<?= $site ?>contact/">Contact Us</a></li>
              </ul>
            </div>

            <div class="btn-area">
              <a href="<?= $site ?>contact/" class="header-btn11">Get In Touch <i class="fa-solid fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--=====HEADER END =======-->

<!--===== MOBILE HEADER STARTS =======-->
<div class="mobile-header mobile-haeder4 d-block d-lg-none">
  <div class="container-fluid">
    <div class="col-12">
      <div class="mobile-header-elements">
        <div class="mobile-logo">
          <a href="<?= $site ?>"><h2 class="logo_header text-light">CodeWithNikhil</h2></a>
        </div>
        <div class="mobile-nav-icon dots-menu">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mobile-sidebar mobile-sidebar4">
  <div class="logosicon-area">
    <div class="logos">
      <h2 class="logo_header text-light">CodeWithNikhil</h2>
    </div>
    <div class="menu-close">
      <i class="fa-solid fa-xmark"></i>
    </div>
  </div>
  <div class="mobile-nav mobile-nav1">
    <ul class="mobile-nav-list nav-list1">
      <li>
        <a href="<?= $site ?>">Home </a>
      </li>
      <li><a href="<?= $site ?>about.php">About</a></li>
      <li><a href="<?= $site ?>services.php">Services</a>
        <ul class="sub-menu">
          <?php
          foreach ($services as $serv) {
          ?>
            <li><a href="<?= $site ?>services/<?= $serv['slug_url'] ?>"><?= $serv['categories'] ?></a></li>
          <?php
          }
          ?>
        </ul>
      </li>
      <li><a href="#">Blogs</a>
        <ul class="sub-menu">
          <li><a href="<?= $site ?>blog.php">Blog One</a></li>
          <li><a href="<?= $site ?>blog-detail.php">Blog Detail</a></li>
        </ul>
      </li>
      <li><a href="<?= $site ?>portfolio/">Portfolio</a></li>
      <li><a href="<?= $site ?>pricing.php">Pricing Plan</a>

      </li>
      <li><a href="<?= $site ?>contact/">Contact Us</a></li>
    </ul>

    <div class="allmobilesection">
      <a href="<?= $site ?>contact.php" class="header-btn11">Get Started <i class="fa-solid fa-arrow-right"></i></a>
      <div class="single-footer">
        <h3>Contact Info</h3>
        <div class="footer1-contact-info">
          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-phone-volume"></i>
            </div>
            <div class="contact-info-text">
              <a href="tel:918368552640">8368552640</a>
            </div>
          </div>

          <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
             <div class="contact-info-text">
              <a href="mailto:iamnikhilgupta9@gmail.com">iamnikhilgupta9@gmail.com</a>
            </div>
            
          </div>
          
           <div class="contact-info-single">
            <div class="contact-info-icon">
              <i class="fa-solid fa-envelope"></i>
            </div>
            
            <div class="contact-info-text">
              <a href="mailto:contact@nikhilworks.com">contact@nikhilworks.com</a>
            </div>
          </div>

          <div class="single-footer">
            <h3>Our Location</h3>

            <div class="contact-info-single">
              <div class="contact-info-icon">
                <i class="fa-solid fa-location-dot"></i>
              </div>
              <div class="contact-info-text">
                <a href="mailto:contact@nikhilworks.com">Karampura, Delhi
                  States</a>
              </div>
            </div>

          </div>
          <div class="single-footer">
            <h3>Social Links</h3>

            <div class="social-links-mobile-menu">
              <ul>
                <li><a href="<?= $contact['facebook'] ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="<?= $contact['instagram'] ?>"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="<?= $contact['linkdin'] ?>"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="<?= $contact['twitter'] ?>"><i class="fa-brands fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== MOBILE HEADER STARTS =======-->