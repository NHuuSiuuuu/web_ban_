<?php
require_once '../checkout_admin.php';
require_once '../connect.php';
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$new_image = $_FILES['new_image'];

if ($new_image['size'] > 0) {
    $folder = '../images/';
    $file_extension = explode('.', $new_image['name'])[1];
    $file_name_image = time() . '.' . $file_extension;
    $path_file = $folder . $file_name_image;
    move_uploaded_file($new_image["tmp_name"], $path_file);
} else {
    $file_name_image = $_POST['old_image'];
}

$id_classify = $_POST['id_classify'];
$detail = $_POST['detail'];  // Lấy chi tiết sản phẩm

$sql = "UPDATE products
        SET name = '$name',
            price = '$price',
            image = '$file_name_image',
            id_classify = '$id_classify',
            detail = '$detail'
        WHERE id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);

header('location:index.php');
