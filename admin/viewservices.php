<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">View Services</a> <a href="#" class="current">View Services</a> </div>
    <h1>View Services</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Services table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            <table class="table table-bordered data-table">
        	   <thead>
							  <tr>
    							<th>Services Name</th>
            			<th>Price</th>
                  <th>Service Type</th>
    						  <th>Employee Type</th>
                  <th>Action</th>  
		
							  </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM  tbl_serviceproduct order by serviceproduct_id desc";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><center><?php echo $row['valuename']; ?></center></td>
								<td><center><?php echo $row['price']; ?></center></td>
								<td><center><?php echo $row['service_type']; ?></center></td>
								<td><center><?php echo $row['employee_type']; ?></center></td>
						    <td>
                  <center>
                  <a href="serviceedit.php?id=<?php echo $row['serviceproduct_id']; ?>"><button class="btn-success">Edit</button></a>
                  <a href="servicedelete.php?id=<?php echo $row['serviceproduct_id']; ?>"><button class="btn-danger">Delete</button></a>
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

<?php
include'footer.php';


?>