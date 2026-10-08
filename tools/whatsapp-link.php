<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free WhatsApp Link Generator — wa.me Link Creator Studio | NikhilWorks";
$metaDesc = "Generate WhatsApp click-to-chat links instantly with pre-filled messages and QR codes. Perfect for Instagram bio, Facebook ads & business cards. 100% free tool.";
$canonical = $site . "tools/whatsapp-link/";
$metaKeywords = "whatsapp link generator, wa.me link generator, whatsapp click to chat link free, create whatsapp link without saving number, whatsapp business link creator india";
$currentTool = 'whatsapp-link';
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

  <!-- JS -->
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

  <style>
    .qr-preview-box {
      background: #ffffff;
      padding: 16px;
      border-radius: 12px;
      border: 1px solid var(--border-subtle);
      display: inline-block;
    }
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
            <div class="tool-header-icon icon-emerald">
              <i class="fa-brands fa-whatsapp"></i>
            </div>
            <div>
              <h1 class="tool-header-title">WhatsApp Link &amp; QR Creator</h1>
              <p class="tool-header-desc">Generate instant <code>wa.me</code> click-to-chat links with custom pre-filled greetings &amp; QR codes for your business.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('whatsapp-link')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Recent Links
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Form Inputs Column -->
          <div class="col-lg-7">
            <form id="waForm" onsubmit="return false;">
              <div class="row g-3">
                <div class="col-md-5">
                  <label class="form-label">Country Code</label>
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
                <div class="col-md-7">
                  <label class="form-label">WhatsApp Number <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <span class="input-group-text fw-bold" id="codePrefix">+91</span>
                    <input type="tel" id="waNumber" class="form-control" placeholder="9876543210" value="8368552640" required>
                  </div>
                  <small class="text-muted" style="font-size: 11px;">Enter digits without leading 0 or spaces.</small>
                </div>

                <div class="col-12">
                  <label class="form-label">Pre-filled Custom Message (Optional)</label>
                  <textarea id="waMessage" class="form-control" rows="3" placeholder="e.g. Hi Nikhil, I saw your portfolio and would like to discuss a web design project!">Hi Nikhil, I saw your website and would like to inquire about your web development services.</textarea>
                  
                  <div class="d-flex justify-content-between small text-muted mt-2">
                    <span>Quick Templates:</span>
                    <div class="d-flex gap-2">
                      <a href="javascript:void(0)" onclick="setTemplate('Hi! I would like to inquire about your services.')" class="text-info text-decoration-none">Inquiry</a> &bull;
                      <a href="javascript:void(0)" onclick="setTemplate('Hello, I need a quotation for website development.')" class="text-info text-decoration-none">Quote</a> &bull;
                      <a href="javascript:void(0)" onclick="setTemplate('Hey, I want to book a free consultation call.')" class="text-info text-decoration-none">Call</a>
                    </div>
                  </div>
                </div>

                <div class="col-12 mt-4">
                  <button type="button" onclick="generateWaLink()" class="topbar-btn topbar-btn-primary w-100 py-3 justify-content-center" style="font-size: 14px;">
                    <i class="fa-brands fa-whatsapp fa-lg me-1"></i> Generate WhatsApp Link &amp; Save History
                  </button>
                </div>
              </div>
            </form>
          </div>

          <!-- Live Output Preview Column -->
          <div class="col-lg-5">
            <div class="tool-output-panel">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-link text-success me-2"></i> Generated Link &amp; QR</h6>
              
              <div class="input-group mb-3 w-100">
                <input type="text" id="generatedLink" class="form-control fw-bold" readonly>
                <button class="topbar-btn topbar-btn-primary" type="button" onclick="copyWaLink()" id="btnCopy">
                  <i class="fa-regular fa-copy"></i>
                </button>
              </div>

              <div class="d-flex flex-wrap gap-2 mb-3 justify-content-center w-100">
                <a href="#" target="_blank" id="testChatBtn" class="topbar-btn topbar-btn-primary flex-fill justify-content-center" style="background: #25D366; color: #fff;">
                  <i class="fa-brands fa-whatsapp"></i> Test Chat
                </a>
                <button class="topbar-btn topbar-btn-ghost flex-fill justify-content-center" onclick="downloadQrCode()">
                  <i class="fa-solid fa-download"></i> QR Image
                </button>
              </div>

              <div class="text-center mt-2">
                <div class="qr-preview-box">
                  <div id="waQrCode"></div>
                </div>
                <div class="small text-muted mt-2">Scan to chat instantly on WhatsApp</div>
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
    let qrcodeInstance = null;

    $('#waCountry').on('change', function() {
      const val = $(this).val();
      if (val === 'custom') {
        const manual = prompt('Enter your country code (digits only, e.g. 91, 1, 44):', '91');
        const code = manual ? manual.replace(/\D/g, '') : '91';
        $('#codePrefix').text('+' + code);
      } else {
        $('#codePrefix').text('+' + val);
      }
      generateWaLink();
    });

    $('#waNumber, #waMessage').on('input', generateWaLink);

    function setTemplate(msg) {
      $('#waMessage').val(msg);
      generateWaLink();
    }

    function generateWaLink(isManual = false) {
      const countryCode = $('#codePrefix').text().replace('+', '').trim();
      let rawNumber = $('#waNumber').val().trim().replace(/\D/g, '');
      const message = $('#waMessage').val().trim();

      if (!rawNumber) {
        rawNumber = '8368552640';
      }

      const fullNumber = countryCode + rawNumber;
      let finalUrl = 'https://wa.me/' + fullNumber;
      if (message) {
        finalUrl += '?text=' + encodeURIComponent(message);
      }

      $('#generatedLink').val(finalUrl);
      $('#testChatBtn').attr('href', finalUrl);

      // Render QR
      $('#waQrCode').html('');
      qrcodeInstance = new QRCode(document.getElementById("waQrCode"), {
        text: finalUrl,
        width: 170,
        height: 170,
        colorDark: "#071314",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.M
      });

      if (isManual) {
        // Save to History
        const title = `WhatsApp: +${fullNumber}`;
        const summary = message ? `Msg: "${message.substring(0, 60)}..."` : 'Direct click-to-chat link';
        const payload = {
          countryCode: countryCode,
          number: rawNumber,
          message: message,
          url: finalUrl
        };
        ToolsApp.saveHistory('whatsapp-link', title, summary, payload);
      }
    }

    function copyWaLink() {
      const link = $('#generatedLink').val();
      if (navigator.clipboard) {
        navigator.clipboard.writeText(link).then(() => {
          ToolsApp.showToast('WhatsApp link copied! 📋');
        });
      } else {
        $('#generatedLink').select();
        document.execCommand('copy');
        ToolsApp.showToast('WhatsApp link copied! 📋');
      }
    }

    function downloadQrCode() {
      const img = document.querySelector('#waQrCode img');
      const canvas = document.querySelector('#waQrCode canvas');
      const src = img ? img.src : (canvas ? canvas.toDataURL("image/png") : '');

      if (src) {
        const a = document.createElement('a');
        a.href = src;
        a.download = 'whatsapp-qr-nikhilworks.png';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        ToolsApp.showToast('QR Image Downloaded!');
      }
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'whatsapp-link' && payload) {
        if (payload.countryCode) {
          $('#codePrefix').text('+' + payload.countryCode);
        }
        if (payload.number) $('#waNumber').val(payload.number);
        if (payload.message) $('#waMessage').val(payload.message);
        generateWaLink(false);
      }
    });

    $(document).ready(function() {
      generateWaLink(false);
    });
  </script>
</body>
</html>
