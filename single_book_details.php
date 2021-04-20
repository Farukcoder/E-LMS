<?php
require_once 'dbcon.php';
session_start();
$id = $_GET['id'];
$result = mysqli_query($con, "SELECT * FROM books Where id = $id ");


if(mysqli_affected_rows($con) > 0){
    $row = mysqli_fetch_assoc($result);
    ?>

    <html lang="en" class="fixed left-sidebar-top">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Library managment</title>

        <!--load progress bar-->
        <script src="assets/vendor/pace/pace.min.js"></script>
        <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

        <!--BASIC css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
        <link rel="stylesheet" href="fontawesome-free/css/all.min.css">

        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--Notification msj-->
        <link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
        <!--Magnific popup-->
        <link rel="stylesheet" href="assets/vendor/magnific-popup/magnific-popup.css">
        <!--dataTable-->
        <link rel="stylesheet" href="assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
        <!--TEMPLATE css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="assets/stylesheets/css/style.css">


    </head>
    <body>
     <div class="card card-solid">
         <div class="card-body">
           <div class="row">
              <div class="col-12 col-sm-6">
                <div class="col-12 col-sm-6">
                    <img style="margin-left: 100px; margin-top:20px;  width: 400px; height: 500px"  src="images/books/<?=$row['book_image'];?>" alt="">
                </div>

            </div>
            <div class="col-12 col-sm-6">
               <h3 class="my-3"><?=$row['book_name']?></h3>
               <?php $_SESSION['book_id'] = $row['id'] ?>
               <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>

               <hr>
               <h4>Book Author Name</h4>
               <h5 class="my-3"><?= $row['book_author_name']?></h5>
               <br>
               <br>
               <h4 class="my-3">Book Publication Name</h4>
               <h5 class="my-3"><?= $row['book_publication_name']?></h5>
               <br>
               <br>

               <!-- Button trigger modal -->
               <a href="order.php"  class="btn btn-primary btn-lg btn-flat">
                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                Book Order
            </a>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="assets/javascripts/template-script.min.js"></script>
<script src="assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
<!--Notification msj-->
<script src="assets/vendor/toastr/toastr.min.js"></script>
<!--morris chart-->
<script src="assets/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--dataTable-->
<script src="assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
<script src="assets/javascripts/examples/tables/data-tables.js"></script>
<!--Examples-->
<script src="assets/javascripts/examples/dashboard.js"></script>
</body>


</html>
<?php }else{
    echo "<h1 style='font-family: SutonnyOMJ; color: red; position: relative;left: 42%;top: 263px;'>দুঃখিত</h1>";
    echo "<p style='font-family: SutonnyOMJ; color: red; position: relative;left: 26%;top: 263px;font-size: 24px;'> এই আইডিতে কোন বই পাওয়া যায় নাই।  দয়াকরে পুনরায় চেষ্টা করুন।  </p>";
} ?>