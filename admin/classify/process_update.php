<?php 
require_once '../checkout_super_admin.php';
require_once '../connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$sql = "UPDATE classification
SET name = '$name' WHERE id = '$id'";
mysqli_query($connect,$sql);
header('location:index.php');
?>