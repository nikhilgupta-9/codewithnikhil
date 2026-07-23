<?php
// Data for vertical-healthcare.php -- healthcare website design, by city.
// USA/UK cities come from the shared data/city-list.php. India cities are listed
// separately below since city-list.php doesn't cover India (that's handled by
// the separate India location system). To add a new city: add a row to
// city-list.php (USA/UK) or the $indiaCities list below (India). No .htaccess
// change needed -- vertical-healthcare.php is routed via a generic
// ^healthcare-website-design-([a-z-]+)/?$ rule.

$indiaCities = [
  ['slug' => 'delhi', 'name' => 'Delhi'],
  ['slug' => 'mumbai', 'name' => 'Mumbai'],
  ['slug' => 'bangalore', 'name' => 'Bangalore'],
  ['slug' => 'gurgaon', 'name' => 'Gurgaon'],
  ['slug' => 'noida', 'name' => 'Noida'],
  ['slug' => 'hyderabad', 'name' => 'Hyderabad'],
  ['slug' => 'ahmedabad', 'name' => 'Ahmedabad'],
];

$countries = include __DIR__ . '/city-list.php';
$pages = [];

$buildPage = function ($place, $currency, $flag, $schemaCountry) use (&$pages) {
  $slug = 'healthcare-website-design-' . $place['slug'];
  $name = $place['name'];
  $nameLower = strtolower($name);

  $pages[$slug] = [
    'title' => "Healthcare Website Design in {$name} | Clinic & Hospital Websites - NikhilWorks",
    'h1' => "Healthcare Website Design for {$name} Practices",
    'description' => "Website design for clinics, hospitals and healthcare providers in {$name}. Online booking, patient information and local SEO built in, priced in {$currency}.",
    'keywords' => "healthcare website design {$nameLower}, medical website design {$nameLower}, clinic website design {$nameLower}, hospital website design {$nameLower}, doctor website design {$nameLower}",
    'canonical' => "https://nikhilworks.com/{$slug}/",
    'hero_sub' => "Websites built for patient trust and easy appointment booking in {$name}.",
    'country_name' => $name,
    'currency' => $currency,
    'flag' => $flag,
    'schema_country' => $schemaCountry,
  ];
};

foreach ($countries['usa']['places'] as $place) {
  $buildPage($place, 'USD', 'USA', 'US');
}
foreach ($countries['uk']['places'] as $place) {
  $buildPage($place, 'GBP', 'UK', 'GB');
}
foreach ($indiaCities as $place) {
  $buildPage($place, 'INR', 'India', 'IN');
}

$priceRanges = ['US' => 'USD 300 - 8,000', 'GB' => 'GBP 250 - 6,000', 'IN' => 'INR 12,000 - 2,00,000'];
foreach ($pages as &$page) {
  $page['price_range'] = $priceRanges[$page['schema_country']];
}
unset($page);

return $pages;
