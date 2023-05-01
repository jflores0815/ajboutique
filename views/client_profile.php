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






include_once'../includes/config2.php';

$iddd= $_SESSION['username'];


$query12="SELECT count(message) as total from  tbl_notification where username = '$iddd' ";
$result12=mysql_query($query12)or die(mysql_error());
while ($row12=mysql_fetch_array($result12)){
$totalorder = $row12['total'];

}
if($totalorder > 0){

$query="DELETE FROM tbl_notification where username = '$iddd'";
$result=mysql_query($query)or die(mysql_error());
echo ("<SCRIPT LANGUAGE='JavaScript'>
  
  window.location.href='client_profile.php'
  </SCRIPT>");
}else{

}


?>





<!DOCTYPE html>

<html lang="en" class="no-js">



<head>

<title>A&J Boutique | Profile </title>

<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="../js/jquery.min.js"></script>
<script src="../js/functions.js"></script>


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

<!--//slider-script-->

<link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">

<script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>

		    <script type="text/javascript">

			    $(document).ready(function () {

			        $('#horizontalTab').easyResponsiveTabs({

			            type: 'default', //Types: default, vertical, accordion

			            width: 'auto', //auto or any width like 600px

			            fit: true   // 100% fit in a container

			        });

			    });



</script>



<script src="../js/simpleCart.min.js"> </script>



</head>





<body>
    
<style>




#chatbox-history {
  overflow: none;
  position: relative;
  width: 100%;
  height: 250px;

}
#messages {
  overflow-x: hidden;
  position: absolute;
  width: 100%;
  max-height: 250px;
}
#messages div {
 



}


</style>

<!--header-->


	<div class="header-top">

		<div class="container">

			<div class="header-top-in">

				

				<ul class="support">

					<li ><a href="mailto:ajboutiquestore@gmail.com" ><i > </i>ajboutiquestore@gmail.com</a></li>	

				

				</ul>
					<ul class=" support-right">

		        <li><a href="#"> <?php 
				include_once'../includes/config2.php';
				$user = $_SESSION['user_id'];
				$query1="SELECT * FROM clients WHERE id = '$user' ";
				$result2=mysql_query($query1)or die(mysql_error());
				while ($row=mysql_fetch_array($result2)){
					$username = $row['username'];
				}
				echo "Logged in as: ". $username; ?> </a></li>

						<li ><a href="client_profile.php" ><i class="men"> </i>My Profile</a></li>	
						<li ><a href="client_orders.php" ><i class="man"> </i>Transactions</a></li>

						<li><a  href="clients_notification.php" id="notif"><i class="man"> </i>Notifications 
							<?php

$id=$_SESSION["username"];
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





				<li><a  href="shop.php">Products</a></li>







		 </ul>

		 <!---->

		 <div class="search-in" >

			<div class="search" >

						<form action="search.html">

							<input type="text" value="Keywords" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Keywords';}" class="text">

							<input type="submit" value="SEARCH">

						</form>

							<div class="close-in"><img src="../images/close.png" alt="" /></div>

					</div>

						<div class="right"><button> </button></div>

				</div>

						<script type="text/javascript">

							$('.search').hide();

							$('button').click(function (){

							$('.search').show();

							$('.text').focus();

							}

							);

							$('.close-in').click(function(){

							$('.search').hide();

							});

						</script>



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

	<h6 class="dress"><a href="home.php"></a> <i> </i> My Profile </h6>

</div>

<div class="back">

	<h2>MY PROFILE</h2>

