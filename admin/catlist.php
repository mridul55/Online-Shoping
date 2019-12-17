<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
   $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../class/Category.php');
   $addcategory = new Category();
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
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						  $catlist = $addcategory->Catlist();
						  if ($catlist) {
              $i=0;
              while ($result = $catlist->fetch_assoc()) {
              $i++;
						?>
						<tr class="odd gradeX" id="deleteid<?php echo $result['catId'];?>">
							<td><?php echo $i;?></td>
							<td><?php echo $result['catName'];?></td>
							<td><a class="edit" href="catedit.php?editcatid=<?php echo $result['catId'];?>">Edit</a> ||

							 <a class="delitem" data-id="deleteid<?php echo $result['catId'];?>" data-url="ajax/addcat.php?delid=<?php echo $result['catId'];?>">Delete</a></td>
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

