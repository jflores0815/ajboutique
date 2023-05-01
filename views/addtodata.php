<?php
session_start();

include('../includes/config2.php');

$id = $_POST['idd'];
$item_total = $_POST['item_total'];
date_default_timezone_set('Asia/Manila');
$transaction = mysql_query("SELECT * FROM orders  ORDER BY id DESC LIMIT 1") or die(mysql_error());

	$t_id = mysql_fetch_array($transaction);

	$tran_id = $t_id['id'] + 1;
	$transaction_id = "000" . $tran_id;
	
	$cart = mysql_query("SELECT * FROM addcart LEFT JOIN products ON products.id = addcart.prod_id WHERE addcart.user_id= '$id'") or die(mysql_error());

	WHILE($_cart = mysql_fetch_array($cart)){
	
		                          
			$id = $_cart['user_id'];
			$prod = $_cart['prod_id'];
			$qty2 = $_cart['qty'];
			$quantity_left = $_cart['stock'];
			$price =$_cart['price']*$_cart['qty'];;	
			$tran = $tran_id;
			$roomNo = $_cart['roomNo'];
			$quantity_leftfinal=$quantity_left - $qty2 ;
			$arrival = $_cart['arrival'];
			$departure = $_cart['departure'];
			$arrival = $_cart['arrival'];
			$idd = $_SESSION['guest_id'];

			$today = date("Y-m-d H:i:s a");


			
			

			$query1 = "INSERT INTO orders (transaction_no,client_id,product_id,order_date,quantity)
			VALUES ('$transaction_id','$id','$prod','$today','$qty2')";

           $result1=mysql_query($query1)or die(mysql_error());
		
			mysql_query("UPDATE products set stock='$quantity_leftfinal' where id = '$prod' ");		
			}

			mysql_query("INSERT INTO tbl_countorder  VALUES ('', '$transaction_id', '0')") or die(mysql_error());

			mysql_query("INSERT INTO transactions (transaction_no, date,client_id, total, status) 
			VALUES ('$transaction_id', '$today','$id','$item_total',0)") or die(mysql_error());

			mysql_query("DELETE FROM addcart WHERE user_id = '$id' ");

			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction!')
			window.location.href='shop.php'
			</SCRIPT>");
		mysql_close($con) or die(mysql_error());
 



 ?>
 