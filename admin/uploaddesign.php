<?php
include'header.php';


?>
<script>
function confirm(){
if
	(confirm('Are you sure you want to confirm?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

function confirms(){
if
	(confirm('Are you sure you want to Cancel?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

</script> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Upload Design </a> </div>
    <h1>Pending</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Pending table</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		  <tr>
						 <th  width="100px;" ><b><font size=2>Client Name</b></font></th>
                       
                      

						
						  
						    <th width="100px;"><font size=2>Date Added</font></th>
						 
						    <th width="100px;"><font size=2> Upload Image </font></th>
						     <th width="100px;"><font size=2>Quantity</font></th>
						         <th width="100px;"><font size=2>Size</font></th>
						       <th width="100px;"><font size=2>Total Price</font></th>
							 <th width="150px;"><font size=2>Decline</font></th>
                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="
SELECT * FROM tbl_upload tt , tbl_user tu  where tt.user_id=tu.user_id AND tt.status='pending' ORDER by tt.user_id DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					 	<td><center><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></center></td>
                        
					
						
						
						
				
							  
								 <td><center><?php echo $row['dateadded']; ?></center></td>
								<td><center>
									
								  <a href="viewimage.php?id=<?php echo $row['upload_id']; ?>"><img src="<?php echo $row['upload']?>" width="100px;" height="80px;" id="photos" >
						  </a></center>
						  	






						  		</td>
								 <td><center><?php echo $row['qty']; ?></center></td>
								 <td><center><?php echo $row['size']; ?></center></td>
                           	 	  <td><center>
                           	 	
                           	 	<form method="POST" action="acceptupload.php">
                           	 	<input type="hidden" name="user_id" required="required" value="<?php echo $row['user_id']; ?>">
                           	 	<input type="hidden" name="upload_id" required="required" value="<?php echo $row['upload_id']; ?>">
                           	 	<input type="hidden" name="size" required="required" value="<?php echo $row['size']; ?>">

                           	 	<input type="number" name="price" required="required" placeholder="Input Price"><br>
	 	                        <center>
	 	                          	 	<button type="submit" name="add" class="btn btn-danger">Accept</button>
						  		</center>
						  		</form>	


                           	 	  </center></td>
						  <td align="center"><center>
						  		<br>
								<a href="declineupload.php?id=<?php echo $row['upload_id']; ?>"><button type="button" name="update" class="btn btn-danger">Decline</button></a>
					
								  
							  
							  
						
                         
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