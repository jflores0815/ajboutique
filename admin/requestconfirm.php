<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                         <tr>
                        <th>last Name</th>
                          <th>First Name</th>
						<th>Address</th>
                          <th>Contact Number</th>
                        <th>Custom Title</th>
						<th>Dimension</th>
							<th>Image</th>
						<th>Action</th>
						
                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_customization t1, tbl_customizationimage t2 where t1.customize_id=t2.ID AND statuss='confirm'";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
                          <td><?php echo $row['lname']; ?></td>
						  <td><?php echo $row['fname']; ?></td>
						   <td><?php echo $row['address']; ?></td>
						   <td><?php echo $row['contact_no']; ?></td>
						  
							
                         
							  <td><?php echo $row['custom_title']; ?></td>
						 
						  	  <td>
						<b>length:</b> <?php echo $row['Length']; ?> inch<br>
						<b>Width: </b><?php echo $row['Width']; ?> inch<br>
						<b>Depth: </b><?php echo $row['Depth']; ?> inch<br>
						<b>GlueTab: </b><?php echo $row['GlueTab']; ?> inch<br>
						<b>Tuck: </b><?php echo $row['Tuck']; ?> inch<br> 
						<b> Allounce:</b> <?php echo $row['Allowance']; ?> inch<br>
						 </td>
						   <td><img src="../<?php echo $row['image']; ?>"></td>
						  <td><form action="cancelrequest.php?id=<?php echo $row['ID']; ?>" method="POST" onsubmit='return deletethiss()'>
							<input type="hidden" value="<?php echo $row['user_id']; ?>" name="user_id">
												<button type="submit" name="edit" class="btn btn-success">Cancel</button>
					</form>
						
                         
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