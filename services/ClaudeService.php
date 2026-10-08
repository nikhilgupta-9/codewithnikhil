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
    public function suggestTopics(string $source = 'all', string $niche = 'ai_development'): array
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
                $this->logger->warning("Claude API topic query failed: " . $t->getMessage());
            }
        }

        // If Gemini API is available as primary or fallback
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
     * Generate complete SEO-optimized blog article using Claude or Gemini API
     */
    public function generateArticle(string $topic, string $niche = 'ai_development', string $source = 'tech_trends', string $tone = 'authoritative'): array
    {
        // If Gemini API is configured
        if (!empty($this->geminiApiKey)) {
            try {
                return $this->queryGeminiForArticle($topic, $niche, $tone);
            } catch (\Throwable $gt) {
                $this->logger->error("Gemini article generation error: " . $gt->getMessage());
                if (empty($this->apiKey)) {
                    throw $gt;
                }
            }
        }

        // If Claude API is configured
        if (!empty($this->apiKey)) {
            try {
                return $this->queryClaudeForArticle($topic, $niche, $source, $tone);
            } catch (\Throwable $t) {
                $this->logger->error("Claude API article generation failed: " . $t->getMessage());
                throw new RuntimeException("Claude AI Error: " . $t->getMessage());
            }
        }

        throw new RuntimeException("No AI API Key configured. Please add GEMINI_API_KEY or ANTHROPIC_API_KEY in your .env file or settings.");
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
            $devtoContext = "Live developer discussions: " . json_encode(array_column($liveDevto, 'title'));
        }

        $prompt = <<<PROMPT
You are a senior Computer Science Professor, AI Systems Architect, and Robotics Engineer writing for NikhilWorks.
Generate 6 ultra-specific, high-value, highly engaging topic ideas tailored for DAILY LEARNERS, COMPUTER SCIENCE STUDENTS, and SOFTWARE ENGINEERS in the sector: "{$niche}" (Source inspiration: {$source}).

The topics MUST focus strictly on:
1. Practical daily learner value (hands-on implementations, roadmaps, step-by-step code, core CS breakdown).
2. Cutting-edge developments in Artificial Intelligence (Autonomous Agents, RAG, Local LLMs like DeepSeek/Ollama, fine-tuning, Multi-Agent systems).
3. Modern Software Engineering & System Design (Distributed architectures, High-concurrency backend, clean architecture, real-world scaling, DevOps).
4. Robotics, Embedded Systems & IoT (ROS 2, Edge AI on Jetson/Raspberry Pi, Computer Vision, autonomous navigation, IoT mesh networks).

{$devtoContext}

Do NOT output vague, generic titles like "Intro to Coding" or "Why Tech is Good". Provide concrete, technical, curiosity-driven titles with specific frameworks and real-world architectures.

