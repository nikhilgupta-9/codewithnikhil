<?php
// Unique per-page content layer for location-india.php (added 2026-07-23 to fix
// GSC flagging web-developer-* / seo-services-india / etc. India pages as
// duplicate/thin doorway content -- see memory nikhilworks-doorway-content-fix).
//
// The 4 thematic hub pages (web-developer-india, seo-services-india,
// freelance-web-developer-india, website-development-cost-india) get content
// matching their actual topic, not generic "web developer for city X" text --
// they were previously showing identical body copy despite having different
// titles/H1s, which is its own quality-signal mismatch on top of duplication.
//
// Do NOT reduce this back to one shared paragraph with the city name swapped in.
return [
  'web-designer-delhi' => [
    'intro_heading' => "Web Design for Delhi's Government, Trade and NCR Corporate Economy",
    'intro' => [
      "Delhi's business landscape splits between government and public-sector-adjacent work, a large trading/wholesale economy (Chandni Chowk and Karol Bagh markets still anchor huge trade volumes), and the corporate offices spread across the wider NCR. A government-adjacent Delhi client wants a formal, credible site; a trading business wants a clear catalog; both need something faster and cleaner than what most local agencies deliver at their price point.",
      "Being Delhi-based means in-person meetings are genuinely possible when useful, alongside the usual remote workflow of video calls and WhatsApp. Pricing is transparent in INR, with most Delhi projects landing in the mid-range of what a custom business website typically costs in India.",
    ],
    'faqs' => [
      ['q' => "Since you're based in Delhi, can we meet in person?", 'a' => "Yes -- being Delhi-based means in-person meetings are genuinely possible for Delhi/NCR clients who prefer that, alongside the usual remote workflow."],
      ['q' => "Do you work with trading or wholesale businesses in Delhi?", 'a' => "Yes -- clear catalog sites and straightforward inquiry forms are a common need for Delhi's large trading and wholesale business base."],
      ['q' => "What does a Delhi business website typically cost?", 'a' => "Pricing is transparent in INR and scales with pages/features -- see the website development cost guide for a full breakdown, or get a fixed quote for your specific project."],
    ],
    'layout' => 'A',
  ],
  'web-developer-india' => [
    'intro_heading' => "One Developer, Every Core Web Service, Anywhere in India",
    'intro' => [
      "This page is the general starting point for Indian businesses that haven't narrowed down to a specific city yet -- every major Indian city has its own dedicated page with more specific local context (Mumbai, Bangalore, Delhi and 24 others), but the core offer is the same everywhere: direct access to the developer actually building your site, not a sales rep or project manager relaying messages from an offshore team.",
      "India's small business web development market is crowded with low-quality freelancers on one end and expensive agencies on the other. The middle ground -- a developer with real portfolio proof, transparent INR pricing and a fast turnaround -- is what this site is built around, regardless of which Indian city the business is in.",
    ],
    'faqs' => [
      ['q' => "Why is there a general India page as well as city-specific ones?", 'a' => "The city pages go into local business context for that specific market. This page is for businesses anywhere in India, including cities that don't have their own dedicated page yet."],
      ['q' => "How is this different from a typical freelancer or agency?", 'a' => "You get direct access to the person building your site (not a project manager relaying messages), agency-quality output, and transparent INR pricing without agency markup."],
      ['q' => "What's the typical turnaround for an Indian business website?", 'a' => "Most business websites are delivered in 7-21 days depending on scope, with a specific timeline confirmed at the quote stage."],
    ],
    'layout' => 'B',
  ],
  'seo-services-india' => [
    'intro_heading' => "SEO for a Country Where Most Search Traffic Is Now Mobile",
    'intro' => [
      "India's internet user base has grown overwhelmingly mobile-first, which means SEO here isn't just about ranking -- it's about ranking on a page that actually loads fast on a mid-range Android phone over patchy 4G. A site that ranks well but takes 8 seconds to load on mobile still loses the click. That combination of technical SEO and real mobile performance is where most Indian SEO campaigns actually win or lose.",
      "Indian search results are also unusually competitive for common service keywords, given how many agencies and freelancers are chasing the same terms. Instead of spreading effort thin, campaigns here focus on a realistic keyword shortlist with genuine buying intent, with monthly reporting in INR so progress is never a guessing game.",
    ],
    'faqs' => [
      ['q' => "Why does mobile performance matter so much for Indian SEO specifically?", 'a' => "India's internet users are overwhelmingly mobile-first, often on mid-range phones and patchy connections -- a slow-loading site loses the click even if it ranks well, so mobile speed is treated as core SEO work here, not an afterthought."],
      ['q' => "Indian search results seem very competitive -- how do you handle that?", 'a' => "Rather than spreading effort across too many keywords, campaigns focus on a realistic shortlist with genuine buying intent and a real chance of ranking, tracked with monthly reporting."],
      ['q' => "What does SEO typically cost in India?", 'a' => "Plans are quoted in INR and scale with how competitive your industry/keywords are -- you'll get a clear scope and price before starting, not an open-ended retainer."],
    ],
    'layout' => 'A',
  ],
  'freelance-web-developer-india' => [
    'intro_heading' => "Why Hire a Freelance Developer Instead of an Agency",
    'intro' => [
      "Most Indian web development agencies operate as a sales layer on top of freelancers or junior developers anyway -- you're paying for a middleman, not necessarily better code. Hiring a freelance developer directly cuts that layer out: you talk to the person actually writing the code, changes happen faster because there's no relay through an account manager, and the cost reflects the work itself rather than an agency's overhead.",
      "The trade-off freelancers are usually criticized for -- unreliability, disappearing mid-project -- is solved by checking track record before committing: real portfolio work, genuine client reviews, and a clear written scope with milestones, all things you can verify before paying anything upfront.",
    ],
    'faqs' => [
      ['q' => "What's the actual risk of hiring a freelancer instead of an agency?", 'a' => "The real risk is unreliability, which is solved by checking track record upfront -- real portfolio projects, genuine client reviews, and a clear written scope with milestones before any payment."],
      ['q' => "Will I be dealing directly with the developer, or a sales/account manager?", 'a' => "Directly with the person writing the code -- that's the core advantage over an agency, where you're often paying for a relay layer between you and whoever actually builds the site."],
      ['q' => "How does freelance pricing compare to an agency?", 'a' => "Typically lower, since there's no agency overhead being priced in -- you're paying for the work itself, quoted transparently in INR before starting."],
    ],
    'layout' => 'B',
  ],
  'website-development-cost-india' => [
    'intro_heading' => "What a Website Actually Costs in India, and Why Prices Vary So Much",
    'intro' => [
      "Search \"website cost India\" and you'll find quotes ranging from a few thousand rupees to several lakhs for what sounds like the same thing -- the gap is almost always about what's actually included, not a scam on one end. A ₹5,000 site is usually a static template with no real customization or ongoing support; a ₹1,00,000+ site usually includes custom design, e-commerce functionality, and support built in.",
      "The honest way to think about cost is by what you actually need: a basic brochure site, a business site with a contact/inquiry system, or a full e-commerce store with payment integration are three genuinely different projects with different price points, not the same product marked up differently.",
    ],
    'faqs' => [
      ['q' => "Why do website quotes in India vary so much (₹5,000 vs ₹1,00,000+)?", 'a' => "It's almost always about what's included, not a scam -- a very cheap site is usually a static template with no real customization, while a higher-priced one includes custom design, functionality and ongoing support."],
      ['q' => "What's a realistic starting price for a small business website?", 'a' => "Direct freelancer rates start around ₹7,999 for a basic business website, scaling up based on pages, custom features and whether e-commerce is involved."],
      ['q' => "Does a higher price always mean better quality?", 'a' => "Not automatically -- check real portfolio work and client reviews regardless of price point. What higher pricing should reliably buy is more custom work and features, not just a bigger number."],
    ],
    'layout' => 'A',
  ],
  'web-developer-mumbai' => [
    'intro_heading' => "Web Development for Mumbai's Finance, Entertainment and Trade Economy",
    'intro' => [
      "Mumbai is India's financial capital (BSE and NSE are both here) and home to Bollywood, alongside a legacy textile-trade economy that still runs a huge share of the city's small businesses. A Mumbai finance-adjacent firm wants a credible, professional site; an entertainment-adjacent business wants strong visuals; a trading business wants a clear catalog -- Mumbai's web development demand spans all three.",
      "Mumbai businesses compete in one of India's most saturated markets for basically every service, which makes a genuinely fast, well-built site more of a competitive necessity here than in smaller cities. Pricing is transparent in INR with fast turnaround.",
    ],
    'faqs' => [
      ['q' => "Do you work with finance or entertainment-adjacent businesses in Mumbai?", 'a' => "Yes -- both are common Mumbai client types, finance-adjacent firms wanting credible professional design, entertainment-adjacent businesses wanting stronger visuals."],
      ['q' => "Mumbai's market feels very competitive -- does that affect the approach?", 'a' => "Yes -- given how saturated most service categories are in Mumbai, sites are built with real SEO and speed considerations from the start, not added as an afterthought."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Most Mumbai projects follow standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-bangalore' => [
    'intro_heading' => "Web Development for Bangalore's IT and Startup Capital Identity",
    'intro' => [
      "Bangalore is India's IT and startup capital, and that identity shapes client expectations even for businesses outside tech directly -- a Bangalore business owner has seen enough well-built product sites locally that a template-feeling website reads as a red flag rather than just mediocre. Startups here in particular want a site that looks like a real product, not a placeholder.",
      "The flip side of Bangalore's tech density is genuinely high competition for web development work itself, which keeps quality expectations and delivery speed high. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for tech startups in Bangalore specifically?", 'a' => "Yes -- product-focused, modern design that doesn't read as templated is a common priority for Bangalore startups, given the high local bar set by the city's tech scene."],
      ['q' => "Does Bangalore's tech-savvy market change what's expected of a site?", 'a' => "Yes, indirectly -- clients here have seen enough well-built local product sites that a generic-feeling website stands out for the wrong reasons, so the bar for polish is higher."],
      ['q' => "What's the typical project cost and timeline?", 'a' => "Standard India pricing applies (see the cost guide), with delivery in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-gurgaon' => [
    'intro_heading' => "Web Development for Gurgaon's Corporate HQ and BPO Economy",
    'intro' => [
      "Gurgaon (Gurugram) has become a dense corporate and multinational HQ hub within Delhi-NCR, alongside a large BPO/services-industry base -- a Gurgaon business site is often competing for attention against genuinely well-funded corporate competitors, even at the small-business level, since that's the visual bar the city's business environment sets.",
      "Being part of the wider Delhi-NCR region means in-person meetings are practical when useful, on top of the usual remote workflow. INR pricing is transparent, with most Gurgaon projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Does Gurgaon's corporate environment affect what's expected of a small business site?", 'a' => "Yes -- Gurgaon clients often compete visually against well-funded corporate neighbors, so a professional, polished baseline matters even for smaller operations."],
      ['q' => "Can we meet in person given you're also NCR-based?", 'a' => "Yes -- being part of the wider Delhi-NCR region, in-person meetings are practical for Gurgaon clients who prefer that."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-noida' => [
    'intro_heading' => "Web Development for Noida's IT, BPO and Electronics Manufacturing Base",
    'intro' => [
      "Noida's economy blends IT/BPO companies with a genuinely large electronics manufacturing base and a growing media/film production sector -- a mix that produces both tech-adjacent product-style site requests and more traditional industrial B2B catalog needs from manufacturing suppliers.",
      "Like Gurgaon, Noida's position in Delhi-NCR keeps in-person meetings practical alongside the usual remote workflow. INR pricing is transparent, with most Noida projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with electronics manufacturing or IT/BPO businesses in Noida?", 'a' => "Yes -- both are common Noida client types, manufacturing suppliers typically needing clear B2B catalog pages, IT/BPO businesses wanting a more modern, product-style site."],
      ['q' => "Can we meet in person?", 'a' => "Yes -- Noida's position in Delhi-NCR keeps in-person meetings practical alongside the usual remote workflow."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-hyderabad' => [
    'intro_heading' => "Web Development for Hyderabad's IT and Pharma/Biotech Corridor",
    'intro' => [
      "Hyderabad runs on two dense industry clusters -- HITEC City's IT/tech companies and Genome Valley's pharma/biotech firms -- both of which need very different things from a website. A HITEC City tech business wants a modern, product-focused site; a pharma/biotech-adjacent firm wants a site that reads as credible and scientifically serious.",
      "Hyderabad's growing startup scene has also pushed local expectations for site quality upward over the past several years. INR pricing is transparent, with most Hyderabad projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with pharma or biotech-adjacent businesses in Hyderabad?", 'a' => "Yes -- credible, scientifically-serious site design is a common request given Hyderabad's Genome Valley pharma/biotech cluster, alongside HITEC City's tech-focused businesses."],
      ['q' => "Does Hyderabad's startup scene affect what's expected of a site?", 'a' => "Yes -- the city's growing startup density has pushed local quality expectations up, so modern, product-focused design is often the baseline expected."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-ahmedabad' => [
    'intro_heading' => "Web Development for Ahmedabad's Textile, Pharma and Diamond Trade Economy",
    'intro' => [
      "Ahmedabad's economy carries a strong textile-industry legacy, a growing pharmaceutical manufacturing base, and proximity to Surat's diamond trade -- a genuinely diverse industrial mix for a single city. Ahmedabad businesses tend to want straightforward, credible sites that clearly communicate what they do, over flashy design.",
      "The city's emerging fintech and startup activity (partly driven by nearby GIFT City) is adding a newer, more product-focused client type to that traditional industrial base. INR pricing is transparent, with most Ahmedabad projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with textile or pharma manufacturing businesses in Ahmedabad?", 'a' => "Yes -- clear, credible B2B sites are a common need given Ahmedabad's textile and pharmaceutical manufacturing base."],
      ['q' => "Do you also work with newer fintech/startup businesses in the city?", 'a' => "Yes -- Ahmedabad's growing fintech and startup activity (partly linked to nearby GIFT City) is a newer, more product-focused client type alongside traditional industry."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-kolkata' => [
    'intro_heading' => "Web Development for Kolkata's Historic Trade Hub and Growing IT Sector",
    'intro' => [
      "Kolkata's economy still runs partly on its historic role as a jute and general trading hub (Burrabazar remains one of India's largest wholesale markets), while a newer IT/ITES sector has grown steadily in Salt Lake and New Town. A Kolkata trading business wants a clear catalog site; an IT-adjacent business wants something more modern and product-focused.",
      "Kolkata businesses have historically been underserved by web development compared to Mumbai, Delhi or Bangalore, which means a genuinely well-built, fast site stands out more easily here relative to local competition. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with trading businesses in Kolkata?", 'a' => "Yes -- clear catalog and inquiry-focused sites are a common need given Kolkata's large wholesale trading economy centered around areas like Burrabazar."],
      ['q' => "Is Kolkata's web development market different from Mumbai or Bangalore?", 'a' => "It's historically been less saturated, which means a well-built site tends to stand out more easily against local competition here."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-chennai' => [
    'intro_heading' => "Web Development for Chennai's Automotive Manufacturing and IT Corridor",
    'intro' => [
      "Chennai is sometimes called the \"Detroit of India\" for its automotive manufacturing concentration, and the OMR IT corridor has built a genuinely large software/services sector alongside it. A Chennai auto-supplier business wants a clear technical capability site; an OMR IT-adjacent business wants something more modern and product-focused.",
      "Chennai's healthcare sector (notably Apollo Hospitals' home base) adds a third distinct client category to the mix, typically needing appointment booking and a trustworthy, patient-focused design. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with automotive suppliers or IT businesses in Chennai?", 'a' => "Both are common Chennai client types -- automotive suppliers typically need clear technical capability pages, OMR-corridor IT businesses want modern, product-focused design."],
      ['q' => "Do you build healthcare practice sites given Chennai's hospital sector?", 'a' => "Yes -- appointment booking and trustworthy, patient-focused design are common needs given Chennai's significant healthcare sector."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-pune' => [
    'intro_heading' => "Web Development for Pune's IT, Auto Manufacturing and Education Economy",
    'intro' => [
      "Pune combines a strong IT/services sector with significant auto manufacturing (many major automakers have plants nearby) and one of India's largest concentrations of colleges and universities. A Pune IT business wants a modern product-focused site; an auto-supplier wants clear technical capability pages; the large student/education-adjacent population also drives demand for consumer-facing local business sites.",
      "Pune's tech scene has grown enough to feel like a genuine (if smaller) alternative to Bangalore, keeping local quality expectations for a website reasonably high. INR pricing is transparent, with most Pune projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with IT or auto-manufacturing businesses in Pune?", 'a' => "Yes -- both are common Pune client types, IT businesses wanting modern product-focused sites and auto-suppliers wanting clear technical capability pages."],
      ['q' => "Does Pune's large student population affect local business web needs?", 'a' => "Indirectly -- it supports a large consumer-facing local business base (retail, food, services) alongside the city's IT and manufacturing sectors."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-lucknow' => [
    'intro_heading' => "Web Development for Lucknow's Government and Growing IT Base",
    'intro' => [
      "As Uttar Pradesh's capital, Lucknow's economy leans heavily on government and public-sector-adjacent work, alongside a well-known handicrafts sector (chikankari embroidery) and a steadily growing IT/services base as the city's tech ecosystem develops. Government-adjacent clients want formal clarity; handicraft and retail businesses want a site that showcases craft and product well.",
      "Lucknow has historically had fewer high-quality local web development options than India's bigger tech cities, so a well-built, professional site tends to stand out clearly here. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or handicraft businesses in Lucknow?", 'a' => "Both are common Lucknow client types -- government-adjacent clients want formal clarity, handicraft/retail businesses (like chikankari sellers) want strong product showcase design."],
      ['q' => "Is it hard to find good web developers in Lucknow?", 'a' => "The city has historically had fewer high-quality options compared to India's bigger tech hubs, which is part of why a well-built site tends to stand out clearly here."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-kanpur' => [
    'intro_heading' => "Web Development for Kanpur's Leather and Textile Industrial Base",
    'intro' => [
      "Kanpur's economy still centers on its historic leather and textile manufacturing industries -- the city was once called the \"Manchester of the East\" for its textile mills -- and most local web development demand comes from B2B suppliers and manufacturers in these sectors needing clear, credible capability sites rather than consumer-facing design.",
      "Kanpur's manufacturing businesses often export or supply well beyond the city itself, which makes a professional web presence more of a genuine sales tool than a formality. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with leather or textile manufacturing businesses in Kanpur?", 'a' => "Yes -- clear, credible B2B capability sites are a common need given Kanpur's leather and textile manufacturing base."],
      ['q' => "Do Kanpur manufacturers need a website if they mostly do B2B sales?", 'a' => "Often more than a purely consumer-facing business would -- many Kanpur manufacturers supply or export beyond the city, and a professional site is a real sales tool for those buyer relationships."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-jaipur' => [
    'intro_heading' => "Web Development for Jaipur's Tourism, Gems and Handicrafts Economy",
    'intro' => [
      "Jaipur's economy runs heavily on tourism, gems and jewelry (a globally significant hub for gemstone cutting), and traditional handicrafts -- three sectors where a website's visuals genuinely matter, since customers are frequently deciding based on how a piece or property looks online before ever seeing it in person.",
      "Jaipur's growing IT and startup activity is adding a newer client type on top of this traditional tourism/craft base. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for jewelry or handicraft businesses in Jaipur?", 'a' => "Yes -- strong visual presentation is the priority for Jaipur's gems, jewelry and handicraft businesses, since customers often decide based on how a piece looks online."],
      ['q' => "Do you work with tourism businesses too?", 'a' => "Yes -- booking-friendly, visually strong sites are a common need given Jaipur's large tourism sector."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-chandigarh' => [
    'intro_heading' => "Web Development for Chandigarh's Planned-City Government and IT Base",
    'intro' => [
      "As a planned city serving as the joint capital of Punjab and Haryana, Chandigarh's economy blends government and public-sector-adjacent work with a growing IT sector and a strong education base. Government-adjacent clients want formal clarity; the city's rising IT companies want more modern, product-focused sites.",
      "Chandigarh's relatively high standard of living and planned infrastructure have translated into generally higher expectations for professional presentation across local businesses. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or IT businesses in Chandigarh?", 'a' => "Both are common Chandigarh client types -- government-adjacent clients want formal clarity, the city's growing IT sector wants more modern, product-focused design."],
      ['q' => "Does Chandigarh's planned-city status affect business expectations?", 'a' => "Somewhat -- the city's relatively high standard of living tends to translate into higher expectations for professional presentation across local businesses generally."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-indore' => [
    'intro_heading' => "Web Development for Indore's Commercial Hub and Growing Startup Scene",
    'intro' => [
      "Indore functions as Madhya Pradesh's primary commercial hub, with a traditional textile-trade base now joined by a genuinely growing IT and startup scene -- helped by the city's frequent recognition as India's cleanest city, which has fed into broader civic pride and business ambition locally.",
      "Indore businesses increasingly compete not just locally but against businesses in bigger metros for the same customers online, which raises the bar for what a competitive website needs to do. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with traditional trading businesses or newer startups in Indore?", 'a' => "Both -- Indore's traditional textile-trade base and its newer, growing startup scene are both common client types here."],
      ['q' => "Does Indore's growth affect how competitive the local market is online?", 'a' => "Yes -- Indore businesses increasingly compete against bigger-metro businesses for the same online customers, which raises the bar for site quality and speed."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-ludhiana' => [
    'intro_heading' => "Web Development for Ludhiana's Textile and Manufacturing Industrial Base",
    'intro' => [
      "Ludhiana is Punjab's primary industrial hub, dominated by hosiery/textile manufacturing and a significant bicycle and auto-parts manufacturing sector. Most local web development demand comes from B2B manufacturers and suppliers needing clear capability and product pages, since a large share of Ludhiana's business is genuinely industrial rather than consumer-facing.",
      "Ludhiana manufacturers frequently supply well beyond Punjab, making a credible web presence a real tool for reaching buyers elsewhere in India and internationally. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with textile or manufacturing businesses in Ludhiana?", 'a' => "Yes -- clear B2B capability and product pages are a common need given Ludhiana's hosiery, textile and auto-parts manufacturing base."],
      ['q' => "Do Ludhiana manufacturers need a website for a mostly local customer base?", 'a' => "Often not just local -- many Ludhiana manufacturers supply well beyond Punjab, and a credible site helps reach those buyers directly."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-varanasi' => [
    'intro_heading' => "Web Development for Varanasi's Tourism and Handloom Silk Economy",
    'intro' => [
      "Varanasi's economy centers on religious tourism (one of the most visited pilgrimage cities in India) and a globally known handloom silk industry (Banarasi sarees). Both sectors depend heavily on visuals -- a tourism business needs a site that conveys the city's atmosphere, and a silk/handloom business needs product photography that does the craft justice.",
      "Varanasi's digital adoption has grown quickly in recent years even among traditional handloom businesses, many of which are now selling directly to customers outside the city for the first time. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you build sites for handloom/silk businesses in Varanasi?", 'a' => "Yes -- strong product photography and craft-focused presentation are the priority for Varanasi's handloom silk and Banarasi saree businesses."],
      ['q' => "Do you work with tourism-related businesses too?", 'a' => "Yes -- visually strong sites conveying the city's atmosphere are a common need given Varanasi's large religious tourism sector."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-bhopal' => [
    'intro_heading' => "Web Development for Bhopal's Government and Education Economy",
    'intro' => [
      "As Madhya Pradesh's capital, Bhopal's economy leans on government and public-sector-adjacent work alongside a solid education sector. Government-adjacent Bhopal clients typically want formal, clearly-organized sites over flashy design, prioritizing accessibility and correctness in how information is presented.",
      "Bhopal's business base outside government tends to be smaller and less saturated online than bigger metros, meaning a well-built site can stand out more easily against local competition. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent businesses in Bhopal?", 'a' => "Yes -- formal, clearly-organized design prioritizing accessibility is the common priority for Bhopal's government-adjacent client base."],
      ['q' => "Is Bhopal's market less competitive than bigger cities?", 'a' => "Generally yes -- the business base outside government tends to be smaller and less saturated online, so a well-built site stands out more easily here."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-surat' => [
    'intro_heading' => "Web Development for Surat's Diamond Trade and Textile Economy",
    'intro' => [
      "Surat handles the large majority of the world's diamond cutting and polishing, alongside a huge synthetic textile manufacturing base -- two industries with genuinely global buyer relationships, where a credible, professional web presence matters for international trust even when most communication still happens through established personal networks.",
      "Surat's diamond and textile businesses are often larger and more export-oriented than their web presence suggests, which is exactly the gap a well-built site closes. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with diamond or textile trading businesses in Surat?", 'a' => "Yes -- credible, professional sites that build international buyer trust are a common need given Surat's global diamond-cutting and textile trade."],
      ['q' => "Do these businesses need a website if trade happens through personal networks?", 'a' => "Increasingly yes -- even trade-network-driven businesses benefit from a credible web presence that closes the gap between how established the business actually is and how it currently presents online."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-vadodara' => [
    'intro_heading' => "Web Development for Vadodara's Petrochemical and Engineering Economy",
    'intro' => [
      "Vadodara's economy centers on petrochemical manufacturing (Gujarat's chemical industry is heavily concentrated here) and engineering firms, alongside a solid education base anchored by Maharaja Sayajirao University. Most local web development demand comes from B2B industrial suppliers needing clear technical capability pages.",
      "Vadodara businesses frequently compete for contracts against companies elsewhere in Gujarat and India, making a professional site a genuine part of the sales process rather than just a formality. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with petrochemical or engineering businesses in Vadodara?", 'a' => "Yes -- clear technical capability pages are a common need given Vadodara's concentration of petrochemical manufacturing and engineering firms."],
      ['q' => "Why does a website matter for B2B industrial suppliers?", 'a' => "Vadodara industrial businesses often compete for contracts against companies elsewhere in Gujarat and India, and a professional site is a genuine part of that competitive sales process."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-nagpur' => [
    'intro_heading' => "Web Development for Nagpur's Logistics Hub and Orange Trade Economy",
    'intro' => [
      "Nagpur's central location within India has made it a genuine logistics and distribution hub, alongside its historic identity as the \"Orange City\" for citrus trade. Logistics and distribution businesses here need clear, functional sites; agricultural trade businesses need straightforward catalog and contact information.",
      "Nagpur's IT sector is smaller than India's major tech hubs but has grown steadily, adding a newer client type on top of the city's traditional logistics and trade base. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with logistics or agricultural trade businesses in Nagpur?", 'a' => "Yes -- clear, functional B2B sites are a common need given Nagpur's role as a central-India logistics hub and its citrus/agricultural trade base."],
      ['q' => "Is Nagpur's IT sector a client source too?", 'a' => "Yes, a growing one -- smaller than India's major tech hubs, but a steady and increasing source of more modern, product-focused site requests."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-rajkot' => [
    'intro_heading' => "Web Development for Rajkot's Engineering and Auto-Parts Manufacturing Base",
    'intro' => [
      "Rajkot is one of Gujarat's major engineering and auto-parts manufacturing centers, alongside a notable jewelry-making industry. Most local web development demand comes from B2B manufacturing suppliers needing clear capability and product pages, similar in spirit to Rajkot's manufacturing peers elsewhere in Gujarat.",
      "Rajkot's manufacturers frequently supply automotive and industrial buyers well beyond the city and state, making a credible web presence a genuine part of reaching those relationships. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with engineering or auto-parts manufacturing businesses in Rajkot?", 'a' => "Yes -- clear B2B capability and product pages are a common need given Rajkot's engineering and auto-parts manufacturing base."],
      ['q' => "Do you also work with jewelry businesses in Rajkot?", 'a' => "Yes -- strong product photography and a credible, professional design are common priorities for Rajkot's jewelry-making businesses."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-coimbatore' => [
    'intro_heading' => "Web Development for Coimbatore's Textile and Engineering Economy",
    'intro' => [
      "Coimbatore has long been called the \"Manchester of South India\" for its textile manufacturing, alongside a genuinely large engineering and pump/motor manufacturing sector. Most local web development demand is B2B -- manufacturers and suppliers needing clear technical capability pages rather than consumer-facing design.",
      "Coimbatore's engineering and textile businesses often export or supply nationally, making a professional site part of the sales relationship with buyers who may never visit in person. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with textile or engineering manufacturing businesses in Coimbatore?", 'a' => "Yes -- clear technical capability and product pages are a common need given Coimbatore's textile and engineering/pump manufacturing base."],
      ['q' => "Do these businesses need a site if buyers are mostly national/export?", 'a' => "Especially then -- a professional site is often the only thing a distant buyer sees before deciding whether to reach out, making it a real part of the sales relationship."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-kochi' => [
    'intro_heading' => "Web Development for Kochi's Port, IT and Spice Trade Economy",
    'intro' => [
      "Kochi combines a historic role as a spice-trade port with a genuinely growing IT sector (Infopark and the Smart City initiative) and a large tourism economy built around its backwaters and colonial-era old town. A Kochi trading business wants a clear catalog; an IT-adjacent business wants something modern and product-focused; tourism businesses want strong visuals and booking flows.",
      "Kochi's port-city trade history means many local businesses already think internationally, which extends naturally to wanting a website that reads credibly to buyers outside Kerala entirely. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with IT businesses in Kochi's Infopark/Smart City area?", 'a' => "Yes -- modern, product-focused sites are a common request from Kochi's growing IT sector, alongside the city's traditional trade and tourism businesses."],
      ['q' => "Do you build tourism sites for Kochi's backwaters/heritage tourism sector?", 'a' => "Yes -- strong visuals and booking-friendly design are priorities for Kochi's tourism businesses, given the city's backwater and heritage-tourism draw."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-visakhapatnam' => [
    'intro_heading' => "Web Development for Visakhapatnam's Port, Steel and Tourism Economy",
    'intro' => [
      "Visakhapatnam (Vizag) combines a major port and steel industry base with a growing IT sector and a solid tourism economy built around its beaches and naval heritage. Port/steel-adjacent businesses need clear industrial capability sites; the city's emerging IT companies want something more modern; tourism businesses want strong visuals.",
      "Vizag's push to grow as an alternative IT destination to Hyderabad and Bangalore has raised local expectations for what a competitive business website should look like. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with port or steel-industry-adjacent businesses in Visakhapatnam?", 'a' => "Yes -- clear industrial capability sites are a common need given Vizag's port and steel-industry base."],
      ['q' => "Is Vizag's IT sector growing as a client source?", 'a' => "Yes -- as the city pushes to become an alternative IT hub to Hyderabad and Bangalore, more modern product-focused site requests are coming from that sector too."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
  'web-developer-bhubaneswar' => [
    'intro_heading' => "Web Development for Bhubaneswar's Temple Tourism and Growing IT Scene",
    'intro' => [
      "As Odisha's capital, Bhubaneswar blends government and public-sector-adjacent work with a well-known temple-city tourism identity and a genuinely growing IT/startup scene that's earned the city recognition as an emerging tech hub. Tourism businesses want strong visuals; the city's newer IT companies want modern, product-focused sites.",
      "Bhubaneswar's IT growth has been recent enough that local competition for web development work itself is lighter than in more established tech cities, which tends to work in a client's favor on both price and turnaround. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with tourism businesses near Bhubaneswar's temples?", 'a' => "Yes -- strong visual presentation is a priority for Bhubaneswar's temple-tourism-adjacent businesses."],
      ['q' => "Is Bhubaneswar's IT/startup scene a source of work too?", 'a' => "Yes, a growing one -- as an emerging tech hub, Bhubaneswar is producing more modern, product-focused site requests, with less local competition for the work than in bigger tech cities."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'B',
  ],
  'web-developer-patna' => [
    'intro_heading' => "Web Development for Patna's Government and Agricultural Trade Economy",
    'intro' => [
      "As Bihar's capital, Patna's economy centers on government and public-sector-adjacent work alongside a significant agricultural trade base serving the wider state. Government-adjacent clients want formal, clearly-organized sites; agricultural trade businesses want clear catalog and contact information over flashy design.",
      "Patna has historically had fewer high-quality local web development options than India's bigger cities, meaning a genuinely well-built, professional site stands out clearly against local competition. INR pricing is transparent, with most projects delivered in 7-21 days.",
    ],
    'faqs' => [
      ['q' => "Do you work with government-adjacent or agricultural trade businesses in Patna?", 'a' => "Yes -- both are common Patna client types, government-adjacent clients wanting formal clarity, agricultural trade businesses wanting clear catalog/contact information."],
      ['q' => "Is it hard to find good web development options in Patna?", 'a' => "The city has historically had fewer high-quality options than India's bigger cities, which is part of why a well-built site stands out clearly here."],
      ['q' => "What's the typical cost and turnaround?", 'a' => "Standard India pricing (see the cost guide), delivered in 7-21 days depending on scope."],
    ],
    'layout' => 'A',
  ],
];
