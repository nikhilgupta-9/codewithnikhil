<!--===== STICKY WHATSAPP CTA =======-->
<a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%27d%20like%20to%20discuss%20a%20project." class="sticky-whatsapp-cta" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>
<style>
  .sticky-whatsapp-cta {
    position: fixed;
    right: 30px;
    bottom: 104px;
    width: 56px;
    height: 56px;
    background: #25D366;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    z-index: 999;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }
  .sticky-whatsapp-cta:hover {
    color: #fff;
    transform: scale(1.08);
    box-shadow: 0 8px 26px rgba(0, 0, 0, 0.32);
  }
  @media (max-width: 576px) {
    .sticky-whatsapp-cta { right: 16px; bottom: 16px; width: 50px; height: 50px; font-size: 24px; }
  }
</style>

<!--===== BACK TO TOP BUTTON =======-->
<button type="button" id="footerBackToTop" class="footer-back-to-top" aria-label="Back to top">
  <i class="fa-solid fa-arrow-up"></i>
</button>
<style>
  .footer-back-to-top {
    position: fixed;
    left: 30px;
    bottom: 30px;
    width: 48px;
    height: 48px;
    border: none;
    border-radius: 50%;
    background: #104041;
    color: #ADFF1C;
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
    z-index: 999;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transform: translateY(12px);
    transition: opacity 0.25s ease, transform 0.25s ease, background 0.25s ease, visibility 0.25s ease;
  }
  .footer-back-to-top.is-visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  .footer-back-to-top:hover {
    background: #ADFF1C;
    color: #104041;
  }
  @media (max-width: 576px) {
    .footer-back-to-top { left: 16px; bottom: 78px; width: 42px; height: 42px; font-size: 16px; }
  }
</style>

<?php
// ---- Trust metrics shown in the footer brand column -----------------------
// EDIT ME: these three numbers are not stored in the database yet.
// Replace with your real figures before this goes live.
// Kept as plain numbers (no +/★ suffix) so the count-up animation below can parse them.
$footerYearsInBusiness = '3';
$footerProjectsDelivered = '20';
$footerGoogleRating = '4.9';
?>

<!--===== FOOTER TOP CTA BAR =======-->
<div class="footer-cta-bar">
  <div class="container">
    <div class="row g-3">
      <div class="col-lg-4 col-md-6">
        <a class="footer-cta-card" href="mailto:contact@nikhilworks.com">
          <span class="footer-cta-icon"><i class="fa-solid fa-envelope"></i></span>
          <span class="footer-cta-text">
            <strong>Email Us</strong>
            <span>contact@nikhilworks.com</span>
          </span>
          <span class="footer-cta-copy" data-copy="contact@nikhilworks.com" title="Copy email"><i class="fa-regular fa-copy"></i></span>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a class="footer-cta-card" href="tel:+918368552640">
          <span class="footer-cta-icon"><i class="fa-solid fa-phone-volume"></i></span>
          <span class="footer-cta-text">
            <strong>Call Us Now</strong>
            <span>+91 83685 52640</span>
          </span>
          <span class="footer-cta-copy" data-copy="+918368552640" title="Copy number"><i class="fa-regular fa-copy"></i></span>
        </a>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="footer-cta-card footer-cta-card-static">
          <span class="footer-cta-icon"><i class="fa-solid fa-location-dot"></i></span>
          <span class="footer-cta-text">
            <strong>Visit Our Office</strong>
            <span>Karampura, New Delhi, India</span>
            <span class="footer-cta-hours">Mon – Sat, 10:00 AM – 7:00 PM IST</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== FOOTER TOP CTA BAR ENDS =======-->

<!--===== FOOTER AREA STARTS =======-->
<div class="footer4-section-area">
  <div class="container">
    <div class="row">

      <!-- Company Branding & Info -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area">
          <h2 class="logo_header my-2">NikhilWorks</h2>
          <p class="my-2">Nikhil Gupta — a freelance web development, CRM &amp; digital marketing studio helping businesses grow online across India, USA, UK, Canada, Australia, UAE and beyond.</p>

          <ul class="footer-trust-stats">
            <li><strong><span class="footer-counter" data-counter-time="1200"><?= $footerGoogleRating ?></span>★</strong><span>Google Rating</span></li>
            <li><strong><span class="footer-counter" data-counter-time="1600"><?= $footerProjectsDelivered ?></span>+</strong><span>Projects Delivered</span></li>
            <li><strong><span class="footer-counter" data-counter-time="1200"><?= $footerYearsInBusiness ?></span>+</strong><span>Years in Business</span></li>
          </ul>

          <p class="footer-follow-label">Follow Us</p>
          <ul class="social-links" style="display: flex; gap: 12px; list-style: none; padding: 0; margin: 0; flex-wrap: wrap;">
            <li>
              <a href="<?= $contact['twitter'] ?>" target="_blank" rel="noopener" aria-label="X (Twitter)" style="color: #104041; font-size: 22px;">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['facebook'] ?>" target="_blank" rel="noopener" aria-label="Facebook" style="color: #104041; font-size: 22px;">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['instagram'] ?>" target="_blank" rel="noopener" aria-label="Instagram" style="color: #104041; font-size: 22px;">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['linkdin'] ?>" target="_blank" rel="noopener" aria-label="LinkedIn" style="color: #104041; font-size: 22px;">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
            <!-- <?php if (!empty($contact['github'])): ?>
            <li>
              <a href="<?= $contact['github'] ?>" target="_blank" rel="noopener" aria-label="GitHub" style="color: #104041; font-size: 22px;">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['google_review'])): ?>
            <li>
              <a href="<?= $contact['google_review'] ?>" target="_blank" rel="noopener" aria-label="Google Reviews" style="color: #104041; font-size: 22px;">
                <i class="fab fa-google"></i>
              </a>
            </li>
            <?php endif; ?> -->
          </ul>
        </div>
      </div>

      <!-- Our Services -->
      <div class="col-lg-2 col-md-6">
        <div class="footer-logo-area1">
          <h3 class="footer-accordion-toggle">Our Services <i class="fa-solid fa-chevron-down"></i></h3>
          <ul>
            <?php foreach ($services as $serv): ?>
              <li><a href="<?= $site ?>service/<?= $serv['slug_url'] ?>/"><?= $serv['categories'] ?></a></li>
            <?php endforeach; ?>
            <li><a href="<?= $site ?>api-integration-services-india/">API &amp; Integration Services</a></li>
          </ul>
        </div>
      </div>

      <!-- Our Products / Solutions -->
      <div class="col-lg-2 col-md-6">
        <div class="footer-logo-area1">
          <h3 class="footer-accordion-toggle">Products &amp; Solutions <i class="fa-solid fa-chevron-down"></i></h3>
          <ul>
            <li><a href="<?= $site ?>crm-development-india/">CRM Development</a></li>
            <li><a href="<?= $site ?>api-integration-services-india/">API &amp; Integrations</a></li>
            <li><a href="<?= $site ?>service/website-maintenance-support/">Website Maintenance</a></li>
            <li><a href="<?= $site ?>service/website-redesign/">Website Redesign</a></li>
            <li><a href="<?= $site ?>website-auditing-india/">Website Auditing</a></li>
            <li><a href="<?= $site ?>keyword-promotion-india/">Keyword Promotion</a></li>
            <li><a href="<?= $site ?>ads-management-india/">Google &amp; Meta Ads</a></li>
          </ul>
        </div>
      </div>

      <!-- Company -->
      <div class="col-lg-2 col-md-6">
        <div class="footer-logo-area1">
          <h3 class="footer-accordion-toggle">Company <i class="fa-solid fa-chevron-down"></i></h3>
          <ul>
            <li><a href="<?= $site ?>about/">About Us</a></li>
            <li><a href="<?= $site ?>contact/">Contact Us</a></li>
            <li><a href="<?= $site ?>blogs/">Blog</a></li>
            <li><a href="<?= $site ?>privacy-policy/">Privacy Policy</a></li>
            <li><a href="<?= $site ?>terms-and-conditions/">Terms &amp; Conditions</a></li>
          </ul>
        </div>
      </div>

      <!-- Quick Links / Resources -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area1">
          <h3 class="footer-accordion-toggle">Quick Links <i class="fa-solid fa-chevron-down"></i></h3>
          <ul>
            <li><a href="<?= $site ?>portfolio/">Portfolio</a></li>
            <li><a href="<?= $site ?>pricing/">Pricing Plans</a></li>
            <li><a href="<?= $site ?>testimonials/">Testimonials</a></li>
            <li><a href="<?= $site ?>website-development-cost-india/">Website Cost Calculator</a></li>
            <li><a href="<?= $site ?>contact/">Get a Free Consultation</a></li>
            <li><a href="<?= $site ?>hire-freelance-web-developer/">Hire a Freelance Developer</a></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="space40 d-lg-block d-none"></div>
    <div class="space40 d-lg-none d-block"></div>

    <!-- SEO Keyword / Popular Pages tag grid -->
    <div class="footer-seo-section footer-glass-panel">
      <h4>Popular Searches</h4>
      <div class="footer-tag-grid">
        <a href="<?= $site ?>service/website-design-development/">Web Design &amp; Development</a>
        <a href="<?= $site ?>service/e-commerce-website-development/">E-commerce Website Development</a>
        <a href="<?= $site ?>service/wordpress-website-development/">WordPress Development</a>
        <a href="<?= $site ?>service/landing-page-design/">Landing Page Design</a>
        <a href="<?= $site ?>service/mobile-app-development-services/">Mobile App Development</a>
        <a href="<?= $site ?>service/social-media-marketing/">Social Media Marketing</a>
        <a href="<?= $site ?>seo-services-india/">SEO Services India</a>
        <a href="<?= $site ?>seo-services-usa/">SEO Services USA</a>
        <a href="<?= $site ?>crm-development-india/">CRM Development India</a>
        <a href="<?= $site ?>crm-development-usa/">CRM Development USA</a>
        <a href="<?= $site ?>keyword-promotion-india/">Keyword Promotion</a>
        <a href="<?= $site ?>ads-management-india/">Google &amp; Meta Ads Management</a>
        <a href="<?= $site ?>service/website-maintenance-support/">Website Maintenance &amp; Support</a>
        <a href="<?= $site ?>service/website-redesign/">Website Redesign</a>
        <a href="<?= $site ?>website-auditing-india/">Website Auditing</a>
        <a href="<?= $site ?>website-development-cost-india/">Website Development Cost in India</a>
        <a href="<?= $site ?>healthcare-website-design-usa/">Healthcare Website Design</a>
        <a href="<?= $site ?>real-estate-website-design-usa/">Real Estate Website Design</a>
        <a href="<?= $site ?>junk-car-website-design-usa/">Junk Car Website Design</a>
        <a href="<?= $site ?>book-website-design-usa/">Book &amp; Publisher Website Design</a>
        <a href="<?= $site ?>api-integration-services-india/">API Integration Services</a>
      </div>
    </div>

    <div class="space40 d-lg-block d-none"></div>
    <div class="space40 d-lg-none d-block"></div>

    <!-- Global / Regional Coverage grid -->
    <div class="footer-region-section footer-glass-panel-2">
      <h4>Where We Work</h4>
      <div class="row footer-region-grid">
        <div class="col-lg-2 col-md-4 col-6">
          <h5>India</h5>
          <ul>
            <li><a href="<?= $site ?>web-developer-india/">India (All Cities)</a></li>
            <li><a href="<?= $site ?>web-designer-delhi/">Delhi</a></li>
            <li><a href="<?= $site ?>freelance-web-developer-india/">Freelance Developer India</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>North America</h5>
          <ul>
            <li><a href="<?= $site ?>web-developer-usa/">USA</a></li>
            <li><a href="<?= $site ?>web-developer-canada/">Canada</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Europe</h5>
          <ul>
            <li><a href="<?= $site ?>web-developer-uk/">United Kingdom</a></li>
            <li><a href="<?= $site ?>web-developer-germany/">Germany</a></li>
            <li><a href="<?= $site ?>web-developer-switzerland/">Switzerland</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Middle East</h5>
          <ul>
            <li><a href="<?= $site ?>web-developer-dubai/">UAE (Dubai)</a></li>
            <li><a href="<?= $site ?>web-developer-saudi-arabia/">Saudi Arabia</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Asia Pacific</h5>
          <ul>
            <li><a href="<?= $site ?>web-developer-australia/">Australia</a></li>
            <li><a href="<?= $site ?>web-developer-new-zealand/">New Zealand</a></li>
            <li><a href="<?= $site ?>web-developer-singapore/">Singapore</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <h5>Worldwide</h5>
          <ul>
            <li><a href="<?= $site ?>hire-freelance-web-developer/">View All Countries</a></li>
            <li><a href="<?= $site ?>web-developer-south-africa/">South Africa</a></li>
            <li><a href="<?= $site ?>web-developer-russia/">Russia</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="space40 d-lg-block d-none"></div>
    <div class="space40 d-lg-none d-block"></div>

    <!-- Trust & Security Bar / Copyright -->
    <div class="row">
      <div class="col-lg-12">
        <div class="copyright-area footer-trust-bar">
          <div class="pera">
            <p>ⓒ Copyright <?= date('Y') ?> <a href="<?=$site?>">Nikhil Works</a>. All Rights Reserved.</p>
          </div>
          <ul class="footer-trust-badges">
            <li><i class="fa-solid fa-lock"></i> SSL Secured</li>
            <?php if (!empty($contact['google_review'])): ?>
              <li><a href="<?= $contact['google_review'] ?>" target="_blank" rel="noopener"><i class="fab fa-google"></i> Read Our Reviews</a></li>
            <?php endif; ?>
          </ul>
          <ul>
            <li><a href="<?= $site ?>terms-and-conditions/">Terms & Conditions</a></li>
            <li><a href="<?= $site ?>privacy-policy/" class="m-0">Privacy Policy</a></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</div>
