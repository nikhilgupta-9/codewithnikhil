<?php
require_once __DIR__ . '/config/connect.php';
require_once __DIR__ . '/util/function.php';

$pageTitle = "HTML Sitemap — Explore All Pages, Services, Tools & Blogs | NikhilWorks";
$metaDesc = "Explore the complete directory of NikhilWorks. Quick navigation to all web development services, CRM solutions, SEO tools, blog posts, and global delivery locations.";
$canonical = $site . "sitemap/";
$currentTool = '';

// Fetch all published blogs
$blogsList = [];
$bSql = "SELECT `title`, `slug_url`, `created_at` FROM `blogs` WHERE `status` = 'published' ORDER BY `id` DESC";
$bRes = mysqli_query($conn, $bSql);
if ($bRes) {
    while ($bRow = mysqli_fetch_assoc($bRes)) {
        $blogsList[] = $bRow;
    }
}

// Fetch all active services
$servicesList = [];
$sSql = "SELECT `categories`, `slug_url` FROM `sub_categories` WHERE `status` = 1 ORDER BY `id` ASC";
$sRes = mysqli_query($conn, $sSql);
if ($sRes) {
    while ($sRow = mysqli_fetch_assoc($sRes)) {
        $servicesList[] = $sRow;
    }
}
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

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">

  <style>
    .sitemap-hero {
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.12) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 130px 0 60px;
      color: #fff;
      position: relative;
    }
    .sitemap-card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 16px;
      padding: 28px 24px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.04);
      height: 100%;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .sitemap-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 40px rgba(0,0,0,0.08);
      border-color: #cbd5e1;
    }
    .sitemap-card-title {
      font-size: 18px;
      font-weight: 800;
      color: #0f172a;
      margin-bottom: 18px;
      padding-bottom: 12px;
      border-bottom: 2px solid #f1f5f9;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .sitemap-card-title i {
      color: #104041;
      font-size: 20px;
    }
    .sitemap-link-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    .sitemap-link-list li a {
      color: #334155;
      text-decoration: none;
      font-size: 13.5px;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: color 0.2s ease, transform 0.2s ease;
    }
    .sitemap-link-list li a:hover {
      color: #0f766e;
      transform: translateX(4px);
    }
    .sitemap-link-list li a::before {
      content: "→";
      color: #104041;
      font-weight: 700;
      font-size: 12px;
    }
    .sitemap-badge-count {
      background: #f1f5f9;
      color: #64748b;
      font-size: 11px;
      padding: 2px 8px;
      border-radius: 20px;
      margin-left: auto;
    }
  </style>
</head>

