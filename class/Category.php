  <?php 
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php"?>
 <?php include_once $filepath."/../helpers/Format.php"?>
 <?php 

 class Category{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function AddCategory(){
     $catName=$this->fm->validation($_POST['catName']);
     $catName=mysqli_real_escape_string($this->db->link,$catName);
     if ($catName=="") {
       die(json_encode(['type'=>'error','message'=>'Flied Must Not Be Empty']));
     } else {
      $query = "INSERT into tbl_category (catName) values ('$catName')";
      $catinsert = $this->db->insert($query);
    if ($catinsert) {
       die(json_encode(['type'=>'success','message'=>'Category Inserted Successfully']));
     }
  }

}

public function editcategory($id){
  $query="SELECT * from tbl_category where catId='$id'";
  $category=$this->db->select($query);
  $result = $category->fetch_assoc();
  return $result;
}

  public function Catlist(){
    $query = " SELECT * from tbl_category order by catId desc";
    $catlist = $this->db->insert($query);
    return $catlist;
  }


    
   public function updatecategory($editcatid){
    $catName = $_POST['catName'];

     if ($catName=="") {
      die(json_encode(['type'=>'error','message'=>'Flied Must Not Be Empty']));
   } else {
      $query = "UPDATE tbl_category 
                   set
                catName='$catName' where catId='$editcatid'";
      $catupdate = $this->db->update($query);
    if ($catupdate) {
        die(json_encode(['type'=>'success','message'=>'Category Update Successfully']));
     }
  }

}  


    public function delCatById($delid){
     $delquery="DELETE from tbl_category where catId='$delid'";
        $deldata=$this->db->delete($delquery);
         if ($deldata) {
            echo"yes";
        }
    }



}
