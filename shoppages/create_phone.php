<?php
$number_max = 8;
$number = "09";
$code = "";
for ($i = 0; $i<$number_max; $i++){
    $code.=rand(0,9);
    
}
$number = $number.$code;
echo $number;
?>