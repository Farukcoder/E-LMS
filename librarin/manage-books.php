<?php
require_once 'hedar.php';

?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">ডেশবোর্ড</a></li>
            <li><a href="javascript:avoid(0)">বই সম্পাদন করুন</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle" style=" margin-bottom: -33px;"><b>All Books</b></h4>
        <div class="pull-right"><a href="print_book.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"> Print</i></a></div>
        <div class="clearfix"></div>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Book Image</th>
                                <th>Book Name</th>
                                <th>Aouther Name</th>
                                <th>Publication Name</th>
                                <th>Purchase Date</th>
                                <th>Book price</th>
                                <th>Book Quantity</th>
                                <th>Available Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result= mysqli_query($con,"SELECT * FROM `books`");
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td> <img src="../images/books/<?= $row['book_image']?>"width="50" height="75"></td>
                                    <td> <?= $row['book_name']?></td>
                                    <td> <?= $row['book_author_name']?></td>
                                    <td> <?= $row['book_publication_name']?></td>
                                    <td> <?= date('d-M-Y',strtotime($row['book_purchase_date']))?></td>
                                    <td> <?= $row['book_price']?></td>
                                    <td> <?= $row['book_qty']?></td>
                                    <td> <?= $row['available_qty']?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info"data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update<?= $row['id']?>"><i class="fa fa-pencil-square"></i></a>
                                        <a href="delete.php?bookdelete= <?= base64_encode($row['id'])?>"class="btn btn-danger" onclick="return confirm('Are you sure delete this item?')"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                    
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$result= mysqli_query($con,"SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)){
    ?>
    <!-- Modal -->
    <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-default-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Book Image</th>
                            <td> <img src="../images/books/<?= $row['book_image']?>"width="50" height="75"></td>
                        </tr>
                        <tr>
                            <th>Book Name</th>
                            <td> <?= $row['book_name']?></td>
                        </tr>
                        <tr>
                            <th>Aouther Name</th>
                            <td> <?= $row['book_author_name']?></td>
                        </tr>
                        <tr>
                            <th>Publication Name</th>
                            <td> <?= $row['book_publication_name']?></td>
                        </tr>
                        <tr>
                            <th>Purchase Date</th>
                            <td> <?= date('d-M-Y',strtotime($row['book_purchase_date']))?></td>
                        </tr>
                        <tr>
                            <th>Book price</th>
                            <td> <?= $row['book_price']?></td>
                        </tr>
                        <tr>
                         <th>Book Quantity</th>
                         <td> <?= $row['book_qty']?></td>
                     </tr>
                     <tr>
                         <th>Available Quantity</th>
                         <td> <?= $row['available_qty']?></td>
                     </tr>
                 </table>
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> 
<?php
}
?>

