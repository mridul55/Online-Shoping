<?php 
   $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../class/Brand.php');
   $addbrand = new Brand();
     if (isset($_POST['action']) && $_POST['action'] == 'additem') { 
        $brandName = $_POST['brandName'];
        $brand = $addbrand->brandAdd($brandName);
  }

     if (isset($_POST['editactionaction']) && $_POST['editactionaction'] == 'edititem') {
        $id = $_GET['brandeditid']; 
        $catdata   = $addbrand->updateBrand($id);
    }

    if (isset($_GET['delid'])) {
      $delid = $_GET['delid'];
      $deletedata = $addbrand->deleleBrandId($delid);
    }
           
  ?> 

