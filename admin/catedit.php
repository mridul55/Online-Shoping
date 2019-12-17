<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php
   $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../class/Category.php');
   $editcategory = new Category();
   if (!isset($_GET['editcatid']) && $_GET['editcatid']== NULL) {
      echo "<script> window.location='catlist.php'</script>";
     } else {
      $cateditid = $_GET['editcatid'];
      $editcat = $editcategory->editcategory($cateditid);
     }
   
  
    ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
                    <div id="success"> </div>
               <div class="block copyblock"> 
                 <form  method="post" id="edit" data-url="ajax/addcat.php?editid=<?php
                 echo $cateditid; ?>">
                    <table class="form">    
                  <tr>
                      <td>
                          <input type="text" name="catName" id="catName" value="<?php echo $editcat['catName'];?>"
                           class="medium" />
                           <input type="hidden" value="" id="editcatid">
                      </td>
                  </tr>
                <tr> 
                <td>
                    <input type="submit" name="submit" Value="Update" />
                </td>
            </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
