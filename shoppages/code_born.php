<?php
session_start();
ini_set('display_errors', 1);
$width= 100;
$hight= 30;
$code="";
$code_max=4;
$image="";

        for ($i = 0; $i<$code_max; $i++){
            $code.=rand(0,9);
        }
    
    $_SESSION["check_code"]=$code;

    $image = imagecreatetruecolor($width, $hight);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 255);
    $gray  = imagecolorallocate($image,200,200,200); 
    imagefill($image,0,0,$gray);//採用區域填充法，設定（0,0）
    
    $fontsize=6;//字體大小
    imagestring($image, $fontsize, 30, 10, $code, $black);
    
    for($i=0;$i<90;$i++)//加入干擾象素
    {
        $randcolor=imagecolorallocate($image,rand(50,255),rand(50,255),rand(50,255));
        imagesetpixel($image,rand(0, $width),rand(0, $hight),$randcolor);
    }
    
    //添加幹擾線
    for($i=0;$i<3;$i++){
        $linecolor=imagecolorallocate($image,rand(80,200),rand(80,200),rand(80,200));
        imageline($image,rand(5,95),rand(5,25),rand(5,95),rand(5,25),$linecolor);
    }
    ob_clean();
    header('Content-type:image/png');
    imagepng($image);

    imagedestroy($image);

?>