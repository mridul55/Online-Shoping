<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../class/Cart.php';

  $ct = new Cart();
?>




<?php 
  if (isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shift = $ct->productShift($id,$time,$price);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <?php
                  if (isset($shift)) {
                    echo $shift;
                  }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Order Time</th>
							<th>Product</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>CustomerID</th>
              <th>Address</th>
              <th>Action</th>
						</tr>
					</thead>
					<tbody>
            <?php 
              $ct = new Cart();
              $fm = new Format();
              $getOrder = $ct->getAllorderproducts();
              if ($getOrder) {
                $i=0;
                while ($result = $getOrder->fetch_object()) {  
            ?>
						<tr class="odd gradeX">
							<td><?php echo $result->id;?></td>
              <td><?php echo $fm->formateDate($result->date);?></td>
              <td><?php echo $result->productName;?></td>
              <td><?php echo $result->quantity;?></td>
              <td><?php echo $result->price;?></td>
              <td><?php echo $result->customerId;?></td>
							<td><a href="customer.php?custid=<?php echo $result->customerId;?>">View Details</a> </td>
              <?php 
               if ($result->status =='0') { ?>
                <td><a href="?shiftid=<?php echo $result->customerId;?>&price=<?php echo $result->price;?>&time=<?php echo $result->date;?>">Shifted</a> </td> 
             <?php } elseif ($result->status =='1') { ?>
            <td>Pending</td>
             <?php   } else { ?>
            <td><a href="?delpro=<?php echo $result->customerId;?>&price=<?php echo $result->price;?>&time=<?php echo $result->date;?>">Removed</a> </td> 
            <?php   }  ?>
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
