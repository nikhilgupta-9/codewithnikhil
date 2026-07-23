<?php
// Data for service-crm.php -- CRM development, by city.
// City/region list lives in data/city-list.php (shared across services).
// To add a new city: add one row there. No .htaccess change needed --
// service-crm.php is routed via a generic ^crm-development-([a-z-]+)/?$ rule.

$priceRanges = [
  'usa' => 'USD 300 - 15,000', 'uk' => 'GBP 250 - 12,000', 'canada' => 'CAD 400 - 18,000',
  'australia' => 'AUD 500 - 20,000', 'new-zealand' => 'NZD 500 - 20,000', 'russia' => 'USD 300 - 15,000',
  'south-africa' => 'ZAR 5,000 - 250,000', 'saudi-arabia' => 'SAR 1,500 - 60,000', 'uae' => 'AED 1,500 - 60,000',
  'switzerland' => 'CHF 500 - 25,000', 'germany' => 'EUR 400 - 18,000',
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

foreach ($countries as $key => $country) {
  foreach ($country['places'] as $place) {
    $slug = 'crm-development-' . $place['slug'];
    $name = $place['name'];
    $nameLower = strtolower($name);

    $pages[$slug] = [
      'title' => "CRM Development in {$name} | Custom CRM Solutions - NikhilWorks",
      'h1' => "Custom CRM Development for {$name} Businesses",
      'description' => "Custom CRM development and integration for {$name} businesses. Build a CRM around your actual sales process, or get expert Zoho, HubSpot and Salesforce customization, priced in {$country['currency']}.",
      'keywords' => "crm development {$nameLower}, custom crm software {$nameLower}, hire crm developer {$nameLower}, zoho crm customization {$nameLower}, crm integration {$nameLower}",
      'canonical' => "https://nikhilworks.com/{$slug}/",
      'hero_sub' => "A CRM built around how your {$name} team actually sells — not a generic template.",
      'country_name' => $name,
      'currency' => $country['currency'],
      'price_range' => $priceRanges[$key],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
    ];
  }
}

return $pages;
