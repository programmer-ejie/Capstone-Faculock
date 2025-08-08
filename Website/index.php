<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>FacuLock</title>
  
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/png" href="template/auth/assets/images/logos/seodashlogo.png" />
  <link href="template/landingpage/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="template/landingpage/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="template/landingpage/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="template/landingpage/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="template/landingpage/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="template/landingpage/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="template/landingpage/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
        <i class="fas fa-lock me-2" style = "font-size: 30px;"></i> <!-- Lock icon with right margin -->
        <h1 class="sitename"><b style="font-weight: bolder;">Faculock</b></h1>
        </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home<br></a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#team">Team</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="auth/register.php">Signup</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="auth/login.php">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="template/landingpage/assets/img/hero-bg-abstract.jpg" alt="" data-aos="fade-in" class="">

      <div class="container">
  <div class="row justify-content-center" data-aos="zoom-out">
    <div class="col-xl-7 col-lg-9 text-center">
      <h1>FacuLock: Scheduled Facial Entry System for Educators</h1>
      <p>An intelligent facial recognition system that validates scheduled entries of teachers using real-time camera access and timetable data.</p>
    </div>
  </div>

  <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
    <a href="#about" class="btn-get-started">Get Started</a>
  </div>

  <div class="row gy-4 mt-5">
    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="100">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-camera-video"></i></div>
        <h4 class="title"><a href="">Live Facial Recognition</a></h4>
        <p class="description">Capture and verify teacher identities at the door using an ESP32-CAM with real-time face recognition.</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="200">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-calendar-check"></i></div>
        <h4 class="title"><a href="">Schedule-Based Access</a></h4>
        <p class="description">Grants entry only if the recognized teacher has a scheduled class during the scanned time slot.</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="300">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-door-closed"></i></div>
        <h4 class="title"><a href="">Automated Door Control</a></h4>
        <p class="description">Secure access control by automatically unlocking the door when valid recognition and schedule match occurs.</p>
      </div>
    </div><!--End Icon Box -->

    <div class="col-md-6 col-lg-3" data-aos="zoom-out" data-aos-delay="400">
      <div class="icon-box">
        <div class="icon"><i class="bi bi-bar-chart-line"></i></div>
        <h4 class="title"><a href="">Logging & Monitoring</a></h4>
        <p class="description">Track entries with timestamped logs to monitor teacher attendance and door access history.</p>
      </div>
    </div><!--End Icon Box -->

  </div>
</div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>About FacuLock<br></h2>
  <p>Enhancing school security through intelligent facial recognition and schedule-aware access control.</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
      <p>
        FacuLock is a smart facial entry system designed to automate and secure classroom access for educators. 
        Using ESP32-CAM for facial recognition and a synced scheduling system, it ensures only authorized teachers 
        gain entry during their scheduled class times.
      </p>
      <ul>
        <li><i class="bi bi-check2-circle"></i> <span>Real-time face recognition using ESP32-CAM at the classroom door.</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Schedule validation to ensure access only during class hours.</span></li>
        <li><i class="bi bi-check2-circle"></i> <span>Web-based portal for managing teachers, schedules, and logs.</span></li>
      </ul>
    </div>

    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
      <p>
        By combining smart hardware and a web-based control system, FacuLock provides an efficient, hands-free way 
        to manage room access for school personnel. It promotes accountability, reduces unauthorized entry, 
        and improves security across academic environments.
      </p>
      <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
    </div>

  </div>

</div>

</section><!-- /About Section -->


<style>
  .testimonial-item {
  background: #f9f9f9;
  border-radius: 12px;
  padding: 20px;
  height: 10%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  text-align: center;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  min-height: 350px; /* consistent height */
}

.testimonial-img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  margin: 15px auto;
}

.testimonial-item p {
  flex-grow: 1;
  margin-bottom: 20px;
  font-style: italic;
}

