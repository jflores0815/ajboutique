<?php

session_start();

echo


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
date_default_timezone_set('Asia/Manila');

if(!isset($_SESSION["user"])) :
header("Location:../index.php");

endif;

require_once("../config/dbcontroller.php");
include_once("../include/dbConnect.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) {

switch($_GET["action"]) {
case "add":
if(!empty($_POST["quantity"])) {
$productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'weight'=>$productByCode[0]["weight"]));

if(!empty($_SESSION["cart_item"])) {
if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
foreach($_SESSION["cart_item"] as $k => $v) {
if($productByCode[0]["code"] == $k) {
if(empty($_SESSION["cart_item"][$k]["quantity"])) {
$_SESSION["cart_item"][$k]["quantity"] = 0;
}
$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
$_SESSION["cart_item"][$k]["weight"] += $_POST["weight"];
	echo "<script type='text/javascript'>";
	echo "alert('Item has been added to your shopping bag!');";
	echo "window.location='shop.php'";
echo "</script>";
				}
			}

} else {

	$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
	echo "<script type='text/javascript'>";
	echo "alert('Item has been added to your shopping bag!');";
	echo "window.location='shop.php'";
	echo "</script>";
}



} else {

	$_SESSION["cart_item"] = $itemArray;
	echo "<script type='text/javascript'>";

	echo "alert('Item has been added to your shopping bag!');";
	echo "window.location='shop.php'";

	echo "</script>";
	}

	}

	break;

	case "remove":

		if(!empty($_SESSION["cart_item"])) {
	foreach($_SESSION["cart_item"] as $k => $v) {
	if($_GET["code"] == $k)

	unset($_SESSION["cart_item"][$k]);
	echo "<script type='text/javascript'>";

	echo "alert('Item has been removed from your shopping bag!');";
	echo "window.location='shop.php'";
	echo "</script>";		


					if(empty($_SESSION["cart_item"]))

						unset($_SESSION["cart_item"]);

	}

		}


	break;

	case "empty":

		unset($_SESSION["cart_item"]);
	echo "<script type='text/javascript'>";
echo "alert('Cart emptied');";
echo "window.location='shop.php'";
	echo "</script>";
	break;

}


}



?>

<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

<title>A&J Boutique | Checkout </title>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="../js/jquery.min.js"></script>


<!-- Custom Theme files -->

<!--theme-style-->

<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	

<!--//theme-style-->

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Amberegul Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!--fonts-->

<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>

<!--//fonts-->

<!-- start menu -->

<link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">
<link href="../css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="../js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="../js/simpleCart.min.js"> </script>

</head>

<body> 

<!--header-->	

<div class=" header-product">
	<div class="header-top com">
		<div class="container">
			<div class="header-top-in grid-1">

				<ul class="support">

					<li ><a href="mailto:ajboutiquestore@gmail.com" ><i > </i>ajboutiquestore@gmail.com</a></li>

				</ul>

					<ul class=" support-right">

						<li ><a href="client_profile.php" ><i class="man"> </i>My Profile</a></li>	
						<li ><a href="client_orders.php" ><i class="man"> </i>Transactions</a></li>	
						<li><a  href="clients_notification.php" id="notif"><i class="man"> </i>Notifications <?php
						
include_once'../includes/config2.php';
$id=$_SESSION["user"];
$query="SELECT count(message) as total from  tbl_notification where username = '$id' ";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){
$totalorder = $row['total'];
$name = $row['name'];
}
?>
<?php
if($totalorder > 0){


?>
<span style="background: rgb(238, 157, 146);border-radius: 100%;padding: 2px 5px;">
  <?php echo $totalorder; ?></span>
<?php
}else{

}
?>  </a></li>


						<li><a href="logout.php" title="Logout"><i class="tele"></i>Logout</a></li>		

				</ul>

				<div class="clearfix"> </div>

			</div>

		</div>

			<div class="header-bottom bottom-com">
			<div class="container">			
				<div class="logo">

					<h1><a href="../index.php">A&J Boutique</a></h1>

				</div>

				<div class="top-nav">

				<!-- start header menu -->

	<ul class="megamenu skyblue menu-in">

				<li><a  href="home.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="faqs.php">FAQS</a></li>
				<li><a  href="shop.php">Products</a>

				</li>

				</li>

		 </ul> 

		 <!---->

					<!---->

					<div class="cart box_1" >

						<a href="checkout.php">

						<h3> <div class="total" style="margin-left: -20px !important;">

							<span>Shopping Bag</span></div>

							<img src="../images/cart.png" alt=""/></h3>

						</a>

