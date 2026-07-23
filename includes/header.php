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
                <h2 class="logo_header">NikhilWorks</h2>
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

                <li><a href="<?=$site?>hire-freelance-web-developer/">Locations <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <li><a href="<?= $site ?>web-developer-usa/">USA</a></li>
                    <li><a href="<?= $site ?>web-developer-uk/">United Kingdom</a></li>
                    <li><a href="<?= $site ?>web-developer-india/">India</a></li>
                    <li><a href="<?= $site ?>web-developer-canada/">Canada</a></li>
                    <li><a href="<?= $site ?>web-developer-australia/">Australia</a></li>
                    <li><a href="<?= $site ?>web-developer-dubai/">UAE</a></li>
                    <li><a href="<?= $site ?>web-developer-new-zealand/">New Zealand</a></li>
                    <li><a href="<?= $site ?>web-developer-germany/">Germany</a></li>
                    <li><a href="<?= $site ?>web-developer-singapore/">Singapore</a></li>
                    <li><a href="<?= $site ?>hire-freelance-web-developer/">View All Locations</a></li>
                  </ul>
                </li>
                <li><a href="<?=$site?>healthcare-website-design-usa/">Industries <i class="fa-solid fa-angle-down"></i></a>
                  <ul class="dropdown-padding">
                    <li><a href="<?= $site ?>healthcare-website-design-usa/">Healthcare</a></li>
                    <li><a href="<?= $site ?>real-estate-website-design-usa/">Real Estate</a></li>
                    <li><a href="<?= $site ?>junk-car-website-design-usa/">Junk Car Buyers</a></li>
                    <li><a href="<?= $site ?>book-website-design-usa/">Books & Publishers</a></li>
                  </ul>
                </li>
                <li><a href="<?= $site ?>portfolio/">Portfolio</a></li>
                <!-- <li><a href="<?= $site ?>blogs/">Blogs</a></li>
                <li><a href="<?= $site ?>testimonials/">Testimonials</a></li> -->
                <!-- <li><a href="<?=$site?>pricing/">Pricing Plan</a>

                </li>
                <li><a href="<?= $site ?>contact/">Contact Us</a></li> -->
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
          <a href="<?= $site ?>"><h2 class="logo_header text-light">NikhilWorks</h2></a>
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
      <h2 class="logo_header text-light">NikhilWorks</h2>
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
      <li><a href="<?= $site ?>about/">About</a></li>
      <li><a href="<?= $site ?>services/">Services</a>
        <ul class="sub-menu">
          <?php
          foreach ($services as $serv) {
          ?>
            <li><a href="<?= $site ?>service/<?= $serv['slug_url'] ?>/"><?= $serv['categories'] ?></a></li>
          <?php
          }
          ?>
        </ul>
      </li>
      <li><a href="<?= $site ?>hire-freelance-web-developer/">Locations</a>
        <ul class="sub-menu">
          <li><a href="<?= $site ?>web-developer-usa/">USA</a></li>
          <li><a href="<?= $site ?>web-developer-uk/">United Kingdom</a></li>
          <li><a href="<?= $site ?>web-developer-india/">India</a></li>
          <li><a href="<?= $site ?>web-developer-canada/">Canada</a></li>
          <li><a href="<?= $site ?>web-developer-australia/">Australia</a></li>
          <li><a href="<?= $site ?>web-developer-dubai/">UAE</a></li>
          <li><a href="<?= $site ?>web-developer-new-zealand/">New Zealand</a></li>
          <li><a href="<?= $site ?>web-developer-germany/">Germany</a></li>
          <li><a href="<?= $site ?>web-developer-singapore/">Singapore</a></li>
          <li><a href="<?= $site ?>hire-freelance-web-developer/">View All Locations</a></li>
        </ul>
      </li>
      <li><a href="<?= $site ?>healthcare-website-design-usa/">Industries</a>
        <ul class="sub-menu">
          <li><a href="<?= $site ?>healthcare-website-design-usa/">Healthcare</a></li>
          <li><a href="<?= $site ?>real-estate-website-design-usa/">Real Estate</a></li>
          <li><a href="<?= $site ?>junk-car-website-design-usa/">Junk Car Buyers</a></li>
          <li><a href="<?= $site ?>book-website-design-usa/">Books & Publishers</a></li>
        </ul>
      </li>
      <li><a href="<?= $site ?>blogs/">Blogs</a></li>
      <li><a href="<?= $site ?>portfolio/">Portfolio</a></li>
      <li><a href="<?= $site ?>testimonials/">Testimonials</a></li>
      <li><a href="<?= $site ?>pricing/">Pricing Plan</a>

      </li>
      <li><a href="<?= $site ?>contact/">Contact Us</a></li>
    </ul>

    <div class="allmobilesection">
      <a href="<?= $site ?>contact/" class="header-btn11">Get Started <i class="fa-solid fa-arrow-right"></i></a>
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
                <a href="<?= $site ?>contact/">Karampura, New Delhi, India</a>
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
                <li><a href="<?= $contact['twitter'] ?>"><i class="fa-brands fa-x-twitter"></i></a></li>
                <?php if (!empty($contact['github'])): ?><li><a href="<?= $contact['github'] ?>"><i class="fa-brands fa-github"></i></a></li><?php endif; ?>
                <?php if (!empty($contact['devto'])): ?><li><a href="<?= $contact['devto'] ?>"><i class="fa-brands fa-dev"></i></a></li><?php endif; ?>
                <?php if (!empty($contact['hashnode'])): ?><li><a href="<?= $contact['hashnode'] ?>"><i class="fa-solid fa-hashtag"></i></a></li><?php endif; ?>
                <?php if (!empty($contact['discord'])): ?><li><a href="<?= $contact['discord'] ?>"><i class="fa-brands fa-discord"></i></a></li><?php endif; ?>
                <?php if (!empty($contact['producthunt'])): ?><li><a href="<?= $contact['producthunt'] ?>"><i class="fa-brands fa-product-hunt"></i></a></li><?php endif; ?>
                <?php if (!empty($contact['google_review'])): ?><li><a href="<?= $contact['google_review'] ?>"><i class="fa-brands fa-google"></i></a></li><?php endif; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== MOBILE HEADER STARTS =======-->