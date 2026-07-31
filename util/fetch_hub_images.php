<?php
/**
 * One-off script: pulls one unique, real, license-clear photo per regional
 * hub page from the Pexels API (free tier, commercial use OK, no watermark,
 * no attribution required) and saves it locally at a fixed standard size so
 * hub pages stop reusing the same 2-3 generic stock PNGs. Not run at request
 * time -- run manually after adding/changing the query lists below:
 *   php util/fetch_hub_images.php
 * (Or via browser at /util/fetch_hub_images.php on a trusted/local environment.)
 *
 * Re-running is safe: it skips any destination file that already exists, so
 * add new entries below and re-run rather than deleting the whole folder.
 */

chdir(__DIR__ . '/..');
include 'config/connect.php';

const TARGET_W = 1200;
const TARGET_H = 900;

// ── Location hubs: region-specific, one per priority country. ──
$locationQueries = [
  'usa'       => 'New York City skyline business district',
  'uk'        => 'London city skyline business',
  'india'     => 'Mumbai India skyline business district',
  'uae'       => 'Dubai skyline business district',
  'canada'    => 'Toronto Canada skyline business',
  'australia' => 'Sydney Australia skyline business',
];

// ── Service types: non-geographic, so one real photo per discipline is
//    reused across that service's regional hub pages (honest -- a CRM
//    dashboard looks the same regardless of which country the client is in). ──
$serviceQueries = [
  'seo'                => 'SEO analytics dashboard laptop screen',
  'crm'                => 'CRM software dashboard team office',
  'maintenance'        => 'developer monitoring server code screen',
  'redesign'           => 'website redesign wireframe design desk',
  'auditing'           => 'website audit analytics report screen',
  'keyword-promotion'  => 'keyword research SEO screen closeup',
  'ads'                => 'digital marketing ads dashboard analytics',
];

// ── Vertical hubs: only the region/vertical combos that actually exist. ──
$verticalQueries = [
  'healthcare-usa'    => 'doctor clinic reception modern',
  'healthcare-uk'     => 'doctor clinic reception NHS modern',
  'healthcare-india'  => 'hospital clinic reception India',
  'real-estate-usa'   => 'real estate agent house for sale',
  'real-estate-uk'    => 'real estate house for sale UK',
  'real-estate-canada'=> 'real estate house for sale Canada',
  'real-estate-uae'   => 'Dubai real estate property luxury',
  'junk-cars-usa'     => 'junk car scrap yard',
  'junk-cars-canada'  => 'car wrecking yard scrap metal pile',
  'books-usa'         => 'bookstore shelf books',
  'books-uk'          => 'bookstore shelf books UK',
];

function pexels_search(string $query): ?array {
  $ch = curl_init('https://api.pexels.com/v1/search?' . http_build_query([
    'query' => $query,
    'per_page' => 1,
    'orientation' => 'landscape',
  ]));
  curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => ['Authorization: ' . PEXELS_API_KEY],
    CURLOPT_TIMEOUT => 20,
  ]);
  $body = curl_exec($ch);
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);

  if ($status !== 200 || !$body) {
    return null;
  }
  $data = json_decode($body, true);
  if (empty($data['photos'][0])) {
    return null;
  }
  $photo = $data['photos'][0];
  return [
    'url' => $photo['src']['large2x'] ?? $photo['src']['original'],
    'photographer' => $photo['photographer'],
    'pexels_url' => $photo['url'],
  ];
}

function download_resize_crop(string $url, string $destPath, int $w, int $h): bool {
  $ch = curl_init($url);
  curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_TIMEOUT => 30]);
  $raw = curl_exec($ch);
  curl_close($ch);
  if (!$raw) {
    return false;
  }

  $src = @imagecreatefromstring($raw);
  if (!$src) {
    return false;
  }

  $srcW = imagesx($src);
  $srcH = imagesy($src);
  $srcRatio = $srcW / $srcH;
  $targetRatio = $w / $h;

  // Center-crop the source to the target aspect ratio before resizing, so
  // every saved image is exactly WxH with no letterboxing or distortion.
  if ($srcRatio > $targetRatio) {
    $cropH = $srcH;
    $cropW = (int) round($srcH * $targetRatio);
    $cropX = (int) round(($srcW - $cropW) / 2);
    $cropY = 0;
  } else {
    $cropW = $srcW;
    $cropH = (int) round($srcW / $targetRatio);
    $cropX = 0;
    $cropY = (int) round(($srcH - $cropH) / 2);
  }

  $dest = imagecreatetruecolor($w, $h);
  imagecopyresampled($dest, $src, 0, 0, $cropX, $cropY, $w, $h, $cropW, $cropH);
  $ok = imagejpeg($dest, $destPath, 85);
  imagedestroy($src);
  imagedestroy($dest);
  return $ok;
}

function process_batch(string $folder, array $queries): array {
  @mkdir(__DIR__ . '/../assets/img/' . $folder, 0755, true);
  $credits = [];
  foreach ($queries as $slug => $query) {
    $destPath = __DIR__ . '/../assets/img/' . $folder . '/' . $slug . '.jpg';
    if (file_exists($destPath)) {
      echo "  [skip, exists] $folder/$slug.jpg\n";
      continue;
    }
    $result = pexels_search($query);
    if (!$result) {
      echo "  [FAILED search] $folder/$slug (\"$query\")\n";
      continue;
    }
    if (download_resize_crop($result['url'], $destPath, TARGET_W, TARGET_H)) {
      echo "  [ok] $folder/$slug.jpg <- photo by {$result['photographer']}\n";
      $credits[$slug] = $result;
    } else {
      echo "  [FAILED download/resize] $folder/$slug\n";
    }
    usleep(300000); // be polite to the free-tier rate limit
  }
  return $credits;
}

echo "Fetching location hub images...\n";
$allCredits = ['locations' => process_batch('locations', $locationQueries)];

echo "Fetching service-type images...\n";
$allCredits['services-type'] = process_batch('services-type', $serviceQueries);

echo "Fetching vertical hub images...\n";
$allCredits['verticals'] = process_batch('verticals', $verticalQueries);

file_put_contents(
  __DIR__ . '/../assets/img/hub-image-credits.json',
  json_encode($allCredits, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
);

echo "Done. Credits saved to assets/img/hub-image-credits.json\n";
