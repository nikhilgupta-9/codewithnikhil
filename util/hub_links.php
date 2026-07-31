<?php
/**
 * Cross-link map for the priority regional hub pages (the country-level
 * "web-developer-usa/", "seo-services-usa/", "healthcare-website-design-usa/"
 * style pages, one tier above the per-city pages). Keyed by schema_country
 * code so hub-tier templates can look up "what else exists for this country"
 * and link to it -- this is what makes those pages part of a real site
 * hierarchy instead of orphaned pages only reachable via the sitemap.
 *
 * Only covers the 6 regions with a fully fleshed-out hub tier today (USA, UK,
 * India, UAE, Canada, Australia). Add a country here only once its hub pages
 * across services/verticals actually exist -- an entry pointing at a
 * non-existent page is worse than no cross-link at all.
 */
return [
  'US' => [
    'name' => 'the USA',
    'location' => ['label' => 'Web Development in the USA', 'url' => 'web-developer-usa/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-usa/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-usa/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-usa/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-usa/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-usa/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-usa/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-usa/'],
    ],
    'verticals' => [
      ['label' => 'Healthcare Websites', 'url' => 'healthcare-website-design-usa/'],
      ['label' => 'Real Estate Websites', 'url' => 'real-estate-website-design-usa/'],
      ['label' => 'Junk Car Websites', 'url' => 'junk-car-website-design-usa/'],
      ['label' => 'Book/Author Websites', 'url' => 'book-website-design-usa/'],
    ],
  ],
  'GB' => [
    'name' => 'the UK',
    'location' => ['label' => 'Web Development in the UK', 'url' => 'web-developer-uk/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-uk/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-uk/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-uk/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-uk/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-uk/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-uk/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-uk/'],
    ],
    'verticals' => [
      ['label' => 'Healthcare Websites', 'url' => 'healthcare-website-design-uk/'],
      ['label' => 'Real Estate Websites', 'url' => 'real-estate-website-design-uk/'],
      ['label' => 'Book/Author Websites', 'url' => 'book-website-design-uk/'],
    ],
  ],
  'IN' => [
    'name' => 'India',
    'location' => ['label' => 'Web Development in India', 'url' => 'web-developer-india/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-india/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-india/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-india/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-india/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-india/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-india/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-india/'],
    ],
    'verticals' => [
      ['label' => 'Healthcare Websites', 'url' => 'healthcare-website-design-india/'],
    ],
  ],
  'AE' => [
    'name' => 'the UAE',
    'location' => ['label' => 'Web Development in the UAE', 'url' => 'web-developer-dubai/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-uae/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-uae/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-uae/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-uae/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-uae/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-uae/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-uae/'],
    ],
    'verticals' => [
      ['label' => 'Real Estate Websites', 'url' => 'real-estate-website-design-uae/'],
    ],
  ],
  'CA' => [
    'name' => 'Canada',
    'location' => ['label' => 'Web Development in Canada', 'url' => 'web-developer-canada/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-canada/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-canada/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-canada/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-canada/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-canada/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-canada/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-canada/'],
    ],
    'verticals' => [
      ['label' => 'Real Estate Websites', 'url' => 'real-estate-website-design-canada/'],
      ['label' => 'Junk Car Websites', 'url' => 'junk-car-website-design-canada/'],
    ],
  ],
  'AU' => [
    'name' => 'Australia',
    'location' => ['label' => 'Web Development in Australia', 'url' => 'web-developer-australia/'],
    'services' => [
      ['label' => 'SEO Services', 'url' => 'seo-services-australia/'],
      ['label' => 'CRM Development', 'url' => 'crm-development-australia/'],
      ['label' => 'Website Maintenance', 'url' => 'website-maintenance-australia/'],
      ['label' => 'Website Redesign', 'url' => 'website-redesign-australia/'],
      ['label' => 'Website Auditing', 'url' => 'website-auditing-australia/'],
      ['label' => 'Keyword Promotion', 'url' => 'keyword-promotion-australia/'],
      ['label' => 'Ads Management', 'url' => 'ads-management-australia/'],
    ],
    'verticals' => [],
  ],
];
