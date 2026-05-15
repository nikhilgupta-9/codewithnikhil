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
    $dbName = 'learn_with_nikhil_db';
    $site = "http://localhost/learn-with-nikhil/";
} else {
    $host = 'localhost';
    $username = 'u950539402_code_with_db';
    $password = '@sZ4=NL1|l';
    $dbName = 'u950539402_code_with_db';
    $site = 'https://nikhilworks.com/';
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
