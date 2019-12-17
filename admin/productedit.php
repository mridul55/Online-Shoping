<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../class/Brand.php');
include_once ($filepath.'/../class/Category.php');
include_once ($filepath.'/../class/Product.php');
?>
<?php
if (!isset($_GET['productid']) || ($_GET['productid']) == NULL) {
      echo "<script> window.location='productlist.php'</script>";
    } else {
      $id = $_GET['productid'];
     }
       $product = new Product();
      
?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Add New Product</h2>
    <?php 
    if (isset($updateproduct)) {
     echo $updateproduct;
   }
   ?>
   <div class="block">               
  <form action="" method="post" enctype="multipart/form-data" id="edit" data-url="ajax/product.php?productid=<?php echo $id; ?>">
      <table class="form">
       <?php
        $productlist = $product->editProduct($id);
        if ($productlist) {
         while ($result = $productlist->fetch_object()) {
        ?>
        <tr>
          <td>
            <label>Product Name</label>
          </td>
          <td>
            <input type="text" name="productName" value="<?php echo $result->productName; ?>" class="medium" 
            />
          </td>
        </tr>
        <tr>
          <td>
            <label>Category</label>
          </td>
          <td>
            <select id="select" name="catId" value="<?php echo $result->catId; ?>">
              <option>Select Category</option>
              <?php 
              $cat = new Category();
              $catlist = $cat->Catlist();
              if ($catlist) {
                $i=0;
                while ($catresult = $catlist->fetch_assoc()) {
                  $i++;
                  ?>
                  <option
                    <?php 
                    if ($result->catId == $catresult['catId'] ) {  ?>
                     selected ="selected"
                  <?php  } ?>
                   value="<?php echo $catresult['catId'];?>">
                    <?php echo $catresult['catName'];?></option>
                  <?php } }?>
                </select>
              </td>
            </tr>
            <tr>
              <td>
                <label>Brand</label>
              </td>
              <td>
                <select id="select" name="brandId" value="<?php echo $result->brandId; ?>">
                  <option>Select Brand</option>
                  <?php 
                  $listofbrand = new Brand();
                  $branlist = $listofbrand->showBrandList();
                  if ($branlist) {
                    $i=0;
                    while ($brand_result = $branlist->fetch_assoc()) {
                      $i++;
                      ?>
                      
                      <option
                        <?php
                         if ($result->brandId == $brand_result['brandId'] ) {  ?>
                          selected ="selected"
                       <?php  } ?>
                       value="<?php echo $brand_result['brandId'];?>">
                        <?php echo $brand_result['brandName'];?>
                      </option>
                    <?php } }?>
                  </select>
                </td>
              </tr>

              <tr>
                <td style="vertical-align: top; padding-top: 9px;">
                  <label>Description</label>
                </td>
                <td>
                  <textarea class="tinymce" name="body"><?php echo $result->body; ?></textarea>
                </td>
              </tr>
              <tr>
                <td>
                  <label>Price</label>
                </td>
                <td>
                  <input type="text" name="price" value="<?php echo $result->price; ?>" class="medium" />
                </td>
              </tr>

              <tr>
                <td>
                  <label>Upload Image</label>
                </td>
                <td>
                  
                  <input type="file" name="image" value="" />
                </td>
              </tr>
              <tr>
                <td>
                  <label></label>
                </td>
                <td>
                  <img src="<?php echo $result->image; ?>" alt="" width="100">
                  
                </td>
              </tr>

              <tr>
                <td>
                  <label>Product Type</label>
                </td>
                <td>
                  <select id="select" name="type" value="">
                    <option>Select Type</option> 

                    <option 
                      <?php
                      if ($result->type == 0) { ?>
                        selected = "selected"
            
                     <?php  }?>
                     value="0">Featured</option>
                    <option
                     <?php 
                     if ($result->type == 1) { ?>
                       selected = "selected"
                       
                    <?php  }?>
                     value="1"> General</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td></td>
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
    <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
      });
    </script>
    <!-- Load TinyMCE -->
    <?php include 'inc/footer.php';?>


