<?php
/**
 * Renders the bidirectional internal cross-link sections for regional hub pages
 * and city-level landing pages.
 *
 * Implements a true Hub-and-Spoke internal linking architecture:
 * 1. Country Hubs link DOWN to all cities in that country.
 * 2. City Pages link UP to the Country Hub.
 * 3. City Pages link LATERALLY to all other 7 services in that exact city.
 * 4. City Pages link HORIZONTALLY to neighboring cities in that country.
 */

/** Maps schema.org country code to city-list country key. */
function hub_schema_to_country_key(?string $schemaCountry): ?string {
  $map = [
    'US' => 'usa',
    'GB' => 'uk',
    'CA' => 'canada',
    'AU' => 'australia',
    'NZ' => 'new-zealand',
    'RU' => 'russia',
    'ZA' => 'south-africa',
    'SA' => 'saudi-arabia',
    'AE' => 'uae',
    'CH' => 'switzerland',
    'DE' => 'germany',
    'IN' => 'india',
  ];
  return $map[$schemaCountry] ?? null;
}

/** Returns supported service definitions with icons, labels and descriptions. */
function hub_supported_services(): array {
  return [
    'web-developer-' => [
      'key' => 'web-developer',
      'label' => 'Web Development',
      'icon' => 'fa-code',
      'full_title' => 'Custom Web Development',
      'desc' => 'High-performance custom websites & web applications',
    ],
    'seo-services-' => [
      'key' => 'seo-services',
      'label' => 'SEO Services',
      'icon' => 'fa-magnifying-glass-chart',
      'full_title' => 'Google SEO & Rankings',
      'desc' => 'Technical, on-page, and local search optimization',
    ],
    'crm-development-' => [
      'key' => 'crm-development',
      'label' => 'CRM Development',
      'icon' => 'fa-database',
      'full_title' => 'Custom CRM & Software',
      'desc' => 'Custom business workflows, lead tracking & ERP systems',
    ],
    'ads-management-' => [
      'key' => 'ads-management',
      'label' => 'Ads Management',
      'icon' => 'fa-rectangle-ad',
      'full_title' => 'Google & Meta Paid Ads',
      'desc' => 'High-ROI PPC campaigns, conversion tracking & scaling',
    ],
    'website-redesign-' => [
      'key' => 'website-redesign',
      'label' => 'Website Redesign',
      'icon' => 'fa-wand-magic-sparkles',
      'full_title' => 'Modern Website Redesign',
      'desc' => 'Modern UI/UX refreshes and responsive mobile redesigns',
    ],
    'website-maintenance-' => [
      'key' => 'website-maintenance',
      'label' => 'Website Maintenance',
      'icon' => 'fa-screwdriver-wrench',
      'full_title' => '24/7 Site Maintenance',
      'desc' => 'Security updates, backups, bug fixes & uptime monitoring',
    ],
    'website-auditing-' => [
      'key' => 'website-auditing',
      'label' => 'Speed & Tech Audit',
      'icon' => 'fa-stethoscope',
      'full_title' => 'Technical & Speed Audit',
      'desc' => 'Core Web Vitals, performance bottlenecks & security audits',
    ],
    'keyword-promotion-' => [
      'key' => 'keyword-promotion',
      'label' => 'Keyword Promotion',
      'icon' => 'fa-arrow-trend-up',
      'full_title' => 'Keyword Rank Promotion',
      'desc' => 'Targeted buyer intent keywords ranking on Google Page 1',
    ],
    'healthcare-website-design-' => [
      'key' => 'healthcare-website-design',
      'label' => 'Healthcare Websites',
      'icon' => 'fa-hospital',
      'full_title' => 'Healthcare & Clinic Sites',
      'desc' => 'HIPAA/GDPR-conscious clinic, hospital & doctor websites',
    ],
  ];
}

/** Maps a schema.org country code to the slug used under assets/img/. */
function hub_country_slug(?string $schemaCountry): ?string {
  $map = ['US' => 'usa', 'GB' => 'uk', 'IN' => 'india', 'AE' => 'uae', 'CA' => 'canada', 'AU' => 'australia'];
  return $map[$schemaCountry] ?? null;
}

/** Returns the site-relative URL for a hub image if it was fetched, else null. */
function hub_image_url(string $site, string $folder, ?string $key): ?string {
  if ($key === null) {
    return null;
  }
  $path = __DIR__ . '/../assets/img/' . $folder . '/' . $key . '.jpg';
  return file_exists($path) ? $site . 'assets/img/' . $folder . '/' . $key . '.jpg' : null;
}

/** Honest regulatory awareness line */
function render_compliance_note(?string $schemaCountry, string $context = ''): string {
  if ($schemaCountry === 'US' && $context === 'healthcare') {
    return '<p class="text-muted small mb-3"><i class="fa-solid fa-shield-halved me-1 text-primary"></i>Built with HIPAA-conscious data handling practices for patient-facing forms and appointment booking.</p>';
  }
  if ($schemaCountry === 'GB') {
    return '<p class="text-muted small mb-3"><i class="fa-solid fa-shield-halved me-1 text-primary"></i>GDPR-aware by default — cookie consent, data minimization and clear privacy notices built into every site.</p>';
  }
  return '';
}

