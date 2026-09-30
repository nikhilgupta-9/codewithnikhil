<?php
include_once "config/connect.php";
include_once "util/function.php";

$contact = contact_us();
$yearsExperience = years_in_business(2022, 8);
$rating = average_client_rating();
$avgRating = ($rating['avg'] > 0) ? $rating['avg'] : '4.9';

$pageTitle = "Pay Online & Make Secure Payment - NikhilWorks";
$pageDesc = "Make fast and secure payments for web development, SEO, and CRM projects via UPI (PhonePe, Google Pay, Paytm), Bank Transfer, or International PayPal.";
$pageKeywords = "pay online nikhilworks, phonepe qr payment, upi payment nikhil gupta, bank transfer, pay web developer india, paypal payment";
$canonicalUrl = "https://nikhilworks.com/pay/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/payment/phonepe-qr.jpg">
  <meta name="twitter:card" content="summary_large_image">

  <!-- FAQPage Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Which payment methods are accepted?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "We accept all UPI apps (PhonePe, Google Pay, Paytm, BHIM, Cred), Direct Bank IMPS/NEFT/RTGS transfers, and international payments via PayPal, Wise, and Bank Wire."
        }
      },
      {
        "@type": "Question",
        "name": "How does milestone-based payment work?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "All fixed-price projects follow a clear milestone structure: 50% advance to initiate architecture & design, and the remaining 50% upon final sign-off before server deployment."
        }
      },
      {
        "@type": "Question",
        "name": "How do I receive a payment confirmation and invoice?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Immediately after payment, share your transaction screenshot or UTR number on WhatsApp (+91 83685 52640). You will receive an instant official PDF invoice and milestone confirmation receipt."
        }
      }
    ]
  }
  </script>

  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* HERO */
    .pay-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 85px;
      overflow: hidden;
      color: #fff;
    }
    .pay-hero-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
    }
    .pay-hero h1 {
      font-size: clamp(2.2rem, 4.2vw, 3.3rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 18px;
      letter-spacing: -0.5px;
    }
    .pay-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 720px;
      margin: 0 auto;
    }

    /* PAYMENT MAIN SECTION */
    .pay-main-section {
      padding: 70px 0 100px;
      background: #f7faf9;
    }

    /* QR CARD */
    .qr-card-box {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 24px;
      padding: 34px 28px;
      box-shadow: 0 10px 35px rgba(16, 64, 65, 0.06);
      text-align: center;
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
      transition: all 0.3s ease;
    }
    .qr-card-box:hover {
      border-color: #104041;
      box-shadow: 0 18px 45px rgba(16, 64, 65, 0.12);
    }
    .qr-badge-instant {
      background: #082223;
      color: #ADFF1C;
      font-size: 12px;
      font-weight: 800;
      padding: 6px 16px;
      border-radius: 30px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 20px;
      border: 1px solid rgba(173, 255, 28, 0.3);
    }
    .qr-img-frame {
      background: #000000;
      border-radius: 20px;
      padding: 16px;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
      max-width: 320px;
      margin-bottom: 24px;
      border: 2px solid #222;
      transition: transform 0.3s ease;
    }
    .qr-img-frame:hover {
      transform: scale(1.02);
    }
    .qr-img-frame img {
      width: 100%;
      height: auto;
      border-radius: 12px;
      display: block;
    }
    .qr-holder-name {
      font-size: 1.25rem;
      font-weight: 800;
      color: #0f2d2e;
      margin-bottom: 4px;
    }
    .qr-holder-entity {
      font-size: 13px;
      color: #557273;
      margin-bottom: 20px;
    }

    /* UPI CHIPS & COPY BOX */
    .upi-details-list {
      width: 100%;
      max-width: 360px;
      margin-bottom: 22px;
    }
    .upi-copy-row {
      background: #f0f7f6;
      border: 1px solid #d4e5e3;
      border-radius: 12px;
      padding: 10px 14px;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
    }
    .upi-copy-label {
      font-size: 11px;
      text-transform: uppercase;
      font-weight: 700;
      color: #557273;
      display: block;
    }
    .upi-copy-value {
      font-size: 14.5px;
      font-weight: 800;
      color: #104041;
      font-family: monospace;
      letter-spacing: 0.3px;
    }
    .btn-copy-mini {
      background: #104041;
      color: #ADFF1C;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
      font-size: 12px;
      font-weight: 700;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      transition: all 0.2s ease;
    }
    .btn-copy-mini:hover {
      background: #082223;
      color: #ffffff;
      transform: scale(1.05);
    }

    /* UPI APPS LOGO STRIP */
    .upi-apps-strip {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 12px;
      margin-top: 10px;
    }
    .upi-app-badge {
      background: #ffffff;
      border: 1px solid #d4e3e2;
      border-radius: 8px;
      padding: 6px 12px;
      font-size: 12.5px;
      font-weight: 700;
      color: #104041;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* RIGHT COLUMN: BANK TRANSFER & INTERNATIONAL */
    .pay-method-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 20px;
      padding: 28px 24px;
      margin-bottom: 24px;
      box-shadow: 0 6px 24px rgba(16, 64, 65, 0.04);
      transition: all 0.3s ease;
    }
    .pay-method-card:hover {
      border-color: #104041;
      transform: translateY(-3px);
      box-shadow: 0 12px 30px rgba(16, 64, 65, 0.08);
    }
    .method-header {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 18px;
      padding-bottom: 14px;
      border-bottom: 1px solid #edf4f3;
    }
    .method-icon {
      width: 44px;
      height: 44px;
      border-radius: 12px;
      background: rgba(16, 64, 65, 0.08);
      color: #104041;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      flex-shrink: 0;
    }
    .method-title {
      font-size: 1.2rem;
      font-weight: 800;
      color: #0f2d2e;
      margin: 0;
    }
    .method-sub {
      font-size: 12.5px;
      color: #637f7e;
      margin: 0;
    }

    /* VERIFICATION / CONFIRMATION BOX */
    .pay-confirm-card {
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 22px;
      padding: 32px 28px;
      color: #ffffff;
      margin-top: 30px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }
    .btn-pay-wa {
      background: #25D366;
      color: #ffffff !important;
      font-weight: 800;
      font-size: 15.5px;
      padding: 15px 24px;
      border-radius: 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 8px 25px rgba(37, 211, 102, 0.4);
      border: none;
      width: 100%;
    }
    .btn-pay-wa:hover {
      background: #1da851;
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(37, 211, 102, 0.5);
    }

    /* TRUST BADGES */
    .pay-trust-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 16px;
      margin-top: 50px;
    }
    .pay-trust-item {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 16px;
      padding: 20px;
      text-align: center;
      transition: all 0.25s ease;
    }
    .pay-trust-item:hover {
      border-color: #104041;
      transform: translateY(-3px);
    }
    .pay-trust-item i {
      font-size: 24px;
      color: #104041;
      margin-bottom: 10px;
      display: inline-block;
    }
    .pay-trust-item strong {
      display: block;
      font-size: 14px;
      color: #0f2d2e;
      margin-bottom: 4px;
    }
    .pay-trust-item span {
      font-size: 12px;
      color: #637f7e;
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="pay-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-9 mx-auto">
          <div class="pay-hero-pill">
            <i class="fa-solid fa-shield-check"></i> 100% Encrypted &amp; Verified Client Payments
          </div>
          <h1>Make a Secure Payment</h1>
          <p class="pay-hero-sub">
            Pay for your website development, SEO campaign, or CRM project securely via UPI QR scan, Direct Bank Transfer, or International PayPal with instant payment receipts.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== PAYMENT MAIN SECTION =======-->
  <section class="pay-main-section">
    <div class="container">
      <div class="row g-4">

        <!-- LEFT COLUMN: Official UPI QR Code Card -->
        <div class="col-lg-6" data-aos="fade-right">
          <div class="qr-card-box">
            <div class="qr-badge-instant">
              <i class="fa-solid fa-bolt text-warning"></i> Instant UPI Settlement (0% Fees)
            </div>

            <!-- PhonePe Official QR Frame -->
            <div class="qr-img-frame">
              <img src="<?= $site ?>assets/img/payment/phonepe-qr.jpg" alt="NikhilWorks Official PhonePe UPI QR Code">
            </div>

            <div class="qr-holder-name">Nikhil Gupta</div>
            <div class="qr-holder-entity">Official UPI Payment Account for NikhilWorks</div>

            <!-- Copyable UPI Details -->
            <div class="upi-details-list">
              <div class="upi-copy-row">
                <div class="text-start">
                  <span class="upi-copy-label">UPI ID (VPA)</span>
                  <span class="upi-copy-value" id="valUpiId">8368552640@ybl</span>
                </div>
                <button type="button" class="btn-copy-mini" onclick="copyText('8368552640@ybl', this)">
                  <i class="fa-regular fa-copy"></i> Copy
                </button>
              </div>

              <div class="upi-copy-row">
                <div class="text-start">
                  <span class="upi-copy-label">PhonePe / GPay Number</span>
                  <span class="upi-copy-value" id="valPhoneNum">+91 83685 52640</span>
                </div>
                <button type="button" class="btn-copy-mini" onclick="copyText('+918368552640', this)">
                  <i class="fa-regular fa-copy"></i> Copy
                </button>
              </div>
            </div>

            <!-- Mobile UPI Intent Button (works directly on phones) -->
            <div class="w-100 d-block d-md-none mb-3">
              <a href="upi://pay?pa=8368552640@ybl&pn=Nikhil%20Gupta&cu=INR" class="btn btn-dark w-100 py-3 fw-bold rounded-3" style="background:#104041; color:#ADFF1C;">
                <i class="fa-solid fa-mobile-screen-button me-2"></i> Pay via UPI App (Mobile)
              </a>
            </div>

            <!-- Supported Apps Strip -->
            <div class="upi-apps-strip">
              <span class="upi-app-badge"><i class="fa-solid fa-check-circle text-success"></i> PhonePe</span>
              <span class="upi-app-badge"><i class="fa-solid fa-check-circle text-success"></i> Google Pay</span>
              <span class="upi-app-badge"><i class="fa-solid fa-check-circle text-success"></i> Paytm</span>
              <span class="upi-app-badge"><i class="fa-solid fa-check-circle text-success"></i> BHIM UPI</span>
              <span class="upi-app-badge"><i class="fa-solid fa-check-circle text-success"></i> Cred</span>
            </div>

          </div>
        </div>

        <!-- RIGHT COLUMN: Bank Transfer, International & Verification -->
        <div class="col-lg-6" data-aos="fade-left">

          <!-- Direct Bank Wire Transfer Card -->
          <div class="pay-method-card">
            <div class="method-header">
              <div class="method-icon"><i class="fa-solid fa-building-columns"></i></div>
              <div>
                <h3 class="method-title">Direct Bank IMPS / NEFT / RTGS</h3>
                <p class="method-sub">For corporate NEFT / IMPS transfers and invoice payments.</p>
              </div>
            </div>

            <div class="upi-copy-row">
              <div class="text-start">
                <span class="upi-copy-label">Account Beneficiary Name</span>
                <span class="upi-copy-value" style="font-family: inherit; font-size: 14px;">Nikhil Gupta</span>
              </div>
              <button type="button" class="btn-copy-mini" onclick="copyText('Nikhil Gupta', this)">
                <i class="fa-regular fa-copy"></i> Copy
              </button>
            </div>

            <div class="upi-copy-row">
              <div class="text-start">
                <span class="upi-copy-label">Account / Mobile Number</span>
                <span class="upi-copy-value">8368552640</span>
              </div>
              <button type="button" class="btn-copy-mini" onclick="copyText('8368552640', this)">
                <i class="fa-regular fa-copy"></i> Copy
              </button>
            </div>

            <div class="upi-copy-row">
              <div class="text-start">
                <span class="upi-copy-label">Payment Verification Contact</span>
                <span class="upi-copy-value">+91 83685 52640</span>
              </div>
              <button type="button" class="btn-copy-mini" onclick="copyText('+918368552640', this)">
                <i class="fa-regular fa-copy"></i> Copy
              </button>
            </div>

            <p class="text-muted small mt-2 mb-0">
              <i class="fa-solid fa-info-circle text-primary"></i> For full current account details with IFSC code for large B2B wires, please request via WhatsApp or email.
            </p>
          </div>

          <!-- International Clients (USD / AED / GBP / EUR) -->
          <div class="pay-method-card">
            <div class="method-header">
              <div class="method-icon"><i class="fa-solid fa-globe"></i></div>
              <div>
                <h3 class="method-title">International Payments (USD / AED / GBP)</h3>
                <p class="method-sub">Global clients across USA, UK, UAE, Canada, and Australia.</p>
              </div>
            </div>

            <div class="upi-copy-row">
              <div class="text-start">
                <span class="upi-copy-label">PayPal Email</span>
                <span class="upi-copy-value" style="font-family: monospace; font-size: 13.5px;">contact@nikhilworks.com</span>
              </div>
              <button type="button" class="btn-copy-mini" onclick="copyText('contact@nikhilworks.com', this)">
                <i class="fa-regular fa-copy"></i> Copy
              </button>
            </div>

            <div class="d-flex flex-wrap gap-2 mt-3">
              <span class="badge bg-light text-dark border p-2"><i class="fa-brands fa-paypal text-primary"></i> PayPal</span>
              <span class="badge bg-light text-dark border p-2"><i class="fa-solid fa-money-bill-transfer text-success"></i> Wise (TransferWise)</span>
              <span class="badge bg-light text-dark border p-2"><i class="fa-brands fa-stripe text-info"></i> Stripe Invoice</span>
              <span class="badge bg-light text-dark border p-2"><i class="fa-solid fa-building-columns text-secondary"></i> Direct SWIFT Wire</span>
            </div>
          </div>

          <!-- Post-Payment Confirmation Box -->
          <div class="pay-confirm-card">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(173, 255, 28, 0.15); color: #ADFF1C; font-size: 11.5px; font-weight: 800;">
              <i class="fa-solid fa-receipt"></i> STEP 2: INSTANT CONFIRMATION
            </div>

            <h4 class="fw-bold mb-2">Share Screenshot for Instant Invoice</h4>
            <p class="text-light small mb-4" style="line-height: 1.6;">
              Once your transaction is complete, click below to share the screenshot or UTR reference on WhatsApp. I will verify and issue your project milestone receipt immediately.
            </p>

            <a href="https://wa.me/918368552640?text=Hi%20Nikhil%2C%20I%20have%20completed%20the%20payment.%20Here%20is%20my%20transaction%20screenshot%2FUTR%20number.%20Please%20confirm%20and%20share%20my%20invoice." class="btn-pay-wa" target="_blank" rel="noopener">
              <i class="fa-brands fa-whatsapp fs-5"></i>
              <span>Confirm Payment on WhatsApp</span>
            </a>
          </div>

        </div>

      </div>

      <!-- Trust Badges Strip -->
      <div class="pay-trust-grid">
        <div class="pay-trust-item">
          <i class="fa-solid fa-lock"></i>
          <strong>256-Bit SSL Encrypted</strong>
          <span>100% secure direct payment processing</span>
        </div>
        <div class="pay-trust-item">
          <i class="fa-solid fa-receipt"></i>
          <strong>Official Tax Invoice</strong>
          <span>Instant GST/Business receipt provided</span>
        </div>
        <div class="pay-trust-item">
          <i class="fa-solid fa-handshake"></i>
          <strong>Milestone Protection</strong>
          <span>50% start deposit &amp; 50% on live delivery</span>
        </div>
        <div class="pay-trust-item">
          <i class="fa-solid fa-headset"></i>
          <strong>Direct WhatsApp Support</strong>
          <span>Immediate verification by Nikhil Gupta</span>
        </div>
      </div>

      <!-- FAQ Accordion -->
      <div class="row mt-5 pt-4">
        <div class="col-lg-8 mx-auto">
          <h3 class="fw-bold text-center mb-4" style="color: #0f2d2e;">Payment FAQs</h3>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>How does milestone-based project payment work?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              All standard projects follow a transparent 50-50 milestone structure: 50% deposit to initiate architecture, design, and staging environments, and the final 50% balance upon completed testing and sign-off before production handover.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>Are there any extra convenience fees or surcharge on UPI payments?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              No. UPI and Direct Bank transfers have 0% surcharge. You pay only the exact quoted milestone amount.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>When does project work begin after making payment?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              Immediately upon sharing the payment confirmation, we set up your project board, configure staging servers, and begin UI wireframing within 24 hours.
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <?php include_once "includes/footer.php" ?>

  <!-- Copy Helper & FAQ Script -->
  <script>
    function copyText(text, btnElement) {
      navigator.clipboard.writeText(text).then(function() {
        const originalHtml = btnElement.innerHTML;
        btnElement.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
        btnElement.style.background = '#25D366';
        btnElement.style.color = '#fff';
        setTimeout(function() {
          btnElement.innerHTML = originalHtml;
          btnElement.style.background = '';
          btnElement.style.color = '';
        }, 2000);
      }).catch(function() {
        prompt("Copy payment detail:", text);
      });
    }

    // FAQ Accordion
    document.querySelectorAll('.loc-faq-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const content = this.nextElementSibling;
        const icon = this.querySelector('i');
        if (content.style.display === 'block') {
          content.style.display = 'none';
          icon.className = 'fa-solid fa-plus';
        } else {
          content.style.display = 'block';
          icon.className = 'fa-solid fa-minus';
        }
      });
    });
  </script>

</body>
</html>
