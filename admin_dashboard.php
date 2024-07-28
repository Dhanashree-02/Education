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
    
    <link rel = "stylesheet" href = "admin_panel.css">
   
</head>
<body>

<div class="sidebar">
<a href="admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="admin_panel/universities.php">Universities</a>
    <a href="admin_panel/courses.php">Courses</a>
    <a href="admin_panel/Slider.php">Slider</a>
    <a href="admin_panel/Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>This is your admin dashboard.</h3>
    <div class="card">
        <h3>Universities</h3>
        <p>Manage universities details.</p>
        <a href="admin_panel/universities.php" class="view-button">View</a>
    </div>
    <div class="card">
        <h3>Courses</h3>
        <p>Manage courses details.</p>
        <a href="admin_panel/courses.php" class="view-button">View</a>
    </div>
    <div class="card">
        <h3>Slider</h3>
        <p>Manage the slider images.</p>
        <a href="admin_panel/Slider.php" class="view-button">View</a>
    </div>
    <div class="card">
        <h3>Contact</h3>
        <p>Manage contact information.</p>
        <a href="admin_panel/Contact.php" class="view-button">View</a>
    </div>
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