<?php
$result= mysqli_query($con,"SELECT * FROM `books`");
while ($row = mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $book_info = mysqli_query($con,"SELECT * FROM `books` WHERE `id`= '$id'");
    $book_info_row = mysqli_fetch_assoc($book_info);

    ?>
    <!-- Modal -->
    <div class="modal fade" id="book-update<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-default-label"><i class="fa fa-book"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <label for="book_name">Book Name</label>
                                        <input type="book_name" class="form-control" id="book_name" placeholder="Book Name" name="book_name" value="<?= $book_info_row['book_name']?>">
                                        <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id']?>">
                                        <?php
                                        if (isset($inputs_errors['book_name']))
                                        {
                                            echo '<span class="input-error">'.$inputs_errors['book_name'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_image">Book Image</label>
                                        <input type="file" id="book_image" name="book_image">
                                        <img src="../images/books/<?= $book_info_row['book_image']?>" alt="" width="100" height="150">
                                        <?php
                                        if (isset($inputs_errors['book_image']))
                                        {
                                            echo '<span class="input-error">'.$inputs_errors['book_image'].'</span>';
                                        }elseif (isset($inputs_errors['image_type_error'])){
                                            echo '<span class="input-error">'.$inputs_errors['image_type_error'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_author_name" >Aouther Name</label>
                                        <input type="text" class="form-control" id="book_author_name" placeholder="Book Author Name" name="book_author_name" value="<?= $book_info_row['book_author_name']?>">
                                        <?php
                                        if (isset($inputs_errors['book_author_name']))
                                        {
                                            echo '<span class="input-error">'.$inputs_errors['book_author_name'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_publication_name">Publication Name</label>
                                        <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?= $book_info_row['book_publication_name']?>">
                                        <?php
                                        if (isset($inputs_errors['book_publication_name']))
                                        {
                                            echo '<span class="input-error">'.$inputs_errors['book_publication_name'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_purchase_date">Purchase Date</label>
                                        <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date" value="<?= $book_info_row['book_purchase_date']?>">
                                        <?php
                                        if (isset($inputs_errors['book_purchase_date']))
                                        {
                                            echo '<span class="input-error">'.$inputs_errors['book_purchase_date'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_price">Book price</label>
                                        <input type="text" class="form-control" id="book_price" placeholder="Book price" name="book_price" value="<?= $book_info_row['book_price']?>">
                                        <?php
                                        if (isset($inputs_errors['book_price'])){
                                            echo '<span class="input-error">'.$inputs_errors['book_price'].'</span>';
                                        }elseif (isset($inputs_errors['invalid_book_price'])){
                                            echo '<span class="input-error">'.$inputs_errors['invalid_book_price'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="book_qty">Book Quantity</label>
                                        <input type="text" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty" value="<?= $book_info_row['book_qty']?>">
                                        <?php
                                        if (isset($inputs_errors['book_qty'])){
                                            echo '<span class="input-error">'.$inputs_errors['book_qty'].'</span>';
                                        }elseif (isset($inputs_errors['invalid_book_qty'])){
                                            echo '<span class="input-error">'.$inputs_errors['invalid_book_qty'].'</span>';
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="available_qty">Available Quantity</label>
                                        <input type="text" class="form-control" id="available_qty" placeholder="Available Quantity" name="available_qty" value="<?= $book_info_row['available_qty']?>">
                                        <?php
                                        if (isset($inputs_errors['available_qty'])){
                                            echo '<span class="input-error">'.$inputs_errors['available_qty'].'</span>';
                                        }elseif (isset($inputs_errors['invalid_available_qty'])){
                                            echo '<span class="input-error">'.$inputs_errors['invalid_available_qty'].'</span>';
                                        }
                                        ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="update-book" class="btn btn-primary">Update Book</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
}
if (isset($_POST['update-book'])) {
    $inputs_errors = array();

    $id = $_POST['id'];
    //validate Book name
    if (!empty($_POST['book_name'])) {
        $book_name = $_POST['book_name'];
    } else {
        $inputs_errors['book_name'] = "book name field is required";
    }

//    //validate Book image
//    if (!empty($_FILES["book_image"]['name'])) {
//
//        $image_extension = pathinfo($_FILES["book_image"]['name']);
//
//        if (in_array($image_extension['extension'], array("jpg","png","jpeg"))){
//            $book_image = rand(11111,99999).".".$image_extension['extension'];
//            $book_temp = $_FILES['book_image']['tmp_name'];
//        }else{
//            $inputs_errors['image_type_error']= "book image type is invalid";
//        }
//
//    } else {
//        $inputs_errors['book_image']= "book image field is required";
//    }
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
    if (isset($_POST['available_qty'])){
        if (is_numeric($_POST['available_qty'])){
            $available_qty = $_POST['available_qty'];
        }else{
            $inputs_errors['invalid_available_qty']="available quantity field is not valid.";
        }
    }else{
        $inputs_errors['available_qty']="available quantity field is required";
    }




    if (count($inputs_errors) == 0) {

        $result = mysqli_query($con, "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id`='$id'");
        if ($result){
            ?>
            <script type="text/javascript">
                alert('Book Update Successfully!');
                javascript: history.go(-1);
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
                alert('Book Not Update!');
            </script>
            <?php
        }
    }
}
?>
<?php
require_once 'footer.php';
?>