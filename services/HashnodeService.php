<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class HashnodeService implements PlatformPublisherInterface
{
    private Logger $logger;
    private string $graphqlUrl = 'https://gql.hashnode.com';

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function publish(array $job, array $blog): array
    {
        $apiToken = (string)Env::get('HASHNODE_API_TOKEN');
        $publicationId = (string)Env::get('HASHNODE_PUBLICATION_ID');

        if (empty($apiToken) || empty($publicationId)) {
            throw new RuntimeException("Hashnode API Token or Publication ID is not configured in .env");
        }

        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $canonicalUrl = "{$siteUrl}/blog/{$blog['slug_url']}/";

        // Tags
        $tagObjects = [];
        if (!empty($job['tags'])) {
            $rawTags = is_array($job['tags']) ? $job['tags'] : explode(',', (string)$job['tags']);
            foreach ($rawTags as $t) {
                $cleanedName = trim((string)$t);
                $slug = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $cleanedName));
                if (!empty($slug)) {
                    $tagObjects[] = [
                        'name' => $cleanedName,
                        'slug' => $slug
                    ];
                }
                if (count($tagObjects) >= 4) break;
            }
        }
        if (empty($tagObjects)) {
            $tagObjects = [
                ['name' => 'Web Development', 'slug' => 'web-development'],
                ['name' => 'Programming', 'slug' => 'programming']
            ];
        }

        $markdownContent = strip_tags((string)$blog['content']);
        if (!empty($job['caption'])) {
            $markdownContent = "> " . trim((string)$job['caption']) . "\n\n" . $markdownContent;
        }

        $input = [
            'title'               => (string)$blog['title'],
            'contentMarkdown'     => $markdownContent,
            'publicationId'       => $publicationId,
            'originalArticleURL'  => $canonicalUrl,
            'tags'                => $tagObjects
        ];

        if (!empty($job['cover_image_url'])) {
            $input['coverImageOptions'] = [
                'coverImageURL' => (string)$job['cover_image_url']
            ];
        }

        $mutation = <<<'GRAPHQL'
mutation PublishPost($input: PublishPostInput!) {
  publishPost(input: $input) {
    post {
      id
      slug
      url
      title
    }
  }
}
GRAPHQL;

        $payload = [
            'query'     => $mutation,
            'variables' => ['input' => $input]
        ];

        $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($this->graphqlUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HTTPHEADER     => [
                "Authorization: {$apiToken}",
                "Content-Type: application/json",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false) {
            throw new RuntimeException("Hashnode cURL network error: {$curlError}");
        }

        $data = json_decode((string)$response, true);

        if (!empty($data['errors'])) {
            $errMessage = $data['errors'][0]['message'] ?? json_encode($data['errors']);
            throw new RuntimeException("Hashnode GraphQL Error: {$errMessage}");
        }

        $post = $data['data']['publishPost']['post'] ?? null;
        if (!$post || empty($post['url'])) {
            throw new RuntimeException("Hashnode did not return a valid post URL. Response: " . substr((string)$response, 0, 300));
        }

        return [
            'external_url' => (string)$post['url'],
            'external_id'  => (string)$post['id']
        ];
    }
}
