<?php
session_start();

$k = $_POST['k'];
$product_id = $_POST['productid'];
$product_name = $_POST['productname'];
$product_price = $_POST['productprice'];
$productnumber = $_POST['productnumber'];

//for($i=0;$i<count($product_id);$i++){
if ($productnumber == 0){
    unset($_SESSION['product'][$k]);
    echo $product_name. "商品已刪除";
    //echo "array_id=".$k."productnumber=".$productnumber."productname".$productname;
    //echo 0;
}else if ($productnumber <= 5){
    $_SESSION['product'][$k]=[
        'product_id'=>$product_id,
        'product_name'=>$product_name,
        'product_price'=>$product_price,
        'productnumber'=>$productnumber
    ];
    //echo $product_name."數量改變";
}else {
    echo "商品數量不能大於5個";
}
//}
?>