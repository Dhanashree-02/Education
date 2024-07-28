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
    
    <link rel = "stylesheet" href = "admin_panel/admin_panel.css">
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
    <p>This is your admin dashboard.</p>
</div>

<script>
    function confirmLogout() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = '../index.html'; // Redirect to logout page
        }
    }
</script>

</body>
</html>
