<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Softkey Education</title>
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

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- jQuery and Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo.png" alt="">
        <!-- <h1 class="sitename">SoftKey Education </h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html"class="active">Home<br></a></li>
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
      <!-- Hero Section -->
      <!-- <section id="hero" class="hero section dark-background">

      <img src="assets/img/hero-bg.jpg" alt="" data-aos="fade-in">

      <div class="container">
       
        <h2 data-aos="fade-up" data-aos-delay="100"> Softkey Education Society,<br>
        </h2>
        <p data-aos="fade-up" data-aos-delay="200">We offer distance education programs.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="courses.php" class="btn-get-started">Get Started</a>
        </div>
      </div>

    </section>  -->
    <!-- /Hero Section -->
  
     <!-- Slider Section -->
       <section id="slider" class="slider section">
      <?php
        session_start();
        include 'Database.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT image_path FROM slider ORDER BY position ASC";
        $result = $conn->query($sql);
        $images = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $images[] = $row['image_path'];
            }
        } else {
            echo "<p>No images found in the database.</p>";
        }
        $conn->close();
      ?>
      <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php foreach ($images as $index => $image): ?>
              <li data-target="#myCarousel" data-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>"></li>
            <?php endforeach; ?>
          </ol>
          <div class="carousel-inner">
            <?php foreach ($images as $index => $image): ?>
              <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="<?php echo $image; ?>" alt="Slide <?php echo $index + 1; ?>" style="width:100%;">
              </div>
            <?php endforeach; ?>
          </div>
          <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>
    <!-- /Slider Section -->


  <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/About_us.jpg" class="img-fluid" alt="" style="border: 2px solid #000;" onmouseover="this.style.border='2px solid green';" onmouseout="this.style.border='2px solid #000';">
          </div>

          <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
            
            <h3>We offer an opportunity to overcome the constraints of distance & time. </h3>
            <p class="fst-italic">
              We let program-takers to plan their own schedule & choose subjects, topics, places to study.
               We offer flexibility in learning as students can read, listen or see the interactive and 
               live lessons repeatedly until they comprehend them fully.
               We take pleasure in introducing our organization Softkey Education. 
               Softkey was started in the year 1997 and established with the sole aim of nurturing the budding desire of aspiring students in the field of engineering and management.
               Softkey is Educational in content, Philanthropical in spirit, Scientific in temper and humanitatian in outlook.
            </p>
           
            <a href="about.html" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
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
              <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
              <p>Events</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
              <p>Universities</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Counts Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us">

      <div class="container">

        <div class="row gy-4" >

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100" >
            <div class="why-box" >
              <h3>Why Choose Us?</h3>
              <p>
                    <b>Use Testimonials:</b> Include testimonials from students and parents to build trust and credibility.<br>
                    <b>Highlight Achievements:</b>Mention any awards or recognitions your institution has received.<br>
                    <b>Visuals:</b> Use engaging visuals such as images and infographics to make the section more appealing.<br>
                    <b>Clear Call-to-Action:</b> End with a clear call-to-action, encouraging visitors to enroll or contact you for more information.
              </p>
              <div class="text-center">
                <a href="about.html" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

              <div class="col-xl-4">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center" style="border-color: black;">
                  <i class="bi bi-card-list"></i>
                  <h4>Flexible Learning Options</h4>
                  <p>Online and Offline Modes</p>
                 <p> We offer both online and offline learning options.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center" style="border-color: black;">
                  <i class="bi bi-currency-rupee"></i>
                  <h4>Affordable and Accessible</h4>
                  <p>Competitive Pricing</p>
                  <p>We provide high-quality education at affordable prices to make learning accessible to everyone.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center" style="border-color: black;">
                  <i class="bi bi-file-check"></i>
                  <h4>Student-Centric Approach</h4>
                  <p>Supportive Community</p>
                  <p>We foster a supportive and inclusive community where every student is encouraged to thrive.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Why Us Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Courses</h2>
        <p>Popular Courses</p>
      </div><!-- End Section Title -->

      <div class="container" >

        <div class="row gy-4">

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="features-item" style="border-color: black;  border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #ffbb2c;"></i>
              <h3><a href="courses.php" class="stretched-link">POST GRADUATE COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #5578ff;"></i>
              <h3><a href="courses.php" class="stretched-link">UNDER GRADUATE COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #e80368;"></i>
              <h3><a href="courses.php" class="stretched-link">DIPLOMA COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #e361ff;"></i>
              <h3><a href="courses.php" class="stretched-link">DIPLOMA ENGINEERING</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #47aeff;"></i>
                <h3><a href="courses.php" class="stretched-link">MASTER COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #ffa76e;"></i>
                <h3><a href="courses.php" class="stretched-link">BACHELOR COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #11dbcf;"></i>
                <h3><a href="courses.php" class="stretched-link">CERTIFICATE COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #4233ff;"></i>
                <h3><a href="courses.php" class="stretched-link">P. G. DIPLOMA COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #b2904f;"></i>
                <h3><a href="courses.php" class="stretched-link">BACHELOR OF TECHNOLOGY</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #b20969;"></i>
                <h3><a href="courses.php" class="stretched-link">MASTER OF TECHNOLOGY</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #ff5828;"></i>
                <h3><a href="courses.php" class="stretched-link">CERTIFICATE COURSES</a></h3>
            </div>
          </div><!-- End Feature Item -->

          <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
            <div class="features-item" style="border-color: black; border-radius: 10px;">
              <i class="bi bi-mortarboard" style="color: #cc299b;"></i>
                <h3><a href="courses.php" class="stretched-link">Flavor Nivelanda</a></h3>
            </div>
          </div><!-- End Feature Item -->

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Universities</h2>
        <p>Popular Universities</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="course-item" style="border-color: black;">
              <img src="assets/img/University1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">https://arunodayauniversity.ac.in/</p>
                  <!-- <p class="price">$169</p> -->
                </div>

                <h3><a href="https://arunodayauniversity.ac.in/">Arunodaya University</a></h3>
                
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="course-item"style="border-color: black;">
              <img src="assets/img/University2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">https://ycmouoa.digitaluniversity.ac/</p>
                  <!-- <p class="price">$250</p> -->
                </div>

                <h3><a href="https://ycmouoa.digitaluniversity.ac/">Yashwanthrao Chavan</a></h3>
                
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="course-item"style="border-color: black;">
              <img src="assets/img/University1.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">https://singhaniauniversity.ac.in/</p>
                  <!-- <p class="price">$180</p> -->
                </div>

                <h3><a href="https://singhaniauniversity.ac.in/">Singhania University</a></h3>
              
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>

      </div>

    </section><!-- /Courses Section -->

   

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
            <a href=""><i class="bi bi-twitter-x"></i></a>
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
            <li><a href="#">Post Graduate </a></li>
            <li><a href="#">Under Graduate</a></li>
            <li><a href="#">Diploma Courses</a></li>
            <li><a href="#">Certifications Cources</a></li>
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
      
      </div>
    </div>

  </footer>

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
  
  <!-- Bootstrap script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>