<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>客服明細</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
<!--
table{
    border-collapse:separate;
    collapse;border:1px solid black;
}
td{
    collapse;border:3px solid black;
}
-->
</style>
</head>
<body>
<?php 
          include("menu.php");
          require_once("connect_db.php");
          header("Content-Type:text/html; charset=utf-8");    //讓mysql顯示中文而不是亂碼
?>
			<table align="center">
			<tr>
				<td align="center">顧客提問</td>
			<tr>
  		<?php 
  		    $customer_form_id= $_REQUEST['customer_form_id'];
  		    //$user_id = $_REQUEST['user_id'];
  
            $sql_query02 = "SELECT * FROM customer_form WHERE customer_form_id='$customer_form_id' OR customer_form_answer_id='$customer_form_id'";
            mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
            $result02 = $conn->query($sql_query02) or die("MySQL query error");
            while($row02 = mysqli_fetch_array($result02)){
                $customer_form_question = $row02["customer_form_question"];
                //$customer_form_id = $row02['customer_form_id'];
                $user_id = $row02["user_id"];
                $role_id = $row02["role_id"];
                $customer_form_answer_id = $row02['customer_form_answer_id'];
                $customer_form_answer = $row02['customer_form_answer'];
                //$buy_number = $row02["buy_number"];
                if(($customer_form_question) != 99){
                ?>
                
               	<tr>
                <td align="center"><?php echo nl2br($customer_form_question);?> </td>                            
      	   		</tr>
      	   		<?php }?>
      	   	<tr>
      <?php if (($customer_form_answer) != 99){
                if($role_id == 1){    //1 是客服     2是顧客
                    //echo "<tr><td align='right'>客服回覆</td></tr>";
                    echo "<tr><td align='right'><b>客服回覆</b><br>".nl2br($customer_form_answer)."</td></tr>";
                }else if($role_id == 2){
                    //echo "<tr><td align='left'>顧客回覆</td></tr>";
                    echo "<tr><td align='left'><b>顧客回覆</b><br>".nl2br($customer_form_answer)."</td></tr>";
                }
            }
       }
            ?>
            
      	   	</tr>
                <!--  
                <td align="center"><?php //echo $product_price;?> </td>
                <td align="center"><?php //echo $buy_number;?> </td>
                -->
                <?php 
                /*
                $sql_query_04 = "SELECT * FROM customer_form_answer WHERE user_id='$user_id' AND customer_form_id ='$customer_form_id'";
                mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
                $result_04 = $conn->query($sql_query_04) or die("MySQL query error");
                while($row_04 = mysqli_fetch_array($result_04)){
                    $customer_form_answer = $row_04["customer_form_answer"];
                    $role_id = $row_04['role_id'];
                */
                ?>
            <!-- <tr>-->
                
                <?php /* if($role_id == 1){    //1 是客服     2是顧客
                    echo "<tr><td align='right'>客服回覆</td></tr>";
                    echo "<tr><td align='right'>".nl2br($customer_form_answer)."</td></tr>";
                }else if($role_id == 2){
                    echo "<tr><td align='left'>顧客回覆</td></tr>";
                    echo "<tr><td align='left'>".nl2br($customer_form_answer)."</td></tr>";
                }
                 
                    
                }*/
                ?> 
           <!-- </tr>-->
                
                
                
 <?php            
            
            
?>	
			</table>
			<!--  
			<table border="1" align="right" >
						<tr>
				<td align="center">
				<?php //if(!empty($customer_service_answer)){
                //echo "客服答覆";
                //}
                ?></td>
  		<?php 

		  //$customer_form_id = $_REQUEST['customer_form_id'];
  		//echo $customer_form_id;
            //$sql_query_03 = "SELECT * FROM customer_service WHERE customer_form_id='$customer_form_id'";
            //mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
            //$result_03 = $conn->query($sql_query_03) or die("MySQL query error");
            //while($row_03 = mysqli_fetch_array($result_03)){
                //$customer_service_answer = $row_03["customer_service_answer"];
                //$user_id = $row_03["user_id"];
                //$product_price = $row02["product_price"];
                //$buy_number = $row02["buy_number"];
                ?>
			

				<!--  
				<td align="center">商品價格</td>
				<td align="center">購買數量</td>
				-->
			<!--</tr>  
           <!-- <tr>             
                <!--<td align="right">
                <?php // if(!empty($customer_service_answer)){
                    //echo nl2br($customer_service_answer);
                //} //nl2br()
                ?> <!--</td>
                <!--  
                <td align="center"><?php //echo $product_price;?> </td>
                <td align="center"><?php //echo $buy_number;?> </td>
                -->
			<!--</tr>

 <?php            //}
?>	
			<!--</table>-->
			<!---->
			
			
<?php 
        $sql_query_04 = "SELECT * FROM user WHERE user_id='$user_id'";
        mysqli_set_charset($conn, "utf8");  //讓mysql顯示中文而不是亂碼
        $result_04 = $conn->query($sql_query_04) or die("MySQL query error");
        while($row_04 = mysqli_fetch_array($result_04)){
            $user_email = $row_04["user_email"];
            $user_name = $row_04["user_name"];
        }
?>
		 <br>
		 <br>
		<form action="customer_form_insert.php" method="post" align="center" >
        <!--<input type="hidden" name="id" value="<?php //echo $user_id?>" />-->
<!-- align="center" style="vertical-align:bottom;" -->
        <!--  
        	<label>姓名</label>
        	<br>
        	<input id="C_name" name="C_name" type="text" /></input><br>
        	<br>
        	  
        	<label>您的Email</label>
        	<br>
        	<input id="C_email" name="C_email" type="text" /></input><br>
        	<br>
        	<label>您的電話號碼</label>
        	<br>
        	
        	<input id="C_tel" name="C_tel" type="text" /></input>
        	<br>
        -->
        <table align="center">
        <input id="user_id" name="user_id" type="hidden" value="<?php echo $user_id?>"/></input>
        	<input id="customer_form_id" name="customer_form_id" type="hidden" value="<?php echo $customer_form_id?>"/></input>
        	<input id="user_name" name="user_name" type="hidden" value="<?php echo $user_name?>"/></input>

        	<input id="user_email" name="user_email" type="hidden" value="<?php echo $user_email?>"/></input>
        
        	<label  >顧客回答</label><br>
        	<br>
        	<textarea id="answer" name="answer" rows="6" cols="70" ></textarea>
        	<!--  
    		選擇檔案一	<input type="file" name="file_upload[]" multiple id="file_upload"><br>
    		-->
    		<br>
    		
        	<input type="submit" value="送出" >
			</table>
    	</form>	
    	
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

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>