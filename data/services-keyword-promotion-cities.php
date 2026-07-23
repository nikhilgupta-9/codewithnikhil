<?php
// Data for service-keyword-promotion.php -- keyword ranking/promotion, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-keyword-promotion.php is routed via a generic ^keyword-promotion-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 150 - 2,000/mo', 'uk' => 'GBP 120 - 1,600/mo', 'canada' => 'CAD 200 - 2,300/mo',
  'australia' => 'AUD 250 - 2,800/mo', 'new-zealand' => 'NZD 250 - 2,800/mo', 'russia' => 'USD 150 - 2,000/mo',
  'south-africa' => 'ZAR 2,500 - 40,000/mo', 'saudi-arabia' => 'SAR 800 - 8,000/mo', 'uae' => 'AED 800 - 8,000/mo',
  'switzerland' => 'CHF 250 - 3,000/mo', 'germany' => 'EUR 200 - 2,300/mo',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'keyword-promotion-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Keyword Promotion Services in {$name} | Rank Target Keywords - NikhilWorks",
      'h1' => "Keyword Promotion for {$name} Businesses",
      'description' => "Get your target keywords ranking on Google page 1 for {$name} businesses. Focused keyword promotion built around the exact terms your customers search, priced in {$country['currency']}.",
      'keywords' => "keyword promotion {$nameLower}, keyword ranking service {$nameLower}, rank on google {$nameLower}, target keyword ranking {$nameLower}, keyword position tracking {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Pick the keywords for your {$name} business. We get them ranking, and show you the proof every month.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