<?php
include_once'../includes/config2.php';
$id=$_SESSION['user_id'];
$query="SELECT count(prod_id) as total from addcart where user_id=$id";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>

			 <span style="color: red;margin-left: 5px; font-size: 18px; "><b>(<?php echo $row['total']; ?>)</b></span>
	<?php
}
?>	

						<div class="clearfix"> </div>

					</div>

					<!---->

				</div>

				<div class="clearfix"> </div>

			</div>
		</div>
		</div>
	</div>

<!---->


<div class="container">

	<h6 class="dress"><a href="../index.php"></a> <i> </i> Shopping Bag </h6>

</div>

<div class="back">

	<h2>CHECK OUT</h2>

</div>

		<!---->

		<div class="product">
			<div class="container" >
				<div class="col-md-3 product-price" >

				<!---->

				<div class="product-bottom" >

							<div class="clearfix"> </div>

							</div>

				</div>

				</div>

				<!---->

				<div class="col-md-9 product-price1" style="width: 100%">

				<div class="check-out">	 

		 <div class=" cart-items" >

			  <?php
include_once'../includes/config2.php';
$id=$_SESSION['user_id'];
$query="SELECT count(prod_id) as total from addcart where user_id=$id";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>

			 <h3>My Shopping Bag (<?php echo $row['total']; ?>)</h3>
	<?php
}
?>

				<script>$(document).ready(function(c) {

					$('.close1').on('click', function(c){

						$('.cart-header').fadeOut('slow', function(c){

							$('.cart-header').remove();

						});

						});	  

					});

			   </script>

			<script>$(document).ready(function(c) {

					$('.close2').on('click', function(c){

						$('.cart-header1').fadeOut('slow', function(c){

							$('.cart-header1').remove();

						});

						});	  

					});

			   </script>

 <!-- ================================= PLACE ORDER =====================================-->
	<?php 

    	if(isset($_POST["btn-place-order"])) {

	$username = $_SESSION["user"];
	$order_total = (float) $_POST["item_total"];
    $query = "SELECT * FROM clients WHERE username = '$username' ";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
    $client_id = $row["id"];
    $client_region = $row["region"];
	 if ($client_region == 'Metro Manila') { //Shipping to Metro Manila, computation of shipping fee
	foreach ($_SESSION["cart_item"] as $item){	
	$total_weight += $item["weight"];
	 }
if ($total_weight < 400 && $total_weight > 0) { //Express letter (Within 400g of items)

		        	$shipping_fee = (float) 99.00;

      	$order_total = $order_total + $shipping_fee;

$query_orders = "SELECT * FROM orders";

  $result = mysqli_query($conn, $query_orders);
   $row_count = $result->num_rows;
if ($row_count == null || $row_count == 0) {

$row_count = 1;
$transaction_id = $row["client_id"] . "000" . $row_count;
foreach ($_SESSION["cart_item"] as $item) {
	$product_code = $item["code"];
	$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
	$result = mysqli_query($conn, $query_product_id);
	$row = mysqli_fetch_assoc($result);
	$product_id = $row["id"];
	$today = date("Y-m-d H:i:s a");
	$quantity = $item["quantity"];

$insert = "INSERT INTO orders (transaction_no,client_id, product_id, order_date,quantity)
VALUES ('$transaction_id','$client_id','$product_id','$today','$quantity')";

if (mysqli_query($conn, $insert)) {
	echo "<script type='text/javascript'>";
	echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
	echo "window.location = 'shop.php';";
	echo "</script>";
    unset($_SESSION["cart_item"]);
	} else {
	$err_no = mysqli_errno($conn);
    $err_name = mysqli_error($conn);
    echo "<div class='alert alert-success alert-dismissable'>";
    echo $err_no . ": " . $err_name;
    echo "</div>";
	}
	}

$insert_transaction = "INSERT INTO transactions (transaction_no, date,client_id, total,status)
VALUES('$transaction_id', '$today','$client_id','$order_total',0)";
mysqli_query($conn, $insert_transaction);
 } else {$row_count += 1;

$transaction_id = $row["client_id"] . "000" . $row_count;

foreach ($_SESSION["cart_item"] as $item) {

$product_code = $item["code"];

$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
$result = mysqli_query($conn, $query_product_id);
$row = mysqli_fetch_assoc($result);
$product_id = $row["id"];
$today = date("Y-m-d H:i:s a");;
$quantity = $item["quantity"];
$insert = "INSERT INTO orders (transaction_no,client_id,product_id,order_date,quantity)
VALUES ('$transaction_id','$client_id','$product_id','$today','$quantity')";
if (mysqli_query($conn, $insert)) {
	echo "<script type='text/javascript'>";
	echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
	echo "window.location = 'shop.php';";
	echo "</script>";

mysqli_query($conn, $insert_transaction);
 unset($_SESSION["cart_item"]);
} else {
	$err_no = mysqli_errno($conn);
	$err_name = mysqli_error($conn);
	echo "<div class='alert alert-success alert-dismissable'>";
	echo $err_no . ": " . $err_name;
	echo "</div>";
	}
}

$insert_transaction = "INSERT INTO transactions (transaction_no, date,

			   															 client_id,
			   															 total,
			   															 status)
			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } else if ($total_weight > 400 && $total_weight < 1500) { // One pounder 

		        	$shipping_fee = (float) 120.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id = $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];
				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

				                unset($_SESSION["cart_item"]);



					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}


				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } else {

				    	$row_count += 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];
				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } else if ($total_weight >= 1500 && $total_weight < 2500) { // 3 Pounder 

		        	$shipping_fee = (float) 220.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } else {

				    	$row_count += 1;
				    	$transaction_id = $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } else if ($total_weight >= 2500) {

		        	$shipping_fee = (float) 253.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } else {

				    	$row_count += 1;

				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } //** weight condition

		    } else { //Outside Metro Manila

		    	foreach ($_SESSION["cart_item"] as $item){

		        $total_weight += $item["weight"];

		        }

		        if ($total_weight < 400 && $total_weight > 0) { //Express letter (Within 400g of items)

		        	$shipping_fee = (float) 109.00;
		        	$order_total = $order_total + $shipping_fee;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";

				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } else {

				    	$row_count += 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];
				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);

					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } else if ($total_weight > 400 && $total_weight < 1499) { // One pounder 

		        	$shipping_fee = (float) 132.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } 
					  else {

				    	$row_count += 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested
		        } 
				  else if ($total_weight > 1500 && $total_weight < 2499) { // 3 Pounder 

		        	$shipping_fee = (float) 242.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id = $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");; // i remove 1 semi colon
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";


					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } 
					  else {

				    	$row_count += 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } else if ($total_weight >= 2500) {

		        	$shipping_fee = (float) 278.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id =  $row["client_id"] . "000" . $row_count;
				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } 
					  else {

				    	$row_count += 1;
				    	$transaction_id = $row["client_id"] . "000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];


				    		$insert = "INSERT INTO orders (transaction_no,
					    								   client_id,
					    								   product_id,
					    								   order_date,
					    								   quantity)

					    				VALUES 			  ('$transaction_id',
					    								   '$client_id',
					    								   '$product_id',
					    								   '$today',
					    								   '$quantity')";

					   		if (mysqli_query($conn, $insert)) {

					   			echo "<script type='text/javascript'>";
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction ');";
					   			echo "window.location = 'shop.php';";
					   			echo "</script>";
					   			mysqli_query($conn, $insert_transaction);
				                unset($_SESSION["cart_item"]);

					   		} 
							   else {

					   			$err_no = mysqli_errno($conn);
					   		    $err_name = mysqli_error($conn);
					   		    echo "<div class='alert alert-success alert-dismissable'>";
				                echo $err_no . ": " . $err_name;
				                echo "</div>";

					   		}

				    	}

				    	$insert_transaction = "INSERT INTO transactions (transaction_no,
			   															 date,
			   															 client_id,
			   															 total,
			   															 status)

			   								   VALUES 					('$transaction_id',
			   								   							 '$today',
			   								   							 '$client_id',
			   								   							 '$order_total',
			   								   							  0)
			   															 ";

			   			mysqli_query($conn, $insert_transaction);

				    } //*** nested

		        } //** weight condition

		    } //*location condition

    	} //

    ?>

