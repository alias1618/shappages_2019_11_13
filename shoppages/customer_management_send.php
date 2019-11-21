<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<!--  讓mysql顯示中文而不是亂碼     -->
</head>
<?php
require_once("connect_db.php");

header("Content-Type:text/html; charset=utf-8");
$customer_service_answer = $_POST['answer'];
//echo '$customer_service_answer'.$customer_service_answer.'<br>';
$user_email=$_POST['user_email'];
//echo '$user_email'.$user_email.'<br>';
$user_name=$_POST['user_name'];
//echo '$user_name'.$user_name.'<br>';
$customer_form_id=$_POST['customer_form_id'];
//echo '$customer_form_id'.$customer_form_id.'<br>';
$user_id=$_POST['user_id'];
//echo '$user_id'.$user_id.'<br>';

mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
$sql_insert = "INSERT INTO customer_service(customer_service_answer, user_id, customer_form_id) VALUES ('$customer_service_answer', '$user_id', '$customer_form_id')";
$result = $conn->query($sql_insert) or die('MySQL insert error');
?>


<?php   //這封信件是從客服信箱寄到客戶信箱
require_once('./PHPMailer/PHPMailerAutoload.php');
//$C_name=$_POST['C_name'];
//$C_email=$_POST['C_email'];
//$C_tel=$_POST['C_tel'];
//$C_message=$_POST['C_message'];

$mail= new PHPMailer();                             //建立新物件
$mail->SMTPDebug = 0;
$mail->IsSMTP();                                    //設定使用SMTP方式寄信
$mail->SMTPAuth = true;                        //設定SMTP需要驗證
$mail->SMTPSecure = "ssl";                    // Gmail的SMTP主機需要使用SSL連線
$mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
$mail->Port = 465;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
$mail->CharSet = "utf-8";                       //郵件編碼
$mail->Username = "alias1620@gmail.com";       //Gamil帳號
$mail->Password = "Hh20190909!";                 //Gmail密碼
$mail->From = "alias1620@gmail.com";        //寄件者信箱
$mail->FromName = "台灣超市客服";                  //寄件者姓名
$mail->Subject ="顧客來信"; //郵件標題
$mail->Body = "寄件人".$user_name."(".$user_email.")問題描述:".$answer; //郵件內容
//$mail->addAttachment('../uploadfile/file/dirname.png','new.jpg'); //附件，改以新的檔名寄出
//$mail->IsHTML(true);                             //郵件內容為html
$mail->AddAddress($user_email);            //收件者郵件及名稱
if(!$mail->Send()){
    //echo "Error: " ; //.$mail->ErrorInfo
}else{
    //echo "<script>sendmail();</script>";
}
header("location:customer_management.php");
?>
</html>