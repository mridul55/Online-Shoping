<?php include 'inc/header.php'?>
<?php
$login = Session::get('customerlogin');
if ($login == false) {
 header("Location:login.php");
}
?>
    <?php
     if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $customerId = Session::get('customerId');
        $insertorder = $ct->orderProduct($customerId);
        $deldata = $ct->delcustomercart();
        header("Location:success.php");
     }
    ?>
<style>
  .division{width: 50%; float: left}
  .tblone{width: 550px; margin: 0 auto; border:2px solid #ddd;}
  .tblone tr td{text-align: justify; padding: }
  .ordernow{padding-bottom:30px }
  .ordernow a{width:200px;margin: 30px;text-align: center;padding: 5px;font-size: 30px;display: block;background: #ff0000;color: #fff;border-radius: 3px }
</style>
<div class="main">
  <div class="content">
    <div class="section group">
      <div class="division">
        <table class="tblone">
          <tr>
            <th >SL</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
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
                
                <td><?php echo $ct_result->price;?></td>
                <td><?php echo $ct_result->quantity;?></td>
              
                <td><?php
                $total = $ct_result->price*$ct_result->quantity;
                echo $total;
                ?></td>
              
              </tr>
              <?php
              $qty = $qty+ $ct_result->quantity;
              $sum = $sum + $total;
            
              ?>
            <?php } } ?>


          </table>

            <table style="float:right;text-align:left; margin:auto; border:2px solid #ddd;
            margin-top: 10px; margin-left: 30px;" width="70%">
              <tr>
                <td>Sub Total : </td>
                <td>:</td>
                <td><?php echo $sum; ?></td>
              </tr>
              <tr>
                <td>VAT</td>
                <td>:</td>
                <td>10%===(<?php echo $vat=$sum*0.1;?>)  </td>
              </tr>
              <tr>
                <td>Grand Total</td>
                <td>:</td>
                <td><?php
                $vat = $sum*0.1;
                $gettotal = $sum+$vat; 
                echo $gettotal;
                ?> </td>
              </tr>
              <tr>
                <td>Quantity</td>
                <td>:</td>
                <td><?php echo $qty;?> </td>
              </tr>
            </table>
          </div>
          <div class="division">

          </div>
        </div>
      </div>
      <div class="ordernow">
        <a href="?orderid=order">Order</a>
  </div>
</div>
    <?php include 'inc/footer.php'?>
