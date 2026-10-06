<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class DevtoService implements PlatformPublisherInterface
{
    private Logger $logger;
    private string $apiUrl = 'https://dev.to/api/articles';

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function publish(array $job, array $blog): array
    {
        $apiKey = (string)Env::get('DEVTO_API_KEY');
        if (empty($apiKey)) {
            throw new RuntimeException("DEV.to API Key (DEVTO_API_KEY) is not configured in .env");
        }

        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $canonicalUrl = "{$siteUrl}/blog/{$blog['slug_url']}/";

        // Parse up to 4 tags (alphanumeric, no spaces)
        $tags = [];
        if (!empty($job['tags'])) {
            $rawTags = is_array($job['tags']) ? $job['tags'] : explode(',', (string)$job['tags']);
            foreach ($rawTags as $t) {
                $cleaned = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', trim((string)$t)));
                if (!empty($cleaned) && !in_array($cleaned, $tags, true)) {
                    $tags[] = $cleaned;
                }
                if (count($tags) >= 4) break;
            }
        }
        if (empty($tags)) {
            $tags = ['webdev', 'javascript', 'ai', 'beginners'];
        }

        // Markdown body
        $markdownBody = strip_tags((string)$blog['content']);
        if (!empty($job['caption'])) {
            $markdownBody = "**" . trim((string)$job['caption']) . "**\n\n" . $markdownBody;
        }

        $payload = [
            'article' => [
                'title'          => (string)$blog['title'],
                'published'      => true,
                'body_markdown'  => $markdownBody,
                'canonical_url'  => $canonicalUrl,
                'description'    => substr((string)($blog['meta_description'] ?: $blog['title']), 0, 150),
                'tags'           => array_slice($tags, 0, 4)
            ]
        ];

        if (!empty($job['cover_image_url'])) {
            $payload['article']['main_image'] = (string)$job['cover_image_url'];
        }

        $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($this->apiUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 25,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HTTPHEADER     => [
                "api-key: {$apiKey}",
                "Content-Type: application/json",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new RuntimeException("DEV.to cURL network error: {$curlError}");
        }

        $data = json_decode((string)$response, true);

        if ($httpCode !== 201 && $httpCode !== 200) {
            $errorDetail = $data['error'] ?? ($data['errors'][0] ?? (string)$response);
            throw new RuntimeException("DEV.to API returned HTTP {$httpCode}: {$errorDetail}");
        }

        if (empty($data['url'])) {
            throw new RuntimeException("DEV.to response did not contain an article URL: " . substr((string)$response, 0, 200));
        }

        return [
            'external_url' => (string)$data['url'],
            'external_id'  => (string)($data['id'] ?? '')
        ];
    }
}
