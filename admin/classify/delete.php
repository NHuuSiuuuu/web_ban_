<?php 
require_once '../checkout_super_admin.php';
require_once '../connect.php';
$id = $_GET['id'];
$sql = "delete from classification where id = '$id'";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');
?>