<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">Return Product</a> <a href="#" class="current">View Product</a> </div>
    <h1>View Return Product</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Product Return table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            <table class="table table-bordered data-table">
        	   <thead>
							  <tr>
							<th>Returned by </th>
        				  <th>Date of Purchase</th>
        				  <th>Returned Date</th>
						  <th>Product Return </th>
						  <th>Remarks </th>
		
								  </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_return";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><center><?php echo $row['returnedby']; ?></center></td>
								<td><center><?php echo $row['dateofpurchase']; ?></center></td>
								<td><center><?php echo $row['returnedate']; ?></center></td>
								<td><center><?php echo $row['productreturn']; ?></center></td>
								<td><center><?php echo $row['remarks']; ?></center></td>
							
								
								
								
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