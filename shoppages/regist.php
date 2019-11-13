<!DOCTYPE html>
<html lang="en">

<head>
<?php 
session_start();

$account ="";
$email = "";
$phone = "";
$name = "";
$postcode ="";
$add="";

?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>註冊</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

 <?php 
include("menu.php");
?>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5"></h1>
        <p class="lead"></p>
        <ul class="list-unstyled">
          <li></li>
          <li></li>
        </ul>
      </div>
    </div>
  </div>
  <?php 
  //session_start();
  if(isset($_SESSION['user_id'])){
      //echo "<script>checklogin();</script>";
      echo "<script>window.location.href='index.php';alert('已經註冊過了');</script>";
  }
  

?>
<div class="col-lg-12 text-center">
		<form name="reg_form" action="regist_insert.php" method="post" onsubmit="return allCheck();" >
						註冊<br>
						<label>帳號</label>
						<input type="text" name="account" id="account" placeholder="帳號	至少5個英文字母或數字" style="width:15em" onblur="checkRepAccount()" 
							  value=<?php if(isset($_COOKIE["account"])){
							      echo $_COOKIE["account"];
							  }
							      ?>> 
							      <br>
						<div id="accountAlert">	</div>
						<br>
						<label>email</label>
						<input type="text" name="email" id="email" placeholder="Email	xxx@yyyy.zzz" style="width:15em"
						onblur="checkRepEamil()" 
						value=<?php if(isset($_COOKIE["email"])){
						    echo $_COOKIE["email"];
						}?> >  <br>
						<div id="emailAlert"></div>
						<br>
						<div>
						<label>姓名</label>
						<input type="text" name="name" id="name" placeholder="姓名" style="width:15em"
						 value=<?php  if(isset($_COOKIE["name"])){    
						     echo $_COOKIE["name"];
						 }?>>  <br>
						</div>
						<br>
						<div>
						<label>郵遞區號</label>
						<input type="text" name="postcode" id="postcode" placeholder="郵遞區號"  style="width:15em"
						 value=<?php  if(isset($_COOKIE["postcode"])){    
						     echo $_COOKIE["postcode"];
						 }?>>  		
						</div>
						<br>
						<div>
						<label>地址</label>
						<input type="text" name="add" id="add" placeholder="地址" style="width:30em"
						 value=<?php  if(isset($_COOKIE["add"])){    
						     echo $_COOKIE["add"];
						 }?>>  		
						</div>
						<br>
						<div>						
						<label>密碼</label>
						<input type="password" name="password" id="password" placeholder="密碼	至少6個英文或數字" style="width:15em"> 
						<div id="passwordAlert"></div>
						</div>
						<br>
						<div>					
						<label>密碼確認</label>
						<input  type="password" name="password_check" id="password_check" placeholder="密碼確認" style="width:15em">
						<div id="confirm_passwordAlert"></div>
						</div>
						<br>
						<label>手機號碼</label>
						<input  type="text" name="phonenumber" id="phonenumber" placeholder="手機號碼 格式 09xxxxxxxx" style="width:15em"
						onblur="checkRepNumber()" value=<?php  if(isset($_COOKIE["phonenumber"])){    
						    echo $_COOKIE["phonenumber"];
						}?>>

						<div id="nnAlert"></div>			
						<div id="numberdAlert"></div>
						<br>
					<div><img id="captCode" src="code_born.php" > <input type=button value="更換驗證碼" onclick="refresh_code()"></div>
					
						<label>驗證碼</label>

						<input type="text" name="typecode" id="typecode" placeholder="驗證碼">
						<br>
					
					<input type="submit" value="送出">			
	</form>
	</div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script type="text/javascript">
					function refresh_code(){
						document.getElementById("captCode").src="code_born.php";
						}
					//document.getElementById("out").addEventListener("load", function sj);
					//addLoadEvent(function sj())
					/*
					function addLoadEvent(){
							window.addEventListener("load", function sj);
						}
					*/
					/*
					window.onload(sj())
					function sj()
					{
					var sjs=Math.floor(Math.random()*9000)+1000;
					document.getElementById("out").innerHTML=sjs;
					};

					//驗證隨機數的函數
					function check()
					{
						var sr=document.getElementById("in").value;
						var sc=document.getElementById("out").innerHTML;
						if(sr==sc){
    						//alert('驗證碼輸入正確');
    						return true;
						}else{
    						alert('驗證碼輸入有誤');
    						sj();
						return false;
						}
					};
					*/
					var xmlHTTP;

					function $_xmlHttpRequest()
					{   
					    if(window.ActiveXObject)
					    {
					        xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
					    }
					    else if(window.XMLHttpRequest)
					    {
					        xmlHTTP=new XMLHttpRequest();
					    }
					};
					function checkRepAccount()
					{  
					    var account=document.getElementById("account").value;
						var data = "account=" + account;
					    $_xmlHttpRequest();
					    xmlHTTP.open("POST","checkRepAccount.php",true);
					    
					        xmlHTTP.onreadystatechange=function ()
					        {
					            if(xmlHTTP.readyState == 4)
					            {
					                if(xmlHTTP.status == 200)
					                {
					                    var str=xmlHTTP.responseText;
					                    document.getElementById("accountAlert").innerHTML=str;
					                }
					            }
					        }
					        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					        xmlHTTP.send(data);
					    };
				    
					function checkRepEamil()
					{  
					    var email=document.getElementById("email").value;
						var data = "email=" + email;
					    $_xmlHttpRequest();
					    xmlHTTP.open("POST","checkRepEmail.php",true);
					    
					        xmlHTTP.onreadystatechange=function ()
					        {
					            if(xmlHTTP.readyState == 4)
					            {
					                if(xmlHTTP.status == 200)
					                {
					                    var str=xmlHTTP.responseText;
					                    document.getElementById("emailAlert").innerHTML=str;
					                }
					            }
					        }
					        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					        xmlHTTP.send(data);
					    };

						function checkRepNumber()
						{  
						    var phonenumber=document.getElementById("phonenumber").value;
							var data = "phonenumber=" + phonenumber;
						    $_xmlHttpRequest();
						    xmlHTTP.open("POST","checkRepNumber.php",true);
						    
						        xmlHTTP.onreadystatechange=function ()
						        {
						            if(xmlHTTP.readyState == 4)
						            {
						                if(xmlHTTP.status == 200)
						                {
						                    var str=xmlHTTP.responseText;
						                    document.getElementById("numberdAlert").innerHTML=str;
						                }
						            }
						        }
						        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						        xmlHTTP.send(data);
						    };
					/*
					function checkrepeateamil(){
					var xhttp = new XMLHttpRequest();
					var dataemail = "email" + email;

					xhttp.onreadystatechange = function(){
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("emailAlert").innerHTML = xhttp.responseText;
						}else {
								window.alert('emailxxx');
						}

						xhttp.open("POST", "checkrepeatemail.php",true);
						xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						xhttp.send(dataemail);
						}
					};
*/
				function allCheck(){
					if (accountCheck() == false){
						return false;
					}else	if (checkEmail() == false) {
						return false;
					}else 	if (checkPassword() == false) {
						return false;
					}else	if (checkTwoPasswords() == false) {
						return false;
					}else	if (checkPhone() == false) {
						return false;
					}else	if (check() == false) {
						return false;
					}
					return true;
					};
			
				//檢查帳號
    			function accountCheck(){
    				var account = document.getElementById("account").value;
    				var accountpatten = new RegExp(/^[A-Za-z0-9_.]{5,10}$/);
    				
    				if (account == ""){
    					//顯示帳號錯誤在文字下方
    					//document.getElementById("accountAlert").innerHTML= "<font color=red><b>不能為空白</b></font>";
    					//跳出顯示"不能為空白"
    					alert('帳號不能為空白');
						return false;
    				}else if (!(account.match(accountpatten))){
    					//顯示帳號錯誤在文字下方
    					//document.getElementById("accountAlert").innerHTML= "<font color=red><b>帳號錯誤</b></font>";
    					//跳出顯示"帳號錯誤"
    					alert('帳號格式錯誤');
						return false;
    					}
    				return true;
    			};
    			//檢查email
	    		function checkEmail() {
	    			email = document.getElementById("email").value;
	    			var emailpatten = new RegExp(/^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/);
	    			
	    			if (email == "") {
	    				//顯示email錯誤在文字下方
	    				//document.getElementById("emailAlert").innerHTML = "<font color=red><b>你必須輸入email</b></font>";
	    				alert('email不能為空白');
						return false;
	    			}else if(!(email.match(emailpatten))){
	    				alert('email格式錯誤');
						return false;
		    			}
	    			return true;
    			};
	    		
				//檢查密碼
				function checkPassword() {
					password = document.getElementById("password").value;
					var passwordpatten = new RegExp(/^[A-Za-z0-9]{6,18}$/);
					
					if (password == "") {
						//document.getElementById("passwordAlert").innerHTML = "<font color=red><b>你必須輸入密碼</b></font>";
						alert('密碼不能為空白');
						return false;
					}else if(!(password.match(passwordpatten))){
	    				alert('密碼格式錯誤');
						return false;
	    			}
					return true;
				};
				
				//檢查密碼兩次輸入是否正確
				function checkTwoPasswords() {
					password = document.getElementById("password").value;
					confirm_password = document.getElementById("password_check").value;
	
					if(password != confirm_password){
						//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>密碼必須相符合</b></font>";
						alert('兩個密碼必須相同');
						return false;
					}
					return true;
				};
				
