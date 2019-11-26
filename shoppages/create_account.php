<?php

//帳號建立
$account_max = 4;
$account ="";
$s="";
$str = "abcdefghijklmonpqrstuvwxyzz";
for ($i = 0; $i<$account_max; $i++){
    $s= substr(str_shuffle($str), 26, 10);
    $account = $account.$s;
}
echo $account;


?>