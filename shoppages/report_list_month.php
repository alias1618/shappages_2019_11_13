<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>訂單管理</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
          include("menu_management.php");
          ini_set("display_errors", "Off");
		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
		  $month_02 = $_GET['month_02'];
		?>
		<br>
		<table border="1">
			<tr>
				<td align="center">月份</td>
				<td align="center">日期</td>
				<td align="center">月份訂購金額</td>
				<td align="center">月份訂購數量</td>
				<td align="center">月份獲利</td>
				<!--  
				<td align="center">收件人電話</td>
				<td align="center">訂單總金額</td>
				<td align="center">訂購人</td>
				<td align="center">訂購人電話</td>
				-->
				<!--<td align="center">修改訂單</td>-->
				<!--<td align="center">取消訂單</td>-->
				<td align="center">日期明細</td>
				<!--<form action="order_delete.php" method="post">->
				<!--  <td>取消訂單<input type=submit value=取消訂單 ></td>-->
			</tr>
			<?php
			//
			
			$sql_query_02="select DISTINCT day(buy_date) from report";
			mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			$result_02 = $conn->query($sql_query_02) or die("MySQL query error");
			while($row_02 = mysqli_fetch_array($result_02)){
			    $day_02 = $row_02['day(buy_date)'];
			
			$date_from_01 = '2019-';
			$date_from_02 = ' 00:00:00';
			$date_to_01 = '2019-';
			$date_to_02 = ' 23:59:59';
			//$set = "";
			//ORDER BY product_id
			$sql_query_01 =
			"SELECT product_id, sum(buy_number), product_name, product_price, product_buy_price, sum(buy_money)
            FROM report
            WHERE buy_date BETWEEN '$date_from_01.$month_02.-.$day_02.$date_from_02' AND '$date_to_01.$month_02.-.$day_02.$date_to_02'
            GROUP BY product_name
            ORDER BY product_id";
			
			//"SELECT * FROM report WHERE buy_date BETWEEN '$date_from' AND '$date_to' GROUP BY product_name";
			mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			$result_01 = $conn->query($sql_query_01) or die("MySQL query error");
			while($row_01 = mysqli_fetch_array($result_01)){
			    //$buy_id_01 = $row_01['buy_id'];
			    
			    //$sql_query_02 = "SELECT * FROM report WHERE product_id='$buy_id_01' ORDER BY product_id";
			    //mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			    //$result_02 = $conn->query($sql_query_02) or die("MySQL query error");
			    //while($row_02 = mysqli_fetch_array($result_02)){
			    $product_name = $row_01['product_name'];
			    $buy_date = $row_01['buy_date'];
			    $product_id = $row_01['product_id'];
			    $buy_number = $row_01['sum(buy_number)'];                    //單一商品總數量
			    $product_price = $row_01['product_price'];
			    $product_buy_price = $row_01['product_buy_price'];
			    $buy_money = $row_01['sum(buy_money)'];                      //單一商品訂購總金額
			    
			    //$sub_buy_money = ($sub_buy_money+$buy_money);
			    //$sub_buy_number = ($sub_buy_number+$buy_number);
			    $subtotal = ($product_price-$product_buy_price)*$buy_number; //單一商品總獲利
			    
			    $total_buy_number =($total_buy_number+$buy_number);
			    $total_buy_money = ($total_buy_money+$buy_money);
			    $total_subtotal = ($total_subtotal+$subtotal);
			}

/*			    
			$sql_query01 = "SELECT * FROM buy";
			mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $buy_id = $row01["buy_id"];
			    $buy_name = $row01["buy_name"];
			    $buy_date = $row01["buy_date"];
			    $buy_add = $row01["buy_add"];
			    $buy_phone = $row01["buy_phone"];
			    $buy_money = $row01["buy_money"];
			
			    
			    $sql_query02 = "SELECT b.buy_id, b.buy_name, b.buy_date, b.buy_phone, b.buy_add, u.user_name, u.user_phone FROM buy b inner join user u on b.user_id = u.user_id WHERE buy_id='$buy_id'";
			    mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			    $result02 = $conn->query($sql_query02) or die("MySQL query error");
			    while($row02 = mysqli_fetch_array($result02)){
			        $user_name = $row02['user_name'];
			        $user_phone = $row02['user_phone'];
			    }
*/
			    
			    /*
			     * <td align="center">月份</td>
				<td align="center">月份訂購金額</td>
				<td align="center">月份訂購數量</td>
				<td align="center">月份獲利</td>
			     * 
			     */
            ?>
            <tr>
            <?php if(!empty($total_buy_money)){?>
                <td align="center"><?php echo $month_02;?></td>	<!-- 顯示月份 -->
                <td align="center"><?php echo $day_02;?></td>	<!-- 顯示日期 -->
                <td align="center"><?php echo $total_buy_money;?></td>	<!-- 顯示月份訂購金額 -->
                <td align="center"><?php echo $total_buy_number;?></td>	<!-- 顯示月份訂購數量 -->
                <td align="center"><?php echo $total_subtotal;?></td>	<!-- 顯示月份獲利 -->
                <!--  
                <td align="center"><?php //echo $buy_phone;?></td>	
               	<td align="center"><?php //echo $buy_money;?> </td>
               	<td align="center"><?php //echo $user_name;?> </td>
               	<td align="center"><?php //echo $user_phone;?> </td>
					-->
               
                
                <!--  <td><a href="order_edit.php?buy_id=<?php //echo $buy_id;?>">修改訂單</a></td>-->
               <!-- <td><a href="order_delete.php?buy_id=<?php //echo $buy_id;?>">取消訂單</a></td>-->
                 <td><a href="report_list_day.php?month_02=<?php echo $month_02;?>&day_02=<?php echo $day_02;?>">日期明細</a></td>               
     <!--            <td><label><input type="checkbox"  name="ship_status_id[]" value="<?php //echo $buy_id;?>" <?php //if($ship_status_id == "5") echo("checked")?>> 取消訂單</label>--> 
				<input type="hidden" id="buy_id" name="buy_id" value="<?php echo $month_02;?>">	</td>
				<?php }?>
            </tr>
            <?php 
            $total_buy_number ="";
            $total_buy_money = "";
            $total_subtotal = "";
			}?>
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