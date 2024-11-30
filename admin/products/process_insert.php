<?php 
require_once '../checkout_admin.php';
require_once '../connect.php';
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image'];
$image = $_FILES['detail'];
$id_classify = $_POST['id_classify'];

$folder = "../images/";

$file_extension = explode('.',$image['name'])[1];

$file_name_image = time() . '.' . $file_extension;

$path_file = $folder . $file_name_image;

move_uploaded_file($image["tmp_name"], $path_file);

$sql = "insert into products(name,price,image,id_classify)
values('$name','$price','$file_name_image','$id_classify')";
mysqli_query($connect,$sql);
mysqli_close($connect);
header('location:index.php');
?>