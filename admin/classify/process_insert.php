<?php 
require_once '../checkout_admin.php';

require_once '../connect.php';

$name = $_POST['name'];     // Lấy dữ liệu tên danh mục

$sql = "INSERT INTO classification(name) VALUES('$name')";

mysqli_query($connect,$sql);

header('location:index.php');
?>