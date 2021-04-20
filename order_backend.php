<?php
require_once 'dbcon.php';
extract($_POST);

$query = "INSERT INTO order_book (user_id,book_id,delivery_type,is_status,user_addres) VALUES ($userid,$book_id,$delivery,0,'$user_address')";
$res = mysqli_query($con, $query);

echo $res;




?>
