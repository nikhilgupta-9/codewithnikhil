<?php
declare(strict_types=1);

namespace NikhilWorks\Lib;

require_once __DIR__ . '/Env.php';

use PDO;
use PDOException;
use RuntimeException;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        Env::load();

        // Auto-detect local vs production environment
        $is_local = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']) 
            || (isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false))
            || (php_sapi_name() === 'cli' && is_dir('/Applications/XAMPP'));

        if ($is_local) {
            $defaultHost = '127.0.0.1';
            $defaultPort = '3306';
            $defaultDb   = 'nikhil_works_db';
            $defaultUser = 'root';
            $defaultPass = '';
            $defaultSock = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
        } else {
            // Production credentials on Hostinger
            $defaultHost = 'localhost';
            $defaultPort = '3306';
            $defaultDb   = 'u950539402_nikhil_work_db';
            $defaultUser = 'u950539402_nikhil_user';
            $defaultPass = 'Nikhil@Works2024!';
            $defaultSock = null;
        }

        $host   = (string)Env::get('DB_HOST', $defaultHost);
        $port   = (string)Env::get('DB_PORT', $defaultPort);
        $dbName = (string)Env::get('DB_NAME', $defaultDb);
        $user   = (string)Env::get('DB_USER', $defaultUser);
        $pass   = (string)Env::get('DB_PASS', $defaultPass);
        $socket = (string)Env::get('DB_SOCKET', (string)($defaultSock ?? ''));

        // Safeguard for production: Never attempt root with empty password on Hostinger
        if (!$is_local && ($user === 'root' || empty($pass))) {
            $host   = 'localhost';
            $user   = 'u950539402_nikhil_user';
            $pass   = 'Nikhil@Works2024!';
            $dbName = 'u950539402_nikhil_work_db';
            $port   = '3306';
        }

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        ];

        try {
            if (!empty($socket) && file_exists($socket)) {
                $dsn = "mysql:unix_socket={$socket};dbname={$dbName};charset=utf8mb4";
            } else {
                $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";
            }

            self::$pdo = new PDO($dsn, $user, $pass, $options);
            self::ensureTablesExist(self::$pdo);
            return self::$pdo;
        } catch (PDOException $e) {
            // Fallback attempts
            if (!$is_local) {
                try {
                    $dsn = "mysql:host=localhost;dbname=u950539402_nikhil_work_db;charset=utf8mb4";
                    self::$pdo = new PDO($dsn, 'u950539402_nikhil_user', 'Nikhil@Works2024!', $options);
                    self::ensureTablesExist(self::$pdo);
                    return self::$pdo;
                } catch (PDOException $fallbackError) {
                    throw new RuntimeException("Database Connection Error: " . $fallbackError->getMessage());
                }
            } else if (!empty($socket)) {
                try {
                    $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";
                    self::$pdo = new PDO($dsn, $user, $pass, $options);
                    self::ensureTablesExist(self::$pdo);
                    return self::$pdo;
                } catch (PDOException $fallbackError) {
                    throw new RuntimeException("Database Connection Error: " . $fallbackError->getMessage());
                }
            }
            throw new RuntimeException("Database Connection Error: " . $e->getMessage());
        }
    }

    private static function ensureTablesExist(PDO $pdo): void
    {
        try {
            // Ensure social_jobs table exists
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS `social_jobs` (
                  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                  `blog_id` INT(11) NOT NULL,
                  `platform` ENUM('devto', 'hashnode', 'linkedin', 'x') NOT NULL,
                  `caption` TEXT DEFAULT NULL,
                  `cover_image_url` VARCHAR(500) DEFAULT NULL,
                  `tags` VARCHAR(255) DEFAULT NULL,
                  `scheduled_at` DATETIME NOT NULL,
                  `status` ENUM('draft', 'approved', 'posted', 'failed') NOT NULL DEFAULT 'draft',
                  `attempts` TINYINT(3) UNSIGNED NOT NULL DEFAULT 0,
                  `external_url` VARCHAR(500) DEFAULT NULL,
                  `external_id` VARCHAR(255) DEFAULT NULL,
                  `error` TEXT DEFAULT NULL,
                  `payload` LONGTEXT DEFAULT NULL,
                  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `uniq_blog_platform` (`blog_id`, `platform`),
                  KEY `idx_queue_pickup` (`status`, `scheduled_at`, `attempts`),
                  KEY `idx_blog_id` (`blog_id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");

            // Ensure social_tokens table exists
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS `social_tokens` (
                  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                  `platform` VARCHAR(50) NOT NULL,
                  `account_id` VARCHAR(150) DEFAULT NULL,
                  `account_name` VARCHAR(150) DEFAULT NULL,
                  `access_token` TEXT NOT NULL,
                  `refresh_token` TEXT DEFAULT NULL,
                  `token_type` VARCHAR(50) DEFAULT 'Bearer',
                  `scope` TEXT DEFAULT NULL,
                  `expires_at` DATETIME DEFAULT NULL,
                  `author_urn` VARCHAR(255) DEFAULT NULL,
                  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `uniq_platform` (`platform`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
            ");

            // Verify author_urn column exists on social_tokens
            $colCheck = $pdo->query("SHOW COLUMNS FROM `social_tokens` LIKE 'author_urn'");
            if ($colCheck && $colCheck->rowCount() === 0) {
                $pdo->exec("ALTER TABLE `social_tokens` ADD COLUMN `author_urn` VARCHAR(255) DEFAULT NULL AFTER `expires_at`");
            }

            // Ensure testimonials automation & consent columns exist
            $existingCols = [];
            $cRes = $pdo->query("SHOW COLUMNS FROM `testimonials`");
            if ($cRes) {
                while ($col = $cRes->fetch()) {
                    $existingCols[] = $col['Field'];
                }
            }
            $neededCols = [
                'video_url'         => "VARCHAR(500) DEFAULT NULL",
                'video_file_path'   => "VARCHAR(500) DEFAULT NULL",
                'consent_given'     => "TINYINT(1) UNSIGNED NOT NULL DEFAULT 0",
                'consent_proof_url' => "VARCHAR(500) DEFAULT NULL",
                'youtube_video_id'  => "VARCHAR(100) DEFAULT NULL",
                'youtube_status'    => "ENUM('none', 'pending_upload', 'uploaded_private', 'published') DEFAULT 'none'",
                'social_status'     => "ENUM('draft', 'approved', 'processed', 'archived') NOT NULL DEFAULT 'draft'"
            ];
            foreach ($neededCols as $colName => $colDef) {
                if (!in_array($colName, $existingCols, true)) {
                    try {
                        $pdo->exec("ALTER TABLE `testimonials` ADD COLUMN `{$colName}` {$colDef}");
                    } catch (\Throwable $colErr) {}
                }
            }
        } catch (\Throwable $t) {
            // Non-fatal setup notice
            error_log("ensureTablesExist notice: " . $t->getMessage());
        }
    }
}
