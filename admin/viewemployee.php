<?php
include'header.php';


?>
 <script>

function delete(){
if
	(confirm('Are you sure you want to Remove?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

</script> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Employee Information</a> <a href="#" class="current">View Employee</a> </div>
    <h1>Select Employee</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="">
      <div class="span12">
	  
			   <?php
			  			include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row3=mysql_fetch_array($result)){
 $admin_id=$row3['admin_id'];
			$position2=$row3['position'];
}
$query="SELECT * FROM tbl_employee";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>        
	   
	   <div class="span3"  style="border-style: solid;border-color: #4c770b;padding:20px" align="center">
	<a href="singleemployee.php?id=<?php echo $row['employee_id']; ?>"> <img src="<?php echo $row['image']; ?>" style="width:150px;height:150px;"><br>
	 <hr> <h4><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></h4>
    </a> 
	
	
	            <?php 
			
			

			
			
			 if($position2=='Super-Admin'){ 
		   ?>
		  
		 <form action="deleteemployee.php?id=<?php echo $row['employee_id']; ?>" method="POST" onsubmit='return delete()'>
						 						
							<input type="hidden" value="<?php echo $row['employee_id']; ?>" name="user_id">
												<button type="submit" name="delete" class="btn btn-danger">Remove</button>
					</form>
		<?php	}else{
		?> <form action="deleteemployee.php?id=<?php echo $row['employee_id']; ?>" method="POST" onsubmit='return delete()'>
						 						
							<input type="hidden" value="<?php echo $row['employee_id']; ?>" name="user_id">
												<button  disabled type="submit" name="delete" class="btn btn-danger">Remove</button>
					</form>
         <?php	}
		?>
	
	
	
	</div>
	     <?php
						
						}?>


	 
       
      </div>
    </div>
  </div>
</div>

<?php
include'footer.php';


?>