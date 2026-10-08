<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class ClaudeService
{
    private Logger $logger;
    private string $apiKey;
    private string $model;
    private string $geminiApiKey;

    public function __construct(?Logger $logger = null)
    {
        $this->logger = $logger ?? new Logger('claude_service');
        $this->apiKey = (string)Env::get('ANTHROPIC_API_KEY', (string)Env::get('CLAUDE_API_KEY', ''));
        $this->model = (string)Env::get('CLAUDE_MODEL', 'claude-3-5-sonnet-20241022');
        $this->geminiApiKey = (string)Env::get('GEMINI_API_KEY', '');
    }

    public function hasApiKey(): bool
    {
        return !empty($this->apiKey) || !empty($this->geminiApiKey);
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * Fetch trending topic ideas across Dev.to, LinkedIn, Instagram, or Tech Trends
     */
    public function suggestTopics(string $source = 'all', string $niche = 'web_development'): array
    {
        // Try live Dev.to API if devto or all is chosen
        $devtoTopics = [];
        if (in_array($source, ['devto', 'all'], true)) {
            $devtoTopics = $this->fetchLiveDevtoTrends($niche);
        }

        // If Claude API key is configured, query Claude for high-CTR viral topic ideas
        if (!empty($this->apiKey)) {
            try {
                $claudeTopics = $this->queryClaudeForTopics($source, $niche, $devtoTopics);
                if (!empty($claudeTopics)) {
                    return $claudeTopics;
                }
            } catch (\Throwable $t) {
                $this->logger->warning("Claude API topic query failed: " . $t->getMessage() . ". Falling back to curated/devto trends.");
            }
        }

        // If Gemini API is available as fallback
        if (!empty($this->geminiApiKey)) {
            try {
                $geminiTopics = $this->queryGeminiForTopics($source, $niche);
                if (!empty($geminiTopics)) {
                    return $geminiTopics;
                }
            } catch (\Throwable $t) {
                $this->logger->warning("Gemini API topic query failed: " . $t->getMessage());
            }
        }

        // High quality trending fallback topics
        return $this->getCuratedTrendingTopics($source, $niche, $devtoTopics);
    }

    /**
     * Generate complete SEO-optimized blog article using Claude API
     */
    public function generateArticle(string $topic, string $niche = 'web_development', string $source = 'tech_trends', string $tone = 'authoritative'): array
    {
        if (!empty($this->apiKey)) {
            try {
                return $this->queryClaudeForArticle($topic, $niche, $source, $tone);
            } catch (\Throwable $t) {
                $this->logger->error("Claude API article generation failed: " . $t->getMessage());
                // If Gemini is available, try Gemini
                if (!empty($this->geminiApiKey)) {
                    try {
                        return $this->queryGeminiForArticle($topic, $niche, $tone);
                    } catch (\Throwable $gt) {
                        $this->logger->error("Gemini fallback also failed: " . $gt->getMessage());
                    }
                }
                throw new RuntimeException("Claude AI Error: " . $t->getMessage());
            }
        }

        if (!empty($this->geminiApiKey)) {
            return $this->queryGeminiForArticle($topic, $niche, $tone);
        }

        throw new RuntimeException("No AI API Key configured. Please add ANTHROPIC_API_KEY or CLAUDE_API_KEY in your .env file or settings.");
    }

    /**
     * Generate & download a featured cover image for the blog
     */
    public function generateCoverImage(string $imagePrompt, string $title, string $uploadDir): array
    {
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $cleanPrompt = urlencode("Professional modern tech blog banner: " . substr($imagePrompt, 0, 200) . ", cinematic lighting, 4k ultra realistic, 16:9 aspect ratio, clean aesthetic");
        $randomSeed = mt_rand(1000, 99999);
        $imageUrl = "https://image.pollinations.ai/prompt/{$cleanPrompt}?width=1200&height=630&seed={$randomSeed}&nologo=true";

        $filename = 'blog_ai_' . uniqid('', true) . '.jpg';
        $destination = rtrim($uploadDir, '/') . '/' . $filename;

        // Download image
        $ch = curl_init($imageUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 25,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'NikhilWorks/1.0'
        ]);

        $imageData = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && !empty($imageData) && strlen($imageData) > 1000) {
            file_put_contents($destination, $imageData);
            return [
                'success' => true,
                'filename' => $filename,
                'path' => 'uploads/blogs/' . $filename,
                'url' => $imageUrl
            ];
        }

        // Unsplash Tech Fallback if Pollinations is busy
        $unsplashKeywords = urlencode($this->extractKeywords($title));
        $unsplashUrl = "https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&h=630&q=80";
        
        $ch2 = curl_init($unsplashUrl);
        curl_setopt_array($ch2, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => false
        ]);
        $imageData2 = curl_exec($ch2);
        curl_close($ch2);

        if (!empty($imageData2)) {
            file_put_contents($destination, $imageData2);
            return [
                'success' => true,
                'filename' => $filename,
                'path' => 'uploads/blogs/' . $filename,
                'url' => $unsplashUrl
            ];
        }

        return [
            'success' => false,
            'message' => 'Failed to download cover image.'
        ];
    }

    /**
     * Query Claude Messages API for trending topics
     */
    private function queryClaudeForTopics(string $source, string $niche, array $liveDevto): array
    {
        $devtoContext = '';
        if (!empty($liveDevto)) {
            $devtoContext = "Live trending Dev.to topics currently active: " . json_encode(array_column($liveDevto, 'title'));
        }

        $prompt = <<<PROMPT
You are a viral tech content curator and SEO strategist for NikhilWorks (a full-stack web developer and agency owner).
Generate 6 highly engaging, trending, high-CTR blog topic ideas inspired by current trends on {$source} and {$niche}.
{$devtoContext}

Return strictly a JSON array of 6 objects without markdown backticks:
[
  {
    "title": "Compelling, viral, SEO-rich title",
    "source": "Dev.to Trending / LinkedIn Viral / Instagram Tech Reel / Google SEO",
    "niche": "Web Development / AI Tools / Full Stack / Career Growth",
    "why_it_works": "Why this topic gets high engagement, clicks, and search traffic",
    "target_keywords": "keyword1, keyword2, keyword3",
    "hook": "A 1-sentence magnetic hook"
  }
]
PROMPT;

        $response = $this->callClaudeApi($prompt, 1500);
        $json = $this->extractJson($response);

        return is_array($json) ? $json : [];
    }

    /**
     * Query Claude Messages API for full article
     */
    private function queryClaudeForArticle(string $topic, string $niche, string $source, string $tone): array
    {
        $prompt = <<<PROMPT
You are Nikhil Gupta, a master full-stack engineer, AI developer, and founder of NikhilWorks.
Write a comprehensive, publication-ready, deeply technical yet highly engaging blog post for the topic: "{$topic}".
Category: {$niche}
Source Inspiration: {$source}
Tone: {$tone}, authoritative, actionable, and SEO-optimized.

Requirements:
1. Title: Compelling, click-worthy, SEO-optimized title (under 70 chars).
2. Meta Title: Exactly 50-60 chars ending with " | NikhilWorks".
3. Meta Description: 140-160 chars with a compelling value hook for search results.
4. Tags: 5-6 comma-separated relevant tags.
5. Image Prompt: A 1-2 sentence visual description for a featured banner graphic.
6. Content: A comprehensive, 1000+ words article in semantic HTML (DO NOT wrap inside <html> or <body> tags, only provide inner content elements like <h2>, <h3>, <p>, <ul>, <li>, <blockquote>, <pre><code class="language-...">, <table>, <div class="alert alert-info"> for Pro Tips, and an FAQ section).
Include actionable steps, real code snippets/examples where relevant, real-world case studies/tips, and a friendly concluding CTA encouraging readers to connect with NikhilWorks for web development & AI consulting.

Return strictly a JSON object without markdown code fences:
{
  "title": "...",
  "slug_url": "url-slug-here",
  "meta_title": "... | NikhilWorks",
  "meta_description": "...",
  "tags": "...",
  "image_prompt": "...",
  "content": "<h2>...</h2><p>...</p>..."
}
PROMPT;

        $response = $this->callClaudeApi($prompt, 4000);
        $result = $this->extractJson($response);

        if (!is_array($result) || empty($result['title']) || empty($result['content'])) {
            throw new RuntimeException("Invalid response format received from Claude API.");
        }

        // Clean slug
        if (empty($result['slug_url'])) {
            $result['slug_url'] = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $result['title']), '-'));
        }

        return $result;
    }

    /**
     * Call Anthropic Claude API via cURL
     */
    private function callClaudeApi(string $userPrompt, int $maxTokens = 3000): string
    {
        $endpoint = "https://api.anthropic.com/v1/messages";

        $headers = [
            'x-api-key: ' . $this->apiKey,
            'anthropic-version: 2023-06-01',
            'content-type: application/json'
        ];

        $payload = [
            'model' => $this->model,
            'max_tokens' => $maxTokens,
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $userPrompt
                ]
            ],
            'temperature' => 0.7
        ];

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $response = curl_exec($ch);
        $error = curl_error($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($error) {
            throw new RuntimeException("Claude API connection error: " . $error);
        }

        $decoded = json_decode((string)$response, true);

        if ($httpCode !== 200) {
            $msg = $decoded['error']['message'] ?? "HTTP {$httpCode}: " . substr((string)$response, 0, 300);
            throw new RuntimeException("Claude API Error: " . $msg);
        }

        if (isset($decoded['content'][0]['text'])) {
            return $decoded['content'][0]['text'];
        }

        throw new RuntimeException("Unexpected Claude API response structure.");
    }

    /**
     * Query Gemini API if Claude key is missing
     */
    private function queryGeminiForTopics(string $source, string $niche): array
    {
        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$this->geminiApiKey}";
        $prompt = "Generate 6 trending, high-CTR blog topic ideas for {$source} in {$niche}. Return strictly a valid JSON array of objects with keys: title, source, niche, why_it_works, target_keywords, hook.";

        $payload = [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ];

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $res = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode((string)$res, true);
        $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? '';
        return $this->extractJson($text) ?: [];
    }

    private function queryGeminiForArticle(string $topic, string $niche, string $tone): array
    {
        $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$this->geminiApiKey}";
        $prompt = <<<PROMPT
