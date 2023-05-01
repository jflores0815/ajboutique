<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">CMS</a>  </div>
     <h1>Terms and Condition CMS </h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Terms and Condition CMS </h5>
        </div>


        <div class="widget-content nopadding">
		

		<form action="termcmsdb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
			<?php

$cms = mysql_query("SELECT * FROM tbl_cms WHERE cms_id= '1'") or die(mysql_error());
WHILE($_cms = mysql_fetch_array($cms)) {

?>
            <div class="control-group">
              <label class="control-label">Title :</label>
              <div class="controls">
                <input type="text" required name="title"  value="<?php echo $_cms['title'] ?>" class="span11"  />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Subtitle :</label>
              <div class="controls">
                <input type="text" required name="subtitle" value="<?php echo $_cms['subtitle'] ?>" class="span11"  />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Body Message :</label>
              <div class="controls">
               <textarea cols="500" rows="20" style="width:800px" name="message"><?php echo $_cms['message'] ?>
			   </textarea>
              </div>
            </div>
			  
				<?php
}
?>
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