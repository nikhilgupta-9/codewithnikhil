<?php
// Unique per-page content layer for service-maintenance.php (added 2026-07-27 to fix
// GSC flagging website-maintenance-* pages as duplicate/thin doorway content -- see
// memory nikhilworks-doorway-content-fix). Reuses the real local-industry facts
// already established for seo-services-*/crm-development-* pages, angled toward
// maintenance-specific reasoning (uptime, security patch cadence, backups,
// content-update cadence) rather than SEO or CRM framing.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
return [
  // ===== Country pages =====
  'website-maintenance-usa' => [
    'intro_heading' => "Maintenance for a Market Running on Plugin-Heavy WordPress and E-Commerce Stacks",
    'intro' => [
      "US small and mid-size business sites tend to run on plugin-heavy WordPress or e-commerce stacks, and every unpatched plugin is a potential entry point for an attacker. A single missed update is often the difference between a routine patch and a hacked site.",
      "Downtime during Black Friday and Cyber Monday is especially costly in a market this competitive, which is why uptime monitoring and tested backups matter as much as the patches themselves. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Our site runs on a lot of plugins -- is that a security risk?", 'a' => "It can be if they're not kept current. Every plugin is a potential entry point, so patching them as updates release is one of the most important parts of a maintenance plan."],
      ['q' => "Do you cover Black Friday/Cyber Monday specifically?", 'a' => "Yes -- uptime monitoring runs continuously, and having tested backups and fast response in place matters most during peak sales windows like these."],
      ['q' => "What's the typical cost?", 'a' => "Most US maintenance plans range USD 50-500/mo, quoted in USD, depending on site complexity."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-uk' => [
    'intro_heading' => "Maintenance for UK Businesses Balancing Security and Boxing Day Traffic",
    'intro' => [
      "UK e-commerce and services sites face the same patch-cadence risks as anywhere, but the addition of UK data protection expectations means keeping software current is also part of showing customers you take their data seriously, not just a technical chore.",
      "Boxing Day and January sales periods are when downtime hurts most for UK retailers, so uptime monitoring is scheduled to catch issues before they cost a sale. Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Does keeping software patched actually matter for UK data protection compliance?", 'a' => "It's part of it -- unpatched software is a common way customer data gets exposed, so staying current is a reasonable due-diligence step, not just a technical nicety."],
      ['q' => "Do you pay extra attention around Boxing Day sales?", 'a' => "Uptime monitoring runs year-round, but yes, we're aware Boxing Day and January are peak periods where downtime is most costly for UK retailers."],
      ['q' => "What's the typical cost?", 'a' => "Most UK maintenance plans range GBP 40-400/mo, quoted in GBP."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-india' => [
    'intro_heading' => "Affordable Maintenance for Indian Businesses Running Inherited or DIY Sites",
    'intro' => [
      "Most Indian businesses asking about maintenance aren't on a formal plan yet -- they're running a site someone built once and never touched again, discovering it's broken or hacked only when a customer mentions it. A monthly plan catches that before it becomes a crisis.",
      "Indian businesses are understandably price-sensitive about ongoing costs, so plans are priced to be genuinely affordable rather than a one-size-fits-all enterprise rate. Pricing is transparent in INR, from INR 2,000 to INR 25,000/mo depending on scope.",
    ],
    'faqs' => [
      ['q' => "My site was built once and never maintained since -- can you take it over?", 'a' => "Yes -- this is the most common starting point for Indian clients. We do a quick technical review first, then bring it onto a plan regardless of who built it originally."],
      ['q' => "Are maintenance plans actually affordable for smaller Indian businesses?", 'a' => "Yes -- plans are priced with price-sensitive Indian SMEs in mind, starting well below what a one-off emergency fix would typically cost."],
      ['q' => "What's the typical cost?", 'a' => "Most Indian maintenance plans range INR 2,000-25,000/mo depending on site complexity, quoted transparently upfront."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-uae' => [
    'intro_heading' => "Maintenance for UAE's Bilingual Real Estate and Trading Sites",
    'intro' => [
      "UAE real estate and trading businesses often run bilingual English/Arabic sites, and every content update -- a new listing, a new catalog item -- needs to be pushed to both versions, not just one. Skipping the Arabic side is a common maintenance gap we specifically watch for.",
      "Listing-heavy sites also need reliable uptime since a broken property page or catalog during a launch costs real inquiries. Plans are quoted in AED, from AED 200 to AED 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep both the English and Arabic versions of our site updated?", 'a' => "Yes -- bilingual content updates are pushed to both versions together, which is a common gap when maintenance is handled ad hoc instead of as a plan."],
      ['q' => "Do you handle real estate listing or trading catalog updates?", 'a' => "Yes -- frequent listing and catalog updates are common in the UAE and are covered as part of the content-update allowance."],
      ['q' => "What's the typical cost?", 'a' => "Most UAE maintenance plans range AED 200-2,000/mo, quoted in AED."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-canada' => [
    'intro_heading' => "Maintenance for Canada's Bilingual, Regionally Split Market",
    'intro' => [
      "Canadian businesses with a Quebec audience often need French and English content kept in sync, and a maintenance plan that only updates the English side quietly leaves the French version stale. Regional differences also mean uptime expectations vary less than content needs do.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo, scoped to whether a site needs single-language or bilingual update coverage.",
    ],
    'faqs' => [
      ['q' => "Do you keep French and English versions in sync for Quebec-facing sites?", 'a' => "Yes -- when a site serves Quebec, updates are pushed to both language versions together so the French side never falls behind."],
      ['q' => "Does the plan differ depending on which Canadian region we're in?", 'a' => "The core maintenance work is the same nationally; what changes is whether bilingual content coverage is needed."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian maintenance plans range CAD 60-600/mo, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-australia' => [
    'intro_heading' => "Maintenance for Australian Businesses, With Timezone-Convenient Scheduling",
    'intro' => [
      "Australian search and e-commerce demand concentrates around Sydney and Melbourne, but businesses anywhere in the country need the same underlying discipline: patched software, tested backups and monitored uptime, especially around end-of-financial-year and Christmas sales spikes.",
      "Australia sits comfortably ahead of Indian Standard Time, which makes scheduling maintenance windows and update calls for Australia's afternoon land in a workable Indian morning rather than the middle of the night. Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle the EOFY and Christmas sales traffic spikes?", 'a' => "Uptime monitoring runs continuously, with extra attention around EOFY and Christmas since that's when downtime costs Australian retailers the most."],
      ['q' => "Does the time difference make scheduling difficult?", 'a' => "Not really -- Australia is comfortably ahead of IST, so Australian afternoon maintenance windows or calls land in a normal Indian working morning."],
      ['q' => "What's the typical cost?", 'a' => "Most Australian maintenance plans range AUD 80-800/mo, quoted in AUD."],
    ],
    'layout' => 'B',
  ],

  // ===== USA states/cities =====
  'website-maintenance-california' => [
    'intro_heading' => "Maintenance for California's Fast-Moving SaaS and Retail Sites",
    'intro' => [
      "California SaaS sites tend to ship features constantly, which means dependency and framework updates need to happen on a similarly fast cycle -- a maintenance plan that only checks in quarterly falls behind quickly in a market moving this fast.",
      "Retail and e-commerce sites here face the same crowded competitive pressure, where any downtime sends a customer straight to a rival's checkout instead. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Our site changes constantly -- can maintenance keep up?", 'a' => "Yes -- fast-moving California SaaS sites need a shorter patch and update cycle than a static brochure site, and plans are scoped accordingly."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you monitor uptime for e-commerce checkouts specifically?", 'a' => "Yes -- checkout and cart pages get the same 24/7 monitoring as the rest of the site, since that's where downtime costs the most directly."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-new-york' => [
    'intro_heading' => "Maintenance for New York's Compliance-Conscious Finance Sites",
    'intro' => [
      "New York finance and professional-services firms are frequently expected to demonstrate their vendors keep software patched and data backed up, as part of client and auditor due diligence -- security patch cadence isn't optional here, it's part of doing business.",
      "A documented patch and backup history is often exactly what gets asked for during a client review. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide documentation of patches applied, for compliance purposes?", 'a' => "Yes -- we can provide a record of security patches and backup history, which New York finance and professional-services clients often need for audits."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "How quickly are critical security patches applied?", 'a' => "Critical patches are applied as soon as they're released, given how much client trust rides on a clean security record in this industry."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-washington' => [
    'intro_heading' => "Maintenance for Washington State's Tech-Influenced Performance Expectations",
    'intro' => [
      "Washington State's local tech industry has pushed user expectations toward fast, always-on sites -- a slow page load or brief outage stands out more here than in less tech-influenced markets, since visitors are used to better.",
      "Speed tuning and uptime monitoring get slightly more emphasis here as a result. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Does Washington's tech-heavy market change what maintenance should prioritize?", 'a' => "Somewhat -- speed and uptime carry a bit more weight here, since local users are used to the performance standards the region's tech industry has set."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you do ongoing speed tuning, not just patches?", 'a' => "Yes -- performance tuning is part of every plan, not an add-on, since a slow site is a visible problem here."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-texas' => [
    'intro_heading' => "Maintenance for Texas's Energy, Logistics and Newly-Relocated Businesses",
    'intro' => [
      "Texas has a genuine mix of established energy and logistics B2B sites needing steady uptime for quote-request forms, and a wave of newer businesses relocated from elsewhere setting up a formal maintenance plan for the first time.",
      "Either way, the core need is the same: patches applied promptly and someone to call when something breaks. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "We just relocated to Texas and never had a formal maintenance plan -- can you set one up?", 'a' => "Yes -- this is common among Texas's recently-relocated businesses, and we start with a quick technical review regardless of the site's history."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you keep B2B quote-request forms working reliably?", 'a' => "Yes -- uptime monitoring covers lead-capture and quote-request forms specifically, since a broken form quietly loses inquiries."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-virginia' => [
    'intro_heading' => "Maintenance for Northern Virginia's Government-Contractor Security Standards",
    'intro' => [
      "Northern Virginia government contractors and professional-services firms are often held to formal security expectations that trickle down to their public-facing sites too -- a documented, disciplined patch cadence matters more here than in most markets.",
      "We keep a clear record of what was patched and when, useful for procurement or compliance reviews. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide patch documentation for government-contractor compliance needs?", 'a' => "Yes -- a clear record of applied patches and backups is available, which Northern Virginia contractors often need for internal or client security reviews."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "How fast are critical patches applied for a government-adjacent site?", 'a' => "As soon as they're released -- the security bar is higher here and we treat critical patches as urgent, not routine."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-delaware' => [
    'intro_heading' => "Maintenance for Delaware's Financial and Corporate-Services Firms",
    'intro' => [
      "Delaware's concentration of financial and corporate-services firms means a site can't look neglected -- clients doing due diligence on an incorporation or financial-services provider notice a stale or broken site quickly, even if overall traffic volume is modest.",
      "Plans here focus on steady professionalism and security over handling large traffic spikes. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Does a Delaware financial-services site need heavy-duty uptime monitoring given lower traffic?", 'a' => "Uptime monitoring still runs 24/7, but the bigger priority here is that the site always looks current and professional for clients doing due diligence."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you handle small ongoing content updates for a corporate-services site?", 'a' => "Yes -- keeping service pages and credentials current is a common, low-volume but important request from Delaware clients."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-los-angeles' => [
    'intro_heading' => "Maintenance for LA's Media-Heavy and Retail Sites",
    'intro' => [
      "LA's entertainment-adjacent sites tend to carry heavy image and video assets that need ongoing performance tuning to stay fast, while local retail and services sites need the standard uptime and security discipline any transaction-driven business needs.",
      "Two different sets of priorities from the same city, both covered under one plan. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Our site is media-heavy -- does that affect maintenance?", 'a' => "Yes -- image and video-heavy entertainment-adjacent sites need more attention to asset optimization and caching to keep load times reasonable."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you also cover standard retail/services maintenance needs?", 'a' => "Yes -- uptime monitoring, backups and security patches are the same baseline regardless of whether the site is media-heavy or a standard retail site."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-chicago' => [
    'intro_heading' => "Maintenance for Chicago's B2B Manufacturing and Logistics Sites",
    'intro' => [
      "Chicago's manufacturing and logistics sites see lower traffic volume than consumer sites, but every visit tends to be a genuine buying inquiry -- a broken quote form or catalog page here quietly costs a real sale, not just a bounce.",
      "The priority is dependable uptime for those forms, not handling flash-sale traffic spikes. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Our traffic is low-volume but high-value -- does maintenance still matter as much?", 'a' => "If anything, more -- when most visits are genuine buying inquiries, a broken form or page costs a real sale, not just traffic."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you monitor quote-request and contact forms specifically?", 'a' => "Yes -- these are checked as part of uptime monitoring, since a silently broken form is one of the easiest problems to miss."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-houston' => [
    'intro_heading' => "Maintenance for Houston's Energy and Medical Center-Adjacent Sites",
    'intro' => [
      "Houston sites split between energy-sector B2B pages needing investor- and partner-grade reliability, and healthcare-adjacent sites near the Texas Medical Center where content accuracy and site security carry extra weight.",
      "Both need dependable uptime, just for different reasons. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for energy-sector or healthcare-adjacent sites?", 'a' => "Both are common Houston client types, and each gets the same core discipline -- patches, backups, monitoring -- with content-accuracy review weighted more heavily for healthcare-adjacent sites."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Is security patch cadence different for a site near the Medical Center?", 'a' => "It's treated with extra care given the sensitivity of healthcare-adjacent content, though the underlying patch process is the same."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-dallas' => [
    'intro_heading' => "Maintenance for Dallas's Corporate-Buyer B2B Sites",
    'intro' => [
      "Dallas B2B sites in finance, telecom and logistics are often vetted by corporate buyers doing vendor due diligence, where an outdated or insecure-looking site raises questions before a deal even starts.",
      "Keeping patches current and uptime visible is part of passing that quiet vetting process. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do corporate buyers actually check a vendor's site security before doing business?", 'a' => "It happens more than you'd think -- an outdated-looking or clearly unpatched site can raise doubts during vendor due diligence in Dallas's B2B market."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you provide uptime reports we can share with clients?", 'a' => "Yes -- uptime reports are available and can double as reassurance for corporate buyers evaluating reliability."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-phoenix' => [
    'intro_heading' => "Maintenance for Phoenix's Fast-Growing Real Estate and Home-Services Sites",
    'intro' => [
      "Phoenix real estate and home-services sites operate in a genuinely fast-growing market, where listings and promotions change often and a lead-capture form going down for even a day means losing leads to a competitor who's a search away.",
      "Frequent content updates matter here as much as uptime. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "We update listings frequently -- is that covered?", 'a' => "Yes -- frequent listing and promotion updates are common for Phoenix's fast-growing real estate and home-services market and are covered in the content-update allowance."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "How fast do you respond if a lead-capture form breaks?", 'a' => "Priority response is built into the plan, since a broken lead form in a fast-moving market like Phoenix costs leads every hour it's down."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-san-diego' => [
    'intro_heading' => "Maintenance for San Diego's Biotech and Tourism Sites",
    'intro' => [
      "San Diego biotech-adjacent sites need careful, accurate content updates for a scientifically literate audience, while the city's tourism and defense-adjacent sites need seasonal update cadence and reliable uptime during travel-planning season.",
      "Content accuracy gets extra review for biotech clients specifically. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do you review content accuracy carefully for biotech-adjacent sites?", 'a' => "Yes -- technical content changes get extra review before publishing, given how scientifically literate San Diego's biotech-adjacent audience is."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you also handle tourism-site maintenance?", 'a' => "Yes -- seasonal content refresh and uptime monitoring during travel-planning season are common requests from San Diego's tourism sector."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-philadelphia' => [
    'intro_heading' => "Maintenance for Philadelphia's Dense Healthcare and Education Sites",
    'intro' => [
      "Philadelphia has an unusually high density of hospitals and universities, and healthcare/education-adjacent sites here face genuinely stiff local competition -- a site that's slow or looks outdated stands out against so many well-maintained peers.",
      "Security patch discipline also matters more given how much sensitive-adjacent content these sites often carry. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Does Philadelphia's dense healthcare/education market change maintenance priorities?", 'a' => "It raises the bar -- with so many well-maintained hospital and university-adjacent sites nearby, an outdated one stands out more than it would elsewhere."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Is security patching handled differently for healthcare-adjacent sites?", 'a' => "It's treated with extra urgency, since these sites often carry sensitive-adjacent content and can't afford unpatched vulnerabilities."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-miami' => [
    'intro_heading' => "Maintenance for Miami's Bilingual, Fast-Moving Real Estate Sites",
    'intro' => [
      "Miami sites often need both English and Spanish content kept current, given the city's role as a Latin America trade gateway, and real estate sites specifically need frequent listing updates in a market that moves fast.",
      "Skipping the Spanish-language side during an update is a gap we specifically check for. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep the Spanish version of our site updated too?", 'a' => "Yes -- bilingual English/Spanish content updates are pushed together, which matters given how much of Miami's search audience is Spanish-speaking."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, quoted in USD."],
      ['q' => "Do you handle frequent real estate listing updates?", 'a' => "Yes -- Miami's fast-moving property market means frequent listing updates are a common and expected part of the plan."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-manhattan' => [
    'intro_heading' => "Maintenance for Manhattan's High-Visibility Corporate Sites",
    'intro' => [
      "Manhattan's density of corporate headquarters and professional-services firms means a visible bug or outage gets noticed by exactly the competitive peers you'd rather not have notice -- reputational stakes are simply higher here than in most markets.",
      "Frequent content refresh is also expected, similar to the broader New York market. Plans are quoted in USD, from USD 50 to USD 500/mo.",
    ],
    'faqs' => [
      ['q' => "Is downtime more reputationally costly in Manhattan specifically?", 'a' => "It can feel that way -- the density of corporate peers and professional-services firms here means a visible outage gets noticed more than in a less concentrated market."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, similar to the broader New York market, quoted in USD."],
      ['q' => "Do you provide uptime reports?", 'a' => "Yes -- clear uptime and patch reports are available, useful for a Manhattan firm that wants to demonstrate operational discipline."],
    ],
    'layout' => 'A',
  ],

  // ===== UK cities =====
  'website-maintenance-england' => [
    'intro_heading' => "Maintenance for Businesses Across England, Beyond London",
    'intro' => [
      "This page covers England broadly -- London has its own dedicated page given its fintech-specific security expectations, so this one is for businesses elsewhere in England needing the same core discipline matched to a smaller, steadier local market.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for England as well as London?", 'a' => "London's page covers fintech-specific security expectations; this one is for businesses anywhere else in England with more typical maintenance needs."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you support sites you didn't originally build?", 'a' => "Yes -- we start with a quick technical review, then bring the site onto a plan regardless of who built it."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-london' => [
    'intro_heading' => "Maintenance for London's Security-Scrutinized Fintech and Professional-Services Sites",
    'intro' => [
      "London fintech and professional-services sites operate under heavier security scrutiny than most -- clients and partners expect current patches and documented backups as a baseline, not a nice-to-have, given how much financial data these sites are adjacent to.",
      "Downtime is also costly reputationally in a market this competitive and closely watched. Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Is security patching more urgent for London fintech sites?", 'a' => "Yes -- fintech and professional-services clients here are expected to demonstrate current patches and backups as a baseline, given the financial data involved."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you provide patch and backup documentation?", 'a' => "Yes -- a clear record is available, useful for London fintech clients responding to partner or client security questions."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-manchester' => [
    'intro_heading' => "Maintenance for Manchester's Growing E-Commerce and Media Sites",
    'intro' => [
      "Manchester's e-commerce scene keeps growing, which means uptime during sales periods matters more each year, while the city's media-adjacent sites need frequent content and asset updates to keep pace with a genuinely active local digital scene.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Do you monitor uptime during e-commerce sales periods?", 'a' => "Yes -- 24/7 uptime monitoring covers sales periods specifically, since Manchester's growing e-commerce scene makes downtime costlier each year."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you handle frequent content updates for media-adjacent sites?", 'a' => "Yes -- regular content and asset updates are common for Manchester's active media and digital scene."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-bristol' => [
    'intro_heading' => "Maintenance for Bristol's Engineering and Creative-Studio Sites",
    'intro' => [
      "Bristol splits between engineering/aerospace-adjacent B2B sites needing dependable catalog and spec-page uptime, and creative studios needing frequent portfolio updates without breaking a carefully designed layout in the process.",
      "Two different needs from the same city, both handled under one plan. Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Do you update creative-studio portfolios without breaking the design?", 'a' => "Yes -- portfolio updates are handled carefully to preserve the design, which matters more for Bristol's creative studios than for a standard B2B page update."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you also maintain B2B engineering catalog pages?", 'a' => "Yes -- reliable uptime for spec sheets and catalog pages is the priority for Bristol's engineering-adjacent clients."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-leeds' => [
    'intro_heading' => "Maintenance for Leeds's Financial and Legal Services Sites",
    'intro' => [
      "Leeds financial and legal-services firms need the same credibility-driven security discipline as London firms, just for a distinct regional client base -- a documented patch history helps here too when a client asks about data-handling practices.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide security documentation for Leeds financial/legal clients?", 'a' => "Yes -- a clear patch and backup record is available, similar to what's expected of London firms, for a Leeds-based client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "How fast are critical security patches applied?", 'a' => "As soon as they're released -- financial and legal-services clients here can't afford to wait on a known vulnerability."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-birmingham' => [
    'intro_heading' => "Maintenance for Birmingham's Diverse Manufacturing and Retail Sites",
    'intro' => [
      "Birmingham's genuinely diverse economy means maintenance needs range from manufacturing/automotive-adjacent B2B catalog reliability to consumer-facing retail sites needing uptime through sales periods -- the plan is scoped to which kind of site it is.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Does the plan differ for a manufacturing site versus a retail site in Birmingham?", 'a' => "The core work is the same, but priorities shift -- manufacturing sites focus on catalog/spec reliability, retail sites focus more on uptime through sales periods."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you handle B2B catalog updates for manufacturing suppliers?", 'a' => "Yes -- product and spec-page updates are a common request from Birmingham's manufacturing sector."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-glasgow' => [
    'intro_heading' => "Maintenance for Glasgow's Growing Fintech and Financial-Services Sites",
    'intro' => [
      "Glasgow's growing fintech scene ships product updates often, which means dependency and framework patches need a faster cycle than a traditional financial-services site, even though both need the same underlying security discipline.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Do fintech startups in Glasgow need a faster update cycle?", 'a' => "Often yes -- fast-shipping fintech products tend to need more frequent dependency and framework patches than a traditional financial-services site."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you also support traditional financial-services sites?", 'a' => "Yes -- the same security-first discipline applies, just on a steadier update cadence."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-liverpool' => [
    'intro_heading' => "Maintenance for Liverpool's Logistics, Culture and Growing Digital Scene",
    'intro' => [
      "Liverpool spans port-logistics B2B sites needing steady uptime for booking and quote pages, and a genuinely growing cultural-tourism and creative-digital scene where many sites are newer and have never been on a formal maintenance plan before.",
      "Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Our site has never had a formal maintenance plan -- is that common in Liverpool?", 'a' => "Yes -- Liverpool's growing digital and cultural-tourism scene includes a lot of newer sites in exactly that position, and we start with a quick technical review."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you handle port-logistics B2B maintenance too?", 'a' => "Yes -- steady uptime for booking and quote-request pages is the priority for Liverpool's logistics clients."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-edinburgh' => [
    'intro_heading' => "Maintenance for Edinburgh's Finance Sites and Festival-Season Traffic Spikes",
    'intro' => [
      "Edinburgh financial-services sites need the usual credibility-driven security discipline, while tourism and hospitality sites need something different: uptime that genuinely holds up during the Festival and Fringe, when search and booking traffic spikes dramatically.",
      "We plan for that seasonal spike in advance rather than reacting to it. Plans are quoted in GBP, from GBP 40 to GBP 400/mo.",
    ],
    'faqs' => [
      ['q' => "Do you prepare tourism sites for the Festival/Fringe traffic surge?", 'a' => "Yes -- capacity and uptime checks ahead of the Festival/Fringe season are a common and important request for Edinburgh's tourism and hospitality clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 40-400/mo, quoted in GBP."],
      ['q' => "Do you also handle financial-services security needs?", 'a' => "Yes -- credibility-driven patch and backup discipline is covered for Edinburgh's financial-services clients too."],
    ],
    'layout' => 'B',
  ],

  // ===== Canada =====
  'website-maintenance-ontario' => [
    'intro_heading' => "Maintenance for Ontario's Split Finance/Tech and Manufacturing Market",
    'intro' => [
      "Ontario spans Toronto-area finance and tech sites needing tight security discipline, and manufacturing-heavy B2B sites further into the province needing dependable catalog uptime -- a province-wide plan accounts for that split rather than treating Ontario as one market.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Does maintenance differ across Ontario?", 'a' => "The core discipline is the same, but Toronto-area finance/tech sites tend to need tighter security patch cadence than manufacturing-heavy B2B sites elsewhere in the province."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you handle bilingual content if our Ontario audience needs it?", 'a' => "Yes -- bilingual French/English update coverage is scoped in where relevant."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-british-columbia' => [
    'intro_heading' => "Maintenance for BC's Tech, Film and Natural-Resources Sites",
    'intro' => [
      "British Columbia's Vancouver-area tech and film-production sites carry heavy media assets and fast-changing content, needing more frequent updates than the more traditional natural-resources B2B sites further inland.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do tech and film sites in BC need more frequent updates?", 'a' => "Often yes -- media-heavy, fast-moving Vancouver-area sites tend to need more frequent content and performance updates than steadier natural-resources sites inland."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you handle heavy media asset optimization?", 'a' => "Yes -- image/video asset optimization is part of the plan for BC's film and media-adjacent clients."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-toronto' => [
    'intro_heading' => "Maintenance for Toronto's Dense, Zero-Tolerance Finance and Tech Market",
    'intro' => [
      "Toronto's density of finance and tech businesses means a competitor is never far away -- a slow, buggy, or briefly-down site here is more likely to be noticed than in a less concentrated Canadian market.",
      "Zero-downtime tolerance and disciplined security patching matter more here as a result. Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Is downtime more costly in Toronto specifically?", 'a' => "It can be -- the density of finance and tech competitors here means a briefly-down site is noticed more than in a less concentrated market."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you provide uptime reports we can share internally?", 'a' => "Yes -- clear uptime and patch reports are available on request."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-vancouver' => [
    'intro_heading' => "Maintenance for Vancouver's Tech and 'Hollywood North' Film Sites",
    'intro' => [
      "Vancouver's tech startups need frequent framework and dependency updates given how fast their product sites evolve, while the city's film-production-adjacent sites ('Hollywood North') carry heavy media assets that need ongoing performance tuning.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for tech startups or film-production companies in Vancouver?", 'a' => "Both are common Vancouver client types -- startups need frequent framework updates, film-adjacent sites need media-asset performance tuning."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you optimize heavy showreel/video assets?", 'a' => "Yes -- image and video optimization is part of the plan for Vancouver's media-heavy sites."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-montreal' => [
    'intro_heading' => "Maintenance for Montreal's Bilingual French/English Sites",
    'intro' => [
      "Montreal sites genuinely need French and English content kept in sync -- French search and French-speaking visitors here aren't a secondary audience, and a maintenance plan that only updates the English side quietly leaves half the site stale.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep both languages updated together?", 'a' => "Yes -- every content update is pushed to both French and English versions together, since French isn't a secondary audience in Montreal."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you handle maintenance for gaming/tech companies too?", 'a' => "Yes -- Montreal's notable gaming and tech sector is a common client base, needing a faster update cadence."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-calgary' => [
    'intro_heading' => "Maintenance for Calgary's Energy-Sector B2B Sites",
    'intro' => [
      "Calgary energy and oil-and-gas-adjacent sites see relatively low visitor volume, but the visitors that matter -- partners, investors, procurement contacts -- expect a site that looks current and secure, not neglected.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Does a low-traffic energy-sector site still need active maintenance?", 'a' => "Yes -- the visitors that matter most (partners, investors, procurement contacts) notice an outdated or neglected-looking site quickly, regardless of traffic volume."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you keep technical/capability pages current?", 'a' => "Yes -- keeping capability and project pages current is a common request from Calgary's energy-sector clients."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-ottawa' => [
    'intro_heading' => "Maintenance for Ottawa's Government-Contractor and Tech Sites",
    'intro' => [
      "Ottawa's government-adjacent contractors need formal, documented security patch discipline for procurement-related credibility, while the city's notable local tech sector wants a faster, more product-focused update cadence.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide formal patch documentation for government contractors?", 'a' => "Yes -- a documented patch and backup history is available, which is often expected for Ottawa's procurement-related credibility needs."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you also support Ottawa's tech-sector sites?", 'a' => "Yes -- a faster, more product-focused update cadence is available alongside the formal government-contractor track."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-edmonton' => [
    'intro_heading' => "Maintenance for Edmonton's Energy and Logistics Sites",
    'intro' => [
      "Edmonton energy and logistics sites have needs similar in character to nearby Calgary, but a distinct local client base -- steady uptime for capability and quote-request pages matters more here than handling large traffic spikes.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for energy or logistics businesses in Edmonton?", 'a' => "Yes -- steady uptime for capability and quote-request pages is the priority, similar to Edmonton's Calgary neighbours."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you provide monthly uptime and patch reports?", 'a' => "Yes -- clear reports are provided every month."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-winnipeg' => [
    'intro_heading' => "Maintenance for Winnipeg's Manufacturing and Agribusiness Sites",
    'intro' => [
      "Winnipeg manufacturing and agribusiness-adjacent sites operate in a market with genuinely lower digital competition than Canada's larger cities -- the priority is a dependable, no-frills plan rather than defending against constant competitive pressure.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Is Winnipeg's maintenance need different from bigger Canadian cities?", 'a' => "The core need is the same, but with less competitive pressure, the priority shifts toward dependable basics -- patches, backups, uptime -- over defensive extras."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you update product/pricing catalog pages for manufacturing or agribusiness clients?", 'a' => "Yes -- catalog and pricing-page updates are a common request from Winnipeg's manufacturing and agribusiness clients."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-quebec-city' => [
    'intro_heading' => "Maintenance for Quebec City's French-First Sites",
    'intro' => [
      "Quebec City sites need French-first content maintenance, more so than Montreal's bilingual balance -- French is genuinely the primary language here, and updates need to reflect that rather than treating French as secondary.",
      "Plans are quoted in CAD, from CAD 60 to CAD 600/mo.",
    ],
    'faqs' => [
      ['q' => "Is French-first maintenance different from bilingual maintenance?", 'a' => "Yes -- in Quebec City, French content is updated first and primarily, unlike Montreal's more even bilingual balance."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 60-600/mo, quoted in CAD."],
      ['q' => "Do you handle seasonal content updates for heritage-tourism sites?", 'a' => "Yes -- Quebec City's strong heritage-tourism sector means seasonal content refresh is a common request."],
    ],
    'layout' => 'B',
  ],

  // ===== Australia =====
  'website-maintenance-sydney' => [
    'intro_heading' => "Maintenance for Sydney's Dense Finance and Corporate Sites",
    'intro' => [
      "Sydney's density of finance and corporate businesses means a site can't afford a visible security lapse or outage -- reputational stakes are higher here than in most Australian markets, given how closely competitors watch each other.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Is downtime more reputationally costly in Sydney?", 'a' => "It can be -- the density of finance and corporate businesses here means outages or security lapses get noticed by close competitors."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Do you provide patch documentation for corporate clients?", 'a' => "Yes -- a clear patch and backup record is available on request."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-melbourne' => [
    'intro_heading' => "Maintenance for Melbourne's Retail and Creative-Startup Sites",
    'intro' => [
      "Melbourne retail and hospitality sites need reliable uptime through sales periods, while the city's growing creative-tech and startup scene wants a faster content and feature-update cadence -- two different rhythms from the same city.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for retail/hospitality or startup businesses in Melbourne?", 'a' => "Both are common Melbourne client types, with retail focused on sales-period uptime and startups needing a faster feature-update cadence."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Do you provide monthly uptime reports?", 'a' => "Yes -- clear uptime and patch reports every month."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-brisbane' => [
    'intro_heading' => "Maintenance for Brisbane's Growing, Less-Crowded Market",
    'intro' => [
      "Brisbane's growing businesses often skip formal maintenance early on to save money, then get caught out by an outdated plugin or a missed backup right as the site starts to matter more -- earlier onboarding avoids that technical debt.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Is it worth setting up maintenance early for a growing Brisbane business?", 'a' => "Yes -- getting onto a plan before problems pile up is cheaper and less disruptive than fixing a neglected site once it starts mattering more."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Do you support sites that were never formally maintained before?", 'a' => "Yes -- we start with a quick technical review regardless of the site's maintenance history."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-gold-coast' => [
    'intro_heading' => "Maintenance for the Gold Coast's Booking-Driven Tourism Sites",
    'intro' => [
      "Gold Coast tourism and holiday-property sites see traffic and bookings surge during peak search seasons, and downtime during exactly that window is the most expensive kind -- a booking lost during peak season doesn't come back.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you plan uptime monitoring around peak tourism season?", 'a' => "Yes -- extra attention goes to uptime during peak booking seasons, since that's when downtime costs Gold Coast tourism and holiday-property businesses the most."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Do you handle seasonal content/promotion updates?", 'a' => "Yes -- seasonal listing and promotion updates are a common request for Gold Coast's tourism clients."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-perth' => [
    'intro_heading' => "Maintenance for Perth's Mining and Resources Sites",
    'intro' => [
      "Perth mining and resources sites often carry investor- and partner-facing content where accuracy and security matter more than raw traffic volume, and the city's less crowded digital market means many of these sites aren't yet on a proper plan.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do investor-facing pages need special maintenance care?", 'a' => "Yes -- accuracy and uptime on investor- and partner-facing pages matter more for credibility than the raw traffic volume they get."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Is Perth's market less competitive, so is maintenance less urgent?", 'a' => "Less competitive doesn't mean less important -- an unpatched or neglected site is still a real security and credibility risk regardless of competition levels."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-adelaide' => [
    'intro_heading' => "Maintenance for Adelaide's Manufacturing and Wine-Tourism Sites",
    'intro' => [
      "Adelaide splits between manufacturing/defense-adjacent B2B sites needing dependable catalog uptime, and wine-region tourism and export sites needing seasonal content updates timed around harvest and tourist season.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle seasonal updates for wine-tourism sites?", 'a' => "Yes -- content updates timed around harvest and tourist season are a common request from Adelaide's wine-region clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "Do you also maintain manufacturing/defense-adjacent B2B sites?", 'a' => "Yes -- dependable catalog and spec-page uptime is the priority for Adelaide's manufacturing clients."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-canberra' => [
    'intro_heading' => "Maintenance for Canberra's Government-Contractor Sites",
    'intro' => [
      "Canberra's overwhelmingly government-contractor and public-sector-adjacent client base needs formal, documented security patch discipline for procurement and capability-related credibility -- a genuinely niche maintenance requirement most providers underserve.",
      "Plans are quoted in AUD, from AUD 80 to AUD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide formal patch documentation for government contractors?", 'a' => "Yes -- a documented patch and backup history is available, which is the primary need for most Canberra clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 80-800/mo, quoted in AUD."],
      ['q' => "How fast are critical patches applied for a government-adjacent site?", 'a' => "As soon as they're released -- the compliance bar is higher here and we treat it as urgent."],
    ],
    'layout' => 'A',
  ],

  // ===== New Zealand =====
  'website-maintenance-auckland' => [
    'intro_heading' => "Maintenance for Auckland's Commercial Hub, Scheduled Around IST",
    'intro' => [
      "Auckland's role as NZ's dominant trade and business hub means commercial and finance-adjacent sites here need credibility-driven security discipline, similar to other financial centres on this list.",
      "Auckland is 6.5-7.5 hours ahead of IST, so maintenance windows and update calls are scheduled for Auckland's afternoon, landing in an Indian morning that works well. Plans are quoted in NZD, from NZD 80 to NZD 800/mo.",
    ],
    'faqs' => [
      ['q' => "How does the time difference affect scheduling?", 'a' => "Auckland is 6.5-7.5 hours ahead of IST, so maintenance windows and calls are scheduled for Auckland's afternoon, which lands in a normal Indian working morning."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 80-800/mo, quoted in NZD."],
      ['q' => "Do you handle finance/commercial-hub security needs?", 'a' => "Yes -- credibility-driven patch and backup discipline is covered given Auckland's role as NZ's commercial hub."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-wellington' => [
    'intro_heading' => "Maintenance for Wellington's Government and Film-Industry Sites",
    'intro' => [
      "Wellington government-adjacent sites need formal, accessibility-conscious security discipline, while the city's 'Wellywood' film-production-adjacent sites carry heavy media assets needing ongoing performance tuning -- two very different priorities from the same city.",
      "Plans are quoted in NZD, from NZD 80 to NZD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for government-adjacent or film-production sites?", 'a' => "Both are common Wellington client types, needing quite different approaches -- formal compliance-driven work versus media-asset performance tuning."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 80-800/mo, quoted in NZD."],
      ['q' => "How does the time difference affect scheduling?", 'a' => "Wellington is 6.5-7.5 hours ahead of IST -- we schedule for Wellington's afternoon, which works well for a normal Indian working day."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-christchurch' => [
    'intro_heading' => "Maintenance for Christchurch's Agribusiness and Agritech Sites",
    'intro' => [
      "Christchurch agribusiness and agritech sites, reflecting the city's role as the South Island's commercial agricultural gateway, tend to need steady catalog and pricing-page updates timed around seasonal harvest calendars rather than constant change.",
      "Plans are quoted in NZD, from NZD 80 to NZD 800/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle seasonal catalog updates tied to harvest calendars?", 'a' => "Yes -- timing content updates around agricultural seasons is a common request from Christchurch's agribusiness and agritech clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 80-800/mo, quoted in NZD."],
      ['q' => "How does the time difference affect scheduling?", 'a' => "Christchurch is 6.5-7.5 hours ahead of IST -- afternoon maintenance windows there land in a workable Indian morning."],
    ],
    'layout' => 'B',
  ],

  // ===== Russia =====
  'website-maintenance-moscow' => [
    'intro_heading' => "Maintenance for Moscow's Corporate and E-Commerce Sites, Priced in USD",
    'intro' => [
      "Moscow corporate-adjacent and e-commerce sites need the same patch, backup and uptime discipline as anywhere, with e-commerce sites specifically needing uptime monitoring through sales periods to avoid losing transactions.",
      "Given current cross-border payment complexity affecting Russia, pricing is quoted and settled in USD, confirmed directly during discovery rather than assumed upfront.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable, confirmed directly during discovery."],
      ['q' => "Do you monitor uptime for e-commerce sites specifically?", 'a' => "Yes -- 24/7 monitoring covers sales periods, since that's when downtime costs a Moscow e-commerce site the most."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, with payment terms confirmed upfront."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-saint-petersburg' => [
    'intro_heading' => "Maintenance for Saint Petersburg's Trade, Tourism and Tech Sites",
    'intro' => [
      "Saint Petersburg sites come from a mix of trade/logistics businesses needing steady B2B uptime, a large cultural-tourism sector needing seasonal content refresh, and a growing tech scene wanting a faster update cadence.",
      "As with Moscow, pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable, confirmed directly during discovery."],
      ['q' => "Do you handle seasonal content updates for tourism sites?", 'a' => "Yes -- seasonal refresh is a common request given the city's large cultural-tourism sector."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 50-500/mo, with payment terms confirmed upfront."],
    ],
    'layout' => 'B',
  ],

  // ===== South Africa =====
  'website-maintenance-cape-town' => [
    'intro_heading' => "Maintenance for Cape Town's Tech Startups and Tourism Sites",
    'intro' => [
      "Cape Town's \"Silicon Cape\" tech startups need frequent framework and dependency updates given how fast their product sites evolve, while tourism/hospitality sites need reliable uptime specifically during Cape Town's peak tourist season.",
      "Plans are quoted in ZAR, from ZAR 800 to ZAR 12,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for tech startups or tourism businesses in Cape Town?", 'a' => "Both are common Cape Town client types, needing different update cadences -- fast-moving startup patches versus seasonal tourism-site uptime."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 800-12,000/mo, in ZAR."],
      ['q' => "Do you prioritize uptime during peak tourist season?", 'a' => "Yes -- extra monitoring attention goes to peak season, when downtime costs tourism businesses the most."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-johannesburg' => [
    'intro_heading' => "Maintenance for Johannesburg's Financial-Services and Mining-HQ Sites",
    'intro' => [
      "Johannesburg's concentration of financial-services and mining-industry headquarters means sites here need corporate-grade uptime and disciplined security patching -- credibility is directly on the line with this audience.",
      "Plans are quoted in ZAR, from ZAR 800 to ZAR 12,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do financial/mining-HQ sites need extra security discipline?", 'a' => "Yes -- corporate-grade patch and backup discipline matters more here, given how much credibility rides on it for Johannesburg's financial-services and mining-HQ clients."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 800-12,000/mo, in ZAR."],
      ['q' => "Do you provide patch and uptime documentation?", 'a' => "Yes -- clear records are available on request."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-durban' => [
    'intro_heading' => "Maintenance for Durban's Port-Logistics and Manufacturing Sites",
    'intro' => [
      "Durban B2B logistics and manufacturing sites, reflecting the city's role as Africa's busiest port, need steady uptime for shipping and order-inquiry pages -- a broken form here quietly costs a real business inquiry.",
      "Plans are quoted in ZAR, from ZAR 800 to ZAR 12,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you monitor order-inquiry and shipping pages specifically?", 'a' => "Yes -- these are checked as part of uptime monitoring, since a silently broken form is one of the easiest problems for a busy logistics site to miss."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 800-12,000/mo, in ZAR."],
      ['q' => "Do you update product/service catalog pages?", 'a' => "Yes -- catalog updates are a common request suited to Durban's port-logistics and manufacturing base."],
    ],
    'layout' => 'A',
  ],

  // ===== Saudi Arabia =====
  'website-maintenance-riyadh' => [
    'intro_heading' => "Maintenance for Riyadh's Vision 2030 E-Commerce Growth",
    'intro' => [
      "Riyadh e-commerce businesses riding Vision 2030's digitization push need uptime that holds up as their traffic grows fast, alongside bilingual Arabic/English content updates that keep both language versions genuinely current.",
      "Plans are quoted in SAR, from SAR 200 to SAR 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep both Arabic and English versions updated?", 'a' => "Yes -- bilingual content updates are pushed together, which is a common and often essential Riyadh requirement."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 200-2,000/mo, in SAR."],
      ['q' => "Do you handle uptime for fast-growing e-commerce sites?", 'a' => "Yes -- as Vision 2030 accelerates retail digitization, keeping up with fast traffic growth is a common and growing Riyadh request."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-jeddah' => [
    'intro_heading' => "Maintenance for Jeddah's Trading and Growing Tourism Sites",
    'intro' => [
      "Jeddah trading-business sites need bilingual Arabic/English content updates kept in sync, alongside a growing tourism opportunity as Red Sea tourism development accelerates and seasonal content needs become more common.",
      "Plans are quoted in SAR, from SAR 200 to SAR 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep bilingual trading-site content updated?", 'a' => "Yes -- bilingual Arabic/English update coverage is a common and often essential request for Jeddah's trading businesses."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 200-2,000/mo, in SAR."],
      ['q' => "Do you handle tourism-site maintenance too?", 'a' => "Yes -- given Jeddah's growing Red Sea tourism sector, this is an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-dammam' => [
    'intro_heading' => "Maintenance for Dammam's Oil, Energy and Petrochemical Sites",
    'intro' => [
      "Dammam energy and petrochemical-adjacent sites, reflecting the Eastern Province's industrial character, need dependable uptime for capability and partner-facing pages plus disciplined security patching given the compliance weight in this sector.",
      "Plans are quoted in SAR, from SAR 200 to SAR 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do energy-sector sites in Dammam need extra security discipline?", 'a' => "Yes -- compliance expectations in the energy sector mean disciplined, documented patching matters more here."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 200-2,000/mo, in SAR."],
      ['q' => "Can you handle Arabic and English content updates?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'B',
  ],

  // ===== UAE cities =====
  'website-maintenance-abu-dhabi' => [
    'intro_heading' => "Maintenance for Abu Dhabi's Government and Cultural-Tourism Sites",
    'intro' => [
      "Abu Dhabi government-adjacent institution sites need formal, credible security patch discipline, alongside a growing cultural-tourism sector where uptime matters more each year as the city invests further in tourism infrastructure.",
      "Plans are quoted in AED, from AED 200 to AED 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you provide formal security documentation for government-adjacent institutions?", 'a' => "Yes -- a clear, documented patch and backup history is available, which is the common priority for Abu Dhabi's government-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 200-2,000/mo, in AED."],
      ['q' => "Do you handle tourism-site maintenance too?", 'a' => "Yes -- given Abu Dhabi's growing cultural-tourism investment, this is an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-sharjah' => [
    'intro_heading' => "Maintenance for Sharjah's Industrial and Education-Focused Sites",
    'intro' => [
      "Sharjah B2B industrial and manufacturing sites, reflecting the emirate's more industrial character compared to Dubai, need dependable catalog uptime alongside bilingual Arabic/English content updates kept in sync.",
      "Plans are quoted in AED, from AED 200 to AED 2,000/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle industrial B2B site maintenance in Sharjah?", 'a' => "Yes -- dependable catalog and spec-page uptime suited to Sharjah's industrial base is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 200-2,000/mo, in AED."],
      ['q' => "Can you handle Arabic and English content updates?", 'a' => "Yes -- bilingual support is commonly scoped."],
    ],
    'layout' => 'B',
  ],

  // ===== Switzerland =====
  'website-maintenance-zurich' => [
    'intro_heading' => "Maintenance for Zurich's Precision-Focused Banking and Fintech Sites",
    'intro' => [
      "Zurich clients expect the same exacting precision from their site's maintenance record that they expect from every part of their business -- patch documentation and uptime history need to be accurate and thorough, not a rough approximation.",
      "Plans are quoted in CHF, from CHF 80 to CHF 900/mo.",
    ],
    'faqs' => [
      ['q' => "Does maintenance documentation need to be especially precise for Zurich clients?", 'a' => "Yes -- accurate, thorough patch and uptime records matter more here, reflecting Zurich's precision-focused business culture."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 80-900/mo, in CHF."],
      ['q' => "How fast are critical security patches applied?", 'a' => "As soon as they're released -- banking and fintech-adjacent clients here expect zero delay on known vulnerabilities."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-geneva' => [
    'intro_heading' => "Maintenance for Geneva's International Organizations and Private Banking Sites",
    'intro' => [
      "Geneva sites often need bilingual French/English content kept in sync, alongside the formal, understated reliability expected by the city's international-organization and private-banking audience -- a site that looks anything less than buttoned-up stands out here.",
      "Plans are quoted in CHF, from CHF 80 to CHF 900/mo.",
    ],
    'faqs' => [
      ['q' => "Do you keep bilingual French/English content updated together?", 'a' => "Yes -- bilingual update coverage is a common and explicitly-scoped Geneva request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 80-900/mo, in CHF."],
      ['q' => "Do you handle maintenance for private banking or institutional clients?", 'a' => "Yes -- formal, disciplined patch and backup practices suited to Geneva's international-organization and banking concentration are a common request."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-zug' => [
    'intro_heading' => "Maintenance for Zug's \"Crypto Valley\" Security-Critical Sites",
    'intro' => [
      "Zug's crypto/blockchain businesses are genuinely higher-value hacking targets than most sites, which makes prompt security patching especially urgent here, alongside more traditional corporate reliability for the international headquarters the canton also attracts.",
      "Plans are quoted in CHF, from CHF 80 to CHF 900/mo.",
    ],
    'faqs' => [
      ['q' => "Are crypto/blockchain sites at higher security risk?", 'a' => "Yes -- they're a more attractive target than most sites, so prompt patching and monitoring matter even more for Zug's \"Crypto Valley\" businesses."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 80-900/mo, in CHF."],
      ['q' => "Do you also support traditional corporate HQ sites in Zug?", 'a' => "Yes -- the same disciplined maintenance practices apply, just without the elevated urgency of a crypto-specific target."],
    ],
    'layout' => 'A',
  ],

  // ===== Germany =====
  'website-maintenance-berlin' => [
    'intro_heading' => "Maintenance for Berlin's Fast-Moving Startup Sites",
    'intro' => [
      "Berlin's large startup scene ships product changes constantly and is comfortable with newer content formats, which means framework and dependency patches need a faster cycle than the more traditional Mittelstand business culture found elsewhere in Germany.",
      "Plans are quoted in EUR, from EUR 60 to EUR 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do Berlin startups need a faster maintenance cycle?", 'a' => "Yes -- fast-shipping startup sites tend to need more frequent framework and dependency patches than the more traditional Mittelstand approach elsewhere in Germany."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 60-600/mo, in EUR."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear uptime and patch reports every month."],
    ],
    'layout' => 'B',
  ],
  'website-maintenance-munich' => [
    'intro_heading' => "Maintenance for Munich's Precision-Focused Corporate HQ and Engineering Sites",
    'intro' => [
      "Munich's concentration of corporate headquarters and engineering-adjacent businesses expects the same precision-focused discipline in site maintenance as in everything else -- thorough, technically accurate patch and backup documentation, not a rough approximation.",
      "Plans are quoted in EUR, from EUR 60 to EUR 600/mo.",
    ],
    'faqs' => [
      ['q' => "Does maintenance need to be especially thorough for Munich clients?", 'a' => "Yes -- thorough, technically accurate patch and backup documentation is the priority, matching the precision-focused culture of Munich's engineering and corporate-HQ businesses."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 60-600/mo, in EUR."],
      ['q' => "Do you provide monthly reports?", 'a' => "Yes -- clear uptime and patch reports every month."],
    ],
    'layout' => 'A',
  ],
  'website-maintenance-hamburg' => [
    'intro_heading' => "Maintenance for Hamburg's Port-Logistics and Media-Publishing Sites",
    'intro' => [
      "Hamburg splits between port/logistics sites needing steady uptime for cargo and booking-inquiry pages, and media/publishing-adjacent sites needing frequent content updates and reliable backups given how often publishing content changes.",
      "Plans are quoted in EUR, from EUR 60 to EUR 600/mo.",
    ],
    'faqs' => [
      ['q' => "Do you handle maintenance for logistics or media businesses in Hamburg?", 'a' => "Both are common Hamburg client types -- logistics needs steady booking-page uptime, media/publishing needs frequent content updates and reliable backups."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 60-600/mo, in EUR."],
      ['q' => "Do you handle frequent backups for publishing-heavy sites?", 'a' => "Yes -- daily backups matter more here given how often publishing content changes."],
    ],
    'layout' => 'B',
  ],
];
