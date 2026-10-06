<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class GeminiService
{
    private Logger $logger;
    private string $apiKey;
    private string $textModel;
    private string $imageModel;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
        $this->apiKey = (string)Env::get('GEMINI_API_KEY', '');
        $this->textModel = (string)Env::get('GEMINI_TEXT_MODEL', 'gemini-2.5-flash');
        $this->imageModel = (string)Env::get('GEMINI_IMAGE_MODEL', 'imagen-3.0-generate-002');
    }

    /**
     * Generate multi-platform captions and tags for a blog.
     * Returns structured array:
     * [
     *   'linkedin_caption' => string,
     *   'x_hook'           => string,
     *   'devto_caption'    => string,
     *   'hashnode_caption' => string,
     *   'tags'             => array of 4 clean tags
     * ]
     */
    public function generateBlogContent(string $title, string $content, string $metaDescription = ''): array
    {
        if (empty($this->apiKey)) {
            // High-quality fallback if API key is not configured
            $this->logger->warning("GEMINI_API_KEY not configured. Using intelligent rule-based content generator.");
            return $this->generateFallbackBlogContent($title, $content, $metaDescription);
        }

        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$this->textModel}:generateContent?key={$this->apiKey}";

        $cleanContent = substr(strip_tags($content), 0, 3000);
        $prompt = <<<PROMPT
You are a senior tech writer and social media growth strategist for NikhilWorks (a full-stack web developer and AI engineer).
Analyze this blog post and return a clean, strictly valid JSON object without markdown formatting fences:

Blog Title: "{$title}"
Meta Description: "{$metaDescription}"
Content Sample: "{$cleanContent}"

