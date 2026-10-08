<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Meta Tags & SERP Preview Tool — Social Share Simulator | NikhilWorks";
$metaDesc = "Preview how your webpage appears on Google Search, Facebook Open Graph, Twitter (X) Cards, and LinkedIn. Test character counts and generate copy-paste HTML meta tags.";
$canonical = $site . "tools/meta-preview/";
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
    "name": "Meta Tags & SERP Preview Tool",
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
      { "@type": "ListItem", "position": 3, "name": "Meta Tags Preview" }
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
        "name": "What is the ideal Meta Title length for Google SEO?",
        "acceptedAnswer": { "@type": "Answer", "text": "Google typically displays the first 50 to 60 characters (or approx 580 pixels) of a title tag before truncating with an ellipsis." }
      },
      {
        "@type": "Question",
        "name": "What is the optimal Meta Description length?",
        "acceptedAnswer": { "@type": "Answer", "text": "The ideal meta description length is between 140 and 160 characters for desktop and mobile search snippets." }
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
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.14) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 140px 0 65px;
      color: #fff;
      position: relative;
      overflow: hidden;
    }
    @media (max-width: 991px) {
      .tool-hero {
        padding: 110px 0 50px;
      }
    }
    .site-breadcrumb {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      gap: 8px;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      border-radius: 30px;
      padding: 6px 18px;
      margin-bottom: 20px;
      font-size: 13.5px;
      backdrop-filter: blur(8px);
    }
    .site-breadcrumb a {
      color: #cbe3e1;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.2s ease;
      display: inline-flex;
      align-items: center;
      gap: 5px;
    }
    .site-breadcrumb a:hover {
      color: var(--brand-lime);
    }
    .site-breadcrumb .bc-sep {
      color: rgba(255, 255, 255, 0.4);
      font-size: 10px;
    }
    .site-breadcrumb .bc-current {
      color: var(--brand-lime);
      font-weight: 700;
    }
    .tool-card-box {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 30px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.06);
    }
    .char-count-pill {
      font-size: 11.5px;
      font-weight: 700;
      padding: 2px 8px;
      border-radius: 20px;
      background: #f1f5f9;
      color: #64748b;
    }
    .char-count-pill.good { background: #dcfce7; color: #16a34a; }
    .char-count-pill.warn { background: #ffedd5; color: #ea580c; }

    /* Google SERP Preview Card */
    .google-serp-box {
      background: #ffffff;
      border: 1px solid #dfe1e5;
      border-radius: 10px;
      padding: 18px;
      font-family: Arial, sans-serif;
      text-align: left;
    }
    .google-serp-url {
      font-size: 13px;
      color: #202124;
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 4px;
    }
    .google-serp-title {
      font-size: 18px;
      line-height: 1.3;
      color: #1a0dab;
      margin-bottom: 4px;
      cursor: pointer;
      font-weight: 400;
    }
    .google-serp-desc {
      font-size: 13px;
      line-height: 1.4;
      color: #4d5156;
    }

    /* Social Card Preview */
    .social-og-box {
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      overflow: hidden;
      background: #ffffff;
      text-align: left;
    }
    .social-og-img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      background: #0f172a;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-weight: 700;
    }
    .social-og-body {
      padding: 14px 18px;
      background: #f8fafc;
      border-top: 1px solid #e2e8f0;
    }
    .social-og-domain {
      font-size: 11px;
      text-transform: uppercase;
      color: #64748b;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .social-og-title {
      font-size: 15px;
      font-weight: 700;
      color: #0f172a;
      margin: 4px 0;
      line-height: 1.3;
    }
    .social-og-desc {
      font-size: 12.5px;
      color: #64748b;
      line-height: 1.4;
      margin-bottom: 0;
    }

    .nav-preview-tab .nav-link {
      color: #475569;
      font-weight: 600;
      border-radius: 8px;
      padding: 8px 16px;
    }
    .nav-preview-tab .nav-link.active {
      background: var(--brand-teal);
      color: #fff;
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
      <nav aria-label="breadcrumb">
        <div class="site-breadcrumb">
          <a href="<?= $site ?>"><i class="fa-solid fa-house fa-xs"></i> Home</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <a href="<?= $site ?>free-tools/">Free Tools</a>
          <i class="fa-solid fa-angle-right bc-sep"></i>
          <span class="bc-current">Meta Tags &amp; SERP Preview</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Meta Tags &amp; Social Share Preview Simulator</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Preview and optimize how your title, meta description, and banner look on Google, Facebook, X (Twitter), and LinkedIn.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Inputs Form Column -->
      <div class="col-lg-6">
        <div class="tool-card-box">
          <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-pen-to-square text-primary me-2"></i> Meta Tag Inputs</h5>
          
          <!-- Page Title -->
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label class="form-label fw-bold mb-0">Page Title (Meta Title) <span class="text-danger">*</span></label>
              <span id="titleCounter" class="char-count-pill good">48 / 60 chars</span>
            </div>
            <input type="text" id="inTitle" class="form-control" placeholder="e.g. Web Development & SEO Services | NikhilWorks" value="Web Development & SEO Services | NikhilWorks">
            <small class="text-muted">Recommended: 50-60 characters.</small>
          </div>

          <!-- Meta Description -->
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label class="form-label fw-bold mb-0">Meta Description <span class="text-danger">*</span></label>
              <span id="descCounter" class="char-count-pill good">142 / 160 chars</span>
            </div>
            <textarea id="inDesc" class="form-control" rows="3" placeholder="Craft a compelling summary with value hook...">Custom web development, high-speed modern PHP applications, and full-stack technical SEO engineered to scale your online presence and revenue.</textarea>
            <small class="text-muted">Recommended: 140-160 characters.</small>
          </div>

          <!-- Canonical URL -->
          <div class="mb-3">
            <label class="form-label fw-bold">Canonical Page URL</label>
            <input type="url" id="inUrl" class="form-control" placeholder="https://nikhilworks.com/services/" value="https://nikhilworks.com/services/">
          </div>

          <!-- OG Image Banner URL -->
          <div class="mb-3">
            <label class="form-label fw-bold">Featured Social Image URL (1200x630)</label>
            <input type="url" id="inImage" class="form-control" placeholder="https://nikhilworks.com/assets/img/logo/og-tools.jpg" value="https://nikhilworks.com/assets/img/logo/og-tools.jpg">
          </div>

          <button type="button" class="btn btn-outline-dark w-100 fw-bold py-2 mt-2" onclick="generateMetaCode()">
            <i class="fa-solid fa-code me-1"></i> Generate &amp; Copy HTML Meta Tags
          </button>

          <!-- Generated Code Output Box -->
          <div id="codeOutputBox" class="mt-3 d-none">
            <label class="form-label fw-bold small text-muted">Copy to your &lt;head&gt; section:</label>
            <textarea id="rawMetaCode" class="form-control font-monospace small bg-light" rows="6" readonly></textarea>
          </div>
        </div>
      </div>

      <!-- Live Simulator Preview Column -->
      <div class="col-lg-6">
        <div class="tool-card-box h-100">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-eye text-success me-2"></i> Live Visual Preview</h5>
            
            <ul class="nav nav-pills nav-preview-tab" id="previewTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-google" data-bs-toggle="pill" data-bs-target="#view-google" type="button"><i class="fa-brands fa-google"></i> Google</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-social" data-bs-toggle="pill" data-bs-target="#view-social" type="button"><i class="fa-brands fa-facebook"></i> Social Cards</button>
              </li>
            </ul>
          </div>

          <div class="tab-content mt-3" id="previewTabsContent">
            <!-- Google SERP View -->
            <div class="tab-pane fade show active" id="view-google">
              <div class="google-serp-box">
                <div class="google-serp-url">
                  <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:18px;height:18px;font-size:10px;font-weight:bold;">N</div>
                  <div>
                    <span class="d-block fw-bold" style="font-size:12px;">NikhilWorks</span>
                    <span class="text-muted" id="serpUrlDisplay" style="font-size:11.5px;">https://nikhilworks.com &rsaquo; services</span>
                  </div>
                </div>
                <div class="google-serp-title" id="serpTitleDisplay">Web Development &amp; SEO Services | NikhilWorks</div>
                <div class="google-serp-desc" id="serpDescDisplay">
                  Custom web development, high-speed modern PHP applications, and full-stack technical SEO engineered to scale your online presence and revenue.
                </div>
              </div>
            </div>

            <!-- Social Card View (Facebook / LinkedIn / Twitter) -->
            <div class="tab-pane fade" id="view-social">
              <div class="social-og-box">
                <div class="social-og-img" id="ogImgDisplay">
                  <img src="https://nikhilworks.com/assets/img/logo/og-tools.jpg" id="ogImgTag" style="width:100%;height:100%;object-fit:cover;" onerror="this.style.display='none'">
                </div>
                <div class="social-og-body">
                  <div class="social-og-domain" id="ogDomainDisplay">NIKHILWORKS.COM</div>
                  <div class="social-og-title" id="ogTitleDisplay">Web Development &amp; SEO Services | NikhilWorks</div>
                  <p class="social-og-desc" id="ogDescDisplay">Custom web development, high-speed modern PHP applications, and full-stack technical SEO...</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Optimization Tips Alert -->
          <div class="p-3 bg-light rounded-3 border mt-4 small">
            <h6 class="fw-bold text-dark mb-1"><i class="fa-solid fa-lightbulb text-warning me-1"></i> Best Practice Tip</h6>
            <span class="text-muted">Always ensure your most critical primary keywords appear within the first 40 characters of the page title for maximum click-through rates (CTR).</span>
          </div>
        </div>
      </div>

    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5">
      <h2>Why Meta Tags are Critical for SEO &amp; CTR</h2>
      <p>
        Meta tags are HTML elements that provide metadata about your webpage directly to search engine crawlers and social media platforms.
        While meta descriptions don't directly boost keyword rankings, they heavily dictate your <strong>Click-Through-Rate (CTR)</strong> on Google SERPs.
      </p>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>What happens if my title exceeds 60 characters?</summary>
        <p>Google will truncate your title with an ellipsis (<code>...</code>), which may hide your brand name or cut off important call-to-actions.</p>
      </details>
      <details class="faq-card">
        <summary>What is Open Graph (og:) protocol?</summary>
        <p>Open Graph tags (created by Facebook and used by LinkedIn, WhatsApp, and iMessage) allow you to control the exact image, title, and description displayed whenever someone shares your link across social apps.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/schema-generator/" class="text-decoration-none text-dark"><i class="fa-solid fa-code text-primary me-1"></i> Schema Generator</a></h6>
            <small class="text-muted">Create JSON-LD rich snippet markups.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/index-checker/" class="text-decoration-none text-dark"><i class="fa-brands fa-google text-success me-1"></i> Google Index Checker</a></h6>
            <small class="text-muted">Test live Google indexation status.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/robots-validator/" class="text-decoration-none text-dark"><i class="fa-solid fa-robot text-danger me-1"></i> Robots.txt Validator</a></h6>
            <small class="text-muted">Audit search engine crawler block rules.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Want to Rank on Google Page 1 with Complete Technical SEO?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks delivers data-driven SEO audits, programmatic keyword optimization, and high-converting landing pages.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Free SEO Proposal <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function updatePreviews() {
      const title = $('#inTitle').val().trim() || 'Untitled Page';
      const desc = $('#inDesc').val().trim() || 'No meta description provided.';
      const url = $('#inUrl').val().trim() || 'https://nikhilworks.com';
      const img = $('#inImage').val().trim() || '';

      // Counters
      const tLen = title.length;
      $('#titleCounter').text(`${tLen} / 60 chars`).attr('class', 'char-count-pill ' + (tLen > 0 && tLen <= 60 ? 'good' : 'warn'));

      const dLen = desc.length;
      $('#descCounter').text(`${dLen} / 160 chars`).attr('class', 'char-count-pill ' + (dLen > 0 && dLen <= 160 ? 'good' : 'warn'));

      // Google SERP
      $('#serpTitleDisplay').text(title);
      $('#serpDescDisplay').text(desc);
      $('#serpUrlDisplay').text(url.replace('https://', '').replace('http://', ''));

      // Social Card
      $('#ogTitleDisplay').text(title);
      $('#ogDescDisplay').text(desc.length > 120 ? desc.substring(0, 120) + '...' : desc);
      
      try {
        const u = new URL(url.startsWith('http') ? url : 'https://' + url);
        $('#ogDomainDisplay').text(u.hostname.toUpperCase());
      } catch (e) {
        $('#ogDomainDisplay').text('WEBSITE.COM');
      }

      if (img) {
        $('#ogImgTag').attr('src', img).show();
      } else {
        $('#ogImgTag').hide();
      }
    }

    function generateMetaCode() {
      const title = $('#inTitle').val().trim();
      const desc = $('#inDesc').val().trim();
      const url = $('#inUrl').val().trim();
      const img = $('#inImage').val().trim();

      const code = `<!-- Primary Meta Tags -->\n<title>${title}</title>\n<meta name="title" content="${title}">\n<meta name="description" content="${desc}">\n<link rel="canonical" href="${url}">\n\n<!-- Open Graph / Facebook / LinkedIn -->\n<meta property="og:type" content="website">\n<meta property="og:url" content="${url}">\n<meta property="og:title" content="${title}">\n<meta property="og:description" content="${desc}">\n<meta property="og:image" content="${img}">\n\n<!-- Twitter / X -->\n<meta property="twitter:card" content="summary_large_image">\n<meta property="twitter:url" content="${url}">\n<meta property="twitter:title" content="${title}">\n<meta property="twitter:description" content="${desc}">\n<meta property="twitter:image" content="${img}">`;

      $('#rawMetaCode').val(code);
      $('#codeOutputBox').removeClass('d-none');
      navigator.clipboard.writeText(code);
      alert('Meta tags copied to clipboard!');
    }

    $('#inTitle, #inDesc, #inUrl, #inImage').on('input', updatePreviews);
    $(document).ready(updatePreviews);
  </script>
</body>
</html>
