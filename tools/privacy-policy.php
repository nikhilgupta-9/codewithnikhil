<?php
require_once dirname(__DIR__) . '/config/connect.php';
require_once dirname(__DIR__) . '/util/function.php';

$pageTitle = "Interactive Privacy Policy Generator — GDPR, CCPA & India DPDP 2023 Compliant | NikhilWorks";
$metaDesc = "Generate a legally vetted, highly customizable Privacy Policy for websites, e-commerce stores, and SaaS applications. Live formatted visual preview, PDF export, HTML code & Markdown.";
$canonical = $site . "tools/privacy-policy/";
$metaKeywords = "interactive privacy policy generator, gdpr compliant privacy policy maker, india dpdp 2023 privacy policy, ccpa privacy policy generator, website terms generator free";
$currentTool = 'privacy-policy';
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
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>tools/assets/tool-app.css">

  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    /* Interactive Wizard Tabs */
    .wizard-nav {
      display: flex;
      gap: 6px;
      overflow-x: auto;
      padding-bottom: 8px;
      margin-bottom: 20px;
      border-bottom: 1px solid var(--border-subtle);
      scrollbar-width: thin;
    }
    .wizard-tab-btn {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--border-subtle);
      color: var(--text-muted);
      padding: 8px 14px;
      border-radius: 8px;
      font-size: 13px;
      font-weight: 600;
      white-space: nowrap;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }
    .wizard-tab-btn:hover {
      background: rgba(255, 255, 255, 0.08);
      color: #ffffff;
    }
    .wizard-tab-btn.active {
      background: rgba(6, 182, 212, 0.15);
      border-color: var(--brand-teal);
      color: var(--brand-teal);
    }
    .wizard-tab-btn.completed {
      border-color: rgba(34, 197, 94, 0.4);
    }
    .wizard-tab-btn.completed i {
      color: #22c55e;
    }

    /* Preset Quick Pill */
    .preset-pill {
      font-size: 11px;
      font-weight: 700;
      padding: 5px 12px;
      border-radius: 20px;
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--border-subtle);
      color: #cbd5e1;
      cursor: pointer;
      transition: all 0.2s;
    }
    .preset-pill:hover, .preset-pill.active {
      background: var(--brand-teal);
      color: #031417;
      border-color: var(--brand-teal);
    }

    /* Interactive Tag Checkboxes */
    .tag-check-label {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 8px 12px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid var(--border-subtle);
      color: #cbd5e1;
      font-size: 12px;
      font-weight: 600;
      cursor: pointer;
      user-select: none;
      transition: all 0.2s ease;
    }
    .tag-check-label:hover {
      background: rgba(255, 255, 255, 0.06);
      border-color: rgba(255, 255, 255, 0.2);
    }
    .tag-check-input:checked + .tag-check-label {
      background: rgba(6, 182, 212, 0.12);
      border-color: var(--brand-teal);
      color: #ffffff;
    }
    .tag-check-input {
      position: absolute;
      opacity: 0;
      pointer-events: none;
    }

    /* Policy Output / Document Viewer */
    .doc-viewer-card {
      background: #081113;
      border: 1px solid var(--border-subtle);
      border-radius: 14px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      height: 100%;
      min-height: 640px;
    }
    .doc-viewer-toolbar {
      padding: 12px 18px;
      background: rgba(255, 255, 255, 0.03);
      border-bottom: 1px solid var(--border-subtle);
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 10px;
    }
    .doc-viewer-body {
      flex: 1;
      overflow-y: auto;
      padding: 24px;
      font-family: 'Inter', sans-serif;
      color: #e2e8f0;
      line-height: 1.7;
    }
    .doc-viewer-body h1, .doc-viewer-body h2, .doc-viewer-body h3 {
      color: #ffffff;
      font-weight: 700;
      margin-top: 24px;
      margin-bottom: 12px;
    }
    .doc-viewer-body h1 { font-size: 24px; border-bottom: 1px solid var(--border-subtle); padding-bottom: 12px; }
    .doc-viewer-body h2 { font-size: 18px; color: var(--brand-teal); }
    .doc-viewer-body h3 { font-size: 15px; color: #f8fafc; }
    .doc-viewer-body p, .doc-viewer-body li { font-size: 13.5px; color: #94a3b8; }
    .doc-viewer-body ul { padding-left: 20px; }
    .doc-viewer-body strong { color: #ffffff; }
    .doc-viewer-body a { color: var(--brand-teal); text-decoration: none; }
    .doc-viewer-body a:hover { text-decoration: underline; }

    .doc-code-view {
      width: 100%;
      height: 100%;
      min-height: 540px;
      background: #030809;
      color: #38bdf8;
      font-family: var(--code-font);
      font-size: 12.5px;
      line-height: 1.6;
      padding: 16px;
      border: none;
      outline: none;
      resize: none;
    }

    /* Compliance Meter */
    .compliance-meter {
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--border-subtle);
      border-radius: 10px;
      padding: 12px 16px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      margin-bottom: 18px;
    }

    /* Print Styles */
    @media print {
      body * { visibility: hidden; }
      #visualPreview, #visualPreview * { visibility: visible; }
      #visualPreview {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        color: #000 !important;
        background: #fff !important;
      }
      #visualPreview p, #visualPreview li { color: #222 !important; }
      #visualPreview h1, #visualPreview h2, #visualPreview h3, #visualPreview strong { color: #000 !important; }
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
        
        <!-- Header -->
        <div class="tool-workspace-header">
          <div class="tool-header-left">
            <div class="tool-header-icon icon-amber">
              <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <div>
              <h1 class="tool-header-title">Interactive Privacy Policy Studio</h1>
              <p class="tool-header-desc">Build legally vetted, multi-jurisdiction Privacy Policies compliant with GDPR (EU), CCPA/CPRA (US), India DPDP Act 2023, and global data standards.</p>
            </div>
          </div>
          <div class="tool-workspace-actions">
            <button type="button" class="topbar-btn topbar-btn-ghost" onclick="ToolsApp.openHistoryDrawer('privacy-policy')">
              <i class="fa-solid fa-clock-rotate-left text-warning"></i> Policy History
            </button>
          </div>
        </div>

        <!-- Compliance & Presets Bar -->
        <div class="compliance-meter flex-wrap">
          <div class="d-flex align-items-center gap-3">
            <div class="d-flex align-items-center gap-2">
              <i class="fa-solid fa-shield-check text-success fa-lg"></i>
              <div>
                <strong class="text-white small d-block">Compliance Health Score</strong>
                <span class="text-success fw-bold" id="compScoreText" style="font-size: 12px;">100% Fully Compliant</span>
              </div>
            </div>
            <div class="progress d-none d-sm-block" style="width: 120px; height: 8px; background: rgba(255,255,255,0.1); border-radius: 4px;">
              <div id="compProgressBar" class="progress-bar bg-success" style="width: 100%; transition: width 0.3s ease;"></div>
            </div>
          </div>

          <!-- Quick Presets -->
          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="text-muted small fw-bold">1-Click Presets:</span>
            <button type="button" class="preset-pill active" onclick="applyPreset('website')">🌐 Standard Website</button>
            <button type="button" class="preset-pill" onclick="applyPreset('ecommerce')">🛍️ E-Commerce / Store</button>
            <button type="button" class="preset-pill" onclick="applyPreset('saas')">⚡ SaaS &amp; Web App</button>
            <button type="button" class="preset-pill" onclick="applyPreset('agency')">💼 Agency / Freelancer</button>
          </div>
        </div>

        <div class="row g-4">
          
          <!-- Controls / Wizard Column -->
          <div class="col-lg-5">
            
            <!-- Wizard Navigation -->
            <div class="wizard-nav">
              <button type="button" class="wizard-tab-btn active" id="tabBtn1" onclick="switchStep(1)">
                <i class="fa-solid fa-building"></i> 1. Business
              </button>
              <button type="button" class="wizard-tab-btn" id="tabBtn2" onclick="switchStep(2)">
                <i class="fa-solid fa-gavel"></i> 2. Laws &amp; Acts
              </button>
              <button type="button" class="wizard-tab-btn" id="tabBtn3" onclick="switchStep(3)">
                <i class="fa-solid fa-database"></i> 3. Data Collected
              </button>
              <button type="button" class="wizard-tab-btn" id="tabBtn4" onclick="switchStep(4)">
                <i class="fa-solid fa-cubes"></i> 4. 3rd-Parties
              </button>
              <button type="button" class="wizard-tab-btn" id="tabBtn5" onclick="switchStep(5)">
                <i class="fa-solid fa-user-shield"></i> 5. Rights &amp; DPO
              </button>
            </div>

            <!-- STEP 1: Business Identity -->
            <div class="wizard-step-content" id="stepContent1">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-id-card text-info me-2"></i> Company &amp; Website Identity</h6>
              <div class="row g-3">
                <div class="col-12">
                  <label class="form-label">Company / Brand Name <span class="text-danger">*</span></label>
                  <input type="text" id="polName" class="form-control" placeholder="NikhilWorks" value="NikhilWorks">
                </div>
                <div class="col-12">
                  <label class="form-label">Website / App URL <span class="text-danger">*</span></label>
                  <input type="url" id="polUrl" class="form-control" placeholder="https://nikhilworks.com" value="https://nikhilworks.com">
                </div>
                <div class="col-md-6">
                  <label class="form-label">Legal Entity Type</label>
                  <select id="polEntityType" class="form-select">
                    <option value="Sole Proprietorship / Freelancer" selected>Individual / Sole Proprietor</option>
                    <option value="Private Limited Company">Private Limited Company</option>
                    <option value="LLC (Limited Liability Co.)">LLC / Corporation</option>
                    <option value="Partnership Firm">Partnership Firm</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Primary Country / State</label>
                  <input type="text" id="polCountry" class="form-control" placeholder="India" value="India">
                </div>
                <div class="col-12">
                  <label class="form-label">Support / Contact Email <span class="text-danger">*</span></label>
                  <input type="email" id="polEmail" class="form-control" placeholder="contact@nikhilworks.com" value="contact@nikhilworks.com">
                </div>
                <div class="col-12">
                  <label class="form-label">Physical Registered Address (Optional)</label>
                  <input type="text" id="polAddress" class="form-control" placeholder="New Delhi, Delhi NCR, India" value="New Delhi, Delhi NCR, India">
                </div>
              </div>
            </div>

            <!-- STEP 2: Compliance Frameworks -->
            <div class="wizard-step-content d-none" id="stepContent2">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-landmark text-warning me-2"></i> Applicable Privacy Laws &amp; Regulations</h6>
              <p class="text-muted small mb-3">Select the privacy frameworks your business complies with:</p>
              
              <div class="d-flex flex-column gap-2">
                <div>
                  <input type="checkbox" id="chkDpdp" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkDpdp">
                    <i class="fa-solid fa-flag text-warning"></i>
                    <div>
                      <strong>Digital Personal Data Protection Act 2023 (India DPDP)</strong>
                      <span class="d-block text-muted small fw-normal">Mandatory consent notices, grievance officer &amp; right to erase.</span>
                    </div>
                  </label>
                </div>

                <div>
                  <input type="checkbox" id="chkGdpr" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkGdpr">
                    <i class="fa-solid fa-globe text-info"></i>
                    <div>
                      <strong>EU &amp; UK GDPR (General Data Protection Regulation)</strong>
                      <span class="d-block text-muted small fw-normal">Strict cookie consent, data portability &amp; cross-border transfers.</span>
                    </div>
                  </label>
                </div>

                <div>
                  <input type="checkbox" id="chkCcpa" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkCcpa">
                    <i class="fa-solid fa-shield-halved text-success"></i>
                    <div>
                      <strong>CCPA / CPRA (California Privacy Rights Act)</strong>
                      <span class="d-block text-muted small fw-normal">"Do Not Sell My Personal Info" clause &amp; consumer non-discrimination.</span>
                    </div>
                  </label>
                </div>

                <div>
                  <input type="checkbox" id="chkCoppa" class="tag-check-input">
                  <label class="tag-check-label" for="chkCoppa">
                    <i class="fa-solid fa-children text-danger"></i>
                    <div>
                      <strong>COPPA (Children's Online Privacy Protection)</strong>
                      <span class="d-block text-muted small fw-normal">Explicit declaration that service is not directed at children under 13/18.</span>
                    </div>
                  </label>
                </div>
              </div>
            </div>

            <!-- STEP 3: Data Collection -->
            <div class="wizard-step-content d-none" id="stepContent3">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i> Categories of Data Collected</h6>
              <p class="text-muted small mb-3">Check all types of user information your service processes:</p>
              
              <div class="row g-2">
                <div class="col-12">
                  <input type="checkbox" id="chkForms" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkForms">
                    <i class="fa-solid fa-envelope text-info"></i> Contact Form Data (Name, Email, Mobile, Message)
                  </label>
                </div>
                <div class="col-12">
                  <input type="checkbox" id="chkCookies" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkCookies">
                    <i class="fa-solid fa-cookie-bite text-warning"></i> Cookies &amp; Session Preferences
                  </label>
                </div>
                <div class="col-12">
                  <input type="checkbox" id="chkAnalytics" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkAnalytics">
                    <i class="fa-solid fa-chart-line text-success"></i> Device Logs, IP Address, OS &amp; Browser Specs
                  </label>
                </div>
                <div class="col-12">
                  <input type="checkbox" id="chkAccounts" class="tag-check-input" checked>
                  <label class="tag-check-label" for="chkAccounts">
                    <i class="fa-solid fa-user-lock text-primary"></i> User Account Credentials &amp; Passwords
                  </label>
                </div>
                <div class="col-12">
                  <input type="checkbox" id="chkPayments" class="tag-check-input">
                  <label class="tag-check-label" for="chkPayments">
                    <i class="fa-solid fa-credit-card text-danger"></i> Payment &amp; Billing Transaction Records
                  </label>
                </div>
                <div class="col-12">
                  <input type="checkbox" id="chkGeo" class="tag-check-input">
                  <label class="tag-check-label" for="chkGeo">
                    <i class="fa-solid fa-location-dot text-rose"></i> Geolocation / GPS Coordinates
                  </label>
                </div>
              </div>
            </div>

            <!-- STEP 4: Third-Party Integrations -->
            <div class="wizard-step-content d-none" id="stepContent4">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-plug text-info me-2"></i> Third-Party Services &amp; Processors</h6>
              <p class="text-muted small mb-3">Declare all external SDKs, APIs, and analytics vendors used:</p>
              
              <div class="row g-2">
                <div class="col-6">
                  <input type="checkbox" id="tpGa4" class="tag-check-input" checked>
                  <label class="tag-check-label" for="tpGa4"><i class="fa-brands fa-google text-warning"></i> Google Analytics 4</label>
                </div>
                <div class="col-6">
                  <input type="checkbox" id="tpMeta" class="tag-check-input">
                  <label class="tag-check-label" for="tpMeta"><i class="fa-brands fa-meta text-primary"></i> Meta Pixel / Ads</label>
                </div>
                <div class="col-6">
                  <input type="checkbox" id="tpRazorpay" class="tag-check-input" checked>
                  <label class="tag-check-label" for="tpRazorpay"><i class="fa-solid fa-bolt text-info"></i> Razorpay / Stripe</label>
                </div>
                <div class="col-6">
                  <input type="checkbox" id="tpCloud" class="tag-check-input" checked>
                  <label class="tag-check-label" for="tpCloud"><i class="fa-solid fa-cloud text-light"></i> AWS / Cloudflare</label>
                </div>
                <div class="col-6">
                  <input type="checkbox" id="tpEmail" class="tag-check-input">
                  <label class="tag-check-label" for="tpEmail"><i class="fa-solid fa-envelope-open-text text-danger"></i> SendGrid / Mailchimp</label>
                </div>
                <div class="col-6">
                  <input type="checkbox" id="tpChat" class="tag-check-input" checked>
                  <label class="tag-check-label" for="tpChat"><i class="fa-brands fa-whatsapp text-success"></i> WhatsApp Business API</label>
                </div>
              </div>
            </div>

            <!-- STEP 5: Rights, DPO & Retention -->
            <div class="wizard-step-content d-none" id="stepContent5">
              <h6 class="text-white fw-bold mb-3"><i class="fa-solid fa-user-shield text-success me-2"></i> Grievance Officer &amp; User Rights</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <label class="form-label">Data Retention Period</label>
                  <select id="polRetention" class="form-select">
                    <option value="until account deletion or 3 years">Until Account Deletion / 3 Years</option>
                    <option value="12 months following inactivity">12 Months of Inactivity</option>
                    <option value="as strictly required by tax & legal laws" selected>As legally required by tax laws</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label class="form-label">Grievance SLA Response</label>
                  <select id="polSla" class="form-select">
                    <option value="30 days" selected>Within 30 Calendar Days</option>
                    <option value="15 days">Within 15 Business Days</option>
                    <option value="7 days">Within 7 Days (Expedited)</option>
                  </select>
                </div>
                <div class="col-12">
                  <label class="form-label">Grievance Officer Name / Designation</label>
                  <input type="text" id="polOfficer" class="form-control" placeholder="Data Protection & Grievance Officer" value="Grievance Redressal Officer">
                </div>
                <div class="col-12">
                  <label class="form-label">Grievance Officer Email</label>
                  <input type="email" id="polOfficerEmail" class="form-control" placeholder="dpo@nikhilworks.com" value="dpo@nikhilworks.com">
                </div>
              </div>
            </div>

            <!-- Wizard Step Navigation Buttons -->
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-secondary border-opacity-25">
              <button type="button" class="topbar-btn topbar-btn-ghost py-2 px-3" id="btnPrevStep" onclick="prevStep()" disabled>
                <i class="fa-solid fa-arrow-left me-1"></i> Previous
              </button>
              <button type="button" class="topbar-btn topbar-btn-primary py-2 px-3" id="btnNextStep" onclick="nextStep()">
                Next Step <i class="fa-solid fa-arrow-right ms-1"></i>
              </button>
            </div>

          </div>

          <!-- Document Viewer / Preview Column -->
          <div class="col-lg-7">
            <div class="doc-viewer-card">
              
              <!-- Toolbar -->
              <div class="doc-viewer-toolbar">
                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="btn-fmt-toggle active" id="btnFmtVisual" onclick="setViewerFormat('visual')">
                    <i class="fa-solid fa-eye me-1"></i> Formatted View
                  </button>
                  <button type="button" class="btn-fmt-toggle" id="btnFmtHtml" onclick="setViewerFormat('html')">
                    <i class="fa-brands fa-html5 me-1"></i> HTML
                  </button>
                  <button type="button" class="btn-fmt-toggle" id="btnFmtMd" onclick="setViewerFormat('md')">
                    <i class="fa-brands fa-markdown me-1"></i> Markdown
                  </button>
                </div>

                <div class="d-flex align-items-center gap-2">
                  <button type="button" class="topbar-btn topbar-btn-ghost py-1 px-2 small" onclick="printPolicy()" title="Print or Save as PDF">
                    <i class="fa-solid fa-print"></i> Print / PDF
                  </button>
                  <button type="button" class="topbar-btn topbar-btn-ghost py-1 px-2 small" onclick="downloadPolicyFile()" title="Download file">
                    <i class="fa-solid fa-download"></i> Download
                  </button>
                  <button type="button" class="topbar-btn topbar-btn-primary py-1 px-3 small" onclick="copyPolicyOutput()" id="btnCopyPol">
                    <i class="fa-regular fa-copy me-1"></i> Copy
                  </button>
                </div>
              </div>

              <!-- Visual Document View -->
              <div class="doc-viewer-body" id="visualPreview">
                <!-- Generated HTML Injected Here -->
              </div>

              <!-- Raw Code View (HTML / Markdown) -->
              <div id="codePreviewWrapper" class="d-none" style="height: 100%;">
                <textarea id="codeOutput" class="doc-code-view" readonly></textarea>
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
    let currentStep = 1;
    let activeFormat = 'visual';

    function switchStep(step) {
      currentStep = step;
      $('.wizard-step-content').addClass('d-none');
      $(`#stepContent${step}`).removeClass('d-none');
      
      $('.wizard-tab-btn').removeClass('active');
      $(`#tabBtn${step}`).addClass('active');

      $('#btnPrevStep').prop('disabled', step === 1);
      if (step === 5) {
        $('#btnNextStep').html('<i class="fa-solid fa-floppy-disk me-1"></i> Save to History').attr('onclick', 'savePolicyToHistory()');
      } else {
        $('#btnNextStep').html('Next Step <i class="fa-solid fa-arrow-right ms-1"></i>').attr('onclick', 'nextStep()');
      }
    }

    function nextStep() {
      if (currentStep < 5) {
        switchStep(currentStep + 1);
      }
    }

    function prevStep() {
      if (currentStep > 1) {
        switchStep(currentStep - 1);
      }
    }

    function applyPreset(type) {
      $('.preset-pill').removeClass('active');
      $(event.target).addClass('active');

      if (type === 'website') {
        $('#chkForms, #chkCookies, #chkAnalytics, #chkDpdp, #chkGdpr, #tpGa4, #tpCloud').prop('checked', true);
        $('#chkPayments, #chkAccounts, #chkGeo, #chkCcpa, #chkCoppa, #tpMeta, #tpRazorpay, #tpEmail').prop('checked', false);
      } else if (type === 'ecommerce') {
        $('#chkForms, #chkCookies, #chkAnalytics, #chkAccounts, #chkPayments, #chkDpdp, #chkGdpr, #chkCcpa, #tpGa4, #tpRazorpay, #tpCloud, #tpEmail, #tpChat').prop('checked', true);
        $('#chkGeo, #chkCoppa, #tpMeta').prop('checked', false);
      } else if (type === 'saas') {
        $('#chkForms, #chkCookies, #chkAnalytics, #chkAccounts, #chkPayments, #chkDpdp, #chkGdpr, #chkCcpa, #tpGa4, #tpRazorpay, #tpCloud, #tpEmail').prop('checked', true);
        $('#chkGeo, #chkCoppa').prop('checked', false);
      } else if (type === 'agency') {
        $('#chkForms, #chkCookies, #chkAnalytics, #chkDpdp, #chkGdpr, #tpGa4, #tpCloud, #tpChat').prop('checked', true);
        $('#chkAccounts, #chkPayments, #chkGeo, #chkCcpa, #chkCoppa, #tpMeta, #tpRazorpay, #tpEmail').prop('checked', false);
      }

      generatePolicy();
      ToolsApp.showToast(`Applied ${type.toUpperCase()} template! 🚀`);
    }

    function generatePolicy() {
      const name = $('#polName').val().trim() || 'Our Company';
      const url = $('#polUrl').val().trim() || 'https://example.com';
      const email = $('#polEmail').val().trim() || 'contact@example.com';
      const country = $('#polCountry').val().trim() || 'India';
      const entityType = $('#polEntityType').val();
      const address = $('#polAddress').val().trim() || country;
      const officer = $('#polOfficer').val().trim() || 'Grievance Officer';
      const officerEmail = $('#polOfficerEmail').val().trim() || email;
      const retention = $('#polRetention').val();
      const sla = $('#polSla').val();
      const dateStr = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

      // Frameworks
      const isDpdp = $('#chkDpdp').is(':checked');
      const isGdpr = $('#chkGdpr').is(':checked');
      const isCcpa = $('#chkCcpa').is(':checked');
      const isCoppa = $('#chkCoppa').is(':checked');

      // Data categories
      const hasForms = $('#chkForms').is(':checked');
      const hasCookies = $('#chkCookies').is(':checked');
      const hasAnalytics = $('#chkAnalytics').is(':checked');
      const hasAccounts = $('#chkAccounts').is(':checked');
      const hasPayments = $('#chkPayments').is(':checked');
      const hasGeo = $('#chkGeo').is(':checked');

      // Third parties
      const tpList = [];
      if ($('#tpGa4').is(':checked')) tpList.push('Google Analytics 4 (Traffic & Usage Diagnostics)');
      if ($('#tpMeta').is(':checked')) tpList.push('Meta Pixel & Ad Services (Marketing & Conversion Attribution)');
      if ($('#tpRazorpay').is(':checked')) tpList.push('Razorpay / Stripe (PCI-DSS Certified Payment Gateways)');
      if ($('#tpCloud').is(':checked')) tpList.push('AWS / Cloudflare (Content Delivery & Cloud Security)');
      if ($('#tpEmail').is(':checked')) tpList.push('SendGrid / Mailchimp (Transactional & Newsletter Email Delivery)');
      if ($('#tpChat').is(':checked')) tpList.push('WhatsApp Business API (Customer Support & Inquiries)');

      // Calculate score
      let score = 70;
      if (isDpdp) score += 8;
      if (isGdpr) score += 8;
      if (isCcpa) score += 8;
      if (email && officerEmail) score += 6;
      score = Math.min(100, score);

      $('#compScoreText').text(`${score}% Compliant (GDPR, CCPA, India DPDP)`);
      $('#compProgressBar').css('width', `${score}%`);

      // Build HTML
      let html = `
        <h1>Privacy Policy</h1>
        <p><strong>Effective Date:</strong> ${dateStr} &bull; <strong>Last Updated:</strong> ${dateStr}</p>
        
        <h2>1. Overview &amp; Introduction</h2>
        <p>Welcome to <strong>${name}</strong> ("we," "us," or "our"). We operate <a href="${url}" target="_blank" rel="noopener">${url}</a> (the "Service"). This Privacy Policy outlines how our entity (<strong>${entityType}</strong>, registered in ${address}) collects, safeguards, and processes your personal information in compliance with applicable global data privacy regulations.</p>
      `;

      if (isDpdp || isGdpr || isCcpa) {
        html += `
          <h2>2. Regulatory Compliance Frameworks</h2>
          <p>This policy adheres strictly to the following legislative frameworks:</p>
          <ul>
            ${isDpdp ? `<li><strong>Digital Personal Data Protection Act 2023 (India DPDP):</strong> Enforcing lawful processing, explicit consent, user grievance redressal, and right to correction/erasure.</li>` : ''}
            ${isGdpr ? `<li><strong>General Data Protection Regulation (EU/UK GDPR):</strong> Guaranteeing lawful basis of processing, data minimization, and cross-border data transfer safeguards.</li>` : ''}
            ${isCcpa ? `<li><strong>California Consumer Privacy Act (CCPA / CPRA):</strong> Providing California residents transparency regarding personal information sale, sharing, and opt-out rights.</li>` : ''}
          </ul>
        `;
      }

      html += `
        <h2>3. Personal Information We Collect</h2>
        <p>Depending on your interactions with ${name}, we may collect the following categories of data:</p>
        <ul>
          ${hasForms ? `<li><strong>Contact &amp; Identification Data:</strong> Full name, email address, telephone/WhatsApp number, and inquiry messages submitted via web forms.</li>` : ''}
          ${hasAccounts ? `<li><strong>Account Credentials:</strong> Usernames, hashed encrypted passwords, profile preferences, and account activity logs.</li>` : ''}
          ${hasCookies ? `<li><strong>Cookies &amp; Local Storage:</strong> Session tokens, theme settings, and authentication state stored locally on your device.</li>` : ''}
          ${hasAnalytics ? `<li><strong>Device &amp; Telemetry Data:</strong> IP addresses, browser engine versions, referring URLs, screen resolution, and time spent on pages.</li>` : ''}
          ${hasPayments ? `<li><strong>Billing &amp; Transaction Details:</strong> Purchase history, billing address, and transaction identifiers. (Note: Full card numbers and CVV codes are directly processed via tokenized, PCI-DSS compliant payment gateways and are never stored on our servers).</li>` : ''}
          ${hasGeo ? `<li><strong>Geolocation Information:</strong> Approximate regional location based on IP address lookup or explicit browser permission.</li>` : ''}
        </ul>

        <h2>4. Purpose &amp; Lawful Basis of Processing</h2>
        <p>We process your personal information for legitimate business purposes:</p>
        <ul>
          <li>To provide, operate, maintain, and enhance our services and web applications.</li>
          <li>To process user transactions, client invoices, and service requests.</li>
          <li>To communicate project updates, security notifications, and customer support responses.</li>
          <li>To prevent fraudulent activity, security exploits, and ensure network integrity.</li>
          <li>To fulfill statutory tax, legal, and regulatory obligations.</li>
        </ul>
      `;

      if (tpList.length > 0) {
        html += `
          <h2>5. Third-Party Service Providers &amp; Sub-Processors</h2>
          <p>We share minimal necessary data with vetted third-party infrastructure and service vendors:</p>
          <ul>
            ${tpList.map(tp => `<li>${tp}</li>`).join('')}
          </ul>
        `;
      }

      html += `
        <h2>6. Data Retention &amp; Security Measures</h2>
        <p>We retain collected information <strong>${retention}</strong>. We employ industry-standard 256-bit SSL encryption, restricted server access, and periodic vulnerability audits to prevent unauthorized data loss, alteration, or disclosure.</p>

        <h2>7. Your Privacy Rights &amp; Choices</h2>
        <p>Under international privacy laws (including GDPR and India DPDP), you possess the following actionable rights:</p>
        <ul>
          <li><strong>Right to Access:</strong> Request a copy of the personal information we hold about you.</li>
          <li><strong>Right to Rectification:</strong> Request correction of inaccurate or incomplete data.</li>
          <li><strong>Right to Erasure (Right to be Forgotten):</strong> Request deletion of your personal records where legal retention is not mandated.</li>
          <li><strong>Right to Withdraw Consent:</strong> Revoke previously granted consent at any time without retroactive penalty.</li>
          <li><strong>Right to Non-Discrimination:</strong> We will never deny services or charge differing rates for exercising your privacy rights.</li>
        </ul>

        <h2>8. Grievance Redressal &amp; Data Protection Contact</h2>
        <p>For any questions, data deletion requests, or grievances regarding this policy, please reach out to our designated official:</p>
        <div style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 14px; border-radius: 8px; margin-top: 10px;">
          <p style="margin-bottom: 4px;"><strong>Officer:</strong> ${officer}</p>
          <p style="margin-bottom: 4px;"><strong>Company:</strong> ${name} (${entityType})</p>
          <p style="margin-bottom: 4px;"><strong>Address:</strong> ${address}</p>
          <p style="margin-bottom: 4px;"><strong>Email:</strong> <a href="mailto:${officerEmail}">${officerEmail}</a></p>
          <p style="margin-bottom: 0;"><strong>Resolution SLA:</strong> ${sla}</p>
        </div>
      `;

      if (isCoppa) {
        html += `
          <h2>9. Children's Online Privacy (COPPA Notice)</h2>
          <p>Our service is not intended for or directed at children under 13 years of age. We do not knowingly collect personal information from minors. If you believe a child has provided us data without parental consent, contact us immediately for prompt deletion.</p>
        `;
      }

      // Render Visual
      $('#visualPreview').html(html);

      // Build Markdown
      let md = html
        .replace(/<h1>(.*?)<\/h1>/gi, '# $1\n\n')
        .replace(/<h2>(.*?)<\/h2>/gi, '\n## $1\n\n')
        .replace(/<h3>(.*?)<\/h3>/gi, '\n### $1\n\n')
        .replace(/<p>(.*?)<\/p>/gi, '$1\n\n')
        .replace(/<strong>(.*?)<\/strong>/gi, '**$1**')
        .replace(/<a href="(.*?)"[^>]*>(.*?)<\/a>/gi, '[$2]($1)')
        .replace(/<li>(.*?)<\/li>/gi, '- $1\n')
        .replace(/<\/?ul>/gi, '')
        .replace(/<div[^>]*>/gi, '')
        .replace(/<\/div>/gi, '')
        .replace(/&bull;/gi, '•')
        .replace(/&amp;/gi, '&')
        .trim();

      if (activeFormat === 'html') {
        $('#codeOutput').val(html.trim());
      } else if (activeFormat === 'md') {
        $('#codeOutput').val(md);
      }
    }

    function setViewerFormat(fmt) {
      activeFormat = fmt;
      $('.btn-fmt-toggle').removeClass('active');

      if (fmt === 'visual') {
        $('#btnFmtVisual').addClass('active');
        $('#visualPreview').removeClass('d-none');
        $('#codePreviewWrapper').addClass('d-none');
      } else if (fmt === 'html') {
        $('#btnFmtHtml').addClass('active');
        $('#visualPreview').addClass('d-none');
        $('#codePreviewWrapper').removeClass('d-none');
      } else if (fmt === 'md') {
        $('#btnFmtMd').addClass('active');
        $('#visualPreview').addClass('d-none');
        $('#codePreviewWrapper').removeClass('d-none');
      }
      generatePolicy();
    }

    function copyPolicyOutput() {
      let content = '';
      if (activeFormat === 'visual' || activeFormat === 'html') {
        content = $('#codeOutput').val() || $('#visualPreview').html();
      } else {
        content = $('#codeOutput').val();
      }

      if (navigator.clipboard) {
        navigator.clipboard.writeText(content).then(() => ToolsApp.showToast('Policy copied to clipboard! 📋'));
      } else {
        $('#codeOutput').select();
        document.execCommand('copy');
        ToolsApp.showToast('Policy copied to clipboard! 📋');
      }
    }

    function downloadPolicyFile() {
      let text = activeFormat === 'md' ? $('#codeOutput').val() : (activeFormat === 'html' ? $('#codeOutput').val() : $('#visualPreview').html());
      let ext = activeFormat === 'md' ? 'md' : 'html';
      const blob = new Blob([text], { type: 'text/plain;charset=utf-8' });
      const a = document.createElement('a');
      a.href = URL.createObjectURL(blob);
      a.download = `privacy-policy.${ext}`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      ToolsApp.showToast('Policy downloaded!');
      savePolicyToHistory();
    }

    function printPolicy() {
      window.print();
    }

    function savePolicyToHistory() {
      const name = $('#polName').val() || 'Website';
      const title = `Privacy Policy: ${name}`;
      const summary = `Entity: ${$('#polEntityType').val()} | Jurisdiction: ${$('#polCountry').val() || 'India'}`;
      
      const payload = {
        name: $('#polName').val(),
        url: $('#polUrl').val(),
        entityType: $('#polEntityType').val(),
        country: $('#polCountry').val(),
        email: $('#polEmail').val(),
        address: $('#polAddress').val(),
        chkDpdp: $('#chkDpdp').is(':checked'),
        chkGdpr: $('#chkGdpr').is(':checked'),
        chkCcpa: $('#chkCcpa').is(':checked'),
        chkCoppa: $('#chkCoppa').is(':checked'),
        chkForms: $('#chkForms').is(':checked'),
        chkCookies: $('#chkCookies').is(':checked'),
        chkAnalytics: $('#chkAnalytics').is(':checked'),
        chkAccounts: $('#chkAccounts').is(':checked'),
        chkPayments: $('#chkPayments').is(':checked'),
        chkGeo: $('#chkGeo').is(':checked'),
        tpGa4: $('#tpGa4').is(':checked'),
        tpMeta: $('#tpMeta').is(':checked'),
        tpRazorpay: $('#tpRazorpay').is(':checked'),
        tpCloud: $('#tpCloud').is(':checked'),
        tpEmail: $('#tpEmail').is(':checked'),
        tpChat: $('#tpChat').is(':checked'),
        retention: $('#polRetention').val(),
        sla: $('#polSla').val(),
        officer: $('#polOfficer').val(),
        officerEmail: $('#polOfficerEmail').val()
      };

      ToolsApp.saveHistory('privacy-policy', title, summary, payload);
      ToolsApp.showToast('Privacy Policy saved to your history! 💾');
    }

    // 1-Click Restore Data from History Drawer
    $(document).on('tools:restore-payload', function(e, toolType, payload) {
      if (toolType === 'privacy-policy' && payload) {
        if (payload.name) $('#polName').val(payload.name);
        if (payload.url) $('#polUrl').val(payload.url);
        if (payload.entityType) $('#polEntityType').val(payload.entityType);
        if (payload.country) $('#polCountry').val(payload.country);
        if (payload.email) $('#polEmail').val(payload.email);
        if (payload.address) $('#polAddress').val(payload.address);
        
        $('#chkDpdp').prop('checked', !!payload.chkDpdp);
        $('#chkGdpr').prop('checked', !!payload.chkGdpr);
        $('#chkCcpa').prop('checked', !!payload.chkCcpa);
        $('#chkCoppa').prop('checked', !!payload.chkCoppa);

        $('#chkForms').prop('checked', !!payload.chkForms);
        $('#chkCookies').prop('checked', !!payload.chkCookies);
        $('#chkAnalytics').prop('checked', !!payload.chkAnalytics);
        $('#chkAccounts').prop('checked', !!payload.chkAccounts);
        $('#chkPayments').prop('checked', !!payload.chkPayments);
        $('#chkGeo').prop('checked', !!payload.chkGeo);

        $('#tpGa4').prop('checked', !!payload.tpGa4);
        $('#tpMeta').prop('checked', !!payload.tpMeta);
        $('#tpRazorpay').prop('checked', !!payload.tpRazorpay);
        $('#tpCloud').prop('checked', !!payload.tpCloud);
        $('#tpEmail').prop('checked', !!payload.tpEmail);
        $('#tpChat').prop('checked', !!payload.tpChat);

        if (payload.retention) $('#polRetention').val(payload.retention);
        if (payload.sla) $('#polSla').val(payload.sla);
        if (payload.officer) $('#polOfficer').val(payload.officer);
        if (payload.officerEmail) $('#polOfficerEmail').val(payload.officerEmail);

        generatePolicy();
      }
    });

    $('input, select').on('input change', generatePolicy);
    $(document).ready(generatePolicy);
  </script>
</body>
</html>
