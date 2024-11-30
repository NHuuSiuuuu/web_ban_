<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Theo dõi đơn hàng</title>
 <style></style>
</head>

<body>
    <?php
    session_start();

    require_once 'admin/connect.php';
    if (empty($_SESSION['user'])) {
        header("location:index.php?error=Bạn phải đăng nhập");
    }
    $user = $_SESSION['user'];
    $sql = "select orders.*,
    users.name,
    users.phone,
    users.address 
    from orders join users on users.id = orders.user_id where user_id = '$user'";
    $result = mysqli_query($connect, $sql);

    ?>
    <a href="index.php">
        Trang chủ
    </a>
    <table border="1" width="100%">
        <tr>
            <th>Mã</th>
            <th>Thời gian đặt</th>
            <th>Thông tin người nhận</th>
            <th>Thông tin người đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Phương thức thanh toán</th>
            <th>Xem</th>
            <td>Xóa</td>
        </tr>
        <?php foreach ($result as $each): ?>
            <tr>
                <td><?php echo $each['id'] ?></td>
                <td><?php echo $each['created_at'] ?></td>
                <td>
                    <?php echo $each['name_receiver'] ?>
                    <br>
                    <?php echo $each['phone_receiver'] ?>
                    <br>
                    <?php echo $each['address_receiver'] ?>
                </td>
                <td>
                    <?php echo $each['name'] ?>
                    <br>
                    <?php echo $each['phone'] ?>
                    <br>
                    <?php echo $each['address'] ?>
                </td>
                <td><?php echo $each['total_price'] ?> VND</td>
                <td>
                    <?php
                    switch ($each['status']) {
                        case '0':
                            echo 'Chờ phê duyệt!';
                            break;
                        case '1':
                            echo 'Phê duyệt! Đơn hàng sẽ sớm được giao';
                            break;
                        case '2':
                            echo 'Bị hủy';
                            break;
                    }
                    ?>

                </td>
                <td><?php echo $each['pays'] ?></td>
                <td>
                    <a href="detail_order_client.php?id=<?php echo $each['id'] ?>">
                        Xem
                    </a>
                </td>
                <td>
                    <a href="delete_order_client.php?id=<?php echo $each['id'] ?>">
                        Hủy
                    </a>
                </td>

            </tr>
        <?php endforeach ?>
    </table>



</body>

</html>