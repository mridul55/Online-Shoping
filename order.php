<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == false) {
     header("Location:login.php");
    }
?>

 <div class="main">
    <div class="content">
    <div class="section">
      <div class="Order">
        <h2>Order page</h2>
      </div>
    </div>   
       <div class="clear"></div>
    </div>
 </div>

  <?php include 'inc/footer.php'?>
