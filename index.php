<?php

	session_start();

	echo

	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

	header("Cache-Control: post-check=0, pre-check=0", false);

	header("Pragma: no-cache");

	header('Content-Type: text/html');

	if(isset($_SESSION['user'])) :

	header("Location:./views/home.php");



	endif;


	require_once("config/dbcontroller.php");



	include_once("include/dbConnect.php");
?>



<!DOCTYPE html>

<html lang="en" class="no-js">

<head>

<title>A&J Boutique | Home</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="js/jquery.min.js"></script>

<!-- Custom Theme files -->

<!--theme-style-->

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	

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

<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript" src="js/megamenu.js"></script>

<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<!--//slider-script-->

<link rel="icon" type="image/png" sizes="96x96" href="iconmoto.png">

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>

		    <script type="text/javascript">

			    $(document).ready(function () {

			        $('#horizontalTab').easyResponsiveTabs({

			            type: 'default', //Types: default, vertical, accordion           

			            width: 'auto', //auto or any width like 600px

			            fit: true   // 100% fit in a container

			        });

			    });

				

</script>	



<script src="js/simpleCart.min.js"> </script>



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

					<li ><a href="./views/login.php" ><i class="men"> </i>Login</a></li>

					<li ><a href="register.php" ><i class="tele"> </i>Create an Account</a></li>			

				</ul>

				<div class="clearfix"> </div>

			</div>

			</div>

			<div class="header-bottom">

			<div class="container">			

				<div class="logo">

					<h1><a href="index.php">A&J Boutique</a></h1>

				</div>

				<div class="top-nav">

				<!-- start header menu -->

		<ul class="megamenu skyblue">

				

				<li><a  href="index.php">Home</a></li>

				<li><a  href="./about_index.php">About</a></li>				

				<li><a  href="./faqs_index.php">FAQS</a></li>

				

		 </ul> 

		 <!---->

		



<div class="clearfix"> </div>

					<!---->

				</div>

				

			</div>

			<div class="clearfix"> </div>

		</div>

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

						<a href="./views/login.php"><div class="shoe" >

							<h3><tr>For HIM</tr></h3>

						</div>

						<img src="images/him.png" alt="" ></a>

					</div>

					<div class="col-md-6 black-in">

						<a href="./views/login.php"><div class="shoe bag" >

							<h3>For HER</h3>

						</div>

						<img src="images/her.png" alt="" ></a>

					</div>

					<div class="clearfix"> </div>

				</div>

				<div class="col-top-bottom">

					<h3 class="menber">For your SKIN</h3>

					<a href="./views/login.php" class="now-in">SHOP NOW</a>

					<div class="clearfix"> </div>

				</div>

			</div>

			<div class="col-md-3 per">

				<a href="./views/login.php"><img class="img-responsive" src="./images/sexy.jpg" alt="" >

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

								$inc1 = 1;

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
<br><br>
		<div class="content-bottom">

			<div class="container">

				<p>“Self-care is never a selfish act—it is simply good stewardship of the only gift I have, the gift I was put on earth to offer to others.”</p>

<label class="line1"> </label>

<span>Parker Palme</span>

			</div>

		</div>



<!-- Footer Section -->

		<div class="footer">

		<div class="container">

			<div class="col-md-4 footer-top">

				<h3>PAYMENT DETAILS</h3>



                	<ul class="social-footer ">						

						<li><span> <a href=""><img class="img-responsive ">Account Name: Adelfa Dela Cruz</a></span></li>

						<li><span> <a href=""><img class="img-responsive ">BPI Savings Account- 0249131482</a></span></li>

						<li><span> <a href=""><img class="img-responsive ">BDO Savings Account- 002060648404</a></span></li>

					</ul>

                <a href=""><img class="img-responsive" src="images/pa2.png" alt=""></a>



			</div>

  		<div class="col-md-4 footer-middle">

				<h3>MADE FOR YOU</h3>

							<div class="product-go">

							<div class="logo-bottom">

								<a href="#"><img src="images/lo.png" alt=""></a>

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



<!-- End of Footer Section-->

</body>

<script>
$(document).ready(function(){

	$('li[data-id]').click(function(){

		var cat_name =  $(this).data('id');
		var airal = $(this).attr('aria-controls');
		$('div[data-append]').html(" ");

		$.ajax({
			type: 'POST',
			url: './views/featured_index.php',
			data: { cat_name:cat_name },
			success: function (data) {

				$('div[data-append]').append(data);

			}
		});
	});

	var auto_load = $('li[data-id]').data('id');

	$.ajax({
		type: 'POST',
		url: './views/featured_index.php',
		data: { cat_name:auto_load },
		success: function (data) {

			$('div[data-append]').append(data);

		}
	});

	if (user != " ") {
		alert(user);
	}
	else {
		alert('pls login');
	}
});
</script>
</html>

