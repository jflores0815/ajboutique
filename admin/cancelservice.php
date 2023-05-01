<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Service Information</a> </div>
    <h1>Service Information</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Service Information</h5>
          </div>
             <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
                        <tr>
              <th align="center"><center><font size=2>Client Name</font></center></th>
              <th align="center"><center><font size=2>Service Name</font></center></th>
              <th align="center" width="100"><font size=2>Barbers</font></th>
			      <th width="100px;"><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;Price&nbsp;&nbsp;&nbsp;&nbsp;</font></th>
    					  <th width="100px;"><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;Deposit&nbsp;&nbsp;&nbsp;&nbsp;</font></th>
    					  <th width="100px;"><font size=2>&nbsp;&nbsp;&nbsp;&nbsp;Balance&nbsp;&nbsp;&nbsp;&nbsp;</font></th>
		
<th align="center" width="100px"><font size=2>Date of Reservation</font></th>

            			    <th width="100px;"><font size=2>Control Number</font></th>
						    <th width="100px;"><font size=2>Payment Type</font></th>
						    <th width="100px;"><font size=2>Image Receipt</font></th>
						    <th width="100px;"><font size=2>Status</font></th>
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
					 
					 <td>
<?php 
$barbers=$row['barbers'];
$user_id=$row['user_id'];
$checkout2 = mysql_query("SELECT * FROM tbl_user where user_id='$user_id'") or die(mysql_error());


WHILE($_checkout2 = mysql_fetch_array($checkout2)) {


echo $_checkout2['fname'];echo $_checkout2['lname'];

}?>
</td>
  <td><?php echo $row['service_name']?></td>

					  <td>
<?php 
$barbers=$row['barbers'];
$price=$row['price'] ;
$deposit=$row['deposit'] ;
$balance= $price-$deposit;
$checkout2 = mysql_query("SELECT * FROM tbl_employee where employee_id='$barbers'") or die(mysql_error());


WHILE($_checkout2 = mysql_fetch_array($checkout2)) {


echo $_checkout2['firstname'];echo $_checkout2['lastname'];

}?>
</td>
					
					 
					  <td>Php <?php echo number_format($row['price'] ,2);  ?></td>
					 		<td>
					Php <?php echo number_format($row['deposit'] ,2);  ?>
					 </td>
					
					  <td>Php <?php echo number_format($balance ,2);  ?></td>
					 

<td><?php echo $row['service_date']?></td>
<td><?php echo $row['control_no']?></td>


<td><?php echo $row['payment_type']?></td>

  	 <td><a href="photoproduct2.php?id=<?php echo $row['service_id']; ?>"><img src="../<?php echo $row['image']?>" width="100px;" height="80px;"id="photos" ></td>
			<td><?php echo $row['status']?></td>
			


	  

					
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