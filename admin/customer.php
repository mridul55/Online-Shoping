<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/Customer.php';?>
<?php
   if (!isset($_GET['custid']) && $_GET['custid']== NULL) {
      echo "<script> window.location='inbox.php'</script>";
     } else {
      $id = $_GET['custid'];
      /*$editcat = $editcategory->editcategory($customerid);*/
     }
     $cus = new Customer();
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       echo "<script> window.location='inbox.php'</script>";
     }
   
  
    ?> 
  <div class="grid_10">
      <div class="box round first grid">
          <h2>Customer Details</h2>
              <div id="success"> </div>
         <div class="block copyblock"> 
          <?php 
          
           $getCust = $cus->getCustomerById($id);
           if ($getCust) {
             while ($result = $getCust->fetch_assoc()) { 
          ?>

           <form action="" method="post" >
              <table class="form">    
            <tr>
              <td>Name</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['name'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>city</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['city'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>address</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['address'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>phone</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['phone'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>country</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['country'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>zip</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['zip'];?>"
                     class="medium" />
                </td>
            </tr>
            <tr>
              <td>email</td>
                <td>
                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>"
                     class="medium" />
                </td>
            </tr>
          <tr> 
          <td>
              <input type="submit" name="submit" Value="OK" />
          </td>
      </tr>
              </table>
            <?php } } ?>
              </form>
          </div>
      </div>
  </div>
<?php include 'inc/footer.php';?>
