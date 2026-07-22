<?php
/**
 * Regenerates sitemap.xml from the DB-backed dynamic routes (blog posts,
 * service detail pages) plus a static list of core/geo pages that don't
 * change often. Run manually after adding content:
 *   php util/generate_sitemap.php
 * (Or via browser at /util/generate_sitemap.php on a trusted/local environment.)
 */

chdir(__DIR__ . '/..');
include 'config/connect.php';
include_once 'util/function.php';

$baseUrl = 'https://nikhilworks.com/';
$today   = date('Y-m-d');

// ── Static pages that rarely change — kept as a plain list rather than
//    parsed out of location-india.php/location-international.php, since
//    those files mix routing logic with the page-config array. ──
$staticPages = [
    ['loc' => '',                                 'freq' => 'weekly',  'priority' => '1.0'],
    ['loc' => 'about/',                           'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'services/',                        'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'portfolio/',                       'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'pricing/',                         'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'contact/',                         'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'blogs/',                           'freq' => 'weekly',  'priority' => '0.8'],
    ['loc' => 'testimonials/',                    'freq' => 'weekly',  'priority' => '0.8'],
    ['loc' => 'privacy-policy/',                  'freq' => 'yearly',  'priority' => '0.4'],
    ['loc' => 'terms-and-conditions/',            'freq' => 'yearly',  'priority' => '0.4'],
    // India geo pages
    ['loc' => 'web-designer-delhi/',              'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'web-developer-india/',             'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'seo-services-india/',              'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'freelance-web-developer-india/',   'freq' => 'monthly', 'priority' => '0.9'],
    ['loc' => 'website-development-cost-india/',  'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-mumbai/',            'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-bangalore/',         'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-gurgaon/',           'freq' => 'monthly', 'priority' => '0.8'],
    // International geo pages
    ['loc' => 'web-developer-dubai/',             'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-usa/',               'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-uk/',                'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-australia/',         'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'hire-freelance-web-developer/',    'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-canada/',            'freq' => 'monthly', 'priority' => '0.8'],
    ['loc' => 'web-developer-singapore/',         'freq' => 'monthly', 'priority' => '0.8'],
];

$urls = [];
foreach ($staticPages as $p) {
    $urls[] = [
        'loc'      => $baseUrl . $p['loc'],
        'lastmod'  => $today,
        'freq'     => $p['freq'],
        'priority' => $p['priority'],
    ];
}

// ── Service detail pages (sub_categories, parent_id 56019 — same filter as get_sub_category()) ──
$sql = "SELECT `slug_url` FROM `sub_categories` WHERE `parent_id` = 56019 AND `status` = 1";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (empty($row['slug_url'])) continue;
        $urls[] = [
            'loc'      => $baseUrl . 'service/' . $row['slug_url'] . '/',
            'lastmod'  => $today,
            'freq'     => 'monthly',
            'priority' => '0.9',
        ];
    }
}

// ── Published blog posts ──
$sql = "SELECT `slug_url`, `updated_at`, `created_at` FROM `blogs` WHERE `status` = 'published'";
$res = mysqli_query($conn, $sql);
if ($res) {
    while ($row = mysqli_fetch_assoc($res)) {
        if (empty($row['slug_url'])) continue;
        $lastmod = $row['updated_at'] ?: $row['created_at'];
        $urls[] = [
            'loc'      => $baseUrl . 'blog/' . $row['slug_url'] . '/',
            'lastmod'  => date('Y-m-d', strtotime($lastmod)),
            'freq'     => 'monthly',
            'priority' => '0.7',
        ];
    }
}

// ── Build XML ──
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

file_put_contents(__DIR__ . '/../sitemap.xml', $xml);

echo "sitemap.xml regenerated with " . count($urls) . " URLs." . PHP_EOL;
