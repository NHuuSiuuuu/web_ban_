<?php 
require_once 'connect.php';


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "select * from admin where email = '$email'
and password = '$password'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) == 1){
    //neu chi tra ve 1 ket qua
    $each = mysqli_fetch_array($result);
    session_start();
    $_SESSION['admin'] = $each['id'];
    $_SESSION['level'] = $each['level'];
    $_SESSION['name'] = $each['name'];
    
    header('location:index.php');

}
header('location:index.php');
?>