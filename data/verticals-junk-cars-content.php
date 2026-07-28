<?php
// Unique per-page content layer for vertical-junk-cars.php (added 2026-07-27 to fix
// GSC flagging junk-car-website-design-* pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix). Only 2 country pages (no city
// breakdown), so each leans hard on how quote-speed, distance/regulation and
// mobile-first needs differ between the US and Canadian junk-car markets.
//
// Do NOT reduce this back to one shared paragraph with the country name swapped in.
return [
  'junk-car-website-design-usa' => [
    'intro_heading' => "Junk Car Websites Built for a Fragmented, State-by-State US Market",
    'intro' => [
      "US junk car buyers operate across a patchwork of state-specific title, salvage and towing regulations, and sellers searching \"sell my junk car\" want a fast quote without wading through legal fine print -- the site needs to make the offer and next step obvious in seconds, on a phone, standing next to the car.",
      "Pricing is quoted in USD, with most US junk car website projects ranging USD 300-6,000 depending on how many service-area pages and integrations like VIN lookup are needed.",
    ],
    'faqs' => [
      ['q' => "Can the site account for state-specific title/salvage rules?", 'a' => "Yes -- we can note state-specific requirements on relevant service-area pages, though sellers should confirm exact paperwork rules with your team directly."],
      ['q' => "Do sellers really book fastest on mobile?", 'a' => "Yes -- most US sellers search and submit quote requests from their phone standing next to the car, so the whole flow is built mobile-first."],
      ['q' => "What's the typical cost?", 'a' => "Most US junk car projects range USD 300-6,000, quoted in USD, depending on service-area pages and integrations."],
    ],
    'layout' => 'A',
  ],
  'junk-car-website-design-canada' => [
    'intro_heading' => "Junk Car Websites Built for Canada's Longer Towing Distances and Winter Season",
    'intro' => [
      "Canadian junk car sellers are often further from the nearest buyer than their US counterparts, especially outside major cities, which makes a clear towing-radius map and upfront distance/fee expectations more important than in denser US markets -- and winter weather adds urgency to sellers wanting a car gone before the season turns.",
      "Pricing is quoted in CAD, with most Canadian junk car website projects ranging CAD 400-7,000 depending on service-area coverage.",
    ],
    'faqs' => [
      ['q' => "Can the site show our towing radius and any distance-based fees clearly?", 'a' => "Yes -- a clear service-radius map with upfront distance expectations is a common and useful Canadian request given generally longer towing distances than in denser US markets."],
      ['q' => "Do you build seasonal messaging around winter urgency?", 'a' => "Yes -- highlighting \"gone before winter\" urgency is a common seasonal addition for Canadian junk car buyers."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian junk car projects range CAD 400-7,000, quoted in CAD."],
    ],
    'layout' => 'B',
  ],
];
