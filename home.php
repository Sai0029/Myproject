<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
 
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title> CodeWise </title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <link href="css/style.css" rel="stylesheet" />

  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    /* Basic styles for the dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>

</head>

<body>

  <div class="hero_area">

    <div class="hero_bg_box">
      <div class="bg_img_box">
        <img src="images/hero-bg.png" alt="">
      </div>
    </div>

    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              CodeWise
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about_section"> About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#service_section">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#team_section">Team</a>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link" href="#" id="dropdown"> <i class="fa fa-user" aria-hidden="true"></i> Login</a>
                    <div class="dropdown-content">
                        <a href="stu_login.php">Student</a>
                        <a href="adminlogin.php">Admin</a>
                    </div>
                </div>
            </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>

    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6 ">
                  <div class="detail-box">
                    <h1>
                      Code 
                      wise
                    </h1>
                    <p>
                      Discover a world of learning at our online platform. Explore our diverse range of courses, designed to spark your curiosity and deepen your knowledge. Whether you're preparing for exams or seeking to enhance your skills, our platform offers a flexible and engaging learning experience. With detailed reports to track your progress, you can see your growth every step of the way. Join us and embark on a journey of discovery and achievement. Your learning adventure starts here.
                    </p>
                    <div class="btn-box">
                      <a href="about.html" class="btn1">
                        Read More
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/carosle.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
  </div>

  <section id="service_section" class="service_section layout_padding">
    <div class="service_container">
      <div class="container ">
        <div class="heading_container heading_center">
          <h2>
            Our <span>Services</span>
          </h2>
        </div>
        <div class="row">
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/courses.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Courses
                </h5>
                <p>
                  We provide a friendly platform for students to learn programming languages and practice coding through interactive courses and projects
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/s2.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Exams
                </h5>
                <p>
                  We offer personalized exams on our online platform, allowing students to assess and enhance their programming proficiency across various languages.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="box ">
              <div class="img-box">
                <img src="images/s3.png" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Reports
                </h5>
                <p>
                  We provide detailed progress reports on our online platform, enabling students to track their performances.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="about_section" class="about_section layout_padding">
    <div class="container  ">
      <div class="heading_container heading_center">
        <h2>
          About <span>Us</span>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/aboutus.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <h3>
              We Are CodeWise
            </h3>
            <p>
              Welcome to our online learning platform, where knowledge meets innovation! We offer a dynamic range of courses designed to ignite your curiosity and expand your horizons. From in-depth courses to comprehensive exams, our platform empowers you to learn at your own pace and on your own terms. Dive into a world of limitless possibilities, where learning is not just a journey, but a transformative experience. Join us today and embark on a path to success, where every milestone is celebrated and every achievement is recognized. With our detailed reports, track your progress and see your growth firsthand. Your future begins here, with us.
            </p>
            
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="team_section" class="team_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container heading_center">
        <h2 class="">
          Our <span> Team</span>
        </h2>
      </div>

      <div class="team_container">
        <div class="row">
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Abhirama Sarma
                </h5>
                <p>
                  UI/UX Desiger
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Sai Krishna
                </h5>
                <p>
                  Full Stack Developer
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pagidi Naresh
                </h5>
                <p>
                  Python Developer
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="box ">
              <div class="img-box">
                <img src="" class="img1" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  John Dhinakar
                </h5>
                <p>
                  Support Engineer
                </p>
              </div>
              <div class="social_box">
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="#">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call 0000000000
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  codewise@gmail.com
                </span>
              </a>
            </div>
          </div>
          </div>
        <div class="col-md-6 col-lg-3 info_col">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              Let us colloborate and work together.
            </p>
          </div>
        </div>
        <div class="col-md-6 col-lg-2 mx-auto info_col">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="index.html">
                Home
              </a>
              <a class="" href="#about_section">
                About
              </a>
              <a class="" href="#service_section">
                Services
              </a>
              <a class="" href="#team_section">
                Team
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <section class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Narayana Engineering College</a>
      </p>
    </div>
  </section>
  <!-- footer section -->

  <!-- jQery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      // Smooth scroll to anchor links
      $('a[href^="#"]').on('click', function(event) {
        var target = $(this.getAttribute('href'));
        if( target.length ) {
          event.preventDefault();
          $('html, body').stop().animate({
            scrollTop: target.offset().top
          }, 1000);
        }
      });
    });
  </script>
</body>

</html>