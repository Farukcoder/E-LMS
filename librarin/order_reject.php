<?php

require_once '../dbcon.php';

$id = $_POST['sid'];

$date = $date = date('d-m-Y h:i:s a', time());

$query = "UPDATE order_book SET delete_at = '$date' WHERE id = $id";

$res = mysqli_query($con,$query);
echo $res;






?>