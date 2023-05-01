<?php
include'header.php';


?>
<style type="text/css">
  
  #sidebar > ul > li.active{

  color: #939da8 !important;  
  border-top: 1px solid #37414b !important;
    border-bottom: 1px solid #1f262d !important;
    background-color: #2E363F !important;
}

#sidebar > ul > li:nth-child(2) > a
{
  color: #ffffff !important;
    text-decoration: none !important;

    background-color: #27a9e3 !important;
    border-bottom: 1px solid #27a9e3 !important;
    border-top: 1px solid #27a9e3 !important;
  
}
</style>
<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">File Maintenance</a> <a href="#" class="current">Add User</a> </div>
  <h1>Add User</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>User-info</h5>
        </div>
        <div class="widget-content nopadding">
		 <form action="adduserdb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">
 
		  
		  						  <?php
include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" name="lname"  required class="span11" placeholder="Last Name" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" name="fname" required class="span11" placeholder="First Name" />
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">Position :</label>
              <div class="controls">
             	<select name="position" required>
				<option value="Super-Admin">Admin</option>
				<option value="Admin">Staff</option>
			</select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" name="username" class="span11" required placeholder="Username" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password" name="pass" class="span11" required placeholder="Password"  />
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">Password input</label>
              <div class="controls">
                <input type="password" name="repass" class="span11" required placeholder="Re-Password"  />
              </div>
            </div>
           <input type="hidden" class="form-control has-feedback-left" name="user"  value="<?php echo ucfirst($row['fname']) ?>  <?php echo ucfirst($row['lname']) ?>" required="required" id="inputSuccess2" placeholder="Last Name">

		   
		   <?php 
			$admin_id=$row['admin_id'];
			$position2=$row['position'];
		   
		   if($position2=='Super-Admin'){ 
		   echo'<div class="form-actions">
              <button type="submit" class="btn btn-success" name="add" onclick="return personalInfo();">Save</button>
            </div>';
			}else{
			echo' <div class="form-actions">
              <button type="submit" class="btn btn-success" disabled name="add" onclick="return personalInfo();">Save</button>
            </div>';
			
			}
			
		   ?>
           

			 <?php
						
						}?> 
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