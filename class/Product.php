 <?php 
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath."/../lib/Database.php"?>
 <?php include_once $filepath."/../helpers/Format.php";
  define ('SITE_ROOT', realpath(dirname(__FILE__)));
 ?>
 <?php 

 class Product{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

 public function addProduct($data,$file){
   $productName = $this->fm->validation($data['productName']);
   $catId       = $this->fm->validation($data['catId']);
   $brandId     = $this->fm->validation($data['brandId']);
   $body        = $this->fm->validation($data['body']);
   $price       = $this->fm->validation($data['price']);
   $type        = $this->fm->validation($data['type']);
   $productName   = mysqli_real_escape_string($this->db->link, $data['productName']);
   $catId         = mysqli_real_escape_string($this->db->link, $data['catId']);
   $brandId       = mysqli_real_escape_string($this->db->link, $data['brandId']);
   $body          = mysqli_real_escape_string($this->db->link, $data['body']);
   $price         = mysqli_real_escape_string($this->db->link, $data['price']);
   $type          = mysqli_real_escape_string($this->db->link, $data['type']);
  

     $permited =array('jpg','jpeg','png','gif');
     $file_name=$file['image']['name'];
     $file_size=$file['image']['size'];
     $file_temp=$file['image']['tmp_name'];


     $div=explode('.', $file_name);
     $file_ext=strtolower(end($div));
     $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
     $uploaded_image="upload/".$unique_image;


     if ($productName == "" || $catId == "" || $brandId == "" || $body == ""
      || $price == "" || $type == "" || $file_name == ""  ) {
       die(json_encode(['type'=>'error','message'=>'Field Must Be Not Empty']));

     } else if($file_size>1048567){
    die(json_encode(['type'=>'error','message'=>'Image size should be less then 1MB!']));
  } elseif (in_array($file_ext,$permited) == false){
    $msg = "<span class='error'>YOu can Uploaded only:-".implode(',',$permited)."</span>"; 
    die(json_encode(['type'=>'error','message'=>$msg]));
  } else {
    move_uploaded_file($file_temp, SITE_ROOT."/../admin/".$uploaded_image);
    $query="INSERT INTO tbl_product (productName,catId,brandId,body,price,image,type)
              VALUES
    ('$productName','$catId','$brandId','$body','$price','$uploaded_image','$type')";

    $inserted_rows=$this->db->insert($query);


    if ($inserted_rows) {
       die(json_encode(['type'=>'success','message'=>'Product Inserted Successfully']));
    } 
  }

  }
 
    public function showproductList(){
    $query = " SELECT * from tbl_product  order by productId  asc";
    $product = $this->db->select($query);
    return $product;
  }

   public function editProduct($id){
    $query = " SELECT * from tbl_product  where productId='$id' order by productId  asc";
    $list = $this->db->select($query);
    return $list;
  }


     public function updateProduct($data,$file,$id){
     $productName = $this->fm->validation($data['productName']);
     $catId       = $this->fm->validation($data['catId']);
     $brandId     = $this->fm->validation($data['brandId']);
     $body        = $this->fm->validation($data['body']);
     $price       = $this->fm->validation($data['price']);
     $type        = $this->fm->validation($data['type']);
     $productName   = mysqli_real_escape_string($this->db->link, $data['productName']);
     $catId         = mysqli_real_escape_string($this->db->link, $data['catId']);
     $brandId       = mysqli_real_escape_string($this->db->link, $data['brandId']);
     $body          = mysqli_real_escape_string($this->db->link, $data['body']);
     $price         = mysqli_real_escape_string($this->db->link, $data['price']);
     $type          = mysqli_real_escape_string($this->db->link, $data['type']);
    

       $permited =array('jpg','jpeg','png','gif');
       $file_name=$_FILES['image']['name'];
       $file_size=$_FILES['image']['size'];
       $file_temp=$_FILES['image']['tmp_name'];

       $div=explode('.', $file_name);
       $file_ext=strtolower(end($div));
       $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
       $uploaded_image="upload/".$unique_image;


       if ($productName == "" || $catId == "" || $brandId == "" || $body == ""
        || $price == "" || $type == "" || $file_name == ""  ) {
          die(json_encode(['type'=>'error','message'=>'Field Must Be Not Empty']));

       } else {
       if (!empty ($file_name)) {

       if($file_size>1048567){
     die(json_encode(['type'=>'error','message'=>'Image size should be less then 1MB!']));

    } elseif (in_array($file_ext,$permited) === false){
      $msg = "<span class='error'>YOu can Uploaded only:-".implode(',',$permited)."</span>"; 
    die(json_encode(['type'=>'error','message'=>$msg]));

    } else {
       
       if ($id) {
             $query="SELECT * from tbl_product where productId='$id'";
             $data=$this->db->select($query);
             $result=$data->fetch_assoc();
             if ($result) {
               $delimage=$result['image'];
               if (file_exists($delimage)) {
                 unlink( $delimage);
               }
             }
          }

     move_uploaded_file($file_temp, SITE_ROOT."/../admin/".$uploaded_image);
      $query = " UPDATE tbl_product SET
              productName = '$productName',
              catId       = '$catId',
              brandId     = '$brandId',
              body        = '$body',
              price       = '$price',
              image       = '$uploaded_image',
              type        = '$type'
                      where
              productId   = '$id'";
                  
      $update_rows=$this->db->update($query);
    if ($update_rows) {
       die(json_encode(['type'=>'success','message'=>'Product Update Successfully']));
      } 
    } 

  }  else {
      $query = " UPDATE tbl_product SET
              productName = '$productName',
              catId       = '$catId',
              brandId     = '$brandId',
              body        = '$body',
              price       = '$price',
              image       = '$uploaded_image',
              type        = '$type'
                      where
              productId   = '$id'";
                  
      $update_rows=$this->db->update($query);
    if ($update_rows) {
       die(json_encode(['type'=>'success','message'=>'Product Update Successfully']));
      } 
  }

} 

}

  public function deleleProductId($delid){
    $query = "SELECT * from tbl_product where productId='$delid'";
    $getData = $this->db->select($query);
   if ($getData) {
         $delimg = $getData->fetch_assoc();
      $dellink=$delimg['image'];
         if (file_exists($dellink)) {
            unlink($dellink);
    }
  }

  $delquery= "DELETE from tbl_product where productId='$delid' ";
   $delData=$this->db->delete($delquery);
    

  }

  public function featurProduct(){
    $query = " SELECT * from tbl_product where type='0' order by productId  desc limit 4 ";
    $result = $this->db->select($query);
    return $result;
  } 

  public function newProduct(){
    $query = " SELECT * from tbl_product  order by productId  desc limit 4 ";
    $result = $this->db->select($query);
    return $result;
  } 

  public function singleProduct($id){
    $query = "SELECT p.*, c.catName, b.brandName from tbl_product as p, tbl_category as c,tbl_brand as b where p.catId = c.catId and p.brandId = b.brandId and p.productId = '$id' ";
    $result = $this->db->select($query);
     return $result;
  }

  public function getleatsIphone(){
    $query = " SELECT * from tbl_product  where brandId = '9' order by  productId  desc limit 1 ";
    $result = $this->db->select($query);
    return $result;
  }

  public function Iphone(){
    $query = " SELECT * from tbl_product  where brandId = '9' limit  4";
    $result = $this->db->select($query);
    return $result;
  }

  public function getleatsCanon(){
    $query = " SELECT * from tbl_product  where brandId = '8' order by  productId  desc limit 1 ";
    $result = $this->db->select($query);
    return $result;
  }

  public function getleatsSumsang(){
    $query = " SELECT * from tbl_product  where brandId = '7' order by  productId  desc limit 1 ";
    $result = $this->db->select($query);
    return $result;
  }

  public function getleatsAser(){
    $query = " SELECT * from tbl_product  where brandId = '6' order by  productId  desc limit 1 ";
    $result = $this->db->select($query);
    return $result;
  }

  public function Aser(){
    $query = " SELECT * from tbl_product where brandId='6'  order by  productId  desc limit 4 ";
    $result = $this->db->select($query);
    return $result;
  }
   public function Samsung(){
     $query = " SELECT * from tbl_product where brandId='6'  order by  productId  desc limit 4 ";
     $result = $this->db->select($query);
     return $result;
   }
   public function Canon(){
     $query = " SELECT * from tbl_product where brandId='6'  order by  productId  desc limit 4 ";
     $result = $this->db->select($query);
     return $result;
   }

   public function ProductCat($id){
    $catId=mysqli_real_escape_string($this->db->link,$id);
    $query = " SELECT * from tbl_product  where catId='$catId' ";
    $list = $this->db->select($query);
    return $list;
  }

}
?>
