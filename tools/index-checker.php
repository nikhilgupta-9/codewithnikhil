<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Google Index & Cache Checker — Test Page Indexation | NikhilWorks";
$metaDesc = "Check if your webpage or domain is indexed on Google. Verify Google cache snapshot, inspect robots indexability status, and diagnose crawl issues for free.";
$canonical = $site . "tools/index-checker/";
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
    "name": "Google Index & Cache Checker Tool",
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
      { "@type": "ListItem", "position": 3, "name": "Google Index Checker" }
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
        "name": "How to check if my website is indexed by Google?",
        "acceptedAnswer": { "@type": "Answer", "text": "Type 'site:yourwebsite.com' in the Google search bar. If search results appear, your pages are successfully indexed in Google's database." }
      },
      {
        "@type": "Question",
        "name": "Why is my new webpage not getting indexed?",
        "acceptedAnswer": { "@type": "Answer", "text": "Common reasons include accidental 'noindex' meta tags, robots.txt disallow rules, lack of internal/backlinks, or Google taking 2 to 7 days to crawl new domains." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #0369a1 100%);
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
    .status-badge-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 20px;
      margin-bottom: 15px;
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
        <span class="text-white fw-bold">Google Index Checker</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Google Index &amp; Cache Checker</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Instantly check if your URL or domain is indexed by Google, view cache snapshots, and debug indexing barriers.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        
        <!-- Tool Box -->
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-brands fa-google text-primary me-2"></i> Enter Webpage URL</h5>
          
          <div class="input-group mb-3">
            <span class="input-group-text bg-light"><i class="fa-solid fa-link text-muted"></i></span>
            <input type="url" id="indexUrl" class="form-control form-control-lg" placeholder="https://yourwebsite.com/page/" value="https://nikhilworks.com">
          </div>

          <div class="d-flex gap-2">
            <button type="button" class="btn btn-primary btn-lg flex-grow-1 fw-bold" onclick="checkIndexStatus()">
              <i class="fa-solid fa-magnifying-glass me-1"></i> Check Google Index Status
            </button>
          </div>

          <!-- Direct Google Search Buttons -->
          <div id="indexActionArea" class="mt-4 pt-4 border-top">
            <h6 class="fw-bold text-dark mb-3">Direct Google Query Shortcuts:</h6>
            
            <div class="row g-3">
              <div class="col-md-6">
                <a href="https://www.google.com/search?q=site:https://nikhilworks.com" target="_blank" rel="noopener" id="btnSiteQuery" class="btn btn-outline-dark w-100 py-3 text-start d-flex align-items-center justify-content-between">
                  <div>
                    <strong class="d-block text-dark"><i class="fa-brands fa-google text-primary me-2"></i> Site: Exact URL Search</strong>
                    <small class="text-muted">Checks if this specific page is live on SERP</small>
                  </div>
                  <i class="fa-solid fa-arrow-up-right-from-square text-muted"></i>
                </a>
              </div>

              <div class="col-md-6">
                <a href="https://www.google.com/search?q=site:nikhilworks.com" target="_blank" rel="noopener" id="btnDomainQuery" class="btn btn-outline-dark w-100 py-3 text-start d-flex align-items-center justify-content-between">
                  <div>
                    <strong class="d-block text-dark"><i class="fa-solid fa-globe text-success me-2"></i> Entire Domain Index</strong>
                    <small class="text-muted">Count total indexed pages across domain</small>
                  </div>
                  <i class="fa-solid fa-arrow-up-right-from-square text-muted"></i>
                </a>
              </div>
            </div>

            <!-- Diagnostic Checklist -->
            <div class="status-badge-card mt-4">
              <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-clipboard-check text-success me-2"></i> Instant Indexing Health Checklist</h6>
              <ul class="list-unstyled mb-0 d-flex flex-column gap-2 small text-muted">
                <li class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Ensure <code>&lt;meta name="robots" content="noindex"&gt;</code> is NOT present in your page head.
                </li>
                <li class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Verify that your <code>robots.txt</code> does not contain <code>Disallow: /</code> for Googlebot.
                </li>
                <li class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Submit XML Sitemap (<code>/sitemap.xml</code>) directly to <strong>Google Search Console</strong>.
                </li>
                <li class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Check canonical URL tag points to self (or preferred authoritative URL).
                </li>
              </ul>
            </div>
          </div>

        </div>

        <!-- CONTENT SECTION -->
        <div class="content-section mt-5">
          <h2>Why Google Indexation Matters</h2>
          <p>
            If your website pages are not indexed by Google, they are completely invisible to search engine users. Getting indexed is the mandatory first step before your pages can start ranking for organic keywords and driving traffic.
          </p>

          <h2>Fastest Ways to Get Indexed on Google (2026)</h2>
          <ol>
            <li><strong>Google Search Console URL Inspection:</strong> Submit the URL using the "Request Indexing" button in GSC.</li>
            <li><strong>XML Sitemap Ping:</strong> Ensure your sitemap index lists all fresh URLs and submit it to Search Console.</li>
            <li><strong>Internal Linking:</strong> Link to new articles and landing pages from high-authority pages like your homepage or blog archive.</li>
            <li><strong>Fix Crawl Errors:</strong> Resolve 404 broken links, 500 server errors, and canonical redirection loops.</li>
          </ol>

          <h2>Frequently Asked Questions</h2>
          <details class="faq-card" open>
            <summary>How long does Google take to index a new website?</summary>
            <p>For fresh domains, Google typically takes between <strong>24 hours to 7 business days</strong> to crawl and index initial pages. Established sites with regular content updates often get indexed within minutes to a few hours.</p>
          </details>
          <details class="faq-card">
            <summary>What is the difference between Crawling and Indexing?</summary>
            <p><strong>Crawling:</strong> When Googlebot downloads and reads your page content.<br><strong>Indexing:</strong> When Google processes, analyzes, and stores your page into its searchable global database index.</p>
          </details>

          <h2>Related Free Tools</h2>
          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/meta-preview/" class="text-decoration-none text-dark"><i class="fa-solid fa-tags text-primary me-1"></i> Meta Tags Preview</a></h6>
                <small class="text-muted">Simulate Google SERP title and description snippets.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/robots-validator/" class="text-decoration-none text-dark"><i class="fa-solid fa-robot text-danger me-1"></i> Robots.txt Validator</a></h6>
                <small class="text-muted">Test crawler directives and block rules.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/schema-generator/" class="text-decoration-none text-dark"><i class="fa-solid fa-code text-success me-1"></i> Schema Generator</a></h6>
                <small class="text-muted">Generate JSON-LD structured data for Google.</small>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Struggling with Google Indexation or SEO Drop-offs?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks diagnoses indexing barriers, canonical conflicts, JavaScript rendering issues, and executes full technical SEO recoveries.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Technical SEO Audit <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function checkIndexStatus() {
      let raw = $('#indexUrl').val().trim();
      if (!raw) {
        alert('Please enter a website URL.');
        return;
      }
      if (!raw.startsWith('http://') && !raw.startsWith('https://')) {
        raw = 'https://' + raw;
        $('#indexUrl').val(raw);
      }

      let domain = '';
      try {
        const u = new URL(raw);
        domain = u.hostname;
      } catch (e) {
        domain = raw.replace('https://', '').replace('http://', '').split('/')[0];
      }

      const siteQueryUrl = `https://www.google.com/search?q=site:${encodeURIComponent(raw)}`;
      const domainQueryUrl = `https://www.google.com/search?q=site:${encodeURIComponent(domain)}`;

      $('#btnSiteQuery').attr('href', siteQueryUrl);
      $('#btnDomainQuery').attr('href', domainQueryUrl);

      // Open site search in new tab automatically
      window.open(siteQueryUrl, '_blank');
    }
  </script>
</body>
</html>