/*				
				function nnShow()	{
				
					var value = document.getElementById("nn").value;
    					switch(value){
    					
    					case "886":
    						document.getElementById("nnAlert").innerHTML = "<font color=red><b>台灣手機號碼格式9-xxxx-xxxx</b></font>";
    						break;
    					case "60":
    						document.getElementById("nnAlert").innerHTML = "<font color=red><b>馬來西亞手機號碼格式1-xxxx-xxxx</b></font>";
    						break;
        				case "81":
        					document.getElementById("nnAlert").innerHTML = "<font color=red><b>日本手機號碼格式[7,8,9]x-xxxx-xxxx</b></font>";
        					break;
        				case "66":
        					document.getElementById("nnAlert").innerHTML = "<font color=red><b>泰國手機號碼格式[6,8,9]-xxxx-xxxx</b></font>";
        					break;
        				case "86":
        					document.getElementById("nnAlert").innerHTML = "<font color=red><b>中國手機號碼格式1xx-xxxx-xxxx</b></font>";
        					break;
        				}
				};

 */       			
    				function checkPhone() {
        				//var n = document.getElementById("nn").value;
        				var phonenumber = document.getElementById("phonenumber").value;
        				if (phonenumber == ""){
        					alert('請填入手機號碼');
        					return false;
            				}else {

							//台灣手機號碼檢查
    						var patten = new RegExp(/^[0]{1}[9]{1}[0-9]{2}[0-9]{3}[0-9]{3}$/);
							if (!(phonenumber.match(patten))){
    							//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>不符合台灣手機格式</b></font>";
    							alert('不符合台灣手機格式');
    							return false;
							}else{
							return true;
							}
    					}
            		};
