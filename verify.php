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
	
if(isset($_SESSION['SessionSuccessEmail'])){}else{	header("Location: register.php");}
?>
<!DOCTYPE html>
<html>
<head>
<title>A & J Boutique | Register</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mihstore Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!-- start menu -->
<link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<!--//slider-script-->
<script src="js/simpleCart.min.js"> </script>

 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
 <script src="js/passchecker.js"></script>
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
					<li ><a class="current" href="./views/login.php" ><i class="men"></i>Login</a></li>
					<li ><a href="register.php" ><i class="tele"></i>Create an Account</a></li>			
				</ul>
				<div class="clearfix"> </div>
			</div>
		</div>
			<div class="header-bottom bottom-com">
			<div class="container">			
				<div class="logo">
					<h1><a href="index.php">A&J Boutique</a></h1>
				</div>
				<div class="top-nav">
				<!-- start header menu -->
		<ul class="megamenu skyblue menu-in">
				<li><a  href="index.php">Home</a></li>
				<li ><a  href="about_index.php">About</a></li>				
				<li><a  href="faqs_index.php">FAQS</a></li>
				
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
	<h6 class="dress"><a href="index.php">Home</a> <i> </i> Register </h6>
</div>

<div class="back">
	<h2>THANK YOU!</h2>
</div>

<div class="container">
		<div class="register">

				<p>Thank you for signing up.</p></br>
   	<p>We have sent you a confirmation email to <b><?php if(isset($_SESSION['SessionSuccessEmail'])){ echo $_SESSION['SessionSuccessEmail']; } ?></b>.</p></br>
				<p>Please click on the link to verify your email address.</p></br>
					
		   </div>
			</div>
	
 
			
		 <style>
 
  #ppbar{
   background:#CCC;
   width:300px;
   height:15px;
   margin:5px;
  }
  #pbar{
   margin:0px;
   width:0px;
   background:pink;
   height: 100%;
  }
  #ppbartxt{
   text-align:right;
   margin:2px;
  }
  </style>
	
 
			
			
			
			
			
			
			<!---->
					<div class="bottom-grid1">
					
					<div class="fit1">
						<h3> </h3>
					
					</div>
				</div>
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
                <a href=""><img class="img-responsive " src="images/pa2.png" alt=""></a>

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

<!---->
</body>
</html>

	
	</body>
	
</html>



<?php
	
	require_once('include/dbConnect.php');
	
	if(isset($_POST['submit'])) {
		

		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$nickname = $_POST['nickname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];		
		$email = $_POST['email'];
		$address = $_POST['address'];
		$region = $_POST['region'];
		$contact_number = $_POST['contact_number'];
		$birthday = $_POST['birthday'];
		
       
            $sql="select * from clients where (username='$username');";
            $res=mysqli_query($conn,$sql);
            
            if (mysqli_num_rows($res) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($username==$row['username'])
            {
            echo "<script ='text/javascript'>";
			echo "alert('Username already exist!');";
        	echo "window.location.href = 'register.php';";
        	echo "</script/>";
        	http_redirect('register.php', [], TRUE);
            }
     
        }
        
        
		
		       if (strlen($password)<6)
		{
		    echo "<script ='text/javascript'>";
			echo "alert('Password must be atleast 6 characters!');";
        	echo "window.location.href = 'register.php';";
        	echo "</script/>";
        	http_redirect('register.php', [], TRUE);
		}

		       if ($password != $confirm_password) 
		{
		    echo "<script ='text/javascript'>";
			echo "alert('Password Does not Match!');";
        	echo "window.location.href = 'register.php';";
        	echo "</script/>";
        	http_redirect('register.php', [], TRUE);
		}
		
		//check new pass
		if ($pass==$pass2)
		{
		//success
		//change pass in db
		

		$query = "INSERT INTO clients(last_name, first_name, username, password, region, contact_number) VALUES ('$last_name', '$first_name', '$username', '$password', '$region', '$contact_number');";
		
		if(mysqli_query($conn, $query)) {
			
			echo "<script ='text/javascript'>";
			echo "alert('Successfully Registered as Member!');";
			echo "window.location.href = 'verify.php';";
			echo "</script/>";
		}
		
		else if ($query != true){
		    
		    echo "<script ='text/javascript'>";
			echo "alert('Incorrect Input!');";
        	echo "window.location.href = 'register.php';";
        	echo "</script/>";
        	http_redirect('register.php', [], TRUE);
		}
	}
	
}

?>