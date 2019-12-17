<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == false) {
     header("Location:login.php");
    }
?>

<?php
  if (isset($_GET['proid']))  {
    $id = $_GET['proid'];
   }
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $quantity = $_POST['quantity'];
     $addtocard = $ct->addToCard($quantity,$id);
   }
?> 
 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">		
				<?php
             $getproduct = $pd->singleProduct($id);
             if($getproduct) {
             	  while ($get_result = $getproduct->fetch_object()) {
				?>		
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $get_result->image; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $get_result->productName; ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $get_result->price; ?></span></p>
						<p>Category: <span><?php echo $get_result->catName; ?></span></p>
						<p>Brand:<span><?php echo $get_result->brandName; ?></span></p>
					</div>
				<div class="add-cart">
				    <form action="" method="post">
              <input type="number" class="buyfield" name="quantity" value="1"/>
              <input type="submit" class="buysubmit" name="submit" value="Bye Now" />
            </form>
				</div>
				 <span style="color: red;font-size: 20px;">
							<?php
				       if (isset($addtocard)) {
				       	echo $addtocard;
				       }
							?>
							</span>
              <div class="add-cart">
               <a class="buysubmit" href="?wlistid=<?php echo $get_result->productId;?>">Save to List</a>
               <a class="buysubmit" href="?compareid=<?php echo $get_result->productId;?>">Add to Campare</a>       
              </div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $get_result->body; ?>
	    </div>
			<?php } } ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
            <?php
            $getcat = $cat->Catlist();
            if ($getcat) {
              while ($result = $getcat->fetch_object()) {
             
            ?>
				      <li><a href="productbycat.php?catId=<?php echo $result->catId;?>">
                <?php echo $result->catName;?></a></li>
            <?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
  
<?php include 'inc/footer.php'?>
