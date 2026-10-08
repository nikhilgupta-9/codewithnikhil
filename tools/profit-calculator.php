<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Profit Margin Calculator — Markup, Revenue & Selling Price | NikhilWorks";
$metaDesc = "Calculate gross profit margin, markup percentage, cost of goods and revenue online free. Perfect for ecommerce stores, agencies and retail businesses.";
$canonical = $site . "tools/profit-calculator/";
$metaKeywords = "profit margin calculator, markup calculator online free, gross margin calculator, selling price calculator, profit percentage calculator india, ecommerce pricing calculator";
$currentTool = 'profit-calculator';
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
    .result-metric-card {
      background: rgba(255, 255, 255, 0.04);
      border-radius: 12px;
      padding: 16px;
      border: 1px solid var(--border-subtle);
    }
    .metric-value {
      font-size: 24px;
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
            <div class="tool-header-icon icon-indigo">
              <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Profit Margin &amp; Markup Studio</h1>
              <p class="tool-header-desc">Calculate Gross Profit Margin, Markup Multiplier, Selling Price, and Projected Volume Revenue.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('profit-calculator')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Calculation History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Input Controls Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-sliders text-info me-2"></i> Pricing &amp; Cost Inputs</h6>

            <div class="row g-3">
              <!-- Currency -->
              <div class="col-md-5">
                <label class="form-label">Currency Symbol</label>
                <select id="currSymbol" class="form-select">
                  <option value="₹" selected>INR (₹)</option>
                  <option value="$">USD ($)</option>
                  <option value="€">EUR (€)</option>
                  <option value="£">GBP (£)</option>
                  <option value="AED ">AED (د.إ)</option>
                </select>
              </div>

              <!-- Calculation Mode -->
              <div class="col-md-7">
                <label class="form-label">Calculation Mode</label>
                <select id="calcMode" class="form-select">
                  <option value="revenue" selected>Cost + Selling Price &rarr; Margin</option>
                  <option value="margin">Cost + Target Margin % &rarr; Selling Price</option>
                  <option value="markup">Cost + Target Markup % &rarr; Selling Price</option>
                </select>
              </div>

              <!-- Cost Price -->
              <div class="col-12">
                <label class="form-label">Cost of Goods / Item (COGS) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text curr-badge fw-bold">₹</span>
                  <input type="number" id="costPrice" class="form-control fw-bold" placeholder="500" value="500" min="0" step="any">
                </div>
              </div>

              <!-- Mode Dependent Fields -->
              <div class="col-12" id="fieldRevenue">
                <label class="form-label">Selling Price (Revenue per unit) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text curr-badge fw-bold">₹</span>
                  <input type="number" id="revenuePrice" class="form-control fw-bold" placeholder="1000" value="1000" min="0" step="any">
                </div>
              </div>

              <div class="col-12 d-none" id="fieldMargin">
                <label class="form-label">Target Gross Margin %</label>
                <div class="input-group">
                  <input type="number" id="targetMargin" class="form-control fw-bold" placeholder="50" value="50" min="0" max="99.9" step="0.1">
                  <span class="input-group-text">%</span>
                </div>
              </div>

              <div class="col-12 d-none" id="fieldMarkup">
                <label class="form-label">Target Markup %</label>
                <div class="input-group">
                  <input type="number" id="targetMarkup" class="form-control fw-bold" placeholder="100" value="100" min="0" step="0.1">
                  <span class="input-group-text">%</span>
                </div>
              </div>

              <!-- Units for Volume Projection -->
              <div class="col-12">
                <label class="form-label">Sales Volume Projection (Units / Month)</label>
                <input type="number" id="unitCount" class="form-control" placeholder="100" value="100" min="1">
              </div>

              <div class="col-12 mt-4">
                <button type="button" class="topbar-btn topbar-btn-primary w-100 py-3 justify-content-center" onclick="saveProfitToHistory()">
                  <i class="fa-solid fa-floppy-disk me-1"></i> Save Analysis to History
                </button>
              </div>
            </div>
          </div>

          <!-- Output Column -->
          <div class="col-lg-6">
            <div class="tool-output-panel align-items-stretch text-start">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-white fw-bold mb-0"><i class="fa-solid fa-chart-pie text-success me-2"></i> Profit &amp; Margin Breakdown</h6>
                <button type="button" class="btn btn-sm btn-outline-secondary text-white border-0" onclick="copyProfitSummary()">
                  <i class="fa-regular fa-copy me-1"></i> Copy
                </button>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-6">
                  <div class="result-metric-card">
                    <small class="text-muted d-block">Gross Margin</small>
                    <div class="metric-value" id="resMargin">50.00%</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="result-metric-card">
                    <small class="text-muted d-block">Markup Percentage</small>
                    <div class="metric-value text-info" id="resMarkup">100.00%</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="result-metric-card">
                    <small class="text-muted d-block">Profit per Unit</small>
                    <div class="metric-value text-warning" id="resProfit">₹500.00</div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="result-metric-card">
                    <small class="text-muted d-block">Selling Price / Unit</small>
                    <div class="metric-value text-white" id="resSelling">₹1,000.00</div>
                  </div>
                </div>
              </div>

              <!-- Volume Projections -->
              <div class="p-3 rounded mb-2" style="background: rgba(173, 255, 28, 0.08); border: 1px solid rgba(173, 255, 28, 0.3);">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <span class="text-white fw-bold small">Projected Monthly Revenue (<span id="resUnits">100</span> units)</span>
                  <strong class="text-white fs-6" id="resTotalRevenue">₹100,000.00</strong>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="text-muted small">Projected Net Profit</span>
                  <strong class="text-success fs-6" id="resTotalProfit">₹50,000.00</strong>
                </div>
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
    $('#currSymbol').on('change', function() {
      const cur = $(this).val();
      $('.curr-badge').text(cur);
      calculateProfit();
    });

    $('#calcMode').on('change', function() {
      const mode = $(this).val();
      $('#fieldRevenue, #fieldMargin, #fieldMarkup').addClass('d-none');
      if (mode === 'revenue') $('#fieldRevenue').removeClass('d-none');
      if (mode === 'margin') $('#fieldMargin').removeClass('d-none');
      if (mode === 'markup') $('#fieldMarkup').removeClass('d-none');
      calculateProfit();
    });

    $('#costPrice, #revenuePrice, #targetMargin, #targetMarkup, #unitCount').on('input', calculateProfit);

    function formatCurrency(val) {
      const cur = $('#currSymbol').val();
      return cur + Number(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function calculateProfit() {
      const cost = parseFloat($('#costPrice').val()) || 0;
      const mode = $('#calcMode').val();
      const units = parseInt($('#unitCount').val(), 10) || 1;

      let revenue = 0;
      let margin = 0;
      let markup = 0;
      let profit = 0;

      if (mode === 'revenue') {
        revenue = parseFloat($('#revenuePrice').val()) || 0;
        profit = revenue - cost;
        margin = revenue > 0 ? (profit / revenue) * 100 : 0;
        markup = cost > 0 ? (profit / cost) * 100 : 0;
      } else if (mode === 'margin') {
        const targetM = parseFloat($('#targetMargin').val()) || 0;
        if (targetM >= 100) return;
        revenue = cost / (1 - (targetM / 100));
        profit = revenue - cost;
        margin = targetM;
        markup = cost > 0 ? (profit / cost) * 100 : 0;
      } else if (mode === 'markup') {
        const targetMark = parseFloat($('#targetMarkup').val()) || 0;
        revenue = cost * (1 + (targetMark / 100));
        profit = revenue - cost;
        markup = targetMark;
        margin = revenue > 0 ? (profit / revenue) * 100 : 0;
      }

      $('#resMargin').text(margin.toFixed(2) + '%');
      $('#resMarkup').text(markup.toFixed(2) + '%');
      $('#resProfit').text(formatCurrency(profit));
      $('#resSelling').text(formatCurrency(revenue));
      $('#resUnits').text(units);
      $('#resTotalRevenue').text(formatCurrency(revenue * units));
      $('#resTotalProfit').text(formatCurrency(profit * units));
    }

    function saveProfitToHistory() {
      const cost = $('#costPrice').val() || 0;
      const margin = $('#resMargin').text();
      const markup = $('#resMarkup').text();
      const selling = $('#resSelling').text();
      const profit = $('#resProfit').text();
      const mode = $('#calcMode').val();
      const cur = $('#currSymbol').val();

      const title = `Margin ${margin} on ${cur}${cost} (Selling: ${selling})`;
      const summary = `Profit: ${profit}/unit | Markup: ${markup} | Mode: ${mode}`;
      const payload = {
        cur: cur,
        mode: mode,
        cost: cost,
        revenue: $('#revenuePrice').val(),
        targetMargin: $('#targetMargin').val(),
        targetMarkup: $('#targetMarkup').val(),
        units: $('#unitCount').val()
      };

      ToolsApp.saveHistory('profit-calculator', title, summary, payload);
    }

    function copyProfitSummary() {
      const margin = $('#resMargin').text();
      const markup = $('#resMarkup').text();
      const profit = $('#resProfit').text();
      const selling = $('#resSelling').text();

      const summary = `Profit Margin Analysis:\nSelling Price: ${selling}\nProfit Per Unit: ${profit}\nGross Margin: ${margin}\nMarkup: ${markup}\nCalculated via NikhilWorks Tools`;
      if (navigator.clipboard) {
        navigator.clipboard.writeText(summary).then(() => ToolsApp.showToast('Analysis summary copied! 📋'));
      } else {
        ToolsApp.showToast('Margin: ' + margin);
      }
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'profit-calculator' && payload) {
        if (payload.cur) $('#currSymbol').val(payload.cur).trigger('change');
        if (payload.mode) $('#calcMode').val(payload.mode).trigger('change');
        if (payload.cost) $('#costPrice').val(payload.cost);
        if (payload.revenue) $('#revenuePrice').val(payload.revenue);
        if (payload.targetMargin) $('#targetMargin').val(payload.targetMargin);
        if (payload.targetMarkup) $('#targetMarkup').val(payload.targetMarkup);
        if (payload.units) $('#unitCount').val(payload.units);
        calculateProfit();
      }
    });

    $(document).ready(calculateProfit);
  </script>
</body>
</html>
