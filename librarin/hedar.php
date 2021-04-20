<?php
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
require_once '../dbcon.php';

session_start();

if (!isset($_SESSION['librarin_login'])){
    header('location:login.php');
}
$librarin_login = $_SESSION['librarin_login'];
$data = mysqli_query($con,"SELECT * FROM `librarin` WHERE `email`= '$librarin_login'");
$librarin_info = mysqli_fetch_assoc($data);
?>
<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library managment</title>

    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="../assets/javascripts/template-script.min.js"></script>
    <script src="../assets/javascripts/template-init.min.js"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <script src="../assets/vendor/toastr/toastr.min.js"></script>
    <!--morris chart-->
    <script src="../assets/vendor/chart-js/chart.min.js"></script>
    <!--Gallery with Magnific popup-->
    <script src="../assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!--dataTable-->
    <script src="../assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
    <!--Examples-->
    <script src="../assets/javascripts/examples/tables/data-tables.js"></script>
    <!--Examples-->
    <script src="../assets/javascripts/examples/dashboard.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                        <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--NOCITE HEADERBOX-->
                <div class="header-section hidden-xs" id="notice-headerbox">
                    <!--alerts notices-->
                    <div class="notice" id="alerts-notice">
                        <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>
                        <div class="dropdown-box basic">
                            <div class="drop-header">
                                <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                <span class="badge x-danger b-rounded">7</span>

                            </div>
                            <div class="drop-content">
                                <div class="widget-list list-left-element list-sm">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                <div class="text">
                                                    <span class="title">8 Bugs</span>
                                                    <span class="subtitle">reported today</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                <div class="text">
                                                    <span class="title">Error</span>
                                                    <span class="subtitle">sevidor C down</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                <div class="text">
                                                    <span class="title">New Configuration</span>
                                                    <span class="subtitle"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                <div class="text">
                                                    <span class="title">14 Task</span>
                                                    <span class="subtitle">completed</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                <div class="text">
                                                    <span class="title">21 Menssage</span>
                                                    <span class="subtitle"> (see more)</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="drop-footer">
                                <a>See all notifications</a>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                </div>
                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="../images/user.png"/>
                        </div>
                        <div class="user-info">
                            <span class="user-name"><?= ucwords($librarin_info ['fname'].' '.$librarin_info ['lname'])?></span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li> <a href=""><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php'? 'active-item':'' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>ড্যাশবোর্ড</span></a></li>
                                <li class="<?= $page == 'students.php'? 'active-item':'' ?>"><a href="students.php"><i class="fa fa-users" aria-hidden="true"></i><span>সদস্য</span></a></li>
                                <li class="has-child-item close-item <?= $page == 'add-book.php' ? 'open-item':'' ?><?= $page == 'manage-books.php' ? 'open-item':'' ?>">
                                    <a><i class="fa fa-book" aria-hidden="true"></i><span>বই সমূহ</span></a>
                                    <ul class="nav child-nav level-1" style="">
                                        <li class="<?= $page == 'add-book.php'? 'active-item':'' ?>"><a href="add-book.php">বই যুক্ত করুন</a></li>
                                        <li class="<?= $page == 'manage-books.php'? 'active-item':'' ?>"><a href="manage-books.php">বই সম্পাদন করুন</a></li>
                                    </ul>
                                </li>
                                <li class="<?= $page == 'book_order_list.php'? 'active-item':'' ?>"><a href="book_order_list.php"><i class="fa fa-book" aria-hidden="true"></i><span>অর্ডারকৃত বই</span></a></li>
                                <li class="<?= $page == 'issue-book.php'? 'active-item':'' ?>"><a href="issue-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>ইস্যুকৃত বই</span></a></li>
                                <li class="<?= $page == 'return-book.php'? 'active-item':'' ?>"><a href="return-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>ফেরতকৃত বই</span></a></li>
                                <li class="<?= $page == 'report.php'? 'active-item':'' ?>"><a href="report.php"><i class="fa fa-list" aria-hidden="true"></i><span>রিপোর্ট সমূহ</span></a></li>
                                <li class="<?= $page == 'change_password.php'? 'active-item':'' ?>"><a href="change_password.php">
                                    <i class="fa fa-key" aria-hidden="true"></i><span>পাসওয়ার্ড পরিবর্তন </span></a></li>
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
                <!-- CONTENT -->
                <!-- ========================================================= -->
                <div class="content">