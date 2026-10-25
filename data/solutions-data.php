<?php
// Global Solutions Data for NikhilWorks Global Engineering Studio
return [
  'fintech-trading-systems' => [
    'title' => 'High-Frequency Trading WebSockets & Backtesting Engines | NikhilWorks',
    'meta_title' => 'Fintech Trading System Architecture & WebSocket Engineering — NikhilWorks',
    'meta_description' => 'Architecting real-time algorithmic execution platforms, options backtesting engines, and low-latency WebSocket order pipes for hedge funds, brokers & fintech startups.',
    'badge' => 'Fintech & Algorithmic Trading',
    'hero_heading' => 'Sub-100ms Algorithmic Trading Systems & WebSocket Order Engines',
    'hero_sub' => 'We engineer production-grade execution backends, dynamic option chains, and real-time tick ingestion pipelines with zero front-end thread blocking.',
    'lead_text' => 'Standard web architectures collapse under high market volatility. We engineer custom trading engines that process thousands of ticks per second, calculate real-time Greeks, and simulate complex multi-leg option strategies with sub-millisecond precision.',
    'related_case_study' => 'bazaar-sync-trading-engine',
    'case_study_title' => 'Bazaar Sync Trading Engine',
    'features' => [
      ['title' => 'Sub-100ms WebSocket Feeds', 'desc' => 'Multi-broker socket pools with automatic heartbeat failover and binary tick normalization.'],
      ['title' => 'Real-Time Option Chain Greeks', 'desc' => 'Vectorized multi-threaded calculation of Delta, Gamma, Theta, Vega, and IV without UI lag.'],
      ['title' => 'Historical Backtesting Engines', 'desc' => 'Parallel simulation workers stress-testing multi-year minute-candle datasets under dynamic slippage models.'],
      ['title' => 'Broker API Integrations', 'desc' => 'Turnkey connector gateways for Delta Exchange, Kotak Neo, Angel One, Interactive Brokers, and Alpaca.'],
    ],
    'tech_stack' => ['Node.js', 'React.js / WebGL', 'WebSockets', 'Redis', 'PostgreSQL', 'Docker', 'Time-Series DB'],
    'risks_eliminated' => [
      'Eliminated rate-limit throttling through distributed token bucket algorithms.',
      'Prevented slippage losses via sub-second simulated order execution.',
      'Protected 99.99% system uptime through automated redundant socket failovers.',
    ],
  ],

  'flutter-cross-platform-apps' => [
    'title' => 'Production Flutter Mobile Application Engineering (iOS & Android) | NikhilWorks',
    'meta_title' => 'Enterprise Flutter iOS & Android Mobile Development — NikhilWorks',
    'meta_description' => 'Single-codebase Flutter engineering compiled to native 60 FPS iOS and Android. Guaranteed zero App Store guideline rejections and native device hardware access.',
    'badge' => 'Cross-Platform Mobile Engineering',
    'hero_heading' => 'Native 60 FPS Mobile Applications Built with Enterprise Flutter',
    'hero_sub' => 'Compile once, deploy flawlessly to Apple App Store and Google Play Store. Built for SaaS products, PropTech marketplaces, and high-growth consumer apps.',
    'lead_text' => 'Maintaining separate Swift and Kotlin engineering teams doubles your burn rate and delays feature parity. We build clean, BLoC-architected Flutter applications that look, feel, and perform indistinguishably from 100% native builds.',
    'related_case_study' => 'rejuvenate-digital-health',
    'case_study_title' => 'Rejuvenate Digital Health Platform',
    'features' => [
      ['title' => 'Zero-Rejection Store Launch', 'desc' => 'Strict compliance with Apple Human Interface Guidelines and Google Play privacy manifest requirements.'],
      ['title' => 'Native Hardware & Sensors', 'desc' => 'Direct hardware interop for Biometrics (FaceID), Camera, Bluetooth, Apple Pay, and Google Wallet.'],
      ['title' => 'Map Clustering & Geo-Pipes', 'desc' => 'Ultra-fluid 60 FPS vector map rendering supporting tens of thousands of dynamic geo-coordinates.'],
      ['title' => 'Offline-First Synchronization', 'desc' => 'Robust local database persistence ensuring users can view and draft data without an internet connection.'],
    ],
    'tech_stack' => ['Flutter (Dart)', 'Swift / Objective-C', 'Kotlin / Java', 'Firebase FCM', 'Mapbox / Google Maps SDK', 'SQLite / Hive'],
    'risks_eliminated' => [
      'Slashed mobile development and maintenance costs by 50% through a unified codebase.',
      'Eliminated store submission rejections through pre-vetted compliance architectures.',
      'Erased memory leaks and frame jitter through optimized widget tree lifecycle management.',
    ],
  ],

  'custom-saas-development' => [
    'title' => 'Custom SaaS Development & Multi-Tenant Web Architectures | NikhilWorks',
    'meta_title' => 'Custom SaaS Platform Architecture & Multi-Tenant Engineering — NikhilWorks',
    'meta_description' => 'Turn your proprietary workflow into a scalable SaaS product. Robust multi-tenant databases, role-based access control, Stripe billing, and high-performance APIs.',
    'badge' => 'Cloud & SaaS Architecture',
    'hero_heading' => 'Scalable Multi-Tenant SaaS Products Engineered for High Recurring Revenue',
    'hero_sub' => 'From MVP to enterprise-ready platform. Complete with subscription billing, granular RBAC permissions, audit logging, and automated customer onboarding.',
    'lead_text' => 'Building a commercial SaaS requires far more than basic CRUD functionality. We architect multi-tenant SaaS products designed to scale to thousands of paying organizations without database contention or security vulnerabilities.',
    'related_case_study' => 'get-accountant-nz',
    'case_study_title' => 'Get Accountant Cloud Advisory Platform',
    'features' => [
      ['title' => 'Multi-Tenant Data Isolation', 'desc' => 'Architected with tenant isolation models ensuring zero cross-customer data leakage.'],
      ['title' => 'Stripe & Paddle Subscriptions', 'desc' => 'Usage-based metering, recurring tiers, proration, automated dunning, and tax compliance.'],
      ['title' => 'Granular Role-Based Access', 'desc' => 'Enterprise team management with customizable permission matrices and compliance audit logs.'],
      ['title' => 'Developer-First REST/GraphQL APIs', 'desc' => 'Rate-limited, documented OpenAPI/Swagger endpoints ready for third-party developer ecosystems.'],
    ],
    'tech_stack' => ['PHP 8.2 / Laravel', 'Node.js', 'React.js', 'PostgreSQL / MySQL', 'Redis', 'Docker', 'Stripe Billing'],
    'risks_eliminated' => [
      'Eliminated churn caused by slow response times through aggressive Redis edge-caching.',
      'Prevented compliance failures through SOC2-ready database audit logging.',
      'Mitigated subscription payment failure drops with automated smart-retry billing hooks.',
    ],
  ],

  'scalable-ecommerce-architectures' => [
    'title' => 'High-Volume Headless & Multi-Vendor E-Commerce Architectures | NikhilWorks',
    'meta_title' => 'Enterprise E-Commerce Engineering & Sub-1.2s LCP Platforms — NikhilWorks',
    'meta_description' => 'High-conversion headless e-commerce architectures built for massive catalog scale, flash sales, instant search, and sub-1.2s Largest Contentful Paint (LCP).',
    'badge' => 'Enterprise Commerce Engineering',
    'hero_heading' => 'Headless E-Commerce Platforms Engineered for Sub-1.2s Mobile Speeds',
    'hero_sub' => 'Eliminate template bloat and slow checkouts. Custom commerce architectures handling millions in monthly transactions with high conversion rates.',
    'lead_text' => 'Every 100ms of checkout latency cuts e-commerce conversion by 7%. We build decoupled, lightweight commerce systems that load instantly, handle complex product matrices, and integrate seamlessly with multi-carrier logistics.',
    'related_case_study' => 'printmont-ecommerce-ecosystem',
    'case_study_title' => 'Printmont E-Commerce Platform',
    'features' => [
      ['title' => 'Sub-1.2s Core Web Vitals', 'desc' => 'Engineered from the ground up for 100/100 Google Lighthouse performance and instant mobile navigation.'],
      ['title' => 'Complex Variant Indexing', 'desc' => 'Pre-computed multidimensional product matrices preventing database lockups on high-traffic days.'],
      ['title' => 'Omnichannel Payment Pipes', 'desc' => '1-click UPI, Apple Pay, Google Pay, Stripe, Razorpay, and Buy Now Pay Later (BNPL) integrations.'],
      ['title' => 'Automated Warehouse ERP Sync', 'desc' => 'Real-time inventory deduction, shipping label generation, and automated GST/Tax invoicing.'],
    ],
    'tech_stack' => ['PHP / MySQL', 'Tailwind / Modern CSS', 'Next.js / React', 'Redis Cache', 'Stripe / Razorpay', 'AWS S3 CDN'],
    'risks_eliminated' => [
      'Eliminated cart abandonment through instant, friction-free single-page checkout flows.',
      'Prevented server crashes during flash-sales through edge caching and asynchronous order processing.',
      'Erased fulfillment bottlenecks through automated shipping webhook dispatches.',
    ],
  ],
];
