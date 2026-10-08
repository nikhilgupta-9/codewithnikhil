<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

// Handle Live AJAX SSL Check
if (isset($_POST['action']) && $_POST['action'] === 'check_ssl') {
    header('Content-Type: application/json');
    $domain = trim($_POST['domain'] ?? '');
    $domain = preg_replace('#^https?://#i', '', $domain);
    $domain = explode('/', $domain)[0];
    $domain = explode(':', $domain)[0];

    if (empty($domain)) {
        echo json_encode(['success' => false, 'message' => 'Please enter a valid domain name.']);
        exit;
    }

    $g = stream_context_create([
        "ssl" => [
            "capture_peer_cert" => true,
            "verify_peer" => false,
            "verify_peer_name" => false
        ]
    ]);

    $client = @stream_socket_client("ssl://" . $domain . ":443", $errno, $errstr, 12, STREAM_CLIENT_CONNECT, $g);

    if (!$client) {
        echo json_encode([
            'success' => false,
            'message' => "Could not connect to {$domain} on port 443. (Error: {$errstr})"
        ]);
        exit;
    }

    $params = stream_context_get_params($client);
    fclose($client);

    if (!isset($params["options"]["ssl"]["peer_certificate"])) {
        echo json_encode(['success' => false, 'message' => 'No SSL certificate found for this domain.']);
        exit;
    }

    $cert = openssl_x509_parse($params["options"]["ssl"]["peer_certificate"]);

    if (!$cert) {
        echo json_encode(['success' => false, 'message' => 'Failed to parse SSL certificate.']);
        exit;
    }

    $validFrom = $cert['validFrom_time_t'] ?? 0;
    $validTo = $cert['validTo_time_t'] ?? 0;
    $now = time();
    $daysRemaining = round(($validTo - $now) / 86400);
    $isExpired = $daysRemaining <= 0;

    $issuer = $cert['issuer']['O'] ?? ($cert['issuer']['CN'] ?? 'Unknown Authority');
    $subject = $cert['subject']['CN'] ?? $domain;
    $sans = $cert['extensions']['subjectAltName'] ?? '';

    echo json_encode([
        'success' => true,
        'domain' => $domain,
        'subject' => $subject,
        'issuer' => $issuer,
        'validFrom' => date('Y-m-d H:i:s', $validFrom),
        'validTo' => date('Y-m-d H:i:s', $validTo),
        'daysRemaining' => $daysRemaining,
        'isExpired' => $isExpired,
        'sans' => $sans,
        'signatureType' => $cert['signatureTypeSN'] ?? 'SHA256withRSA'
    ]);
    exit;
}

