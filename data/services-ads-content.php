<?php
// Unique per-page content layer for service-ads.php (added 2026-07-27 to fix
// GSC flagging ads-management-* pages as duplicate/thin doorway content -- see
// memory nikhilworks-doorway-content-fix). Reuses the real local-industry
// facts already established for web-developer-*/crm-development-*/seo-services-*
// pages, angled toward PAID ADS reasoning specific to each market: CPC/ad-cost
// pressure, Google Search vs. Meta platform fit for that market's dominant
// industries, and reporting-cadence practicality given the timezone.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
return [
  // ===== Country pages =====
  'ads-management-usa' => [
    'intro_heading' => "Google & Meta Ads Management Built Around US Cost-Per-Lead Reality",
    'intro' => [
      "US Google Ads auctions are among the most expensive in the world in categories like legal, insurance and home services, where a single search click can cost more than an entire day's ad budget elsewhere. Meta often works out cheaper per lead for consideration-stage purchases, which is why most US accounts run both platforms rather than betting everything on Search.",
      "Reporting is built around US business hours, with performance dashboards and cost-per-lead numbers reviewed asynchronously so a 9.5-13.5 hour gap from India never holds up a decision. Management fees run USD 200-2,500/month on top of ad spend.",
    ],
    'faqs' => [
      ['q' => "US Google Ads costs feel very high in some industries -- is that normal?", 'a' => "Yes -- legal, insurance and home-services keywords are consistently among the most expensive clicks in Google's ad auction anywhere in the world. It's why we usually recommend testing Meta Ads alongside Search rather than putting the entire budget into Search clicks alone."],
      ['q' => "How do you handle reporting given the time difference?", 'a' => "US time zones run 9.5-13.5 hours behind IST, so we build asynchronous dashboards and send performance summaries you can review on your own schedule, with calls booked around whichever overlap window works for you."],
      ['q' => "What does management typically cost?", 'a' => "USD 200-2,500/month on top of ad spend, based on how many campaigns and platforms you're running."],
    ],
    'layout' => 'A',
  ],
  'ads-management-uk' => [
    'intro_heading' => "Google & Meta Ads Management for UK Businesses Watching Every Pound of Spend",
    'intro' => [
      "UK click costs on Google Ads sit lower than the US on average but still climb fast in finance, legal and home-services categories, especially anything London-adjacent. Meta Ads tends to deliver a lower cost per lead for consumer and consideration-stage businesses outside the capital, where competition in the auction is lighter.",
      "GBP-denominated management keeps budgeting simple, and reporting is scheduled around the roughly 4.5-5.5 hour gap from IST, which usually lands in a comfortable UK-afternoon window. Fees run GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Google Ads more expensive in London than the rest of the UK?", 'a' => "Generally yes -- London-adjacent finance and professional-services keywords carry some of the highest costs per click in the UK market, which is part of why we often test Meta Ads alongside Search outside the capital."],
      ['q' => "How does the time difference affect reporting calls?", 'a' => "The UK runs 4.5-5.5 hours behind IST depending on the season, which usually lands calls comfortably in the UK afternoon."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, scoped to your goals during the strategy call."],
    ],
    'layout' => 'B',
  ],
  'ads-management-india' => [
    'intro_heading' => "Google & Meta Ads Management for Indian Startups and SMEs, Managed in the Same Time Zone",
    'intro' => [
      "Most Indian businesses asking for ads management are budget-conscious first-time advertisers -- they need a campaign that generates leads without burning through spend on clicks that were never going to convert. Google Ads tends to work best for local service 'near me' searches, while Meta Ads is where most D2C and e-commerce brands here actually find their cost-per-lead sweet spot.",
      "Because the team is based in India, there's no time-zone gap to manage around -- reporting calls happen in real time, same working day. Management fees run INR 10,000-1,00,000/month on top of ad spend.",
    ],
    'faqs' => [
      ['q' => "We've never run paid ads before -- where should we start?", 'a' => "Most first-time Indian advertisers get better early results from a smaller, tightly-targeted Google Ads local campaign before scaling into Meta, so budget isn't spent learning lessons on a wide audience."],
      ['q' => "Does being in the same time zone actually help?", 'a' => "Yes -- there's no reporting lag or overnight wait for answers; questions about spend or performance get resolved the same working day."],
      ['q' => "What's the typical cost?", 'a' => "INR 10,000-1,00,000/month on top of ad spend, depending on how many campaigns and platforms are running."],
    ],
    'layout' => 'A',
  ],
  'ads-management-uae' => [
    'intro_heading' => "Google & Meta Ads Management for UAE's Real Estate and Trading Businesses",
    'intro' => [
      "UAE ad accounts are dominated by real estate and trading businesses, and both have specific needs Google/Meta defaults don't handle well out of the box: real estate leads need a longer nurture sequence than a typical lead form, and trading companies often need bilingual Arabic/English ad copy running on both platforms simultaneously to cover the full local audience.",
      "AED-denominated management with reporting scheduled around the 1.5-hour gap from IST -- close enough that live calls are easy to arrange. Fees run AED 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run bilingual Arabic/English ad campaigns?", 'a' => "Yes -- trading and real estate businesses here often need both languages running simultaneously across Google and Meta to reach the full addressable audience."],
      ['q' => "Is Meta or Google better for real estate leads?", 'a' => "Meta's video and carousel formats generally perform well for property browsing and awareness, while Google Search captures the buyers actively searching -- most real estate accounts run both."],
      ['q' => "What's the typical cost?", 'a' => "AED 1,000-10,000/month plus ad spend, with the UAE's 1.5-hour gap from IST making live reporting calls easy to schedule."],
    ],
    'layout' => 'B',
  ],
  'ads-management-canada' => [
    'intro_heading' => "Google & Meta Ads Management for Canada's Regionally Split Ad Auctions",
    'intro' => [
      "Canadian ad costs vary a lot by region -- Toronto's finance and tech keywords are priced closer to US-level competition, while Prairie and Atlantic markets see noticeably lower CPCs on both Google and Meta. A single national campaign structure usually wastes budget by treating these as one market.",
      "CAD-denominated management, with reporting timed around the roughly 9.5-13.5 hour gap from IST depending on the province. Fees run CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Does ad cost really vary that much within Canada?", 'a' => "Yes -- Toronto-area finance and tech keywords cost noticeably more per click than the same searches in Prairie or Atlantic markets, so campaigns are usually split by region rather than run as one national account."],
      ['q' => "How does the time difference affect reporting?", 'a' => "Canadian time zones sit 9.5-13.5 hours behind IST depending on the province, so we lean on asynchronous dashboards with calls booked around whatever overlap works."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, scoped to your target region during the strategy call."],
    ],
    'layout' => 'A',
  ],
  'ads-management-australia' => [
    'intro_heading' => "Google & Meta Ads Management for Australia's Sydney-Melbourne-Heavy Ad Market",
    'intro' => [
      "Sydney and Melbourne carry the highest CPCs in the Australian market on both Google and Meta, largely because that's where the national finance, corporate and retail competition concentrates. Businesses in Brisbane, Perth or Adelaide often get a meaningfully lower cost per lead running the same campaign structure, simply because there's less competing spend in the local auction.",
      "AUD-denominated management, with reporting scheduled around the 4.5-5.5 hour gap from IST, which usually lands comfortably in the Australian afternoon. Fees run AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Are ads more expensive in Sydney and Melbourne than elsewhere in Australia?", 'a' => "Generally yes -- national finance, corporate and retail competition concentrates there, which pushes CPCs up compared to Brisbane, Perth or Adelaide."],
      ['q' => "How does the time zone affect reporting calls?", 'a' => "Australia runs 4.5-5.5 hours ahead of IST depending on the state and season, which usually lands comfortably in the Australian afternoon for scheduled calls."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, based on how many campaigns and cities are targeted."],
    ],
    'layout' => 'B',
  ],

  // ===== USA cities =====
  'ads-management-california' => [
    'intro_heading' => "Google & Meta Ads Management for California's Crowded SaaS and Tech Auction",
    'intro' => [
      "California ad accounts compete in some of the most expensive Google Ads auctions in the country, particularly SaaS and tech-adjacent keywords where every competitor already runs a well-optimized campaign. Meta often becomes the more cost-effective channel here for top-of-funnel awareness, reaching a qualified audience before they're searching and bidding against that same crowded auction.",
      "Pricing is quoted in USD, with most California ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Why does Google Ads feel so expensive for California tech/SaaS keywords?", 'a' => "The auction is genuinely crowded -- most competitors already run well-optimized campaigns for the same terms, which pushes cost per click up. Meta often becomes the more efficient channel for reaching the same audience earlier in their decision process."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you handle landing page alignment too?", 'a' => "Yes -- we review or build landing pages matched to the ad's message so the click isn't wasted."],
    ],
    'layout' => 'A',
  ],
  'ads-management-new-york' => [
    'intro_heading' => "Google & Meta Ads Management for New York's Finance and Professional-Services Auction",
    'intro' => [
      "New York's finance and professional-services keywords are priced among the highest in the country on Google Ads, driven by large established firms bidding aggressively on the same broad terms. A tighter, more specific keyword and audience strategy usually delivers a better cost per lead than trying to outbid firms with much bigger budgets.",
      "Pricing is quoted in USD, with most New York ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Google Ads too expensive to compete with big New York finance firms?", 'a' => "Outbidding them on broad terms usually isn't worth it -- we target more specific, lower-competition keyword and audience combinations that still reach real buyers at a workable cost."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "How soon do we see leads?", 'a' => "Unlike SEO, paid campaigns can generate leads within days of launch, with the first few weeks spent optimizing based on real performance data."],
    ],
    'layout' => 'B',
  ],
  'ads-management-washington' => [
    'intro_heading' => "Google & Meta Ads Management for Washington State's Tech-Savvy Ad Audience",
    'intro' => [
      "Washington's tech-heavy audience is quick to bounce off a slow or poorly-matched landing page, which shows up directly in Google's Quality Score and pushes cost per click higher for anyone whose site experience doesn't keep up. Meta performs well here for reaching a tech-literate audience with sharper creative before they've started actively searching.",
      "Pricing is quoted in USD, with most Washington ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Does Washington's tech-savvy audience change how ads should be set up?", 'a' => "Yes -- a slow or mismatched landing page affects Google's Quality Score and raises cost per click here more than in less tech-influenced markets, so page speed and message match matter early."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you build the landing pages the ads point to?", 'a' => "Yes -- we can build dedicated landing pages matched to the campaign or review your existing ones for conversion issues."],
    ],
    'layout' => 'A',
  ],
  'ads-management-texas' => [
    'intro_heading' => "Google & Meta Ads Management for Texas's Energy, Logistics and New-Business Influx",
    'intro' => [
      "Texas ad accounts split between established energy and logistics B2B keywords around Houston/Dallas, where Google Search captures high-intent buyer searches, and a wave of newer businesses relocating from higher-tax states that often need Meta Ads to build local brand awareness from a standing start.",
      "Pricing is quoted in USD, with most Texas ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for businesses that recently relocated to Texas?", 'a' => "Yes -- Meta Ads is often the faster way to build local awareness from scratch, while Google Search picks up people already searching for what you offer."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you run B2B campaigns for energy or logistics companies?", 'a' => "Yes -- longer-tail, higher-intent Google Search keywords are the usual focus for Houston/Dallas-area B2B accounts."],
    ],
    'layout' => 'B',
  ],
  'ads-management-virginia' => [
    'intro_heading' => "Google & Meta Ads Management for Northern Virginia's Government-Contracting Search Terms",
    'intro' => [
      "Northern Virginia ad accounts are often government contractors targeting very specific procurement and capability-related search terms -- low search volume, but Google's auction for these niche B2B keywords is still genuinely competitive since the buyer pool is small and high-value.",
      "Meta plays a smaller role here since government buyers search rather than browse socially. Pricing is quoted in USD, with most Virginia ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Meta Ads useful for government-contracting audiences?", 'a' => "Less so than Google Search -- procurement-related searches are high-intent and specific, so budget usually concentrates on Search rather than social awareness campaigns."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you also handle landing page alignment for these niche terms?", 'a' => "Yes -- message match matters even more with low-volume, high-value B2B keywords, since every click needs to count."],
    ],
    'layout' => 'A',
  ],
  'ads-management-delaware' => [
    'intro_heading' => "Google & Meta Ads Management for Delaware's Smaller, Less Crowded Ad Auction",
    'intro' => [
      "Delaware's financial and corporate-services ad accounts benefit from a genuinely smaller local auction than bigger states -- less competing spend usually means a lower cost per click, though the tradeoff is a smaller addressable search audience to begin with.",
      "Pricing is quoted in USD, with most Delaware ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Delaware's ad auction less competitive than bigger states?", 'a' => "Generally yes, which usually means a lower cost per click, though the smaller search volume means campaigns need broader targeting to hit meaningful lead numbers."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you work with financial-services firms specifically?", 'a' => "Yes -- credibility-focused ad copy and landing pages suited to Delaware's financial-services concentration is a common request."],
    ],
    'layout' => 'B',
  ],
  'ads-management-los-angeles' => [
    'intro_heading' => "Google & Meta Ads Management for LA's Entertainment and Local Retail Auction",
    'intro' => [
      "LA ad accounts split between entertainment-adjacent businesses, where Meta's visual formats consistently outperform Search for brand-driven campaigns, and local retail/services businesses that get better results from Google Search capturing people actively looking to buy nearby.",
      "Pricing is quoted in USD, with most LA ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Meta or Google better for entertainment-adjacent LA brands?", 'a' => "Meta usually wins here -- visual, brand-driven creative performs well with an audience that isn't necessarily searching yet."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you run local Google Search campaigns for retail/services too?", 'a' => "Yes -- capturing local near-me intent on Search is the priority for LA's retail and services clients."],
    ],
    'layout' => 'A',
  ],
  'ads-management-chicago' => [
    'intro_heading' => "Google & Meta Ads Management for Chicago's B2B Manufacturing and Logistics Keywords",
    'intro' => [
      "Chicago ad accounts often target lower-volume, higher-intent B2B industrial and logistics keywords on Google Search, where cost per click is manageable but every click carries genuine buying intent -- a different optimization target than most consumer ad accounts.",
      "Pricing is quoted in USD, with most Chicago ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle low-volume, high-intent B2B keywords?", 'a' => "Yes -- this is the common focus for Chicago's manufacturing and logistics clients, where buying intent matters more than raw search volume."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days of launch, with the first few weeks spent optimizing based on real data."],
    ],
    'layout' => 'B',
  ],
  'ads-management-houston' => [
    'intro_heading' => "Google & Meta Ads Management for Houston's Energy and Medical Center Search Terms",
    'intro' => [
      "Houston ad accounts split between energy-services B2B keywords, best captured on Google Search, and healthcare-adjacent local searches around the Texas Medical Center, where 'near me' intent is strong and Meta helps build awareness for newer practices trying to compete with established names.",
      "Pricing is quoted in USD, with most Houston ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for energy-services or healthcare-adjacent businesses?", 'a' => "Both are common Houston client types needing quite different platform mixes -- energy B2B leans Google Search, healthcare local leans a mix of both."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you target the Medical Center area specifically?", 'a' => "Yes -- local geo-targeting for healthcare-adjacent practices near the Texas Medical Center is a common setup."],
    ],
    'layout' => 'A',
  ],
  'ads-management-dallas' => [
    'intro_heading' => "Google & Meta Ads Management for Dallas's Corporate B2B Search Terms",
    'intro' => [
      "Dallas ad accounts are typically B2B businesses in finance, telecom or logistics targeting corporate-buyer search terms on Google -- credibility-driven landing pages matter more than volume here, since the buyer pool is smaller and more deliberate.",
      "Pricing is quoted in USD, with most Dallas ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for corporate buyers in Dallas?", 'a' => "Yes -- credibility-driven landing pages and targeting for a corporate-buyer audience is a common Dallas request."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you report on cost per lead, not just clicks?", 'a' => "Yes -- monthly reports cover spend, cost per lead and ROI in plain language."],
    ],
    'layout' => 'B',
  ],
  'ads-management-phoenix' => [
    'intro_heading' => "Google & Meta Ads Management for Phoenix's Fast-Growing Real Estate and Home-Services Market",
    'intro' => [
      "Phoenix ad accounts are often real estate and home-services businesses competing in a fast-growing market where new competitors enter the local auction regularly -- Meta's visual formats work well for real estate browsing, while Google Search captures the higher-intent 'need it now' home-services searches.",
      "Pricing is quoted in USD, with most Phoenix ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for real estate or home services in Phoenix?", 'a' => "Yes -- Meta for property browsing and awareness, Google Search for urgent home-services intent, often run together."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "How often do you adjust bids given how fast Phoenix grows?", 'a' => "Campaigns are reviewed and optimized continuously, which catches new competitors entering the auction as the market grows."],
    ],
    'layout' => 'A',
  ],
  'ads-management-san-diego' => [
    'intro_heading' => "Google & Meta Ads Management for San Diego's Biotech and Life-Sciences Search Terms",
    'intro' => [
      "San Diego ad accounts often target technical, biotech-adjacent search terms on Google with a scientifically literate audience -- ad copy needs to be accurate and credible, not just optimized for clicks, since this audience notices imprecise claims quickly.",
      "Pricing is quoted in USD, with most San Diego ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for biotech or life-sciences businesses?", 'a' => "Yes -- accurate, credible ad copy for a scientifically literate audience is the priority for San Diego's biotech-adjacent clients."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you also run local ads for tourism/defense-adjacent businesses?", 'a' => "Yes -- San Diego's tourism and defense-adjacent sectors are also common ad clients, usually on a more standard local-intent setup."],
    ],
    'layout' => 'B',
  ],
  'ads-management-philadelphia' => [
    'intro_heading' => "Google & Meta Ads Management for Philadelphia's Healthcare and Education Search Auction",
    'intro' => [
      "Philadelphia ad accounts compete in a genuinely crowded local Google Search auction for healthcare and education-adjacent keywords, given the city's unusually high density of hospitals and universities -- cost per click for local medical terms here runs higher than in most comparable markets.",
      "Pricing is quoted in USD, with most Philadelphia ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Google Ads expensive for healthcare keywords in Philadelphia?", 'a' => "Often yes -- the city's dense hospital and university presence makes local medical search terms genuinely competitive, which we account for in budget planning."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "How soon will we see leads in a competitive market like this?", 'a' => "Paid campaigns can generate leads within days, though the first few weeks are typically spent optimizing bids given the local competition."],
    ],
    'layout' => 'A',
  ],
  'ads-management-miami' => [
    'intro_heading' => "Google & Meta Ads Management for Miami's Bilingual, Latin America-Facing Ad Market",
    'intro' => [
      "Miami ad accounts often need both English and Spanish campaigns running on Google and Meta, given the city's role as a Latin America trade gateway -- a Spanish-language campaign here isn't an afterthought, it's often where a large share of the addressable, converting audience actually is.",
      "Pricing is quoted in USD, with most Miami ads management running USD 200-2,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run Spanish-language ad campaigns for Miami businesses?", 'a' => "Yes -- bilingual campaigns across Google and Meta are common and often essential here, given how much of the addressable audience searches in Spanish."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD."],
      ['q' => "Do you run ads for real estate businesses too?", 'a' => "Yes -- given Miami's fast-moving property market, Meta's visual formats work particularly well for listings."],
    ],
    'layout' => 'B',
  ],
  'ads-management-manhattan' => [
    'intro_heading' => "Google & Meta Ads Management for Manhattan's Ultra-Competitive Ad Auction",
    'intro' => [
      "Manhattan ad accounts compete in some of the most expensive Google Ads auctions in the country, given the density of corporate headquarters and professional-services firms bidding on the same terms -- a tightly-scoped keyword list and realistic budget matter more here than almost anywhere else.",
      "Pricing is quoted in USD, with most Manhattan ads management running USD 200-2,500/month plus ad spend, similar to the broader New York market.",
    ],
    'faqs' => [
      ['q' => "Is Manhattan's ad auction more expensive than the rest of New York?", 'a' => "Often yes -- the density of corporate and professional-services bidders pushes cost per click up on many terms, which shapes a tighter, more realistic keyword strategy."],
      ['q' => "What's the typical cost?", 'a' => "USD 200-2,500/month plus ad spend, quoted in USD, similar to the broader New York market."],
      ['q' => "Can you guarantee a certain cost per lead given how competitive this is?", 'a' => "No legitimate agency can guarantee a fixed cost per lead in a market this competitive -- we commit to continuous optimization and transparent monthly reporting instead."],
    ],
    'layout' => 'A',
  ],

  // ===== UK cities =====
  'ads-management-england' => [
    'intro_heading' => "Google & Meta Ads Management Across England, Beyond London's Ad Costs",
    'intro' => [
      "This page covers England broadly -- London carries its own dedicated page given its distinct, higher-cost auction, so this one is for businesses elsewhere in England where Google and Meta CPCs typically run lower and campaigns can be scoped to the local market instead.",
      "Pricing is quoted in GBP, with most England-wide ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for England and London?", 'a' => "London's ad auction is priced differently given the concentration of fintech and professional-services bidders there; this page covers the rest of England, where costs and competition look different."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Should we run Google, Meta, or both?", 'a' => "It depends on how your customers buy -- we'll recommend a mix based on your business during the strategy call."],
    ],
    'layout' => 'B',
  ],
  'ads-management-london' => [
    'intro_heading' => "Google & Meta Ads Management for London's Fintech-Priced Ad Auction",
    'intro' => [
      "London's Google Ads auction is shaped by fintech and professional-services firms with genuinely large budgets bidding on the same broad terms, which pushes cost per click up across the board -- winning here usually means a sharper, more specific keyword and audience strategy rather than trying to outspend them.",
      "Pricing is quoted in GBP, with most London ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "How do smaller London businesses compete against big fintech ad budgets?", 'a' => "By targeting sharper, more specific keywords and audiences rather than trying to outbid larger competitors on the broadest terms."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Is Meta cheaper than Google here?", 'a' => "Often yes for consideration-stage audiences, though high-intent searches still convert best on Google Search -- most accounts run both."],
    ],
    'layout' => 'A',
  ],
  'ads-management-manchester' => [
    'intro_heading' => "Google & Meta Ads Management for Manchester's E-Commerce and Media Ad Market",
    'intro' => [
      "Manchester ad accounts often come from the city's growing e-commerce and media scene, where Meta's catalog and dynamic product ads consistently perform well alongside Google Shopping campaigns for the same audience -- running both together tends to outperform either alone.",
      "Pricing is quoted in GBP, with most Manchester ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run Meta catalog ads for Manchester e-commerce stores?", 'a' => "Yes -- dynamic product ads on Meta alongside Google Shopping is the common setup for Manchester's growing online retail scene."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- spend, cost per lead and ROI reported monthly in plain language."],
    ],
    'layout' => 'B',
  ],
  'ads-management-bristol' => [
    'intro_heading' => "Google & Meta Ads Management for Bristol's Engineering and Creative-Industry Ad Split",
    'intro' => [
      "Bristol ad accounts split between engineering/aerospace-adjacent B2B campaigns on Google Search, where buyer intent is specific and technical, and creative-studio Meta campaigns built around portfolio visibility -- two genuinely different strategies from the same city.",
      "Pricing is quoted in GBP, with most Bristol ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for engineering suppliers or creative studios?", 'a' => "Both are common Bristol client types needing different platform strategies -- B2B Search intent vs. Meta portfolio-driven visibility."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you build the landing pages ads point to?", 'a' => "Yes -- we can build or review landing pages matched to the campaign's message."],
    ],
    'layout' => 'A',
  ],
  'ads-management-leeds' => [
    'intro_heading' => "Google & Meta Ads Management for Leeds's Financial and Legal Services Ad Terms",
    'intro' => [
      "Leeds ad accounts are often financial and legal-services firms targeting credibility-driven Google Search terms, similar in spirit to London firms but bidding in a distinct, somewhat less saturated regional auction.",
      "Pricing is quoted in GBP, with most Leeds ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for financial or legal-services firms in Leeds?", 'a' => "Yes -- credibility-driven Search campaigns suited to Leeds's financial and legal-services concentration is a common request."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'B',
  ],
  'ads-management-birmingham' => [
    'intro_heading' => "Google & Meta Ads Management for Birmingham's Diverse Manufacturing and Retail Ad Base",
    'intro' => [
      "Birmingham ad accounts range from manufacturing/automotive-adjacent B2B Google Search campaigns to consumer-facing retail and services Meta campaigns, reflecting the city's genuinely diverse economy -- a single platform rarely covers the full client base here.",
      "Pricing is quoted in GBP, with most Birmingham ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for Birmingham manufacturing suppliers?", 'a' => "Yes -- capability-focused Google Search campaigns are a common request from Birmingham's manufacturing sector."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you also handle local retail ads?", 'a' => "Yes -- consumer-facing local Meta and Search campaigns are just as common given Birmingham's diverse SME base."],
    ],
    'layout' => 'A',
  ],
  'ads-management-glasgow' => [
    'intro_heading' => "Google & Meta Ads Management for Glasgow's Growing Fintech Ad Scene",
    'intro' => [
      "Glasgow ad accounts increasingly come from the city's growing fintech scene, where Meta's product-focused creative reaches a modern audience effectively, alongside traditional Scottish financial-services firms running credibility-driven Google Search campaigns.",
      "Pricing is quoted in GBP, with most Glasgow ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for fintech startups in Glasgow?", 'a' => "Yes -- product-focused Meta creative is a growing request from Glasgow's fintech scene."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-liverpool' => [
    'intro_heading' => "Google & Meta Ads Management for Liverpool's Less-Crowded Ad Auction",
    'intro' => [
      "Liverpool ad accounts span port-logistics B2B campaigns and a genuinely growing cultural-tourism and creative-digital scene -- and the local Google/Meta auction here tends to be noticeably less crowded than nearby Manchester, which usually means a lower cost per lead for the same targeting.",
      "Pricing is quoted in GBP, with most Liverpool ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Liverpool's ad auction less competitive than Manchester's?", 'a' => "Generally yes, which can translate into a lower cost per lead for well-targeted local and B2B campaigns."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you run ads for tourism/culture businesses?", 'a' => "Yes -- Meta's visual formats work well for Liverpool's cultural-tourism sector, alongside Search-driven port-logistics B2B campaigns."],
    ],
    'layout' => 'A',
  ],
  'ads-management-edinburgh' => [
    'intro_heading' => "Google & Meta Ads Management for Edinburgh's Financial Services and Festival-Season Spikes",
    'intro' => [
      "Edinburgh ad accounts split between financial-services firms running credibility-driven Google Search campaigns and tourism/hospitality businesses needing sharp seasonal Meta campaigns around the Festival and Fringe, when both search demand and ad competition spike dramatically.",
      "Pricing is quoted in GBP, with most Edinburgh ads management running GBP 150-2,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for financial-services firms in Edinburgh?", 'a' => "Yes -- credibility-driven Search campaigns for Edinburgh's financial-services base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "GBP 150-2,000/month plus ad spend, quoted in GBP."],
      ['q' => "Do you help tourism businesses plan for Festival-season ad spikes?", 'a' => "Yes -- seasonal budget and creative planning ahead of the Festival/Fringe surge, when competition for the same audience gets noticeably pricier, is a common Edinburgh request."],
    ],
    'layout' => 'B',
  ],

  // ===== Canada cities =====
  'ads-management-ontario' => [
    'intro_heading' => "Google & Meta Ads Management for Ontario's Split Toronto-vs-Province Ad Auction",
    'intro' => [
      "Ontario ad accounts range from Toronto-area finance and tech keyword competition, priced close to top-tier North American CPCs, to noticeably cheaper manufacturing-heavy B2B search further into the province -- a province-wide budget needs to account for that split rather than spreading evenly.",
      "Pricing is quoted in CAD, with most Ontario ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Does ad cost really differ across Ontario?", 'a' => "Yes -- Toronto-area finance/tech keywords cost noticeably more than the same searches further into the province, so budget is usually weighted by region rather than spread evenly."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'A',
  ],
  'ads-management-british-columbia' => [
    'intro_heading' => "Google & Meta Ads Management for British Columbia's Tech, Film and Resources Ad Split",
    'intro' => [
      "British Columbia ad accounts often come from Vancouver's tech and film-production scene ('Hollywood North'), where Meta's visual creative performs strongly, alongside more traditional natural-resources B2B businesses further inland running Google Search campaigns for technical buyer terms.",
      "Pricing is quoted in CAD, with most BC ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for tech or film-production businesses in BC?", 'a' => "Yes -- Meta's visual, product-focused creative is a common request from Vancouver's tech and film-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you also handle B2B natural-resources campaigns?", 'a' => "Yes -- Google Search campaigns for resources-sector businesses further inland are also common."],
    ],
    'layout' => 'B',
  ],
  'ads-management-toronto' => [
    'intro_heading' => "Google & Meta Ads Management for Toronto's Crowded Finance and Tech Auction",
    'intro' => [
      "Toronto ad accounts compete against Canada's densest concentration of finance and tech advertisers, most of which already run well-optimized campaigns -- a realistic, tightly-scoped keyword and audience strategy matters more here than in most Canadian markets.",
      "Pricing is quoted in CAD, with most Toronto ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Toronto's ad auction more expensive than the rest of Canada?", 'a' => "Often yes -- the density of finance and tech advertisers here pushes cost per click up on many terms, which shapes a tighter strategy."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing given the local competition."],
    ],
    'layout' => 'A',
  ],
  'ads-management-vancouver' => [
    'intro_heading' => "Google & Meta Ads Management for Vancouver's Tech and Film-Production Audience",
    'intro' => [
      "Vancouver ad accounts often come from the city's tech startup and film-production scene ('Hollywood North'), where Meta's visual and video ad formats consistently outperform Search for reaching a fast-moving, brand-conscious audience before they start searching.",
      "Pricing is quoted in CAD, with most Vancouver ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for tech startups or film-production companies in Vancouver?", 'a' => "Yes -- Meta's visual, product-focused creative is a common request given Vancouver's tech and 'Hollywood North' film scene."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-montreal' => [
    'intro_heading' => "Google & Meta Ads Management for Montreal's Bilingual French/English Ad Market",
    'intro' => [
      "Montreal ad accounts need genuinely bilingual French and English campaigns on both Google and Meta -- French-language search and social behave almost like a separate market here, and an English-only campaign misses a large share of the addressable, converting audience.",
      "Pricing is quoted in CAD, with most Montreal ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run French-language ad campaigns for Montreal businesses?", 'a' => "Yes -- bilingual campaigns across Google and Meta are essential here, since French search and social behave almost like a separate market from English."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you handle ads for the video-game/tech scene in Montreal too?", 'a' => "Yes -- product-focused Meta creative for Montreal's notable gaming and tech sector is a common request."],
    ],
    'layout' => 'A',
  ],
  'ads-management-calgary' => [
    'intro_heading' => "Google & Meta Ads Management for Calgary's Energy-Sector B2B Search Terms",
    'intro' => [
      "Calgary ad accounts typically target lower-volume, higher-intent B2B keywords on Google Search for energy and oil-and-gas-adjacent businesses -- Meta plays a smaller supporting role here since the buyer pool searches specifically rather than browsing socially.",
      "Pricing is quoted in CAD, with most Calgary ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for energy-sector businesses in Calgary?", 'a' => "Yes -- technical, capability-focused Google Search campaigns are the priority given Calgary's energy-sector concentration."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real data."],
    ],
    'layout' => 'B',
  ],
  'ads-management-ottawa' => [
    'intro_heading' => "Google & Meta Ads Management for Ottawa's Government and Tech-Sector Ad Split",
    'intro' => [
      "Ottawa ad accounts are often government-adjacent contractors running Google Search campaigns for procurement-related terms, alongside a notable local tech sector that gets more value from Meta's product-focused creative.",
      "Pricing is quoted in CAD, with most Ottawa ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for government contractors in Ottawa?", 'a' => "Yes -- Google Search campaigns for procurement-related terms is a common Ottawa request."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you also handle ads for the tech sector?", 'a' => "Yes -- Ottawa has a notable local tech sector alongside its government-contracting base, and Meta often performs well there."],
    ],
    'layout' => 'A',
  ],
  'ads-management-edmonton' => [
    'intro_heading' => "Google & Meta Ads Management for Edmonton's Energy and Logistics Ad Terms",
    'intro' => [
      "Edmonton ad accounts typically target B2B keyword campaigns for energy and logistics businesses on Google Search, similar in character to nearby Calgary but bidding in a distinct, somewhat less crowded local auction.",
      "Pricing is quoted in CAD, with most Edmonton ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for energy or logistics businesses in Edmonton?", 'a' => "Yes -- capability-focused Google Search campaigns suited to Edmonton's energy and logistics base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-winnipeg' => [
    'intro_heading' => "Google & Meta Ads Management for Winnipeg's Lower-Cost Ad Auction",
    'intro' => [
      "Winnipeg ad accounts typically target B2B keyword campaigns for manufacturing and agribusiness-adjacent companies, in a local auction with genuinely lower competition -- and lower cost per click -- than Canada's larger cities.",
      "Pricing is quoted in CAD, with most Winnipeg ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Winnipeg's ad auction cheaper than bigger Canadian cities?", 'a' => "Generally yes, which can translate into a lower cost per lead for well-targeted local B2B campaigns."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you handle ads for manufacturing or agribusiness companies?", 'a' => "Yes -- capability-focused Google Search campaigns suited to Winnipeg's manufacturing and agribusiness base is a common request."],
    ],
    'layout' => 'A',
  ],
  'ads-management-quebec-city' => [
    'intro_heading' => "Google & Meta Ads Management for Quebec City's French-First Ad Market",
    'intro' => [
      "Quebec City ad accounts need French-first campaigns across Google and Meta, more so than Montreal's bilingual balance -- French is genuinely the primary language of search and social here, not a secondary consideration bolted onto an English campaign.",
      "Pricing is quoted in CAD, with most Quebec City ads management running CAD 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is French-language advertising more essential in Quebec City than Montreal?", 'a' => "Yes -- French is genuinely the primary language of search and social here, more so than Montreal's bilingual balance, so campaigns are built French-first."],
      ['q' => "What's the typical cost?", 'a' => "CAD 250-3,000/month plus ad spend, quoted in CAD."],
      ['q' => "Do you run ads for tourism businesses too?", 'a' => "Yes -- given Quebec City's strong heritage-tourism sector, Meta's visual formats are a common fit."],
    ],
    'layout' => 'B',
  ],

  // ===== Australia cities =====
  'ads-management-sydney' => [
    'intro_heading' => "Google & Meta Ads Management for Sydney's Crowded Finance and Corporate Auction",
    'intro' => [
      "Sydney ad accounts compete against Australia's densest concentration of finance and corporate advertisers -- a realistic, tightly-scoped keyword and audience strategy matters more here than in most Australian markets, where cost per click on broad terms runs highest nationally.",
      "Pricing is quoted in AUD, with most Sydney ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Sydney's ad auction more competitive than other Australian cities?", 'a' => "Often yes -- the density of finance and corporate advertisers makes many keywords especially contested and costly here."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "How does the time difference affect reporting?", 'a' => "Sydney runs 4.5-5.5 hours ahead of IST depending on the season, which usually lands calls comfortably in the local afternoon."],
    ],
    'layout' => 'A',
  ],
  'ads-management-melbourne' => [
    'intro_heading' => "Google & Meta Ads Management for Melbourne's Retail and Startup Ad Split",
    'intro' => [
      "Melbourne ad accounts range from retail and hospitality local-intent Google Search campaigns to a growing creative-tech and startup scene that gets more value from Meta's product-focused creative -- two genuinely different platform strategies from the same city.",
      "Pricing is quoted in AUD, with most Melbourne ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for retail/hospitality or startup businesses in Melbourne?", 'a' => "Both are common Melbourne client types needing different platform strategies -- local-intent Search vs. product-focused Meta campaigns."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-brisbane' => [
    'intro_heading' => "Google & Meta Ads Management for Brisbane's Growing, Less-Crowded Ad Auction",
    'intro' => [
      "Brisbane ad accounts benefit from a genuinely growing market with less keyword competition than Sydney or Melbourne on both Google and Meta, which usually means a lower cost per lead for well-targeted local campaigns.",
      "Pricing is quoted in AUD, with most Brisbane ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Is Brisbane's ad auction less competitive than Sydney or Melbourne?", 'a' => "Generally yes, which can translate into a lower cost per lead for well-targeted local campaigns in this growing market."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'A',
  ],
  'ads-management-gold-coast' => [
    'intro_heading' => "Google & Meta Ads Management for the Gold Coast's Tourism and Holiday-Property Bookings",
    'intro' => [
      "Gold Coast ad accounts are heavily tourism and holiday-property businesses, where Meta's visual and video formats consistently drive booking-related clicks better than Search alone, especially during peak season when timing the spend right directly affects bookings.",
      "Pricing is quoted in AUD, with most Gold Coast ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for tourism or holiday-property businesses?", 'a' => "Yes -- Meta's visual formats for booking-related campaigns is the priority for Gold Coast's tourism and holiday-property clients."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "Does timing the ad spend to peak season actually matter here?", 'a' => "Yes -- ramping budget ahead of peak booking seasons is directly tied to results for this business type, more so than most industries."],
    ],
    'layout' => 'B',
  ],
  'ads-management-perth' => [
    'intro_heading' => "Google & Meta Ads Management for Perth's Mining and Resources B2B Search Terms",
    'intro' => [
      "Perth ad accounts typically need B2B keyword visibility on Google Search for the mining and resources sector, Western Australia's dominant industry -- long, technical search phrases with real buying intent matter more here than broad consumer terms Meta would typically serve.",
      "Pricing is quoted in AUD, with most Perth ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for mining/resources businesses in Perth?", 'a' => "Yes -- technical, capability-focused Google Search campaigns are the priority given WA's dominant mining and resources industry."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "Is Perth's ad auction less competitive than Sydney or Melbourne?", 'a' => "Generally yes, which can make a lower cost per lead more achievable for well-executed local campaigns."],
    ],
    'layout' => 'A',
  ],
  'ads-management-adelaide' => [
    'intro_heading' => "Google & Meta Ads Management for Adelaide's Manufacturing and Wine-Industry Ad Split",
    'intro' => [
      "Adelaide ad accounts often need B2B Google Search campaigns for manufacturing and defense-adjacent businesses, alongside wine-region tourism and export businesses that get better results from Meta's visual, consumer-facing formats.",
      "Pricing is quoted in AUD, with most Adelaide ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for manufacturing or wine-industry businesses in Adelaide?", 'a' => "Both are common Adelaide client types needing different platform strategies -- B2B Search vs. consumer-facing Meta tourism/export campaigns."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-canberra' => [
    'intro_heading' => "Google & Meta Ads Management for Canberra's Government-Contractor Search Terms",
    'intro' => [
      "Canberra ad accounts are overwhelmingly government contractors and public-sector-adjacent businesses running Google Search campaigns for procurement and capability-related terms -- a genuinely niche keyword space where Meta plays a much smaller role.",
      "Pricing is quoted in AUD, with most Canberra ads management running AUD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for government contractors in Canberra?", 'a' => "Yes -- Google Search campaigns for procurement and capability-related terms is the primary focus for most Canberra clients."],
      ['q' => "What's the typical cost?", 'a' => "AUD 300-3,500/month plus ad spend, quoted in AUD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'A',
  ],

  // ===== New Zealand cities =====
  'ads-management-auckland' => [
    'intro_heading' => "Google & Meta Ads Management for Auckland's Commercial Hub Search Terms",
    'intro' => [
      "Auckland ad accounts often need visibility for commercial and finance-adjacent Google Search terms, reflecting the city's role as NZ's dominant trade and business hub, with Meta filling in for consumer-facing awareness campaigns.",
      "Pricing is quoted in NZD, with most Auckland ads management running NZD 300-3,500/month plus ad spend, and reporting timed around the 6.5-7.5 hour gap from IST.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for finance or trade-adjacent businesses in Auckland?", 'a' => "Yes -- Google Search campaigns for Auckland's commercial hub audience is a common request."],
      ['q' => "What's the typical cost?", 'a' => "NZD 300-3,500/month plus ad spend, quoted in NZD."],
      ['q' => "How does the time difference affect reporting?", 'a' => "Auckland runs 6.5-7.5 hours ahead of IST -- calls are scheduled for Auckland's afternoon, landing in an Indian morning, which works well in practice."],
    ],
    'layout' => 'B',
  ],
  'ads-management-wellington' => [
    'intro_heading' => "Google & Meta Ads Management for Wellington's Government and Film-Industry Ad Split",
    'intro' => [
      "Wellington ad accounts split between government-adjacent campaigns needing formal, accessibility-conscious ad copy on Google Search, and \"Wellywood\" film-production-adjacent businesses that get more value from Meta's visually-driven creative.",
      "Pricing is quoted in NZD, with most Wellington ads management running NZD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for government-adjacent or film-production businesses?", 'a' => "Both are common Wellington client types needing quite different creative approaches."],
      ['q' => "What's the typical cost?", 'a' => "NZD 300-3,500/month plus ad spend, quoted in NZD."],
      ['q' => "How does the time zone affect reporting calls?", 'a' => "Wellington is 6.5-7.5 hours ahead of IST -- we schedule for Wellington's afternoon, which works well for monthly review calls."],
    ],
    'layout' => 'A',
  ],
  'ads-management-christchurch' => [
    'intro_heading' => "Google & Meta Ads Management for Christchurch's Agribusiness Search Terms",
    'intro' => [
      "Christchurch ad accounts typically need visibility for agribusiness and agritech-related Google Search terms, reflecting the city's role as the South Island's commercial agricultural gateway, with a smaller supporting role for Meta among newer agritech brands.",
      "Pricing is quoted in NZD, with most Christchurch ads management running NZD 300-3,500/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for agribusiness or agritech companies?", 'a' => "Yes -- both traditional agribusiness keyword campaigns and newer agritech product-focused Meta ads are common Christchurch requests."],
      ['q' => "What's the typical cost?", 'a' => "NZD 300-3,500/month plus ad spend, quoted in NZD."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'B',
  ],

  // ===== Russia cities =====
  // Note: Google suspended ad-serving in Russia and Meta platforms are blocked
  // there since March 2022 -- copy is scoped honestly to international/export
  // audiences rather than falsely implying we can serve ads inside Russia.
  'ads-management-moscow' => [
    'intro_heading' => "Google & Meta Ads Management for Moscow Businesses Reaching International Audiences",
    'intro' => [
      "Given the suspension of Google's ad-serving business and the block on Meta platforms inside Russia since 2022, campaigns for Moscow-based businesses are scoped to reach audiences outside Russia -- international buyers, diaspora communities, and export markets -- rather than claiming to serve ads to users inside the country.",
      "Pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Can you actually run Google or Meta ads targeting audiences inside Russia?", 'a' => "No -- Google suspended its ad-serving business in Russia and Meta platforms are blocked there since 2022. We scope campaigns to reach international, diaspora or export audiences instead, and we're upfront about this limitation before any work starts."],
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 200-2,500/month plus ad spend, with payment terms confirmed upfront."],
    ],
    'layout' => 'A',
  ],
  'ads-management-saint-petersburg' => [
    'intro_heading' => "Google & Meta Ads Management for Saint Petersburg Businesses Reaching International Audiences",
    'intro' => [
      "As with Moscow, Google's ad-serving suspension and Meta's platform block inside Russia mean campaigns for Saint Petersburg businesses are scoped toward international buyers and export-market audiences rather than users inside the country -- an important distinction we're upfront about before starting.",
      "Pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Can ads actually reach audiences inside Russia right now?", 'a' => "No -- the same Google and Meta restrictions that apply to Moscow apply here, so campaigns are scoped to international or export-market audiences instead."],
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable."],
      ['q' => "Do you handle campaigns for tourism businesses reaching international visitors?", 'a' => "Yes -- international-facing campaigns for Saint Petersburg's cultural-tourism sector is a common scoped request."],
    ],
    'layout' => 'B',
  ],

  // ===== South Africa cities =====
  'ads-management-cape-town' => [
    'intro_heading' => "Google & Meta Ads Management for Cape Town's Tech and Tourism Ad Split",
    'intro' => [
      "Cape Town ad accounts split between \"Silicon Cape\" tech startups that get strong results from Meta's product-focused creative, and tourism/hospitality businesses where Meta's visual, video-driven formats consistently outperform Search for booking-related awareness.",
      "Pricing is quoted in ZAR, with most Cape Town ads management running ZAR 3,500-50,000/month plus ad spend, and reporting timed around the 3.5-hour gap from IST.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for tech startups or tourism businesses in Cape Town?", 'a' => "Both are common Cape Town client types, needing different creative and platform strategies."],
      ['q' => "What's the typical cost?", 'a' => "ZAR 3,500-50,000/month plus ad spend, in ZAR."],
      ['q' => "How does the time zone work for reporting calls?", 'a' => "Cape Town is 3.5 hours ahead of IST, a comfortable overlap for scheduled monthly reviews."],
    ],
    'layout' => 'A',
  ],
  'ads-management-johannesburg' => [
    'intro_heading' => "Google & Meta Ads Management for Johannesburg's Corporate Buyer Search Terms",
    'intro' => [
      "Johannesburg ad accounts want credibility-driven Google Search campaigns that match the scale of the financial-services and mining-industry headquarters concentrated in the city, competing for corporate-buyer search terms rather than broad consumer clicks.",
      "Pricing is quoted in ZAR, with most Johannesburg ads management running ZAR 3,500-50,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for financial-services or mining-adjacent corporates?", 'a' => "Yes -- credibility-driven Google Search campaigns for corporate-buyer audiences is a common Johannesburg request."],
      ['q' => "What's the typical cost?", 'a' => "ZAR 3,500-50,000/month plus ad spend, in ZAR."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'B',
  ],
  'ads-management-durban' => [
    'intro_heading' => "Google & Meta Ads Management for Durban's Port-Logistics B2B Search Terms",
    'intro' => [
      "Durban ad accounts typically need B2B keyword visibility on Google Search for logistics and manufacturing businesses, given Durban's role as Africa's busiest port -- Meta plays a smaller supporting role for this specialized buyer audience.",
      "Pricing is quoted in ZAR, with most Durban ads management running ZAR 3,500-50,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for logistics or manufacturing businesses in Durban?", 'a' => "Yes -- capability-focused Google Search campaigns suited to Durban's port-logistics and manufacturing base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "ZAR 3,500-50,000/month plus ad spend, in ZAR."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'A',
  ],

  // ===== Saudi Arabia cities =====
  'ads-management-riyadh' => [
    'intro_heading' => "Google & Meta Ads Management for Riyadh's Vision 2030 E-Commerce Growth",
    'intro' => [
      "Riyadh ad accounts increasingly include e-commerce businesses riding Vision 2030's digitization push, where Meta ads perform especially well given very high social-media usage rates in Saudi Arabia, alongside bilingual Arabic/English Google Search campaigns for more traditional corporate clients.",
      "Pricing is quoted in SAR, with most Riyadh ads management running SAR 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run bilingual Arabic/English ad campaigns for Riyadh businesses?", 'a' => "Yes -- bilingual campaigns across Google and Meta are common and often essential here."],
      ['q' => "What's the typical cost?", 'a' => "SAR 1,000-10,000/month plus ad spend, in SAR."],
      ['q' => "Is Meta particularly effective in Saudi Arabia?", 'a' => "Yes -- very high social-media usage rates make Meta a strong-performing channel here, especially for e-commerce and consumer brands riding the Vision 2030 digitization push."],
    ],
    'layout' => 'B',
  ],
  'ads-management-jeddah' => [
    'intro_heading' => "Google & Meta Ads Management for Jeddah's Trading and Tourism Ad Growth",
    'intro' => [
      "Jeddah ad accounts often need bilingual Arabic/English campaigns for trading-business visibility on Google Search, alongside a growing Meta-driven tourism opportunity as Red Sea tourism development accelerates and visual, booking-related creative performs well.",
      "Pricing is quoted in SAR, with most Jeddah ads management running SAR 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run bilingual ads for trading businesses in Jeddah?", 'a' => "Yes -- bilingual Arabic/English campaigns across Google and Meta are a common and often essential request."],
      ['q' => "What's the typical cost?", 'a' => "SAR 1,000-10,000/month plus ad spend, in SAR."],
      ['q' => "Do you handle tourism-related campaigns too?", 'a' => "Yes -- given Jeddah's growing Red Sea tourism sector, Meta's visual formats are an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'ads-management-dammam' => [
    'intro_heading' => "Google & Meta Ads Management for Dammam's Oil and Petrochemical B2B Terms",
    'intro' => [
      "Dammam ad accounts typically need B2B keyword visibility on Google Search for energy and petrochemical-adjacent businesses, reflecting the Eastern Province's industrial character -- Meta plays a smaller supporting role for this specialized buyer audience.",
      "Pricing is quoted in SAR, with most Dammam ads management running SAR 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for energy or petrochemical businesses in Dammam?", 'a' => "Yes -- capability-focused Google Search campaigns suited to Dammam's industrial base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "SAR 1,000-10,000/month plus ad spend, in SAR."],
      ['q' => "Can you handle Arabic and English campaigns?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'B',
  ],

  // ===== UAE cities =====
  'ads-management-abu-dhabi' => [
    'intro_heading' => "Google & Meta Ads Management for Abu Dhabi's Government and Cultural-Tourism Growth",
    'intro' => [
      "Abu Dhabi ad accounts are often government-adjacent institutions needing formal, credible Google Search campaigns, alongside a growing Meta-driven cultural-tourism opportunity as the city invests further in tourism infrastructure.",
      "Pricing is quoted in AED, with most Abu Dhabi ads management running AED 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for government-adjacent institutions in Abu Dhabi?", 'a' => "Yes -- formal, credible Google Search campaigns is the common priority for Abu Dhabi's government-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "AED 1,000-10,000/month plus ad spend, in AED."],
      ['q' => "Do you handle tourism-related campaigns too?", 'a' => "Yes -- given Abu Dhabi's growing cultural-tourism investment, Meta's visual formats are an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'ads-management-sharjah' => [
    'intro_heading' => "Google & Meta Ads Management for Sharjah's Industrial B2B Search Terms",
    'intro' => [
      "Sharjah ad accounts typically need B2B industrial and manufacturing keyword visibility on Google Search, reflecting the emirate's more industrial character compared to Dubai -- Meta plays a smaller supporting role for this specialized buyer audience.",
      "Pricing is quoted in AED, with most Sharjah ads management running AED 1,000-10,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle B2B ads for industrial businesses in Sharjah?", 'a' => "Yes -- capability-focused Google Search campaigns suited to Sharjah's industrial base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "AED 1,000-10,000/month plus ad spend, in AED."],
      ['q' => "Can you handle Arabic and English campaigns?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'B',
  ],

  // ===== Switzerland cities =====
  'ads-management-zurich' => [
    'intro_heading' => "Google & Meta Ads Management for Zurich's Precision-Focused Banking Ad Copy",
    'intro' => [
      "Zurich ad accounts expect exacting ad-copy accuracy -- financial and fintech-adjacent Google Search campaigns need to be factually precise, reflecting the same precision standard Zurich clients expect from every part of their business, with Meta reserved for more measured brand-awareness work.",
      "Pricing is quoted in CHF, with most Zurich ads management running CHF 300-4,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Does ad copy need to be especially precise for Zurich financial clients?", 'a' => "Yes -- factual accuracy in financial/fintech-adjacent ad copy matters more here than in most markets, reflecting Zurich's precision-focused business culture."],
      ['q' => "What's the typical cost?", 'a' => "CHF 300-4,000/month plus ad spend, in CHF."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'A',
  ],
  'ads-management-geneva' => [
    'intro_heading' => "Google & Meta Ads Management for Geneva's International Organizations and Private Banking",
    'intro' => [
      "Geneva ad accounts often need bilingual French/English campaigns, alongside formal, understated ad creative suited to the city's international-organization and private-banking concentration -- Meta creative here leans measured rather than attention-grabbing.",
      "Pricing is quoted in CHF, with most Geneva ads management running CHF 300-4,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run bilingual French/English campaigns for Geneva businesses?", 'a' => "Yes -- bilingual campaigns across Google and Meta are a common and explicitly-scoped Geneva request."],
      ['q' => "What's the typical cost?", 'a' => "CHF 300-4,000/month plus ad spend, in CHF."],
      ['q' => "Do you handle campaigns for private banking or institutional clients?", 'a' => "Yes -- formal, understated creative suited to Geneva's international-organization and banking concentration is a common request."],
    ],
    'layout' => 'B',
  ],
  'ads-management-zug' => [
    'intro_heading' => "Google & Meta Ads Management for Zug's Crypto Valley Ad Scene",
    'intro' => [
      "Zug ad accounts often need modern, product-focused Meta creative for crypto/blockchain businesses, where visual and video ad formats reach a young, digitally-native audience effectively, alongside more traditional Google Search campaigns for the international corporate headquarters the canton attracts.",
      "Pricing is quoted in CHF, with most Zug ads management running CHF 300-4,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run ads for crypto or blockchain companies in Zug?", 'a' => "Yes -- modern, product-focused Meta creative is a common request given Zug's \"Crypto Valley\" identity."],
      ['q' => "What's the typical cost?", 'a' => "CHF 300-4,000/month plus ad spend, in CHF."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'A',
  ],

  // ===== Germany cities =====
  'ads-management-berlin' => [
    'intro_heading' => "Google & Meta Ads Management for Berlin's Startup Ad Scene",
    'intro' => [
      "Berlin ad accounts typically come from the city's large startup scene, where Meta's product-focused, newer creative formats perform strongly with an audience more comfortable with fast-moving campaigns than the rest of Germany's more traditional business culture.",
      "Pricing is quoted in EUR, with most Berlin ads management running EUR 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you run startup-style ads for Berlin tech companies?", 'a' => "Yes -- modern, product-focused Meta creative suited to Berlin's startup scene is a common request, distinct from the more traditional Mittelstand approach elsewhere in Germany."],
      ['q' => "What's the typical cost?", 'a' => "EUR 250-3,000/month plus ad spend, in EUR."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'B',
  ],
  'ads-management-munich' => [
    'intro_heading' => "Google & Meta Ads Management for Munich's Corporate HQ and Engineering Ad Terms",
    'intro' => [
      "Munich ad accounts want thorough, technically accurate Google Search ad copy reflecting the precision-focused culture of the corporate headquarters concentrated here, more than trend-chasing Meta creative built for volume.",
      "Pricing is quoted in EUR, with most Munich ads management running EUR 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for engineering or corporate-HQ-adjacent businesses in Munich?", 'a' => "Yes -- thorough, technically accurate Google Search ad copy is the priority for Munich's engineering and corporate-headquarters-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "EUR 250-3,000/month plus ad spend, in EUR."],
      ['q' => "Do you provide monthly reporting?", 'a' => "Yes -- clear spend, cost-per-lead and ROI reports every month."],
    ],
    'layout' => 'A',
  ],
  'ads-management-hamburg' => [
    'intro_heading' => "Google & Meta Ads Management for Hamburg's Port-Logistics and Media Ad Split",
    'intro' => [
      "Hamburg ad accounts split between port/logistics businesses needing functional B2B Google Search campaigns and media/publishing-adjacent businesses that get better results from Meta's more editorially-minded content promotion.",
      "Pricing is quoted in EUR, with most Hamburg ads management running EUR 250-3,000/month plus ad spend.",
    ],
    'faqs' => [
      ['q' => "Do you handle ads for logistics or media businesses in Hamburg?", 'a' => "Both are common Hamburg client types, needing quite different platform strategies -- functional B2B Search vs. Meta content promotion."],
      ['q' => "What's the typical cost?", 'a' => "EUR 250-3,000/month plus ad spend, in EUR."],
      ['q' => "How soon will we see leads?", 'a' => "Paid campaigns typically generate leads within days, with early weeks spent optimizing based on real performance."],
    ],
    'layout' => 'B',
  ],
];
