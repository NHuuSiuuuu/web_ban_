<?php 
session_start();
if(!isset($_SESSION['level'])){
    header('location:../index.php?error=Bạn đăng nhập sai!');
}
?>