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
</script>
<?php
session_start();
require_once("connect_db.php");     
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
    
    if ($row_cnt == 0) {
        
        //header("Location: index.php");
        echo "帳號或密碼錯誤67<br>"."<br>";
        //echo "<script>window.location.href='index.html';alert('帳號或密碼錯誤');</script>";
        //echo $row_cnt;
        echo "帳號或密碼錯誤70<br>";
        //echo .md5($password).;
    }else {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['role_id'] = $row["role_id"];
        $_SESSION['user_name'] = $row["user_name"];
        //$_SESSION['member'] = ['id'= $row["user_id"]
        //header("Location: login_record_ip.php");
        //echo $_SESSION['role'];
        
        if ($_SESSION['role_id'] == 1){
            //echo 54;
            header("Location: management.php");
        }else if ($_SESSION['role_id'] == 2){
            header("Location: index.php");
        }
        
    }
}else {
    //header("Location: index.php");
    echo "帳號或密碼錯誤91";
    //echo "<script>window.location.href='index.php';alert('帳號或密碼錯誤');</script>";
}
?>
