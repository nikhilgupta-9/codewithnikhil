<?php
declare(strict_types=1);

/**
 * NikhilWorks - Testimonials Automation API (AJAX Endpoint)
 * Enforces server-side mandatory legal consent check (consent_given === 1).
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

// 2. Rate Limiting
$now = time();
if (!isset($_SESSION['testi_api_req_count']) || $_SESSION['testi_api_req_window'] < $now - 60) {
    $_SESSION['testi_api_req_count'] = 1;
    $_SESSION['testi_api_req_window'] = $now;
} else {
    $_SESSION['testi_api_req_count']++;
    if ($_SESSION['testi_api_req_count'] > 40) {
        http_response_code(429);
        echo json_encode(['success' => false, 'message' => 'Rate limit exceeded. Please wait a moment.']);
        exit();
    }
}

// 3. Libraries
require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Database.php';
require_once dirname(__DIR__) . '/lib/Logger.php';
require_once dirname(__DIR__) . '/services/GeminiService.php';
require_once dirname(__DIR__) . '/services/YouTubeService.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use NikhilWorks\Services\GeminiService;
use NikhilWorks\Services\YouTubeService;

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
        echo json_encode(['success' => false, 'message' => 'Invalid CSRF token. Please refresh the page.']);
        exit();
    }

    $action = $_POST['action'] ?? '';

    switch ($action) {
        case 'update_consent':
            $id = (int)($_POST['testimonial_id'] ?? 0);
            $consent = !empty($_POST['consent_given']) ? 1 : 0;
            $proofUrl = trim((string)($_POST['consent_proof_url'] ?? ''));

            if ($id <= 0) throw new \InvalidArgumentException("Invalid Testimonial ID");

            $stmt = $pdo->prepare("
                UPDATE testimonials 
                SET consent_given = :consent,
                    consent_proof_url = :proof,
                    updated_at = NOW()
                WHERE id = :id
            ");
            $stmt->execute([
                ':consent' => $consent,
                ':proof'   => $proofUrl ?: null,
                ':id'      => $id
            ]);

            $logger->info("Testimonial #{$id} consent updated to: {$consent}");
            echo json_encode(['success' => true, 'message' => 'Consent record updated successfully!']);
            break;

        case 'generate_social':
            $id = (int)($_POST['testimonial_id'] ?? 0);
            if ($id <= 0) throw new \InvalidArgumentException("Invalid Testimonial ID");

            $stmt = $pdo->prepare("SELECT * FROM testimonials WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $testi = $stmt->fetch();

            if (!$testi) throw new \RuntimeException("Testimonial #{$id} not found.");

            // STRICT SERVER-SIDE CONSENT ENFORCEMENT
            if ((int)$testi['consent_given'] !== 1) {
                http_response_code(403);
                echo json_encode([
                    'success' => false,
                    'message' => 'STRICT POLICY: Legal consent has not been confirmed for this customer. Content generation is blocked until consent_given = 1.'
                ]);
                exit();
            }

            $gemini = new GeminiService($logger);
            $quote = (string)$testi['testimonial_text'];
            $name = (string)$testi['client_name'];
            $role = (string)($testi['client_title'] ?? '');
            $company = (string)($testi['client_company'] ?? '');

            $content = $gemini->generateTestimonialContent($name, $quote, $role, $company);
            $quoteCardUrl = $gemini->generateTestimonialQuoteCard($name, $quote, $role, $company);

            $update = $pdo->prepare("UPDATE testimonials SET social_status = 'approved', updated_at = NOW() WHERE id = :id");
            $update->execute([':id' => $id]);

            echo json_encode([
                'success'          => true,
                'message'          => 'Testimonial quote card & social copy generated successfully!',
                'linkedin_caption' => $content['linkedin_caption'],
                'x_hook'           => $content['x_hook'],
                'quote_card_url'   => $quoteCardUrl
            ]);
            break;

        case 'upload_youtube':
            $id = (int)($_POST['testimonial_id'] ?? 0);
            if ($id <= 0) throw new \InvalidArgumentException("Invalid Testimonial ID");

            $stmt = $pdo->prepare("SELECT * FROM testimonials WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $testi = $stmt->fetch();

            if (!$testi) throw new \RuntimeException("Testimonial #{$id} not found.");

            // STRICT SERVER-SIDE CONSENT ENFORCEMENT
            if ((int)$testi['consent_given'] !== 1) {
                http_response_code(403);
                echo json_encode([
                    'success' => false,
                    'message' => 'STRICT POLICY: Cannot upload video to YouTube without verified client consent (consent_given must be 1).'
                ]);
                exit();
            }

            $filePath = trim((string)($_POST['video_file_path'] ?? ($testi['video_file_path'] ?? '')));
            if (empty($filePath) || !file_exists($filePath)) {
                throw new \RuntimeException("Video file not found at: {$filePath}");
            }

            $title = "Client Success Story: " . $testi['client_name'] . " | NikhilWorks Web Solutions";
            $desc = "Client review from " . $testi['client_name'] . ":\n\n\"" . $testi['testimonial_text'] . "\"\n\nWebsite & Development Services: https://nikhilworks.com";
            $tags = ['client testimonial', 'nikhil works', 'web developer', 'seo review'];

            $yt = new YouTubeService($logger);
            // Default privacy is STRICTLY 'private' per requirements
            $privacy = 'private';
            $ytResult = $yt->uploadVideo($filePath, $title, $desc, $tags, $privacy);

            $videoId = $ytResult['video_id'];
            $ytUpdate = $pdo->prepare("
                UPDATE testimonials 
                SET youtube_video_id = :vid,
                    youtube_status = 'uploaded_private',
                    updated_at = NOW()
                WHERE id = :id
            ");
            $ytUpdate->execute([
                ':vid' => $videoId,
                ':id'  => $id
            ]);

            echo json_encode([
                'success'      => true,
                'message'      => "Video uploaded to YouTube as PRIVATE (Video ID: {$videoId}). Review and publish when ready.",
                'video_id'     => $videoId,
                'youtube_url'  => $ytResult['video_url']
            ]);
            break;

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid action.']);
            break;
    }
} catch (\Throwable $e) {
    http_response_code(500);
    $logger->error("Testimonials API error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
