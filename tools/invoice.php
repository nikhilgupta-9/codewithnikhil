<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Invoice Generator — PDF Billing & Receipt Maker | NikhilWorks";
$metaDesc = "Create professional client invoices online for free. Custom logo, line items, GST & tax calculations, currency selector, and 1-click Print to PDF.";
$canonical = $site . "tools/invoice/";
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
    "name": "Free Online Invoice Generator",
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
      { "@type": "ListItem", "position": 3, "name": "Invoice Generator" }
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
        "name": "Can I download the invoice as a PDF?",
        "acceptedAnswer": { "@type": "Answer", "text": "Yes! Click the 'Print / Save as PDF' button to instantly generate a clean, water-mark free PDF document." }
      },
      {
        "@type": "Question",
        "name": "Is my client billing data saved on your server?",
        "acceptedAnswer": { "@type": "Answer", "text": "No. The invoice maker runs 100% locally in your browser. None of your client data or pricing is uploaded to our servers." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #115e59 100%);
      padding: 55px 0 45px;
      color: #fff;
    }
    
    /* Printable Invoice Sheet Styling */
    .invoice-sheet {
      background: #ffffff;
      border: 1px solid #cbd5e1;
      border-radius: 12px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
      max-width: 900px;
      margin: 0 auto;
    }
    .editable-input {
      border: 1px dashed transparent;
      padding: 4px 8px;
      border-radius: 6px;
      transition: all 0.2s;
    }
    .editable-input:hover, .editable-input:focus {
      border-color: #94a3b8;
      background: #f8fafc;
      outline: none;
    }
    .invoice-header-title {
      font-size: 32px;
      font-weight: 900;
      color: var(--brand-teal);
      letter-spacing: -0.5px;
    }

    @media print {
      body * { visibility: hidden; }
      #printableInvoice, #printableInvoice * { visibility: visible; }
      #printableInvoice { position: absolute; left: 0; top: 0; width: 100%; border: none; box-shadow: none; padding: 0; }
      .no-print { display: none !important; }
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
  <div class="tool-hero text-center no-print">
    <div class="container">
      <nav class="small mb-3" aria-label="breadcrumb">
        <a href="<?= $site ?>" class="text-white-50 text-decoration-none">Home</a> &rsaquo;
        <a href="<?= $site ?>free-tools/" class="text-white-50 text-decoration-none">Free Tools</a> &rsaquo;
        <span class="text-white fw-bold">Invoice Generator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Client Invoice Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Generate professional, GST-compliant PDF client invoices with custom logo and item line calculations.
      </p>
    </div>
  </div>

  <div class="container my-5">
    
    <!-- Action Controls Bar -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2 no-print" style="max-width: 900px; margin: 0 auto;">
      <div class="d-flex align-items-center gap-2">
        <label class="fw-bold text-dark small mb-0">Currency:</label>
        <select id="invCurrency" class="form-select form-select-sm" style="width: 120px;" onchange="recalculateInvoice()">
          <option value="₹" selected>INR (₹)</option>
          <option value="$">USD ($)</option>
          <option value="€">EUR (€)</option>
          <option value="£">GBP (£)</option>
          <option value="AED ">AED</option>
        </select>
      </div>

      <div class="d-flex gap-2">
        <button type="button" class="btn btn-primary fw-bold" onclick="window.print()">
          <i class="fa-solid fa-print me-1"></i> Print / Save as PDF
        </button>
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="resetInvoice()">
          <i class="fa-solid fa-rotate-left me-1"></i> Reset
        </button>
      </div>
    </div>

    <!-- PRINTABLE INVOICE SHEET -->
    <div class="invoice-sheet" id="printableInvoice">
      
      <!-- Top Row: Business Info & Title -->
      <div class="row align-items-start mb-4">
        <div class="col-md-7">
          <input type="text" class="form-control form-control-lg fw-bold editable-input fs-4 text-dark" value="NikhilWorks" placeholder="Your Business / Agency Name">
          <textarea class="form-control editable-input small text-muted mt-1" rows="3" placeholder="Your Address, City, GSTIN, Email, Phone">Karampura, New Delhi, India 110015&#10;Email: contact@nikhilworks.com&#10;Phone: +91 8368552640</textarea>
        </div>
        <div class="col-md-5 text-md-end mt-3 mt-md-0">
          <div class="invoice-header-title">INVOICE</div>
          <div class="d-flex align-items-center justify-content-md-end gap-2 mt-2">
            <span class="small fw-bold text-muted">Invoice #:</span>
            <input type="text" class="form-control form-control-sm editable-input fw-bold text-end" style="width: 140px;" value="INV-2026-001">
          </div>
          <div class="d-flex align-items-center justify-content-md-end gap-2 mt-1">
            <span class="small fw-bold text-muted">Date:</span>
            <input type="date" class="form-control form-control-sm editable-input text-end" style="width: 140px;" value="<?= date('Y-m-d') ?>">
          </div>
        </div>
      </div>

      <!-- Bill To & Due Date -->
      <div class="row g-3 py-3 border-top border-bottom mb-4">
        <div class="col-md-6">
          <small class="text-uppercase fw-bold text-muted d-block mb-1">Billed To:</small>
          <input type="text" class="form-control editable-input fw-bold text-dark" value="Acme Corporation" placeholder="Client Name / Business Name">
          <textarea class="form-control editable-input small text-muted mt-1" rows="2" placeholder="Client Address, Email, GSTIN">123 Business Boulevard, Tech City&#10;Email: billing@client.com</textarea>
        </div>
        <div class="col-md-6 text-md-end">
          <small class="text-uppercase fw-bold text-muted d-block mb-1">Payment Status:</small>
          <input type="text" class="form-control editable-input fw-bold text-md-end text-success" value="Due Upon Receipt" placeholder="e.g. Paid / Net 15 Days">
        </div>
      </div>

      <!-- Line Items Table -->
      <div class="table-responsive mb-3">
        <table class="table table-bordered align-middle" id="itemsTable">
          <thead class="table-light">
            <tr>
              <th style="min-width: 250px;">Item Description</th>
              <th style="width: 100px;">Qty</th>
              <th style="width: 140px;">Unit Price (<span class="cur-symbol">₹</span>)</th>
              <th style="width: 140px;" class="text-end">Total (<span class="cur-symbol">₹</span>)</th>
              <th style="width: 40px;" class="no-print"></th>
            </tr>
          </thead>
          <tbody>
            <tr class="item-row">
              <td><input type="text" class="form-control editable-input fw-semibold" value="Custom Website Design &amp; Development"></td>
              <td><input type="number" class="form-control editable-input item-qty" value="1" min="1" oninput="recalculateInvoice()"></td>
              <td><input type="number" class="form-control editable-input item-price" value="15000" min="0" step="0.01" oninput="recalculateInvoice()"></td>
              <td class="text-end fw-bold item-total">₹15,000.00</td>
              <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
            <tr class="item-row">
              <td><input type="text" class="form-control editable-input fw-semibold" value="Technical SEO Setup &amp; Speed Optimization"></td>
              <td><input type="number" class="form-control editable-input item-qty" value="1" min="1" oninput="recalculateInvoice()"></td>
              <td><input type="number" class="form-control editable-input item-price" value="5000" min="0" step="0.01" oninput="recalculateInvoice()"></td>
              <td class="text-end fw-bold item-total">₹5,000.00</td>
              <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mb-4 no-print">
        <button type="button" class="btn btn-outline-primary btn-sm fw-bold" onclick="addItemRow()">
          <i class="fa-solid fa-plus me-1"></i> Add Line Item
        </button>
      </div>

      <!-- Totals & Tax Row -->
      <div class="row justify-content-end">
        <div class="col-md-6">
          <div class="d-flex justify-content-between py-1">
            <span class="text-muted fw-bold">Subtotal:</span>
            <strong id="subTotalDisplay">₹20,000.00</strong>
          </div>
          <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted fw-bold">GST / Tax (%):</span>
              <input type="number" id="taxPercent" class="form-control form-control-sm editable-input" style="width: 70px;" value="18" min="0" max="100" oninput="recalculateInvoice()">
            </div>
            <strong id="taxAmountDisplay">₹3,600.00</strong>
          </div>
          <div class="d-flex justify-content-between align-items-center py-1">
            <div class="d-flex align-items-center gap-1">
              <span class="text-muted fw-bold">Discount (<span class="cur-symbol">₹</span>):</span>
              <input type="number" id="discountAmount" class="form-control form-control-sm editable-input" style="width: 90px;" value="0" min="0" oninput="recalculateInvoice()">
            </div>
            <strong class="text-danger" id="discountDisplay">-₹0.00</strong>
          </div>
          <div class="d-flex justify-content-between py-2 border-top border-2 border-dark mt-2">
            <span class="fs-5 fw-extrabold text-dark">Total Due:</span>
            <strong class="fs-5 fw-extrabold text-primary" id="grandTotalDisplay">₹23,600.00</strong>
          </div>
        </div>
      </div>

      <!-- Payment Notes -->
      <div class="mt-4 pt-3 border-top">
        <small class="text-uppercase fw-bold text-muted d-block mb-1">Payment Instructions &amp; Bank Details:</small>
        <textarea class="form-control editable-input small text-muted" rows="2" placeholder="UPI ID: nikhil@upi | Bank Name: HDFC Bank | A/C: 123456789 | IFSC: HDFC0001234">UPI ID: nikhil@upi | Bank Transfer / IMPS accepted. Thank you for your business!</textarea>
      </div>

    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5 no-print" style="max-width: 900px; margin: 0 auto;">
      <h2>How to Generate Invoices for Free</h2>
      <ol>
        <li><strong>Edit Business &amp; Client Info:</strong> Click any field in the invoice sheet above and type your details directly.</li>
        <li><strong>Add Items &amp; Tax:</strong> Add your service deliverables, unit costs, and GST percentage.</li>
        <li><strong>Save / Print PDF:</strong> Click <em>"Print / Save as PDF"</em> to generate an official PDF receipt for your client.</li>
      </ol>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Does this invoice generator store any confidential data?</summary>
        <p>No. All data is processed entirely on your device browser. Nothing is sent or saved on our servers.</p>
      </details>
      <details class="faq-card">
        <summary>Can I use this invoice for Indian GST compliance?</summary>
        <p>Yes. You can add your 15-digit GSTIN number, Client GSTIN, SAC/HSN codes in item descriptions, and specify the 18% GST tax rate.</p>
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
            <h6 class="fw-bold"><a href="<?= $site ?>tools/profit-calculator/" class="text-decoration-none text-dark"><i class="fa-solid fa-chart-line text-primary me-1"></i> Profit Calculator</a></h6>
            <small class="text-muted">Calculate markup &amp; margin percentages.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/whatsapp-link/" class="text-decoration-none text-dark"><i class="fa-brands fa-whatsapp text-success me-1"></i> WhatsApp Link Generator</a></h6>
            <small class="text-muted">Generate wa.me links for instant client communication.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1 no-print" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Custom Invoicing &amp; CRM Billing Software?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks develops custom SaaS portals, automated PDF invoice engines, and payment gateway webhooks.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Custom Software Quote <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function getCur() {
      return $('#invCurrency').val();
    }

    function formatMoney(val) {
      const cur = getCur();
      return cur + Number(val).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }

    function recalculateInvoice() {
      const cur = getCur();
      $('.cur-symbol').text(cur);

      let subtotal = 0;
      $('.item-row').each(function() {
        const qty = parseFloat($(this).find('.item-qty').val()) || 0;
        const price = parseFloat($(this).find('.item-price').val()) || 0;
        const rowTotal = qty * price;
        subtotal += rowTotal;
        $(this).find('.item-total').text(formatMoney(rowTotal));
      });

      const taxP = parseFloat($('#taxPercent').val()) || 0;
      const taxAmt = (subtotal * taxP) / 100;
      const discount = parseFloat($('#discountAmount').val()) || 0;
      const grandTotal = Math.max(0, (subtotal + taxAmt) - discount);

      $('#subTotalDisplay').text(formatMoney(subtotal));
      $('#taxAmountDisplay').text(formatMoney(taxAmt));
      $('#discountDisplay').text('-' + formatMoney(discount));
      $('#grandTotalDisplay').text(formatMoney(grandTotal));
    }

    function addItemRow() {
      const newRow = `
        <tr class="item-row">
          <td><input type="text" class="form-control editable-input fw-semibold" placeholder="New Item / Service Description"></td>
          <td><input type="number" class="form-control editable-input item-qty" value="1" min="1" oninput="recalculateInvoice()"></td>
          <td><input type="number" class="form-control editable-input item-price" value="1000" min="0" step="0.01" oninput="recalculateInvoice()"></td>
          <td class="text-end fw-bold item-total">${formatMoney(1000)}</td>
          <td class="text-center no-print"><button type="button" class="btn btn-sm btn-link text-danger p-0" onclick="removeItemRow(this)"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
      `;
      $('#itemsTable tbody').append(newRow);
      recalculateInvoice();
    }

    function removeItemRow(btn) {
      if ($('.item-row').length > 1) {
        $(btn).closest('.item-row').remove();
        recalculateInvoice();
      } else {
        alert('Invoice must contain at least one line item.');
      }
    }

    function resetInvoice() {
      if (confirm('Reset invoice fields to default?')) {
        location.reload();
      }
    }

    $(document).ready(recalculateInvoice);
  </script>
</body>
</html>
