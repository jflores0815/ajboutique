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
    <h1>Confirmed Design</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Confirmed Design table</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		  <tr>
						 <th  width="100px;" ><b><font size=2>Client Name</b></font></th>
                       
                      

						 <th width="100px;"><font size=2>Qty</font></th>
						 <th width="100px;"><font size=2>size</font></th>
						
						  
						    <th width="100px;"><font size=2>Date Added</font></th>
						 
						    <th width="100px;"><font size=2> Upload Image </font></th>
						     <th width="100px;"><font size=2>Status</font></th>
						      
                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="
SELECT * FROM tbl_upload tt , tbl_user tu  where tt.user_id=tu.user_id AND tt.status='confirm' ORDER by tt.user_id DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					 	<td><center><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></center></td>
                        
					
							 <td><center><?php echo $row['qty']; ?></center></td>
							 	 <td><center><?php echo $row['size']; ?></center></td>
						
						
				
							  
								 <td><center><?php echo $row['dateadded']; ?></center></td>
								<td><center>
									
								  <a href="viewimage.php?id=<?php echo $row['upload_id']; ?>"><img src="<?php echo $row['upload']?>" width="100px;" height="80px;" id="photos" >
						  </a></center>
						  	






						  		</td>
								 <td><center><?php echo $row['status']; ?></center></td>
							
                           	 	
						 
                                              
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