<!--================================= END PLACE ORDER =====================================-->

<div id="cd-shadow-layer"></div>
	<div id="cd-cart" >

		<a class="add-cart" id="btnEmpty" href="empty.php?id=<?php echo $_SESSION['user_id'];?>">Empty Cart</a>

<h4>
			<?php  

				$date = date("F d, Y");

				echo "<div style='float:right;'>" . $date . "</div>" ;

			?>
</h4>
		<br/>
		<br/>


<?php
if(isset($_POST['quantity'])){
	//	echo $_SESSION["cart_item"][$item['code']]['quantity']=1;

$code= $_POST['code'];	
$quantity= $_POST['quantity'];


for($i=0;$i<count($code);$i++)  
{  

$_SESSION["cart_item"]["$code[$i]"]['quantity']=$quantity[$i];

}

	
echo "<script ='text/javascript'> alert('Updated.'); window.location.href = 'checkout.php'; </script>";
http_redirect('checkout.php', [], TRUE);	
	
}
?>


<ul class="unit" align="center">
		  	<li><span></span></li>
			<li><span>Product Name</span></li>
			<li><span>Quantity</span></li>		
			<li><span>Unit Price</span></li>
			<li><span>Action</span></li>

			<div class="clearfix"> </div>
</ul>
<br/>
<?php
$price = 0;

