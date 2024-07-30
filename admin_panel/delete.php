<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['filename'])) {
    $uploadsDir = 'assets/uploads/';
    $filename = basename($_POST['filename']);
    $filePath = $uploadsDir . $filename;

    // Check if the file exists and delete it
    if (file_exists($filePath)) {
        unlink($filePath);
        $_SESSION['deleteSuccess'] = "File successfully deleted.";
    } else {
        $_SESSION['deleteError'] = "File not found.";
    }
}

// Redirect back to the universities page
header('Location: universities.php');
exit;
?>
