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

<!--===== FOOTER AREA STARTS =======-->
<div class="footer4-section-area">
  <div class="container">
    <div class="row">

      <!-- About -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area">
          <h2 class="logo_header my-2">NikhilWorks</h2>
          <p class="my-2">I am Nikhil Gupta, a passionate Web Developer specializing in MERN stack, PHP, Laravel, and modern web technologies to deliver powerful and user-friendly applications.</p>
          <ul class="social-links" style="display: flex; gap: 12px; list-style: none; padding: 0; margin: 0;">
            <li>
              <a href="<?= $contact['facebook'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['instagram'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['linkdin'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
            <li>
              <a href="<?= $contact['twitter'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <?php if (!empty($contact['github'])): ?>
            <li>
              <a href="<?= $contact['github'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <?php endif; ?>
            <br>
            
            <?php if (!empty($contact['google_review'])): ?>
            <li>
              <a href="<?= $contact['google_review'] ?>" target="_blank" style="color: #104041; font-size: 22px;">
                <i class="fab fa-google"></i>
              </a>
            </li>
            <?php endif; ?>
          </ul>

        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-2 col-md-6">
        <div class="footer-logo-area1">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="<?= $site ?>">Home</a></li>
            <li><a href="<?= $site ?>about/">About Me</a></li>
            <li><a href="<?= $site ?>services/">Services</a></li>
            <li><a href="<?= $site ?>portfolio/">Projects</a></li>
            <li><a href="<?= $site ?>blogs/">Blog</a></li>
            <li><a href="<?= $site ?>contact/">Contact</a></li>
          </ul>
        </div>
      </div>

      <!-- Contact Info -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-logo-area2">
          <h3>Get in Touch</h3>
          <ul>
            <!-- <li>
              <a href="mailto:iamnikhilgupta9@gmail.com">
                <img src="<?= $site ?>assets/img/icons/email.svg" alt="Email">
                <span>iamnikhilgupta9@gmail.com</span>
              </a>
            </li> -->
            <li>
              <a href="mailto:contact@nikhilworks.com">
                <img src="<?= $site ?>assets/img/icons/email.svg" alt="Email">
                <span>contact@nikhilworks.com</span>
              </a>
            </li>
            <li>
              <a href="#">
                <img src="<?= $site ?>assets/img/icons/location.svg" alt="Location">
                <span>Karampura, New Delhi, India</span>
              </a>
            </li>
            <li>
              <a href="tel:+918368552640">
                <img src="<?= $site ?>assets/img/icons/phone.svg" alt="Phone">
                <span>+91 83685 52640</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="col-lg-4 col-md-6">
        <div class="footer-logo-area3">
          <h3>Subscribe to Updates</h3>
          <form action="#">
            <label for="newsletter-email" class="visually-hidden">Email address</label>
            <input type="email" id="newsletter-email" placeholder="Enter your email" required>
            <button class="header-btn11">Subscribe</button>
          </form>
        </div>
      </div>

    </div>
    <div class="space80 d-lg-block d-none"></div>
    <div class="space40 d-lg-none d-block"></div>

    <!-- Copyright -->
    <div class="row">
      <div class="col-lg-12">
        <div class="copyright-area">
          <div class="pera">
            <p>ⓒ Copyright 2026 <a href="<?=$site?>">Nikhil Works</a>. All Rights Reserved.</p>
          </div>
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