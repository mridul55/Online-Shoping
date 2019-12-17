<?php include 'inc/header.php'?>
<?php include 'inc/slider.php'?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Iphone</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
  	      	<?php
  	      	  $leatstiphone = $pt->Iphone();
  	      	     if ($leatstiphone) {
  	      	     while ($iphone = $leatstiphone->fetch_object()) {
  	      	?>
  				<div class="grid_1_of_4 images_1_of_4">
  					 <a href="preview.php?proid=<?php echo $iphone->productId; ?>"> <img src="admin/<?php echo $iphone->image;?>" alt="" /></a>
  					 	 <h2> <?php echo $iphone->productName; ?> </h2>
  					 	 <p><?php echo $fm->textShorten($iphone->body,50); ?></p>
  					 	 <p><span class="price"><?php echo $iphone->price; ?></span></p>

  					    <div class="button"><span><a href="preview.php?proid=<?php echo $iphone->productId; ?>" class="details">Details</a></span></div>
  				</div>
  				<?php } } ?>
			
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		  <h3>Latest from Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				 $leatstaser = $pt->Aser();
				 if ($leatstaser) {
				   while ($aser = $leatstaser->fetch_object()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $aser->productId; ?>"> <img src="admin/<?php echo $aser->image;?>" alt="" /></a>
					 	 <h2> <?php echo $aser->productName; ?> </h2>
					 	 <p><?php echo $fm->textShorten($aser->body,50); ?></p>
					 	 <p><span class="price"><?php echo $aser->price; ?></span></p>

					    <div class="button"><span><a href="preview.php?proid=<?php echo $aser->productId; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'?>
