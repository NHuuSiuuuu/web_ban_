<?php 

    session_start();

    //truyen id san pham vao len duong link
    require_once 'admin/connect.php';
    
    $id = $_GET['id'];

    if(empty($_SESSION['cart'][$_SESSION['user']][$id])){
    //khi chua co san pham nay trong gio hang => lan dau
        $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result);
        $_SESSION['cart'][$_SESSION['user']][$id]['name'] = $each['name'];
        $_SESSION['cart'][$_SESSION['user']][$id]['image'] = $each['image'];
        $_SESSION['cart'][$_SESSION['user']][$id]['price'] = $each['price'];
        $_SESSION['cart'][$_SESSION['user']][$id]['quantity'] = 1;
    } 
    else {
         //khi da co san pham nay trong gio hang
        $_SESSION['cart'][$_SESSION['user']][$id]['quantity']++;
    }


header('location:view_cart.php');
?>