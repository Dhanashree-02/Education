<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit;
}

// Database connection setup
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "softkey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["slider_image"])) {
    $target_dir = "Slider/";
    $target_file = $target_dir . basename($_FILES["slider_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($_FILES["slider_image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $message = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["slider_image"]["size"] > 5000000) {
        $message = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message = "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["slider_image"]["tmp_name"], $target_file)) {
            $image_url = $target_file;

            // Insert image URL into database
            $stmt = $conn->prepare("INSERT INTO slider (image_url) VALUES (?)");
            $stmt->bind_param("s", $image_url);

            if ($stmt->execute()) {
                $message = "The file ". htmlspecialchars(basename($_FILES["slider_image"]["name"])) . " has been uploaded and saved to the database.";
            } else {
                $message = "Sorry, there was an error saving the file URL to the database.";
            }

            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Slider</title>
    <link href="admin_panel.css" rel="stylesheet">
    <link rel="stylesheet" href="Contact.css">
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php">Contact</a>
    <a href="Bg_Img.php">Bg_Img</a>
    <a href="Slider.php">Slider</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Slider</h3>
    
    <?php if ($message != "") { echo "<p>$message</p>"; } ?>
    
    <form action="Slider.php" method="post" enctype="multipart/form-data">
        <label for="slider_image">Select image to upload:</label>
        <input type="file" name="slider_image" id="slider_image">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    
</div>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }

    document.getElementById('logoutButton').addEventListener('click', function(event) {
        if (!confirmLogout()) {
            event.preventDefault();
        }
    });
</script>

</body>
</html>
