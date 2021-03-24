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
  <title>台灣超市</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <!--  <link href="css/shop-homepage.css" rel="stylesheet">-->

</head>

<body>
 <?php 
include("menu.php");
?>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">食品</h1>
        <div class="list-group">
          <a href="index.php" class="list-group-item">罐頭食品</a>
           <a href="shop_drink.php" class="list-group-item">飲料</a>
         <!--  <a href="#" class="list-group-item">Category 3</a>-->
        </div>

      </div>
      <!-- /.col-lg-3 -->

       <div class="col-lg-9">

        <!--  --><div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" ></li>
             <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
                    <div class="carousel-inner" role="listbox">
          		<?php 
          		$counter=0;
    		$sql_query03 = "SELECT * FROM product WHERE product_category_id = 2 AND product_status_id != 3 ORDER BY RAND() LIMIT 10 ";
    		$result03 = $conn->query($sql_query03) or die("MySQL query error135");
    		while($row03 = mysqli_fetch_array($result03)){
		    $product_id = $row03["product_id"];
		    //$product_status_id = $row03["product_status_id"];
		    //if($product_status_id != 3){
		    $showimage01="<img src=upload_file/product_photo/";
		    $sql_query04 = "SELECT * FROM photo WHERE product_id = '$product_id' LIMIT 1";
		    $result04 = $conn->query($sql_query04) or die("MySQL query error");
		    while ($row04 = mysqli_fetch_array($result04)){
		        $product_photo_name04 = $row04['product_photo_name'];	
		        
		?>

            <div class="carousel-item <?php if($counter < 1){echo " active"; } ?>" style="background-color:#FFFFFF;padding:60px;margin-bottom:20px;">
            
              <a href="shop_detail.php?product_id='<?php echo $product_id;?>'"><img class="d-block img-fluid" <?php  echo $showimage01.$product_photo_name04;?> style="width:30%; display:block; margin:auto;" 
              alt=""></a>

            </div>
        

 <?php 
 $counter++;       
		      }
		    }
		//}
?>      
      
<!--
            <div class="carousel-item">
              <img class="d-block img-fluid" <?php  //echo $showimage01.$product_photo_name;?> style="width:30%; display:block; margin:auto;" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="upload_file/product_photo/fgyu6ghn45257.jpg" style="width:30%; display:block; margin:auto;" alt="Third slide">
            </div>
          </div>
          -->
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
			<?php
			$sql ="SELECT * FROM product WHERE product_category_id = 2 AND product_status_id != 3 ";
			$result_001 = $conn->query($sql) or die("MySQL query error");
			
			$data_nums = mysqli_num_rows($result_001);   //統計總比數
			//echo '$data_nums='.$data_nums.'<br>';
			$per = 12;   //每頁顯示項目數量
			$pages = ceil($data_nums/$per); //取的不小於值的下一個整數
			//echo '$pages'.$pages.'<br>';
			if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
			    $page=1; //則在此設定起始頁數
			} else {
			    $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
			}
			
			$start = ($page-1)*$per;   //每一頁開始的資料
			//echo '$start'.$start.'<br>';
			//echo '$per'.$per.'<br>';
			
			$sql_query01 = "SELECT * FROM product WHERE product_category_id = 2 AND product_status_id != 3"; //!=
			mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			$result01 = $conn->query($sql_query01.' LIMIT '.$start.', '.$per) or die("MySQL query error135");
			while($row01 = mysqli_fetch_array($result01)){
			    $product_id = $row01["product_id"];
			    $product_name = $row01["product_name"];
			    $product_status_id = $row01["product_status_id"];
			    $product_number = $row01["product_number"];
			    $product_price = $row01["product_price"];
			    $product_describe = $row01["product_describe"];
			    //if($product_status_id != 3){

           
            		$showimage01="<img src=upload_file/product_photo/";
            		$sql_query02 = "SELECT * FROM photo WHERE product_id = '$product_id' LIMIT 1";
            		$result02 = $conn->query($sql_query02) or die("MySQL query error");		
            		while ($row02 = mysqli_fetch_array($result02)){
            		    $product_photo_name = $row02['product_photo_name'];	
            		    
    	       	?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
               <a href="shop_detail.php?product_id='<?php echo $product_id;?>'"><img class="card-img-top" <?php   echo $showimage01.$product_photo_name;?> style="width:50%; display:block; margin:auto;"  alt=""></a>
 
              <div class="card-body">

                <h4 class="card-title">
                                            			
                 <p align="center"> <a href="#"><?php echo '<a href="shop_detail.php?product_id=',$product_id,  '">', $product_name, '</a>';?></a></p>
                </h4>
                <h5 align="center"><?php echo $product_price;?>元</h5>
                <!--  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>-->
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
<?php 
            		    }
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
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  <div align="right" >
<?php 
//分頁頁碼

echo '共 '.$data_nums.' 筆-在 '.$page.' 頁-共 '.$pages.' 頁';
echo "<br /><a href=?page=1>首頁</a> ";
echo "第 ";
for( $i=1 ; $i<=$pages ; $i++ ) {
    if ( $page-3 < $i && $i < $page+3 ) {
        echo "<a href=?page=".$i.">".$i."</a> ";
    }
}
echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
?>
</div>
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

</body>

</html>