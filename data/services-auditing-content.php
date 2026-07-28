<?php
// Unique per-page content layer for service-auditing.php (added 2026-07-27 to fix
// GSC flagging website-auditing-* pages as duplicate/thin doorway content -- see
// memory nikhilworks-doorway-content-fix). Reuses the real local-industry facts
// already established for web-developer-*/crm-development-*/seo-services-* pages,
// angled toward the website AUDITING angle: what an unaudited/stale site risks
// for that market's dominant business types (security/compliance exposure,
// performance losses, indexing/UX gaps), not a generic maintenance/SEO/CRM pitch.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
//
// NOTE: the actual data files (data/services-auditing.php + data/services-auditing-cities.php)
// contain 6 country pages (USA, UK, India, UAE, Canada, Australia) + 60 city pages = 66 total,
// not 4+60 as briefly assumed -- verified directly against both data files' keys.
return [
  // ===== Country pages (6) =====
  'website-auditing-usa' => [
    'intro_heading' => "Why US Businesses Audit a Site That Already Looks Fine",
    'intro' => [
      "Most US sites we audit were built two or three years ago and never revisited, even as Google's ranking signals, Core Web Vitals thresholds and security baselines all moved on. The site still looks fine to the owner -- it just quietly stopped competing.",
      "We audit for the things that actually move revenue: crawl errors keeping pages out of search, slow load times losing mobile visitors, and outdated plugins or CMS versions that are a real security liability. Pricing is quoted in USD, typically ranging USD 100 to USD 1,500 depending on site size.",
    ],
    'faqs' => [
      ['q' => "Our US site looks fine -- why would we need an audit?", 'a' => "Sites that \"look fine\" often have crawl errors, slow load times or outdated software that aren't visible unless you're specifically checking for them -- that's exactly what a stale, never-revisited site risks."],
      ['q' => "Do you tie findings back to leads or revenue, not just technical scores?", 'a' => "Yes -- US clients typically want to know which fixes affect leads or sales, not just a Lighthouse score, so the report is prioritized that way."],
      ['q' => "What's the typical cost?", 'a' => "Most US audits range USD 100-1,500 depending on site size and depth, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-uk' => [
    'intro_heading' => "An Audit That Finds What London's Big Budgets Already Fixed",
    'intro' => [
      "UK businesses competing against firms with large digital budgets are often losing on details a full audit catches quickly -- a slow-loading homepage, missing structured data, or a mobile experience nobody has actually tested on a real phone in over a year.",
      "Rather than guessing what to fix, you get a ranked list built from a full SEO, performance, security and UX review. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200 depending on scope.",
    ],
    'faqs' => [
      ['q' => "Can a UK business compete with bigger budgets just by fixing audit findings?", 'a' => "Often yes for the basics -- page speed, crawlability and structured data gaps are frequently the difference, and they're fixable without matching a competitor's marketing spend."],
      ['q' => "What's the typical cost?", 'a' => "Most UK audits range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you check security as well as SEO?", 'a' => "Yes -- outdated software versions and exposed files are checked alongside the SEO and performance review."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-india' => [
    'intro_heading' => "An Honest Audit of the WordPress or Wix Site You Launched and Forgot",
    'intro' => [
      "Most Indian businesses asking for an audit are running a site built quickly on WordPress or Wix years ago, with plugins never updated and nobody checking whether it's still indexing properly on Google. The fixes are often cheap and high-impact once someone actually looks.",
      "We keep this transparent and price-sensitive on purpose -- a prioritized report, not an expensive retainer. Pricing is quoted in INR, typically INR 5,000 to INR 75,000 depending on site size and depth.",
    ],
    'faqs' => [
      ['q' => "Our site is old and was never touched after launch -- is that a big risk?", 'a' => "Often yes -- unpatched plugins and an outdated CMS are common security exposure points on exactly this kind of site, and they're usually quick, affordable fixes once flagged."],
      ['q' => "What's the typical cost?", 'a' => "Most Indian audits range INR 5,000-75,000 depending on site size and depth, quoted transparently upfront."],
      ['q' => "Do you also implement the fixes, or just hand over the report?", 'a' => "Either -- some Indian clients want the report to hand to their own developer, others want us to implement it directly."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-uae' => [
    'intro_heading' => "Auditing UAE Sites Across Both Their English and Arabic Versions",
    'intro' => [
      "A surprising number of UAE audits find that the Arabic version of a site is indexing worse than the English one, or isn't properly linked at all -- a real estate listing or trading catalog that's only half-visible in search without anyone noticing.",
      "We check both language versions separately, plus the usual performance, security and UX review. Pricing is quoted in AED, typically AED 500 to AED 6,000 depending on scope.",
    ],
    'faqs' => [
      ['q' => "Do you check the Arabic version of the site separately from the English one?", 'a' => "Yes -- bilingual sites often have indexing or hreflang issues on one language version that go unnoticed unless it's checked explicitly, which is standard in a UAE audit."],
      ['q' => "What's the typical cost?", 'a' => "Most UAE audits range AED 500-6,000, quoted in AED."],
      ['q' => "Do you audit real estate or trading sites specifically?", 'a' => "Yes -- both are common UAE client types with their own indexing and content-structure quirks we check for."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-canada' => [
    'intro_heading' => "An Audit That Accounts for Canada's Regional and French-Language Search",
    'intro' => [
      "A generic Canada-wide audit misses a lot -- a Quebec business's French pages often have separate indexing issues from the English version, and a Toronto site's technical debt looks different from one built for a smaller regional market.",
      "We scope the audit to your actual region and language mix rather than running one generic check. Pricing is quoted in CAD, typically CAD 130 to CAD 2,000 depending on site size.",
    ],
    'faqs' => [
      ['q' => "Do you check French-language pages separately for Quebec businesses?", 'a' => "Yes -- French pages often have their own indexing and structured-data issues that a generic audit would miss entirely."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian audits range CAD 130-2,000 depending on site size, quoted in CAD."],
      ['q' => "How long does an audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-australia' => [
    'intro_heading' => "Auditing Australian Sites for Mobile, Not Just Desktop",
    'intro' => [
      "A lot of Australian sites we audit were designed and tested on desktop years ago and never properly checked on a real phone since -- a real problem given how much local search traffic, especially for real estate and services, is mobile.",
      "Our audit tests on real devices, not just a simulator, alongside the usual SEO, performance and security review. Pricing is quoted in AUD, typically AUD 180 to AUD 2,500 depending on scope.",
    ],
    'faqs' => [
      ['q' => "Do you actually test on real phones, not just a desktop simulator?", 'a' => "Yes -- real-device testing catches mobile issues a simulator often misses, which matters given how mobile-heavy Australian local search traffic is."],
      ['q' => "What's the typical cost?", 'a' => "Most Australian audits range AUD 180-2,500 depending on scope, quoted in AUD."],
      ['q' => "Do you audit real estate or professional-services sites specifically?", 'a' => "Yes -- both are common Australian client types, each with different mobile and local-search priorities."],
    ],
    'layout' => 'B',
  ],

  // ===== USA cities (15) =====
  'website-auditing-california' => [
    'intro_heading' => "Auditing California Sites Against a Fast-Moving SaaS and Retail Bar",
    'intro' => [
      "California businesses compete against SaaS and tech-adjacent sites where Core Web Vitals and clean structured data are table stakes -- if your site hasn't been checked against that bar recently, it's probably falling behind competitors who audit constantly.",
      "We benchmark your site's speed and technical SEO against what's actually winning in California search results, not a generic checklist. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Do you benchmark against what's actually ranking in California, not just generic standards?", 'a' => "Yes -- we look at what's winning in your specific California market so the priorities reflect real competition, not a generic checklist."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you check Core Web Vitals specifically?", 'a' => "Yes -- Core Web Vitals scoring is a core part of the performance section of every audit."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-new-york' => [
    'intro_heading' => "Auditing New York Sites Where Client Trust Rides on Credibility",
    'intro' => [
      "New York finance and professional-services sites carry a specific risk: a broken page, an expired SSL certificate, or a clearly outdated design reads as a credibility problem to a prospective client, not just a technical glitch.",
      "Our audit flags exactly these credibility-affecting issues alongside the standard SEO and security checks. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Do you flag issues that hurt credibility, not just technical scores?", 'a' => "Yes -- for New York finance and professional-services clients, things like an expired certificate or dated design get flagged as trust risks, not just technical notes."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-washington' => [
    'intro_heading' => "Auditing Washington State Sites Against Locally High Tech Expectations",
    'intro' => [
      "Washington State's tech-heavy business environment has pushed user expectations for site speed and structure higher than in most markets -- a site that would pass elsewhere can genuinely feel slow or dated to a local audience here.",
      "We check performance against that locally elevated bar, not a generic national average. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Does the audit account for Washington's tech-heavy user expectations?", 'a' => "Yes -- we benchmark performance against what feels acceptable to a tech-savvy Washington audience, which is a higher bar than average."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you check mobile performance specifically?", 'a' => "Yes -- mobile speed and real-device testing are both part of the standard audit."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-texas' => [
    'intro_heading' => "Auditing Texas Sites Built Fast During a Relocation Wave",
    'intro' => [
      "A lot of Texas businesses relocated here recently and launched a site quickly to get established, without the time for a proper technical or security review -- exactly the kind of site that accumulates unnoticed risk.",
      "We also see established Houston/Dallas energy and logistics B2B sites that have simply never been audited since launch. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "We launched our site fast after relocating to Texas -- is that a risk?", 'a' => "Often yes -- sites built quickly to get established rarely get a proper security or technical review at launch, which is exactly what this audit catches."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you audit B2B energy or logistics sites?", 'a' => "Yes -- checking crawlability and content structure for long-tail B2B search terms is a common Houston/Dallas-area request."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-virginia' => [
    'intro_heading' => "Auditing Northern Virginia Sites Where Security Exposure Has Real Stakes",
    'intro' => [
      "Northern Virginia government contractors face a higher bar than most: an exposed file or outdated software version on a public-facing site is a genuinely bigger liability here given the client base, not just a technical nitpick.",
      "Our security section is scoped with that in mind. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Is security exposure a bigger deal for Northern Virginia government contractors specifically?", 'a' => "Yes -- given the client base, an exposed file or outdated software version carries more real risk here than for a typical consumer-facing business."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you check for exposed files and outdated software versions?", 'a' => "Yes -- this is a core part of the security section of every audit."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-delaware' => [
    'intro_heading' => "Auditing Delaware Sites in a Small But Credibility-Sensitive Market",
    'intro' => [
      "Delaware's financial and corporate-services firms operate in a smaller local market where a site's polish and correctness matter more per-visitor than in a bigger, higher-volume market -- there's less room for an unnoticed technical issue to hide.",
      "We audit accordingly, prioritizing credibility-affecting issues. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Does a smaller market like Delaware change what matters in an audit?", 'a' => "Somewhat -- with fewer visitors overall, each one matters more, so credibility-affecting issues get prioritized even if traffic volume looks small."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you audit financial-services sites specifically?", 'a' => "Yes -- credibility and structured-data accuracy are checked closely given Delaware's financial-services concentration."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-los-angeles' => [
    'intro_heading' => "Auditing LA Sites Weighed Down by Heavy Media and Images",
    'intro' => [
      "LA's entertainment-adjacent sites are often image- and video-heavy in ways that quietly tank load times, while local retail and services sites nearby have the opposite problem -- barely any content Google can index at all.",
      "We audit for whichever risk applies to your site specifically. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Do heavy images/video actually slow down entertainment-adjacent LA sites?", 'a' => "Often significantly -- unoptimized media assets are one of the most common performance issues we find on LA's entertainment-adjacent sites specifically."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you also audit local retail/services sites?", 'a' => "Yes -- these often have the opposite issue, too little indexable content, which we flag just as clearly."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-chicago' => [
    'intro_heading' => "Auditing Chicago B2B Sites That Prioritized Function Over Upkeep",
    'intro' => [
      "Chicago's manufacturing, logistics and finance B2B sites were often built to just work, with maintenance and periodic review never budgeted in -- which means technical debt and outdated software tend to pile up quietly over years.",
      "We surface exactly what's accumulated and rank it by real impact. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Our B2B site was built to just work and never revisited -- what does that usually mean?", 'a' => "Typically outdated software versions and accumulated technical debt that nobody's flagged, which is common on Chicago's manufacturing/logistics B2B sites specifically."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-houston' => [
    'intro_heading' => "Auditing Houston Sites Where Security Risk Varies Sharply by Sector",
    'intro' => [
      "Houston's energy-services sites and its healthcare-adjacent practices near the Texas Medical Center carry very different audit priorities -- one cares about B2B lead-capture reliability, the other about patient-data-adjacent security and compliance risk.",
      "We scope the audit to which one applies to you. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Is a healthcare-adjacent Houston site's audit different from an energy-services one?", 'a' => "Yes -- security and compliance-adjacent risk gets more weight for healthcare-adjacent practices near the Medical Center, while energy-services sites are prioritized more around B2B lead reliability."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you check exposed files and software versions closely for medical-adjacent sites?", 'a' => "Yes -- this gets extra attention given the sensitivity of a healthcare-adjacent audience."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-dallas' => [
    'intro_heading' => "Auditing Dallas Sites Where Corporate Buyers Notice the Details",
    'intro' => [
      "Dallas's finance, telecom and logistics B2B sites are often being evaluated by corporate buyers who notice slow load times, broken links or dated design as a signal about the business itself, fairly or not.",
      "Our audit flags exactly the issues that read that way to a corporate buyer. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Do corporate buyers actually judge a business by small site issues?", 'a' => "Often yes -- for Dallas's B2B finance, telecom and logistics clients, small issues like slow pages or dead links can read as a signal about the business, so we flag them specifically."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime and security patching are covered on an ongoing basis."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-phoenix' => [
    'intro_heading' => "Auditing Phoenix Sites That Never Kept Pace With Fast Growth",
    'intro' => [
      "Phoenix real estate and home-services businesses have often grown faster than their website did -- a site built for a much smaller operation, never revisited as the business scaled, quietly leaking leads through slow pages or a clunky contact form.",
      "We audit for exactly this growth-outpaced-the-site gap. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Our Phoenix business has grown a lot but the site hasn't changed -- is that a problem?", 'a' => "Often yes -- a site built for a smaller operation and never revisited is one of the most common issues we find in Phoenix's fast-growing real estate and home-services market."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you check the contact/lead form specifically?", 'a' => "Yes -- form friction analysis is part of the UX and conversion section of the audit."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-san-diego' => [
    'intro_heading' => "Auditing San Diego Sites Where Content Accuracy Is Non-Negotiable",
    'intro' => [
      "San Diego's biotech-adjacent audience is scientifically literate and will notice an inaccurate or oversimplified technical claim faster than a typical consumer would -- a content-accuracy risk that a generic audit checklist wouldn't catch.",
      "We review content credibility alongside the standard technical, security and UX checks. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Does the audit check content accuracy, not just technical issues?", 'a' => "Yes -- for San Diego's biotech-adjacent audience specifically, content credibility is reviewed alongside the technical and security checks, since that audience notices inaccuracies quickly."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you audit tourism/defense-adjacent sites too?", 'a' => "Yes -- these are also common San Diego local SEO clients with their own audit priorities."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-philadelphia' => [
    'intro_heading' => "Auditing Philadelphia Sites in a Dense, Compliance-Aware Healthcare Market",
    'intro' => [
      "Philadelphia's unusually high density of hospitals and universities means healthcare-adjacent sites here carry real security and privacy-adjacent stakes -- an unpatched plugin or exposed form isn't just a technical footnote in this market.",
      "We weight the security section accordingly for healthcare and education-adjacent clients. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Does a healthcare-adjacent Philadelphia site need a different audit emphasis?", 'a' => "Yes -- given the city's dense healthcare sector, security and exposed-file checks get extra weight for healthcare-adjacent practices specifically."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "How competitive is local search here?", 'a' => "Genuinely competitive -- Philadelphia's dense healthcare and education sectors mean local search terms are stiffly contested, which the audit accounts for."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-miami' => [
    'intro_heading' => "Auditing Miami Sites Across Both English and Spanish Content",
    'intro' => [
      "A common Miami finding: the Spanish-language pages of a site are indexing worse than the English ones, or missing entirely -- a real gap given how much of Miami's addressable search volume, as a Latin America trade gateway, sits in Spanish queries.",
      "We check both language versions explicitly, plus real estate-specific lead-flow issues where relevant. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Do you check Spanish-language pages separately from English ones?", 'a' => "Yes -- given how much Miami search volume is in Spanish, we check the Spanish version's indexing and structure explicitly rather than assuming it mirrors the English site."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD."],
      ['q' => "Do you audit real estate sites specifically?", 'a' => "Yes -- given Miami's fast-moving property market, lead-form responsiveness is checked closely."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-manhattan' => [
    'intro_heading' => "Auditing Manhattan Sites Where Every Flaw Gets Noticed First",
    'intro' => [
      "Manhattan's density of corporate headquarters and professional-services firms means a site here is scrutinized by a genuinely sophisticated audience -- a technical or credibility issue that would go unnoticed elsewhere gets found here fast.",
      "Our audit is scoped with that scrutiny in mind, similar to the broader New York market. Pricing is quoted in USD, typically USD 100 to USD 1,500.",
    ],
    'faqs' => [
      ['q' => "Is a Manhattan audit different from the rest of New York?", 'a' => "The process is the same, but given the density of sophisticated corporate and professional-services visitors here, we weight credibility-affecting issues especially heavily."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, quoted in USD, similar to the broader New York market."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],

  // ===== UK cities (9) =====
  'website-auditing-england' => [
    'intro_heading' => "An Audit Page for England Beyond London's Fintech-Level Standards",
    'intro' => [
      "London has its own dedicated audit context around fintech-level polish -- this page is for businesses elsewhere in England whose sites need checking against a more realistic local bar, not London's benchmark.",
      "We scope the audit to your actual local market rather than assuming London-level competition. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Why a separate audit page for England and London?", 'a' => "London's page covers fintech-specific competition and polish; this one is for businesses anywhere else in England with a different local bar to be checked against."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-london' => [
    'intro_heading' => "Auditing London Sites Against Fintech-Level Polish Expectations",
    'intro' => [
      "London's fintech and professional-services firms have set a high bar for site polish and technical correctness -- a smaller London business's site is often being judged, fairly or not, against that standard by prospective clients.",
      "We audit for the gaps between your current site and that local benchmark. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Is a London business's site really judged against fintech-level standards?", 'a' => "Often yes, at least implicitly -- London's fintech and professional-services density has raised local user expectations for polish and speed."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you check structured data and technical SEO?", 'a' => "Yes -- structured data and crawlability are part of the technical SEO section of every audit."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-manchester' => [
    'intro_heading' => "Auditing Manchester Sites Against a Growing Digital-Native Competitor Base",
    'intro' => [
      "Manchester's media and e-commerce scene is genuinely growing, which means the competitor bar for site speed and checkout experience keeps rising -- an audit that was fine a year ago may already be outdated.",
      "We check against current standards, not last year's. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Does Manchester's growing digital scene mean the audit bar keeps changing?", 'a' => "Yes -- with a genuinely growing e-commerce and media competitor base here, what counted as good a year ago may already be behind, which is why we check against current standards."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you audit e-commerce checkout flows specifically?", 'a' => "Yes -- funnel drop-off and checkout friction are part of the UX and conversion section."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-bristol' => [
    'intro_heading' => "Auditing Bristol Sites Across Engineering B2B and Creative-Studio Types",
    'intro' => [
      "Bristol's aerospace/engineering B2B sites and its creative-studio portfolio sites have almost opposite audit priorities -- one needs airtight technical credibility, the other needs a portfolio that actually loads fast and shows well on mobile.",
      "We scope the audit to which type applies to you. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Is an engineering B2B site audited differently from a creative studio's?", 'a' => "Yes -- technical credibility and structured data matter more for engineering suppliers, while portfolio load speed and mobile presentation matter more for creative studios."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you check image-heavy portfolio pages for load speed?", 'a' => "Yes -- asset and image analysis is part of the performance section, especially relevant for portfolio-driven sites."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-leeds' => [
    'intro_heading' => "Auditing Leeds Sites Where Credibility Carries as Much Weight as London",
    'intro' => [
      "Leeds's financial and legal-services firms compete for credibility-driven clients in much the same way London firms do, just for a distinct regional audience -- a technical or design issue reads as a trust problem here too.",
      "We audit for exactly those credibility-affecting gaps. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Do Leeds financial/legal firms need the same credibility-focused audit as London firms?", 'a' => "Largely yes -- the credibility bar is similar in spirit, just for a distinct regional Leeds audience rather than a London one."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-birmingham' => [
    'intro_heading' => "Auditing Birmingham Sites Across a Genuinely Diverse SME Economy",
    'intro' => [
      "Birmingham's manufacturing/automotive-adjacent B2B sites and its consumer-facing retail SME sites need quite different audit priorities -- one cares about technical capability content, the other about basic local visibility and mobile usability.",
      "We scope accordingly rather than running one generic check. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Does the audit differ for manufacturing suppliers versus retail SMEs in Birmingham?", 'a' => "Yes -- manufacturing suppliers are checked more on technical/capability content, while retail SMEs are checked more on local visibility and mobile usability."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime and security patching are covered ongoing."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-glasgow' => [
    'intro_heading' => "Auditing Glasgow Sites Between a Growing Fintech Scene and Traditional Finance",
    'intro' => [
      "Glasgow's growing fintech startups need modern, product-focused sites that are actually fast and secure, while its traditional Scottish financial-services firms need the more conservative credibility check -- both are common Glasgow audit briefs.",
      "We scope the review to which one you are. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Is a fintech startup's audit different from a traditional financial firm's in Glasgow?", 'a' => "Yes -- fintech startups are checked more on modern performance and security, traditional financial firms more on credibility and content accuracy."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you check security for fintech-adjacent sites closely?", 'a' => "Yes -- software version checks and vulnerability scanning get extra weight for fintech-adjacent clients."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-liverpool' => [
    'intro_heading' => "Auditing Liverpool Sites in a Less Crowded, Growing Market",
    'intro' => [
      "Liverpool's port-logistics B2B sites and its growing cultural-tourism/creative-digital scene both benefit from an audit precisely because the market here is less crowded than nearby Manchester -- fixing what's found tends to move the needle faster.",
      "We audit both business types with that opportunity in mind. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Does a less competitive market change what an audit is worth here?", 'a' => "It can help -- fixes found in a less crowded market like Liverpool's tend to show up in rankings faster than in a more contested one like Manchester's."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do you audit tourism/culture sites?", 'a' => "Yes -- given Liverpool's strong cultural-tourism sector, this is a common request alongside port-logistics B2B sites."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-edinburgh' => [
    'intro_heading' => "Auditing Edinburgh Sites Before the Festival Season Traffic Spike",
    'intro' => [
      "Edinburgh's tourism and hospitality sites face a genuinely unusual test: a dramatic traffic spike each year around the Festival and Fringe, when an unaudited site's performance and uptime problems get exposed all at once, at the worst possible time.",
      "Financial-services clients here get a more credibility-focused review instead. Pricing is quoted in GBP, typically GBP 80 to GBP 1,200.",
    ],
    'faqs' => [
      ['q' => "Should tourism businesses audit before Festival/Fringe season specifically?", 'a' => "Yes -- an unaudited site's performance and uptime issues tend to surface right when the seasonal traffic spike hits, so checking beforehand is worth doing."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 80-1,200, quoted in GBP."],
      ['q' => "Do financial-services clients get a different kind of audit?", 'a' => "Yes -- credibility and content accuracy get more weight for Edinburgh's financial-services base than the seasonal-traffic concerns tourism clients face."],
    ],
    'layout' => 'B',
  ],

  // ===== Canada cities (10) =====
  'website-auditing-ontario' => [
    'intro_heading' => "An Audit Scoped to Where in Ontario Your Business Actually Sits",
    'intro' => [
      "A Toronto-area finance or tech site's audit priorities look different from a manufacturing-heavy site further into the province -- the competitive bar and the typical technical debt found are genuinely different by region.",
      "We scope the review to your actual part of Ontario rather than one generic province-wide check. Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Does the audit differ across Ontario?", 'a' => "Yes -- Toronto-area finance/tech sites face different competition than manufacturing-heavy sites elsewhere in the province, and we scope accordingly."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-british-columbia' => [
    'intro_heading' => "Auditing BC Sites From Vancouver's Fast-Moving Tech Scene to Resources Further Inland",
    'intro' => [
      "A Vancouver tech or film-production site needs to be checked against fast-moving industry standards, while a natural-resources B2B site further into BC usually just needs its basic technical debt cleared -- two different audit briefs from the same province.",
      "We scope accordingly. Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Is the audit different for Vancouver tech sites vs. resources-sector sites elsewhere in BC?", 'a' => "Yes -- Vancouver's tech/film scene is benchmarked against fast-moving industry standards, while resources-sector sites are checked more for basic technical debt and reliability."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime and security patching are covered ongoing."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-toronto' => [
    'intro_heading' => "Auditing Toronto Sites Amid Canada's Densest Finance and Tech Competition",
    'intro' => [
      "Toronto's finance and tech businesses compete against Canada's densest concentration of established, well-resourced sites -- an audit here often finds smaller gaps than in less competitive markets, but each one is worth fixing given how contested rankings are.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Is Toronto's audit finding smaller issues just because the market is more competitive?", 'a' => "Often yes -- established Toronto competitors have already fixed the obvious problems, so a Toronto audit tends to surface smaller, more specific gaps that still matter given how contested rankings are."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you provide a walkthrough call after the audit?", 'a' => "Yes -- every audit includes a call to explain the findings in plain language."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-vancouver' => [
    'intro_heading' => "Auditing Vancouver Sites Across Tech, Film and Real Estate",
    'intro' => [
      "Vancouver's tech and \"Hollywood North\" film-production sites tend to be image/video-heavy in ways that quietly hurt load times, while the city's active real estate sites usually have a different problem: lead forms that aren't actually fast to respond to.",
      "We audit for whichever applies. Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Do heavy media assets slow down Vancouver's tech/film sites specifically?", 'a' => "Often yes -- unoptimized video or image assets are a common performance finding for Vancouver's tech and film-production-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you audit real estate lead forms too?", 'a' => "Yes -- form friction and lead-response speed are checked closely given Vancouver's active property market."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-montreal' => [
    'intro_heading' => "Auditing Montreal Sites for French-Page Indexing Gaps",
    'intro' => [
      "A recurring Montreal finding: the French version of a bilingual site is indexing worse than the English one, or missing hreflang tags entirely -- a real visibility gap given how much of Montreal's search demand is genuinely French-first.",
      "We check both language versions explicitly, alongside the standard technical review. Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Do you check French pages separately from English ones?", 'a' => "Yes -- French pages often have their own indexing or hreflang issues that a single-language audit would miss, which matters given Montreal's genuinely bilingual search demand."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you audit gaming/tech sector sites too?", 'a' => "Yes -- product-focused sites from Montreal's notable gaming and tech scene are a common request."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-calgary' => [
    'intro_heading' => "Auditing Calgary Sites Built for Long B2B Energy Sales Cycles",
    'intro' => [
      "Calgary's energy-sector B2B sites are often research destinations for a slow, multi-month buying process -- a slow page load or a broken technical spec sheet costs more here than on a typical consumer site, because a serious buyer is genuinely comparing options.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Does a slow page matter more for a B2B energy site than a typical consumer one?", 'a' => "Arguably yes -- a serious buyer researching a long-cycle purchase is more likely to notice and be put off by a slow or broken page than a casual consumer visitor."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you check technical spec pages and downloads?", 'a' => "Yes -- broken links and download functionality are checked as part of the technical review."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-ottawa' => [
    'intro_heading' => "Auditing Ottawa Sites for Government-Grade Accessibility and Security",
    'intro' => [
      "Ottawa's government-adjacent businesses face accessibility and security expectations closer to public-sector standards than typical commercial sites, while the Kanata tech corridor's startups just want a fast, modern site that doesn't embarrass them next to bigger neighbors.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Do government-adjacent Ottawa sites need extra accessibility checks?", 'a' => "Yes -- accessibility and formal content standards get more weight for Ottawa's government-adjacent client base than for a typical commercial audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you audit Kanata tech-corridor startups too?", 'a' => "Yes -- these are checked more on speed and modern technical fundamentals than accessibility formality."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-edmonton' => [
    'intro_heading' => "Auditing Edmonton Sites Similar in Character to Nearby Calgary",
    'intro' => [
      "Edmonton's energy and logistics B2B sites carry similar audit priorities to Calgary's -- long sales cycles where a slow or broken page costs credibility with a genuinely comparing buyer -- but with a distinct local competitor set worth checking separately.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Is Edmonton's audit basically the same as Calgary's?", 'a' => "Similar in character given the shared energy/logistics focus, but we still check Edmonton's distinct local competitor set separately rather than assuming it mirrors Calgary."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-winnipeg' => [
    'intro_heading' => "Auditing Winnipeg Sites in a Lower-Competition, Higher-Opportunity Market",
    'intro' => [
      "Winnipeg's manufacturing and agribusiness B2B sites operate in a genuinely less crowded search market than Canada's bigger cities -- which means a basic technical audit often finds easy, high-impact wins that would take much more effort to achieve in Toronto or Vancouver.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Does lower competition make an audit's findings more valuable in Winnipeg?", 'a' => "Often yes -- basic fixes tend to have an outsized impact in a less crowded market like Winnipeg's compared to a more contested one."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you check software versions and exposed files closely?", 'a' => "Yes -- security fundamentals get standard attention regardless of market size."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-quebec-city' => [
    'intro_heading' => "Auditing Quebec City Sites Where French Is the Primary Search Language",
    'intro' => [
      "Quebec City sites need to be audited French-first, not as an English site with a translation bolted on -- French is genuinely the primary search language here, more so than Montreal's bilingual balance, and indexing issues on the French version matter most.",
      "Pricing is quoted in CAD, typically CAD 130 to CAD 2,000.",
    ],
    'faqs' => [
      ['q' => "Is a French-first audit different from checking an English site with French added?", 'a' => "Yes -- we audit the French version as the primary site here, not as a secondary translation, since that's genuinely how the local search market works."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 130-2,000, quoted in CAD."],
      ['q' => "Do you audit tourism sites in Old Quebec too?", 'a' => "Yes -- given the city's strong heritage-tourism sector, this is a common request."],
    ],
    'layout' => 'B',
  ],

  // ===== Australia cities (7) =====
  'website-auditing-sydney' => [
    'intro_heading' => "Auditing Sydney Sites Amid Australia's Densest Corporate Competition",
    'intro' => [
      "Sydney's finance and corporate sites compete in Australia's most crowded market, where established competitors have usually already fixed the obvious problems -- an audit here tends to surface smaller, more specific gaps still worth the fix.",
      "Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Is a Sydney audit finding smaller issues just because the market is more competitive?", 'a' => "Often yes -- established Sydney competitors have already handled the obvious fixes, so audits here tend to surface smaller, more specific gaps that still matter given how contested rankings are."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-melbourne' => [
    'intro_heading' => "Auditing Melbourne Sites for Independent Retail and Education Businesses",
    'intro' => [
      "Melbourne's independent retail and hospitality small businesses often built a simple site years ago and never checked it since, while education-adjacent providers usually need their enrollment-flow pages checked for basic conversion friction.",
      "We audit for whichever applies to your business. Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Do you audit older, simple sites for independent Melbourne retailers?", 'a' => "Yes -- these often haven't been checked since launch, and basic performance/security fixes tend to have a real, quick impact."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "Do you check enrollment/education-provider pages specifically?", 'a' => "Yes -- funnel drop-off and form friction are reviewed closely for education-adjacent sites."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-brisbane' => [
    'intro_heading' => "Auditing Brisbane Sites in a Growing, Less-Crowded Market",
    'intro' => [
      "Brisbane businesses benefit from a genuinely growing market with less competition than Sydney or Melbourne -- an audit's fixes tend to translate into ranking movement faster here, precisely because fewer competitors are also doing this work.",
      "Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Do audit fixes work faster in a less competitive market like Brisbane?", 'a' => "Often yes -- with fewer competitors actively auditing and fixing their own sites, changes here tend to show up in rankings sooner than in Sydney or Melbourne."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "How long until we see the impact of fixes?", 'a' => "Technical fixes can show movement in 4-8 weeks; more competitive terms take longer even in a growing market like Brisbane's."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-gold-coast' => [
    'intro_heading' => "Auditing Gold Coast Sites Before Peak Booking Season Hits",
    'intro' => [
      "Gold Coast's tourism and holiday-property sites face a real seasonal stress test -- a booking flow or page-speed issue that goes unnoticed most of the year gets exposed exactly when peak-season traffic and booking volume spike.",
      "We audit ahead of that seasonal pressure specifically. Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Should tourism/property businesses audit before peak season?", 'a' => "Yes -- booking-flow or performance issues that go unnoticed most of the year tend to surface right when peak-season traffic and bookings spike, so checking beforehand is worth it."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "Do you check the booking flow specifically?", 'a' => "Yes -- funnel drop-off and form friction in the booking process are a core part of the UX section."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-perth' => [
    'intro_heading' => "Auditing Perth Sites for the Mining and Resources Sector",
    'intro' => [
      "Perth's mining and resources-sector B2B sites are often research destinations for institutional buyers and partners -- a broken document download or unclear capability page is a bigger credibility risk here than on a typical consumer site.",
      "Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Do you audit for institutional-buyer credibility specifically?", 'a' => "Yes -- for Perth's mining and resources-sector sites, broken downloads or unclear capability pages are flagged as real credibility risk given the institutional audience."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "Is Perth's market less competitive than Sydney or Melbourne?", 'a' => "Generally yes, which can make audit fixes translate into ranking movement somewhat faster."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-adelaide' => [
    'intro_heading' => "Auditing Adelaide Sites Across Defense-Adjacent and Wine-Tourism Types",
    'intro' => [
      "Adelaide's defense-adjacent suppliers need a formal, security-conscious technical review, while its wine-region tourism and export businesses need booking-flow and mobile-visitor performance checked -- two quite different audit briefs.",
      "We scope accordingly. Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Is a defense-adjacent supplier's audit different from a wine-tourism business's?", 'a' => "Yes -- defense-adjacent suppliers get a more security-focused review, while wine-tourism businesses are checked more on booking-flow and mobile performance."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime and security patching are covered ongoing."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-canberra' => [
    'intro_heading' => "Auditing Canberra Sites Against Government-Contractor Security Standards",
    'intro' => [
      "Canberra's government contractors need a security and accessibility review closer to public-sector expectations than a typical commercial audit -- an exposed file or accessibility gap carries more real weight given the client base here.",
      "Pricing is quoted in AUD, typically AUD 180 to AUD 2,500.",
    ],
    'faqs' => [
      ['q' => "Do government-contractor sites in Canberra need a stricter security check?", 'a' => "Yes -- security and accessibility get more weight here given the client base, closer to public-sector expectations than a typical commercial audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 180-2,500, quoted in AUD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],

  // ===== New Zealand cities (3) =====
  'website-auditing-auckland' => [
    'intro_heading' => "Auditing Auckland Sites for NZ's Dominant Commercial Hub",
    'intro' => [
      "Auckland's commercial and finance-adjacent sites need to project the scale credibility expected of NZ's dominant business hub -- a dated design or slow page reads as a bigger mismatch here than in a smaller regional market.",
      "Pricing is quoted in NZD, typically NZD 180 to NZD 2,500. Auckland is 6.5-7.5 hours ahead of IST, which works well for scheduling the walkthrough call in Auckland's afternoon.",
    ],
    'faqs' => [
      ['q' => "Does the audit weight credibility more heavily for Auckland's commercial hub audience?", 'a' => "Yes -- given Auckland's role as NZ's dominant commercial and finance hub, a dated or slow site reads as a bigger credibility mismatch than it might elsewhere."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 180-2,500, quoted in NZD."],
      ['q' => "How does the time difference affect the walkthrough call?", 'a' => "Auckland is 6.5-7.5 hours ahead of IST -- we schedule for Auckland's afternoon, which works well in practice."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-wellington' => [
    'intro_heading' => "Auditing Wellington Sites Across Government and Film-Industry Types",
    'intro' => [
      "Wellington's government-adjacent sites need a formal, accessibility-conscious review, while its \"Wellywood\" film-production-adjacent sites are usually more visually heavy and need performance checked against genuinely large image and video assets.",
      "Pricing is quoted in NZD, typically NZD 180 to NZD 2,500.",
    ],
    'faqs' => [
      ['q' => "Is a government-adjacent audit different from a film-production one in Wellington?", 'a' => "Yes -- government-adjacent sites get more accessibility and formality checks, while film-production-adjacent sites are checked more for heavy media performance."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 180-2,500, quoted in NZD."],
      ['q' => "How does the time zone affect the walkthrough call?", 'a' => "Wellington is 6.5-7.5 hours ahead of IST -- we schedule for Wellington's afternoon, which works well for review calls."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-christchurch' => [
    'intro_heading' => "Auditing Christchurch Sites From the Agribusiness and Post-Rebuild Tech Scene",
    'intro' => [
      "Christchurch's agribusiness sites are often older and never revisited, while the city's newer post-rebuild agritech startups usually have the opposite issue -- a modern build that's never had a proper security or performance check.",
      "Pricing is quoted in NZD, typically NZD 180 to NZD 2,500.",
    ],
    'faqs' => [
      ['q' => "Do older agribusiness sites and newer agritech sites need different audits?", 'a' => "Yes -- older agribusiness sites are checked more for accumulated technical debt, while newer agritech builds are checked more for security and performance despite looking modern."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 180-2,500, quoted in NZD."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],

  // ===== Russia cities (2) =====
  'website-auditing-moscow' => [
    'intro_heading' => "Auditing Moscow Sites for Corporate-Adjacent Credibility",
    'intro' => [
      "Moscow's corporate-adjacent and e-commerce sites need a review focused on clean, credible presentation matching the scale of the corporate players concentrated in the city, alongside the standard technical and security check.",
      "Given current cross-border payment complexity for Russia, pricing is quoted and settled in USD, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD rather than rubles?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable, confirmed upfront during discovery."],
      ['q' => "Do you audit e-commerce sites in Moscow specifically?", 'a' => "Yes -- product and category-page technical checks are common alongside the general corporate-adjacent credibility review."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, with payment terms confirmed upfront."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-saint-petersburg' => [
    'intro_heading' => "Auditing Saint Petersburg Sites Across Trade, Tourism and Tech",
    'intro' => [
      "Saint Petersburg's trade/logistics sites need straightforward reliability checks, its large cultural-tourism sector needs performance checked against real seasonal traffic spikes, and its growing tech scene wants a modern security review -- three different priorities from one city.",
      "As with Moscow, pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable, confirmed upfront."],
      ['q' => "Do you audit tourism sites for seasonal traffic readiness?", 'a' => "Yes -- given the city's large cultural-tourism sector, performance under seasonal traffic spikes is checked closely."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 100-1,500, with payment terms confirmed upfront."],
    ],
    'layout' => 'B',
  ],

  // ===== South Africa cities (3) =====
  'website-auditing-cape-town' => [
    'intro_heading' => "Auditing Cape Town Sites Between Silicon Cape and Tourism",
    'intro' => [
      "Cape Town's \"Silicon Cape\" tech startups need a modern security and performance review as they scale, while its tourism and hospitality businesses need booking-flow and seasonal-traffic readiness checked -- two distinct audit briefs from the same city.",
      "Pricing is quoted in ZAR, typically ZAR 1,500 to ZAR 25,000. Cape Town is 3.5 hours ahead of IST, a comfortable overlap for the walkthrough call.",
    ],
    'faqs' => [
      ['q' => "Is a tech startup's audit different from a tourism business's in Cape Town?", 'a' => "Yes -- startups are checked more on security and scaling readiness, while tourism/hospitality businesses are checked more on booking-flow and seasonal-traffic performance."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 1,500-25,000, in ZAR."],
      ['q' => "How does the time zone work for the walkthrough call?", 'a' => "Cape Town is 3.5 hours ahead of IST, a comfortable overlap for scheduling."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-johannesburg' => [
    'intro_heading' => "Auditing Johannesburg Sites for Financial and Mining-HQ Credibility",
    'intro' => [
      "Johannesburg's financial-services and mining-industry headquarters need a site audit that matches the scale and credibility of the corporates concentrated here -- a dated design or slow page is a bigger mismatch than in a smaller market.",
      "Pricing is quoted in ZAR, typically ZAR 1,500 to ZAR 25,000.",
    ],
    'faqs' => [
      ['q' => "Does the audit weight credibility more heavily given Johannesburg's corporate concentration?", 'a' => "Yes -- given the density of financial-services and mining-industry headquarters here, credibility-affecting issues are weighted more heavily than in a smaller market."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 1,500-25,000, in ZAR."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-durban' => [
    'intro_heading' => "Auditing Durban Sites for Africa's Busiest Port Logistics Base",
    'intro' => [
      "Durban's port-logistics and manufacturing B2B sites need a straightforward reliability and uptime check -- given Durban's role as Africa's busiest port, an unreliable site is a bigger operational credibility risk than a purely cosmetic one.",
      "Pricing is quoted in ZAR, typically ZAR 1,500 to ZAR 25,000.",
    ],
    'faqs' => [
      ['q' => "Does uptime matter more for Durban's port-logistics sites?", 'a' => "Arguably yes -- given the operational nature of Durban's port-logistics and manufacturing client base, reliability is weighted heavily alongside the usual checks."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 1,500-25,000, in ZAR."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime monitoring is covered on an ongoing basis."],
    ],
    'layout' => 'A',
  ],

  // ===== Saudi Arabia cities (3) =====
  'website-auditing-riyadh' => [
    'intro_heading' => "Auditing Riyadh Sites Through Vision 2030's Digitization Push",
    'intro' => [
      "Riyadh's newer e-commerce businesses, riding Vision 2030's retail digitization, often have security gaps typical of a site launched quickly to capture growth, while established corporate and government-adjacent sites need the more traditional bilingual credibility check.",
      "Pricing is quoted in SAR, typically SAR 500 to SAR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do newer e-commerce sites in Riyadh have specific audit risks?", 'a' => "Often yes -- sites launched quickly to capture Vision 2030-driven growth commonly have security gaps that a full audit catches before they become a real problem."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 500-6,000, in SAR."],
      ['q' => "Do you check both Arabic and English versions?", 'a' => "Yes -- bilingual indexing checks are a standard and often essential part of a Riyadh audit."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-jeddah' => [
    'intro_heading' => "Auditing Jeddah Sites for a Historic Trading Port and Growing Tourism Sector",
    'intro' => [
      "Jeddah's trading businesses need bilingual indexing and reliability checked given the city's centuries-old commercial-gateway role, while a growing Red Sea tourism sector adds a newer need: booking-flow and mobile performance for visitor-facing sites.",
      "Pricing is quoted in SAR, typically SAR 500 to SAR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do you check both Arabic and English pages for trading businesses?", 'a' => "Yes -- bilingual keyword and indexing checks are a standard and often essential part of a Jeddah audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 500-6,000, in SAR."],
      ['q' => "Do you audit tourism-related sites too?", 'a' => "Yes -- given Jeddah's growing Red Sea tourism sector, booking-flow and mobile performance checks are an increasingly common request."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-dammam' => [
    'intro_heading' => "Auditing Dammam Sites for the Oil, Energy and Petrochemical Sector",
    'intro' => [
      "Dammam's energy and petrochemical-adjacent B2B sites are often research destinations for institutional and industrial buyers -- a broken capability page or unclear technical specs carries more real credibility risk here than a purely cosmetic issue would.",
      "Pricing is quoted in SAR, typically SAR 500 to SAR 6,000.",
    ],
    'faqs' => [
      ['q' => "Do industrial buyers actually notice site issues in Dammam?", 'a' => "Often yes -- given the region's industrial B2B audience, a broken capability page or unclear technical spec is a real credibility risk, not just a cosmetic issue."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 500-6,000, in SAR."],
      ['q' => "Can you check Arabic and English versions?", 'a' => "Yes -- bilingual indexing is checked as a standard part of the audit."],
    ],
    'layout' => 'B',
  ],

  // ===== UAE cities (2) =====
  'website-auditing-abu-dhabi' => [
    'intro_heading' => "Auditing Abu Dhabi Sites for Government Credibility and Growing Tourism",
    'intro' => [
      "Abu Dhabi's government-adjacent institutions need a formal, credible site review, while the city's growing cultural-tourism investment means newer, content-heavy tourism pages need a performance check they likely haven't had yet.",
      "Pricing is quoted in AED, typically AED 500 to AED 6,000.",
    ],
    'faqs' => [
      ['q' => "Do government-adjacent Abu Dhabi sites need a different audit emphasis?", 'a' => "Yes -- formality, accuracy and credibility get more weight for Abu Dhabi's government-adjacent client base than for a typical commercial audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 500-6,000, in AED."],
      ['q' => "Do you audit new tourism-focused content pages?", 'a' => "Yes -- given the city's growing cultural-tourism investment, newer content-heavy pages are checked closely for performance."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-sharjah' => [
    'intro_heading' => "Auditing Sharjah Sites for an Industrial, Traditional Business Culture",
    'intro' => [
      "Sharjah's industrial and manufacturing B2B sites reflect a more traditional business culture than nearby Dubai -- the audit here typically finds straightforward technical debt rather than anything cutting-edge, which usually makes the fixes quicker and cheaper.",
      "Pricing is quoted in AED, typically AED 500 to AED 6,000.",
    ],
    'faqs' => [
      ['q' => "Are Sharjah audits typically quicker to fix than more cutting-edge sites elsewhere?", 'a' => "Often yes -- Sharjah's more traditional industrial sites tend to have straightforward technical debt rather than complex issues, which usually makes fixes faster and cheaper."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 500-6,000, in AED."],
      ['q' => "Can you check Arabic and English keyword targeting?", 'a' => "Yes -- bilingual indexing is checked as a standard part of the audit."],
    ],
    'layout' => 'B',
  ],

  // ===== Switzerland cities (3) =====
  'website-auditing-zurich' => [
    'intro_heading' => "Auditing Zurich Sites to Banking-Grade Precision Standards",
    'intro' => [
      "Zurich's banking and fintech-adjacent sites are held to an exacting precision standard by their audience -- an audit here needs to be just as thorough, since a factual error or security gap is a bigger credibility problem here than almost anywhere else.",
      "Pricing is quoted in CHF, typically CHF 180 to CHF 2,600.",
    ],
    'faqs' => [
      ['q' => "Does the audit need to be more thorough for Zurich banking/fintech clients?", 'a' => "Yes -- given the precision standard Zurich clients expect from every part of their business, the audit is held to the same exacting bar, especially on security and content accuracy."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 180-2,600, in CHF."],
      ['q' => "Do you check software versions and vulnerabilities closely?", 'a' => "Yes -- security is checked especially thoroughly given the banking and fintech-adjacent audience."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-geneva' => [
    'intro_heading' => "Auditing Geneva Sites Across Both French and English Content",
    'intro' => [
      "Geneva's international-organization and private banking sites often have bilingual French/English content that needs checking separately for indexing gaps, alongside the formal, understated credibility review this audience expects.",
      "Pricing is quoted in CHF, typically CHF 180 to CHF 2,600.",
    ],
    'faqs' => [
      ['q' => "Do you check French and English content separately?", 'a' => "Yes -- bilingual indexing checks are a common and explicitly-scoped part of a Geneva audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 180-2,600, in CHF."],
      ['q' => "Do you audit private banking or institutional sites?", 'a' => "Yes -- formal, understated credibility review suited to Geneva's private banking and international-organization concentration is a common request."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-zug' => [
    'intro_heading' => "Auditing Zug Sites Where Crypto Businesses Are a Real Security Target",
    'intro' => [
      "Zug's \"Crypto Valley\" companies are genuine security targets in a way a typical corporate site isn't -- a vulnerability audit here carries real weight, alongside the credibility review the canton's international corporate headquarters expect.",
      "Pricing is quoted in CHF, typically CHF 180 to CHF 2,600.",
    ],
    'faqs' => [
      ['q' => "Are crypto/blockchain sites in Zug a bigger security risk than typical sites?", 'a' => "Often yes -- crypto-adjacent businesses are more frequent targets, so vulnerability scanning and software-version checks get real weight in a Zug audit."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 180-2,600, in CHF."],
      ['q' => "Do you also audit traditional international corporate sites here?", 'a' => "Yes -- these get more of a formal credibility review, reflecting the international headquarters the canton attracts."],
    ],
    'layout' => 'A',
  ],

  // ===== Germany cities (3) =====
  'website-auditing-berlin' => [
    'intro_heading' => "Auditing Berlin Sites Built Fast in a Startup Culture",
    'intro' => [
      "Berlin's large startup scene tends to ship fast and iterate constantly, which means technical debt and unpatched dependencies accumulate quickly in ways a busy team rarely circles back to check -- exactly what a periodic audit is for.",
      "Pricing is quoted in EUR, typically EUR 130 to EUR 2,000.",
    ],
    'faqs' => [
      ['q' => "Do fast-moving Berlin startups accumulate audit-worthy technical debt quickly?", 'a' => "Yes -- shipping fast and iterating constantly is common in Berlin's startup scene, and it means technical debt and unpatched dependencies build up faster than a busy team usually notices."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 130-2,000, in EUR."],
      ['q' => "Do you check for outdated dependencies and plugins?", 'a' => "Yes -- software version checks are a core part of the security section."],
    ],
    'layout' => 'B',
  ],
  'website-auditing-munich' => [
    'intro_heading' => "Auditing Munich Sites to a Precision-Focused Engineering Standard",
    'intro' => [
      "Munich's corporate headquarters and engineering firms expect thorough, technically accurate work in every part of their business -- an audit here is held to that same precision standard, checking every claim and technical detail carefully rather than skimming for obvious issues.",
      "Pricing is quoted in EUR, typically EUR 130 to EUR 2,000.",
    ],
    'faqs' => [
      ['q' => "Is the audit more thorough for Munich's engineering-focused clients?", 'a' => "Yes -- reflecting the precision-focused culture of the corporate headquarters concentrated here, we check every technical detail carefully rather than just skimming for obvious problems."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 130-2,000, in EUR."],
      ['q' => "How long does the audit take?", 'a' => "Most are delivered within 3-5 business days, followed by a walkthrough call."],
    ],
    'layout' => 'A',
  ],
  'website-auditing-hamburg' => [
    'intro_heading' => "Auditing Hamburg Sites Across Port Logistics and Media Types",
    'intro' => [
      "Hamburg's port/logistics sites need a straightforward reliability and uptime check, while its media/publishing-adjacent businesses need content-heavy pages checked for load speed and structured data -- two different audit briefs from the same city.",
      "Pricing is quoted in EUR, typically EUR 130 to EUR 2,000.",
    ],
    'faqs' => [
      ['q' => "Is a logistics site audit different from a media/publishing one in Hamburg?", 'a' => "Yes -- logistics sites are checked more for reliability and uptime, while media/publishing sites are checked more for content-heavy page speed and structured data."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 130-2,000, in EUR."],
      ['q' => "Do you offer ongoing monitoring after the audit?", 'a' => "Yes, through our website maintenance plans -- uptime and security patching are covered ongoing."],
    ],
    'layout' => 'B',
  ],
];
