<?php
// Unique per-page content layer for vertical-healthcare.php (added 2026-07-27 to fix
// GSC flagging healthcare-website-design-* pages as duplicate/thin doorway content --
// see memory nikhilworks-doorway-content-fix). Reuses real local-industry facts already
// established for web-developer-*/seo-services-* pages, angled toward the healthcare/
// patient-trust reasoning specific to each market.
//
// Do NOT reduce this back to one shared paragraph with the location swapped in.
return [
  // ===== Country pages =====
  'healthcare-website-design-usa' => [
    'intro_heading' => "Healthcare Websites for a Patient Population That Researches Before They Book",
    'intro' => [
      "US patients routinely compare three or four providers online before calling anyone, checking whether a practice looks credible, whether insurance/billing information is clear, and whether booking is genuinely easy. A slow or dated site loses that patient to the next search result before the phone ever rings, regardless of how good the actual care is.",
      "HIPAA-aware form handling and minimal data retention are standard on every build. Pricing is quoted in USD, with most US healthcare website projects ranging USD 300-8,000 depending on booking/EHR integration needs.",
    ],
    'faqs' => [
      ['q' => "Do you build HIPAA-aware intake forms for US practices?", 'a' => "Yes -- encrypted transmission and minimal data retention are standard, and we confirm your specific regulatory requirements during discovery so the build matches what your practice is legally required to handle."],
      ['q' => "Do US patients really compare providers online before booking?", 'a' => "Yes -- most patients now check two or three practice websites before calling, so a dated or confusing site loses that patient before you ever get the chance to speak with them."],
      ['q' => "What's the typical cost?", 'a' => "Most US healthcare website projects range USD 300-8,000, quoted in USD, depending on scope and integrations."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-uk' => [
    'intro_heading' => "Healthcare Websites for UK Practices Navigating NHS and Private Care Choices",
    'intro' => [
      "UK patients researching healthcare online are often trying to work out whether a service is NHS-funded, private, or a mix of both -- a private clinic or dental surgery needs its website to make that distinction clear from the homepage, not bury it in a pricing PDF three clicks deep.",
      "GBP-denominated plans keep budgeting straightforward, with most UK healthcare website projects ranging GBP 250-6,000 depending on booking functionality and the number of practitioners featured.",
    ],
    'faqs' => [
      ['q' => "Can the site clearly explain NHS vs. private pricing for our practice?", 'a' => "Yes -- making that distinction clear upfront, rather than several clicks deep, is a common and important request for UK private clinics and dental surgeries."],
      ['q' => "What's the typical cost?", 'a' => "Most UK healthcare website projects range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you build online booking for GP or dental practices?", 'a' => "Yes -- calendar-synced booking with automated reminders is included, reducing missed appointments."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-india' => [
    'intro_heading' => "Healthcare Websites for India's Fast-Growing Private and Digital Health Market",
    'intro' => [
      "Indian patients increasingly research clinics and hospitals online before visiting, and a growing share now expect to link records through ABHA (Ayushman Bharat Health Account), the national digital health ID system -- a modern practice website needs to be ready for that expectation, not just list a phone number and address.",
      "INR pricing keeps projects affordable relative to India's cost base, with most healthcare website projects ranging INR 12,000-2,00,000 depending on the number of doctors, locations and whether ABHA integration is needed.",
    ],
    'faqs' => [
      ['q' => "Can you integrate with ABHA (Ayushman Bharat Health Account)?", 'a' => "Yes -- we've built ABHA integration for the Indian market before, letting patients link and manage their national digital health records through the site."],
      ['q' => "What's the typical cost?", 'a' => "Most Indian healthcare website projects range INR 12,000-2,00,000, depending on scope."],
      ['q' => "Do you handle multi-location hospital or diagnostic-center websites?", 'a' => "Yes -- multi-location practices, diagnostic chains and multi-doctor clinics are all common project types in India."],
    ],
    'layout' => 'A',
  ],

  // ===== USA cities =====
  'healthcare-website-design-california' => [
    'intro_heading' => "Healthcare Websites for California's Telehealth and Multi-Location Practices",
    'intro' => [
      "California's health-tech and biotech density has pushed patient expectations toward telehealth-ready booking and slick digital intake, even for a small local practice competing with well-funded digital health startups for the same searches.",
      "Pricing is quoted in USD, with most California healthcare website projects ranging USD 300-8,000 depending on telehealth and multi-location needs.",
    ],
    'faqs' => [
      ['q' => "Does California's health-tech scene change what patients expect from a site?", 'a' => "Yes -- patients here have seen enough polished digital health products that a template-feeling clinic site reads as a red flag, so the design bar is higher."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you build telehealth-ready booking flows?", 'a' => "Yes -- video-visit scheduling alongside in-person booking is a common California request."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-new-york' => [
    'intro_heading' => "Healthcare Websites for New York's Dense Specialist-Practice Market",
    'intro' => [
      "New York has one of the highest concentrations of specialist practices and hospital systems in the country, which means patients researching a specific condition are usually comparing several credentialed specialists side by side -- a practice website needs to establish credibility fast or lose that comparison.",
      "Pricing is quoted in USD, with most New York healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "How do smaller New York specialists compete against big hospital-system websites?", 'a' => "By presenting doctor credentials and specific outcomes clearly and quickly -- patients comparing specialists side by side decide fast, so clarity matters more than volume of content."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "How long does a build take?", 'a' => "Most single-location sites with booking take 2-4 weeks; multi-specialist or multi-location builds run 4-8 weeks."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-washington' => [
    'intro_heading' => "Healthcare Websites for Washington State's Tech-Influenced Patient Expectations",
    'intro' => [
      "Washington State's tech industry has pushed general user expectations toward fast, well-structured websites, and that carries over directly into healthcare -- patients here notice a slow booking flow or a clunky mobile site faster than in less tech-influenced markets.",
      "Pricing is quoted in USD, with most Washington healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Does Washington's tech-heavy market change what matters for a clinic site?", 'a' => "Somewhat -- site speed and a smooth mobile booking flow carry extra weight here given local user expectations shaped by the tech industry."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you handle EHR or booking-system integration?", 'a' => "In most cases, yes -- share your current system during discovery and we'll confirm feasibility upfront."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-texas' => [
    'intro_heading' => "Healthcare Websites for Texas's Fast-Growing, Widely Spread Patient Base",
    'intro' => [
      "Texas combines dense medical hubs like Houston's Texas Medical Center -- the largest medical complex in the world -- with a genuinely fast-growing population relocating from other states and needing to find a new provider from scratch, often across long distances to the nearest specialist.",
      "Pricing is quoted in USD, with most Texas healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Do you help practices reach patients who've recently relocated to Texas?", 'a' => "Yes -- clear local SEO and an easy-to-find booking flow matter a lot given how many Texas patients are searching for a new provider after moving."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you build telehealth options for patients far from a clinic?", 'a' => "Yes -- telehealth booking is a common addition given how spread out some Texas service areas are."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-virginia' => [
    'intro_heading' => "Healthcare Websites for Northern Virginia's Federal-Adjacent Patient Base",
    'intro' => [
      "Northern Virginia's healthcare patients include a large share of federal employees and military-adjacent families, many covered under specific federal or Tricare-style insurance arrangements -- a practice site here benefits from being upfront about which coverage types it accepts.",
      "Pricing is quoted in USD, with most Virginia healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Should the site clarify which insurance/coverage types we accept?", 'a' => "Yes -- given Northern Virginia's large federal and military-adjacent patient base, being upfront about accepted coverage is a common and useful request."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you provide ongoing content updates?", 'a' => "Yes, through our website maintenance plans -- new provider profiles and security patches are covered."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-delaware' => [
    'intro_heading' => "Healthcare Websites for Delaware's Small, Less-Crowded Patient Market",
    'intro' => [
      "Delaware's healthcare search market is small relative to bigger states, which means less competition for local search terms but also fewer patients searching in the first place -- a Delaware practice website benefits more from clear, direct local SEO than from chasing broad keyword volume that doesn't exist locally.",
      "Pricing is quoted in USD, with most Delaware healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Is Delaware's healthcare search market less competitive than bigger states?", 'a' => "Generally yes, though search volume is also lower, so we focus on precise local keyword targeting rather than broad national terms."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you work with pharma or biotech-adjacent healthcare businesses?", 'a' => "Yes -- credible, professional design suited to Delaware's notable pharma and biotech presence is a common request."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-los-angeles' => [
    'intro_heading' => "Healthcare Websites for LA's Cosmetic, Wellness and Multilingual Patient Market",
    'intro' => [
      "LA's healthcare search demand includes a genuinely large elective and cosmetic-medicine market alongside standard family practice needs, and its multicultural patient base means a bilingual or multilingual site is often a real conversion factor, not a nice-to-have.",
      "Pricing is quoted in USD, with most LA healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for cosmetic or elective-medicine practices?", 'a' => "Yes -- visually strong before/after galleries and clear consultation booking are common requirements for LA's elective-medicine market."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Can the site support multiple languages?", 'a' => "Yes -- given LA's multicultural patient base, multilingual pages are a common and worthwhile addition."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-chicago' => [
    'intro_heading' => "Healthcare Websites for Chicago's Academic Medical Center Competition",
    'intro' => [
      "Chicago hosts several major academic medical centers within a few miles of each other, which makes patient-facing search results genuinely competitive -- a smaller practice or specialist clinic needs sharp local SEO and a credible-looking site to be found at all next to these institutions.",
      "Pricing is quoted in USD, with most Chicago healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "How do smaller Chicago practices compete against major academic medical centers online?", 'a' => "By targeting sharper local and specialty-specific search terms rather than the broadest, most contested keywords the big institutions already dominate."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you handle multi-provider clinic sites?", 'a' => "Yes -- individual doctor profiles and specialty breakdowns are standard for multi-provider Chicago clinics."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-houston' => [
    'intro_heading' => "Healthcare Websites Near the World's Largest Medical Complex",
    'intro' => [
      "Houston is home to the Texas Medical Center, the largest medical complex in the world -- which means an independent practice or specialist clinic here is often searched for by patients comparing it directly against globally recognized institutions just down the road.",
      "Pricing is quoted in USD, with most Houston healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "How does being near the Texas Medical Center affect our website's job?", 'a' => "It raises the bar -- patients nearby are used to comparing world-class institutions, so a credible, clearly organized site matters more than in most cities."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you also handle energy-sector-adjacent occupational health practices?", 'a' => "Yes -- occupational health and industrial-medicine clinics tied to Houston's energy sector are a common project type."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-dallas' => [
    'intro_heading' => "Healthcare Websites for Dallas's Consolidating, Corporate-Backed Practice Market",
    'intro' => [
      "Dallas has seen a wave of independent practices consolidating into larger corporate-backed groups, which raises the design and credibility bar for the independent practices still competing on their own -- a dated site now stands out more than it used to.",
      "Pricing is quoted in USD, with most Dallas healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Does practice consolidation in Dallas change what our site needs to do?", 'a' => "Yes -- independent practices need to look at least as credible and modern as the larger corporate-backed groups now common in Dallas, or risk losing patients on first impression alone."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you provide monthly reports on site performance?", 'a' => "Yes -- clear traffic and booking-conversion reports are provided every month."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-phoenix' => [
    'intro_heading' => "Healthcare Websites for Phoenix's Fast-Growing Retiree and Senior-Care Market",
    'intro' => [
      "Phoenix's population skews notably older thanks to Arizona's retirement-destination reputation, which means larger font sizes, high-contrast design and genuinely simple booking flows aren't just accessibility nice-to-haves here -- they directly affect whether an older patient completes a booking at all.",
      "Pricing is quoted in USD, with most Phoenix healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Do you design specifically for an older patient demographic?", 'a' => "Yes -- larger text, high contrast and simplified booking flows are common Phoenix requests given the area's large retiree population."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you build sites for senior/elder-care practices specifically?", 'a' => "Yes -- geriatric and senior-care practices are a common and fast-growing Phoenix client type."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-san-diego' => [
    'intro_heading' => "Healthcare Websites for San Diego's Biotech-Adjacent, Scientifically Literate Patients",
    'intro' => [
      "San Diego's dense biotech and life-sciences industry means many local patients are scientifically literate and expect accurate, specific language rather than vague marketing copy -- a practice site here earns more trust by being precise than by sounding polished.",
      "Pricing is quoted in USD, with most San Diego healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Does San Diego's biotech-literate patient base change how content should be written?", 'a' => "Yes -- accurate, specific language tends to build more trust here than generic marketing copy, given how scientifically literate much of the local patient base is."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you also work with military/veteran-adjacent healthcare practices?", 'a' => "Yes -- San Diego's large military presence makes veteran-adjacent healthcare a common local practice type."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-philadelphia' => [
    'intro_heading' => "Healthcare Websites for Philadelphia's Unusually Dense Hospital Market",
    'intro' => [
      "Philadelphia has an unusually high density of hospitals and universities for its size, which makes local search competition for healthcare terms genuinely stiff -- a smaller practice needs sharper local SEO and a clearly credible site just to be visible next to that many nearby institutions.",
      "Pricing is quoted in USD, with most Philadelphia healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "How competitive is local healthcare search in Philadelphia?", 'a' => "Genuinely competitive -- the city's dense hospital and university-medicine presence means smaller practices need sharp local SEO to be found at all."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "How long until we see search visibility improve?", 'a' => "Technical fixes can show movement in 4-8 weeks; genuinely competitive local terms typically take 3-6 months."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-miami' => [
    'intro_heading' => "Healthcare Websites for Miami's Bilingual, Retiree-Heavy Patient Base",
    'intro' => [
      "Miami's patient base is heavily bilingual, and a large share of search demand for healthcare terms happens in Spanish rather than English -- a practice site without genuine Spanish-language pages is invisible to a meaningful share of local patients, not just less convenient for them.",
      "Pricing is quoted in USD, with most Miami healthcare website projects ranging USD 300-8,000.",
    ],
    'faqs' => [
      ['q' => "Do you build Spanish-language pages for Miami practices?", 'a' => "Yes -- bilingual English/Spanish content is a common and often essential Miami request, given how much local search volume happens in Spanish."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD."],
      ['q' => "Do you handle sites for retiree-focused practices?", 'a' => "Yes -- given Miami's large retiree population, accessible design and simplified booking are common priorities."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-manhattan' => [
    'intro_heading' => "Healthcare Websites for Manhattan's Ultra-Competitive Specialist Search",
    'intro' => [
      "Manhattan concentrates more specialist practices and hospital-affiliated clinics per square mile than almost anywhere else in the country, so patients here are often choosing between several credentialed options within a few subway stops -- credibility and clarity have to land in the first few seconds.",
      "Pricing is quoted in USD, with most Manhattan healthcare website projects ranging USD 300-8,000, similar to the broader New York market.",
    ],
    'faqs' => [
      ['q' => "Is Manhattan's healthcare search market more competitive than the rest of New York?", 'a' => "Often yes -- the sheer density of specialist practices and hospital-affiliated clinics here makes first impressions and clarity especially important."],
      ['q' => "What's the typical cost?", 'a' => "Most range USD 300-8,000, quoted in USD, similar to the broader New York market."],
      ['q' => "Do you build individual doctor profile pages?", 'a' => "Yes -- clear credentials and specialty breakdowns per doctor are standard for Manhattan multi-provider practices."],
    ],
    'layout' => 'B',
  ],

  // ===== UK cities =====
  'healthcare-website-design-london' => [
    'intro_heading' => "Healthcare Websites for London's NHS-and-Private Harley Street Market",
    'intro' => [
      "London's private healthcare market, anchored around Harley Street's dense concentration of specialist clinics, competes for patients who are often weighing a private consultation against an NHS waiting list -- the website's job is making that value case clearly, not just listing services.",
      "Pricing is quoted in GBP, with most London healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Can the site help explain the value of going private vs. NHS waiting times?", 'a' => "Yes -- clearly communicating wait-time and consultation-quality advantages is a common and effective London private-practice request."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you build sites for Harley Street-style specialist clinics?", 'a' => "Yes -- credibility-focused design suited to London's dense specialist-clinic market is a common request."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-england' => [
    'intro_heading' => "Healthcare Websites Across England, Beyond London's Private-Clinic Market",
    'intro' => [
      "This page covers England broadly -- London has its own dedicated page reflecting its private-clinic-heavy market, so this one is for GP practices, dental surgeries and clinics elsewhere in England with different local patient expectations and NHS trust relationships.",
      "Pricing is quoted in GBP, with most England-wide healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Why a separate page for England as well as London?", 'a' => "London's page reflects its private-clinic-heavy market; this one covers practices anywhere else in England with different local patient dynamics."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "How long does a build typically take?", 'a' => "Most single-clinic sites with booking take 2-4 weeks; multi-location practices usually take 4-8 weeks."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-manchester' => [
    'intro_heading' => "Healthcare Websites for Manchester's Growing Private Dental and Clinic Market",
    'intro' => [
      "Manchester's private healthcare and dental market has grown alongside the city's broader digital and e-commerce scene, and patients here increasingly expect the same slick online booking experience they get from Manchester's well-known online retailers.",
      "Pricing is quoted in GBP, with most Manchester healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Do Manchester patients expect a more modern booking experience?", 'a' => "Increasingly yes -- the city's strong e-commerce and digital scene has raised general expectations for slick, easy online booking."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you build sites for private dental practices?", 'a' => "Yes -- private dental and cosmetic-dentistry sites are a common and growing Manchester project type."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-bristol' => [
    'intro_heading' => "Healthcare Websites for Bristol's Diverse Family Practice and Specialist Mix",
    'intro' => [
      "Bristol's healthcare demand spans everyday family GP practices and a smaller but genuine specialist-clinic market, alongside the city's engineering and creative-industry-adjacent workforce who search for care on their own schedule outside normal hours.",
      "Pricing is quoted in GBP, with most Bristol healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for family GP practices as well as specialists?", 'a' => "Yes -- both are common Bristol client types, and the site design and booking flow are scoped to match either use case."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you support out-of-hours online booking?", 'a' => "Yes -- 24/7 booking is a common request given how many Bristol patients search for care outside standard working hours."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-leeds' => [
    'intro_heading' => "Healthcare Websites for Leeds's Major Teaching Hospital Region",
    'intro' => [
      "Leeds Teaching Hospitals is one of the largest NHS trusts in Europe, and independent practices and clinics in the city are often searched for by patients comparing them against that scale -- a smaller practice website needs to communicate genuine credibility clearly, not just list opening hours.",
      "Pricing is quoted in GBP, with most Leeds healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "How does being near a major teaching hospital trust affect a smaller practice's site?", 'a' => "It raises the credibility bar -- patients are used to comparing against a large, well-known trust, so clear practitioner credentials and outcomes matter more."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you handle private specialist clinic sites in Leeds?", 'a' => "Yes -- credibility-driven design for private specialist clinics is a common Leeds request."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-birmingham' => [
    'intro_heading' => "Healthcare Websites Near Europe's Largest Single-Site Hospital",
    'intro' => [
      "Birmingham is home to Queen Elizabeth Hospital Birmingham, one of the largest single-site hospitals in Europe, and independent practices in the city serve an unusually diverse patient population that often needs multilingual information and clear, simple booking above all else.",
      "Pricing is quoted in GBP, with most Birmingham healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Can the site support multiple languages for Birmingham's diverse population?", 'a' => "Yes -- multilingual pages are a common and worthwhile addition given Birmingham's genuinely diverse patient base."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you build sites for practices near major hospitals?", 'a' => "Yes -- clear credentials and a credible design matter more here given the scale of Queen Elizabeth Hospital nearby."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-glasgow' => [
    'intro_heading' => "Healthcare Websites for Glasgow's Large Hospital Campus and Growing Private Market",
    'intro' => [
      "Glasgow's Queen Elizabeth University Hospital campus is one of the largest in Europe, and alongside it a smaller but growing private healthcare and dental market has emerged, needing a genuinely modern site to stand apart from NHS-affiliated options patients already know well.",
      "Pricing is quoted in GBP, with most Glasgow healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "How does a private Glasgow practice stand out next to such a large NHS campus?", 'a' => "By being clearly modern and easy to book with -- patients already know the NHS options well, so a private practice needs a genuinely better digital experience to be worth the switch."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you provide monthly performance reports?", 'a' => "Yes -- clear traffic and booking reports are provided every month."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-liverpool' => [
    'intro_heading' => "Healthcare Websites for Liverpool's Less-Crowded, Growing Private Market",
    'intro' => [
      "Liverpool's private healthcare and dental market is genuinely less crowded in search results than nearby Manchester, which means well-executed local SEO and a clean, credible site can go further here for a new or growing practice.",
      "Pricing is quoted in GBP, with most Liverpool healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Is Liverpool's healthcare search market less competitive than Manchester's?", 'a' => "Generally yes, which can make local search visibility somewhat more achievable for a well-executed new or growing practice."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you handle ongoing content updates after launch?", 'a' => "Yes, through our website maintenance plans -- new practitioner profiles and security patches are covered."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-edinburgh' => [
    'intro_heading' => "Healthcare Websites for Edinburgh's Research-Adjacent Medical Community",
    'intro' => [
      "Edinburgh's healthcare community sits alongside a genuinely strong medical-research presence tied to the University of Edinburgh, and patients here often research a practitioner's credentials and specialisms more thoroughly before booking than in less academically-dense cities.",
      "Pricing is quoted in GBP, with most Edinburgh healthcare website projects ranging GBP 250-6,000.",
    ],
    'faqs' => [
      ['q' => "Do Edinburgh patients research practitioner credentials more closely?", 'a' => "Often yes -- the city's strong academic-medical presence means patients tend to check specialisms and credentials thoroughly before booking."],
      ['q' => "What's the typical cost?", 'a' => "Most range GBP 250-6,000, quoted in GBP."],
      ['q' => "Do you build detailed practitioner credential pages?", 'a' => "Yes -- clear, detailed credential and specialism pages are a common Edinburgh request."],
    ],
    'layout' => 'A',
  ],

  // ===== India cities =====
  'healthcare-website-design-delhi' => [
    'intro_heading' => "Healthcare Websites for Delhi's Government-Linked and Trade-Economy Patients",
    'intro' => [
      "Delhi is home to AIIMS, India's top public hospital, and a healthcare website here often needs to reassure patients that a private practice offers a genuinely faster, more comfortable alternative -- clarity on booking speed and doctor availability matters more than in less institution-dense cities.",
      "Being Delhi-based means in-person meetings are genuinely possible when useful. INR pricing is transparent, with most Delhi healthcare website projects following standard India pricing.",
    ],
    'faqs' => [
      ['q' => "How does being near AIIMS affect what a private Delhi practice's site needs to show?", 'a' => "It raises the bar on clarity -- patients want to see fast booking and doctor availability clearly, since that speed is often the main reason to choose a private practice over a public hospital queue."],
      ['q' => "Can we meet in person since you're Delhi-based?", 'a' => "Yes -- being Delhi-based means in-person meetings are genuinely possible for Delhi/NCR clients who prefer that."],
      ['q' => "What's the typical cost?", 'a' => "Standard India healthcare pricing applies -- most projects range INR 12,000-2,00,000 depending on scope."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-mumbai' => [
    'intro_heading' => "Healthcare Websites for Mumbai's High-Volume, Specialist-Heavy Private Market",
    'intro' => [
      "Mumbai's private healthcare market includes globally recognized specialist centers like Tata Memorial for cancer care, and competes in one of India's most saturated markets for basically every medical specialty -- a practice site needs real credibility signals to stand out, not just a contact form.",
      "Mumbai businesses compete in one of India's most saturated markets, making a genuinely fast, credible site more of a necessity than in smaller cities. INR pricing is transparent with fast turnaround.",
    ],
    'faqs' => [
      ['q' => "Does Mumbai's competitive healthcare market change the approach?", 'a' => "Yes -- given how saturated most specialties are in Mumbai, sites are built with real credibility signals and fast load times from the start."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, delivered in 7-21 days depending on scope."],
      ['q' => "Do you work with specialist centers or multi-doctor hospitals?", 'a' => "Yes -- multi-specialist hospital and diagnostic-center websites are common Mumbai project types."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-bangalore' => [
    'intro_heading' => "Healthcare Websites for Bangalore's Health-Tech and Startup-Influenced Market",
    'intro' => [
      "Bangalore's identity as India's IT and startup capital has spilled directly into healthcare, with a genuine health-tech and digital-diagnostics startup scene raising local patient expectations even for traditional clinics -- a template-feeling practice site reads as a red flag here more than elsewhere.",
      "The flip side of Bangalore's tech density is high competition, which keeps quality expectations high. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Does Bangalore's health-tech scene raise the bar for a clinic website?", 'a' => "Yes, indirectly -- patients here have seen enough well-built local health-tech products that a generic-feeling clinic site stands out for the wrong reasons."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, with delivery in 7-21 days depending on scope."],
      ['q' => "Do you work with digital-health or diagnostics startups?", 'a' => "Yes -- modern, product-focused design for health-tech and diagnostics startups is a common Bangalore request."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-gurgaon' => [
    'intro_heading' => "Healthcare Websites for Gurgaon's Corporate-Adjacent Private Hospital Market",
    'intro' => [
      "Gurgaon (Gurugram) is home to Medanta and other large private hospitals serving a genuinely corporate, insurance-aware patient base -- a smaller clinic here is often competing visually against well-funded hospital marketing, even at the independent-practitioner level.",
      "Being part of the wider Delhi-NCR region means in-person meetings are practical when useful. INR pricing is transparent, with most Gurgaon projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Does being near large private hospitals like Medanta affect what a smaller Gurgaon clinic needs?", 'a' => "Yes -- independent practices here often compete visually against well-funded hospital marketing, so a professional, credible baseline matters even for smaller clinics."],
      ['q' => "Can we meet in person given the NCR location?", 'a' => "Yes -- being part of the wider Delhi-NCR region, in-person meetings are practical for Gurgaon clients who prefer that."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-noida' => [
    'intro_heading' => "Healthcare Websites for Noida's Growing Multi-Specialty Hospital Chains",
    'intro' => [
      "Noida's healthcare market has grown quickly alongside its IT/BPO and electronics manufacturing base, with several multi-specialty hospital chains expanding into the area -- independent clinics need clear local SEO to be found next to these fast-growing chains.",
      "Like Gurgaon, Noida's position in Delhi-NCR keeps in-person meetings practical. INR pricing is transparent, with most Noida projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "How do independent Noida clinics compete with expanding hospital chains?", 'a' => "Through sharper local SEO and a clearly credible site -- visibility next to fast-growing multi-specialty chains matters more than broad brand advertising."],
      ['q' => "Can we meet in person?", 'a' => "Yes -- Noida's position in Delhi-NCR keeps in-person meetings practical alongside the usual remote workflow."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'healthcare-website-design-hyderabad' => [
    'intro_heading' => "Healthcare Websites for Hyderabad's Genome Valley Pharma and Biotech Corridor",
    'intro' => [
      "Hyderabad's Genome Valley pharma/biotech cluster sits alongside HITEC City's tech scene, and healthcare practices here -- from biotech-adjacent diagnostics to everyday clinics -- benefit from a site that reads as scientifically credible, matching the seriousness of the surrounding industry.",
      "Hyderabad's growing startup scene has also pushed local expectations for site quality upward. INR pricing is transparent, with most Hyderabad projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for biotech-adjacent diagnostics or pharma-linked clinics?", 'a' => "Yes -- credible, scientifically-serious site design is a common request given Hyderabad's Genome Valley pharma/biotech cluster."],
      ['q' => "Does Hyderabad's startup scene affect what's expected of a clinic site?", 'a' => "Yes -- the city's growing startup density has pushed local quality expectations up for healthcare sites too."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'healthcare-website-design-ahmedabad' => [
    'intro_heading' => "Healthcare Websites for Ahmedabad's Pharma-Manufacturing-Adjacent Patient Base",
    'intro' => [
      "Ahmedabad's economy includes a notable pharmaceutical manufacturing base, home to companies like Zydus and Torrent Pharma, and local patients tend to want straightforward, credible clinic sites that communicate clearly rather than flashy design.",
      "The city's emerging fintech and startup activity is adding a newer, more digitally-aware patient type alongside the traditional base. INR pricing is transparent, with most Ahmedabad projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Does Ahmedabad's pharma-manufacturing presence affect what patients expect?", 'a' => "Somewhat -- clear, credible sites tend to build more trust here than flashy design, reflecting the practical, industry-adjacent local business culture."],
      ['q' => "Do you also work with newer, more digitally-native patients in the city?", 'a' => "Yes -- Ahmedabad's growing fintech and startup scene has brought a newer, more digitally-aware patient type alongside the traditional base."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India healthcare pricing applies, delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
];
