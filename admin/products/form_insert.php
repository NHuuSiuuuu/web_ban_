<?php 
require_once '../checkout_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style>
        /* Reset mặc định */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Form container */
        form {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Tiêu đề và nhãn */
        form label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            display: inline-block;
        }

        form input[type="text"],
        form input[type="file"],
        form select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Nút gửi */
        form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #0056b3;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
    require_once '../connect.php';
    $sql = "SELECT * FROM classification";  // lẤY tất cả danh mục sảm phẩm
    $result = mysqli_query($connect,$sql);  // Thực hiện câu truy vấn

    ?>
    <form action="process_insert.php" method="POST" enctype="multipart/form-data">  <!-- enctype="multipart/form-data"> : Bắt buộc để gửi dữ liệu file như ảnh -->
        Tên 
        <input type="text" name="name">
        <br>
        Giá
        <input type="text" name="price">
        <br>
        Ảnh
        <input type="file" name="image">
        <br>
        <textarea name="detail" rows="4" style="width: 100%;"></textarea>
        <br>
        Danh mục
        <select name="id_classify" >
            <?php foreach ($result as $each) { ?>   <!-- Lặp qua các danh mục sản phẩm -->
                <option value="<?php echo $each['id']?>">   <!--  Lấy id danh mục sảm phẩm  -->
                    <?php echo $each['name']?>
                </option>
            <?php } ?>
        </select>
        <br>
        <button>Thêm</button>
    </form>
</body>
</html>