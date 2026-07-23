<?php
// Data for service-redesign.php -- website redesign, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-redesign.php is routed via a generic ^website-redesign-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 200 - 8,000', 'uk' => 'GBP 150 - 6,000', 'canada' => 'CAD 250 - 10,000',
  'australia' => 'AUD 350 - 12,000', 'new-zealand' => 'NZD 350 - 12,000', 'russia' => 'USD 200 - 8,000',
  'south-africa' => 'ZAR 3,000 - 130,000', 'saudi-arabia' => 'SAR 1,000 - 80,000', 'uae' => 'AED 1,000 - 80,000',
  'switzerland' => 'CHF 350 - 13,000', 'germany' => 'EUR 250 - 10,000',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'website-redesign-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Website Redesign Services in {$name} | Modern Website Makeover - NikhilWorks",
      'h1' => "Website Redesign for {$name} Businesses",
      'description' => "Modernize your outdated website with a conversion-focused redesign for {$name} businesses. Keep your content and SEO rankings, upgrade the design, speed and mobile experience, priced in {$country['currency']}.",
      'keywords' => "website redesign {$nameLower}, website makeover {$nameLower}, redesign old website {$nameLower}, modernize website {$nameLower}, website revamp {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Same content, same rankings, a design that finally converts — for {$name} businesses.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
