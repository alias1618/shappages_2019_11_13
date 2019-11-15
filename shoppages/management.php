<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>庫存管理</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
          include("menu_management.php");

		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
?>
		<input type="button" value="新增商品" onclick="location.href='product_add.php'">
		<!--  <input type="button" value="訂單管理" onclick="location.href='order_management.php'">-->
		<br>
		<br>
		
		<table border="1">
			<tr>
				<td align="center">編號</td>
				<td align="center">名稱</td>
				<td align="center">商品類別</td>
				<td align="center">庫存數量</td>
				<td align="center">定價</td>
				<td align="center">描述</td>
				<td align="center">圖片</td>
				<td align="center">修改/刪除圖片</td>
				<td align="center">修改商品資料</td>
				<form action="product_delete.php" method="post">
				<!--  <td>刪除商品資料<input type=submit value=刪除商品資料 ></td>-->
			</tr>
			<?php

			$sql_query01 = "SELECT * FROM product";
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
			
            ?>
            <tr>
                <td><?php echo "00000".$product_id;?></td>	<!-- 顯示商品id -->
                <td><?php echo $product_name;?></td>	<!-- 顯示商品名稱 -->
                <td><?php if($product_category_id == 0){
                    echo "";
                }else if($product_category_id == 1){
                    echo "罐頭";
                }else if($product_category_id == 2){
                    echo "飲料";
                }else if($product_category_id == 3){
                    echo "零食";
                }else if($product_category_id == 4){
                    echo "醬料";
                }else if($product_category_id == 5){
                    echo "冷凍食品";
                }
                ?>
                </td>	<!-- 顯示商品名稱 -->                
                <td><?php echo $product_number;?></td>	<!-- 顯示商品數量 -->
                <td><?php echo $product_price;?></td>	<!-- 顯示商品價格 -->
                <td><?php echo nl2br($product_describe);?></td>	<!-- 顯示商品描述 -->
               <td>
        		<?php 
            		$showimage01="<img src=upload_file/product_photo/";
            		$sql_query02 = "SELECT * FROM photo WHERE product_id = '$product_id'";
            		$result02 = $conn->query($sql_query02) or die("MySQL query error");		
            		while ($row02 = mysqli_fetch_array($result02)){
            		    $product_photo_name = $row02['product_photo_name'];
            		
    	       	?>
    		
				<?php echo $showimage01.$product_photo_name;?> width="100" height="100"
    			 </td>
    			<?php }?>  		
               
                
                <td><a href="photo_add_edit.php?product_id=<?php echo $product_id;?>">修改/刪除圖片</a></td>
                <td><a href="product_edit.php?product_id=<?php echo $product_id;?>">修改商品資料</a></td>
                <!--  <td><label><input type="checkbox"  name="product_status_id[]" value="<?php //echo $product_id;?>" <?php //if($product_status_id == "3") echo("checked")?>> 停止販賣</label>-->
				<input type="hidden" id="product_id" name="product_id" value="<?php echo $product_id;?>">	</td>
            </tr>
            <?php }?>
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
</from>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
