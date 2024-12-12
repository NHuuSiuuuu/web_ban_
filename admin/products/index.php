<?php 
require_once '../checkout_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }


        /* Tiêu đề */
        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Liên kết điều hướng */
        a[href='../index.php'],
        a[href='form_insert.php'] {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            font-size: 14px;
        }

        a[href='../index.php']:hover,
        a[href='form_insert.php']:hover {
            background-color: #0056b3;
        }


        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            background-color: #007BFF;
            color: white;
            text-align: center;
        }

        td {
            background-color: #f2f2f2;
        }



        td a {
            display: inline-block;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            font-size: 13px;
            text-align: center;
        }

        td a[href*='form_update.php'] {
            background-color: #28a745;
        }

        td a[href*='form_update.php']:hover {
            background-color: #218838;
        }

        td a[href*='delete.php'] {
            background-color: #dc3545;
        }

        td a[href*='delete.php']:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>
    <a href="../index.php">Trang chủ</a>
    <h1>Quản lý sản phẩm</h1>
    <a href="form_insert.php">
        Thêm sản phẩm
    </a>

    <?php 

    require_once '../connect.php';
    $sql = "SELECT products.*, classification.name as classification_name  FROM products JOIN classification ON products.id_classify = classification.id";
    $result = mysqli_query($connect,$sql);
    
    ?>
    <table border="1" width="70%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Giá</th>
            <th width="120">Ảnh</th>
            <th>Danh mục</th>
            <th>Chi tiết</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each) { ?>       
            <tr>
                <td><?php echo $each['id']?></td>
                <td><?php echo $each['name']?></td>
                <td><?php echo $each['price']?> VND</td>
                <td>
                    <img src="../images/<?php echo $each['image'] ?>" height="120" width="120">
                </td>
                <td><?php echo $each['classification_name']?></td>
                <td><?php echo $each['detail']?></td>

                <td>
                    <a href="form_update.php?id=<?php echo $each['id']?>">
                        Sửa
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id']?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>