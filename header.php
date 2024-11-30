<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./font/fontawesome-free-6.4.2-web/css/all.min.css">
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        #header {
            /* margin-left: 5px;
            margin-right: 10px; */
            padding: 0;
            width: 100%;
            height: 100px;
            background-image: url("./assets/img/header2.png");
            margin-top: -15px;
            display: flex;
            align-items: center;
            font-size: 20px;
            /* position: fixed; */
            top: 0;
            left: 0;
            right: 0;
        }

        #header ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        #header ul li {
            margin: 0 10px;
            padding: 30px;
        }

        #header ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: 800;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            width: 50px;
            margin-right: 10px;
        }

        .logo h2 {
            margin: 0;
            color: #fff;
        }

       
    </style>
</head>

<body>
    <div id="header">
        <ul>
            <li>
                <div class="logo">
                    <!-- <img  src="./assets/img/logo-green.svg" alt="" style="height:50px; width:50px;"> -->
                    <img src="./assets/img/logo-green.svg" alt="" style="height: 50px; width: 50px; filter:brightness(0) invert(1);">


                    <h2>Trees</h2>
                </div>
            </li>
            <li>
                <a href="index.php">Trang chủ</a>
            </li>
            <?php if (empty($_SESSION['user'])) { ?>
                <li>
                    <a href="login.php">Đăng nhập</a>
                </li>

                <?php } else { ?>
                   
                <li>
                    <a href="logout.php">Đăng xuất</a>
                </li>
                <li>
                    <a href="view_cart.php">Giỏ hàng</a>
                </li>
            <?php } ?>

            <li>
                <a href="polici.php">
                    Chính sách
                </a>
            </li>
            <li>
                <a href="cart_show.php">
                    Đơn hàng
                </a>
            </li>
            <li class="user-menu">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                </a>

            </li>

        </ul>
    </div>
</body>

</html>