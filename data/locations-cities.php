<?php
// Data for location-city.php -- web design/development, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// location-city.php is routed via a generic ^web-developer-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 100 - 5,000', 'uk' => 'GBP 100 - 4,000', 'canada' => 'CAD 100 - 6,000',
  'australia' => 'AUD 200 - 7,000', 'new-zealand' => 'NZD 200 - 7,000', 'russia' => 'USD 100 - 5,000',
  'south-africa' => 'ZAR 1,500 - 80,000', 'saudi-arabia' => 'SAR 500 - 50,000', 'uae' => 'AED 500 - 50,000',
  'switzerland' => 'CHF 200 - 8,000', 'germany' => 'EUR 150 - 6,000',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'web-developer-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Web Developer in {$name} | Affordable Website Design - NikhilWorks",
      'h1' => "Professional Web Developer in {$name}",
      'description' => "Hire an experienced web developer serving {$name} businesses remotely. Custom websites, WordPress, e-commerce and SEO services with transparent {$country['currency']} pricing and fast turnaround.",
      'keywords' => "web developer {$nameLower}, website design {$nameLower}, web development {$nameLower}, affordable web developer {$nameLower}, hire web developer {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Custom websites and SEO for {$name} businesses — remote-first, timezone-friendly, and priced in {$country['currency']}.",
      'city_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
      'schema_region' => $place['region'],
    ];
  }
}

return $pages;
