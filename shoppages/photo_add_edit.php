<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once("connect_db.php");
        $product_id = $_GET['product_id'];
        
        $sql_query = "SELECT * FROM product WHERE product_id = '$product_id'";
        mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
        $result = $conn->query($sql_query) or die("MySQL query error");
        $row = mysqli_fetch_array($result);
        //$product_
    ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>圖片修改</title>

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
    	<form action="photo_upload.php" method="post" enctype="multipart/form-data">
    		<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id;?>">
    		上傳圖片<br>
    		<br>
    		選擇檔案一	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		<br>
    		<!-- 
    		選擇檔案二	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		<br>
    		選擇檔案三	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		<br>
    		 -->
    		<input type="submit" value="上傳" name="submit">    		
    	</form>
    	<br>
    	<form >
    	<table border="1">
    	<tr >
    		<?php 
    		$showimage01="<img src=upload_file/product_photo/";
    		$sql_query = "SELECT * FROM photo WHERE product_id = '$product_id'";
    		$result = $conn->query($sql_query) or die("MySQL query error");		
    		while ($row = mysqli_fetch_array($result)){
    		    $product_photo_name = $row['product_photo_name'];
    		
    		?>
    		<td>
				<?php echo $showimage01.$product_photo_name;?> width="200" height="200"
    		</td>
    		<td><a href="photo_delete.php?product_id=<?php echo $product_id;?>&product_photo_name=<?php echo $product_photo_name;?>">刪除圖片</a></td>
    		<?php }?> 
    		<!--  <input type=hidden id=product_id value=<?php //$product_id;?> >	-->	
    	</tr>
    	</table>
    	</form>
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