$id=$_SESSION['user_id'];

		$checkout = mysql_query("SELECT * FROM addcart LEFT JOIN products ON products.id = addcart.prod_id WHERE addcart.user_id= '$id'") or die(mysql_error());
WHILE($_checkout = mysql_fetch_array($checkout)) {
$prodid=$_checkout['prod_id'];
$stock=$_checkout['stock'];

$cat = mysql_query("SELECT sum(stock) as stocks FROM products  WHERE  id= '$prodid'  ") or die(mysql_error());
	WHILE($cats = mysql_fetch_array($cat)){
	
$price += $_checkout['qty'] * $_checkout['price'];
	
	}
	
?>

 <div class=" cart-items">
 <div class="in-check" >

 <ul class="cart-header">

 <td><li class="ring-in" ></li></td>
 <a class="close1" href="xdelete.php?id=<?php echo $_checkout['idd']; ?>"> </a>

<li><span></span></li>


<li><span><?php echo $_checkout["name"];?></span>
<div style="float:left;font-size:14px;margin-top:-30px;">
<?php if($stock >= 1){?>
<span style="color:#02e20c;">In Stock: <?php echo $stock; ?></span>
<?php } else{?>
<span style="color:#ff0000;">Out Of Stock</span>
<?php } ?>
</div>
</li>
<form action="qty.php" method="POST">
								<input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
								<input type="hidden" name="firstqty" value="<?php echo $stock?>">
								<input type="hidden" name="prod_id" value="<?php echo $_checkout['prod_id']?>">
								<input style="margin-top:10px;" required class="form-controlss" type="hidden" value="<?php echo $stock; ?>" name="totalstock" >

<li><span class="cd-quantity">
<input type="number" name="qty" value="<?php echo $_checkout['qty']; ?>" style="width:50px;padding:3px;"> x

</span>


</li>
<li><span><div class="cd-price" ><?php echo number_format($_checkout['price'],2);  ?></div></span></li>
<li><span > <button name="add" type="submit" class="btn-danger">Update Order </button></span></li>
</form>

<div class="clearfix"> </div>

			</ul>

		</div>

 </div>
<input type="HIDDEN" name="code[]" value="<?php echo $item['code']; ?>" >
 
		<?php
	        
			}
			$item_total += (float) ($price);
?>
<br/>
<ul class="unit">

<div class="cd-cart-total">
<li><span>Total: <?php echo "₱ ".$item_total.".00"; ?></span></li>

</div> <!-- cd-cart-total -->

			<div class="clearfix"> </div>

		  </ul>

		<ul class=" support-right">

		<a href="#0" data-toggle="modal" id="checkout" data-target="#checkout-modal" class="checkout-btn add-cart">Checkout</a>

		</ul>
<script>
function formSubmit()
{

     document.getElementById("form").submit();
} 
</script>

	</div>

	<!-- CHECKOUT MODAL -->

    <div class="modal fade" id="checkout-modal" tabindex="-1" role="dialog" aria-labelledby="checkout-modal-label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">

            <h5 class="modal-title" id="checkout-modal-label"><i class="icon-shopping-cart"> </i></h5>

          </div>

        <div class="modal-body">


          <h3>Checkout Details</h3>

 <?php echo date("F d, Y"); ?></br>
 <?php
	$raw_item_total = 0;
	$total_weight = 0;

