<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
  <title>商品增加</title>

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
 
        <form action="product_add_insert.php" method="post" enctype="multipart/form-data">
        	商品名稱
        	<input type="text" name="product_name" id="product_name" placeholder=""><br>
        	<br>
        	商品數量
        	<input type="number" name="product_number" id="product_number" placeholder=""><br>
        	<br>
        	商品價格
        	<input type="number" name="product_price" id="product_price" placeholder=""><br>
        	<br>
        	<label>商品描述</label><br>
        	<br>
        	<textarea type="text" name="product_describe" id="product_describe" rows="10" cols="60"></textarea><br>
        	
    		選擇檔案一	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		<br>
        	<input type="submit" value="送出" >
    	</form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>