<?php 
require_once '../checkout_admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        form {
            width: 450px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
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

        form label {
            font-size: 14px;
            margin-bottom: 5px;
            display: inline-block;
        }

        form img {
            display: block;
            margin: 10px 0;
            max-width: 100%;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            padding: 5px;
        }

        form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php 
    require_once '../connect.php';
    $id = $_GET['id'];
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect,$sql);
    $each = mysqli_fetch_array($result);

    $sql1 = "select * from classification";
    $classify = mysqli_query($connect,$sql1);

    ?>
    <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id']?>">
        <br>
        Tên 
        <input type="text" name="name" value="<?php echo $each['name']?>">
        <br>
        Giá
        <input type="text" name="price" value="<?php echo $each['price']?>">
        <br>
        Ảnh mới
        <input type="file" name="new_image">
        <br>
        Ảnh cũ
        <img src="../images/<?php echo $each['image'] ?>" alt="" height="150">
        <input type="hidden" name="old_image" value="<?php echo $each['image'] ?>">
        <br>
        Chi tiết sản phẩm
        <textarea name="detail" rows="4" style="width: 100%;"><?php echo $each['detail'] ?></textarea>
        <br>
        Danh mục 
        <select name="id_classify">
            <?php foreach ($classify as $class) { ?>
                <option value="<?php echo $class['id']?>"
                <?php if($each['id_classify'] === $class['id']){ ?>
                    selected
                <?php } ?> 
                >
                   <?php echo $class['name']?>
                </option>
            <?php } ?>
        </select>
        <button>Cập nhật</button>
    </form>
</body>
</html>