<?php
session_start();
require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
$user_id = $_SESSION['user_id'];
$question_describe = $_POST['question_describe'];

date_default_timezone_set("Asia/Taipei");
$time = (date("Y-m-d H:i:s"));      //紀錄時間

$sql_insert ="INSERT INTO customer_form(customer_form_question, customer_form_time, user_id)
VALUES ('$question_describe', '$time','$user_id')";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result_1 = $conn->query($sql_insert) or die('MySQL insert error');

echo "<script>window.location.href='index.php';alert('客服問題已提出');</script>";
?>