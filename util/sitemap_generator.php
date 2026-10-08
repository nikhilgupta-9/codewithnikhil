<?php
/**
 * Automated Real-Time Sitemap Generator & Synchronization Engine
 * Generates:
 *   1. sitemap-main.xml (Core Pages, Free Tools Suite, Services & Hubs)
 *   2. sitemap-blogs.xml (All Live Published Blog Posts with Real Timestamps)
 *   3. sitemap-locations.xml (All Regional & City Landing Pages)
 *   4. sitemap.xml (Root Sitemap Index)
 *
 * Can be called automatically via PHP: generate_all_sitemaps($conn)
 * Or via CLI: php util/sitemap_generator.php
 * Or via Admin AJAX request.
 */

if (!function_exists('generate_all_sitemaps')) {
    function generate_all_sitemaps($conn = null, $silent = true) {
        $rootDir = dirname(__DIR__);
        
        if (!$conn) {
            if (file_exists($rootDir . '/config/connect.php')) {
                require_once $rootDir . '/config/connect.php';
            }
        }

        $baseUrl = 'https://nikhilworks.com/';
        $today = date('Y-m-d');
        $nowIso = date('Y-m-d\TH:i:sP');

        // 1. CORE STATIC PAGES & TOOLS SUITE
        $staticPages = [
            ['loc' => '',                           'freq' => 'weekly',  'priority' => '1.0'],
            ['loc' => 'about/',                     'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'services/',                  'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'portfolio/',                 'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'pricing/',                   'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'contact/',                   'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'blogs/',                     'freq' => 'weekly',  'priority' => '0.9'],
            ['loc' => 'testimonials/',              'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'ai-integration-services/',   'freq' => 'monthly', 'priority' => '0.9'],
            ['loc' => 'website-cost-calculator/',   'freq' => 'monthly', 'priority' => '0.8'],
            ['loc' => 'seo-auditor/',               'freq' => 'monthly', 'priority' => '0.8'],
            ['loc' => 'privacy-policy/',            'freq' => 'yearly',  'priority' => '0.4'],
            ['loc' => 'terms-and-conditions/',      'freq' => 'yearly',  'priority' => '0.4'],
            
            // ── FREE TOOLS SUITE ──
            ['loc' => 'free-tools/',                'freq' => 'weekly',  'priority' => '0.9'],
            ['loc' => 'tools/qr-code/',             'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/invoice/',             'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/whatsapp-link/',       'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/gst-calculator/',      'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/profit-calculator/',   'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/schema-generator/',    'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/pagespeed/',           'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/meta-preview/',        'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/ssl-checker/',         'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/index-checker/',       'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/robots-validator/',    'freq' => 'weekly',  'priority' => '0.8'],
            ['loc' => 'tools/privacy-policy/',      'freq' => 'weekly',  'priority' => '0.8'],
        ];

        // 2. HUB & LOCATION DATA FILES
        $indiaHubSlugs = [
            'web-designer-delhi',
            'web-developer-india',
            'seo-services-india',
            'freelance-web-developer-india',
            'website-development-cost-india',
        ];

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
            $path = $rootDir . '/' . $file;
            if (file_exists($path)) {
                $pages = include $path;
                if (is_array($pages)) {
                    foreach (array_keys($pages) as $slug) {
                        $hubUrls[$slug] = true;
                    }
                }
            }
        }

        foreach ($cityFiles as $file) {
            $path = $rootDir . '/' . $file;
            if (file_exists($path)) {
                $pages = include $path;
                if (is_array($pages)) {
                    foreach (array_keys($pages) as $slug) {
                        $locationUrls[$slug] = true;
                    }
                }
            }
        }

        // India file split
        $indiaPath = $rootDir . '/data/locations-india.php';
        if (file_exists($indiaPath)) {
            $indiaPages = include $indiaPath;
            if (is_array($indiaPages)) {
                foreach (array_keys($indiaPages) as $slug) {
                    if (in_array($slug, $indiaHubSlugs, true)) {
                        $hubUrls[$slug] = true;
                    } else {
                        $locationUrls[$slug] = true;
                    }
                }
            }
        }

        // Build Main Sitemap Entries
        $mainUrls = [];
        foreach ($staticPages as $p) {
            $mainUrls[] = [
                'loc'      => $baseUrl . $p['loc'],
                'lastmod'  => $today,
                'freq'     => $p['freq'],
                'priority' => $p['priority'],
            ];
        }
        foreach (array_keys($hubUrls) as $slug) {
            $mainUrls[] = [
                'loc'      => $baseUrl . $slug . '/',
                'lastmod'  => $today,
                'freq'     => 'monthly',
                'priority' => '0.8',
            ];
        }

        // Add Active Service Detail Pages from DB
        if ($conn) {
            $sql = "SELECT `slug_url`, `added_on` FROM `sub_categories` WHERE `status` = 1";
            $res = mysqli_query($conn, $sql);
            if ($res) {
                while ($row = mysqli_fetch_assoc($res)) {
                    if (empty($row['slug_url'])) continue;
                    $cleanSlug = trim($row['slug_url'], '/');
                    $modTime = !empty($row['added_on']) ? $row['added_on'] : $today;
                    $mainUrls[] = [
                        'loc'      => $baseUrl . 'service/' . $cleanSlug . '/',
                        'lastmod'  => date('Y-m-d', strtotime($modTime)),
                        'freq'     => 'monthly',
                        'priority' => '0.9',
                    ];
                }
            }
        }

        // 3. BLOG POSTS SITEMAP (sitemap-blogs.xml)
        $blogUrls = [];
        $latestBlogTimestamp = $today;

        if ($conn) {
            $sqlBlogs = "SELECT `slug_url`, `updated_at`, `created_at` FROM `blogs` WHERE `status` = 'published' ORDER BY `id` DESC";
            $resBlogs = mysqli_query($conn, $sqlBlogs);
            if ($resBlogs) {
                while ($b = mysqli_fetch_assoc($resBlogs)) {
                    if (empty($b['slug_url'])) continue;
                    $cleanSlug = trim($b['slug_url'], '/');
                    $modTime = !empty($b['updated_at']) ? $b['updated_at'] : (!empty($b['created_at']) ? $b['created_at'] : $today);
                    $formattedDate = date('Y-m-d', strtotime($modTime));
                    
                    if ($formattedDate > $latestBlogTimestamp) {
                        $latestBlogTimestamp = $formattedDate;
                    }

                    $blogUrls[] = [
                        'loc'      => $baseUrl . 'blog/' . $cleanSlug . '/',
                        'lastmod'  => $formattedDate,
                        'freq'     => 'weekly',
                        'priority' => '0.8',
                    ];
                }
            }
        }

        // 4. LOCATIONS SITEMAP (sitemap-locations.xml)
        $locationEntries = [];
        foreach (array_keys($locationUrls) as $slug) {
            $locationEntries[] = [
                'loc'      => $baseUrl . $slug . '/',
                'lastmod'  => $today,
                'freq'     => 'monthly',
                'priority' => '0.6',
            ];
        }

        // XML Formatter Helper
        $xmlBuilder = function(array $urls): string {
            $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
            $xml .= '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n\n";
            foreach ($urls as $u) {
                $xml .= sprintf(
                    '  <url>' . "\n" .
                    '    <loc>%s</loc>' . "\n" .
                    '    <lastmod>%s</lastmod>' . "\n" .
                    '    <changefreq>%s</changefreq>' . "\n" .
                    '    <priority>%s</priority>' . "\n" .
                    '  </url>' . "\n",
                    htmlspecialchars($u['loc'], ENT_XML1),
                    $u['lastmod'],
                    $u['freq'],
                    $u['priority']
                );
            }
            $xml .= '</urlset>' . "\n";
            return $xml;
        };

        // Write Sub-Sitemaps
        $mainXmlContent = $xmlBuilder($mainUrls);
        $blogXmlContent = $xmlBuilder($blogUrls);
        $locXmlContent = $xmlBuilder($locationEntries);

        file_put_contents($rootDir . '/sitemap-main.xml', $mainXmlContent);
        file_put_contents($rootDir . '/sitemap-blogs.xml', $blogXmlContent);
        file_put_contents($rootDir . '/sitemap-locations.xml', $locXmlContent);

        // 5. ROOT SITEMAP INDEX (sitemap.xml)
        $indexXml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $indexXml .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        $subSitemaps = [
            ['file' => 'sitemap-main.xml', 'lastmod' => $today],
            ['file' => 'sitemap-blogs.xml', 'lastmod' => $latestBlogTimestamp],
            ['file' => 'sitemap-locations.xml', 'lastmod' => $today]
        ];

        foreach ($subSitemaps as $s) {
            $indexXml .= sprintf(
                '  <sitemap>' . "\n" .
                '    <loc>%s</loc>' . "\n" .
                '    <lastmod>%s</lastmod>' . "\n" .
                '  </sitemap>' . "\n",
                htmlspecialchars($baseUrl . $s['file'], ENT_XML1),
                $s['lastmod']
            );
        }
        $indexXml .= '</sitemapindex>' . "\n";
        file_put_contents($rootDir . '/sitemap.xml', $indexXml);

        $result = [
            'success' => true,
            'timestamp' => $nowIso,
            'counts' => [
                'main' => count($mainUrls),
                'blogs' => count($blogUrls),
                'locations' => count($locationEntries),
                'total' => count($mainUrls) + count($blogUrls) + count($locationEntries)
            ]
        ];

        if (!$silent) {
            echo "=== Sitemap Generation Successful ===" . PHP_EOL;
            echo "sitemap-main.xml: " . $result['counts']['main'] . " URLs" . PHP_EOL;
            echo "sitemap-blogs.xml: " . $result['counts']['blogs'] . " Blog URLs" . PHP_EOL;
            echo "sitemap-locations.xml: " . $result['counts']['locations'] . " City URLs" . PHP_EOL;
            echo "Total Indexed URLs: " . $result['counts']['total'] . " URLs" . PHP_EOL;
            echo "sitemap.xml regenerated as index." . PHP_EOL;
        }

        return $result;
    }
}

// If executed via CLI or direct URL request
if (php_sapi_name() === 'cli' || (isset($_GET['run']) && $_GET['run'] === '1')) {
    require_once dirname(__DIR__) . '/config/connect.php';
    if (isset($_GET['run'])) {
        header('Content-Type: application/json');
        echo json_encode(generate_all_sitemaps($conn, true));
    } else {
        generate_all_sitemaps($conn, false);
    }
}
