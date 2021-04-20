<?php
require_once '../dbcon.php';
$result = mysqli_query ($con, "SELECT * FROM `books`");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Print All Books</title>
    <style type="text/css">
        body{
            margin: 0;
            font-family: kalpurush;
            }.print-area{
                width: 1050px;
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
                <td>
                    <img style="width: 50px; height: 75px;" src="../images/books/<?= $row ['book_image']?>">
                </td>
                <td><?= $row ['book_name']?></td>
                <td><?= $row ['book_author_name']?></td>
                <td><?= $row ['book_publication_name']?></td>
                <td><?= $row ['book_purchase_date']?></td>
                <td><?= $row ['book_price']?></td>
                <td><?= $row ['book_qty']?></td>
                <td><?= $row ['available_qty']?></td>
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
        <h3>libariry all Books</h3>
        </div>
        <div class="data-info">
        <table>
        <tr>
        <th>Sl No</th>
        <th>Book Image</th>
        <th>Book Name</th>
        <th>Aouther Name</th>
        <th>Publication Name</th>
        <th>Purchase Date</th>
        <th>Book price</th>
        <th>Book Quantity</th>
        <th>Available Quantity</th>
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