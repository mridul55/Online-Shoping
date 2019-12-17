<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == false) {
     header("Location:login.php");
    }
?>
<?php 
  if (isset($_GET['customerid'])) {
    $id      = $_GET['customerid'];
    $time    = $_GET['time'];
    $price   = $_GET['price'];
    $confirm = $ct->productShiftConfirm($id,$time,$price);
}
?>

<style>
  .order{width: 700px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin-bottom: 0 auto}
  .order h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding: 5px}
  .order a{padding: 10px 10px;font-size: 25px}
  
</style>

<div class="main">
  <div class="content">
    <div class="section group">
      <div class="order">
        <h2>Your Order List</h2>
          <table class="tblone">
            <tr>
              <th>No</th>
              <th>Product Name</th>
              <th>Image</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            <?php 
            $customerId = Session::get("customerId");
             $getorder = $ct->getorderproduct($customerId);
               if ($getorder) {
                $i = 0;
                while ($ct_result = $getorder->fetch_object()) {
                $i++;
            ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $ct_result->productName;?></td>
              <td><img src="admin/<?php echo $ct_result->image;?>" alt=""/></td>
              <td><?php echo $ct_result->quantity;?></td>
             
              <td><?php
                $total = $ct_result->price*$ct_result->quantity;
                echo $total; ?> </td>
             <td> <?php echo $fm->formateDate($ct_result->date);?></td>

              <td><?php
              if ($ct_result->status == '0') {
                  echo "Pending";
              } elseif ($ct_result->status == '1'){ 
              echo "Shifted";
            } else {
                echo "OK";
              }
              
               ?></td>
              <?php
              if ($ct_result->status == '1') {  ?>
                <td>
              <a href="?customerId=<?php echo $customerId;?>&price=<?php echo $ct_result->price;?>&time=<?php echo $ct_result->date;?>">Confirm</a> </td>
            <?php   } elseif ($ct_result->status == '2') { ?>
          
              <td>Ok</td>
             <?php  } elseif ($ct_result->status == '0') { ?>
              <td>N/a</td>
          <?php   } ?>

              
            </tr>
           
            <?php } } ?>
           
            
          </table>
        
      </div>
      <div class="clear">
       
      </div>
    </div>
    
  </div>
  
</div>
<?php include 'inc/footer.php'?>
