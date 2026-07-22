<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set to true for local dev, false for production
$local = true;

if ($local) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $host     = 'localhost';
    $username = 'root';
    $password = '';
    $dbName   = 'learn_with_nikhil_db';
    $site     = 'http://localhost/learn-with-nikhil/';
} else {
    error_reporting(0);
    ini_set('display_errors', 0);

    $host     = 'localhost';
    $username = 'YOUR_HOSTINGER_DB_USER';
    $password = 'YOUR_HOSTINGER_DB_PASSWORD';
    $dbName   = 'YOUR_HOSTINGER_DB_NAME';
    $site     = 'https://nikhilworks.com/';
}

global $site;

$conn = new mysqli($host, $username, $password, $dbName);

if ($conn->connect_error) {
    $local
        ? die('Database Connection Failed: ' . $conn->connect_error)
        : die('Service temporarily unavailable. Please try again later.');
}

$conn->set_charset('utf8mb4');
?>
