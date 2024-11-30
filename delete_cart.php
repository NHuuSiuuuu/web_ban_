<?php 
session_start();
$id = $_GET['id'];

unset($_SESSION['cart'][$_SESSION['user']][$id]);
header("location:view_cart.php");
?>