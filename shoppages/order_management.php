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
		<?php 
		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
		?>
		<br>
		<table border="1">
			<tr>
				<td align="center">編號</td>
				<td align="center">購買日期</td>
				<td align="center">收件人</td>
				<td align="center">收件人地址</td>
				<td align="center">收件人電話</td>
				<td align="center">訂單總金額</td>
				<td align="center">訂購人</td>
				<td align="center">訂購人電話</td>
				<!--<td align="center">修改訂單</td>-->
				<!--<td align="center">取消訂單</td>-->
				<td align="center">訂單明細</td>
				<!--<form action="order_delete.php" method="post">->
				<!--  <td>取消訂單<input type=submit value=取消訂單 ></td>-->
			</tr>
			<?php

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

            ?>
            <tr>
                <td align="center"><?php echo $buy_id;?></td>	<!-- 顯示商品id -->
                <td align="center"><?php echo $buy_date;?></td>	<!-- 顯示商品名稱 -->
                <td align="center"><?php echo $buy_name;?></td>	<!-- 顯示商品數量 -->
                <td align="center"><?php echo $buy_add;?></td>	<!-- 顯示商品價格 -->
                <td align="center"><?php echo $buy_phone;?></td>	<!-- 顯示商品描述 -->
               	<td align="center"><?php echo $buy_money;?> </td>
               	<td align="center"><?php echo $user_name;?> </td>
               	<td align="center"><?php echo $user_phone;?> </td>
		
               
                
                <!--  <td><a href="order_edit.php?buy_id=<?php //echo $buy_id;?>">修改訂單</a></td>-->
               <!-- <td><a href="order_delete.php?buy_id=<?php //echo $buy_id;?>">取消訂單</a></td>-->
                 <td><a href="order_detail_management.php?buy_id=<?php echo $buy_id;?>">訂單明細</a></td>               
     <!--            <td><label><input type="checkbox"  name="ship_status_id[]" value="<?php //echo $buy_id;?>" <?php //if($ship_status_id == "5") echo("checked")?>> 取消訂單</label>--> 
				<input type="hidden" id="buy_id" name="buy_id" value="<?php echo $buy_id;?>">	</td>
            </tr>
            <?php }?>
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