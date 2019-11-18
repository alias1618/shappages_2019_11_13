<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<!-- Latest compiled and minified CSS -->
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>自動發送E-mail</title>
<style>
.mail .container{
 width:600px; 
}
.mail{
 font-family:微軟正黑體;
 font-size:22px;
}
</style>
</head>

<body>
<div class="mail">
    <div class="container">
        <div class="header" style="text-align:center; font-size:24px; padding:30px 0">
        聯絡我
        </div>
<form id="form1" name="form1" method="post" action="send.php">
    <fieldset>
    <legend>留言給我們</legend>
    <label>您的大名：</label>
    <input id="C_name" name="C_name" type="text" />
    <br />

    <label>您的Email：</label>
    <input id="C_email" name="C_email" type="text" />
    <br />

    <label>您的電話號碼：</label>
    <input id="C_tel" name="C_tel" type="text" />
    <br />

    <label>意見：</label>
    <textarea id="C_message" name="C_message"></textarea>
    <br />

    <input id="submit" name="submit" type="submit" value="確定送出" />
    </fieldset>
    </form>
    </div>
</div>
</body>
</html>