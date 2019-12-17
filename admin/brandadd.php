<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
                <!-- (jquery ar jonno lagbe) <div  id="success"> </div> -->
               <div class="block copyblock"> 
                 <form action="" method="post" id="add" data-url="ajax/brand.php">
                    <table class="form">          
                        <tr>
                            <td>
                                <input type="text" name="brandName"  placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
