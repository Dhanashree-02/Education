<?php
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $targetDir = "../assets/uploads/";
    $targetFile = $targetDir . basename($_FILES["imageFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["imageFile"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        $_SESSION['uploadError'] = "File is not an image.";
        header('Location: universities.php');
        exit;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        $uploadOk = 0;
        $_SESSION['uploadError'] = "Sorry, file already exists.";
        header('Location: universities.php');
        exit;
    }

    // Check file size (5MB limit)
    if ($_FILES["imageFile"]["size"] > 5000000) {
        $uploadOk = 0;
        $_SESSION['uploadError'] = "Sorry, your file is too large.";
        header('Location: universities.php');
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $uploadOk = 0;
        $_SESSION['uploadError'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        header('Location: universities.php');
        exit;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $_SESSION['uploadError'] = "Sorry, your file was not uploaded.";
        header('Location: universities.php');
        exit;
    } else {
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFile)) {
            $_SESSION['uploadSuccess'] = "The file " . htmlspecialchars(basename($_FILES["imageFile"]["name"])) . " has been uploaded.";
            $_SESSION['uploadedFile'] = $targetFile;
        } else {
            $_SESSION['uploadError'] = "Sorry, there was an error uploading your file.";
        }
        header('Location: universities.php');
        exit;
    }
}
?>
