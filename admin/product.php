<?php
include'header.php';



?>
<style type="text/css">
  
  #sidebar > ul > li.active{

  color: #939da8 !important;  
  border-top: 1px solid #37414b !important;
    border-bottom: 1px solid #1f262d !important;
    background-color: #2E363F !important;
}

#sidebar > ul > li:nth-child(3) > a
{
  color: #ffffff !important;
    text-decoration: none !important;

    background-color: #27a9e3 !important;
    border-bottom: 1px solid #27a9e3 !important;
    border-top: 1px solid #27a9e3 !important;
  
}
</style>
 <script>

function deletethis(){
if
	(confirm('Are you sure you want to Delete this?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

</script> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">Product</a> <a href="#" class="current">View Products</a> </div>
    <h1>View Products</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      <a href="addproduct.php">
        <button type="button"  class="btn btn-primary"  ><i class="icon-plus-sign"></i> Add Product</button>
    </a>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List of Product</h5>

          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
           
        	    <thead>
					<tr>
						<th>Product Name</th>
        		<th>Description</th>
        		<th>Price</th>
						<th>Product Code</th>
						<th>Quantity</th>
						<th>Product Image</th>
						<th>Action</th>
					</tr>
				</thead>  
                <tbody>
			  
				<?php
				include_once'includes/config2.php';
				$query="SELECT * FROM products";
				$result=mysql_query($query)or die(mysql_error());
				while ($row=mysql_fetch_array($result)){

				?>     

             		<tr>
						<td><center><b><?php echo $row['name']; ?></b></center></td>
					
						<td style="width: 30%;"><?php echo $row['description']; ?></td>
						<td><?php echo $row['price']; ?></td>
						<td><?php echo $row['code']; ?></td>
						<td><?php echo $row['stock']; ?></td>

						
						<td  class="center">
							<center>
						 	 <a href="photoproduct.php?id=<?php echo $row['ID']; ?>"><img src="<?php echo $row['image']; ?>" width="100px;" id="photos" ></a>
							</center>
						 </td>
							
						<td class="center"><center>
						
						 <form action="productedit.php?id=<?php echo $row['id']; ?>" method="POST" >
							  <button type="submit" name="delete" class="btn btn-warning "  style="width: 100px;"><i class="icon-edit"></i> Edit</button>
						
						
					  </form><br>
					  	
					   <form action="productdelete.php?id=<?php echo $row['id']; ?>" method="POST" onsubmit='return deletethis()'>
							  <button type="submit" name="delete" class="btn btn-danger "  style="width: 100px;"><i class="icon-trash"></i> Delete</button>
						
						
					  </form><br>

					
							  <button type="button" data-toggle="modal" data-target="#restockProductModal<?php echo $row['id']; ?>" class="btn btn-primary"  style="width: 100px;"><i class="icon-plus-sign"></i> Restock</button>
						
						
					 	 <div class="modal fade" id="restockProductModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="restockProductModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                          	 <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>



                            </button>
                            <h5 class="modal-title" id="restockProductModalLabel"><i class="icon-plus-sign"> </i>Restock Product</h5>
                           



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="restock.php">



                            <label for="input-restock-num">Enter Quantity:</label>



                            <input type="number" step="1" min="0" value="0" name="input-restock-num">



                            <input type="hidden" value="<?php echo $row['id']; ?>" name="product-id-restock">



                        </div>



                          <div class="modal-footer">



                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



                            <button class="btn btn-primary" type="submit" id="btn-restock" name="btn-restock">Done</button> 



                          </form>



                            



                          </div>



                        </div>



                      </div>



                    </div>

                         </center>
						  </td>
								
								
								
							</tr>
                	  <?php
						
						}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include'footer.php';


?>