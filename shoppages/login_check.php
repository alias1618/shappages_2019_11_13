<script type="text/javascript">
	function noaccount()
	{
		alert('帳號錯誤');
		window.location.href='login.php';
		}
	function checktypecode()
	{
		alert('驗證碼錯誤');
		window.location.href='login.php';
		}
	function nopassword()
	{
		alert('密碼錯誤');
		window.location.href='login.php';
		}
	function login_two()
	{
		alert('重複登入');
		window.location.href='login.php';
		}
</script>
<?php
session_start();
require_once("connect_db.php");
$session_id = session_id();
$time = time();
/*
if (empty($_SESSION['role'])){
    header("location:index.php");
}
*/
if ($_POST["typecode"] != $_SESSION["check_code"]){
    echo "<script>checktypecode();</script>";
    //header("Location: index.php");
    return;
}
//echo "typecode".$_POST["typecode"]."<br>";

if ($_POST["account"]) {
    $username = $_POST["account"];
    $_SESSION['account'] = $_POST["account"];
    //echo"<br>"."username".$_POST["account"]."<br>";
}
//echo "account".$_POST["account"]."<br>";
if ($_POST["account"] == ""){
    echo "<script>noaccount();</script>";
    //echo "23"."<br>";
    return;
}
if ($_POST["password"] == ""){
    echo "<script>nopassword();</script>";
    //echo "23"."<br>";
    return;
}
if ($_POST["password"]) {
    $password = $_POST["password"];
    $password = md5($password);
    //echo "password"."<br>".$password."<br>";
}


//echo $password = "<br>".$_POST["password"]."<br>";
//echo "md5password"."<br>".md5($password)."<br>";
if (($username != "") && ($password != "")) {

    
    $sql = "SELECT * FROM user WHERE user_account = '$username' AND user_password = '$password'";
    
    $result = mysqli_query($conn, $sql);
    $row_cnt = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $user_id = $row['user_id'];
    if ($row_cnt == 0) {
        
        //header("Location: index.php");
        echo "帳號或密碼錯誤67<br>"."<br>";
        //echo "<script>window.location.href='index.html';alert('帳號或密碼錯誤');</script>";
        //echo $row_cnt;
        echo "帳號或密碼錯誤70<br>";
        //echo .md5($password).;
    }else {
        //echo 83;
        //檢查重複登入
        $sql_query_02 = "SELECT * FROM login_data WHERE user_id = $user_id";
        $result_02 = $conn->query($sql_query_02) or die('MySQL query error');
        $row_02 = mysqli_fetch_array($result_02);
        $db_session_id = $row_02['session_id'];
        $db_login_time = $row_02['login_time'];
        
        if(empty($db_session_id)){      //第一次登入
            $sql_insert_01 = "INSERT INTO login_data(session_id, login_time, user_id) VALUES ('$session_id', $time,'$user_id')";
            //echo '$session_id'.$session_id.'<br>';
           // echo '$login_time'.$time.'<br>';
           // echo '$user_id'.$user_id;
            $sql_insert_result_01 = $conn->query($sql_insert_01) or die('MySQL insert error_90');
            //echo 97;
            
        }else if($session_id == $db_session_id){    //有登入過而且同樣的session_id
            $sql_update = "UPDATE login_data SET session_id='$session_id', login_time='$time', user_id='$user_id'";
            $sql_update_result = $conn->query($sql_update) or die('MySQL update error');
            //echo 101;
        }else if(($session_id != $db_session_id) && (($time - $db_login_time) < 1200)){ //重複登入
             echo "<script>login_two();</script>";
             return;
             header("Location: index.php");
             
             //echo 104;
        }else if(($session_id != $db_session_id) && (($time - $db_login_time) > 1200)){ //沒有重複登入
            $sql_insert_02 = "INSERT INTO login_data(session_id, login_time, user_id) VALUES ('$session_id','$time','$user_id')";
            $sql_insert_result_02 = $conn->query($sql_insert_02) or die('MySQL insert error_99');
            //echo 108;
        }
        //echo 110;
        //登入部分
        //echo $row;
        //$row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['role_id'] = $row['role_id'];
        $_SESSION['user_name'] = $row['user_name'];
        //$_SESSION['member'] = ['id'= $row["user_id"]
        //header("Location: login_record_ip.php");
        //echo $_SESSION['role'];
        //echo 119;
        if ($_SESSION['role_id'] == 1){
            //echo 121;
            header("Location: management.php");
        }else if ($_SESSION['role_id'] == 2){
            header("Location: index.php");
            //echo $session_id;
        }
        echo 127;
    }
    }else {
    //header("Location: index.php");
    echo "帳號或密碼錯誤91";
    //echo "<script>window.location.href='index.php';alert('帳號或密碼錯誤');</script>";
}
?>
