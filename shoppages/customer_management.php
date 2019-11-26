<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>客服管理</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php 
          include("menu_management.php");
		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
		?>
		<br>
		<table border="1">
			<tr>
				<td align="center">編號</td>
				<td align="center">日期</td>
				<td align="center">姓名</td>
				<td align="center">電話</td>
				<td align="center">Email</td>
				<td align="center">郵遞區號</td>
				<td align="center">地址</td>
				<!-- 
				<td align="center">訂單總金額</td>
				<td align="center">訂購人</td>
				<td align="center">訂購人電話</td>
				 -->
				<!--<td align="center">修改訂單</td>-->
				<!--<td align="center">取消訂單</td>-->
				<td align="center">問題明細</td>
				<!--<form action="order_delete.php" method="post">->
				<!--  <td>取消訂單<input type=submit value=取消訂單 ></td>-->
			</tr>
			<?php

			$sql_query01 = "SELECT * FROM customer_form";
			mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			$result01 = $conn->query($sql_query01) or die("MySQL query error");
			while($row01 = mysqli_fetch_array($result01)){
			    $customer_form_id = $row01["customer_form_id"];
			    $customer_form_time = $row01["customer_form_time"];
			    $customer_form_question = $row01["customer_form_question"];
			    $user_id = $row01["user_id"];
			    /*
			    $buy_add = $row01["buy_add"];
			    $buy_phone = $row01["buy_phone"];
			    $buy_money = $row01["buy_money"];
			     */
			    
			    $sql_query02 = "SELECT * FROM user WHERE user_id='$user_id'";
			    mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
			    $result02 = $conn->query($sql_query02) or die("MySQL query error");
			    while($row02 = mysqli_fetch_array($result02)){
			        $user_name = $row02['user_name'];
			        $user_phone = $row02['user_phone'];
			        $user_email = $row02['user_email'];
			        $user_postcode = $row02['user_postcode'];
			        $user_add = $row02['user_add'];
			        
			    }
			    if (($customer_form_question != 99)){
            ?>
            <tr>
                <td align="center"><?php echo $customer_form_id;?></td>	<!-- 顯示商品id -->
                <td align="center"><?php echo $customer_form_time;?></td>	<!-- 顯示商品名稱 -->
                <td align="center"><?php echo $user_name;?></td>	<!-- 顯示商品數量 -->
                <td align="center"><?php echo $user_phone;?></td>	<!-- 顯示商品價格 -->
                <td align="center"><?php echo $user_email;?></td>	<!-- 顯示商品描述 -->
               	<td align="center"><?php echo $user_postcode;?> </td>
               	<td align="center"><?php echo $user_add;?> </td>
               	<!--  <td align="center"><?php //echo $user_phone;?> </td>-->
		
               
                
                <!--  <td><a href="order_edit.php?buy_id=<?php //echo $buy_id;?>">修改訂單</a></td>-->
               <!-- <td><a href="order_delete.php?buy_id=<?php //echo $buy_id;?>">取消訂單</a></td>-->
                 <td><a href="customer_management_detail.php?customer_form_id=<?php echo $customer_form_id;?>">問題明細</a></td>               
     <!--            <td><label><input type="checkbox"  name="ship_status_id[]" value="<?php //echo $buy_id;?>" <?php //if($ship_status_id == "5") echo("checked")?>> 取消訂單</label>--> 
				<!--  <input type="hidden" id="buy_id" name="buy_id" value="<?php //echo $buy_id;?>">	</td>-->
            </tr>
            <?php 
			    }
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