$username = $_SESSION["username"];
$query = "SELECT * FROM clients WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$region = $row["region"];
$shippingAdd = $row["address"];
echo "Name : " . $row["last_name" ] . " , " . $row["first_name"] . " <br/> ";
echo "Shipping address : " . $shippingAdd . "<br/><br/>";

			$id=$_SESSION['user_id'];

			$checkout = mysql_query("SELECT * FROM addcart LEFT JOIN products ON products.id = addcart.prod_id WHERE addcart.user_id= '$id'") or die(mysql_error());
			WHILE($_checkout = mysql_fetch_array($checkout)) {
			$prodid=$_checkout['prod_id'];
			$stock=$_checkout['stock'];

			$cat = mysql_query("SELECT sum(stock) as stocks FROM products  WHERE  id= '$prodid'  ") or die(mysql_error());
				WHILE($cats = mysql_fetch_array($cat)){
				
			$price += $_checkout['qty'] * $_checkout['price'];
				
				}


echo $_checkout["qty"] . " " . $_checkout["name"] . " @ " . $_checkout["price"];

  echo "<br/>";


 $raw_item_total += (float) ($_checkout["price"]*$_checkout["qty"]);
  $total_weight += (float) ($_checkout["weight"]*$_checkout["qty"]);
 $new_item_total = (float) $raw_item_total;
 }


echo "<br/>Total weight : " . $total_weight . "g";
  if ($region == 'Metro Manila') { //Within Metro Manila Shipping Rates
if ($total_weight > 0 && $total_weight <= 400) {
$shipping_fee = (float) 99.00;

		        		$tender_total = (float) 0;
		        		$tender_total = $shipping_fee + $new_item_total;
				        echo "<br/><p style='text-align: right; width: 100%;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
				        echo "<p style='text-align: right; width: 100%;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
				        echo "<br/><p style='text-align: right; width: 100%;'>Total: ₱ " . number_format($tender_total, 2) . "</p>"; 


		        	} 
					  else if ($total_weight > 400 && $total_weight < 1500) {

		        		$shipping_fee = (float) 120.00;
						$tender_total = (float) 0;
		        		$tender_total = $shipping_fee + $new_item_total;



				        echo "<br/><p style='text-align: right; width: 100%;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
						echo "<p style='text-align: right; width: 100%;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
						echo "<br/><p style='text-align: right; width: 100%;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";
					} else if ($total_weight >= 1500 && $total_weight < 2500) {

$shipping_fee = (float) 220.00;
$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;
echo "<br/><p style='text-align: right; width: 100%;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
echo "<p style='text-align: right; width: 100%;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
echo "<br/><p style='text-align: right; width: 100%;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";
} else if ($total_weight >= 2500) {
$shipping_fee = (float) 253.00;
$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;
 echo "<br/><p style='text-align: right; width: 100%;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
echo "<p style='text-align: right; width: 100%;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
echo "<br/><p style='text-align: right; width: 100%;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";
}
} else { //Outside Metro Manila Shipping Rates

if ($total_weight > 0 && $total_weight <= 400) {

$shipping_fee = (float) 109.00;

$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;


 echo "<br/><p style='text-align: right; width: 100;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";

echo "<p style='text-align: right; width: 100;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";

 echo "<br/><p style='text-align: right; width: 100;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";
} else if ($total_weight > 400 && $total_weight < 1500) {
$shipping_fee = (float) 132.00;
$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;
 echo "<br/><p style='text-align: right; width: 100;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
 echo "<br/><p style='text-align: right; width: 100;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
echo "<br/><p style='text-align: right; width: 100;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";

} else if ($total_weight >= 1500 && $total_weight < 2500) {

$shipping_fee = (float) 242.00;
$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;
 echo "<br/><p style='text-align: right; width: 100;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
echo "<p style='text-align: right; width: 100;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";

 echo "<br/><p style='text-align: right; width: 100;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";
} else if ($total_weight >= 2500) {
$shipping_fee = (float) 278.00;
$tender_total = (float) 0;
$tender_total = $shipping_fee + $new_item_total;

  echo "<br/><p style='text-align: right; width: 100;'>Sub Total: ₱ " . number_format($new_item_total, 2) . "</p>";
 echo "<p style='text-align: right; width: 100;'>Shipping Fee: ₱ " . number_format($shipping_fee, 2) . "</p>";
  echo "<br/><p style='text-align: right; width: 100;'>Total: ₱ " . number_format($tender_total, 2) . "</p>";


           } if (empty($shippingAdd)){


			echo "<script = 'text/javascript'>";

			echo "$('#checkout').prop('disabled', true);";
echo "alert('Please add Shipping address in your profile before placing the order!');";
	echo "window.location.href = 'client_profile.php';";
echo "</script/>";

		} 
	}
	?>

 <a href="client_profile.php" align= left;>Please add shipping addresses, click here.</a>

        </div>

          <div class="modal-footer">

