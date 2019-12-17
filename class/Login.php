 <?php include_once "../lib/Database.php"?>
 <?php include_once "../helpers/Format.php"?>
 <?php 

  class Login{
  public $db;
  public $fm;
  public function __construct(){
    $this->db = new Database();
    $this->fm = new Format();
  }
  

   public function Adminlogin(){
          $adminUser=$this->fm->validation($_POST['adminUser']);
          $adminPass=$this->fm->validation(md5($_POST['adminPass'])) ;
          $adminUser=mysqli_real_escape_string($this->db->link,$adminUser);
          $adminPass=mysqli_real_escape_string($this->db->link,$adminPass);
          if ($adminUser == "" || $adminPass == "") {
          $loginmsg= " UserName AND Password Must Not Be empty!";
           return $loginmsg;
          } else { 
          $query="SELECT * FROM tbl_admin where adminUser='$adminUser' AND adminPass='$adminPass'";
          $result=$this->db->select($query);
          if ($result != false) {
            $value=mysqli_fetch_array($result);
            $row=mysqli_num_rows($result);
          if ($row>0) {
           Session::set("login",true);
           Session::set("adminUser",$value['adminUser']);
           Session::set("adminId",$value['adminId']);
           Session::set("level",$value['level']);
           header("Location:index.php");
            } else {
              echo " <span style='color:red;font-size:18px;'>No Result found !! .</span>";
                }
            } else {
              echo " <span style='color:red;font-size:18px;'>adminUser or password not match!! .</span>";
            }
        }
   }

}

