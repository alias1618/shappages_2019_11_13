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
 <!--   <link href="css/shop-item.css" rel="stylesheet">-->
	<script>

	</script>
</head>

<body>

    <?php 
    include("menu.php");
    ?>
	<form action="shop_insert_cart.php" method="post">
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">食品</h1>
        <div class="list-group">
          <a href="index.php" class="list-group-item">罐頭食品</a>
         <a href="shop_drink.php" class="list-group-item">飲料</a>
         <!--  <a href="#" class="list-group-item">Category 3</a> --> 
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
		$product_category_id = $row01["product_category_id"];
		
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
	

    	<?php //}?>
    	
         <!-- <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Two</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Three</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Four</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Five</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">Item Six</a>
                </h4>
                <h5>$24.99</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>  -->

        </div>
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
    <br>
    <br>
	        <div class="row justify-content-center ">
			<?php

			$sql_query_003 = "SELECT * FROM product WHERE product_id !=$product_id AND product_category_id=$product_category_id AND product_status_id != 3 ORDER BY RAND() LIMIT 5 ";
			$result_003 = $conn->query($sql_query_003) or die("MySQL query error135");
			while($row_003 = mysqli_fetch_array($result_003)){
			    $product_id_003 = $row_003["product_id"];
			    $product_name_003 = $row_003["product_name"];
			    $product_price_003 = $row_003["product_price"];
			    
			    $showimage01="<img src=upload_file/product_photo/";
			    $sql_query_004 = "SELECT * FROM photo WHERE product_id = '$product_id_003' LIMIT 1";
			    $result_004 = $conn->query($sql_query_004) or die("MySQL query error");
			    while ($row_004 = mysqli_fetch_array($result_004)){
			        $product_photo_name_004 = $row_004['product_photo_name'];	
			
   
    	       	?>
    	       	
          <div class="col-lg-2 col-md-2 mb-2 ">
            <div class="card h-100 w-100 border-0">

 
              <div class="card-body ">
				  <a href="shop_detail.php?product_id='<?php echo $product_id_003;?>'"><img class="card-img-top" <?php   echo $showimage01.$product_photo_name_004;?> style="width:40%; display:block; margin:auto;"  alt=""></a>                   		
                <!-- card-title -->
                <br>
                  <h6 class="card-text" align="center"><a href="#" ><?php echo '<a href="shop_detail.php?product_id=',$product_id_003,  '">', $product_name_003, '</a>';?></a></h6>
                <!--  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>-->
              </div>
              <div class="card-footer border-0 bg-white" >

              	<h6 align="center"><?php echo $product_price_003;?>元</h6>
                  <!--  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>-->
              </div>
            </div>
          </div>
<?php 
            		    }
            		 }
?>
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