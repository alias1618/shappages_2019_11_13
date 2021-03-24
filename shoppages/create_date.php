<?php
//$i = 0;

//產生過去時間
$Y=2019;        //年
$m=9;           //月
$date_max=31;           //日-1
$order_number_01=rand(200,300);   //一天order數量
$old_date="";
//for($x=9; $x<10; $x++){

    //$m=rand(9,11);
    
for($a=1;$a<$date_max;$a++){
            $d=$a;
            
            for($z=0;$z<$order_number_01;$z++){
                
                //for($o=1;$o<23;$o++)
                //{
                $H=rand(0,23);
                    //$order_number_02=rand(8,13);
                    //for($n=0;$n<$order_number_02;$n++){
                        
                        //for($o=0;$o<59;$o++){
                            $i=rand(0,59);
                            $s=rand(0,59);
                            //"Y-m-d H:i:s"
                            //"Y年m月d日H時i分s秒"
                            $old_date =  date( "Y-m-d H:i:s", mktime($H,$i,$s,$m,$d,$Y) );
                            //echo '$i'.$i.'<br>';
                            echo $old_date.'<br>';
                            
                        //}
                        
                    //}
               // }

            }
}
        //$H=date(H);
        //$i=date(i);
        //$s=date(s);
//}
/*
for($t=1; $t<10; $t++){
    echo "$t";
}
*/
//$buy_date;

?>