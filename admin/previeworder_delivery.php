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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Preview</a> </div>
    <h1>	Preview</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>	Cash on Delivery table</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		<tr>
						 <th  width="100px;">Client Name</th>
                        <th  width="100px;">Order Name</th>
                          <th  width="300px;">Order Description</th>
                          <th  width="100px;">Quantities</th>
				        <th  width="100px;">&nbsp;&nbsp;&nbsp;&nbsp;Price&nbsp;&nbsp;&nbsp;&nbsp;</th>
    					
						<th  width="100px;">Confirmation</th>
						   <th  width="100px;">Status</th>
						    <th  width="100px;">Date</th>
						    <th  width="100px;">Image</th>
							 <th  width="100px;">Status</th>
						
                      </thead>


                      <tbody>
<?php
$id=$_GET[id];
include_once'includes/config2.php';
$query="
SELECT * FROM reservation re, tbl_product tp, tbl_user tu where re.prod_id=tp.ID AND tu.user_id=re.user_id AND confirmation='$id';";
	
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
		$prod_id =$row['prod_id'];
		$quantities =$row['quantities'];
?>                     
					  <tr>
					 	<td><center><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></center></td>
                         <td><center><?php echo $row['prod_name']; ?></center></td>
						  <td><center><?php echo $row['prod_desc']; ?></center></td>
						  <td><center><?php echo $row['quantities']; ?></center></td>
					
						<td><center>Php <?php echo number_format($row['price'],2);  ?>	</td>

						
						   <td><center><?php echo $row['confirmation']; ?></center></td>
							    <td><center><?php echo $row['status']; ?></center></td>
								 <td><center><?php echo $row['Now']; ?></center></td>
							
                           	  <td><center><img src="<?php echo $row['images']?>" width="100px;" height="80px;"id="photos" >
						 </td> <td><center><?php echo $row['status2']; ?></center></td>
						 
                                              
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