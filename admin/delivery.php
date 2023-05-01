<?php
include'header.php';
include_once'includes/config2.php';
$query12="SELECT count(name) as total from tbl_countorder where type = '5'";
$result12=mysql_query($query12)or die(mysql_error());
while ($row12=mysql_fetch_array($result12)){
$totalorder = $row12['total'];

}
if($totalorder > 0){

$query="DELETE FROM tbl_countorder where type='5'";
$result=mysql_query($query)or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
  
  window.location.href='delivery.php'
  </SCRIPT>");
}else{

}
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Transaction </a> </div>
    <h1>Cancelled Orders</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>List of Cancelled Orders</h5>
          </div>
            <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                     <thead>
		<tr>
						 <th style="font-size: 14px;">Order Details</th>
                        <th style="font-size: 14px;">Actions</th>
                      </tr>
                      </thead>


                      <tbody><tr>
<?php
include_once'includes/config2.php';
$query4="SELECT a.first_name, a.last_name, b.transaction_no, b.date, b.client_id, total 

                                                                    FROM transactions b, clients a 

                                                                    WHERE (b.status = 5

                                                                    OR b.status = 4)

                                                                    AND a.id = b.client_id

                                                                    ORDER BY b.date DESC ";

$result4=mysql_query($query4)or die(mysql_error());
while ($row4=mysql_fetch_array($result4)){
   						


   						$transaction_no = $row4["transaction_no"];

                          $date = date("F d, Y h:i A", strtotime($row4["date"]));

                          $client_id = $row4["client_id"];

                          $total = number_format($row4["total"], 2);

                          $client_last_name = $row4["last_name"];

                          $client_first_name = $row4["first_name"];

                          $client_name = $client_last_name . ", " . $client_first_name;

	
?>                     
					
					 <td><center>

                          Client: <?php echo $client_name . "<br/>"; ?>

                          Order Date: <?php echo $date . "<br/>"; ?>

                          Total amount: <?php echo "₱" . $total . "<br/>"; ?>

                        </td>

                        <td style="width:30%;">

                          <button  style="background: #2b3245;color: #ffffff;border-radius: 7px;font-size: 15px;padding: 5px 10px 5px 10px;cursor: pointer;" class="btn-view btn-block" data-toggle="modal" data-target="#viewOrderedItems<?php echo $transaction_no; ?>"><i class="icon-info-sign"></i> View Items </button>
                         </center> 	
                        </td>
					
                                              
					   </tr>

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