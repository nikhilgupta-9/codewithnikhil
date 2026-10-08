<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Schema JSON-LD Generator — Structured Data Markup Studio | NikhilWorks";
$metaDesc = "Generate valid Schema.org JSON-LD structured data for LocalBusiness, FAQ, Person, Article & Product. Earn Google rich snippets & star ratings. 100% free.";
$canonical = $site . "tools/schema-generator/";
$metaKeywords = "schema generator json ld, structured data generator free, localbusiness schema generator, faq schema maker, google rich snippets generator india";
$currentTool = 'schema-generator';
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
    .schema-code-box {
      background: #040c0d;
      border: 1px solid var(--border-subtle);
      border-radius: 12px;
      font-family: var(--code-font);
      font-size: 13px;
      color: #38bdf8;
      padding: 16px;
      resize: vertical;
      min-height: 300px;
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
            <div class="tool-header-icon icon-cyan">
              <i class="fa-solid fa-code"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Schema JSON-LD Generator</h1>
              <p class="tool-header-desc">Generate valid Schema.org structured data for LocalBusiness, FAQ, Person, Article &amp; Product to earn Google Rich Snippets.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('schema-generator')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Schema History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Inputs Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-sliders text-cyan me-2"></i> Structured Data Parameters</h6>

            <div class="mb-3">
              <label class="form-label">Schema Type</label>
              <select id="schemaType" class="form-select">
                <option value="LocalBusiness" selected>LocalBusiness (Store, Clinic, Agency)</option>
                <option value="Organization">Organization (Company, Enterprise)</option>
                <option value="Person">Person (Developer, Founder, Creator)</option>
                <option value="Article">Article / Blog Post</option>
                <option value="FAQPage">FAQPage (Accordion Q&amp;A)</option>
                <option value="Product">Product / E-Commerce Offer</option>
              </select>
            </div>

            <!-- Dynamic Schema Fields -->
            <div id="sec-business">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Business Name</label>
                  <input type="text" id="bName" class="form-control" placeholder="NikhilWorks" value="NikhilWorks">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Website URL</label>
                  <input type="url" id="bUrl" class="form-control" placeholder="https://nikhilworks.com" value="https://nikhilworks.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Logo URL</label>
                  <input type="url" id="bLogo" class="form-control" placeholder="https://nikhilworks.com/logo.png" value="https://nikhilworks.com/assets/img/logo/fav-logo5.png">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Telephone</label>
                  <input type="tel" id="bPhone" class="form-control" placeholder="+918368552640" value="+918368552640">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Price Range</label>
                  <input type="text" id="bPrice" class="form-control" placeholder="₹₹" value="₹₹">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Street Address / City</label>
                  <input type="text" id="bStreet" class="form-control" placeholder="Delhi NCR, India" value="Delhi NCR, India">
                </div>
              </div>
            </div>

            <div id="sec-person" class="d-none">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Full Name</label>
                  <input type="text" id="pName" class="form-control" placeholder="Nikhil Gupta" value="Nikhil Gupta">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Job Title / Role</label>
                  <input type="text" id="pJob" class="form-control" placeholder="Full-Stack Web Developer" value="Full-Stack Web Developer">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Portfolio URL</label>
                  <input type="url" id="pUrl" class="form-control" placeholder="https://nikhilworks.com" value="https://nikhilworks.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Social Profile (LinkedIn/GitHub)</label>
                  <input type="url" id="pSocial" class="form-control" placeholder="https://linkedin.com/in/..." value="https://linkedin.com/in/">
                </div>
              </div>
            </div>

            <div id="sec-article" class="d-none">
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Article Headline</label>
                  <input type="text" id="artHeadline" class="form-control" placeholder="10 Web Design Trends for 2026">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Featured Image URL</label>
                  <input type="url" id="artImage" class="form-control" placeholder="https://example.com/banner.jpg">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Author Name</label>
                  <input type="text" id="artAuthor" class="form-control" placeholder="Nikhil Gupta" value="Nikhil Gupta">
                </div>
                <div class="col-md-12">
                  <label class="form-label">Publisher Name</label>
                  <input type="text" id="artPub" class="form-control" placeholder="NikhilWorks" value="NikhilWorks">
                </div>
              </div>
            </div>

            <div id="sec-faq" class="d-none">
              <div class="mb-2">
                <label class="form-label">FAQ Question 1</label>
                <input type="text" id="faqQ1" class="form-control" placeholder="How much does a website cost?" value="How much does custom website development cost?">
              </div>
              <div class="mb-3">
                <label class="form-label">FAQ Answer 1</label>
                <textarea id="faqA1" class="form-control" rows="2" placeholder="Website costs vary based on scope...">Pricing starts from ₹15,000 depending on features, design complexity, and integrations.</textarea>
              </div>
              <div class="mb-2">
                <label class="form-label">FAQ Question 2</label>
                <input type="text" id="faqQ2" class="form-control" placeholder="Do you provide SEO optimization?" value="Do you provide on-page and technical SEO?">
              </div>
              <div class="mb-3">
                <label class="form-label">FAQ Answer 2</label>
                <textarea id="faqA2" class="form-control" rows="2" placeholder="Yes, all sites include schema...">Yes, all custom websites engineered by NikhilWorks include structured schema, Core Web Vitals optimization, and meta tags.</textarea>
              </div>
            </div>

            <div id="sec-product" class="d-none">
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Product Name</label>
                  <input type="text" id="prodName" class="form-control" placeholder="E-commerce Web Package">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Image URL</label>
                  <input type="url" id="prodImg" class="form-control" placeholder="https://example.com/item.jpg">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Price</label>
                  <input type="number" id="prodPrice" class="form-control" placeholder="25000" value="25000">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Currency</label>
                  <input type="text" id="prodCur" class="form-control" placeholder="INR" value="INR">
                </div>
              </div>
            </div>

            <div class="mt-4">
              <button type="button" class="topbar-btn topbar-btn-primary w-100 py-3 justify-content-center" onclick="saveSchemaToHistory()">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Schema to History
              </button>
            </div>
          </div>

          <!-- Output Code Column -->
          <div class="col-lg-6">
            <div class="tool-output-panel align-items-stretch text-start">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="text-white fw-bold mb-0"><i class="fa-solid fa-code text-cyan me-2"></i> Valid JSON-LD Output</h6>
                <button type="button" class="topbar-btn topbar-btn-primary" onclick="copySchemaJson()" id="btnCopySchema">
                  <i class="fa-regular fa-copy me-1"></i> Copy Code
                </button>
              </div>

              <textarea id="schemaCodeArea" class="form-control schema-code-box" readonly></textarea>
              
              <div class="text-muted small mt-2">
                <i class="fa-solid fa-circle-info me-1 text-info"></i> Paste inside the <code>&lt;head&gt;</code> section of your HTML page.
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
    $('#schemaType').on('change', function() {
      const type = $(this).val();
      $('#sec-business, #sec-person, #sec-article, #sec-faq, #sec-product').addClass('d-none');
      if (type === 'LocalBusiness' || type === 'Organization') $('#sec-business').removeClass('d-none');
      if (type === 'Person') $('#sec-person').removeClass('d-none');
      if (type === 'Article') $('#sec-article').removeClass('d-none');
      if (type === 'FAQPage') $('#sec-faq').removeClass('d-none');
      if (type === 'Product') $('#sec-product').removeClass('d-none');
      generateSchema();
    });

    $('input, textarea').on('input', generateSchema);

    function generateSchema() {
      const type = $('#schemaType').val();
      let schemaObj = {};

      if (type === 'LocalBusiness') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "LocalBusiness",
          "name": $('#bName').val(),
          "url": $('#bUrl').val(),
          "logo": $('#bLogo').val(),
          "telephone": $('#bPhone').val(),
          "priceRange": $('#bPrice').val(),
          "address": {
            "@type": "PostalAddress",
            "streetAddress": $('#bStreet').val(),
            "addressCountry": "IN"
          }
        };
      } else if (type === 'Organization') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": $('#bName').val(),
          "url": $('#bUrl').val(),
          "logo": $('#bLogo').val(),
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": $('#bPhone').val(),
            "contactType": "customer service"
          }
        };
      } else if (type === 'Person') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "Person",
          "name": $('#pName').val(),
          "jobTitle": $('#pJob').val(),
          "url": $('#pUrl').val(),
          "sameAs": [$('#pSocial').val()]
        };
      } else if (type === 'Article') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": $('#artHeadline').val(),
          "image": $('#artImage').val(),
          "author": {
            "@type": "Person",
            "name": $('#artAuthor').val()
          },
          "publisher": {
            "@type": "Organization",
            "name": $('#artPub').val()
          }
        };
      } else if (type === 'FAQPage') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "FAQPage",
          "mainEntity": [
            {
              "@type": "Question",
              "name": $('#faqQ1').val(),
              "acceptedAnswer": { "@type": "Answer", "text": $('#faqA1').val() }
            },
            {
              "@type": "Question",
              "name": $('#faqQ2').val(),
              "acceptedAnswer": { "@type": "Answer", "text": $('#faqA2').val() }
            }
          ]
        };
      } else if (type === 'Product') {
        schemaObj = {
          "@context": "https://schema.org",
          "@type": "Product",
          "name": $('#prodName').val(),
          "image": $('#prodImg').val(),
          "offers": {
            "@type": "Offer",
            "price": $('#prodPrice').val(),
            "priceCurrency": $('#prodCur').val(),
            "availability": "https://schema.org/InStock"
          }
        };
      }

      const scriptFormatted = `<script type="application/ld+json">\n${JSON.stringify(schemaObj, null, 2)}\n<\/script>`;
      $('#schemaCodeArea').val(scriptFormatted);
    }

    function saveSchemaToHistory() {
      const type = $('#schemaType').val();
      const code = $('#schemaCodeArea').val();
      const title = `Schema: ${type} (${$('#bName').val() || $('#pName').val() || $('#artHeadline').val() || type})`;
      const summary = `Type: ${type} JSON-LD Structured Data`;
      
      const payload = {
        type: type,
        bName: $('#bName').val(),
        bUrl: $('#bUrl').val(),
        bLogo: $('#bLogo').val(),
        bPhone: $('#bPhone').val(),
        bPrice: $('#bPrice').val(),
        bStreet: $('#bStreet').val(),
        pName: $('#pName').val(),
        pJob: $('#pJob').val(),
        pUrl: $('#pUrl').val(),
        pSocial: $('#pSocial').val(),
        artHeadline: $('#artHeadline').val(),
        artAuthor: $('#artAuthor').val(),
        faqQ1: $('#faqQ1').val(),
        faqA1: $('#faqA1').val(),
        prodName: $('#prodName').val(),
        prodPrice: $('#prodPrice').val()
      };

      ToolsApp.saveHistory('schema-generator', title, summary, payload);
    }

    function copySchemaJson() {
      const code = $('#schemaCodeArea').val();
      if (navigator.clipboard) {
        navigator.clipboard.writeText(code).then(() => ToolsApp.showToast('JSON-LD Schema copied! 📋'));
      } else {
        $('#schemaCodeArea').select();
        document.execCommand('copy');
        ToolsApp.showToast('JSON-LD Schema copied! 📋');
      }
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'schema-generator' && payload) {
        if (payload.type) $('#schemaType').val(payload.type).trigger('change');
        if (payload.bName) $('#bName').val(payload.bName);
        if (payload.bUrl) $('#bUrl').val(payload.bUrl);
        if (payload.bPhone) $('#bPhone').val(payload.bPhone);
        if (payload.pName) $('#pName').val(payload.pName);
        if (payload.pJob) $('#pJob').val(payload.pJob);
        if (payload.artHeadline) $('#artHeadline').val(payload.artHeadline);
        if (payload.faqQ1) $('#faqQ1').val(payload.faqQ1);
        if (payload.faqA1) $('#faqA1').val(payload.faqA1);
        if (payload.prodName) $('#prodName').val(payload.prodName);
        if (payload.prodPrice) $('#prodPrice').val(payload.prodPrice);
        generateSchema();
      }
    });

    $(document).ready(generateSchema);
  </script>
</body>
</html>
