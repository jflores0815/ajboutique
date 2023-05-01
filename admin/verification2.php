<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Verification Reservation</a> </div>
    <h1>Verification</h1>
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
             <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
						 <th>Client Name</th>
                        <th>Product Name</th>
                          <th>Product Description</th>
				        <th>&nbsp;&nbsp;&nbsp;&nbsp;Balance&nbsp;&nbsp;&nbsp;&nbsp;</th>
    				
						<th>Confirmation</th>
						   <th>Status</th>
						    <th>Date</th>
						    <th>Control No.Image</th>
			             </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="
SELECT * , status, fname, lname
FROM tbl_refno re, tbl_product ro, tbl_user gu
WHERE re.prod_name = ro.prod_name
AND ro.`prod_name` = re.`prod_name` 
AND re.guest_id = gu.user_id AND re.status='pending' ORDER by re.ref_id DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					 	<td><?php echo $row['fname']; ?> <?php echo $row['fname']; ?></td>
                         <td><?php echo $row['prod_name']; ?></td>
						  <td><?php echo $row['prod_desc']; ?></td>
					
						<td>Php <?php echo number_format($row['price'],2);  ?>	</td>
							
						   <td><?php echo $row['confirmation']; ?></td>
							    <td><?php echo $row['status']; ?></td>
								 <td><?php echo $row['new']; ?></td>
							
                  
				                               
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