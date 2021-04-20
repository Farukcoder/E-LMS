<?php
require_once 'hedar.php';

if (isset($_POST['save_book'])) {
    $inputs_errors = array();


    //validate Book name
    if (!empty($_POST['book_name'])) {
        $book_name = $_POST['book_name'];
    }else{
        $inputs_errors['book_name']="book name field is required";
    }

    //validate Book image
    if (!empty($_FILES["book_image"]['name'])) {

        $image_extension = pathinfo($_FILES["book_image"]['name']);

        if (in_array($image_extension['extension'], array("jpg","png","jpeg"))){
            $book_image = rand(11111,99999).".".$image_extension['extension'];
            $book_temp = $_FILES['book_image']['tmp_name'];
        }else{
            $inputs_errors['image_type_error']= "book image type is invalid";
        }

    } else {
     $inputs_errors['book_image']= "book image field is required";
 }

    //validate Author Name
 if (!empty($_POST["book_author_name"])) {
    $book_author_name = $_POST['book_author_name'];
}else {
    $inputs_errors['book_author_name']= "author name field is required";
}
    //validate Publication Name
if (!empty($_POST["book_publication_name"])) {
    $book_publication_name = $_POST['book_publication_name'];
}else {
    $inputs_errors['book_publication_name']= "publication name field is required";
}

    //validate Purchase Date
if (!empty($_POST["book_purchase_date"])) {
    $book_purchase_date = $_POST['book_purchase_date'];
}else {
    $inputs_errors['book_purchase_date']= "Purchase Date field is required";
}

    //validate Book Price
if (!empty($_POST['book_price'])){
    if (is_numeric($_POST['book_price'])){
        $book_price = $_POST['book_price'];
    }else{
        $inputs_errors['invalid_book_price']="book price field is not valid.";
    }
}else{
    $inputs_errors['book_price']="book price field is required";
}

    //validate Book Quantity
if (!empty($_POST['book_qty'])){
    if (is_numeric($_POST['book_qty'])){
        $book_qty = $_POST['book_qty'];
    }else{
        $inputs_errors['invalid_book_qty']="book quantity field is not valid.";
    }
}else{
    $inputs_errors['book_qty']="book quantity field is required";
}
    //validate Available  Quantity
if (!empty($_POST['available_qty'])){
    if (is_numeric($_POST['available_qty'])){
        $available_qty = $_POST['available_qty'];
    }else{
        $inputs_errors['invalid_available_qty']="available quantity field is not valid.";
    }
}else{
    $inputs_errors['available_qty']="available quantity field is required";
}



if (count($inputs_errors) == 0){
    $result= mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`) VALUES ('$book_name','$book_image','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_qty','$available_qty')");
    if ($result) {
        move_uploaded_file($book_temp, "../images/books/". $book_image);
        $success = "Your data save successfully!!";
    } else {
        $error = "Your data not save!";
    }
}


}


?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
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
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                            <h5 class="mb-lg">Add Book</h5>
                            <div class="form-group">
                                <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                <div class="col-sm-8">
                                    <input type="book_name" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?= isset($book_name) ? $book_name:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_name']))
                                    {
                                        echo '<span class="input-error">'.$inputs_errors['book_name'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                <div class="col-sm-8">
                                    <input type="file" id="book_image" name="book_image"  value="<?= isset($book_image) ? $book_image:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_image']))
                                    {
                                        echo '<span class="input-error">'.$inputs_errors['book_image'].'</span>';
                                    }elseif (isset($inputs_errors['image_type_error'])){
                                        echo '<span class="input-error">'.$inputs_errors['image_type_error'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_author_name" class="col-sm-4 control-label">Aouther Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name"  value="<?= isset($book_author_name) ? $book_author_name:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_author_name']))
                                    {
                                        echo '<span class="input-error">'.$inputs_errors['book_author_name'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?= isset($book_publication_name) ? $book_publication_name:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_publication_name']))
                                    {
                                        echo '<span class="input-error">'.$inputs_errors['book_publication_name'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date" value="<?= isset($book_purchase_date) ? $book_purchase_date:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_purchase_date']))
                                    {
                                        echo '<span class="input-error">'.$inputs_errors['book_purchase_date'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_price" class="col-sm-4 control-label">Book price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_price" placeholder="Book price" name="book_price" value="<?= isset($book_price) ? $book_price:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_price'])){
                                        echo '<span class="input-error">'.$inputs_errors['book_price'].'</span>';
                                    }elseif (isset($inputs_errors['invalid_book_price'])){
                                        echo '<span class="input-error">'.$inputs_errors['invalid_book_price'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty"  value="<?= isset($book_qty) ? $book_qty:''?>">
                                    <?php
                                    if (isset($inputs_errors['book_qty'])){
                                        echo '<span class="input-error">'.$inputs_errors['book_qty'].'</span>';
                                    }elseif (isset($inputs_errors['invalid_book_qty'])){
                                        echo '<span class="input-error">'.$inputs_errors['invalid_book_qty'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="available_qty" placeholder="Available Quantity" name="available_qty" value="<?= isset($available_qty) ? $available_qty:''?>">
                                    <?php
                                    if (isset($inputs_errors['available_qty'])){
                                        echo '<span class="input-error">'.$inputs_errors['available_qty'].'</span>';
                                    }elseif (isset($inputs_errors['invalid_available_qty'])){
                                        echo '<span class="input-error">'.$inputs_errors['invalid_available_qty'].'</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="save_book" class="btn btn-primary"> <i class="fa fa-save"></i> Save Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>