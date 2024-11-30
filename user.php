<?php 
session_start();
if(empty($_SESSION['user'])){
    header('location:index.php?error=Bạn chưa đăng nhập');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Trang thông tin , Xin chao
    <?php echo $_SESSION['name'] ?>
    </h1>
    <a href="index.php">
        Trang chủ
    </a>
    <br>
    <a href="logout.php">
        Đăng xuất
    </a>
</body>
</html>