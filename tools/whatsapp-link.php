<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free WhatsApp Link Generator — wa.me Click-to-Chat Creator | NikhilWorks";
$metaDesc = "Generate custom WhatsApp click-to-chat links instantly with pre-filled messages and QR codes. No number saving needed. 100% free for Instagram bio and ads.";
$canonical = $site . "tools/whatsapp-link/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($metaDesc) ?>">

  <!-- Schema: SoftwareApplication -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "WhatsApp Link Generator",
    "applicationCategory": "WebApplication",
    "operatingSystem": "Web Browser",
    "offers": { "@type": "Offer", "price": "0", "priceCurrency": "INR" },
    "provider": {
      "@type": "Person",
      "name": "Nikhil Gupta",
      "url": "https://nikhilworks.com"
    }
  }
  </script>

  <!-- Schema: BreadcrumbList -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?= $site ?>" },
      { "@type": "ListItem", "position": 2, "name": "Free Tools", "item": "<?= $site ?>free-tools/" },
      { "@type": "ListItem", "position": 3, "name": "WhatsApp Link Generator" }
    ]
  }
  </script>

  <!-- Schema: FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What is a WhatsApp click-to-chat link?",
        "acceptedAnswer": { "@type": "Answer", "text": "A wa.me link allows users to start a WhatsApp conversation with you directly without needing to save your phone number in their contact book." }
      },
      {
        "@type": "Question",
        "name": "How do I add a pre-filled custom message?",
        "acceptedAnswer": { "@type": "Answer", "text": "Simply type your message in the text box above. Our tool URL-encodes the message and appends it to your wa.me link automatically." }
      },
      {
        "@type": "Question",
        "name": "Can I use this link in my Instagram bio or Facebook Ads?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! wa.me links work perfectly inside Instagram Bio, YouTube descriptions, TikTok links, Facebook Ads, and email signatures." }
      }
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
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
      --brand-green: #25D366;
    }
    .tool-hero {
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 65px;
      color: #fff;
      position: relative;
      overflow: hidden;
    }
    @media (max-width: 991px) {
      .tool-hero {
        padding: 110px 0 50px;
      }
    }
    .site-breadcrumb {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 30px;
      padding: 6px 18px;
      margin-bottom: 20px;
      font-size: 13.5px;
      backdrop-filter: blur(8px);
    }
    .site-breadcrumb a {
      color: #cbe3e1;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .site-breadcrumb a:hover {
      color: var(--brand-lime);
    }
    .site-breadcrumb .bc-sep {
      color: rgba(255, 255, 255, 0.4);
      font-size: 10px;
    }
    .site-breadcrumb .bc-current {
      color: var(--brand-lime);
      font-weight: 700;
    }
    .tool-card-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    }
    .btn-wa-generate {
      background: var(--brand-green);
      color: #ffffff;
      font-weight: 700;
      border: none;
      border-radius: 10px;
      padding: 12px 24px;
      transition: all 0.2s;
    }
    .btn-wa-generate:hover {
      background: #1eb956;
      color: #fff;
      transform: translateY(-1px);
    }
    .output-box {
      background: #f8fafc;
      border: 2px dashed #cbd5e1;
      border-radius: 12px;
      padding: 20px;
      margin-top: 25px;
      display: none;
    }
    .qr-preview-box {
      background: #fff;
      padding: 15px;
      border-radius: 10px;
      border: 1px solid #e2e8f0;
      display: inline-block;
    }
    .content-section h2 {
      font-size: 22px;
      font-weight: 800;
      color: #0f172a;
      margin-top: 35px;
      margin-bottom: 15px;
    }
    .content-section p, .content-section li {
      color: #475569;
      font-size: 15px;
      line-height: 1.7;
    }
    .faq-card {
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      margin-bottom: 12px;
      background: #fff;
    }
    .faq-card summary {
      padding: 15px 20px;
      font-weight: 700;
      cursor: pointer;
      color: #0f172a;
    }
    .faq-card p {
      padding: 0 20px 15px;
      color: #64748b;
      margin: 0;
    }
  </style>
