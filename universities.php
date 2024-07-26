<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities - Softkey Education</title>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="courses-page">

<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="universities.html" class="active">Universities</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="courses.php">Get Started</a>
    </div>
</header>

<main class="main">
    <div class="page-title" data-aos="fade">
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Universities</li>
                </ol>
            </div>
        </nav>
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Universities</h1>
                        <p class="mb-0">Universities that support us.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="courses" class="courses section">
        <div class="container">
            <div class="row">
                <?php
                // Display uploaded images if any
                $uploadDir = 'assets/uploads/';
                if (is_dir($uploadDir)) {
                    $files = array_diff(scandir($uploadDir), array('.', '..'));
                    foreach ($files as $file) {
                        echo '<div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">';
                        echo '<div class="course-item" style="border-color: black;">';
                        echo '<img src="' . $uploadDir . htmlspecialchars($file) . '" class="img-fluid" alt="...">';
                        echo '<div class="course-content">';
                        echo '<div class="d-flex justify-content-between align-items-center mb-3">';
                        echo '<p class="category">University</p>';
                        echo '</div>';
                        echo '<h3><a href="#">' . pathinfo($file, PATHINFO_FILENAME) . '</a></h3>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>

            <div id="imagePreview"></div>

            <script>
                // Function to update image preview on file selection
                function updateImagePreview(event) {
                    var imageFile = event.target.files[0];
                    var imageUrl = URL.createObjectURL(imageFile);
                    var imgElement = document.createElement('img');
                    imgElement.src = imageUrl;
                    imgElement.style.maxWidth = '100%'; // Limit image width if needed
                    document.getElementById('imagePreview').innerHTML = ''; // Clear previous preview
                    document.getElementById('imagePreview').appendChild(imgElement);
                }

                // Attach event listener to file input
                document.getElementById('imageFile').addEventListener('change', updateImagePreview);
            </script>
        </div>
    </section>
</main>

<footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">SoftKey Education</span>
                </a>
                <div class="footer-contact pt-3">
                    <p>3rd floor, Rajhans Annex Building, Gaondevi Road,</p>
                    <p>Opp. Gaondevi bus depo, Naupada, Thane (W)- 400 601</p>
                    <p class="mt-3"><strong>Phone:</strong> <span>1800 1202 20038</span></p>
                    <p><strong>Email:</strong> <span>info@softkeyeducation.com</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Universities</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Courses</h4>
                <ul>
                    <li><a href="#">B.Tech/CSE</a></li>
                    <li><a href="#">Post Graduate</a></li>
                    <li><a href="#">Under Graduate</a></li>
                    <li><a href="#">Diploma Courses</a></li>
                    <li><a href="#">Certifications Courses</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">SoftKey Education</strong>
            <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
    </div>
</footer>

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
this is my code for frontend
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities</title>
    <link href="admin_panel.css" rel="stylesheet">
</head>
<body>

<div class="sidebar">
    <a href="../admin_dashboard.php"><h2>Admin Dashboard</h2></a>
    <a href="universities.php">Universities</a>
    <a href="courses.php">Courses</a>
    <a href="Contact.php">Contact</a>
    <a href="logout.php" onclick="return confirmLogout()">Logout</a>
</div>

<div class="main-content">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <h2>Universities</h2>

    <h1>Add Universities</h1>
    <?php
    if (isset($_SESSION['uploadSuccess'])) {
        echo "<p style='color:green'>" . $_SESSION['uploadSuccess'] . "</p>";
        unset($_SESSION['uploadSuccess']);
    }
    if (isset($_SESSION['uploadError'])) {
        echo "<p style='color:red'>" . $_SESSION['uploadError'] . "</p>";
        unset($_SESSION['uploadError']);
    }
    ?>

    <form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
        <input type="file" name="imageFile" id="imageFile">
        <button type="submit" name="submit">Upload Image</button>
    </form>

    <h2>Uploaded Image Preview</h2>
    <div id="imagePreview">
        <?php
        if (isset($_SESSION['uploadedFile'])) {
            echo "<img src='" . htmlspecialchars($_SESSION['uploadedFile']) . "' style='max-width:100%'>";
        }
        ?>
    </div>

    <script>a
        // Function to update image preview on file selection
        function updateImagePreview(event) {
            var imageFile = event.target.files[0];
            var imageUrl = URL.createObjectURL(imageFile);
            var imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.style.maxWidth = '100%'; // Limit image width if needed
            document.getElementById('imagePreview').innerHTML = ''; // Clear previous preview
            document.getElementById('imagePreview').appendChild(imgElement);
        }

        // Attach event listener to file input
        document.getElementById('imageFile').addEventListener('change', updateImagePreview);
    </script>
</div>

<script>
    function confirmLogout() {
        return confirm('Are you sure you want to log out?');
    }
</script>

</body>
</html>