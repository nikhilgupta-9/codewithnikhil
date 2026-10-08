<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Free Meta Tags & Open Graph Preview Tool — SERP Simulator | NikhilWorks";
$metaDesc = "Test and simulate your webpage meta title, description and Open Graph (og:) image across Google SERPs, Facebook, Twitter and LinkedIn. 100% free.";
$canonical = $site . "tools/meta-preview/";
$metaKeywords = "meta tag preview tool, serp simulator free, open graph tester, og image preview, twitter card validator, google search snippet preview";
$currentTool = 'meta-preview';
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
    .serp-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 12px;
      padding: 18px 20px;
      font-family: Arial, sans-serif;
      text-align: left;
    }
    .serp-url {
      color: #202124;
      font-size: 13px;
      margin-bottom: 4px;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .serp-title {
      color: #1a0dab;
      font-size: 18px;
      font-weight: 400;
      line-height: 1.3;
      margin-bottom: 6px;
      cursor: pointer;
    }
    .serp-title:hover {
      text-decoration: underline;
    }
    .serp-desc {
      color: #4d5156;
      font-size: 13.5px;
      line-height: 1.5;
    }
    .social-card {
      background: #1e293b;
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: 12px;
      overflow: hidden;
      text-align: left;
    }
    .social-img-wrap {
      width: 100%;
      height: 180px;
      background: #0f172a;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #64748b;
      overflow: hidden;
    }
    .social-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .social-body {
      padding: 14px 16px;
    }
    .social-domain {
      font-size: 11px;
      color: #94a3b8;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 3px;
    }
    .social-title {
      font-size: 14.5px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4px;
      line-height: 1.3;
    }
    .social-desc {
      font-size: 12.5px;
      color: #cbd5e1;
      line-height: 1.4;
      margin: 0;
    }
    .char-pill {
      font-size: 11.5px;
      padding: 2px 7px;
      border-radius: 6px;
      background: rgba(255,255,255,0.08);
      color: var(--text-muted);
    }
    .char-pill.good { color: #34d399; }
    .char-pill.warn { color: #fbbf24; }
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
            <div class="tool-header-icon icon-purple">
              <i class="fa-solid fa-tags"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Meta Tags &amp; Social SERP Simulator</h1>
              <p class="tool-header-desc">Simulate live title, meta description &amp; Open Graph (og:) card rendering across Google, Facebook, Twitter and LinkedIn.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('meta-preview')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Meta History
            </button>
          </div>
        </div>

        <div class="row g-4">
          <!-- Inputs Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-sliders text-info me-2"></i> Page Metadata Input</h6>

            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label mb-0">Meta Title <span class="text-danger">*</span></label>
                <span id="titleCounter" class="char-pill good">0 / 60 chars</span>
              </div>
              <input type="text" id="inTitle" class="form-control" placeholder="e.g. Best Freelance Web Developer in Delhi | NikhilWorks" value="Best Freelance Web Developer in Delhi | NikhilWorks">
            </div>

            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label mb-0">Meta Description</label>
                <span id="descCounter" class="char-pill good">0 / 160 chars</span>
              </div>
              <textarea id="inDesc" class="form-control" rows="3" placeholder="e.g. Expert custom web design, SEO optimization, and CRM development. 100+ projects delivered with 5-star ratings.">Expert custom web development, SEO optimization, and CRM engineering. 100+ successful projects delivered with 5-star client reviews.</textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Canonical Webpage URL</label>
              <input type="url" id="inUrl" class="form-control" placeholder="https://nikhilworks.com" value="https://nikhilworks.com">
            </div>

            <div class="mb-3">
              <label class="form-label">Open Graph (OG) Image URL</label>
              <input type="url" id="inImage" class="form-control" placeholder="https://nikhilworks.com/og-image.jpg" value="https://nikhilworks.com/assets/img/logo/og-tools.jpg">
            </div>

            <div class="d-flex gap-2 mt-4">
              <button type="button" class="topbar-btn topbar-btn-primary flex-fill justify-content-center py-3" onclick="generateMetaCode()">
                <i class="fa-solid fa-code me-1"></i> Generate &amp; Copy Tags
              </button>
              <button type="button" class="topbar-btn topbar-btn-ghost py-3" onclick="saveMetaToHistory()">
                <i class="fa-solid fa-floppy-disk"></i>
              </button>
            </div>

            <div id="codeOutputBox" class="mt-3 d-none">
              <textarea id="rawMetaCode" class="form-control" rows="6" style="font-family: var(--code-font); font-size: 12px; background: #040c0d; color: #38bdf8;" readonly></textarea>
            </div>
          </div>

          <!-- Preview Column -->
          <div class="col-lg-6">
            <h6 class="fw-bold text-white mb-3"><i class="fa-brands fa-google text-warning me-2"></i> Google Search SERP Preview</h6>
            <div class="serp-card mb-4">
              <div class="serp-url">
                <i class="fa-solid fa-globe text-muted small"></i>
                <span id="serpUrlDisplay">nikhilworks.com</span>
              </div>
              <div class="serp-title" id="serpTitleDisplay">Best Freelance Web Developer in Delhi | NikhilWorks</div>
              <div class="serp-desc" id="serpDescDisplay">Expert custom web development, SEO optimization, and CRM engineering. 100+ successful projects delivered with 5-star client reviews.</div>
            </div>

            <h6 class="fw-bold text-white mb-3"><i class="fa-solid fa-share-nodes text-primary me-2"></i> Social Share Card Preview</h6>
            <div class="social-card">
              <div class="social-img-wrap" id="ogImgWrap">
                <img id="ogImgTag" src="https://nikhilworks.com/assets/img/logo/og-tools.jpg" alt="Preview Image" onerror="this.style.display='none'">
              </div>
              <div class="social-body">
                <div class="social-domain" id="ogDomainDisplay">NIKHILWORKS.COM</div>
                <div class="social-title" id="ogTitleDisplay">Best Freelance Web Developer in Delhi | NikhilWorks</div>
                <p class="social-desc" id="ogDescDisplay">Expert custom web development, SEO optimization, and CRM engineering...</p>
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
    function updatePreviews() {
      const title = $('#inTitle').val().trim() || 'Untitled Page';
      const desc = $('#inDesc').val().trim() || 'No meta description provided.';
      const url = $('#inUrl').val().trim() || 'https://nikhilworks.com';
      const img = $('#inImage').val().trim() || '';

      // Counters
      const tLen = title.length;
      $('#titleCounter').text(`${tLen} / 60 chars`).attr('class', 'char-pill ' + (tLen > 0 && tLen <= 60 ? 'good' : 'warn'));

      const dLen = desc.length;
      $('#descCounter').text(`${dLen} / 160 chars`).attr('class', 'char-pill ' + (dLen > 0 && dLen <= 160 ? 'good' : 'warn'));

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

      const code = `<!-- Primary Meta Tags -->\n<title>${title}</title>\n<meta name="title" content="${title}">\n<meta name="description" content="${desc}">\n<link rel="canonical" href="${url}">\n\n<!-- Open Graph / Facebook -->\n<meta property="og:type" content="website">\n<meta property="og:url" content="${url}">\n<meta property="og:title" content="${title}">\n<meta property="og:description" content="${desc}">\n<meta property="og:image" content="${img}">\n\n<!-- Twitter -->\n<meta property="twitter:card" content="summary_large_image">\n<meta property="twitter:url" content="${url}">\n<meta property="twitter:title" content="${title}">\n<meta property="twitter:description" content="${desc}">\n<meta property="twitter:image" content="${img}">`;

      $('#rawMetaCode').val(code);
      $('#codeOutputBox').removeClass('d-none');
      if (navigator.clipboard) {
        navigator.clipboard.writeText(code).then(() => ToolsApp.showToast('Meta tags copied! 📋'));
      } else {
        ToolsApp.showToast('Meta tags generated!');
      }

      saveMetaToHistory();
    }

    function saveMetaToHistory() {
      const title = `Meta: ${$('#inTitle').val() || 'Webpage'}`;
      const summary = `URL: ${$('#inUrl').val()} | Title: ${$('#inTitle').val().substring(0, 50)}`;
      const payload = {
        title: $('#inTitle').val(),
        desc: $('#inDesc').val(),
        url: $('#inUrl').val(),
        image: $('#inImage').val()
      };

      ToolsApp.saveHistory('meta-preview', title, summary, payload);
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'meta-preview' && payload) {
        if (payload.title) $('#inTitle').val(payload.title);
        if (payload.desc) $('#inDesc').val(payload.desc);
        if (payload.url) $('#inUrl').val(payload.url);
        if (payload.image) $('#inImage').val(payload.image);
        updatePreviews();
      }
    });

    $('#inTitle, #inDesc, #inUrl, #inImage').on('input', updatePreviews);
    $(document).ready(updatePreviews);
  </script>
</body>
</html>
