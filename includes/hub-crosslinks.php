<?php
/**
 * Renders the "Explore more in {country}" cross-link section shared by every
 * regional hub page (location, service, and vertical hub tiers). Fixes the
 * internal-linking gap where service-hub pages (seo-services-usa/ etc.) were
 * only reachable via the sitemap, not through on-site navigation.
 */

/** Maps a schema.org country code to the slug used under assets/img/. */
function hub_country_slug(?string $schemaCountry): ?string {
  $map = ['US' => 'usa', 'GB' => 'uk', 'IN' => 'india', 'AE' => 'uae', 'CA' => 'canada', 'AU' => 'australia'];
  return $map[$schemaCountry] ?? null;
}

/** Returns the site-relative URL for a hub image if it was fetched, else null. */
function hub_image_url(string $site, string $folder, ?string $key): ?string {
  if ($key === null) {
    return null;
  }
  $path = __DIR__ . '/../assets/img/' . $folder . '/' . $key . '.jpg';
  return file_exists($path) ? $site . 'assets/img/' . $folder . '/' . $key . '.jpg' : null;
}
/**
 * One honest, non-certifying regulatory-awareness line for regions/verticals
 * where it's genuinely relevant. Phrased as practice awareness, not a
 * compliance certification claim -- there's no audit backing a certification
 * claim, so this must never say "certified" or "compliant".
 */
function render_compliance_note(?string $schemaCountry, string $context = ''): string {
  if ($schemaCountry === 'US' && $context === 'healthcare') {
    return '<p class="text-muted small mb-4"><i class="fa-solid fa-shield-halved me-1"></i>Built with HIPAA-conscious data handling practices for patient-facing forms and appointment booking.</p>';
  }
  if ($schemaCountry === 'GB') {
    return '<p class="text-muted small mb-4"><i class="fa-solid fa-shield-halved me-1"></i>GDPR-aware by default — cookie consent, data minimization and clear privacy notices built into every site.</p>';
  }
  return '';
}

function render_hub_crosslinks(string $site, ?string $schemaCountry, string $currentUrl, string $context = ''): string {
  $hubLinks = include __DIR__ . '/../util/hub_links.php';
  if (!isset($hubLinks[$schemaCountry])) {
    return '';
  }
  $region = $hubLinks[$schemaCountry];

  $links = [];
  if ($region['location']['url'] !== $currentUrl) {
    $links[] = $region['location'];
  }
  foreach ($region['services'] as $link) {
    if ($link['url'] !== $currentUrl) {
      $links[] = $link;
    }
  }
  foreach ($region['verticals'] as $link) {
    if ($link['url'] !== $currentUrl) {
      $links[] = $link;
    }
  }
  if (empty($links)) {
    return '';
  }

  $pills = '';
  foreach ($links as $link) {
    $pills .= '<a href="' . htmlspecialchars($site . $link['url']) . '" class="btn btn-outline-dark btn-sm rounded-pill m-1">' . htmlspecialchars($link['label']) . '</a>';
  }

  $countryName = htmlspecialchars($region['name']);
  $complianceNote = render_compliance_note($schemaCountry, $context);
  return '
<section class="py-5 border-top">
  <div class="container">
    <div class="text-center mb-4">
      <h2 class="fw-bold h4">Explore More Services in ' . $countryName . '</h2>
      <p class="text-muted mb-2">We work fully remotely with clients across ' . $countryName . ' — everything below is coordinated by call and email, no local office needed.</p>
      ' . $complianceNote . '
    </div>
    <div class="text-center">' . $pills . '</div>
  </div>
</section>';
}
