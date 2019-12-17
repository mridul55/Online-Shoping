<?php 
   $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../../class/Category.php');
   $addcategory = new Category();

   if (isset($_POST['action']) && $_POST['action'] == 'additem') { 
     $catdata = $addcategory->AddCategory();
  }


   if (isset($_POST['editactionaction']) && $_POST['editactionaction'] == 'edititem') {
      $id = $_GET['editid']; 
      $catdata   = $addcategory->updatecategory($id);
  }

  if (isset($_GET['delid'])) {
    $id = $_GET['delid'];
    $deletedata = $addcategory->delCatById($id);
  }
         
?> 
