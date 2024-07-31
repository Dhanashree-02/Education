<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
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
    <a href="Img.php">Image</a>
    <a href="Contact.php">Contact</a>
    <a href="swiper.php">Swiper</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Swiper</h3>

    <h3>Add Swiper</h3>

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
