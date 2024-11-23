<?php
// Establish a database connection
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "SoftKey"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch universities data
$sql = "SELECT name, website, image FROM universities";
$result = $conn->query($sql);
?>

<section id="universities" class="universities section">
    <div class="container">
        <div class="row">
            <?php
            // Check if the query returned any results
            if ($result->num_rows > 0) {
                // Loop through all the rows in the result
                while ($row = $result->fetch_assoc()) {
                    $universityName = $row['name'];
                    $universityWebsite = $row['website'];
                    $universityImage = $row['image'];

                    // Output the university data in HTML
                    echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">';
                    echo '<div class="course-item" style="border-color: black;">';
                    echo '<img src="' . $universityImage . '" class="img-fluid" alt="' . $universityName . '">';
                    echo '<div class="course-content">';
                    echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                    echo '<p class="category">University</p>';
                    echo '</div>';
                    echo '<h3><a href="' . $universityWebsite . '" target="_blank">' . $universityName . '</a></h3>';
                    echo '<p>' . $row['description'] . '</p>'; // Optionally, you can add a description if available
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No universities found.</p>';
            }
            ?>
        </div>
    </div>
</section>

<?php
// Close the database connection
$conn->close();
?>
