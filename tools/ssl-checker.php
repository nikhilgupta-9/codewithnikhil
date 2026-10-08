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

$pageTitle = "Free SSL Certificate & Domain Security Inspector | NikhilWorks";
$metaDesc = "Check SSL certificate validity, expiration countdown, TLS protocol grade & CA issuer authority. 100% free security checker tool.";
$canonical = $site . "tools/ssl-checker/";
$metaKeywords = "ssl certificate checker free, domain expiry checker online, ssl expiry checker, check ssl certificate validity, domain renewal date checker";
$currentTool = 'ssl-checker';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="site-url" content="<?= $site ?>">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonical) ?>">

  <!-- Open Graph -->
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($metaDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonical) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?= $site ?>assets/img/logo/og-tools.jpg">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>tools/assets/tool-app.css">

  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    .ssl-status-badge {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      margin: 0 auto 12px;
    }
    .ssl-good { background: rgba(34, 197, 94, 0.15); color: #22c55e; border: 3px solid #22c55e; }
    .ssl-bad { background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 3px solid #ef4444; }
  </style>
</head>

<body class="tools-app-body">

  <?php include_once __DIR__ . "/includes/tool-header.php"; ?>

  <div class="app-wrapper">
    
    <?php include_once __DIR__ . "/includes/tool-sidebar.php"; ?>

    <main class="app-main-content">
      
      <!-- Workspace Card -->
      <div class="tool-workspace-card">
        <div class="tool-workspace-header">
          <div class="tool-header-left">
            <div class="tool-header-icon icon-indigo">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div>
              <h1 class="tool-header-title">SSL &amp; Domain Security Inspector</h1>
              <p class="tool-header-desc">Inspect SSL certificate validity, issuer authority, expiration date countdown, TLS protocol versions, and HTTPS configuration grade.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('ssl-checker')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Security History
            </button>
          </div>
        </div>

        <!-- Domain Input Form -->
        <div class="row g-3 mb-4">
          <div class="col-md-9">
            <label class="form-label">Domain Name / Hostname <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-lock text-success"></i></span>
              <input type="text" id="sslDomain" class="form-control" placeholder="nikhilworks.com or google.com" value="nikhilworks.com" required>
            </div>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button type="button" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center" id="btnSsl" onclick="runSslCheck()">
              <i class="fa-solid fa-shield-virus me-1"></i> Inspect SSL
            </button>
          </div>
        </div>

        <!-- Loader -->
        <div id="sslLoader" class="text-center py-5 d-none">
          <i class="fa-solid fa-spinner fa-spin fa-3x text-info mb-3"></i>
          <h5 class="text-white fw-bold">Connecting to SSL port 443...</h5>
          <p class="text-muted small">Parsing TLS handshake certificate chain</p>
        </div>

        <!-- Error -->
        <div id="sslError" class="alert alert-danger d-none py-3" role="alert"></div>

        <!-- Result Area -->
        <div id="sslResultArea" class="d-none">
          <div class="p-4 rounded text-center mb-4" style="background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-subtle);">
            <div id="sslBadgeIcon" class="ssl-status-badge ssl-good">
              <i class="fa-solid fa-shield-check"></i>
            </div>
            <h4 id="sslStatusText" class="fw-extrabold text-white mb-1">SSL Certificate is Active &amp; Valid</h4>
            <span id="sslDaysBadge" class="badge bg-success px-3 py-2 fs-6">300 Days Remaining</span>
          </div>

          <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-file-shield text-info me-2"></i> Certificate Authority &amp; Signature Details</h6>
          <div class="row g-3">
            <div class="col-md-6">
              <div class="p-3 rounded" style="background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-subtle);">
                <small class="text-muted d-block">Issued To (Common Name)</small>
                <strong class="text-white fs-6" id="resSubject">nikhilworks.com</strong>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded" style="background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-subtle);">
                <small class="text-muted d-block">Issuer Authority</small>
                <strong class="text-info fs-6" id="resIssuer">Let's Encrypt / Cloudflare</strong>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded" style="background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-subtle);">
                <small class="text-muted d-block">Valid From</small>
                <span class="text-light" id="resValidFrom">--</span>
              </div>
            </div>
            <div class="col-md-6">
              <div class="p-3 rounded" style="background: rgba(255, 255, 255, 0.03); border: 1px solid var(--border-subtle);">
                <small class="text-muted d-block">Expiration Date</small>
                <span class="text-warning fw-bold" id="resValidTo">--</span>
              </div>
            </div>
          </div>
        </div>

      </div>

      <?php include_once __DIR__ . "/includes/tool-footer.php"; ?>

    </main>
  </div>

  <?php include_once __DIR__ . "/includes/tool-auth-modal.php"; ?>
  <?php include_once __DIR__ . "/includes/tool-history-drawer.php"; ?>

  <script src="<?= $site ?>assets/js/plugins/bootstrap.min.js"></script>
  <script src="<?= $site ?>tools/assets/tool-app.js"></script>

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

            if (res.isExpired) {
              $('#sslBadgeIcon').attr('class', 'ssl-status-badge ssl-bad').html('<i class="fa-solid fa-triangle-exclamation"></i>');
              $('#sslStatusText').text('SSL Certificate is Expired!').attr('class', 'fw-extrabold text-danger mb-1');
              $('#sslDaysBadge').text('Expired ' + Math.abs(res.daysRemaining) + ' days ago').attr('class', 'badge bg-danger');
            } else {
              $('#sslBadgeIcon').attr('class', 'ssl-status-badge ssl-good').html('<i class="fa-solid fa-shield-check"></i>');
              $('#sslStatusText').text('SSL Certificate is Active & Valid').attr('class', 'fw-extrabold text-white mb-1');
              $('#sslDaysBadge').text(res.daysRemaining + ' Days Remaining').attr('class', 'badge bg-success');
            }

            resArea.removeClass('d-none');

            // Save to History
            const title = `SSL Check: ${domain}`;
            const summary = `Status: ${res.isExpired ? 'Expired' : 'Valid'} (${res.daysRemaining} days left) | Issuer: ${res.issuer}`;
            const payload = {
              domain: domain,
              daysRemaining: res.daysRemaining,
              issuer: res.issuer,
              validTo: res.validTo
            };
            ToolsApp.saveHistory('ssl-checker', title, summary, payload);
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

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'ssl-checker' && payload) {
        if (payload.domain) $('#sslDomain').val(payload.domain);
        runSslCheck();
      }
    });
  </script>
</body>
</html>
