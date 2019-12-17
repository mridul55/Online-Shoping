<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
  <?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../class/Brand.php');
    if (!isset($_GET['brandid']) || ($_GET['brandid']) == NULL) {
      echo "<script> window.location='brandlist.php'</script>";
    } else {
      $id = $_GET['brandid'];
     }
       $brand = new Brand();
  ?> 
<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Category</h2>
  
    <!-- (jquery ar jonno) <div id="success"> </div> -->
    <div class="block copyblock"> 
     <form action="" method="post" id="edit" data-url="ajax/brand.php?brandeditid=<?php
                 echo $id; ?>">
      <table class="form">
       <?php
          $branlist = $brand->editBrandList($id);
            if ($branlist) {
              while ($result = $branlist->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <input type="text" name="brandName" value="<?php echo $result['brandName'];?>" id="catName"
            class="medium" />
            <input type="hidden" value="<?php echo $result['brandId'];?>"  id="editcatid">
          </td>
        </tr>
        <tr> 
          <td>
            <input type="submit" name="submit" Value="Update" />
          </td>
        </tr>
      <?php } }?>
    </table>
  </form>
</div>
</div>
</div>
<?php include 'inc/footer.php';?>