</div>





		<div class="product">

			<div class="container">

				<div class="col-md-3 product-price">
				<!---->

				<div class="product-bottom">
				</div>
				</div>
				<div class="main">

			<!-- MAIN CONTENT -->

			<div class="main-content">
				<div class="row" id="showalert">

				</div>
				<div class="container-fluid">
					<div class="panel panel-profile" style="min-height: 550px">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left" id="divprofile">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
										<img src="../images/defaultpic.jpg" class="img-circle" alt="Avatar">
								</div>

								<!-- END PROFILE HEADER -->

								<!-- PROFILE DETAIL -->

								<div class="profile-detail">

									<div class="profile-info">

										<h4 class="heading">Basic Info</h4>

										<ul class="list-unstyled list-justify">
											<br>
											<?php
												// connects to the database
												include_once'../includes/config3.php';
												$query = "SELECT * FROM clients WHERE username = '".$_SESSION['username']."'";
												if($result = $mysqli->query($query))
												{
													while($row = $result->fetch_assoc()){
														$idd = $row['id'];
													echo "
														<li><b>Last Name:</b> ". "<span>".$row['last_name']."</span></li>
														<li><b>First Name:</b> ". "<span>".$row['first_name']."</span></li>
														<li><b>Shipping Address:</b> ". "<span>".$row['address']."</span></li>
														
														<li><b>Shipping Region: </b> ". "<span>". $row['region']."</span></li>
														<li><b>Contact Number:</b> ". "<span>".$row['contact_number']."</span></li>
														
														";
													}
												$result->free();
											}else{
												echo "No results found";
											}
											?>
										</ul>
									</div>
									<div class="profile-info">
										<div class="text-center"><a href="#.php" class="acount-btn" id="editprofile">Edit Profile</a></div>
									</div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<div class="profile-left" id="updateprofile" style="display:none;">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
										<img src="../images/defaultpic.jpg" class="img-circle" alt="Avatar">
								</div>

								<!-- END PROFILE HEADER -->

								<!-- PROFILE DETAIL -->

								<div class="profile-detail">

									<div class="profile-info">

											<?php
												// connects to the database
												include_once'../includes/config3.php';
												$query = "SELECT * FROM clients WHERE username = '".$_SESSION['username']."'";
												if($result = $mysqli->query($query))
												{
													while($row = $result->fetch_assoc()){
														$lname=$row['last_name'];
													echo "
													<form method='POST' id='udDetails' action='../controller/functions.php'>
													<div class='row'>
														<div class='col-lg-6'>
															<h4 class='heading'>Update Basic Info</h4>
														</div>
														<div class='col-lg-6'>
															<button class='acount-btn' id='savedetails' type='submit' value=".$row['id'].">Save Changes</button>
														</div>
													</div>

													<ul class='list-unstyled list-justify'>
														<br>
														<li>
															<div class='row'>
																<div class='col-md-4'><b>Last Name:</b></div>
																<div class='col-md-8'>
																	<input type='text' class='form-control' value=".$row['last_name']." name='lname' required>
																</div>
															</div>
														</li>
														<li>
															<div class='row'>
																<div class='col-md-4'><b>First Name:</b></div>
																<div class='col-md-8'>
																	<input type='text' class='form-control' value=".$row['first_name']." name='fname' required>
																</div>
															</div>
														</li>
														
														<li>
															<div class='row'>
																<div class='col-md-4'><b>Shipping Address #1:</b></div>
																<div class='col-md-8'>
																	<textarea class='form-control' name='address' required>".$row['address']."</textarea>
																</div>
															</div>
														</li>
														
														<li>
															<div class='row'>
																<div class='col-md-4'><b>Shipping Region :</b></div>
																<div class='col-md-8'>
																	<input type='radio' value='Metro Manila' name='region' required> Metro Manila
																	<br/>
																	<input type='radio' value='Outside Metro Manila' name='region' required> Outside Metro Manila
																</div>
															</div>
														</li>
														<li>
															<div class='row'>
																<div class='col-md-4'><b>Contact #:</b></div>
																<div class='col-md-8'>
																	<input type='text' class='form-control' value=".$row['contact_number']." name='contact' required>
																</div>
															</div>
														</li>
													
														</form>
														";
													}
												$result->free();
											}else{
												echo "No results found";
											}
											?>
										</ul>

									</div>
								</div>

								<!-- END PROFILE DETAIL -->

							</div>
							<!-- END LEFT COLUMN -->

							<!-- RIGHT COLUMN -->

						<div class="profile-right">


								<!-- AWARDS -->

								<!-- END AWARDS -->

								<!-- TABBED CONTENT -->

								<div class="custom-tabs-line tabs-line-bottom left-aligned">
								    
							

									<ul class="nav" role="tablist">
									    
									    	    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">MESSAGES</a></li>

										
									</ul>

								</div>

								

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div id="chatbox-history">

  					<div class="table-responsive" id="messages">


													<?php

									
												// connects to the database
												
												
												
											include_once'../includes/config3.php';
												$query = "SELECT * FROM messages WHERE receiver = '".$_SESSION['user']."'  ORDER BY id ASC";
												if($result = $mysqli->query($query))
												    
												
												{
													while($row = $result->fetch_assoc()){
														$sender=$row['sender'];
														if($sender == "ayadlc"){
													echo "	
												<p> <br/><span style='color:red;'>Admin</span> : ".$row['message']." <br/>
												".$row['time']."</p>
												";
														}else{
													echo "	
												<p '> <br/>me : ".$row['message']." <br/>
												".$row['time']."</p>
												";		
														}
														


													}
												$result->free();
											}else{
												echo "No results found";
											}

											?>




							</div>
						 </div>
