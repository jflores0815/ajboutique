<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Employee Information</a> <a href="#" class="current">Add Employee</a> </div>
     <h1>Add Employee </h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Employee-Add</h5>
        </div>
        <div class="widget-content nopadding">
			<form action="addemployeedb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
	
            <div class="control-group">
              <label class="control-label">Employee First Name :</label>
              <div class="controls">
                <input type="text" required name="firstname" class="span11" placeholder="Employee First Name " />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Employee Last Name :</label>
              <div class="controls">
                <input type="text" required name="lastname" class="span11" placeholder="Employee Last Name" />
              </div>
            </div>
			
			  <div class="control-group">
              <label class="control-label">Position:</label>
              <div class="controls">
				<select name="position"  required="required" >
				<option value="Therapist"> Therapist</option>
				<option value="Barber"> Barber</option>
				<option value="Stylist"> Stylist</option>
				</select>

				</div>
            </div>
			     <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" required name="address" class="span11" placeholder="Address" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Contact Number :</label>
              <div class="controls">
                <input type="text" required name="contactno" class="span11" placeholder="Contact Number" />
              </div>
            </div>
			  <div class="control-group">
              <label class="control-label">Gender:</label>
              <div class="controls">
              <select name="gender" required>
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			  </select>
              </div>
            </div>
			  <div class="control-group">
              <label class="control-label">Age :</label>
              <div class="controls">
                <input type="text" required name="age" class="span11" placeholder="Age" />
              </div>
            </div>
			
            <div class="control-group">
              <label class="control-label">Image:</label>
              <div class="controls">
                <input type="file"  name="image" class="span11" placeholder="Last name" />
              </div>
            </div>
         
            <div class="form-actions">
         
   <?php 
			
			
			include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
			
			$admin_id=$row['admin_id'];
			$position2=$row['position'];
		   
		   if($position2=='Super-Admin'){ 
		   echo'   <div class="form-actions">
              <button type="submit" class="btn btn-success" name="add" onclick="return personalInfo();">Save</button>
     
            </div>';
			}else{
			echo'    <div class="form-actions">
         <button type="submit" class="btn btn-success" disabled name="add" onclick="return personalInfo();">Save</button>
     
            </div>';
			
			}
			}
		   ?>
		   
		       </div>
			
          </form>
        </div>
      </div>
    
   
  </div>
  
</div></div>
<!--Footer-part-->
<br><br><br><br><br><br><br><br><br><br><br><br><br>	
<?php
include'footer.php';


?>