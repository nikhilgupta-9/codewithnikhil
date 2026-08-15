<?php
// Unique per-page content layer for service-api.php -- mirrors the approach
// in services-crm-content.php. Every page gets real, specific reasoning and
// its own FAQs so these read as distinct pages to both users and Google, not
// one template with the integration name swapped in.
//
// Each entry also carries a 'comparison' table, a 'mistakes' list and a
// per-category 'process' -- written from how these projects actually run,
// not a generic "we build APIs" template repeated on every page.
return [

  'api-integration-services-india' => [
    'intro_heading' => "One Developer for Every API Your Business Needs",
    'intro' => [
      "Most small businesses end up needing several different APIs over time -- a payment gateway first, then WhatsApp notifications, then a CRM connection, then GST e-invoicing. Hiring a different freelancer or agency for each one means re-explaining your codebase every time and juggling multiple invoices.",
      "This page is the starting point if you're not sure which specific integration you need yet, or if you need more than one connected at once. Below are the integration categories handled most often, each with its own dedicated page and pricing -- or get in touch and describe what you're trying to connect and a scope gets worked out from there.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-plug', 'title' => 'Any REST or SOAP API', 'tagline' => 'NOT LIMITED TO A FIXED LIST', 'desc' => 'If it has documentation, it can be connected -- payment, messaging, CRM, shipping, government or internal.', 'points' => ['REST, SOAP & GraphQL APIs', 'Webhook setup & handling', 'OAuth & API key auth']],
      ['icon' => 'fa-solid fa-code-merge', 'title' => 'Works With Your Existing Stack', 'tagline' => 'NO REBUILD REQUIRED', 'desc' => 'Integration is added into your current PHP, WordPress, WooCommerce or custom site without a rewrite.', 'points' => ['PHP / MySQL backends', 'WordPress & WooCommerce', 'Custom-built websites']],
      ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Tested Before Handover', 'tagline' => 'NOT JUST "IT CONNECTED"', 'desc' => 'Error handling, retry logic and edge cases (failed payments, expired tokens, rate limits) are checked, not assumed.', 'points' => ['Error & failure handling', 'Rate-limit awareness', 'Sandbox testing before go-live']],
    ],
    'comparison' => [
      'heading' => 'Which Engagement Model Fits Your Situation',
      'sub' => "There isn't one right answer -- it depends on how many integrations you need and over what timeframe",
      'items' => [
        ['name' => 'One-off fixed-scope project', 'best_for' => 'A single, clearly defined integration (e.g. just Razorpay, just WhatsApp notifications)', 'note' => 'Fixed price agreed up front, delivered and closed -- the most common way these projects run.'],
        ['name' => 'Bundled multi-API project', 'best_for' => 'Two or three integrations needed around the same time (payments + WhatsApp + CRM, say)', 'note' => 'Scoped and quoted together -- usually cheaper and faster than running them as separate projects.'],
        ['name' => 'Ongoing maintenance add-on', 'best_for' => 'Businesses that expect to keep adding integrations or need someone to watch for breaking API changes', 'note' => "Covered under the website maintenance plans rather than a separate arrangement for every new API."],
      ],
    ],
    'mistakes' => [
      ['title' => 'Picking a provider before checking the docs', 'desc' => "A provider gets chosen off a sales call or a comparison blog post, then the actual API docs show a limitation (missing webhook, low rate limit, no sandbox) after the decision is already made public internally."],
      ['title' => 'No budget for what happens after launch', 'desc' => "Tokens expire, providers deprecate API versions, rate limits change. An integration that isn't checked on for a year is usually the one that quietly breaks first."],
      ['title' => "Treating \"it connected\" as \"it's done\"", 'desc' => "A successful test call in Postman isn't the same as handling a timeout, a malformed response or an expired token in production -- that gap is where most support requests come from later."],
    ],
    'process' => [
      ['title' => 'Understand What You Actually Need', 'desc' => "A short call or message thread to pin down which system, which API and what \"done\" looks like -- before any pricing is discussed."],
      ['title' => 'Fixed-Scope Quote', 'desc' => "A written quote covering exactly what's included, in your currency, usually back within 24-48 hours."],
      ['title' => 'Build & Sandbox Test', 'desc' => "Built against the provider's sandbox/test credentials first, including failure cases -- not just the happy path."],
      ['title' => 'Go Live & Verify', 'desc' => "Switched to production credentials and verified with a real end-to-end transaction before the project is called complete."],
    ],
    'faqs' => [
      ['q' => "I need two or three different APIs connected -- can that be one project?", 'a' => "Yes -- combining a payment gateway, WhatsApp notifications and a CRM connection into one scoped project is common and usually cheaper than three separate ones."],
      ['q' => "What if the API I need isn't listed on your service pages?", 'a' => "It's very likely still doable -- the pages below cover the most-requested categories, but any documented API can generally be integrated. Share the API docs and a quote follows within 24-48 hours."],
      ['q' => "Do you only work with Indian businesses?", 'a' => "Indian clients are the focus of this page specifically, but the same integration work is done for businesses internationally too -- get in touch either way."],
      ['q' => "How do you price something you haven't seen the API for yet?", 'a' => "By reading the provider's documentation first -- authentication method, number of endpoints actually needed, and whether webhooks are involved. That's what the price is based on, not a guess."],
      ['q' => "What happens if the API changes after the project is delivered?", 'a' => "Most providers version their APIs and give notice before deprecating an old version. If a breaking change does land, it's a small fix rather than a rebuild -- covered under a maintenance plan if you have one, or quoted separately if not."],
      ['q' => "Do you sign an NDA before looking at our API documentation or codebase?", 'a' => "Yes, if that's needed on your end -- most API docs are public anyway, but for internal/private APIs or proprietary systems an NDA is signed before anything is shared."],
    ],
    'layout' => 'A',
  ],

  'payment-gateway-integration-india' => [
    'intro_heading' => "Payment Gateway Integration Without the Checkout Headaches",
    'intro' => [
      "Most Indian businesses ask for Razorpay first -- it's the fastest to approve and has the most predictable settlement times for a new merchant account. Stripe comes up mainly for businesses billing international clients in USD/EUR, and PayU or CCAvenue still get requested by businesses that already have a merchant account with them from before Razorpay's rise.",
      "The part that actually takes the time isn't the checkout button -- it's handling what happens after: webhook verification so a payment status can't be spoofed, refund handling, and making sure a failed or abandoned payment doesn't silently lose the order. Pricing depends on whether it's a single gateway on an existing site (lower end) or multiple gateways plus UPI and subscription billing (higher end).",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-credit-card', 'title' => 'Razorpay / Stripe / PayU / CCAvenue', 'tagline' => 'PICK ONE OR SEVERAL', 'desc' => 'Checkout, webhooks and settlement reconciliation set up for whichever gateway fits your business.', 'points' => ['Checkout & webhook setup', 'Signature verification', 'Refund & failed-payment handling']],
      ['icon' => 'fa-solid fa-qrcode', 'title' => 'UPI Integration', 'tagline' => 'FASTEST INDIAN CHECKOUT', 'desc' => 'Direct UPI payment flow for websites and apps, including intent/collect flows where supported.', 'points' => ['UPI intent & QR flows', 'Payment status polling', 'Works alongside card checkout']],
      ['icon' => 'fa-brands fa-wordpress', 'title' => 'WooCommerce & Custom Carts', 'tagline' => 'ECOMMERCE-READY', 'desc' => 'Gateway plugins configured on WooCommerce, or a payment flow built into a custom cart from scratch.', 'points' => ['WooCommerce gateway setup', 'Custom cart payment flow', 'Order status sync']],
    ],
    'comparison' => [
      'heading' => 'Razorpay vs Stripe vs PayU vs CCAvenue',
      'sub' => 'The right one usually depends on who your customers are, not which gateway has the best landing page',
      'items' => [
        ['name' => 'Razorpay', 'best_for' => 'Indian businesses billing in INR, needing UPI and fast settlement', 'note' => 'Quickest KYC approval for a new merchant account; the default recommendation for most India-only businesses.'],
        ['name' => 'Stripe', 'best_for' => 'Businesses billing international clients in USD, EUR or GBP', 'note' => "India-registered businesses need Stripe's cross-border setup -- not every account type is approved instantly."],
        ['name' => 'PayU', 'best_for' => 'Businesses that already have a PayU merchant account from before', 'note' => 'Comparable feature set to Razorpay; mainly requested to keep an existing settlement relationship, not switched to fresh.'],
        ['name' => 'CCAvenue', 'best_for' => 'Older or legacy systems already wired to CCAvenue', 'note' => 'Dated checkout UI compared to newer gateways -- kept running rather than newly chosen for a fresh build.'],
      ],
    ],
    'mistakes' => [
      ['title' => 'Trusting the client-side success callback alone', 'desc' => "A checkout script calling \"order complete\" the moment the payment popup closes -- without verifying the webhook signature server-side -- can be spoofed. The order status has to be confirmed from the gateway's server callback, not the browser."],
      ['title' => 'No handling for failed or abandoned payments', 'desc' => "A customer's card gets declined or they close the tab mid-payment, and the order just sits in limbo with no follow-up email or retry link -- a checkout that only plans for success loses these sales silently."],
      ['title' => 'Refunds treated as an afterthought', 'desc' => "Refund and partial-refund flows get skipped during the build and then have to be handled manually from the gateway dashboard forever -- worth wiring in from day one if refunds are a normal part of your business."],
    ],
    'process' => [
      ['title' => 'Gateway & Docs Review', 'desc' => "Confirm which gateway(s), check your existing merchant account status, and review the specific checkout flow (one-time, subscription, split payments)."],
      ['title' => 'Fixed-Scope Quote', 'desc' => "A quote in INR covering checkout, webhook handling and refund logic, back within 24-48 hours."],
      ['title' => 'Build & Sandbox Test', 'desc' => "Checkout and webhook signature verification built and tested against the gateway's test/sandbox mode, including failed-payment cases."],
      ['title' => 'Go Live & Verify', 'desc' => "Switched to live keys and verified with a real low-value transaction before handover, including a test refund."],
    ],
    'faqs' => [
      ['q' => "Which gateway should I pick -- Razorpay or Stripe?", 'a' => "Razorpay for Indian rupee payments and faster settlement to an Indian bank account; Stripe mainly if you're billing international clients in USD or EUR. Both can be added if you need each."],
      ['q' => "Do you handle the merchant account approval too?", 'a' => "The gateway account itself is created and verified by you (KYC is tied to your business), but the integration, webhook setup and testing are handled end to end."],
      ['q' => "What's the typical cost for payment gateway integration?", 'a' => "Most projects range INR 5,000-60,000 depending on how many gateways, UPI, subscriptions and refund automation are involved."],
      ['q' => "Can you set up recurring/subscription billing, not just one-time payments?", 'a' => "Yes -- Razorpay and Stripe both support subscription billing with their own recurring-payment APIs; this is scoped separately from a one-time checkout since it involves plan management and renewal/failure handling."],
      ['q' => "Is card data stored on our server?", 'a' => "No -- card details are handled entirely by the gateway's hosted checkout or SDK, never touching your server. That's what keeps you out of PCI-DSS scope for card storage."],
      ['q' => "What happens if the gateway goes down during a sale or launch?", 'a' => "This is exactly why a second gateway (or at minimum a clear failure message with a retry option) is worth having if payment uptime matters to your business -- it's discussed during scoping if it's a real concern for you."],
      ['q' => "How long does refund processing take once it's integrated?", 'a' => "The integration itself triggers the refund instantly on your end; the money reaching the customer's account depends on the gateway and bank (typically 5-7 business days), not on the integration."],
    ],
    'layout' => 'A',
  ],

  'whatsapp-api-integration-india' => [
    'intro_heading' => "WhatsApp Where Your Customers Already Are",
    'intro' => [
      "The most common request is order and delivery notifications -- confirmation, dispatch, out-for-delivery -- sent automatically the moment an order status changes, instead of a customer having to check email or a tracking page. OTP verification on WhatsApp is the second most common ask, usually as a backup or alternative to SMS OTP.",
      "A full chatbot (answering FAQs, taking basic orders) is a bigger build than notifications-only and is scoped separately once the specific flows are known. WhatsApp Business API access itself goes through a Meta-approved provider, which is set up as part of the integration if you don't already have one.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-bell', 'title' => 'Automated Order Notifications', 'tagline' => 'NO MANUAL MESSAGING', 'desc' => 'Order confirmation, dispatch and delivery updates sent automatically from your existing order system.', 'points' => ['Triggered by order status change', 'Template message approval handled', 'Works with WooCommerce & custom orders']],
      ['icon' => 'fa-solid fa-key', 'title' => 'WhatsApp OTP Verification', 'tagline' => 'ALTERNATIVE TO SMS', 'desc' => 'Login and checkout OTP delivered over WhatsApp, often cheaper and faster to land than SMS.', 'points' => ['Signup / login OTP', 'Checkout verification', 'Fallback to SMS if needed']],
      ['icon' => 'fa-solid fa-robot', 'title' => 'WhatsApp Chatbot', 'tagline' => 'SCOPED SEPARATELY', 'desc' => 'FAQ answering and basic order-taking through WhatsApp, built around your specific conversation flows.', 'points' => ['FAQ auto-responses', 'Basic order collection', 'Handoff to a human when needed']],
    ],
    'comparison' => [
      'heading' => 'Meta Cloud API vs a BSP Provider',
      'sub' => 'Both use the same official WhatsApp Business Platform -- the difference is who you deal with for setup and billing',
      'items' => [
        ['name' => "Meta Cloud API (direct)", 'best_for' => 'Businesses comfortable managing their own Meta Business account and billing', 'note' => "No middleman fee, but template approval, number verification and support are all handled directly with Meta."],
        ['name' => "BSP provider (e.g. Gupshup, Interakt)", 'best_for' => 'Businesses that want a dashboard, faster support and easier template management', 'note' => "A small per-message or subscription fee on top of Meta's own conversation pricing -- usually worth it for the support alone."],
        ['name' => "Unofficial / third-party WhatsApp automation tools", 'best_for' => 'Nobody, honestly', 'note' => "These use WhatsApp outside the official Business Platform and risk the number getting permanently banned -- not something used on client projects."],
      ],
    ],
    'mistakes' => [
      ['title' => 'Using unofficial WhatsApp automation instead of the real Business API', 'desc' => "Tools that automate a personal WhatsApp number (not the official Cloud API or a Meta-approved BSP) violate WhatsApp's terms and the number can get banned with no warning -- this is why setup always goes through an approved provider."],
      ['title' => 'Messages sent outside an approved template', 'desc' => "Outside a 24-hour customer-initiated conversation window, only pre-approved template messages can be sent. Skipping template approval and assuming free-form messages will always work is a common surprise after launch."],
      ['title' => 'No fallback if a WhatsApp message fails to deliver', 'desc' => "A number not on WhatsApp, or a customer who's blocked business messages, means that notification silently never arrives -- worth having an SMS or email fallback for anything critical like an OTP."],
    ],
    'process' => [
      ['title' => 'Provider & Number Setup', 'desc' => "Getting your business verified with a Meta-approved provider and your WhatsApp number registered on the Business Platform, if not already done."],
      ['title' => 'Template Message Approval', 'desc' => "Message templates (order confirmation, OTP, dispatch update) drafted and submitted for Meta's approval before anything can be sent live."],
      ['title' => 'Wire Into Your Order System', 'desc' => "Notifications triggered directly from your existing order-status changes or login flow -- not a separate manual step."],
      ['title' => 'Test & Go Live', 'desc' => "Real messages tested end to end, including a failure/fallback case, before switching on for all customers."],
    ],
    'faqs' => [
      ['q' => "Do I need a WhatsApp Business API provider account already?", 'a' => "No -- getting set up with a Meta-approved provider (like Gupshup or a similar BSP) is part of the integration if you don't already have one."],
      ['q' => "Can this send order updates automatically from my WooCommerce store?", 'a' => "Yes -- that's the most common request. The notification triggers off your existing order status changes, no manual sending required."],
      ['q' => "What's the difference in cost between notifications and a full chatbot?", 'a' => "Notifications-only integration is the lower end of the INR 8,000-80,000 range; a full FAQ/order-taking chatbot is scoped separately once the conversation flows are known."],
      ['q' => "How long does Meta's template approval take?", 'a' => "Usually within 24-48 hours for straightforward transactional templates (order updates, OTPs); it can take longer if a template gets flagged for wording that looks promotional rather than transactional."],
      ['q' => "Can we use our existing personal WhatsApp Business app number?", 'a' => "Yes, the same number can usually be migrated to the official Business Platform -- it just can't stay active in the regular WhatsApp Business app at the same time once migrated."],
      ['q' => "Is there a per-message cost from WhatsApp itself?", 'a' => "Yes -- Meta charges per conversation (varies by category and country) separate from any provider fee. This is billed by Meta/your BSP directly, not something added on top by the integration itself."],
    ],
    'layout' => 'B',
  ],

  'instagram-meta-api-integration-india' => [
    'intro_heading' => "Instagram Content and Meta Login, Actually Working",
    'intro' => [
      "The most requested piece is a live Instagram feed on the website -- pulling recent posts automatically instead of someone manually re-uploading photos every time they post. This requires the Instagram Graph API (not the old, now-retired Basic Display API), which means the account needs to be a Business or Creator account connected to a Facebook Page.",
      "Facebook/Instagram login for a website and Instagram Shopping product tags come up next most often, both of which go through Meta's app review process if your usage goes beyond basic testing -- that review timeline is factored into the schedule up front rather than being a surprise later.",
    ],
    'features' => [
      ['icon' => 'fa-brands fa-instagram', 'title' => 'Live Instagram Feed', 'tagline' => 'AUTO-UPDATING, NOT MANUAL', 'desc' => 'Recent posts pulled onto your website automatically via the Instagram Graph API.', 'points' => ['Graph API (not deprecated Basic Display)', 'Auto-refreshing feed widget', 'Business/Creator account setup guidance']],
      ['icon' => 'fa-brands fa-facebook', 'title' => 'Facebook / Meta Login', 'tagline' => 'ONE-CLICK SIGN-IN', 'desc' => 'Social login for your website or app using Meta\'s OAuth flow, including app review if required.', 'points' => ['Meta OAuth login flow', 'App review submission handled', 'Works alongside email/password login']],
      ['icon' => 'fa-solid fa-bag-shopping', 'title' => 'Instagram Shopping & Ads API', 'tagline' => 'PRODUCT TAGS & CAMPAIGN DATA', 'desc' => 'Product catalog sync for Instagram Shopping tags, or Ads API data pulled into your own dashboard.', 'points' => ['Product catalog feed setup', 'Shopping tag eligibility check', 'Ads API reporting integration']],
    ],
    'comparison' => [
      'heading' => 'Graph API Feed vs a Third-Party Embed Widget',
      'sub' => "Both show Instagram posts on your site -- how they get there is where they differ",
      'items' => [
        ['name' => 'Instagram Graph API (direct)', 'best_for' => 'Businesses that want full control over layout, caching and how posts are filtered/displayed', 'note' => "Needs a Business/Creator account and token refresh handling, but no recurring third-party subscription fee."],
        ['name' => 'Third-party embed widget/plugin', 'best_for' => 'A quick, no-maintenance feed with a fixed look', 'note' => "Often comes with a monthly fee once you exceed a free post limit, and less control over exactly how it's styled."],
        ['name' => 'Manual screenshot/re-upload', 'best_for' => "Businesses posting rarely enough that automation isn't worth it", 'note' => "No integration needed at all, but someone has to remember to update it -- it usually goes stale within a few months."],
      ],
    ],
    'mistakes' => [
      ['title' => "Building against a personal Instagram account", 'desc' => "The Graph API flatly requires a Business or Creator account connected to a Facebook Page -- work started before confirming this leads to a rebuild, not a small fix."],
      ['title' => 'Assuming app review is optional', 'desc' => "Meta requires app review once real users (not just the developer) interact with login or a public feed -- skipping this and going live results in the feature getting shut off, not a warning first."],
      ['title' => 'No token refresh handling', 'desc' => "Long-lived Instagram/Facebook access tokens still expire (typically around 60 days) -- a feed or login that isn't set up to refresh the token quietly stops working a couple of months after launch."],
    ],
    'process' => [
      ['title' => 'Account & Permissions Check', 'desc' => "Confirm the Instagram account is Business/Creator and connected to a Facebook Page, and identify exactly which permissions (feed, login, shopping) are needed."],
      ['title' => 'Meta App Setup', 'desc' => "A Meta developer app created with the right permissions, and submitted for app review if your usage requires it."],
      ['title' => 'Build the Feature', 'desc' => "Feed widget, login flow or shopping tag sync built and connected to your website or app."],
      ['title' => 'Test & Handle Token Refresh', 'desc' => "Verified live, with token expiry/refresh handling in place so it doesn't silently break in a couple of months."],
    ],
    'faqs' => [
      ['q' => "My Instagram is a personal account -- does that matter?", 'a' => "Yes -- the Graph API requires a Business or Creator account connected to a Facebook Page. Converting it is a quick, guided step if it isn't already set up that way."],
      ['q' => "Why does this need Meta app review?", 'a' => "Meta requires app review for permissions used beyond basic testing (e.g. login for real users, or a live feed for public visitors). This is factored into the project timeline from the start."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-50,000 depending on whether it's a feed widget alone or feed plus login plus shopping tags."],
      ['q' => "Will the feed break if I post something new or delete an old post?", 'a' => "No -- the feed pulls whatever is currently on the account each time it refreshes, so new posts appear and deleted ones drop off automatically."],
      ['q' => "How long does Meta's app review usually take?", 'a' => "Typically a few days to about two weeks depending on which permissions are requested and how complete the submission is -- this is built into the project timeline, not billed as extra waiting time."],
      ['q' => "Can Instagram Shopping tags work if we don't have a website store yet?", 'a' => "Shopping tags need a product catalog (via Meta Commerce Manager or a connected ecommerce platform) -- if there's no catalog yet, that's set up as part of the same project."],
    ],
    'layout' => 'A',
  ],

  'shipping-logistics-api-integration-india' => [
    'intro_heading' => "Stop Manually Creating Shipping Labels for Every Order",
    'intro' => [
      "Shiprocket is the most requested integration since it aggregates multiple couriers behind one API, so order sync, tracking and rate calculation are handled through a single connection rather than integrating each courier separately. Delhivery direct integration comes up for businesses with an existing Delhivery contract and negotiated rates they want to keep using.",
      "The real value is on the order-management side: an order placed on your site should automatically create a shipment, pull the tracking number back onto the order page, and update status as it moves -- so nobody's logging into a courier dashboard separately to check where something is.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-box', 'title' => 'Automatic Order Sync', 'tagline' => 'NO COPY-PASTE ENTRY', 'desc' => 'New orders push straight from your website to Shiprocket or Delhivery to generate a shipment.', 'points' => ['Order-to-shipment automation', 'AWB / tracking number pulled back', 'Works with WooCommerce & custom orders']],
      ['icon' => 'fa-solid fa-location-dot', 'title' => 'Live Tracking on Your Site', 'tagline' => 'CUSTOMERS DON\'T LEAVE YOUR SITE', 'desc' => 'Shipment status shown directly on the order page instead of sending customers to a third-party tracking link.', 'points' => ['Status updates via webhook/polling', 'Tracking shown on order page', 'Delivery & delay notifications']],
      ['icon' => 'fa-solid fa-calculator', 'title' => 'Shipping Rate at Checkout', 'tagline' => 'REAL RATES, NOT A FLAT GUESS', 'desc' => 'Actual courier rates calculated by pincode and weight at checkout instead of a flat estimated fee.', 'points' => ['Pincode serviceability check', 'Weight/dimension-based rates', 'COD availability check']],
    ],
    'comparison' => [
      'heading' => 'Shiprocket (Aggregator) vs Delhivery Direct',
      'sub' => 'Which one makes sense depends on whether you already have courier rates worth keeping',
      'items' => [
        ['name' => 'Shiprocket (multi-courier aggregator)', 'best_for' => 'Businesses without an existing courier contract, wanting one dashboard for multiple couriers', 'note' => "One API covers several couriers with auto-recommendation, but rates are Shiprocket's own slabs, not a direct courier contract."],
        ['name' => 'Delhivery (direct)', 'best_for' => 'Businesses with an existing negotiated Delhivery contract and rates', 'note' => "Keeps your existing pricing and account manager relationship instead of routing through an aggregator's rate card."],
        ['name' => 'Multiple direct courier APIs', 'best_for' => "Higher-volume businesses wanting to split shipments by cost/reliability per courier", 'note' => "More setup and more integrations to maintain, but gives the most control over routing logic -- usually only worth it past a certain order volume."],
      ],
    ],
    'mistakes' => [
      ['title' => 'No pincode serviceability check before checkout', 'desc' => "An order gets accepted and paid for, then it turns out the courier doesn't actually deliver to that pincode -- checking serviceability before the order is placed avoids that entire refund-and-apology conversation."],
      ['title' => 'No retry logic for courier API downtime', 'desc' => "Courier APIs do go down occasionally. If an order-to-shipment call fails silently with no retry or alert, that order just sits unshipped until someone happens to notice."],
      ['title' => 'COD vs prepaid rates treated the same', 'desc' => "COD shipments usually cost more and have different serviceability than prepaid ones -- a checkout that shows one flat shipping rate regardless of payment method under- or over-charges customers on one side."],
    ],
    'process' => [
      ['title' => 'Account & API Key Setup', 'desc' => "Shiprocket or Delhivery account confirmed, API credentials generated, and existing rate/contract details reviewed."],
      ['title' => 'Order-to-Shipment Automation', 'desc' => "New orders on your site automatically create a shipment and pull the AWB/tracking number back, no manual re-entry."],
      ['title' => 'Tracking & Rate Calculation', 'desc' => "Live tracking wired onto the order page and pincode-based shipping rates added to checkout."],
      ['title' => 'Test & Go Live', 'desc' => "A real test order run end to end -- shipment creation, tracking update and rate calculation all verified before handover."],
    ],
    'faqs' => [
      ['q' => "I already have a Delhivery account with negotiated rates -- can that be used instead of Shiprocket?", 'a' => "Yes -- direct Delhivery integration keeps your existing contract and rates rather than routing through an aggregator."],
      ['q' => "Can this check if COD is available for a customer's pincode before they order?", 'a' => "Yes -- pincode serviceability and COD-availability checks can run at checkout so customers aren't shown an option that isn't actually deliverable."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-45,000 depending on order volume automation, live tracking and checkout rate calculation."],
      ['q' => "Can it automatically pick the cheapest courier for each order?", 'a' => "With Shiprocket's aggregator API, yes -- rate comparison across couriers can be run per order and the cheapest (or fastest, if preferred) option auto-selected."],
      ['q' => "What happens if a shipment gets stuck or delayed?", 'a' => "Status updates (including delays) come through the same webhook/polling connection used for normal tracking -- these can trigger a customer notification or an internal alert, whichever is more useful for your operations."],
      ['q' => "Does this handle return/reverse pickups too?", 'a' => "Yes, if the courier API supports it (Shiprocket and Delhivery both do) -- reverse pickup requests can be triggered the same way a forward shipment is created."],
    ],
    'layout' => 'B',
  ],

  'sms-communication-api-integration-india' => [
    'intro_heading' => "OTPs, Alerts and Email That Actually Land",
    'intro' => [
      "SMS OTP integration is the most common request -- almost always for signup/login verification or checkout confirmation, using a provider like MSG91, Twilio or a local SMS gateway depending on delivery reliability and cost per SMS in India. Twilio itself gets requested specifically when a business also needs voice calls or international SMS, not just Indian numbers.",
      "SendGrid (or a similar transactional email provider) comes up once a business notices their order-confirmation or password-reset emails are landing in spam when sent through a regular hosting mail server -- a dedicated transactional email API fixes that deliverability problem directly. Firebase Cloud Messaging (FCM) is specifically for push notifications on a mobile app or PWA.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-comment-sms', 'title' => 'SMS OTP & Alerts', 'tagline' => 'RELIABLE DELIVERY', 'desc' => 'OTP and transactional SMS through a provider chosen for delivery reliability and cost in India.', 'points' => ['Signup/login/checkout OTP', 'MSG91 / Twilio / local gateway', 'Delivery-status handling']],
      ['icon' => 'fa-solid fa-envelope', 'title' => 'Transactional Email (SendGrid)', 'tagline' => 'STOPS EMAILS HITTING SPAM', 'desc' => 'Order confirmations, invoices and password resets sent through a dedicated email API instead of shared hosting mail.', 'points' => ['SendGrid / SMTP API setup', 'Template-based transactional emails', 'Deliverability & spam-score fix']],
      ['icon' => 'fa-solid fa-mobile-screen', 'title' => 'Firebase Push Notifications', 'tagline' => 'FOR APPS & PWAs', 'desc' => 'FCM push notifications for a mobile app or installable web app, triggered from your backend.', 'points' => ['FCM setup (Android/iOS/web)', 'Triggered push from your backend', 'Topic & targeted notifications']],
    ],
    'comparison' => [
      'heading' => 'Which Channel and Provider Fits Your Use Case',
      'sub' => "SMS, email and push solve different problems -- most projects end up using more than one",
      'items' => [
        ['name' => 'MSG91 (SMS)', 'best_for' => 'India-only SMS OTP and alerts at the lowest cost per message', 'note' => "DLT (sender ID + template) registration with your telecom operator is required before any transactional SMS can be sent -- this is set up as part of the integration."],
        ['name' => 'Twilio (SMS / Voice)', 'best_for' => 'Businesses needing international SMS, voice calls, or a single provider across multiple countries', 'note' => "Higher per-SMS cost in India than a local gateway, but far broader country and channel coverage."],
        ['name' => 'SendGrid (Email)', 'best_for' => 'Order confirmations, invoices and password resets that need to reliably reach the inbox, not spam', 'note' => "Requires SPF/DKIM domain authentication to get full deliverability benefit -- part of the setup, not optional."],
        ['name' => 'Firebase Cloud Messaging (Push)', 'best_for' => 'Mobile apps and installable web apps (PWAs) needing native push notifications', 'note' => 'Free to use directly from Google; only relevant if you actually have an app or PWA, not a regular website.'],
      ],
    ],
    'mistakes' => [
      ['title' => 'Sending transactional SMS without DLT registration', 'desc' => "In India, TRAI's DLT (Distributed Ledger Technology) framework requires your sender ID and message templates to be pre-registered -- unregistered transactional SMS gets silently blocked by the operator, not bounced with an error you'd notice."],
      ['title' => 'Transactional email sent through shared hosting SMTP', 'desc' => "Shared hosting IPs get flagged by spam filters constantly -- order confirmations and password resets sent this way often just never reach the inbox, with no error on your end to indicate why."],
      ['title' => 'No fallback channel for a critical message', 'desc' => "An OTP sent over one channel only, with no retry or fallback, means a single provider hiccup blocks someone from logging in or checking out entirely."],
    ],
    'process' => [
      ['title' => 'Provider & Compliance Setup', 'desc' => "Provider account created, and for SMS specifically, DLT sender ID and template registration completed -- this step alone can take a few days and is started early."],
      ['title' => 'Fixed-Scope Quote', 'desc' => "A quote covering however many channels (SMS, email, push) are needed, back within 24-48 hours."],
      ['title' => 'Build & Test Deliverability', 'desc' => "Triggers wired into your signup/checkout flow and tested for actual inbox/SMS delivery, not just an API success response."],
      ['title' => 'Go Live & Monitor', 'desc' => "Switched to production sending with delivery-status handling in place so failures are visible, not silent."],
    ],
    'faqs' => [
      ['q' => "Why are my order confirmation emails landing in spam right now?", 'a' => "It's almost always because they're being sent through shared hosting mail rather than a dedicated transactional email API -- switching to SendGrid or similar with proper authentication (SPF/DKIM) usually fixes it."],
      ['q' => "Do you set up the SMS/email provider account too, or just the integration?", 'a' => "The provider account (MSG91, Twilio, SendGrid, etc.) is created under your business details since billing and sender-ID approval are tied to you; the integration and testing are handled end to end."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 5,000-40,000 depending on how many channels (SMS, email, push) are involved."],
      ['q' => "What is DLT registration and why does my SMS need it?", 'a' => "DLT is TRAI's mandatory registration for any business sending transactional/promotional SMS in India -- your sender ID and exact message templates are pre-approved. Without it, SMS gets blocked at the telecom operator level, not by the integration."],
      ['q' => "How long does DLT registration take?", 'a' => "Typically a few days once your business documents and templates are submitted -- this is factored into the project timeline since SMS can't go live without it."],
      ['q' => "Can WhatsApp be used instead of SMS for OTP to save cost?", 'a' => "Yes, and it's covered on the WhatsApp integration page -- WhatsApp OTP is often cheaper per message, though SMS is still worth keeping as a fallback for numbers not on WhatsApp."],
    ],
    'layout' => 'A',
  ],

  'gst-fintech-api-integration-india' => [
    'intro_heading' => "GST E-Invoicing and KYC Verification, Automated",
    'intro' => [
      "GST e-invoicing integration is required for businesses above the e-invoicing turnover threshold -- invoices need to be pushed to the government's Invoice Registration Portal (IRP) to get an IRN and QR code before they're legally valid. This gets integrated directly into your billing/order system so an invoice is generated and registered in one step, not two separate manual ones.",
      "PAN and Aadhaar verification API integration is the other common request, mostly from fintech-adjacent businesses, lending platforms and marketplaces doing seller/customer KYC -- confirming a PAN or bank account is genuine before onboarding someone, rather than manually checking documents.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-file-invoice', 'title' => 'GST E-Invoicing (IRP)', 'tagline' => 'COMPLIANT BY DEFAULT', 'desc' => 'Invoices generated in your system are automatically registered with the government IRP for an IRN and QR code.', 'points' => ['IRP/NIC e-invoice API', 'Automatic IRN & QR generation', 'Works with your existing billing system']],
      ['icon' => 'fa-solid fa-id-card', 'title' => 'PAN & Aadhaar Verification', 'tagline' => 'AUTOMATED KYC', 'desc' => 'Real-time PAN and Aadhaar verification during onboarding instead of manual document checks.', 'points' => ['PAN verification API', 'Aadhaar e-KYC/OTP verification', 'NSDL-based validation']],
      ['icon' => 'fa-solid fa-building-columns', 'title' => 'Bank Account Verification', 'tagline' => 'PENNY-DROP VERIFICATION', 'desc' => 'Confirm a bank account is genuine and name-matched before payouts or refunds are processed.', 'points' => ['Penny-drop / name-match verification', 'Vendor & payout onboarding checks', 'Fraud-reduction for refunds']],
    ],
    'comparison' => [
      'heading' => 'Direct IRP Integration vs a GSP Middleware',
      'sub' => 'Both get you a valid IRN -- the difference is who you deal with and how much setup is involved',
      'items' => [
        ['name' => 'Direct NIC/IRP integration', 'best_for' => 'Businesses wanting one less vendor relationship and full control over the API connection', 'note' => "Requires your own API credentials with the government portal and handling their specific authentication flow directly."],
        ['name' => 'GSP (GST Suvidha Provider) middleware', 'best_for' => 'Businesses wanting a simpler API with better documentation and support', 'note' => "Adds a small per-invoice or subscription fee on top, but abstracts away some of the IRP's rougher edges."],
        ['name' => 'Manual portal entry', 'best_for' => "Very low invoice volume where automation isn't worth building", 'note' => "No integration cost, but every invoice is manually typed into the government portal -- doesn't scale past a handful a day."],
      ],
    ],
    'mistakes' => [
      ['title' => 'No handling for IRP downtime or rejection', 'desc' => "The government portal does have downtime and does reject invoices for schema/field errors -- a billing system that assumes every submission succeeds instantly will generate invoices that were never actually registered."],
      ['title' => 'Missing mandatory e-invoice fields', 'desc' => "HSN codes, specific address formats and other mandatory fields cause a straight rejection from the IRP if missing or malformed -- these get validated before submission, not discovered after."],
      ['title' => 'Treating this as compliance advice, not just integration', 'desc' => "Whether e-invoicing applies to your specific turnover and business type is a question for your CA, not something to assume from a blog post -- the integration handles the technical connection once that's confirmed."],
    ],
    'process' => [
      ['title' => 'Confirm Applicability & Requirements', 'desc' => "Check whether e-invoicing applies to your business (worth confirming with your CA) and review your current billing system's data fields."],
      ['title' => 'GSP/IRP Credential Setup', 'desc' => "API credentials set up either directly with the IRP or through a GSP, based on which fits your volume and budget."],
      ['title' => 'Build & Test With Real Invoice Data', 'desc' => "Integration built and tested against the portal's sandbox with your actual invoice formats, catching field/schema issues before go-live."],
      ['title' => 'Go Live & Reconcile', 'desc' => "Switched to production with a reconciliation check so every invoice generated actually has a valid IRN and QR code."],
    ],
    'faqs' => [
      ['q' => "Is my business required to do GST e-invoicing?", 'a' => "It depends on your annual turnover crossing the government's e-invoicing threshold -- if you're unsure whether it applies, that's worth confirming with your CA first; the integration itself is the same either way once required."],
      ['q' => "Is this a compliance certification, or just the technical integration?", 'a' => "This is the technical integration connecting your system to the government/verification APIs -- it's not a substitute for advice from your CA or compliance consultant on whether/how the requirements apply to you."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 8,000-70,000 depending on whether it's e-invoicing alone or e-invoicing plus PAN/Aadhaar/bank verification."],
      ['q' => "Can an invoice be cancelled after it's registered with the IRP?", 'a' => "Yes, but only within a limited window after registration (set by the government, currently 24 hours) -- after that it has to be handled through a credit note instead. This constraint is built into how the integration flags cancellations."],
      ['q' => "Does this work with the billing/accounting software we already use?", 'a' => "In most cases yes -- the e-invoicing API sits alongside your existing billing system rather than replacing it, pulling invoice data from it and pushing the IRN/QR code back."],
      ['q' => "How is Aadhaar verification done without storing sensitive Aadhaar data?", 'a' => "Through UIDAI-authorized e-KYC providers using OTP-based consent verification -- the raw Aadhaar number isn't stored on your server, only the verification result, which is how this stays compliant."],
    ],
    'layout' => 'B',
  ],

  'google-maps-api-integration-india' => [
    'intro_heading' => "Location Features That Don't Feel Bolted On",
    'intro' => [
      "Store/branch locators and address autocomplete at checkout are the two most common requests -- autocomplete specifically because it cuts down on failed deliveries caused by customers typing an incomplete or wrong address manually. Delivery-area checks (is this pincode/area actually serviceable) get built on the same Places/Geocoding APIs.",
      "Google Analytics API integration is a separate, less common request -- usually from a business wanting analytics data pulled into their own admin dashboard rather than checking the Google Analytics interface separately.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-map-pin', 'title' => 'Store Locator & Maps Embed', 'tagline' => 'FOR MULTI-LOCATION BUSINESSES', 'desc' => 'An interactive map showing your branches or service areas, with distance/nearest-location logic if needed.', 'points' => ['Multi-location map embed', 'Nearest-branch logic', 'Custom map styling to match your site']],
      ['icon' => 'fa-solid fa-location-crosshairs', 'title' => 'Address Autocomplete', 'tagline' => 'FEWER FAILED DELIVERIES', 'desc' => 'Places Autocomplete on checkout and forms so customers pick a verified address instead of typing it freehand.', 'points' => ['Places Autocomplete on forms', 'Address validation before submit', 'Reduces incorrect-address deliveries']],
      ['icon' => 'fa-solid fa-chart-simple', 'title' => 'Google Analytics API', 'tagline' => 'DATA IN YOUR OWN DASHBOARD', 'desc' => 'Pull your Analytics data into a custom admin dashboard instead of checking the GA interface separately.', 'points' => ['GA4 API data pull', 'Custom reporting dashboard', 'Scheduled data refresh']],
    ],
    'comparison' => [
      'heading' => 'Places Autocomplete vs a Plain Address Form',
      'sub' => "The trade-off is API cost vs how many delivery-address mistakes you're willing to absorb",
      'items' => [
        ['name' => 'Google Places Autocomplete', 'best_for' => 'Ecommerce and delivery businesses where a wrong address means a failed or delayed delivery', 'note' => "Billed per API call past the free monthly credit -- worth it once failed-delivery cost/time is factored in."],
        ['name' => 'Structured dropdown (state / city / pincode)', 'best_for' => 'Businesses wanting some validation without ongoing API cost', 'note' => "Cuts down obviously wrong entries but doesn't catch a wrong house number or street -- a lighter, free alternative."],
        ['name' => 'Plain free-text address field', 'best_for' => 'Low order volume, or B2B where a human reviews every address anyway', 'note' => "No API cost or setup, but every typo and abbreviation makes it through -- fine only if someone's manually checking each order."],
      ],
    ],
    'mistakes' => [
      ['title' => 'An unrestricted API key', 'desc' => "A Google Maps API key without domain/IP restrictions can be copied out of your page source and used by anyone -- running up your bill on someone else's traffic. Restricting the key to your domain is a five-minute step that gets skipped surprisingly often."],
      ['title' => 'No usage cap or billing alert', 'desc' => "Google gives a monthly free credit, but nothing stops usage past it automatically -- a sudden traffic spike (or the key theft above) can produce a billing surprise if there's no alert set up."],
      ['title' => 'Autocomplete assumed to work everywhere equally well', 'desc' => "Address data quality in Google Maps varies a lot between major Indian cities and smaller towns -- a locality that autocompletes perfectly in Delhi might return sparse results in a smaller town, so a manual fallback matters."],
    ],
    'process' => [
      ['title' => 'Google Cloud & Billing Setup', 'desc' => "A Google Cloud project created (or your existing one used), with billing enabled -- required by Google even though a free monthly credit applies."],
      ['title' => 'API Key Security Setup', 'desc' => "API key generated and restricted to your domain/IP, with a usage cap and billing alert configured to avoid surprise charges."],
      ['title' => 'Build the Feature', 'desc' => "Autocomplete, map embed or locator built and styled to match your site rather than looking like a bolted-on widget."],
      ['title' => 'Test & Monitor', 'desc' => "Tested across the address ranges that matter to your business, with usage monitoring left in place after handover."],
    ],
    'faqs' => [
      ['q' => "Will this reduce failed deliveries from wrong addresses?", 'a' => "That's the main reason most businesses add address autocomplete -- customers pick a verified address from Google's suggestions instead of typing a potentially incomplete one."],
      ['q' => "Do I need my own Google Cloud billing account?", 'a' => "Yes -- Maps/Places API usage is billed through your own Google Cloud account (Google gives a monthly free credit that covers most small-to-mid traffic sites); setup guidance is included."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 5,000-35,000 depending on whether it's a simple map embed or autocomplete plus a locator plus Analytics API."],
      ['q' => "What stops someone else from using our API key and running up our bill?", 'a' => "The key is restricted to your specific domain/IP as part of setup, plus a usage cap/alert is configured -- both are standard steps, not extras."],
      ['q' => "Does autocomplete work well for addresses outside major cities?", 'a' => "Coverage is generally good but does thin out in smaller towns compared to metros -- a manual address field is usually kept alongside autocomplete as a fallback rather than removed entirely."],
      ['q' => "Can the Analytics dashboard show data for multiple websites in one place?", 'a' => "Yes, if each site has GA4 set up -- the API pull can be configured to combine data from more than one property into a single dashboard view."],
    ],
    'layout' => 'A',
  ],

  'crm-api-integration-india' => [
    'intro_heading' => "Leads and Orders Into Your CRM, Automatically",
    'intro' => [
      "This is specifically about connecting your existing website, order system or support desk to a CRM you already use -- distinct from building or customizing the CRM itself (see the CRM development page for that). The most common request is website contact-form and lead-form submissions creating a record in Zoho, HubSpot or Salesforce automatically instead of someone re-typing them in from an email inbox.",
      "Freshdesk integration usually comes from businesses wanting support tickets created automatically from a contact form or a specific email address, so nothing raised through the website gets missed in a general inbox.",
    ],
    'features' => [
      ['icon' => 'fa-solid fa-file-signature', 'title' => 'Website Forms → CRM Leads', 'tagline' => 'NO MANUAL RE-ENTRY', 'desc' => 'Contact and lead-form submissions on your website create a record directly in Zoho, HubSpot or Salesforce.', 'points' => ['Form-to-CRM lead creation', 'Field mapping to your CRM setup', 'Duplicate-lead handling']],
      ['icon' => 'fa-solid fa-cart-shopping', 'title' => 'Orders & Deals Sync', 'tagline' => 'SALES DATA IN ONE PLACE', 'desc' => 'Ecommerce orders or custom app transactions pushed into the CRM as deals/records for a complete sales view.', 'points' => ['Order-to-CRM sync', 'Deal/pipeline stage updates', 'Two-way sync where supported']],
      ['icon' => 'fa-solid fa-headset', 'title' => 'Freshdesk / Support Ticket Creation', 'tagline' => 'NOTHING MISSED IN AN INBOX', 'desc' => 'Contact-form or specific-inbox messages automatically become tracked Freshdesk tickets.', 'points' => ['Form-to-ticket automation', 'Email-to-ticket routing', 'Status sync back to your site']],
    ],
    'comparison' => [
      'heading' => 'Zoho vs HubSpot vs Salesforce for API Integration',
      'sub' => "The CRM you're already paying for usually decides this -- this is about what to expect from each one's API, not which to switch to",
      'items' => [
        ['name' => 'Zoho CRM', 'best_for' => 'Small and mid-sized Indian businesses already on Zoho\'s suite', 'note' => "Straightforward REST API and generous free-tier API limits -- the most common CRM requested on this page."],
        ['name' => 'HubSpot', 'best_for' => 'Businesses wanting marketing + sales data in one system', 'note' => "Well-documented API, but full integration depth (custom properties, workflows) often needs a paid HubSpot tier, not just the free CRM."],
        ['name' => 'Salesforce', 'best_for' => 'Larger businesses or enterprise clients already standardized on Salesforce', 'note' => "The most powerful and most complex API of the three -- authentication and object mapping take longer to set up than Zoho or HubSpot."],
      ],
    ],
    'mistakes' => [
      ['title' => 'No duplicate-lead handling', 'desc' => "A customer submitting the same form twice, or a form resubmission after a page refresh, creates two separate CRM records instead of updating one -- worth deciding upfront how duplicates should be matched and merged."],
      ['title' => 'Field mapping that breaks silently', 'desc' => "A CRM custom field gets renamed or a picklist option changes on the CRM side, and form submissions start failing to map -- without error logging, this can go unnoticed for weeks while leads quietly stop syncing."],
      ['title' => 'Hitting CRM API rate limits at volume', 'desc' => "Most CRM APIs cap how many calls you can make per day/minute -- a high-traffic form or bulk order sync that isn't built with batching or backoff in mind can start failing once volume grows past what worked fine in testing."],
    ],
    'process' => [
      ['title' => 'CRM Access & Field Mapping', 'desc' => "API access set up on your CRM account, and a field-mapping plan agreed (which website field maps to which CRM property)."],
      ['title' => 'Fixed-Scope Quote', 'desc' => "A quote covering how many forms/order flows need to sync and whether it's one-way or two-way, back within 24-48 hours."],
      ['title' => 'Build & Handle Duplicates', 'desc' => "Form/order triggers built with duplicate-lead matching and error logging, not just a happy-path connection."],
      ['title' => 'Test & Go Live', 'desc' => "Real test submissions verified landing correctly in the CRM before switching on for live traffic."],
    ],
    'faqs' => [
      ['q' => "Is this the same as building a custom CRM?", 'a' => "No -- this is connecting an existing CRM (Zoho, HubSpot, Salesforce) to your website/systems via API. Building or deeply customizing the CRM itself is covered on the separate CRM development page."],
      ['q' => "Can this work both ways -- CRM updates showing back on my website?", 'a' => "Where the CRM's API supports it, yes -- for example a deal-stage update in the CRM reflecting on an order-status page. This is confirmed during scoping since it depends on the specific CRM and plan."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-55,000 depending on how many form/order/ticket flows need to sync and whether it's one-way or two-way."],
      ['q' => "How are duplicate leads from the same customer handled?", 'a' => "By matching on email/phone before creating a new record -- an existing match gets updated instead of duplicated. The exact matching rule is agreed during scoping since CRMs differ in how they expose this."],
      ['q' => "Does our CRM plan need to be upgraded for the API to work?", 'a' => "Depends on the CRM -- Zoho's API is available on most paid plans, HubSpot sometimes needs a specific tier for deeper custom-property access, and Salesforce editions vary. This is checked against your specific plan before the project is scoped."],
      ['q' => "What happens to a form submission if the CRM is temporarily down?", 'a' => "It's queued and retried rather than dropped -- error logging is part of the build specifically so a CRM outage doesn't mean lost leads."],
    ],
    'layout' => 'B',
  ],

];
