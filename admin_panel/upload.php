<?php
// Check if form is submitted
if (isset($_POST['submit'])) {
    // File upload path
    $targetDir = "assets/uploads/images/";
    $fileName = basename($_FILES["imageFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFilePath)) {
            echo "The file $fileName has been uploaded.";
            // You can save $targetFilePath in your database if needed
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
}
?>
