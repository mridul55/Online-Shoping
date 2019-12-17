<?php include 'inc/header.php'?>
<?php
			if (isset($_GET['delcart'])) {
			 $delcartid = $_GET['delcart'];
			 $delcard = $ct->deleteCard($delcartid);
			 }
     
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $cartId = $_POST['cartId'];
       $quantity = $_POST['quantity'];
       $updatecard = $ct->updateCard($cartId,$quantity);
   }
?>

<?php 
 if (!isset($_GET['id'])) {
   echo "<meta http-equiv='ref resh' content='0; URL=?id=live'/>";
 }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    				<?php 
			    	       if (isset($updatecard)) {
			    	       	echo $updatecard;
			    	       }
			    	       if (isset($delcard)) {
			    	       	echo $delcard;
			    	       }

			    				?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
               $getpro = $ct->getcartproduct();
                 if ($getpro) {
                 	$sum = 0;
                 	$i = 0;
                 	$qty = 0;
                 	while ($ct_result = $getpro->fetch_object()) {
                  $i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $ct_result->productName;?></td>
								<td><img src="admin/<?php echo $ct_result->image;?>" alt=""/></td>
								<td><?php echo $ct_result->price;?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $ct_result->cartId;?>"/>
										<input type="number" max="50" min="1" name="quantity" value="<?php echo $ct_result->quantity;?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								  $total = $ct_result->price*$ct_result->quantity;
								  echo $total;
								 ?></td>
								<td><a onclick="return confirm('Are you sure to Delete');" href="?delcart=<?php echo $ct_result->cartId; ?>">X</a> </td>
							</tr>
							<?php
							 $qty = $qty+ $ct_result->quantity;
               $sum = $sum + $total;
               Session::set("sum", $sum);
               Session::set("qty", $qty);
							?>
							<?php } } ?>
             
							
						</table>
						<?php
						$data = $ct->datacartTable();
						if ($data ) {
							?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td><?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. 10%  </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php
                 $vat = $sum*0.1;
                 $gettotal = $sum+$vat; 
                 echo $gettotal;
								?> </td>
							</tr>
					   </table>
					 <?php } else {
             header("Location.index.php");
					 } ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'?>
