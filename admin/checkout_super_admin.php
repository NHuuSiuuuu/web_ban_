<?php 
session_start();
// if(!isset($_SESSION['level']) || $_SESSION['level'] !==1 )
if(empty($_SESSION['level'])){
    // 0 la trong
    header('location:../index.php');
}
?>