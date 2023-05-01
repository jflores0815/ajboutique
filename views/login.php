<?php

	session_start();


	echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');
if(isset($_SESSION['user'])) :

header("Location:home.php");

	endif;



?>


<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

<title>A&J Boutique | Login</title>
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

<script src="../js/simpleCart.min.js"> </script>

</head>

<body>

<div class=" header-product">
	<div class="header-top com">
		<div class="container">
			<div class="header-top-in grid-1">
				<ul class="support">
					<li ><a href="mailto:ajboutiquestore@gmail.com" ><i > </i>ajboutiquestore@gmail.com</a></li>
				</ul>
				<ul class=" support-right">
					<li ><a class="current" href="login.php" ><i class="men"></i>Login</a></li>
					<li ><a href="../register.php" ><i class="tele"></i>Create an Account</a></li>
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

				<li><a  href="../index.php">Home</a></li>
				<li ><a  href="../about_index.php">About</a></li>
				<li><a  href="../faqs_index.php">FAQS</a></li>

		 </ul>

		 <!---->

					<!---->



				</div>

				<div class="clearfix"> </div>

			</div>

		</div>

		</div>


	</div>







<!---->



<div class="container">



	<h6 class="dress"><a href="../index.php"></a> <i> </i> Account </h6>



</div>



<div class="back">



	<h2>HAPPY SHOPPING!</h2>



</div>







			<div class="container">



			<div class="account_grid">



			   <div class=" login-right">



						<h3>Sign in as member to shop online!</h3>



						<p>If you have an account with us, please log in. </p>






<?php
include_once("../includes/config.php");
//load basic functions next so that everything after can use them
include_once("../includes/functions.php");
//later here where we are going to put our class session
include_once("../includes/session.php");
include_once("../includes/member.php");
include_once("../includes/pagination.php");
include_once("../includes/paginsubject.php");
include_once("../includes/roomtype.php");
include_once("../includes/user.php");
include_once("../includes/reserve.php");
//Load Core objects
include_once("includes/database.php");

	if(isset($_POST['login'])){
	$username = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($username == '' OR $pass == '') {

         	message("Invalid Username and Password!", "error");
         
    } else {
	$user = new User();
	$res = $user->user_login($username, $pass);
		if($res == true){
	
		
				echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert(' Your are Successfully Login.')
	window.location.href='home.php'
	</SCRIPT>");
		}else{

		echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.alert('Username or Password Not Registered! Contact Your administrator.')
	window.location.href='login.php'
	</SCRIPT>");

		}
	}

}
?>
<?php if(!isset($_SESSION['user'])){

			
					
							
							
							}else{ 
redirect(WEB_ROOT ."home.php");
							
			}
						?>

						<form  method="POST" action="login.php">

							<label>

								<span><b>Username</b></span>

							</label></br>

							<input style="padding:10px; width:100%;" type="username" placeholder="Enter your Username" name="log_email" required>

							<label>

								<span><b>Password</b></span>

							</label><br/>

							<input style="padding:10px; width:100%;" type="password" placeholder="Enter your Password" name="log_pword" required>

							<br/>
							<br/>

							<label><input type="checkbox" checked="checked">Remember me</label>
							<input name="login" type="submit" value="Login">

							<br/>

							<a class="forgot" href="forgot_password.php"> Forgot Your Password?</a>

							<br/>
							<br/>

						</form>
					</div>

					<div class=" login-left">

			  	 <h3>NEW CUSTOMERS</h3>
				 <p>By creating an account with our boutique, you will be able to move through the checkout process faster, store multiple orders, view and track your orders in your account and more.</p>
				 <a class="acount-btn" href="../register.php">Create an Account</a>

			  	 </div>

				</div>

			</div><!-- end grid -->







		</main>



		<div class="bottom-grid1">







					<div class="fit1">



						<h3></h3>



						<p></p>



					</div>



				</div>



<!---->



	<div class="footer">



		<div class="container">



			<div class="col-md-4 footer-top">



				<h3>PAYMENT DETAILS</h3>







                	<ul class="social-footer ">



						<li><span> <a href=""><img class="img-responsive ">Account Name: Airha Jade R. Dela Cruz</a></span></li>



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















	<!-- FOOTER







================================================== -->





















</body>







</html>

