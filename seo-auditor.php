<?php
include_once "config/connect.php";
include_once "util/function.php";

// If AJAX audit request is sent
if (isset($_REQUEST['action']) && $_REQUEST['action'] === 'audit') {
  header('Content-Type: application/json; charset=utf-8');

  $targetUrl = trim($_REQUEST['url'] ?? '');
  if (empty($targetUrl)) {
    echo json_encode(['success' => false, 'error' => 'Please provide a valid website URL.']);
    exit;
  }

  // Normalize URL
  if (!preg_match('~^(?:f|ht)tps?://~i', $targetUrl)) {
    $targetUrl = 'https://' . $targetUrl;
  }

  $parsed = parse_url($targetUrl);
  if (!$parsed || empty($parsed['host'])) {
    echo json_encode(['success' => false, 'error' => 'Invalid URL format.']);
    exit;
  }

  $startTime = microtime(true);

  // Initialize cURL to fetch HTML
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $targetUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
  curl_setopt($ch, CURLOPT_TIMEOUT, 12);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
  curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36 (compatible; NikhilWorksSEOAuditor/2.0)');
  curl_setopt($ch, CURLOPT_HEADER, true);

  $response = curl_exec($ch);
  $endTime = microtime(true);
  $responseTimeMs = round(($endTime - $startTime) * 1000);

  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
  $effectiveUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL) ?: $targetUrl;
  $sslVerifyResult = curl_getinfo($ch, CURLINFO_SSL_VERIFYRESULT);
  $curlError = curl_error($ch);
  curl_close($ch);

  if ($response === false || empty($response)) {
    echo json_encode([
      'success' => false,
      'error' => 'Could not connect to URL. Server returned: ' . ($curlError ?: 'Connection timed out or unreachable host.')
    ]);
    exit;
  }

  $headerContent = substr($response, 0, $headerSize);
  $htmlBody = substr($response, $headerSize);
  $pageSizeKb = round(strlen($htmlBody) / 1024, 1);

  // Parse DOM
  libxml_use_internal_errors(true);
  $dom = new DOMDocument();
  @$dom->loadHTML(mb_convert_encoding($htmlBody, 'HTML-ENTITIES', 'UTF-8'));
  libxml_clear_errors();
  $xpath = new DOMXPath($dom);

  // Checks array
  $checks = [];
  $score = 0;

  // 1. SSL / HTTPS
  $isHttps = (strpos($effectiveUrl, 'https://') === 0);
  if ($isHttps) {
    $score += 10;
    $checks[] = [
      'category' => 'Security & Speed',
      'type' => 'pass',
      'title' => 'HTTPS / SSL Encryption Active',
      'desc' => 'Your site is securely served over encrypted HTTPS, which is a confirmed Google ranking signal.'
    ];
  } else {
    $checks[] = [
      'category' => 'Security & Speed',
      'type' => 'critical',
      'title' => 'Website is Not Using HTTPS (SSL)',
      'desc' => 'Your site is loading over insecure HTTP. Chrome marks this as "Not Secure" and search engines penalize rankings.'
    ];
  }

  // 2. Server Response Time
  if ($responseTimeMs < 600) {
    $score += 10;
    $checks[] = [
      'category' => 'Security & Speed',
      'type' => 'pass',
      'title' => "Fast Server Response Time ({$responseTimeMs}ms)",
      'desc' => 'Initial server response time is fast, ensuring optimal Core Web Vitals and low TTFB.'
    ];
  } elseif ($responseTimeMs < 1400) {
    $score += 6;
    $checks[] = [
      'category' => 'Security & Speed',
      'type' => 'warning',
      'title' => "Average Response Time ({$responseTimeMs}ms)",
      'desc' => 'Server took over 600ms to respond. Enable server caching, Gzip compression, or a CDN like Cloudflare.'
    ];
  } else {
    $score += 2;
    $checks[] = [
      'category' => 'Security & Speed',
      'type' => 'critical',
      'title' => "Slow Server Response ({$responseTimeMs}ms)",
      'desc' => 'Server response exceeds 1.4 seconds. Slow TTFB severely degrades mobile SEO rankings and user retention.'
    ];
  }

  // 3. Title Tag
  $titleNodes = $xpath->query('//title');
  $pageTitle = $titleNodes->length > 0 ? trim($titleNodes->item(0)->nodeValue) : '';
  $titleLen = mb_strlen($pageTitle);

  if (!empty($pageTitle)) {
    if ($titleLen >= 30 && $titleLen <= 65) {
      $score += 15;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'pass',
        'title' => "Title Tag Length is Optimal ({$titleLen} characters)",
        'desc' => "Title: \"{$pageTitle}\". Fits perfectly within Google's 600px desktop and mobile SERP display limit."
      ];
    } elseif ($titleLen < 30) {
      $score += 8;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'warning',
        'title' => "Title Tag is Too Short ({$titleLen} characters)",
        'desc' => "Title: \"{$pageTitle}\". Recommend 30-60 characters including primary keyword and brand name."
      ];
    } else {
      $score += 9;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'warning',
        'title' => "Title Tag is Too Long ({$titleLen} characters)",
        'desc' => "Title: \"{$pageTitle}\". May be truncated with '...' on Google search results."
      ];
    }
  } else {
    $checks[] = [
      'category' => 'Meta & Core SEO',
      'type' => 'critical',
      'title' => 'Missing <title> Tag',
      'desc' => 'The HTML document has no title tag. This is the single most critical on-page ranking factor.'
    ];
  }

  // 4. Meta Description
  $metaDescNodes = $xpath->query('//meta[translate(@name, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="description"]/@content');
  $metaDesc = $metaDescNodes->length > 0 ? trim($metaDescNodes->item(0)->nodeValue) : '';
  $descLen = mb_strlen($metaDesc);

  if (!empty($metaDesc)) {
    if ($descLen >= 110 && $descLen <= 165) {
      $score += 15;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'pass',
        'title' => "Meta Description Length is Perfect ({$descLen} characters)",
        'desc' => "Description: \"{$metaDesc}\". Captures search snippet space effectively."
      ];
    } elseif ($descLen < 110) {
      $score += 8;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'warning',
        'title' => "Meta Description is Short ({$descLen} characters)",
        'desc' => "Description: \"{$metaDesc}\". Expand to 120-160 characters to maximize organic CTR."
      ];
    } else {
      $score += 9;
      $checks[] = [
        'category' => 'Meta & Core SEO',
        'type' => 'warning',
        'title' => "Meta Description is Long ({$descLen} characters)",
        'desc' => "Description: \"{$metaDesc}\". Characters beyond 160 will be truncated on SERPs."
      ];
    }
  } else {
    $checks[] = [
      'category' => 'Meta & Core SEO',
      'type' => 'critical',
      'title' => 'Missing Meta Description',
      'desc' => 'No meta description found. Google will generate arbitrary snippet text from your page content.'
    ];
  }

  // 5. H1 Heading Tag
  $h1Nodes = $xpath->query('//h1');
  $h1Count = $h1Nodes->length;
  $h1Text = ($h1Count > 0) ? trim($h1Nodes->item(0)->nodeValue) : '';

  if ($h1Count === 1) {
    $score += 10;
    $checks[] = [
      'category' => 'Content & Headings',
      'type' => 'pass',
      'title' => 'Single H1 Heading Tag Present',
      'desc' => "H1: \"{$h1Text}\". Having exactly 1 primary H1 heading provides clear topic signals to search crawlers."
    ];
  } elseif ($h1Count > 1) {
    $score += 5;
    $checks[] = [
      'category' => 'Content & Headings',
      'type' => 'warning',
      'title' => "Multiple H1 Tags Found ({$h1Count} H1s)",
      'desc' => 'Found multiple H1 tags. Best practice is to use exactly one H1 for the main page title and H2/H3 for subheadings.'
    ];
  } else {
    $checks[] = [
      'category' => 'Content & Headings',
      'type' => 'critical',
      'title' => 'Missing H1 Heading Tag',
      'desc' => 'No <h1> tag was found. Search engines rely on H1 tags to understand the core subject of the page.'
    ];
  }

  // 6. Heading Hierarchy (H2 & H3)
  $h2Count = $xpath->query('//h2')->length;
  $h3Count = $xpath->query('//h3')->length;
  if ($h2Count > 0) {
    $score += 5;
    $checks[] = [
      'category' => 'Content & Headings',
      'type' => 'pass',
      'title' => "Subheadings Structure Active ({$h2Count} H2s, {$h3Count} H3s)",
      'desc' => 'Content is well-structured with hierarchical subheadings for readability and search indexation.'
    ];
  } else {
    $checks[] = [
      'category' => 'Content & Headings',
      'type' => 'warning',
      'title' => 'No H2 Subheadings Found',
      'desc' => 'Page lacks <h2> tags. Structuring content into clear subheading sections improves rankability.'
    ];
  }

  // 7. Mobile Viewport
  $viewportNodes = $xpath->query('//meta[translate(@name, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="viewport"]');
  if ($viewportNodes->length > 0) {
    $score += 10;
    $checks[] = [
      'category' => 'Mobile & Technical',
      'type' => 'pass',
      'title' => 'Mobile Responsive Viewport Configured',
      'desc' => 'Viewport meta tag is properly configured for responsive rendering on mobile devices.'
    ];
  } else {
    $checks[] = [
      'category' => 'Mobile & Technical',
      'type' => 'critical',
      'title' => 'Missing Mobile Viewport Meta Tag',
      'desc' => 'Website lacks mobile viewport configuration. Mobile devices will render a zoomed-out desktop view.'
    ];
  }

  // 8. Canonical Tag
  $canonicalNodes = $xpath->query('//link[translate(@rel, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="canonical"]/@href');
  $canonicalHref = $canonicalNodes->length > 0 ? trim($canonicalNodes->item(0)->nodeValue) : '';
  if (!empty($canonicalHref)) {
    $score += 10;
    $checks[] = [
      'category' => 'Meta & Core SEO',
      'type' => 'pass',
      'title' => 'Canonical Link Tag Specified',
      'desc' => "Canonical URL: \"{$canonicalHref}\". Prevents duplicate content penalties."
    ];
  } else {
    $score += 4;
    $checks[] = [
      'category' => 'Meta & Core SEO',
      'type' => 'warning',
      'title' => 'Missing Rel=Canonical Tag',
      'desc' => 'No canonical URL declared. Adding self-referencing canonicals prevents duplicate content dilution.'
    ];
  }

  // 9. Images & Image ALT Attributes
  $imgNodes = $xpath->query('//img');
  $imgCount = $imgNodes->length;
  $missingAltCount = 0;
  foreach ($imgNodes as $img) {
    $alt = $img->getAttribute('alt');
    if ($alt === null || trim($alt) === '') {
      $missingAltCount++;
    }
  }

  if ($imgCount > 0) {
    if ($missingAltCount === 0) {
      $score += 10;
      $checks[] = [
        'category' => 'Media & Images',
        'type' => 'pass',
        'title' => "All Images Have Alt Attributes ({$imgCount}/{$imgCount})",
        'desc' => 'Every image includes an alt tag, enabling image search rankings and accessibility.'
      ];
    } elseif ($missingAltCount <= round($imgCount * 0.25)) {
      $score += 6;
      $checks[] = [
        'category' => 'Media & Images',
        'type' => 'warning',
        'title' => "{$missingAltCount} of {$imgCount} Images Missing Alt Text",
        'desc' => "Most images have alt text, but {$missingAltCount} image(s) are missing descriptive alt tags."
      ];
    } else {
      $score += 2;
      $checks[] = [
        'category' => 'Media & Images',
        'type' => 'critical',
        'title' => "{$missingAltCount} Images Missing Alt Text (out of {$imgCount})",
        'desc' => 'High ratio of images without descriptive alt attributes. Add descriptive keywords to alt tags.'
      ];
    }
  } else {
    $score += 6;
    $checks[] = [
      'category' => 'Media & Images',
      'type' => 'warning',
      'title' => 'No Images Found on Page',
      'desc' => 'Page has no <img> tags. High-ranking pages typically include relevant, compressed visual media.'
    ];
  }

  // 10. OpenGraph & Social Cards
  $ogTitle = $xpath->query('//meta[translate(@property, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="og:title"]/@content');
  $ogImage = $xpath->query('//meta[translate(@property, "ABCDEFGHIJKLMNOPQRSTUVWXYZ", "abcdefghijklmnopqrstuvwxyz")="og:image"]/@content');
  $hasOg = ($ogTitle->length > 0);
  $hasOgImg = ($ogImage->length > 0);
  $ogImgUrl = $hasOgImg ? $ogImage->item(0)->nodeValue : '';

  if ($hasOg && $hasOgImg) {
    $score += 10;
    $checks[] = [
      'category' => 'Social & Schema',
      'type' => 'pass',
      'title' => 'OpenGraph Meta Tags Complete',
      'desc' => "OpenGraph title and preview image configured. Shared links will look rich on WhatsApp, LinkedIn, and Facebook."
    ];
  } elseif ($hasOg) {
    $score += 5;
    $checks[] = [
      'category' => 'Social & Schema',
      'type' => 'warning',
      'title' => 'OpenGraph Configured Without og:image',
      'desc' => 'og:title found, but og:image is missing. Social shares will display without a banner preview.'
    ];
  } else {
    $checks[] = [
      'category' => 'Social & Schema',
      'type' => 'warning',
      'title' => 'Missing OpenGraph Social Meta Tags',
      'desc' => 'No OpenGraph tags (og:title, og:image) found. Links shared on social media will look plain.'
    ];
  }

  // 11. Schema.org JSON-LD Structured Data
  $jsonLdNodes = $xpath->query('//script[@type="application/ld+json"]');
  if ($jsonLdNodes->length > 0) {
    $score += 5;
    $checks[] = [
      'category' => 'Social & Schema',
      'type' => 'pass',
      'title' => "Structured Data Found ({$jsonLdNodes->length} JSON-LD blocks)",
      'desc' => 'Schema.org structured data detected, qualifying your website for rich Google SERP results.'
    ];
  } else {
    $checks[] = [
      'category' => 'Social & Schema',
      'type' => 'warning',
      'title' => 'No JSON-LD Structured Data Detected',
      'desc' => 'Adding Schema markup (Organization, LocalBusiness, FAQ, Service) helps Google understand your business entity.'
    ];
  }

  // Cap score to 100
  $score = min(100, max(15, $score));

  // Determine Grade
  if ($score >= 90) { $grade = 'A+'; $gradeClass = 'grade-excellent'; $gradeLabel = 'Excellent SEO Health'; }
  elseif ($score >= 80) { $grade = 'A'; $gradeClass = 'grade-great'; $gradeLabel = 'Strong SEO Foundation'; }
  elseif ($score >= 65) { $grade = 'B'; $gradeClass = 'grade-good'; $gradeLabel = 'Moderate SEO - Needs Improvements'; }
  elseif ($score >= 50) { $grade = 'C'; $gradeClass = 'grade-avg'; $gradeLabel = 'Fair - Several Ranking Blockers'; }
  else { $grade = 'D'; $gradeClass = 'grade-poor'; $gradeLabel = 'Critical SEO Errors Detected'; }

  // Extract preview data
  $previewHost = $parsed['host'];
  $previewTitle = !empty($pageTitle) ? $pageTitle : $previewHost;
  $previewDesc = !empty($metaDesc) ? $metaDesc : "Visit {$previewHost} for official products, services, and company updates.";

  echo json_encode([
    'success' => true,
    'url' => $effectiveUrl,
    'host' => $previewHost,
    'score' => $score,
    'grade' => $grade,
    'gradeClass' => $gradeClass,
    'gradeLabel' => $gradeLabel,
    'stats' => [
      'responseTime' => $responseTimeMs . ' ms',
      'pageSize' => $pageSizeKb . ' KB',
      'httpCode' => $httpCode,
      'isHttps' => $isHttps,
      'titleLength' => $titleLen,
      'descLength' => $descLen,
      'h1Count' => $h1Count,
      'imgCount' => $imgCount,
      'missingAltCount' => $missingAltCount,
    ],
    'preview' => [
      'title' => $previewTitle,
      'description' => $previewDesc,
      'url' => $effectiveUrl,
      'ogImage' => $ogImgUrl
    ],
    'checks' => $checks
  ]);
  exit;
}

