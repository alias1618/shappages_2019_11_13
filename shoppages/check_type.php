<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>收件人資料輸入</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
				<script>
		function allcheck(){
			if (checkname () == false){
				return false;
			}else if (checkname () == false){
				return false;
			}else if (checkadd () == false){
				return false;
				}
			return true;
			};
		//檢查收件人姓名
		function checkname(){
			var name = document.getElementById("ship_name").value;
			if (!(name == "")){
				document.getElementById("shipnameAlert").innerHTML = "";
				return true;
			}else{
				document.getElementById("shipnameAlert").innerHTML = "<font color=red><b>收件人姓名不能為空白</b></font>";
    			//alert('收件人姓名不能為空白');
    			return false;
			}
				
		};
		//檢查收件人電話
		function checkPhone(){
		//var n = document.getElementById("nn").value;
			var phonenumber = document.getElementById("ship_tel").value;
			//var phonenumber = "0933123456";
			//台灣手機號碼檢查
			var patten = new RegExp(/^[0]{1}[9]{1}[0-9]{4}[0-9]{4}$/);
			//var patten = new RegExp(/^[0]{1}[9]{1}[9]{4}[0]{4}$/);
			if ((phonenumber.match(patten))){
				//parent.checkadd().location.reload();
								document.getElementById("shiptelAlert").innerHTML = "";
				return true;
			}else{
				document.getElementById("shiptelAlert").innerHTML = "<font color=red><b>不符合台灣手機格式</b></font>";
				//alert('不符合台灣手機格式');
				return false;

			}
		};
		//檢查收件人地址
		function checkadd(){
			var add = document.getElementById("ship_add").value;
			if (!(add == "")){
				document.getElementById("shipaddAlert").innerHTML = "";
				return true;
			}else{
    			document.getElementById("shipaddAlert").innerHTML = "<font color=red><b>收件人地址不能為空白</b></font>";
    			//alert('收件人地址不能為空白');
    			return false;
			}
		};
		
		</script>
</head>

<body>

 <?php 
 include('session_check.php');
 include("menu.php");
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
		<label>請輸入收件人資料</label>
		<br>
		<br>
		<form method="post" action="checkout_detail.php" onsubmit="return allcheck();">
    	<label>收件人姓名</label>
    		<p><input type="text" name="ship_name" id="ship_name" placeholder="姓名" onblur="checkname();"></p>
			<div id="shipnameAlert"></div>
    	<label>收件人電話</label>
    		<p><input type="text" name="ship_tel" id="ship_tel" placeholder="電話" onblur="checkPhone();"></p>
			<div id="shiptelAlert"></div>
    	<label>收寄人地址</label>
    		<p><input type="text" name="ship_add" id="ship_add" placeholder="地址" style="width:30em" onblur="checkadd();"></p>
			<div id="shipaddAlert"></div>
    		
			<input type=hidden id="productnumber" name="productnumber" value=<?php //echo $_POST['productnumber']?>>
		<p><input type="submit" ></p>
		</form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>