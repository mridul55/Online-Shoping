<?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php"?>
 <?php include_once $filepath."/../helpers/Format.php"?>
 <?php 

 class Customer{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }
   
   public function addRegister($data){
    $name=mysqli_real_escape_string($this->db->link,$data['name']);
    $city=mysqli_real_escape_string($this->db->link,$data['city']);
    $address=mysqli_real_escape_string($this->db->link,$data['address']);
    $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
    $country=mysqli_real_escape_string($this->db->link,$data['country']);
    $zip=mysqli_real_escape_string($this->db->link,$data['zip']);
    $email=mysqli_real_escape_string($this->db->link,$data['email']);
    $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
   

  if ($name == "" || $city == "" || $address == "" || $phone == ""
   || $country == "" || $zip == "" || $email == "" || $password == "" ) {
    
   $msg = "<span class='error'> Field must Not Be Empty! </span> "; 
   return $msg;
  } 
  $mailquery = " SELECT * from tbl_customer where email='email' limit 1";
  $mailcheck = $this->db->select($mailquery);
  if ($mailcheck != false) {
    $msg = "<span class='error'> Email All Ready Exits ! </span> "; 
   return $msg;
  } else {
    $query="INSERT INTO tbl_customer (name,city,address,phone,country,zip,email,password)
              VALUES
    ('$name','$city','$address','$phone','$country','$zip','$email','$password')";

    $inserted_rows=$this->db->insert($query);


    if ($inserted_rows) {
        $msg = " <span class='error'> Registration Sussessfully ! </span> "; 
   return $msg;
    } 
  }

}
  
  public function customerLogin($data){
    $email=mysqli_real_escape_string($this->db->link,$data['email']);
    $password=mysqli_real_escape_string($this->db->link, md5($data['password']));
    if ($email == "" || $password == "" ) {
        $msg = "<span class='error'> Field must Not Be Empty! </span> "; 
        return $msg;
    }else{
      $query = " SELECT * from tbl_customer where email='$email' and password='$password'";
      $result = $this->db->select($query);
    if ($result != false) {
        $value=$result->fetch_object();
        Session::set("customerlogin",true);
        Session::set("customerId",$value->id);
        Session::set("customerUser",$value->name);
        header("Location:order.php");
      }else{
        echo " <span style='color:red;font-size:18px;'>No Result found !! .</span>";
        }
     }
  }

public function getCustomerById($id){
  $query = "SELECT *  from tbl_customer where id = '$id'";
  $result = $this->db->select($query);
  return $result;
}
 


}
