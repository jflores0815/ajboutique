<?php
session_start();

include('../includes/config2.php');


$transaction_no = $_POST['transaction_no'];

$transaction = mysql_query("UPDATE transactions SET status = 7 WHERE transaction_no = '$transaction_no'") or die(mysql_error());
$notification = mysql_query("INSERT INTO tbl_countorder  VALUES ('', '$transaction_no', '7')") or die(mysql_error());				

echo '<script> alert("Order Updated"); window.location.href = "../views/client_orders.php"; </script>'
	



 ?>
 