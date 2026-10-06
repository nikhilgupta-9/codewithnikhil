<?php
declare(strict_types=1);

namespace NikhilWorks\Lib;

class Logger
{
    private string $logFile;
    private int $maxBytes;

    public function __construct(?string $logFile = null, int $maxBytes = 5242880) // 5MB default
    {
        $this->logFile = $logFile ?? dirname(__DIR__) . '/logs/social_automation.log';
        $this->maxBytes = $maxBytes;

        $dir = dirname($this->logFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    public function log(string $level, string $message, array $context = []): void
    {
        $this->rotateIfNeeded();

        $tz = Env::get('TIMEZONE', 'Asia/Kolkata');
        $date = (new \DateTime('now', new \DateTimeZone($tz)))->format('Y-m-d H:i:s');
        
        $contextStr = !empty($context) ? ' ' . json_encode($context, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : '';
        $line = sprintf("[%s] [%s] %s%s%s", $date, strtoupper($level), $message, $contextStr, PHP_EOL);

        file_put_contents($this->logFile, $line, FILE_APPEND | LOCK_EX);
    }

    public function info(string $message, array $context = []): void
    {
        $this->log('info', $message, $context);
    }

    public function warning(string $message, array $context = []): void
    {
        $this->log('warning', $message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        $this->log('error', $message, $context);
    }

    private function rotateIfNeeded(): void
    {
        if (!file_exists($this->logFile)) {
            return;
        }

        if (filesize($this->logFile) >= $this->maxBytes) {
            $backup = $this->logFile . '.' . date('Ymd_His') . '.bak';
            @rename($this->logFile, $backup);
        }
    }
}
