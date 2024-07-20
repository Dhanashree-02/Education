<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
  
    <link href="admin_panel.css" rel="stylesheet">

</head>
<body>

<div class="sidebar">
<a href="../admin_dashboard.php""><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Universities</p>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Example</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Example</title>
</head>
<body>
    <h1>Upload an Image</h1>
    <form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <input type="file" name="imageFile" id="imageFile">
        <button type="submit" name="submit">Upload Image</button>
    </form>

    <h2>Uploaded Image Preview</h2>
    <div id="imagePreview">
        <!-- Placeholder for uploaded image -->
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

        // Prevent form submission on file selection (optional)
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevents default form submission behavior
            // Handle form submission with AJAX or let it submit normally to 'upload.php'
        });
    </script>
</body>
</html>

</body>
</html>


</div>

<script>
      function confirmLogout() {
    return confirm('Are you sure you want to log out?');
}

// Example usage in a logout button click event
document.getElementById('logoutButton').addEventListener('click', function(event) {
    if (!confirmLogout()) {
        event.preventDefault(); // Prevents the default action (logging out)
    }
});
</script>

</body>
</html>
