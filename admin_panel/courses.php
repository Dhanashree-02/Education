<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}

// Database configuration
include 'Database.php';

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add or update a course
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'delete' && isset($_POST['course_id'])) {
            $course_id = intval($_POST['course_id']);
            // Delete course
            $sql = "DELETE FROM courses WHERE id = $course_id";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = "Course deleted successfully!";
            } else {
                $_SESSION['error_message'] = "Error deleting course: " . $conn->error;
            }
        }
    } else {
        $course_id = isset($_POST['course_id']) ? intval($_POST['course_id']) : 0;
        $course_title = $conn->real_escape_string($_POST['course_title']);
        $course_description = $conn->real_escape_string($_POST['course_description']);
        
        if ($course_id > 0) {
            // Update existing course
            $sql = "UPDATE courses SET course_title='$course_title', course_description='$course_description' WHERE id=$course_id";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = "Course updated successfully!";
            } else {
                $_SESSION['error_message'] = "Error updating course: " . $conn->error;
            }
        } else {
            // Add new course
            $sql = "INSERT INTO courses (course_title, course_description) VALUES ('$course_title', '$course_description')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION['success_message'] = "Course added successfully!";
            } else {
                $_SESSION['error_message'] = "Error adding course: " . $conn->error;
            }
        }
    }
}

// Fetch data from the courses table
$sql = "SELECT id, course_title, course_description FROM courses";
$result = $conn->query($sql);

$courses = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $courses[] = $row;
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
    <title>Admin Dashboard</title>
    <link href="admin_panel.css" rel="stylesheet">
    <link rel = "Stylesheet" href = "Courses.css"
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
    <h3>Courses</h3>
    
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

    <form action="courses.php" method="post" class="course-form" style="background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px; margin: 20px 0;">
        <input type="hidden" id="course_id" name="course_id">
        <table class="form-table" style="width: 100%;">
            <tr>
                <td style="width: 20%;"><label for="course_title" style="font-weight: bold;">Course Title:</label></td>
                <td style="width: 80%;"><input placeholder="Enter course title" type="text" id="course_title" name="course_title" required class="form-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter course title'" style="width: 100%; padding: 10px; border: 1px solid #ccc;"></td>
            </tr>
            <tr>
                <td style="width: 20%;"><label for="course_description" style="font-weight: bold;">Course Description:</label></td>
                <td style="width: 80%;"><textarea placeholder="Enter course description" id="course_description" name="course_description" required class="form-textarea" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter course description'" style="width: 100%; padding: 10px; border: 1px solid #ccc;"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" class="text-center" style="text-align: center; padding: 10px;"><input type="submit" value="Add Course" id="form-submit" class="form-submit" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;"></td>
            </tr>
        </table>
    </form>

    <table class="courses-table">
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
                        <button onclick="editCourse(<?php echo $course['id']; ?>, '<?php echo htmlspecialchars(addslashes($course['course_title'])); ?>', '<?php echo htmlspecialchars(addslashes($course['course_description'])); ?>')" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Edit</button>
                        <form action="courses.php" method="post" style="display: inline-block;">
                            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this course?')" style="background-color: #f44336; color: white; padding: 10px 15px; border: none; cursor: pointer; border-radius: 5px;">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
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

    function editCourse(id, title, description) {
        document.getElementById('course_id').value = id;
        document.getElementById('course_title').value = title;
        document.getElementById('course_description').value = description;
        document.getElementById('form-submit').value = 'Update Course';
    }
</script>

</body>
</html>
