<?php

require_once '../dbcon.php';

$id = $_POST['sid'];

$query = "UPDATE order_book SET is_status= 1 WHERE id = $id";

$res = mysqli_query($con,$query);
echo $res;






?>