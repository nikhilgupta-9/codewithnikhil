<?php
// Unique per-city content layer for location-city.php (added 2026-07-23 to fix
// GSC flagging web-developer-* city pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix).
//
// Each entry: intro_heading (unique H2), intro (2 unique paragraphs grounded in
// real local industry/business-district facts), faqs (3 unique Q&A), layout (A/B
// alternation for structural variation). Keyed by the same slug used in
// data/locations-cities.php (e.g. 'web-developer-los-angeles').
//
// Do NOT reduce this back to one shared paragraph with the city name swapped in.
return [
  // ===== USA =====
  'web-developer-california' => [
    'intro_heading' => "Beyond Silicon Valley: Web Development for California's Small Business Economy",
    'intro' => [
      "California's small business landscape sits in the shadow of the Bay Area tech giants, but most of the state's actual web development demand comes from a completely different tier -- retail, professional services, real estate and local e-commerce businesses that need a solid, fast website and can't justify a Bay Area agency's day rate. San Francisco and San Jose set the state's tech-quality bar high, which means even a small California business is now expected to have a site that doesn't look amateur.",
      "California runs on Pacific Time, 12.5-13.5 hours behind IST depending on daylight saving -- the largest realistic gap on the US mainland -- so calls are typically scheduled for California morning, which lands in an Indian evening. USD pricing keeps quotes simple, and most California projects fall in the USD 100-5,000 range depending on scope.",
    ],
    'faqs' => [
      ['q' => "Does being outside the Bay Area affect the quality expected?", 'a' => "If anything it raises the bar -- California businesses are used to seeing high tech-quality standards locally, so the goal is matching that credibility without the Bay Area agency price tag."],
      ['q' => "How does the Pacific Time gap work for calls?", 'a' => "California is 12.5-13.5 hours behind IST, the widest realistic gap on the US mainland. Calls are scheduled for California morning (Indian evening), with async updates covering the rest."],
      ['q' => "What's the typical cost for a California business site?", 'a' => "Most projects range USD 100-5,000 depending on scope, quoted directly in USD with no conversion guesswork."],
    ],
    'layout' => 'A',
  ],
  'web-developer-new-york' => [
    'intro_heading' => "Built for New York City's Finance and Media-Adjacent Small Businesses",
    'intro' => [
      "New York's small business economy runs downstream of its two dominant industries -- finance and media -- even for businesses that aren't in either directly. A consulting firm in Midtown or a boutique retailer in Brooklyn is still competing for attention in a market where every other business looks polished, because that's the local baseline. A website that reads as an afterthought stands out for the wrong reasons here.",
      "New York sits on Eastern Time, roughly 10.5-13.5 hours behind IST depending on the season, so calls typically land in a New York morning/midday against an Indian evening. USD-denominated quotes keep budgeting straightforward, with most New York projects ranging from USD 100 for a simple site to USD 5,000 for a more complete build.",
    ],
    'faqs' => [
      ['q' => "Do you work with finance or professional-services firms in NYC specifically?", 'a' => "Yes -- credibility-focused sites for consulting, finance-adjacent and professional-services businesses are a common request from New York, alongside general small business and retail sites."],
      ['q' => "How does the NYC-India time gap work?", 'a' => "Eastern Time is 10.5-13.5 hours behind IST, so calls typically happen in your morning/midday against my evening, with email/Slack covering updates between calls."],
      ['q' => "What's the typical project cost in New York?", 'a' => "Most fall between USD 100 and USD 5,000, quoted directly in USD, depending on whether it's a simple site or a fuller e-commerce build."],
    ],
    'layout' => 'B',
  ],
  'web-developer-washington' => [
    'intro_heading' => "Web Development for Washington State's Tech-Adjacent Small Businesses",
    'intro' => [
      "Washington State's economy is shaped by two aerospace and tech giants headquartered near Seattle, and that halo effect reaches small businesses too -- clients here tend to have higher-than-average expectations for site performance and clean UX, since that's the standard set locally by the tech industry around them, even if the business itself has nothing to do with software.",
      "Washington runs on Pacific Time, 12.5-13.5 hours behind IST, so the workable call window is Washington morning against an Indian evening. USD pricing applies directly, and typical Washington State projects range from USD 100 for a straightforward site to USD 5,000 for something more built-out.",
    ],
    'faqs' => [
      ['q' => "Does the Seattle tech scene set expectations for smaller businesses too?", 'a' => "To some extent, yes -- clients in the Seattle area tend to expect clean, fast, well-built sites as a baseline, which is the standard the work is held to regardless of the business's own industry."],
      ['q' => "How does the time zone work for Washington State calls?", 'a' => "Washington is on Pacific Time, 12.5-13.5 hours behind IST -- calls are typically scheduled for your morning, landing in my evening."],
      ['q' => "What does a typical project cost?", 'a' => "Most Washington State projects range USD 100-5,000 depending on scope, quoted directly in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-texas' => [
    'intro_heading' => "Built for Texas's Energy, Logistics and No-Income-Tax Business Climate",
    'intro' => [
      "Texas has one of the most business-friendly climates in the US (no state income tax), which has pulled in a wide mix of companies -- energy and oil & gas firms concentrated around Houston, logistics and finance businesses in Dallas, alongside a steady stream of small businesses relocating from higher-tax states. That mix means Texas web development requests span everything from industrial B2B catalog sites to consumer-facing retail and services sites.",
      "Texas runs on Central Time, roughly 11.5-12.5 hours behind IST, putting the workable call window in a Texas morning/midday against an Indian evening. USD pricing is standard, and typical Texas projects range from USD 100 for a simple site to USD 5,000 for a fuller build.",
    ],
    'faqs' => [
      ['q' => "Do you build industrial/B2B catalog sites for energy-sector businesses?", 'a' => "Yes -- clear service/product catalogs and straightforward inquiry forms are a common need from Houston-area energy and logistics businesses, alongside general small business sites."],
      ['q' => "How does the Texas-India time gap work?", 'a' => "Central Time is 11.5-12.5 hours behind IST, so calls fit into a Texas morning/midday against an Indian evening."],
      ['q' => "What's the typical project cost in Texas?", 'a' => "Most projects range USD 100-5,000 depending on scope, quoted in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-virginia' => [
    'intro_heading' => "Web Development for Northern Virginia's Data Center and Government-Contracting Corridor",
    'intro' => [
      "Northern Virginia has quietly become one of the densest data center corridors in the world, and its proximity to Washington DC means a large share of the local business base does government contracting or professional services work -- both categories that care more about a site being clean, credible and easy to navigate than about flashy visuals. A contractor's website is often judged on whether it clearly states capabilities and past performance, not on creative flair.",
      "Virginia runs on Eastern Time, 10.5-13.5 hours behind IST depending on the season, so calls typically land in a Virginia morning against an Indian evening. USD pricing is standard, with most Virginia projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for government contractors or professional-services firms?", 'a' => "Yes -- clear capability statements, past-performance sections and a credible, professional look are common requirements for Northern Virginia contracting and professional-services businesses."],
      ['q' => "How does the time difference work?", 'a' => "Eastern Time is 10.5-13.5 hours behind IST, so calls are typically scheduled for a Virginia morning against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Virginia projects range USD 100-5,000, quoted directly in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-delaware' => [
    'intro_heading' => "Web Development for Wilmington's Banking and Corporate-Services Sector",
    'intro' => [
      "Delaware punches above its weight in financial and corporate services -- Wilmington has a long-standing concentration of banking and credit-card-industry businesses, and the state's business-friendly incorporation laws mean a disproportionate number of small professional-services and holding-company-adjacent businesses are based here even though they're genuinely local operations, not just a legal address. That context shapes what a Delaware business site typically needs: clarity, credibility and straightforward contact information over flashy design.",
      "Delaware is on Eastern Time, 10.5-13.5 hours behind IST, so calls are scheduled for a Delaware morning against an Indian evening. USD pricing applies, with typical Delaware projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with financial or corporate-services businesses based in Delaware?", 'a' => "Yes -- credibility-focused, clearly-organized sites are a common need given Delaware's concentration of banking and professional-services businesses."],
      ['q' => "How does the time difference work for Delaware clients?", 'a' => "Eastern Time is 10.5-13.5 hours behind IST -- calls typically land in a Delaware morning against my evening."],
      ['q' => "What does a typical project cost?", 'a' => "Most range USD 100-5,000 depending on scope, quoted directly in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-los-angeles' => [
    'intro_heading' => "Web Development for LA's Entertainment-Adjacent and Retail Businesses",
    'intro' => [
      "Los Angeles's business landscape is shaped by entertainment and media even for companies with no direct connection to the industry -- production-adjacent services, talent-adjacent businesses and retail brands all compete in a market where visual presentation matters more than most cities, simply because LA audiences are unusually design-literate. A site that looks even slightly dated stands out fast here.",
      "LA runs on Pacific Time, 12.5-13.5 hours behind IST, so the workable call window is LA morning against an Indian evening. USD pricing is standard, and typical LA projects range from USD 100 to USD 5,000 depending on whether it's a simple brand site or a fuller e-commerce build.",
    ],
    'faqs' => [
      ['q' => "Does the entertainment industry influence what LA clients expect visually?", 'a' => "Yes, indirectly -- LA audiences tend to be design-literate given the entertainment/media industry's presence, so visual polish matters even for businesses outside that industry directly."],
      ['q' => "How does the LA-India time gap work?", 'a' => "Pacific Time is 12.5-13.5 hours behind IST, so calls are scheduled for LA morning against my evening."],
      ['q' => "What's the typical cost for an LA project?", 'a' => "Most range USD 100-5,000 depending on scope, quoted directly in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-chicago' => [
    'intro_heading' => "Web Development for Chicago's Finance, Logistics and Manufacturing Base",
    'intro' => [
      "Chicago sits at the intersection of finance (the futures/options exchanges), logistics (a major national freight hub) and traditional manufacturing -- a mix that makes it one of the more industrially diverse US markets for web development. A Chicago manufacturing supplier and a Chicago fintech-adjacent firm have almost nothing in common except both need a site that's fast, credible and easy for a B2B buyer to navigate.",
      "Chicago runs on Central Time, 11.5-12.5 hours behind IST, putting calls in a Chicago morning/midday against an Indian evening. USD pricing is standard, with typical Chicago projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you build B2B catalog sites for manufacturing or logistics companies?", 'a' => "Yes -- clear capability/product pages and straightforward inquiry forms are common for Chicago's manufacturing and logistics businesses."],
      ['q' => "How does the Chicago-India time gap work?", 'a' => "Central Time is 11.5-12.5 hours behind IST -- calls typically land in a Chicago morning/midday against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000 depending on scope, in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-houston' => [
    'intro_heading' => "Web Development for Houston's Energy Sector and Texas Medical Center",
    'intro' => [
      "Houston's economy is anchored by energy (oil & gas headquarters and services firms) and the Texas Medical Center -- the largest medical complex in the world -- which means local web development demand splits between industrial B2B sites for energy-services companies and credibility-focused sites for healthcare-adjacent practices and providers. Both categories prioritize clarity and trust over visual flash.",
      "Houston is on Central Time, 11.5-12.5 hours behind IST, so calls fit a Houston morning/midday against an Indian evening. USD pricing applies, with typical Houston projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you have experience with energy-sector or medical-practice sites?", 'a' => "Both are common request types from Houston -- energy-services firms typically need clear capability pages, while medical-adjacent practices need appointment booking and a credible, patient-friendly design."],
      ['q' => "How does the time zone work for Houston?", 'a' => "Central Time is 11.5-12.5 hours behind IST, so calls land in a Houston morning/midday against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-dallas' => [
    'intro_heading' => "Web Development for Dallas's Finance, Telecom and Logistics Hub",
    'intro' => [
      "Dallas-Fort Worth's status as a major logistics hub (anchored by DFW airport) alongside a strong finance and telecom sector base means the city's web development demand skews corporate and B2B -- professional-services firms, logistics companies and telecom-adjacent businesses all need sites that project scale and reliability rather than a small-operation feel.",
      "Dallas runs on Central Time, 11.5-12.5 hours behind IST, so calls typically land in a Dallas morning/midday against an Indian evening. USD pricing is standard, with typical Dallas projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with logistics or telecom-adjacent businesses in Dallas?", 'a' => "Yes -- sites that project scale and reliability, with clear service breakdowns, are a common request from Dallas's logistics and telecom-adjacent business base."],
      ['q' => "How does the time difference work?", 'a' => "Central Time is 11.5-12.5 hours behind IST -- calls land in a Dallas morning/midday against my evening."],
      ['q' => "What's the typical cost?", 'a' => "Most Dallas projects range USD 100-5,000, in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-phoenix' => [
    'intro_heading' => "Web Development for Phoenix's Growing Real Estate and Semiconductor Economy",
    'intro' => [
      "Phoenix has been one of the fastest-growing US metros for both real estate/construction and, more recently, semiconductor manufacturing investment -- a combination that's brought in a wave of new small businesses needing a web presence built for growth, not just a static brochure site. Real estate and home-services businesses in particular need sites that handle lead capture well, since the local market moves fast.",
      "Phoenix runs on Mountain Standard Time year-round (Arizona doesn't observe daylight saving), roughly 12.5 hours behind IST, so calls typically land in a Phoenix morning against an Indian evening. USD pricing applies, with typical Phoenix projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you build lead-capture-focused sites for real estate or home services?", 'a' => "Yes -- given Phoenix's fast-moving real estate and home-services market, lead capture forms and quick response flows are a common priority in these builds."],
      ['q' => "Does Arizona's no-daylight-saving policy affect scheduling?", 'a' => "It means the Phoenix-India gap is a consistent ~12.5 hours year-round rather than shifting seasonally, which actually makes scheduling slightly more predictable than most US markets."],
      ['q' => "What's the typical project cost?", 'a' => "Most Phoenix projects range USD 100-5,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-san-diego' => [
    'intro_heading' => "Web Development for San Diego's Biotech and Life Sciences Cluster",
    'intro' => [
      "San Diego has one of the densest biotech and life-sciences clusters in the US, alongside a significant defense/military-adjacent economy and a strong tourism base -- three industries with very different website needs. A biotech-adjacent services firm needs a site that reads as credible to a scientific or clinical audience; a tourism business needs visuals and a booking flow that converts a browsing vacationer.",
      "San Diego is on Pacific Time, 12.5-13.5 hours behind IST, so calls typically land in a San Diego morning against an Indian evening. USD pricing is standard, with typical San Diego projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for biotech or life-sciences-adjacent businesses?", 'a' => "Yes -- credibility-focused sites that read well to a scientific or clinical audience are a common request from San Diego's biotech-adjacent services businesses."],
      ['q' => "How does the time difference work?", 'a' => "Pacific Time is 12.5-13.5 hours behind IST, so calls land in a San Diego morning against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000, in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-philadelphia' => [
    'intro_heading' => "Web Development for Philadelphia's Healthcare and Education Sector",
    'intro' => [
      "Philadelphia's economy leans heavily on healthcare and higher education -- the city has one of the highest concentrations of hospitals and universities per capita in the US -- which shapes what a lot of local web development requests look like: patient-facing healthcare practice sites and education-adjacent service providers, both needing clear, trustworthy information architecture more than visual flash.",
      "Philadelphia runs on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in a Philadelphia morning against an Indian evening. USD pricing applies, with typical Philadelphia projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for healthcare practices in Philadelphia?", 'a' => "Yes -- appointment booking, clear service information and a trustworthy design are common needs given the city's dense healthcare sector, and this overlaps with our dedicated healthcare website design work."],
      ['q' => "How does the time zone work?", 'a' => "Eastern Time is 10.5-13.5 hours behind IST -- calls land in a Philadelphia morning against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000, in USD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-miami' => [
    'intro_heading' => "Web Development for Miami's Latin America Trade Gateway and Real Estate Market",
    'intro' => [
      "Miami functions as the main US gateway for Latin American trade, which means a meaningful share of local businesses operate bilingually and need a site that serves both English and Spanish-speaking audiences cleanly. Combine that with Miami's famously fast-moving real estate market and a growing tech/crypto scene, and the city's web development requests are unusually varied for a single metro.",
      "Miami is on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in a Miami morning against an Indian evening. USD pricing is standard, with typical Miami projects ranging from USD 100 to USD 5,000.",
    ],
    'faqs' => [
      ['q' => "Can you build bilingual English/Spanish sites?", 'a' => "Yes -- bilingual site structure is a common request given Miami's role as a Latin America trade gateway, and it's scoped explicitly during the discovery call."],
      ['q' => "Do you build real estate listing sites for the Miami market?", 'a' => "Yes -- fast-loading listing pages and lead capture are priorities given how quickly the Miami real estate market moves."],
      ['q' => "What's the typical project cost?", 'a' => "Most Miami projects range USD 100-5,000, in USD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-manhattan' => [
    'intro_heading' => "A Closer Look: Web Development for Manhattan's Dense Corporate Core",
    'intro' => [
      "Manhattan specifically -- as distinct from the wider New York City area -- is dominated by corporate headquarters, Wall Street finance and a high concentration of professional-services firms packed into a small, expensive footprint. Businesses operating out of Manhattan office space are often smaller than they look from their address, and their website is frequently the thing doing the work of projecting scale that the office itself doesn't.",
      "Manhattan runs on the same Eastern Time as the rest of New York, 10.5-13.5 hours behind IST, so calls fit a Manhattan morning/midday against an Indian evening. USD pricing applies, with typical Manhattan projects ranging from USD 100 to USD 5,000 -- similar spread to New York broadly, though clients here more often need the site to punch above the business's actual size.",
    ],
    'faqs' => [
      ['q' => "How is a Manhattan project different from a general New York one?", 'a' => "The brief is often similar, but Manhattan clients more frequently need the site to project more scale and polish than the underlying business's size would suggest, given the dense corporate environment they're competing in."],
      ['q' => "How does the time zone work?", 'a' => "Same as the rest of New York -- Eastern Time, 10.5-13.5 hours behind IST, calls in a Manhattan morning/midday against my evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000, in USD, similar to the broader New York market."],
    ],
    'layout' => 'A',
  ],

  // ===== UK =====
  'web-developer-england' => [
    'intro_heading' => "Web Development Across England, Outside the London Bubble",
    'intro' => [
      "This page is deliberately not about London specifically -- Manchester, Bristol, Leeds, Birmingham and every other English city each have their own page with their own local context. What's true across England more broadly is that businesses outside London often feel priced out of London-agency rates while still competing against London-quality websites in search results, since customers don't distinguish by city when they're comparing options online.",
      "England sits 4.5-5.5 hours behind IST across the whole country regardless of city, so scheduling works the same wherever in England the business is based -- typically an England afternoon call landing in an Indian evening. GBP pricing is standard, with most England-wide projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Why is there a page for England as well as specific cities like Manchester or Leeds?", 'a' => "The city pages go into local business context for that specific market. This page is for businesses anywhere in England, including smaller towns that don't have their own dedicated page yet."],
      ['q' => "Does the time zone differ by English city?", 'a' => "No -- all of England is on the same time zone, 4.5-5.5 hours behind IST, so scheduling works identically regardless of which English city or town the business is in."],
      ['q' => "What's the typical project cost?", 'a' => "Most England-wide projects range GBP 100-4,000, quoted directly in GBP."],
    ],
    'layout' => 'B',
  ],
  'web-developer-london' => [
    'intro_heading' => "Web Development for London's Fintech and Professional-Services Density",
    'intro' => [
      "London's fintech sector and its enormous professional-services base (law, consulting, finance) set an unusually high bar for what a small business website is expected to look like -- clients here have seen enough polished competitor sites that a template-feeling site actively hurts credibility rather than just looking mediocre. That expectation holds even for London businesses well outside fintech itself.",
      "London runs 4.5-5.5 hours behind IST (GMT/BST), so a London afternoon call lands comfortably in an Indian evening. GBP pricing is standard, with typical London projects ranging from GBP 100 for a simple site to GBP 4,000 for something closer to a full e-commerce or professional-services build.",
    ],
    'faqs' => [
      ['q' => "Can you match the polish expected of London fintech or professional-services sites?", 'a' => "That's specifically the bar aimed for -- clean design, clear credibility signals and fast performance, without the London agency day-rate. Portfolio examples are available if you want to judge directly."],
      ['q' => "How does the time zone work for London calls?", 'a' => "London is 4.5-5.5 hours behind IST, so afternoon London calls land in an Indian evening -- a comfortable, well-tested overlap."],
      ['q' => "What's the typical project cost in London?", 'a' => "Most range GBP 100-4,000 depending on scope, quoted directly in GBP."],
    ],
    'layout' => 'A',
  ],
  'web-developer-manchester' => [
    'intro_heading' => "Web Development for Manchester's Media and Tech Scene",
    'intro' => [
      "Manchester has built a genuine media and tech identity distinct from London's -- MediaCityUK anchors a growing broadcast/digital-media cluster, and the city's e-commerce and tech startup scene has grown enough to earn the \"Northern Powerhouse\" label. Manchester businesses tend to want sites that feel current and digitally native, reflecting that identity, rather than a generic corporate template.",
      "Manchester is on the same England-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Manchester afternoon against an Indian evening. GBP pricing applies, with typical Manchester projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for media or digital-adjacent Manchester businesses?", 'a' => "Yes -- a modern, digitally-native feel is a common request given Manchester's media and tech identity, alongside general small business sites."],
      ['q' => "How does the time zone work?", 'a' => "Same as the rest of England -- 4.5-5.5 hours behind IST, Manchester afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Manchester projects range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'B',
  ],
  'web-developer-bristol' => [
    'intro_heading' => "Web Development for Bristol's Aerospace and Creative-Tech Cluster",
    'intro' => [
      "Bristol's economy blends heavyweight aerospace engineering (Airbus wing manufacturing and Rolls-Royce operations nearby) with a well-known creative and animation industry (Aardman Animations is based here), producing an unusually specific mix of clients -- precision-focused engineering suppliers on one hand, and design-literate creative studios on the other, both needing very different things from a website.",
      "Bristol runs on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Bristol afternoon against an Indian evening. GBP pricing is standard, with typical Bristol projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with engineering suppliers or creative studios in Bristol?", 'a' => "Both are common request types -- engineering/aerospace-adjacent suppliers typically need clear technical capability pages, while creative studios want a site that shows visual craft."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST, same as the rest of the UK -- Bristol afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'A',
  ],
  'web-developer-leeds' => [
    'intro_heading' => "Web Development for Leeds's Financial and Legal Services Sector",
    'intro' => [
      "Leeds is one of the largest financial and legal-services centers in the UK outside London -- a genuine regional hub rather than a satellite city -- and that base of professional-services firms means Leeds businesses often want a site that reads as established and credible to a discerning B2B audience, similar in spirit to London firms but without needing London-scale budgets.",
      "Leeds sits on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Leeds afternoon against an Indian evening. GBP pricing applies, with typical Leeds projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with financial or legal-services firms in Leeds?", 'a' => "Yes -- credibility-focused, professional-services sites are a common request given Leeds's role as a major UK financial and legal center outside London."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST -- Leeds afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'B',
  ],
  'web-developer-birmingham' => [
    'intro_heading' => "Web Development for Birmingham's Manufacturing and Automotive Heritage",
    'intro' => [
      "Birmingham's economy still carries its manufacturing and automotive heritage, now paired with a large and diverse professional-services base -- the UK's second-largest city has one of the country's most varied local economies, which means the web development requests coming out of it range from industrial B2B supplier sites to consumer-facing retail and services businesses.",
      "Birmingham is on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Birmingham afternoon against an Indian evening. GBP pricing applies, with typical Birmingham projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you build B2B supplier sites for Birmingham manufacturing businesses?", 'a' => "Yes -- clear capability and product pages are a common need given Birmingham's manufacturing and automotive-supplier heritage, alongside general retail and services sites."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST -- Birmingham afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'A',
  ],
  'web-developer-glasgow' => [
    'intro_heading' => "Web Development for Glasgow's Engineering Heritage and Growing Fintech Scene",
    'intro' => [
      "Glasgow's industrial engineering and shipbuilding heritage has given way to a broader financial-services base and a genuinely growing fintech scene, alongside Scotland's largest concentration of small businesses. That mix means Glasgow web development demand spans traditional professional-services credibility sites and newer, more digitally-native fintech-adjacent startups.",
      "Glasgow runs on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Glasgow afternoon against an Indian evening. GBP pricing applies, with typical Glasgow projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with fintech-adjacent startups in Glasgow?", 'a' => "Yes -- Glasgow's growing fintech scene is a source of more digitally-native, product-focused site requests alongside traditional professional-services work."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST -- Glasgow afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'B',
  ],
  'web-developer-liverpool' => [
    'intro_heading' => "Web Development for Liverpool's Maritime Logistics and Creative Tourism Economy",
    'intro' => [
      "Liverpool's maritime and logistics heritage as a major port city sits alongside a booming creative and cultural-tourism economy -- the city's cultural draw (Beatles heritage, waterfront regeneration) has fueled a genuinely large hospitality and tourism small-business base, distinct from its industrial port-logistics companies, and both need quite different things from a website.",
      "Liverpool is on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit a Liverpool afternoon against an Indian evening. GBP pricing applies, with typical Liverpool projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you build tourism or hospitality sites for Liverpool businesses?", 'a' => "Yes -- visually strong, booking-friendly sites are a common request given Liverpool's large cultural-tourism and hospitality sector."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST -- Liverpool afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'A',
  ],
  'web-developer-edinburgh' => [
    'intro_heading' => "Web Development for Edinburgh's Finance and Festival-City Tourism",
    'intro' => [
      "Edinburgh carries two distinct economic identities -- a major UK financial-services center (insurance and asset management firms concentrated here rival Leeds in scale) and a globally famous festival-city tourism economy. A financial-services client here wants understated credibility; a festival-season hospitality business wants a site built to convert a surge of visitors in a short window.",
      "Edinburgh runs on the same UK-wide time zone, 4.5-5.5 hours behind IST, so calls fit an Edinburgh afternoon against an Indian evening. GBP pricing applies, with typical Edinburgh projects ranging from GBP 100 to GBP 4,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with financial-services firms or tourism businesses in Edinburgh?", 'a' => "Both are common -- financial-services clients typically want understated, credible design, while festival-season hospitality businesses need a site built to handle a short, intense visitor surge."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours behind IST -- Edinburgh afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range GBP 100-4,000, in GBP."],
    ],
    'layout' => 'B',
  ],

  // ===== Canada =====
  'web-developer-ontario' => [
    'intro_heading' => "Web Development Across Ontario, Beyond Toronto and Ottawa",
    'intro' => [
      "This page covers Ontario broadly -- Toronto and Ottawa each have their own dedicated pages with more specific local context, so this one is for businesses elsewhere in the province, including the manufacturing-heavy corridor of southern Ontario and the tech cluster around Waterloo (sometimes called \"Silicon Valley North\"). Ontario businesses outside the two major cities often get overlooked by agencies focused only on Toronto.",
      "Ontario runs on Eastern Time, 10.5-13.5 hours behind IST depending on the season, so calls typically land in an Ontario morning against an Indian evening. CAD pricing is standard, with typical Ontario-wide projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Why is there a page for Ontario as well as Toronto and Ottawa specifically?", 'a' => "Toronto and Ottawa have distinct enough local business context to warrant their own pages. This one covers the rest of the province, including the Waterloo tech corridor and southern Ontario's manufacturing base."],
      ['q' => "How does the time zone work?", 'a' => "Eastern Time, 10.5-13.5 hours behind IST -- Ontario morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Ontario-wide projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-british-columbia' => [
    'intro_heading' => "Web Development Across British Columbia, Beyond Vancouver",
    'intro' => [
      "Vancouver has its own dedicated page, so this one covers the rest of British Columbia -- a province where natural resources, forestry and a genuinely large film/TV production industry (\"Hollywood North\" extends beyond Vancouver itself) sit alongside a growing tech sector. BC businesses outside Vancouver proper still compete in the same province-wide market for skilled web development.",
      "BC runs on Pacific Time, 12.5-13.5 hours behind IST, so calls typically land in a BC morning against an Indian evening. CAD pricing is standard, with typical BC-wide projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for BC and Vancouver?", 'a' => "Vancouver's page covers city-specific context; this one is for BC businesses outside Vancouver, including resource, forestry and production-adjacent companies elsewhere in the province."],
      ['q' => "How does the time zone work?", 'a' => "Pacific Time, 12.5-13.5 hours behind IST -- BC morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most BC-wide projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-toronto' => [
    'intro_heading' => "Web Development for Toronto's Bay Street Finance and Immigrant-Founder Small Business Scene",
    'intro' => [
      "Toronto is Canada's financial capital -- Bay Street firms set a high credibility bar even for small businesses well outside finance -- but the city's small business landscape is also unusually diverse, driven by a large immigrant-founder community running everything from professional services to retail and food businesses. Both groups care about the same core things: a site that looks established and works well on mobile.",
      "Toronto is on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in a Toronto morning against an Indian evening. CAD pricing is standard, with typical Toronto projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with small, immigrant-founded businesses in Toronto?", 'a' => "Yes -- Toronto's diverse founder community is a large share of the client base, spanning professional services, retail and food/hospitality businesses."],
      ['q' => "How does the time zone work?", 'a' => "Eastern Time, 10.5-13.5 hours behind IST -- Toronto morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Toronto projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-vancouver' => [
    'intro_heading' => "Web Development for Vancouver's Tech and Film-Industry Economy",
    'intro' => [
      "Vancouver's tech scene and its role as \"Hollywood North\" for film/TV production have shaped local expectations -- businesses here, even outside those two industries, tend to expect a design-forward, visually polished website, since that's the local baseline set by production-adjacent and tech companies. Real estate is the other major driver of Vancouver web development demand, given how central housing is to the local economy.",
      "Vancouver runs on Pacific Time, 12.5-13.5 hours behind IST, so calls typically land in a Vancouver morning against an Indian evening. CAD pricing is standard, with typical Vancouver projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you build real estate or production-adjacent sites for Vancouver clients?", 'a' => "Yes -- both are common request types, real estate needing strong listing/lead-capture flows and production-adjacent businesses wanting a visually polished, design-forward site."],
      ['q' => "How does the time zone work?", 'a' => "Pacific Time, 12.5-13.5 hours behind IST -- Vancouver morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-montreal' => [
    'intro_heading' => "Web Development for Montreal's Bilingual, Gaming-Industry-Adjacent Market",
    'intro' => [
      "Montreal is Canada's aerospace hub (Bombardier and its supplier network) and one of the world's larger video game development centers, alongside being the country's primary French-English bilingual market -- a Montreal business often genuinely needs its site to work in both languages, not as an afterthought translation but as two properly built experiences.",
      "Montreal runs on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in a Montreal morning against an Indian evening. CAD pricing is standard, with typical Montreal projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Can you build bilingual French/English sites for Montreal businesses?", 'a' => "Yes -- proper bilingual site structure (not just a translated afterthought) is a common and explicitly scoped request given Montreal's bilingual market."],
      ['q' => "Do you have experience with aerospace or gaming-industry-adjacent businesses?", 'a' => "Both are notable Montreal industries -- aerospace suppliers typically need clear capability pages, gaming-adjacent studios want a more visually distinctive site."],
      ['q' => "What's the typical project cost?", 'a' => "Most Montreal projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-calgary' => [
    'intro_heading' => "Web Development for Calgary's Energy Sector and Post-Downturn Diversification",
    'intro' => [
      "Calgary's economy has historically run on energy (oil sands and related services), but the sector's downturn years pushed a real diversification into tech and other services businesses -- Calgary's current web development demand reflects that mix, with traditional energy-services companies needing solid B2B catalog sites alongside a newer wave of tech and professional-services startups.",
      "Calgary is on Mountain Time, roughly 11.5-12.5 hours behind IST, so calls typically land in a Calgary morning against an Indian evening. CAD pricing is standard, with typical Calgary projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with energy-services companies in Calgary?", 'a' => "Yes -- clear B2B capability/catalog sites are a common need from Calgary's energy-services businesses, alongside newer tech and professional-services companies."],
      ['q' => "How does the time zone work?", 'a' => "Mountain Time, 11.5-12.5 hours behind IST -- Calgary morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-ottawa' => [
    'intro_heading' => "Web Development for Ottawa's Government and Tech-Sector Blend",
    'intro' => [
      "Ottawa's identity as Canada's national capital means government and public-sector-adjacent work dominates one half of the local business landscape, while the Kanata tech park (home to companies like Shopify) drives a genuinely large tech sector on the other. Both need clean, professional sites, but government-adjacent clients tend to prioritize accessibility and formal clarity more than a tech startup would.",
      "Ottawa is on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in an Ottawa morning against an Indian evening. CAD pricing is standard, with typical Ottawa projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you build accessibility-conscious sites for government-adjacent Ottawa clients?", 'a' => "Yes -- accessibility and formal clarity are prioritized for government-adjacent and public-sector work, distinct from a typical startup brief."],
      ['q' => "Do you work with Ottawa's tech sector too?", 'a' => "Yes -- Ottawa's Kanata tech corridor is a source of more product-focused, startup-style site requests alongside the government-adjacent work."],
      ['q' => "What's the typical project cost?", 'a' => "Most Ottawa projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-edmonton' => [
    'intro_heading' => "Web Development for Edmonton's Energy and Provincial-Government Economy",
    'intro' => [
      "As Alberta's provincial capital, Edmonton's economy blends government and public-sector work with energy-industry services (distinct from, but connected to, Calgary's energy sector) and a growing agriculture-adjacent business base. Edmonton clients tend to want straightforward, credible sites rather than flashy design, reflecting the practical, service-oriented nature of these industries.",
      "Edmonton is on Mountain Time, 11.5-12.5 hours behind IST, so calls typically land in an Edmonton morning against an Indian evening. CAD pricing is standard, with typical Edmonton projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or energy-services businesses in Edmonton?", 'a' => "Yes -- both are common Edmonton client types, typically wanting straightforward, credible sites over flashy design."],
      ['q' => "How does the time zone work?", 'a' => "Mountain Time, 11.5-12.5 hours behind IST -- Edmonton morning calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-winnipeg' => [
    'intro_heading' => "Web Development for Winnipeg's Manufacturing and Insurance Base",
    'intro' => [
      "Winnipeg's economy centers on manufacturing, agribusiness and a notably large insurance industry presence for a city its size -- a mix that produces mostly B2B and professional-services web development demand, with clients wanting clear, credible sites more than visual flash. It's a practical market rather than a trend-driven one.",
      "Winnipeg is on Central Time, 11.5-12.5 hours behind IST, so calls typically land in a Winnipeg morning/midday against an Indian evening. CAD pricing is standard, with typical Winnipeg projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with manufacturing or insurance-adjacent businesses in Winnipeg?", 'a' => "Yes -- clear, credible B2B sites are a common request given Winnipeg's manufacturing, agribusiness and insurance-industry base."],
      ['q' => "How does the time zone work?", 'a' => "Central Time, 11.5-12.5 hours behind IST -- Winnipeg morning/midday calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-quebec-city' => [
    'intro_heading' => "Web Development for Quebec City's Government, Insurance and Tourism Trio",
    'intro' => [
      "As Quebec's provincial capital, Quebec City combines government-adjacent work with a strong insurance/finance sector and a large tourism economy built around the historic Old Quebec district -- and like Montreal, it's a primarily French-speaking market where the website itself usually needs to be built French-first, not translated as an afterthought.",
      "Quebec City is on Eastern Time, 10.5-13.5 hours behind IST, so calls typically land in a Quebec City morning against an Indian evening. CAD pricing is standard, with typical Quebec City projects ranging from CAD 100 to CAD 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you build French-first sites for Quebec City businesses?", 'a' => "Yes -- given Quebec City's primarily French-speaking market, sites are typically built French-first with English as the secondary option, not the other way around."],
      ['q' => "Do you work with tourism businesses in Old Quebec?", 'a' => "Yes -- visually strong, booking-friendly sites are a common request from the historic Old Quebec tourism district."],
      ['q' => "What's the typical project cost?", 'a' => "Most Quebec City projects range CAD 100-6,000, in CAD."],
    ],
    'layout' => 'B',
  ],

  // ===== Australia =====
  'web-developer-sydney' => [
    'intro_heading' => "Web Development for Sydney's Finance and Media Concentration",
    'intro' => [
      "Sydney hosts most of Australia's ASX-listed corporate headquarters and a large media industry presence, which sets a high credibility bar for local small businesses too -- Sydney clients tend to expect a site that looks like it belongs to an established, professional operation, not a weekend side project, even when the business itself is small.",
      "Sydney runs 4.5-5.5 hours ahead of IST, so calls are typically scheduled for Sydney's afternoon/evening, which lines up with an Indian working day. AUD pricing is standard, with typical Sydney projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Does Sydney's corporate concentration affect what's expected of a small business site?", 'a' => "Yes -- Sydney clients tend to expect a professional, established look even for smaller operations, given the local corporate/media backdrop they're competing against for attention."],
      ['q' => "How does the time zone work?", 'a' => "Sydney is 4.5-5.5 hours ahead of IST -- calls are scheduled for Sydney afternoon/evening, aligning with an Indian working day."],
      ['q' => "What's the typical project cost?", 'a' => "Most Sydney projects range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-melbourne' => [
    'intro_heading' => "Web Development for Melbourne's Cafe Culture and Education Sector",
    'intro' => [
      "Melbourne's famous small-business cafe and retail culture sits alongside a genuinely large education sector (multiple major universities) and a manufacturing history that's shifted toward services -- it's a city where a huge share of web development demand comes from small, independent retail and hospitality operators who need a site that captures the same personality their physical space has.",
      "Melbourne runs 4.5-5.5 hours ahead of IST, so calls are typically scheduled for Melbourne's afternoon/evening. AUD pricing is standard, with typical Melbourne projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for independent cafes or retail businesses in Melbourne?", 'a' => "Yes -- capturing a business's personality and visual identity is a priority for Melbourne's independent cafe, retail and hospitality operators, a common request type here."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours ahead of IST -- calls are scheduled for Melbourne afternoon/evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-brisbane' => [
    'intro_heading' => "Web Development for Brisbane's Growing Tech and Mining-Services Economy",
    'intro' => [
      "Brisbane has a genuinely growing tech startup scene alongside its traditional role servicing Queensland's mining industry -- a mining-services company here needs a fundamentally different site (clear capability statements, safety credentials) than a Brisbane tech startup does (product-focused, modern design), and both are common request types.",
      "Brisbane runs 4.5-5.5 hours ahead of IST, so calls are typically scheduled for Brisbane's afternoon/evening. AUD pricing is standard, with typical Brisbane projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with mining-services or tech-startup businesses in Brisbane?", 'a' => "Both are common request types -- mining-services companies typically need clear capability/safety-credential pages, while tech startups want a modern, product-focused site."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours ahead of IST -- calls are scheduled for Brisbane afternoon/evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Brisbane projects range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-gold-coast' => [
    'intro_heading' => "Web Development for the Gold Coast's Tourism and Holiday-Property Market",
    'intro' => [
      "The Gold Coast runs overwhelmingly on tourism and holiday-property rental, with a growing film production presence (Warner Bros Movie World and studio infrastructure) layered on top -- a Gold Coast business site almost always needs to convert a browsing holidaymaker or property-seeker fast, since that visitor is usually comparing several options in one sitting before booking.",
      "Gold Coast is on the same Australian Eastern time zone, 4.5-5.5 hours ahead of IST, so calls are typically scheduled for the afternoon/evening. AUD pricing is standard, with typical Gold Coast projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you build booking-focused sites for Gold Coast holiday-property or tourism businesses?", 'a' => "Yes -- fast-converting booking flows and strong visuals are the priority for Gold Coast's tourism and holiday-property rental businesses, a common project type here."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours ahead of IST -- calls scheduled for Gold Coast afternoon/evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-perth' => [
    'intro_heading' => "Web Development for Perth's Mining and Resources Economy",
    'intro' => [
      "Perth services Western Australia's mining and resources industry -- the state's dominant economic driver -- and its physical isolation from Australia's east coast (a multi-hour flight to Sydney or Melbourne) means Perth businesses are unusually accustomed to working with remote suppliers and contractors already, which makes remote web development a natural fit rather than an unusual ask.",
      "Perth actually shares a closer time overlap with parts of Asia than with Australia's east coast, sitting 2.5-3.5 hours ahead of IST -- notably closer than Sydney or Melbourne. AUD pricing is standard, with typical Perth projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with mining or resources-sector businesses in Perth?", 'a' => "Yes -- clear capability and safety-credential pages are a common need for Perth's mining and resources-services businesses."],
      ['q' => "Perth's time zone is different from the rest of Australia -- how does that affect calls?", 'a' => "Perth is only 2.5-3.5 hours ahead of IST, notably closer than Sydney or Melbourne, which actually makes scheduling easier for Perth clients specifically."],
      ['q' => "What's the typical project cost?", 'a' => "Most Perth projects range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-adelaide' => [
    'intro_heading' => "Web Development for Adelaide's Defense and Wine-Region Economy",
    'intro' => [
      "Adelaide's economy centers on defense industry work (naval shipbuilding contracts) and its role as the commercial hub for South Australia's globally known wine regions, alongside a solid education sector. A defense-adjacent supplier needs a credibility-focused capability site; a wine-region-adjacent tourism or hospitality business needs strong visuals and an easy booking flow.",
      "Adelaide runs 4.5-5.5 hours ahead of IST, so calls are typically scheduled for Adelaide's afternoon/evening. AUD pricing is standard, with typical Adelaide projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with defense-adjacent or wine-tourism businesses in Adelaide?", 'a' => "Both are common Adelaide client types -- defense-adjacent suppliers need clear capability pages, wine-region tourism and hospitality businesses need strong visuals and booking flows."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours ahead of IST -- calls scheduled for Adelaide afternoon/evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-canberra' => [
    'intro_heading' => "Web Development for Canberra's Government and Policy-Consulting Economy",
    'intro' => [
      "As Australia's national capital, Canberra's economy is dominated by federal government work and the policy-consulting firms that orbit it -- a Canberra business site typically needs to project formal credibility and clarity, similar in spirit to government-adjacent clients in Ottawa or Northern Virginia, more than visual creativity.",
      "Canberra runs 4.5-5.5 hours ahead of IST, so calls are typically scheduled for Canberra's afternoon/evening. AUD pricing is standard, with typical Canberra projects ranging from AUD 200 to AUD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for government-adjacent or policy-consulting businesses in Canberra?", 'a' => "Yes -- formal credibility and clarity are priorities for Canberra's government-adjacent and policy-consulting client base, a common project type here."],
      ['q' => "How does the time zone work?", 'a' => "4.5-5.5 hours ahead of IST -- calls scheduled for Canberra afternoon/evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most Canberra projects range AUD 200-7,000, in AUD."],
    ],
    'layout' => 'A',
  ],

  // ===== New Zealand =====
  'web-developer-auckland' => [
    'intro_heading' => "Web Development for Auckland's Trade Gateway and Finance Hub",
    'intro' => [
      "Auckland is New Zealand's largest city and its main port/trade gateway, hosting most of the country's finance and corporate headquarters -- a genuinely different economic profile from Wellington's government focus or Christchurch's agricultural base. Auckland businesses tend to want sites that project scale and credibility to match the city's role as NZ's commercial center.",
      "Auckland is 6.5-7.5 hours ahead of IST -- the largest gap covered on this site -- so calls typically work best scheduled for Auckland's afternoon, landing in an Indian morning. NZD pricing is standard, with typical Auckland projects ranging from NZD 200 to NZD 7,000.",
    ],
    'faqs' => [
      ['q' => "Does Auckland's time difference make scheduling difficult?", 'a' => "It's the largest gap on this site (6.5-7.5 hours ahead), but manageable -- we schedule for Auckland's afternoon, which lands in an Indian morning, and it hasn't been a blocker on past projects."],
      ['q' => "Do you work with trade or finance-adjacent businesses in Auckland?", 'a' => "Yes -- credibility-focused sites reflecting Auckland's role as NZ's commercial and trade hub are a common request."],
      ['q' => "What's the typical project cost?", 'a' => "Most Auckland projects range NZD 200-7,000, in NZD."],
    ],
    'layout' => 'B',
  ],
  'web-developer-wellington' => [
    'intro_heading' => "Web Development for Wellington's Government and \"Wellywood\" Film Economy",
    'intro' => [
      "As New Zealand's capital, Wellington's economy runs on government and public-sector work, but the city is equally known as \"Wellywood\" -- home to Weta Workshop and the film production infrastructure behind major international productions. A government-adjacent Wellington client wants formal clarity; a production-adjacent client wants a site with real visual craft.",
      "Wellington shares Auckland's time zone, 6.5-7.5 hours ahead of IST, so calls typically work best scheduled for Wellington's afternoon. NZD pricing is standard, with typical Wellington projects ranging from NZD 200 to NZD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or film-production businesses in Wellington?", 'a' => "Both are common Wellington client types -- government-adjacent clients want formal clarity, production-adjacent businesses want strong visual design given the city's film-industry identity."],
      ['q' => "How does the time zone work?", 'a' => "6.5-7.5 hours ahead of IST -- calls scheduled for Wellington's afternoon, landing in an Indian morning."],
      ['q' => "What's the typical project cost?", 'a' => "Most range NZD 200-7,000, in NZD."],
    ],
    'layout' => 'A',
  ],
  'web-developer-christchurch' => [
    'intro_heading' => "Web Development for Christchurch's Agritech and Post-Rebuild Innovation Scene",
    'intro' => [
      "Christchurch serves as the commercial gateway to the South Island's agriculture-heavy economy, and the city's post-earthquake rebuild has, somewhat unexpectedly, fostered a genuine innovation and agritech startup scene as the city rebuilt its infrastructure from the ground up. That mix means Christchurch web development demand spans traditional agribusiness sites and newer agritech product companies.",
      "Christchurch shares New Zealand's time zone, 6.5-7.5 hours ahead of IST, so calls typically work best scheduled for Christchurch's afternoon. NZD pricing is standard, with typical Christchurch projects ranging from NZD 200 to NZD 7,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with agribusiness or agritech companies in Christchurch?", 'a' => "Yes -- both traditional agribusiness sites and newer agritech product companies are common request types given Christchurch's role as the South Island's agricultural commercial hub."],
      ['q' => "How does the time zone work?", 'a' => "6.5-7.5 hours ahead of IST -- calls scheduled for Christchurch's afternoon."],
      ['q' => "What's the typical project cost?", 'a' => "Most range NZD 200-7,000, in NZD."],
    ],
    'layout' => 'B',
  ],

  // ===== Russia =====
  'web-developer-moscow' => [
    'intro_heading' => "Web Development for Moscow's Corporate Headquarters Concentration",
    'intro' => [
      "Moscow hosts the large majority of Russia's major corporate headquarters and government institutions, distinct from Saint Petersburg's more culture-and-port-driven economy -- Moscow clients tend to be corporate-adjacent businesses wanting a credible, professional site, with the practical side of the relationship (payment, given cross-border complexity) mattering as much as the design brief itself.",
      "Given current cross-border payment complexity for Russia, pricing is quoted and settled in USD, with the exact transfer method confirmed directly on the discovery call. Moscow runs about 2.5 hours behind IST, comfortably overlapping a normal Indian working day.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD rather than rubles?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable, with the specific transfer method confirmed per client."],
      ['q' => "Do you work with corporate-adjacent businesses in Moscow?", 'a' => "Yes -- credible, professional-looking sites are a common request given Moscow's concentration of corporate headquarters and government-adjacent institutions."],
      ['q' => "What's the typical project cost?", 'a' => "Most Moscow projects range USD 100-5,000, with payment terms confirmed upfront given cross-border considerations."],
    ],
    'layout' => 'A',
  ],
  'web-developer-saint-petersburg' => [
    'intro_heading' => "Web Development for Saint Petersburg's Culture, Port and Tech Economy",
    'intro' => [
      "Saint Petersburg's economy leans on port/logistics trade and a large cultural-tourism sector built around its historic city center, alongside a tech scene that's grown distinct from Moscow's more corporate-headquarters concentration. A Saint Petersburg tourism business wants strong visuals; a port-logistics or tech company wants clear, functional information architecture.",
      "As with Moscow, pricing for Saint Petersburg is quoted and settled in USD given current cross-border payment complexity, confirmed directly during the discovery call. Saint Petersburg runs about 2.5 hours behind IST, overlapping comfortably with normal Indian working hours.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable, with the exact transfer method confirmed per client."],
      ['q' => "Do you work with tourism or port-logistics businesses in Saint Petersburg?", 'a' => "Yes -- both are common local business types, tourism needing strong visuals and logistics/tech needing clear, functional site structure."],
      ['q' => "What's the typical project cost?", 'a' => "Most range USD 100-5,000, with payment terms confirmed upfront."],
    ],
    'layout' => 'B',
  ],

  // ===== South Africa =====
  'web-developer-cape-town' => [
    'intro_heading' => "Web Development for Cape Town's \"Silicon Cape\" Tech Scene and Tourism Economy",
    'intro' => [
      "Cape Town has built a genuine tech and startup identity -- often called \"Silicon Cape\" -- alongside being South Africa's dominant tourism destination and gateway to the nearby wine regions. A Cape Town tech startup wants a modern, product-focused site; a tourism or wine-adjacent hospitality business wants strong visuals and an easy booking flow.",
      "Cape Town is 3.5 hours ahead of IST, a comfortable overlap that puts a Cape Town afternoon call in an Indian evening. ZAR pricing is standard, with typical Cape Town projects ranging from ZAR 1,500 to ZAR 80,000 depending on the business's scale.",
    ],
    'faqs' => [
      ['q' => "Do you work with tech startups in Cape Town?", 'a' => "Yes -- Cape Town's \"Silicon Cape\" tech scene is a source of modern, product-focused site requests, alongside the city's large tourism and hospitality sector."],
      ['q' => "How does the time zone work?", 'a' => "3.5 hours ahead of IST -- a Cape Town afternoon call lands comfortably in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range ZAR 1,500-80,000 depending on business scale, in ZAR."],
    ],
    'layout' => 'A',
  ],
  'web-developer-johannesburg' => [
    'intro_heading' => "Web Development for Johannesburg's Financial Services and Mining-HQ Economy",
    'intro' => [
      "Johannesburg hosts the Johannesburg Stock Exchange and the large majority of South Africa's mining-industry corporate headquarters (even though the mines themselves are elsewhere), making it the country's dominant financial-services city. Johannesburg clients tend to want sites that project the same scale and credibility as the city's corporate concentration.",
      "Johannesburg is 3.5 hours ahead of IST, putting an afternoon call comfortably in an Indian evening. ZAR pricing is standard, with typical Johannesburg projects ranging from ZAR 1,500 to ZAR 80,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with financial-services or mining-adjacent corporate clients in Johannesburg?", 'a' => "Yes -- credibility-focused, corporate-caliber sites are a common request given Johannesburg's concentration of financial-services and mining-industry headquarters."],
      ['q' => "How does the time zone work?", 'a' => "3.5 hours ahead of IST -- Johannesburg afternoon calls land comfortably in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range ZAR 1,500-80,000, in ZAR."],
    ],
    'layout' => 'B',
  ],
  'web-developer-durban' => [
    'intro_heading' => "Web Development for Durban's Port Logistics and Manufacturing Base",
    'intro' => [
      "Durban is home to the busiest port in Africa, and its economy reflects that -- logistics, shipping-adjacent services and manufacturing dominate, alongside a solid tourism sector built around its beaches. A Durban logistics business wants a clear, functional B2B site; a beach-tourism business wants strong visuals and a booking flow.",
      "Durban is 3.5 hours ahead of IST, comfortably overlapping normal working hours on both sides. ZAR pricing is standard, with typical Durban projects ranging from ZAR 1,500 to ZAR 80,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with port-logistics or manufacturing businesses in Durban?", 'a' => "Yes -- clear, functional B2B sites are a common request given Durban's role as Africa's busiest port and a manufacturing hub."],
      ['q' => "How does the time zone work?", 'a' => "3.5 hours ahead of IST -- comfortably overlapping normal working hours on both sides."],
      ['q' => "What's the typical project cost?", 'a' => "Most range ZAR 1,500-80,000, in ZAR."],
    ],
    'layout' => 'A',
  ],

  // ===== Saudi Arabia =====
  'web-developer-riyadh' => [
    'intro_heading' => "Web Development for Riyadh's Vision 2030 Corporate and Government Economy",
    'intro' => [
      "As Saudi Arabia's capital, Riyadh concentrates most of the country's Vision 2030-driven corporate headquarters and government institutions, alongside a fast-growing retail and e-commerce sector as the broader diversification push accelerates online shopping adoption. Riyadh clients tend to want sites that project a modern, credible, forward-looking image matching that national push.",
      "Riyadh runs about 2.5 hours behind IST, comfortably overlapping normal working hours on both sides. SAR pricing is standard, with typical Riyadh projects ranging from SAR 500 to SAR 50,000.",
    ],
    'faqs' => [
      ['q' => "Do you build e-commerce sites for the growing Riyadh retail market?", 'a' => "Yes -- retail and e-commerce builds are increasingly common given Vision 2030's push on digitization, alongside corporate/government-adjacent credibility sites."],
      ['q' => "How does the time zone work?", 'a' => "2.5 hours behind IST -- comfortably overlapping normal working hours on both sides."],
      ['q' => "What's the typical project cost?", 'a' => "Most range SAR 500-50,000, in SAR."],
    ],
    'layout' => 'B',
  ],
  'web-developer-jeddah' => [
    'intro_heading' => "Web Development for Jeddah's Historic Trading Port and Red Sea Tourism Growth",
    'intro' => [
      "Jeddah has functioned as Saudi Arabia's main commercial trading gateway for centuries, and that trading-hub identity persists in its current business base, now joined by rapidly growing Red Sea tourism development and a steady flow of Hajj/Umrah-related commerce given the city's proximity to Mecca. A Jeddah trading business wants a clear catalog site; a tourism-adjacent business wants strong visuals.",
      "Jeddah runs about 2.5 hours behind IST, overlapping comfortably with normal working hours. SAR pricing is standard, with typical Jeddah projects ranging from SAR 500 to SAR 50,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with trading companies or tourism businesses in Jeddah?", 'a' => "Both are common Jeddah client types -- trading companies typically need clear product/service catalogs, tourism-adjacent businesses want strong visuals given the city's growing Red Sea tourism sector."],
      ['q' => "How does the time zone work?", 'a' => "2.5 hours behind IST -- overlapping comfortably with normal working hours."],
      ['q' => "What's the typical project cost?", 'a' => "Most range SAR 500-50,000, in SAR."],
    ],
    'layout' => 'A',
  ],
  'web-developer-dammam' => [
    'intro_heading' => "Web Development for Dammam's Oil, Energy and Petrochemical Industrial Base",
    'intro' => [
      "Dammam sits in Saudi Arabia's Eastern Province, the center of the country's oil and petrochemical industry (near Aramco's operations), and the local business base reflects that heavily industrial character -- energy-services suppliers and petrochemical-adjacent businesses are the dominant client type, typically needing clear, credible capability sites over flashy design.",
      "Dammam runs about 2.5 hours behind IST, comfortably overlapping normal working hours. SAR pricing is standard, with typical Dammam projects ranging from SAR 500 to SAR 50,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with oil, energy or petrochemical-adjacent businesses in Dammam?", 'a' => "Yes -- clear, credible capability sites are a common request given Dammam's concentration of energy-services and petrochemical-adjacent businesses."],
      ['q' => "How does the time zone work?", 'a' => "2.5 hours behind IST -- comfortably overlapping normal working hours."],
      ['q' => "What's the typical project cost?", 'a' => "Most range SAR 500-50,000, in SAR."],
    ],
    'layout' => 'B',
  ],

  // ===== UAE (Abu Dhabi, Sharjah -- Dubai already has its own country-level page) =====
  'web-developer-abu-dhabi' => [
    'intro_heading' => "Web Development for Abu Dhabi's Sovereign Wealth and Cultural-Tourism Growth",
    'intro' => [
      "Abu Dhabi, as the UAE's capital, concentrates most of the country's sovereign wealth and government institutions, and has invested heavily in cultural tourism in recent years (Louvre Abu Dhabi and similar projects) alongside its traditional government-and-finance base. Abu Dhabi clients tend to want sites that project stability and long-term credibility over trendy design.",
      "Abu Dhabi shares the UAE's time zone, 1.5 hours behind IST -- one of the smallest gaps on this site, making same-day scheduling genuinely easy. AED pricing is standard, with typical Abu Dhabi projects ranging from AED 500 to AED 50,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or cultural-institution businesses in Abu Dhabi?", 'a' => "Yes -- stable, credible design over trendy visuals is typically the priority for Abu Dhabi's government-adjacent and cultural-tourism-adjacent client base."],
      ['q' => "How does the time zone work?", 'a' => "1.5 hours behind IST -- one of the easiest overlaps covered here, making same-day scheduling straightforward."],
      ['q' => "What's the typical project cost?", 'a' => "Most range AED 500-50,000, in AED."],
    ],
    'layout' => 'A',
  ],
  'web-developer-sharjah' => [
    'intro_heading' => "Web Development for Sharjah's Industrial and Education-Focused Economy",
    'intro' => [
      "Sharjah is noticeably more industrial and manufacturing-focused than Dubai or Abu Dhabi, with a business culture that leans more conservative and a strong education sector (multiple universities). Sharjah clients tend to want straightforward, professional sites that respect that more traditional business culture rather than flashy, trend-driven design.",
      "Sharjah shares the UAE's time zone, 1.5 hours behind IST, making scheduling straightforward. AED pricing is standard, with typical Sharjah projects ranging from AED 500 to AED 50,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with industrial or manufacturing businesses in Sharjah?", 'a' => "Yes -- straightforward, professional sites reflecting Sharjah's more industrial and traditional business culture are a common request."],
      ['q' => "How does the time zone work?", 'a' => "1.5 hours behind IST, same as the rest of the UAE -- straightforward same-day scheduling."],
      ['q' => "What's the typical project cost?", 'a' => "Most range AED 500-50,000, in AED."],
    ],
    'layout' => 'B',
  ],

  // ===== Switzerland =====
  'web-developer-zurich' => [
    'intro_heading' => "Web Development for Zurich's Global Banking and Fintech Corridor",
    'intro' => [
      "Zurich is one of the world's major global banking centers, and that finance-industry precision has spread into a genuinely growing fintech and crypto sector (with nearby Zug's \"Crypto Valley\" pulling talent into the wider Zurich metro). Zurich clients expect exacting attention to detail -- every piece of contact information, every credential, needs to be exactly right.",
      "Zurich is 3.5-4.5 hours behind IST depending on the season, putting a Zurich afternoon call in an Indian evening. CHF pricing is standard, with typical Zurich projects ranging from CHF 200 to CHF 8,000.",
    ],
    'faqs' => [
      ['q' => "Do you understand the precision expected by Zurich banking/fintech clients?", 'a' => "Yes -- exacting attention to detail (correct credentials, disclosures, contact info) is the standard Zurich work is held to, more than visual flair."],
      ['q' => "How does the time zone work?", 'a' => "3.5-4.5 hours behind IST -- Zurich afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CHF 200-8,000, in CHF."],
    ],
    'layout' => 'A',
  ],
  'web-developer-geneva' => [
    'intro_heading' => "Web Development for Geneva's International Organizations and Private Banking",
    'intro' => [
      "Geneva hosts a dense concentration of international organizations (UN offices, Red Cross headquarters) alongside a private-banking sector distinct from Zurich's more retail/fintech-leaning banking scene, plus a luxury-goods-adjacent business base tied to the watchmaking industry nearby. Geneva clients skew toward formal, multilingual (French/English) and understated design.",
      "Geneva shares Switzerland's time zone, 3.5-4.5 hours behind IST, so calls typically land in a Geneva afternoon against an Indian evening. CHF pricing is standard, with typical Geneva projects ranging from CHF 200 to CHF 8,000.",
    ],
    'faqs' => [
      ['q' => "Can you build bilingual French/English sites for Geneva clients?", 'a' => "Yes -- bilingual site structure is a common and explicitly-scoped request given Geneva's French/English business environment."],
      ['q' => "Do you work with international organizations or private banking-adjacent clients?", 'a' => "Yes -- formal, understated design suited to Geneva's concentration of international organizations and private banking firms is a common brief."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CHF 200-8,000, in CHF."],
    ],
    'layout' => 'B',
  ],
  'web-developer-zug' => [
    'intro_heading' => "Web Development for Zug's \"Crypto Valley\" and Low-Tax Corporate Base",
    'intro' => [
      "Zug has built a genuinely global reputation as \"Crypto Valley,\" pulling in blockchain and crypto companies alongside a broader concentration of corporate headquarters drawn by the canton's low corporate tax rate. Despite being a small canton, Zug's client base skews unusually international and product-focused, wanting modern, credible sites that don't look like a small-town business.",
      "Zug shares Switzerland's time zone, 3.5-4.5 hours behind IST, so calls typically land in a Zug afternoon against an Indian evening. CHF pricing is standard, with typical Zug projects ranging from CHF 200 to CHF 8,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with crypto or blockchain companies in Zug?", 'a' => "Yes -- modern, product-focused sites for crypto/blockchain and international corporate clients are a common request given Zug's \"Crypto Valley\" identity."],
      ['q' => "How does the time zone work?", 'a' => "3.5-4.5 hours behind IST -- Zug afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range CHF 200-8,000, in CHF."],
    ],
    'layout' => 'A',
  ],

  // ===== Germany =====
  'web-developer-berlin' => [
    'intro_heading' => "Web Development for Berlin's Startup and Creative-Tech Scene",
    'intro' => [
      "Berlin is Germany's answer to a startup hub -- a genuinely large tech and creative-industries scene that looks quite different from the more traditional Mittelstand manufacturing base found in Munich or Hamburg. Berlin clients tend to want modern, product-focused sites and are generally more comfortable with newer design trends than the rest of Germany's more conservative business culture.",
      "Berlin is 3.5-4.5 hours behind IST, putting a Berlin afternoon call in an Indian evening. EUR pricing is standard, with typical Berlin projects ranging from EUR 150 to EUR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you build startup-style sites for Berlin tech companies?", 'a' => "Yes -- modern, product-focused design suited to Berlin's startup and creative-tech scene is a common request, distinct from the more traditional Mittelstand brief elsewhere in Germany."],
      ['q' => "How does the time zone work?", 'a' => "3.5-4.5 hours behind IST -- Berlin afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range EUR 150-6,000, in EUR."],
    ],
    'layout' => 'B',
  ],
  'web-developer-munich' => [
    'intro_heading' => "Web Development for Munich's Corporate HQ and Engineering Concentration",
    'intro' => [
      "Munich hosts a dense concentration of major corporate headquarters (BMW, Siemens and a large finance sector including Allianz), giving the city a more traditionally corporate, engineering-and-precision-focused business culture than Berlin's startup scene. Munich clients want thorough, technically accurate sites -- detail and correctness over trendy design.",
      "Munich is 3.5-4.5 hours behind IST, putting a Munich afternoon call in an Indian evening. EUR pricing is standard, with typical Munich projects ranging from EUR 150 to EUR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with engineering or corporate-HQ-adjacent businesses in Munich?", 'a' => "Yes -- thorough, technically accurate sites are the priority for Munich's engineering and corporate-headquarters-adjacent client base, distinct from Berlin's startup-style brief."],
      ['q' => "How does the time zone work?", 'a' => "3.5-4.5 hours behind IST -- Munich afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range EUR 150-6,000, in EUR."],
    ],
    'layout' => 'A',
  ],
  'web-developer-hamburg' => [
    'intro_heading' => "Web Development for Hamburg's Port Logistics and Media-Publishing Base",
    'intro' => [
      "Hamburg is home to Germany's largest port, giving the city a strong trade and logistics identity, alongside a notable concentration of media and publishing-industry headquarters -- a mix that produces both heavily functional B2B logistics sites and more editorially-minded media/publishing-adjacent sites as common request types.",
      "Hamburg is 3.5-4.5 hours behind IST, putting a Hamburg afternoon call in an Indian evening. EUR pricing is standard, with typical Hamburg projects ranging from EUR 150 to EUR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with logistics or media/publishing businesses in Hamburg?", 'a' => "Yes -- both are common Hamburg client types, logistics companies needing clear functional B2B sites and media/publishing-adjacent businesses wanting more editorially-minded design."],
      ['q' => "How does the time zone work?", 'a' => "3.5-4.5 hours behind IST -- Hamburg afternoon calls land in an Indian evening."],
      ['q' => "What's the typical project cost?", 'a' => "Most range EUR 150-6,000, in EUR."],
    ],
    'layout' => 'B',
  ],
];
