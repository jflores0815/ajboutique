<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Employee Information</a> <a href="#" class="current">View Employee Attendance</a> </div>
    <h1>Employee</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Employee Attendance</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Employee ID</th>
                  <th>Date</th>
                  <th>Employee Name</th>
                  <th>Position </th>
				<th>Time-In/Time-Out</th>
				<th>Status</th>
                </tr>
              </thead>
              <tbody>
			   
             
                   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_attendance ta, tbl_employee te where te.employee_id=ta.employee_id ORDER BY ta.attendance_id desc";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>  
                <tr>
                         <td><?php echo $row['employee_number']; ?></td>
						  <td>
						  <?php echo $row['datenow']; ?></td>
						   <td><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></td>
						  <td></td>
                          <td><?php echo $row['timeinout']; ?></td>
						  
						  
                           	  <td><center>
							  <?php
							  $status=$row['status'];
							  
								if($status=='Timein'){
								
								echo' Time-In';
								}else{
								echo' Time-Out';
								}

							 ?>
							  </center>
						 </td>
						 
                                              
					   </tr>
                  <?php
						
						}?>			
								
					
                </tr>
                
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