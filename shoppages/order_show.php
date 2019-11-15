<!DOCTYPE html>
<html lang="en">

<head>
<?php 
session_start();
?>
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
    include("menu.php");

		  require_once("connect_db.php");
		  header("Content-Type:text/html; charset=utf-8");
		  
		  if(empty($_SESSION['user_id'])){
		      //echo "<script>checklogin();</script>";
		      echo "<script>window.location.href='index.php';alert('請先登入');</script>";
		  }//讓mysql顯示中文而不是亂碼
		?>
		<br>
		<table border="1">
			<tr>
				<!--  <td>編號</td>-->
				<td align="center">收件人</td>
				<td align="center">購買日期</td>
				<td align="center">收件人地址</td>
				<td align="center">收件人電話</td>
				<td align="center">訂單總金額</td>
				<td align="center">訂購人</td>
				<td align="center">訂購人電話</td>
				<!--  <td>修改訂單</td>-->
				<!--<td>取消訂單</td>-->
				<!--  <form action="order_delete.php" method="post">
				<td>取消訂單<input type=submit value=取消訂單 ></td>-->
			</tr>
			<?php
			$user_id = $_SESSION['user_id'];
			$sql_query01 = "SELECT * FROM buy WHERE user_id='$user_id'";
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
             <!--   <td><?php //echo $buy_id;?></td>-->  	<!-- 顯示商品id -->
                <td align="center"><?php echo $buy_name;?></td>	<!-- 顯示商品名稱 -->
                <td align="center"><?php echo $buy_date;?></td>	<!-- 顯示商品數量 -->
                <td align="center"><?php echo $buy_add;?></td>	<!-- 顯示商品價格 -->
                <td align="center"><?php echo $buy_phone;?></td>	<!-- 顯示商品描述 -->
               	<td align="center"><?php echo $buy_money;?> </td>
               	<td align="center"><?php echo $user_name;?> </td>
               	<td align="center"><?php echo $user_phone;?> </td>
<?php 
?>
               
                
                <td><a href="order_detail.php?buy_id=<?php echo $buy_id;?>">訂單明細</a></td>
              <!--    <td><a href="order_delete.php?buy_id=<?php //echo $buy_id;?>">取消訂單</a></td>-->
               <!--   <td><label><input type="checkbox"  name="ship_status_id[]" value="<?php //echo $buy_id;?>" <?php //if($ship_status_id == "5") echo("checked")?>> 取消訂單</label>-->
				<input type="hidden" id="buy_id" name="buy_id" value="<?php echo $buy_id;?>">
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>