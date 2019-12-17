<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/../class/Product.php');
   $product = new Product();
   ?>
  
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <?php 
        if (isset($$deletedata)) {
        	echo $deletedata;
        };
        ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				 $productlist = $product->showproductList();
				 if ($productlist) {
				  $i=0;
				  while ($result = $productlist->fetch_object()) {
				  $i++;
				 ?>
				<tr class="odd gradeX" id="deleteid<?php echo $result->productId;?>">
					<td><?php echo $i;?></td>
					<td><?php echo $result->productName; ?></td>
					<td><?php echo $result->catId; ?></td>
					<td><?php echo $result->brandId; ?></td>
					<td><?php echo $fm->textShorten($result->body,50); ?></td>
					<td><?php echo $result->price; ?></td>
					<td><?php echo $result->image; ?></td>
					<td><?php echo $result->type; ?></td>
					
			<td><a href="productedit.php?productid=<?php echo $result->productId;?>">Edit</a> ||

      <a  class="delitem" data-id="deleteid<?php echo $result->productId;?>" data-url="ajax/product.php?productdeleleid=<?php echo $result->productId;?>">Delete</a></td>

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
