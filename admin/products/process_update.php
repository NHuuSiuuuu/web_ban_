<?php
require_once '../checkout_admin.php';
require_once '../connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];
$new_image = $_FILES['new_image'];

if ($new_image['size'] > 0) {
    // Xử lý khi có ảnh mới được upload
    $folder = '../images/';
    $hinhanh = time() . '_' . $new_image['name'];  // Tạo tên duy nhất cho ảnh
    $path_file = $folder . $hinhanh;

    // Di chuyển ảnh từ thư mục tạm tới thư mục chính
    move_uploaded_file($new_image["tmp_name"], $path_file);
    $file_name_image = $hinhanh; // Cập nhật tên ảnh mới
} else {
    // Nếu không có ảnh mới, giữ nguyên ảnh cũ
    $file_name_image = $_POST['old_image'];     //old_image như một biến riêng trong mã PHP
}

$id_classify = $_POST['id_classify'];
$detail = $_POST['detail'];  // Lấy chi tiết sản phẩm

// Cập nhật thông tin sản phẩm
$sql = "UPDATE products
        SET name = '$name',
            price = '$price',
            image = '$file_name_image',  // Cập nhật tên ảnh
            id_classify = '$id_classify',
            detail = '$detail'
        WHERE id = '$id'";

mysqli_query($connect, $sql);

header('location:index.php');  // Điều hướng về trang quản lý
?>
