<?php include 'inc/header.php'?>
<?php include 'inc/slider.php'?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
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
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				 $leatstsamsumg = $pt->Samsung();
				 if ($leatstsamsumg) {
				   while ($samsumg = $leatstsamsumg->fetch_object()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="preview.php?proid=<?php echo $samsumg->productId; ?>"> <img src="admin/<?php echo $samsumg->image;?>" alt="" /></a>
					 	 <h2> <?php echo $samsumg->productName; ?> </h2>
					 	 <p><?php echo $fm->textShorten($samsumg->body,50); ?></p>
					 	 <p><span class="price"><?php echo $samsumg->price; ?></span></p>

					    <div class="button"><span><a href="preview.php?proid=<?php echo $samsumg->productId; ?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php
				 $leatstcanon = $pt->Canon();
				 if ($leatstcanon) {
				   while ($canon = $leatstcanon->fetch_object()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $canon->productId; ?>"> <img src="admin/<?php echo $canon->image;?>" alt="" /></a>
					 	 <h2> <?php echo $canon->productName; ?> </h2>
					 	 <p><?php echo $fm->textShorten($canon->body,50); ?></p>
					 	 <p><span class="price"><?php echo $canon->price; ?></span></p>

					    <div class="button"><span><a href="preview.php?proid=<?php echo $canon->productId; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
    </div>
 </div>
</div>
<?php include 'inc/footer.php'?>