<body>

  <?php include "includes/header.php"; ?>

  <!-- Hero Section -->
  <section class="sitemap-hero">
    <div class="container text-center">
      <h1 class="fw-extrabold text-white mb-2">Website HTML Sitemap</h1>
      <p class="text-light opacity-75 mb-0" style="max-width: 650px; margin: 0 auto;">
        Comprehensive architecture directory linking all core web development services, free utilities, technical articles, and regional delivery hubs.
      </p>
    </div>
  </section>

  <!-- Main Sitemap Grid -->
  <section class="py-5" style="background: #f8fafc;">
    <div class="container py-4">
      
      <div class="row g-4">
        
        <!-- Column 1: Core Pages -->
        <div class="col-lg-4 col-md-6">
          <div class="sitemap-card">
            <h2 class="sitemap-card-title">
              <i class="fa-solid fa-house"></i>
              <span>Core Pages</span>
            </h2>
            <ul class="sitemap-link-list">
              <li><a href="<?= $site ?>">Homepage (NikhilWorks)</a></li>
              <li><a href="<?= $site ?>about/">About Nikhil Gupta</a></li>
              <li><a href="<?= $site ?>services/">All Services Overview</a></li>
              <li><a href="<?= $site ?>portfolio/">Client Portfolio &amp; Case Studies</a></li>
              <li><a href="<?= $site ?>pricing/">Transparent Pricing Plans</a></li>
              <li><a href="<?= $site ?>contact/">Contact &amp; Book Consultation</a></li>
              <li><a href="<?= $site ?>blogs/">Blog &amp; Tech Insights</a></li>
              <li><a href="<?= $site ?>testimonials/">Client Reviews &amp; Testimonials</a></li>
              <li><a href="<?= $site ?>ai-integration-services/">AI Integration &amp; Automation</a></li>
              <li><a href="<?= $site ?>pay/">Make Online Payment (UPI / QR)</a></li>
              <li><a href="<?= $site ?>privacy-policy/">Privacy Policy</a></li>
              <li><a href="<?= $site ?>terms-and-conditions/">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>

        <!-- Column 2: Free Tools & Utilities -->
        <div class="col-lg-4 col-md-6">
          <div class="sitemap-card">
            <h2 class="sitemap-card-title">
              <i class="fa-solid fa-screwdriver-wrench"></i>
              <span>Free Developer Tools</span>
              <span class="sitemap-badge-count">14 Tools</span>
            </h2>
            <ul class="sitemap-link-list">
              <li><a href="<?= $site ?>free-tools/"><strong>Free Tools Main Hub</strong></a></li>
              <li><a href="<?= $site ?>tools/qr-code/">Custom QR Code Generator</a></li>
              <li><a href="<?= $site ?>tools/invoice/">Canva-Style A4 GST Invoice Maker</a></li>
              <li><a href="<?= $site ?>tools/whatsapp-link/">WhatsApp Direct Link Generator</a></li>
              <li><a href="<?= $site ?>tools/gst-calculator/">GST &amp; Tax Calculator India</a></li>
              <li><a href="<?= $site ?>tools/profit-calculator/">Profit Margin &amp; Markup Tool</a></li>
              <li><a href="<?= $site ?>tools/schema-generator/">JSON-LD Schema Markup Builder</a></li>
              <li><a href="<?= $site ?>tools/pagespeed/">Core Web Vitals &amp; PageSpeed Test</a></li>
              <li><a href="<?= $site ?>tools/meta-preview/">SERP &amp; Open Graph Meta Preview</a></li>
              <li><a href="<?= $site ?>tools/ssl-checker/">SSL Certificate &amp; Security Inspector</a></li>
              <li><a href="<?= $site ?>tools/index-checker/">Google Index Status Checker</a></li>
              <li><a href="<?= $site ?>tools/robots-validator/">Robots.txt Tester &amp; Validator</a></li>
              <li><a href="<?= $site ?>tools/privacy-policy/">Interactive Privacy Policy Studio</a></li>
              <li><a href="<?= $site ?>website-cost-calculator/">Website Development Cost Calculator</a></li>
              <li><a href="<?= $site ?>seo-auditor/">Free Website SEO Auditor</a></li>
            </ul>
          </div>
        </div>

        <!-- Column 3: Web Services -->
        <div class="col-lg-4 col-md-6">
          <div class="sitemap-card">
            <h2 class="sitemap-card-title">
              <i class="fa-solid fa-code"></i>
              <span>Services &amp; Solutions</span>
            </h2>
            <ul class="sitemap-link-list">
              <?php foreach ($servicesList as $s): ?>
                <li><a href="<?= $site ?>service/<?= $s['slug_url'] ?>/"><?= htmlspecialchars($s['categories']) ?></a></li>
              <?php endforeach; ?>
              <li><a href="<?= $site ?>crm-development-india/">Custom CRM &amp; ERP Solutions</a></li>
              <li><a href="<?= $site ?>seo-services-india/">Full-Service Technical SEO</a></li>
              <li><a href="<?= $site ?>keyword-promotion-india/">Google Keyword Promotion</a></li>
              <li><a href="<?= $site ?>ads-management-india/">Google &amp; Meta Ads Management</a></li>
              <li><a href="<?= $site ?>api-integration-services-india/">API &amp; Payment Integrations</a></li>
              <li><a href="<?= $site ?>website-maintenance-india/">Website Maintenance &amp; AMC</a></li>
              <li><a href="<?= $site ?>website-redesign-india/">Website Redesign &amp; Modernization</a></li>
              <li><a href="<?= $site ?>website-auditing-india/">Website Speed &amp; Security Audit</a></li>
            </ul>
          </div>
        </div>

        <!-- Column 4: Published Blogs -->
        <div class="col-lg-6 col-md-12">
          <div class="sitemap-card">
            <h2 class="sitemap-card-title">
              <i class="fa-solid fa-newspaper"></i>
              <span>Tech Blogs &amp; Tutorials</span>
              <span class="sitemap-badge-count"><?= count($blogsList) ?> Articles</span>
            </h2>
            <div style="max-height: 380px; overflow-y: auto; padding-right: 8px;">
              <ul class="sitemap-link-list">
                <?php foreach ($blogsList as $b): ?>
                  <li>
                    <a href="<?= $site ?>blog/<?= $b['slug_url'] ?>/">
                      <?= htmlspecialchars($b['title']) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>

        <!-- Column 5: Delivery Locations & Hubs -->
        <div class="col-lg-6 col-md-12">
          <div class="sitemap-card">
            <h2 class="sitemap-card-title">
              <i class="fa-solid fa-map-location-dot"></i>
              <span>India &amp; Global Delivery Hubs</span>
            </h2>
            <div class="row g-3">
              <div class="col-sm-6">
                <strong class="d-block text-dark small mb-2"><i class="fa-solid fa-city text-info me-1"></i> Top Indian Hubs:</strong>
                <ul class="sitemap-link-list">
                  <li><a href="<?= $site ?>web-developer-india/">Web Developer India (National)</a></li>
                  <li><a href="<?= $site ?>web-designer-delhi/">Delhi NCR</a></li>
                  <li><a href="<?= $site ?>web-developer-noida/">Noida &amp; Greater Noida</a></li>
                  <li><a href="<?= $site ?>web-developer-gurgaon/">Gurgaon (Gurugram)</a></li>
                  <li><a href="<?= $site ?>web-developer-bangalore/">Bengaluru (Bangalore)</a></li>
                  <li><a href="<?= $site ?>web-developer-mumbai/">Mumbai</a></li>
                  <li><a href="<?= $site ?>web-developer-hyderabad/">Hyderabad</a></li>
                  <li><a href="<?= $site ?>web-developer-pune/">Pune</a></li>
                  <li><a href="<?= $site ?>web-developer-chennai/">Chennai</a></li>
                  <li><a href="<?= $site ?>web-developer-kolkata/">Kolkata</a></li>
                  <li><a href="<?= $site ?>web-developer-ahmedabad/">Ahmedabad</a></li>
                  <li><a href="<?= $site ?>web-developer-jaipur/">Jaipur</a></li>
                  <li><a href="<?= $site ?>web-developer-chandigarh/">Chandigarh</a></li>
                  <li><a href="<?= $site ?>web-developer-lucknow/">Lucknow</a></li>
                  <li><a href="<?= $site ?>web-developer-indore/">Indore</a></li>
                  <li><a href="<?= $site ?>freelance-web-developer-india/">Hire Freelancer India</a></li>
                </ul>
              </div>

              <div class="col-sm-6">
                <strong class="d-block text-dark small mb-2"><i class="fa-solid fa-globe text-success me-1"></i> International Delivery:</strong>
                <ul class="sitemap-link-list">
                  <li><a href="<?= $site ?>web-developer-usa/">United States (USA)</a></li>
                  <li><a href="<?= $site ?>web-developer-uk/">United Kingdom (UK)</a></li>
                  <li><a href="<?= $site ?>web-developer-canada/">Canada</a></li>
                  <li><a href="<?= $site ?>web-developer-australia/">Australia</a></li>
                  <li><a href="<?= $site ?>web-developer-dubai/">UAE (Dubai)</a></li>
                  <li><a href="<?= $site ?>web-developer-saudi-arabia/">Saudi Arabia</a></li>
                  <li><a href="<?= $site ?>web-developer-germany/">Germany</a></li>
                  <li><a href="<?= $site ?>web-developer-singapore/">Singapore</a></li>
                  <li><a href="<?= $site ?>web-developer-new-zealand/">New Zealand</a></li>
                  <li><a href="<?= $site ?>web-developer-switzerland/">Switzerland</a></li>
                  <li><a href="<?= $site ?>web-developer-south-africa/">South Africa</a></li>
                  <li><a href="<?= $site ?>hire-freelance-web-developer/">All Countries Worldwide</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <?php include "includes/footer.php"; ?>

</body>
</html>
