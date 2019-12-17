<?php 
   $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../class/Product.php');
   $pt = new Product();
     if (isset($_POST['action']) && $_POST['action'] == 'additem') { 
        $product = $pt->addProduct($_POST,$_FILES);
  }

     if (isset($_POST['editactionaction']) && $_POST['editactionaction'] == 'edititem') { 
           $id = $_GET['productid']; 
        $updateproduct = $pt->updateProduct($_POST,$_FILES,$id);
    }

    if (isset($_GET['productdeleleid'])) {
      $delid = $_GET['productdeleleid'];

      $deletedata = $pt->deleleProductId($delid);
      if ($deletedata) {
        echo "yes";
      }
    }
           
  ?> 
