<?php
session_start();

// Database connection parameters
include 'Database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Slider</title>  
    <link rel="stylesheet" href="admin_panel.css"> 
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Slider.php">Slider</a>
    <a href="Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Slider</h3>
    
    <form action="upload_slider_image.php" method="post" enctype="multipart/form-data">
        <label for="sliderImage">Select image to upload:</label>
        <input type="file" name="sliderImage" id="sliderImage" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
    <?php
    // Display success or error messages
    if (isset($_SESSION['upload_message'])) {
        echo $_SESSION['upload_message'];
        unset($_SESSION['upload_message']);
    }

    // Display uploaded images
    $sql = "SELECT image FROM slider";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div><img src='../assets/uploads/" . $row["image"] . "' alt='Slider Image' style='width:200px;height:auto;'></div>";
        }
    } else {
        echo "No images uploaded yet.";
    }
    ?>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
