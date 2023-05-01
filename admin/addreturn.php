<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Return Order </a>  </div>
     <h1>Add Return Order </h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Return Order </h5>
        </div>
        <div class="widget-content nopadding">
			<form action="returndb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
	
            <div class="control-group">
              <label class="control-label">Returned by :</label>
              <div class="controls">
                <input type="text" required name="returnedby" class="span11" placeholder="Returned by" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Date of Purchase:</label>
              <div class="controls">
                <input type="date" required name="dateofpurchase" class="span11" placeholder="date of Purchase" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Returned Date :</label>
              <div class="controls">
                <input type="date" required name="returnedate" class="span11" placeholder="Returned Date" />
              </div>
            </div>
			     <div class="control-group">
              <label class="control-label">Order Return :</label>
              <div class="controls">
                
                <select required name="productreturn" class="span11" placeholder="Product Return" >
            
   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_product";
  
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
                  <option value="<?php  echo $row['prod_name']; ?>">
                    
                 <?php  echo $row['prod_name']; ?>

                  </option>
<?php 
  } ?>
                </select>
               </div>
            </div>
			  
			  <div class="control-group">
              <label class="control-label">Remarks :</label>
              <div class="controls">
                <input type="text" required name="remarks" class="span11" placeholder="Remarks" />
              </div>
            </div>
			
          
         
            <div class="form-actions">
              <button type="submit" class="btn btn-success" name="add" onclick="return personalInfo();">Save</button>
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