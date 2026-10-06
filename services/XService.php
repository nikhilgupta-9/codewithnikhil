<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class XService implements PlatformPublisherInterface
{
    private Logger $logger;
    private string $tweetsApiUrl = 'https://api.twitter.com/2/tweets';

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function publish(array $job, array $blog): array
    {
        // Check per-job or global toggle
        $isGloballyEnabled = (bool)Env::get('X_DEFAULT_ENABLED', false);
        $payloadData = !empty($job['payload']) ? json_decode((string)$job['payload'], true) : [];
        $isExplicitlyAllowed = isset($payloadData['x_enabled']) ? (bool)$payloadData['x_enabled'] : $isGloballyEnabled;

        if (!$isExplicitlyAllowed) {
            $this->logger->info(sprintf("X (Twitter) posting skipped for Job #%d because X toggle is OFF.", $job['id'] ?? 0));
            return [
                'external_url' => 'https://x.com/Nikhil_Works (Skipped - X Posting Toggle was OFF)',
                'external_id'  => 'skipped'
            ];
        }

        $accessToken = $this->getAccessToken();
        if (empty($accessToken)) {
            throw new RuntimeException("X (Twitter) User OAuth 2.0 Access Token is not configured. Authenticate via /admin/social-oauth.php?provider=x");
        }

        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $canonicalUrl = "{$siteUrl}/blog/{$blog['slug_url']}/";

        // Estimate & Log API Cost
        $this->logger->info("[X_API_COST] Estimated X API dispatch credit consumed: 1 Tweet Write Operation (approx \$0.003 - \$0.01 per tweet depending on tier).");

        // Format short, punchy 280-char limit post
        $hook = !empty($job['caption']) ? trim((string)$job['caption']) : (string)$blog['title'];
        $tweetText = "{$hook}\n\nRead full article 👇\n{$canonicalUrl}\n\n#WebDev #AI @Nikhil_Works";

        // Guard against max 280 characters
        if (mb_strlen($tweetText) > 280) {
            $excess = mb_strlen($tweetText) - 277;
            $truncatedHook = mb_substr($hook, 0, max(10, mb_strlen($hook) - $excess)) . '...';
            $tweetText = "{$truncatedHook}\n\nRead full article 👇\n{$canonicalUrl}\n\n#WebDev @Nikhil_Works";
        }

        $payload = [
            'text' => $tweetText
        ];

        $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($this->tweetsApiUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 25,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer {$accessToken}",
                "Content-Type: application/json",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new RuntimeException("X (Twitter) cURL network error: {$curlError}");
        }

        $data = json_decode((string)$response, true);

        if ($httpCode !== 201 && $httpCode !== 200) {
            $errDetail = $data['detail'] ?? ($data['errors'][0]['message'] ?? (string)$response);
            throw new RuntimeException("X (Twitter) API v2 returned HTTP {$httpCode}: {$errDetail}");
        }

        $tweetId = $data['data']['id'] ?? '';
        $tweetUrl = !empty($tweetId) ? "https://x.com/Nikhil_Works/status/{$tweetId}" : "https://x.com/Nikhil_Works";

        return [
            'external_url' => $tweetUrl,
            'external_id'  => (string)$tweetId
        ];
    }

    private function getAccessToken(): ?string
    {
        // 1. Check database social_tokens table
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT access_token FROM social_tokens WHERE platform = 'x' LIMIT 1");
            $stmt->execute();
            $row = $stmt->fetch();
            if (!empty($row['access_token'])) {
                return (string)$row['access_token'];
            }
        } catch (\Throwable $e) {
            // fallback
        }

        // 2. Fallback to .env X_BEARER_TOKEN
        $envToken = (string)Env::get('X_BEARER_TOKEN');
        return !empty($envToken) ? $envToken : null;
    }
}
