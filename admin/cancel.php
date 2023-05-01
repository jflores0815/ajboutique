<?php
include'header.php';


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
    <h1>Shipped Order</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
       <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List of Shipped Order </h5>
          </div>
            <div class="widget-content nopadding">
             <table class="table table-bordered data-table">
                <thead>
		 			<tr>
						<th style="font-size: 14px;">Confirmation</th>
	                   	<th style="font-size: 14px;">Client Name</th>
	                   
		            </tr>
                </thead>

                       <tbody> <tr>
<?php
  	include_once'includes/config2.php';
$query="SELECT a.first_name, a.last_name, b.transaction_no, b.date, b.client_id, b.tracking_no, b.BC, total, b.status 



                                                                    FROM transactions b, clients a 



                                                                    WHERE (b.status = 3 OR b.status = 6)



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
                          
                          
                          
                          $tracking_no = $row["tracking_no"];
                          
                          
                          
                          $BC = $row["BC"];



                          $client_name = $client_last_name . ", " . $client_first_name;
                          


                          $status = $row['status'];


?>                     
					
				<td><center>



                          Client: <?php echo $client_name . "<br/>"; ?>



                          Order Date: <?php echo $date . "<br/>"; ?>



                          Total Amount: <?php echo "₱" . $total . "<br/>"; ?>
                          
                          
                          Tracking#: <?php echo $tracking_no . "<br/>"; ?>
                          
                          
                          BC#: <?php echo $BC . "<br/>"; ?>

                          



</center>
                        </td>



                        <td style="width:30%;">



                          <!--<button class="btn-delete btn-block" title="Cancel"><i class="icon-trash"></i> Void Order </button>-->



                          <?php



                            if($status == 3) {



                          ?>



                          <button style="background: #ee9d92;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#closeTransaction<?php echo $transaction_no; ?>"><i class="icon-check"></i> Close Transaction </button>



                          <?php



                            } else if($status == 6) {



                          ?>



                            <button style="background: #868e96;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn btn-secondary btn-block"><i class="icon-lock"></i> Transaction Closed </button>



                          <?php



                            }



                          ?>



                          <button style="background: #2b3245;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-view btn-block" data-toggle="modal" data-target="#viewOrderedItems<?php echo $transaction_no; ?>"><i class="icon-info-sign"></i> View Items </button>

                        <a href="http://www.jrs-express.com/home/Tracking?Length=4" target="_blank"> <button style="background: #c6e2ed;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-shipped btn-block"> <i class="icon-plane"></i>Track Order</a></button></a>

                        </td>

						
                                              
					   </tr>

					    <!-- Close Transaction Modal -->



                    <div class="modal fade" id="closeTransaction<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="closeTransactionLabel" aria-hidden="true">



                      <div class="modal-dialog" role="document">



                        <div class="modal-content">



                          <div class="modal-header">



                            <h5 class="modal-title" id="closeTransactionLabel"><i class="icon-edit"> </i>Close Transaction</h5>



                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                              <span aria-hidden="true">×</span>



                            </button>



                          </div>



                        <div class="modal-body">



                            <h6>Are you sure you want to close this transaction?</h6>



                            <form method="post" action="../views/order_methods/close_transaction.php"> 



                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>



                                <input type="submit" class="btn btn-primary" value="Close" />



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