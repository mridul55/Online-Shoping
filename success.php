<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == false) {
     header("Location:login.php");
    }
?>

<style>
  .sussess{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin-bottom: 0 auto}
  .sussess h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding: 5px}
  .sussess a{padding: 10px 10px;font-size: 25px}
  .sussess p{line-height: 25px;}
</style>

<div class="main">
  <div class="content">
    <div class="section group">
      <div class="sussess">
        <h2 style="color: green;font-size: 25px">Success</h2>
        <?php
         $customerId = Session::get("customerId");
        $amount = $ct->PayableAmount($customerId);
        if ($amount) {
          $sum = 0;
         while ($result = $amount->fetch_object()) {
            $price = $result->price; 
            $sum = $sum+$price;
            
          }
        }
        ?>
        <p style="color: green;font-size: 25px">Total Payable Amount(vat): $
     <?php 
        $vat = $sum * 0.1;
        $total = $sum + $vat;
        echo $total;
      ?>
        </p>
        <p style="color: green;font-size: 25px">Thanks for Purchace. Receive your order successfully. <a href="orderdetails.php">Visit Here</a></p>
      </div>
     
    </div>
    
  </div>
  
</div>
<?php include 'inc/footer.php'?>
