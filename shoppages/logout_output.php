<?php
session_start();
if ((($_SESSION['user_id']) != "")) {
    session_destroy();
    //unset($_SESSION['user_id']);
    //echo '登出成功。';
    echo "<script>window.location.href='index.php';alert('登出成功。');</script>";
} else {
    //echo '您原本就已登出。';
    echo "<script>window.location.href='index.php';alert('您原本就已登出。');</script>";
}
?>