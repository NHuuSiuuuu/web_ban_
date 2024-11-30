<?php
session_start();

$id = $_GET['id'];
$type = $_GET['type'];
if($type === 'decre'){
    if($_SESSION['cart'][$_SESSION['user']][$id]['quantity'] > 1){
        $_SESSION['cart'][$_SESSION['user']][$id]['quantity']--;
    }else{
        unset($_SESSION['cart'][$_SESSION['user']][$id]);
    }
} else {
    $_SESSION['cart'][$_SESSION['user']][$id]['quantity']++;
}

header("location:view_cart.php");
?>