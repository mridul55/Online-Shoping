<?php include 'inc/header.php'?>
<?php include 'inc/slider.php'?>

<?php

  if (!isset($_GET['catId']) || ($_GET['catId']) == NULL) {
    echo "<script> window.location='404.php'</script>";
  } else {
    $id = $_GET['catId'];
   }
     
    /*if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $quantity = $_POST['quantity'];
     $addtocard = $ct->addToCard($quantity,$id);
   }*/
?> 

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
                $getdata = $pt->ProductCat($id);
                if ($getdata) {
                while ($result = $getdata->fetch_object()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href=preview.php?proid=<?php echo $result->productId; ?>">
					 	<img src="admin/<?php echo $result->image; ?>" alt="" /></a>

					 <h2> <?php echo $result->productName; ?></h2>
					 <p><?php echo $fm->textShorten($result->body,50); ?></p>
					 <p><span class="price"><?php echo $result->price; ?></span></p>
				   <div class="button"><span><a href="preview.php?proid=<?php echo $result->productId; ?>" class="details">Details</a></span></div>
				</div>
			<?php } } else {
            echo "<h2> Products Are Not Available In this Category";
          }
				?>
				
			</div>

	
	
    </div>
 </div>
</div>
   
<?php include 'inc/footer.php'?>
