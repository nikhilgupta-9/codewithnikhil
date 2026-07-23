<?php
// Data for service-maintenance.php -- website maintenance & support, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-maintenance.php is routed via a generic ^website-maintenance-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 50 - 500/mo', 'uk' => 'GBP 40 - 400/mo', 'canada' => 'CAD 60 - 600/mo',
  'australia' => 'AUD 80 - 800/mo', 'new-zealand' => 'NZD 80 - 800/mo', 'russia' => 'USD 50 - 500/mo',
  'south-africa' => 'ZAR 800 - 12,000/mo', 'saudi-arabia' => 'SAR 200 - 2,000/mo', 'uae' => 'AED 200 - 2,000/mo',
  'switzerland' => 'CHF 80 - 900/mo', 'germany' => 'EUR 60 - 600/mo',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'website-maintenance-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "Website Maintenance Services in {$name} | Monthly Support Plans - NikhilWorks",
      'h1' => "Website Maintenance & Support for {$name} Businesses",
      'description' => "Keep your website secure, updated and fast with monthly maintenance plans for {$name} businesses. Security patches, backups, uptime monitoring and content updates, priced in {$country['currency']}.",
      'keywords' => "website maintenance {$nameLower}, website support {$nameLower}, monthly website maintenance {$nameLower}, wordpress maintenance {$nameLower}, website care plan {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "Stop worrying about your {$name} website. We keep it secure, updated and running.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
