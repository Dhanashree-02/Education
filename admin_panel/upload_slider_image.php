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

// Handle the image upload
if (isset($_POST["submit"])) {
    $target_dir = "../assets/uploads/";
    $target_file = $target_dir . basename($_FILES["sliderImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["sliderImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['upload_message'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $_SESSION['upload_message'] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["sliderImage"]["size"] > 500000) {
        $_SESSION['upload_message'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $_SESSION['upload_message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['upload_message'] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["sliderImage"]["tmp_name"], $target_file)) {
            // Insert image info into the database
            $imageName = basename($_FILES["sliderImage"]["name"]);
            $sql = "INSERT INTO slider (image) VALUES ('$imageName')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['upload_message'] = "The file ". htmlspecialchars($imageName). " has been uploaded.";
            } else {
                $_SESSION['upload_message'] = "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            $_SESSION['upload_message'] = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close the database connection
$conn->close();

// Redirect back to the slider page
header("Location: Img.php");
exit();
?>
