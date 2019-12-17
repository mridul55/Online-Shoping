<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../class/Product.php'); 
 $pt = new Product();
?>
<div class="header_bottom">
    <div class="header_bottom_left">
      <div class="section group">
        <?php
         $leatstiphone = $pt->getleatsIphone();
         if ($leatstiphone) {
           while ($iphone = $leatstiphone->fetch_object()) {
        ?>
        <div class="listview_1_of_2 images_1_of_2">
          <div class="listimg listimg_2_of_1">
             <a href="preview.php?proid=<?php echo $iphone->productId; ?>"> <img src="admin/<?php echo $iphone->image;?>" alt="" /></a>
          </div>
            <div class="text list_2_of_1">
            <h2>Iphone</h2>
            <p><?php echo $iphone->productName;?></p>
            <div class="button"><span><a href="preview.php?proid=<?php echo $iphone->productId; ?>">Add to cart</a></span></div>
           </div>
         </div>   
  <?php } } ?>

             <?php
              $leatstcanon = $pt->getleatsCanon();
              if ($leatstcanon) {
                while ($canon = $leatstcanon->fetch_object()) {
             ?>
             <div class="listview_1_of_2 images_1_of_2">
               <div class="listimg listimg_2_of_1">
                  <a href="preview.php?proid=<?php echo $canon->productId; ?>"> <img src="admin/<?php echo $canon->image;?>" alt="" /></a>
               </div>
                 <div class="text list_2_of_1">
                 <h2>CANON</h2>
                 <p><?php echo $canon->productName;?></p>
                 <div class="button"><span><a href="preview.php?proid=<?php echo $canon->productId; ?>">Add to cart</a></span></div>
                </div>
              </div>   
       <?php } } ?>


      </div>
      <div class="section group">
        <?php
         $leatstsamsumg = $pt->getleatsSumsang();
         if ($leatstsamsumg) {
           while ($samsumg = $leatstsamsumg->fetch_object()) {
        ?>
        <div class="listview_1_of_2 images_1_of_2">
          <div class="listimg listimg_2_of_1">
             <a href="preview.php?proid=<?php echo $samsumg->productId; ?>"> <img src="admin/<?php echo $samsumg->image;?>" alt="" /></a>
          </div>
            <div class="text list_2_of_1">
            <h2>SUMSANG</h2>
            <p><?php echo $samsumg->productName;?></p>
            <div class="button"><span><a href="preview.php?proid=<?php echo $samsumg->productId; ?>">Add to cart</a></span></div>
           </div>
         </div>   
  <?php } } ?>

             <?php
              $leatstaser = $pt->getleatsAser();
              if ($leatstaser) {
                while ($aser = $leatstaser->fetch_object()) {
             ?>
             <div class="listview_1_of_2 images_1_of_2">
               <div class="listimg listimg_2_of_1">
                  <a href="preview.php?proid=<?php echo $aser->productId; ?>"> <img src="admin/<?php echo $aser->image;?>" alt="" /></a>
               </div>
                 <div class="text list_2_of_1">
                 <h2>ASER</h2>
                 <p><?php echo $aser->productName;?></p>
                 <div class="button"><span><a href="preview.php?proid=<?php echo $aser->productId; ?>">Add to cart</a></span></div>
                </div>
              </div>   
       <?php } } ?>
      </div>
      <div class="clear"></div>
    </div>
       <div class="header_bottom_right_images">
       <!-- FlexSlider -->
             
      <section class="slider">
          <div class="flexslider">
          <ul class="slides">
            <li><img src="images/1.jpg" alt=""/></li>
            <li><img src="images/2.jpg" alt=""/></li>
            <li><img src="images/3.jpg" alt=""/></li>
            <li><img src="images/4.jpg" alt=""/></li>
            </ul>
          </div>
        </section>
<!-- FlexSlider -->
      </div>
    <div class="clear"></div>
  </div>  
