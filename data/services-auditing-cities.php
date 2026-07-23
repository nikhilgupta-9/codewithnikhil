<?php
// Data for service-auditing.php -- website auditing, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-auditing.php is routed via a generic ^website-auditing-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 100 - 1,500', 'uk' => 'GBP 80 - 1,200', 'canada' => 'CAD 130 - 2,000',
  'australia' => 'AUD 180 - 2,500', 'new-zealand' => 'NZD 180 - 2,500', 'russia' => 'USD 100 - 1,500',
  'south-africa' => 'ZAR 1,500 - 25,000', 'saudi-arabia' => 'SAR 500 - 6,000', 'uae' => 'AED 500 - 6,000',
  'switzerland' => 'CHF 180 - 2,600', 'germany' => 'EUR 130 - 2,000',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'website-auditing-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Website Audit Services in {$name} | SEO & Performance Audit - NikhilWorks",
      'h1' => "Website Audit for {$name} Businesses",
      'description' => "Find out exactly what is holding your {$name} website back. Full SEO, performance, security and UX audit with a prioritized action plan, priced in {$country['currency']}.",
      'keywords' => "website audit {$nameLower}, seo audit {$nameLower}, website analysis {$nameLower}, technical audit {$nameLower}, site audit report {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "A prioritized action plan for your {$name} website, not a 50-page report you will never read.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