<!--===== FOOTER AREA ENDS =======-->

<style>
  .footer-cta-bar {
    background: #0A2828;
    padding: 28px 0;
  }
  .footer-cta-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    background: #104041;
    border-radius: 12px;
    padding: 18px 20px;
    height: 100%;
    text-decoration: none;
    transition: transform 0.25s ease, background 0.25s ease;
  }
  a.footer-cta-card:hover {
    background: #14524f;
    transform: translateY(-3px);
  }
  .footer-cta-copy {
    margin-left: auto;
    flex: 0 0 auto;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #b7cfcb;
    font-size: 14px;
    opacity: 0;
    transform: translateX(-6px);
    transition: opacity 0.2s ease, transform 0.2s ease, background 0.2s ease, color 0.2s ease;
  }
  a.footer-cta-card:hover .footer-cta-copy {
    opacity: 1;
    transform: translateX(0);
  }
  .footer-cta-copy:hover,
  .footer-cta-copy.is-copied {
    background: #ADFF1C;
    color: #104041;
  }
  @media (max-width: 767px) {
    .footer-cta-copy { opacity: 1; transform: none; }
  }
  .footer-cta-icon {
    flex: 0 0 auto;
    width: 46px;
    height: 46px;
    border-radius: 50%;
    background: #ADFF1C;
    color: #0a2b2c;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
  }
  .footer-cta-text {
    display: flex;
    flex-direction: column;
    color: #fff;
    line-height: 1.4;
  }
  .footer-cta-text strong {
    font-size: 15px;
    color: #ADFF1C;
  }
  .footer-cta-text span {
    font-size: 14px;
    color: #e8f5f2;
  }
  .footer-cta-hours {
    font-size: 12px !important;
    color: #b7cfcb !important;
  }

  .footer-trust-stats {
    display: flex;
    gap: 18px;
    list-style: none;
    padding: 0;
    margin: 6px 0 16px;
  }
  .footer-trust-stats li {
    display: flex;
    flex-direction: column;
  }
  .footer-trust-stats strong {
    color: #104041;
    font-size: 18px;
    font-weight: 700;
  }
  .footer-trust-stats span {
    font-size: 12px;
    color: #6a6a6a;
  }
  .footer-follow-label {
    font-size: 13px;
    font-weight: 600;
    color: #104041;
    margin-bottom: 8px;
  }

  .footer-seo-section h4,
  .footer-region-section h4 {
    color: #104041;
    font-size: 16px;
    font-weight: 700;
    margin-bottom: 16px;
  }
  .footer-tag-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
  }
  .footer-tag-grid a {
    display: inline-block;
    padding: 5px 10px;
    border-radius: 20px;
    border: 1px solid #82d300;
    color: #104041;
    font-size: 13px;
    text-decoration: none;
    transition: all 0.2s ease;
  }
  .footer-tag-grid a:hover {
    background: #104041;
    border-color: #104041;
    color: #fff;
  }

  .footer-region-grid h5 {
    color: #104041;
    font-size: 14px;
    font-weight: 700;
    margin-bottom: 10px;
  }
  .footer-region-grid ul {
    list-style: none;
    padding: 0;
    margin: 0 0 20px;
  }
  .footer-region-grid ul li {
    margin-bottom: 8px;
  }
  .footer-region-grid ul li a {
    color: #3D4C5E;
    font-size: 13px;
    text-decoration: none;
  }
  .footer-region-grid ul li a:hover {
    color: #104041;
    text-decoration: underline;
  }

  .footer-trust-bar {
    flex-wrap: wrap;
    gap: 12px;
  }
  .footer-trust-badges {
    display: flex;
    gap: 18px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 13px;
    color: #6a6a6a;
  }
  .footer-trust-badges a {
    color: #6a6a6a;
    text-decoration: none;
  }
  .footer-trust-badges i {
    color: #104041;
    margin-right: 4px;
  }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!--===== JS SCRIPT LINK =======-->
