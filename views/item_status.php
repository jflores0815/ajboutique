<?php
session_start();

include('../includes/config2.php');


$transaction_no = $_POST['transaction_no'];
$status = $_POST['status'];
$user_id = $_POST['user_id'];

if($status == "lost_item"){
	
	
$transaction = mysql_query("UPDATE transactions SET status = 6 WHERE transaction_no = '$transaction_no'") or die(mysql_error());
echo '<script> alert("Order Updated"); window.location.href = "http://ajboutique.16mb.com/views/client_orders.php"; </script>';

}
else{
	
$transaction = mysql_query("UPDATE transactions SET status = 5 WHERE transaction_no = '$transaction_no'") or die(mysql_error());

$sql = "SELECT * FROM   orders WHERE  transaction_no = '$transaction_no' AND status = 5 and client_id = '$user_id' ";
$result = mysql_query($sql);

// FETCH ORDER FROM TBL ORDER
			$sql = "SELECT * FROM   orders WHERE  transaction_no = '$transaction_no'";
			$result = mysql_query($sql);
			
			while ($row = mysql_fetch_assoc($result)) {
	
					$product_id = $row['product_id'];
					$quantity = $row['quantity'];
					
					// FETCH PRODUCTS
					$sqli = "SELECT * FROM products WHERE  id = '$product_id' ";
					$products = mysql_query($sqli);
					
					while ($row = mysql_fetch_assoc($products)) {
    
						$new_qty = $row['stock'] + $quantity;
						$product_id = $row['id'];
						$update_stock = mysql_query("UPDATE products SET stock = $new_qty WHERE id = '$product_id'") or die(mysql_error());
		
					}
					
			}
echo '<script> alert("Order Updated"); window.location.href = "http://ajboutique.16mb.com/views/client_orders.php"; </script>';
  
}



 ?>
 