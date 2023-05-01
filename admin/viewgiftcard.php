<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="tip-bottom">Gift Card</a>  </div>
    <h1>Gift Card</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Gift Card table</h5>
          </div>
         <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
            <thead>
							  <tr>
							<th>Cotrol Number</th>
        				  <th>Date  Issue</th>
        				  <th>Valid Until</th>
						  <th>Branch</th>
		
						  <th>Balance</th>
						   </tr>
						  </thead>  
              <tbody>
			  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_gc";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>     

             			<tr>
								<td><center><?php echo $row['controlno']; ?></center></td>
								<td><center><?php echo $row['dateissue']; ?></center></td>
								<td><center><?php echo $row['validuntil']; ?></center></td>
								<td><center><?php echo $row['branch']; ?></center></td>
								<td><center><?php echo $row['balance']; ?></center></td>
					
								
								
								
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