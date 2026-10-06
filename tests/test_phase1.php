<?php
declare(strict_types=1);

/**
 * Phase 1 Verification Test Suite
 * Tests Database, Lock, Logger, Social Jobs Queue & Dry Run Execution
 */

require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Database.php';
require_once dirname(__DIR__) . '/lib/Logger.php';
require_once dirname(__DIR__) . '/lib/Lock.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use NikhilWorks\Lib\Lock;

echo "\n=======================================================\n";
echo " NIKHILWORKS - SOCIAL AUTOMATION (PHASE 1 TEST SUITE)\n";
echo "=======================================================\n\n";

$passCount = 0;
$failCount = 0;

function assertTest(string $name, bool $condition, string $details = ''): void {
    global $passCount, $failCount;
    if ($condition) {
        $passCount++;
        echo "  [PASS] {$name}\n";
    } else {
        $failCount++;
        echo "  [FAIL] {$name} - {$details}\n";
    }
}

// 1. Test Env loading
Env::load(dirname(__DIR__) . '/.env');
assertTest("Env loader reads .env file", Env::get('TIMEZONE') === 'Asia/Kolkata');
assertTest("Env parses boolean values", Env::get('DRY_RUN') === true);

// 2. Test PDO Database Connection
try {
    $pdo = Database::getConnection();
    $stmt = $pdo->query("SELECT 1 AS alive");
    $row = $stmt->fetch();
    assertTest("PDO Database connection established", $row['alive'] == 1);
} catch (\Throwable $e) {
    assertTest("PDO Database connection", false, $e->getMessage());
}

// 3. Test Table Structure
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'social_jobs'");
    assertTest("Table 'social_jobs' exists in database", $stmt->rowCount() > 0);

    $stmt = $pdo->query("SHOW TABLES LIKE 'testimonials'");
    assertTest("Table 'testimonials' exists in database", $stmt->rowCount() > 0);

    $stmt = $pdo->query("SHOW TABLES LIKE 'social_tokens'");
    assertTest("Table 'social_tokens' exists in database", $stmt->rowCount() > 0);
} catch (\Throwable $e) {
    assertTest("Table verification", false, $e->getMessage());
}

// 4. Test Lock Mechanism
$lock1 = new Lock();
$acquired = $lock1->acquire();
assertTest("Lock 1 acquired successfully", $acquired === true);

$lock2 = new Lock();
$overlapping = $lock2->acquire();
assertTest("Lock 2 correctly denied while Lock 1 is held", $overlapping === false);

$lock1->release();
$acquiredAfter = $lock2->acquire();
assertTest("Lock 2 successfully acquired after Lock 1 released", $acquiredAfter === true);
$lock2->release();

// 5. Test Logger
$logger = new Logger();
$logger->info("Phase 1 test log entry", ['test_run' => time()]);
$logFilePath = dirname(__DIR__) . '/logs/social_automation.log';
assertTest("Logger writes to /logs/social_automation.log", file_exists($logFilePath) && filesize($logFilePath) > 0);

// 6. Test Social Job Queue & DRY_RUN Cron Execution
try {
    // Check if test blog exists, if not create dummy blog #99999
    $stmt = $pdo->prepare("SELECT id FROM blogs LIMIT 1");
    $stmt->execute();
    $blog = $stmt->fetch();

    if (!$blog) {
        $pdo->query("
            INSERT INTO blogs (id, title, meta_title, meta_description, tags, content, slug_url, author, status, created_at)
            VALUES (99999, 'Test Social Automation Architecture', 'Test SEO', 'Test description', 'webdev,ai', '<p>Test content body</p>', 'test-social-automation-architecture', 'Nikhil', 'published', NOW())
        ");
        $testBlogId = 99999;
    } else {
        $testBlogId = (int)$blog['id'];
    }

    // Insert test approved job ready for cron pickup
    $pdo->prepare("DELETE FROM social_jobs WHERE blog_id = :bid AND platform = 'devto'")->execute([':bid' => $testBlogId]);

    $insert = $pdo->prepare("
        INSERT INTO social_jobs (blog_id, platform, caption, cover_image_url, tags, scheduled_at, status, attempts, created_at)
        VALUES (:bid, 'devto', 'Test automated launch caption', 'https://nikhilworks.com/assets/img/preview.png', 'webdev,ai', NOW() - INTERVAL 1 MINUTE, 'approved', 0, NOW())
    ");
    $insert->execute([':bid' => $testBlogId]);
    $jobId = (int)$pdo->lastInsertId();

    assertTest("Created approved test job #{$jobId} for cron pickup", $jobId > 0);

    // Run CLI Cron worker
    $cronScript = dirname(__DIR__) . '/cron/run_jobs.php';
    $output = shell_exec("php " . escapeshellarg($cronScript));

    // Verify job status after cron
    $check = $pdo->prepare("SELECT status, external_url, attempts, error FROM social_jobs WHERE id = :id");
    $check->execute([':id' => $jobId]);
    $updatedJob = $check->fetch();

    assertTest("Cron worker picked up job #{$jobId} and set status to 'posted'", $updatedJob['status'] === 'posted');
    assertTest("Job assigned simulated external_url under DRY_RUN", str_contains((string)$updatedJob['external_url'], 'devto.com'));
    assertTest("Job attempts incremented to 1", (int)$updatedJob['attempts'] === 1);
    assertTest("Job has zero errors", empty($updatedJob['error']));

} catch (\Throwable $e) {
    assertTest("Queue and Cron execution test", false, $e->getMessage());
}

echo "\n-------------------------------------------------------\n";
echo " RESULTS: {$passCount} Passed, {$failCount} Failed\n";
echo "=======================================================\n\n";

exit($failCount > 0 ? 1 : 0);
