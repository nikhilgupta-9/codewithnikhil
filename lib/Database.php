<?php
declare(strict_types=1);

namespace NikhilWorks\Lib;

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

        $host = (string)Env::get('DB_HOST', '127.0.0.1');
        $port = (string)Env::get('DB_PORT', '3306');
        $dbName = (string)Env::get('DB_NAME', 'nikhil_works_db');
        $user = (string)Env::get('DB_USER', 'root');
        $pass = (string)Env::get('DB_PASS', '');
        $socket = (string)Env::get('DB_SOCKET', '');

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
            return self::$pdo;
        } catch (PDOException $e) {
            // Fallback from socket to TCP if socket connection fails
            if (!empty($socket)) {
                try {
                    $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";
                    self::$pdo = new PDO($dsn, $user, $pass, $options);
                    return self::$pdo;
                } catch (PDOException $fallbackError) {
                    throw new RuntimeException("Database Connection Error: " . $fallbackError->getMessage());
                }
            }
            throw new RuntimeException("Database Connection Error: " . $e->getMessage());
        }
    }
}
