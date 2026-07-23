<?php
// Shared city/state list used by every service's city-level pages
// (location-city.php, service-crm.php, service-seo.php, and future services).
// To add a new city: add one row to the relevant country's "places" list below.
// It will automatically get a page in every service that consumes this file.
return [
  'usa' => [
    'flag' => 'USA',
    'currency' => 'USD',
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
    'schema_country' => 'RU',
    'places' => [
      ['slug' => 'moscow', 'name' => 'Moscow', 'region' => ''],
      ['slug' => 'saint-petersburg', 'name' => 'Saint Petersburg', 'region' => ''],
    ],
  ],
  'south-africa' => [
    'flag' => 'South Africa',
    'currency' => 'ZAR',
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
    'schema_country' => 'AE',
    'places' => [
      ['slug' => 'abu-dhabi', 'name' => 'Abu Dhabi', 'region' => ''],
      ['slug' => 'sharjah', 'name' => 'Sharjah', 'region' => ''],
    ],
  ],
  'switzerland' => [
    'flag' => 'Switzerland',
    'currency' => 'CHF',
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
    'schema_country' => 'DE',
    'places' => [
      ['slug' => 'berlin', 'name' => 'Berlin', 'region' => ''],
      ['slug' => 'munich', 'name' => 'Munich', 'region' => ''],
      ['slug' => 'hamburg', 'name' => 'Hamburg', 'region' => ''],
    ],
  ],
];
