<!DOCTYPE html>
<html lang="en">

<head>
<?php 
    require_once ("connect_db.php");
    $product_id = $_GET["product_id"];
    header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

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
 	<!--  <input type=button value="回到管理頁面" onclick="location.href='management.php'"></input>-->
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
    <?php 
    header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
    mysqli_set_charset($conn, "utf8");  //讓php顯示中文而不是亂碼
        $sql_query = "SELECT * FROM product WHERE product_id = $product_id";
        $result = $conn->query($sql_query) or die("MySQL query error");
        $row = mysqli_fetch_array($result);
        $product_name = $row["product_name"];
        $product_number = $row["product_number"];
        $product_price = $row["product_price"];
        $product_describe = $row["product_describe"];
    ?>
        <form action="product_edit_update.php" method="post">
        	<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>">
        	商品名稱
        	<input type="text" name="product_name" id="product_name" value="<?php echo $product_name;?>"><br>
        	<br>
        	商品數量
        	<input type="number" name="product_number" id="product_number" value="<?php echo $product_number;?>"><br>
        	<br>
        	商品價格
        	<input type="number" name="product_price" id="product_price" value="<?php echo $product_price;?>"><br>
        	<br>
        	商品描述
        	<br>
        	<textarea type="text" name="product_describe" id="product_describe" rows="15" cols="60" ><?php echo $product_describe;?></textarea><br>
        
        	<input type="submit" value="更新">
        <p></p>
        <?php
    
    	?>
    	</form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>