<!-- jQuery stays blocking — every plugin below and inline $(document).ready() blocks depend on it being available synchronously -->
<script src="<?= $site ?>assets/js/plugins/bootstrap.min.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/fontawesome.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/aos.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/counter.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/gsap.min.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/ScrollTrigger.min.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/Splitetext.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/sidebar.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/magnific-popup.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/mobilemenu.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/owlcarousel.min.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/gsap-animation.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/nice-select.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/waypoints.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/slick-slider.js" defer></script>
<script src="<?= $site ?>assets/js/plugins/circle-progress.js" defer></script>
<script src="<?= $site ?>assets/js/main.js" defer></script>

<script>
  $(document).ready(function() {
    $('.btn-group-toggle label').click(function() {
      var target = $(this).find('input').attr('id');

      // Hide all service categories
      $('.service-category-content').addClass('d-none');

      // Show selected category
      if (target === 'option1') {
        $('#web-development').removeClass('d-none');
      } else if (target === 'option2') {
        $('#digital-marketing').removeClass('d-none');
      } else if (target === 'option3') {
        $('#design-branding').removeClass('d-none');
      }
    });
  });
</script>

<!--===== FOOTER INTERACTIVITY =======-->
<style>
  /* Arrow-in link hover for the footer link columns */
  .footer-logo-area1 ul li a {
    position: relative;
  }
  .footer-logo-area1 ul li a::before {
    content: "\2192";
    position: absolute;
    left: -14px;
    top: 0;
    opacity: 0;
    color: var(--ztc-text-text-6);
    transition: opacity 0.3s ease;
  }
  .footer-logo-area1 ul li a:hover::before {
    opacity: 1;
  }

  /* Mobile accordion for the footer link columns */
  .footer-accordion-toggle {
    cursor: default;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .footer-accordion-toggle i {
    display: none;
    font-size: 14px;
    transition: transform 0.3s ease;
  }
  @media (max-width: 767px) {
    .footer-accordion-toggle {
      cursor: pointer;
      border-bottom: 1px solid rgba(16, 64, 65, 0.1);
      padding-bottom: 12px;
    }
    .footer-accordion-toggle i {
      display: inline-block;
    }
    .footer-accordion-toggle.is-open i {
      transform: rotate(180deg);
    }
    .footer-logo-area1 ul {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.35s ease;
    }
    .footer-logo-area1 ul.is-open {
      max-height: 500px;
    }
  }
</style>
<script>
  $(document).ready(function() {

    // Count up the trust-stat numbers once they scroll into view
    $('.footer-counter').countUp();

    // Mobile accordion for the footer link columns
    function isMobile() {
      return window.matchMedia('(max-width: 767px)').matches;
    }
    $('.footer-accordion-toggle').on('click', function() {
      if (!isMobile()) return;
      $(this).toggleClass('is-open');
      $(this).next('ul').toggleClass('is-open');
    });

    // Copy email / phone from the top CTA cards
    $('.footer-cta-copy').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var $btn = $(this);
      var text = $btn.data('copy');
      var icon = $btn.find('i');

      function showCopied() {
        $btn.addClass('is-copied');
        icon.removeClass('fa-copy').addClass('fa-check');
        setTimeout(function() {
          $btn.removeClass('is-copied');
          icon.removeClass('fa-check').addClass('fa-copy');
        }, 1500);
      }

      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(showCopied);
      } else {
        var tmp = $('<input>').val(text).appendTo('body').select();
        document.execCommand('copy');
        tmp.remove();
        showCopied();
      }
    });

    // Back-to-top button
    var $backToTop = $('#footerBackToTop');
    $(window).on('scroll', function() {
      if ($(window).scrollTop() > 400) {
        $backToTop.addClass('is-visible');
      } else {
        $backToTop.removeClass('is-visible');
      }
    });
    $backToTop.on('click', function() {
      $('html, body').animate({ scrollTop: 0 }, 500);
    });
  });
