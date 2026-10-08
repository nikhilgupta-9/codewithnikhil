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
$metaKeywords = "robots txt validator, robots txt tester free, googlebot simulator, test disallow rules, crawl directives validator india";
$currentTool = 'robots-validator';
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
    .robots-editor {
      font-family: var(--code-font);
      font-size: 13px;
      line-height: 1.6;
      background: #040c0d;
      color: #38bdf8;
      border: 1px solid var(--border-subtle);
      border-radius: 12px;
      min-height: 320px;
    }
    .status-pill {
      display: inline-flex;
      align-items: center;
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 13px;
      font-weight: 700;
    }
    .status-allowed { background: rgba(34, 197, 94, 0.15); color: #22c55e; border: 1px solid #22c55e; }
    .status-blocked { background: rgba(239, 68, 68, 0.15); color: #ef4444; border: 1px solid #ef4444; }
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
            <div class="tool-header-icon icon-orange">
              <i class="fa-solid fa-robot"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Robots.txt Validator &amp; Crawl Tester</h1>
              <p class="tool-header-desc">Test robots.txt syntax errors, verify Googlebot crawler rules, check sitemap directives, and simulate URL blocking.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('robots-validator')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Robots History
            </button>
          </div>
        </div>

        <!-- Live Domain Fetcher Bar -->
        <div class="row g-3 mb-4">
          <div class="col-md-9">
            <label class="form-label">Fetch Live Robots.txt from Website</label>
            <div class="input-group">
              <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
              <input type="text" id="fetchDomain" class="form-control" placeholder="nikhilworks.com" value="nikhilworks.com">
            </div>
          </div>
          <div class="col-md-3 d-flex align-items-end">
            <button type="button" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center" onclick="fetchLiveRobots()">
              <i class="fa-solid fa-cloud-arrow-down me-1"></i> Fetch Live File
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Editor Column -->
          <div class="col-lg-7">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <label class="form-label mb-0"><i class="fa-solid fa-code text-cyan me-1"></i> Robots.txt Content</label>
              <button type="button" class="btn btn-sm btn-outline-secondary text-white border-0" onclick="copyRobotsText()">
                <i class="fa-regular fa-copy me-1"></i> Copy
              </button>
            </div>

            <textarea id="robotsInput" class="form-control robots-editor">User-agent: *
Disallow: /admin/
Disallow: /config/
Disallow: /cron/
Disallow: /tmp/
Allow: /

Sitemap: https://nikhilworks.com/sitemap.xml
Sitemap: https://nikhilworks.com/sitemap-blogs.xml</textarea>

            <div class="mt-3">
              <button type="button" class="topbar-btn topbar-btn-primary w-100 py-2 justify-content-center" onclick="saveRobotsToHistory()">
                <i class="fa-solid fa-floppy-disk me-1"></i> Save Robots.txt to History
              </button>
            </div>
          </div>

          <!-- URL Blocking Simulation Column -->
          <div class="col-lg-5">
            <div class="tool-output-panel align-items-stretch text-start">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-vial text-warning me-2"></i> URL Block Simulation Tester</h6>
              
              <div class="mb-3">
                <label class="form-label">Test URL Path (e.g. /admin/login.php or /blog/)</label>
                <input type="text" id="testPath" class="form-control" placeholder="/admin/dashboard" value="/admin/dashboard">
              </div>

              <!-- Test Verdict -->
              <div class="p-3 rounded mb-3 text-center" style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle);">
                <small class="text-muted d-block mb-1">Googlebot Crawl Verdict:</small>
                <div id="crawlStatusBadge" class="status-pill status-blocked">
                  <i class="fa-solid fa-ban me-1"></i> Blocked by Disallow: /admin/
                </div>
              </div>

              <h6 class="text-white fw-bold mb-2 small"><i class="fa-solid fa-list-check text-info me-1"></i> Detected Directives</h6>
              <div class="d-flex flex-column gap-2">
                <div class="p-2 rounded d-flex justify-content-between small" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle);">
                  <span class="text-muted">Target User-Agents:</span>
                  <strong class="text-white" id="detUserAgent">* (All Crawlers)</strong>
                </div>
                <div class="p-2 rounded d-flex justify-content-between small" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle);">
                  <span class="text-muted">Disallow Rules:</span>
                  <strong class="text-warning" id="detDisallowCount">4 paths blocked</strong>
                </div>
                <div class="p-2 rounded d-flex justify-content-between small" style="background: rgba(255,255,255,0.02); border: 1px solid var(--border-subtle);">
                  <span class="text-muted">Sitemaps Declared:</span>
                  <strong class="text-success" id="detSitemapCount">2 sitemaps found</strong>
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
    function analyzeRobots() {
      const content = $('#robotsInput').val();
      const lines = content.split('\n');

      let userAgent = '*';
      let disallowCount = 0;
      let sitemapCount = 0;

      lines.forEach(line => {
        const trimmed = line.trim();
        if (trimmed.toLowerCase().startsWith('user-agent:')) {
          userAgent = trimmed.split(':')[1].trim() || '*';
        }
        if (trimmed.toLowerCase().startsWith('disallow:')) {
          const rule = trimmed.split(':')[1].trim();
          if (rule) disallowCount++;
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
            ToolsApp.showToast('Fetched live robots.txt! 🚀');
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
      if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(() => ToolsApp.showToast('Robots.txt copied! 📋'));
      } else {
        $('#robotsInput').select();
        document.execCommand('copy');
        ToolsApp.showToast('Robots.txt copied! 📋');
      }
    }

    function saveRobotsToHistory() {
      const domain = $('#fetchDomain').val() || 'Custom';
      const path = $('#testPath').val() || '/';
      const title = `Robots.txt: ${domain}`;
      const summary = `Disallow Rules: ${$('#detDisallowCount').text()} | Tested: ${path}`;
      const payload = {
        domain: domain,
        content: $('#robotsInput').val(),
        testPath: path
      };

      ToolsApp.saveHistory('robots-validator', title, summary, payload);
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'robots-validator' && payload) {
        if (payload.domain) $('#fetchDomain').val(payload.domain);
        if (payload.content) $('#robotsInput').val(payload.content);
        if (payload.testPath) $('#testPath').val(payload.testPath);
        analyzeRobots();
      }
    });

    $('#testPath, #robotsInput').on('input', analyzeRobots);
    $(document).ready(analyzeRobots);
  </script>
</body>
</html>
