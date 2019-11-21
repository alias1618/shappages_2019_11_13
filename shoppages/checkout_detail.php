<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>結帳明細</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
//require 'menu.php';
include('session_check.php');
//session_start();
//require_once("connect_db.php");     
//$productnumber = $_POST['productnumber'];
$ship_name = $_POST['ship_name'];
$ship_add = $_POST['ship_add'];
$ship_tel = $_POST['ship_tel'];
?>
</head>

<body>

 <?php 
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
    <form method="post" action="checkout_insert.php">
    				<?php if(!empty($_SESSION['product'])){
			    $total = 0;
			    $total_number=0;
			?>
			<table align="center">
			<th>商品名稱</th><th></th><th>價格</th><th>數量</th><th>小計</th>
			<?php //foreach ($_SESSION['product'] as $product_id=>$product) {?>
     			
    			<?php //for($i=0;$i<count($_SESSION['product']);$i++){
    			    foreach($_SESSION['product'] as $k=>$val){
    			    ?>
    			<tr align="center">
					<input type=hidden id="product_id" name="product_id" value=<?php echo $val['product_id'];?>>
					<td align="center"><?php echo $val['product_name'];?></td>
					<input type=hidden id="productname_<?php echo $k;?>" name="product_name[<?php //$i?>]" value=<?php echo $val['product_name'];?>>
        			<td></td>
        			<td align="center"><?php echo $val['product_price'];?></td>
					<td align="center"><?php echo $val['productnumber'];?></td>
    			    <?php 
        			$total_number +=$val['productnumber'];
        			$subtotal=$val['product_price']*$val['productnumber'];
        			$total+=$subtotal;
    		          ?>
    		         <td align="center"><?php echo $subtotal;?></td>
    		         <!--  <td><a href="shop_delete.php?product_id=<?php //echo $product_id;?>">刪除</a></td>-->

    			</tr>
    			<?php }?>
    			
    			
    			<tr><td></td></tr>
    			<tr><td></td></tr>
    			<tr>
    				<td>合計</td>
    				<td></td>
    				<td></td>
					<td align="center"><?php echo $total_number;?></td>
        			<input type=hidden id="total_number" name="total_number" value=<?php echo $total_number;?>>
    				<td align="center"><?php echo $total;?></td>
    				<input type=hidden id="total" name="total" value=<?php echo $total;?>>
    			</tr>
			</table>

			<?php 
			}else {
			    echo "購物車無商品";
			}
			
			?>
			<br>
			<div align="center">
        <label>收件人姓名</label>
        <?php echo $ship_name;?>
         <p><input type="hidden" name="ship_name" id="ship_name" value="<?php echo $ship_name;?>" /></p>
        <label>收寄人地址</label>
        <?php echo $ship_add;?>
        <p><input type="hidden" name="ship_add" id="ship_add" value="<?php echo $ship_add;?>"></p>
        <label>收件人電話</label>
        <?php echo $ship_tel;?>    
        <p><input type="hidden" name="ship_tel" id="ship_tel" value="<?php echo $ship_tel;?>"></p>
    
        <input type=submit value=確認 >
        </div>
    </form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>