<?php
//require 'menu.php';
session_start();
//session_destroy();
$k=$_GET['k'];
unset($_SESSION['product'][$k]);
echo "所選商品已移出購物車";
//require 'shop_cart.php';
header('location:shop_cart.php');
?>