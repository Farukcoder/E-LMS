<?php
require_once 'dbcon.php';

if (isset($_POST['student_register'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $roll=$_POST['roll'];
    $reg=$_POST['reg'];
    $phone=$_POST['phone'];

    $inputs_errors = array();

    if (empty($fname)){
        $inputs_errors['fname']="First name field is required";
    }
    if (empty($lname)){
        $inputs_errors['lname']="Last name field is required";
    }
    if (empty($email)){
        $inputs_errors['email']="Email field is required";
    }
    if (empty($username)){
        $inputs_errors['username']="Username field is required";
    }
    if (empty($password)){
        $inputs_errors['password']="Password field is required";
    }
    if (!empty($_POST['roll'])) {
        if (is_numeric($_POST['roll'])) {
            $roll = $_POST['roll'];
        } else {
            $inputs_errors['invalid_roll'] = "Roll field is not valid.";
        }


    } else {
        $inputs_errors['roll'] = "Roll field is required";
    }
    if (!empty($_POST['reg'])) {
        if (is_numeric($_POST['reg'])) {
            $reg = $_POST['reg'];
        } else {
            $inputs_errors['invalid_reg'] = "Reg field is not valid.";
        }
    } else {
        $inputs_errors['reg'] = "Reg field is required";
    }
    if (!empty($_POST['phone'])) {
        $pattern = "/01[1|3|5|6|7|8|9][0-9]{8}/";
        if (preg_match($pattern, $_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            $inputs_errors['invaild_phone_number'] = "Phone field is not valid";
        }
    } else {
        $inputs_errors['phone'] = "Phone field is required";
    }

    if (count($inputs_errors)==0){

        $email_check= mysqli_query($con,"SELECT * FROM `students` WHERE `email`='$email'");
        $email_check_row = mysqli_num_rows($email_check);
        if ($email_check_row == 0){

            $username_check= mysqli_query($con,"SELECT * FROM `students` WHERE `username`='$username'");
            $username_check_row = mysqli_num_rows($username_check);

            if ($username_check_row == 0){
                if (strlen($username) > 4){
                    if (strlen($password) > 5){
                        $password_hash= password_hash($password , PASSWORD_DEFAULT);
                        $qurey = "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`,`status`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','0','$phone')";
                        $result = mysqli_query($con, $qurey);
                        if ($result){
                            $success= "Registration Successfully!";
                        }else{
                            $error= "Something Wrong!";
                        }
                    }else{
                        $password_error="password is more then 8 characters";
                    }
                }else{
                    $username_exists="username is more then 8 characters";
                }

            }else{
                $username_exists = "This username already exists";
            }

        }else{
            $email_exists = "This Email already exists";
        }
    }

}
?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Student Registration</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="assets/stylesheets/css/style.css">
</head>

<body>
    <div class="wrap">
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body animated slideInDown">
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--LOGO-->
            <div class="logo">
                <h3 class="text-center">Library Managment</h3>
                <?php
                if (isset($success)){
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($error)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                }
                ?>

            </div>
            <div class="box">
                <!--SIGN IN FORM-->
                <div class="panel mb-none">
                    <div class="panel-content bg-scale-0">
                        <form method="post" action="<?= $_SERVER ['PHP_SELF']?>">
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= isset($fname) ? $fname:''?>">
                                    <i class="fa fa-user"></i>
                                </span>
                                <?php
                                if (isset($inputs_errors['fname'])){
                                    echo '<span class="input-error color-danger">'.$inputs_errors['fname'].'</span>';
                                }
                                ?>
                            </div>
                            <div class="form-group mt-md">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= isset($lname) ? $lname:''?>">
                                    <i class="fa fa-user"></i>
                                </span>
                            </span>
                            <?php
                            if (isset($inputs_errors['lname'])){
                                echo '<span class="input-error color-danger">'.$inputs_errors['lname'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= isset($email) ? $email:''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </span>
                        <?php
                        if (isset($inputs_errors['email'])){
                            echo '<span class="input-error color-danger">'.$inputs_errors['email'].'</span>';
                        }
                        ?>
                        <?php
                        if (isset($email_exists)){
                            ?>
                            <div class="color-danger">
                                <?php echo $email_exists?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="form-group mt-md">
                        <span class="input-with-icon">
                            <input type="text" class="form-control"  placeholder="User Name" name="username" value="<?= isset($username) ? $username:''?>">
                            <i class="fa fa-user"></i>
                        </span>
                    </span>
                    <?php
                    if (isset($inputs_errors['username'])){
                        echo '<span class="input-error color-danger">'.$inputs_errors['username'].'</span>';
                    }
                    ?>
                    <?php
                    if (isset($username_exists)){
                        ?>
                        <div class="color-danger">
                            <?php echo $username_exists?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="form-group">
                    <span class="input-with-icon">
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?= isset($password) ? $password:''?>">
                        <i class="fa fa-key"></i>
                    </span>
                </span>
                <?php
                if (isset($inputs_errors['password'])){
                    echo '<span class="input-error color-danger">'.$inputs_errors['password'].'</span>';
                }
                ?>
                <?php
                if (isset($password_error)){
                    ?>
                    <div class="color-danger">
                        <?php echo $password_error?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="form-group mt-md">
                <span class="input-with-icon">
                    <input type="text" class="form-control"  placeholder="Roll" name="roll" value="<?= isset($roll) ? $roll:''?>">
                    <i class="fa fa-minus-square-o" aria-hidden="true"></i>
                </span>

                <?php
                if (isset($inputs_errors['roll'])){
                    echo '<span class="input-error color-danger">'.$inputs_errors['roll'].'</span>';
                }
                ?>
            </div>
            <div class="form-group mt-md">
                <span class="input-with-icon">
                    <input type="text" class="form-control"  placeholder="Reg. No" name="reg"  value="<?= isset($reg) ? $reg:''?>">
                    <i class="fa fa-user"></i>
                </span>
                <?php
                if (isset($inputs_errors['reg'])){
                    echo '<span class="input-error color-danger">'.$inputs_errors['reg'].'</span>';
                }
                ?>
            </div>
            <div class="form-group mt-md">
                <span class="input-with-icon">
                    <input type="text" class="form-control"  placeholder="+0880" name="phone" value="<?= isset($phone) ? $phone:''?>">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                </span>
                <?php
                if (isset($inputs_errors['phone'])){
                    echo '<span class="input-error color-danger">'.$inputs_errors['phone'].'</span>';
                }
                ?>
            </div>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
            </div>
            <div class="form-group text-center">
                Have an account?, <a href="sign-in.php">Sign In</a>
            </div>
        </form>
    </div>
</div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
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
</body>
</html>
