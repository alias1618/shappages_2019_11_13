<?php
require_once("connect_db.php");


$productarray = $_POST['product_status_id'];

$c = sizeof($productarray);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (!mysqli_query($conn, "SELECT * FROM product")) {
    printf("Error message: %s\n", mysqli_error($conn));
}

for($i=0;$i<$c; $i++){
    
    $delete = "3";
    $sql_update = "UPDATE product SET product_status_id = '$delete' WHERE product_id = $productarray[$i]";
    $result = $conn->query($sql_update) or die('MySQL update error');
    
}
header( 'location:management.php');
?>