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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            background-color: #3f4d67;
            color: #fff;
            padding: 20px;
            width: 200px;
            display: flex;
            flex-direction: column;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 0;
            margin: 5px 0;
            border-bottom: 1px solid #a9b7d0;
        }
        .sidebar a:hover {
            color: #39afd3;
        }
        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px;
        }
        .logout-button {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="sidebar">
<a href="admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="admin_panel/dashboard.php">Dashboard</a>
    <a href="admin_panel/courses.php">Courses</a>
    <a href="admin_panel/settings.php">Settings</a>
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
