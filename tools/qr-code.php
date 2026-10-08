<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free QR Code Generator — URL, WiFi, vCard, Text | NikhilWorks";
$metaDesc = "Create custom high-resolution QR codes for free. Supports URLs, WiFi passwords, contact vCards, phone numbers, and text. Download in PNG & SVG with custom colors.";
$canonical = $site . "tools/qr-code/";
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

  <!-- Schema: SoftwareApplication -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "Custom QR Code Generator",
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
      { "@type": "ListItem", "position": 3, "name": "QR Code Generator" }
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
        "name": "Do the generated QR codes expire?",
        "acceptedAnswer": { "@type": "Answer", "text": "No! These are standard static QR codes that contain your data permanently. They never expire and have unlimited scans." }
      },
      {
        "@type": "Question",
        "name": "Can I print these QR codes on business cards and posters?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. You can download crisp 300dpi PNG images suitable for high-quality printing on flyers, restaurant menus, stickers, and business cards." }
      }
    ]
  }
  </script>

  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo1.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <!-- QRCode.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
    }
    .tool-hero {
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #1e1b4b 100%);
      padding: 55px 0 45px;
      color: #fff;
    }
    .tool-card-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    }
    .qr-type-btn {
      border: 1px solid #cbd5e1;
      background: #f8fafc;
      color: #334155;
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: 600;
      font-size: 13.5px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .qr-type-btn.active, .qr-type-btn:hover {
      background: var(--brand-teal);
      color: #fff;
      border-color: var(--brand-teal);
    }
    .qr-render-frame {
      background: #f8fafc;
      border: 2px dashed #cbd5e1;
      border-radius: 12px;
      padding: 25px;
      text-align: center;
      min-height: 280px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
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
      <nav class="small mb-3" aria-label="breadcrumb">
        <a href="<?= $site ?>" class="text-white-50 text-decoration-none">Home</a> &rsaquo;
        <a href="<?= $site ?>free-tools/" class="text-white-50 text-decoration-none">Free Tools</a> &rsaquo;
        <span class="text-white fw-bold">QR Code Generator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Custom QR Code Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Generate customized, high-resolution QR codes for websites, WiFi networks, vCard contacts, and text.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Input Controls Column -->
      <div class="col-lg-7">
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-sliders text-primary me-2"></i> Select QR Code Type</h5>
          
          <div class="d-flex flex-wrap gap-2 mb-4">
            <button type="button" class="qr-type-btn active" data-type="url"><i class="fa-solid fa-link me-1"></i> Website URL</button>
            <button type="button" class="qr-type-btn" data-type="text"><i class="fa-solid fa-align-left me-1"></i> Plain Text</button>
            <button type="button" class="qr-type-btn" data-type="wifi"><i class="fa-solid fa-wifi me-1"></i> WiFi Login</button>
            <button type="button" class="qr-type-btn" data-type="vcard"><i class="fa-solid fa-address-card me-1"></i> Contact (vCard)</button>
            <button type="button" class="qr-type-btn" data-type="upi"><i class="fa-solid fa-indian-rupee-sign me-1"></i> UPI Payment</button>
          </div>

          <!-- Dynamic Form Inputs -->
          <div id="typeInputs">
            <!-- URL Input (Default) -->
            <div class="form-group-section" id="sec-url">
              <label class="form-label fw-bold">Website URL <span class="text-danger">*</span></label>
              <input type="url" id="qrUrl" class="form-control" placeholder="https://example.com" value="https://nikhilworks.com">
            </div>

            <!-- Text Input -->
            <div class="form-group-section d-none" id="sec-text">
              <label class="form-label fw-bold">Enter Text or Message</label>
              <textarea id="qrText" class="form-control" rows="3" placeholder="Type any text, promo code, or message..."></textarea>
            </div>

            <!-- WiFi Input -->
            <div class="form-group-section d-none" id="sec-wifi">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Network Name (SSID)</label>
                  <input type="text" id="wifiSsid" class="form-control" placeholder="Home_WiFi">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Password</label>
                  <input type="text" id="wifiPass" class="form-control" placeholder="WiFi Password">
                </div>
                <div class="col-12 mt-2">
                  <label class="form-label fw-bold">Encryption Type</label>
                  <select id="wifiType" class="form-select">
                    <option value="WPA">WPA / WPA2 / WPA3 (Standard)</option>
                    <option value="WEP">WEP</option>
                    <option value="nopass">None (Open Network)</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- vCard Input -->
            <div class="form-group-section d-none" id="sec-vcard">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Full Name</label>
                  <input type="text" id="vName" class="form-control" placeholder="Nikhil Gupta">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Phone Number</label>
                  <input type="tel" id="vPhone" class="form-control" placeholder="+91 8368552640">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Email</label>
                  <input type="email" id="vEmail" class="form-control" placeholder="contact@nikhilworks.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Company / Title</label>
                  <input type="text" id="vOrg" class="form-control" placeholder="Founder, NikhilWorks">
                </div>
              </div>
            </div>

            <!-- UPI Payment Input -->
            <div class="form-group-section d-none" id="sec-upi">
              <div class="row g-2">
                <div class="col-md-6">
                  <label class="form-label fw-bold">UPI ID (VPA) <span class="text-danger">*</span></label>
                  <input type="text" id="upiVpa" class="form-control" placeholder="username@upi">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Payee Name</label>
                  <input type="text" id="upiName" class="form-control" placeholder="Nikhil Gupta">
                </div>
                <div class="col-md-12">
                  <label class="form-label fw-bold">Amount in INR (Optional)</label>
                  <input type="number" id="upiAmount" class="form-control" placeholder="Leave empty for customer-entered amount">
                </div>
              </div>
            </div>
          </div>

          <!-- Color Customization -->
          <div class="row g-3 mt-3 pt-3 border-top">
            <div class="col-md-6">
              <label class="form-label fw-bold">QR Code Color</label>
              <div class="d-flex align-items-center gap-2">
                <input type="color" id="qrDarkColor" class="form-control form-control-color" value="#104041">
                <span class="small text-muted" id="hexDarkText">#104041</span>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Background Color</label>
              <div class="d-flex align-items-center gap-2">
                <input type="color" id="qrLightColor" class="form-control form-control-color" value="#ffffff">
                <span class="small text-muted" id="hexLightText">#ffffff</span>
              </div>
            </div>
          </div>

          <button type="button" class="btn btn-primary w-100 py-3 mt-4 fw-bold" onclick="renderQr()">
            <i class="fa-solid fa-arrows-rotate me-2"></i> Update &amp; Generate QR Code
          </button>
        </div>
      </div>

      <!-- QR Preview & Download Column -->
      <div class="col-lg-5">
        <div class="tool-card-box text-center h-100 d-flex flex-column justify-content-between">
          <div>
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-qrcode text-success me-2"></i> Live QR Preview</h5>
            <div class="qr-render-frame" id="qrContainer">
              <div id="qrcodeBox"></div>
            </div>
            <p class="small text-muted mt-2">Resolution: 300x300px (Vector Scalable)</p>
          </div>

          <div class="d-flex flex-column gap-2 mt-4">
            <button type="button" class="btn btn-dark fw-bold py-2" onclick="downloadQr('png')">
              <i class="fa-solid fa-download me-1"></i> Download PNG Image
            </button>
            <button type="button" class="btn btn-outline-secondary fw-bold py-2" onclick="printQr()">
              <i class="fa-solid fa-print me-1"></i> Print QR Standee
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- 3. HOW TO USE & CONTENT -->
    <div class="content-section mt-5">
      <h2>How to Create a Custom QR Code for Free</h2>
      <ol>
        <li><strong>Choose QR Type:</strong> Select from Website URL, Plain Text, WiFi Network Auto-Connect, Business vCard, or Indian UPI Payment.</li>
        <li><strong>Enter Data:</strong> Input your target link or credentials.</li>
        <li><strong>Customize Colors:</strong> Match your brand aesthetic by choosing custom foreground and background colors.</li>
        <li><strong>Download &amp; Print:</strong> Export high-resolution PNG for instant printing on menus, packaging, and digital posts.</li>
      </ol>

      <h2>Where to Use Static QR Codes</h2>
      <ul>
        <li><strong>Restaurant Menus &amp; Table Standees:</strong> Contactless menu browsing and review collection.</li>
        <li><strong>Product Packaging &amp; Labels:</strong> Link directly to user manuals, warranty registrations, or Instagram pages.</li>
        <li><strong>WiFi Sharing:</strong> Allow guests and cafe customers to connect instantly without typing complex passwords.</li>
        <li><strong>UPI &amp; Payments:</strong> Accept direct UPI payments without third-party commission charges.</li>
      </ul>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Do these QR codes ever expire or have scan limits?</summary>
        <p>No! Our QR codes are static and permanent. The encoded information is stored directly inside the visual matrix pattern, so they will work forever with unlimited scans.</p>
      </details>
      <details class="faq-card">
        <summary>Can I customize the color of the QR code?</summary>
        <p>Yes, you can choose any color for both the dark matrix points and the background. Ensure there is sufficient contrast (e.g. dark colors on light backgrounds) for reliable scanning.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/whatsapp-link/" class="text-decoration-none text-dark"><i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp Link Generator</a></h6>
            <small class="text-muted">Create click-to-chat links for social bio and ads.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/invoice/" class="text-decoration-none text-dark"><i class="fa-solid fa-file-invoice-dollar text-primary me-1"></i> Free Invoice Generator</a></h6>
            <small class="text-muted">Generate PDF invoices with GST calculations.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/schema-generator/" class="text-decoration-none text-dark"><i class="fa-solid fa-code text-warning me-1"></i> Schema JSON-LD Generator</a></h6>
            <small class="text-muted">Boost Google search rankings with structured data.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 4. CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Custom Web Development or QR Portal Systems?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        From dynamic trackable QR management platforms to full-stack e-commerce stores, NikhilWorks builds bespoke web architectures.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    let activeType = 'url';
    let qrcodeInstance = null;

    $('.qr-type-btn').on('click', function() {
      $('.qr-type-btn').removeClass('active');
      $(this).addClass('active');
      activeType = $(this).data('type');

      $('.form-group-section').addClass('d-none');
      $('#sec-' + activeType).removeClass('d-none');
      renderQr();
    });

    $('#qrDarkColor').on('input', function() {
      $('#hexDarkText').text($(this).val());
      renderQr();
    });

    $('#qrLightColor').on('input', function() {
      $('#hexLightText').text($(this).val());
      renderQr();
    });

    function getQrPayload() {
      switch (activeType) {
        case 'url':
          return $('#qrUrl').val().trim() || 'https://nikhilworks.com';
        case 'text':
          return $('#qrText').val().trim() || 'Welcome to NikhilWorks';
        case 'wifi':
          const ssid = $('#wifiSsid').val().trim();
          const pass = $('#wifiPass').val().trim();
          const type = $('#wifiType').val();
          return `WIFI:T:${type};S:${ssid};P:${pass};;`;
        case 'vcard':
          const name = $('#vName').val().trim() || 'Nikhil Gupta';
          const phone = $('#vPhone').val().trim() || '+918368552640';
          const email = $('#vEmail').val().trim() || 'contact@nikhilworks.com';
          const org = $('#vOrg').val().trim() || 'NikhilWorks';
          return `BEGIN:VCARD\nVERSION:3.0\nN:${name}\nFN:${name}\nORG:${org}\nTEL:${phone}\nEMAIL:${email}\nEND:VCARD`;
        case 'upi':
          const vpa = $('#upiVpa').val().trim() || 'nikhil@upi';
          const payee = $('#upiName').val().trim() || 'Nikhil Gupta';
          const amt = $('#upiAmount').val().trim();
          let upi = `upi://pay?pa=${encodeURIComponent(vpa)}&pn=${encodeURIComponent(payee)}`;
          if (amt && parseFloat(amt) > 0) {
            upi += `&am=${parseFloat(amt).toFixed(2)}&cu=INR`;
          }
          return upi;
      }
      return 'https://nikhilworks.com';
    }

    function renderQr() {
      const payload = getQrPayload();
      const dark = $('#qrDarkColor').val();
      const light = $('#qrLightColor').val();

      $('#qrcodeBox').html('');
      qrcodeInstance = new QRCode(document.getElementById("qrcodeBox"), {
        text: payload,
        width: 200,
        height: 200,
        colorDark: dark,
        colorLight: light,
        correctLevel: QRCode.CorrectLevel.H
      });
    }

    function downloadQr(format) {
      const img = document.querySelector('#qrcodeBox img');
      if (img && img.src) {
        const a = document.createElement('a');
        a.href = img.src;
        a.download = `qrcode-nikhilworks.${format}`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      } else {
        const canvas = document.querySelector('#qrcodeBox canvas');
        if (canvas) {
          const a = document.createElement('a');
          a.href = canvas.toDataURL("image/png");
          a.download = `qrcode-nikhilworks.${format}`;
          document.body.appendChild(a);
          a.click();
          document.body.removeChild(a);
        }
      }
    }

    function printQr() {
      const canvas = document.querySelector('#qrcodeBox canvas');
      const img = document.querySelector('#qrcodeBox img');
      const src = img ? img.src : (canvas ? canvas.toDataURL() : '');

      if (!src) return;

      const printWin = window.open('', '_blank');
      printWin.document.write(`
        <html>
          <head><title>Print QR Code - NikhilWorks</title></head>
          <body style="text-align:center; padding: 40px; font-family: Arial, sans-serif;">
            <h2>Scan to Connect</h2>
            <img src="${src}" style="width: 280px; height: 280px; margin: 20px auto; display: block;" />
            <p style="color: #64748b; font-size: 14px;">Powered by NikhilWorks.com Free Tools</p>
            <script>window.onload = function() { window.print(); window.close(); };<\/script>
          </body>
        </html>
      `);
      printWin.document.close();
    }

    // Initial render
    $(document).ready(function() {
      renderQr();
    });
  </script>
</body>
</html>
