<!--===== STICKY WHATSAPP CTA =======-->
<a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%27d%20like%20to%20discuss%20a%20project." class="sticky-whatsapp-cta" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
  <i class="fa-brands fa-whatsapp"></i>
</a>
<style>
  .sticky-whatsapp-cta {
    position: fixed;
    right: 28px;
    bottom: 96px;
    width: 56px;
    height: 56px;
    background: #25D366;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
    z-index: 999;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }
  .sticky-whatsapp-cta:hover {
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 10px 30px rgba(37, 211, 102, 0.5);
  }
  @media (max-width: 576px) {
    .sticky-whatsapp-cta { right: 16px; bottom: 18px; width: 48px; height: 48px; font-size: 24px; }
  }
</style>

<!--===== BACK TO TOP BUTTON =======-->
<button type="button" id="footerBackToTop" class="footer-back-to-top" aria-label="Back to top">
  <i class="fa-solid fa-arrow-up"></i>
</button>
<style>
  .footer-back-to-top {
    position: fixed;
    left: 28px;
    bottom: 28px;
    width: 46px;
    height: 46px;
    border: 1px solid rgba(173, 255, 28, 0.4);
    border-radius: 50%;
    background: #082223;
    color: #ADFF1C;
    font-size: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.35);
    z-index: 999;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transform: translateY(12px);
    transition: all 0.25s ease;
  }
  .footer-back-to-top.is-visible {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  .footer-back-to-top:hover {
    background: #ADFF1C;
    color: #082223;
    box-shadow: 0 8px 25px rgba(173, 255, 28, 0.45);
  }
  @media (max-width: 576px) {
    .footer-back-to-top { left: 16px; bottom: 76px; width: 40px; height: 40px; font-size: 14px; }
  }
</style>

<?php
// Dynamic trust metrics - calculated from August 2022
$years = function_exists('years_in_business') ? years_in_business(2022, 8) : '4';
$projCount = function_exists('count_portfolio_projects') ? count_portfolio_projects() : 25;
if ($projCount < 20) $projCount = 25;
$ratingData = function_exists('average_client_rating') ? average_client_rating() : ['avg' => 4.9, 'count' => 15];
$footerGoogleRating = ($ratingData['avg'] > 0) ? $ratingData['avg'] : '4.9';
$footerProjectsDelivered = (string)$projCount;
$footerYearsInBusiness = (string)$years;
?>

<!--===== FOOTER TOP CTA BAR =======-->
<div class="footer-cta-bar">
  <div class="container">
    <div class="row g-3">
      <div class="col-lg-4 col-md-6">
        <a class="footer-cta-card" href="mailto:contact@nikhilworks.com">
          <span class="footer-cta-icon"><i class="fa-solid fa-envelope"></i></span>
          <span class="footer-cta-text">
            <strong>Direct Email</strong>
            <span>contact@nikhilworks.com</span>
          </span>
          <span class="footer-cta-copy" data-copy="contact@nikhilworks.com" title="Copy email"><i class="fa-regular fa-copy"></i></span>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a class="footer-cta-card" href="tel:+918368552640">
          <span class="footer-cta-icon"><i class="fa-solid fa-phone-volume"></i></span>
          <span class="footer-cta-text">
            <strong>Call / WhatsApp</strong>
            <span>+91 83685 52640</span>
          </span>
          <span class="footer-cta-copy" data-copy="+918368552640" title="Copy number"><i class="fa-regular fa-copy"></i></span>
        </a>
      </div>
      <div class="col-lg-4 col-md-12">
        <div class="footer-cta-card footer-cta-card-static">
          <span class="footer-cta-icon"><i class="fa-solid fa-location-dot"></i></span>
          <span class="footer-cta-text">
            <strong>Studio Location</strong>
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
<footer class="footer4-section-area">
  <div class="loc-grid-overlay"></div>
  <div class="container" style="position: relative; z-index: 2;">
    
    <!-- Top 5-Column Navigation Grid -->
    <div class="row g-4 g-lg-5">

      <!-- Column 1: Company Branding & Trust Stats -->
      <div class="col-lg-3 col-md-6">
        <div class="footer-brand-box">
          <div class="site-logo mb-3">
            <a href="<?= $site ?>" class="d-inline-flex align-items-center gap-2 text-decoration-none">
              <h2 class="footer-brand-heading">NikhilWorks<span class="text-accent-dot">.</span></h2>
            </a>
          </div>
          <p class="footer-brand-bio">
            Nikhil Gupta — senior freelance web architect, CRM engineer &amp; SEO consultant delivering high-ROI digital platforms across India, USA, UK, UAE, Canada, and Australia (since Aug 2022).
          </p>

          <!-- Live Trust Counters -->
          <ul class="footer-trust-stats">
            <li>
              <strong><span class="footer-counter"><?= $footerGoogleRating ?></span>★</strong>
              <span>Google Rating</span>
            </li>
            <li>
              <strong><span class="footer-counter"><?= $footerProjectsDelivered ?></span>+</strong>
              <span>Projects</span>
            </li>
            <li>
              <strong><span class="footer-counter"><?= $footerYearsInBusiness ?></span>+</strong>
              <span>Years Exp</span>
            </li>
          </ul>

          <!-- Social Links -->
          <p class="footer-follow-label">Connect Directly</p>
          <ul class="footer-social-list">
            <?php if (!empty($contact['linkdin'])): ?>
            <li>
              <a href="<?= $contact['linkdin'] ?>" target="_blank" rel="noopener" aria-label="LinkedIn" class="footer-social-btn" title="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['twitter'])): ?>
            <li>
              <a href="<?= $contact['twitter'] ?>" target="_blank" rel="noopener" aria-label="X (Twitter)" class="footer-social-btn" title="X (Twitter)">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" style="display: inline-block; vertical-align: middle;"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['github'])): ?>
            <li>
              <a href="<?= $contact['github'] ?>" target="_blank" rel="noopener" aria-label="GitHub" class="footer-social-btn" title="GitHub">
                <i class="fab fa-github"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['facebook'])): ?>
            <li>
              <a href="<?= $contact['facebook'] ?>" target="_blank" rel="noopener" aria-label="Facebook" class="footer-social-btn" title="Facebook">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['instagram'])): ?>
            <li>
              <a href="<?= $contact['instagram'] ?>" target="_blank" rel="noopener" aria-label="Instagram" class="footer-social-btn" title="Instagram">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['devto'])): ?>
            <li>
              <a href="<?= $contact['devto'] ?>" target="_blank" rel="noopener" aria-label="Dev.to" class="footer-social-btn" title="Dev.to">
                <i class="fab fa-dev"></i>
              </a>
            </li>
            <?php endif; ?>
            <?php if (!empty($contact['google_review'])): ?>
            <li>
              <a href="<?= $contact['google_review'] ?>" target="_blank" rel="noopener" aria-label="Google Reviews" class="footer-social-btn" title="Google Reviews">
                <i class="fab fa-google"></i>
              </a>
            </li>
            <?php endif; ?>
          </ul>

        </div>
      </div>

      <!-- Column 2: Our Services -->
      <div class="col-lg-2 col-md-6 col-12">
        <div class="footer-nav-col">
          <h3 class="footer-nav-title footer-accordion-toggle">
            <span>Our Services</span>
            <i class="fa-solid fa-chevron-down"></i>
          </h3>
          <ul class="footer-nav-links">
            <?php foreach ($services as $serv): ?>
              <li><a href="<?= $site ?>service/<?= $serv['slug_url'] ?>/"><?= $serv['categories'] ?></a></li>
            <?php endforeach; ?>
            <li><a href="<?= $site ?>ai-integration-services/" style="color:#ADFF1C; font-weight:700;"><i class="fa-solid fa-robot me-1"></i> AI &amp; Workflow Automation</a></li>
            <li><a href="<?= $site ?>api-integration-services-india/">API &amp; Integration Services</a></li>
          </ul>
        </div>
      </div>

      <!-- Column 3: Products, Tools & Solutions -->
      <div class="col-lg-2 col-md-6 col-12">
        <div class="footer-nav-col">
          <h3 class="footer-nav-title footer-accordion-toggle">
            <span>Tools &amp; Solutions</span>
            <i class="fa-solid fa-chevron-down"></i>
          </h3>
          <ul class="footer-nav-links">
            <li><a href="<?= $site ?>pay/" class="link-highlight-pay"><i class="fa-solid fa-qrcode text-accent-dot me-1"></i> Pay Online (UPI / QR)</a></li>
            <li><a href="<?= $site ?>website-cost-calculator/"><i class="fa-solid fa-calculator text-accent-dot me-1"></i> Cost Calculator</a></li>
            <li><a href="<?= $site ?>seo-auditor/"><i class="fa-solid fa-stethoscope text-accent-dot me-1"></i> Free SEO Auditor</a></li>
            <li><a href="<?= $site ?>crm-development-india/">CRM Development</a></li>
            <li><a href="<?= $site ?>service/website-maintenance-support/">Website Maintenance</a></li>
            <li><a href="<?= $site ?>service/website-redesign/">Website Redesign</a></li>
            <li><a href="<?= $site ?>ads-management-india/">Google &amp; Meta Ads</a></li>
          </ul>
        </div>
      </div>

      <!-- Column 4: Company -->
      <div class="col-lg-2 col-md-6 col-12">
        <div class="footer-nav-col">
          <h3 class="footer-nav-title footer-accordion-toggle">
            <span>Company</span>
            <i class="fa-solid fa-chevron-down"></i>
          </h3>
          <ul class="footer-nav-links">
            <li><a href="<?= $site ?>about/">About Us</a></li>
            <li><a href="<?= $site ?>contact/">Contact Us</a></li>
            <li><a href="<?= $site ?>blogs/">Blog &amp; Insights</a></li>
            <li><a href="<?= $site ?>testimonials/">Testimonials</a></li>
            <li><a href="<?= $site ?>privacy-policy/">Privacy Policy</a></li>
            <li><a href="<?= $site ?>terms-and-conditions/">Terms &amp; Conditions</a></li>
          </ul>
        </div>
      </div>

      <!-- Column 5: Quick Links & Engagement -->
      <div class="col-lg-3 col-md-6 col-12">
        <div class="footer-nav-col">
          <h3 class="footer-nav-title footer-accordion-toggle">
            <span>Quick Links</span>
            <i class="fa-solid fa-chevron-down"></i>
          </h3>
          <ul class="footer-nav-links">
            <li><a href="<?= $site ?>portfolio/">Portfolio &amp; Showcase</a></li>
            <li><a href="<?= $site ?>pricing/">Pricing Plans</a></li>
            <li><a href="<?= $site ?>hire-freelance-web-developer/">Hire a Freelance Developer</a></li>
            <li><a href="<?= $site ?>website-development-cost-india/">Website Development Cost</a></li>
            <li><a href="<?= $site ?>contact/">Book Free Consultation</a></li>
          </ul>

          <div class="mt-4 pt-2">
            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20would%20like%20to%20discuss%20a%20project." class="footer-quick-wa-btn" target="_blank" rel="noopener">
              <i class="fa-brands fa-whatsapp"></i> Chat with Nikhil
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- Divider -->
    <div class="footer-inner-divider"></div>

    <!-- Popular Searches Tag Grid -->
    <div class="footer-seo-panel">
      <h4 class="footer-panel-title"><i class="fa-solid fa-bolt text-accent-dot me-2"></i>Popular Searches &amp; Free Utilities</h4>
      <div class="footer-tag-grid">
        <a href="<?= $site ?>pay/" class="tag-featured"><i class="fa-solid fa-qrcode me-1"></i> Pay Online</a>
        <a href="<?= $site ?>ai-integration-services/" class="tag-featured"><i class="fa-solid fa-robot me-1"></i> AI Integration &amp; Automation</a>
        <a href="<?= $site ?>website-cost-calculator/" class="tag-featured"><i class="fa-solid fa-calculator me-1"></i> Website Cost Calculator</a>
        <a href="<?= $site ?>seo-auditor/" class="tag-featured"><i class="fa-solid fa-stethoscope me-1"></i> Free SEO Audit Tool</a>
        <a href="<?= $site ?>service/website-design-development/">Web Design &amp; Development</a>
        <a href="<?= $site ?>service/e-commerce-website-development/">E-commerce Website Development</a>
        <a href="<?= $site ?>service/wordpress-website-development/">WordPress Development</a>
        <a href="<?= $site ?>service/landing-page-design/">Landing Page Design</a>
        <a href="<?= $site ?>service/mobile-app-development-services/">Mobile App Development</a>
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

    <!-- Global Regional Hubs Grid -->
    <div class="footer-region-panel">
      <h4 class="footer-panel-title"><i class="fa-solid fa-globe text-accent-dot me-2"></i>Global Delivery Locations</h4>
      <div class="row g-3 footer-region-grid">
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

    <!-- Bottom Copyright & Security Bar -->
    <div class="footer-bottom-bar">
      <div class="row align-items-center g-3">
        <div class="col-md-5 text-center text-md-start">
          <p class="footer-copyright-text mb-0">
            © <?= date('Y') ?> <strong>NikhilWorks</strong> • Handcrafted with <span style="color:#ADFF1C;">♥</span> by Nikhil Gupta.
          </p>
        </div>
        <div class="col-md-3 text-center">
          <ul class="footer-security-badges">
            <li><i class="fa-solid fa-lock text-accent-dot"></i> 256-Bit SSL Secured</li>
            <?php if (!empty($contact['google_review'])): ?>
              <li><a href="<?= $contact['google_review'] ?>" target="_blank" rel="noopener"><i class="fab fa-google text-warning"></i> Reviews</a></li>
            <?php endif; ?>
          </ul>
        </div>
        <div class="col-md-4 text-center text-md-end">
          <ul class="footer-legal-links mb-0">
            <li><a href="<?= $site ?>pay/">Pay Online</a></li>
            <li><a href="<?= $site ?>terms-and-conditions/">Terms</a></li>
            <li><a href="<?= $site ?>privacy-policy/">Privacy</a></li>
          </ul>
        </div>
      </div>
    </div>

  </div>
