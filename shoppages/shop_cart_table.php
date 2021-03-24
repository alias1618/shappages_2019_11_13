	<table>
	<form action="checkout.php" method="post" onsubmit="return checklimitnumber();">
    <?php
    //require('menu.php');
    session_start();
    require_once ('connect_db.php');
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