<?php 
require_once '../checkout_admin.php';

require_once '../connect.php';
$id = $_GET['id'];  // Lấy giá trị `id` từ tham số GET trên URL để xác định danh mục cần xóa.

$sql = "DELETE FROM classification WHERE id = '$id'";
mysqli_query($connect,$sql);
header('location:index.php');
?>