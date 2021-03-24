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
<?php 
          include("menu_management.php");
?>
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