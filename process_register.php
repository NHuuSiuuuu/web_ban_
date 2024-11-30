<?php
require_once 'admin/connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Kiểm tra email đã tồn tại
$sql1 = "SELECT COUNT(*) FROM users WHERE email = '$email'";
$result1 = mysqli_query($connect, $sql1);
$number_rows = mysqli_fetch_array($result1)['count(*)'];

if ($number_rows == 1) {
    echo "<script>
        alert('Email này đã được sử dụng! Vui lòng đăng nhập hoặc dùng email khác.');
        window.location.href = 'login.php';
    </script>";
    exit;
}

// Thêm người dùng mới
$sql2 = "INSERT INTO users (name, email, password, phone, address) 
VALUES ('$name', '$email', '$password', '$phone', '$address')";
mysqli_query($connect, $sql2);

// Lấy ID người dùng vừa tạo
$sql3 = "SELECT id FROM users WHERE email = '$email'";
$result2 = mysqli_query($connect, $sql3);
$id = mysqli_fetch_array($result2)['id'];

// Khởi tạo session
session_start();
$_SESSION['user'] = $id;
$_SESSION['name'] = $name;

// Đóng kết nối và chuyển hướng với alert
mysqli_close($connect);
echo "<script>
    alert('Đăng ký thành công! Chào mừng bạn đến với website của chúng tôi.');
    window.location.href = 'index.php';
</script>";
?>
