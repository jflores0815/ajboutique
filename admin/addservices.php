<?php
include'header.php';


?>

<!--close-left-menu-stats-sidebar-->

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Services</a> <a href="#" class="current">Add Services</a> </div>
  <h1>Add Services</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Services-Add</h5>
        </div>
        <div class="widget-content nopadding">
			<form action="directorydb2.php" name="personal" method="POST" id="demo-form2"data-parsley-validate class="form-horizontal "  enctype="multipart/form-data">

 
	
            <div class="control-group">
              <label class="control-label">Services Name :</label>
              <div class="controls">
                <input type="text" required name="name" class="span11" placeholder="Services Name" />
              </div>
            </div>
	
       
			 <div class="control-group">
              <label class="control-label">Price :</label>
              <div class="controls">
                <input type="text" name="price"  required class="span11" placeholder="Services Price" />
              </div>
            </div>
			
				 <div class="control-group">
              <label class="control-label">Service Type :</label>
              <div class="controls">
			  <select name="servicetype" >
				<option value="HAIRCUT">HAIRCUT</option>
				<option value="FACIAL & BODY CARE">FACIAL & BODY CARE</option>
				<option value="HAIR STYLING">HAIR STYLING</option>
				<option value="MASSAGES">MASSAGES</option>
			  </select>
			  
               </div>
            </div>
			
			 <div class="control-group">
              <label class="control-label">Employee Type :</label>
              <div class="controls">
             <select name="employeetype" >
				<option value="Barber">Barber</option>
				<option value="Therapist">Therapist</option>
			  </select>
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