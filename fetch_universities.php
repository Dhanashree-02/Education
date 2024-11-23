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

<div class="col-lg-8 scrollable-section" style="overflow-y: auto; max-height: 100vh;">
  <div class="section-title mb-4" data-aos="fade-up">
    <h2>Universities</h2>
    <p>Popular Universities</p>
  </div>

  <?php
  // Check if there are universities in the database
  if ($result->num_rows > 0) {
      // Loop through each university
      while ($row = $result->fetch_assoc()) {
          // Display each university's card and information dynamically
          ?>
          <div class="row mb-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="col-md-6">
              <div class="card h-100">
                <img src="assets/img/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><a href="<?php echo $row['website']; ?>" target="_blank"><?php echo $row['name']; ?></a></h5>
                  <p class="card-text">Explore more about <?php echo $row['name']; ?> and its programs.</p>
                  <a href="<?php echo $row['website']; ?>" target="_blank" class="btn btn-primary w-100">View Details</a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="university-info">
                <h5>About <?php echo $row['name']; ?></h5>
                <p>Learn more about <?php echo $row['name']; ?> and its educational programs. Discover the programs, opportunities, and facilities available to students.</p>
                <ul>
                  <li>Programs Offered: Engineering, Arts, Science, Management</li>
                  <li>Location: City, State</li>
                  <li>Accreditation: NAAC A+</li>
                  <li>Contact: +1234567890</li>
                </ul>
              </div>
            </div>
          </div>
          <?php
      }
  } else {
      echo "<p>No universities found.</p>";
  }
  ?>

</div>

<?php
// Close the database connection
$conn->close();
?>
