<?php
include'header.php';

?>
			
			<!-- start: Content -->
			<div id="content" >
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Product</a></li>
			</ul>

			<div class="">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Edit Product</h2>
						
					</div>
				<form action="editdirectorydb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal form-label-left input_mask"  enctype="multipart/form-data">

						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
						
							  </tr>
						  </thead>   
						  <tbody>
						  				  <?php
include_once'includes/config2.php';
$id=$_GET['id'];
$query="SELECT * FROM tbl_product where ID='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     
							<tr>
								<td class="center">
								
							
								
							
								
								
								
							
								<input type="hidden" name="id"  placeholder="Department" value="<?php echo $row['ID']; ?>">
								Product Name:<br> <input type="text" name="prod_name"  placeholder="Product Name" value="<?php echo $row['prod_name']; ?>"><br><br>
								Product Description:<br> <input type="text" name="prod_desc"   placeholder="Product Description" value="<?php echo $row['prod_desc']; ?>"><br><br>
				
								</td>
								
										<td class="center">
								
							Date Modify:<br>	<input type="text" name="date_added"   placeholder="date_added" value="<?php echo $row['date_added']; ?>"><br><br>
								Price:<br> <input type="number" name="price"   placeholder="price" value="<?php echo $row['price']; ?>"><br><br>
									
								</td>
								
							
								
								
							</tr> <?php
						
						}?>
							 <tr >
						<td colspan="2"><br><center><a href="product.php">	 <button type="button" class="btn btn-primary">Back</button></a>
                          <button type="submit" class="btn btn-success" name="add" onclick="return personalInfo();">Edit</button></center><br>
							</td> </tr>
						  </tbody>
					  </table>            
				</form>
				</div><!--/span-->
			
			</div>

			
			
			
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	

<?php

include'footer.php';
?>