Write a comprehensive, publication-ready 1000+ words SEO blog post for NikhilWorks on: "{$topic}" in category: {$niche}.
Tone: {$tone}.
Return strictly a valid JSON object with keys: title, slug_url, meta_title, meta_description, tags, image_prompt, content.
The "content" key must be clean HTML with <h2>, <h3>, <p>, <ul>, <li>, <code>, Pro Tips, and FAQs.
PROMPT;

        $payload = [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ];

        $ch = curl_init($endpoint);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT => 45,
            CURLOPT_SSL_VERIFYPEER => false
        ]);

        $res = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode((string)$res, true);
        $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? '';
        $data = $this->extractJson($text);
        if (!$data || empty($data['title'])) {
            throw new RuntimeException("Could not generate valid article format from Gemini.");
        }
        return $data;
    }

    /**
     * Fetch real-time live trends from Dev.to public API
     */
    private function fetchLiveDevtoTrends(string $niche): array
    {
        $tag = 'webdev';
        if (str_contains($niche, 'ai')) $tag = 'ai';
        if (str_contains($niche, 'javascript') || str_contains($niche, 'frontend')) $tag = 'javascript';
        if (str_contains($niche, 'react') || str_contains($niche, 'next')) $tag = 'react';
        if (str_contains($niche, 'python')) $tag = 'python';

        $url = "https://dev.to/api/articles?tag={$tag}&top=7";

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 8,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'NikhilWorks-Bot/1.0'
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $articles = json_decode((string)$response, true);
        $results = [];

        if (is_array($articles)) {
            foreach ($articles as $a) {
                if (isset($a['title'])) {
                    $results[] = [
                        'title' => $a['title'],
                        'source' => 'Dev.to Trending',
                        'niche' => ucfirst($tag) . ' / Engineering',
                        'why_it_works' => 'High engagement with ' . ($a['public_reactions_count'] ?? '100+') . ' reactions & discussions.',
                        'target_keywords' => implode(', ', array_slice($a['tag_list'] ?? [$tag], 0, 4)),
                        'hook' => $a['description'] ?? 'Trending developer discussion on Dev.to'
                    ];
                }
            }
        }

        return $results;
    }

    /**
     * Curated trending topics library across platforms
     */
    private function getCuratedTrendingTopics(string $source, string $niche, array $devto = []): array
    {
        $defaults = [
            [
                'title' => 'Top 10 Modern Web Development Tools Every Developer Needs in 2026',
                'source' => 'Dev.to & LinkedIn Viral',
                'niche' => 'Web Development',
                'why_it_works' => 'High bookmark rate, listicle format, evergreen organic search volume.',
                'target_keywords' => 'web development tools, dev productivity, fullstack developer 2026',
                'hook' => 'Discover the cutting-edge workflow stack turning 10-hour builds into 30-minute deployments.'
            ],
            [
                'title' => 'How to Build and Deploy Full-Stack AI Micro-SaaS in 48 Hours',
                'source' => 'LinkedIn & X/Twitter Viral',
                'niche' => 'AI & SaaS Development',
                'why_it_works' => 'Appeals to indie hackers, startup founders, and high-income tech freelancers.',
                'target_keywords' => 'build ai saas, micro saas ideas, fullstack ai development',
                'hook' => 'A complete blueprint for turning AI API models into recurring revenue products.'
            ],
            [
                'title' => 'Next.js vs Remix vs PHP in 2026: The Honest Architecture Breakdown',
                'source' => 'Dev.to Debate Trend',
                'niche' => 'Frontend & Backend',
                'why_it_works' => 'High engagement debate topic with strong technical SEO value.',
                'target_keywords' => 'nextjs vs php, web frameworks 2026, server side rendering performance',
                'hook' => 'Why traditional monolithic architectures are making an unexpected comeback.'
            ],
            [
                'title' => '7 Secret CSS & UI/UX Tricks That 10x Website Conversion Rates',
                'source' => 'Instagram Tech Reel',
                'niche' => 'UI/UX Design',
                'why_it_works' => 'Visual design hacks drive viral saves on Instagram & LinkedIn.',
                'target_keywords' => 'modern css tricks, ui ux conversion optimization, web design tips',
                'hook' => 'Micro-interactions and visual hierarchy secrets top agencies use.'
            ],
            [
                'title' => 'SEO Roadmap 2026: How to Rank #1 on Google with AI Search Overviews',
                'source' => 'Google Search / SEO High Volume',
                'niche' => 'SEO & Traffic',
                'why_it_works' => 'Massive business intent; founders looking for organic lead generation.',
                'target_keywords' => 'seo ranking 2026, rank on google, ai search optimization',
                'hook' => 'How to optimize your website for AI Overviews and capture qualified B2B leads.'
            ],
            [
                'title' => 'Complete Guide to Automating Social Media Content with Claude & Gemini AI',
                'source' => 'LinkedIn Tech Leadership',
                'niche' => 'Automation & AI',
                'why_it_works' => 'Agencies and creators want automated distribution workflows.',
                'target_keywords' => 'ai content automation, claude api blog, social media automation python php',
                'hook' => 'Step-by-step architecture to auto-distribute blog articles across LinkedIn, X, and Instagram.'
            ]
        ];

        if (!empty($devto)) {
            return array_merge(array_slice($devto, 0, 3), array_slice($defaults, 0, 3));
        }

        return $defaults;
    }

    private function extractKeywords(string $title): string
    {
        $words = preg_replace('/[^a-zA-Z0-9\s]/', '', strtolower($title));
        $stopWords = ['how', 'to', 'the', 'and', 'in', 'for', 'of', 'a', 'an', 'with', 'on', 'vs', 'every', 'top', 'guide'];
        $filtered = array_filter(explode(' ', $words), function($w) use ($stopWords) {
            return strlen($w) > 2 && !in_array($w, $stopWords, true);
        });
        return implode(',', array_slice($filtered, 0, 3)) ?: 'technology,coding';
    }

    private function extractJson(string $text): ?array
    {
        $text = trim($text);
        if (preg_match('/```(?:json)?\s*([\s\S]*?)\s*```/i', $text, $matches)) {
            $text = trim($matches[1]);
        }

        $decoded = json_decode($text, true);
        if (is_array($decoded)) {
            return $decoded;
        }

        // Try extracting between first [ or { and last ] or }
        $firstBracket = strpos($text, '[');
        $lastBracket = strrpos($text, ']');
        if ($firstBracket !== false && $lastBracket !== false) {
            $sub = substr($text, $firstBracket, $lastBracket - $firstBracket + 1);
            $decoded = json_decode($sub, true);
            if (is_array($decoded)) return $decoded;
        }

        $firstBrace = strpos($text, '{');
        $lastBrace = strrpos($text, '}');
        if ($firstBrace !== false && $lastBrace !== false) {
            $sub = substr($text, $firstBrace, $lastBrace - $firstBrace + 1);
            $decoded = json_decode($sub, true);
            if (is_array($decoded)) return $decoded;
        }

        return null;
    }
}
