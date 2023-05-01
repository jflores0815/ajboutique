<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">View Employee Report</a> </div>
    <h1>View Employee</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Employee table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
							  <tr>
							<th>First Name</th>
        				  <th>Last Name</th>
        				  <th>Address</th>
						  <th>Contact Number</th>
						  <th>Gender</th>
					<th>Age</th>
							  </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_employee";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><center><?php echo $row['firstname']; ?></center></td>
								<td><center><?php echo $row['lastname']; ?></center></td>
								<td><center><?php echo $row['address']; ?></center></td>
								<td><center><?php echo $row['contact_no']; ?></center></td>
								<td><center><?php echo $row['gender']; ?></center></td>
								<td><center><?php echo $row['age']; ?></center></td>
							
								
								
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