<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free QR Code Generator — UPI, WiFi, URL & vCard Studio | NikhilWorks";
$metaDesc = "Generate high-resolution custom QR codes for URLs, WiFi passwords, vCards, and UPI payments. 100% free with SVG & PNG download. No signup required.";
$canonical = $site . "tools/qr-code/";
$metaKeywords = "qr code generator, upi qr code generator free, wifi qr code maker, vcard qr generator, svg qr code download, free qr generator india";
$currentTool = 'qr-code';
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
    .qr-type-btn {
      border: 1px solid var(--border-subtle);
      background: rgba(255, 255, 255, 0.04);
      color: var(--text-muted);
      padding: 8px 14px;
      border-radius: 10px;
      font-weight: 600;
      font-size: 13px;
      cursor: pointer;
      transition: all 0.2s;
    }
    .qr-type-btn.active, .qr-type-btn:hover {
      background: var(--brand-teal);
      color: #fff;
      border-color: var(--brand-lime);
      box-shadow: 0 0 10px rgba(173, 255, 28, 0.15);
    }
    .qr-type-btn.active i {
      color: var(--brand-lime);
    }
    .qr-render-frame {
      background: #ffffff;
      border: 2px dashed rgba(173, 255, 28, 0.4);
      border-radius: 16px;
      padding: 24px;
      text-align: center;
      min-height: 260px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
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
            <div class="tool-header-icon icon-teal">
              <i class="fa-solid fa-qrcode"></i>
            </div>
            <div>
              <h1 class="tool-header-title">QR Code Studio Pro</h1>
              <p class="tool-header-desc">Generate customized, high-resolution QR codes for websites, WiFi networks, vCards &amp; UPI payments.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" id="openHistoryBtn2" onclick="ToolsApp.openHistoryDrawer('qr-code')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Recent QR History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Input Controls Column -->
          <div class="col-lg-7">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-sliders text-info me-2"></i> Select QR Code Type</h6>
            
            <div class="d-flex flex-wrap gap-2 mb-4">
              <button type="button" class="qr-type-btn active" data-type="url"><i class="fa-solid fa-link me-1"></i> Website URL</button>
              <button type="button" class="qr-type-btn" data-type="text"><i class="fa-solid fa-align-left me-1"></i> Plain Text</button>
              <button type="button" class="qr-type-btn" data-type="wifi"><i class="fa-solid fa-wifi me-1"></i> WiFi Login</button>
              <button type="button" class="qr-type-btn" data-type="vcard"><i class="fa-solid fa-address-card me-1"></i> Contact (vCard)</button>
              <button type="button" class="qr-type-btn" data-type="upi"><i class="fa-solid fa-indian-rupee-sign me-1"></i> UPI Payment</button>
            </div>

            <!-- Dynamic Form Inputs -->
            <div id="typeInputs">
              <!-- URL Input -->
              <div class="form-group-section" id="sec-url">
                <label class="form-label">Website URL <span class="text-danger">*</span></label>
                <input type="url" id="qrUrl" class="form-control" placeholder="https://example.com" value="https://nikhilworks.com">
              </div>

              <!-- Text Input -->
              <div class="form-group-section d-none" id="sec-text">
                <label class="form-label">Enter Text or Message</label>
                <textarea id="qrText" class="form-control" rows="3" placeholder="Type any text, promo code, or message..."></textarea>
              </div>

              <!-- WiFi Input -->
              <div class="form-group-section d-none" id="sec-wifi">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Network Name (SSID)</label>
                    <input type="text" id="wifiSsid" class="form-control" placeholder="Office_WiFi_5G">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">WiFi Password</label>
                    <input type="text" id="wifiPass" class="form-control" placeholder="WiFi Password">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Encryption Type</label>
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
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" id="vName" class="form-control" placeholder="Nikhil Gupta">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" id="vPhone" class="form-control" placeholder="+91 8368552640">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <input type="email" id="vEmail" class="form-control" placeholder="contact@nikhilworks.com">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Company / Organization</label>
                    <input type="text" id="vOrg" class="form-control" placeholder="NikhilWorks">
                  </div>
                </div>
              </div>

              <!-- UPI Input -->
              <div class="form-group-section d-none" id="sec-upi">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label">UPI ID / VPA <span class="text-danger">*</span></label>
                    <input type="text" id="upiVpa" class="form-control" placeholder="username@okhdfcbank">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Payee Name</label>
                    <input type="text" id="upiName" class="form-control" placeholder="Nikhil Gupta">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Preset Amount (INR) — Optional</label>
                    <input type="number" id="upiAmount" class="form-control" placeholder="e.g. 500">
                  </div>
                </div>
              </div>
            </div>

            <!-- Custom Styling Accordion -->
            <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
              <label class="form-label mb-2"><i class="fa-solid fa-palette text-warning me-1"></i> QR Code Colors</label>
              <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                  <input type="color" id="qrDarkColor" value="#071314" class="form-control form-control-color p-1" style="width: 44px; height: 38px; border-radius: 8px;">
                  <span class="small text-muted">Dark Code</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                  <input type="color" id="qrLightColor" value="#ffffff" class="form-control form-control-color p-1" style="width: 44px; height: 38px; border-radius: 8px;">
                  <span class="small text-muted">Background</span>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <button type="button" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center" id="saveQrHistoryBtn">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save to My QR History
              </button>
            </div>
          </div>

          <!-- Live Output Preview Column -->
          <div class="col-lg-5">
            <div class="tool-output-panel">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-eye text-success me-2"></i> Live QR Code Preview</h6>
              
              <div class="qr-render-frame mb-3" id="qrcodeBox">
                <!-- QRCode.js renders here -->
              </div>

              <p class="text-muted small mb-3">Scan with any mobile camera, Google Lens, or UPI App.</p>

              <div class="d-flex flex-wrap gap-2 justify-content-center w-100">
                <button type="button" class="topbar-btn topbar-btn-primary flex-fill justify-content-center" onclick="downloadQr('png')">
                  <i class="fa-solid fa-download"></i> PNG
                </button>
                <button type="button" class="topbar-btn topbar-btn-ghost flex-fill justify-content-center" onclick="downloadQr('svg')">
                  <i class="fa-solid fa-file-code"></i> SVG
                </button>
                <button type="button" class="topbar-btn topbar-btn-ghost flex-fill justify-content-center" onclick="printQr()">
                  <i class="fa-solid fa-print"></i> Print
                </button>
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

    $('#qrDarkColor, #qrLightColor').on('input', renderQr);
    $('#qrUrl, #qrText, #wifiSsid, #wifiPass, #wifiType, #vName, #vPhone, #vEmail, #vOrg, #upiVpa, #upiName, #upiAmount').on('input change', renderQr);

    function getQrPayload() {
      switch (activeType) {
        case 'url':
          return $('#qrUrl').val().trim() || 'https://nikhilworks.com';
        case 'text':
          return $('#qrText').val().trim() || 'Welcome to NikhilWorks';
        case 'wifi':
          const ssid = $('#wifiSsid').val().trim() || 'WiFi-Network';
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
        width: 190,
        height: 190,
        colorDark: dark,
        colorLight: light,
        correctLevel: QRCode.CorrectLevel.H
      });
    }

    function downloadQr(format) {
      const img = document.querySelector('#qrcodeBox img');
      const canvas = document.querySelector('#qrcodeBox canvas');
      const src = img ? img.src : (canvas ? canvas.toDataURL("image/png") : '');

      if (src) {
        const a = document.createElement('a');
        a.href = src;
        a.download = `qrcode-${activeType}-nikhilworks.${format === 'svg' ? 'png' : format}`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        // Auto save to history
        triggerSaveHistory();
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
            <img src="${src}" style="width: 260px; height: 260px; margin: 20px auto; display: block;" />
            <p style="color: #64748b; font-size: 14px;">Powered by NikhilWorks Tools Studio</p>
            <script>window.onload = function() { window.print(); window.close(); };<\/script>
          </body>
        </html>
      `);
      printWin.document.close();
      triggerSaveHistory();
    }

    function triggerSaveHistory() {
      const payload = getQrPayload();
      let title = `QR Code: ${activeType.toUpperCase()}`;
      let summary = payload.substring(0, 80);

      if (activeType === 'url') { title = `URL QR: ${$('#qrUrl').val() || 'nikhilworks.com'}`; }
      else if (activeType === 'wifi') { title = `WiFi QR: ${$('#wifiSsid').val() || 'Network'}`; }
      else if (activeType === 'vcard') { title = `Contact Card: ${$('#vName').val() || 'vCard'}`; }
      else if (activeType === 'upi') { title = `UPI QR: ${$('#upiVpa').val() || 'UPI'}`; }

      const payloadObj = {
        type: activeType,
        url: $('#qrUrl').val(),
        text: $('#qrText').val(),
        wifiSsid: $('#wifiSsid').val(),
        wifiPass: $('#wifiPass').val(),
        wifiType: $('#wifiType').val(),
        vName: $('#vName').val(),
        vPhone: $('#vPhone').val(),
        vEmail: $('#vEmail').val(),
        vOrg: $('#vOrg').val(),
        upiVpa: $('#upiVpa').val(),
        upiName: $('#upiName').val(),
        upiAmount: $('#upiAmount').val(),
        darkColor: $('#qrDarkColor').val(),
        lightColor: $('#qrLightColor').val()
      };

      ToolsApp.saveHistory('qr-code', title, summary, payloadObj);
    }

    $('#saveQrHistoryBtn').on('click', triggerSaveHistory);

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'qr-code' && payload) {
        if (payload.type) {
          $(`.qr-type-btn[data-type="${payload.type}"]`).click();
        }
        if (payload.url) $('#qrUrl').val(payload.url);
        if (payload.text) $('#qrText').val(payload.text);
        if (payload.wifiSsid) $('#wifiSsid').val(payload.wifiSsid);
        if (payload.wifiPass) $('#wifiPass').val(payload.wifiPass);
        if (payload.wifiType) $('#wifiType').val(payload.wifiType);
        if (payload.vName) $('#vName').val(payload.vName);
        if (payload.vPhone) $('#vPhone').val(payload.vPhone);
        if (payload.vEmail) $('#vEmail').val(payload.vEmail);
        if (payload.vOrg) $('#vOrg').val(payload.vOrg);
        if (payload.upiVpa) $('#upiVpa').val(payload.upiVpa);
        if (payload.upiName) $('#upiName').val(payload.upiName);
        if (payload.upiAmount) $('#upiAmount').val(payload.upiAmount);
        if (payload.darkColor) $('#qrDarkColor').val(payload.darkColor);
        if (payload.lightColor) $('#qrLightColor').val(payload.lightColor);
        renderQr();
      }
    });

    $(document).ready(function() {
      renderQr();
    });
  </script>
</body>
</html>
