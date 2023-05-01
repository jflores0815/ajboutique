<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#"class="current"> Message</a>  </div>
    <h1>User</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Message table</h5>
          </div>
         		  <?php
include_once'includes/config2.php';
$id=$_SESSION['user_id'];
$query="SELECT * FROM  tbl_cms where cms_id='1'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>

                    <form action="cmsdb.php" method="POST" class="form-horizontal form-label-left input_mask" enctype="multipart/form-data">

					 
              
                       <label><b>EMC details:</b></label> 
					   	<textarea  rows="10" cols="80" name="emc_details" ><?php echo $row['emc_details']; ?></textarea>
		

                    
                         <label><b>Mission :</b></label> 
						<textarea rows="10" cols="80id="inputSuccess3"required="required"  name="mission" ><?php echo $row['mission']; ?></textarea>
					  
					   
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                         <label><b>Vision :</b></label> 
						<textarea rows="10" cols="80 id="inputSuccess3"required="required"  name="vission" ><?php echo $row['vission']; ?></textarea>
					   </div>
					  
					 
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3"><br><br>
                    <a href="index.php">      <button type="button" class="btn btn-primary">Cancel</button></a>
                          <button type="submit" name="edit" class="btn btn-success">Update</button>
                        </div>
                      </div>

                    </form>
	
<?php
}
?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include'footer.php';


?>