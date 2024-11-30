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
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .product {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            display: inline-block;
        }

        .product h5 {
            color: #333;
            margin-bottom: 10px;
        }

        .product img {
            display: block;
            margin: 0 auto;
            max-width: 150px;
            max-height: 150px;
        }

        .product p {
            color: #666;
            margin-top: 10px;
        }

        .product a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }

        .product a:hover {
            color: #0056b3;
        }
        
    </style>
</head>
<body>
    <?php 
    require_once 'header.php';
    require_once 'admin/connect.php';
    $id = $_GET['id'];
    $sql = "select * from products where id_classify = '$id'";
    $result = mysqli_query($connect,$sql);
    mysqli_close($connect);
    ?>
    <?php foreach ($result as $each): ?>
        <div class="product">
            <h5><?php echo $each['name'] ?></h5>
            <img src="admin/images/<?php echo $each['image'] ?>" alt="" height="150px" width="150px">
            <p><?php echo $each['price'] ?> VND</p>
            <a href="detail_product.php?id=<?php echo $each['id'] ?>">Xem chi tiết</a>
            <br>
            <br>
            <?php if(isset($_SESSION['user'])): ?>
                <a href="add_cart.php?id=<?php echo $each['id'] ?>">Thêm vào giỏ hàng</a>
            <?php endif ?>    
        </div>
    <?php endforeach ?>   
</body>
</html>