<?php
/**
 * Renders the "Other API & Integration Services" cross-link block shown on
 * every page in data/services-api.php, so all 9 pages are reachable from
 * each other (not just the pillar page / sitemap). Mirrors the pattern in
 * includes/hub-crosslinks.php used by the CRM/SEO/maintenance hub pages.
 */
function render_api_crosslinks(string $site, array $allPages, string $currentSlug): string {
  $pills = '';
  foreach ($allPages as $slug => $p) {
    if ($slug === $currentSlug) {
      continue;
    }
    $icon = htmlspecialchars($p['category_icon'] ?? 'fa-solid fa-plug');
    $label = htmlspecialchars($p['h1']);
    // Shorten the H1 down to a compact pill label.
    $label = preg_replace('/\s*for\s+Indian\s+(Businesses|Websites?( & Apps)?|Ecommerce)$/i', '', $label);
    $pills .= '<a href="' . htmlspecialchars($site . $slug . '/') . '" class="btn btn-outline-dark btn-sm rounded-pill m-1"><i class="' . $icon . ' me-1"></i>' . $label . '</a>';
  }

  return '
<section class="py-5 border-top bg-light">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold h4">Other API &amp; Integration Services</h2>
      <p class="text-muted mb-2">Need more than one API connected? These are usually scoped together as a single project.</p>
    </div>
    <div class="text-center">' . $pills . '</div>
  </div>
</section>';
}
