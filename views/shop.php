<?php

session_start();

echo

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
date_default_timezone_set('Asia/Manila');

// if(!isset($_SESSION["user"])) :

// 	header("Location:../index.php");

// endif;

require_once("../config/dbcontroller.php");
include_once("../include/dbConnect.php");

$db_handle = new DBController();

if(!empty($_GET["action"])) {

switch($_GET["action"]) {


	// reservation of product ( out of stock )

	case "reserve" :

		if ( !empty($_POST["quantity"]) )

		{

				$result = mysqli_query($conn, "SELECT * FROM `reserved`");
				$row_count = $result->num_rows;
				$id = $_SESSION["user_id"];
				$prod_id = $_GET["code"];
				$qty = $_POST["quantity"];
				$trans_no = $id.'-'.$prod_id.'-'.$row_count;
				$res_date = date('Y-m-d H:i:s');
				$query = $conn->query("INSERT INTO `reserved` (`transaction_no`, `reserved_date`, `client_id`,`product_id`,`quantity`,`status`)
				VALUES ('$trans_no', '$res_date', '$id', '$prod_id', '$qty','7')");

				if ( $query === true) {

						echo "<script type='text/javascript'>";
						echo "alert('Item has been Reserved!');";
						echo "window.location='shop.php'";
						echo "</script>";

				}

		}

	break;

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
								echo "<script type='text/javascript'>";
								echo "alert('Item has been added to your shopping bag!');";
								echo "window.location='shop.php'";
								echo "</script>";

							}

					}

				} 
				  else {

					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);

					echo "<script type='text/javascript'>";
					echo "alert('Item has been added to your shopping bag!');";
					echo "window.location='shop.php'";
					echo "</script>";

				}

			} 
			  else {

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
<title>A&J Boutique | Shop </title>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="../js/jquery.min.js"></script>
<!-- Custom Theme files -->

<!--theme-style-->

<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />	
<script src="../js/modernizr.js"></script> <!-- Modernizr -->
<link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->

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

<!--//slider-script-->

<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>

		    <script type="text/javascript">

			    $(document).ready(function () {

			        $('#verticalTab').easyResponsiveTabs({

			            type: 'vertical', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container

			        });

			    });

</script>	

<script src="../js/simpleCart.min.js"> </script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: 100%;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .8s ease;
  opacity: 0;
  position: absolute;
  top: 60%;
  left: 40%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align:left;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 0.8;
}

.text {
  background-color: #FFE3DF;
  color: black;
  font-size: 11px;
}

</style>
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
                        <li><a  href="client_orders.php" ><i class="man"> </i>Transactions</a></li>
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

					<h1><a href="home.php">A&J Boutique</a></h1>

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

				<div class="cart box_1">

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

	<h6 class="dress"><a href="home.php"></a> <i> </i> Products </h6>

</div>


<div class="back">

	<h2>SHOP</h2>

</div>

		<!---->
		<div class="product">
			<div class="container">
				<div class="col-md-3 product-price">
				<div class=" rsidebar span_1_of_left">

					<div class="of-left">

						<h3 class="cate">CATEGORIES</h3>

					</div>

