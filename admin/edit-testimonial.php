<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$id = isset($_GET['edit']) ? intval($_GET['edit']) : (isset($_GET['id']) ? intval($_GET['id']) : 0);
if ($id > 0) {
    header("Location: add-testimonial.php?edit=" . $id);
    exit();
} else {
    header("Location: view-testimonials.php");
    exit();
}