</script>

<style>
  .service-card {
    background: #fff;
    border-radius: 12px;
    padding: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
    height: 100%;
  }

  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .service-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 20px;
  }

  .service-icon {
    color: #104041;
  }

  .service-experience span {
    background: #104041;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
  }

  .service-card h3 {
    color: #104041;
    margin-bottom: 5px;
    font-size: 1.5rem;
  }

  .service-tagline {
    color: #666;
    font-weight: 600;
    margin-bottom: 15px;
    font-size: 0.9rem;
  }

  .service-description {
    color: #666;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .service-features {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
  }

  .service-features li {
    padding: 5px 0;
    color: #555;
  }

  .service-features i {
    color: #28a745;
    margin-right: 10px;
  }

  .service-cta {
    display: flex;
    gap: 10px;
  }

  .btn-service {
    background: #ADFF1C;
    color: #0a2b2c;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    flex: 1;
    text-align: center;
    transition: all 0.3s ease;
  }

  .btn-service:hover {
    background: #0a2b2c;
    color: white;
    transform: translateY(-2px);
  }

  .btn-service-outline {
    border: 2px solid #104041;
    color: #104041;
    padding: 10px 20px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    flex: 1;
    text-align: center;
    transition: all 0.3s ease;
  }

  .btn-service-outline:hover {
    background: #104041;
    color: white;
  }

  .service-categories {
    margin-bottom: 40px;
  }

  .service-categories .btn {
    margin: 0 5px;
    padding: 12px 25px;
    border-radius: 30px;
    font-weight: 600;
  }
</style>