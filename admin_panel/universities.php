<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}

// Directory path to the uploads folder
$uploadsDir = 'assets/uploads/';
$images = array_diff(scandir($uploadsDir), array('..', '.')); // Get all files, excluding '.' and '..'

// Filter to keep only valid image files
$images = array_filter($images, function($file) use ($uploadsDir) {
    return preg_match('/\.(jpg|jpeg|png|gif)$/i', $file) && is_file($uploadsDir . $file);
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities</title>
    <link href="admin_panel.css" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Slider.php">Slider</a>
    <a href="Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Universities</h3>

    <h3>Add Universities</h3>
    <?php
    if (isset($_SESSION['uploadSuccess'])) {
        echo "<p class='upload-success'>" . $_SESSION['uploadSuccess'] . "</p>";
        unset($_SESSION['uploadSuccess']);
    }
    if (isset($_SESSION['uploadError'])) {
        echo "<p class='upload-error'>" . $_SESSION['uploadError'] . "</p>";
        unset($_SESSION['uploadError']);
    }
    ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm" class="upload-form" style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px; margin: 20px 0;">
        <input type="file" name="imageFile" id="imageFile" class="file-input" style="width: 100%; padding: 10px; border: 1px solid #ccc;">
        <button type="submit" name="submit" class="upload-button" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Upload Image</button>
    </form>

    <h3>Uploaded Images Preview</h3>
    <div id="imagePreview" class="image-preview-container">
        <?php
        foreach ($images as $image) {
            echo "<div class='image-preview'>";
            echo "<img src='" . htmlspecialchars($uploadsDir . $image) . "' class='image-preview-image'>";
            echo "<form action='delete.php' method='POST' class='image-preview-delete-form'>";
            echo "<input type='hidden' name='filename' value='" . htmlspecialchars($image) . "'>";
            echo "<button type='submit' class='image-preview-delete-button'>X</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>

    <script>
        // Function to update image preview on file selection
        function updateImagePreview(event) {
            var imageFile = event.target.files[0];
            var imageUrl = URL.createObjectURL(imageFile);
            var imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.style.maxWidth = '100%'; // Limit image width if needed
            document.getElementById('imagePreview').innerHTML = ''; // Clear previous preview
            document.getElementById('imagePreview').appendChild(imgElement);
        }

        // Attach event listener to file input
        document.getElementById('imageFile').addEventListener('change', updateImagePreview);
    </script>
</div>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }
</script>

</body>
</html>