/*        				}else if(n == 60){
    						var patten = new RegExp(/^[1]{1}-[0-9]{4}-[0-9]{4}$/);
    						if (!(phonenumber.match(patten))){
    							//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>不符合馬來西亞手機格式</b></font>";
    							alert('不符合馬來西亞手機格式');
    							return false;
    						}else{
							return true;
							}
        				}else if(n == 81){
    						var patten = new RegExp(/^[7,8,9]{1}[0-9]{1}-[0-9]{4}-[0-9]{4}$/);
    						if (!(phonenumber.match(patten))){
    							//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>不符合日本手機格式</b></font>";
    							alert('不符合日本手機格式');
    							return false;
    						}else{
							return true;
							}
        				}else if(n == 66){
    						var patten = new RegExp(/^[6,8,9]{1}-[0-9]{4}-[0-9]{4}$/);
    						if (!(phonenumber.match(patten))){
    							//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>不符合泰國手機格式</b></font>";
    							alert('不符合泰國手機格式');
    							return false;
    						}else{
								return true;
							}
        				}else if(n == 86){
    						var patten = new RegExp(/^[1]{1}[0-9]{2}-[0-9]{4}-[0-9]{4}$/);
    						if (!(phonenumber.match(patten))){
    							//document.getElementById("confirm_passwordAlert").innerHTML = "<font color=red><b>不符合中國手機格式</b></font>";
    							alert('不符合中國手機格式');
    							return false;
    						}else{
							return true;
							}
        				}
    				};
*/    				

		</script>
</body>

</html>
