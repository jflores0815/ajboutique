<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Service Report</a> </div>
    <h1>Service Report</h1>
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
              <th align="center"><center><font size=3>Service Name</font></center></th>
              <th align="center" width="100"><font size=3>Barbers</font></th>
			    			
			<th align="center"><center><font size=3>Price</font></center></th>
			   <th align="center"><center><font size=3>Shipping Fee</font></center></th>
<th align="center" width="120"><font size=3>Date of Reservation</font></th>

              <th align="center" width="120"><font size=3>Time</font></th>
			
         
			    <th  width="120"><font size=3>Date Reserved </font></th>
                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_service where status='cancel'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>                     
					 <tr>
					  <td><?php echo $row['service_name']?></td>
<td>
<?php 
$barbers=$row['barbers'];
$checkout2 = mysql_query("SELECT * FROM tbl_employee where employee_id='$barbers'") or die(mysql_error());


WHILE($_checkout2 = mysql_fetch_array($checkout2)) {


echo $_checkout2['firstname'];echo $_checkout2['lastname'];

}?>
</td>
<td>Php <?php echo number_format($row['price'] ,2);  ?></td>
<td>Php <?php echo number_format($row['shipping_fee'] ,2);  ?></td>
<td><?php echo $row['service_date']?></td>
<td><?php echo $row['start_time']?></td>


<td><?php echo $row['datereserved']?></td>


	

					
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