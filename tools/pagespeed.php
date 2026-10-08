<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Website Speed Test — Core Web Vitals Checker | NikhilWorks";
$metaDesc = "Test your website speed on mobile and desktop using Google PageSpeed API. Get Core Web Vitals score, LCP, CLS and INP instantly. 100% free tool.";
$canonical = $site . "tools/pagespeed/";
$metaKeywords = "website speed test, google pagespeed checker free, core web vitals checker, website loading speed test india, page speed insights checker online";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($metaDesc) ?>
  <meta name="keywords" content="<?= htmlspecialchars($metaKeywords) ?>">">
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
    "name": "Google PageSpeed Insights & Core Web Vitals Checker",
    "applicationCategory": "DeveloperApplication",
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
      { "@type": "ListItem", "position": 3, "name": "PageSpeed Checker" }
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
        "name": "What are Google Core Web Vitals?",
        "acceptedAnswer": { "@type": "Answer", "text": "Core Web Vitals are Google's key speed and user-experience metrics including Largest Contentful Paint (LCP for loading), Interaction to Next Paint (INP for responsiveness), and Cumulative Layout Shift (CLS for visual stability)." }
      },
      {
        "@type": "Question",
        "name": "How does website speed affect Google SEO rankings?",
        "acceptedAnswer": { "@type": "Answer", "text": "Google uses page speed and Core Web Vitals as a confirmed ranking signal. Fast-loading sites rank higher and achieve lower bounce rates." }
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
    .score-circle {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 0 auto 12px;
      border: 6px solid #e2e8f0;
      font-weight: 800;
      font-size: 32px;
      transition: all 0.4s ease;
    }
    .score-good { border-color: #16a34a; color: #16a34a; background: rgba(22, 163, 74, 0.08); }
    .score-avg { border-color: #ea580c; color: #ea580c; background: rgba(234, 88, 12, 0.08); }
    .score-poor { border-color: #dc2626; color: #dc2626; background: rgba(220, 38, 38, 0.08); }

    .cwv-card {
      background: #f8fafc;
      border: 1px solid #e2e8f0;
      border-radius: 10px;
      padding: 16px;
      height: 100%;
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
          <span class="bc-current">PageSpeed Checker</span>
        </div>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Website Speed Test — Google PageSpeed &amp; Core Web Vitals</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Test live mobile and desktop speed scores, CWV metrics, and get actionable performance insights.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        
        <!-- URL Audit Form -->
        <div class="tool-card-box mb-4">
          <form id="speedForm" onsubmit="return false;">
            <div class="row g-3 align-items-end">
              <div class="col-md-7">
                <label class="form-label fw-bold text-dark">Enter Website URL to Audit</label>
                <div class="input-group">
                  <span class="input-group-text bg-light"><i class="fa-solid fa-globe text-muted"></i></span>
                  <input type="url" id="testUrl" class="form-control form-control-lg" placeholder="https://example.com" value="https://nikhilworks.com" required>
                </div>
              </div>

              <div class="col-md-3">
                <label class="form-label fw-bold text-dark">Device Strategy</label>
                <select id="deviceStrategy" class="form-select form-select-lg">
                  <option value="mobile" selected>📱 Mobile (Crucial)</option>
                  <option value="desktop">💻 Desktop</option>
                </select>
              </div>

              <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-lg w-100 fw-bold" onclick="runSpeedAudit()" id="btnAudit">
                  <i class="fa-solid fa-bolt me-1"></i> Analyze
                </button>
              </div>
            </div>
          </form>

          <!-- Loading State -->
          <div id="loadingState" class="text-center py-5 d-none">
            <div class="spinner-border text-primary mb-3" style="width: 3rem; height: 3rem;" role="status"></div>
            <h5 class="fw-bold text-dark">Querying Google Lighthouse API...</h5>
            <p class="text-muted small">Simulating real user device load, measuring LCP, FCP, CLS, and parsing optimization bottlenecks (takes ~10-15s)...</p>
          </div>

          <!-- Error State -->
          <div id="errorState" class="alert alert-danger d-none mt-4 rounded-3">
            <i class="fa-solid fa-triangle-exclamation me-2"></i> <span id="errorMsg">Could not analyze URL. Please ensure it is publicly accessible and starts with https://</span>
          </div>

          <!-- Results Section -->
          <div id="speedResultsArea" class="d-none mt-4 pt-4 border-top">
            
            <!-- Scores Overview Grid -->
            <div class="row g-3 text-center mb-4">
              <div class="col-md-3 col-6">
                <div class="score-circle score-good" id="scorePerf">95</div>
                <div class="fw-bold text-dark">Performance</div>
              </div>
              <div class="col-md-3 col-6">
                <div class="score-circle score-good" id="scoreA11y">98</div>
                <div class="fw-bold text-dark">Accessibility</div>
              </div>
              <div class="col-md-3 col-6">
                <div class="score-circle score-good" id="scoreBp">100</div>
                <div class="fw-bold text-dark">Best Practices</div>
              </div>
              <div class="col-md-3 col-6">
                <div class="score-circle score-good" id="scoreSeo">100</div>
                <div class="fw-bold text-dark">SEO Health</div>
              </div>
            </div>

            <!-- Core Web Vitals Metrics -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-stopwatch text-primary me-2"></i> Core Web Vitals &amp; Timing Metrics</h5>
            <div class="row g-3 mb-4">
              <div class="col-md-4">
                <div class="cwv-card">
                  <small class="text-muted fw-bold d-block">Largest Contentful Paint (LCP)</small>
                  <h4 class="fw-extrabold text-success mb-1" id="valLcp">1.2 s</h4>
                  <small class="text-muted">Good &le; 2.5s &bull; Measures main content render speed</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cwv-card">
                  <small class="text-muted fw-bold d-block">Total Blocking Time (TBT)</small>
                  <h4 class="fw-extrabold text-success mb-1" id="valTbt">40 ms</h4>
                  <small class="text-muted">Good &le; 200ms &bull; Measures CPU responsiveness</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="cwv-card">
                  <small class="text-muted fw-bold d-block">Cumulative Layout Shift (CLS)</small>
                  <h4 class="fw-extrabold text-success mb-1" id="valCls">0.01</h4>
                  <small class="text-muted">Good &le; 0.1 &bull; Measures visual page stability</small>
                </div>
              </div>
            </div>

            <!-- Optimization Recommendations -->
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-lightbulb text-warning me-2"></i> Actionable Speed Recommendations</h5>
            <div class="list-group" id="recommendationsList">
              <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3">
                <i class="fa-solid fa-circle-check text-success fa-lg"></i>
                <div>
                  <h6 class="mb-1 fw-bold text-dark">Modern WebP &amp; AVIF Image Compression</h6>
                  <p class="mb-0 text-muted small">Images are efficiently served in next-gen formats, reducing total payload by over 60%.</p>
                </div>
              </div>
              <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3">
                <i class="fa-solid fa-circle-check text-success fa-lg"></i>
                <div>
                  <h6 class="mb-1 fw-bold text-dark">Browser Caching &amp; GZIP Compression Active</h6>
                  <p class="mb-0 text-muted small">Static assets (CSS, JS, Fonts) leverage 1-year cache headers and DEFLATE compression.</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <!-- 3. HOW TO USE & DETAILS -->
        <div class="content-section mt-5">
          <h2>Understanding Google Lighthouse Speed Metrics</h2>
          <p>
            Google measures real-world user experience across three core pillars: <strong>Loading Speed (LCP)</strong>, <strong>Interactivity (INP/TBT)</strong>, and <strong>Visual Stability (CLS)</strong>.
          </p>

          <h2>Core Web Vitals Thresholds (2026)</h2>
          <div class="table-responsive">
            <table class="table table-bordered bg-white">
              <thead class="table-light">
                <tr>
                  <th>Metric</th>
                  <th>Good (Fast)</th>
                  <th>Needs Improvement</th>
                  <th>Poor</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><strong>LCP (Largest Contentful Paint)</strong></td>
                  <td class="text-success fw-bold">&le; 2.5 sec</td>
                  <td class="text-warning fw-bold">2.5s - 4.0s</td>
                  <td class="text-danger fw-bold">&gt; 4.0 sec</td>
                </tr>
                <tr>
                  <td><strong>INP / TBT (Responsiveness)</strong></td>
                  <td class="text-success fw-bold">&le; 200 ms</td>
                  <td class="text-warning fw-bold">200ms - 500ms</td>
                  <td class="text-danger fw-bold">&gt; 500 ms</td>
                </tr>
                <tr>
                  <td><strong>CLS (Cumulative Layout Shift)</strong></td>
                  <td class="text-success fw-bold">&le; 0.1</td>
                  <td class="text-warning fw-bold">0.1 - 0.25</td>
                  <td class="text-danger fw-bold">&gt; 0.25</td>
                </tr>
              </tbody>
            </table>
          </div>

          <h2>Frequently Asked Questions</h2>
          <details class="faq-card" open>
            <summary>Why is Mobile speed usually lower than Desktop speed?</summary>
            <p>Mobile audits simulate standard 4G network throttling and mid-tier mobile CPU processing power to represent the experience of typical on-the-go smartphone users.</p>
          </details>
          <details class="faq-card">
            <summary>How can NikhilWorks help boost my website speed to 90+?</summary>
            <p>We optimize server caching, compress media to WebP, eliminate render-blocking JavaScript/CSS, configure CDNs, and refactor heavy codebases for instant sub-second load times.</p>
          </details>

          <h2>Related Free Tools</h2>
          <div class="row g-3 mt-1">
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/index-checker/" class="text-decoration-none text-dark"><i class="fa-brands fa-google text-primary me-1"></i> Google Index Checker</a></h6>
                <small class="text-muted">Check if Google has indexed your webpage.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>tools/ssl-checker/" class="text-decoration-none text-dark"><i class="fa-solid fa-shield-halved text-success me-1"></i> SSL &amp; Security Checker</a></h6>
                <small class="text-muted">Test HTTPS certificate validity &amp; TLS cipher.</small>
              </div>
            </div>
            <div class="col-md-4">
              <div class="p-3 bg-light rounded-3 border h-100">
                <h6 class="fw-bold"><a href="<?= $site ?>seo-auditor/" class="text-decoration-none text-dark"><i class="fa-solid fa-stethoscope text-danger me-1"></i> Free SEO Auditor</a></h6>
                <small class="text-muted">Complete 50-point technical SEO website health scan.</small>
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
      <h2 class="text-light fw-bold mb-2">Want a 95+ PageSpeed Score on Google Lighthouse?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks delivers guaranteed 90+ PageSpeed optimizations for WordPress, PHP, and modern web applications.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Speed Optimization Quote <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function getScoreClass(score) {
      if (score >= 90) return 'score-good';
      if (score >= 50) return 'score-avg';
      return 'score-poor';
    }

    function runSpeedAudit() {
      let url = $('#testUrl').val().trim();
      if (!url) {
        alert('Please enter a website URL.');
        return;
      }
      if (!url.startsWith('http://') && !url.startsWith('https://')) {
        url = 'https://' + url;
        $('#testUrl').val(url);
      }

      const strategy = $('#deviceStrategy').val();
      const btn = $('#btnAudit');
      const loader = $('#loadingState');
      const errBox = $('#errorState');
      const resArea = $('#speedResultsArea');

      btn.prop('disabled', true);
      loader.removeClass('d-none');
      errBox.addClass('d-none');
      resArea.addClass('d-none');

      // Call Google PageSpeed Insights API directly via public endpoint
      const apiUrl = `https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url=${encodeURIComponent(url)}&strategy=${strategy}&category=performance&category=accessibility&category=best-practices&category=seo`;

      $.ajax({
        url: apiUrl,
        type: 'GET',
        dataType: 'json',
        timeout: 45000,
        success: function(data) {
          btn.prop('disabled', false);
          loader.addClass('d-none');

          if (data && data.lighthouseResult) {
            const lr = data.lighthouseResult;
            const cats = lr.categories || {};
            const audits = lr.audits || {};

            const perf = Math.round((cats['performance']?.score || 0) * 100);
            const a11y = Math.round((cats['accessibility']?.score || 0) * 100);
            const bp = Math.round((cats['best-practices']?.score || 0) * 100);
            const seo = Math.round((cats['seo']?.score || 0) * 100);

            $('#scorePerf').text(perf).attr('class', 'score-circle ' + getScoreClass(perf));
            $('#scoreA11y').text(a11y).attr('class', 'score-circle ' + getScoreClass(a11y));
            $('#scoreBp').text(bp).attr('class', 'score-circle ' + getScoreClass(bp));
            $('#scoreSeo').text(seo).attr('class', 'score-circle ' + getScoreClass(seo));

            // Timing metrics
            const lcp = audits['largest-contentful-paint']?.displayValue || '1.4 s';
            const tbt = audits['total-blocking-time']?.displayValue || '50 ms';
            const cls = audits['cumulative-layout-shift']?.displayValue || '0.02';

            $('#valLcp').text(lcp);
            $('#valTbt').text(tbt);
            $('#valCls').text(cls);

            // Populate Opportunities / Recommendations
            const list = $('#recommendationsList');
            list.empty();

            const opps = [
              'render-blocking-resources',
              'unused-css-rules',
              'unused-javascript',
              'modern-image-formats',
              'uses-optimized-images',
              'server-response-time',
              'uses-text-compression'
            ];

            let added = 0;
            opps.forEach(key => {
              const audit = audits[key];
              if (audit && (audit.score === null || audit.score < 0.9)) {
                list.append(`
                  <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3">
                    <i class="fa-solid fa-triangle-exclamation text-warning fa-lg"></i>
                    <div>
                      <h6 class="mb-1 fw-bold text-dark">${audit.title}</h6>
                      <p class="mb-0 text-muted small">${audit.displayValue ? `Potential savings: <strong>${audit.displayValue}</strong> &bull; ` : ''}${audit.description ? audit.description.split('.')[0] + '.' : ''}</p>
                    </div>
                  </div>
                `);
                added++;
              }
            });

            if (added === 0) {
              list.append(`
                <div class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3">
                  <i class="fa-solid fa-circle-check text-success fa-lg"></i>
                  <div>
                    <h6 class="mb-1 fw-bold text-dark">Exceptional Optimization!</h6>
                    <p class="mb-0 text-muted small">No major performance bottlenecks identified by Lighthouse engine.</p>
                  </div>
                </div>
              `);
            }

            resArea.removeClass('d-none');
            $('html, body').animate({
              scrollTop: resArea.offset().top - 80
            }, 500);
          } else {
            $('#errorMsg').text('Unexpected response structure from Lighthouse API.');
            errBox.removeClass('d-none');
          }
        },
        error: function(xhr) {
          btn.prop('disabled', false);
          loader.addClass('d-none');
          $('#errorMsg').text('Failed to query PageSpeed API. Please verify the URL and try again.');
          errBox.removeClass('d-none');
        }
      });
    }
  </script>
</body>
</html>
