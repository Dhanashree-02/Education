<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit;
}

// Handle the file upload
if (isset($_POST['submit']) && isset($_FILES['imageFile'])) {
    $uploadDir = 'assets/uploads/'; // Directory where files will be uploaded
    $uploadFile = $uploadDir . basename($_FILES['imageFile']['name']);
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']; // Allowed file types
    $maxFileSize = 2 * 1024 * 1024; // 2 MB file size limit

    // Check if the upload directory exists, if not create it
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        $_SESSION['uploadError'] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
    }
    // Validate file size
    elseif ($_FILES['imageFile']['size'] > $maxFileSize) {
        $_SESSION['uploadError'] = "File size exceeds the 2 MB limit.";
    }
    // Attempt to move the uploaded file
    else {
        if (move_uploaded_file($_FILES['imageFile']['tmp_name'], $uploadFile)) {
            $_SESSION['uploadSuccess'] = "File successfully uploaded.";
            $_SESSION['uploadedFile'] = $uploadFile; // Store the path to display the image
        } else {
            $_SESSION['uploadError'] = "There was an error uploading the file.";
        }
    }

    // Redirect back to universities.php
    header('Location: universities.php');
    exit;
}
?>
