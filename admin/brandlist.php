<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
    <?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../class/Brand.php');
    $listofbrand = new Brand();
    ?>
 <?php 
   if (isset($_GET['branddelele'])) {
        $delid=$_GET['branddelele'];
        $delid = preg_replace('/[^-a-zA-Z0-9-]/','',$_GET['branddelele']);
        $deletedata = $listofbrand->deleleBrandId($delid);

      }
      ?>
      <div class="grid_10">
        <div class="box round first grid">
          <h2>Category List</h2>
          <?php
          if (isset($deletedata)) {
            echo $deletedata;
          }
          ?>
          <div class="block">        
            <table class="data display datatable" id="example">
              <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Brand Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $branlist = $listofbrand->showBrandList();
                if ($branlist) {
                  $i=0;
                  while ($result = $branlist->fetch_object()) {
                    $i++;
                    ?>
                    <tr class="odd gradeX" id="deleteid<?php echo $result->brandId;?>">
                      <td><?php echo $i;?></td>
                      <td><?php echo $result->brandName;?></td>
                      <td><a href="brandedit.php?brandid=<?php echo $result->brandId;?>">Edit</a> ||

                       <a  class="delitem" data-id="deleteid<?php echo $result->brandId;?>" data-url="ajax/brand.php?delid=<?php echo $result->brandId;?>">Delete</a></td>
                     </tr> 
                   <?php } } ?>          
                 </tbody>
               </table>
             </div>
           </div>
         </div>
         <script type="text/javascript">
          $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();
          });
        </script>
        <?php include 'inc/footer.php';?>

