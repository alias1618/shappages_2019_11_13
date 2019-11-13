<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>訂單明細</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">台灣超市</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">商品
              <span class="sr-only">(current)</span>
            </a>
             </li>
          <li class="nav-item">
            <a class="nav-link" href="management.php">庫存管理</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="order_management.php">訂單管理</a>
          </li>
	        <li class="nav-item">
            <a class="nav-link" href="login.php">登入</a>
          </li>
	        <li class="nav-item">
            <a class="nav-link" href="logout_input.php">登出</a>
          </li>
	        <li class="nav-item">
            <a class="nav-link" href="regist.php">會員註冊</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
   		<table border="1" align="center">
			<tr>
				<td align="center">商品名稱</td>
				<td align="center">商品價格</td>
				<td align="center">購買數量</td>
			</tr>  
  		<?php 
		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
		  $buy_id = $_REQUEST['buy_id'];
  
            $sql_query02 = "SELECT * FROM buy_detail WHERE buy_id='$buy_id'";
            mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
            $result02 = $conn->query($sql_query02) or die("MySQL query error");
            while($row02 = mysqli_fetch_array($result02)){
                $product_name = $row02["product_name"];
                $product_price = $row02["product_price"];
                $buy_number = $row02["buy_number"];
                ?>

            <tr>             
                <td align="center"><?php echo $product_name;?> </td>
                <td align="center"><?php echo $product_price;?> </td>
                <td align="center"><?php echo $buy_number;?> </td>
			</tr>

 <?php            }
?>	
			</table>	
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>