<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class LinkedinService implements PlatformPublisherInterface
{
    private Logger $logger;
    private string $postsApiUrl = 'https://api.linkedin.com/rest/posts';
    private string $version = '202401'; // Official LinkedIn REST Version

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function publish(array $job, array $blog): array
    {
        $accessToken = $this->getAccessToken();
        $personUrn = (string)Env::get('LINKEDIN_PERSON_URN');

        if (empty($accessToken)) {
            throw new RuntimeException("LinkedIn Access Token is not set. Please authenticate via /admin/social-oauth.php?provider=linkedin");
        }
        if (empty($personUrn)) {
            throw new RuntimeException("LINKEDIN_PERSON_URN is missing in .env (Format: urn:li:person:XXXXXX)");
        }

        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $canonicalUrl = "{$siteUrl}/blog/{$blog['slug_url']}/";

        $commentary = !empty($job['caption']) 
            ? (string)$job['caption'] 
            : "🚀 New Article: " . (string)$blog['title'] . "\n\n" . (string)($blog['meta_description'] ?: '') . "\n\nRead more: " . $canonicalUrl;

        // Current LinkedIn REST Posts API Schema
        $payload = [
            'author'                => $personUrn,
            'commentary'            => $commentary,
            'visibility'            => 'PUBLIC',
            'distribution'          => [
                'feedDistribution'               => 'MAIN_FEED',
                'targetEntities'                 => [],
                'thirdPartyDistributionChannels' => []
            ],
            'content'               => [
                'article' => [
                    'source'      => $canonicalUrl,
                    'title'       => (string)$blog['title'],
                    'description' => substr((string)($blog['meta_description'] ?: $blog['title']), 0, 200)
                ]
            ],
            'lifecycleState'        => 'PUBLISHED',
            'isReshareDisabledByAuthor' => false
        ];

        if (!empty($job['cover_image_url'])) {
            $payload['content']['article']['thumbnail'] = (string)$job['cover_image_url'];
        }

        $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($this->postsApiUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HEADER         => true, // We need headers to extract x-restli-id
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer {$accessToken}",
                "LinkedIn-Version: {$this->version}",
                "X-Restli-Protocol-Version: 2.0.0",
                "Content-Type: application/json",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $rawResponse = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($rawResponse === false) {
            throw new RuntimeException("LinkedIn cURL network error: {$curlError}");
        }

        $headers = substr((string)$rawResponse, 0, $headerSize);
        $body = substr((string)$rawResponse, $headerSize);

        if ($httpCode !== 201 && $httpCode !== 200) {
            $data = json_decode($body, true);
            $errDetail = $data['message'] ?? $body;
            throw new RuntimeException("LinkedIn API returned HTTP {$httpCode}: {$errDetail}");
        }

        // Extract Post URN from x-restli-id or x-linkedin-id header
        $postUrn = '';
        if (preg_match('/x-restli-id:\s*([^\r\n]+)/i', $headers, $matches)) {
            $postUrn = trim($matches[1]);
        } elseif (preg_match('/x-linkedin-id:\s*([^\r\n]+)/i', $headers, $matches)) {
            $postUrn = trim($matches[1]);
        }

        $shareUrl = !empty($postUrn) 
            ? "https://www.linkedin.com/feed/update/{$postUrn}" 
            : "https://www.linkedin.com/in/nikhil-gupta-b30627327/recent-activity/all/";

        return [
            'external_url' => $shareUrl,
            'external_id'  => $postUrn ?: uniqid('li_')
        ];
    }

    private function getAccessToken(): ?string
    {
        // 1. Check database social_tokens table first (for refreshed OAuth tokens)
        try {
            $pdo = Database::getConnection();
            $stmt = $pdo->prepare("SELECT access_token FROM social_tokens WHERE platform = 'linkedin' LIMIT 1");
            $stmt->execute();
            $row = $stmt->fetch();
            if (!empty($row['access_token'])) {
                return (string)$row['access_token'];
            }
        } catch (\Throwable $e) {
            // fallback to env
        }

        // 2. Fallback to .env LINKEDIN_ACCESS_TOKEN
        $envToken = (string)Env::get('LINKEDIN_ACCESS_TOKEN');
        return !empty($envToken) ? $envToken : null;
    }
}
