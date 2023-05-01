<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Product Categories</a> <a href="#" class="current">Add Product Categories</a> </div>
  <h1>Add Product Categories</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Product Categories-Add</h5>
        </div>
        <div class="widget-content nopadding">
			<form action="categoriesdb.php" name="personal" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
	
            <div class="control-group">
              <label class="control-label">Category Name :</label>
              <div class="controls">
                <input type="text" required name="name" class="span11" placeholder="Product Name" />
              </div>
            </div>
	
       
			 <div class="control-group">
              <label class="control-label">Category Description :</label>
              <div class="controls">
                <input type="text" name="desc"  required class="span11" placeholder="Product Description" />
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