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
				<li><a href="#">Employee Edit</a></li>
			</ul>

			<div class="">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Edit Employee</h2>
						
					</div>
				<form action="employeeeditdb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal form-label-left input_mask"  enctype="multipart/form-data">

						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
						
							  </tr>
						  </thead>   
						  <tbody>
						  				  <?php
include_once'includes/config2.php';
$id=$_GET['id'];
$query="SELECT * FROM tbl_employee where employee_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     
							<tr>
								<td class="center">
								
							
								
							
								
								
								
							
								<input type="hidden" name="id"  placeholder="Department" value="<?php echo $row['employee_id']; ?>">
								First Name:<br> <input type="text" name="firstname"  placeholder="First Name" value="<?php echo $row['firstname']; ?>"><br><br>
								Address:<br> <input type="text" name="address"   placeholder="Address" value="<?php echo $row['address']; ?>"><br><br>
								Contact Number:<br> <input type="text" name="contactno"   placeholder="Contact Number" value="<?php echo $row['contact_no']; ?>"><br><br>
								Age:<br> <input type="text" name="age"   placeholder="Age" value="<?php echo $row['age']; ?>"><br><br>
				
								</td>
								
										<td class="center">
								
							Last Name:<br>	<input type="text" name="lastname"   placeholder="Last Name" value="<?php echo $row['lastname']; ?>"><br><br>
								Gender:<br> <input type="text" name="gender"   placeholder="Gender" value="<?php echo $row['gender']; ?>"><br><br>
								Position:<br> <input type="text" name="position"   placeholder="Position" value="<?php echo $row['position']; ?>"><br><br>
									
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
