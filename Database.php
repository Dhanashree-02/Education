<?php
// db_connect.php
$servername = "localhost"; // Update with your server details
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "SoftKey"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
