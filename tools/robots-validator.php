<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

// Handle live robots.txt fetch
if (isset($_POST['action']) && $_POST['action'] === 'fetch_robots') {
    header('Content-Type: application/json');
    $url = trim($_POST['url'] ?? '');
    if (!preg_match('#^https?://#i', $url)) {
        $url = 'https://' . $url;
    }
    $domain = parse_url($url, PHP_URL_HOST);
    if (!$domain) {
        echo json_encode(['success' => false, 'message' => 'Invalid domain or URL.']);
        exit;
    }
    $robotsUrl = "https://" . $domain . "/robots.txt";

    $ch = curl_init($robotsUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_USERAGENT => 'NikhilWorks-RobotsValidator/1.0'
    ]);
    $content = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200 && $content !== false) {
        echo json_encode(['success' => true, 'robotsUrl' => $robotsUrl, 'content' => $content]);
    } else {
        echo json_encode(['success' => false, 'message' => "Could not fetch robots.txt (HTTP {$httpCode}). You can paste your content manually."]);
    }
    exit;
}

$pageTitle = "Free Robots.txt Validator & Tester — Audit Crawler Directives | NikhilWorks";
$metaDesc = "Test and validate your robots.txt file online. Verify User-agent syntax, check Disallow / Allow crawl directives, locate Sitemaps, and test URL blocking.";
$canonical = $site . "tools/robots-validator/";
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
    "name": "Robots.txt Validator and Tester Tool",
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
      { "@type": "ListItem", "position": 3, "name": "Robots.txt Validator" }
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
        "name": "What is the primary purpose of a robots.txt file?",
        "acceptedAnswer": { "@type": "Answer", "text": "A robots.txt file instructs search engine crawlers (Googlebot, Bingbot) which URLs and directories they are permitted or forbidden to crawl on your website." }
      },
      {
        "@type": "Question",
        "name": "Does robots.txt prevent a page from appearing in Google search?",
        "acceptedAnswer": { "@type": "Answer", "text": "Not necessarily. If external backlinks point to a disallowed URL, Google may still index the URL. To guarantee exclusion, use a 'noindex' meta tag instead." }
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
      background: linear-gradient(135deg, #072223 0%, #104041 60%, #991b1b 100%);
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
    .status-pill {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 12px;
      border-radius: 20px;
      font-size: 13px;
      font-weight: 700;
    }
    .status-allowed { background: #dcfce7; color: #16a34a; }
    .status-blocked { background: #fee2e2; color: #dc2626; }

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
        <span class="text-white fw-bold">Robots.txt Validator</span>
      </nav>
      <h1 class="fw-extrabold text-white mb-2">Free Robots.txt Validator &amp; Directive Tester</h1>
      <p class="lead opacity-90 mx-auto mb-0" style="max-width: 680px; font-size: 16px;">
        Validate robots.txt syntax, inspect User-agent directives, verify XML Sitemaps, and test URL crawl permissions.
      </p>
    </div>
  </div>

  <div class="container my-5">
    <div class="row g-4">
      
      <!-- Editor Column -->
      <div class="col-lg-6">
        <div class="tool-card-box">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-code text-primary me-2"></i> Robots.txt Editor</h5>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="fetchLiveRobots()">
              <i class="fa-solid fa-download me-1"></i> Fetch Live URL
            </button>
          </div>

          <!-- Quick URL Fetcher -->
          <div class="input-group mb-3 mt-2">
            <input type="text" id="fetchDomain" class="form-control form-control-sm" placeholder="e.g. nikhilworks.com" value="nikhilworks.com">
            <button class="btn btn-dark btn-sm" type="button" onclick="fetchLiveRobots()">Fetch</button>
          </div>

          <textarea id="robotsInput" class="form-control font-monospace small bg-light" rows="12" placeholder="User-agent: *&#10;Disallow: /admin/&#10;Disallow: /private/&#10;Allow: /&#10;&#10;Sitemap: https://example.com/sitemap.xml">User-agent: *
Disallow: /admin/
Disallow: /cron/
Disallow: /logs/
Disallow: /migrations/
Disallow: /lib/
Allow: /

Sitemap: https://nikhilworks.com/sitemap.xml
Sitemap: https://nikhilworks.com/sitemap-main.xml
Sitemap: https://nikhilworks.com/sitemap-blogs.xml</textarea>

          <button type="button" class="btn btn-primary w-100 fw-bold py-2 mt-3" onclick="analyzeRobots()">
            <i class="fa-solid fa-vial-circle-check me-1"></i> Validate Directives &amp; Syntax
          </button>
        </div>
      </div>

      <!-- Test & Audit Results Column -->
      <div class="col-lg-6">
        <div class="tool-card-box h-100 d-flex flex-column justify-content-between">
          <div>
            <h5 class="fw-bold text-dark mb-3"><i class="fa-solid fa-square-poll-vertical text-success me-2"></i> Live URL Crawl Simulator</h5>
            
            <!-- URL Tester Input -->
            <div class="mb-4">
              <label class="form-label fw-bold">Test Specific URL Path:</label>
              <div class="input-group">
                <input type="text" id="testPath" class="form-control" placeholder="/admin/dashboard.php" value="/admin/login.php">
                <button class="btn btn-dark fw-bold" type="button" onclick="testUrlBlocking()">Test Crawl</button>
              </div>
            </div>

            <!-- Crawl Status Result Box -->
            <div class="p-3 bg-light rounded-3 border mb-4 text-center" id="crawlResultBox">
              <span class="text-muted fw-bold d-block mb-1">Googlebot Crawl Status:</span>
              <div id="crawlStatusBadge" class="status-pill status-blocked">
                <i class="fa-solid fa-ban me-1"></i> Blocked by Disallow: /admin/
              </div>
            </div>

            <!-- Detected Directives Summary -->
            <h6 class="fw-bold text-dark mb-2">Detected Directives:</h6>
            <ul class="list-group list-group-flush border rounded-3 small" id="directivesList">
              <li class="list-group-item d-flex justify-content-between">
                <span>User-agent</span>
                <strong class="text-primary" id="detUserAgent">* (All Crawlers)</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Disallow Rules</span>
                <strong class="text-danger" id="detDisallowCount">5 paths blocked</strong>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <span>Sitemaps Declared</span>
                <strong class="text-success" id="detSitemapCount">3 sitemaps found</strong>
              </li>
            </ul>
          </div>

          <div class="mt-4">
            <button type="button" class="btn btn-outline-dark w-100" onclick="copyRobotsText()">
              <i class="fa-regular fa-copy me-1"></i> Copy Robots.txt Content
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- CONTENT SECTION -->
    <div class="content-section mt-5">
      <h2>How Robots.txt Directives Work</h2>
      <p>
        The <code>robots.txt</code> file is the first asset accessed by search engines like Googlebot and Bingbot before indexing your site.
        It specifies access rules using directives such as:
      </p>
      <ul>
        <li><code>User-agent: *</code> — Applies following rules to all web crawlers.</li>
        <li><code>Disallow: /admin/</code> — Instructs robots not to crawl any URL starting with <code>/admin/</code>.</li>
        <li><code>Allow: /</code> — Explicitly permits crawling of the main directory.</li>
        <li><code>Sitemap: https://...</code> — Declares the location of your XML sitemap.</li>
      </ul>

      <h2>Frequently Asked Questions</h2>
      <details class="faq-card" open>
        <summary>Where should the robots.txt file be located?</summary>
        <p>It must be placed at the absolute root of your domain (e.g. <code>https://yourdomain.com/robots.txt</code>). It will not work inside subdirectories.</p>
      </details>
      <details class="faq-card">
        <summary>Does robots.txt hide private passwords or admin panels?</summary>
        <p>No. Robots.txt is publicly visible to anyone on the internet. Never store secret URLs in robots.txt. Use robust password authentication and IP whitelisting instead.</p>
      </details>

      <h2>Related Free Tools</h2>
      <div class="row g-3 mt-1">
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/index-checker/" class="text-decoration-none text-dark"><i class="fa-brands fa-google text-primary me-1"></i> Google Index Checker</a></h6>
            <small class="text-muted">Check live Google indexing status.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>tools/meta-preview/" class="text-decoration-none text-dark"><i class="fa-solid fa-tags text-success me-1"></i> Meta Tags Preview</a></h6>
            <small class="text-muted">Preview Google SERP and Social snippets.</small>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 bg-light rounded-3 border h-100">
            <h6 class="fw-bold"><a href="<?= $site ?>seo-auditor/" class="text-decoration-none text-dark"><i class="fa-solid fa-stethoscope text-danger me-1"></i> Free SEO Auditor</a></h6>
            <small class="text-muted">Full 50-point technical SEO health scan.</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- CTA BANNER -->
  <div class="cta4-section-area sp1" style="background: linear-gradient(135deg, #104041 0%, #0d2e2f 100%);">
    <div class="container text-center">
      <h2 class="text-light fw-bold mb-2">Need Technical SEO Audit &amp; Crawl Budget Optimization?</h2>
      <p class="text-light opacity-75 mb-4" style="max-width: 600px; margin: 0 auto;">
        NikhilWorks resolves crawl budget waste, server indexing errors, and canonical conflicts for fast SEO growth.
      </p>
      <a href="<?= $site ?>contact/" class="header-btn9">Get Technical SEO Proposal <i class="fa-solid fa-arrow-right"></i></a>
    </div>
  </div>

  <?php include_once dirname(__DIR__) . "/includes/footer.php" ?>

  <script>
    function analyzeRobots() {
      const content = $('#robotsInput').val();
      const lines = content.split('\n');

      let disallowCount = 0;
      let sitemapCount = 0;
      let userAgent = '*';

      lines.forEach(line => {
        const trimmed = line.trim();
        if (trimmed.toLowerCase().startsWith('user-agent:')) {
          userAgent = trimmed.split(':')[1].trim();
        }
        if (trimmed.toLowerCase().startsWith('disallow:')) {
          disallowCount++;
        }
        if (trimmed.toLowerCase().startsWith('sitemap:')) {
          sitemapCount++;
        }
      });

      $('#detUserAgent').text(userAgent);
      $('#detDisallowCount').text(disallowCount + ' paths blocked');
      $('#detSitemapCount').text(sitemapCount + ' sitemaps found');
      testUrlBlocking();
    }

    function testUrlBlocking() {
      const path = $('#testPath').val().trim();
      const content = $('#robotsInput').val();
      const lines = content.split('\n');

      let isBlocked = false;
      let blockRule = '';

      lines.forEach(line => {
        const trimmed = line.trim();
        if (trimmed.toLowerCase().startsWith('disallow:')) {
          const rule = trimmed.split(':')[1].trim();
          if (rule && path.startsWith(rule)) {
            isBlocked = true;
            blockRule = rule;
          }
        }
      });

      if (isBlocked) {
        $('#crawlStatusBadge')
          .attr('class', 'status-pill status-blocked')
          .html(`<i class="fa-solid fa-ban me-1"></i> Blocked by Disallow: ${blockRule}`);
      } else {
        $('#crawlStatusBadge')
          .attr('class', 'status-pill status-allowed')
          .html('<i class="fa-solid fa-circle-check me-1"></i> Allowed (Crawlers Permitted)');
      }
    }

    function fetchLiveRobots() {
      const domain = $('#fetchDomain').val().trim();
      if (!domain) {
        alert('Please enter a domain.');
        return;
      }

      $.ajax({
        url: '',
        type: 'POST',
        data: {
          action: 'fetch_robots',
          url: domain
        },
        dataType: 'json',
        success: function(res) {
          if (res.success && res.content) {
            $('#robotsInput').val(res.content);
            analyzeRobots();
          } else {
            alert(res.message || 'Could not fetch live robots.txt');
          }
        },
        error: function() {
          alert('Error connecting to server.');
        }
      });
    }

    function copyRobotsText() {
      const text = $('#robotsInput').val();
      navigator.clipboard.writeText(text);
      alert('Robots.txt content copied to clipboard!');
    }

    $('#testPath, #robotsInput').on('input', analyzeRobots);
    $(document).ready(analyzeRobots);
  </script>
</body>
</html>