Required JSON Schema:
{
  "linkedin_caption": "A 3-5 line punchy, professional B2B story post explaining why this matters, with 3 key takeaway bullets and a strong hook. No generic fluff.",
  "x_hook": "A short, viral, punchy hook for X (under 180 characters) that makes devs and founders click.",
  "devto_caption": "A 1-2 sentence developer-centric introduction note for the DEV.to community.",
  "hashnode_caption": "A 1-2 sentence developer-centric introduction note for Hashnode readers.",
  "tags": ["tag1", "tag2", "tag3", "tag4"]
}
PROMPT;

        $payload = [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature'     => 0.4,
                'responseMimeType' => 'application/json'
            ]
        ];

        $jsonPayload = json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => $jsonPayload,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_HTTPHEADER     => [
                "Content-Type: application/json",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false || $httpCode !== 200) {
            $this->logger->error("Gemini API error (HTTP {$httpCode}): " . ($curlError ?: (string)$response));
            return $this->generateFallbackBlogContent($title, $content, $metaDescription);
        }

        $data = json_decode((string)$response, true);
        $textResult = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

        $cleanJson = trim($textResult);
        if (str_starts_with($cleanJson, '```json')) {
            $cleanJson = substr($cleanJson, 7);
        }
        if (str_starts_with($cleanJson, '```')) {
            $cleanJson = substr($cleanJson, 3);
        }
        if (str_ends_with($cleanJson, '```')) {
            $cleanJson = substr($cleanJson, 0, -3);
        }
        $cleanJson = trim($cleanJson);

        $parsed = json_decode($cleanJson, true);
        if (!is_array($parsed) || empty($parsed['linkedin_caption'])) {
            $this->logger->warning("Gemini JSON parse failed, falling back to rule-based generation.");
            return $this->generateFallbackBlogContent($title, $content, $metaDescription);
        }

        return [
            'linkedin_caption' => (string)($parsed['linkedin_caption'] ?? ''),
            'x_hook'           => (string)($parsed['x_hook'] ?? ''),
            'devto_caption'    => (string)($parsed['devto_caption'] ?? ''),
            'hashnode_caption' => (string)($parsed['hashnode_caption'] ?? ''),
            'tags'             => array_slice((array)($parsed['tags'] ?? ['webdev', 'ai', 'programming', 'javascript']), 0, 4)
        ];
    }

    /**
     * Generate an AI cover image using Imagen 3 or creates a dynamic branded card.
     * Returns public URL of the saved image in uploads/blogs/.
     */
    public function generateCoverImage(string $title, string $slug): ?string
    {
        $uploadsDir = dirname(__DIR__) . '/uploads/blogs/';
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0755, true);
        }

        $filename = 'ai_cover_' . substr(preg_replace('/[^a-zA-Z0-9]/', '_', $slug), 0, 40) . '_' . time() . '.png';
        $targetPath = $uploadsDir . $filename;
        $siteUrl = rtrim((string)Env::get('SITE_URL', 'https://nikhilworks.com'), '/');
        $publicUrl = "{$siteUrl}/uploads/blogs/{$filename}";

        if (!empty($this->apiKey)) {
            // Attempt Google Imagen 3 API
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$this->imageModel}:predict?key={$this->apiKey}";
            
            $prompt = "A modern, minimalist, high-end 3D cyberpunk tech banner for a developer blog titled '{$title}'. Dark teal background, electric lime green neon accents, glowing isometric geometric structures, 8k resolution, clean composition, no text artifacts.";

            $payload = [
                'instances' => [
                    ['prompt' => $prompt]
                ],
                'parameters' => [
                    'sampleCount' => 1,
                    'aspectRatio' => '16:9'
                ]
            ];

            $ch = curl_init($endpoint);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($payload),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 45,
                CURLOPT_CONNECTTIMEOUT => 15,
                CURLOPT_SSL_VERIFYPEER => true,
                CURLOPT_SSL_VERIFYHOST => 2,
                CURLOPT_HTTPHEADER     => [
                    "Content-Type: application/json",
                    "User-Agent: NikhilWorks-SocialAutomation/1.0"
                ]
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($response !== false && $httpCode === 200) {
                $data = json_decode((string)$response, true);
                $b64 = $data['predictions'][0]['bytesBase64Encoded'] ?? null;
                if ($b64) {
                    $binaryData = base64_decode($b64);
                    if ($binaryData && strlen($binaryData) > 1000) {
                        file_put_contents($targetPath, $binaryData);
                        $this->validateAndOptimizeImage($targetPath);
                        $this->logger->info("Imagen 3 generated cover image successfully saved to {$targetPath}");
                        return $publicUrl;
                    }
                }
            }
        }

        // Fallback: Generate branded 1200x630 GD Canvas Banner
        $this->generateBrandedCanvasCover($title, $targetPath);
        return $publicUrl;
    }

    /**
     * Fallback high-converting captions generator.
     */
    private function generateFallbackBlogContent(string $title, string $content, string $metaDesc): array
    {
        $desc = $metaDesc ?: substr(strip_tags($content), 0, 150);

        return [
            'linkedin_caption' => "🚀 Just published a new technical deep dive: \"{$title}\"\n\n{$desc}\n\nKey takeaways:\n• Performance & modern architecture best practices\n• Full code implementation & practical workflow tips\n• Scalable developer takeaways\n\nRead the full article below 👇",
            'x_hook'           => "Most developers overlook this when building web applications. 💡\n\nDeep dive: \"{$title}\"",
            'devto_caption'    => "Hey DEV community! Shared a comprehensive walkthrough on: {$title}. Would love to hear your feedback!",
            'hashnode_caption' => "New technical article on {$title} with full architecture insights and code patterns.",
            'tags'             => ['webdev', 'ai', 'javascript', 'programming']
        ];
    }

    /**
     * Generates a branded 1200x630 dark cyber banner with GD.
     */
    private function generateBrandedCanvasCover(string $title, string $targetPath): void
    {
        if (!extension_loaded('gd')) {
            return;
        }

        $w = 1200;
        $h = 630;
        $img = imagecreatetruecolor($w, $h);

        // Cyber Teal gradient & grid
        $darkBg = imagecolorallocate($img, 4, 18, 19);
        $lime = imagecolorallocate($img, 173, 255, 28);
        $white = imagecolorallocate($img, 255, 255, 255);
        $gridCol = imagecolorallocatealpha($img, 173, 255, 28, 115);

        imagefill($img, 0, 0, $darkBg);

        // Draw tech grid
        for ($x = 0; $x < $w; $x += 60) {
            imageline($img, $x, 0, $x, $h, $gridCol);
        }
        for ($y = 0; $y < $h; $y += 60) {
            imageline($img, 0, $y, $w, $y, $gridCol);
        }

        // Draw top brand bar
        imagestring($img, 5, 80, 70, "NIKHILWORKS // ENGINEERING BLOG", $lime);

        // Wrap Title text
        $wrapped = wordwrap($title, 35, "\n");
        $lines = explode("\n", $wrapped);
        $yOffset = 200;
        foreach (array_slice($lines, 0, 3) as $line) {
            imagestring($img, 5, 80, $yOffset, $line, $white);
            $yOffset += 40;
        }

        imagestring($img, 5, 80, 520, "https://nikhilworks.com", $lime);

        imagepng($img, $targetPath);
        imagedestroy($img);
    }

    private function validateAndOptimizeImage(string $filePath): void
    {
        if (!file_exists($filePath)) return;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $filePath);
        finfo_close($finfo);

        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($mime, $allowed, true)) {
            @unlink($filePath);
            throw new RuntimeException("Generated image failed mime validation: {$mime}");
        }
    }
}
