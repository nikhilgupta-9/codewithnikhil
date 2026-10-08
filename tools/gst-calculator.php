<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free GST Calculator India — Inclusive & Exclusive Tax Breakup | NikhilWorks";
$metaDesc = "Calculate Indian GST online free. Supports 5%, 12%, 18%, 28% and custom tax slabs with CGST, SGST, IGST breakup. Instant reverse tax calculation.";
$canonical = $site . "tools/gst-calculator/";
$metaKeywords = "gst calculator india, online gst calculator free, reverse gst calculator, cgst sgst calculator, gst tax calculation formula, free accounting tools india";
$currentTool = 'gst-calculator';
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
    .btn-slab-toggle {
      border: 1px solid var(--border-subtle);
      background: rgba(255, 255, 255, 0.04);
      color: var(--text-muted);
      font-weight: 700;
      padding: 8px 16px;
      border-radius: 10px;
      transition: all 0.2s;
      cursor: pointer;
    }
    .btn-slab-toggle.active, .btn-slab-toggle:hover {
      background: var(--brand-teal);
      border-color: var(--brand-lime);
      color: #ffffff;
      box-shadow: 0 0 10px rgba(173, 255, 28, 0.15);
    }
    .res-card-box {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border-subtle);
      border-radius: 12px;
      padding: 16px 20px;
      margin-bottom: 12px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .res-val-highlight {
      font-size: 22px;
      font-weight: 800;
      color: var(--brand-lime);
      font-family: var(--code-font);
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
            <div class="tool-header-icon icon-amber">
              <i class="fa-solid fa-calculator"></i>
            </div>
            <div>
              <h1 class="tool-header-title">GST Calculator India</h1>
              <p class="tool-header-desc">Instant Goods &amp; Services Tax calculation with Inclusive/Exclusive mode, CGST, SGST &amp; IGST tax slab breakdowns.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('gst-calculator')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Calculation History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Input Controls Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-sliders text-warning me-2"></i> Tax Input Parameters</h6>

            <!-- GST Calculation Mode -->
            <div class="mb-3">
              <label class="form-label">Calculation Mode</label>
              <div class="d-flex gap-2">
                <div class="form-check flex-fill p-2 px-3 rounded" style="background: rgba(255,255,255,0.04); border: 1px solid var(--border-subtle);">
                  <input class="form-check-input ms-0 me-2" type="radio" name="gstType" id="typeExcl" value="exclusive" checked>
                  <label class="form-check-label text-light fw-bold" for="typeExcl">GST Exclusive (Add Tax)</label>
                </div>
                <div class="form-check flex-fill p-2 px-3 rounded" style="background: rgba(255,255,255,0.04); border: 1px solid var(--border-subtle);">
                  <input class="form-check-input ms-0 me-2" type="radio" name="gstType" id="typeIncl" value="inclusive">
                  <label class="form-check-label text-light fw-bold" for="typeIncl">GST Inclusive (Reverse)</label>
                </div>
              </div>
            </div>

            <!-- Base Amount -->
            <div class="mb-3">
              <label class="form-label" id="amountLabel">Base Amount (₹) <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text fw-bold">₹</span>
                <input type="number" id="baseAmount" class="form-control fw-bold" placeholder="50000" value="50000" min="0" step="any">
              </div>
            </div>

            <!-- Tax Rate Slabs -->
            <div class="mb-3">
              <label class="form-label">GST Tax Rate Slab</label>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn-slab-toggle" data-rate="5">5%</button>
                <button type="button" class="btn-slab-toggle" data-rate="12">12%</button>
                <button type="button" class="btn-slab-toggle active" data-rate="18">18% (Standard)</button>
                <button type="button" class="btn-slab-toggle" data-rate="28">28%</button>
                <button type="button" class="btn-slab-toggle" data-rate="custom">Custom %</button>
              </div>

              <div id="customRateGroup" class="mt-2 d-none">
                <div class="input-group input-group-sm">
                  <span class="input-group-text">Custom Tax Rate</span>
                  <input type="number" id="customRateInput" class="form-control" placeholder="e.g. 7.5" value="18" min="0" max="100" step="0.1">
                  <span class="input-group-text">%</span>
                </div>
              </div>
            </div>

            <!-- State / Supply Type -->
            <div class="mb-3">
              <label class="form-label">Supply Destination</label>
              <select id="supplyType" class="form-select">
                <option value="intra" selected>Intra-State (Same State — CGST + SGST)</option>
                <option value="inter">Inter-State (Outside State — IGST)</option>
              </select>
            </div>

            <div class="mt-4">
              <button type="button" class="topbar-btn topbar-btn-primary w-100 py-3 justify-content-center" onclick="saveGstToHistory()">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Calculation to History
              </button>
            </div>
          </div>

          <!-- Output Column -->
          <div class="col-lg-6">
            <div class="tool-output-panel align-items-stretch text-start">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-white fw-bold mb-0"><i class="fa-solid fa-receipt text-warning me-2"></i> Tax Breakdown Summary</h6>
                <button type="button" class="btn btn-sm btn-outline-secondary text-white border-0" onclick="copyGstSummary()">
                  <i class="fa-regular fa-copy me-1"></i> Copy
                </button>
              </div>

              <!-- Net Base Price -->
              <div class="res-card-box">
                <div>
                  <div class="text-muted small">Net Base Amount</div>
                  <div class="fw-bold text-white fs-6">Pre-tax Price</div>
                </div>
                <div class="res-val-highlight" id="resNetPrice">₹50,000.00</div>
              </div>

              <!-- GST Tax Total -->
              <div class="res-card-box" style="border-color: rgba(251, 191, 36, 0.3);">
                <div>
                  <div class="text-muted small">GST Tax Amount (<span id="resGstPercent">18%</span>)</div>
                  <div class="fw-bold text-warning fs-6">Total Tax Surcharge</div>
                </div>
                <div class="res-val-highlight text-warning" id="resGstAmount">₹9,000.00</div>
              </div>

              <!-- CGST / SGST Split -->
              <div id="intraTaxRow">
                <div class="row g-2 mb-2">
                  <div class="col-6">
                    <div class="p-2 rounded text-center" style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle);">
                      <small class="text-muted d-block">CGST (<span id="resCgstPercent">9%</span>)</small>
                      <strong class="text-white" id="resCgst">₹4,500.00</strong>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="p-2 rounded text-center" style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle);">
                      <small class="text-muted d-block">SGST (<span id="resSgstPercent">9%</span>)</small>
                      <strong class="text-white" id="resSgst">₹4,500.00</strong>
                    </div>
                  </div>
                </div>
              </div>

              <!-- IGST Split -->
              <div id="interTaxRow" class="d-none mb-2">
                <div class="p-2 rounded text-center" style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle);">
                  <small class="text-muted d-block">Integrated Tax IGST (<span id="resIgstPercent">18%</span>)</small>
                  <strong class="text-white" id="resIgst">₹9,000.00</strong>
                </div>
              </div>

              <!-- Total Final Invoice Price -->
              <div class="res-card-box" style="background: rgba(173, 255, 28, 0.1); border-color: var(--brand-lime);">
                <div>
                  <div class="text-muted small">Total Gross Payable</div>
                  <div class="fw-bold text-white fs-6">Final Invoice Amount</div>
                </div>
                <div class="res-val-highlight" id="resTotalPrice">₹59,000.00</div>
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
    let currentRate = 18;

    $('.btn-slab-toggle').on('click', function() {
      $('.btn-slab-toggle').removeClass('active');
      $(this).addClass('active');
      const rate = $(this).data('rate');

      if (rate === 'custom') {
        $('#customRateGroup').removeClass('d-none');
        currentRate = parseFloat($('#customRateInput').val()) || 0;
      } else {
        $('#customRateGroup').addClass('d-none');
        currentRate = parseFloat(rate);
      }
      calculateGst();
    });

    $('#customRateInput').on('input', function() {
      currentRate = parseFloat($(this).val()) || 0;
      calculateGst();
    });

    $('input[name="gstType"]').on('change', function() {
      const mode = $(this).val();
      $('#amountLabel').text(mode === 'exclusive' ? 'Base Amount (₹)' : 'Total Invoice Amount (₹)');
      calculateGst();
    });

    $('#baseAmount, #supplyType').on('input change', calculateGst);

    function formatINR(val) {
      return '₹' + Number(val).toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function calculateGst() {
      const amount = parseFloat($('#baseAmount').val()) || 0;
      const isInclusive = $('#typeIncl').is(':checked');
      const supply = $('#supplyType').val();

      let netPrice = 0;
      let gstAmount = 0;
      let totalPrice = 0;

      if (isInclusive) {
        netPrice = (amount * 100) / (100 + currentRate);
        gstAmount = amount - netPrice;
        totalPrice = amount;
      } else {
        netPrice = amount;
        gstAmount = (amount * currentRate) / 100;
        totalPrice = netPrice + gstAmount;
      }

      $('#resNetPrice').text(formatINR(netPrice));
      $('#resGstAmount').text(formatINR(gstAmount));
      $('#resGstPercent').text(currentRate + '%');
      $('#resTotalPrice').text(formatINR(totalPrice));

      if (supply === 'intra') {
        $('#intraTaxRow').removeClass('d-none');
        $('#interTaxRow').addClass('d-none');
        const half = gstAmount / 2;
        const halfPercent = (currentRate / 2) + '%';
        $('#resCgst').text(formatINR(half));
        $('#resSgst').text(formatINR(half));
        $('#resCgstPercent').text(halfPercent);
        $('#resSgstPercent').text(halfPercent);
      } else {
        $('#intraTaxRow').addClass('d-none');
        $('#interTaxRow').removeClass('d-none');
        $('#resIgst').text(formatINR(gstAmount));
        $('#resIgstPercent').text(currentRate + '%');
      }
    }

    function saveGstToHistory() {
      const amount = $('#baseAmount').val() || 0;
      const mode = $('input[name="gstType"]:checked').val();
      const total = $('#resTotalPrice').text();
      const tax = $('#resGstAmount').text();
      const supply = $('#supplyType').val();

      const title = `GST ${currentRate}% on ₹${Number(amount).toLocaleString('en-IN')} (${mode})`;
      const summary = `Tax: ${tax} | Total: ${total} | Supply: ${supply}`;
      const payload = {
        amount: amount,
        rate: currentRate,
        mode: mode,
        supply: supply
      };

      ToolsApp.saveHistory('gst-calculator', title, summary, payload);
    }

    function copyGstSummary() {
      const net = $('#resNetPrice').text();
      const gst = $('#resGstAmount').text();
      const total = $('#resTotalPrice').text();
      const rate = currentRate + '%';

      const summary = `GST Calculation Summary:\nNet Price: ${net}\nGST (${rate}): ${gst}\nTotal Amount: ${total}\nCalculated via NikhilWorks GST Studio`;
      if (navigator.clipboard) {
        navigator.clipboard.writeText(summary).then(() => ToolsApp.showToast('GST summary copied! 📋'));
      } else {
        ToolsApp.showToast('Summary: ' + total);
      }
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'gst-calculator' && payload) {
        if (payload.amount) $('#baseAmount').val(payload.amount);
        if (payload.mode === 'inclusive') {
          $('#typeIncl').prop('checked', true);
        } else {
          $('#typeExcl').prop('checked', true);
        }
        if (payload.supply) $('#supplyType').val(payload.supply);
        if (payload.rate) {
          const matchedBtn = $(`.btn-slab-toggle[data-rate="${payload.rate}"]`);
          if (matchedBtn.length) {
            matchedBtn.click();
          } else {
            $('.btn-slab-toggle[data-rate="custom"]').click();
            $('#customRateInput').val(payload.rate).trigger('input');
          }
        }
        calculateGst();
      }
    });

    $(document).ready(calculateGst);
  </script>
</body>
</html>
