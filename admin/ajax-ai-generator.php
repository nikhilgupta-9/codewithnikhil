<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');

require_once dirname(__DIR__) . '/lib/Env.php';
require_once dirname(__DIR__) . '/lib/Logger.php';
require_once dirname(__DIR__) . '/services/ClaudeService.php';

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Logger;
use NikhilWorks\Services\ClaudeService;

// Start session if needed
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

Env::load();

$logger = new Logger('ai_generator');
$claudeService = new ClaudeService($logger);

$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    switch ($action) {
        case 'check_status':
            $apiKey = (string)Env::get('ANTHROPIC_API_KEY', (string)Env::get('CLAUDE_API_KEY', ''));
            $geminiKey = (string)Env::get('GEMINI_API_KEY', '');
            
            echo json_encode([
                'success' => true,
                'has_claude_key' => !empty($apiKey),
                'has_gemini_key' => !empty($geminiKey),
                'model' => (string)Env::get('CLAUDE_MODEL', 'claude-3-5-sonnet-20241022')
            ]);
            break;

        case 'save_api_key':
            $newKey = trim($_POST['api_key'] ?? '');
            if (empty($newKey)) {
                echo json_encode(['success' => false, 'message' => 'API key cannot be empty.']);
                exit;
            }

            $envPath = dirname(__DIR__) . '/.env';
            if (!file_exists($envPath)) {
                file_put_contents($envPath, "ANTHROPIC_API_KEY={$newKey}\n");
            } else {
                $content = file_get_contents($envPath);
                if (preg_match('/^ANTHROPIC_API_KEY=.*/m', $content)) {
                    $content = preg_replace('/^ANTHROPIC_API_KEY=.*/m', "ANTHROPIC_API_KEY={$newKey}", $content);
                } else {
                    $content .= "\nANTHROPIC_API_KEY={$newKey}\n";
                }
                file_put_contents($envPath, $content);
            }

            echo json_encode(['success' => true, 'message' => 'Claude API key saved successfully!']);
            break;

        case 'suggest_topics':
            $source = trim($_POST['source'] ?? 'all');
            $niche = trim($_POST['niche'] ?? 'web_development');

            $topics = $claudeService->suggestTopics($source, $niche);

            echo json_encode([
                'success' => true,
                'source' => $source,
                'niche' => $niche,
                'topics' => $topics
            ]);
            break;

        case 'generate_article':
            $topic = trim($_POST['topic'] ?? '');
            $niche = trim($_POST['niche'] ?? 'web_development');
            $source = trim($_POST['source'] ?? 'tech_trends');
            $tone = trim($_POST['tone'] ?? 'authoritative');

            if (empty($topic)) {
                echo json_encode(['success' => false, 'message' => 'Please provide or select a blog topic.']);
                exit;
            }

            $article = $claudeService->generateArticle($topic, $niche, $source, $tone);

            echo json_encode([
                'success' => true,
                'article' => $article
            ]);
            break;

        case 'generate_image':
            $imagePrompt = trim($_POST['image_prompt'] ?? '');
            $title = trim($_POST['title'] ?? 'tech blog');
            $uploadDir = dirname(__DIR__) . '/admin/uploads/blogs';

            $result = $claudeService->generateCoverImage($imagePrompt, $title, $uploadDir);

            echo json_encode($result);
            break;

        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action requested.']);
            break;
    }
} catch (\Throwable $e) {
    $logger->error("AJAX AI Generator Exception: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
