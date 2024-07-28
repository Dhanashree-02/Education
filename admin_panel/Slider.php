<?php
// Start session
session_start();

// Database connection parameters
include 'Database.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errorMessages = []; // Array to hold error messages

// Handling file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['sliderImage'])) {
    // Full path to the assets/img directory
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/Softkey Edu/admin_panel/assets/img/";
    $target_file = $target_dir . basename($_FILES["sliderImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0775, true); // Create the directory if it doesn't exist
    }

    // Check if image file is an actual image or fake image
    if ($_FILES["sliderImage"]["error"] === UPLOAD_ERR_NO_FILE) {
        $errorMessages[] = "No file was uploaded.";
        $uploadOk = 0;
    } else {
        $check = getimagesize($_FILES["sliderImage"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $errorMessages[] = "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $errorMessages[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["sliderImage"]["size"] > 500000) {
        $errorMessages[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errorMessages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        // Prepare an alert with error messages
        $errorMessage = implode('\\n', $errorMessages);
        echo "<script>alert('$errorMessage');</script>";
    } else {
        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["sliderImage"]["tmp_name"], $target_file)) {
            // Insert into database only if the upload was successful
            $position = $_POST['position'];
            $relative_path = "assets/img/" . basename($_FILES["sliderImage"]["name"]);
            $sql = "INSERT INTO slider (image_path, position) VALUES ('$relative_path', '$position')";
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('The file " . basename($_FILES["sliderImage"]["name"]) . " has been uploaded and saved to the database.');</script>";
            } else {
                echo "<script>alert('Error: " . $conn->error . "');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}

// Fetch images from database
$sql = "SELECT image_path FROM Slider ORDER BY position ASC";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Slider</title>
    <link href="admin_panel.css" rel="stylesheet">
    <link rel="stylesheet" href="Courses.css">
    <style>
        .image-gallery .image-item img {
            width: 15%; 
            height: 20%;
            margin:1px;
            border:1px solid black;
        }
    </style>
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
    
    <!-- Form for uploading images -->
    <form action="Slider.php" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
        <label for="sliderImage" style="display: block;">Select image to upload:</label><br>
        <input type="file" name="sliderImage" id="sliderImage" style="margin-bottom: 10px;">
        <label for="position" style="display: block;">Position:</label>
        <input type="number" name="position" id="position" min="1" required style="margin-bottom: 10px;">
        <input type="submit" value="Upload Image" name="submit" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; cursor: pointer;">
    </form>
    <!-- Display existing images -->
    <div class="image-gallery">
        <?php foreach ($images as $index => $image): ?>
            <div class="image-item">
                <img src="<?php echo $image; ?>" alt="Slide <?php echo $index + 1; ?>" class="image">
            </div>
        <?php endforeach; ?>
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