</head>
<body class="homepage4-body">

  <?php include_once dirname(__DIR__) . "/includes/header.php" ?>

  <!-- 1. HERO / BREADCRUMB -->
  <div class="tool-hero text-center">
    <div class="container">
      <nav aria-label="breadcrumb">
        <div class="site-breadcrumb">
          <a href="<?= $site ?>"><i class="fa-solid fa-house fa-xs"></i> Home</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <a href="<?= $site ?>free-tools/">Free Tools</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <span class="bc-current">WhatsApp Link Generator</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free WhatsApp Click-to-Chat Link Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Generate instant <code>wa.me</code> click-to-chat links with custom pre-filled greetings &amp; QR codes for your business.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- 2. TOOL WIDGET BOX -->
        <div class="tool-card-box">
          <form id="waForm" onsubmit="return false;">
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label fw-bold text-dark">Country Code</label>
                <select id="waCountry" class="form-select">
                  <option value="91" selected>🇮🇳 India (+91)</option>
                  <option value="1">🇺🇸 USA / 🇨🇦 Canada (+1)</option>
                  <option value="971">🇦🇪 UAE (+971)</option>
                  <option value="44">🇬🇧 UK (+44)</option>
                  <option value="61">🇦🇺 Australia (+61)</option>
                  <option value="65">🇸🇬 Singapore (+65)</option>
                  <option value="49">🇩🇪 Germany (+49)</option>
                  <option value="966">🇸🇦 Saudi Arabia (+966)</option>
                  <option value="custom">Other (Manual Code)</option>
                </select>
              </div>
              <div class="col-md-8">
                <label class="form-label fw-bold text-dark">WhatsApp Number <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text bg-light fw-bold" id="codePrefix">+91</span>
                  <input type="tel" id="waNumber" class="form-control" placeholder="e.g. 9876543210" required>
                </div>
                <small class="text-muted">Enter number without leading 0 or symbols.</small>
              </div>

              <div class="col-12 mt-3">
                <label class="form-label fw-bold text-dark">Pre-filled Custom Message (Optional)</label>
                <textarea id="waMessage" class="form-control" rows="3" placeholder="e.g. Hi Nikhil, I saw your portfolio and would like to discuss a web design project!"></textarea>
                <div class="d-flex justify-content-between small text-muted mt-1">
                  <span>Quick Templates:</span>
                  <div class="d-flex gap-2">
                    <a href="javascript:void(0)" onclick="setTemplate('Hi! I would like to inquire about your services.')" class="text-decoration-none">Inquiry</a> &bull;
                    <a href="javascript:void(0)" onclick="setTemplate('Hello, I need a quotation for website development.')" class="text-decoration-none">Quote</a> &bull;
                    <a href="javascript:void(0)" onclick="setTemplate('Hey, I want to book a free consultation call.')" class="text-decoration-none">Call</a>
                  </div>
                </div>
              </div>

              <div class="col-12 text-center mt-4">
                <button type="button" onclick="generateWaLink()" class="btn-wa-generate w-100 py-3">
                  <i class="fa-brands fa-whatsapp me-2 fa-lg"></i> Generate WhatsApp Link &amp; QR Code
                </button>
              </div>
            </div>
          </form>

          <!-- Generated Output Box -->
          <div id="outputArea" class="output-box">
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-check-circle text-success me-2"></i> Your WhatsApp Link is Ready!</h5>
            
            <div class="input-group mb-3">
              <input type="text" id="generatedLink" class="form-control bg-white fw-bold text-dark" readonly>
              <button class="btn btn-dark" type="button" onclick="copyWaLink()" id="btnCopy">
                <i class="fa-regular fa-copy me-1"></i> Copy Link
              </button>
            </div>

            <div class="d-flex flex-wrap gap-2 mb-4">
              <a href="#" target="_blank" id="testChatBtn" class="btn btn-success btn-sm">
                <i class="fa-brands fa-whatsapp me-1"></i> Test Chat Now &rarr;
              </a>
              <button class="btn btn-outline-secondary btn-sm" onclick="downloadQrCode()">
                <i class="fa-solid fa-download me-1"></i> Download QR Image
              </button>
            </div>

            <div class="text-center">
              <div class="small fw-bold text-muted mb-2">Scan with phone camera or WhatsApp scanner:</div>
              <div class="qr-preview-box">
                <div id="waQrCode"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. HOW TO USE & DETAILS -->
        <div class="content-section mt-5">
          <h2>How to Use the WhatsApp Link Generator</h2>
          <ol>
            <li><strong>Select Country Code &amp; Number:</strong> Pick your country dial code and type your active WhatsApp mobile number without hyphens or spaces.</li>
            <li><strong>Add a Pre-filled Message:</strong> Craft a friendly opening message so your customers can start the chat with one tap.</li>
            <li><strong>Click Generate:</strong> Instantly get your short <code>wa.me</code> link, direct chat button, and high-res QR code.</li>
          </ol>

          <h2>Where to Use WhatsApp Click-to-Chat Links</h2>
          <ul>
            <li><strong>Instagram &amp; TikTok Bio:</strong> Drive followers straight to your DM to close sales fast.</li>
            <li><strong>Facebook &amp; Google Ads:</strong> Use wa.me as your landing page URL to capture leads instantly without form drop-offs.</li>
            <li><strong>Business Cards &amp; Flyers:</strong> Print the generated QR code on brochures, packaging, and store banners.</li>
            <li><strong>Email Signatures:</strong> Add a <em>"Chat with me on WhatsApp"</em> link in your business emails.</li>
          </ul>

          <h2>Frequently Asked Questions</h2>
          <details class="faq-card" open>
            <summary>What is a WhatsApp click-to-chat link?</summary>
            <p>A wa.me link is WhatsApp's official URL format (<code>https://wa.me/&lt;number&gt;?text=&lt;message&gt;</code>) that opens WhatsApp directly on mobile or desktop without requiring the customer to add your number to their contacts.</p>
          </details>

          <details class="faq-card">
            <summary>Does this tool cost anything or expire?</summary>
            <p>No, this tool is 100% free with no limits. The generated link does not expire and will work permanently as long as your WhatsApp number remains active.</p>
          </details>

          <details class="faq-card">
            <summary>Can I track how many people clicked my WhatsApp link?</summary>
            <p>Yes! You can shorten this link with bit.ly or pass UTM parameters if you are running Google/Facebook ad campaigns.</p>
          </details>

          <h2>Related Free Tools</h2>
          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/qr-code/" class="text-decoration-none text-dark"><i class="fa-solid fa-qrcode text-primary me-1"></i> QR Code Generator</a></h6>
                <small class="text-muted">Create custom QR codes with colors and logos.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/invoice/" class="text-decoration-none text-dark"><i class="fa-solid fa-file-invoice text-success me-1"></i> Free Invoice Generator</a></h6>
                <small class="text-muted">Generate PDF billing invoices with GST calculations.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/gst-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-calculator text-warning me-1"></i> GST Calculator India</a></h6>
                <small class="text-muted">Calculate Inclusive / Exclusive GST rates instantly.</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- 4. CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Automated WhatsApp Chatbots or API Integrations?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks integrates WhatsApp Cloud API, automated lead capture, and CRM chatbots directly into your website.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Discuss WhatsApp API Integration <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    let qrObj = null;

    $('#waCountry').on('change', function() {
      const val = $(this).val();
      if (val === 'custom') {
        $('#codePrefix').text('+');
      } else {
        $('#codePrefix').text('+' + val);
      }
    });

    function setTemplate(text) {
      $('#waMessage').val(text);
    }

    function generateWaLink() {
      let country = $('#waCountry').val();
      let rawNumber = $('#waNumber').val().replace(/[^0-9]/g, '');

      if (!rawNumber) {
        alert('Please enter a valid WhatsApp phone number.');
        $('#waNumber').focus();
        return;
      }

      let fullNumber = (country !== 'custom' && !rawNumber.startsWith(country)) ? country + rawNumber : rawNumber;
      let message = $('#waMessage').val().trim();
      let link = 'https://wa.me/' + fullNumber;

      if (message) {
        link += '?text=' + encodeURIComponent(message);
      }

      $('#generatedLink').val(link);
      $('#testChatBtn').attr('href', link);

      // Generate QR Code
      $('#waQrCode').html('');
      qrObj = new QRCode(document.getElementById("waQrCode"), {
        text: link,
        width: 160,
        height: 160,
        colorDark: "#104041",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });

      $('#outputArea').slideDown();
      $('html, body').animate({
        scrollTop: $("#outputArea").offset().top - 80
      }, 500);
    }

    function copyWaLink() {
      const copyText = document.getElementById("generatedLink");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      
      const btn = $('#btnCopy');
      btn.html('<i class="fa-solid fa-check me-1"></i> Copied!');
      setTimeout(() => {
        btn.html('<i class="fa-regular fa-copy me-1"></i> Copy Link');
      }, 2000);
    }

    function downloadQrCode() {
      const img = document.querySelector('#waQrCode img');
      if (img && img.src) {
        const a = document.createElement('a');
        a.href = img.src;
        a.download = 'whatsapp-qr-nikhilworks.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      } else {
        const canvas = document.querySelector('#waQrCode canvas');
        if (canvas) {
          const a = document.createElement('a');
          a.href = canvas.toDataURL("image/png");
          a.download = 'whatsapp-qr-nikhilworks.png';
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);
        }
      }
    }
  </script>
</body>
</html>
