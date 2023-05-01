<?php
include'header.php';


?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Employee Information</a> <a href="#" class="current">View Employee</a> </div>
    <center><h1>
	
	<?php
			  			include_once'includes/config2.php';
$id=$_SESSION['admin_id'];
$query="SELECT * FROM tbl_admin where admin_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row3=mysql_fetch_array($result)){
 $admin_id=$row3['admin_id'];
			$position2=$row3['position'];
}

$id=$_GET['id'];
$idd = $_SESSION['user_id']; 
$query="SELECT * FROM tbl_employee where employee_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?>
	
	<?php
						
						}?>
	</h1></center>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
	  
			   <?php
include_once'includes/config2.php';
$query="SELECT * FROM tbl_employee where employee_id='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>        
	   
	   <div class="span2"  style="border-style: solid;border-color: #4c770b;padding:20px" align="center">
	<a href="singleemployee.php"> <img src="<?php echo $row['image']; ?>" style="width:100px;height:100px;"><br>
	 <hr> <h5><?php echo $row['firstname']; ?>  <?php echo $row['lastname']; ?></h5>
    </a> 

<br><br>

   <?php 
			
			

			
			
			 if($position2=='Super-Admin'){ 
		   ?>
		  
		 <form action="employeeedit.php?id=<?php echo $id; ?>" method="POST" onsubmit='return deletethis()'>
						 
												<button type="submit" name="edit" class="btn btn-success">Update Employee</button>
					</form>
		<?php	}else{
		?>	 <form action="employeeedit.php?id=<?php echo $id; ?>" method="POST" onsubmit='return deletethis()'>
						 
												<button type="submit" disabled name="edit" class="btn btn-success">Update Employee</button>
					</form>
         <?php	}
		?>

			
	</div>
	     
		 <div class="span1">

		 </div>
		  <div class="span6">
		<h4>Employee Details</h4>
		 <br><h5>
		 Address:<b>	 <?php echo $row['address']; ?></b><br><br>
		 Contact Number: <b>  <?php echo $row['contact_no']; ?></b><br><br>
		 gender:   <b><?php echo $row['gender']; ?></b><br><br>
		 Age:		<b> <?php echo $row['age']; ?></b><br><br>
		 </h5>
		 </div><hr>
		 <div class="span3">
			
		 </div>
		 <?php
						
						}?>



       
      </div>
    </div>
  </div><hr>
  <h3 align="center">Employee Record</h3><br><br>
   <table class="table table-bordered ">
          
        	   <thead>
							  <tr>
							<th>Customer</th>
        				  <th>Service</th>
						  <th>Date</th>
		
						  <th>Time</th>
						   <th>Price</th>
					
					
						   <th>Total Price</th>
							  </tr>
						  </thead>  
              <tbody>
			  
 

             			<tr>
					
			   <?php
include_once'includes/config2.php';

$query="SELECT * FROM tbl_service ts, tbl_employee te where te.employee_id=ts.barbers and te.employee_id='$id'  ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$shipping_fee=$row['shipping_fee'];
$price=$row['price'];
$total=$shipping_fee + $price;

?>     
							<td><center> <?php echo $row['user_name']; ?></center></td>
							<td><center> <?php echo $row['service_name']; ?></center></td>
							<td><center> <?php echo $row['datereserved']; ?></center></td>
							<td><center> <?php echo $row['start_time']; ?></center></td>
					
							<td><center> Php <?php echo number_format($row['price'] ,2);  ?></center></td>
							<td><center>Php <?php echo number_format($total ,2);  ?> </center></td>
								
								
								
							</tr> <?php
						
						}?>
                	
              </tbody>
            </table>
			   <?php
include_once'includes/config2.php';

$query="SELECT sum(price) as payment FROM tbl_service ts, tbl_employee te where te.employee_id=ts.barbers and te.employee_id='$id'  ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){


$shipping_fee=$row['shipping_fee'];
$price=$row['price'];
$total=$shipping_fee + $price;

?>
<h3 style="margin-right:30px;" align="right">Total: Php <?php echo number_format($row['payment'] ,2);  ?></h3>
	 <?php
						
						}?>		
			</div>

<?php
include'footer.php';


?>