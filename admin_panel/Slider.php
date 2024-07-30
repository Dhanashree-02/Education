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

// Fetch slider images
$sql = "SELECT image FROM slider";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[] = $row["image"];
    }
}
$conn->close();
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
    if (!empty($images)) {
        echo '<div id="carouselExample" class="carousel slide" data-ride="carousel">';
        echo '<div class="carousel-inner">';
        foreach ($images as $index => $image) {
            echo '<div class="carousel-item ' . ($index === 0 ? 'active' : '') . '">';
            echo '<img src="../assets/uploads/' . htmlspecialchars($image) . '" class="d-block w-100" alt="Slider Image">';
            echo '</div>';
        }
        echo '</div>';
        echo '<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">';
        echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Previous</span>';
        echo '</a>';
        echo '<a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">';
        echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
        echo '<span class="sr-only">Next</span>';
        echo '</a>';
        echo '</div>';
    } else {
        echo "No images uploaded yet.";
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
