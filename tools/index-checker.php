<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Google Index & Cache Checker — Test SERP Indexation | NikhilWorks";
$metaDesc = "Check if your webpage or domain is indexed on Google. Inspect cached date snapshots and verify crawlability with 1-click Google site query tester.";
$canonical = $site . "tools/index-checker/";
$metaKeywords = "google index checker, test if url is indexed on google, google cache checker online, site query checker free, google index status test india";
$currentTool = 'index-checker';
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
            <div class="tool-header-icon icon-blue">
              <i class="fa-brands fa-google"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Google Index &amp; Cache Checker</h1>
              <p class="tool-header-desc">Inspect if your webpage is indexed in Google's database index, test site queries &amp; verify indexation health.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('index-checker')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Index Query History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Form Inputs Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-magnifying-glass-arrow-right text-info me-2"></i> Enter Webpage or Domain</h6>

            <div class="mb-3">
              <label class="form-label">Webpage URL <span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                <input type="url" id="indexUrl" class="form-control" placeholder="https://example.com/blog/post" value="https://nikhilworks.com" required>
              </div>
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="button" class="topbar-btn topbar-btn-primary flex-fill justify-content-center py-3" onclick="checkIndexStatus()">
                <i class="fa-brands fa-google me-1"></i> Check Google Indexation
              </button>
            </div>
          </div>

          <!-- Quick Actions & Diagnostics -->
          <div class="col-lg-6">
            <div class="tool-output-panel align-items-stretch text-start">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-bolt text-warning me-2"></i> Direct Google Search Links</h6>

              <div class="d-flex flex-column gap-2 mb-4">
                <a href="https://www.google.com/search?q=site:https://nikhilworks.com" target="_blank" id="btnSiteQuery" class="topbar-btn topbar-btn-ghost justify-content-between">
                  <span><i class="fa-brands fa-google me-2 text-info"></i> Specific URL Index Query</span>
                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
                <a href="https://www.google.com/search?q=site:nikhilworks.com" target="_blank" id="btnDomainQuery" class="topbar-btn topbar-btn-ghost justify-content-between">
                  <span><i class="fa-solid fa-sitemap me-2 text-success"></i> Entire Domain Index Query</span>
                  <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
              </div>

              <h6 class="text-white fw-bold mb-2 small"><i class="fa-solid fa-clipboard-check text-success me-1"></i> Indexing Health Checklist</h6>
              <div class="d-flex flex-column gap-2 small text-muted">
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Ensure <code>&lt;meta name="robots" content="noindex"&gt;</code> is NOT present.
                </div>
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Verify that <code>robots.txt</code> permits Googlebot crawling.
                </div>
                <div class="d-flex align-items-center gap-2">
                  <i class="fa-solid fa-circle-check text-success"></i> Submit XML Sitemap (<code>/sitemap.xml</code>) to Google Search Console.
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

      // Save to History
      const title = `Index Check: ${domain}`;
      const summary = `Query: site:${raw}`;
      const payload = {
        url: raw,
        domain: domain
      };
      ToolsApp.saveHistory('index-checker', title, summary, payload);

      window.open(siteQueryUrl, '_blank');
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'index-checker' && payload) {
        if (payload.url) $('#indexUrl').val(payload.url);
      }
    });
  </script>
</body>
</html>