$pageTitle = "Free SSL Certificate & Domain Expiry Checker | NikhilWorks";
$metaDesc = "Check SSL certificate validity and domain expiry date instantly. Get alerts before your SSL or domain expires. Free online security checker tool.";
$canonical = $site . "tools/ssl-checker/";
$metaKeywords = "ssl certificate checker free, domain expiry checker online, ssl expiry checker, check ssl certificate validity, domain renewal date checker";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">">
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
    "name": "SSL Certificate & Domain Security Checker",
    "applicationCategory": "SecurityApplication",
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
      { "@type": "ListItem", "position": 3, "name": "SSL Checker" }
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
        "name": "Why is an SSL certificate essential for my website?",
        "acceptedAnswer": { "@type": "Answer", "text": "SSL encrypts sensitive user data (passwords, credit cards) and prevents 'Not Secure' browser warnings, while serving as a mandatory Google ranking factor." }
      },
      {
        "@type": "Question",
        "name": "What happens when an SSL certificate expires?",
        "acceptedAnswer": { "@type": "Answer", "text": "Browsers will block visitors with a severe security warning ('Your connection is not private'), causing immediate traffic and conversion loss." }
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

  <style>
    :root {
      --brand-teal: #104041;
      --brand-lime: #ADFF1C;
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
    .ssl-status-badge {
      font-size: 28px;
      width: 70px;
      height: 70px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px;
    }
    .ssl-good { background: rgba(22, 163, 74, 0.12); color: #16a34a; }
    .ssl-bad { background: rgba(220, 38, 38, 0.12); color: #dc2626; }
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
    <div class="hero-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <nav aria-label="breadcrumb">
        <div class="site-breadcrumb">
          <a href="<?= $site ?>"><i class="fa-solid fa-house fa-xs"></i> Home</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <a href="<?= $site ?>free-tools/">Free Tools</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <span class="bc-current">SSL Checker</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free SSL Certificate &amp; Domain Expiry Checker</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Test HTTPS certificate validity, expiration days countdown, certificate authority, and encryption health.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Form -->
        <div class="tool-card-box">
          <form id="sslForm" onsubmit="return false;">
            <label class="form-label fw-bold text-dark">Enter Domain Name (or URL)</label>
            <div class="input-group mb-3">
              <span class="input-group-text bg-light"><i class="fa-solid fa-lock text-muted"></i></span>
              <input type="text" id="sslDomain" class="form-control form-control-lg" placeholder="example.com" value="nikhilworks.com" required>
              <button type="button" class="btn btn-primary btn-lg fw-bold px-4" onclick="runSslCheck()" id="btnSsl">
                <i class="fa-solid fa-shield-halved me-1"></i> Check SSL
              </button>
            </div>
          </form>

          <div id="sslLoader" class="text-center py-4 d-none">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-muted small mt-2">Connecting to TLS port 443 and parsing X.509 certificate...</p>
          </div>

          <div id="sslError" class="alert alert-danger d-none rounded-3 mt-3"></div>

          <!-- Result Area -->
          <div id="sslResultArea" class="d-none mt-4 pt-4 border-top">
            
            <div class="text-center mb-4">
              <div class="ssl-status-badge ssl-good" id="sslBadgeIcon">
                <i class="fa-solid fa-shield-check"></i>
              </div>
              <h4 class="fw-extrabold text-dark mb-1" id="sslStatusText">SSL Certificate is Valid &amp; Active</h4>
              <span class="badge bg-success" id="sslDaysBadge">320 Days Remaining</span>
            </div>

            <!-- Details Table -->
            <div class="table-responsive">
              <table class="table table-bordered align-middle bg-white mb-0">
                <tbody>
                  <tr>
                    <td style="width: 35%;" class="fw-bold text-muted">Common Name (Domain)</td>
                    <td class="fw-bold text-dark" id="resSubject">nikhilworks.com</td>
                  </tr>
                  <tr>
                    <td class="fw-bold text-muted">Issuing Authority (CA)</td>
                    <td class="fw-bold text-primary" id="resIssuer">Let's Encrypt Authority</td>
                  </tr>
                  <tr>
                    <td class="fw-bold text-muted">Valid From</td>
                    <td id="resValidFrom">2026-01-01</td>
                  </tr>
                  <tr>
                    <td class="fw-bold text-muted">Expiry Date</td>
                    <td class="fw-bold text-danger" id="resValidTo">2026-12-31</td>
                  </tr>
                  <tr>
                    <td class="fw-bold text-muted">Signature Algorithm</td>
                    <td id="resSig">SHA256withRSA</td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

        </div>

        <!-- CONTENT SECTION -->
        <div class="content-section mt-5">
          <h2>Why SSL Certificate Expiry Monitoring is Critical</h2>
          <p>
            An expired SSL certificate results in catastrophic browser security blocks (e.g. <em>NET::ERR_CERT_DATE_INVALID</em> in Google Chrome).
            Regular checks prevent unexpected downtime and ensure customer trust.
          </p>

          <h2>Frequently Asked Questions</h2>
          <details class="faq-card" open>
            <summary>How often should SSL certificates be renewed?</summary>
            <p>Most modern SSL authorities (like Let's Encrypt and Cloudflare) issue certificates valid for 90 days with automated renewal. Standard commercial certificates are typically renewed annually (365 days).</p>
          </details>

          <h2>Related Free Tools</h2>
          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/pagespeed/" class="text-decoration-none text-dark"><i class="fa-solid fa-gauge-high text-primary me-1"></i> PageSpeed Checker</a></h6>
                <small class="text-muted">Test Core Web Vitals &amp; performance.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/index-checker/" class="text-decoration-none text-dark"><i class="fa-brands fa-google text-success me-1"></i> Google Index Checker</a></h6>
                <small class="text-muted">Test SERP indexation status.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>seo-auditor/" class="text-decoration-none text-dark"><i class="fa-solid fa-stethoscope text-danger me-1"></i> Free SEO Auditor</a></h6>
                <small class="text-muted">Full 50-point technical SEO scan.</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Enterprise Website Security &amp; Server Hardening?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks configures automatic SSL renewals, Cloudflare WAF firewalls, and DDoS mitigation for mission-critical web applications.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Security Consultation <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function runSslCheck() {
      const domain = $('#sslDomain').val().trim();
      if (!domain) {
        alert('Please enter a domain name.');
        return;
      }

      const btn = $('#btnSsl');
      const loader = $('#sslLoader');
      const errBox = $('#sslError');
      const resArea = $('#sslResultArea');

      btn.prop('disabled', true);
      loader.removeClass('d-none');
      errBox.addClass('d-none');
      resArea.addClass('d-none');

      $.ajax({
        url: '',
        type: 'POST',
        data: {
          action: 'check_ssl',
          domain: domain
        },
        dataType: 'json',
        success: function(res) {
          btn.prop('disabled', false);
          loader.addClass('d-none');

          if (res.success) {
            $('#resSubject').text(res.subject);
            $('#resIssuer').text(res.issuer);
            $('#resValidFrom').text(res.validFrom);
            $('#resValidTo').text(res.validTo);
            $('#resSig').text(res.signatureType);

            if (res.isExpired) {
              $('#sslBadgeIcon').attr('class', 'ssl-status-badge ssl-bad').html('<i class="fa-solid fa-triangle-exclamation"></i>');
              $('#sslStatusText').text('SSL Certificate is Expired!').attr('class', 'fw-extrabold text-danger mb-1');
              $('#sslDaysBadge').text('Expired ' + Math.abs(res.daysRemaining) + ' days ago').attr('class', 'badge bg-danger');
            } else {
              $('#sslBadgeIcon').attr('class', 'ssl-status-badge ssl-good').html('<i class="fa-solid fa-shield-check"></i>');
              $('#sslStatusText').text('SSL Certificate is Active & Valid').attr('class', 'fw-extrabold text-dark mb-1');
              $('#sslDaysBadge').text(res.daysRemaining + ' Days Remaining').attr('class', 'badge bg-success');
            }

            resArea.removeClass('d-none');
          } else {
            errBox.text(res.message || 'SSL check failed.').removeClass('d-none');
          }
        },
        error: function() {
          btn.prop('disabled', false);
          loader.addClass('d-none');
          errBox.text('Server connection error while querying SSL certificate.').removeClass('d-none');
        }
      });
    }
  </script>
</body>
</html>
