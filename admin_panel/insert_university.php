<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SoftKey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example data
$universities = [
    ['name' => 'Arunodaya University', 'website' => 'https://arunodayauniversity.ac.in/', 'image' => 'assets/img/universities/arunodaya_university.jpg'],
    ['name' => 'Yashwanthrao Chavan', 'website' => 'https://ycmouoa.digitaluniversity.ac/', 'image' => 'assets/img/universities/yashwanthrao_chavan.jpg'],
    ['name' => 'Singhania University', 'website' => 'https://singhaniauniversity.ac.in/', 'image' => 'assets/img/universities/singhania_university.jpg']
];

foreach ($universities as $university) {
    $name = $conn->real_escape_string($university['name']);
    $website = $conn->real_escape_string($university['website']);
    $image = $conn->real_escape_string($university['image']);
    
    $sql = "INSERT INTO universities (name, website, image) VALUES ('$name', '$website', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