<script type="text/javascript">
        $('#messages').scrollTop($('#messages')[0].scrollHeight);
    </script>		
    
    <div class="support-right">

			
		<form action='client_profile.php' method='POST'>
		<table>
			<tbody>

				</div>
				<br/>
				<tr>
					<td><textarea cols="78" rows="4" value="Type a message..." name="message" onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Type a message...';}">Type a message...</textarea>

				</tr>
				<tr>
					<td><input type='submit' class="btn btn-primary" value='Send Message to admin' name='submit' /></td>
				</tr>
			</tbody>
		</table>
		</form>


		<?php
	include_once'../includes/config3.php';
	if (isSet($_POST['submit'])) {
		if (isSet($_POST['message']) && $_POST['message'] != '') {
			$receiver = $_POST['receiver'];
			$message = $_POST['message'];
			$client_id = $idd;
			$time=date('G:i', strtotime($row["time"]));
			$q = mysqli_query($con, "INSERT INTO messages (client_id, sender, receiver, message, sendto_id) VALUES ('$_SESSION[user_id]','$_SESSION[user]', '$_SESSION[user]', '$message', '0')") or die(mysql_error());
	 		if ($q) { 

		    echo "<script ='text/javascript'>";
			echo "alert('Message Sent!');";
			echo "window.location.href = 'client_profile.php';";
			echo "</script/>";
			
					mysql_query("INSERT INTO tbl_countorder  VALUES ('', '$_SESSION[user]', 'message')") or die(mysql_error());

			}else
		    echo "<script ='text/javascript'>";
			echo "alert('Failed to Send Message!');";
        	echo "window.location.href = 'client_profile.php';";
        	echo "</script/>";
				http_redirect('client_profile.php', [], TRUE);
		}
	}
