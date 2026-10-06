<?php
declare(strict_types=1);

/**
 * NikhilWorks - Social Media Actions API (AJAX Endpoint)
 * Protected with Session Auth, CSRF Validation, Output Escaping & Rate Limiting.
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=UTF-8');

// 1. Authentication Guard
if (!isset($_SESSION['admin_logged_in'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized: Please log in to admin panel.']);
    exit();
}

// 2. Rate Limiting (Max 40 requests per minute per session)
$now = time();
if (!isset($_SESSION['social_api_req_count']) || $_SESSION['social_api_req_window'] < $now - 60) {
    $_SESSION['social_api_req_count'] = 1;
    $_SESSION['social_api_req_window'] = $now;
} else {
    $_SESSION['social_api_req_count']++;
    if ($_SESSION['social_api_req_count'] > 40) {
        http_response_code(429);
        echo json_encode(['success' => false, 'message' => 'Rate limit exceeded: Too many requests. Please wait a moment.']);
        exit();
    }
}

// 3. Load Libraries
require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Database.php';
require_once dirname(__DIR__) . '/lib/Logger.php';
require_once dirname(__DIR__) . '/services/PlatformPublisherInterface.php';
require_once dirname(__DIR__) . '/services/DevtoService.php';
require_once dirname(__DIR__) . '/services/HashnodeService.php';
require_once dirname(__DIR__) . '/services/LinkedinService.php';
require_once dirname(__DIR__) . '/services/XService.php';
require_once dirname(__DIR__) . '/services/GeminiService.php';
require_once dirname(__DIR__) . '/lib/SocialDraftGenerator.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use NikhilWorks\Services\DevtoService;
use NikhilWorks\Services\HashnodeService;
use NikhilWorks\Services\LinkedinService;
use NikhilWorks\Services\XService;
use NikhilWorks\Services\GeminiService;
use NikhilWorks\Lib\SocialDraftGenerator;

Env::load(dirname(__DIR__) . '/.env');
date_default_timezone_set((string)Env::get('TIMEZONE', 'Asia/Kolkata'));

$logger = new Logger();

try {
    $pdo = Database::getConnection();

    // 4. CSRF Validation
    $submittedToken = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
    $sessionToken = $_SESSION['social_csrf_token'] ?? '';

    if (empty($submittedToken) || !hash_equals($sessionToken, $submittedToken)) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Invalid or expired CSRF token. Please refresh the page.']);
        exit();
    }

    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'update_job':
            $jobId = (int)($_POST['job_id'] ?? 0);
            $caption = trim((string)($_POST['caption'] ?? ''));
            $tags = trim((string)($_POST['tags'] ?? ''));
            $coverUrl = trim((string)($_POST['cover_image_url'] ?? ''));
            $scheduledAt = trim((string)($_POST['scheduled_at'] ?? ''));
            $xEnabled = isset($_POST['x_enabled']) ? (bool)$_POST['x_enabled'] : false;

            if ($jobId <= 0) {
                throw new \InvalidArgumentException("Invalid Job ID");
            }

            // Fetch current payload
            $stmt = $pdo->prepare("SELECT payload FROM social_jobs WHERE id = :id");
            $stmt->execute([':id' => $jobId]);
            $currentJob = $stmt->fetch();
            $payload = !empty($currentJob['payload']) ? json_decode((string)$currentJob['payload'], true) : [];
            $payload['x_enabled'] = $xEnabled;

            $update = $pdo->prepare("
                UPDATE social_jobs 
                SET caption = :caption,
                    tags = :tags,
                    cover_image_url = :cover,
                    scheduled_at = :scheduled_at,
                    payload = :payload,
                    updated_at = NOW()
                WHERE id = :id
            ");
            $update->execute([
                ':caption'      => $caption,
                ':tags'         => $tags,
                ':cover'        => $coverUrl ?: null,
                ':scheduled_at' => $scheduledAt ?: date('Y-m-d H:i:s', strtotime('+10 minutes')),
                ':payload'      => json_encode($payload),
                ':id'           => $jobId
            ]);

            echo json_encode(['success' => true, 'message' => 'Job content updated successfully!']);
            break;

        case 'approve_job':
            $jobId = (int)($_POST['job_id'] ?? 0);
            if ($jobId <= 0) throw new \InvalidArgumentException("Invalid Job ID");

            $update = $pdo->prepare("UPDATE social_jobs SET status = 'approved', updated_at = NOW() WHERE id = :id AND status != 'posted'");
            $update->execute([':id' => $jobId]);

            echo json_encode(['success' => true, 'message' => 'Job approved & queued for publishing!']);
            break;

        case 'reject_job':
            $jobId = (int)($_POST['job_id'] ?? 0);
            if ($jobId <= 0) throw new \InvalidArgumentException("Invalid Job ID");

            $update = $pdo->prepare("UPDATE social_jobs SET status = 'draft', updated_at = NOW() WHERE id = :id AND status != 'posted'");
            $update->execute([':id' => $jobId]);

            echo json_encode(['success' => true, 'message' => 'Job reverted to draft.']);
            break;

        case 'retry_job':
            $jobId = (int)($_POST['job_id'] ?? 0);
            if ($jobId <= 0) throw new \InvalidArgumentException("Invalid Job ID");

            $update = $pdo->prepare("UPDATE social_jobs SET status = 'approved', attempts = 0, error = NULL, updated_at = NOW() WHERE id = :id");
            $update->execute([':id' => $jobId]);

            echo json_encode(['success' => true, 'message' => 'Job reset for retry on next cron run.']);
            break;

        case 'publish_now':
            $jobId = (int)($_POST['job_id'] ?? 0);
            if ($jobId <= 0) throw new \InvalidArgumentException("Invalid Job ID");

            $stmt = $pdo->prepare("
                SELECT j.*, b.title AS blog_title, b.slug_url, b.content AS blog_content, 
                       b.meta_description AS blog_meta_desc, b.tags AS blog_tags, b.image AS blog_image
                FROM social_jobs j
                INNER JOIN blogs b ON j.blog_id = b.id
                WHERE j.id = :id
            ");
            $stmt->execute([':id' => $jobId]);
            $job = $stmt->fetch();

            if (!$job) {
                throw new \RuntimeException("Job #{$jobId} not found.");
            }

            $platform = (string)$job['platform'];
            $dryRun = (bool)Env::get('DRY_RUN', false);

            $services = [
                'devto'    => new DevtoService($logger),
                'hashnode' => new HashnodeService($logger),
                'linkedin' => new LinkedinService($logger),
                'x'        => new XService($logger),
            ];

            if (!isset($services[$platform])) {
                throw new \RuntimeException("Unknown platform handler: {$platform}");
            }

            if ($dryRun) {
                $simulatedUrl = sprintf("https://%s.com/nikhilworks/simulated-post-%d", $platform, $jobId);
                $update = $pdo->prepare("
                    UPDATE social_jobs 
                    SET status = 'posted', external_url = :url, external_id = :ext_id, error = NULL, attempts = 1, updated_at = NOW() 
                    WHERE id = :id
                ");
                $update->execute([
                    ':url'    => $simulatedUrl,
                    ':ext_id' => 'dry_run_' . uniqid(),
                    ':id'     => $jobId
                ]);

                echo json_encode([
                    'success' => true, 
                    'message' => "[DRY RUN] Simulated publishing to {$platform}!",
                    'external_url' => $simulatedUrl
                ]);
            } else {
                $service = $services[$platform];
                $result = $service->publish($job, [
                    'id'               => $job['blog_id'],
                    'title'            => $job['blog_title'],
                    'slug_url'         => $job['slug_url'],
                    'content'          => $job['blog_content'],
                    'meta_description' => $job['blog_meta_desc'],
                    'tags'             => $job['blog_tags'],
                    'image'            => $job['blog_image']
                ]);

                $update = $pdo->prepare("
                    UPDATE social_jobs 
                    SET status = 'posted', external_url = :url, external_id = :ext_id, error = NULL, attempts = attempts + 1, updated_at = NOW() 
                    WHERE id = :id
                ");
                $update->execute([
                    ':url'    => $result['external_url'],
                    ':ext_id' => $result['external_id'] ?? null,
                    ':id'     => $jobId
                ]);

                echo json_encode([
                    'success'      => true, 
                    'message'      => "Successfully published to " . strtoupper($platform) . "!",
                    'external_url' => $result['external_url']
                ]);
            }
            break;

        case 'regenerate_gemini':
            $jobId = (int)($_POST['job_id'] ?? 0);
            if ($jobId <= 0) throw new \InvalidArgumentException("Invalid Job ID");

            $stmt = $pdo->prepare("
                SELECT j.*, b.title AS blog_title, b.content AS blog_content, 
                       b.meta_description AS blog_meta_desc, b.slug_url
                FROM social_jobs j
                INNER JOIN blogs b ON j.blog_id = b.id
                WHERE j.id = :id
            ");
            $stmt->execute([':id' => $jobId]);
            $job = $stmt->fetch();

            if (!$job) throw new \RuntimeException("Job #{$jobId} not found.");

            $gemini = new GeminiService($logger);
            $genData = $gemini->generateBlogContent($job['blog_title'], $job['blog_content'], $job['blog_meta_desc'] ?: '');
            $newCover = $gemini->generateCoverImage($job['blog_title'], $job['slug_url']);

            $platform = (string)$job['platform'];
            $newCaption = match ($platform) {
                'linkedin' => $genData['linkedin_caption'],
                'x'        => $genData['x_hook'],
                'devto'    => $genData['devto_caption'],
                'hashnode' => $genData['hashnode_caption'],
                default    => $genData['linkedin_caption']
            };
            $newTags = implode(',', $genData['tags']);

            $update = $pdo->prepare("
                UPDATE social_jobs 
                SET caption = :caption,
                    tags = :tags,
                    cover_image_url = :cover,
                    updated_at = NOW()
                WHERE id = :id
            ");
            $update->execute([
                ':caption' => $newCaption,
                ':tags'    => $newTags,
                ':cover'   => $newCover,
                ':id'      => $jobId
            ]);

            echo json_encode([
                'success'         => true,
                'message'         => "Regenerated {$platform} draft with Gemini AI!",
                'caption'         => $newCaption,
                'tags'            => $newTags,
                'cover_image_url' => $newCover
            ]);
            break;

        case 'generate_for_blog':
            $blogId = (int)($_POST['blog_id'] ?? 0);
            if ($blogId <= 0) throw new \InvalidArgumentException("Invalid Blog ID");

            $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = :id");
            $stmt->execute([':id' => $blogId]);
            $blog = $stmt->fetch();

            if (!$blog) throw new \RuntimeException("Blog not found.");

            $generator = new SocialDraftGenerator($pdo, $logger);
            $generator->createDraftsForBlog(
                (int)$blog['id'],
                (string)$blog['title'],
                (string)$blog['content'],
                (string)$blog['meta_description'],
                (string)$blog['image'],
                (string)$blog['slug_url']
            );

            echo json_encode(['success' => true, 'message' => 'Social media drafts generated successfully for this blog!']);
            break;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid action specified.']);
            break;
    }
} catch (\Throwable $e) {
    http_response_code(500);
    $logger->error("Social API error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
