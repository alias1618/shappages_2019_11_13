<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
		<?php 
		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼

		?>
  <title>商品細節</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
	<script>

	</script>
</head>

<body>
	<form action="shop_insert_cart.php" method="post">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
            <a class="nav-link" href="shop_cart.php">購物車</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">結帳</a>
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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">食品</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">罐頭食品</a>
        <!--  <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a> --> 
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
      <div class="card mt-4">
      <div class="card-body">
		<?php 
		
		$product_id=$_GET['product_id'];
		
		$sql_query01 = "SELECT * FROM product WHERE product_id = $product_id";
		mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
		$result01 = $conn->query($sql_query01) or die("MySQL query error");
		while($row01 = mysqli_fetch_array($result01)){
		$product_id = $row01["product_id"];
		$product_name = $row01["product_name"];
		$product_status_id = $row01["product_status_id"];
		$product_number = $row01["product_number"];
		$product_price = $row01["product_price"];
		$product_describe = $row01["product_describe"];
		
		$showimage01="<img src=upload_file/product_photo/";
		$sql_query02 = "SELECT * FROM photo WHERE product_id = '$product_id'";
		$result02 = $conn->query($sql_query02) or die("MySQL query error");		
		while ($row02 = mysqli_fetch_array($result02)){
		    $product_photo_name = $row02['product_photo_name'];	
		
		    ?>
        
          <img class="card-img-top img-fluid" <?php echo $showimage01.$product_photo_name; ?> style="width:20%" >
          <?php }?>
          
          
          <input type=hidden id=product_id value=<?php echo $product_id;?>>
            <h3 class="card-title"><?php echo  $product_name;?></h3>
            <h4><?php echo  $product_price;?> 元</h4>
            <p class="card-text"><?php echo  nl2br($product_describe);?></p>
            <select name="productnumber">
                	
    	<?php 
    	if(($product_number == 0) || ($product_status_id == 2)){
    	    $buy_number = 0;
    	    $nonumber = "缺貨中"; 

    	}else if ($product_number > 5){
    	    $buy_number = 5;
    	}else{
    	    $buy_number = $product_number;
    	}
    	for($i=1;$i <= $buy_number; $i++){
    	    ?>
    	    <option value="<?php echo $i;?>"> <?php echo $i;?> </option>
    	    <?php 
    	}
    	?></select>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          
          <div ><?php if(!empty($nonumber)){echo $nonumber;}?></div>
              	<input type=hidden name="product_id" value="<?php echo $product_id;?>">
    	<input type=hidden name="product_name" value="<?php echo $product_name;?>">
    	<input type=hidden name="product_price" value="<?php echo $product_price;?>">
    	<br>
    	<p><input type=submit  value="放入購物車"></p>
        </div>
        <!-- /.card -->
	<?php 
		
	}
	?>	
	
	
        <!--  <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div>-->
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</form>

</body>

</html>