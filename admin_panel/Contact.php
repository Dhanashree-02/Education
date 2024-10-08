<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit;
}

// Database connection setup (replace with your actual database connection code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softkey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch contact information from database
$sql = "SELECT * FROM contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Contact</title>
    
    <link href="admin_panel.css" rel="stylesheet">
    <link rel="stylesheet" href="Contact.css">
  
</head>
<body>

<div class="sidebar">
<a href="../admin_dashboard.php""><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php">Contact</a>
    <a href="Bg_Img.php">Bg_Img</a>
    <a href="Slider.php">Slider</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>

</div>

<div class="main-content">
<h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Contact</h3>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No contacts found</td></tr>";
            }
            ?>
        </tbody>
    </table>
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

<?php
// Close database connection
$conn->close();
?>
