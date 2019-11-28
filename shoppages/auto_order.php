<?php
require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼

//產生過去時間
/*
$Y=2019;
$m=9;
$d=date(d);
$H=rand(0,23);
$i=rand(0,59);
$s=rand(0,59);
//$H=date(H);
//$i=date(i);
//$s=date(s);
$buy_date;
*/
//產生過去時間
$Y=2019;        //年
$m=11;           //月
$date_max=16;           //日-1
//$order_number_01=rand(200,300);   //一天order數量  關閉
$old_date="";
//for($x=9; $x<10; $x++){

//$m=rand(9,11);

for($a=1;$a<$date_max;$a++){
    $d=$a;
    
    for($z=1;$z<$order_number_01;$z++){

        $H=rand(1,23);

        $i=rand(1,59);
        $s=rand(1,59);
        //"Y-m-d H:i:s"
        //"Y年m月d日H時i分s秒"
        $old_date =  date( "Y-m-d H:i:s", mktime($H,$i,$s,$m,$d,$Y) );
        //echo '$i'.$i.'<br>';
        //echo $old_date.'<br>';       
       

$buy_date=$old_date;


//需要隨機抓取帳號
$user_id = rand(9473,9952);

$sql_query_01 = "SELECT * FROM user WHERE user_id='$user_id'";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_01 = $conn->query($sql_query_01) or die("MySQL query error_01");
$row_01 = mysqli_fetch_array($result_01);
$user_account = $row_01['user_account'];
$user_email = $row_01['user_email'];
$user_name = $row_01['user_name'];
$user_phone = $row_01['user_phone'];
$user_postcode = $row_01['user_postcode'];
$user_add = $row_01['user_add'];

//buy_date
//buy_name
//buy_add
//buy_phone
//buy_number

//buy_date  訂單日期為9/1 ~ 11/15
$buy_name = $user_name;     //購買人姓名
$buy_add = $user_add;       //購買人地址
$buy_phone = $user_phone;   //購買人電話


//需要隨機選擇商品
$product_id = rand(0,26);

$sql_query_02 = "SELECT * FROM product WHERE product_id='$product_id'";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_02 = $conn->query($sql_query_02) or die("MySQL query error_02");
$row_02 = mysqli_fetch_array($result_02);
$product_id = $row_02['product_id'];
$product_name = $row_02['product_name'];
$product_number = $row_02['product_number'];
$product_price = $row_02['product_price'];
$product_buy_price = $row_02['product_buy_price'];

//需要隨機抓取商品數量
//一個帳號買一個商品

//buy_number    //購買數量
$buy_number = rand(1,10);
$buy_money = $product_price*$buy_number;
$ship_status_id = 1;    //  運送狀態

//產生訂單塞入資料庫

//塞入buy table
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$sql_insert_01 = "INSERT INTO buy
(buy_date, buy_name, buy_add, user_id, buy_phone, buy_money, ship_status_id) VALUES 
('$buy_date', '$buy_name', '$buy_add', '$user_id','$buy_phone', '$buy_money','$ship_status_id')";
$result_01 = $conn->query($sql_insert_01) or die('MySQL insert error_01');


//塞入buy_detail  table

$sql_query_03 = "SELECT * FROM buy WHERE user_id='$user_id' AND buy_date='$buy_date' AND buy_money='$buy_money'";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_03 = $conn->query($sql_query_03) or die("MySQL query error_03");
$row_03 = mysqli_fetch_array($result_03);
$buy_id = $row_03['buy_id'];


$sql_insert_02 = "INSERT INTO buy_detail
(buy_id, product_id, product_price, product_name, buy_number) VALUES
('$buy_id', '$product_id', '$product_price', '$product_name','$buy_number')";
$result_02 = $conn->query($sql_insert_02) or die('MySQL insert error_02');

//將訂單塞入資料庫
    }
}

header('location:index.php');
?>