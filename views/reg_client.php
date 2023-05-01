<?php
	session_start();
	echo
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	header('Content-Type: text/html');
	if(isset($_SESSION['user'])) :
	header("Location:views/home.php");

	endif;

?>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<link rel="stylesheet" href="css/layout.css"><!-- Page layout style -->
	<link rel="stylesheet" href="css/cart.css"><!-- Cart system stylesheet -->
	<link rel="stylesheet" type="text/css" href="css/slider.css"/>
	<link rel="stylesheet" href="./css/icons.css"/> <!-- Icons CSS -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>A&J Online Shop</title>
</head>
<!-- MODALS ================================= -->

<!-- ======================================== -->
<body style="background-image: url('images/bg/1.png');">
	<header style="background-color: #726263">
		<div id="logo"><img src="images/new_logo4.jpg" width="300px;" alt="Homepage"></div>

		<div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
	</header>

	<nav id="main-nav">
		<ul>
			<li><a class="current" href="./index.php">Home</a></li>
			<li><a href="./about.php">About</a></li>
			<li><a href="./views/faqs_index.php">FAQs</a></li>
			<li><a href="./views/login.php">Login</a></li>
			<li><a href="#0">Contact</a></li>
		</ul>
	</nav>

	<div class="undermenuarea">
		<div class="boxedshadow">
	</div>


<div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Last Name</label> <div class="col-sm-6"> <input type="text" class="form-control" name="laststname" id="lastname" placeholder="Lasttname" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Username</label> <div class="col-sm-6"> <input type="text" class="form-control" name="username" id="username" placeholder="Username" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> First Name</label> <div class="col-sm-6"> <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Password</label> <div class="col-sm-6"> <input type="text" class="form-control" name="password" id="password" placeholder="Password" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <!-- left code ends here --> <!-- start code on the right side of the page --> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Nickname</label> <div class="col-sm-6"> <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Nickname" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Date of Birth</label> <div class="col-sm-6 "> <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" placeholder= "Date of Birth" ondrop="return false;" onpaste="return false;" /></span> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Email</label> <div class="col-sm-6"> <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <div class="col-md-6"> <div class="form-group"> <label class="col-sm-3 control-label"><font color="red"><b>*</b></font> Date of Registered</label> <div class="col-sm-6"> <input type="date" class="form-control" name="dateofregistered" id="dateofregistered" placeholder="Date of Registered" onKeyPress="return ValidateAlpha(event);" onblur="toUpper(this.value, this.id);"/> </div> </div> </div> <center> <button type="submit">Register</button> <button type="button" class="cancelbtn">Cancel</button><br></center> <center> <div class="form-group clearfix"> <div class="bottom"> <span class="helper-text">Already have an account? <a href="http://ajboutique.store/views/login.php">Login</a></span></center> </div>
			  </div>
			</div>
		</div>
	</div>
</div><!-- end grid -->
<!-- UNDER SLIDER - BLACK AREA
================================================== -->
	<div class="undersliderblack">
		<div class="grid">
			<div class="row space-bot"></div>
		</div>
	</div>
	<div class="shadowunderslider">
	</div>

		<div class="row space-top">
			
		</div>
		</div>
	</main>

	</div>



<!-- FOOTER
================================================== -->
<div id="wrapfooter">
	<div class="grid">
		<div class="row" id="footer">
			<!-- to top button  -->
			<p class="back-top floatright">
				<a href="#top"><span></span></a>
			</p>
			<!-- 1st column -->
			<div class="c3">
				<img src="images/foot_logo.jpg" alt="" width="454" height="205" style="padding-top: 70px;">
			</div>
			<!-- 2nd column -->
			
			<!-- 3rd column -->
			<div class="c3">
				<h2 class="title"><i class="icon-envelope-alt"></i> Contact US</h2>
				<br/>
				<dl>
					<dt>For Details: Please call 09175063896 </dt>
					<dd><span>Email Us: airhajade@icloud.com</span></dd>
					
				</dl>


				<ul class="social-links" style="margin-top:15px;">
					
					</li>
					<li class="facebook-link smallrightmargin">
					<a href="https://web.facebook.com/AyasOfficialPage" class="facebook has-tip" target="_blank" title="Like Us on Facebook">Facebook</a>
					</li>
					
					<li class="pinterest-link smallrightmargin">
					<a href="https://www.instagram.com/airhadc" class="pinterest has-tip" title="Follow Us in Instagram" target="_blank">Instagram</a>
					</li>
				</ul>
			</div>
			<!-- 4th column -->
			<div class="c3">
				<h2 class="title"><i class="icon-link"></i> Links</h2><br/>
				<ul>
					<li>Home</li>
					<li>Products</li>
					<li>Gallery</li>
					<li>About</li>
					<li>FAQ's</li>
					
				</ul>
			</div>
			<!-- end 4th column -->
		</div>
	</div>
</div>
<!-- copyright area -->
<div class="copyright">
	<div class="grid">
		<div class="row">
			<div class="c6">A &amp; J Boutique &copy; 2017. All Rights Reserved.
			</div>
			<div class="c6"></div>
		</div>
	</div>
</div>

<!-- End Sliding Cart -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-12/jquery-2.0.3.min_1.js"></script>
<script src="js/main.js"></script> <!-- Gem jQuery -->
<!-- all -->
<script src="js/modernizr-latest.js"></script>

<!-- menu & scroll to top -->
<script src="js/common.js"></script>
	<!-- slider -->
<script src="js/jquery.cslider.js"></script>

<!-- cycle -->
<script src="js/jquery.cycle.js"></script>

<!-- carousel items -->
<script src="js/jquery.carouFredSel-6.0.3-packed.js"></script>

<!-- twitter -->
<script src="js/jquery.tweet.js"></script>

<!-- Call Showcase - change 4 from min:4 and max:4 to the number of items you want visible -->
<script type="text/javascript">
$(window).load(function(){			
			$('#recent-projects').carouFredSel({
				responsive: true,
				width: '100%',
				auto: true,
				circular	: true,
				infinite	: false,
				prev : {
					button		: "#car_prev",
					key			: "left",
						},
				next : {
					button		: "#car_next",
					key			: "right",
							},
				swipe: {
					onMouse: true,
					onTouch: true
					},
				scroll : 2000,
				items: {
					visible: {
						min: 4,
						max: 4
					}
				}
			});
		});	
</script>

<!-- Call opacity on hover images from carousel-->
<script type="text/javascript">
$(document).ready(function(){
    $("img.imgOpa").hover(function() {
      $(this).stop().animate({opacity: "0.6"}, 'slow');
    },
    function() {
      $(this).stop().animate({opacity: "1.0"}, 'slow');
    });
  });
</script>


</script>
</body>
</html>