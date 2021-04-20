<?php
require_once 'hedar.php';
?>
<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">ড্যাশবোর্ড</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="row">
        <?php
        $books = mysqli_query($con,"SELECT * FROM `books`");
        $total_books = mysqli_num_rows($books);
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                <a href="manage-books.php">
                    <div class="panel-content">
                        <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?= $total_books?> </h1>
                        <h4 class="subtitle color-darker-1">সর্বমোট বই</h4>
                    </div>
                </a>
            </div>
        </div>
        <?php
        $students = mysqli_query($con,"SELECT * FROM `students`");
        $total_students = mysqli_num_rows($students);
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                <a href="students.php">
                    <div class="panel-content">
                        <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_students?> </h1>
                        <h4 class="subtitle color-darker-1">মোট সদস্য</h4>
                    </div>
                </a>
            </div>
        </div>
            <!-- <?php
            $libraian = mysqli_query($con,"SELECT * FROM `librarin`");
            $total_libraian = mysqli_num_rows($libraian);
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="#">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_libraian?> </h1>
                            <h4 class="subtitle color-darker-1">Total Libraian</h4>
                        </div>
                    </a>
                </div>
            </div> -->
            <?php
            $books_qty = mysqli_query($con,"SELECT SUM(`book_qty`) as total FROM `books` ");
            $qty = mysqli_fetch_assoc($books_qty);

            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="manage-books.php">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?= $qty['total']?> </h1>
                            <h4 class="subtitle color-darker-1">মোট বইয়ের সংখ্যা</h4>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            $available_qty = mysqli_query($con,"SELECT SUM(`available_qty`) as total FROM `books` ");
            $qty = mysqli_fetch_assoc($available_qty);

            ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                    <a href="manage-books.php">
                        <div class="panel-content">
                            <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?= $qty['total']?> </h1>
                            <h4 class="subtitle color-darker-1">পর্যাপ্ত পরিমাণ বই</h4>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>