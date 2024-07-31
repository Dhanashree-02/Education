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
    <style>
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 5px;
            margin: 5px;
            background-color: #fff;
            display: inline-block;
            width: calc(33% - 20px);
            text-align: center;
            position: relative;
            transition: transform 0.5s ease;
            border: 1px solid black;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card .view-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 10px;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.5s ease;
        }
        .card .view-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="sidebar">
<a href="admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="admin_panel/universities.php">Universities</a>
    <a href="admin_panel/courses.php">Courses</a>
    <a href="admin_panel/Img.php">Image</a>
    <a href="admin_panel/Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is your admin dashboard.</p>
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
        <h3>Image</h3>
        <p>Manage the Image images.</p>
        <a href="admin_panel/Img.php" class="view-button">View</a>
    </div>
    <div class="card">
        <h3>Contact</h3>
        <p>Manage contact information.</p>
        <a href="admin_panel/Contact.php" class="view-button">View</a>
    </div>
    <div class="card">
        <h3>Swiper</h3>
        <p>Manage swiper information.</p>
        <a href="admin_panel/Swiper.php" class="view-button">View</a>
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