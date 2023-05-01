<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">File Maintenance</a> <a href="#" class="current">View Users</a> </div>
    <h1>User</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>User table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Address</th>
				  <th>Contact Number</th>
				  <th>Email</th>
				
                </tr>
              </thead>
              <tbody>
			    <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_user";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     
                <tr class="gradeX">
								<td><?php echo $row['lname']; ?></td>
								<td class="center"><?php echo $row['fname']; ?></td>
								<td class="center"><?php echo $row['address']; ?></td>
								<td class="center"><?php echo $row['contact_no']; ?></td>
									<td class="center"><?php echo $row['email']; ?></td>
								
					
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