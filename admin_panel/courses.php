<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.html');
    exit;
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SoftKey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_title = $_POST["course_title"];
    $course_description = $_POST["course_description"];

    if (isset($_POST["course_id"]) && !empty($_POST["course_id"])) {
        // Update existing course
        $course_id = $_POST["course_id"];
        $stmt = $conn->prepare("UPDATE courses SET course_title = ?, course_description = ? WHERE id = ?");
        $stmt->bind_param("ssi", $course_title, $course_description, $course_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Course updated successfully";
        } else {
            $_SESSION['error_message'] = "Error: " . $stmt->error;
        }
    } else {
        // Insert new course
        $stmt = $conn->prepare("INSERT INTO courses (course_title, course_description) VALUES (?, ?)");
        $stmt->bind_param("ss", $course_title, $course_description);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "New course added successfully";
        } else {
            $_SESSION['error_message'] = "Error: " . $stmt->error;
        }
    }

    header('Location: courses.php');
    exit;

    $stmt->close();
}

// Fetch existing courses
$courses = [];
$result = $conn->query("SELECT id, course_title, course_description FROM courses");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="courses.css">
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="dashboard.php">Dashboard</a>
    <a href="courses.php">Courses</a>
    <a href="settings.php">Settings</a>
    <a href="#" onclick="confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Courses</h2>

    <!-- Display success or error message -->
    <?php
    if (isset($_SESSION['success_message'])) {
        echo "<div class='success-message'>" . $_SESSION['success_message'] . "</div>";
        unset($_SESSION['success_message']);
    }
    if (isset($_SESSION['error_message'])) {
        echo "<div class='error-message'>" . $_SESSION['error_message'] . "</div>";
        unset($_SESSION['error_message']);
    }
    ?>

    <form action="courses.php" method="post" class="course-form">
        <input type="hidden" id="course_id" name="course_id">
        <label for="course_title">Course Title:</label>
        <input placeholder="Enter course title" type="text" id="course_title" name="course_title" required class="form-input"><br><br>
        <label for="course_description">Course Description:</label>
        <textarea placeholder="Enter course description" id="course_description" name="course_description" required class="form-textarea"></textarea><br><br>
        <input type="submit" value="Add Course" id="form-submit" class="form-submit">
    </form>

    <h3>Existing Courses</h3>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?php echo htmlspecialchars($course['course_title']); ?></td>
                    <td><?php echo htmlspecialchars($course['course_description']); ?></td>
                    <td>
                        <button onclick="editCourse(<?php echo $course['id']; ?>, '<?php echo htmlspecialchars(addslashes($course['course_title'])); ?>', '<?php echo htmlspecialchars(addslashes($course['course_description'])); ?>')">Edit</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function confirmLogout() {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = 'logout.php'; // Redirect to logout page
        }
    }

    function editCourse(id, title, description) {
        document.getElementById('course_id').value = id;
        document.getElementById('course_title').value = title;
        document.getElementById('course_description').value = description;
        document.getElementById('form-submit').value = 'Update Course';
    }
</script>

</body>
</html>
