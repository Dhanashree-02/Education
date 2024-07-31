<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <style>
    .swiper-container {
      width: 100%;
      height: 400px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      width: 100%;
      height: 500px;
      max-height: 300px;
      object-fit: cover;
    }
  </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home<br></a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="universities.php">Universities</a></li>
          <li><a href="courses.php">Courses</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="courses.php">Get Started</a>

    </div>
  </header>

  <main class="main">

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

    // Fetch slider images
    $sql = "SELECT image FROM slider";
    $result = $conn->query($sql);
    $images = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $images[] = $row["image"];
      }
    }
    $conn->close();
    ?>

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <?php if (!empty($images)): ?>
        <?php foreach ($images as $image): ?>
          <img src="assets/uploads/<?php echo htmlspecialchars($image); ?>" alt="Slider Image" data-aos="fade-in">
        <?php endforeach; ?>
      <?php else: ?>
        <img src="assets/img/hero-bg.jpg" alt="Default Hero Background" data-aos="fade-in">
      <?php endif; ?>

      <div class="container">
        <h2 data-aos="fade-up" data-aos-delay="100">Softkey Education Society,<br></h2>
        <p data-aos="fade-up" data-aos-delay="200">We offer distance education programs.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.html" class="btn-get-started">Get Started</a>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Swiper Section -->
    <section id="swiper" class="swiper section">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="assets/img/about.jpg" alt="Image 1"></div>
          <div class="swiper-slide"><img src="assets/img/about_us.jpg" alt="Image 2"></div>
          <div class="swiper-slide"><img src="assets/img/about-2.jpg" alt="Image 3"></div>
          <div class="swiper-slide"><img src="assets/img/course-1.jpg" alt="Image 4"></div>
          <div class="swiper-slide"><img src="assets/img/course-2.jpg" alt="Image 5"></div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            <h3>We offer an opportunity to overcome the constraints of distance & time.</h3>
            <p class="fst-italic">
              We let program-takers to plan their own schedule & choose subjects, topics, places to study.
              We offer flexibility in learning as students can read, listen or see the interactive and
              live lessons repeatedly until they comprehend them fully.
              We take pleasure in introducing our organization Softkey Education.
              Softkey was started in the year 1997 and established with the sole aim of nurturing the budding desire of aspiring students in the field of engineering and management.
              Softkey is Educational in content, Philanthropical in spirit, Scientific in temper and humanitarian in outlook.
            </p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Counts Section -->
    <section id="counts" class="section counts light-background">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Students</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
              <p>Courses</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p>Instructors</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Years of Experience</p>
            </div>
          </div><!-- End Stats Item -->

        </div>
      </div>
    </section><!-- End Counts Section -->

    <!-- Footer -->
    <footer id="footer" class="footer section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Softkey Education</h3>
            <p>
              Softkey is an education provider with a focus on distance education.<br><br>
              <strong>Phone:</strong> +1 234 567 890<br>
              <strong>Email:</strong> info@softkeyeducation.com<br>
              <strong>Website:</strong> www.softkeyeducation.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="universities.php">Universities</a></li>
              <li><a href="courses.php">Courses</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              1234 Street Name<br>
              City, State, 12345<br>
              Country<br>
              <strong>Phone:</strong> +1 234 567 890<br>
              <strong>Email:</strong> info@softkeyeducation.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter for the latest updates and offers.</p>
            <form action="#">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </footer>

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    const swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
    });
  </script>

  <!-- AOS Initialization -->
  <script>
    AOS.init();
  </script>

</body>

</html>
    