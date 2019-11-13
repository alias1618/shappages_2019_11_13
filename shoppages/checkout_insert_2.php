<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<!--  讓mysql顯示中文而不是亂碼     -->
</head>
	    <body>
<?php
header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼

session_start();
require_once("connect_db.php");  
$buy_id=$_SESSION['buy_id'];
//需要buy_id
//需要product_id
//需要product_price
//需要product_name
//需要buy_number

foreach($_SESSION['product'] as $k=>$val){
      $product_id = $val['product_id'];
      $product_name = $val['product_name'];
      $product_price = $val['product_price'];
      $productnumber = $val['productnumber'];
    $sql_insert01 ="INSERT INTO buy_detail(buy_id, product_id, product_price, product_name, buy_number)
VALUES ('$buy_id','$product_id','$product_price','$product_name','$productnumber')";
    mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
    $result01 = $conn->query($sql_insert01) or die('MySQL insert error01');
    
    $sql_query = "SELECT product_number FROM product WHERE product_id = '$product_id'";
    $result02 = $conn->query($sql_query) or die ('MySQL query error');
    $row = mysqli_fetch_array($result02);
    $db_product_number = $row['product_number'];
    //echo '$db_product_number'.$db_product_number.'br';
    //echo '$productnumber'.$productnumber.'br';
    $new_db_product_number = $db_product_number - $productnumber;
    //echo '$new_db_product_number'.$new_db_product_number.'br';
    $sql_update = "UPDATE product SET product_number='$new_db_product_number' WHERE product_id='$product_id'";
    $result02 = $conn->query($sql_update) or die('MySQL update error');
}
unset($_SESSION['product']);
echo "<script>window.location.href='index.php';alert('購買成功');</script>";

?>
    </body>
</html>