<form method="POST" action="addtodata.php">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<input type="hidden" name="idd" value="<?php echo $_SESSION['user_id']; ?>">						
                <input type="hidden" name="item_total" value="<?php echo $new_item_total; ?>">
                <button class="btn btn-primary" type="submit" name="btn-place-order"><i class="icon-shopping-cart"></i>&nbsp Place Order</button>

            </form>

          </div>
        </div>
      </div>
    </div>
			 </div>
		 </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

			<!---->

				<div class="bottom-grid1">
					<div class="fit1">
						<h3></h3>
						<p> </p>
					</div>
				</div>



<!---->

	<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-top">
				<h3>PAYMENT DETAILS</h3>

                	<ul class="social-footer ">						

						<li><span> <a href=""><img class="img-responsive ">Account Name: Adelfa R. Dela Cruz</a></span></li>
						<li><span> <a href=""><img class="img-responsive ">BPI Savings Account- 0249131482</a></span></li>
						<li><span> <a href=""><img class="img-responsive ">BDO Savings Account- 002060648404</a></span></li>

					</ul>

                <a href=""><img src="../images/pa2.png" alt=""></a>

			</div>

  		<div class="col-md-4 footer-middle">

				<h3>MADE FOR YOU</h3>

							<div class="product-go">
							<div class="logo-bottom">

								<a href="#"><img src="../images/lo.png" alt=""></a>
								    </div>

									<div class="logo-the">

									<h4>Aj Boutique</h4>
									<p>Was designed just for you! Have a suggestion?
									let us know.</p>

									</div>

								<div class="clearfix"> </div>

							</div>

							<div class="indo">
							<div class="clearfix"> </div>
							</div>
			</div>

			<div class="col-md-4 footer-top">
				<h3>CONTACT US</h3>
					<div class="logo-bottom">
					<ul class="social-footer ">

						<li><span><a href="tel:+63917 506 3986"><i class="tele-in"></i>+639175063986</a> </span></li>
						<li><span><i class="down"> </i>@ajboutique</span></li>
						<li><a href="mailto:ajboutiquestore@gmail.com"><i class="mes"> </i>ajboutiquestore@gmail.com</a></li>
						<li><a href="https://www.facebook.com/AyasOfficialPage"><i class="mes-in"> </i>https://www.facebook.com/AyasOfficialPage</a></li>

					</ul>

					</div>

				</div>

			<div class="clearfix"> </div>

			<p class="footer-class">| © 2017 A & J Boutique | All Rights Reserved |  </p>

		</div>
	</div>



<!---->

	<script type="text/javascript">
	$(document).ready( function() {

 	$('#des').attr("disabled", true); 
	calculateSum();
	$(".delete").click( function() {
	if(confirm("Are you sure you want to delete order? "))
		{
			var id = $(this).attr('id');
		
				$.ajax({
				type: "POST",
				url: "delete.php",
				data: ({id: id}),
				success: function(response){
					
					$(".order" + id).hide('slow', function()
						
						{  $(this).remove();
						calculateSum();
					});
					
				}
				});	
		}

		return false;

		});

	$(".update").click( function() {
		var id = $(this).attr('id')
		
	
			var id = $(this).attr('id');
			var qty = $('.qty2' + id).val();
			
			if(qty.includes("-") == true){
			
				alert("please input positive number");
				
			}
			else{
			
				$.ajax({
				type: "POST",
				url: "update.php",
				data: ({id: id, qty: qty}),
				success: function(response){
				$(".message").fadeIn().html("Your Cart is Successfully Updated");	
				$(".prices" + id).html(response);	
				calculateSum();

				 }
				});			
					
			}
			
	});
		function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
}
	function calculateSum() {
 
        var sum = 0;
     
        $(".sums").each(function() {
 
       
            if(!isNaN(this.value) && this.value.length!=0) {
                sum += parseFloat(this.value);
            }
 
        });
     
        $("#sums").html("&nbsp;Php "+sum.toFixed(2));
    }
	$('.points').each(function(){
    var v_pound = $(this).html();
    v_pound = numberWithCommas(v_pound);

    $(this).html(v_pound)
        
        })
})
</script>	

<script src="../js/js/jquery.min.js"></script>
<script src="../js/js/bootstrap.min.js"></script>
<script src="../js/js/jquery-2.0.3.min_1.js"></script>
<script src="../js/main.js"></script> <!-- Gem jQuery -->

</body>

</html>