<?php
/**
 * Regenerates sitemap.xml (as a sitemap index) + sitemap-main.xml (core pages,
 * blog, and every regional/country "hub" page) + sitemap-locations.xml (every
 * city-level page) from the actual data/*.php files that drive routing, so the
 * sitemap stays honest about what's on the site instead of a hand-maintained
 * list drifting out of sync. Run manually after adding content:
 *   php util/generate_sitemap.php
 * (Or via browser at /util/generate_sitemap.php on a trusted/local environment.)
 */

chdir(__DIR__ . '/..');
include 'config/connect.php';
include_once 'util/function.php';

$baseUrl = 'https://nikhilworks.com/';
$today   = date('Y-m-d');

// ── Core pages that rarely change ──
$staticPages = [
    ['loc' => '',                      'freq' => 'weekly',  'priority' => '1.0'],
    ['loc' => 'about/',                'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'services/',             'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'portfolio/',            'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'pricing/',              'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'contact/',              'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'blogs/',                'freq' => 'weekly',  'priority' => '0.8'],
    ['loc' => 'testimonials/',         'freq' => 'weekly',  'priority' => '0.8'],
    ['loc' => 'privacy-policy/',       'freq' => 'yearly',  'priority' => '0.4'],
    ['loc' => 'terms-and-conditions/', 'freq' => 'yearly',  'priority' => '0.4'],
];

// ── India location data mixes hub-tier (country/topic) and city-tier slugs in
//    one file (data/locations-india.php) -- split them explicitly here since
//    routing doesn't otherwise distinguish them. ──
$indiaHubSlugs = [
    'web-designer-delhi',
    'web-developer-india',
    'seo-services-india',
    'freelance-web-developer-india',
    'website-development-cost-india',
];

// ── Hub-tier data files: one country/topic entry per key. ──
$hubFiles = [
    'data/locations-international.php',
    'data/services-crm.php',
    'data/services-maintenance.php',
    'data/services-redesign.php',
    'data/services-auditing.php',
    'data/services-keyword-promotion.php',
    'data/services-ads.php',
    'data/services-seo.php',
    'data/verticals-healthcare.php',
    'data/verticals-real-estate.php',
    'data/verticals-junk-cars.php',
    'data/verticals-books.php',
];

// ── City-tier data files: many entries per country, one per city. ──
$cityFiles = [
    'data/locations-cities.php',
    'data/services-crm-cities.php',
    'data/services-maintenance-cities.php',
    'data/services-redesign-cities.php',
    'data/services-auditing-cities.php',
    'data/services-keyword-promotion-cities.php',
    'data/services-ads-cities.php',
    'data/services-seo-cities.php',
    'data/verticals-healthcare-cities.php',
];

$hubUrls = [];
$locationUrls = [];

foreach ($hubFiles as $file) {
    $pages = include __DIR__ . '/../' . $file;
    foreach (array_keys($pages) as $slug) {
        $hubUrls[$slug] = true;
    }
}

foreach ($cityFiles as $file) {
    $pages = include __DIR__ . '/../' . $file;
    foreach (array_keys($pages) as $slug) {
        $locationUrls[$slug] = true;
    }
}

// India file: split by the explicit hub list above.
$indiaPages = include __DIR__ . '/../data/locations-india.php';
foreach (array_keys($indiaPages) as $slug) {
    if (in_array($slug, $indiaHubSlugs, true)) {
        $hubUrls[$slug] = true;
    } else {
        $locationUrls[$slug] = true;
    }
}

function build_url_entries(array $baseEntries, array $slugs, string $baseUrl, string $today, string $freq, string $priority): array {
    $urls = [];
    foreach ($baseEntries as $p) {
        $urls[] = [
            'loc'      => $baseUrl . $p['loc'],
            'lastmod'  => $today,
            'freq'     => $p['freq'],
            'priority' => $p['priority'],
        ];
    }
    foreach (array_keys($slugs) as $slug) {
        $urls[] = [
            'loc'      => $baseUrl . $slug . '/',
            'lastmod'  => $today,
            'freq'     => $freq,
            'priority' => $priority,
        ];
    }
    return $urls;
}

$mainUrls = build_url_entries($staticPages, $hubUrls, $baseUrl, $today, 'monthly', '0.8');

// ── Service detail pages (sub_categories, parent_id 56019) go in the main sitemap too. ──
$sql = "SELECT `slug_url` FROM `sub_categories` WHERE `parent_id` = 56019 AND `status` = 1";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (empty($row['slug_url'])) continue;
        $mainUrls[] = [
            'loc'      => $baseUrl . 'service/' . $row['slug_url'] . '/',
            'lastmod'  => $today,
            'freq'     => 'monthly',
            'priority' => '0.9',
        ];
    }
}

// ── Published blog posts go in the main sitemap too. ──
$sql = "SELECT `slug_url`, `updated_at`, `created_at` FROM `blogs` WHERE `status` = 'published'";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (empty($row['slug_url'])) continue;
        $lastmod = $row['updated_at'] ?: $row['created_at'];
        $mainUrls[] = [
            'loc'      => $baseUrl . 'blog/' . $row['slug_url'] . '/',
            'lastmod'  => date('Y-m-d', strtotime($lastmod)),
            'freq'     => 'monthly',
            'priority' => '0.7',
        ];
    }
}

$locationEntries = build_url_entries([], $locationUrls, $baseUrl, $today, 'monthly', '0.6');

function urlset_xml(array $urls): string {
    $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
    $xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n\n";
    foreach ($urls as $u) {
        $xml .= sprintf(
            '<url><loc>%s</loc><lastmod>%s</lastmod><changefreq>%s</changefreq><priority>%s</priority></url>' . "\n",
            htmlspecialchars($u['loc'], ENT_XML1),
            $u['lastmod'],
            $u['freq'],
            $u['priority']
        );
    }
    $xml .= "\n" . '</urlset>' . "\n";
    return $xml;
}

file_put_contents(__DIR__ . '/../sitemap-main.xml', urlset_xml($mainUrls));
file_put_contents(__DIR__ . '/../sitemap-locations.xml', urlset_xml($locationEntries));

// ── sitemap.xml becomes a sitemap index, so the URL already submitted in
//    Search Console keeps working without needing a fresh submission. ──
$indexXml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$indexXml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach (['sitemap-main.xml', 'sitemap-locations.xml'] as $file) {
    $indexXml .= sprintf(
        '<sitemap><loc>%s</loc><lastmod>%s</lastmod></sitemap>' . "\n",
        htmlspecialchars($baseUrl . $file, ENT_XML1),
        $today
    );
}
$indexXml .= '</sitemapindex>' . "\n";
file_put_contents(__DIR__ . '/../sitemap.xml', $indexXml);

echo "sitemap-main.xml: " . count($mainUrls) . " URLs" . PHP_EOL;
echo "sitemap-locations.xml: " . count($locationEntries) . " URLs" . PHP_EOL;
echo "sitemap.xml regenerated as a sitemap index." . PHP_EOL;
