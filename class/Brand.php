<?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php"?>
 <?php include_once $filepath."/../helpers/Format.php"?>
 <?php 

 class Brand{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function brandAdd($brandName){
    $brandName=$this->fm->validation($_POST['brandName']);
     $brandName=mysqli_real_escape_string($this->db->link,$brandName);
     if ($brandName=="") {
      die(json_encode(['type'=>'error','message'=>'Flied Must Not BE Empty']));
     } else {
      $query = "INSERT into tbl_brand (brandName) values ('$brandName')";
      $brandinsert = $this->db->insert($query);
    if ($brandinsert) {
     die(json_encode(['type'=>'success','message'=>'Brand Inserted Successfully']));
     } 
    }
  }

  public function showBrandList(){
    $query = " SELECT * from tbl_brand  order by brandId  asc";
    $brandlist = $this->db->select($query);
    return $brandlist;
  }

    public function editBrandList($id){
    $query = " SELECT * from tbl_brand  where brandId='$id' order by brandId  asc";
    $brandlist = $this->db->select($query);
    return $brandlist;
  }

  public function updateBrand($id){
     $brandName=$this->fm->validation($_POST['brandName']);
     $brandName=mysqli_real_escape_string($this->db->link,$brandName);
    if ($brandName == "") {
       die(json_encode(['type'=>'error','message'=>'Field Must Not Be Empty']));
   } else {
      $query = "UPDATE tbl_brand 
                   set
                brandName='$brandName' where brandId='$id'";
      $brandupdate = $this->db->update($query);
    if ($brandupdate) {
        die(json_encode(['type'=>'success','message'=>'Brand Updated Successfuly']));
     } 
  }
  }
  
     public function deleleBrandId($delid){
     $delquery=" DELETE from tbl_brand where brandId='$delid'";
        $deldata=$this->db->delete($delquery);

         if ($deldata) {
            $msg =  "<span class='success'>  DELETED Successfuly</span>";
            return $msg;
           } else {
              $msg = "<span class='error'>   Not DELETED </span>";
                return $msg;
           }
}



}

