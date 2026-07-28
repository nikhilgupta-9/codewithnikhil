<?php
// Unique per-page content layer for vertical-books.php (added 2026-07-27 to fix
// GSC flagging book-website-design-* pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix). Only 4 country pages (no city
// breakdown), so each leans hard on real, verifiable payment/market differences
// for book e-commerce in that specific country (China's Alipay/WeChat Pay
// landscape being the clearest example).
//
// Do NOT reduce this back to one shared paragraph with the country name swapped in.
return [
  'book-website-design-usa' => [
    'intro_heading' => "Book Websites Built Around US Card Checkout and Amazon-Trained Buyer Habits",
    'intro' => [
      "US book buyers are trained by Amazon to expect one-click-feeling checkout, saved payment details and instant e-book delivery -- a site with a clunky multi-step checkout loses the sale to habit alone, even if the buyer genuinely wanted your book specifically.",
      "Pricing is quoted in USD, with most US book website projects ranging USD 300-7,000 depending on catalog size and whether print, e-book and merch all need separate fulfillment paths.",
    ],
    'faqs' => [
      ['q' => "Can checkout feel as fast as buying from Amazon?", 'a' => "We aim for as few steps as possible -- saved payment details and instant e-book delivery after purchase are standard, closing the gap with what US buyers are used to."],
      ['q' => "Do you handle both print and e-book fulfillment?", 'a' => "Yes -- print orders can route to your fulfillment process while e-books deliver automatically, in the same checkout."],
      ['q' => "What's the typical cost?", 'a' => "Most US book website projects range USD 300-7,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'book-website-design-china' => [
    'intro_heading' => "Book Websites Built Around China's Alipay/WeChat Pay Checkout Reality",
    'intro' => [
      "Checkout for the China market genuinely can't be a copy of a US or UK card-based flow -- Alipay and WeChat Pay dominate how buyers actually pay online, and a site defaulting to card-only checkout is effectively unusable for most local buyers regardless of how good the catalog looks.",
      "Pricing is quoted in CNY, with most China-market book website projects ranging CNY 2,000-45,000 depending on catalog size and payment-gateway integration scope.",
    ],
    'faqs' => [
      ['q' => "Do you integrate Alipay and WeChat Pay, not just card payments?", 'a' => "Yes -- for the China market, Alipay and WeChat Pay integration is treated as essential, not optional, since card-only checkout would exclude most local buyers."],
      ['q' => "Is the catalog built to be bilingual?", 'a' => "Yes -- bilingual Chinese/English catalog pages are a common and often necessary setup for authors and publishers serving this market."],
      ['q' => "What's the typical cost?", 'a' => "Most China-market book website projects range CNY 2,000-45,000, quoted in CNY."],
    ],
    'layout' => 'B',
  ],
  'book-website-design-uk' => [
    'intro_heading' => "Book Websites for UK Readers Who Compare You Against Waterstones and Amazon UK",
    'intro' => [
      "UK book buyers browsing an independent author or bookstore site are usually mentally comparing it to Waterstones or Amazon UK's polish, even for a niche title only you sell -- the site needs to feel as trustworthy as those larger names to convert a browser who could easily search elsewhere first.",
      "Pricing is quoted in GBP, with most UK book website projects ranging GBP 250-5,500 depending on catalog size and checkout complexity.",
    ],
    'faqs' => [
      ['q' => "How do we compete with the trust buyers already have in Waterstones/Amazon?", 'a' => "By making the site itself feel equally polished and secure at checkout -- clear reviews, secure payment badges and a fast, simple purchase flow close most of that trust gap."],
      ['q' => "Do you handle UK-specific shipping/VAT considerations at checkout?", 'a' => "Yes -- VAT-inclusive pricing display and UK shipping options are set up correctly as part of the checkout build."],
      ['q' => "What's the typical cost?", 'a' => "Most UK book website projects range GBP 250-5,500, quoted in GBP."],
    ],
    'layout' => 'A',
  ],
  'book-website-design-germany' => [
    'intro_heading' => "Book Websites for Germany's Fixed Book Price Law and Card-and-SEPA Checkout",
    'intro' => [
      "Germany's Buchpreisbindung (fixed book price law) means the same title has to sell at the same price everywhere -- a book website here needs pricing built around that legal reality from day one, not treated as a marketing decision. Checkout also needs to support SEPA transfer alongside cards, a common German buyer preference.",
      "Pricing is quoted in EUR, with most German book website projects ranging EUR 250-6,000 depending on catalog size and fulfillment complexity.",
    ],
    'faqs' => [
      ['q' => "Does the site account for Germany's fixed book price law?", 'a' => "Yes -- pricing is set up to comply with Buchpreisbindung from the start, since this is a legal requirement, not just a local preference."],
      ['q' => "Do you support SEPA transfer at checkout, not just cards?", 'a' => "Yes -- SEPA is a common German payment preference alongside card checkout, and we include it where relevant."],
      ['q' => "What's the typical cost?", 'a' => "Most German book website projects range EUR 250-6,000, quoted in EUR."],
    ],
    'layout' => 'B',
  ],
];
