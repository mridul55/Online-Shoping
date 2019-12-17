<?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php"?>
 <?php include_once $filepath."/../helpers/Format.php"?>
 <?php 

 class Cart{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function addToCard($quantity,$id){
      $quantity  =  $this->fm->validation($_POST['quantity']);
      $quantity  =  mysqli_real_escape_string($this->db->link, $quantity);
      $productId =  mysqli_real_escape_string($this->db->link, $id );
      $sId       = session_id();

      $squery = " SELECT * from tbl_product where productId='$productId'  ";
      $result = $this->db->select($squery)->fetch_object();
      
      $productName = $result->productName;
      $price       = $result->price;
      $image       = $result->image;

      $checkquery = "SELECT * from tbl_cart where productId='$productId' and sId='$sId' ";
      $getpro = $this->db->select($checkquery);
      if ($getpro) {
        $msg = " product already Added!";
        return $msg;
      } else { 
      
      $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES   ('$sId','$productId','$productName','$price','$quantity','$image')";


      $inserted_rows = $this->db->insert($query);
   
      if ($inserted_rows) {
       header("Location:cart.php");
      } else {
        header("Location:404.php");
      }
    }
  }

  public function getcartproduct(){
    $sId = session_id();
    $query = " SELECT * from tbl_cart  where sId='$sId' ";
    $list = $this->db->select($query);
    return $list;
  }

    public function updateCard($cartId,$quantity){
       $cartId   = mysqli_real_escape_string($this->db->link,$cartId);
       $quantity = mysqli_real_escape_string($this->db->link,$quantity);
       
          $query = "UPDATE tbl_cart 
                    set
                    quantity = '$quantity'
                    where cartId = '$cartId' ";
          $catupdate = $this->db->update($query);
          if ($catupdate) {
              header("Location:cart.php");
             } else {
             header("Location:cart.php");
             }
    }
   
   public function deleteCard($delcartid){
      $delquery=" DELETE from tbl_cart where cartId='$delcartid'";
       $deldata=$this->db->delete($delquery);

        if ($deldata) {
          echo "<script class='success' style='color:blue'> Deleted Successfully.> window.location ='cart.php'; </script>";
           
            } else {
            "<span class='error'>  Not DELETED </span>";
                
            }
   }

   public function datacartTable(){
    $sId = session_id();
    $query = " SELECT * from tbl_cart  where sId='$sId' ";
    $result = $this->db->select($query);
    return $result;
   }

   public function delcustomercart(){
    $sId = session_id();
    $query = " DELETE from tbl_cart where sId='$sId' ";
    $result = $this->db->delete($query);
    return $result;
   }

   public function orderProduct($customerId){
    $sId = session_id();
    $query = " SELECT * from tbl_cart  where sId='$sId' ";
    $getpro = $this->db->select($query);
      if ($getpro) {
        while ($result = $getpro->fetch_object()) {
          $productId = $result->productId; 
          $productName = $result->productName; 
          $productId = $result->productId; 
          $quantity = $result->quantity; 
          $price = $result->price*$quantity; 
          $image = $result->image;
          $query = "INSERT INTO  tbl_order(customerId,productId,productName,quantity,price,image) VALUES   ('$customerId','$productId','$productName','$quantity','$price','$image')"; 
          $inserted_rows = $this->db->insert($query);
        } }


   }

public function PayableAmount($customerId){
  $query = " SELECT price from tbl_order  where customerId='$customerId' and date = now() ";
  $result = $this->db->select($query);
  return $result;
}

public function getorderproduct($customerId){
  $query = " SELECT * from tbl_order  where customerId='$customerId' order by productId desc ";
  $result = $this->db->select($query);
  return $result;
}

public function dataorderTable($customerId){
 $query = " SELECT * from tbl_order  where customerId='$customerId' ";
 $result = $this->db->select($query);
 return $result;
}

public function getAllorderproducts(){
  $query = " SELECT * from tbl_order  ORDER BY date desc";
  $result = $this->db->select($query);
  return $result;
}
 
 public function productShift($id,$date,$price){
   $id = mysqli_real_escape_string($this->db->link, $id);
   $date = mysqli_real_escape_string($this->db->link, $date);
   $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "UPDATE tbl_order 
                   set
           status='1' where customerId='$id' and date='$date' and price='$price' ";
      $catupdate = $this->db->update($query);
    if ($catupdate) {
       $msg = "<span class='success'>Updated Successfully.</span>";
       return $msg;
     } else {
      $msg = "<span class='success'>Not Updated </span>";
      return $msg;
     }

} 

public function productShiftConfirm($id,$date,$price){
  $id = mysqli_real_escape_string($this->db->link, $id);
  $date = mysqli_real_escape_string($this->db->link, $date);
  $price = mysqli_real_escape_string($this->db->link, $price);
   $query = "UPDATE tbl_order 
                  set
          status='$1' where customerId='$id' and date='$date' and price='$price' ";
     $catupdate = $this->db->update($query);
   if ($catupdate) {
      $msg = "<span class='success'>Updated Successfully.</span>";
      return $msg;
    } else {
     $msg = "<span class='success'>Not Updated </span>";
     return $msg;
    }
}

}
