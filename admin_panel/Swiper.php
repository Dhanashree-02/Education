<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php'); // Redirect to login page if not logged in
    exit;
}

// Database connection (update with your own credentials)
$host = 'localhost'; // Host name
$db = 'softkey'; // Replace with your database name
$user = 'root'; // Replace with your database username
$pass = ''; // Replace with your database password (often blank for XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Directory path to the uploads folder
$uploadsDir = 'assets/Swiper/';
if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir, 0755, true); // Create the directory if it doesn't exist
}

// Initialize upload message variable
$uploadMessage = '';

// Handle the image upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['sliderImage'])) {
    $originalFileName = basename($_FILES['sliderImage']['name']);
    $imageFileType = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));
    $newFileName = uniqid('slider_', true) . '.' . $imageFileType; // Generate a unique file name
    $targetFile = $uploadsDir . $newFileName;
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['sliderImage']['tmp_name']);
    if ($check === false) {
        $uploadMessage = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES['sliderImage']['size'] > 5000000) {
        $uploadMessage = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $uploadMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 0) {
        $uploadMessage = "Sorry, your file was not uploaded.";
    } else {
        // Try to upload file
        if (move_uploaded_file($_FILES['sliderImage']['tmp_name'], $targetFile)) {
            // Insert into the database
            $stmt = $pdo->prepare("INSERT INTO swiper_images (image_url, alt_text) VALUES (?, ?)");
            $stmt->execute([$targetFile, $originalFileName]);

            $uploadMessage = "The file " . htmlspecialchars($newFileName) . " has been uploaded.";
            // Redirect to the same page to prevent re-uploading on refresh
            header("Location: " . $_SERVER['PHP_SELF']);
            exit; // Stop the script execution
        } else {
            $uploadMessage = "Sorry, there was an error uploading your file.";
        }
    }
}

// Fetch images from the database
$stmt = $pdo->query("SELECT * FROM swiper_images");
$uploadedImages = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper Admin Panel</title>
    <link href="admin_panel.css" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Img.php">Image</a>
    <a href="Contact.php">Contact</a>
    <a href="swiper.php">Swiper</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h3>Add Swiper Image</h3>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="sliderImage">Select image to upload:</label>
        <input type="file" name="sliderImage" id="sliderImage" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <!-- Display the upload message -->
    <?php if ($uploadMessage): ?>
        <p><?php echo htmlspecialchars($uploadMessage); ?></p>
    <?php endif; ?>

    <h3>Uploaded Images:</h3>
    <div class="image-gallery">
        <?php foreach ($uploadedImages as $image): ?>
            <img src="<?php echo htmlspecialchars($image['image_url']); ?>" alt="<?php echo htmlspecialchars($image['alt_text']); ?>" style="width: 100px; height: auto; margin: 5px;">
        <?php endforeach; ?>
    </div>
</div>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }
</script>

</body>
</html>
