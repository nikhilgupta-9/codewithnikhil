<?php
declare(strict_types=1);

namespace NikhilWorks\Services;

use NikhilWorks\Lib\Env;
use NikhilWorks\Lib\Database;
use NikhilWorks\Lib\Logger;
use RuntimeException;

class YouTubeService
{
    private Logger $logger;
    private string $uploadUrl = 'https://www.googleapis.com/upload/youtube/v3/videos?uploadType=resumable&part=snippet,status';

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Upload a testimonial video to YouTube via resumable chunked upload.
     * Default privacy status: private.
     */
    public function uploadTestimonialVideo(string $filePath, string $customerName, string $title, string $description): array
    {
        if (!file_exists($filePath) || !is_readable($filePath)) {
            throw new RuntimeException("Video file not found or unreadable: {$filePath}");
        }

        $accessToken = $this->getFreshAccessToken();
        if (empty($accessToken)) {
            throw new RuntimeException("YouTube OAuth Access Token could not be retrieved or refreshed.");
        }

        $fileSize = filesize($filePath);
        $privacyStatus = (string)Env::get('YOUTUBE_PRIVACY_STATUS', 'private');

        $metadata = [
            'snippet' => [
                'title'       => substr("Client Testimonial: {$customerName} - {$title}", 0, 95),
                'description' => "{$description}\n\nBuilt by NikhilWorks: https://nikhilworks.com/",
                'tags'        => ['NikhilWorks', 'Client Testimonial', 'Web Development', 'AI Automation'],
                'categoryId'  => '28' // Science & Technology
            ],
            'status' => [
                'privacyStatus'           => $privacyStatus,
                'selfDeclaredMadeForKids' => false
            ]
        ];

        // Step 1: Initiate Resumable Upload Session
        $ch = curl_init($this->uploadUrl);
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($metadata),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER         => true,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER     => [
                "Authorization: Bearer {$accessToken}",
                "Content-Type: application/json; charset=UTF-8",
                "X-Upload-Content-Type: video/*",
                "X-Upload-Content-Length: {$fileSize}",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $rawResponse = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new RuntimeException("Failed to initiate YouTube upload session (HTTP {$httpCode}): " . substr((string)$rawResponse, 0, 300));
        }

        $headers = substr((string)$rawResponse, 0, $headerSize);
        if (!preg_match('/location:\s*([^\r\n]+)/i', $headers, $matches)) {
            throw new RuntimeException("YouTube upload session did not return a Location header.");
        }

        $resumableSessionUrl = trim($matches[1]);

        // Step 2: Stream File Bytes to Session URL
        $fileHandle = fopen($filePath, 'rb');
        $videoData = fread($fileHandle, $fileSize);
        fclose($fileHandle);

        $chUpload = curl_init($resumableSessionUrl);
        curl_setopt_array($chUpload, [
            CURLOPT_PUT            => true,
            CURLOPT_POSTFIELDS     => $videoData,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 300, // 5 min timeout for large video
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER     => [
                "Content-Type: video/*",
                "Content-Length: {$fileSize}",
                "User-Agent: NikhilWorks-SocialAutomation/1.0"
            ]
        ]);

        $uploadResponse = curl_exec($chUpload);
        $uploadHttpCode = curl_getinfo($chUpload, CURLINFO_HTTP_CODE);
        curl_close($chUpload);

        if ($uploadHttpCode !== 200 && $uploadHttpCode !== 201) {
            throw new RuntimeException("YouTube video upload failed (HTTP {$uploadHttpCode}): " . substr((string)$uploadResponse, 0, 300));
        }

        $result = json_decode((string)$uploadResponse, true);
        $videoId = $result['id'] ?? '';

        if (empty($videoId)) {
            throw new RuntimeException("YouTube video uploaded but no video ID was returned.");
        }

        $this->logger->info("Successfully uploaded testimonial video to YouTube: https://youtu.be/{$videoId} (Privacy: {$privacyStatus})");

        return [
            'video_id'  => (string)$videoId,
            'video_url' => "https://youtu.be/{$videoId}",
            'privacy'   => $privacyStatus
        ];
    }

    private function getFreshAccessToken(): ?string
    {
        $clientId = (string)Env::get('YOUTUBE_CLIENT_ID');
        $clientSecret = (string)Env::get('YOUTUBE_CLIENT_SECRET');
        $refreshToken = (string)Env::get('YOUTUBE_REFRESH_TOKEN');

        if (empty($clientId) || empty($clientSecret) || empty($refreshToken)) {
            return null;
        }

        $ch = curl_init('https://oauth2.googleapis.com/token');
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => http_build_query([
                'client_id'     => $clientId,
                'client_secret' => $clientSecret,
                'refresh_token' => $refreshToken,
                'grant_type'    => 'refresh_token'
            ]),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER     => [
                "Content-Type: application/x-www-form-urlencoded"
            ]
        ]);

        $res = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($res !== false && $httpCode === 200) {
            $data = json_decode((string)$res, true);
            return $data['access_token'] ?? null;
        }

        return null;
    }
}