</style>
<section id="testimonials" class="testimonials section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>We are students from Southern Leyte State University - Bachelor of Science in Information Technology</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            Passionate about coding and bringing creative ideas to life through technology. I believe in continuous learning and pushing boundaries to develop innovative solutions that improve lives.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Ejie Florida">
          <h3>Ejie Florida</h3>
          <h4>IT Student</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            Driven by curiosity and a love for software development and innovation. I enjoy collaborating with teams and finding efficient ways to solve real-world problems through code.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Mary Ann Paulin">
          <h3>Mary Ann Paulin</h3>
          <h4>IT Student</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            I enjoy designing user-friendly applications that make life easier. My goal is to create intuitive systems that enhance the user experience and bring efficiency to everyday tasks.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Athena Joy Campania">
          <h3>Athena Joy Campania</h3>
          <h4>IT Student</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            Learning new technologies is my passion, and I love solving real-world problems with code. I am constantly inspired to build applications that address practical challenges in modern society.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Claire Sacro">
          <h3>Claire Sacro</h3>
          <h4>IT Student</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            Technology inspires me to create tools that make a positive impact. I aspire to use my skills to develop platforms that bring people together and improve productivity in daily life.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Michael Coton">
          <h3>Michael Coton</h3>
          <h4>IT Student</h4>
        </div>
      </div>

      <div class="col-md-4">
        <div class="testimonial-item">
          <p><i class="bi bi-quote quote-icon-left"></i>
            I love collaborating on tech projects and constantly learning new skills. Through teamwork and perseverance, I aim to contribute to systems that bring meaningful change.
            <i class="bi bi-quote quote-icon-right"></i></p>
          <img src="images/default.jpeg" class="testimonial-img" alt="Lalaine Melgazo">
          <h3>Lalaine Melgazo</h3>
          <h4>IT Student</h4>
        </div>
      </div>

    </div>
  </div>
</section>


 <!-- Services Section -->
<section id="services" class="services section light-background">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Our Services</h2>
  <p>We provide innovative solutions to help businesses thrive in the digital age.</p>
</div><!-- End Section Title -->

<div class="container">

  <div class="row gy-4">

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
      <div class="service-item item-cyan position-relative">
        <div class="icon">
          <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
          </svg>
          <i class="bi bi-activity"></i>
        </div>
        <a href="service-details.html" class="stretched-link">
          <h3>Innovative Software Development</h3>
        </a>
        <p>We design and build cutting-edge software that helps businesses scale with efficiency, addressing unique challenges with tailored solutions.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
      <div class="service-item item-orange position-relative">
        <div class="icon">
          <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
          </svg>
          <i class="bi bi-broadcast"></i>
        </div>
        <a href="service-details.html" class="stretched-link">
          <h3>Digital Marketing Solutions</h3>
        </a>
        <p>We provide results-driven digital marketing strategies to enhance your brand visibility, reach a broader audience, and drive conversions.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
      <div class="service-item item-teal position-relative">
        <div class="icon">
          <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
          </svg>
          <i class="bi bi-easel"></i>
        </div>
        <a href="service-details.html" class="stretched-link">
          <h3>Web and Mobile Development</h3>
        </a>
        <p>We create intuitive and responsive websites and mobile apps that engage users and deliver seamless experiences across devices.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
      <div class="service-item item-red position-relative">
        <div class="icon">
          <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
          </svg>
          <i class="bi bi-bounding-box-circles"></i>
        </div>
        <a href="service-details.html" class="stretched-link">
          <h3>IT Consulting & Strategy</h3>
        </a>
        <p>Our expert consultants provide strategic guidance to help you implement the latest technologies and optimize your IT infrastructure.</p>
      </div>
    </div><!-- End Service Item -->

    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
      <div class="service-item item-indigo position-relative">
        <div class="icon">
          <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027383,467.4216267010615,453.0427554965189C506.632075302376,415.099784256374,533.1950919963209,365.4582131832919,499.3393401357449,305.28827198207846C465.38568460148656,246.28117938164004,391.6065825851368,212.41023014705677,358.75912682555445,170.46987666422756C325.7392970226013,128.6950323487626,272.44156952700666,82.33244672256669,216.92568206484644,118.57837068929958C157.61548132107366,151.50222959582333,137.0903088042708,206.33756792373964,122.84540709824493,270.55976744009307C109.14203911981524,330.5896785985542,96.12170946094716,406.74062886548283,144.10674811248734,452.53134186870446C190.83327523498424,497.4532393677841,230.50034922902272,531.7971956346363,300,532.3542879108572"></path>
          </svg>
          <i class="bi bi-pie-chart"></i>
        </div>
        <a href="service-details.html" class="stretched-link">
          <h3>Data Analytics and Insights</h3>
        </a>
        <p>We analyze your business data to uncover actionable insights that help you make informed decisions and optimize processes.</p>
      </div>
    </div><!-- End Service Item -->

  </div><!-- End Service Items Row -->

</div><!-- End Container -->
</section><!-- End Services Section -->

</section>




  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="template/landingpage/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="template/landingpage/assets/vendor/php-email-form/validate.js"></script>
  <script src="template/landingpage/assets/vendor/aos/aos.js"></script>
  <script src="template/landingpage/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="template/landingpage/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="template/landingpage/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="template/landingpage/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="template/landingpage/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="template/landingpage/assets/js/main.js"></script>

</body>

</html>