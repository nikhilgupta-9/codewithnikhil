<?php
// Unique per-page content layer for service-api.php -- mirrors the approach
// in services-crm-content.php. Every page gets real, specific reasoning and
// its own FAQs so these read as distinct pages to both users and Google, not
// one template with the integration name swapped in.
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
    'faqs' => [
      ['q' => "I need two or three different APIs connected -- can that be one project?", 'a' => "Yes -- combining a payment gateway, WhatsApp notifications and a CRM connection into one scoped project is common and usually cheaper than three separate ones."],
      ['q' => "What if the API I need isn't listed on your service pages?", 'a' => "It's very likely still doable -- the pages below cover the most-requested categories, but any documented API can generally be integrated. Share the API docs and a quote follows within 24-48 hours."],
      ['q' => "Do you only work with Indian businesses?", 'a' => "Indian clients are the focus of this page specifically, but the same integration work is done for businesses internationally too -- get in touch either way."],
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
    'faqs' => [
      ['q' => "Which gateway should I pick -- Razorpay or Stripe?", 'a' => "Razorpay for Indian rupee payments and faster settlement to an Indian bank account; Stripe mainly if you're billing international clients in USD or EUR. Both can be added if you need each."],
      ['q' => "Do you handle the merchant account approval too?", 'a' => "The gateway account itself is created and verified by you (KYC is tied to your business), but the integration, webhook setup and testing are handled end to end."],
      ['q' => "What's the typical cost for payment gateway integration?", 'a' => "Most projects range INR 5,000-60,000 depending on how many gateways, UPI, subscriptions and refund automation are involved."],
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
    'faqs' => [
      ['q' => "Do I need a WhatsApp Business API provider account already?", 'a' => "No -- getting set up with a Meta-approved provider (like Gupshup or a similar BSP) is part of the integration if you don't already have one."],
      ['q' => "Can this send order updates automatically from my WooCommerce store?", 'a' => "Yes -- that's the most common request. The notification triggers off your existing order status changes, no manual sending required."],
      ['q' => "What's the difference in cost between notifications and a full chatbot?", 'a' => "Notifications-only integration is the lower end of the INR 8,000-80,000 range; a full FAQ/order-taking chatbot is scoped separately once the conversation flows are known."],
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
    'faqs' => [
      ['q' => "My Instagram is a personal account -- does that matter?", 'a' => "Yes -- the Graph API requires a Business or Creator account connected to a Facebook Page. Converting it is a quick, guided step if it isn't already set up that way."],
      ['q' => "Why does this need Meta app review?", 'a' => "Meta requires app review for permissions used beyond basic testing (e.g. login for real users, or a live feed for public visitors). This is factored into the project timeline from the start."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-50,000 depending on whether it's a feed widget alone or feed plus login plus shopping tags."],
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
    'faqs' => [
      ['q' => "I already have a Delhivery account with negotiated rates -- can that be used instead of Shiprocket?", 'a' => "Yes -- direct Delhivery integration keeps your existing contract and rates rather than routing through an aggregator."],
      ['q' => "Can this check if COD is available for a customer's pincode before they order?", 'a' => "Yes -- pincode serviceability and COD-availability checks can run at checkout so customers aren't shown an option that isn't actually deliverable."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-45,000 depending on order volume automation, live tracking and checkout rate calculation."],
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
    'faqs' => [
      ['q' => "Why are my order confirmation emails landing in spam right now?", 'a' => "It's almost always because they're being sent through shared hosting mail rather than a dedicated transactional email API -- switching to SendGrid or similar with proper authentication (SPF/DKIM) usually fixes it."],
      ['q' => "Do you set up the SMS/email provider account too, or just the integration?", 'a' => "The provider account (MSG91, Twilio, SendGrid, etc.) is created under your business details since billing and sender-ID approval are tied to you; the integration and testing are handled end to end."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 5,000-40,000 depending on how many channels (SMS, email, push) are involved."],
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
    'faqs' => [
      ['q' => "Is my business required to do GST e-invoicing?", 'a' => "It depends on your annual turnover crossing the government's e-invoicing threshold -- if you're unsure whether it applies, that's worth confirming with your CA first; the integration itself is the same either way once required."],
      ['q' => "Is this a compliance certification, or just the technical integration?", 'a' => "This is the technical integration connecting your system to the government/verification APIs -- it's not a substitute for advice from your CA or compliance consultant on whether/how the requirements apply to you."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 8,000-70,000 depending on whether it's e-invoicing alone or e-invoicing plus PAN/Aadhaar/bank verification."],
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
    'faqs' => [
      ['q' => "Will this reduce failed deliveries from wrong addresses?", 'a' => "That's the main reason most businesses add address autocomplete -- customers pick a verified address from Google's suggestions instead of typing a potentially incomplete one."],
      ['q' => "Do I need my own Google Cloud billing account?", 'a' => "Yes -- Maps/Places API usage is billed through your own Google Cloud account (Google gives a monthly free credit that covers most small-to-mid traffic sites); setup guidance is included."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 5,000-35,000 depending on whether it's a simple map embed or autocomplete plus a locator plus Analytics API."],
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
    'faqs' => [
      ['q' => "Is this the same as building a custom CRM?", 'a' => "No -- this is connecting an existing CRM (Zoho, HubSpot, Salesforce) to your website/systems via API. Building or deeply customizing the CRM itself is covered on the separate CRM development page."],
      ['q' => "Can this work both ways -- CRM updates showing back on my website?", 'a' => "Where the CRM's API supports it, yes -- for example a deal-stage update in the CRM reflecting on an order-status page. This is confirmed during scoping since it depends on the specific CRM and plan."],
      ['q' => "What's the typical cost?", 'a' => "Most projects range INR 6,000-55,000 depending on how many form/order/ticket flows need to sync and whether it's one-way or two-way."],
    ],
    'layout' => 'B',
  ],

];
