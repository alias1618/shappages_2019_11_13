<script type="text/javascript">
	function sendmail(){
			alert('感謝您的來信，我們將盡快答覆你');
			window.location.href='index.php';
		}
</script>
<?php
session_start();
require_once("connect_db.php");
header("Content-Type:text/html; charset=utf-8");
require_once('./PHPMailer/PHPMailerAutoload.php');
$C_name=$_POST['C_name'];
$C_email=$_POST['C_email'];
$C_tel=$_POST['C_tel'];
$C_message=$_POST['C_message'];
$user_id = $_SESSION['user_id'];
//$user_id = $_POST['user_id'];
//$time=time();
$time = (date("Y-m-d H:i:s"));
$sql_insert = "INSERT INTO customer_form(customer_form_question, customer_form_time, user_id) VALUES ('$C_message','$time','$user_id')";
$result = $conn->query($sql_insert) or die('MySQL insert error');



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
$mail->Body = "寄件人".$C_name."(".$C_email.") 電話:".$C_tel."問題描述:".$C_message; //郵件內容
//$mail->addAttachment('../uploadfile/file/dirname.png','new.jpg'); //附件，改以新的檔名寄出
//$mail->IsHTML(true);                             //郵件內容為html
$mail->AddAddress("alias1620@gmail.com");            //收件者郵件及名稱
if(!$mail->Send()){
    //echo "Error: " ; //.$mail->ErrorInfo
}else{
    echo "<script>sendmail();</script>";
}

?>