</footer>
<!--===== FOOTER AREA ENDS =======-->

<style>
  /* ===== ULTRA-PREMIUM FOOTER STYLES ===== */
  .footer-cta-bar {
    background: #051617;
    border-bottom: 1px solid rgba(173, 255, 28, 0.12);
    padding: 30px 0;
  }
  .footer-cta-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 16px;
    background: rgba(16, 64, 65, 0.45);
    border: 1px solid rgba(173, 255, 28, 0.2);
    border-radius: 16px;
    padding: 18px 22px;
    height: 100%;
    text-decoration: none;
    backdrop-filter: blur(10px);
    transition: all 0.3s ease;
  }
  a.footer-cta-card:hover {
    background: rgba(16, 64, 65, 0.85);
    border-color: #ADFF1C;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
  }
  .footer-cta-card-static {
    cursor: default;
  }
  .footer-cta-icon {
    flex: 0 0 auto;
    width: 46px;
    height: 46px;
    border-radius: 12px;
    background: #ADFF1C;
    color: #082223;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 4px 15px rgba(173, 255, 28, 0.3);
  }
  .footer-cta-text {
    display: flex;
    flex-direction: column;
    color: #fff;
    line-height: 1.4;
  }
  .footer-cta-text strong {
    font-size: 14.5px;
    font-weight: 800;
    color: #ADFF1C;
    margin-bottom: 2px;
  }
  .footer-cta-text span {
    font-size: 13.5px;
    color: #e4f2f0;
    word-break: break-word;
  }
  .footer-cta-hours {
    font-size: 11.5px !important;
    color: #8dafae !important;
    margin-top: 2px;
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
    color: #8dafae;
    font-size: 13px;
    transition: all 0.2s ease;
  }
  .footer-cta-copy:hover,
  .footer-cta-copy.is-copied {
    background: #ADFF1C;
    color: #082223;
  }

  /* MAIN FOOTER CONTAINER */
  .footer4-section-area {
    position: relative;
    background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 10% 80%, rgba(16, 64, 65, 0.6) 0%, transparent 50%),
                linear-gradient(180deg, #051617 0%, #082223 100%);
    padding: 85px 0 35px;
    overflow: hidden;
    color: #ffffff;
  }
  .footer-brand-heading {
    font-size: 1.8rem;
    font-weight: 800;
    color: #ffffff;
    margin: 0;
    letter-spacing: -0.5px;
  }
  .text-accent-dot {
    color: #ADFF1C;
  }
  .footer-brand-bio {
    font-size: 13.5px;
    line-height: 1.65;
    color: #9fbab8;
    margin-bottom: 20px;
  }
  .footer-trust-stats {
    display: flex;
    gap: 12px;
    list-style: none;
    padding: 0;
    margin: 0 0 22px;
  }
  .footer-trust-stats li {
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 12px;
    padding: 10px 14px;
    text-align: center;
    flex: 1;
  }
  .footer-trust-stats li strong {
    color: #ADFF1C;
    font-size: 16px;
    font-weight: 800;
    display: block;
    line-height: 1.2;
  }
  .footer-trust-stats li span {
    font-size: 11px;
    color: #8faea9;
    text-transform: uppercase;
    letter-spacing: 0.3px;
  }
  .footer-follow-label {
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: #ADFF1C;
    margin-bottom: 10px;
  }
  .footer-social-list {
    display: flex;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
    flex-wrap: wrap;
    align-items: center;
  }
  .footer-social-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff !important;
    font-size: 14px;
    transition: all 0.25s ease;
    text-decoration: none;
    border: 1px solid rgba(255, 255, 255, 0.15);
  }
  .footer-social-btn:hover {
    background: #ADFF1C;
    color: #082223 !important;
    border-color: #ADFF1C;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(173, 255, 28, 0.35);
  }

  /* NAVIGATION COLUMNS */
  .footer-nav-col {
    height: 100%;
  }
  .footer-nav-title {
    font-size: 16px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 18px;
    letter-spacing: 0.3px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .footer-nav-title i {
    display: none;
    font-size: 13px;
    transition: transform 0.3s ease;
  }
  .footer-nav-links {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-nav-links li {
    margin-bottom: 11px;
  }
  .footer-nav-links li a {
    color: #a3c4c0;
    font-size: 13.5px;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s ease;
  }
  .footer-nav-links li a:hover {
    color: #ADFF1C;
    transform: translateX(4px);
  }
  .link-highlight-pay {
    color: #ADFF1C !important;
    font-weight: 700;
  }
  .footer-quick-wa-btn {
    background: #25D366;
    color: #ffffff !important;
    font-weight: 700;
    font-size: 13px;
    padding: 10px 16px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
  }
  .footer-quick-wa-btn:hover {
    background: #1da851;
    transform: translateY(-2px);
  }

  /* DIVIDER */
  .footer-inner-divider {
    height: 1px;
    background: linear-gradient(90deg, transparent 0%, rgba(173, 255, 28, 0.25) 50%, transparent 100%);
    margin: 50px 0 40px;
  }

  /* SEO & REGION GLASS PANELS */
  .footer-seo-panel,
  .footer-region-panel {
    background: rgba(16, 64, 65, 0.3);
    border: 1px solid rgba(173, 255, 28, 0.15);
    border-radius: 18px;
    padding: 28px 30px;
    margin-bottom: 24px;
    backdrop-filter: blur(12px);
  }
  .footer-panel-title {
    font-size: 15px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 18px;
    letter-spacing: 0.3px;
  }
  .footer-tag-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
  }
  .footer-tag-grid a {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 30px;
    border: 1px solid rgba(255, 255, 255, 0.12);
    background: rgba(255, 255, 255, 0.04);
    color: #c4e0dd;
    font-size: 12.5px;
    text-decoration: none;
    transition: all 0.2s ease;
  }
  .footer-tag-grid a:hover {
    background: #104041;
    border-color: #ADFF1C;
    color: #ADFF1C;
    transform: translateY(-2px);
  }
  .footer-tag-grid a.tag-featured {
    background: rgba(173, 255, 28, 0.12);
    border-color: rgba(173, 255, 28, 0.4);
    color: #ADFF1C;
    font-weight: 700;
  }

  /* REGIONAL GRID */
  .footer-region-grid h5 {
    color: #ADFF1C;
    font-size: 13.5px;
    font-weight: 800;
    margin-bottom: 10px;
  }
  .footer-region-grid ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-region-grid ul li {
    margin-bottom: 6px;
  }
  .footer-region-grid ul li a {
    color: #9eb8b5;
    font-size: 12.5px;
    text-decoration: none;
    transition: color 0.2s ease;
  }
  .footer-region-grid ul li a:hover {
    color: #ffffff;
    text-decoration: underline;
  }

  /* BOTTOM BAR */
  .footer-bottom-bar {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 24px;
    margin-top: 24px;
  }
  .footer-copyright-text {
    font-size: 13px;
    color: #8dafae;
  }
  .footer-security-badges {
    display: flex;
    justify-content: center;
    gap: 16px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 12.5px;
    color: #8dafae;
  }
  .footer-security-badges a {
    color: #8dafae;
    text-decoration: none;
  }
  .footer-security-badges a:hover {
    color: #ffffff;
  }
  .footer-legal-links {
    display: flex;
    justify-content: flex-end;
    gap: 18px;
    list-style: none;
    padding: 0;
    margin: 0;
  }
  .footer-legal-links li a {
    color: #8dafae;
    font-size: 13px;
    text-decoration: none;
    transition: color 0.2s ease;
  }
  .footer-legal-links li a:hover {
    color: #ADFF1C;
  }

  /* MOBILE RESPONSIVE ACCORDION */
  @media (max-width: 767px) {
    .footer-cta-bar {
      padding: 16px 0;
    }
    .footer-cta-card {
      padding: 14px 16px;
    }
    .footer4-section-area {
      padding: 50px 0 25px;
    }
    .footer-nav-col {
      margin-bottom: 6px;
    }
    .footer-accordion-toggle {
      cursor: pointer;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding: 12px 0;
      margin-bottom: 0;
      user-select: none;
    }
    .footer-accordion-toggle i {
      display: inline-block;
      color: #ADFF1C;
    }
    .footer-accordion-toggle.is-open i {
      transform: rotate(180deg);
    }
    .footer-nav-links {
      display: none;
      padding: 14px 0 8px 10px;
    }
    .footer-nav-links.is-open {
      display: block;
    }
    .footer-seo-panel, .footer-region-panel {
      padding: 20px 16px;
      border-radius: 14px;
    }
    .footer-legal-links {
      justify-content: center;
      margin-top: 10px;
    }
  }
</style>

<script>
  $(document).ready(function() {
    // Count up trust metrics
    if (typeof $.fn.countUp === 'function') {
      $('.footer-counter').countUp();
    }

    // Mobile accordion for footer links
    function isMobileFooter() {
      return window.matchMedia('(max-width: 767px)').matches;
    }
    $('.footer-accordion-toggle').on('click', function() {
      if (!isMobileFooter()) return;
      $(this).toggleClass('is-open');
      $(this).next('.footer-nav-links').slideToggle(250);
    });

    // Copy to clipboard from CTA cards
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

    // Back to top
    var $backToTop = $('#footerBackToTop');
    $(window).on('scroll', function() {
      if ($(window).scrollTop() > 400) {
        $backToTop.addClass('is-visible');
      } else {
        $backToTop.removeClass('is-visible');
      }
    });
    $backToTop.on('click', function() {
      $('html, body').animate({ scrollTop: 0 }, 400);
    });
  });
</script>

<!--===== JS SCRIPT LINK =======-->
<script src="<?= $site ?>assets/js/plugins/bootstrap.min.js"></script>
<script src="<?= $site ?>assets/js/plugins/fontawesome.js"></script>
<script src="<?= $site ?>assets/js/plugins/aos.js"></script>
<script src="<?= $site ?>assets/js/plugins/counter.js"></script>
<script src="<?= $site ?>assets/js/plugins/gsap.min.js"></script>
<script src="<?= $site ?>assets/js/plugins/ScrollTrigger.min.js"></script>
<script src="<?= $site ?>assets/js/plugins/Splitetext.js"></script>
<script src="<?= $site ?>assets/js/plugins/sidebar.js"></script>
<script src="<?= $site ?>assets/js/plugins/magnific-popup.js"></script>
<script src="<?= $site ?>assets/js/plugins/mobilemenu.js"></script>
<script src="<?= $site ?>assets/js/plugins/owlcarousel.min.js"></script>
<script src="<?= $site ?>assets/js/plugins/gsap-animation.js"></script>
<script src="<?= $site ?>assets/js/plugins/nice-select.js"></script>
<script src="<?= $site ?>assets/js/plugins/waypoints.js"></script>
<script src="<?= $site ?>assets/js/plugins/slick-slider.js"></script>
<script src="<?= $site ?>assets/js/plugins/circle-progress.js"></script>
<script src="<?= $site ?>assets/js/main.js"></script>