<script>
	function nopicture(){
		alert("請上傳圖片");
		window.location.href='management.php';
		}
</script>

<?php
    require_once("connect_db.php");
    header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
    mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
    $product_id = $_POST['product_id'];
    //$product_name = $_POST['product_name'];
    $uploadOk = 1;
    $filecount = count($_FILES['file_upload']['name']);

    //$filecount = $filecount++;
    
    $target_dir ='upload_file/product_photo/';
    
    //echo "2"."</br>";
    for ($i = 0; $i < $filecount; $i++) {
        //$t = time();
        echo $i;
        //if (isset())
        //$upload_file_name = $product_id.$t;

        $targetfile = $target_dir. basename($_FILES["file_upload"]["name"][$i]);
        $imageType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));
        //檢查檔案上傳有沒有成功
        if ($_FILES['file_upload']['error'][$i] === UPLOAD_ERR_OK){
            echo '檔案名稱:'    . $_FILES['file_upload']['name'][$i]    .   '<br/>';
            echo '檔案類型:'    . $_FILES['file_upload']['type'][$i]    .   '<br/>';
            echo '檔案大小:'    . $_FILES['file_upload']['size'][$i]    .   '<br/>';
            echo '暫存名稱:'    . $_FILES['file_upload']['tmp_name'][$i]    .   '<br/>';
            
            //檢查檔案有沒有存在
            /*
            if (file_exists( $target_dir   . $_FILES['file_upload']['name'][$i])){
                echo '檔案已存在。<br/>';
                $uploadOk = 0;
            }else 
            */
            if ($_FILES['file_upload']['size'][$i]>500000){
                echo "上傳檔案過大";
                $uploadOk = 0;
                return;
            }else if ($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"){
                echo "只能上傳 JPG, JPEG, PNG的檔案類型";
                $uploadOk = 0;
                return;
            }
        }
    }
   // echo 3;
    //if($_FILES['file_upload']['error'] == 0){
    for ($i = 0; $i < $filecount; $i++){
        if($uploadOk = 1){
            $randomString = '';
            $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
            $charactersLength = strlen($characters);
            $patten = "/^[a-z0-9]{15}$/";   //正則表示的規則
            $length = 15;
            for ($j = 0; $j < $length; $j++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            if(preg_match($patten, $randomString)){
                if (file_exists( $target_dir  . $randomString[$i])){
                    echo '檔案已存在。<br/>';
                    return;
                }else {
                    $file_name = $_FILES['file_upload']['name'][$i];
                    $file = $_FILES['file_upload']['tmp_name'][$i];//暫存檔的檔名
                    $dest =  $target_dir.$file_name;
                    //前半部是檔案要存放的位置，. 之後的是伺服器上的新檔名
                    
                    //將檔案移到指定位置
                    move_uploaded_file($file, $dest);
                    //echo 'file'.$file.'.'.'<br>';
                    //echo 'dest'.$dest.'.'.'<br>';
                    $newfilename=$randomString.'.'.'jpg';         //設定新的檔名加上.jpg
                    rename($dest,$target_dir.$newfilename);        
                    //$dest事先抓取舊檔名,$target_dirg是指新檔案的位置在哪然後取($newfilename)檔名
                    //echo '$target_dir'.$target_dir.'.'.'<br>';
                    //echo '$newfilename'.$newfilename.'.'.'<br>';
                    //header("location:management.php");
                    $sql_insert = "INSERT INTO photo (product_id, product_photo_name) VALUES ('$product_id', '$newfilename')";
                    $result = $conn->query($sql_insert) or die('MySQL insert error');
                    //mysqli_close($conn);
                    echo "上傳完成"."$i";
                    header("location:management.php");
                }
            }else{
                echo "上傳未完成 no";
            }
        }else  {
            echo '錯誤代碼'     . $_FILES['file_upload']['error'][$i]  .  '<br/>';
            return;
        }
    }
    /*
    }else{
        echo "<script>nopicture()</script>";
    }
    */
?>
