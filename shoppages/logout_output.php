<?php
session_start();
require_once("connect_db.php");
//((($_SESSION['user_id']) != ""))
if (!empty($_SESSION['user_id'])) {
    /*
    $user_id = $_SESSION['user_id'];    
    $sql_delete = "DELETE FROM login_data where user_id = $user_id";
    $result = $conn->query($sql_delete) or die('MySQL delete error');
    */
    session_destroy();
    echo "<script>window.location.href='index.php';alert('登出成功。');</script>";
    //unset($_SESSION['user_id']);
    //echo '登出成功。';

} else {
    //echo '您原本就已登出。';
    echo "<script>window.location.href='index.php';alert('您原本就已登出。');</script>";
}
?>