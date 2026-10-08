<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Schema JSON-LD Generator — Structured Data Creator | NikhilWorks";
$metaDesc = "Generate valid Schema.org JSON-LD structured data for LocalBusiness, Organization, Person, FAQ, Product, and Article. Boost Google Rich Snippets & rankings.";
$canonical = $site . "tools/schema-generator/";
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
    "name": "Schema JSON-LD Markup Generator",
    "applicationCategory": "SEOApplication",
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
      { "@type": "ListItem", "position": 3, "name": "Schema JSON-LD Generator" }
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
        "name": "What is Schema JSON-LD structured data?",
        "acceptedAnswer": { "@type": "Answer", "text": "JSON-LD (JavaScript Object Notation for Linked Data) is Google's recommended format for adding structured data to webpages to help crawlers understand your content context and trigger rich snippets." }
      },
      {
        "@type": "Question",
        "name": "Where do I paste the generated Schema code?",
        "acceptedAnswer": { "@type": "Answer", "text": "Paste the generated <script type='application/ld+json'>...</script> block inside the <head> or <body> section of your HTML webpage." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #047857 100%);
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
        <span class="text-white fw-bold">Schema JSON-LD Generator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Schema.org JSON-LD Structured Data Generator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Generate 100% valid JSON-LD schemas for Local Business, Organization, Person, Article, FAQ, and Product.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Inputs Column -->
      <div class="col-lg-6">
        <div class="tool-card-box">
          
          <div class="mb-3">
            <label class="form-label fw-bold">Select Schema.org Type</label>
            <select id="schemaType" class="form-select form-select-lg">
              <option value="LocalBusiness" selected>📍 Local Business (Shop, Agency, Office)</option>
              <option value="Organization">🏢 Organization / Company</option>
              <option value="Person">👤 Person / Freelancer / Consultant</option>
              <option value="Article">📰 Article / Blog Post</option>
              <option value="FAQPage">❓ FAQ Page (Q&amp;A)</option>
              <option value="Product">🛍️ Product / E-commerce Item</option>
            </select>
          </div>

          <!-- Dynamic Form Containers -->
          <div id="schemaFormContainer">
            
            <!-- LocalBusiness / Organization -->
            <div id="sec-business" class="schema-sec">
              <div class="mb-3">
                <label class="form-label fw-bold">Business Name <span class="text-danger">*</span></label>
                <input type="text" id="bName" class="form-control" value="NikhilWorks Web & SEO Agency">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Website URL <span class="text-danger">*</span></label>
                <input type="url" id="bUrl" class="form-control" value="https://nikhilworks.com">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Logo Image URL</label>
                <input type="url" id="bLogo" class="form-control" value="https://nikhilworks.com/assets/img/logo/logo4.png">
              </div>
              <div class="row g-2 mb-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Phone Number</label>
                  <input type="tel" id="bPhone" class="form-control" value="+918368552640">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Price Range</label>
                  <input type="text" id="bPrice" class="form-control" value="₹₹">
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Street Address &amp; City</label>
                <input type="text" id="bStreet" class="form-control" value="Karampura, New Delhi, India">
              </div>
            </div>

            <!-- Person -->
            <div id="sec-person" class="schema-sec d-none">
              <div class="mb-3">
                <label class="form-label fw-bold">Person Name</label>
                <input type="text" id="pName" class="form-control" value="Nikhil Gupta">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Job Title</label>
                <input type="text" id="pJob" class="form-control" value="Web Developer & Technical SEO Expert">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Website / Portfolio URL</label>
                <input type="url" id="pUrl" class="form-control" value="https://nikhilworks.com">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">LinkedIn Profile URL</label>
                <input type="url" id="pSocial" class="form-control" value="https://www.linkedin.com/in/iamnikhilgupta/">
              </div>
            </div>

            <!-- Article -->
            <div id="sec-article" class="schema-sec d-none">
              <div class="mb-3">
                <label class="form-label fw-bold">Article Headline</label>
                <input type="text" id="artHeadline" class="form-control" value="Building High-Performance Websites with Modern PHP">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Article Image URL</label>
                <input type="url" id="artImage" class="form-control" value="https://nikhilworks.com/assets/img/preview.png">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Author Name</label>
                <input type="text" id="artAuthor" class="form-control" value="Nikhil Gupta">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Publisher Name</label>
                <input type="text" id="artPub" class="form-control" value="NikhilWorks">
              </div>
            </div>

            <!-- FAQPage -->
            <div id="sec-faq" class="schema-sec d-none">
              <div class="mb-3">
                <label class="form-label fw-bold">Question 1</label>
                <input type="text" id="faqQ1" class="form-control" value="How much does a custom website cost?">
                <label class="form-label fw-bold mt-2">Answer 1</label>
                <textarea id="faqA1" class="form-control" rows="2">Custom business websites at NikhilWorks start from ₹7,999 with complete SEO optimization.</textarea>
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Question 2</label>
                <input type="text" id="faqQ2" class="form-control" value="How long does it take to build a website?">
                <label class="form-label fw-bold mt-2">Answer 2</label>
                <textarea id="faqA2" class="form-control" rows="2">Standard business websites are delivered in 5 to 7 working days.</textarea>
              </div>
            </div>

            <!-- Product -->
            <div id="sec-product" class="schema-sec d-none">
              <div class="mb-3">
                <label class="form-label fw-bold">Product Name</label>
                <input type="text" id="prodName" class="form-control" value="E-Commerce Website Package">
              </div>
              <div class="mb-3">
                <label class="form-label fw-bold">Product Image URL</label>
                <input type="url" id="prodImg" class="form-control" value="https://nikhilworks.com/assets/img/preview.png">
              </div>
              <div class="row g-2 mb-3">
                <div class="col-md-6">
                  <label class="form-label fw-bold">Price (e.g. 14999)</label>
                  <input type="number" id="prodPrice" class="form-control" value="14999">
                </div>
                <div class="col-md-6">
                  <label class="form-label fw-bold">Currency</label>
                  <input type="text" id="prodCur" class="form-control" value="INR">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- JSON-LD Output Column -->
      <div class="col-lg-6">
        <div class="tool-card-box h-100 d-flex flex-column justify-content-between">
          <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-code text-success me-2"></i> Generated JSON-LD Code</h5>
              <span class="badge bg-success text-white">Valid Schema.org</span>
            </div>

            <textarea id="schemaCodeArea" class="form-control font-monospace bg-light" style="font-size: 13px; height: 360px;" readonly></textarea>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="button" class="btn btn-dark fw-bold flex-grow-1 py-2" onclick="copySchemaJson()" id="btnCopySchema">
              <i class="fa-regular fa-copy me-1"></i> Copy JSON-LD Script
            </button>
            <a href="https://search.google.com/test/rich-results" target="_blank" rel="noopener" class="btn btn-outline-primary fw-bold py-2">
              <i class="fa-solid fa-vial-circle-check me-1"></i> Test on Google
            </a>
          </div>
        </div>
      </div>

    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5">
      <h2>Why Schema Markup is Essential for Modern SEO</h2>
      <p>
        Structured data using the <strong>Schema.org vocabulary</strong> enables search engine robots to understand the exact semantic context of your business, author, pricing, and FAQ items.
        It directly powers <strong>Google Rich Snippets</strong>, including star ratings, review badges, breadcrumbs, and instant answer carousels.
      </p>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Will adding Schema JSON-LD guarantee rich snippets on Google?</summary>
        <p>While structured data is a prerequisite, Google's algorithms dynamically decide when to display rich snippets based on search intent, content quality, and site authority.</p>
      </details>
      <details class="faq-card">
        <summary>Can I have multiple Schema types on a single webpage?</summary>
        <p>Yes! It is common and recommended to have an <code>Organization</code> schema alongside <code>BreadcrumbList</code>, <code>Article</code>, and <code>FAQPage</code> schemas on the same page.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/meta-preview/" class="text-decoration-none text-dark"><i class="fa-solid fa-tags text-primary me-1"></i> Meta Tags Preview</a></h6>
            <small class="text-muted">Simulate Google SERP &amp; Social cards.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/pagespeed/" class="text-decoration-none text-dark"><i class="fa-solid fa-gauge-high text-danger me-1"></i> PageSpeed Checker</a></h6>
            <small class="text-muted">Audit Core Web Vitals and Lighthouse scores.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>seo-auditor/" class="text-decoration-none text-dark"><i class="fa-solid fa-stethoscope text-success me-1"></i> Free SEO Auditor</a></h6>
            <small class="text-muted">Comprehensive 50-point technical SEO scan.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Advanced Programmatic SEO &amp; Schema Architecture?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks engineers scalable schema architectures for eCommerce stores, directories, and multi-location businesses.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Contact NikhilWorks <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    $('#schemaType').on('change', function() {
      const type = $(this).val();
      $('.schema-sec').addClass('d-none');
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

    function copySchemaJson() {
      const code = $('#schemaCodeArea').val();
      navigator.clipboard.writeText(code);
      const btn = $('#btnCopySchema');
      btn.html('<i class="fa-solid fa-check me-1"></i> Copied to Clipboard!');
      setTimeout(() => {
        btn.html('<i class="fa-regular fa-copy me-1"></i> Copy JSON-LD Script');
      }, 2000);
    }

    $(document).ready(generateSchema);
  </script>
</body>
</html>
