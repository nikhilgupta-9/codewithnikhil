<?php
declare(strict_types=1);

namespace NikhilWorks\Lib;

class Lock
{
    private string $lockFile;
    private $handle = null;

    public function __construct(?string $lockFile = null)
    {
        $this->lockFile = $lockFile ?? dirname(__DIR__) . '/logs/cron_social_jobs.lock';
        $dir = dirname($this->lockFile);
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    public function acquire(): bool
    {
        $this->handle = fopen($this->lockFile, 'c+');
        if (!$this->handle) {
            return false;
        }

        // Non-blocking exclusive lock
        if (!flock($this->handle, LOCK_EX | LOCK_NB)) {
            fclose($this->handle);
            $this->handle = null;
            return false;
        }

        ftruncate($this->handle, 0);
        fwrite($this->handle, (string)getmypid());
        return true;
    }

    public function release(): void
    {
        if ($this->handle) {
            flock($this->handle, LOCK_UN);
            fclose($this->handle);
            $this->handle = null;
            if (file_exists($this->lockFile)) {
                @unlink($this->lockFile);
            }
        }
    }

    public function __destruct()
    {
        $this->release();
    }
}