Return strictly a JSON array of 6 objects without markdown backticks:
[
  {
    "title": "Specific, actionable, technical title with stack/keywords",
    "source": "Dev.to Trending / LinkedIn Engineering / GitHub Trends / Research Paper",
    "niche": "AI & LLMs / Software Engineering / Robotics & IoT / CS Fundamentals",
    "why_it_works": "Why daily learners, engineering students, and devs love and bookmark this",
    "target_keywords": "keyword1, keyword2, keyword3, keyword4",
    "hook": "A clear, compelling 1-sentence engineering breakdown hook"
  }
]
PROMPT;

        $response = $this->callClaudeApi($prompt, 1800);
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
     * Query Gemini API for topics
     */
    private function queryGeminiForTopics(string $source, string $niche): array
    {
        $models = ['gemini-2.5-flash', 'gemini-2.0-flash', 'gemini-1.5-flash'];
        $prompt = <<<PROMPT
You are a senior Computer Science Engineer, AI Researcher, and Robotics Architect writing for NikhilWorks.
Generate 6 ultra-specific, high-value, highly engaging topic ideas tailored for DAILY LEARNERS, COMPUTER SCIENCE STUDENTS, and SOFTWARE ENGINEERS in the sector: "{$niche}" (Source inspiration: {$source}).

The topics MUST focus strictly on:
1. Practical daily learner value (step-by-step builds, roadmap architectures, core CS concepts made visual and practical).
2. Cutting-edge developments in AI (Autonomous Agents, Local LLMs with Ollama/DeepSeek, RAG pipelines, Multi-Agent systems, Multimodal AI).
3. Modern Software Engineering (System Design, Microservices, Distributed Caching, High-Concurrency APIs in Go/Rust/PHP 8.4/Node, Clean Code).
4. Robotics, Embedded Systems & IoT (ROS 2, Edge AI on NVIDIA Jetson / ESP32 / Raspberry Pi, OpenCV vision, Autonomous Navigation).

Do NOT output vague generic titles. Give concrete, technical, curiosity-driven titles with specific tools and stacks.

Return strictly a valid JSON array of 6 objects with keys: title, source, niche, why_it_works, target_keywords, hook.
PROMPT;

        foreach ($models as $m) {
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$m}:generateContent?key={$this->geminiApiKey}";
            $payload = [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'responseMimeType' => 'application/json'
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
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpCode === 200) {
                $decoded = json_decode((string)$res, true);
                $text = $decoded['candidates'][0]['content']['parts'][0]['text'] ?? '';
                $data = $this->extractJson($text);
                if (is_array($data) && count($data) > 0) {
                    return $data;
                }
            }
        }

        return [];
    }

    /**
     * Query Gemini API for article
     */
    private function queryGeminiForArticle(string $topic, string $niche, string $tone): array
    {
        $models = ['gemini-2.5-flash', 'gemini-2.0-flash', 'gemini-1.5-flash', 'gemini-1.5-pro'];
        $lastError = '';

        $prompt = <<<PROMPT
You are Nikhil Gupta, a master full-stack engineer, AI developer, and founder of NikhilWorks.
Write a comprehensive, publication-ready, deeply technical yet highly engaging blog post for the topic: "{$topic}".
Category: {$niche}
Tone: {$tone}, authoritative, actionable, and SEO-optimized.

Requirements:
1. Title: Compelling, click-worthy, SEO-optimized title (under 70 chars).
2. Meta Title: Exactly 50-60 chars ending with " | NikhilWorks".
3. Meta Description: 140-160 chars with a compelling value hook for search results.
4. Tags: 5-6 comma-separated relevant tags.
5. Image Prompt: A 1-2 sentence visual description for a featured banner graphic.
6. Content: A comprehensive, 1000+ words article in semantic HTML (DO NOT wrap inside <html> or <body> tags, only provide inner content elements like <h2>, <h3>, <p>, <ul>, <li>, <blockquote>, <pre><code class="language-...">, <table>, <div class="alert alert-info"> for Pro Tips, and an FAQ section).
Include actionable steps, real code snippets/examples where relevant, real-world case studies/tips, and a friendly concluding CTA encouraging readers to connect with NikhilWorks for web development & AI consulting.

Return strictly a valid JSON object without markdown code fences:
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

        foreach ($models as $m) {
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$m}:generateContent?key={$this->geminiApiKey}";
            $payload = [
                'contents' => [
                    ['parts' => [['text' => $prompt]]]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 8192,
                    'responseMimeType' => 'application/json'
                ]
            ];

            $ch = curl_init($endpoint);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_TIMEOUT => 60,
                CURLOPT_SSL_VERIFYPEER => false
            ]);

            $res = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $decoded = json_decode((string)$res, true);
            if ($httpCode === 200 && isset($decoded['candidates'][0]['content']['parts'][0]['text'])) {
                $text = $decoded['candidates'][0]['content']['parts'][0]['text'];
                $data = $this->extractJson($text);
                if ($data && !empty($data['title']) && !empty($data['content'])) {
                    if (empty($data['slug_url'])) {
                        $data['slug_url'] = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $data['title']), '-'));
                    }
                    return $data;
                }
            } else {
                $lastError = $decoded['error']['message'] ?? "HTTP {$httpCode}";
            }
        }

        throw new RuntimeException("Google Gemini API error: " . ($lastError ?: "Could not generate valid article format."));
    }

    /**
     * Fetch real-time live trends from Dev.to public API
     */
    private function fetchLiveDevtoTrends(string $niche): array
    {
        $tag = 'webdev';
        if (str_contains($niche, 'ai') || str_contains($niche, 'agent')) $tag = 'ai';
        if (str_contains($niche, 'robot') || str_contains($niche, 'iot')) $tag = 'hardware';
        if (str_contains($niche, 'software') || str_contains($niche, 'system')) $tag = 'architecture';
        if (str_contains($niche, 'learner') || str_contains($niche, 'cs')) $tag = 'computerscience';

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
     * Curated trending topics library across CSE, AI, Software Engineering & Robotics
     */
    private function getCuratedTrendingTopics(string $source, string $niche, array $devto = []): array
    {
        $library = [
            'ai_development' => [
                [
                    'title' => 'Building Autonomous Multi-Agent Workflows from Scratch with Python & Local LLMs',
                    'source' => 'GitHub & AI Research Trends',
                    'niche' => 'Artificial Intelligence & Agents',
                    'why_it_works' => 'High developer demand for agentic orchestration without relying on paid proprietary APIs.',
                    'target_keywords' => 'autonomous agents python, local llm ollama, multi-agent system, ai workflows 2026',
                    'hook' => 'Learn how to orchestrate specialized AI agents that collaborate, debug code, and execute complex workflows autonomously.'
                ],
                [
                    'title' => 'Complete Guide to Retrieval-Augmented Generation (RAG) with Vector Databases & Hybrid Search',
                    'source' => 'Dev.to & LinkedIn Engineering',
                    'niche' => 'AI Architecture & RAG',
                    'why_it_works' => 'Essential architecture pattern for every software engineer building enterprise AI applications.',
                    'target_keywords' => 'rag architecture tutorial, vector database pgvector, hybrid search bm25, chunking strategies',
                    'hook' => 'Step-by-step implementation of advanced RAG with contextual chunking, re-ranking, and zero hallucination.'
                ],
                [
                    'title' => 'Running DeepSeek-R1 & Llama 3 Locally: Complete Hardware, Quantization & Setup Guide',
                    'source' => 'Dev.to & Reddit LocalLLaMA',
                    'niche' => 'Open Source AI & Edge Computing',
                    'why_it_works' => 'Massive interest from daily learners and privacy-conscious software engineers.',
                    'target_keywords' => 'run deepseek r1 locally, ollama quantization guide, local reasoning model, llama 3 local setup',
                    'hook' => 'How to run state-of-the-art reasoning LLMs on consumer hardware with 4-bit GGUF quantization.'
                ]
            ],
            'software_engineering' => [
                [
                    'title' => 'System Design Blueprint: Architecting a Real-Time Distributed Notification Engine for 10M Users',
                    'source' => 'LinkedIn Engineering & Tech Blogs',
                    'niche' => 'Software Engineering & System Design',
                    'why_it_works' => 'Crucial for coding interviews, senior engineering roles, and backend performance.',
                    'target_keywords' => 'system design notification service, redis pubsub, websocket scaling, distributed systems',
                    'hook' => 'Deep architectural breakdown of queue management, rate limiting, and WebSocket pooling at scale.'
                ],
                [
                    'title' => 'Why High-Performance Modular Monoliths are Replacing Microservices in 2026',
                    'source' => 'Dev.to & Hacker News Debate',
                    'niche' => 'Software Architecture',
                    'why_it_works' => 'Addresses real-world microservice complexity fatigue with measurable benchmarks.',
                    'target_keywords' => 'modular monolith architecture, microservices vs monolith benchmarks, domain driven design, clean architecture',
                    'hook' => 'How engineering teams are reducing cloud costs by 60% while speeding up deployment cycles.'
                ],
                [
                    'title' => 'Database Indexing & Query Optimization Mastery: From B-Trees to EXPLAIN ANALYZE',
                    'source' => 'Dev.to Masterclass',
                    'niche' => 'Database Engineering',
                    'why_it_works' => 'Every fullstack learner needs database tuning skills to prevent production bottlenecks.',
                    'target_keywords' => 'postgresql index optimization, explain analyze tutorial, btree vs gin index, sql performance tuning',
                    'hook' => 'Visual guide to how database engines execute queries under the hood and how to cut latency by 90%.'
                ]
            ],
            'robotics_iot' => [
                [
                    'title' => 'Getting Started with ROS 2 and Computer Vision for Autonomous Mobile Robots (AMR)',
                    'source' => 'Robotics Research & GitHub',
                    'niche' => 'Robotics & Computer Science Engineering',
                    'why_it_works' => 'Students and robotics enthusiasts look for clear, beginner-to-intermediate ROS 2 tutorials.',
                    'target_keywords' => 'ros2 tutorial beginners, autonomous robot navigation, opencv slam robotics, python ros2 nodes',
                    'hook' => 'Hands-on guide to creating publisher-subscriber nodes, LiDAR mapping, and obstacle avoidance in ROS 2 Humble.'
                ],
                [
                    'title' => 'Edge AI on NVIDIA Jetson & Raspberry Pi 5: Real-Time Object Detection at 60 FPS',
                    'source' => 'Embedded Systems Trends',
                    'niche' => 'Edge AI & Embedded Hardware',
                    'why_it_works' => 'Bridges the gap between software algorithms and physical hardware deployments.',
                    'target_keywords' => 'nvidia jetson nano edge ai, raspberry pi 5 yolo real time, tensorrt optimization, embedded computer vision',
                    'hook' => 'How to optimize and deploy lightweight YOLOv8 models onto edge microcomputers with TensorRT acceleration.'
                ],
                [
                    'title' => 'The Humanoid Robotics Revolution: How Embodied AI and Reinforcement Learning are Changing Engineering',
                    'source' => 'CSE Sector & Robotics Deep Dive',
                    'niche' => 'Humanoid Robotics & Embodied AI',
                    'why_it_works' => 'Cutting-edge topic exploring the convergence of LLMs, motor control, and robotic simulation.',
                    'target_keywords' => 'humanoid robotics embodied ai, reinforcement learning locomotion, mujoco simulation tutorial, future of robotics 2026',
                    'hook' => 'An engineer’s look inside how modern humanoids learn motor skills via physics simulators and neural networks.'
                ]
            ],
            'daily_learners_cs' => [
                [
                    'title' => 'Computer Science Fundamentals Every Self-Taught Developer and Student Must Master in 2026',
                    'source' => 'Dev.to & LinkedIn Roadmap',
                    'niche' => 'Computer Science Engineering Roadmap',
                    'why_it_works' => 'Evergreen guide helping learners bridge the gap between simple tutorial code and deep engineering.',
                    'target_keywords' => 'computer science roadmap 2026, memory management os concepts, dsa for real world engineering, computer networking basics',
                    'hook' => 'The definitive roadmap to OS memory models, concurrency primitives, network protocols, and core data structures.'
                ],
                [
                    'title' => 'How Operating Systems Actually Work: Memory Management, Threads, and Syscalls Visualized',
                    'source' => 'Educational CS Visual Guide',
                    'niche' => 'Operating Systems & Internals',
                    'why_it_works' => 'Visual, easy-to-understand explanations of complex low-level CS topics get massive shares.',
                    'target_keywords' => 'operating systems internals, virtual memory paging explained, process vs thread syscalls, low level programming',
                    'hook' => 'Demystifying virtual memory, page tables, CPU context switching, and kernel syscalls with practical diagrams.'
                ],
                [
                    'title' => 'Visualizing Data Structures & Algorithms: From Graph Traversals to Dynamic Programming',
                    'source' => 'Daily Learner Mastery',
                    'niche' => 'DSA & Problem Solving',
                    'why_it_works' => 'High demand by computer science students preparing for technical rounds and interviews.',
                    'target_keywords' => 'data structures algorithms visualized, graph traversal bfs dfs, dynamic programming patterns, leetcode roadmap',
                    'hook' => 'Master the top 15 problem-solving patterns that cover 90% of technical interview questions.'
                ]
            ]
        ];

        $nicheKey = 'ai_development';
        if (str_contains($niche, 'software') || str_contains($niche, 'backend') || str_contains($niche, 'system')) $nicheKey = 'software_engineering';
        if (str_contains($niche, 'robot') || str_contains($niche, 'iot') || str_contains($niche, 'embedded')) $nicheKey = 'robotics_iot';
        if (str_contains($niche, 'learner') || str_contains($niche, 'cs') || str_contains($niche, 'dsa')) $nicheKey = 'daily_learners_cs';

        $curated = $library[$nicheKey] ?? $library['ai_development'];

        $allCurated = array_merge(
            $library['ai_development'],
            $library['software_engineering'],
            $library['robotics_iot'],
            $library['daily_learners_cs']
        );

        if (!empty($devto)) {
            return array_merge(array_slice($devto, 0, 2), array_slice($curated, 0, 4));
        }

        return array_slice(array_merge($curated, $allCurated), 0, 6);
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
