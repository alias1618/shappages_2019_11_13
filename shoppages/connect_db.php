<?php
    $server="localhost";
    $db_user="shop20190909";
    $db_password="Hh!@20190909";
    $db_name="shop_db";
    
    $conn = mysqli_connect($server, $db_user, $db_password, $db_name);
    

    if  ($conn->connect_error){
        die("Connection failed");
    }
?>