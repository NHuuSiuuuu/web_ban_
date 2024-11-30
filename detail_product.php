<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
        }

        #middle {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
        }

        img {
            display: block;
            margin: 20px auto;
            max-width: 90%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

     

        h2 {
            color: #2a9d8f;
            font-size: 24px;
            text-align: center;
            margin-top: 20px;
            padding: 20px;
            background-color: #e0f5f2;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2:hover {
            background-color: #a8e4d6;
        }

        h2 a {
            color: #2a9d8f;
            text-decoration: none;
            font-weight: bold;
        }

        h2 a:hover {
            color: #333;
        }

        p {
            color: #000000;
            font-size: 18px;
            line-height: 1.8;
            text-align: justify;
            margin-top: 20px;
            padding: 20px;
            background-color: #fafafa;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        p:hover {
            background-color: #f0f0f0;
        }

    </style>
</head>
<body>
    <?php
    require_once 'admin/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id ='$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);
    ?>
    <div id="middle">
        <h1>
            <?php echo $each['name']; ?>
        </h1>
        <img src="admin/images/<?php echo $each['image']; ?>" alt="">
        <h2>
            Giá: <?php echo number_format($each['price'], 0, ',', '.'); ?> VND
        </h2>
        <h2><a href="add_cart.php?id=<?php echo $each['id'] ?>">Thêm vào giỏ hàng</a></h2>
        <p>
            <?php echo $each['detail']; ?>
        </p>
    </div>
</body>
</html>
