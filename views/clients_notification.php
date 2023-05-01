
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



include("../include/dbConnect.php");















require_once("../config/dbcontroller.php");



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



								echo "alert('Item has been added!');";



								echo "window.location='shop.php'";



								echo "</script>";



							}



					}



				} else {



					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);



					echo "<script type='text/javascript'>";



					echo "alert('Item has been added!');";



					echo "window.location='shop.php'";



					echo "</script>";



				}



			} else {



				$_SESSION["cart_item"] = $itemArray;



				echo "<script type='text/javascript'>";



				echo "alert('Item has been added!');";



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



						echo "alert('Item has been removed!');";



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











<html lang="en" class="no-js">



<head>

<title>A&J Boutique | Notifications</title>

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



<!-- VENDOR CSS -->



	<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">

	<link rel="stylesheet" href="../assets/vendor/linearicons/style.css">

	<!-- MAIN CSS -->

	<link rel="stylesheet" href="../assets/css/main.css">





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

                        <li><a  href="client_orders.php" ><i class="man"> </i>Transactions</a></li>

						<li><a  href="clients_notification.php" id="notif"><i class="man"> </i>Notifications <span id="notif-number"></span> </a></li>

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



						<h3> <div class="total" style="margin-left: -30px !important;">



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

	<h6 class="dress"><a href="home.php"></a> <i> </i> My Purchases </h6>

</div>

<div class="back">

	<h2>MY NOTIFICATION</h2>

</div>





		<div class="product">

			<div class="container">

				<div class="col-md-3 product-price">





				<!---->





				</div>









	<main>







		<div class="row">





	<div class="container-fluid">

					<div class="panel panel-profile" style="height:100%;">

						<div class="clearfix"></div>

							<!-- LEFT COLUMN -->

							<div class="profile-left"> <br/>

							    <h4 class="heading"> Messages</h4>

	<div class="table-responsive" style="overflow-x:hidden;height:500px;width:100%;margin-top: 50px;">



      <ul>



   

<?php
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
 <li class="row" style="list-style-type:none;background:#f1f1f1;margin-bottom:2%;">



<div class="col-md-10" style="padding-top:10px;padding-bottom:10px;margin-left: 20px;">

<h4> You Have <?php echo $totalorder; ?> New Message From Admin <br>
  
  

<br>


<center>
<a href="client_profile.php" style="color:red">Read Here...</a>
</center>
</div>

</li>

<?php
}else{

}
?>









      </ul>



		</div>

							</div>

	        <div class="profile-right">

	            	<h4 class="heading">Notification</h4>



						    	<br/>



		<div class="table-responsive" style="overflow-x:hidden;height:500px;width:100%;">



      <ul>



        <?php



          $user_id = $_SESSION['user_id'];



          $reservation = $conn->query("SELECT reserved.client_id, reserved.product_id, products.stock,



          products.image, products.name , products.price



          FROM reserved



          JOIN products ON products.code = reserved.product_id



          WHERE reserved.client_id = '$user_id' AND products.stock >= 1 ");



          while ( $row = mysqli_fetch_assoc($reservation)) {



              include 'notif_content.php';

          }



          $dateNow = date('Y-m-d');



          $timeNow = date('H');



          $due = $conn->query("SELECT orders.transaction_no, payments.transaction_no, HOUR(payments.date) time,



                              DATE(payments.date) dayNow, MINUTE(payments.date) min ,



                              products.image, products.name,  products.price



                              FROM orders



                              JOIN payments ON payments.transaction_no = orders.transaction_no



                              JOIN products ON orders.product_id = products.id



                              WHERE orders.client_id = '$user_id' AND payments.status = 0 AND DATE(payments.date) = '$dateNow'");



          while ( $rowDue = mysqli_fetch_assoc($due)) {



            $sadDate = $rowDue['time'] - $timeNow;



            if ( $sadDate <= 7 AND $rowDue['min'] < 59) {



              include 'notif_due.php';

            }



          }



        ?>



      </ul>



		</div>



		</div>







<!--



	================================= PLACE ORDER =====================================



 -->



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



		        } else if ($total_weight > 400 && $total_weight < 1500) { // One pounder







		        	$shipping_fee = (float) 120.00;







		        	$query_orders = "SELECT * FROM orders";



				    $result = mysqli_query($conn, $query_orders);



				    $row_count = $result->num_rows;







				    $order_total = $order_total + $shipping_fee;











				    if ($row_count == null || $row_count == 0) {







				    	$row_count = 1;



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



		        } else if ($total_weight > 1500 && $total_weight < 2499) { // 3 Pounder







		        	$shipping_fee = (float) 242.00;







		        	$query_orders = "SELECT * FROM orders";



				    $result = mysqli_query($conn, $query_orders);



				    $row_count = $result->num_rows;







				    $order_total = $order_total + $shipping_fee;







				    if ($row_count == null || $row_count == 0) {







				    	$row_count = 1;



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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







		        	$shipping_fee = (float) 278.00;







		        	$query_orders = "SELECT * FROM orders";



				    $result = mysqli_query($conn, $query_orders);



				    $row_count = $result->num_rows;







				    $order_total = $order_total + $shipping_fee;











				    if ($row_count == null || $row_count == 0) {







				    	$row_count = 1;



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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



				    	$transaction_id = $row["username"] . "_" . $row_count;







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



					   			echo "alert('Order has been placed! Pay within 48 hours to complete transaction');";



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







		    } //*location condition



    	} //







    ?>







<!--



================================= END PLACE ORDER =====================================



-->







<!-- ============================= CANCEL ORDER =================================== -->







<?php







	if (isset($_POST["btn-cancel"])) {







		$transaction_no = $_POST["transaction_no"];







		$cancelTransaction = "UPDATE transactions



							  SET



							  	status = 5



							  WHERE



							  	transaction_no = '$transaction_no'";







		if (mysqli_query($conn, $cancelTransaction)) {



            unset($_SESSION["cart_item"][$k]);



			echo "<script type='text/javascript'>";



			echo "alert('Transaction has been cancelled');";



			echo "window.location='client_orders.php'";



			echo "</script>";



		} else {



			echo "<div class='alert alert-danger alert-dismissable'>";



			echo "Unable to update product.";



			echo "</div>";



		}







	}







?>







<!-- ========================== END CANCEL ORDER ================================== -->







<!-- ================================= PAYMENT ==================================== -->







<?php







	if (isset($_POST["btn-payment"])) {







		$transaction_no = $_POST["transaction_no"];



		$amount = $_POST["amount"];



		$temp_name = $_FILES["image"]["tmp_name"];



		$file_name = $_FILES["image"]["name"];



		$date = date("Y-m-d H:i:s a");







		$path = "paymentProofs/" . $transaction_no . ".jpg";







		$actual_path = "../images/" . $path;







		if (move_uploaded_file($temp_name, $actual_path)) {







			$insertPayment = "INSERT into payments



								(transaction_no,



								 date,



								 amount,



								 image,



								 status)



							  VALUES



							  	('$transaction_no',



							  	 '$date',



							  	 '$amount',



							  	 '$actual_path',



							  	  0);";







			if (mysqli_query($conn, $insertPayment)) {







				$updateTransactionStatus = "UPDATE transactions



											SET



												status = 1,



												payment_date = '$date'



											WHERE transaction_no = '$transaction_no'";







				if (mysqli_query($conn, $updateTransactionStatus)) {







					echo "<script type='text/javascript'>";



		   			echo "alert('Payment has been made. Wait for verification email from admin. Thank you!');";



		   			echo "window.location = 'client_orders.php';";



		   			echo "</script>";







				} else {







					echo "<div class='alert alert-danger alert-dismissable'>";



	                echo "Unable to complete payment.";



	                echo "</div>";







				}







			} else {







                echo "<div class='alert alert-danger alert-dismissable'>";



                echo "Unable to complete payment.";



                echo "</div>";







			}



		}



	}







?>







<!-- ================================= END PAYMENT ==================================== -->







		<div class="row space-top">



		    <section class="content">







		    </section>



		</div>



	</div>



</main>







<!-- Sliding Cart -->











<!-- End Sliding Cart -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>



<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-12/jquery-2.0.3.min_1.js"></script>



<script src="../js/main.js"></script> <!-- Gem jQuery -->



<!-- Page level plugin JavaScript-->



<script src="../vendor/datatables/jquery.dataTables.js"></script>



<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>



<!-- Custom scripts for all pages-->



<script src="../js/sb-admin.min.js"></script>



<!-- Custom scripts for this page-->



<script src="../js/sb-admin-datatables.min.js"></script>



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



        } else {



          var newVal = oldValue + 1;



        }



        spinner.find("input").val(newVal);



        spinner.find("input").trigger("change");



      });







      btnDown.click(function() {



        var oldValue = parseFloat(input.val());



        if (oldValue <= min) {



          var newVal = oldValue;



        } else {



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



	} else {



		//Notice this *=" <- This means that if the data-category contains multiple options, it will find them



		//Ex: data-category="Cat1, Cat2"



		$(".content").find("div[data-category*=" + value + "]").each(function (i) {



			$(this).delay(200).slideDown("fast");



		});



	}



}







$('.money > div').click(function() {



    $('.money > input:eq('+$('.money > div').index(this)+')').focus();



});







$('.numberOnly').on('keydown', function(e) {







  if (this.selectionStart || this.selectionStart == 0) {



	// selectionStart won't work in IE < 9







	var key = e.which;



	var prevDefault = true;







	var thouSep = ",";  // your seperator for thousands



	var deciSep = ".";  // your seperator for decimals



	var deciNumber = 2; // how many numbers after the comma







	var thouReg = new RegExp(thouSep,"g");



	var deciReg = new RegExp(deciSep,"g");







	function spaceCaretPos(val, cPos) {



		/// get the right caret position without the spaces







		if (cPos > 0 && val.substring((cPos-1),cPos) == thouSep)



		  cPos = cPos-1;







		if (val.substring(0,cPos).indexOf(thouSep) >= 0) {



		  cPos = cPos - val.substring(0,cPos).match(thouReg).length;



		}







		return cPos;



	}







	function spaceFormat(val, pos) {



		/// add spaces for thousands







		if (val.indexOf(deciSep) >= 0) {



			var comPos = val.indexOf(deciSep);



			var int = val.substring(0,comPos);



			var dec = val.substring(comPos);



		} else{



			var int = val;



			var dec = "";



		}



		var ret = [val, pos];







		if (int.length > 3) {







			var newInt = "";



			var spaceIndex = int.length;







			while (spaceIndex > 3) {



				spaceIndex = spaceIndex - 3;



				newInt = thouSep+int.substring(spaceIndex,spaceIndex+3)+newInt;



				if (pos > spaceIndex) pos++;



			}



			ret = [int.substring(0,spaceIndex) + newInt + dec, pos];



		}



		return ret;



	}







	$(this).on('keyup', function(ev) {







		if (ev.which == 8) {



			// reformat the thousands after backspace keyup







			var value = this.value;



			var caretPos = this.selectionStart;







			caretPos = spaceCaretPos(value, caretPos);



			value = value.replace(thouReg, '');







			var newValues = spaceFormat(value, caretPos);



			this.value = newValues[0];



			this.selectionStart = newValues[1];



			this.selectionEnd   = newValues[1];



		}



	});







	if ((e.ctrlKey && (key == 65 || key == 67 || key == 86 || key == 88 || key == 89 || key == 90)) ||



	   (e.shiftKey && key == 9)) // You don't want to disable your shortcuts!



		prevDefault = false;







	if ((key < 37 || key > 40) && key != 8 && key != 9 && prevDefault) {



		e.preventDefault();







		if (!e.altKey && !e.shiftKey && !e.ctrlKey) {







			var value = this.value;



			if ((key > 95 && key < 106)||(key > 47 && key < 58) ||



			  (deciNumber > 0 && (key == 110 || key == 188 || key == 190))) {







				var keys = { // reformat the keyCode



          48: 0, 49: 1, 50: 2, 51: 3,  52: 4,  53: 5,  54: 6,  55: 7,  56: 8,  57: 9,



          96: 0, 97: 1, 98: 2, 99: 3, 100: 4, 101: 5, 102: 6, 103: 7, 104: 8, 105: 9,



          110: deciSep, 188: deciSep, 190: deciSep



				};







				var caretPos = this.selectionStart;



				var caretEnd = this.selectionEnd;







				if (caretPos != caretEnd) // remove selected text



				value = value.substring(0,caretPos) + value.substring(caretEnd);







				caretPos = spaceCaretPos(value, caretPos);







				value = value.replace(thouReg, '');







				var before = value.substring(0,caretPos);



				var after = value.substring(caretPos);



				var newPos = caretPos+1;







				if (keys[key] == deciSep && value.indexOf(deciSep) >= 0) {



					if (before.indexOf(deciSep) >= 0) newPos--;



					before = before.replace(deciReg, '');



					after = after.replace(deciReg, '');



				}



				var newValue = before + keys[key] + after;







				if (newValue.substring(0,1) == deciSep) {



					newValue = "0"+newValue;



					newPos++;



				}







				while (newValue.length > 1 && newValue.substring(0,1) == "0" && newValue.substring(1,2) != deciSep) {



					newValue = newValue.substring(1);



					newPos--;



				}







				if (newValue.indexOf(deciSep) >= 0) {



					var newLength = newValue.indexOf(deciSep)+deciNumber+1;



					if (newValue.length > newLength) {



					  newValue = newValue.substring(0,newLength);



					}



				}







				newValues = spaceFormat(newValue, newPos);







				this.value = newValues[0];



				this.selectionStart = newValues[1];



				this.selectionEnd   = newValues[1];



			}



		}



	}







	$(this).on('blur', function(e) {







		if (deciNumber > 0) {



			var value = this.value;







			var noDec = "";



			for (var i = 0; i < deciNumber; i++) noDec += "0";







			if (value == "0" + deciSep + noDec) {



        this.value = ""; //<-- put your default value here



      } else if(value.length > 0) {



				if (value.indexOf(deciSep) >= 0) {



					var newLength = value.indexOf(deciSep) + deciNumber + 1;



					if (value.length < newLength) {



					  while (value.length < newLength) value = value + "0";



					  this.value = value.substring(0,newLength);



					}



				}



				else this.value = value + deciSep + noDec;



			}



		}



	});



  }



});







$('.price > input:eq(0)').focus();







$(document).ready(function(){



    $('[data-toggle="tooltip"]').tooltip();



});











 </script>



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



</body>



</html>

