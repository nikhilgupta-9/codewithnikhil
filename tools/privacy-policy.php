<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Privacy Policy Generator — GDPR & DPDP Compliant | NikhilWorks";
$metaDesc = "Generate a customized, legally compliant Privacy Policy for websites, blogs, and SaaS apps. Complies with GDPR, CCPA, and India DPDP regulations. 100% free.";
$canonical = $site . "tools/privacy-policy/";
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
    "name": "Privacy Policy Generator",
    "applicationCategory": "BusinessApplication",
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
      { "@type": "ListItem", "position": 3, "name": "Privacy Policy Generator" }
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
        "name": "Is a Privacy Policy mandatory for websites?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! Privacy laws (GDPR, CCPA, and India DPDP) require any website collecting personal user data (cookies, contact forms, analytics) to maintain a transparent Privacy Policy." }
      },
      {
        "@type": "Question",
        "name": "Can I use this generated policy for Google AdSense and Facebook Ads?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes. This policy includes disclosures for third-party cookies, Google Analytics, and ad trackers required for AdSense approval." }
      }
    ]
  }
  </script>

  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo1.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
    }
    .tool-hero {
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #854d0e 100%);
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

  <!-- HERO -->
  <div class="tool-hero text-center">
    <div class="container">
      <nav class="small mb-3" aria-label="breadcrumb">
        <a href="<?= $site ?>" class="text-white-50 text-decoration-none">Home</a> &rsaquo;
        <a href="<?= $site ?>free-tools/" class="text-white-50 text-decoration-none">Free Tools</a> &rsaquo;
        <span class="text-white fw-bold">Privacy Policy Generator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Privacy Policy Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Generate customized, legally compliant Privacy Policies for websites, blogs, and SaaS platforms.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Inputs Column -->
      <div class="col-lg-5">
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-sliders text-primary me-2"></i> Company &amp; Website Details</h5>
          
          <div class="mb-3">
            <label class="form-label fw-bold">Company / Website Name <span class="text-danger">*</span></label>
            <input type="text" id="polName" class="form-control" value="NikhilWorks" placeholder="e.g. MyBrand Online">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Website URL <span class="text-danger">*</span></label>
            <input type="url" id="polUrl" class="form-control" value="https://nikhilworks.com" placeholder="https://example.com">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Contact Email for Inquiries</label>
            <input type="email" id="polEmail" class="form-control" value="contact@nikhilworks.com" placeholder="privacy@example.com">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Governing Jurisdiction / Country</label>
            <input type="text" id="polCountry" class="form-control" value="India" placeholder="India / USA / UK">
          </div>

          <div class="mb-3">
            <label class="form-label fw-bold">Data Collected (Check all that apply):</label>
            <div class="form-check">
              <input class="form-check-input pol-feature" type="checkbox" id="chkForms" checked>
              <label class="form-check-label" for="chkForms">Names, Emails &amp; Phone Numbers (Contact Forms)</label>
            </div>
            <div class="form-check">
              <input class="form-check-input pol-feature" type="checkbox" id="chkCookies" checked>
              <label class="form-check-label" for="chkCookies">Browser Cookies &amp; Session Data</label>
            </div>
            <div class="form-check">
              <input class="form-check-input pol-feature" type="checkbox" id="chkAnalytics" checked>
              <label class="form-check-label" for="chkAnalytics">Google Analytics / Web Tracking</label>
            </div>
            <div class="form-check">
              <input class="form-check-input pol-feature" type="checkbox" id="chkPayments">
              <label class="form-check-label" for="chkPayments">Online Payments &amp; Billing Data</label>
            </div>
          </div>

          <button type="button" class="btn btn-primary w-100 fw-bold py-3 mt-3" onclick="generatePolicy()">
            <i class="fa-solid fa-arrows-rotate me-1"></i> Generate Privacy Policy
          </button>
        </div>
      </div>

      <!-- Policy Output Column -->
      <div class="col-lg-7">
        <div class="tool-card-box h-100 d-flex flex-column justify-content-between">
          <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-file-contract text-success me-2"></i> Generated Legal Policy</h5>
              <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-outline-dark active" id="btnViewText" onclick="switchFormat('text')">Text</button>
                <button type="button" class="btn btn-outline-dark" id="btnViewHtml" onclick="switchFormat('html')">HTML Code</button>
              </div>
            </div>

            <textarea id="policyOutput" class="form-control bg-light small" style="height: 400px; font-family: sans-serif;" readonly></textarea>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="button" class="btn btn-dark fw-bold flex-grow-1 py-2" onclick="copyPolicyText()" id="btnCopyPol">
              <i class="fa-regular fa-copy me-1"></i> Copy Policy Text
            </button>
            <button type="button" class="btn btn-outline-secondary fw-bold py-2" onclick="downloadPolicyFile()">
              <i class="fa-solid fa-download me-1"></i> Download .txt
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5">
      <h2>Why Every Website Requires a Privacy Policy</h2>
      <p>
        Under global consumer protection regulations (including <strong>GDPR in the European Union</strong>, <strong>CCPA in California</strong>, and the <strong>Digital Personal Data Protection (DPDP) Act in India</strong>), websites that collect user information are legally required to state what data is collected, how it is processed, and how users can request deletion.
      </p>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Is this Privacy Policy valid for Google AdSense and Google Play Store?</summary>
        <p>Yes! It includes the standard third-party vendor disclosure clauses and cookie tracking notices required by Google AdSense, Google Analytics, and Play Store app submissions.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/ssl-checker/" class="text-decoration-none text-dark"><i class="fa-solid fa-shield-halved text-primary me-1"></i> SSL &amp; Security Checker</a></h6>
            <small class="text-muted">Test HTTPS encryption &amp; certificate validity.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/schema-generator/" class="text-decoration-none text-dark"><i class="fa-solid fa-code text-success me-1"></i> Schema Generator</a></h6>
            <small class="text-muted">Generate structured data markups.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/invoice/" class="text-decoration-none text-dark"><i class="fa-solid fa-file-invoice-dollar text-warning me-1"></i> Invoice Generator</a></h6>
            <small class="text-muted">Create professional client PDF invoices.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Custom Web Development &amp; Legal Compliance Setup?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks builds secure, compliant, high-performing websites and digital platforms for international businesses.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get In Touch <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    let activeFormat = 'text';

    function generatePolicy() {
      const name = $('#polName').val().trim() || 'Our Company';
      const url = $('#polUrl').val().trim() || 'https://example.com';
      const email = $('#polEmail').val().trim() || 'contact@example.com';
      const country = $('#polCountry').val().trim() || 'India';
      const dateStr = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

      const hasForms = $('#chkForms').is(':checked');
      const hasCookies = $('#chkCookies').is(':checked');
      const hasAnalytics = $('#chkAnalytics').is(':checked');
      const hasPayments = $('#chkPayments').is(':checked');

      let textPolicy = `PRIVACY POLICY\nLast updated: ${dateStr}\n\n1. INTRODUCTION\nWelcome to ${name} ("we," "our," or "us"), accessible at ${url}. We are committed to protecting your personal information and your right to privacy under applicable data protection laws in ${country} and international standards (including GDPR and CCPA).\n\n2. INFORMATION WE COLLECT\n`;

      if (hasForms) {
        textPolicy += `- Personal Contact Information: When you fill out forms on our website, we may collect your name, email address, phone number, and message details.\n`;
      }
      if (hasCookies) {
        textPolicy += `- Cookies & Tracking Data: We use cookies and similar tracking technologies to track activity on our service and remember your user preferences.\n`;
      }
      if (hasAnalytics) {
        textPolicy += `- Log & Analytics Data: We automatically collect log information such as your IP address, browser type, pages visited, and visit timestamps to analyze site performance.\n`;
      }
      if (hasPayments) {
        textPolicy += `- Payment & Transaction Data: If you purchase products or services, transaction and billing details are processed securely through certified payment gateways. We do not store full credit card credentials.\n`;
      }

      textPolicy += `\n3. HOW WE USE YOUR INFORMATION\nWe use the collected information to:\n- Provide, operate, and maintain our website.\n- Respond to inquiries, support requests, and customer communications.\n- Monitor and analyze trends, usage, and activities to improve user experience.\n- Prevent fraud and comply with legal obligations.\n\n4. DATA SECURITY & RETENTION\nWe implement appropriate technical and organizational security measures to protect your personal data from unauthorized access or disclosure.\n\n5. YOUR PRIVACY RIGHTS\nDepending on your location, you may have the right to request access to, correction of, or deletion of your personal data.\n\n6. CONTACT US\nIf you have any questions about this Privacy Policy, please contact us at:\nEmail: ${email}\nWebsite: ${url}`;

      let htmlPolicy = `<h2>Privacy Policy</h2>\n<p><strong>Last updated:</strong> ${dateStr}</p>\n<h3>1. Introduction</h3>\n<p>Welcome to <strong>${name}</strong> ("we," "our," or "us"), accessible at <a href="${url}">${url}</a>. We are committed to protecting your personal data under applicable privacy laws in ${country}.</p>\n<h3>2. Information We Collect</h3>\n<ul>\n`;
      if (hasForms) htmlPolicy += `  <li><strong>Contact Details:</strong> Names, emails, and phone numbers submitted via inquiry forms.</li>\n`;
      if (hasCookies) htmlPolicy += `  <li><strong>Cookies:</strong> Session identification and user preferences.</li>\n`;
      if (hasAnalytics) htmlPolicy += `  <li><strong>Usage Analytics:</strong> IP addresses, browser versions, and page interaction metrics.</li>\n`;
      if (hasPayments) htmlPolicy += `  <li><strong>Payment Data:</strong> Secure processing via certified payment gateways.</li>\n`;
      htmlPolicy += `</ul>\n<h3>3. Contact Us</h3>\n<p>For any privacy-related requests, please email us at <a href="mailto:${email}">${email}</a>.</p>`;

      if (activeFormat === 'text') {
        $('#policyOutput').val(textPolicy);
      } else {
        $('#policyOutput').val(htmlPolicy);
      }
    }

    function switchFormat(fmt) {
      activeFormat = fmt;
      $('#btnViewText, #btnViewHtml').removeClass('active');
      if (fmt === 'text') $('#btnViewText').addClass('active');
      if (fmt === 'html') $('#btnViewHtml').addClass('active');
      generatePolicy();
    }

    function copyPolicyText() {
      const code = $('#policyOutput').val();
      navigator.clipboard.writeText(code);
      const btn = $('#btnCopyPol');
      btn.html('<i class="fa-solid fa-check me-1"></i> Copied to Clipboard!');
      setTimeout(() => {
        btn.html('<i class="fa-regular fa-copy me-1"></i> Copy Policy Text');
      }, 2000);
    }

    function downloadPolicyFile() {
      const text = $('#policyOutput').val();
      const blob = new Blob([text], { type: 'text/plain' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = 'privacy-policy.txt';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    }

    $('input').on('input change', generatePolicy);
    $(document).ready(generatePolicy);
  </script>
</body>
</html>
