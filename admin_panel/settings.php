<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            margin: 0;
        }
        .sidebar {
            background-color: #333;
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
            border-bottom: 1px solid #444;
        }
        .sidebar a:hover {
            background-color: #444;
        }
        .main-content {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">
<a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="dashboard.php">Dashboard</a>
    <a href="profile.php">Profile</a>
    <a href="settings.php">Settings</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Settings</h2>
    <p>This is the Settings content.</p>
</div>

<script>
     function confirmLogout() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = 'logout.php'; // Redirect to logout page
        }
    }
</script>


</body>
</html>
