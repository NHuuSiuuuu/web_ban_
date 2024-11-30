<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("location:index.php?error=Bạn phải đăng nhập!");
    }
    
    if(empty($_SESSION['cart'][$_SESSION['user']])) {
        header("location:index.php?error=Bạn chưa thêm gì vào giỏ hàng!");
    }else {
        $cart = $_SESSION['cart'][$_SESSION['user']];
 
    }
    $sum = 0;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang giỏ hàng</title>
    <style type="text/css">
    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    th {
    background-color: #f2f2f2;
    }

    /* Định dạng nút xóa */
    a {
    text-decoration: none;
    color: #ff0000; /* Màu đỏ cho nút xóa */
    }

    a:hover {
    text-decoration: underline;
    }

    /* Định dạng form */
    form {
    width: 50%;
    margin: 20px auto;
    }

    input[type="text"],
    input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    }

    input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    }

    input[type="submit"]:hover {
    background-color: #45a049;
    }
    </style>
</head>
<body>
    

    <a href="index.php">Trang chủ</a>
    <h1>Trang giỏ hàng</h1>

    <table border="1"width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($cart as $id => $each): ?>
            <tr>
                <td><img src="admin/images/<?php echo $each['image'] ?>" alt="" height="100"></td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?>VND</td>
                <td>
                    <a href="update_quantity.php?id=<?php echo $id ?>&type=decre">
                        -
                    </a>
                    <?php echo $each['quantity']?>
                    <a href="update_quantity.php?id=<?php echo $id ?>&type=incre">
                        +
                    </a>
                </td>
                <td><?php 
                $result =  $each['price'] * $each['quantity'] ;
                echo $result;
                $sum +=$result;
                ?></td>
                <td>
                    <a href="delete_cart.php?id=<?php echo $id?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php endforeach ?>    
    </table>
    <h1 style="text-align:center;">Tổng tiền hóa đơn : <?php echo $sum ?> VND </h1>
    <?php
    $id = $_SESSION['user'];
    require_once 'admin/connect.php';
    $sql = "select * from users where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);
    ?>
     <form action="product_checkout.php" method="POST">
         Tên người nhận
         <input type="text" name="name_receiver" value="<?php echo $each['name'] ?>">
         <br>
         Số điện thoại
         <input type="text" name="phone_receiver" value="<?php echo $each['phone'] ?>">
         <br>
         Địa chỉ
         <input type="text" name ="address_receiver"value="<?php echo $each['address'] ?>">
         <br>
         <br>
        Phương thức thanh toán:
        <br>
        Nếu chọn ATM thì vui lòng chuyển tiền vào tài khoản sau:
        <br>
        <img src="assets/img/qr.png" style="height:137px;width:137px;">

        <br>
        <input type="radio" name="pays" value="ATM"> ATM<br>
        <input type="radio" name="pays" value="COD"> COD<br>
        <br>
         <input type="submit" value="Đặt hàng">
     </form>
    
</body>
</html>