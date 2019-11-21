<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>購物車</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body onLoad="refreshTable()">
<?php 
include('menu.php');
include('session_check.php');
?>
  <p align="center">購物車</p>
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
  	<form action="checkout.php" method="post" onsubmit="return checklimitnumber();">
      <div id="shop_cart">
	<table>

    <?php
    
    //session_start();
    //require_once ('connect_db.php');
    if (!empty($_SESSION['product'])){
        //echo '<pre>';print_r($_SESSION['product']);echo '</pre>';
    }

    if(!empty($_SESSION['product'])){
        $total = 0;
        $total_number=0;
        ?>

		<table align="center">

			<th>商品名稱</th><th></th><th>價格</th><th>數量</th><th>小計</th>
    				<?php 
    				foreach($_SESSION['product'] as $k=>$val){
    				?>
    			<tr>
    				<input type=hidden id="array_id" name="array_id" value=<?php echo $k;?>>
					<input type=hidden id="productid_<?php echo $k;?>" name="product_id" value=<?php echo $val['product_id'];?>>
        			<td align="center"><?php echo $val['product_name'];?></td>
        			<input type=hidden id="productname_<?php echo $k;?>" name="product_name[<?php //$i?>]" value=<?php echo $val['product_name'];?>>
        			
        			<td></td>
        			<td align="center"><?php echo $val['product_price'];?></td>
        			<input type=hidden id="productprice_<?php echo $k;?>" name="product_price[<?php //$i?>]" value=<?php echo $val['product_price'];?>>
        			<td align="center">
        			<!-- onchange="checkNumberzero(<?php //echo $k;?>)"  -->
        			<input type=number style="width:3em" min="0" id="productnumber_<?php echo $k;?>" name="productnumber[<?php echo $val['product_id'];?>]" onchange="changeProductNumber(<?php echo $k;?>)" value=<?php echo $val['productnumber'];?>></td>
        			<?php 
        			$total_number +=$val['productnumber'];
        			$subtotal=$val['product_price']*$val['productnumber'];
    		              $total+=$subtotal;
    		          ?>
    		         <td align="center"><?php echo $subtotal;?></td>
    		         <td><a href="shop_delete.php?k=<?php echo $k;?>">刪除</a></td>
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
    <div align="center"><input type="button" value="返回商品頁" onclick="location='index.php'"> <input type="submit" value="結帳" ></div>
    <div align="center"></div>
    </form>
 </table>  
 </div> 
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
        //檢查商品數量是不是大於15
        function checklimitnumber(){
    			//var number = document.getElementById("productnumber_"+k).value;
    			var totalnumber = document.getElementById("total_number").value;
    			if (totalnumber > 15){
					alert('總商品數量不能超過15個');  				
    				return false;
    			}
    			return true;
            }
            
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

				function changeProductNumber(k)
				{  
					var productid = document.getElementById("productid_"+k).value;
					var productname = document.getElementById("productname_"+k).value;
					var productprice = document.getElementById("productprice_"+k).value;
					var productnumber = document.getElementById("productnumber_"+k).value;
					var data = "k=" + k + "&productnumber=" + productnumber + "&productid=" + productid + 
					"&productname=" + productname + "&productprice=" + productprice; //可用

				    $_xmlHttpRequest();

				        xmlHTTP.onreadystatechange=function ()
				        {
				            if(xmlHTTP.readyState == 4)
				            {
				                if(xmlHTTP.status == 200)
				                {
				                    var str=xmlHTTP.responseText;
				                    refreshTable();
				                    //window.location.reload("shop_cart.php");
				                    if (str != ""){
				                    alert(str);
				                    //document.getElementById("emailAlert").innerHTML=str;
				                    
				                    //if (str == 0){
				                    //refreshTable();
				                    }
				                    //}
				                }
				            }
				        }
				        xmlHTTP.open("POST","change_product_number.php",true);
				        xmlHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				        xmlHTTP.send(data);
				    };
            	function refreshTable() {
    				var xhttp = new XMLHttpRequest();

        			xhttp.onreadystatechange = function() {

                        if (this.readyState == 4 && this.status == 200) {
                        	document.getElementById("shop_cart").innerHTML = this.responseText;
                        }
        			};
        			  
        			xhttp.open("GET", "shop_cart_table.php", true);
        			xhttp.send();
            	}
 
        </script>
</body>

</html>