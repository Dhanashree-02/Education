<?php
session_start();
include_once('Database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['submit_status'] = 'success'; // Set success message
    } else {
        $_SESSION['submit_status'] = 'error'; // Set error message
    }

    header('Location: ../contact.html');
    exit();
} else {
    header('Location: ../contact.html');
    exit();
}

mysqli_close($conn);
?>
