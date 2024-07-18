<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

include 'Database.php'; // Adjust the path to your db_connect.php file

// Fetch data from contacts table
$sql = "SELECT id, name, email, subject, message, created_at FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="Contact.css">
 

</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php" class="active">Contact</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
</div>

<div class="main-content">
        <h2 style="text-align: center;">Contact</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table class='contact-table'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Created At</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['subject']}</td>
                    <td>{$row['message']}</td>
                    <td>{$row['created_at']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No contacts found.";
    }
    $conn->close();
    ?>
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
