<?php
declare(strict_types=1);

/**
 * NikhilWorks - CLI Social Media Automation Cron Worker
 * Run every 10 minutes via system crontab:
 * (every 10 min): 0,10,20,30,40,50 * * * * /usr/bin/php /path/to/nikhilworks.com/cron/run_jobs.php >> /path/to/logs/cron_output.log 2>&1
 */

// 1. Refuse execution from web browser requests
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    header('Content-Type: text/plain');
    die("Access Denied: This script can only be executed via the server command-line interface (CLI).\n");
}

// 2. Autoload / Class registration
require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Database.php';
require_once dirname(__DIR__) . '/lib/Logger.php';
require_once dirname(__DIR__) . '/lib/Lock.php';
require_once dirname(__DIR__) . '/services/PlatformPublisherInterface.php';
require_once dirname(__DIR__) . '/services/DevtoService.php';
require_once dirname(__DIR__) . '/services/HashnodeService.php';
require_once dirname(__DIR__) . '/services/LinkedinService.php';
require_once dirname(__DIR__) . '/services/XService.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use NikhilWorks\Lib\Lock;
use NikhilWorks\Services\DevtoService;
use NikhilWorks\Services\HashnodeService;
use NikhilWorks\Services\LinkedinService;
use NikhilWorks\Services\XService;

// 3. Load Environment & Timezone
Env::load(dirname(__DIR__) . '/.env');
$timezone = (string)Env::get('TIMEZONE', 'Asia/Kolkata');
date_default_timezone_set($timezone);

$logger = new Logger();
$lock = new Lock();

// 4. Acquire Lock to prevent overlapping runs
if (!$lock->acquire()) {
    $logger->info("Cron execution skipped: Another job runner instance is currently active.");
    exit(0);
}

$logger->info("Cron runner started at " . date('Y-m-d H:i:s'));

