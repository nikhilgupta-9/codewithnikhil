<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Configuration
$local = false; // Set to false for live server

if ($local) {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbName   = 'nikhil_backup';
    $site     = 'http://localhost/nikhil-backup/';
} else {
    $host = 'localhost';
    $username = 'u950539402_nikhil_work_db';
    $password = 'e5ILWM2&';
    $dbName   = 'u950539402_nikhil_work_db';
    $site     = 'https://nikhilworks.com/';
}

// Make `$site` global
global $site;

// Create Database Connection
$conn = new mysqli($host, $username, $password, $dbName);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Optional: Set Character Encoding to UTF-8
$conn->set_charset("utf8");

?>
