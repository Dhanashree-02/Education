  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - SoftKey Education</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

  </head>

  <body class="index-page">


  <header id="header" class="header d-flex align-items-center sticky-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <!-- Logo Section -->
    <a href="index.php" class="logo d-flex align-items-center">
      <img src="assets/img/Glogo.png" alt="Logo" class="logo-img">
      GLOGO
    </a>

    <!-- Navigation Menu -->
    <nav id="navmenu" class="navmenu">
      <ul class="nav-list d-flex align-items-center">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="index.php">About</a></li>
        <li><a href="index.php">
        Schedule Site Visit</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" id="dropdownMenuLink">Cities</a>
          <ul class="dropdown-menu">
            <li><a href="index.php">Pune</a></li>
            <li><a href="index.php">Mumbai</a></li>
            <li><a href="index.php">Banglore</a></li>
      
          </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none fas fa-bars"></i>
    </nav>

    <!-- Get Started Button -->
    <a class="btn-getstarted" href="courses.php">+91-6364884021</a>

  </div>
</header>

    <main class="main">
          
          <?php
      require 'Database.php';

      // Create a new instance of your database connection
      $db = new Database();
      $conn = $db->getConnection();

      // Fetch the latest image URL from the swiper_images table
      $query = "SELECT image_url FROM Bg_img ORDER BY id DESC LIMIT 1";
      $result = $conn->query($query);

      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $latestImage = $row['image_url'];
      } else {
          $latestImage = null; // No images found
      }
      ?>

      <!-- Hero Section -->
      <section id="hero" class="hero section dark-background">
          <?php if (!empty($latestImage)): ?>
              <img src="<?php echo $latestImage; ?>" alt="Hero Background" data-aos="fade-in">
          <?php else: ?>
              <img src="assets/img/Godrej/p1.jpeg" alt="Default Hero Background" data-aos="fade-in">
          <?php endif; ?>
          
          <div class="container">
              <h2 data-aos="fade-up" data-aos-delay="100">Buy Godrej properties In Pune<br></h2>
              <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                  <a href="courses.html" class="btn-get-started">Get Started</a>
              </div>
          </div>
      </section><!-- /Hero Section -->

              
        <section id="universities" class="universities-section section">
     <div class="container">
      <div class="row">
        
        <!-- Left Scrollable Section -->
        <section id="universities" class="universities-section section">
  <div class="container">
    <div class="row">
      <!-- Left Scrollable Section -->
      <div class="col-lg-8 scrollable-section" style="overflow-y: auto; max-height: 100vh;">
        <div class="section-title mb-4" data-aos="fade-up">
          <h2>Universities</h2>
          <p>Popular Universities</p>
        </div>

        <!-- University Card 1 -->
        <div class="row mb-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-md-6">
            <div class="card h-100">
              <img src="assets/img/University1.jpg" class="card-img-top" alt="Arunodaya University">
              <div class="card-body">
                <h5 class="card-title"><a href="https://arunodayauniversity.ac.in/" target="_blank">Arunodaya University</a></h5>
                <p class="card-text">Explore more about Arunodaya University and its programs.</p>
                <a href="https://arunodayauniversity.ac.in/" target="_blank" class="btn btn-primary w-100">View Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="university-info">
              <h5>About Arunodaya University</h5>
              <p>Arunodaya University offers a wide range of undergraduate and postgraduate programs, providing opportunities for students to excel in various fields. It focuses on academic excellence and holistic development.</p>
              <ul>
                <li>Programs Offered: Engineering, Arts, Science, Management</li>
                <li>Location: City, State</li>
                <li>Accreditation: NAAC A+</li>
                <li>Contact: +1234567890</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- University Card 2 -->
        <div class="row mb-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="col-md-6">
            <div class="card h-100">
              <img src="assets/img/University2.jpg" class="card-img-top" alt="Yashwanthrao Chavan">
              <div class="card-body">
                <h5 class="card-title"><a href="https://ycmouoa.digitaluniversity.ac/" target="_blank">Yashwanthrao Chavan</a></h5>
                <p class="card-text">Discover programs and opportunities at Yashwanthrao Chavan University.</p>
                <a href="https://ycmouoa.digitaluniversity.ac/" target="_blank" class="btn btn-primary w-100">View Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="university-info">
              <h5>About Yashwanthrao Chavan University</h5>
              <p>Yashwanthrao Chavan University provides high-quality education with a focus on research and innovation. The university offers a variety of programs to suit different student needs.</p>
              <ul>
                <li>Programs Offered: Humanities, Social Sciences, Engineering</li>
                <li>Location: City, State</li>
                <li>Accreditation: NAAC A</li>
                <li>Contact: +9876543210</li>
              </ul>
            </div>
          </div>
        </div>

        <!-- University Card 3 -->
        <div class="row mb-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="col-md-6">
            <div class="card h-100">
              <img src="assets/img/University3.jpg" class="card-img-top" alt="Singhania University">
              <div class="card-body">
                <h5 class="card-title"><a href="https://singhaniauniversity.ac.in/" target="_blank">Singhania University</a></h5>
                <p class="card-text">Learn more about Singhania University's programs and opportunities.</p>
                <a href="https://singhaniauniversity.ac.in/" target="_blank" class="btn btn-primary w-100">View Details</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="university-info">
              <h5>About Singhania University</h5>
              <p>Singhania University is a reputed institution offering top-notch education in various fields. The university focuses on creating a strong foundation for the students through its extensive research facilities and industry collaborations.</p>
              <ul>
                <li>Programs Offered: Business, Technology, Medicine</li>
                <li>Location: City, State</li>
                <li>Accreditation: NAAC B+</li>
                <li>Contact: +1122334455</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Fixed Section -->
      <div class="col-lg-4 fixed-section">
        <div class="sticky-top" style="top: 80px; z-index: 1030;"> <!-- Adjusted top value -->
          <h3>Contact Us</h3>
          <p>Get in touch with us for more information about our universities and programs.</p>
          <form action="process_contact_form.php" method="post" class="mt-4">
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Your Message</label>
              <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message here..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>            
      </div>
    </div>
  </section>


    </main>

    <!-- Footer -->

    <footer id="footer" class="footer position-relative light-background py-5">
  <div class="container footer-top">
    <div class="row gy-4">
      
      <!-- About Section -->
      <div class="col-lg-4 col-md-6 footer-about">
        <a href="index.php" class="logo d-flex align-items-center mb-3">
          <span class="sitename fw-bold text-dark">SoftKey Education</span>
        </a>
        <p>3rd floor, Rajhans Annex Building, Gaondevi Road,</p>
        <p>Opp. Gaondevi bus depot, Naupada, Thane (W)- 400 601</p>
        <p class="mt-3">
          <strong>Phone:</strong> <a href="tel:1800120220038" class="text-dark">1800 1202 20038</a><br>
          <strong>Email:</strong> <a href="mailto:info@softkeyeducation.com" class="text-dark">info@softkeyeducation.com</a>
        </p>
        <div class="social-links d-flex mt-4">
          <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
          <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
          <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
      
      <!-- Useful Links -->
      <div class="col-lg-2 col-md-3 footer-links">
        <h4 class="fw-bold">Useful Links</h4>
        <ul class="list-unstyled">
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact US</a></li>
          <li><a href="#">Schedule Site Visit</a></li>
        </ul>
      </div>
      
      

  <!-- Footer Bottom -->
  <div class="container text-center mt-4">
    <p>
      © <strong class="sitename">SoftKey Education</strong>. All Rights Reserved.
    </p>
  </div>
</footer>

<!-- /Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <!-- Add the necessary scripts at the end of the body -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="path/to/your/js/scripts.js"></script>

      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
</script>



  </body>

  </html>