<?php
// Unique per-page content layer for service-crm.php (added 2026-07-23 to fix
// GSC flagging crm-development-* pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix). Reuses the real local-industry
// facts already established for the web-developer-* location pages, angled
// toward CRM/sales-process reasoning specific to each market.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
return [
  // ===== Country pages =====
  'crm-development-usa' => [
    'intro_heading' => "CRM Built for How US SaaS and Services Businesses Actually Sell",
    'intro' => [
      "US businesses buying a CRM tend to fall into two camps: SaaS companies needing a pipeline that matches a subscription sales motion (trials, demos, renewals), and services/agency businesses needing something simpler that just tracks leads through to a signed contract. Off-the-shelf CRMs default to a generic B2B sales funnel that fits neither well without real customization.",
      "US clients typically already have a stack (email, calendar, payment processor, maybe a marketing tool) they want the CRM talking to, rather than replacing. Pricing is quoted in USD, with most US CRM projects ranging from USD 300 to USD 15,000 depending on how much custom automation and integration is involved.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for SaaS subscription sales specifically?", 'a' => "Yes -- trial/demo/renewal-stage pipelines are a common US request, distinct from the simpler lead-to-contract flow a services business typically needs."],
      ['q' => "Can the CRM integrate with tools we already use?", 'a' => "Yes -- connecting to your existing email, calendar, payment processor or marketing tool is usually the priority over replacing your whole stack."],
      ['q' => "What's the typical cost for a US CRM project?", 'a' => "Most range USD 300-15,000 depending on how much custom automation and integration is involved, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-uk' => [
    'intro_heading' => "CRM Built for UK Fintech Compliance and Professional-Services Workflows",
    'intro' => [
      "UK businesses buying a CRM often need it to handle something off-the-shelf tools don't do well out of the box: fields and workflows that reflect UK-specific compliance requirements (particularly for fintech-adjacent and financial-services clients), or a professional-services intake process that's more formal than a typical sales pipeline.",
      "London's professional-services density means many UK CRM clients also want reporting that looks credible to their own clients or partners, not just internal tracking. Pricing is quoted in GBP, with most UK CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Can you build compliance-aware fields for financial-services clients?", 'a' => "Yes -- UK fintech-adjacent and financial-services clients often need specific fields/workflows reflecting compliance requirements, which we scope during discovery."],
      ['q' => "Do you work with professional-services firms specifically?", 'a' => "Yes -- a more formal intake/pipeline process than a typical sales CRM is a common UK professional-services request."],
      ['q' => "What's the typical cost?", 'a' => "Most UK CRM projects range GBP 250-12,000, quoted in GBP."],
    ],
    'layout' => 'B',
  ],
  'crm-development-india' => [
    'intro_heading' => "Affordable CRM Customization for Indian Startups and SMEs",
    'intro' => [
      "Most Indian businesses asking for CRM work aren't starting from scratch -- they're already on Zoho, a spreadsheet system, or a half-implemented free CRM that never got properly customized to their actual sales process. The ask is usually specific: fix the pipeline stages to match reality, automate the follow-up reminders someone's currently doing manually, and make the reporting actually usable.",
      "Indian startups and SMEs are price-sensitive about ongoing software costs, which is part of why CRM customization (rather than a fully custom build) is often the better fit here -- lower upfront cost, faster delivery. Pricing is transparent in INR, with most projects ranging from INR 15,000 to INR 6,00,000 depending on scope.",
    ],
    'faqs' => [
      ['q' => "We already use Zoho/a free CRM -- can you just fix it instead of starting over?", 'a' => "Yes -- customizing an existing CRM to match your real sales process is usually faster and cheaper than a full rebuild, and it's the more common request from Indian businesses."],
      ['q' => "Is a custom CRM build ever worth it for a smaller Indian business?", 'a' => "Sometimes, if your process genuinely doesn't fit any existing CRM's structure or you want to avoid ongoing per-seat costs entirely -- we'll tell you honestly which makes more sense for your situation."],
      ['q' => "What's the typical cost?", 'a' => "Most Indian CRM projects range INR 15,000-6,00,000 depending on scope, quoted transparently before starting."],
    ],
    'layout' => 'A',
  ],
  'crm-development-uae' => [
    'intro_heading' => "CRM Development for UAE Real Estate and Trading Sales Cycles",
    'intro' => [
      "UAE CRM requests concentrate heavily around real estate (tracking property leads through a longer, higher-value sales cycle than most industries) and trading companies managing relationships with international buyers across multiple time zones and sometimes multiple languages. Both need a pipeline shaped differently from a generic SaaS sales CRM.",
      "Arabic/English bilingual support is a common and explicitly-scoped requirement for UAE CRM builds, not an afterthought translation layer. Pricing is quoted in AED, with most UAE CRM projects ranging from AED 1,500 to AED 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for real estate lead tracking?", 'a' => "Yes -- longer, higher-value property sales cycles are a common UAE CRM request, needing different pipeline stages than a typical short sales cycle."],
      ['q' => "Can the CRM support both Arabic and English?", 'a' => "Yes -- bilingual support is commonly and explicitly scoped for UAE clients, built in properly rather than added as an afterthought."],
      ['q' => "What's the typical cost?", 'a' => "Most UAE CRM projects range AED 1,500-60,000, quoted in AED."],
    ],
    'layout' => 'B',
  ],
  'crm-development-canada' => [
    'intro_heading' => "CRM Development for Canada's Diverse Small Business and Professional-Services Base",
    'intro' => [
      "Canadian CRM requests span a genuinely wide range -- Toronto's immigrant-founder-heavy small business community, professional-services firms wanting formal intake processes, and a smaller but real French-speaking Quebec market needing bilingual CRM interfaces. Each needs the pipeline shaped around a different sales motion.",
      "Canadian clients tend to want the CRM connected to whatever payment and invoicing tools they already use rather than replacing them. Pricing is quoted in CAD, with most Canadian CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Can you build a bilingual French/English CRM for Quebec clients?", 'a' => "Yes -- bilingual CRM interfaces are a specific and common request from Quebec-based Canadian clients."],
      ['q' => "Do you integrate with Canadian payment/invoicing tools?", 'a' => "Yes -- connecting to whatever payment and invoicing systems you already use is usually the priority over replacing your stack."],
      ['q' => "What's the typical cost?", 'a' => "Most Canadian CRM projects range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-australia' => [
    'intro_heading' => "CRM Development for Australia's Real Estate and Professional-Services Market",
    'intro' => [
      "Australian CRM requests concentrate around real estate (Sydney and Melbourne's fast-moving property markets need quick lead response tracking) and professional-services firms wanting credible, established-looking reporting to match Australia's corporate-heavy major cities. A Perth mining-services business, by contrast, usually wants something simpler focused on B2B contract tracking.",
      "Australian clients typically want the CRM to work well on mobile, since agents and consultants are often checking leads from the field, not a desk. Pricing is quoted in AUD, with most Australian CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for real estate agents in Sydney/Melbourne?", 'a' => "Yes -- fast lead response tracking suited to Australia's quick-moving property markets is a common request."],
      ['q' => "Does the CRM work well on mobile for field use?", 'a' => "Yes -- mobile usability is typically prioritized since agents and consultants often check leads away from a desk."],
      ['q' => "What's the typical cost?", 'a' => "Most Australian CRM projects range AUD 500-20,000, quoted in AUD."],
    ],
    'layout' => 'B',
  ],

  // ===== USA cities =====
  'crm-development-california' => [
    'intro_heading' => "CRM Development for California's SaaS and Retail Sales Motions",
    'intro' => [
      "California CRM requests split between Bay Area-adjacent SaaS companies needing trial/demo-stage pipeline automation, and retail/services businesses across the rest of the state needing something simpler. The SaaS side usually wants integration with a product-usage or billing tool; the retail side usually just wants leads tracked reliably without the CRM itself becoming a chore.",
      "California's competitive tech market means SaaS clients here expect the CRM itself to feel modern, not clunky. Pricing is quoted in USD, with most California CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for SaaS trial/demo pipelines in California?", 'a' => "Yes -- trial and demo-stage automation is a common request from Bay Area-adjacent SaaS clients specifically."],
      ['q' => "What about simpler retail or services businesses?", 'a' => "Yes -- a simpler, reliable lead-tracking setup without unnecessary complexity is just as common a California request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-new-york' => [
    'intro_heading' => "CRM Development for New York's Finance and Professional-Services Firms",
    'intro' => [
      "New York CRM clients skew toward finance-adjacent and professional-services firms wanting a pipeline that reflects a more formal, relationship-driven sales process than a typical transactional CRM assumes -- tracking a contact through multiple touchpoints over months, not a quick lead-to-close cycle.",
      "New York's competitive market means clients want reporting that looks credible if a partner or client ever sees it. Pricing is quoted in USD, with most New York CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for relationship-driven, longer sales cycles?", 'a' => "Yes -- tracking a contact through multiple touchpoints over months, rather than a quick transactional cycle, is a common New York finance/professional-services request."],
      ['q' => "Does the reporting look presentable to clients or partners?", 'a' => "Yes -- credible-looking reporting is typically a priority given New York's professional-services standards."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'B',
  ],
  'crm-development-washington' => [
    'intro_heading' => "CRM Development for Washington State's Tech-Adjacent Sales Teams",
    'intro' => [
      "Washington State CRM requests carry some of the same tech-sector influence as the rest of the region -- clients expect a modern, well-integrated system even when the business itself isn't software. Integration with existing tools matters more here than a from-scratch feature list.",
      "Pricing is quoted in USD, with most Washington CRM projects ranging from USD 300 to USD 15,000 depending on integration scope.",
    ],
    'faqs' => [
      ['q' => "Does Washington's tech scene affect what's expected of a CRM build?", 'a' => "Somewhat -- clients tend to expect a modern, well-integrated system even outside the tech sector itself, given the local bar set by nearby tech companies."],
      ['q' => "What tools does the CRM typically need to connect to?", 'a' => "Whatever you already use for email, calendar and payments -- integration is usually the priority over a long feature list."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-texas' => [
    'intro_heading' => "CRM Development for Texas's Energy and Logistics Sales Pipelines",
    'intro' => [
      "Texas CRM requests often come from energy-services and logistics businesses needing a pipeline built around long B2B sales cycles and contract renewals, quite different from a typical consumer-facing sales CRM. Dallas-based finance and telecom firms add a second, more traditional B2B request type to the mix.",
      "Pricing is quoted in USD, with most Texas CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for long B2B sales cycles like energy or logistics?", 'a' => "Yes -- contract renewal tracking and long sales-cycle pipelines are common requests from Texas's energy-services and logistics businesses."],
      ['q' => "What about more standard B2B businesses in Dallas?", 'a' => "Also common -- a more typical B2B pipeline suits Dallas's finance and telecom-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'B',
  ],
  'crm-development-virginia' => [
    'intro_heading' => "CRM Development for Northern Virginia's Government-Contracting Pipelines",
    'intro' => [
      "Northern Virginia CRM requests frequently come from government contractors needing a pipeline that tracks opportunities through a formal proposal/bid process, quite different from a typical sales funnel -- stages like RFP response, past-performance documentation and contract award tracking matter more than typical lead-nurture stages.",
      "Pricing is quoted in USD, with most Virginia CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for government contracting pipelines?", 'a' => "Yes -- RFP/bid-stage tracking and past-performance documentation are common Northern Virginia requests, distinct from a typical sales pipeline."],
      ['q' => "Is this different from a standard sales CRM?", 'a' => "Yes -- the stages and fields are shaped around a formal proposal/bid process rather than a typical lead-nurture funnel."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-delaware' => [
    'intro_heading' => "CRM Development for Delaware's Financial and Corporate-Services Firms",
    'intro' => [
      "Delaware CRM clients are often financial-services or corporate-services firms wanting clean, credible pipeline reporting given the concentration of banking-adjacent businesses in Wilmington -- clarity and correctness matter more here than flashy dashboards.",
      "Pricing is quoted in USD, with most Delaware CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with financial-services firms in Delaware?", 'a' => "Yes -- clean, credible pipeline reporting is a common priority given Delaware's concentration of banking-adjacent businesses."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "How long does a CRM build typically take?", 'a' => "A focused customization is usually 2-4 weeks; a fully custom build ranges 4-10 weeks depending on scope."],
    ],
    'layout' => 'B',
  ],
  'crm-development-los-angeles' => [
    'intro_heading' => "CRM Development for LA's Entertainment-Adjacent and Retail Businesses",
    'intro' => [
      "LA CRM requests often come from entertainment-adjacent and creative-services businesses needing a pipeline that tracks project-based work (a production, a campaign) rather than a straightforward recurring sales cycle, alongside more standard retail and services CRM needs.",
      "Pricing is quoted in USD, with most LA CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build project-based CRMs for entertainment-adjacent businesses?", 'a' => "Yes -- tracking project-based work (a production, a campaign) rather than a recurring sales cycle is a common LA request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Can the CRM integrate with our existing tools?", 'a' => "Yes -- connecting to your existing email, calendar and payment tools is usually the priority over replacing your whole stack."],
    ],
    'layout' => 'A',
  ],
  'crm-development-chicago' => [
    'intro_heading' => "CRM Development for Chicago's Manufacturing and Logistics B2B Pipelines",
    'intro' => [
      "Chicago CRM requests often come from manufacturing and logistics B2B businesses needing a pipeline built around account-based selling -- tracking a company account through multiple contacts and a longer decision process, rather than one-to-one lead tracking.",
      "Pricing is quoted in USD, with most Chicago CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build account-based CRMs for manufacturing/logistics B2B sales?", 'a' => "Yes -- tracking a company account through multiple contacts and a longer decision process is a common Chicago request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Do you handle data migration from our current system?", 'a' => "Yes -- migrating and validating data from spreadsheets or a legacy CRM is part of the build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-houston' => [
    'intro_heading' => "CRM Development for Houston's Energy Sector and Medical Practices",
    'intro' => [
      "Houston CRM requests split between energy-services companies needing long B2B sales-cycle tracking and medical-adjacent practices needing patient-relationship and referral tracking -- two genuinely different CRM briefs from the same city.",
      "Pricing is quoted in USD, with most Houston CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for energy-services or medical-practice referral tracking?", 'a' => "Both are common Houston request types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-dallas' => [
    'intro_heading' => "CRM Development for Dallas's Finance, Telecom and Logistics Sector",
    'intro' => [
      "Dallas CRM clients are typically finance, telecom or logistics-adjacent B2B businesses wanting a pipeline that projects scale and reliability -- clear account tracking and reporting that reads credibly to a corporate buyer.",
      "Pricing is quoted in USD, with most Dallas CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for B2B logistics or telecom businesses?", 'a' => "Yes -- clear account tracking and credible reporting for a corporate buyer audience is a common Dallas request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Can you integrate with WhatsApp or our website's lead forms?", 'a' => "Yes -- connecting lead sources directly to the CRM so nothing gets lost in inboxes is a common integration."],
    ],
    'layout' => 'B',
  ],
  'crm-development-phoenix' => [
    'intro_heading' => "CRM Development for Phoenix's Fast-Moving Real Estate Market",
    'intro' => [
      "Phoenix CRM requests are heavily driven by the city's fast-growing real estate and home-services market, needing quick lead-response tracking since properties and service calls move fast here compared to slower-growth markets.",
      "Pricing is quoted in USD, with most Phoenix CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build fast-response CRMs for real estate or home services?", 'a' => "Yes -- given Phoenix's fast-moving market, quick lead-response tracking and automated follow-up are common priorities."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Do you handle workflow automation like follow-up reminders?", 'a' => "Yes -- automatic follow-up reminders and lead assignment are common requests here specifically."],
    ],
    'layout' => 'A',
  ],
  'crm-development-san-diego' => [
    'intro_heading' => "CRM Development for San Diego's Biotech and Life-Sciences Sales Cycles",
    'intro' => [
      "San Diego CRM requests often come from biotech-adjacent services businesses needing a pipeline that tracks a longer, more technical sales/partnership process, distinct from a typical consumer sales cycle -- fields for research stage, regulatory status or partnership type are common asks.",
      "Pricing is quoted in USD, with most San Diego CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for biotech or life-sciences-adjacent partnership tracking?", 'a' => "Yes -- longer, more technical partnership/sales cycles with custom fields (research stage, regulatory status) are a common San Diego request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Can you customize Salesforce or HubSpot instead of building from scratch?", 'a' => "Yes -- customizing an existing platform is often faster and cheaper than a full custom build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-philadelphia' => [
    'intro_heading' => "CRM Development for Philadelphia's Healthcare and Education Sector",
    'intro' => [
      "Philadelphia CRM requests frequently come from healthcare-adjacent practices needing patient/referral relationship tracking, and education-adjacent service providers needing enrollment or admissions-style pipeline tracking -- both quite different from a standard sales CRM.",
      "Pricing is quoted in USD, with most Philadelphia CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for healthcare practices or education providers?", 'a' => "Yes -- patient/referral tracking and admissions-style pipelines are common Philadelphia requests, given the city's dense healthcare and education sectors."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
      ['q' => "Do you provide ongoing support after the CRM launches?", 'a' => "Yes -- bug fixes, new modules and adjustments as your process evolves are covered."],
    ],
    'layout' => 'A',
  ],
  'crm-development-miami' => [
    'intro_heading' => "CRM Development for Miami's Bilingual Trade and Real Estate Market",
    'intro' => [
      "Miami CRM clients often need bilingual (English/Spanish) support built into the CRM itself, given the city's role as a Latin America trade gateway, alongside real estate businesses needing fast lead-response tracking for a famously quick-moving property market.",
      "Pricing is quoted in USD, with most Miami CRM projects ranging from USD 300 to USD 15,000.",
    ],
    'faqs' => [
      ['q' => "Can the CRM support bilingual English/Spanish use?", 'a' => "Yes -- bilingual support is a common and explicitly-scoped Miami request, given the city's Latin America trade connections."],
      ['q' => "Do you build for real estate lead tracking?", 'a' => "Yes -- fast lead-response tracking suited to Miami's quick-moving property market is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD."],
    ],
    'layout' => 'B',
  ],
  'crm-development-manhattan' => [
    'intro_heading' => "CRM Development for Manhattan's Dense Corporate and Finance Sector",
    'intro' => [
      "Manhattan CRM clients tend to want a system that projects more scale and polish than the underlying business's size, given the dense corporate environment they compete in -- credible reporting and a professional-feeling pipeline matter as much as raw functionality.",
      "Pricing is quoted in USD, with most Manhattan CRM projects ranging from USD 300 to USD 15,000, similar to the broader New York market.",
    ],
    'faqs' => [
      ['q' => "How is a Manhattan CRM project different from elsewhere in New York?", 'a' => "The brief is similar, but Manhattan clients often want the CRM's reporting to project more scale and polish given the dense corporate environment they compete in."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, quoted in USD, similar to the broader New York market."],
      ['q' => "Do you integrate with our existing website and email?", 'a' => "Yes -- connecting lead sources directly to the CRM is a standard part of the build."],
    ],
    'layout' => 'A',
  ],

  // ===== UK cities =====
  'crm-development-london' => [
    'intro_heading' => "CRM Development for London's Fintech and Professional-Services Firms",
    'intro' => [
      "London CRM clients want a system that matches the polish of the fintech and professional-services firms they compete against locally -- credible reporting, clean pipeline structure, and often compliance-aware fields for finance-adjacent businesses specifically.",
      "Pricing is quoted in GBP, with most London CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build compliance-aware CRMs for London fintech clients?", 'a' => "Yes -- fields and workflows reflecting compliance requirements are a common London fintech-adjacent request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Can you customize Zoho or HubSpot instead of a full custom build?", 'a' => "Yes -- customization is often faster and cheaper if you're already using one of these platforms."],
    ],
    'layout' => 'B',
  ],
  'crm-development-england' => [
    'intro_heading' => "CRM Development Across England, Beyond London's Fintech Scene",
    'intro' => [
      "This page covers England broadly -- London has its own dedicated page with fintech-specific context, so this one is for businesses elsewhere in England needing a CRM that matches their actual sales process, whether that's a Midlands manufacturing supplier or a Northern retail business.",
      "Pricing is quoted in GBP, with most England-wide CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Why is there a page for England as well as London specifically?", 'a' => "London's page covers fintech-specific context; this one is for businesses anywhere else in England with a different sales process to match."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "How long does a CRM build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-manchester' => [
    'intro_heading' => "CRM Development for Manchester's Media and E-Commerce Businesses",
    'intro' => [
      "Manchester CRM clients often come from the city's media and e-commerce scene, wanting a modern-feeling system that tracks customer relationships alongside order/campaign history rather than a purely B2B sales pipeline.",
      "Pricing is quoted in GBP, with most Manchester CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for e-commerce or media businesses in Manchester?", 'a' => "Yes -- tracking customer relationships alongside order/campaign history is a common Manchester request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Can the CRM connect to our online store?", 'a' => "Yes -- integrating with your e-commerce platform is a common part of the build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-bristol' => [
    'intro_heading' => "CRM Development for Bristol's Engineering and Creative-Studio Clients",
    'intro' => [
      "Bristol CRM clients split between aerospace/engineering suppliers needing formal, capability-driven B2B pipelines and creative studios needing simpler project-based tracking -- two quite different briefs from the same city.",
      "Pricing is quoted in GBP, with most Bristol CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for engineering suppliers or creative studios?", 'a' => "Both are common Bristol client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Do you handle data migration from spreadsheets?", 'a' => "Yes -- clean migration from spreadsheets or a legacy system is part of the build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-leeds' => [
    'intro_heading' => "CRM Development for Leeds's Financial and Legal Services Firms",
    'intro' => [
      "Leeds CRM clients are often financial or legal-services firms wanting a formal, credibility-focused pipeline similar in spirit to London firms, reflecting Leeds's role as a major UK financial center outside the capital.",
      "Pricing is quoted in GBP, with most Leeds CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for financial or legal-services firms in Leeds?", 'a' => "Yes -- formal, credibility-focused pipelines are a common Leeds request given the city's financial and legal-services concentration."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Can the CRM generate reports for partners or clients?", 'a' => "Yes -- credible, presentable reporting is a standard part of these builds."],
    ],
    'layout' => 'B',
  ],
  'crm-development-birmingham' => [
    'intro_heading' => "CRM Development for Birmingham's Manufacturing and Diverse SME Base",
    'intro' => [
      "Birmingham CRM requests span the city's manufacturing/automotive-supplier heritage and its large, diverse professional-services and retail SME base, needing everything from B2B account tracking to simpler consumer lead tracking.",
      "Pricing is quoted in GBP, with most Birmingham CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for manufacturing suppliers in Birmingham?", 'a' => "Yes -- B2B account tracking for manufacturing and automotive-adjacent suppliers is a common Birmingham request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Do you also build simpler CRMs for retail/services SMEs?", 'a' => "Yes -- simpler lead-tracking setups are just as common given Birmingham's diverse SME base."],
    ],
    'layout' => 'A',
  ],
  'crm-development-glasgow' => [
    'intro_heading' => "CRM Development for Glasgow's Fintech and Professional-Services Scene",
    'intro' => [
      "Glasgow CRM clients increasingly come from the city's growing fintech scene, wanting a modern, product-focused pipeline, alongside more traditional Scottish financial-services and professional-services firms wanting formal credibility.",
      "Pricing is quoted in GBP, with most Glasgow CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with fintech startups in Glasgow?", 'a' => "Yes -- modern, product-focused CRM builds are a growing request from Glasgow's fintech scene."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'B',
  ],

  'crm-development-liverpool' => [
    'intro_heading' => "CRM Development for Liverpool's Cultural Tourism and Port Logistics Sector",
    'intro' => [
      "Liverpool CRM clients often come from the city's large cultural-tourism and hospitality sector needing booking-inquiry tracking, alongside more traditional port-logistics businesses needing straightforward B2B account tracking.",
      "Pricing is quoted in GBP, with most Liverpool CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for tourism or hospitality businesses in Liverpool?", 'a' => "Yes -- booking-inquiry tracking is a common request given Liverpool's large cultural-tourism and hospitality sector."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
      ['q' => "Do you also work with port-logistics businesses?", 'a' => "Yes -- straightforward B2B account tracking is a common request from Liverpool's logistics sector too."],
    ],
    'layout' => 'A',
  ],
  'crm-development-edinburgh' => [
    'intro_heading' => "CRM Development for Edinburgh's Finance and Festival-City Tourism",
    'intro' => [
      "Edinburgh CRM clients split between financial-services and insurance firms wanting understated, credible pipeline reporting, and festival-season hospitality businesses needing a system that can handle a short, intense visitor surge each year.",
      "Pricing is quoted in GBP, with most Edinburgh CRM projects ranging from GBP 250 to GBP 12,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for financial-services firms in Edinburgh?", 'a' => "Yes -- understated, credible pipeline reporting is a common request given Edinburgh's financial-services and insurance concentration."],
      ['q' => "What about festival-season tourism businesses?", 'a' => "Also common -- handling a short, intense visitor surge each year is a specific Edinburgh hospitality-sector need."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-12,000, quoted in GBP."],
    ],
    'layout' => 'B',
  ],

  // ===== Canada cities =====
  'crm-development-ontario' => [
    'intro_heading' => "CRM Development Across Ontario, Beyond Toronto and Ottawa",
    'intro' => [
      "This page covers Ontario broadly -- Toronto and Ottawa have their own dedicated pages, so this one is for businesses elsewhere in the province, including the Waterloo tech corridor and southern Ontario's manufacturing base, each needing a CRM shaped around their own sales process.",
      "Pricing is quoted in CAD, with most Ontario-wide CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for Ontario as well as Toronto and Ottawa?", 'a' => "Toronto and Ottawa have distinct local context; this one covers the rest of the province, including Waterloo's tech corridor and southern Ontario manufacturing."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy CRM is part of the build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-british-columbia' => [
    'intro_heading' => "CRM Development Across British Columbia, Beyond Vancouver",
    'intro' => [
      "This page covers BC broadly -- Vancouver has its own dedicated page, so this one is for businesses elsewhere in the province, including forestry, resources and production-adjacent companies needing a CRM built around their actual sales process.",
      "Pricing is quoted in CAD, with most BC-wide CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for BC and Vancouver?", 'a' => "Vancouver's page covers city-specific context; this one is for BC businesses outside Vancouver, including resource and forestry-adjacent companies."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
      ['q' => "Can you customize Zoho or HubSpot instead of a custom build?", 'a' => "Yes, often faster and cheaper if you're already using one of these platforms."],
    ],
    'layout' => 'B',
  ],
  'crm-development-toronto' => [
    'intro_heading' => "CRM Development for Toronto's Bay Street Finance and Diverse SME Base",
    'intro' => [
      "Toronto CRM clients include Bay Street-adjacent finance firms wanting formal, credible pipeline reporting, and the city's large, diverse immigrant-founder small business community wanting something simpler and more affordable to run day to day.",
      "Pricing is quoted in CAD, with most Toronto CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for finance-adjacent firms in Toronto?", 'a' => "Yes -- formal, credible pipeline reporting is a common request given Toronto's Bay Street finance concentration."],
      ['q' => "What about smaller, diverse small businesses?", 'a' => "Also common -- simpler, affordable-to-run CRM setups suit Toronto's large immigrant-founder small business community."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-vancouver' => [
    'intro_heading' => "CRM Development for Vancouver's Tech, Film and Real Estate Sectors",
    'intro' => [
      "Vancouver CRM clients often come from the city's tech scene (wanting a modern, product-focused pipeline), its film/production industry (project-based tracking), or its active real estate market (fast lead-response tracking) -- three genuinely different briefs.",
      "Pricing is quoted in CAD, with most Vancouver CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for tech, film or real estate businesses in Vancouver?", 'a' => "All three are common Vancouver client types, each needing a different pipeline structure."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
      ['q' => "Do you provide ongoing support after launch?", 'a' => "Yes -- bug fixes and adjustments as your process evolves are covered."],
    ],
    'layout' => 'B',
  ],
  'crm-development-montreal' => [
    'intro_heading' => "CRM Development for Montreal's Bilingual Aerospace and Gaming Sector",
    'intro' => [
      "Montreal CRM clients often need bilingual French/English support built into the system, given the city's bilingual market, alongside industry-specific needs from its aerospace supplier network and large video game development sector.",
      "Pricing is quoted in CAD, with most Montreal CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Can the CRM support bilingual French/English use?", 'a' => "Yes -- proper bilingual support is a common and explicitly-scoped Montreal request."],
      ['q' => "Do you work with aerospace or gaming-industry businesses?", 'a' => "Yes -- both are notable Montreal industries with their own specific CRM needs, scoped during discovery."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-calgary' => [
    'intro_heading' => "CRM Development for Calgary's Energy Sector and Diversifying Tech Scene",
    'intro' => [
      "Calgary CRM clients traditionally come from energy-services companies needing long B2B sales-cycle tracking, with a newer wave of tech and professional-services startups (part of the post-downturn diversification) wanting more modern, product-focused pipelines.",
      "Pricing is quoted in CAD, with most Calgary CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for energy-services companies in Calgary?", 'a' => "Yes -- long B2B sales-cycle tracking is a common request from Calgary's energy-services businesses."],
      ['q' => "What about newer tech startups in Calgary?", 'a' => "Also common -- Calgary's diversifying tech scene is a growing source of more modern, product-focused CRM requests."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'B',
  ],
  'crm-development-ottawa' => [
    'intro_heading' => "CRM Development for Ottawa's Government-Adjacent and Tech Sector",
    'intro' => [
      "Ottawa CRM clients split between government-adjacent businesses needing formal, accessibility-conscious pipeline tracking and the Kanata tech corridor's product-focused startups (including companies like Shopify nearby) wanting a more modern system.",
      "Pricing is quoted in CAD, with most Ottawa CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for government-adjacent businesses in Ottawa?", 'a' => "Yes -- formal, accessibility-conscious pipeline tracking is a common request for Ottawa's government-adjacent client base."],
      ['q' => "What about Ottawa's tech sector?", 'a' => "Also common -- Kanata's tech corridor is a source of more modern, product-focused CRM requests."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'A',
  ],
  'crm-development-edmonton' => [
    'intro_heading' => "CRM Development for Edmonton's Energy and Government-Adjacent Economy",
    'intro' => [
      "Edmonton CRM clients typically want a straightforward, credible pipeline reflecting the practical, service-oriented nature of the city's government-adjacent and energy-services business base -- clarity over flashy features.",
      "Pricing is quoted in CAD, with most Edmonton CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or energy-services businesses in Edmonton?", 'a' => "Yes -- both are common Edmonton client types, typically wanting straightforward, credible pipeline tracking over flashy features."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-winnipeg' => [
    'intro_heading' => "CRM Development for Winnipeg's Manufacturing and Insurance Base",
    'intro' => [
      "Winnipeg CRM clients typically come from manufacturing, agribusiness and the city's notably large insurance industry, wanting clear, practical B2B pipeline tracking over anything flashy -- a reflection of the city's practical business culture.",
      "Pricing is quoted in CAD, with most Winnipeg CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for manufacturing or insurance-adjacent businesses in Winnipeg?", 'a' => "Yes -- clear, practical B2B pipeline tracking is a common Winnipeg request given the city's manufacturing and insurance-industry base."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
      ['q' => "Do you handle data migration from our current system?", 'a' => "Yes -- migrating from spreadsheets or a legacy CRM is part of the build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-quebec-city' => [
    'intro_heading' => "CRM Development for Quebec City's French-First Government and Tourism Sector",
    'intro' => [
      "Quebec City CRM clients typically need a French-first interface (not an English system with translation added on), reflecting the city's primarily French-speaking market, alongside government-adjacent and tourism-sector-specific pipeline needs.",
      "Pricing is quoted in CAD, with most Quebec City CRM projects ranging from CAD 400 to CAD 18,000.",
    ],
    'faqs' => [
      ['q' => "Can the CRM be built French-first for Quebec City clients?", 'a' => "Yes -- given the city's primarily French-speaking market, the CRM is typically built French-first with English as the secondary option."],
      ['q' => "Do you work with tourism businesses in Old Quebec?", 'a' => "Yes -- booking/inquiry tracking suited to the tourism sector is a common Quebec City request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CAD 400-18,000, quoted in CAD."],
    ],
    'layout' => 'B',
  ],

  // ===== Australia cities =====
  'crm-development-sydney' => [
    'intro_heading' => "CRM Development for Sydney's Finance and Real Estate Sectors",
    'intro' => [
      "Sydney CRM clients often want a system that projects the same corporate polish as the finance and media firms concentrated here, alongside real estate businesses needing fast lead-response tracking for a competitive property market.",
      "Pricing is quoted in AUD, with most Sydney CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for real estate agents in Sydney?", 'a' => "Yes -- fast lead-response tracking suited to Sydney's competitive property market is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "Does the CRM work well on mobile for agents in the field?", 'a' => "Yes -- mobile usability is typically prioritized for field-based sales roles."],
    ],
    'layout' => 'A',
  ],
  'crm-development-melbourne' => [
    'intro_heading' => "CRM Development for Melbourne's Independent Retail and Education Sector",
    'intro' => [
      "Melbourne CRM clients often come from the city's large independent retail/hospitality small business scene needing simple, low-maintenance lead tracking, alongside education-sector-adjacent businesses needing enrollment-style pipelines.",
      "Pricing is quoted in AUD, with most Melbourne CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build simple CRMs for independent retail businesses in Melbourne?", 'a' => "Yes -- low-maintenance, straightforward lead tracking suits Melbourne's large independent retail and hospitality small business scene."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "Do you build enrollment-style pipelines for education businesses?", 'a' => "Yes -- given Melbourne's large education sector, this is a common request."],
    ],
    'layout' => 'B',
  ],
  'crm-development-brisbane' => [
    'intro_heading' => "CRM Development for Brisbane's Tech Startups and Mining-Services Firms",
    'intro' => [
      "Brisbane CRM clients split between a growing tech startup scene wanting a modern, product-focused pipeline, and mining-services businesses needing more traditional B2B contract and capability tracking.",
      "Pricing is quoted in AUD, with most Brisbane CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for tech startups or mining-services businesses in Brisbane?", 'a' => "Both are common Brisbane client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-gold-coast' => [
    'intro_heading' => "CRM Development for the Gold Coast's Tourism and Property Rental Market",
    'intro' => [
      "Gold Coast CRM clients are heavily driven by tourism and holiday-property rental businesses needing fast booking-inquiry tracking, since visitors are usually comparing multiple options before deciding.",
      "Pricing is quoted in AUD, with most Gold Coast CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for holiday-property or tourism businesses?", 'a' => "Yes -- fast booking-inquiry tracking is the priority given how quickly Gold Coast tourism customers compare options."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "Can the CRM integrate with a booking calendar?", 'a' => "Yes -- calendar/booking-tool integration is a common part of these builds."],
    ],
    'layout' => 'B',
  ],
  'crm-development-perth' => [
    'intro_heading' => "CRM Development for Perth's Mining and Resources Sector",
    'intro' => [
      "Perth CRM clients typically come from the mining and resources sector, needing long B2B sales-cycle and contract tracking -- Western Australia's dominant industry shapes most of the local CRM demand.",
      "Pricing is quoted in AUD, with most Perth CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for mining or resources-sector businesses in Perth?", 'a' => "Yes -- long B2B sales-cycle and contract tracking is a common request given WA's dominant mining and resources industry."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "Is Perth's distance from the east coast an issue for remote work?", 'a' => "No -- Perth businesses are already accustomed to working with remote suppliers given the distance, which makes remote CRM development a natural fit."],
    ],
    'layout' => 'A',
  ],
  'crm-development-adelaide' => [
    'intro_heading' => "CRM Development for Adelaide's Defense and Wine-Region Economy",
    'intro' => [
      "Adelaide CRM clients split between defense-adjacent suppliers needing formal, capability-driven B2B tracking, and wine-region tourism/hospitality businesses needing simpler booking-inquiry tracking.",
      "Pricing is quoted in AUD, with most Adelaide CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for defense-adjacent or wine-tourism businesses?", 'a' => "Both are common Adelaide client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy CRM is part of the build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-canberra' => [
    'intro_heading' => "CRM Development for Canberra's Government and Policy-Consulting Sector",
    'intro' => [
      "Canberra CRM clients are typically government-adjacent or policy-consulting firms wanting a formal, accessibility-conscious pipeline that prioritizes correctness and clarity over flashy features, similar in spirit to Ottawa's government-adjacent client base.",
      "Pricing is quoted in AUD, with most Canberra CRM projects ranging from AUD 500 to AUD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for government-adjacent or policy-consulting businesses in Canberra?", 'a' => "Yes -- formal, accessibility-conscious pipeline tracking is the common priority for Canberra's government-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range AUD 500-20,000, quoted in AUD."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],

  // ===== Rest of world cities (New Zealand, Russia, South Africa, Saudi Arabia, UAE, Switzerland, Germany) =====
  'crm-development-auckland' => [
    'intro_heading' => "CRM Development for Auckland's Trade and Finance Hub",
    'intro' => [
      "Auckland CRM clients often want a system that reflects the city's role as NZ's commercial and trade hub -- credible reporting and account tracking that projects the same scale as Auckland's concentration of finance and corporate headquarters.",
      "Pricing is quoted in NZD, with most Auckland CRM projects ranging from NZD 500 to NZD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for finance or trade-adjacent businesses in Auckland?", 'a' => "Yes -- credible account tracking and reporting reflecting Auckland's commercial hub status is a common request."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-20,000, quoted in NZD."],
      ['q' => "How does the time difference affect the working relationship?", 'a' => "Auckland is 6.5-7.5 hours ahead of IST -- we schedule calls for Auckland's afternoon, landing in an Indian morning, and it works well in practice."],
    ],
    'layout' => 'B',
  ],
  'crm-development-wellington' => [
    'intro_heading' => "CRM Development for Wellington's Government and Film-Industry Sector",
    'intro' => [
      "Wellington CRM clients split between government-adjacent businesses wanting formal, clear pipeline tracking and \"Wellywood\" film-production-adjacent businesses needing project-based tracking rather than a recurring sales cycle.",
      "Pricing is quoted in NZD, with most Wellington CRM projects ranging from NZD 500 to NZD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for government-adjacent or film-production businesses in Wellington?", 'a' => "Both are common Wellington client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-20,000, quoted in NZD."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy CRM is part of the build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-christchurch' => [
    'intro_heading' => "CRM Development for Christchurch's Agribusiness and Agritech Sector",
    'intro' => [
      "Christchurch CRM clients typically come from agribusiness needing straightforward account/order tracking, or the city's post-rebuild agritech startup scene wanting a more modern, product-focused pipeline.",
      "Pricing is quoted in NZD, with most Christchurch CRM projects ranging from NZD 500 to NZD 20,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for agribusiness or agritech companies in Christchurch?", 'a' => "Yes -- both traditional agribusiness account tracking and newer agritech product-focused pipelines are common requests."],
      ['q' => "What's the typical cost?", 'a' => "Most range NZD 500-20,000, quoted in NZD."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-moscow' => [
    'intro_heading' => "CRM Development for Moscow's Corporate Headquarters Concentration",
    'intro' => [
      "Moscow CRM clients are typically corporate-adjacent businesses wanting a credible, professional pipeline structure, given the concentration of corporate headquarters in the city -- clean account tracking matters more than flashy features.",
      "Given current cross-border payment complexity for Russia, pricing is quoted and settled in USD, confirmed directly on the discovery call.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD rather than rubles?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps the payment side workable."],
      ['q' => "Do you build CRMs for corporate-adjacent businesses in Moscow?", 'a' => "Yes -- credible, professional pipeline structure is the common priority given Moscow's corporate headquarters concentration."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, with payment terms confirmed upfront given cross-border considerations."],
    ],
    'layout' => 'A',
  ],
  'crm-development-saint-petersburg' => [
    'intro_heading' => "CRM Development for Saint Petersburg's Trade and Tech Sector",
    'intro' => [
      "Saint Petersburg CRM clients often come from port/trade-adjacent businesses needing straightforward account tracking, alongside a growing tech scene wanting more modern, product-focused pipelines.",
      "As with Moscow, pricing is quoted and settled in USD given current cross-border payment complexity, confirmed directly during discovery.",
    ],
    'faqs' => [
      ['q' => "Why is pricing in USD?", 'a' => "Given current cross-border payment complexity affecting Russia, USD-denominated pricing keeps things workable."],
      ['q' => "Do you work with trade or tech businesses in Saint Petersburg?", 'a' => "Yes -- both are common local client types, needing different pipeline structures."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-15,000, with payment terms confirmed upfront."],
    ],
    'layout' => 'B',
  ],
  'crm-development-cape-town' => [
    'intro_heading' => "CRM Development for Cape Town's Tech Startups and Tourism Sector",
    'intro' => [
      "Cape Town CRM clients split between \"Silicon Cape\" tech startups wanting a modern, product-focused pipeline and tourism/hospitality businesses needing booking-inquiry tracking -- two quite different local client types.",
      "Pricing is quoted in ZAR, with most Cape Town CRM projects ranging from ZAR 5,000 to ZAR 2,50,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for tech startups or tourism businesses in Cape Town?", 'a' => "Both are common Cape Town client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-2,50,000 depending on scope, in ZAR."],
      ['q' => "How does the time zone work for calls?", 'a' => "Cape Town is 3.5 hours ahead of IST, a comfortable overlap for scheduled calls."],
    ],
    'layout' => 'A',
  ],
  'crm-development-durban' => [
    'intro_heading' => "CRM Development for Durban's Port Logistics and Manufacturing Base",
    'intro' => [
      "Durban CRM clients typically come from port-logistics and manufacturing businesses needing clear, functional B2B account tracking, given Durban's role as Africa's busiest port.",
      "Pricing is quoted in ZAR, with most Durban CRM projects ranging from ZAR 5,000 to ZAR 2,50,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for logistics or manufacturing businesses in Durban?", 'a' => "Yes -- clear, functional B2B account tracking is a common request given Durban's port-logistics and manufacturing base."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-2,50,000, in ZAR."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy system is part of the build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-johannesburg' => [
    'intro_heading' => "CRM Development for Johannesburg's Financial Services and Mining-HQ Sector",
    'intro' => [
      "Johannesburg CRM clients want a system that projects the same scale and credibility as the financial-services and mining-industry corporate headquarters concentrated in the city -- clean account tracking and professional reporting matter here.",
      "Pricing is quoted in ZAR, with most Johannesburg CRM projects ranging from ZAR 5,000 to ZAR 2,50,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for financial-services or mining-adjacent corporates in Johannesburg?", 'a' => "Yes -- credible, professional pipeline structure is a common priority given Johannesburg's corporate headquarters concentration."],
      ['q' => "What's the typical cost?", 'a' => "Most range ZAR 5,000-2,50,000, in ZAR."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-riyadh' => [
    'intro_heading' => "CRM Development for Riyadh's Vision 2030 Corporate and Retail Sector",
    'intro' => [
      "Riyadh CRM clients increasingly include e-commerce and retail businesses riding Vision 2030's digitization push, alongside more traditional corporate and government-adjacent clients wanting formal, credible pipeline structure.",
      "Pricing is quoted in SAR, with most Riyadh CRM projects ranging from SAR 1,500 to SAR 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for e-commerce businesses in Riyadh?", 'a' => "Yes -- as Vision 2030 accelerates retail digitization, this is a growing Riyadh request alongside more traditional corporate CRM needs."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-60,000, in SAR."],
      ['q' => "Can the CRM support Arabic and English?", 'a' => "Yes -- bilingual support is a common and explicitly-scoped request."],
    ],
    'layout' => 'B',
  ],
  'crm-development-jeddah' => [
    'intro_heading' => "CRM Development for Jeddah's Historic Trading Port Economy",
    'intro' => [
      "Jeddah CRM clients often come from trading businesses needing account tracking across international buyer relationships, given the city's centuries-old role as Saudi Arabia's main commercial gateway.",
      "Pricing is quoted in SAR, with most Jeddah CRM projects ranging from SAR 1,500 to SAR 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for trading companies in Jeddah?", 'a' => "Yes -- account tracking across international buyer relationships is a common Jeddah request given the city's trading-hub history."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-60,000, in SAR."],
      ['q' => "Can the CRM support Arabic and English?", 'a' => "Yes -- bilingual support is commonly and explicitly scoped."],
    ],
    'layout' => 'A',
  ],
  'crm-development-dammam' => [
    'intro_heading' => "CRM Development for Dammam's Oil, Energy and Petrochemical Sector",
    'intro' => [
      "Dammam CRM clients typically come from energy-services and petrochemical-adjacent businesses needing formal, capability-driven B2B account tracking, reflecting the Eastern Province's industrial character.",
      "Pricing is quoted in SAR, with most Dammam CRM projects ranging from SAR 1,500 to SAR 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for energy or petrochemical-adjacent businesses in Dammam?", 'a' => "Yes -- formal, capability-driven B2B account tracking is a common Dammam request given the region's industrial base."],
      ['q' => "What's the typical cost?", 'a' => "Most range SAR 1,500-60,000, in SAR."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy system is part of the build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-abu-dhabi' => [
    'intro_heading' => "CRM Development for Abu Dhabi's Government and Sovereign Wealth Sector",
    'intro' => [
      "Abu Dhabi CRM clients are often government-adjacent or institutional businesses wanting a stable, credible pipeline structure over trendy features, reflecting the city's role as UAE's capital.",
      "Pricing is quoted in AED, with most Abu Dhabi CRM projects ranging from AED 1,500 to AED 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for government-adjacent or institutional businesses in Abu Dhabi?", 'a' => "Yes -- stable, credible pipeline structure is the common priority for Abu Dhabi's government-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 1,500-60,000, in AED."],
      ['q' => "Can the CRM support Arabic and English?", 'a' => "Yes -- bilingual support is commonly and explicitly scoped."],
    ],
    'layout' => 'A',
  ],
  'crm-development-sharjah' => [
    'intro_heading' => "CRM Development for Sharjah's Industrial and Education-Focused Economy",
    'intro' => [
      "Sharjah CRM clients typically come from industrial and manufacturing businesses wanting straightforward, professional account tracking, reflecting the emirate's more industrial and traditional business culture compared to Dubai.",
      "Pricing is quoted in AED, with most Sharjah CRM projects ranging from AED 1,500 to AED 60,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for industrial or manufacturing businesses in Sharjah?", 'a' => "Yes -- straightforward, professional account tracking is the common priority given Sharjah's more industrial business culture."],
      ['q' => "What's the typical cost?", 'a' => "Most range AED 1,500-60,000, in AED."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'B',
  ],
  'crm-development-zurich' => [
    'intro_heading' => "CRM Development for Zurich's Global Banking and Fintech Sector",
    'intro' => [
      "Zurich CRM clients expect exacting precision -- every field, disclosure and client record needs to be exactly correct, reflecting the city's global banking and growing fintech/crypto sector standards.",
      "Pricing is quoted in CHF, with most Zurich CRM projects ranging from CHF 500 to CHF 25,000.",
    ],
    'faqs' => [
      ['q' => "Do you understand the precision expected by Zurich banking/fintech clients?", 'a' => "Yes -- exacting attention to detail in every field and client record is the standard Zurich CRM work is held to."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-25,000, in CHF."],
      ['q' => "Can you customize an existing platform instead of a full build?", 'a' => "Yes -- customization is often faster if you're already using Zoho, HubSpot or Salesforce."],
    ],
    'layout' => 'A',
  ],
  'crm-development-geneva' => [
    'intro_heading' => "CRM Development for Geneva's International Organizations and Private Banking",
    'intro' => [
      "Geneva CRM clients often need bilingual French/English support, reflecting the city's international character, alongside formal, understated pipeline design suited to Geneva's private banking and international-organization concentration.",
      "Pricing is quoted in CHF, with most Geneva CRM projects ranging from CHF 500 to CHF 25,000.",
    ],
    'faqs' => [
      ['q' => "Can the CRM support bilingual French/English use?", 'a' => "Yes -- bilingual support is a common and explicitly-scoped Geneva request."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-25,000, in CHF."],
      ['q' => "Do you build for private banking or institutional clients?", 'a' => "Yes -- formal, understated pipeline design suited to Geneva's private banking and international-organization concentration is a common request."],
    ],
    'layout' => 'B',
  ],
  'crm-development-zug' => [
    'intro_heading' => "CRM Development for Zug's \"Crypto Valley\" and International Corporate Base",
    'intro' => [
      "Zug CRM clients often come from crypto/blockchain companies wanting a modern, product-focused pipeline, alongside the international corporate headquarters the canton attracts with its low tax rate -- both wanting a system that doesn't look like a small-town business tool.",
      "Pricing is quoted in CHF, with most Zug CRM projects ranging from CHF 500 to CHF 25,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for crypto or blockchain companies in Zug?", 'a' => "Yes -- modern, product-focused CRM builds are a common request given Zug's \"Crypto Valley\" identity."],
      ['q' => "What's the typical cost?", 'a' => "Most range CHF 500-25,000, in CHF."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-berlin' => [
    'intro_heading' => "CRM Development for Berlin's Startup and Creative-Tech Scene",
    'intro' => [
      "Berlin CRM clients typically come from the city's large startup scene, wanting a modern, product-focused pipeline more comfortable with newer design trends than the rest of Germany's more traditional business culture.",
      "Pricing is quoted in EUR, with most Berlin CRM projects ranging from EUR 400 to EUR 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build startup-style CRMs for Berlin tech companies?", 'a' => "Yes -- modern, product-focused design suited to Berlin's startup scene is a common request, distinct from the more traditional Mittelstand brief elsewhere in Germany."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-18,000, in EUR."],
      ['q' => "Can you customize Zoho or HubSpot instead of a custom build?", 'a' => "Yes, often faster and cheaper if you're already using one of these platforms."],
    ],
    'layout' => 'B',
  ],
  'crm-development-munich' => [
    'intro_heading' => "CRM Development for Munich's Corporate HQ and Engineering Sector",
    'intro' => [
      "Munich CRM clients typically want thorough, technically accurate pipeline tracking reflecting the engineering-and-precision-focused culture of the corporate headquarters concentrated here, more than trendy design.",
      "Pricing is quoted in EUR, with most Munich CRM projects ranging from EUR 400 to EUR 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for engineering or corporate-HQ-adjacent businesses in Munich?", 'a' => "Yes -- thorough, technically accurate pipeline tracking is the priority for Munich's engineering and corporate-headquarters-adjacent client base."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-18,000, in EUR."],
      ['q' => "How long does a build take?", 'a' => "Typically 2-4 weeks for customization, 4-10 weeks for a fully custom build."],
    ],
    'layout' => 'A',
  ],
  'crm-development-hamburg' => [
    'intro_heading' => "CRM Development for Hamburg's Port Logistics and Media Sector",
    'intro' => [
      "Hamburg CRM clients split between port/logistics businesses needing functional B2B account tracking and media/publishing-adjacent businesses needing more editorially-minded pipeline and campaign tracking.",
      "Pricing is quoted in EUR, with most Hamburg CRM projects ranging from EUR 400 to EUR 18,000.",
    ],
    'faqs' => [
      ['q' => "Do you build CRMs for logistics or media businesses in Hamburg?", 'a' => "Both are common Hamburg client types, needing quite different pipeline structures from each other."],
      ['q' => "What's the typical cost?", 'a' => "Most range EUR 400-18,000, in EUR."],
      ['q' => "Do you handle data migration?", 'a' => "Yes -- migrating from spreadsheets or a legacy system is part of the build."],
    ],
    'layout' => 'B',
  ],
];
