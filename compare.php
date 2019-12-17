<?php include 'inc/header.php'?>

<div class="main">
  <div class="content">
    <div class="cartoption">    
    <div class="cartpage">
      <h2>Compare</h2>
             
          <table class="tblone">
            <tr>
              <th >SL</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
            <?php 
             $getpro = $ct->getcartproduct();
               if ($getpro) {
                $i = 0;
                while ($ct_result = $getpro->fetch_object()) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $ct_result->productName;?></td>
              <td><img src="admin/<?php echo $ct_result->image;?>" alt=""/></td>
              <td><a href="preview.php?proid=<?php echo $FP_result->productId; ?>">View</a></td>
            </tr>
           
            <?php } } ?>
           
            
          </table>
          
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
