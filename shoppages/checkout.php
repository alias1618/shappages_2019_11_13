<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>結帳</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

 <?php 
 session_start();
include("menu.php");
?>
  <p align="center">結帳</p>
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
     <div id=product_table>
	<form action="check_type.php" method="post" onsubmit="return checknumber();">
    <?php 
    require_once ('connect_db.php');
    
    if(!isset($_SESSION['user_id'])){
        //echo "<script>checklogin();</script>";
        echo "<script>window.location.href='login.php';alert('請先登入');</script>";
    }else if(empty($_SESSION['product'])){
        //echo '購物車內無商品';
    }else{
     ?>
       <p align="center">姓名 <?php echo $_SESSION['user_name'];?></p>

<?php 
    }
    if (!empty($_SESSION['product'])){
        //echo '<pre>';print_r($_SESSION['product']);echo '</pre>';
    }
   // echo '<pre>';print_r($_SESSION['product'][0]['product_id']);echo '</pre>';
    if(!empty($_SESSION['product'])){
        $total = 0;
        $total_number=0;
        //$o = "";

        ?>

			<table align="center">
			
			<th>商品名稱</th><th></th><th>價格</th><th>數量</th><th>小計</th>
    				<?php 
    				foreach($_SESSION['product'] as $k=>$val){
    				 ?>
    			<tr>
    				<!--  <input type=hidden id="array_id" name="array_id" value=<?php //echo $k;?>> -->
					<input type=hidden id="product_id" name="product_id" value=<?php echo $val['product_id'];?>>
        			<td align="center"><?php echo $val['product_name'];?></td>
        			<input type=hidden id="productname_<?php echo $k;?>" name="product_name[<?php //$i?>]" value=<?php echo $val['product_name'];?>>
        			<td></td>
        			<td align="center"><?php echo $val['product_price'];?></td>
        			<td align="center" ><?php echo $val['productnumber'];?>
  		
        			<?php 
        			$total_number +=$val['productnumber'];
        			$subtotal=$val['product_price']*$val['productnumber'];
    		        $total+=$subtotal;
    		          ?>
    		         <td align="center"><?php echo $subtotal;?></td>
    		        <!--   <td><a href="shop_delete.php?product_id=<?php //echo $val['product_id'];?>">刪除</a></td>-->

    			</tr>
    			<?php 

    				   }

    				?>
    			<tr><td></td></tr>
    			<tr><td></td></tr>
    			<tr>
    				<td>合計</td>
    				<td></td>
    				<td></td>
					<td align="center"><?php echo $total_number;?></td>
        			<input type=hidden id="total_number" value=<?php echo $total_number;?>>
    				<td align="center"><?php echo $total;?></td>
    			</tr>
    			<div id=emailAlert></div>
    			
			</table>

			<?php 
            }else {
             ?>
			   <div align="center"> <?php echo "購物車無商品";?>	</div>
			    <?php 
			}
			?>
	<br>
    <div align="center"><input  type="submit" value="確認" onclick="return checklimitnumber()" ></div>
    </div>
   
    </form>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
    //檢查總數量是不是大於15是的話跳回購物車
        function checklimitnumber(){
    		//var number = document.getElementById("productnumber_"+k).value;
    		var totalnumber = document.getElementById("total_number").value;
    		if (totalnumber > 15){
    			alert('總商品數量不能超過15個');
    			window.location = "shop_cart.php";  				
    			return false;
    		}
    		return true;
        };
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

			function checkNumberzero(k)
			{  

				var productname = document.getElementById("productname_"+k).value;
				var productnumber = document.getElementById("productnumber_"+k).value;
				//var pn = productnumber[i].value;
				
					var data = "k=" + k + "&productnumber=" + productnumber + "&productname=" + productname; //可用

			    $_xmlHttpRequest();

			        xmlHTTP.onreadystatechange=function ()
			        {
			            if(xmlHTTP.readyState == 4)
			            {
			                if(xmlHTTP.status == 200)
			                {
				                //var str=i;
			                    var str=xmlHTTP.responseText;
			                    if (str != ""){
			                    alert(str);
			                    document.getElementById("emailAlert").innerHTML=str;
			                    window.location.reload();
			                    //if (str == 0){
			                    //refreshTable();
			                    //}
			                    }
			                }
			            }
			        }
			        xmlHTTP.open("POST","check_number_zero.php",true);
			        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			        xmlHTTP.send(data);
			    };

            	function refreshTable() {
    				var xhttp = new XMLHttpRequest();

    				//event handler
        			//call back function
        			xhttp.onreadystatechange = function() {
            			//alert("readyState = " + this.readyState);
            			//alert("status = " + this.status);
            			
                        if (this.readyState == 4 && this.status == 200) {
                            //alert(this.responseText);
                        	document.getElementById("product_table").innerHTML = this.responseText;
                        }
        			};
        			  
        			xhttp.open("GET", "cart_show.php", true);
        			xhttp.send();
            	};

    </script>
</body>

</html>
