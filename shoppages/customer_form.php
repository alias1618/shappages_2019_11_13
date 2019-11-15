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
 
        <form action="customer_form_insert.php" method="post" >
        <!--<input type="hidden" name="id" value="<?php //echo $user_id?>" />-->
        
        <!--
        	姓名
        	<input type="text" name="product_name" id="product_name" placeholder=""><br>
        	<br>
        	  
        	商品數量
        	<input type="number" name="product_number" id="product_number" placeholder=""><br>
        	<br>
        	商品價格
        	<input type="number" name="product_price" id="product_price" placeholder=""><br>
        	<br>
        	-->
        	<!--  
        	商品類別
        	<select name="product_type" id="product_type" >
        		<option value="0"></option>
        		<option value="1">罐頭</option>
        		<option value="2">飲料</option>
        		<option value="3">零食</option>
        		<option value="4">醬料</option>
        		<option value="5">冷凍食品</option>
        	</select>
        	<br>
        	<br>
        	-->
        	<div align="center">
        	<label>問題描述</label><br>
        	<br>
        	<textarea type="text" name="question_describe" id="question_describe" rows="10" cols="60" ></textarea><br>
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