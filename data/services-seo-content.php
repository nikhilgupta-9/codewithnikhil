<?php
// Unique per-page content layer for service-seo.php (added 2026-07-23 to fix
// GSC flagging seo-services-* pages as duplicate/thin doorway content -- see
// memory nikhilworks-doorway-content-fix). Reuses the real local-industry
// facts already established for web-developer-*/crm-development-* pages,
// angled toward SEO/search-behavior reasoning specific to each market.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
return [
  // ===== Country pages =====
  'seo-services-usa' => [
    'intro_heading' => "SEO for a Market Where Every Keyword Has Ten Competitors Already Ranking",
    'intro' => [
      "US search results for almost any commercial keyword are already crowded with established competitors, paid ads, and review-site aggregators sitting above organic results. Ranking here isn't about broad keyword coverage -- it's about picking a realistic set of terms where you can genuinely compete, and building the technical and content foundation to actually win them.",
      "US clients also expect clear ROI reporting tied to leads or revenue, not just traffic numbers. Plans are quoted in USD, with most US SEO campaigns ranging from USD 300 to USD 3,000/month depending on competitiveness.",
    ],
    'faqs' => [
      ['q' => "US search results feel very crowded -- how do you pick which keywords to target?", 'a' => "We prioritize a realistic shortlist where you can genuinely compete, rather than spreading effort across every possible term, most of which you'd never rank for anyway."],
      ['q' => "Do you report on leads/revenue, not just traffic?", 'a' => "Yes -- US clients typically want ROI tied to actual leads or sales, so reporting goes beyond raw traffic numbers."],
      ['q' => "What's the typical cost?", 'a' => "Most US SEO plans range USD 300-3,000/month depending on competitiveness, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'seo-services-uk' => [
    'intro_heading' => "SEO for UK Businesses Competing Against London's Digital Budgets",
    'intro' => [
      "UK search results, especially for anything London-adjacent, are shaped by businesses with genuinely large digital marketing budgets. A smaller UK business doesn't need to outspend them -- it needs sharper targeting: local and long-tail keywords where big competitors aren't putting in the same effort.",
      "GBP-denominated plans keep budgeting straightforward, with most UK SEO campaigns ranging from GBP 250 to GBP 2,500/month depending on how competitive the target keywords are.",
    ],
    'faqs' => [
      ['q' => "How do smaller UK businesses compete against big London budgets in search?", 'a' => "By targeting sharper, more specific local and long-tail keywords where larger competitors aren't concentrating effort, rather than trying to outspend them broadly."],
      ['q' => "What's the typical cost?", 'a' => "Most UK SEO plans range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you handle technical SEO as well as content?", 'a' => "Yes -- site speed, crawlability and structured data are covered alongside content and keyword work."],
    ],
    'layout' => 'B',
  ],
  'seo-services-uae' => [
    'intro_heading' => "SEO for UAE's Real Estate, Trading and Bilingual Search Landscape",
    'intro' => [
      "UAE search behavior splits across English and Arabic queries, and real estate/trading businesses here are often competing for both simultaneously -- a property listing ranking well in English search but invisible in Arabic search is only winning half the available audience.",
      "AED-denominated plans keep budgeting clear, with most UAE SEO campaigns ranging from AED 1,500 to AED 12,000/month depending on scope and bilingual coverage.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for both English and Arabic search?", 'a' => "Yes -- bilingual keyword targeting is a common and explicitly-scoped UAE requirement, since real estate and trading businesses often need visibility in both languages."],
      ['q' => "Do you work with real estate or trading businesses specifically?", 'a' => "Yes -- both are common UAE client types with distinct keyword strategies (property-listing SEO vs. B2B trade-catalog SEO)."],
      ['q' => "What's the typical cost?", 'a' => "Most UAE SEO plans range AED 1,500-12,000/month, quoted in AED."],
    ],
    'layout' => 'A',
  ],
  'seo-services-canada' => [
    'intro_heading' => "SEO for Canada's Regionally Fragmented Search Market",
    'intro' => [
      "Canadian search demand is genuinely regional -- a Toronto search intent differs from Vancouver or Montreal, and Quebec's French-language search behaves almost like a separate market entirely. A single generic Canada-wide SEO strategy misses most of this nuance.",
      "CAD-denominated plans keep budgeting clear, with most Canadian SEO campaigns ranging from CAD 400 to CAD 3,500/month depending on how many regions/languages are targeted.",
    ],
    'faqs' => [
      ['q' => "Does SEO strategy differ by Canadian region?", 'a' => "Yes -- search intent genuinely varies between Toronto, Vancouver, Montreal and elsewhere, so a single generic strategy misses regional nuance."],
      ['q' => "Do you handle French-language SEO for Quebec?", 'a' => "Yes -- French search behaves nearly like a separate market, and it's scoped explicitly rather than treated as an English-SEO afterthought."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian SEO plans range CAD 400-3,500/month, quoted in CAD."],
    ],
    'layout' => 'B',
  ],
  'seo-services-australia' => [
    'intro_heading' => "SEO for Australia's Concentrated, City-Specific Search Behavior",
    'intro' => [
      "Australian search demand concentrates heavily around Sydney and Melbourne, but a national or generic Australia-wide keyword strategy under-serves the very real local search behavior in Brisbane, Perth or Adelaide, where competition for the same keywords is often lighter.",
      "AUD-denominated plans keep budgeting clear, with most Australian SEO campaigns ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Should SEO strategy differ between Sydney/Melbourne and smaller Australian cities?", 'a' => "Yes -- competition is often lighter in cities like Brisbane, Perth or Adelaide, and a generic national strategy under-serves that local opportunity."],
      ['q' => "What's the typical cost?", 'a' => "Most Australian SEO plans range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "Do you provide monthly ranking reports?", 'a' => "Yes -- clear rankings, traffic and conversion reports are provided monthly, not just a one-time audit."],
    ],
    'layout' => 'A',
  ],

  // ===== USA cities =====
  'seo-services-california' => [
    'intro_heading' => "SEO for California's Crowded SaaS and Retail Search Landscape",
    'intro' => [
      "California SEO clients compete in some of the most saturated keyword spaces in the country, particularly SaaS and tech-adjacent terms where every competitor already has a content marketing team. Winning here means finding the specific long-tail terms bigger competitors aren't bothering to target well.",
      "Pricing is quoted in USD, with most California SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "California's SEO market feels saturated -- how do you find an opening?", 'a' => "By targeting specific long-tail terms that bigger, well-resourced competitors aren't bothering to cover well, rather than competing head-on for the broadest terms."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you handle technical SEO too?", 'a' => "Yes -- site speed and crawlability fixes are part of every plan."],
    ],
    'layout' => 'B',
  ],
  'seo-services-new-york' => [
    'intro_heading' => "SEO for New York's Finance and Professional-Services Keywords",
    'intro' => [
      "New York SEO clients often compete for finance and professional-services keywords where the top results are dominated by large, established firms with years of content built up. A newer or smaller New York business needs a more targeted local/niche strategy rather than competing head-on for broad terms.",
      "Pricing is quoted in USD, with most New York SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "How do smaller New York firms compete against established finance/professional-services content?", 'a' => "By targeting more specific local and niche terms rather than the broadest, most competitive keywords already dominated by larger firms."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months of consistent work."],
    ],
    'layout' => 'A',
  ],
  'seo-services-washington' => [
    'intro_heading' => "SEO for Washington State's Tech-Influenced Search Landscape",
    'intro' => [
      "Washington State SEO clients operate in a market where the local tech industry has pushed user (and Google's) expectations toward fast, well-structured sites -- technical SEO fundamentals matter here more than in less tech-influenced markets.",
      "Pricing is quoted in USD, with most Washington SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Does Washington's tech-heavy market change what matters for SEO?", 'a' => "Somewhat -- technical fundamentals like site speed and structure carry extra weight here given the local tech industry's influence on user expectations."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you handle local SEO for Seattle-area searches?", 'a' => "Yes -- Google Business Profile optimization and local citations are part of the local SEO work."],
    ],
    'layout' => 'B',
  ],
  'seo-services-texas' => [
    'intro_heading' => "SEO for Texas's Energy, Logistics and No-Income-Tax Business Influx",
    'intro' => [
      "Texas SEO demand spans established energy and logistics B2B keywords around Houston/Dallas and a wave of newer businesses relocating from higher-tax states, many of which are starting their local SEO from scratch in a new market.",
      "Pricing is quoted in USD, with most Texas SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you help businesses that recently relocated to Texas build local SEO from scratch?", 'a' => "Yes -- this is a common Texas request given how many businesses have relocated here recently and need to establish local search presence."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you work with B2B energy or logistics keywords?", 'a' => "Yes -- longer-tail B2B industrial keywords are a common Houston/Dallas-area request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-virginia' => [
    'intro_heading' => "SEO for Northern Virginia's Government-Contracting Search Terms",
    'intro' => [
      "Northern Virginia SEO clients are often government contractors and professional-services firms needing visibility for very specific procurement/capability-related search terms -- a niche keyword space that general SEO approaches often miss entirely.",
      "Pricing is quoted in USD, with most Virginia SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for government-contractor-specific search terms?", 'a' => "Yes -- procurement and capability-related keyword targeting is a common Northern Virginia request that general SEO approaches often overlook."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports are provided every month."],
    ],
    'layout' => 'B',
  ],
  'seo-services-delaware' => [
    'intro_heading' => "SEO for Delaware's Financial and Corporate-Services Niche",
    'intro' => [
      "Delaware SEO clients are often financial and corporate-services firms in a relatively small local search market -- less competition than bigger states, but also fewer local search volume signals to work with, requiring a slightly different keyword approach.",
      "Pricing is quoted in USD, with most Delaware SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Is Delaware's SEO market less competitive than bigger states?", 'a' => "Generally yes, though local search volume is also lower, which changes the keyword strategy slightly -- we account for that during keyword research."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you work with financial-services firms specifically?", 'a' => "Yes -- credibility-focused content and keyword targeting suited to Delaware's financial-services concentration is a common request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-los-angeles' => [
    'intro_heading' => "SEO for LA's Entertainment-Adjacent and Local Retail Search",
    'intro' => [
      "LA SEO demand splits between entertainment-adjacent businesses competing for highly visual, brand-driven search terms, and local retail/services businesses competing on more standard local-intent keywords -- two different strategies from the same city.",
      "Pricing is quoted in USD, with most LA SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for entertainment-adjacent businesses in LA?", 'a' => "Yes -- brand-driven, visually-oriented keyword strategies are common for LA's entertainment-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you do local SEO for retail/services businesses too?", 'a' => "Yes -- standard local-intent keyword targeting and Google Business Profile optimization are common LA requests."],
    ],
    'layout' => 'B',
  ],
  'seo-services-chicago' => [
    'intro_heading' => "SEO for Chicago's Manufacturing, Logistics and Finance B2B Keywords",
    'intro' => [
      "Chicago SEO clients often need visibility for B2B industrial and logistics search terms with lower search volume but higher buying intent than typical consumer keywords -- a very different optimization target than most SEO campaigns.",
      "Pricing is quoted in USD, with most Chicago SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle low-volume, high-intent B2B keywords?", 'a' => "Yes -- this is a common focus for Chicago's manufacturing and logistics clients, where buying intent matters more than raw search volume."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "How long until we see ranking movement?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'A',
  ],
  'seo-services-houston' => [
    'intro_heading' => "SEO for Houston's Energy Sector and Medical Center Search Terms",
    'intro' => [
      "Houston SEO demand splits between energy-services B2B keywords and healthcare-adjacent local search around the Texas Medical Center -- two very different keyword sets requiring different content strategies.",
      "Pricing is quoted in USD, with most Houston SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for energy-services or healthcare-adjacent businesses?", 'a' => "Both are common Houston client types, needing quite different keyword and content strategies from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you do local SEO for the Medical Center area specifically?", 'a' => "Yes -- local search optimization for healthcare-adjacent practices near the Texas Medical Center is a common request."],
    ],
    'layout' => 'B',
  ],
  'seo-services-dallas' => [
    'intro_heading' => "SEO for Dallas's Finance, Telecom and Logistics B2B Search",
    'intro' => [
      "Dallas SEO clients are typically B2B businesses in finance, telecom or logistics needing visibility for corporate-buyer search terms -- credibility-driven content matters more than volume-chasing here.",
      "Pricing is quoted in USD, with most Dallas SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for corporate buyers in Dallas?", 'a' => "Yes -- credibility-driven content and keyword targeting for a corporate-buyer audience is a common Dallas request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports are provided every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-phoenix' => [
    'intro_heading' => "SEO for Phoenix's Fast-Growing Real Estate and Home-Services Market",
    'intro' => [
      "Phoenix SEO clients are often real estate and home-services businesses competing for high-intent local keywords in a fast-growing market, where new competitors enter the search results regularly.",
      "Pricing is quoted in USD, with most Phoenix SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle local SEO for real estate or home services in Phoenix?", 'a' => "Yes -- high-intent local keyword targeting is the priority given Phoenix's fast-growing, competitive real estate and home-services market."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "How often do you re-check keyword competition given how fast Phoenix grows?", 'a' => "Rankings are reviewed monthly, which catches new competitors entering the search results as the market grows."],
    ],
    'layout' => 'B',
  ],
  'seo-services-san-diego' => [
    'intro_heading' => "SEO for San Diego's Biotech and Life-Sciences Search Terms",
    'intro' => [
      "San Diego SEO clients often need visibility for technical, biotech-adjacent search terms with a scientifically literate audience -- content needs to be accurate and credible, not just optimized for volume.",
      "Pricing is quoted in USD, with most San Diego SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for biotech or life-sciences-adjacent businesses?", 'a' => "Yes -- accurate, credible technical content for a scientifically literate audience is the priority for San Diego's biotech-adjacent clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you also handle local SEO for tourism/defense-adjacent businesses?", 'a' => "Yes -- San Diego's tourism and defense-adjacent sectors are also common local SEO clients."],
    ],
    'layout' => 'A',
  ],
  'seo-services-philadelphia' => [
    'intro_heading' => "SEO for Philadelphia's Healthcare and Education Search Landscape",
    'intro' => [
      "Philadelphia SEO clients are often healthcare practices and education-adjacent providers needing local search visibility in a city with an unusually high density of hospitals and universities -- competition for these local terms is genuinely stiff.",
      "Pricing is quoted in USD, with most Philadelphia SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle local SEO for healthcare practices in Philadelphia?", 'a' => "Yes -- given the city's dense healthcare sector, local SEO for medical practices is a common and genuinely competitive request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "How long until we see results in a competitive market like this?", 'a' => "Technical fixes can show movement in 4-8 weeks; genuinely competitive local terms typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-miami' => [
    'intro_heading' => "SEO for Miami's Bilingual, Latin America-Facing Search Market",
    'intro' => [
      "Miami SEO clients often need both English and Spanish keyword targeting, given the city's role as a Latin America trade gateway -- a Spanish-language keyword strategy here isn't a nice-to-have, it's often where a large share of the addressable search volume actually is.",
      "Pricing is quoted in USD, with most Miami SEO plans ranging from USD 300 to USD 3,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle Spanish-language SEO for Miami businesses?", 'a' => "Yes -- bilingual keyword targeting is a common and often essential Miami request, given how much search volume sits in Spanish-language queries here."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD."],
      ['q' => "Do you handle local SEO for real estate businesses too?", 'a' => "Yes -- given Miami's fast-moving property market, real estate local SEO is a common request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-manhattan' => [
    'intro_heading' => "SEO for Manhattan's Ultra-Competitive Corporate Search Terms",
    'intro' => [
      "Manhattan SEO clients compete for some of the most contested keywords in the country, given the density of corporate headquarters and professional-services firms here -- a realistic, tightly-scoped keyword strategy matters more than anywhere else on this list.",
      "Pricing is quoted in USD, with most Manhattan SEO plans ranging from USD 300 to USD 3,000/month, similar to the broader New York market.",
    ],
    'faqs' => [
      ['q' => "Is Manhattan's SEO market more competitive than the rest of New York?", 'a' => "Often yes -- the density of corporate headquarters and professional-services firms makes many keywords here especially contested, which shapes a tighter, more realistic keyword strategy."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, quoted in USD, similar to the broader New York market."],
      ['q' => "Do you guarantee page 1 rankings given how competitive this is?", 'a' => "No legitimate SEO provider can guarantee rankings, especially in a market this competitive -- we commit to a documented process and transparent monthly reporting instead."],
    ],
    'layout' => 'B',
  ],

  // ===== UK cities =====
  'seo-services-london' => [
    'intro_heading' => "SEO for London's Fintech and Professional-Services Keyword Competition",
    'intro' => [
      "London SEO clients compete against fintech and professional-services firms with genuinely large content marketing budgets -- winning here requires a sharper, more specific keyword strategy rather than trying to outspend established competitors on broad terms.",
      "Pricing is quoted in GBP, with most London SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "How do smaller London businesses compete against big fintech SEO budgets?", 'a' => "By targeting sharper, more specific keywords rather than trying to outspend larger competitors on the broadest terms."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you handle technical SEO?", 'a' => "Yes -- site speed, crawlability and structured data are part of every plan."],
    ],
    'layout' => 'A',
  ],
  'seo-services-england' => [
    'intro_heading' => "SEO Across England, Beyond London's Fintech Search Competition",
    'intro' => [
      "This page covers England broadly -- London has its own dedicated page with fintech-specific keyword context, so this one is for businesses elsewhere in England needing SEO strategy matched to their own local market.",
      "Pricing is quoted in GBP, with most England-wide SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Why a page for England as well as London specifically?", 'a' => "London's page covers fintech-specific competition; this one is for businesses anywhere else in England with different local search dynamics."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "How long until we see ranking movement?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-manchester' => [
    'intro_heading' => "SEO for Manchester's Media and E-Commerce Search Landscape",
    'intro' => [
      "Manchester SEO clients often come from the city's media and e-commerce scene, needing content and technical SEO that keeps pace with a genuinely growing digital-native competitor base.",
      "Pricing is quoted in GBP, with most Manchester SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle e-commerce SEO for Manchester businesses?", 'a' => "Yes -- product and category-page SEO for e-commerce stores is a common Manchester request given the city's growing online retail scene."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-bristol' => [
    'intro_heading' => "SEO for Bristol's Engineering and Creative-Industry Search Terms",
    'intro' => [
      "Bristol SEO clients split between engineering/aerospace-adjacent B2B keyword targeting and creative-studio SEO built around portfolio visibility -- two genuinely different content strategies from the same city.",
      "Pricing is quoted in GBP, with most Bristol SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for engineering suppliers or creative studios?", 'a' => "Both are common Bristol client types, needing different content strategies -- B2B capability content vs. portfolio-driven visibility."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you do local SEO too?", 'a' => "Yes -- Google Business Profile and local citation work are included where relevant."],
    ],
    'layout' => 'B',
  ],
  'seo-services-leeds' => [
    'intro_heading' => "SEO for Leeds's Financial and Legal Services Keyword Competition",
    'intro' => [
      "Leeds SEO clients are often financial and legal-services firms competing for credibility-driven keyword terms, similar in spirit to London firms but with a distinct regional search audience.",
      "Pricing is quoted in GBP, with most Leeds SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for financial or legal-services firms in Leeds?", 'a' => "Yes -- credibility-driven content and keyword targeting suited to Leeds's financial and legal-services concentration is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'A',
  ],
  'seo-services-birmingham' => [
    'intro_heading' => "SEO for Birmingham's Manufacturing and Diverse SME Search Landscape",
    'intro' => [
      "Birmingham SEO clients range from manufacturing/automotive-adjacent B2B keyword targeting to consumer-facing retail and services SEO, reflecting the city's genuinely diverse economy.",
      "Pricing is quoted in GBP, with most Birmingham SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for Birmingham manufacturing suppliers?", 'a' => "Yes -- B2B capability and product-page keyword targeting is a common request from Birmingham's manufacturing sector."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you also handle local retail/services SEO?", 'a' => "Yes -- consumer-facing local SEO is just as common given Birmingham's diverse SME base."],
    ],
    'layout' => 'B',
  ],
  'seo-services-glasgow' => [
    'intro_heading' => "SEO for Glasgow's Growing Fintech and Financial-Services Search",
    'intro' => [
      "Glasgow SEO clients increasingly come from the city's growing fintech scene needing modern, product-focused content SEO, alongside traditional Scottish financial-services firms wanting credibility-driven keyword targeting.",
      "Pricing is quoted in GBP, with most Glasgow SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for fintech startups in Glasgow?", 'a' => "Yes -- modern, product-focused content SEO is a growing request from Glasgow's fintech scene."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-perth' => [
    'intro_heading' => "SEO for Perth's Mining and Resources Search Terms (Australia)",
    'intro' => [
      "Perth SEO clients typically need B2B keyword visibility for the mining and resources sector, Western Australia's dominant industry -- long, technical keyword phrases matter more here than broad consumer terms.",
      "Pricing is quoted in AUD, with most Perth SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for mining/resources businesses in Perth?", 'a' => "Yes -- technical, capability-focused keyword targeting is the priority given WA's dominant mining and resources industry."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "Is Perth's SEO market less competitive than Sydney or Melbourne?", 'a' => "Generally yes, which can make ranking somewhat more achievable for well-executed local campaigns."],
    ],
    'layout' => 'B',
  ],
  'seo-services-wellington' => [
    'intro_heading' => "SEO for Wellington's Government and Film-Industry Search Terms",
    'intro' => [
      "Wellington SEO clients split between government-adjacent content needing formal, accessibility-conscious writing and \"Wellywood\" film-production-adjacent businesses needing more creative, visually-driven content SEO.",
      "Pricing is quoted in NZD, with most Wellington SEO plans ranging from NZD 500 to NZD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for government-adjacent or film-production businesses?", 'a' => "Both are common Wellington client types, needing quite different content approaches."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-4,000/month, quoted in NZD."],
      ['q' => "How does the time zone affect reporting calls?", 'a' => "Wellington is 6.5-7.5 hours ahead of IST -- we schedule for Wellington's afternoon, which works well for monthly review calls."],
    ],
    'layout' => 'A',
  ],
  'seo-services-gold-coast' => [
    'intro_heading' => "SEO for the Gold Coast's Tourism and Holiday-Property Search Terms",
    'intro' => [
      "Gold Coast SEO clients are heavily tourism and holiday-property businesses competing for high-intent booking-related search terms, where visibility during peak search seasons directly drives bookings.",
      "Pricing is quoted in AUD, with most Gold Coast SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for tourism or holiday-property businesses?", 'a' => "Yes -- high-intent, booking-related keyword targeting is the priority for Gold Coast's tourism and holiday-property clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "Does ranking well actually drive bookings here?", 'a' => "Yes -- visibility during peak search seasons is directly tied to bookings for this business type, more so than most industries."],
    ],
    'layout' => 'B',
  ],
  'seo-services-moscow' => [
    'intro_heading' => "SEO for Moscow's Corporate and E-Commerce Search Landscape",
    'intro' => [
      "Moscow SEO clients are typically corporate-adjacent or e-commerce businesses needing credible, well-optimized content to compete in a search market dominated by established corporate players.",
      "Given current cross-border payment complexity for Russia, pricing is quoted and settled in USD, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable."],
      ['q' => "Do you handle SEO for e-commerce businesses in Moscow?", 'a' => "Yes -- product and category-page SEO is a common request alongside general corporate-adjacent content SEO."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, with payment terms confirmed upfront."],
    ],
    'layout' => 'A',
  ],
  'seo-services-auckland' => [
    'intro_heading' => "SEO for Auckland's Commercial Hub and Finance Search Terms",
    'intro' => [
      "Auckland SEO clients often need visibility for commercial and finance-adjacent keyword terms, reflecting the city's role as NZ's dominant trade and business hub.",
      "Pricing is quoted in NZD, with most Auckland SEO plans ranging from NZD 500 to NZD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for finance or trade-adjacent businesses in Auckland?", 'a' => "Yes -- credibility-driven content and keyword targeting for Auckland's commercial hub audience is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-4,000/month, quoted in NZD."],
      ['q' => "How does the time difference affect reporting?", 'a' => "Auckland is 6.5-7.5 hours ahead of IST -- monthly review calls are scheduled for Auckland's afternoon, which works well."],
    ],
    'layout' => 'B',
  ],
  'seo-services-cape-town' => [
    'intro_heading' => "SEO for Cape Town's Tech Startup and Tourism Search Landscape",
    'intro' => [
      "Cape Town SEO clients split between \"Silicon Cape\" tech startups needing product-focused content SEO and tourism/hospitality businesses needing high-intent, visually-driven local SEO.",
      "Pricing is quoted in ZAR, with most Cape Town SEO plans ranging from ZAR 5,000 to ZAR 60,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for tech startups or tourism businesses in Cape Town?", 'a' => "Both are common Cape Town client types, needing different content and keyword strategies."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-60,000/month, in ZAR."],
      ['q' => "How does the time zone work for reporting calls?", 'a' => "Cape Town is 3.5 hours ahead of IST, a comfortable overlap for scheduled monthly reviews."],
    ],
    'layout' => 'A',
  ],
  'seo-services-saint-petersburg' => [
    'intro_heading' => "SEO for Saint Petersburg's Trade, Tourism and Tech Search Terms",
    'intro' => [
      "Saint Petersburg SEO clients come from a mix of trade/logistics businesses, a large cultural-tourism sector, and a growing tech scene, each needing distinct keyword and content strategies.",
      "As with Moscow, pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable."],
      ['q' => "Do you handle SEO for tourism businesses in Saint Petersburg?", 'a' => "Yes -- visually-driven local SEO is a common request given the city's large cultural-tourism sector."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-3,000/month, with payment terms confirmed upfront."],
    ],
    'layout' => 'B',
  ],
  'seo-services-christchurch' => [
    'intro_heading' => "SEO for Christchurch's Agribusiness and Agritech Search Terms",
    'intro' => [
      "Christchurch SEO clients typically need visibility for agribusiness and agritech-related keywords, reflecting the city's role as the South Island's commercial agricultural gateway.",
      "Pricing is quoted in NZD, with most Christchurch SEO plans ranging from NZD 500 to NZD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for agribusiness or agritech companies?", 'a' => "Yes -- both traditional agribusiness keywords and newer agritech product-focused SEO are common Christchurch requests."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-4,000/month, quoted in NZD."],
      ['q' => "How long until we see ranking movement?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'A',
  ],
  'seo-services-durban' => [
    'intro_heading' => "SEO for Durban's Port Logistics and Manufacturing Search Terms",
    'intro' => [
      "Durban SEO clients typically need B2B keyword visibility for logistics and manufacturing businesses, given Durban's role as Africa's busiest port.",
      "Pricing is quoted in ZAR, with most Durban SEO plans ranging from ZAR 5,000 to ZAR 60,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for logistics or manufacturing businesses in Durban?", 'a' => "Yes -- capability and service-page keyword targeting suited to Durban's port-logistics and manufacturing base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-60,000/month, in ZAR."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'B',
  ],
  'seo-services-riyadh' => [
    'intro_heading' => "SEO for Riyadh's Vision 2030 E-Commerce and Corporate Search Growth",
    'intro' => [
      "Riyadh SEO clients increasingly include e-commerce businesses riding Vision 2030's digitization push, needing bilingual Arabic/English keyword strategies alongside more traditional corporate and government-adjacent content SEO.",
      "Pricing is quoted in SAR, with most Riyadh SEO plans ranging from SAR 1,500 to SAR 12,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle bilingual Arabic/English SEO for Riyadh businesses?", 'a' => "Yes -- bilingual keyword targeting is a common and often essential Riyadh requirement."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-12,000/month, in SAR."],
      ['q' => "Do you handle e-commerce SEO specifically?", 'a' => "Yes -- as Vision 2030 accelerates retail digitization, this is a growing Riyadh request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-johannesburg' => [
    'intro_heading' => "SEO for Johannesburg's Financial Services and Mining-HQ Search Terms",
    'intro' => [
      "Johannesburg SEO clients want credibility-driven content that matches the scale of the financial-services and mining-industry headquarters concentrated in the city -- competing for corporate-buyer search terms.",
      "Pricing is quoted in ZAR, with most Johannesburg SEO plans ranging from ZAR 5,000 to ZAR 60,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for financial-services or mining-adjacent corporates?", 'a' => "Yes -- credibility-driven content and corporate-buyer keyword targeting is a common Johannesburg request."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-60,000/month, in ZAR."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-geneva' => [
    'intro_heading' => "SEO for Geneva's International Organizations and Private Banking Search",
    'intro' => [
      "Geneva SEO clients often need bilingual French/English keyword targeting, alongside formal, understated content suited to the city's international-organization and private banking concentration.",
      "Pricing is quoted in CHF, with most Geneva SEO plans ranging from CHF 500 to CHF 5,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle bilingual French/English SEO for Geneva businesses?", 'a' => "Yes -- bilingual keyword targeting is a common and explicitly-scoped Geneva request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-5,000/month, in CHF."],
      ['q' => "Do you handle SEO for private banking or institutional clients?", 'a' => "Yes -- formal, understated content suited to Geneva's international-organization and banking concentration is a common request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-zurich' => [
    'intro_heading' => "SEO for Zurich's Precision-Focused Banking and Fintech Search",
    'intro' => [
      "Zurich SEO clients expect exacting content accuracy -- financial and fintech-adjacent keyword content needs to be factually precise, reflecting the same precision standard Zurich clients expect from every part of their business.",
      "Pricing is quoted in CHF, with most Zurich SEO plans ranging from CHF 500 to CHF 5,000/month.",
    ],
    'faqs' => [
      ['q' => "Does content need to be especially precise for Zurich financial clients?", 'a' => "Yes -- factual accuracy in financial/fintech-adjacent content matters more here than in most markets, reflecting Zurich's precision-focused business culture."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-5,000/month, in CHF."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'B',
  ],
  'seo-services-jeddah' => [
    'intro_heading' => "SEO for Jeddah's Historic Trading Port and Tourism Search Growth",
    'intro' => [
      "Jeddah SEO clients often need bilingual Arabic/English keyword targeting for trading-business visibility, alongside a growing tourism keyword opportunity as Red Sea tourism development accelerates.",
      "Pricing is quoted in SAR, with most Jeddah SEO plans ranging from SAR 1,500 to SAR 12,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle bilingual SEO for trading businesses in Jeddah?", 'a' => "Yes -- bilingual Arabic/English keyword targeting is a common and often essential request."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-12,000/month, in SAR."],
      ['q' => "Do you handle tourism-related SEO too?", 'a' => "Yes -- given Jeddah's growing Red Sea tourism sector, this is an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-sharjah' => [
    'intro_heading' => "SEO for Sharjah's Industrial and Education-Focused Search Terms",
    'intro' => [
      "Sharjah SEO clients typically need B2B industrial and manufacturing keyword visibility, reflecting the emirate's more industrial character compared to Dubai.",
      "Pricing is quoted in AED, with most Sharjah SEO plans ranging from AED 500 to AED 6,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for industrial businesses in Sharjah?", 'a' => "Yes -- capability and product-page keyword targeting suited to Sharjah's industrial base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 500-6,000/month, in AED."],
      ['q' => "Can you handle Arabic and English keyword targeting?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'B',
  ],
  'seo-services-munich' => [
    'intro_heading' => "SEO for Munich's Corporate HQ and Engineering Search Terms",
    'intro' => [
      "Munich SEO clients want thorough, technically accurate content reflecting the precision-focused culture of the corporate headquarters concentrated here, more than trend-chasing keyword volume.",
      "Pricing is quoted in EUR, with most Munich SEO plans ranging from EUR 400 to EUR 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for engineering or corporate-HQ-adjacent businesses in Munich?", 'a' => "Yes -- thorough, technically accurate content is the priority for Munich's engineering and corporate-headquarters-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-3,500/month, in EUR."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-abu-dhabi' => [
    'intro_heading' => "SEO for Abu Dhabi's Government and Cultural-Tourism Growth",
    'intro' => [
      "Abu Dhabi SEO clients are often government-adjacent institutions needing formal, credible content alongside a growing cultural-tourism keyword opportunity as the city invests in tourism infrastructure.",
      "Pricing is quoted in AED, with most Abu Dhabi SEO plans ranging from AED 500 to AED 6,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for government-adjacent institutions in Abu Dhabi?", 'a' => "Yes -- formal, credible content and keyword targeting is the common priority for Abu Dhabi's government-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 500-6,000/month, in AED."],
      ['q' => "Do you handle tourism-related SEO too?", 'a' => "Yes -- given Abu Dhabi's growing cultural-tourism investment, this is an increasingly common request."],
    ],
    'layout' => 'B',
  ],
  'seo-services-dammam' => [
    'intro_heading' => "SEO for Dammam's Oil, Energy and Petrochemical Search Terms",
    'intro' => [
      "Dammam SEO clients typically need B2B keyword visibility for energy and petrochemical-adjacent businesses, reflecting the Eastern Province's industrial character.",
      "Pricing is quoted in SAR, with most Dammam SEO plans ranging from SAR 1,500 to SAR 12,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for energy or petrochemical businesses in Dammam?", 'a' => "Yes -- capability-focused keyword targeting suited to Dammam's industrial base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-12,000/month, in SAR."],
      ['q' => "Can you handle Arabic and English SEO?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'A',
  ],
  'seo-services-zug' => [
    'intro_heading' => "SEO for Zug's \"Crypto Valley\" and International Corporate Search",
    'intro' => [
      "Zug SEO clients often need modern, product-focused content SEO for crypto/blockchain businesses, alongside more traditional corporate content for the international headquarters the canton attracts.",
      "Pricing is quoted in CHF, with most Zug SEO plans ranging from CHF 500 to CHF 5,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for crypto or blockchain companies in Zug?", 'a' => "Yes -- modern, product-focused content SEO is a common request given Zug's \"Crypto Valley\" identity."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-5,000/month, in CHF."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'B',
  ],
  'seo-services-hamburg' => [
    'intro_heading' => "SEO for Hamburg's Port Logistics and Media-Publishing Search Terms",
    'intro' => [
      "Hamburg SEO clients split between port/logistics businesses needing functional B2B keyword visibility and media/publishing-adjacent businesses needing more editorially-minded content SEO.",
      "Pricing is quoted in EUR, with most Hamburg SEO plans ranging from EUR 400 to EUR 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for logistics or media businesses in Hamburg?", 'a' => "Both are common Hamburg client types, needing quite different content strategies from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-3,500/month, in EUR."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'A',
  ],
  'seo-services-liverpool' => [
    'intro_heading' => "SEO for Liverpool's Logistics, Culture and Growing Digital Scene",
    'intro' => [
      "Liverpool SEO clients span port-logistics B2B businesses and a genuinely growing cultural-tourism and creative-digital scene -- two different keyword strategies from a city that's less crowded in search results than nearby Manchester.",
      "Pricing is quoted in GBP, with most Liverpool SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Is Liverpool's SEO market less competitive than Manchester's?", 'a' => "Generally yes, which can make ranking somewhat more achievable for well-executed local and B2B campaigns."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you handle SEO for tourism/culture businesses?", 'a' => "Yes -- given Liverpool's strong cultural-tourism sector, this is a common request alongside port-logistics B2B work."],
    ],
    'layout' => 'B',
  ],
  'seo-services-edinburgh' => [
    'intro_heading' => "SEO for Edinburgh's Financial Services and Festival-Tourism Search",
    'intro' => [
      "Edinburgh SEO clients split between financial-services firms wanting credibility-driven content and tourism/hospitality businesses needing sharp seasonal visibility around the Festival and Fringe, when search demand spikes dramatically.",
      "Pricing is quoted in GBP, with most Edinburgh SEO plans ranging from GBP 250 to GBP 2,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for financial-services firms in Edinburgh?", 'a' => "Yes -- credibility-driven content and keyword targeting for Edinburgh's financial-services base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-2,500/month, quoted in GBP."],
      ['q' => "Do you help tourism businesses prepare for Festival-season search spikes?", 'a' => "Yes -- seasonal keyword and content planning ahead of the Festival/Fringe surge is a common Edinburgh request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-ontario' => [
    'intro_heading' => "SEO for Ontario's Finance, Manufacturing and Tech Search Landscape",
    'intro' => [
      "Ontario SEO clients range from Toronto-area finance and tech keyword competition to manufacturing-heavy B2B search further into the province -- a province-wide strategy needs to account for that split rather than treating Ontario as one market.",
      "Pricing is quoted in CAD, with most Ontario SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Does SEO strategy differ across Ontario?", 'a' => "Yes -- Toronto-area finance/tech competition looks very different from manufacturing-heavy B2B search elsewhere in the province, and we scope accordingly."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'B',
  ],
  'seo-services-british-columbia' => [
    'intro_heading' => "SEO for British Columbia's Tech, Film and Natural-Resources Search",
    'intro' => [
      "British Columbia SEO clients often come from Vancouver's tech and film-production scene alongside more traditional natural-resources B2B businesses further inland -- genuinely different keyword sets requiring different content approaches.",
      "Pricing is quoted in CAD, with most BC SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for tech or film-production businesses in BC?", 'a' => "Yes -- modern, product-focused content SEO is a common request from Vancouver's tech and film-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you also handle B2B natural-resources SEO?", 'a' => "Yes -- capability-focused keyword targeting for resources-sector businesses further inland is also common."],
    ],
    'layout' => 'A',
  ],
  'seo-services-toronto' => [
    'intro_heading' => "SEO for Toronto's Crowded Finance and Tech Keyword Competition",
    'intro' => [
      "Toronto SEO clients compete against Canada's densest concentration of finance and tech businesses, most of which already have established SEO content -- a realistic, tightly-scoped keyword strategy matters more here than in most Canadian markets.",
      "Pricing is quoted in CAD, with most Toronto SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Is Toronto's SEO market more competitive than the rest of Canada?", 'a' => "Often yes -- the density of finance and tech businesses here makes many keywords especially contested, which shapes a tighter keyword strategy."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "How long until we see ranking movement?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-vancouver' => [
    'intro_heading' => "SEO for Vancouver's Tech and Film-Production Search Terms",
    'intro' => [
      "Vancouver SEO clients often come from the city's tech startup and film-production scene ('Hollywood North'), needing modern, product-focused content SEO built around fast-moving industries.",
      "Pricing is quoted in CAD, with most Vancouver SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for tech startups or film-production companies in Vancouver?", 'a' => "Yes -- modern, product-focused content SEO is a common request given Vancouver's tech and 'Hollywood North' film scene."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-montreal' => [
    'intro_heading' => "SEO for Montreal's Bilingual French/English Search Market",
    'intro' => [
      "Montreal SEO clients need genuinely bilingual French and English keyword targeting -- French search here behaves almost like a separate market, and a single English-only strategy misses a large share of local search demand.",
      "Pricing is quoted in CAD, with most Montreal SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle French-language SEO for Montreal businesses?", 'a' => "Yes -- bilingual keyword targeting is essential here, since French search behaves almost like a separate market from English search."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you handle SEO for the video-game/tech scene in Montreal too?", 'a' => "Yes -- product-focused content SEO for Montreal's notable gaming and tech sector is a common request."],
    ],
    'layout' => 'B',
  ],
  'seo-services-calgary' => [
    'intro_heading' => "SEO for Calgary's Energy-Sector B2B Search Terms",
    'intro' => [
      "Calgary SEO clients typically need B2B keyword visibility for energy and oil-and-gas-adjacent businesses -- long, technical search phrases with lower volume but genuinely higher buying intent than typical consumer keywords.",
      "Pricing is quoted in CAD, with most Calgary SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for energy-sector businesses in Calgary?", 'a' => "Yes -- technical, capability-focused keyword targeting is the priority given Calgary's energy-sector concentration."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'A',
  ],
  'seo-services-ottawa' => [
    'intro_heading' => "SEO for Ottawa's Government and Tech-Sector Search Terms",
    'intro' => [
      "Ottawa SEO clients are often government-adjacent contractors and a notable local tech sector, needing formal, credible content for procurement-related searches alongside more product-focused tech SEO.",
      "Pricing is quoted in CAD, with most Ottawa SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for government contractors in Ottawa?", 'a' => "Yes -- formal, credible content for procurement-related search terms is a common Ottawa request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you also handle tech-sector SEO?", 'a' => "Yes -- Ottawa has a notable local tech sector alongside its government-contracting base."],
    ],
    'layout' => 'B',
  ],
  'seo-services-edmonton' => [
    'intro_heading' => "SEO for Edmonton's Energy and Logistics Search Terms",
    'intro' => [
      "Edmonton SEO clients typically need B2B keyword visibility for energy and logistics businesses, similar in character to nearby Calgary but with a distinct local competitor set worth targeting separately.",
      "Pricing is quoted in CAD, with most Edmonton SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B SEO for energy or logistics businesses in Edmonton?", 'a' => "Yes -- capability-focused keyword targeting suited to Edmonton's energy and logistics base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-winnipeg' => [
    'intro_heading' => "SEO for Winnipeg's Manufacturing and Agribusiness Search Terms",
    'intro' => [
      "Winnipeg SEO clients typically need B2B keyword visibility for manufacturing and agribusiness-adjacent companies, in a local search market with genuinely lower competition than Canada's larger cities.",
      "Pricing is quoted in CAD, with most Winnipeg SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Is Winnipeg's SEO market less competitive than bigger Canadian cities?", 'a' => "Generally yes, which can make ranking somewhat more achievable for well-executed local B2B campaigns."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you handle SEO for manufacturing or agribusiness companies?", 'a' => "Yes -- capability-focused keyword targeting suited to Winnipeg's manufacturing and agribusiness base is a common request."],
    ],
    'layout' => 'B',
  ],
  'seo-services-quebec-city' => [
    'intro_heading' => "SEO for Quebec City's French-First Search Market",
    'intro' => [
      "Quebec City SEO clients need French-first keyword targeting, more so than Montreal's bilingual balance -- French search here is genuinely the primary language, not a secondary consideration.",
      "Pricing is quoted in CAD, with most Quebec City SEO plans ranging from CAD 400 to CAD 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Is French-language SEO more essential in Quebec City than Montreal?", 'a' => "Yes -- French search is genuinely the primary language here, more so than Montreal's bilingual balance, so keyword strategy is French-first."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-3,500/month, quoted in CAD."],
      ['q' => "Do you handle tourism-related SEO too?", 'a' => "Yes -- given Quebec City's strong heritage-tourism sector, this is a common request."],
    ],
    'layout' => 'A',
  ],
  'seo-services-sydney' => [
    'intro_heading' => "SEO for Sydney's Crowded Finance and Corporate Keyword Competition",
    'intro' => [
      "Sydney SEO clients compete against Australia's densest concentration of finance and corporate businesses -- a realistic, tightly-scoped keyword strategy matters more here than in most Australian markets.",
      "Pricing is quoted in AUD, with most Sydney SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Is Sydney's SEO market more competitive than other Australian cities?", 'a' => "Often yes -- the density of finance and corporate businesses makes many keywords especially contested here."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "How long until we see ranking movement?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-melbourne' => [
    'intro_heading' => "SEO for Melbourne's Retail, Creative and Startup Search Landscape",
    'intro' => [
      "Melbourne SEO clients range from retail and hospitality local-intent keywords to a growing creative-tech and startup scene needing more product-focused content SEO -- two different strategies from the same city.",
      "Pricing is quoted in AUD, with most Melbourne SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for retail/hospitality or startup businesses in Melbourne?", 'a' => "Both are common Melbourne client types, needing different content strategies -- local-intent keywords vs. product-focused startup SEO."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-brisbane' => [
    'intro_heading' => "SEO for Brisbane's Growing, Less-Crowded Search Opportunity",
    'intro' => [
      "Brisbane SEO clients benefit from a genuinely growing market with less keyword competition than Sydney or Melbourne, while still needing solid local SEO fundamentals to capture that growth.",
      "Pricing is quoted in AUD, with most Brisbane SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Is Brisbane's SEO market less competitive than Sydney or Melbourne?", 'a' => "Generally yes, which can make ranking somewhat more achievable for well-executed local campaigns in this growing market."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-adelaide' => [
    'intro_heading' => "SEO for Adelaide's Manufacturing and Wine-Industry Search Terms",
    'intro' => [
      "Adelaide SEO clients often need B2B keyword visibility for manufacturing and defense-adjacent businesses, alongside wine-region tourism and export businesses needing more consumer-facing local SEO.",
      "Pricing is quoted in AUD, with most Adelaide SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for manufacturing or wine-industry businesses in Adelaide?", 'a' => "Both are common Adelaide client types, needing different content strategies -- B2B capability content vs. consumer-facing tourism/export SEO."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'A',
  ],
  'seo-services-canberra' => [
    'intro_heading' => "SEO for Canberra's Government-Contractor Search Terms",
    'intro' => [
      "Canberra SEO clients are overwhelmingly government contractors and public-sector-adjacent businesses needing formal, credible content for procurement and capability-related search terms -- a genuinely niche keyword space.",
      "Pricing is quoted in AUD, with most Canberra SEO plans ranging from AUD 500 to AUD 4,000/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle SEO for government contractors in Canberra?", 'a' => "Yes -- formal, credible content for procurement and capability-related search terms is the primary focus for most Canberra clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-4,000/month, quoted in AUD."],
      ['q' => "How long until we see results?", 'a' => "Technical fixes can show movement in 4-8 weeks; competitive keywords typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'seo-services-berlin' => [
    'intro_heading' => "SEO for Berlin's Startup and Creative-Tech Search Landscape",
    'intro' => [
      "Berlin SEO clients typically come from the city's large startup scene, needing modern, product-focused content SEO more comfortable with newer content formats than the rest of Germany's more traditional business culture.",
      "Pricing is quoted in EUR, with most Berlin SEO plans ranging from EUR 400 to EUR 3,500/month.",
    ],
    'faqs' => [
      ['q' => "Do you handle startup-style SEO for Berlin tech companies?", 'a' => "Yes -- modern, product-focused content suited to Berlin's startup scene is a common request, distinct from the more traditional Mittelstand approach elsewhere in Germany."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-3,500/month, in EUR."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear ranking and traffic reports every month."],
    ],
    'layout' => 'B',
  ],
];