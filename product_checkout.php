<?php 
$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];
$pays = $_POST['pays'];

require_once 'admin/connect.php';
session_start();

$cart = $_SESSION['cart'][$_SESSION['user']];

$user_id = $_SESSION['user'];

$total_price = 0;

foreach($cart as $each){
    $total_price += $each['quantity'] * $each['price'];
}

$status = 0;//moi dat

$sql = "insert into orders(user_id,name_receiver,phone_receiver,address_receiver,status,total_price,pays) 
values ('$user_id','$name_receiver','$phone_receiver','$address_receiver','$status','$total_price','$pays')";
mysqli_query($connect,$sql);

$sql = "select max(id) from orders where user_id = '$user_id'";
// 1 nguyoi dat hang cung luc 2 lan
$result = mysqli_query($connect,$sql);
$order_id = mysqli_fetch_array($result)['max(id)'];

foreach($cart as $product_id => $each){
    $quantity = $each['quantity'];
    $sql = "insert into order_product(order_id,product_id,quantity)
    values('$order_id','$product_id','$quantity')";
    mysqli_query($connect,$sql);
}
mysqli_close($connect);
unset($_SESSION['cart']);

header('location:index.php');
?>