<?php
// Data for service-seo.php -- SEO services, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-seo.php is routed via a generic ^seo-services-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 300 - 3,000/mo', 'uk' => 'GBP 250 - 2,500/mo', 'canada' => 'CAD 400 - 3,500/mo',
  'australia' => 'AUD 500 - 4,000/mo', 'new-zealand' => 'NZD 500 - 4,000/mo', 'russia' => 'USD 300 - 3,000/mo',
  'south-africa' => 'ZAR 5,000 - 60,000/mo', 'saudi-arabia' => 'SAR 1,500 - 12,000/mo', 'uae' => 'AED 1,500 - 12,000/mo',
  'switzerland' => 'CHF 500 - 5,000/mo', 'germany' => 'EUR 400 - 3,500/mo',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'seo-services-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "SEO Services in {$name} | Google Ranking Experts - NikhilWorks",
      'h1' => "Professional SEO Services for {$name} Businesses",
      'description' => "Rank higher on Google with SEO services built for {$name} businesses. Keyword research, technical SEO, on-page optimization, local SEO and link building, priced in {$country['currency']}.",
      'keywords' => "seo services {$nameLower}, seo agency {$nameLower}, seo company {$nameLower}, local seo {$nameLower}, technical seo {$nameLower}, seo expert {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Data-driven SEO that gets your {$name} business to page 1 of Google.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
