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
<title>A&J Boutique | About</title>
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
				<li><a href="faqs.php">FAQs</a></li>
				
					
				<li><a  href="shop.php">Products</a>
			
				</li>
				
				
					
				</li>
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
	<h6 class="dress"><a href="../index.php"></a> <i> </i> About </h6>
</div>


		<!---->
		<div class="container"> 
	  <div class="box_4">
	  	<div class="col-md-8 about_left">
	  		
	        <img src="../images/ajlogo.jpg" class="img-responsive" alt="">
	        <h1 style="font-family:Pristina;"></br>About Us!</h1>
		    <p>A & J is an internet based online boutique that sells a various kind of skin care product and dietary supplement. Owned by Mrs. Adelfa dela Cruz. She saw huge opportunity in online buy and sell so, She ventured to start her online boutique business. The boutique was established first quarter of 2017. She started it as one of her side lines to earn extra money. The business was booming and getting more clients, the owner decided to create a facebook page which currently have 1600+ followers and likers. All items are shipped directly from Thailand and singapore. The store got eventually known for its effective products, 100% authentic and safe to use. Though at very early stage of the business, it is already getting offers for investment and interested partners for reselling.
		    
		    </br>
		    </br>
		    <span>
		        
		    </span>
		    </p>	   
		    </div>  	
	  	</div>
	  	<div class="col-md-4 sidebar">
	  		      <h3>Testimonials</h3>
		  			    <div class="testimonials">
		  					 <h5>Poleng Tapic<span><a href="https://web.facebook.com/AyasOfficialPage/">https://web.facebook.com/AyasOfficialPage/</a></span></h5>
		  					 <p><span class="quotes"></span>Friendly and pretty owner, legit mag update (hindi ka paaasahin) and super duper effective yung product. 💯.<span class="quotes-down"></span></p>
		  				</div>	
		  				<div class="testimonials">
		  					 <h5>Erika Faye<span><a href="https://web.facebook.com/AyasOfficialPage/">https://web.facebook.com/AyasOfficialPage/</a></span></h5>
		  					 <p><span class="quotes"></span>Item shipped immediately, very accommodating and will order again!.<span class="quotes-down"></span></p>
		  				</div>
		  				<div class="testimonials">
		  					 <h5>Elvin Bical<span><a href="https://web.facebook.com/AyasOfficialPage/">https://web.facebook.com/AyasOfficialPage/</a></span></h5>
		  					 <p><span class="quotes"></span>Bongga and very nice ang owner.. Superb! 101% legit!!.<span class="quotes-down"></span></p>
		  				</div>
		  				<div class="testimonials">
		  					 <h5>Bea Bianca<span><a href="https://web.facebook.com/AyasOfficialPage/">https://web.facebook.com/AyasOfficialPage/</a></span></h5>
		  					 <p><span class="quotes"></span>Effective product. 👌.<span class="quotes-down"></span></p>
		  				</div></br>
		  			
	  	</div>
	  	<div class="clearfix"> </div>
	  </div>
  
          	</div>
      

		<div class="footer">
		<div class="container">
			<div class="col-md-4 footer-top">
				<h3>PAYMENT DETAILS</h3>

                	<ul class="social-footer ">						
						<li><span> <a href=""><img class="img-responsive ">Account Name: Airha Jade R. Dela Cruz</a></span></li>
						<li><span> <a href=""><img class="img-responsive ">BPI Savings Account- 0249131482</a></span></li>
						<li><span> <a href=""><img class="img-responsive ">BDO Savings Account- 002060648404</a></span></li>
					</ul>
                <a href=""><img " src="../images/pa2.png" alt=""></a>

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