$contact = contact_us();
$pageTitle = "Free Website SEO Auditor & Technical Diagnostic Tool - NikhilWorks";
$pageDesc = "Analyze any website's technical SEO health instantly. Real-time audit of Meta tags, H1 headings, SSL, page speed, mobile viewport, OpenGraph & Schema markup.";
$pageKeywords = "free seo audit tool, website seo checker, technical seo audit, seo scorecard, check website seo score, seo diagnostic tool india";
$canonicalUrl = "https://nikhilworks.com/seo-auditor/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-1HVPGR81RL"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','G-1HVPGR81RL');</script>
  <meta charset="UTF-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?></title>
  <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
  <meta property="og:url" content="<?= htmlspecialchars($canonicalUrl) ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="https://nikhilworks.com/assets/img/preview.png">
  <meta name="twitter:card" content="summary_large_image">

  <!-- SoftwareApplication Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "NikhilWorks Free Technical SEO Auditor",
    "operatingSystem": "All",
    "applicationCategory": "SEOApplication",
    "offers": {
      "@type": "Offer",
      "price": "0",
      "priceCurrency": "USD"
    },
    "description": "Comprehensive real-time website SEO audit scanner analyzing meta tags, headings, SSL, speed, OpenGraph, and Schema markup."
  }
  </script>

  <!-- FAQPage Schema -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "What does this free SEO auditor check?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "The tool performs a live diagnostic of HTTPS/SSL, server TTFB response latency, Title tags, Meta descriptions, H1/H2 heading hierarchy, image alt text, mobile viewport, OpenGraph tags, and Schema.org structured data."
        }
      },
      {
        "@type": "Question",
        "name": "How is the SEO health score calculated?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "The score is calculated on a 100-point scale based on Google's primary search ranking factors: Security & Speed (20 pts), Meta & Core SEO (30 pts), Content Hierarchy (25 pts), Media Optimization (15 pts), and Structured Data (10 pts)."
        }
      },
      {
        "@type": "Question",
        "name": "Can Nikhil help fix the technical errors identified in my audit?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Yes. Nikhil Gupta provides complete end-to-end technical SEO optimization and custom development to achieve a 95+ score and boost organic keyword rankings on Google."
        }
      }
    ]
  }
  </script>

  <link rel="shortcut icon" href="<?= $site ?>assets/img/logo/fav-logo5.png" type="image/x-icon">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/bootstrap.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/aos.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/fontawesome.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/mobile.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/plugins/owlcarousel.min.css">
  <link rel="stylesheet" href="<?= $site ?>assets/css/main.css">
  <script src="<?= $site ?>assets/js/plugins/jquery-3-6-0.min.js"></script>

  <style>
    :root {
      --nw-primary: #104041;
      --nw-accent: #ADFF1C;
      --nw-dark: #082223;
      --nw-card-bg: #FFFFFF;
      --nw-text-dark: #0f2d2e;
      --nw-text-muted: #557273;
    }

    /* HERO */
    .auditor-hero {
      position: relative;
      background: radial-gradient(circle at 80% 20%, rgba(173, 255, 28, 0.16) 0%, transparent 45%),
                  radial-gradient(circle at 15% 85%, rgba(16, 64, 65, 0.8) 0%, transparent 50%),
                  linear-gradient(135deg, #051617 0%, #0c3334 55%, #041213 100%);
      padding: 135px 0 90px;
      overflow: hidden;
      color: #fff;
    }
    .auditor-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(173, 255, 28, 0.12);
      border: 1px solid rgba(173, 255, 28, 0.35);
      color: #ADFF1C;
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 20px;
      backdrop-filter: blur(8px);
    }
    .auditor-hero h1 {
      font-size: clamp(2.2rem, 4.4vw, 3.4rem);
      font-weight: 800;
      line-height: 1.2;
      color: #ffffff;
      margin-bottom: 18px;
      letter-spacing: -0.5px;
    }
    .auditor-hero-sub {
      font-size: 1.15rem;
      line-height: 1.65;
      color: #c4dedb;
      max-width: 720px;
      margin: 0 auto 35px;
    }

    /* URL AUDIT INPUT FORM */
    .audit-input-wrapper {
      max-width: 740px;
      margin: 0 auto;
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 16px;
      padding: 8px;
      backdrop-filter: blur(12px);
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
    }
    .audit-input-field {
      flex: 1;
      min-width: 260px;
      background: #ffffff;
      border: none;
      border-radius: 10px;
      padding: 14px 20px;
      font-size: 15px;
      color: #0f2d2e;
      font-weight: 600;
      outline: none;
    }
    .audit-input-field::placeholder {
      color: #8fa6a5;
      font-weight: 400;
    }
    .btn-audit-run {
      background: #ADFF1C;
      color: #082223 !important;
      font-weight: 800;
      font-size: 15px;
      padding: 14px 28px;
      border-radius: 10px;
      border: none;
      display: inline-flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      transition: all 0.25s ease;
      box-shadow: 0 6px 20px rgba(173, 255, 28, 0.35);
      white-space: nowrap;
    }
    .btn-audit-run:hover {
      background: #c3ff4f;
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(173, 255, 28, 0.45);
    }
    .btn-audit-run:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none;
    }

    /* SAMPLE CHIPS */
    .sample-chips-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-top: 18px;
      font-size: 13px;
      color: #9eb8b6;
    }
    .sample-chip {
      background: rgba(255, 255, 255, 0.08);
      border: 1px solid rgba(255, 255, 255, 0.15);
      color: #d6ecea;
      padding: 4px 12px;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .sample-chip:hover {
      background: rgba(173, 255, 28, 0.15);
      color: #ADFF1C;
      border-color: #ADFF1C;
    }

    /* AUDIT SCANNER LOADER */
    .audit-scanning-panel {
      display: none;
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.3);
      border-radius: 20px;
      padding: 40px 30px;
      margin-top: 40px;
      text-align: center;
      color: #fff;
    }
    .scan-spinner {
      width: 60px;
      height: 60px;
      border: 4px solid rgba(173, 255, 28, 0.2);
      border-top-color: #ADFF1C;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 0 auto 20px;
    }
    .scan-status-text {
      font-size: 1.25rem;
      font-weight: 700;
      color: #ADFF1C;
      margin-bottom: 8px;
    }
    .scan-sub-text {
      font-size: 14px;
      color: #a3c9ca;
    }

    /* RESULTS DASHBOARD */
    .audit-results-section {
      display: none;
      padding: 70px 0 100px;
      background: #f7faf9;
    }
    .scorecard-header-card {
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 22px;
      padding: 36px 30px;
      color: #ffffff;
      box-shadow: 0 15px 45px rgba(0, 0, 0, 0.15);
      margin-bottom: 35px;
    }
    .score-circle-wrap {
      position: relative;
      width: 140px;
      height: 140px;
      margin: 0 auto;
    }
    .score-svg {
      transform: rotate(-90deg);
      width: 140px;
      height: 140px;
    }
    .score-svg-bg {
      fill: none;
      stroke: rgba(255, 255, 255, 0.1);
      stroke-width: 10;
    }
    .score-svg-bar {
      fill: none;
      stroke: #ADFF1C;
      stroke-width: 10;
      stroke-linecap: round;
      stroke-dasharray: 377;
      stroke-dashoffset: 377;
      transition: stroke-dashoffset 1.4s ease, stroke 0.4s ease;
    }
    .score-number-inside {
      position: absolute;
      inset: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      font-size: 2.3rem;
      font-weight: 900;
      color: #ADFF1C;
      line-height: 1;
    }
    .score-number-inside span {
      font-size: 12px;
      font-weight: 600;
      color: #a3c9ca;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .grade-badge-pill {
      display: inline-block;
      padding: 6px 18px;
      border-radius: 50px;
      font-size: 13.5px;
      font-weight: 800;
      margin-top: 14px;
    }
    .grade-excellent { background: rgba(37, 211, 102, 0.2); color: #25D366; border: 1px solid #25D366; }
    .grade-great { background: rgba(173, 255, 28, 0.2); color: #ADFF1C; border: 1px solid #ADFF1C; }
    .grade-good { background: rgba(255, 189, 46, 0.2); color: #FFBD2E; border: 1px solid #FFBD2E; }
    .grade-avg { background: rgba(255, 140, 0, 0.2); color: #FF8C00; border: 1px solid #FF8C00; }
    .grade-poor { background: rgba(255, 95, 86, 0.2); color: #FF5F56; border: 1px solid #FF5F56; }

    /* STATS STRIP */
    .audit-meta-stats {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
      gap: 12px;
      margin-top: 25px;
      padding-top: 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
    }
    .meta-stat-item {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 12px;
      padding: 12px;
      text-align: center;
    }
    .meta-stat-item .val {
      font-size: 16px;
      font-weight: 800;
      color: #ADFF1C;
      margin-bottom: 2px;
    }
    .meta-stat-item .lbl {
      font-size: 11.5px;
      color: #a3c9ca;
      text-transform: uppercase;
    }

    /* GOOGLE SERP PREVIEW BOX */
    .serp-preview-box {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 18px;
      padding: 26px;
      margin-bottom: 30px;
      box-shadow: 0 6px 20px rgba(16, 64, 65, 0.04);
    }
    .serp-preview-title {
      font-size: 13px;
      font-weight: 700;
      color: #104041;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 14px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .google-mockup-card {
      background: #ffffff;
      border: 1px solid #dadce0;
      border-radius: 12px;
      padding: 16px 20px;
      font-family: Arial, sans-serif;
    }
    .google-url-line {
      font-size: 12px;
      color: #202124;
      display: flex;
      align-items: center;
      gap: 6px;
      margin-bottom: 4px;
    }
    .google-title-line {
      font-size: 18px;
      color: #1a0dab;
      font-weight: 400;
      line-height: 1.3;
      margin-bottom: 4px;
      cursor: pointer;
    }
    .google-desc-line {
      font-size: 13px;
      color: #4d5156;
      line-height: 1.45;
    }

    /* FILTER TABS */
    .check-filter-tabs {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 24px;
    }
    .filter-tab-btn {
      background: #ffffff;
      border: 1.5px solid #d4e3e2;
      color: #104041;
      padding: 8px 18px;
      border-radius: 30px;
      font-size: 13.5px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .filter-tab-btn:hover {
      border-color: #104041;
    }
    .filter-tab-btn.active {
      background: #104041;
      color: #ADFF1C;
      border-color: #104041;
    }

    /* CHECK ITEMS */
    .audit-check-card {
      background: #ffffff;
      border: 1px solid #e1eceb;
      border-radius: 16px;
      padding: 20px 22px;
      margin-bottom: 14px;
      display: flex;
      align-items: flex-start;
      gap: 16px;
      transition: all 0.25s ease;
    }
    .audit-check-card:hover {
      border-color: #104041;
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(16, 64, 65, 0.05);
    }
    .check-status-icon {
      width: 36px;
      height: 36px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      flex-shrink: 0;
      margin-top: 2px;
    }
    .check-pass .check-status-icon { background: rgba(37, 211, 102, 0.15); color: #25D366; }
    .check-warning .check-status-icon { background: rgba(255, 189, 46, 0.15); color: #FFBD2E; }
    .check-critical .check-status-icon { background: rgba(255, 95, 86, 0.15); color: #FF5F56; }
    .check-category-badge {
      font-size: 11px;
      font-weight: 700;
      color: #637f7e;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 4px;
    }
    .check-title-text {
      font-size: 15px;
      font-weight: 800;
      color: #0f2d2e;
      margin-bottom: 4px;
    }
    .check-desc-text {
      font-size: 13.5px;
      color: #557273;
      line-height: 1.5;
      margin: 0;
    }

    /* ACTION BAR */
    .audit-cta-sidebar {
      position: sticky;
      top: 100px;
      background: #082223;
      border: 1px solid rgba(173, 255, 28, 0.35);
      border-radius: 20px;
      padding: 30px 24px;
      color: #ffffff;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }
    .btn-fix-wa {
      background: #25D366;
      color: #ffffff !important;
      font-weight: 800;
      font-size: 15px;
      padding: 14px 20px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      width: 100%;
      text-decoration: none;
      transition: all 0.25s ease;
      box-shadow: 0 6px 20px rgba(37, 211, 102, 0.35);
      margin-bottom: 12px;
    }
    .btn-fix-wa:hover {
      background: #1da851;
      transform: translateY(-2px);
    }
    .btn-re-audit {
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #ffffff !important;
      font-weight: 600;
      font-size: 13.5px;
      padding: 10px 16px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .btn-re-audit:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
  </style>
</head>

<body class="homepage4-body">

  <?php include_once "includes/header.php" ?>

  <!--===== HERO AREA STARTS =======-->
  <section class="auditor-hero">
    <div class="loc-grid-overlay"></div>
    <div class="container" style="position: relative; z-index: 2;">
      <div class="row text-center">
        <div class="col-lg-10 mx-auto">
          <div class="auditor-pill">
            <i class="fa-solid fa-stethoscope"></i> Real-Time Technical &amp; On-Page SEO Engine
          </div>
          <h1>Free Website SEO Auditor &amp; Health Scanner</h1>
          <p class="auditor-hero-sub">
            Run an instant diagnostic audit on your website. Detect hidden meta errors, heading hierarchy flaws, image optimization leaks, SSL issues, and get actionable steps to rank on Google Page 1.
          </p>

          <!-- Input form -->
          <form id="seoAuditForm" class="audit-input-wrapper">
            <input type="text" id="targetUrlInput" class="audit-input-field" placeholder="Enter your website URL (e.g., https://yourwebsite.com)" required autocomplete="off">
            <button type="submit" id="auditSubmitBtn" class="btn-audit-run">
              <i class="fa-solid fa-magnifying-glass"></i>
              <span>Audit Website Free</span>
            </button>
          </form>

          <!-- Sample Quick-Try Chips -->
          <div class="sample-chips-row">
            <span>Try sample websites:</span>
            <span class="sample-chip" data-url="https://nikhilworks.com">nikhilworks.com</span>
            <span class="sample-chip" data-url="https://stripe.com">stripe.com</span>
            <span class="sample-chip" data-url="https://apple.com">apple.com</span>
          </div>

          <!-- Loader Panel -->
          <div id="scanLoaderPanel" class="audit-scanning-panel">
            <div class="scan-spinner"></div>
            <div class="scan-status-text" id="scanStatusStep">Connecting to target server...</div>
            <div class="scan-sub-text">Analyzing HTML DOM, Title tags, Meta descriptions, SSL &amp; Core Web Vitals...</div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!--===== HERO AREA ENDS =======-->

  <!--===== RESULTS DASHBOARD STARTS =======-->
  <section id="auditResultsSection" class="audit-results-section">
    <div class="container">
      
      <!-- Top Scorecard Header -->
      <div class="scorecard-header-card" data-aos="fade-up">
        <div class="row align-items-center">
          
          <!-- Score Dial -->
          <div class="col-lg-4 text-center border-end border-secondary border-opacity-25 pb-3 pb-lg-0">
            <div class="score-circle-wrap">
              <svg class="score-svg" viewBox="0 0 140 140">
                <circle class="score-svg-bg" cx="70" cy="70" r="60"></circle>
                <circle id="scoreProgressSvg" class="score-svg-bar" cx="70" cy="70" r="60"></circle>
              </svg>
              <div class="score-number-inside">
                <span id="scoreValNum">0</span>
                <span>/ 100</span>
              </div>
            </div>
            <div>
              <span id="scoreGradeBadge" class="grade-badge-pill grade-great">Grade A</span>
            </div>
          </div>

          <!-- Summary Insights -->
          <div class="col-lg-8 ps-lg-4">
            <h2 class="fw-bold mb-1" id="auditedUrlHeading" style="font-size: 1.4rem; color: #ADFF1C;">https://example.com</h2>
            <p class="text-white-50 small mb-3" id="auditTimestampText">Scanned on <?= date('d M Y, h:i A') ?> IST</p>
            <p class="mb-0 text-light" id="auditSummaryBlurb">
              Your website has a healthy SEO foundation with minor opportunities to optimize heading structure and meta descriptions to capture higher click-through rates on Google search.
            </p>

            <!-- Quick Stats Strip -->
            <div class="audit-meta-stats">
              <div class="meta-stat-item">
                <div class="val" id="statResponseTime">120 ms</div>
                <div class="lbl">Response Time</div>
              </div>
              <div class="meta-stat-item">
                <div class="val" id="statPageSize">45 KB</div>
                <div class="lbl">Page Size</div>
              </div>
              <div class="meta-stat-item">
                <div class="val" id="statSslStatus">Active</div>
                <div class="lbl">HTTPS / SSL</div>
              </div>
              <div class="meta-stat-item">
                <div class="val" id="statH1Count">1</div>
                <div class="lbl">H1 Headings</div>
              </div>
              <div class="meta-stat-item">
                <div class="val" id="statImgAlt">100%</div>
                <div class="lbl">Image Alt Score</div>
              </div>
            </div>

          </div>

        </div>
      </div>

      <div class="row g-4">

        <!-- LEFT COLUMN: SERP Preview & Detailed Checklist -->
        <div class="col-lg-8">

          <!-- Google SERP Simulation -->
          <div class="serp-preview-box">
            <div class="serp-preview-title">
              <i class="fa-brands fa-google text-primary"></i> Live Google SERP Search Snippet Preview
            </div>
            <div class="google-mockup-card">
              <div class="google-url-line">
                <i class="fa-solid fa-globe fa-xs text-muted"></i>
                <span id="serpUrlDisplay">https://example.com</span>
              </div>
              <div class="google-title-line" id="serpTitleDisplay">Sample Web Page Title</div>
              <div class="google-desc-line" id="serpDescDisplay">Sample meta description snippet as indexed by Google Search.</div>
            </div>
          </div>

          <!-- Filter Tabs -->
          <div class="check-filter-tabs">
            <button type="button" class="filter-tab-btn active" data-filter="all">All Checks (<span id="countAll">0</span>)</button>
            <button type="button" class="filter-tab-btn" data-filter="critical">Critical (<span id="countCritical" class="text-danger">0</span>)</button>
            <button type="button" class="filter-tab-btn" data-filter="warning">Warnings (<span id="countWarning" class="text-warning">0</span>)</button>
            <button type="button" class="filter-tab-btn" data-filter="pass">Passed (<span id="countPass" class="text-success">0</span>)</button>
          </div>

          <!-- Dynamic List of Audit Checks -->
          <div id="auditChecksListContainer">
            <!-- Populated via JavaScript -->
          </div>

        </div>

        <!-- RIGHT COLUMN: Conversion Action & Professional Help -->
        <div class="col-lg-4">
          <div class="audit-cta-sidebar">
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(173, 255, 28, 0.15); color: #ADFF1C; font-size: 11.5px; font-weight: 800;">
              <i class="fa-solid fa-crown"></i> 1-ON-1 SEO RECOVERY
            </div>

            <h3 class="fw-bold mb-3" style="font-size: 1.3rem;">Need Nikhil to Fix These SEO Errors?</h3>
            <p class="text-light small mb-4" style="line-height: 1.6;">
              Fixing technical errors, core vitals, and schema markup can dramatically improve your Google rankings within 3-4 weeks. Let me fix these issues for you directly.
            </p>

            <a href="#" id="fixOnWhatsAppBtn" class="btn-fix-wa" target="_blank" rel="noopener">
              <i class="fa-brands fa-whatsapp fs-5"></i>
              <span>Chat With Nikhil on WhatsApp</span>
            </a>

            <button type="button" id="reAuditBtn" class="btn-re-audit">
              <i class="fa-solid fa-arrows-rotate"></i>
              <span>Audit Another Website</span>
            </button>

            <div class="mt-4 pt-3 border-top border-secondary border-opacity-25 text-center">
              <p class="text-white-50 small mb-0">
                <i class="fa-solid fa-shield-check text-success"></i> 100% White-Hat SEO &amp; Google Core Algorithm Compliant
              </p>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
  <!--===== RESULTS DASHBOARD ENDS =======-->

  <!--===== EDUCATIONAL & SEO CONTENT SECTION =======-->
  <section class="calc-info-section">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
          <span class="badge bg-light text-dark px-3 py-2 rounded-pill fw-bold mb-2">Technical SEO Insights</span>
          <h2 class="fw-bold" style="color: #0f2d2e; font-size: clamp(1.8rem, 3.2vw, 2.5rem);">Why Regular Technical SEO Auditing Is Crucial</h2>
          <p class="text-muted">Over 68% of online experiences begin with a search engine. Hidden code flaws prevent your website from ranking even if your content is high quality.</p>
        </div>
      </div>

      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="info-box-card">
            <div class="info-icon"><i class="fa-solid fa-bolt"></i></div>
            <h4 class="fw-bold fs-5 mb-2" style="color: #0f2d2e;">Core Web Vitals &amp; Speed</h4>
            <p class="text-muted small mb-0">Google favors websites that respond in under 600ms. High server response times and uncompressed code trigger ranking demotions on mobile devices.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="info-box-card">
            <div class="info-icon"><i class="fa-solid fa-tags"></i></div>
            <h4 class="fw-bold fs-5 mb-2" style="color: #0f2d2e;">Click-Through Rate (CTR) Optimization</h4>
            <p class="text-muted small mb-0">Carefully calibrated 50-60 character titles and 140-160 character meta descriptions directly boost organic search click-through rates by up to 35%.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="info-box-card">
            <div class="info-icon"><i class="fa-solid fa-diagram-project"></i></div>
            <h4 class="fw-bold fs-5 mb-2" style="color: #0f2d2e;">Schema.org Rich Snippets</h4>
            <p class="text-muted small mb-0">JSON-LD structured data communicates direct entity relationships to Google AI algorithms, qualifying your brand for star ratings and FAQ dropdowns on SERPs.</p>
          </div>
        </div>
      </div>

      <!-- FAQ Section -->
      <div class="row mt-5 pt-4">
        <div class="col-lg-8 mx-auto">
          <h3 class="fw-bold text-center mb-4" style="color: #0f2d2e;">Frequently Asked Questions</h3>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>How often should I run an SEO audit on my website?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              It is best practice to run a comprehensive technical audit at least once a month or immediately following major theme updates, content restructuring, or new product launches.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>What is considered a good SEO health score?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              A score above 85/100 indicates strong technical compliance with Google Webmaster Guidelines. Websites scoring below 65 usually have missing meta tags, heading conflicts, or insecure HTTP protocols that hinder ranking.
            </div>
          </div>

          <div class="loc-faq-item">
            <button class="loc-faq-btn" type="button">
              <span>How can Nikhil help achieve a 95+ score?</span>
              <i class="fa-solid fa-plus"></i>
            </button>
            <div class="loc-faq-content" style="display: none;">
              As a full-stack engineer and SEO specialist, I don't just point out errors — I write the clean semantic HTML, configure server-level Gzip/brotli caching, implement Schema JSON-LD, and optimize Core Web Vitals to guarantee page 1 competitiveness.
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <?php include_once "includes/footer.php" ?>

  <!--===== SEO AUDITOR SCRIPT ENGINE =======-->
  <script>
    (function() {
      let auditChecksData = [];

      const form = document.getElementById('seoAuditForm');
      const urlInput = document.getElementById('targetUrlInput');
      const submitBtn = document.getElementById('auditSubmitBtn');
      const loader = document.getElementById('scanLoaderPanel');
      const statusStep = document.getElementById('scanStatusStep');
      const resultsSection = document.getElementById('auditResultsSection');

      // Sample chips
      document.querySelectorAll('.sample-chip').forEach(chip => {
        chip.addEventListener('click', function() {
          urlInput.value = this.getAttribute('data-url');
          form.dispatchEvent(new Event('submit'));
        });
      });

      // Submit Form
      form.addEventListener('submit', function(e) {
        e.preventDefault();
        const url = urlInput.value.trim();
        if (!url) return;

        submitBtn.disabled = true;
        loader.style.display = 'block';
        resultsSection.style.display = 'none';

        // Simulated progress stages
        const steps = [
          "Connecting to host and verifying SSL certificate...",
          "Downloading HTML DOM and measuring server latency...",
          "Inspecting Title, Meta description & Canonical tags...",
          "Evaluating H1-H3 heading hierarchy & body copy...",
          "Checking image alt attributes and OpenGraph metadata...",
          "Computing final SEO health score..."
        ];
        let stepIdx = 0;
        const stepInterval = setInterval(() => {
          if (stepIdx < steps.length) {
            statusStep.innerText = steps[stepIdx];
            stepIdx++;
          }
        }, 350);

        // Fetch audit data via AJAX
        fetch(`<?= $site ?>seo-auditor.php?action=audit&url=${encodeURIComponent(url)}`)
          .then(res => res.json())
          .then(data => {
            clearInterval(stepInterval);
            submitBtn.disabled = false;
            loader.style.display = 'none';

            if (!data.success) {
              alert(data.error || 'Failed to analyze website. Please check the URL.');
              return;
            }

            renderAuditResults(data);
          })
          .catch(err => {
            clearInterval(stepInterval);
            submitBtn.disabled = false;
            loader.style.display = 'none';
            alert('An unexpected error occurred while communicating with the server.');
          });
      });

      function renderAuditResults(data) {
        auditChecksData = data.checks || [];

        // 1. Score Dial Animation
        const score = data.score;
        const circumference = 377; // 2 * PI * 60
        const offset = circumference - (score / 100) * circumference;
        const progressSvg = document.getElementById('scoreProgressSvg');
        
        let strokeColor = '#ADFF1C';
        if (score < 50) strokeColor = '#FF5F56';
        else if (score < 75) strokeColor = '#FFBD2E';
        else if (score < 85) strokeColor = '#25D366';
        progressSvg.style.stroke = strokeColor;
        progressSvg.style.strokeDashoffset = offset;

        document.getElementById('scoreValNum').innerText = score;
        const gradeBadge = document.getElementById('scoreGradeBadge');
        gradeBadge.className = `grade-badge-pill ${data.gradeClass}`;
        gradeBadge.innerText = `Grade ${data.grade} • ${data.gradeLabel}`;

        // 2. Header Info & Stats
        document.getElementById('auditedUrlHeading').innerText = data.url;
        document.getElementById('statResponseTime').innerText = data.stats.responseTime;
        document.getElementById('statPageSize').innerText = data.stats.pageSize;
        document.getElementById('statSslStatus').innerText = data.stats.isHttps ? 'Active' : 'Insecure';
        document.getElementById('statH1Count').innerText = data.stats.h1Count;
        
        const altScore = data.stats.imgCount > 0 
          ? Math.round(((data.stats.imgCount - data.stats.missingAltCount) / data.stats.imgCount) * 100) + '%'
          : '100%';
        document.getElementById('statImgAlt').innerText = altScore;

        // 3. SERP Preview
        document.getElementById('serpUrlDisplay').innerText = data.preview.url;
        document.getElementById('serpTitleDisplay').innerText = data.preview.title;
        document.getElementById('serpDescDisplay').innerText = data.preview.description;

        // 4. Counts
        const passCount = auditChecksData.filter(c => c.type === 'pass').length;
        const warnCount = auditChecksData.filter(c => c.type === 'warning').length;
        const critCount = auditChecksData.filter(c => c.type === 'critical').length;
        document.getElementById('countAll').innerText = auditChecksData.length;
        document.getElementById('countPass').innerText = passCount;
        document.getElementById('countWarning').innerText = warnCount;
        document.getElementById('countCritical').innerText = critCount;

        // 5. Render Checklist
        renderChecksList('all');

        // 6. WhatsApp Fix Link
        const waMsg = `Hi Nikhil, I just audited my website (${data.url}) on your SEO Auditor tool.%0AMy SEO Health Score is ${score}/100 with ${critCount} critical errors and ${warnCount} warnings.%0ACan you help me fix these SEO errors and improve my Google rankings?`;
        document.getElementById('fixOnWhatsAppBtn').href = `https://wa.me/918368552640?text=${waMsg}`;

        // Show Section & Scroll
        resultsSection.style.display = 'block';
        resultsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      function renderChecksList(filter) {
        const container = document.getElementById('auditChecksListContainer');
        container.innerHTML = '';

        const filtered = auditChecksData.filter(c => {
          if (filter === 'all') return true;
          return c.type === filter;
        });

        if (filtered.length === 0) {
          container.innerHTML = `<div class="p-4 text-center text-muted bg-white rounded-4 border">No ${filter} items found.</div>`;
          return;
        }

        filtered.forEach(item => {
          const card = document.createElement('div');
          card.className = `audit-check-card check-${item.type}`;
          
          let iconHtml = '<i class="fa-solid fa-check"></i>';
          if (item.type === 'warning') iconHtml = '<i class="fa-solid fa-triangle-exclamation"></i>';
          if (item.type === 'critical') iconHtml = '<i class="fa-solid fa-xmark"></i>';

          card.innerHTML = `
            <div class="check-status-icon">${iconHtml}</div>
            <div class="flex-grow-1">
              <div class="check-category-badge">${item.category}</div>
              <div class="check-title-text">${item.title}</div>
              <p class="check-desc-text">${item.desc}</p>
            </div>
          `;
          container.appendChild(card);
        });
      }

      // Filter tabs click
      document.querySelectorAll('.filter-tab-btn').forEach(tab => {
        tab.addEventListener('click', function() {
          document.querySelectorAll('.filter-tab-btn').forEach(t => t.classList.remove('active'));
          this.classList.add('active');
          renderChecksList(this.getAttribute('data-filter'));
        });
      });

      // Re-audit button
      document.getElementById('reAuditBtn').addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
        urlInput.focus();
      });

      // Accordion for FAQs
      document.querySelectorAll('.loc-faq-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const content = this.nextElementSibling;
          const icon = this.querySelector('i');
          if (content.style.display === 'block') {
            content.style.display = 'none';
            icon.className = 'fa-solid fa-plus';
          } else {
            content.style.display = 'block';
            icon.className = 'fa-solid fa-minus';
          }
        });
      });

    })();
  </script>

</body>
</html>
