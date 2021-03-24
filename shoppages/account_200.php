<?php
require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
$account_number = 10;

//for ($z=0;$z<$account_number;$z++) {
    

    include('create_account.php');
    include('create_phone.php');
    include('create_addr.php');
    
    
    $user_account =  $account ;
    $user_password = md5($account) ; //md5
    $user_email = $account.'@gmail.com';
    $user_name =  $account ;
    $user_phone = $number;
    $user_add = $addr;
    $postcode = rand(100,999);
    $user_postcode = $postcode;
    
    $role_id=2;
    //Insert
    
    $sql_insert = "INSERT INTO user(user_account, user_password, user_email, user_name,
     user_phone, user_add, role_id, user_postcode) VALUES 
    ('$user_account', '$user_password', '$user_email', '$user_name', '$user_phone', 
    '$user_add', '$role_id', '$user_postcode')";
    mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
    $result = $conn->query($sql_insert) or die('MySQL insert error');
    

//}

header('location:index.php');
//exit;
?>