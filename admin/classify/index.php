<?php
require_once '../checkout_admin.php';

require_once '../connect.php';
$sql = "SELECT * FROM classification";
$result = mysqli_query($connect, $sql);
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
            background-color: #f9f9f9;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            color: #0056b3;

        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }

        a[href='../index.php'],
        a[href='form_insert.php'] {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
        }

        a[href='../index.php']:hover,
        a[href='form_insert.php']:hover {
            background-color: #0056b3;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 70%;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        td {
            background-color: #f2f2f2;
        }

        td a {
            display: inline-block;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
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
    <h1>Quản Lý Danh Mục Sản Phẩm</h1>

    <a href="form_insert.php">Thêm</a>
    <br>
    <table border="1" width="50%">
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php foreach ($result as $each) { ?>   <!-- Lặp qua từng dòng dữ liệu từ kết quả truy vấn -->
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['name'] ?></td>
                <td>
                    <a href="form_update.php?id=<?php echo $each['id'] ?>">
                        Sửa
                    </a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo $each['id'] ?>">
                        Xóa
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>