<!-- ================================= PLACE ORDER ===================================== -->

		<?php 

    	if(isset($_POST["btn-place-order"])) {

		    $username = $_SESSION["user"];
		    $order_total = (float) $_POST["item_total"];
		    $total_weight = (float) 0.00;
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
				    	$transaction_id ="000" . $row_count;

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
					   			echo "alert('000Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				   	    $transaction_id ="000" . $row_count;


							//AAA
				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];

				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";

				    		$result = mysqli_query($conn, $query_product_id);

				    		$row = mysqli_fetch_assoc($result);

				    		$product_id = $row["id"];
							$stock = $row["stock"];
							
				    		$today = date("Y-m-d H:i:s a");;
				    		$quantity = $item["quantity"];

							//STOCK VALIDATION
							if($quantity>$stock){
							die ("<script> alert('Insuffient Stock.');
							window.location.href='checkout.php';		
							</script> ");
							}
							
							$remaining = $stock - $quantity;
							
							$sql = "UPDATE products SET stock ='$remaining' WHERE  code = '$product_code'";
							$res=mysqli_query($conn,$sql);	
							

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
					   			echo "alert('AAAOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				  else if ($total_weight > 400 && $total_weight < 1500) { // One pounder 

		        	$shipping_fee = (float) 120.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('CCCOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
							$stock = $row["stock"];
							$name = $row["name"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
				    		$quantity = $item["quantity"];

							//STOCK VALIDATION
							if($quantity>$stock){
							die ("<script> alert('Insuffient Stock.');
							window.location.href='checkout.php';		
							</script> ");
							}

                            $remaining = $stock - $quantity;
							$sql = "UPDATE products SET stock ='$remaining' WHERE  code = '$product_code'";
							$res=mysqli_query($conn,$sql);	

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
					   			echo "alert('DDDOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				  else if ($total_weight >= 1500 && $total_weight < 2500) { // 3 Pounder 

		        	$shipping_fee = (float) 220.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('EEEOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('FFFOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				  else if ($total_weight >= 2500) {

		        	$shipping_fee = (float) 253.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id ="000" . $row_count;

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
					   			echo "alert('GGGOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('HHHOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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

		    } 
			  else { //Outside Metro Manila

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
				    	$transaction_id ="000" . $row_count;

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
					   			echo "alert('IIIOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

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
					   			echo "alert('JJJOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				  else if ($total_weight > 400 && $total_weight < 1499) { // One pounder 

		        	$shipping_fee = (float) 132.00;
		        	$query_orders = "SELECT * FROM orders";
				    $result = mysqli_query($conn, $query_orders);
				    $row_count = $result->num_rows;
				    $order_total = $order_total + $shipping_fee;

				    if ($row_count == null || $row_count == 0) {

				    	$row_count = 1;
				    	$transaction_id ="000" . $row_count;

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
					   			echo "alert('KKKOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('LLLOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('MMMOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('NNNOrder has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); // i remove 1 semi colon
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
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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
				    	$transaction_id ="000" . $row_count;

				    	foreach ($_SESSION["cart_item"] as $item) {

				    		$product_code = $item["code"];
				    		$query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
				    		$result = mysqli_query($conn, $query_product_id);
				    		$row = mysqli_fetch_assoc($result);
				    		$product_id = $row["id"];
				    		$today = date("Y-m-d H:i:s a"); //i remove 1 semi colon
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
					   			echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
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

		 <ul class="menu">

	<!-- begin filter -->

				<script type="text/javascript"></script>

				<div id="nav">
					<select name="sort-products" id="sort-products">

						<option value="All">All products</option>

						<?php

							ob_start(); // begin collecting output

							include "../category/read.php";
							$result = ob_get_clean();
							$json_array = json_decode($result, true);
			        		foreach ($json_array['records'] as $key => $value) {

			            ?>


			            <option value="<?php echo 'Cat' .$value['category_id']; ?>"> <?php echo $value["name"]; ?></option>



			            <?php

			            	}

			            ?>

					</select>
				</div>


		<!-- end filter -->	</ul>

					</div>

				<!--initiate accordion-->

		<script type="text/javascript">

			$(function() {

			    var menu_ul = $('.menu > li > ul'),

			           menu_a  = $('.menu > li > a');

			    menu_ul.hide();

			    menu_a.click(function(e) {

			        e.preventDefault();

			        if(!$(this).hasClass('active')) {

			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');

			        } 
					
					else {


			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');


			        }


			    });



			});




		</script>


<!---->


				<!---->

</br>


		<!---->

	</div>


			<!---->

				<!---->

		<main>

				<div class="col-md-9 product-price1">
					<div class="mens-toolbar">
	                 <div class="sort">

			            <select>

			                    <option value="">Sorting By Rate  </option>
			                    <option value="">Sorting By Color </option>
			                    <option value="">Sorting By Price </option>

			            </select>

	    		     </div>

                	<div class="clearfix"></div>		

		        </div>
		        <div class="product-right-top">
		        	<div class="top-product">



		        		<div class="chain-grid  simpleCart_shelfItem">


					<section class="content">


				<!-- Product image 1 -->

				<?php

				ob_start();

				include "../product/read.php";

				$result = ob_get_clean();
				$json_array = json_decode($result, true);

				foreach ($json_array['records'] as $key => $value) {






				?>



				<div class="boxfourcolumns col-md-4 chain-grid simpleCart_shelfItem top-product" data-category="<?php echo "Cat" . $value['category_id']; ?>" >



					<div class="boxcontainer">



							<img src="<?php echo $value['image']; ?>"  class="imgOpa img-responsive" style="height:auto; width:auto;"/><div class="middle text"> <?php echo $value['description'];?></div>


					</div>


					<?php echo "<b style='font-size: auto; font-weight: none;'>" . $value['name'] . " (" . $value['weight'] . "g)</b></br><i style='font-size: auto; font-weight: none; margin: 10px;'> ₱" . $value['price'] . "</i>";?>

					<?php

					if ($value['stock'] == 0) {

					    echo "<i style='color: #FB5C5C; font-size: 12px'> ---Out of Stock---</i> <a style='cursor:pointer;'> Reserve </a>";
					?>


					<form method="POST" action="shop.php?action=reserve&code=<?php echo $value['code']; ?>">

						<input type="number" name="quantity" placeholder="Qty" class="form-control" style="height:42px;width:auto;float:left;">
						<br/><br/><br/>
						<div style="float: center;">
							<button type="submit" class="acount-btn" name="submit">RESERVE PRODUCT</button>
							<div class="clearfix"> </div>
						</div>


					</form>

					<?php



					}





					else {



					




				    ?>


                    <?php
					  echo "<i style='color: #02e20c; font-size: 12px'> In Stock: $value[stock]</i> ";
                        
					?>

				    <form method="POST" action="addtocart.php">
    					<input type="number" name="qty" value="1" min="1" max="<?php echo $value['stock']; ?>" placeholder="Qty" class="form-control" style="height:42px;width:auto;float:left;">
<?php
include_once'../includes/config2.php';
$id=$value['code'];
$idd = $_SESSION['user_id']; 
$query="SELECT * FROM products where code='$id'";
$result=mysql_query($query)or die(mysql_error());
while ($row=mysql_fetch_array($result)){

?>
<input  type="hidden" name="price"  value="<?php echo $row['weight']; ?>">				
<input  type="hidden" name="price"  value="<?php echo $row['price']; ?>">
<input  type="hidden" name="prod_id"  value="<?php echo $row['id']; ?>" >
<input  type="hidden" name="available"  value="<?php echo $row['stock']; ?>" >

<?php
}

?>

    					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" />	
    					<input type="hidden" name="weight" value="<?php echo $value['weight']; ?>" />

                        <br/>
                        <br/>
                        <br/>
<div style="float: center;">
							<button type="submit" class="acount-btn" name="add"> ADD TO CART</button>
							<div class="clearfix"> </div>
						</div>

					</form>

					<?php
					}

					?>

				</div>


				<?php 

				}

				?>		



			</section>
<!-- End of Product Image 1 -->

		<!-- begin filter -->


		</main>	

			<!-- Sliding Cart -->
			<div class="clearfix"> </div>
				<div class="shipping">
					<div class="col-md-3 col-md1">
						<div class=" phone">
							<div class="num">
								<span>Follow up order</span>
								<p>Monday - Friday: 8am - 5pm Manila Time</p>
							</div>
							<i class="phone-in"><span><a href="tel:+63917 506 3986"></a></span> </i>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-5 col-md2">
						<div class=" phone1">
							<i class="phone-in1"> </i>
							<div class="num1">
								<span>Track Your Orders</span>
								<p>via JRS tracking link</p>

							</div>

							<a class="learn-in" href="http://jrs-express.com/Home/Tracking?Length=4">Learn More</a>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-4 col-md3">
						<div class=" phone2">
							<div class="num2">

								<span>Reserved Items</span>
								<p>Check here</p>

							</div>
							<a class="learn-in1" href="client_notification">Learn More</a>
							<div class="clearfix"> </div>

						</div>
			</div>

			<div class="clearfix"> </div>

			</div>
				</div>

			<!---->

		</div>

		<div class="bottom-grid1">
					<div class="fit1">

						<h3></h3>
					</div>
				</div>

<!---->
<script src="../js/simpleCart.min.js"> </script>
<!---->

	<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-top">
				<h3>PAYMENT DETAILS</h3>

                	<ul class="social-footer ">						

						<li><span> <a href=""><img class="img-responsive ">Account Name: Adelfa Dela Cruz</a></span></li>
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

								<div class="clearfix"> 
								</div>
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

<script src="../js/main.js"></script> <!-- Gem jQuery -->
<script type="text/javascript">

	jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');

    jQuery('.quantity').each(function() {

        var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {

        var oldValue = parseFloat(input.val());

        if (oldValue >= max) {

          var newVal = oldValue;
        } 
		  else {

          var newVal = oldValue + 1;

        }

        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");

      });

      btnDown.click(function() {

        var oldValue = parseFloat(input.val());

        if (oldValue <= min) {

          var newVal = oldValue;

        } 
		
		  else {

          var newVal = oldValue - 1;

        }

        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");

      });

    });

</script>

<!-- CALL filtering -->

<script>

$('select#sort-products').change(function() {

	var filter = $(this).val()
	filterList(filter);

});

function filterList(value) {

	var list = $(".content .boxfourcolumns");
	$(list).fadeOut("fast");

	if (value == "All") {

		$(".content").find("div").each(function (i) {

			$(this).delay(200).slideDown("fast");

		});

	}
	 else {


		//Notice this *=" <- This means that if the data-category contains multiple options, it will find them

		//Ex: data-category="Cat1, Cat2"

		$(".content").find("div[data-category*=" + value + "]").each(function (i) {

			$(this).delay(200).slideDown("fast");

		});


	}

}

 </script>

</body>
<!-- Script Begin-->
<script>

$(document).ready(function(){
	$('li[data-id]').click(function(){
		var cat_name =  $(this).data('id');
		var airal = $(this).attr('aria-controls');
		$('div[data-append]').html(" ");
		$.ajax({

			type: 'POST',
			url: 'featured_item.php',
			data: { cat_name:cat_name },
			success: function (data) {

				$('div[data-append]').append(data);

			}

		});

	});

	var auto_load = $('li[data-id]').data('id');
	$.ajax({
		type: 'POST',
		url: 'featured_item.php',
		data: { cat_name:auto_load },
		success: function (data) {
			$('div[data-append]').append(data);

		}

	});

	var user = <?php  echo $_SESSION['client']['id'] ?>;

	if (user != " ") {

		setInterval( countNotifRes, 1000);

	}

	else {

		alert('pls login');

	}
	function countNotifRes ()
	{

		$.ajax({
			type: 'POST',
			url: 'notif_user_reserved.php',
			data: { user:user, reserved_notif:"count" },
			success: function (data) {

				if (data > 0) {

					$('#notif-number').css({"background":"#ee9d92", "border-radius":"100%", "padding": "2px 5px 2px 5px"});
					$('#notif-number').html(data);
				}

			}
		});
	}
});
</script>

<!-- Script End -->
</html>















