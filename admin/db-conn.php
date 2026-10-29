<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. First priority: reuse master database connection if available
$masterConnect = dirname(__DIR__) . '/config/connect.php';
if (file_exists($masterConnect)) {
    require_once $masterConnect;
}

// 2. Fallback if $conn wasn't created by master config
if (!isset($conn) || !($conn instanceof mysqli)) {
    $is_local = in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1']) 
        || (isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false))
        || php_sapi_name() === 'cli';

    if ($is_local) {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $host     = '127.0.0.1';
        $username = 'root';
        $password = '';
        $dbName   = 'nikhil_works_db';
        $site     = 'http://localhost/nikhil-works/';
        $socket   = file_exists('/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock') ? '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock' : null;
    } else {
        error_reporting(0);
        ini_set('display_errors', 0);

        $host     = 'localhost';
        $username = 'u950539402_nikhil_user';
        $password = 'Nikhil@Works2024!';
        $dbName   = 'u950539402_nikhil_work_db';
        $site     = 'https://nikhilworks.com/';
        $socket   = null;
    }

    global $site;

    if ($socket) {
        $conn = new mysqli($host, $username, $password, $dbName, 3306, $socket);
    } else {
        $conn = @new mysqli($host, $username, $password, $dbName);
    }

    // Secondary fallback for Hostinger if first user fails
    if ($conn->connect_error && !$is_local) {
        $conn = @new mysqli('localhost', 'u950539402_nikhil_work_db', 'e5ILWM2&', 'u950539402_nikhil_work_db');
    }

    if ($conn->connect_error) {
        die("Database Connection Failed: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");
}
