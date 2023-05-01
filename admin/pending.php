<?php
include'header.php';
include_once'includes/config2.php';
$query12="SELECT count(name) as total from tbl_countorder where type = '0'";
$result12=mysql_query($query12)or die(mysql_error());
while ($row12=mysql_fetch_array($result12)){
$totalorder = $row12['total'];

}
if($totalorder > 0){

$query="DELETE FROM tbl_countorder where type='0'";
$result=mysql_query($query)or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
  
  window.location.href='pending.php'
  </SCRIPT>");
}else{

}
?>
<style type="text/css">
	
	#sidebar > ul > li.active{

	color: #939da8 !important;	
	border-top: 1px solid #37414b !important;
    border-bottom: 1px solid #1f262d !important;
    background-color: #2E363F !important;
}

#sidebar > ul > li:nth-child(4) > a
{
	color: #ffffff !important;
    text-decoration: none !important;

    background-color: #27a9e3 !important;
    border-bottom: 1px solid #27a9e3 !important;
    border-top: 1px solid #27a9e3 !important;
	
}
</style>
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaction</a> </div>
    <h1>New Orders</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List of New Orders</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		  <tr>
						 <th  width="100px;" ><b><font size=2>Order Details</b></font></th>
							 <th width="150px;"><font size=2>Action</font></th>
                        </tr>
                      </thead>


                      <tbody>
<?php
include_once'includes/config2.php';
$query="SELECT a.first_name, a.last_name, b.transaction_no, b.remarks,b.date, b.client_id, total, b.status
FROM transactions b, clients a WHERE (b.status = 0 OR b.status = 1) AND a.id = b.client_id ORDER BY b.date DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

    $transaction_no = $row["transaction_no"];
	  $remarks = $row["remarks"];
	  $date = date("F d, Y h:i A", strtotime($row["date"]));
	  $client_id = $row["client_id"];
	  $total = number_format($row["total"], 2);
	  $client_last_name = $row["last_name"];
	  $client_first_name = $row["first_name"];
	  $client_name = $client_last_name . ", " . $client_first_name;
	  $status = $row['status'];
?>                     
					 <tr>
					 	<td><center>
					 		
						Client: <?php echo $client_name . "<br/>"; ?>

                        Order Date: <?php echo $date . "<br/>"; ?>

                        Total amount: <?php echo "₱" . $total . "<br/>"; ?>
						  
						Remarks: <?php echo $remarks . "<br/>"; ?>
					 	</center></td>
                         
						  <td align="center" style="width:30%;"><center>
						  
						  
						   <?php if($status == 1) { ?>

                          <button style="background: #c6e2ed;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-edit btn-block" data-toggle="modal" data-target="#validatePayment<?php echo $transaction_no; ?>"><i class="icon-refresh"></i> Validate Payment </button>


                          <!-- Validate Payment Modal -->

                    <div class="modal fade" id="validatePayment<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="validatePaymentLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>
                            <h5 class="modal-title" id="viewOrderedItemsLabel"><i class="icon-edit"> </i>Validate Payment</h5>

                            

                          </div>

                        <div class="modal-body">

                            <img src="<?php

                            $query123="SELECT image FROM payments WHERE transaction_no = '$transaction_no'";

							$result123=mysql_query($query123)or die(mysql_error());
							while ($row123=mysql_fetch_array($result123))

                            echo $row123['image'];?>" center  width="465" height="400">

                            <h6>Are you sure you want to validate this payment?</h6>

                            <form method="post" action="../views/order_methods/validate_payment.php"> 

                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>

                                <input type="submit" class="btn btn-primary" value="Validate" />

                           

                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>
 </form>
                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                          <?php } ?>

                          <button style="background: #000;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-view btn-block" data-toggle="modal" data-target="#viewOrderedItems<?php echo $transaction_no; ?>"><i class="icon-info-sign"></i> View Items </button>

                           <!-- View Ordered Items Modal -->

                    <div class="modal fade" id="viewOrderedItems<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderedItemsLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>
                            <h5 class="modal-title" id="viewOrderedItemsLabel"><i class="icon-edit"> </i>Ordered Items</h5>

                         

                          </div>

                        <div class="modal-body">
						<form action="../views/order_methods/transaction_update_item.php" method="POST">
                          <?php

                          	require_once('../include/dbConnect.php');

                            $fetchOrderedItems = "SELECT * FROM orders WHERE transaction_no = '$transaction_no'";

                            $resultOrderedItems = mysqli_query($conn, $fetchOrderedItems);



                            while ($rowOrderedItems = mysqli_fetch_assoc($resultOrderedItems)) {

                              $total_weight = (float) 0;
							  $order_id = $rowOrderedItems["id"];
                              $product_id = $rowOrderedItems["product_id"];

                              $quantity = $rowOrderedItems["quantity"];

                              



                              $fetchProductDetails = "SELECT * FROM products WHERE id = '$product_id'";

                              $resultProductDetails = mysqli_query($conn, $fetchProductDetails);

                              while ($rowProducts = mysqli_fetch_assoc($resultProductDetails)) {
  
                             
                                $product_name = $rowProducts["name"];

                                $product_price = $rowProducts["price"];

                                $product_weight = $rowProducts["weight"];
								
								
								   $product_stock = $rowProducts["stock"];


                               echo "<input type='HIDDEN' name='order_id$order_id' value='$order_id'><input type='textbox' name='quantity$order_id' value='$quantity' style='width:30px;margin-bottom:7px;'> ";
                               echo $product_name . "(" . $product_weight . "g) @" . $product_price . "";
									if($product_stock >= 1){ echo " <span style='font-size:13px;color:#02e20c;'>In Stock: $product_stock</span>";}else{
									echo " <span style='font-size:13px;color:#ff0000;'>Out Of Stock: $product_stock</span>";  
									
								  }
echo "<br />";

                              }

                            }


                            echo "Total Amount: ₱" . $total;

                          ?> 
						  <input type="HIDDEN" name="transaction_no" value="<?php echo $transaction_no; ?>">
						  <br /><br />
						  <font color="#ff0000">Remarks:</font><br />
						  <textarea name="remarks" cols="35" rows="3"><?php if(isset($remarks)){echo $remarks;}?></textarea>
						  <br />
						  <input type="submit" class="btn btn-success" value="Update" />
						  
						  </form>
						  
                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>
                          <button style="background: #ee9d92;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;"  class="btn-delete btn-block" data-toggle="modal" data-target="#voidOrderedItems<?php echo $transaction_no; ?>"><i class="icon-trash"></i> Void Order </button>


                           <!-- Void Ordered Items Modal -->

                    <div class="modal fade" id="voidOrderedItems<?php echo $transaction_no; ?>"  role="dialog" >

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="viewOrderedItemsLabel"><i class="icon-edit"> </i>Void Order</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                            <h6>Are you sure you want to void this order?</h6>

                            <form method="post" action="void_order.php"> 

                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>

                                <button type="submit" class="btn btn-danger">Void </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>

                            </form>

                            

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                     	
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