<?php
require_once '../checkout_admin.php';
require_once '../connect.php';

$name = $_POST['name'];
$price = $_POST['price'];
$image = $_FILES['image'];
$detail = $_POST['detail'];
$id_classify = $_POST['id_classify']; // Lấy ID danh mục sản phẩm

// Xử lý hình ảnh
$folder = "../images/";  // Đường dẫn lưu ảnh
$hinhanh = time() . '_' . $image['name'];  // Tạo tên ảnh bằng cách ghép thời gian với tên ảnh
$path_file = $folder . $hinhanh;  // Đường dẫn đầy đủ của ảnh

// Di chuyển ảnh từ thư mục tạm thời đến thư mục chính
move_uploaded_file($image["tmp_name"], $path_file); 

// Thêm sản phẩm vào cơ sở dữ liệu
$sql = "INSERT INTO products(name, price, image, id_classify, detail) 
        VALUES('$name', '$price', '$hinhanh', '$id_classify', '$detail')";

mysqli_query($connect, $sql);

header('location:index.php');  // Điều hướng về trang quản lý
?>
