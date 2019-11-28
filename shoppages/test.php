<?php
require_once("connect_db.php");
//$date_from = '2019-09-01 00:00:00';
//$date_to = '2019-09-01 23:59:59';

$month_02 = ['month_02'];

$day_02 = ['day_02'];
//$day_02 =$day_02.'&nbsp';
$date_from_01 = '2019-';
$date_from_02 = ' 00:00:00';
$date_to_01 = '2019-';
$date_to_02 = ' 23:59:59';


echo '$date_from_01.$month_02.-.$day_02.&nbsp.$date_from_02';
echo '$date_to_01.$month_02.-.$day_02.&nbsp.$date_to_02';
?>