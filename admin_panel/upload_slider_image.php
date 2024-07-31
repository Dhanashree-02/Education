<?php
session_start();

// Database connection parameters
include 'Database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Handle file upload
    $targetDir = '../assets/Slider/'; // Target directory
    $targetFile = $targetDir . basename($_FILES['sliderImage']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['sliderImage']['tmp_name']);
    if ($check === false) {
        $_SESSION['upload_message'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $_SESSION['upload_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Limit file size (e.g., 5MB)
    if ($_FILES['sliderImage']['size'] > 5000000) {
        $_SESSION['upload_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        $_SESSION['upload_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['upload_message'] = "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES['sliderImage']['tmp_name'], $targetFile)) {
            // Insert file name into the database
            $sql = "INSERT INTO slider (image) VALUES ('" . $conn->real_escape_string(basename($_FILES['sliderImage']['name'])) . "')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['upload_message'] = "The file " . basename($_FILES['sliderImage']['name']) . " has been uploaded.";
            } else {
                $_SESSION['upload_message'] = "Error uploading file to database: " . $conn->error;
            }
        } else {
            $_SESSION['upload_message'] = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the connection
$conn->close();

// Redirect back to the image upload page
header("Location: Img.php");
exit();
?>
