<?php
require_once ('connect_db.php');
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_number = $_POST['product_number'];
$product_price = $_POST['product_price'];
$product_describe = $_POST['product_describe'];
$product_category_id = $_POST['product_category_id'];
//$product_describe = ereg_replace("\n", "<br />\n", $product_describe); 

$sql_update = "UPDATE product SET product_name='$product_name', product_number='$product_number', 
                product_price='$product_price', product_describe='$product_describe', product_category_id='$product_category_id' WHERE product_id=$product_id";
mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$result = $conn->query($sql_update) or die('MySQL update error');
mysqli_close($conn);
header('location:management.php');

?>