<!DOCTYPE html>
<html lang="en">

<head>
<?php 
session_start();
ini_set('session.cookie_lifetime', 0);
ini_set('session.gc_maxlifetime', 3600);
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>登入</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
include("menu.php");

require_once ('connect_db.php');
 //$user_id=$_SESSION['user_id'];
if(isset($_SESSION['user_id'])){
    //echo "<script>checklogin();</script>";
    echo "<script>window.location.href='index.php';alert('登入過了');</script>";
}

?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"></h1>
        <p class="lead"></p>
        <ul class="list-unstyled">
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
  <form method="post" action="login_check.php">
    	<div class="col-lg-12 text-center">
    	<label>帳號</label>
    		<p><input type="text" name="account" id="account" placeholder="帳號"></p>
    	<label>密碼</label>
    		<p><input type="password" name="password" id="password" placeholder="密碼"></p>
    	<label>驗證碼</label>
    	<div><img id="captCode" src="/shoppages/code_born.php" onclick="refresh_code()">
    			<input type=button value="更換驗證碼" onclick="refresh_code()"></div>
    			<br>
    	<!--  <a href="javascript:void(0)" onclick="document.getElementById(‘captCode‘).src=‘code_born.php?=<?php //echo rand();?>‘">點擊切換？</a>-->
    		<p><input type="text" name="typecode" id="typecode" placeholder="驗證碼"></p>
			<a href="regist.php" class="txt1">
			註冊
		</a>
		<input type="submit" >
		</div>
		
</form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		function refresh_code(){
			document.getElementById("captCode").src="code_born.php";
			}
	</script>
</body>

</html>