<?php
require_once("connect_db.php");
$product_id = $_GET['product_id'];
$product_photo_name = $_GET['product_photo_name'];
$imagelocation="upload_file/product_photo/";

$sql_delete = "DELETE FROM photo WHERE product_id = '$product_id' AND product_photo_name = '$product_photo_name'";
$result = $conn->query($sql_delete) or die('MySQL delete error');

$deletefile = $imagelocation.$product_photo_name;
if(file_exists($deletefile)){
    unlink($deletefile);
    echo "刪除成功";
}else{
    echo "刪除失敗";
}

    header("location:management.php")
?>
