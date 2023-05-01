<?php



session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
date_default_timezone_set('Asia/Manila');
require_once("../config/dbcontroller.php");
include_once("../include/dbConnect.php");

if(!isset($_SESSION["user_id"])) :
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
								echo "alert('Item has been added!');";
								echo "window.location='shop.php'";
								echo "</script>";
							}

					}

				} 
				  else {

					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					echo "<script type='text/javascript'>";
					echo "alert('Item has been added!');";
					echo "window.location='shop.php'";
					echo "</script>";

				}

			} 
			  else {

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



<!DOCTYPE html>



<html lang="en" class="no-js">



<head>



<title>A&J Boutique | Home </title>



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



<!--//slider-script-->







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



<!--header-->	



<div class="header">



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
?> </a></li>

						<li><a href="logout.php" title="Logout"><i class="tele"></i>Logout</a></li>		



				</ul>





				<div class="clearfix"> </div>



			</div>



			</div>



			<div class="header-bottom">



			<div class="container">			



				<div class="logo">



					<h1><a href="home.php">A&J Boutique</a></h1>



				</div>



				<div class="top-nav">



				<!-- start header menu -->



		<ul class="megamenu skyblue">



			



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







<div class="clearfix"> </div>



					<!---->



				</div>



				



			</div>



			<div class="clearfix"> </div>



		</div>



		</div>















</div>



<!---->



<div class="content">



	<div class="container">



	<div class="content-top">



				<div class="col-md-9">



				<div class="col-top">



					<div class="col-md-6 black-in">



						<a href="shop.php"><div class="shoe" >



							<h3>For HIM</h3>



						</div>



						<img src="../images/him.png" alt="" ></a>



					</div>



					<div class="col-md-6 black-in">



						<a href="shop.php"><div class="shoe bag" >



							<h3>For HER</h3>



						</div>



						<img src="../images/her.png" alt="" ></a>



					</div>



					<div class="clearfix"> </div>



				</div>



				<div class="col-top-bottom">



					<h3 class="menber">For your SKIN</h3>



					<a href="shop.php" class="now-in">SHOP NOW</a>



					<div class="clearfix"> </div>



				</div>



			</div>



			<div class="col-md-3 per">



				<a href="shop.php"><img class="img-responsive" src="../images/sexy.jpg" alt="" >



				<div class="six">



					<h4>Become</h4>



					<p>100%</p>



					<span>SEXY!</span>



				</div></a>



			</div>



			<div class="clearfix"> </div>



		</div>



		<!---->



		<div class="sap_tabs">



			<label class="line"> </label>



			<h2>FEATURED ITEMS</h2>	



						 <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">





							<!-- navigation for featured product -->

							<?php

								$category = $conn->query("SELECT * FROM `categories`");



								$inc = 0;



								echo '<ul class="resp-tabs-list" style="width:100%;">';



								while ( $catRow = mysqli_fetch_assoc($category) )

								{

									echo  '<li style="width:23%;" class="resp-tab-item" data-id="'.$catRow['name'].'" aria-controls="tab_item-'.$inc++.'" role="tab"><span>'.$catRow['name'].'</span></li>' ;

								}





								//jasper

								echo '<div class="clearfix"></div> </ul>';

							?>

							<!-- end of navigation for featured product -->



					<div class="resp-tabs-container">



							<?php

								$cat_count = $conn->query("SELECT * FROM `categories`");



								$inc1 = 0;



								while ($cat_count_row = mysqli_fetch_assoc($cat_count))

								{

							?>

								<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-<?php echo $inc1; ?>">



									<div class="tab_img" data-append="tab_item-<?php echo $inc1; ?>">



									</div>



								</div>



							<?php

								}

							?>



          </div>







				</div>



         </div>



		<!---->



	</div>



	<!---->

	<br>



		<div class="content-bottom">



			<div class="container">



				<p>“Self-care is never a selfish act—it is simply good stewardship of the only gift I have, the gift I was put on earth to offer to others.”</p>



<label class="line1"> </label>



<span>Parker Palme</span>



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



</body>







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





</html>

