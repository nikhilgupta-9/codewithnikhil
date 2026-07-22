<?php
// Data for location-city.php
// City/state-level location pages within core markets (USA, UK, Canada, Australia).
// To add a new city: add one row to the relevant country's list below. No .htaccess
// change needed — location-city.php is routed via a generic ^web-developer-([a-z-]+)/?$ rule.

$countries = [
  'usa' => [
    'flag' => 'USA',
    'currency' => 'USD',
    'price_range' => 'USD 100 - 5,000',
    'schema_country' => 'US',
    'places' => [
      ['slug' => 'california', 'name' => 'California', 'region' => 'CA'],
      ['slug' => 'new-york', 'name' => 'New York', 'region' => 'NY'],
      ['slug' => 'washington', 'name' => 'Washington', 'region' => 'WA'],
      ['slug' => 'texas', 'name' => 'Texas', 'region' => 'TX'],
      ['slug' => 'virginia', 'name' => 'Virginia', 'region' => 'VA'],
      ['slug' => 'delaware', 'name' => 'Delaware', 'region' => 'DE'],
      ['slug' => 'los-angeles', 'name' => 'Los Angeles', 'region' => 'CA'],
      ['slug' => 'chicago', 'name' => 'Chicago', 'region' => 'IL'],
      ['slug' => 'houston', 'name' => 'Houston', 'region' => 'TX'],
      ['slug' => 'dallas', 'name' => 'Dallas', 'region' => 'TX'],
      ['slug' => 'phoenix', 'name' => 'Phoenix', 'region' => 'AZ'],
      ['slug' => 'san-diego', 'name' => 'San Diego', 'region' => 'CA'],
      ['slug' => 'philadelphia', 'name' => 'Philadelphia', 'region' => 'PA'],
      ['slug' => 'miami', 'name' => 'Miami', 'region' => 'FL'],
      ['slug' => 'manhattan', 'name' => 'Manhattan', 'region' => 'NY'],
    ],
  ],
  'uk' => [
    'flag' => 'UK',
    'currency' => 'GBP',
    'price_range' => 'GBP 100 - 4,000',
    'schema_country' => 'GB',
    'places' => [
      ['slug' => 'england', 'name' => 'England', 'region' => ''],
      ['slug' => 'london', 'name' => 'London', 'region' => ''],
      ['slug' => 'manchester', 'name' => 'Manchester', 'region' => ''],
      ['slug' => 'bristol', 'name' => 'Bristol', 'region' => ''],
      ['slug' => 'leeds', 'name' => 'Leeds', 'region' => ''],
      ['slug' => 'birmingham', 'name' => 'Birmingham', 'region' => ''],
      ['slug' => 'glasgow', 'name' => 'Glasgow', 'region' => ''],
      ['slug' => 'liverpool', 'name' => 'Liverpool', 'region' => ''],
      ['slug' => 'edinburgh', 'name' => 'Edinburgh', 'region' => ''],
    ],
  ],
  'canada' => [
    'flag' => 'Canada',
    'currency' => 'CAD',
    'price_range' => 'CAD 100 - 6,000',
    'schema_country' => 'CA',
    'places' => [
      ['slug' => 'ontario', 'name' => 'Ontario', 'region' => 'ON'],
      ['slug' => 'british-columbia', 'name' => 'British Columbia', 'region' => 'BC'],
      ['slug' => 'toronto', 'name' => 'Toronto', 'region' => 'ON'],
      ['slug' => 'vancouver', 'name' => 'Vancouver', 'region' => 'BC'],
      ['slug' => 'montreal', 'name' => 'Montreal', 'region' => 'QC'],
      ['slug' => 'calgary', 'name' => 'Calgary', 'region' => 'AB'],
      ['slug' => 'ottawa', 'name' => 'Ottawa', 'region' => 'ON'],
      ['slug' => 'edmonton', 'name' => 'Edmonton', 'region' => 'AB'],
      ['slug' => 'winnipeg', 'name' => 'Winnipeg', 'region' => 'MB'],
      ['slug' => 'quebec-city', 'name' => 'Quebec City', 'region' => 'QC'],
    ],
  ],
  'australia' => [
    'flag' => 'Australia',
    'currency' => 'AUD',
    'price_range' => 'AUD 200 - 7,000',
    'schema_country' => 'AU',
    'places' => [
      ['slug' => 'sydney', 'name' => 'Sydney', 'region' => 'NSW'],
      ['slug' => 'melbourne', 'name' => 'Melbourne', 'region' => 'VIC'],
      ['slug' => 'brisbane', 'name' => 'Brisbane', 'region' => 'QLD'],
      ['slug' => 'gold-coast', 'name' => 'Gold Coast', 'region' => 'QLD'],
      ['slug' => 'perth', 'name' => 'Perth', 'region' => 'WA'],
      ['slug' => 'adelaide', 'name' => 'Adelaide', 'region' => 'SA'],
      ['slug' => 'canberra', 'name' => 'Canberra', 'region' => 'ACT'],
    ],
  ],
  'new-zealand' => [
    'flag' => 'New Zealand',
    'currency' => 'NZD',
    'price_range' => 'NZD 200 - 7,000',
    'schema_country' => 'NZ',
    'places' => [
      ['slug' => 'auckland', 'name' => 'Auckland', 'region' => ''],
      ['slug' => 'wellington', 'name' => 'Wellington', 'region' => ''],
      ['slug' => 'christchurch', 'name' => 'Christchurch', 'region' => ''],
    ],
  ],
  'russia' => [
    'flag' => 'Russia',
    'currency' => 'USD',
    'price_range' => 'USD 100 - 5,000',
    'schema_country' => 'RU',
    'places' => [
      ['slug' => 'moscow', 'name' => 'Moscow', 'region' => ''],
      ['slug' => 'saint-petersburg', 'name' => 'Saint Petersburg', 'region' => ''],
    ],
  ],
  'south-africa' => [
    'flag' => 'South Africa',
    'currency' => 'ZAR',
    'price_range' => 'ZAR 1,500 - 80,000',
    'schema_country' => 'ZA',
    'places' => [
      ['slug' => 'cape-town', 'name' => 'Cape Town', 'region' => ''],
      ['slug' => 'johannesburg', 'name' => 'Johannesburg', 'region' => ''],
      ['slug' => 'durban', 'name' => 'Durban', 'region' => ''],
    ],
  ],
  'saudi-arabia' => [
    'flag' => 'Saudi Arabia',
    'currency' => 'SAR',
    'price_range' => 'SAR 500 - 50,000',
    'schema_country' => 'SA',
    'places' => [
      ['slug' => 'riyadh', 'name' => 'Riyadh', 'region' => ''],
      ['slug' => 'jeddah', 'name' => 'Jeddah', 'region' => ''],
      ['slug' => 'dammam', 'name' => 'Dammam', 'region' => ''],
    ],
  ],
  'uae' => [
    'flag' => 'UAE',
    'currency' => 'AED',
    'price_range' => 'AED 500 - 50,000',
    'schema_country' => 'AE',
    'places' => [
      ['slug' => 'abu-dhabi', 'name' => 'Abu Dhabi', 'region' => ''],
      ['slug' => 'sharjah', 'name' => 'Sharjah', 'region' => ''],
    ],
  ],
  'switzerland' => [
    'flag' => 'Switzerland',
    'currency' => 'CHF',
    'price_range' => 'CHF 200 - 8,000',
    'schema_country' => 'CH',
    'places' => [
      ['slug' => 'zurich', 'name' => 'Zurich', 'region' => ''],
      ['slug' => 'geneva', 'name' => 'Geneva', 'region' => ''],
      ['slug' => 'zug', 'name' => 'Zug', 'region' => ''],
    ],
  ],
  'germany' => [
    'flag' => 'Germany',
    'currency' => 'EUR',
    'price_range' => 'EUR 150 - 6,000',
    'schema_country' => 'DE',
    'places' => [
      ['slug' => 'berlin', 'name' => 'Berlin', 'region' => ''],
      ['slug' => 'munich', 'name' => 'Munich', 'region' => ''],
      ['slug' => 'hamburg', 'name' => 'Hamburg', 'region' => ''],
    ],
  ],
];

$pages = [];

foreach ($countries as $country) {
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
      'price_range' => $country['price_range'],
      'flag' => $country['flag'],
      'schema_country' => $country['schema_country'],
      'schema_region' => $place['region'],
    ];
  }
}

return $pages;
