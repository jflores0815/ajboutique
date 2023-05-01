<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Gift Card</a>  </div>
     <h1>Add Gift Card </h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Gift Card-Add</h5>
        </div>
        <div class="widget-content nopadding">
			<form action="giftcarddb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
	
            <div class="control-group">
              <label class="control-label">Control Number :</label>
              <div class="controls">
                <input type="text" required name="controlno" class="span11" placeholder="Control Number " />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Date of Issue :</label>
              <div class="controls">
                <input type="date" required name="dateissue" class="span11" placeholder="Date of issue" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Valid Until :</label>
              <div class="controls">
                <input type="date" required name="validuntil" class="span11" placeholder="Valid Until" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Branch :</label>
              <div class="controls">
                <input type="text" required name="branch" class="span11" placeholder="branch" />
              </div>
            </div>
			  
			  <div class="control-group">
              <label class="control-label">Balance :</label>
              <div class="controls">
                <input type="number" required name="balance" class="span11" placeholder="Balance" />
              </div>
            </div>
			
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