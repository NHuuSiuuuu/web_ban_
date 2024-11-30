<?php 
require_once 'admin/connect.php';
$id = $_GET['id'];
$sql_order_product = "delete from order_product where order_id = '$id'";
mysqli_query($connect,$sql_order_product);

$sql_orders = "delete from orders where id = '$id'";
mysqli_query($connect,$sql_orders);
mysqli_close($connect);
header("location:cart_show.php");
?>