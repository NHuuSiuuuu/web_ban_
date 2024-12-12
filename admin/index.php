<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-top: 20px;
            color: #007bff;
        }

        a {
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 10px 0;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 20px;
        }

        form input[type="email"],
        form input[type="password"],
        form button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        .logout-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h1>Đây là trang Admin</h1>
    <?php if (isset($_SESSION['admin'])) { ?>
        <a href="./classify/index.php">Danh mục sản phẩm </a>
        <br>
        <a href="./products/index.php">Trang sản phẩm</a>
        <br>
        <a href="./orders/index.php">Quản lí đơn hàng</a>
        <a href="process_logout.php">Đăng xuất</a>

    <?php } else { ?>
        <form action="process_login.php" method="POST">
            Email
            <input type="email" name="email">
            <br>
            Mật khẩu
            <input type="password" name="password">
            <br>
            <button>Đăng nhập</button>
        </form>
    <?php } ?>
    <br>


</body>

</html>