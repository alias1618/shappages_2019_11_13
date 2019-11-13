<!DOCTYPE html>
<html>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">	<!--  讓mysql顯示中文而不是亂碼     -->
</head>
    <body>
        <?php
        session_start();
        header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼

            require_once("connect_db.php");
            $account=$_POST["account"];
            
            $password =md5($_POST["password"]);
            
            $email =$_POST["email"];
            $name =$_POST["name"];
            $postcode =$_POST["postcode"];
            $add =$_POST["add"];
            
            
            //$nn = $_POST["nn"];
            $phone = $_POST["phonenumber"];
            
            setcookie("account", "$account", time()+3600);
            setcookie("email", "$email", time()+3600);
            setcookie("name", "$name", time()+3600);
            setcookie("postcode", "$postcode", time()+3600);
            setcookie("add", "$add", time()+3600);
            setcookie("phonenumber", "$phone", time()+3600);
            $role ="2";
            $checkcode = $_POST["typecode"];
            if($checkcode != $_SESSION["check_code"]){
                echo "<script>alert('驗證碼錯誤');  </script>";
              echo "<script>window.location.href='regist.php'</script>";
              return;
            }
            
            //先查詢DB檢查email有沒有重複，沒有才能insert進入DB
            $sql_query = "SELECT * FROM user WHERE user_email = '$email'";
            
            $result = $conn->query($sql_query) or die('MySQL query error');
            $row = mysqli_fetch_array($result); //將陣列以欄位名索引
            $db_email=$row['user_mail'];
                              
            if($email == $db_email) {
                //header('location:index.php');
                echo $email;
                echo $db_email;
                echo "失敗";
                $url = "index.php";
                echo "<script>alert('註冊失敗');</script>?";
                echo "<script>window.location.href='regist.php'</script>";
                    
            }else { 

            $sql_insert = "INSERT INTO user (user_account, user_email, user_password, user_name, user_phone, user_postcode, user_add, role_id)
                                     VALUES ('$account','$email','$password', '$name', '$phone', '$postcode', '$add', '$role')";
            mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
            $result = $conn->query($sql_insert) or die('MySQL insert error');
            //mysqli_close($conn); //關閉資料庫連結
            
            //header('location:index.php');  //回index 
            echo "成功";
            
            $sql_query02 = "SELECT * FROM user WHERE user_account='$account' AND user_email='$email' AND user_name='$name'";
            $result02 = $conn->query($sql_query02);
            $row02 = mysqli_fetch_array($result02);
            $_SESSION['user_id'] = $row02['user_id'];
            $_SESSION['role_id'] = $row02['role_id'];
            $_SESSION['user_name'] = $row02['user_name'];
            
            
            
            echo "<script>window.location.href='index.php';alert('註冊成功');</script>";
            }
         ?>
    </body>
</html>