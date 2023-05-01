<?php





	session_start();





	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");





	header("Cache-Control: post-check=0, pre-check=0", false);





	header("Pragma: no-cache");





	header('Content-Type: text/html');





	if(isset($_SESSION['user'])) :





	header("Location:home.php");











	endif;











?>





<html lang="en" class="no-js">





<head>





	<meta charset="UTF-8">





	<meta name="viewport" content="width=device-width, initial-scale=1">











	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css">





	<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">





	<link rel="stylesheet" href="../css/reset.css"> <!-- CSS reset -->





	<link rel="stylesheet" href="../css/style.css"> <!-- Gem style -->





	<link rel="stylesheet" href="../css/layout.css"><!-- Page layout style -->





	<link rel="stylesheet" href="../css/cart.css"><!-- Cart system stylesheet -->





	<link rel="stylesheet" href="../css/icons.css"/> <!-- Icons CSS -->





	<script src="../js/modernizr.js"></script> <!-- Modernizr -->





  	





	<title>A&J Boutique</title>





</head>





<!-- MODALS ================================= -->











<!-- ======================================== -->





<body style="background-image: url('../images/bg/1.png');">





	<header style="background-color: #726263">





		<div id="logo"><img src="../images/new_logo4.jpg" width="300px;" alt="Homepage"></div>











		<div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>





	</header>











	<nav id="main-nav">





		<ul>





			<li><a href="../index.php">Home</a></li>





			<li><a href="#0">About</a></li>





			<li><a href="faqs_index.php">FAQs</a></li>





			<li><a class="current" href="login.php">Login</a></li>





			<li><a href="#0">Contact</a></li>





		</ul>





	</nav>











	<main style="background-image: url('../images/bg/1.png');">





		<div class="grid" style="background-color: #eeeff7; height: 100%;">





			<div class="shadowundertop"></div>





				<div class="row">





					<div class="c4">





						<p>Sign up as member to shop online!</p>





						<form method="post" action="signup.php">











							<label><b>Last Name</b></label>





                                 <input type="text" placeholder="Enter Last name" name="Lastname" required>





    





                            <label><b>First Name</b></label>





                                 <input type="text" placeholder="Enter First name" name="firstname" required>





    





                             <label><b>Nickname</b></label>





                                 <input type="text" placeholder="Enter your nickname" name="nickname" required>





    





                             <label><b>Username</b></label>





                                 <input type="text" placeholder="Enter Username" name="username" required>











                             <label><b>Password</b></label>





                                  <input type="password" placeholder="Enter your Password" name="password" required>





                             <label><b>Repeat Password</b></label>





                                    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>





                                    <input type="checkbox" checked="checked"> Remember me





                             <label><b>E-mail</b></label>





                                 <input type="text" placeholder="Enter E-mail Address" name="email" required>





    





                             <label><b>Birthday</b></label>





                                 <input type="text" placeholder="Enter your Birthday" name="birthday" required>





    





                             <label><b>Date of registered</b></label>





                                 <input type="text" placeholder="Date Today" name="dateofreg" required>





    





                             <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>











                     <div class="clearfix">





                             <button type="button"  class="cancelbtn">Cancel</button>





                             <button type="submit" class="signupbtn">Sign Up</button>





                     





                     </div></form>





					</div>











					<div class="c5" style="margin-left: 10px;">





				





						<h1>WELCOME!</h1>











						<ul style="color: black; list-style-type: disc;">





							<li style="margin-top: 10px; margin-bottom: 10px;">





								Stay slim





							</li>











							<li style="margin-bottom: 10px;">





								Stay Healthy.





							</li>











							<li style="margin-bottom: 10px;">





								Stay Beautiful.





							</li>











							<li>





								A&j Boutique is here to make it happen!





							</li>





						</ul>





					</div>





				</div>





			</div><!-- end grid -->





		</main>











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





				<img src="../images/foot_logo.jpg" alt="" width="454" height="205" style="padding-top: 70px;">





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





<script src="../js/main.js"></script> <!-- Gem jQuery -->





<!-- all -->





<script src="../js/modernizr-latest.js"></script>











<!-- menu & scroll to top -->





<script src="../js/common.js"></script>











<!-- cycle -->





<script src="../js/jquery.cycle.js"></script>











<!-- twitter -->





<script src="../js/jquery.tweet.js"></script>





<!-- CALL toggle faqs -->





<script type="text/javascript"> 





  $(document).ready(function () 





  





  {





	   // ---- FAQs ---------------------------------------------------------------------------------------------------------------





		$('.faqs dd').hide(); // Hide all DDs inside .faqs





		$('.faqs dt').hover(function(){$(this).addClass('hover')},function(){$(this).removeClass('hover')}).click(function(){ // Add class "hover" on dt when hover





		$(this).next().slideToggle('normal'); // Toggle dd when the respective dt is clicked





		}); 





});





</script>











<?php

if (isset($_POST['sign'])) {





			





	$host = "localhost";





	$user = "u435243053_aj";





	$password = "guren11";





	$database = "u435243053_aj";





	





	





	$con = mysqli_connect($host,$user,$password,$database);





	mysqli_select_db($con, $database);





	





	





	if(!$con )





	{





	  die('Could not connect: ' . mysqli_error($con));





	}





	else





	{ 





	echo ('Successfully connected to your database'); 





		





	}











	require_once '../controller/db_functions.php';





	$db = new DB_Functions();





	





	// receiving the post params





	





	function NewUser()





	{





	$last_name = $_POST['Lastname'];





	$first_name = $_POST['firstname'];





	$nickname = $_POST['nickname'];





	$username = $_POST['username'];





	$password = $_POST['password'];





	$email = $_POST['email'];





	$birthday = $_POST['birthday'];





	$address = $_POST ['address'];





	$dateofregistration = $_POST ['dateofreg'];





	$query = "INSERT INTO websiteusers (Lastname,firstname,nickname,username,password,email,birthday,address,dateofreg) VALUES ('$last_name','$first_name','$nickname','$username','$password','$email','$birthday','$birthday','$address','$dateofregistration')"; 





		$data = mysql_query ($query)or die(mysql_error()); 





		if($data) 





		{ echo "YOUR REGISTRATION IS COMPLETED..."; } 





	}





	





	function SignUp() { if(!empty($_POST['user']))





	





	//checking the 'user' name which is from signup.php, is it empty or have some text





	





	{ $query = mysql_query





	





	("SELECT * FROM websiteusers 





	WHERE username = '$_POST [username]' AND password = '$_POST [password]'") 





		or die(mysql_error()); 





		if(!$row = mysql_fetch_array($query) 





		or die(mysql_error())) { newuser(); } 





		else { echo "SORRY...YOU ARE ALREADY REGISTERED USER..."; } } } 





		if(isset($_POST['submit'])) { SignUp(); } ?>











	





	{





			echo <script type='text/javascript'>;





			echo "alert('invalid input!');";





			echo "window.location='signup.php'";





			echo </script>;





			





		}





}



?>





</body>





</html>