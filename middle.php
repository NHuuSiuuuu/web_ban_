<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        #middle {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* CSS cho phần tìm kiếm */
        .search-form-container {
            margin-bottom: 30px;
            text-align: center;
        }

        .search-form input[type="search"] {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 25px;
            width: 300px;
            font-size: 16px;
        }

        .search-form input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .search-form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* CSS cho sản phẩm */
        .product {
            text-align: center;
            margin-bottom: 30px;
            border: 1px solid #ccc;
            padding: 15px;
            width: 220px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
            margin-left: 20px;
        }

        .product:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .product h5 {
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .product img {
            width: 150px;
            height: 150px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .product p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #007bff;
        }

        .product a {
            display: block;
            margin-bottom: 10px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .product a:hover {
            color: #0056b3;
        }

        /* CSS cho phân trang */
        #middle a {
            text-decoration: none;
            margin-right: 15px;
            font-size: 18px;
            color: #007bff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        #middle a:hover {
            color: #0056b3;
        }

        .pagination {
            text-align: center;
            margin-top: 30px;
        }
    </style>

</head>

<body>
    <?php

    require_once 'admin/connect.php';
    $page = 1;

    if (isset($_GET['page'])) {
        //neu co so trang duoc gui len
        $page = $_GET['page'];
    }

    $search = '';

    // cho mac dinh $tim_kiem la chuoi rong
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    $classify = '';
    if (isset($_GET['classify'])) {
        $search = $_GET['classify'];
    }

    $sql_total_product = "select count(*) from products where name like '%$search%' ";
    //lay ra so phan tu trong bang products neu co tim kiem kem theo tim kiem con khong thi tim kiem mac dinh = ''

    $array_product = mysqli_query($connect, $sql_total_product);
    //ket noi cau lenh vs database

    $result_total_product = mysqli_fetch_array($array_product);
    //lay ra phan tu dau tien du no chi co 1

    $number_of_product = $result_total_product['count(*)'];
    //lay ra gia tri

    $product_in_one_page = 4;
    //khai bao so san pham 1 trang

    $total_page = ceil($number_of_product / $product_in_one_page); //lam tron so trang

    $next = $product_in_one_page * ($page - 1);
    //bo qua bang so tin tuc 1 trang * so trang hien tai - 1



    // $sql = "select * from products
    //  where name like '%$search%' limit $product_in_one_page offset $next";
    //in ra 1 trang co gioi han 4 san pham

    $sql = "SELECT products.*, classification.name AS classification_name 
        FROM products
        JOIN classification ON products.id_classify = classification.id
        WHERE products.name LIKE '%$search%' 
        LIMIT $product_in_one_page 
        OFFSET $next";
    $result = mysqli_query($connect, $sql);
    //can tra ve ket qua de dung de in ra
    ?>

    <div id="middle">
        <div class="search-form-container">
            <form action="" class="search-form" style="margin-bottom:20px">
                <input type="search" name="search" value="<?php echo $search ?>">
                <input type="submit" value="Tìm kiếm">
            </form>
        </div>
        <?php foreach ($result as $each): ?>
            <div class="product">
                <h5>
                    <?php echo $each['name'] ?>
                </h5>
                <img src="admin/images/<?php echo $each['image'] ?>" alt="" height="150px" width="150px">
                <p> <?php echo number_format($each['price'], 0, ',', '.') ?> VND </p>
                <a href="detail_product.php?id=<?php echo $each['id'] ?>">
                    Xem chi tiết
                </a>
                <br>
                <a href="category.php?id=<?php echo $each['id_classify'] ?>">
                    <?php echo $each['classification_name'] ?>
                </a>

                <br>
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href="add_cart.php?id=<?php echo $each['id'] ?>">
                        Thêm vào giỏ hàng
                    </a>
                <?php } ?>
            </div>
        <?php endforeach ?>
        <br>
        <br>
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
            <a style="text-decoration:none;" href="?page=<?php echo $i ?>&search=<?php echo $search ?>">
                <?php echo $i ?>
            </a>
        <?php } ?>
        <?php mysqli_close($connect) ?>
    </div>
</body>

</html>