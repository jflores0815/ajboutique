










<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Bruno's Barbershop </title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/fullcalendar.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="index.php">Bruno's Barbershop Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->

<!--sidebar-menu-->

<div id="content">
  <div id="content-header"><br>
   <center>  <h1><b>Brunos Barbershop Attendance Monitoring</b></h1></center>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
		<br>
		<form action="attendance2.php" method="POST" enctype="multipart/form-data">
				 <input type="text" class="form-control" name="number" placeholder="Type your Employee ID here..."><br>
				   <button type="submit" class="btn btn-primary" name="add">ENTER</button>
		</form>	<br>
		
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
 $date = date('Y-m-d');
$query="SELECT * FROM tbl_attendance ta, tbl_employee te where te.employee_id=ta.employee_id AND datenow='$date' ORDER BY ta.attendance_id desc";
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
								
								echo' <button type="submit" class="btn btn-primary" style="width:100px;height:40px" >Time-In</button>';
								}else{
								echo' <button type="submit"class="btn btn-danger" style="width:100px;height:40px" >Time-Out</button>';
								}

							 ?>
							  </center>
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


<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; Brunos Barbershop Admin. </div>
</div>

<!--end-Footer-part-->

<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.dashboard.js"></script> 
<script src="js/jquery.gritter.min.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
