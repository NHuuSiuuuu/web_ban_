<?php 
session_start();
unset($_SESSION['admin']);
unset($_SESSION['name']);
unset($_SESSION['level']);
header('location:index.php');
?>