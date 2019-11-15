<?php
session_start();
//((($_SESSION['user_id']) != ""))
if (!empty($_SESSION['user_id'])) {
    echo "<script>window.location.href='index.php';alert('登出成功。');</script>";
    session_destroy();
    //unset($_SESSION['user_id']);
    //echo '登出成功。';

} else {
    //echo '您原本就已登出。';
    echo "<script>window.location.href='index.php';alert('您原本就已登出。');</script>";
}
?>