/** Detects which service prefix and place slug are in the current slug. */
function detect_service_and_place(string $slug): array {
  $path = parse_url($slug, PHP_URL_PATH);
  $slug = trim($path !== null ? $path : $slug, '/');
  $parts = explode('/', $slug);
  $slug = end($parts);

  $services = hub_supported_services();
  foreach ($services as $prefix => $data) {
    if (strpos($slug, $prefix) === 0) {
      $place = substr($slug, strlen($prefix));
      return [$prefix, $place, $data];
    }
  }
  return ['', $slug, []];
}

/** Finds country key, country data, and place row from data/city-list.php */
function find_country_and_place(string $placeSlug): array {
  static $cityList = null;
  if ($cityList === null) {
    $cityList = include __DIR__ . '/../data/city-list.php';
  }

  foreach ($cityList as $cKey => $cData) {
    foreach ($cData['places'] as $pl) {
      if ($pl['slug'] === $placeSlug) {
        return [$cKey, $cData, $pl];
      }
    }
  }
  return [null, null, null];
}

/** Helper to get country hub URL for a service prefix and country key */
function get_country_hub_url(string $prefix, string $countryKey): string {
  if ($prefix === 'web-developer-') {
    if ($countryKey === 'uae') return 'web-developer-dubai/';
    if ($countryKey === 'india') return 'web-developer-india/';
    return 'web-developer-' . $countryKey . '/';
  }
  return $prefix . $countryKey . '/';
}

/**
 * Renders the Country Hub cross-links (downward to cities + lateral to other services).
 */
function render_hub_crosslinks(string $site, ?string $schemaCountry, string $currentUrl, string $context = ''): string {
  $hubLinks = include __DIR__ . '/../util/hub_links.php';
  $countryKey = hub_schema_to_country_key($schemaCountry);
  $cityList = include __DIR__ . '/../data/city-list.php';
  $cleanUrl = trim($currentUrl, '/');

  list($currentPrefix, $currentPlace, $serviceMeta) = detect_service_and_place($cleanUrl);

  $region = $hubLinks[$schemaCountry] ?? null;
  $countryName = $region['name'] ?? ($cityList[$countryKey]['flag'] ?? 'this region');

  // 1. Regional Cities Downward Links
  $cityPills = '';
  if ($countryKey && isset($cityList[$countryKey]['places']) && !empty($currentPrefix)) {
    $places = $cityList[$countryKey]['places'];
    $pills = [];
    foreach ($places as $place) {
      $citySlug = $currentPrefix . $place['slug'] . '/';
      $active = ($citySlug === $cleanUrl . '/') ? ' active' : '';
      $label = htmlspecialchars($place['name']);
      $pills[] = '<a href="' . htmlspecialchars($site . $citySlug) . '" class="btn btn-outline-dark btn-sm rounded-pill m-1' . $active . '"><i class="fa-solid fa-location-dot me-1 text-danger"></i>' . $label . '</a>';
    }
    $serviceName = !empty($serviceMeta['label']) ? $serviceMeta['label'] : 'Services';
    $cityPills = '
    <div class="mt-4 pt-4 border-top">
      <h3 class="fw-bold h5 text-center mb-2">City &amp; Regional Coverage for ' . htmlspecialchars($serviceName) . ' in ' . htmlspecialchars($countryName) . '</h3>
      <p class="text-muted small text-center mb-3">Direct remote delivery and localized solutions available across key business hubs:</p>
      <div class="text-center">' . implode('', $pills) . '</div>
    </div>';
  }

  // 2. Lateral Country Services Links
  $servicePills = '';
  if ($region) {
    $links = [];
    if (!empty($region['location']) && trim($region['location']['url'], '/') !== $cleanUrl) {
      $links[] = $region['location'];
    }
    if (!empty($region['services'])) {
      foreach ($region['services'] as $link) {
        if (trim($link['url'], '/') !== $cleanUrl) {
          $links[] = $link;
        }
      }
    }
    if (!empty($region['verticals'])) {
      foreach ($region['verticals'] as $link) {
        if (trim($link['url'], '/') !== $cleanUrl) {
          $links[] = $link;
        }
      }
    }
    if (!empty($links)) {
      $pillsHtml = '';
      foreach ($links as $link) {
        $pillsHtml .= '<a href="' . htmlspecialchars($site . $link['url']) . '" class="btn btn-outline-dark btn-sm rounded-pill m-1">' . htmlspecialchars($link['label']) . '</a>';
      }
      $servicePills = '
      <div class="text-center mb-3">
        <h2 class="fw-bold h4">Explore More Services in ' . htmlspecialchars($countryName) . '</h2>
        <p class="text-muted mb-2">We work fully remotely with clients across ' . htmlspecialchars($countryName) . ' — everything is coordinated by call and email, no local office needed.</p>
        ' . render_compliance_note($schemaCountry, $context) . '
        <div class="text-center mt-3">' . $pillsHtml . '</div>
      </div>';
    }
  }

  if (empty($cityPills) && empty($servicePills)) {
    return '';
  }

  return '
<section class="py-5 border-top" style="background: #F8FAFC;">
  <div class="container">
    ' . $servicePills . '
    ' . $cityPills . '
  </div>
</section>';
}

