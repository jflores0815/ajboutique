<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Report </a> </div>
    <h1>Cancel Reservation Report</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
         <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
                        <tr>
						 <th>Client Name</th>
                        <th>Product Name</th>
                          <th>Product Description</th>
				        <th>&nbsp;&nbsp;&nbsp;&nbsp;Price&nbsp;&nbsp;&nbsp;&nbsp;</th>
    					  <th>&nbsp;&nbsp;&nbsp;&nbsp;Deposit&nbsp;&nbsp;&nbsp;&nbsp;</th>
					
						<th>Confirmation</th>
						   <th>Status</th>
						    <th>Date</th>
						    <th>Image</th>
					     </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="
SELECT * FROM reservation re, tbl_product tp, tbl_user tu where re.prod_id=tp.ID AND re.status2='cancel' AND tu.user_id=re.user_id ORDER by re.reservation_id DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					 	<td><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></td>
                         <td><?php echo $row['prod_name']; ?></td>
						  <td><?php echo $row['prod_desc']; ?></td>
					
						<td>Php <?php echo number_format($row['price'],2);  ?>	</td>
							<td>
						<?php echo $row['deposit']; ?>
							
							</td>
						   <td><?php echo $row['confirmation']; ?></td>
							    <td><?php echo $row['status']; ?></td>
								 <td><?php echo $row['Now']; ?></td>
							
                           	  <td><a href="photoproduct.php?id=<?php echo $row['ID']; ?>"><img src="<?php echo $row['images']?>" width="100px"id="photos" >
						  </a></td>
						           
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