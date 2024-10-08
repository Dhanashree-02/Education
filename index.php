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
              /* Center slide text vertically */
              display: -webkit-box;
              display: -ms-flexbox;
              display: -webkit-flex;
              display: flex;
              -webkit-box-pack: center;
              -ms-flex-pack: center;
              -webkit-justify-content: center;
              justify-content: center;
              -webkit-box-align: center;
              -ms-flex-align: center;
              -webkit-align-items: center;
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
          <!-- <h1 class="sitename">SoftKey Education </h1> -->
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php" class="active">Home<br></a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="universities.php">Universities</a></li>
            <li><a href="courses.php">Cources</a></li>
            
            <li><a href="contact.html">Contact</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted" href="courses.php">Get Started</a>

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


<!-- Swiper -->
<section id="swiper" class="swiper section">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            $directory = "admin_panel/assets/slider/";
            $images = glob($directory . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

            if (count($images) > 0) {
                foreach ($images as $image) {
                    echo '<div class="swiper-slide"><img src="'. htmlspecialchars($image) .'" alt="Slider Image"></div>';
                }
            } else {
                echo "No images found in the slider directory.";
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- /Swiper -->

<script src="path/to/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<!-- /Swiper -->


      <!-- About Section -->
      <section id="about" class="about section">
        <div class="container">
          <div class="row gy-4">

            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
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

          <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <div class="why-box">
                <h3>Why Choose Us?</h3>
                <p><b>Use Testimonials:</b> Include testimonials from students and parents to build trust and credibility.<br>
                    <b>Highlight Achievements:</b>Mention any awards or recognitions your institution has received.<br>
                    <b>Visuals:</b> Use engaging visuals such as images and infographics to make the section more appealing.<br>
                    <b>Clear Call-to-Action:</b> End with a clear call-to-action, encouraging visitors to enroll or contact you for more information.
                </p>
                <div class="text-center">
                  <a href="#" class="more-btn"><span>Learn More</span> <i class="bi bi-chevron-right"></i></a>
                </div>
              </div>
            </div><!-- End Why Box -->

            <div class="col-lg-8 d-flex align-items-stretch">
              <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

                <div class="col-xl-4">
                  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-clipboard-data"></i>
                    <h4>Flexible Learning Options</h4>
                    <p>Online and Offline Modes</p>
                  <p> We offer both online and offline learning.</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-gem"></i>
                    <h4>Affordable and Accessible</h4>
                    <p>Competitive Pricing</p>
                    <p>We provide high-quality education at affordable prices to make learning accessible to everyone.</p>
                  </div>
                </div><!-- End Icon Box -->

                <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-inboxes"></i>
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

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #ffbb2c;"></i>
                <h3><a href="" class="stretched-link">POST GRADUATE COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #5578ff;"></i>
                <h3><a href="" class="stretched-link">UNDER GRADUATE COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #e80368;"></i>
                <h3><a href="" class="stretched-link">DIPLOMA COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #e361ff;"></i>
                <h3><a href="" class="stretched-link">DIPLOMA ENGINEERING</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #47aeff;"></i>
                <h3><a href="" class="stretched-link">MASTER COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #ffa76e;"></i>
                <h3><a href="" class="stretched-link">BACHELOR COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #11dbcf;"></i>
                <h3><a href="" class="stretched-link">CERTIFICATE COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #4233ff;"></i>
                <h3><a href="" class="stretched-link">P. G. DIPLOMA COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #b2904f;"></i>
                <h3><a href="" class="stretched-link">BACHELOR OF TECHNOLOGY</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #b20969;"></i>
                <h3><a href="" class="stretched-link">MASTER OF TECHNOLOGY</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #ff5828;"></i>
                <h3><a href="" class="stretched-link">CERTIFICATE COURSES</a></h3>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
              <div class="features-item">
                <i class="bi bi-mortarboard" style="color: #cc299b;"></i>
                <h3><a href="" class="stretched-link">Flavor Nivelanda</a></h3>
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
              <div class="course-item">
                <img src="assets/img/University1.jpg" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="category">https://arunodayauniversity.ac.in/</p>
                    <!-- <p class="price">$169</p> -->
                  </div>

                  <h3><a href="course-details.html">Arunodaya University</a></h3>
              
                </div>
              </div>
            </div> <!-- End Course Item-->

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
              <div class="course-item">
                <img src="assets/img/University2.jpg" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="category">https://ycmouoa.digitaluniversity.ac/</p>
                    <!-- <p class="price">$250</p> -->
                  </div>

                  <h3><a href="course-details.html">Yashwanthrao Chavan</a></h3>
                
                </div>
              </div>
            </div> <!-- End Course Item-->

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
              <div class="course-item">
                <img src="assets/img/University1.jpg" class="img-fluid" alt="...">
                <div class="course-content">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="category">https://singhaniauniversity.ac.in/</p>
                    <!-- <p class="price">$180</p> -->
                  </div>

                  <h3><a href="course-details.html">Singhania University</a></h3>
                  
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
            <a href="index.php" class="logo d-flex align-items-center">
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

    <!-- Add the necessary scripts at the end of the body -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="path/to/your/js/scripts.js"></script>

      <!-- Swiper JS -->
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

      <!-- Initialize Swiper -->
      <script>
          var swiper = new Swiper('.swiper-container', {
              loop: true,
              pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
              },
              navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
              },
          });
      </script>


  </body>

  </html>