<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    .table {
    border-collapse: collapse;
    width: 100%;
    }

    /* Thiết lập kiểu cho các ô đầu tiên (các thẻ <th>) */
    .table th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 8px;
    }

    /* Thiết lập kiểu cho các ô dữ liệu (các thẻ <td>) */
    .table td {
    border-bottom: 1px solid #ddd;
    padding: 8px;
    }

    /* Kiểu cho hàng chẵn */
    .table tr:nth-child(even) {
    background-color: #f2f2f2;
    }
    </style>
</head>
<body>
    <?php
    $order_id = $_GET['id'];
    require_once 'admin/connect.php';
    $sql = "select * from order_product
    join products on products.id = order_product.product_id where order_id = '$order_id'";
    $result = mysqli_query($connect,$sql);
    
    
    $sum = 0;
    ?>
     <table class="table" border="1"width="100%">
        <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
               
                <td><img src="admin/images/<?php echo $each['image'] ?>" alt="" height="100px"></td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?> VND</td>
                <td>
                    <?php echo $each['quantity']?>
                </td>
                <td><?php 
                $result =  $each['price'] * $each['quantity'];
                echo $result ;
                $sum +=$result;
                ?></td>
            </tr>
        <?php endforeach ?>    
    </table>
    
</body>
</html>