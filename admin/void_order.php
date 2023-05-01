<?php
include_once("dbConnect.php");
if(isset($_POST['id'])) {
    $transNo = $_POST['id'];
    $statement = "UPDATE transactions SET status = 5 WHERE transaction_no = '$transNo'";
    $query = mysqli_query($conn, $statement);	// FETCH ORDER FROM TBL ORDER			$sql = "SELECT * FROM   orders WHERE  transaction_no = '$transNo'";			$result = mysqli_query($conn, $sql);						while ($row = mysqli_fetch_assoc($result)) {						$product_id = $row['product_id'];					$quantity = $row['quantity'];										// FETCH PRODUCTS					$sqli = "SELECT * FROM products WHERE  id = '$product_id' ";					$products = mysqli_query($conn, $sqli);										while ($row = mysqli_fetch_assoc($products)) {    						$new_qty = $row['stock'] + $quantity;						$product_id = $row['id'];						$update_stock = mysqli_query($conn,"UPDATE products SET stock = $new_qty WHERE id = '$product_id'");							}								}
    if($query) {
        echo "<script>history.go(-1)</script>";
    }
}
?>