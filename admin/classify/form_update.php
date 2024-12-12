<?php
require_once '../checkout_admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sủa danh mục sản phẩm</title>
    <style>
        /* Reset mặc định */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Form container */
        form {
            width: 350px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Input field */
        form input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }


        /* Nút thêm */
        form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
            ;
        }
    </style>
</head>

<body>
    <?php
    require_once '../connect.php';
    $id = $_GET['id'];  // Lấy tham số `id` từ URL.
    $sql = "SELECT * FROM classification WHERE id = '$id'";
    $result = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($result);    // Lấy dữ liệu từ kết quả truy vấn và lưu vào mảng `$each`.
    ?>
    <form action="process_update.php" method="POST">    <!-- Gửi dữ liệu form đến file `process_update.php`. -->
        <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
        <br>
        <input type="text" name="name" value="<?php echo $each['name'] ?>">
        <br>
        <button>Cập nhật</button>
    </form>
</body>

</html>