<?php
include'header.php';


?>
<script>
function confirm(){
if
	(confirm('Are you sure you want to confirm?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}

function confirms(){
if
	(confirm('Are you sure you want to Cancel?')){
	
	updateform.submit();
	location.reload();
	
	
	}else{
	return false;
	}


}
 
</script> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Order Pending </a> </div>
    <h1>	Cash on Pickup</h1>	
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>	Cash on Pickup table</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
		 			<tr>
						<th style="font-size: 14px;">Confirmation</th>
	                   	<th style="font-size: 14px;">Client Name</th>
	                    <th style="font-size: 14px;">Date Reserved</th>
	                 <th style="font-size: 14px;">Total Price w/ <br>Shipping Fee</th>
						<th style="font-size: 14px;">Status</th>
						<th style="font-size: 14px;">Action</th></tr>
		            </tr>
                </thead>



                      <tbody>
<?php
include_once'includes/config2.php';
$query4="
SELECT transaction_id,confirmation,Now  FROM reservation where status='Cash on Pick-up'  GROUP BY transaction_id,confirmation,Now ORDER by Now DESC ";

$result4=mysql_query($query4)or die(mysql_error());
while ($row4=mysql_fetch_array($result4)){
$confirmation4 =$row4['confirmation'];

$query="
SELECT * FROM reservation re, tbl_product tp, tbl_user tu where re.prod_id=tp.ID AND tu.user_id=re.user_id AND re.status='Cash on Pick-up' AND re.confirmation='$confirmation4' ORDER by re.Now DESC ";


$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){


$prod_id =$row['prod_id'];
$quantities =$row['quantities'];
$transaction_id2=$row['transaction_id'];
$fname=$row['fname'];
$lname=$row['fname'];
$now=$row['Now'];	
$confirmation=$row['confirmation'];
$status=$row['status2'];
$email=$row['email'];
$user_id=$row['user_id'];
	}
?>                       
					<tr>
					<td>
						<center><b>
						<a href="previeworder_delivery.php?id=<?php echo $confirmation;?>" style="color:blue;text-decoration: underline;">
						<?php echo $confirmation;?>
						</a>

						</b></center>
					</td>

					<td>
						<center><?php echo $fname ?> <?php echo $lname; ?></center>
					</td>
                    <td>
                    	<center><?php echo $now;?></center>
                    </td>
					<td><center>

					 	<?php 
									
						$query2="SELECT sum(payable) as total FROM reservation where transaction_id='$transaction_id2' ";
						$result2=mysql_query($query2)or die(mysql_error());
						while ($row2=mysql_fetch_array($result2)){
								$price =$row2['total'];
								$balance =$price-$deposit;
						}
						
if($status == 'Cash on Pick-up'){




echo 'Php '.number_format($price).'.00'; 
}else{
if($price >= 1000){
echo 'Php '.number_format($price).'.00';

}else{
 echo 'Php '.number_format($price+250).'.00';
} 
}

						 ?>					
									
							</center>				
					</td>
						 
					<td>
						<center><?php echo $status; ?></center>
					</td>
					<td align="center">
						<center>
						  <?php 
						  if ($row['status2']== cancel)
						  {
						  	echo' <button class="btn btn-danger">No Action Needed</button>';
						  }else{

						  	?>

						  
						   <div class="btn-group">	
					            <button class="btn btn-danger">Action</button>
					            <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><span class="caret"></span></button>
					            

					            <ul class="dropdown-menu" align="left">
			              <li><a>
						  	  <form action="pendingconfirmpickup.php?id=<?php echo $confirmation; ?>&&email=<?php echo $email ?>" method="POST" >
									 	<input type="hidden" value="<?php echo $email ?>" name="email">					
										<input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
															<button type="submit" name="edit" class="btn btn-success" style="width:100%;">Confirm</button>
								</form>
						  
						  </a></li>
			              <li><a>
						  
						  <form action="canceltransactionpickup.php?id=<?php echo $row['confirmation']; ?>&&idd=<?php echo $row['guest_id']; ?>" method="POST" >
									

										<input type="hidden" value="<?php echo $prod_id; ?>" name="prod_id">					
										<input type="hidden" value="<?php echo $quantities; ?>" name="quantities">					
										<input type="hidden" value="<?php echo $row['qty']; ?>" name="qty">		
									 <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
									  <button type="submit" name="delete" class="btn btn-danger" style="width:100%;">Cancel/Forfeit</button>
									  </form></a></li>
			          </ul>
			          </div></center>
									  
									  
									  
									  
								<?php
								}
								?>	  
					
							  
							  
							  
						
                         
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