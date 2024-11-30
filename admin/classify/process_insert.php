<?php 
require_once '../checkout_super_admin.php';
require_once '../connect.php';

$name = $_POST['name'];
$sql = "INSERT INTO classification(name) values('$name')";

mysqli_query($connect,$sql);

header('location:index.php');
?>