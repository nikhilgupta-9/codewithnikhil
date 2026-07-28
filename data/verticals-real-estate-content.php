<?php
// Unique per-page content layer for vertical-real-estate.php (added 2026-07-27 to fix
// GSC flagging real-estate-website-design-* pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix). Only 4 country pages (no city
// breakdown), so each leans hard on how listing/IDX/lead-capture needs differ across
// these specific property markets.
//
// Do NOT reduce this back to one shared paragraph with the country name swapped in.
return [
  'real-estate-website-design-usa' => [
    'intro_heading' => "Real Estate Websites Built Around MLS/IDX, Not Around a Static Brochure",
    'intro' => [
      "US buyers expect live, searchable listings pulled straight from your local MLS feed -- a site that just displays a hand-updated gallery of properties feels stale within days and loses buyers who assume it's out of date. IDX integration, saved searches and instant new-listing alerts are the baseline US buyers now expect from any serious agent or brokerage site.",
      "Pricing is quoted in USD, with most US real estate website projects ranging USD 400-10,000 depending on listing volume and the number of agents featured.",
    ],
    'faqs' => [
      ['q' => "Do you integrate with our local MLS feed?", 'a' => "In most cases, yes -- we integrate with common MLS/IDX providers to pull live listings automatically. Share your provider during discovery and we'll confirm compatibility upfront."],
      ['q' => "Can buyers save searches and get new-listing alerts?", 'a' => "Yes -- saved searches and automated new-listing email alerts are a standard expectation for US buyers and commonly included."],
      ['q' => "What's the typical cost?", 'a' => "Most US real estate projects range USD 400-10,000, quoted in USD, depending on listing volume and agent count."],
    ],
    'layout' => 'A',
  ],
  'real-estate-website-design-uk' => [
    'intro_heading' => "Property Websites for the UK's Rightmove-and-Zoopla-Trained Buyer Expectations",
    'intro' => [
      "UK buyers do most of their initial browsing on Rightmove or Zoopla, which means your own agency website has a different job -- building trust in your agency once a buyer clicks through, and clearly surfacing the leasehold/freehold, chain and tenure details that UK property listings need but US-style listings don't.",
      "GBP-denominated plans keep budgeting straightforward, with most UK real estate website projects ranging GBP 300-8,000 depending on listing volume and letting-agency functionality.",
    ],
    'faqs' => [
      ['q' => "Do you sync listings with Rightmove or Zoopla as well as our own site?", 'a' => "Yes -- most UK agencies want their own site to complement, not replace, their Rightmove/Zoopla presence, and we set up feeds to keep both in sync."],
      ['q' => "Can the site clearly show leasehold vs. freehold and chain status?", 'a' => "Yes -- these UK-specific tenure and chain details are built into the listing template rather than left as an afterthought."],
      ['q' => "What's the typical cost?", 'a' => "Most UK real estate projects range GBP 300-8,000, quoted in GBP."],
    ],
    'layout' => 'B',
  ],
  'real-estate-website-design-canada' => [
    'intro_heading' => "Real Estate Websites for Canada's Seasonal, Regionally Split Property Market",
    'intro' => [
      "Canadian real estate search demand swings noticeably by season -- spring listing surges, winter slowdowns in colder provinces -- and varies sharply by region, from Toronto/Vancouver's fast-moving urban markets to more seasonal cottage and recreational-property demand elsewhere.",
      "CAD-denominated plans keep budgeting clear, with most Canadian real estate website projects ranging CAD 500-12,000 depending on listing volume and MLS integration scope.",
    ],
    'faqs' => [
      ['q' => "Does the site need to handle seasonal demand swings?", 'a' => "Yes -- we can build in seasonal messaging and listing-highlight sections for markets with strong spring surges or cottage/recreational-property seasonality."],
      ['q' => "Do you integrate with Canadian MLS systems?", 'a' => "In most cases, yes -- share your local board/MLS provider during discovery and we'll confirm compatibility."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian real estate projects range CAD 500-12,000, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'real-estate-website-design-uae' => [
    'intro_heading' => "Real Estate Websites for UAE's Luxury and Off-Plan Development Market",
    'intro' => [
      "UAE real estate search skews heavily toward luxury properties and off-plan developments sold years before completion, which means buyers need rich visuals, payment-plan breakdowns and developer-credibility signals more than a simple listing search -- a very different priority order from a resale-heavy market.",
      "AED-denominated plans keep budgeting clear, with most UAE real estate website projects ranging AED 2,000-80,000 depending on whether the site covers off-plan developments, resale listings, or both.",
    ],
    'faqs' => [
      ['q' => "Can the site handle off-plan development listings with payment plans?", 'a' => "Yes -- off-plan-specific listing pages with payment-schedule breakdowns and developer credibility sections are a common and often central UAE requirement."],
      ['q' => "Do you support bilingual English/Arabic listings?", 'a' => "Yes -- bilingual listing pages are a common UAE request given the market's mixed English/Arabic buyer base."],
      ['q' => "What's the typical cost?", 'a' => "Most UAE real estate projects range AED 2,000-80,000, quoted in AED."],
    ],
    'layout' => 'B',
  ],
];