?>


								
								
								</div>

								

								<!-- END TABBED CONTENT -->

							</div>

							<!-- END RIGHT COLUMN -->

						</div>

					</div>

				</div>

			</div>

			<!-- END MAIN CONTENT -->

		</div>


					










						<!-- ====================== ORDERS MODAL ======================= -->







						<!-- View Order Details Modal -->







					    <div class="modal fade" id="view-orders-modal<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="view-orders-modal-label" aria-hidden="true" data-backdrop="false">



					      <div class="modal-dialog" role="document">



					        <div class="modal-content">



					          <div class="modal-header">



					            <h5 class="modal-title" id="view-orders-modal-label"><i class="icon-shopping-cart"> </i>Order Details</h5>



					          </div>



					        <div class="modal-body">











					          <div class="panel panel-primary">



					          	<div class="panel-heading">



					          		<i class="icon-shopping-cart"></i> Order Details



					          	</div>



						          	<div class="panel-body">



						          		<?php







								          	echo "Transaction no: " . $transaction_no;



								          	echo "<h6> Products Ordered </h6>";







								          	$fetchOrderDetails = "SELECT * FROM orders WHERE transaction_no = '$transaction_no'";



								          	$resultOrderDetails = mysqli_query($conn, $fetchOrderDetails);







								          	while($rowOrderDetails = mysqli_fetch_assoc($resultOrderDetails)){







								          		$client_id = $rowOrderDetails["client_id"];



									          	$product_id = $rowOrderDetails["product_id"];



									          	$order_date = $rowOrderDetails["order_date"];



									          	$quantity = $rowOrderDetails["quantity"];



									          	$status = $rowOrderDetails["status"];











									          	$fetchProductDetails = "SELECT * FROM products WHERE id = '$product_id'";



									          	$resultProductDetails = mysqli_query($conn, $fetchProductDetails);



									          	while ($rowProductDetails = mysqli_fetch_assoc($resultProductDetails)) {







									          		$product_name = $rowProductDetails["name"];



									          		$product_price = $rowProductDetails["price"];











									          		echo $quantity . "x " . $product_name . " @ PHP" . $product_price . "<br/>";







									          	}



								          	}







								          			echo "<br/><br/><p style='float: right;'> Total: PHP " . $total . "</p>";



								          ?>



						          	</div>



					          </div>



					        </div>



					          <div class="modal-footer">



				                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>



					          </div>



					        </div>



					      </div>



					    </div>







					    <!-- *END* View Order Details Modal -->







					    <!-- Cancel Order Modal -->







					    <div class="modal fade" id="cancelOrderModal<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="cancelOrderModalLabel" aria-hidden="true" data-backdrop="false">



	                      <div class="modal-dialog" role="document">



	                        <div class="modal-content">



	                          <div class="modal-header">



	                            <h5 class="modal-title" id="cancelOrderModalLabel"><i class="icon-edit"> </i>Delete Product</h5>



	                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">



	                              <span aria-hidden="true">×</span>



	                            </button>



	                          </div>



	                        <div class="modal-body">



	                          <div class="panel panel-primary">



					          	<div class="panel-heading">



					          		<i class="icon-trash"></i> Cancel Order



					          	</div>



						          	<div class="panel-body">



			                          Do you want to cancel this order?



			                          <br>



			                          Transaction No: <?php echo $transaction_no; ?>



			                         </div>



			                    </div>



	                        </div>



	                          <div class="modal-footer">







	                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">



	                            	<button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>



	                            	<input type="hidden" name="transaction_no" value="<?php echo $transaction_no; ?>">



	                            	<button style="background-color: #FF7171;" class="btn btn-primary" type="submit" name="btn-cancel">Yes</button>



	                            </form>



	                          </div>



	                        </div>



	                      </div>



	                    </div>







					    <!-- *END* Cancel Order Modal -->







					    <!-- Payment Modal -->







					    <div class="modal fade" id="paymentModal<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true" data-backdrop="false">



	                      <div class="modal-dialog" role="document">



	                        <div class="modal-content">



	                          <div class="modal-header">



	                            <h5 class="modal-title" id="paymentModalLabel"><i class="icon-edit"> </i>Payment Modal</h5>



	                          </div>



	                        <div class="modal-body">







	                          <h5><i class="icon-money"></i> Payment </h5>



	                          <p style="margin-left: 0px;" class="note">



	                          	Notes: <br/>



                          		 -Upload proof of payment (e.g. Deposit Slip) <br/>



                          		 -Enter the amount paid based from your proof of payment



	                          </p>







	                          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">



								<input type="hidden" name="transaction_no" value="<?php echo $transaction_no; ?>">



								<div class="well">



									<?php



										echo "Transaction No: " . $transaction_no . "<br/>";



										echo "Total Amount: " . $total . "<br/><br/><br/>";



									?>



									<div class="money">



									    <div>₱</div><input name="amount"  type="text" class="numberOnly" autocomplete="off" maxlength="50" value="<?php echo $total; ?>" min="<?php echo $total; ?>" max="<?php echo $total + 50; ?>" placeholder="Enter Amount" required/>



									</div>



									<br/><br/>



									<label for="image">Proof of Payment: </label><br/><br/>



									<input class="form-control" accept=".jpg, .jpeg, .png" type="file" name="image" required>



									<br/><br/><br/>



									<button class="btn btn-block btn-primary" type="submit" name="btn-payment">Proceed</button>



	                              </form>



								</div>







	                        </div>



	                          <div class="modal-footer">



                            	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



	                          </div>



	                        </div>



	                      </div>



	                    </div>







					    <!-- *END* Payment Modal -->















						<!-- ========================================= END ORDERS MODAL =================================== -->







<!--



	================================= PLACE ORDER =====================================



 -->



		<?php











    	if(isset($_POST["btn-place-order"])) {







		    $username = $_SESSION["username"];



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



		   			echo "alert('Payment has been made. Thank you!');";



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

</body>



</html>