/**
 * Renders the comprehensive Hub-and-Spoke crosslinks on city-level landing pages.
 */
function render_city_crosslinks(string $site, string $pageSlug, array $cityData): string {
  $cleanSlug = trim($pageSlug, '/');
  list($currentPrefix, $placeSlug, $currentMeta) = detect_service_and_place($cleanSlug);

  list($countryKey, $countryData, $placeData) = find_country_and_place($placeSlug);

  if (!$countryKey || !$placeData) {
    return '';
  }

  $cityName = htmlspecialchars($placeData['name']);
  $countryName = htmlspecialchars($countryData['flag']);
  $services = hub_supported_services();

  // Tier 1: Parent Country Hub
  $parentHubUrl = get_country_hub_url($currentPrefix, $countryKey);
  $serviceTitle = $currentMeta['full_title'] ?? 'Digital Solutions';

  // Tier 2: Lateral Services in this exact City
  $cityServicesHtml = '';
  foreach ($services as $pfx => $meta) {
    if ($pfx === 'healthcare-website-design-' && !in_array($countryKey, ['usa', 'uk', 'india'])) {
      continue;
    }
    $isCurrent = ($pfx === $currentPrefix);
    $url = $site . $pfx . $placeSlug . '/';
    $activeClass = $isCurrent ? ' border-primary bg-light' : '';
    
    $cityServicesHtml .= '
    <div class="col-lg-3 col-md-6 col-sm-6">
      <a href="' . htmlspecialchars($url) . '" class="text-decoration-none text-dark d-block p-3 rounded bg-white border h-100 shadow-sm' . $activeClass . '" style="transition: transform 0.2s, box-shadow 0.2s;">
        <div class="d-flex align-items-center mb-2">
          <div class="rounded-circle bg-light d-flex align-items-center justify-content-center me-2 text-primary" style="width: 34px; height: 34px; font-size: 14px;">
            <i class="fa-solid ' . htmlspecialchars($meta['icon']) . '"></i>
          </div>
          <span class="fw-bold small">' . htmlspecialchars($meta['label']) . '</span>
        </div>
        <p class="text-muted mb-0" style="font-size: 11px; line-height: 1.4;">' . htmlspecialchars($meta['desc']) . '</p>
      </a>
    </div>';
  }

  // Tier 3: Other Cities in this Country for the active service
  $siblingCitiesHtml = '';
  if (!empty($countryData['places'])) {
    $chips = [];
    foreach ($countryData['places'] as $pl) {
      if ($pl['slug'] === $placeSlug) continue;
      $chipUrl = $site . $currentPrefix . $pl['slug'] . '/';
      $chips[] = '<a href="' . htmlspecialchars($chipUrl) . '" class="btn btn-outline-secondary btn-sm rounded-pill m-1" style="font-size: 12px;"><i class="fa-solid fa-location-dot text-danger me-1"></i>' . htmlspecialchars($pl['name']) . '</a>';
    }
    if (!empty($chips)) {
      $siblingCitiesHtml = '
      <div class="mt-4 pt-4 border-top">
        <h4 class="h6 fw-bold text-center text-uppercase text-muted mb-3" style="letter-spacing: 1px;">
          Other ' . $countryName . ' Locations for ' . htmlspecialchars($currentMeta['label'] ?? 'This Service') . '
        </h4>
        <div class="text-center">' . implode('', $chips) . '</div>
      </div>';
    }
  }

  return '
<section class="py-5 border-top" style="background: #F8FAFC;">
  <div class="container">
    <!-- Hub Backlink Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 pb-2 border-bottom">
      <div>
        <span class="badge bg-dark mb-1">' . $countryName . ' Regional Silo</span>
        <h3 class="h4 fw-bold mb-0 text-dark">Services Available in ' . $cityName . '</h3>
      </div>
      <div class="mt-2 mt-md-0">
        <a href="' . htmlspecialchars($site . $parentHubUrl) . '" class="btn btn-sm btn-dark rounded-pill px-3">
          <i class="fa-solid fa-arrow-left me-1"></i> View All ' . $countryName . ' ' . htmlspecialchars($currentMeta['label'] ?? '') . '
        </a>
      </div>
    </div>

    <!-- 8 Lateral Local Services Grid -->
    <div class="row g-3">
      ' . $cityServicesHtml . '
    </div>

    <!-- Sibling Cities Horizontal Links -->
    ' . $siblingCitiesHtml . '
  </div>
</section>';
}

/**
 * Universal dispatcher: routes automatically between Country Hub and City page crosslinks.
 */
function render_service_page_links(string $site, string $page, array $c, bool $isHub, string $context = ''): string {
  if ($isHub) {
    return render_hub_crosslinks($site, $c['schema_country'] ?? null, $page . '/', $context);
  }
  return render_city_crosslinks($site, $page, $c);
}
