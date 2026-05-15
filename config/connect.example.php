<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set to true for local dev, false for production
$local = true;

if ($local) {
    $host     = 'localhost';
    $username = 'root';
    $password = '';
    $dbName   = 'learn_with_nikhil_db';
    $site     = 'http://localhost/learn-with-nikhil/';
} else {
    $host     = 'localhost';
    $username = 'YOUR_DB_USER';
    $password = 'YOUR_DB_PASSWORD';
    $dbName   = 'YOUR_DB_NAME';
    $site     = 'https://learnwithnikhil.com/';
}

// PRODUCTION: set display_errors = 0
error_reporting(0);
ini_set('display_errors', 0);

global $site;

$conn = new mysqli($host, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed.");
}

$conn->set_charset("utf8");
?>
