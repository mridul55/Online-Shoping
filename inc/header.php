  <?php 
  include 'lib/Session.php';
  Session::init();
  include 'lib/Database.php'; 
  include 'helpers/Format.php';
   spl_autoload_register(function($classname){
   include_once "class/".$classname.".php";
  });

   $db  = new Database();
   $fm  = new Format();
   $ct  = new Cart();
   $pd  = new Product();
   $cat = new Category();
   $ctmr = new Customer();
  ?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
    <div class="header_top">
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="" /></a>
      </div>
      <?php
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
          $deldata = $ct->delcustomercart();
          Session::destroy();
        }
      ?>
        <div class="header_top_right">
          <div class="search_box">
            <form>
              <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
            </form>
          </div>
          <div class="shopping_cart">
          <div class="cart">
            <a href="#" title="View my shopping cart" rel="nofollow">
                <span class="cart_title">Cart</span>
                <span class="no_product">
                  <?php
                  $data = $ct->datacartTable();
                  if ($data ) {
                    $sum = Session::get("sum");
                    $qty = Session::get("qty");
                    echo "Taka:".$sum." || Qty:".$qty;

                  } else {
                    echo "(Empty)";
                  }
                  ?>
                </span>
              </a>
            </div>
            </div> <?php 
                if (Session::get('customerlogin') == true) { ?>
                    <div class="login"><a href="?action=logout">LogOut</a></div>
               <?php  } else { ?>
                  <div class="login"><a href="login.php">Login</a></div>
               <?php  }
            ?>
      
     <div class="clear"></div>
   </div>
   <div class="clear"></div>
 </div>
<div class="menu">
  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
    <li><a href="index.php">Home</a></li>
    
    <li><a href="topbrands.php">Top Brands</a></li>
    <?php 
      $checkcart = $ct->datacartTable();
       if ($checkcart) { ?>
         <li><a href="cart.php">Cart</a></li>
         <li><a href="payment.php">Payment</a></li>
      
      <?php }  ?>
      <?php 
            $customerId = Session::get("customerId");
            $checkorder = $ct->dataorderTable($customerId);
            if ($checkorder) { ?>
              <li><a href="orderdetails.php">Order</a></li>
      <?php }  ?>
    <li><a href="compare.php">Compare</a> </li>

    <li><a href="contact.php">Contact</a> </li>
    <div class="clear"></div>
  </ul>
</div>
  
