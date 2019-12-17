<?php include 'inc/header.php'?>
<?php include 'inc/slider.php'?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
            $featurepd = $pd->featurProduct();
            if ($featurepd) {
            while ($FP_result = $featurepd->fetch_object()) {
            
	      	?>
				<div class="grid_1_of_4 images_1_of_4">

					 <a href="preview.php?proid=<?php echo $FP_result->productId; ?>">
					 <img src="admin/<?php echo $FP_result->image; ?>" alt="" /></a>

					 <h2> <?php echo $FP_result->productName; ?> </h2>
					 <p><?php echo $fm->textShorten($FP_result->body,50); ?></p>
					 <p><span class="price"><?php echo $FP_result->price; ?></span></p>

				   <div class="button"><span><a href="preview.php?proid=<?php echo $FP_result->productId; ?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>
      	</div>

			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
					      	<?php 
				            $newpd = $pd->newProduct();
				            if ($newpd) {
				            while ($new_result = $newpd->fetch_object()) {
				            
					      	?>
				<div class="grid_1_of_4 images_1_of_4">

					 <a href=preview.php?proid=<?php echo $new_result->productId; ?>">
					 	<img src="admin/<?php echo $new_result->image; ?>" alt="" /></a>
            
					 	 <h2> <?php echo $new_result->productName; ?> </h2>
					 <p><?php echo $fm->textShorten($new_result->body,50); ?></p>
					  <p><span class="price"><?php echo $new_result->price; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $new_result->productId; ?>" class="details">Details</a></span></div>
				</div>
				
			
			<?php } } ?>
			</div>
    </div>
 </div>
</div>
  
 <?php include 'inc/footer.php'?>
