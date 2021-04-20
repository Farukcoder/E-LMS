<?php
session_start();
require_once 'dbcon.php';
if (isset($_SESSION['logged_in'])):
    $id = $_SESSION['book_id'];
    $result = mysqli_query($con, "SELECT * FROM books Where id = $id ");
    $row = mysqli_fetch_assoc($result);

    ?>






    <html lang="en" class="fixed left-sidebar-top" xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>Library managment</title>

        <!--load progress bar-->
        <script src="assets/vendor/pace/pace.min.js"></script>
        <link href="assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet"/>

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

        <h3 class="text-center bg-warning col-sm-3  col-sm-offset-4">Book Order</h3>
        <div class="row">
            <form id="book_order" action="" method="post" class="col-sm-6 col-sm-offset-3">
                <div class="form-group">
                    <label for="exampleInputbookname">Book Name</label>
                    <input type="text" class="form-control" id="book_name" placeholder="Book Name" value="<?=$row['book_name']?>" readonly>
                    <input type="hidden"  id="book_id" name="book_id" value="<?=$row['id']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputname">Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?=isset($_SESSION['student_name'])? $_SESSION['student_name']:''?>" readonly>
                    <input type="hidden" name="userid" value="<?=isset($_SESSION['student_id'])? $_SESSION['student_id']:''?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter email" value="<?=isset($_SESSION['student_email'])? $_SESSION['student_email']:''?>" readonly>
                </div>

                <div class="form-group">
                    <label for="exampleInputphone">Phone</label>
                    <input type="text" class="form-control" id="user_number" name="user_number" placeholder="Phone" value="<?=isset($_SESSION['student_number'])? $_SESSION['student_number']:''?>" readonly>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="delivary"  name="delivery"  checked  value="1" onchange="addressvalid(this.value) ">
                        <label class="form-check-label" for="deliveryself">Self Delivery</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="delivary" name="delivery"  value="2" onchange="addressvalid(this.value)" >
                        <label class="form-check-label">Shop Delivery</label>
                    </div>
                </div>
                <div class="form-group" id="user_address" style="display: none">
                    <label>Shop Delivery Address</label>
                    <textarea class="form-control address" style="resize: none;" rows="3" cols="3" id="user_address" name="user_address" placeholder="Enter ..." ></textarea>
                </div>
                <div>
                    <button type="button" onclick="event.preventDefault(); order_valid() " id="order" name="order" value=""  class="btn btn-primary btn-block"> Book Order</button>
                </div>
            </form>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function addressvalid(val) {
                if (val == 1){
                    $("#user_address").hide();
                }else{
                    $("#user_address").show();

                }
            }

            function order_valid() {
                var ordervalues = $("#book_order").serializeArray();
                var delivary = $("#delivary:checked").val();
                var address = $(".address").val();
                if (delivary == 2){
                    if (address == ''){
                        alert("please enter your address");
                        return false;
                    }
                }

                $.ajax({
                    url: 'order_backend.php',
                    type: 'post',
                    data: ordervalues,
                    success:function (res) {
                        if(res == 1){
                            swal({
                                title: "সফল",
                                text: "সফলভাবে আপনার বইটি অর্ডার সম্পূর্ণ হয়েছে",
                                icon: "success",
                                button: false,
                                timer:1500
                            });
                            setTimeout(function () {
                                window.open('http://localhost/e-lms/','_self');
                            },1500);
                        }

                    }
                })

            }



        </script>


    </body>


    </html>
<?php else:
    header('location:sign-in.php');

    endif;?>