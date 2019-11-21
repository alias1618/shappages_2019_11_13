<!DOCTYPE html>
<html lang="en">

<head>
<?php 
session_start();
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
  <title>客服</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
include("menu.php");

require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");

if(empty($_SESSION['user_id'])){
    //echo "<script>checklogin();</script>";
    echo "<script>window.location.href='index.php';alert('請先登入');</script>";
}
$user_id = $_SESSION['user_id'];

?>
 	<!-- <input type=button value="回到管理頁面" onclick="location.href='management.php'"></input> -->
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
 
        <form action="send_new.php" method="post" >
        <input type="hidden" name="id" value="<?php echo $user_id?>" />
        <div align="center">
        	<!--  
        	<label>姓名</label>
        	<br>
        	<input id="C_name" name="C_name" type="text" /></input><br>
        	<br>
        	  
        	<label>您的Email</label>
        	<br>
        	<input id="C_email" name="C_email" type="text" /></input><br>
        	<br>
        	<label>您的電話號碼</label>
        	<br>
        	<input id="C_tel" name="C_tel" type="text" /></input>
        	<br>
            -->
        	<label>問題描述</label><br>
        	<br>
        	<textarea id="C_message" name="C_message" rows="10" cols="60" ></textarea><br>
        	<!--  
    		選擇檔案一	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		-->
    		<br>
    		
        	<input type="submit" value="送出" >
        	</div>
    	</form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>