try {
    $pdo = Database::getConnection();
    $dryRun = (bool)Env::get('DRY_RUN', false);
    $batchLimit = 5;

    // 5. Fetch approved & scheduled jobs ready for dispatch (attempts < 3)
    $stmt = $pdo->prepare("
        SELECT j.*, b.title AS blog_title, b.slug_url, b.content AS blog_content, 
               b.meta_description AS blog_meta_desc, b.tags AS blog_tags, b.image AS blog_image
        FROM social_jobs j
        INNER JOIN blogs b ON j.blog_id = b.id
        WHERE j.status = 'approved' 
          AND j.scheduled_at <= NOW()
          AND j.attempts < 3
        ORDER BY j.scheduled_at ASC
        LIMIT :limit
    ");
    $stmt->bindValue(':limit', $batchLimit, PDO::PARAM_INT);
    $stmt->execute();
    $jobs = $stmt->fetchAll();

    $logger->info(sprintf("Found %d approved social job(s) to process (DRY_RUN: %s)", count($jobs), $dryRun ? 'TRUE' : 'FALSE'));

    // Service Map Registry
    $services = [
        'devto'    => new DevtoService($logger),
        'hashnode' => new HashnodeService($logger),
        'linkedin' => new LinkedinService($logger),
        'x'        => new XService($logger),
    ];

    foreach ($jobs as $job) {
        $jobId = (int)$job['id'];
        $platform = (string)$job['platform'];
        $attempts = (int)$job['attempts'] + 1;

        $logger->info(sprintf("Processing job #%d [%s] for Blog '%s' (Attempt %d)", $jobId, strtoupper($platform), $job['blog_title'], $attempts));

        // Idempotency check: Skip if external_url is already assigned
        if (!empty($job['external_url'])) {
            $logger->warning(sprintf("Job #%d already has external_url '%s'. Marking as posted.", $jobId, $job['external_url']));
            $update = $pdo->prepare("UPDATE social_jobs SET status = 'posted', updated_at = NOW() WHERE id = :id");
            $update->execute([':id' => $jobId]);
            continue;
        }

        if (!isset($services[$platform])) {
            $errorMsg = "Unknown platform handler: {$platform}";
            $logger->error($errorMsg);
            $update = $pdo->prepare("UPDATE social_jobs SET attempts = :attempts, error = :error, status = 'failed' WHERE id = :id");
            $update->execute([':attempts' => $attempts, ':error' => $errorMsg, ':id' => $jobId]);
            continue;
        }

        try {
            if ($dryRun) {
                // DRY RUN: Simulate payload and log
                $logger->info("[DRY_RUN] Simulated publishing for job #{$jobId} [{$platform}]", [
                    'blog_title' => $job['blog_title'],
                    'caption'    => $job['caption'],
                    'cover'      => $job['cover_image_url'],
                    'tags'       => $job['tags']
                ]);

                $simulatedUrl = sprintf("https://%s.com/nikhilworks/simulated-post-%d", $platform, $jobId);
                $update = $pdo->prepare("
                    UPDATE social_jobs 
                    SET status = 'posted', 
                        external_url = :url, 
                        external_id = :ext_id,
                        error = NULL,
                        attempts = :attempts,
                        updated_at = NOW() 
                    WHERE id = :id
                ");
                $update->execute([
                    ':url'      => $simulatedUrl,
                    ':ext_id'   => 'dry_run_' . uniqid(),
                    ':attempts' => $attempts,
                    ':id'       => $jobId
                ]);
            } else {
                // LIVE API DISPATCH
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
                    SET status = 'posted', 
                        external_url = :url, 
                        external_id = :ext_id,
                        error = NULL,
                        attempts = :attempts,
                        updated_at = NOW() 
                    WHERE id = :id
                ");
                $update->execute([
                    ':url'      => $result['external_url'],
                    ':ext_id'   => $result['external_id'] ?? null,
                    ':attempts' => $attempts,
                    ':id'       => $jobId
                ]);

                $logger->info(sprintf("Successfully published job #%d to %s: %s", $jobId, strtoupper($platform), $result['external_url']));
            }
        } catch (\Throwable $e) {
            $errMsg = $e->getMessage();
            $newStatus = ($attempts >= 3) ? 'failed' : 'approved';
            
            $logger->error(sprintf("Job #%d [%s] failed on attempt %d: %s (Status: %s)", $jobId, strtoupper($platform), $attempts, $errMsg, $newStatus));

            $update = $pdo->prepare("
                UPDATE social_jobs 
                SET attempts = :attempts, 
                    error = :error, 
                    status = :status,
                    updated_at = NOW() 
                WHERE id = :id
            ");
            $update->execute([
                ':attempts' => $attempts,
                ':error'    => substr($errMsg, 0, 1000),
                ':status'   => $newStatus,
                ':id'       => $jobId
            ]);
        }
    }

    // 6. Check LinkedIn token expiration (< 7 days remaining)
    // Synchronize and update all XML sitemaps
    try {
        require_once dirname(__DIR__) . '/util/sitemap_generator.php';
        generate_all_sitemaps(null, true);
        $logger->info("XML Sitemaps automatically verified & synchronized.");
    } catch (\Throwable $e) {
        $logger->error("Sitemap cron sync error: " . $e->getMessage());
    }

    checkTokenExpirations($pdo, $logger);

} catch (\Throwable $e) {
    $logger->error("Fatal cron worker error: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
} finally {
    $lock->release();
    $logger->info("Cron runner finished execution.\n");
}

/**
 * Checks OAuth token expiry and warns administrator if renewal is needed within 7 days.
 */
function checkTokenExpirations(PDO $pdo, Logger $logger): void
{
    try {
        $stmt = $pdo->query("
            SELECT platform, expires_at, DATEDIFF(expires_at, NOW()) AS days_left 
            FROM social_tokens 
            WHERE expires_at IS NOT NULL AND DATEDIFF(expires_at, NOW()) <= 7
        ");
        $expiring = $stmt->fetchAll();

        foreach ($expiring as $token) {
            $daysLeft = (int)$token['days_left'];
            $platform = strtoupper($token['platform']);
            $msg = sprintf("ALERT: %s OAuth Access Token expires in %d day(s) on %s. Please re-authenticate via Admin Dashboard.", $platform, $daysLeft, $token['expires_at']);
            
            $logger->warning($msg);

            $adminEmail = (string)Env::get('ADMIN_ALERT_EMAIL', 'iamnikhilgupta9@gmail.com');
            if ($adminEmail && $daysLeft <= 7) {
                @mail(
                    $adminEmail,
                    "[NikhilWorks] {$platform} Token Expiring Soon",
                    "Hi Nikhil,\n\n{$msg}\n\nRe-authenticate here: " . Env::get('SITE_URL') . "/admin/social-oauth.php?provider=" . strtolower($token['platform']),
                    "From: no-reply@nikhilworks.com\r\nReply-To: no-reply@nikhilworks.com\r\n"
                );
            }
        }
    } catch (\Throwable $e) {
        $logger->error("Error checking token expirations: " . $e->getMessage());
    }
}
