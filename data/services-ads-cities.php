<?php
// Data for service-ads.php -- Google & Meta ads management, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-ads.php is routed via a generic ^ads-management-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 200 - 2,500/mo + ad spend', 'uk' => 'GBP 150 - 2,000/mo + ad spend', 'canada' => 'CAD 250 - 3,000/mo + ad spend',
  'australia' => 'AUD 300 - 3,500/mo + ad spend', 'new-zealand' => 'NZD 300 - 3,500/mo + ad spend', 'russia' => 'USD 200 - 2,500/mo + ad spend',
  'south-africa' => 'ZAR 3,500 - 50,000/mo + ad spend', 'saudi-arabia' => 'SAR 1,000 - 10,000/mo + ad spend', 'uae' => 'AED 1,000 - 10,000/mo + ad spend',
  'switzerland' => 'CHF 300 - 4,000/mo + ad spend', 'germany' => 'EUR 250 - 3,000/mo + ad spend',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'ads-management-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Google & Meta Ads Management in {$name} | PPC & Social Ads - NikhilWorks",
      'h1' => "Google & Meta Ads Management for {$name} Businesses",
      'description' => "Google Ads and Meta (Facebook/Instagram) Ads management for {$name} businesses. Campaign setup, targeting, creative and ongoing optimization, priced in {$country['currency']}.",
      'keywords' => "google ads management {$nameLower}, meta ads {$nameLower}, facebook ads management {$nameLower}, ppc management {$nameLower}, instagram ads {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Ads managed for cost per lead, not vanity clicks — for {$name} businesses.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
