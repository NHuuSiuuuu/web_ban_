<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['name']);//xoa dia chi vung nho tren sever
setcookie('remember',null,-1);
//khi dang xuat => xoa luon cookie
header('location:index.php');
?>