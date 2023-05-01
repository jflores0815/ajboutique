<?php
include'header.php';
include_once'includes/config2.php';
$query12="SELECT count(name) as total from tbl_countorder where type = '1'";
$result12=mysql_query($query12)or die(mysql_error());
while ($row12=mysql_fetch_array($result12)){
$totalorder = $row12['total'];

}
if($totalorder > 0){

$query="DELETE FROM tbl_countorder where type='1'";
$result=mysql_query($query)or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
  
  window.location.href='confirm.php'
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
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaction</a> </div>
    <h1>Paid Order</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
         <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List of Paid Order</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		  <tr>
						    <th  width="100px;" ><b><font size=2>Order Details</b></font></th>
                            <th width="100px;"><font size=2>Actions</font></th>
                      	  
		              </tr>
                      </thead>

                       <tbody>
                       	
                        

                      <?php

                      	include_once'includes/config2.php';
$query="SELECT a.first_name, a.last_name, b.transaction_no, b.date, b.client_id, total 

           FROM transactions b, clients a 
           WHERE b.status = 2
           AND a.id = b.client_id
           ORDER BY b.date DESC";

$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
               	

                          $transaction_no = $row["transaction_no"];
                          $date = date("F d, Y h:i A", strtotime($row["date"]));
                          $client_id = $row["client_id"];
                          $total = number_format($row["total"], 2);
                          $client_last_name = $row["last_name"];
                          $client_first_name = $row["first_name"];
                          $client_name = $client_last_name . ", " . $client_first_name;



                       ?><tr>

                        <td><center>

                          Client: <?php echo $client_name . "<br/>"; ?>

                          Order Date: <?php echo $date . "<br/>"; ?>

                          Total amount: <?php echo "₱" . $total . "<br/>"; ?>
                          	</center>
                        </td>

                        <td style="width:30%;">

                          <button style="background: #c6e2ed;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-shipped btn-block" data-toggle="modal" data-target="#shipOrder<?php echo $transaction_no; ?>"><i class="icon-plane"></i> Ship Order </button>

                          <button style="background: #2b3245;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class=" btn-view btn-block" data-toggle="modal" data-target="#viewOrderedItems<?php echo $transaction_no; ?>"><i class="icon-info-sign"></i> View Items </button>

                          <button style="background: #ee9d92;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-void btn-block" data-toggle="modal" data-target="#voidOrderedItems<?php echo $transaction_no; ?>"><i class="icon-trash"></i> Void Order </button>

                        </td>

                    </tr>
<center>
  <!-- Ship Order Modal -->

                    <div class="modal fade" id="shipOrder<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="shipOrderLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="shipOrderLabel"><i class="icon-edit"> </i>Ship Order</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>
                                   
                     

                        <div class="modal-body">
                            

                            <h6>Are you sure you want to ship this order?</h6>

                            <form method="post" action="../views/order_methods/ship_order.php">
                                
                    
                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>
                                
                                <h6>Enter Tracking# and BC# from JRS</h6>
                        
                            <div class="row">
							<div class='col-md-4'>Tracking#:</div>									
							<div class='col-md-8'>
							<input type="number" class="form-control"  name="tracking_no" required>
							</div>
                            </div>
					
						    <div class="row">
							<div class='col-md-4'>BC#:</div>									
							<div class='col-md-8'>
							<input type="text" class="form-control"  name="BC" required>
							</div>
							</div>
							<br><br>
                                <input type="submit" class="btn btn-primary" value="Ship" />

                            </form>

                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                    

                    <!-- Void Ordered Items Modal -->

                    <div class="modal fade" id="voidOrderedItems<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="voidOrderedItemsLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="voidOrderedItemsLabel"><i class="icon-edit"> </i>Void Order</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                            <h6>Are you sure you want to void this order?</h6>

                            <form method="post" action="../views/order_methods/void_order.php"> 

                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>

                                <input type="hidden" name="payment" value="true"/>

                                <input type="submit" class="btn btn-danger" value="Void" />

                            </form>

                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                    

                    <!-- View Ordered Items Modal -->

                    <div class="modal fade" id="viewOrderedItems<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderedItemsLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="viewOrderedItemsLabel"><i class="icon-edit"> </i>Ordered Items</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                          <?php
                          	require_once('../include/dbConnect.php');
                            $fetchOrderedItems = "SELECT * FROM orders WHERE transaction_no = '$transaction_no'";

                            $resultOrderedItems = mysqli_query($conn, $fetchOrderedItems);



                            while ($rowOrderedItems = mysqli_fetch_assoc($resultOrderedItems)) {

                              $total_weight = (float) 0;

                              $product_id = $rowOrderedItems["product_id"];

                              $quantity = $rowOrderedItems["quantity"];

                              



                              $fetchProductDetails = "SELECT * FROM products WHERE id = '$product_id'";

                              $resultProductDetails = mysqli_query($conn, $fetchProductDetails);

                              while ($rowProducts = mysqli_fetch_assoc($resultProductDetails)) {

                                $product_name = $rowProducts["name"];

                                $product_price = $rowProducts["price"];

                                $product_weight = $rowProducts["weight"];



                                echo $quantity . " " . $product_name . "(" . $product_weight . "g) @" . $product_price . "<br/>";



                              }

                            }



                            echo "<br/>";

                            echo "Total Amount: ₱" . $total;

                          ?> 

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>
</center>
                      <?php

                        }

                      ?>
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