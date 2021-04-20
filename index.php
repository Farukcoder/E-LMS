<?php
require_once 'dbcon.php';
session_start();

//if (!isset( $_SESSION['student_name'])) {
//  header('location:sign-in.php');
//}


//$data = mysqli_query($con,"SELECT * FROM `students` WHERE `email`='$students_login'");
//$students_info = mysqli_fetch_assoc($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1, shrink-to-fit=no"
  />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>E-Library</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <!-- font awsome-->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <style>
    #userlog {
      position: relative;
      left: 88px;
      bottom: 29px;
    }
    .user_login {
      position: relative;
      left: 86px;
      bottom: -19px;
    }
    .navbar-expand-lg .navbar-nav .dropdown-menu {
      position: absolute;
      top: 95px;
    }
  </style>

</head>

<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
       <!--  <div class="search_input" id="search_input_box">
          <div class="container">
            <form class="d-flex justify-content-between" method="" action="">
              <input
                type="text"
                class="form-control"
                id="search_input"
                placeholder="Search Here"
              />
              <button type="submit" class="btn"></button>
              <span
                class="ti-close"
                id="close_search"
                title="Close Search"
              ></span>
            </form>
          </div>
        </div> -->

        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.php">
              <h3 class="text-danger">E-Library</h3>
            </a>
            <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div
          class="collapse navbar-collapse offset"
          id="navbarSupportedContent"
          >
          <ul class="nav navbar-nav menu_nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about-us.html">About</a>
            </li>
            <li class="nav-item submenu dropdown">
              <a
              href="#"
              class="nav-link dropdown-toggle"
              data-toggle="dropdown"
              role="button"
              aria-haspopup="true"
              aria-expanded="false"
              >Pages</a
              >
              <ul class="dropdown-menu">
                <li class="nav-item">
                  <a class="nav-link" href="courses.html">Sponsor a Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="course-details.html"
                  >Add Book</a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="elements.html">My Reading Log</a>
                </li>
              </ul>
            </li>
            <li class="nav-item submenu dropdown">
              <a
              href="#"
              class="nav-link dropdown-toggle"
              data-toggle="dropdown"
              role="button"
              aria-haspopup="true"
              aria-expanded="false"
              >Blog</a
              >
              <ul class="dropdown-menu">
                <li class="nav-item">
                  <a class="nav-link" href="blog.html">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="single-blog.html"
                  >Blog Details</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <!--USER HEADERBOX -->
            <?php if (isset($_SESSION['logged_in'])):?>
              <nav class="navbar-nav ml-auto" id="userlog">
                <li class="nav-item dropdown no-arrow show">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="position: relative;top: 26px;">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=isset($_SESSION['student_name'])? $_SESSION['student_name']:''?></span>
                    <img class="img-profile rounded-circle" src="images/user.png" width="50" height="50">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="Logout.php">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>
              </nav>
              <!--                    <div class="user-info fa fa-user">-->
                <!--                        <span class="user-name">--><?//= ucwords($students_info ['fname'].' '.$students_info ['lname'])?><!--</span>-->
                <!--                    </div>-->
                <?php else:?>
                  <div class="user_login">
                    <a href="sign-in.php" class="btn btn-primary">login</a>
                    <a href="register.php" class="btn btn-danger">Sign up</a>
                  </div>
                <?php endif;?>
                <div class="user-options dropdown-box">
                  <div class="drop-content basic">
                    <!--                        <ul>-->
                      <!--                            <li> <a href="Logout.php"><i class="fa fa-sign-out log-out" aria-hidden="true"></i> Logout</a></li>-->
                      <!--                        </ul>-->
                    </div>
                  </div>
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <!--================ End Header Menu Area =================-->

      <!--================ Start Home Banner Area =================-->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active" style="margin-top: 80px; margin-bottom: 80px">
            <img class="d-block w-100" src="images/photo-1507842217343-583bb7270b66.jpg" alt="First slide" style="height: 400px; width: 100%">
          </div>
          <div class="carousel-item" style="margin-top: 80px; margin-bottom: 80px">
            <img class="d-block w-100" src="images/photo-1524995997946-a1c2e315a42f.jpg" alt="Second slide" style="height: 400px; width: 100%">
          </div>
          <div class="carousel-item" style="margin-top: 80px; margin-bottom: 80px">
            <img class="d-block w-100" src="images/book-library-with-open-textbook_1150-5920.jpg" alt="Third slide" style="height: 400px; width: 100%">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!--================ End Home Banner Area =================-->



      <!--================ Start Popular Courses Area =================-->
      <div class="popular_courses">
        <div class="container" style="margin-top: 50px">
          <div class="row">
            <!-- single course -->
            <div class="row animated fadeInUp">
              <?php
              if (isset($_POST['books'])){
                $result = $_POST['result' ];
                ?>   <div class="col-sm-12">
                  <div class="panel">
                    <div class="panel-content">
                      <div class="row" style="margin-top: 16px">
                        <?php
                        $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_name`LIKE '%$result%'");
                        $temp = mysqli_num_rows($result);
                        if ($temp > 0 ){?>
                          <?php
                          while ($row = mysqli_fetch_assoc($result)){?>

                            <div class="col-sm-12 col-md-8">
                              <img style="width: 150px; height: 210px" src="images/books/<?= $row['book_image']?>" alt="" width="150px" height="210px">
                              <h3><?= $row['book_name']?></h3>
                              <span style="text-align: center;"><b>Available: <?= $row['available_qty']?></b></span>
                            </div>
                            <?php
                          }
                          ?>
                        <?php }else{
                          echo "<h1 style='text-align: center'>Books Not Found!</h1>";
                        }?>
                      </div>
                    </div>
                  </div>
                </div>
                <?php

              }else{
                ?>
                <div class="col-sm-12">
                  <?php
                  $query = "SELECT * FROM catagory";
                  $result = mysqli_query($con, $query);
                  while ($obj = mysqli_fetch_object($result)) { ?>
                    <div class="panel">
                     <h2><?=$obj->name;?></h2>
                     <div class="panel-content">
                      <div class="row">
                        <?php
                        $catagory_id =$obj->id;
                        $bresult = mysqli_query($con, "SELECT * FROM books WHERE category_id = $catagory_id");
                        while ($srow = mysqli_fetch_assoc($bresult)){?>
                          <div class="" style="width: 250px; margin-right: 20px; margin-bottom: 51px; margin-left: 20px">
                            <div class="single_course">
                              <div class="course_head" style="height: 304px;">
                                <a href="single_book_details.php?id=<?=$srow['id']?>">
                                  <img class="" style="height: 301px; width: 250px" src="images/books/<?= $srow['book_image']?>" alt=""></a>
                                </div>
                                <div class="course_content">
                                  <a href="single_book_details.php?id=<?=$srow['id']?>"></a>
                                  <h5 class="text-center">
                                    <p><?= $srow['book_name']?></p>
                                    <br>
                                    <span class="text-warning">Available: <?= $srow['available_qty']?></span>
                                  </h5>
                                </div>
                              </div>
                            </div>
                            <?php
                          }
                          ?>
                        </div>
                      </div>
                    </div> 
                  <?php    }

                  

                  ?>

                </div>
                <?php
              }
              ?>

            </div>
          </div>
        </div>
      </div>
      <!--================ End Popular Courses Area =================-->

      <!--================ Start footer Area  =================-->
      <footer class="footer-area">
        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
          <div class="thumb d-flex justify-content-sm-center">
            <img style="margin-top: 30px" class="img-fluid" src="images/dc.png " alt="" width="180px" height="160px">
          </div>
          <div style="position: relative;top: -146px; left: 297px; color: wheat;">
            <div class="mb-4">
              <p><b>পরিকল্পনা ও বাস্তবায়নে : </b></p>
              <p class="designation">সৈয়দা ফারহানা কাউনাইন</p>
              <p>
                জেলা প্রশাসক ও বিজ্ঞ ম্যাজিস্ট্রেট,নরসিংদী
              </p>
            </div>
          </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between">
          <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <i class="ti-heart" aria-hidden="true"></i> by <a href="https://www.innovationit.com.bd/" target="_blank">Innovation IT</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
          <div class="col-lg-4 col-sm-12 footer-social">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-dribbble"></i></a>
            <a href="#"><i class="ti-linkedin"></i></a>
          </div>
        </div>
      </footer>
      <!--================ End footer Area  =================-->

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
      <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
      <script src="js/owl-carousel-thumb.min.js"></script>
      <script src="js/jquery.ajaxchimp.min.js"></script>
      <script src="js/mail-script.js"></script>
      <!--gmaps Js-->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
      <script src="js/gmaps.min.js"></script>
      <script src="js/theme.js"></script>
    </body>
    </html>
