<?php
require_once '../dbcon.php';
$result = mysqli_query ($con, "SELECT * FROM `students`");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print All Students</title>
    <style type="text/css">
        body{
            margin: 0;
            font-family: kalpurush;
            }.print-area{
                width: 755px;
                height: 1050px;
                margin: auto;
                box-sizing: border-box;
                page-break-after: always;
            }
            .header, .page-info{
                text-align: center;
            }
            .header h3{
                margin: 0;
            }
            .data-info{}
            .data-info table{
                width: 100%;
                border-collapse: collapse;
            }
            .data-info table th,
            .data-info table td {
                border: 1px solid #555;
                padding: 4px;
                line-height: 1em;
            }
        </style>
    </head>
    <body onload="window.print()">
        <?php 
        $sl = 1;
        $page = 1;
        $total = mysqli_num_rows($result);
        $per_page = 10;
        while ($row = mysqli_fetch_assoc($result)) {

            if ($sl % $per_page == 1) {
                echo page_header();
            }
            ?>
            <tr>
                <td> <?= $sl; ?></td>
                <td><?= $row ['fname'].' '.$row ['lname']?></td>
                <td><?= $row ['username']?></td>
                <td><?= $row ['email']?></td>
                <td><?= $row ['roll']?></td>
                <td><?= $row ['reg']?></td>
                <td><?= $row ['phone']?></td>
            </tr>
            <?php
            if ($sl % $per_page == 0 || $total == $per_page) {
                echo page_footer($page++);
            }
            $sl ++;
        }
        ?>
    </body>
    </html>

    <?php
    function page_header()
    {
        $data = '<div class="print-area">
        <div class="header">
        <h3>libariry all students</h3>
        <h4>All Registred Students</h4>
        </div>
        <div class="data-info">
        <table>
        <tr>
        <th>Sl No</th>
        <th>Student Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Roll</th>
        <th>Registration Number</th>
        <th>Mobile Number</th>
        </tr>';
        return $data;
    }
    function page_footer($page)
    {
        $data = '
        </table>
        <div class="page-info">Page:- '.$page.'</div>
        </div>
        </div>';

        return $data;
    }
    ?>