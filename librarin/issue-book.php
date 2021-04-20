<?php
require_once 'hedar.php';

if (isset($_POST['issue_book'])){
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];

    $result = mysqli_query($con,"INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')");

    if ($result){
        mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE `id`='$book_id'");

        ?>
        <script type="text/javascript">
            alert('Book Issue Successfully!');
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert('Book Not Issue!');
        </script>
        <?php
    }
}

?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">ড্যাশবোর্ড</a></li>
            <li><a href="javascript:avoid(0)">ইস্যুকৃত বই</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-inline" action="" method="post">
                            <div class="form-group">
                                <select class="form-control" name="student_id">
                                    <option value="">বই ইস্যু করুন</option>
                                    <?php
                                    $result= mysqli_query($con,"SELECT * FROM `students` WHERE `status` = '1'");
                                    while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <option value = "<?= $row['id']?>" ><?= ucwords($row['fname'].' '.$row['lname'].'-('.$row['roll'].')')?></option >
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="search">search</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_POST['search'])){

                    $id= $_POST['student_id'];

                    $result= mysqli_query($con,"SELECT * FROM `students` WHERE `id` = '$id' AND `status` = '1'");

                    $row = mysqli_fetch_assoc($result);

                    ?>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" id="name" value="<?=ucwords($row['fname'].' '.$row['lname'])?>" readonly>
                                            <input type="hidden" value="<?= $row['id']?>" name="student_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Book Name</label>
                                            <select class="form-control" name="book_id">
                                                <option value="">select</option>
                                                <?php
                                                $result= mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty`> 0 ");

                                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                                    <option value = "<?= $row['id']?>" ><?= $row['book_name']?></option >
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Book issue date</label>
                                            <input class="form-control" type="text" name="book_issue_date" value="<?= date('d-m-Y')?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">ড্যাশবোর্ড</a></li>
            <li><i href="javascript:avoid(0)"></i><a href="#">ইস্যুকৃত বই </a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>ইস্যুকৃত বই সমূহ</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class=" table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Phone</th>
                                <th>Book Name</th>
                                <th>Book Issue Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result= mysqli_query($con,"SELECT `issue_books`.`id`,`issue_books`.`book_id`,`issue_books`.`book_issue_date`,`students`.`fname`,`students`.`lname`,`students`.`roll`,`students`.`phone`,`books`.`book_name`
                                FROM `issue_books`
                                INNER JOIN `students` ON `students`.`id`=`issue_books`.`student_id`
                                INNER JOIN `books` ON `books`.`id`= `issue_books`.`book_id`

                                WHERE `issue_books`.`book_return_date`= ''");
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?= ucwords( $row['fname'].' '.$row['lname'])?></td>
                                    <td><?= $row['roll']?></td>
                                    <td><?= $row['phone']?></td>
                                    <td><?= $row['book_name']?></td>
                                    <td><?= date('d-M-Y',strtotime($row['book_issue_date']))?></td>
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
if (isset($_GET['id'])){
    $id= $_GET['id'];
    $bookid= $_GET['bookid'];
    $date= date('d-m-y');
    $result= mysqli_query($con,"UPDATE `issue_books` SET `book_return_date`='$date' WHERE `id`='$id'");
    if ($result){
        mysqli_query($con,"UPDATE `books` SET `available_qty`=`available_qty`+1 WHERE `id`='$bookid'");

        ?>
        <script type="text/javascript">
            alert('Book Return Successfully!!');
            javascript: history.go(-1);
        </script>
        <?php
    }else{
        ?>
        <script type="text/javascript">
            alert('Something Wrong!!');
        </script>
        <?php
    }
}
?>
<?php
require_once 'footer.php';
?>
