<?php
include'header.php';


?>
 <script>

function deletethis(){
if
	(confirm('Are you sure you want to Reset Password??')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

</script> 

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
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th>Employee Name</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Gender </th>
                  <th>Age </th>
                  <th>Position </th>
				<th>Status</th>
                </tr>
              </thead>
              <tbody>
			   
                <tr class="gradeX">
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_employee";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>   
                <tr>
                     
						   <td><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></td>
						     <td><?php echo $row['address']; ?></td>
						  <td>
						  <?php echo $row['contact_no']; ?></td>
                          <td><?php echo $row['gender']; ?></td>
                          <td><?php echo $row['age']; ?></td>
                          <td><?php echo $row['position']; ?></td>
                          <td>
						  <form onsubmit='return deletethis()'>
						 <center> <button type="submit" class="btn btn-danger" style="" >Reset Password</button></center>
						  
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