<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free GST Calculator India — Inclusive & Exclusive Tax Calculator | NikhilWorks";
$metaDesc = "Calculate GST online instantly for India. Supports 5%, 12%, 18%, 28% slabs with CGST, SGST & IGST breakdown for both GST Inclusive and Exclusive amounts.";
$canonical = $site . "tools/gst-calculator/";
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
    "name": "Indian GST Calculator Online",
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
      { "@type": "ListItem", "position": 3, "name": "GST Calculator" }
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
        "name": "How to calculate GST Exclusive amount?",
        "acceptedAnswer": { "@type": "Answer", "text": "GST Amount = (Original Cost * GST Rate) / 100. Total Price = Original Cost + GST Amount." }
      },
      {
        "@type": "Question",
        "name": "How to calculate GST Inclusive (Reverse GST) amount?",
        "acceptedAnswer": { "@type": "Answer", "text": "GST Amount = Original Price - [Original Price * {100 / (100 + GST Rate)}]." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #1e3a8a 100%);
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
    .btn-slab-toggle {
      border: 1px solid #cbd5e1;
      background: #f8fafc;
      color: #334155;
      font-weight: 700;
      padding: 10px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s;
      flex: 1;
      text-align: center;
    }
    .btn-slab-toggle.active, .btn-slab-toggle:hover {
      background: var(--brand-teal);
      color: #fff;
      border-color: var(--brand-teal);
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
        <span class="text-white fw-bold">GST Calculator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Indian GST Calculator (Inclusive &amp; Exclusive)</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Instant Goods &amp; Services Tax calculation with automatic CGST, SGST &amp; IGST breakdown.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Calculator Inputs Column -->
      <div class="col-lg-6">
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-calculator text-primary me-2"></i> Tax Input Parameters</h5>
          
          <!-- Type Toggle -->
          <div class="mb-4">
            <label class="form-label fw-bold">Calculation Mode</label>
            <div class="btn-group w-100" role="group">
              <input type="radio" class="btn-check" name="gstType" id="typeExcl" value="exclusive" checked>
              <label class="btn btn-outline-primary py-2 fw-bold" for="typeExcl">GST Exclusive (Add GST)</label>

              <input type="radio" class="btn-check" name="gstType" id="typeIncl" value="inclusive">
              <label class="btn btn-outline-primary py-2 fw-bold" for="typeIncl">GST Inclusive (Remove GST)</label>
            </div>
          </div>

          <!-- Amount Input -->
          <div class="mb-4">
            <label class="form-label fw-bold" id="amountLabel">Base Amount (₹)</label>
            <div class="input-group">
              <span class="input-group-text bg-light fw-bold">₹</span>
              <input type="number" id="baseAmount" class="form-control form-control-lg fw-bold" placeholder="e.g. 10000" value="10000" min="0" step="0.01">
            </div>
          </div>

          <!-- GST Rate Slabs -->
          <div class="mb-4">
            <label class="form-label fw-bold">Select GST Rate Slab (%)</label>
            <div class="d-flex gap-2 flex-wrap mb-2">
              <div class="btn-slab-toggle" data-rate="5">5%</div>
              <div class="btn-slab-toggle" data-rate="12">12%</div>
              <div class="btn-slab-toggle active" data-rate="18">18% (IT/Web)</div>
              <div class="btn-slab-toggle" data-rate="28">28%</div>
              <div class="btn-slab-toggle" data-rate="custom">Custom</div>
            </div>
            <div class="input-group d-none" id="customRateGroup">
              <input type="number" id="customRateInput" class="form-control" placeholder="Enter custom GST %" min="0" max="100" step="0.1">
              <span class="input-group-text">%</span>
            </div>
          </div>

          <!-- Intra vs Inter-State Supply -->
          <div class="mb-3">
            <label class="form-label fw-bold">Transaction Type</label>
            <select id="supplyType" class="form-select">
              <option value="intra" selected>Intra-State Supply (CGST + SGST)</option>
              <option value="inter">Inter-State Supply (IGST)</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Results Column -->
      <div class="col-lg-6">
        <div class="tool-card-box h-100 d-flex flex-column justify-content-between">
          <div>
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-receipt text-success me-2"></i> Calculation Breakdown</h5>
            
            <div class="result-metric-card">
              <div class="result-metric-title">Actual Net Price (Pre-Tax)</div>
              <div class="result-metric-value text-secondary" id="resNetPrice">₹10,000.00</div>
            </div>

            <div class="result-metric-card" style="background: rgba(16, 64, 65, 0.04); border-color: rgba(16, 64, 65, 0.2);">
              <div class="result-metric-title text-primary">Total GST Amount (<span id="resGstPercent">18%</span>)</div>
              <div class="result-metric-value text-primary" id="resGstAmount">₹1,800.00</div>
            </div>

            <!-- Tax Components (CGST/SGST vs IGST) -->
            <div class="row g-2 mb-3" id="intraTaxRow">
              <div class="col-6">
                <div class="p-3 bg-light rounded-3 border">
                  <small class="text-muted fw-bold d-block">CGST (<span id="resCgstPercent">9%</span>)</small>
                  <strong class="text-dark fs-6" id="resCgst">₹900.00</strong>
                </div>
              </div>
              <div class="col-6">
                <div class="p-3 bg-light rounded-3 border">
                  <small class="text-muted fw-bold d-block">SGST (<span id="resSgstPercent">9%</span>)</small>
                  <strong class="text-dark fs-6" id="resSgst">₹900.00</strong>
                </div>
              </div>
            </div>

            <div class="p-3 bg-light rounded-3 border mb-3 d-none" id="interTaxRow">
              <small class="text-muted fw-bold d-block">Integrated Tax (IGST <span id="resIgstPercent">18%</span>)</small>
              <strong class="text-dark fs-6" id="resIgst">₹1,800.00</strong>
            </div>

            <div class="result-metric-card bg-dark text-white">
              <div class="result-metric-title text-white-50">Final Gross Total (Post-Tax)</div>
              <div class="result-metric-value text-success" id="resTotalPrice">₹11,800.00</div>
            </div>
          </div>

          <div class="mt-3">
            <button type="button" class="btn btn-outline-dark w-100" onclick="copyGstSummary()">
              <i class="fa-regular fa-copy me-1"></i> Copy Breakdown Summary
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- HOW TO USE & FORMULA SECTION -->
    <div class="content-section mt-5">
      <h2>How GST Calculation Works in India</h2>
      <p>
        The Goods and Services Tax (GST) is a destination-based unified tax levied on the manufacturing, sale, and consumption of goods and services throughout India.
      </p>

      <div class="row g-3">
        <div class="col-md-6">
          <div class="p-4 bg-light rounded-3 border">
            <h5 class="fw-bold text-dark">GST Exclusive Formula:</h5>
            <code>GST Amount = (Amount &times; GST%) / 100</code><br>
            <code>Total = Amount + GST Amount</code>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-4 bg-light rounded-3 border">
            <h5 class="fw-bold text-dark">GST Inclusive (Reverse GST) Formula:</h5>
            <code>Net Price = (Total Amount &times; 100) / (100 + GST%)</code><br>
            <code>GST Amount = Total Amount - Net Price</code>
          </div>
        </div>
      </div>

      <h2>Standard Indian GST Tax Slabs (2026)</h2>
      <ul>
        <li><strong>5% Slab:</strong> Essential household items, packaged spices, economy flight tickets.</li>
        <li><strong>12% Slab:</strong> Business class air tickets, work contracts, computers &amp; hardware.</li>
        <li><strong>18% Slab:</strong> IT services, website development, software engineering, SaaS, telecom, banking, and professional consulting.</li>
        <li><strong>28% Slab:</strong> Luxury cars, aerated drinks, high-end consumer electronics.</li>
      </ul>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>What is the difference between CGST, SGST, and IGST?</summary>
        <p><strong>CGST &amp; SGST:</strong> Levied on intra-state supplies (when seller and buyer are within the same Indian state). The tax rate is split 50-50 between Central and State governments.<br><strong>IGST:</strong> Levied on inter-state transactions (seller in one state, buyer in another) and collected entirely by the Central Government.</p>
      </details>
      <details class="faq-card">
        <summary>What GST rate applies to Website Design and Software Development?</summary>
        <p>In India, website design, software engineering, cloud hosting, and IT consulting services fall under the <strong>18% GST slab</strong> (SAC Code: 998314).</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/invoice/" class="text-decoration-none text-dark"><i class="fa-solid fa-file-invoice-dollar text-success me-1"></i> Free Invoice Generator</a></h6>
            <small class="text-muted">Create GST-compliant PDF client invoices.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/profit-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-chart-line text-primary me-1"></i> Profit Margin Calculator</a></h6>
            <small class="text-muted">Calculate markup &amp; profit margins easily.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>website-cost-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-calculator text-warning me-1"></i> Website Cost Calculator</a></h6>
            <small class="text-muted">Estimate website development cost in 60s.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Custom Web Development &amp; E-commerce GST Billing Integration?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks builds full-stack e-commerce stores, custom invoice generators, and GST automated payment gateway checkouts.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Free Consultation <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

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
        // Reverse GST
        netPrice = (amount * 100) / (100 + currentRate);
        gstAmount = amount - netPrice;
        totalPrice = amount;
      } else {
        // Standard Exclusive GST
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

    function copyGstSummary() {
      const net = $('#resNetPrice').text();
      const gst = $('#resGstAmount').text();
      const total = $('#resTotalPrice').text();
      const rate = currentRate + '%';

      const summary = `GST Calculation Summary:\nNet Price: ${net}\nGST (${rate}): ${gst}\nTotal Amount: ${total}\nCalculated via NikhilWorks GST Calculator`;
      navigator.clipboard.writeText(summary);
      alert('GST summary copied to clipboard!');
    }

    $(document).ready(calculateGst);
  </script>
</body>
</html>
