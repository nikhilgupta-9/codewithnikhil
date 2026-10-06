<?php
declare(strict_types=1);

namespace NikhilWorks\Lib;

use NikhilWorks\Services\GeminiService;
use PDO;
use Throwable;

class SocialDraftGenerator
{
    private PDO $pdo;
    private Logger $logger;
    private GeminiService $gemini;

    public function __construct(?PDO $pdo = null, ?Logger $logger = null)
    {
        $this->pdo = $pdo ?? Database::getConnection();
        $this->logger = $logger ?? new Logger();
        $this->gemini = new GeminiService($this->logger);
    }

    /**
     * Create draft social jobs for a published blog.
     * Generates one draft row per platform: devto, hashnode, linkedin, x.
     */
    public function createDraftsForBlog(int $blogId, string $title, string $content, string $metaDescription = '', ?string $existingImage = null, ?string $slug = null): array
    {
        $this->logger->info("Generating social media drafts with Gemini for Blog #{$blogId} - '{$title}'");

        // 1. Generate Content & Captions with Gemini
        $geminiData = $this->gemini->generateBlogContent($title, $content, $metaDescription);

        // 2. Cover Image URL
        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $coverImageUrl = null;
        if (!empty($existingImage)) {
            $coverImageUrl = str_starts_with($existingImage, 'http') 
                ? $existingImage 
                : "{$siteUrl}/uploads/blogs/{$existingImage}";
        } else {
            $coverImageUrl = $this->gemini->generateCoverImage($title, $slug ?: "blog-{$blogId}");
        }

        $tagString = implode(',', $geminiData['tags']);
        $defaultSchedule = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        $platforms = [
            'devto' => [
                'caption' => $geminiData['devto_caption'],
                'tags'    => $tagString,
                'payload' => json_encode(['format' => 'markdown'])
            ],
            'hashnode' => [
                'caption' => $geminiData['hashnode_caption'],
                'tags'    => $tagString,
                'payload' => json_encode(['format' => 'markdown'])
            ],
            'linkedin' => [
                'caption' => $geminiData['linkedin_caption'],
                'tags'    => $tagString,
                'payload' => json_encode(['format' => 'b2b_story'])
            ],
            'x' => [
                'caption' => $geminiData['x_hook'],
                'tags'    => $tagString,
                'payload' => json_encode(['x_enabled' => (bool)Env::get('X_DEFAULT_ENABLED', false)])
            ]
        ];

        $insertedJobIds = [];

        foreach ($platforms as $platform => $pdata) {
            try {
                $stmt = $this->pdo->prepare("
                    INSERT INTO social_jobs (blog_id, platform, caption, cover_image_url, tags, scheduled_at, status, attempts, payload, created_at, updated_at)
                    VALUES (:blog_id, :platform, :caption, :cover_url, :tags, :scheduled_at, 'draft', 0, :payload, NOW(), NOW())
                    ON DUPLICATE KEY UPDATE
                        caption = IF(status = 'draft', VALUES(caption), caption),
                        cover_image_url = IF(status = 'draft', VALUES(cover_image_url), cover_image_url),
                        tags = IF(status = 'draft', VALUES(tags), tags),
                        updated_at = NOW()
                ");

                $stmt->execute([
                    ':blog_id'      => $blogId,
                    ':platform'     => $platform,
                    ':caption'      => $pdata['caption'],
                    ':cover_url'    => $coverImageUrl,
                    ':tags'         => $pdata['tags'],
                    ':scheduled_at' => $defaultSchedule,
                    ':payload'      => $pdata['payload']
                ]);

                $insertedJobIds[$platform] = (int)$this->pdo->lastInsertId();
            } catch (Throwable $e) {
                $this->logger->error("Failed inserting social draft for {$platform}: " . $e->getMessage());
            }
        }

        $this->logger->info("Social drafts created successfully for Blog #{$blogId}", $insertedJobIds);
        return $insertedJobIds;
    }
}
