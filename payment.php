<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == false) {
     header("Location:login.php");
    }
?>

<style>
  .payment{width: 500px;min-height: 200px;text-align: center;border: 1px solid #ddd;margin-bottom: 0 auto}
  .payment h2{border-bottom: 1px solid #ddd;margin-bottom: 20px;padding: 5px}
  .payment a{padding: 10px 10px;font-size: 25px}
  .back a{width: 150px;margin: 5px auto 0;padding-bottom: 4px; text-align: center; display: block; background: #555; border: 1px solid #333; color: #fff; border-radius: 3px;}
</style>

<div class="main">
  <div class="content">
    <div class="section group">
      <div class="payment">
        <h2>Choose Your payment Option</h2>
        <a href="offline.php">Offline Payment</a>
        <a href="online.php">Online Payment</a>
      </div>
      <div class="back">
        <a href="cart.php">Previous</a>
      </div>
    </div>
    
  </div>
  
</div>
<?php include 'inc/footer.php'?>
