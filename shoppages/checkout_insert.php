<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<!--  讓mysql顯示中文而不是亂碼     -->
</head>
    <body>
<?php
include('session_check.php');
//session_start();
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
//require_once("connect_db.php");  
//require 'menu.php';

if(!isset($_SESSION['user_id'])){
    header("location:shop.php");
    //echo '請先登入在結帳';
}

  

date_default_timezone_set("Asia/Taipei");
$t = time();
$time = (date("Y-m-d H:i:s"));      //紀錄購買日期
//echo (date("Ymd H:i:s"));
//$time2 = (date("H:i:s"));       //紀錄購買時間
$ship_name = $_POST['ship_name'];   //收件人姓名
$ship_add = $_POST['ship_add'];     //收寄人地址
$ship_tel = $_POST['ship_tel'];    //收件人電話

$user_id = $_SESSION['user_id'];    //需要user_id
$ship_status = 1;                       //運送狀態 1為未繳款
$total_number = $_POST['total_number'];        //購買總數量
$total = $_POST['total'];                   //總金額



$sql_insert ="INSERT INTO buy(buy_date, buy_name, buy_add, buy_phone, buy_money, ship_status_id, user_id) 
VALUES ('$time', '$ship_name','$ship_add','$ship_tel','$total','$ship_status','$user_id')"; 
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_1 = $conn->query($sql_insert) or die('MySQL insert error');


$sql_query = "SELECT * FROM buy WHERE buy_date='$time' AND user_id='$user_id' AND buy_money='$total'";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_2 = $conn->query($sql_query) or die('MySQL query error');
$row = mysqli_fetch_array($result_2);
$buy_id =$row['buy_id'];
$_SESSION['buy_id']=$buy_id;

header("location:checkout_insert_2.php");
?>

    </body>
</html>