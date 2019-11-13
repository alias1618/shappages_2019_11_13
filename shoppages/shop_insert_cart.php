<?php

//require 'menu.php';
session_start();
require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
$product_id = $_POST['product_id'];
if (!isset($_SESSION['product'])) {
    $_SESSION['product']=[];
}
$productnumber=0;
//echo '-11-'."".$count;
//echo '-12-'."".$_POST['count'];
if (isset($_SESSION['product'][$product_id])) {
    $productnumber=$_SESSION['product'][$product_id]['productnumber'];
}
//echo '-15-'."".$count;
//echo '-17-'."".$_POST['count'];

$_SESSION['product'][]=[
    'product_id'=>$_POST['product_id'],
     'product_name'=>$_POST['product_name'],
    'product_price'=>$_POST['product_price'],
    'productnumber'=>$_POST['productnumber']
];

//echo '<pre>';print_r($_SESSION['product']);echo '</pre>';
//require 'shop_cart.php';
header("location:shop_cart.php");
?>

