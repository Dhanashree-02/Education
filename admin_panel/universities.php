<?php
session_start();

// Redirect to login if session username is not set
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
    <title>Admin Dashboard - Universities</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php">Contact</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2 style="text-align: center;">Universities</h2>

    <!-- Add University Form -->
    <h3>Add New University</h3>
    <form action="insert_university.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="University Name" required><br><br>
        <input type="url" name="website" placeholder="University Website Url" required><br><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <button type="submit">Add University</button>
    </form>


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
