<?php include 'inc/header.php'?>
<?php
    $login = Session::get('customerlogin');
    if ($login == true) {
    header("Location:order.php");
    }
?>
<?php 
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) { 
        $Logincustomer = $ctmr->customerLogin($_POST);
}
?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        <?php
          if (isset($Logincustomer)) {
            echo $Logincustomer;
          }
        ?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" type="text" placeholder="Enter Email" >
                  <input name="password" type="password" placeholder="Enter password" >
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons">
                      <div>
                        <button class="grey" name="login">Sign In</button>
                      </div></div> 
                    </form>
                    </div>
<?php 
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) { 
        $customer = $ctmr->addRegister($_POST);
}
?>
     
    	<div class="register_account">
    		<h3>Register New Account</h3>
        <?php
          if (isset($customer)) {
            echo $customer;
          }
        ?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Enter Name"  >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Enter City" >
							</div>
							
							<div>
								<input type="text" name="address" placeholder="Enter Your Address" >
							</div>
							<div>
								<input type="number" name="phone" placeholder="Enter Your Phone number" >
							</div>
		    			 </td>
		    			<td>
						
		    		<div>
						<select id="country" type="text" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Select a Country</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>

		         </select>
				 </div>	
         <div >
          <input type="text" name="zip" placeholder="Enter Your zip code " >
         </div>
         	<div>
           <input type="text" name="email" placeholder="Enter Your email " >
          </div>
         <div>
          <input type="password" name="password" placeholder="Enter Your Password " >
         </div>
	
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  
<?php include 'inc/footer.php'?>
