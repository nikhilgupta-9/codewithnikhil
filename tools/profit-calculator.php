<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Profit Margin & Markup Calculator — Gross Margin Estimator | NikhilWorks";
$metaDesc = "Calculate Gross Profit Margin, Markup Percentage, and optimal Selling Price effortlessly. Multi-currency calculator for eCommerce founders, retail, and freelancers.";
$canonical = $site . "tools/profit-calculator/";
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
    "name": "Profit Margin and Markup Calculator",
    "applicationCategory": "FinancialApplication",
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
      { "@type": "ListItem", "position": 3, "name": "Profit Margin Calculator" }
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
        "name": "What is the difference between Margin and Markup?",
        "acceptedAnswer": { "@type": "Answer", "text": "Margin is profit expressed as a percentage of selling price, whereas Markup is profit expressed as a percentage of cost price." }
      },
      {
        "@type": "Question",
        "name": "How to calculate Gross Profit Margin?",
        "acceptedAnswer": { "@type": "Answer", "text": "Gross Margin (%) = [(Revenue - Cost) / Revenue] * 100." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #312e81 100%);
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
    .result-metric-card {
      background: #f8fafc;
      border-radius: 12px;
      padding: 18px;
      border: 1px solid #e2e8f0;
      margin-bottom: 12px;
    }
    .result-metric-title {
      font-size: 13px;
      color: #64748b;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .result-metric-value {
      font-size: 24px;
      font-weight: 800;
      color: #0f172a;
      margin-top: 4px;
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
        <span class="text-white fw-bold">Profit Margin Calculator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Profit Margin &amp; Markup Calculator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Calculate Gross Margin %, Markup %, Revenue and Profit effortlessly across multi-currencies.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Inputs Column -->
      <div class="col-lg-6">
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-calculator text-primary me-2"></i> Price Parameters</h5>
          
          <!-- Currency -->
          <div class="mb-3">
            <label class="form-label fw-bold">Select Currency</label>
            <select id="currSymbol" class="form-select">
              <option value="₹" selected>INR (₹) - Indian Rupee</option>
              <option value="$">USD ($) - US Dollar</option>
              <option value="€">EUR (€) - Euro</option>
              <option value="£">GBP (£) - British Pound</option>
              <option value="AED ">AED - UAE Dirham</option>
            </select>
          </div>

          <!-- Cost Price -->
          <div class="mb-3">
            <label class="form-label fw-bold">Cost Price (COGS) <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text curr-badge">₹</span>
              <input type="number" id="costPrice" class="form-control form-control-lg fw-bold" placeholder="1000" value="1000" min="0" step="0.01">
            </div>
            <small class="text-muted">Total cost to produce or purchase the product/service.</small>
          </div>

          <!-- Mode of calculation -->
          <div class="mb-3">
            <label class="form-label fw-bold">Calculate By</label>
            <select id="calcMode" class="form-select">
              <option value="revenue" selected>Selling Price (Revenue)</option>
              <option value="margin">Target Margin %</option>
              <option value="markup">Target Markup %</option>
            </select>
          </div>

          <!-- Dynamic Input field -->
          <div class="mb-3" id="fieldRevenue">
            <label class="form-label fw-bold">Selling Price (Revenue) <span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text curr-badge">₹</span>
              <input type="number" id="revenuePrice" class="form-control form-control-lg fw-bold" placeholder="1500" value="1500" min="0" step="0.01">
            </div>
          </div>

          <div class="mb-3 d-none" id="fieldMargin">
            <label class="form-label fw-bold">Target Margin (%) <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="number" id="targetMargin" class="form-control form-control-lg fw-bold" placeholder="33.33" value="33.33" min="0" max="99.9" step="0.1">
              <span class="input-group-text">%</span>
            </div>
          </div>

          <div class="mb-3 d-none" id="fieldMarkup">
            <label class="form-label fw-bold">Target Markup (%) <span class="text-danger">*</span></label>
            <div class="input-group">
              <input type="number" id="targetMarkup" class="form-control form-control-lg fw-bold" placeholder="50" value="50" min="0" step="0.1">
              <span class="input-group-text">%</span>
            </div>
          </div>

          <!-- Quantity Units -->
          <div class="mb-3">
            <label class="form-label fw-bold">Number of Units (Optional)</label>
            <input type="number" id="unitCount" class="form-control" placeholder="1" value="1" min="1" step="1">
          </div>
        </div>
      </div>

      <!-- Results Column -->
      <div class="col-lg-6">
        <div class="tool-card-box h-100 d-flex flex-column justify-content-between">
          <div>
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-chart-pie text-success me-2"></i> Margin Analysis</h5>
            
            <div class="row g-2 mb-2">
              <div class="col-6">
                <div class="result-metric-card" style="background: rgba(16, 64, 65, 0.04); border-color: rgba(16, 64, 65, 0.2);">
                  <div class="result-metric-title text-primary">Gross Margin</div>
                  <div class="result-metric-value text-primary" id="resMargin">33.33%</div>
                </div>
              </div>
              <div class="col-6">
                <div class="result-metric-card" style="background: rgba(2, 132, 199, 0.04); border-color: rgba(2, 132, 199, 0.2);">
                  <div class="result-metric-title text-info">Markup</div>
                  <div class="result-metric-value text-info" id="resMarkup">50.00%</div>
                </div>
              </div>
            </div>

            <div class="result-metric-card">
              <div class="result-metric-title">Profit Per Unit</div>
              <div class="result-metric-value text-success" id="resProfit">₹500.00</div>
            </div>

            <div class="result-metric-card">
              <div class="result-metric-title">Optimal Selling Price</div>
              <div class="result-metric-value text-dark" id="resSelling">₹1,500.00</div>
            </div>

            <div class="result-metric-card bg-dark text-white">
              <div class="result-metric-title text-white-50">Total Projected Revenue (<span id="resUnits">1</span> units)</div>
              <div class="result-metric-value text-success" id="resTotalRevenue">₹1,500.00</div>
              <small class="text-white-50">Total Net Profit: <strong class="text-white" id="resTotalProfit">₹500.00</strong></small>
            </div>
          </div>

          <div class="mt-3">
            <button type="button" class="btn btn-outline-dark w-100" onclick="copyProfitSummary()">
              <i class="fa-regular fa-copy me-1"></i> Copy Analysis Summary
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- 3. HOW TO USE & FORMULA -->
    <div class="content-section mt-5">
      <h2>Margin vs Markup: The Key Difference</h2>
      <p>
        Many business owners confuse <strong>Profit Margin</strong> with <strong>Markup</strong>. While both express profitability, they use different baselines:
      </p>
      <ul>
        <li><strong>Gross Profit Margin:</strong> The percentage of revenue that is actual profit after covering production costs. <br><code>Margin (%) = [(Selling Price - Cost Price) / Selling Price] &times; 100</code></li>
        <li><strong>Markup:</strong> The percentage added onto the cost price to determine the final selling price.<br><code>Markup (%) = [(Selling Price - Cost Price) / Cost Price] &times; 100</code></li>
      </ul>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>What is a healthy profit margin for eCommerce &amp; Services?</summary>
        <p>In general, a 20% margin is considered average, a 10% margin is low, and a 30% to 50%+ margin is considered high and healthy. High-end software, consulting, and SaaS models typically operate on 60-80% gross margins.</p>
      </details>
      <details class="faq-card">
        <summary>Can I calculate selling price based on my desired profit margin?</summary>
        <p>Yes! Switch the "Calculate By" dropdown to <strong>Target Margin %</strong>, enter your cost and desired percentage, and our calculator will instantly solve for the required selling price.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/gst-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-calculator text-warning me-1"></i> GST Calculator</a></h6>
            <small class="text-muted">Calculate GST Inclusive &amp; Exclusive tax.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/invoice/" class="text-decoration-none text-dark"><i class="fa-solid fa-file-invoice text-success me-1"></i> Free Invoice Generator</a></h6>
            <small class="text-muted">Generate PDF invoices with tax breakdown.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>website-cost-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-chart-line text-primary me-1"></i> Website Cost Estimator</a></h6>
            <small class="text-muted">Interactive web development pricing calculator.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Want to Build Custom Web Calculators or SaaS Apps?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks builds fast, interactive web applications and custom calculators that generate leads for your business.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Free Quote <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

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

    function copyProfitSummary() {
      const cur = $('#currSymbol').val();
      const margin = $('#resMargin').text();
      const markup = $('#resMarkup').text();
      const profit = $('#resProfit').text();
      const selling = $('#resSelling').text();

      const summary = `Profit Margin Analysis:\nSelling Price: ${selling}\nProfit Per Unit: ${profit}\nGross Margin: ${margin}\nMarkup: ${markup}\nCalculated via NikhilWorks Tools`;
      navigator.clipboard.writeText(summary);
      alert('Analysis summary copied to clipboard!');
    }

    $(document).ready(calculateProfit);
  </script>
</body>
</html>
