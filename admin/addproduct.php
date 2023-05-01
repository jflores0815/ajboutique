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

#sidebar > ul > li:nth-child(3) > a
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
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Product</a> <a href="#" class="current">Add Product</a> </div>
  <h1>Add Product</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Product</h5>
        </div>
        <div class="widget-content nopadding">
			<form action="productdb.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

         <div class="control-group">
              <label class="control-label">Categories:</label>
              <div class="controls">
                  <select name="categories" >
                    <?php
  include_once'includes/config2.php';
  $query="SELECT * FROM categories";
  $result=mysql_query($query)or die(mysql_error());
  while ($row=mysql_fetch_array($result)){

  ?>
                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['description']; ?></option>


                     <?php
            
            }?>
                  </select>
              </div>
            </div>

 
	
            <div class="control-group">
              <label class="control-label">Product Name :</label>
              <div class="controls">
                <input type="text" required name="prod_name" class="span11" placeholder="Enter Product Name" />
              </div>
            </div>
	 <div class="control-group">
              <label class="control-label">Product Weight :</label>
              <div class="controls">
                <input type="number" name="weight" required class="span11" placeholder="Enter Product Weight (in grams)" />
              </div>
            </div>  
       
			 <div class="control-group">
              <label class="control-label">Product Description :</label>
              <div class="controls">
                <textarea name="description" maxlength="255" class="span11" style="resize: none; width: 92%; height: 100px;" placeholder="Description" required></textarea> 
              </div>
            </div>
			 <div class="control-group">
              <label class="control-label">Product Price :</label>
              <div class="controls">
                <input type="text" name="price" required class="span11" placeholder="Enter Product Price" />
              </div>
            </div>
         
				
			
		<div class="control-group">
              <label class="control-label">Product Code :</label>
              <div class="controls">
                <input type="text" name="code" required class="span11" placeholder="Enter Product Code" />
              </div>
            </div> 
            
			
            <div class="control-group">
              <label class="control-label">Image:</label>
              <div class="controls">
                <input type="file" name="images" class="span11" placeholder="Last name" />
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