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
	<h2>REGISTER</h2>
</div>

<div class="container">
		<div class="register">
		 	<h3>Register as member to shop online!</h3>
				<p>By creating an account with our boutique, you will be able to move through the checkout process faster, store multiple orders, view and track your orders in your account and more. </p></br></br>
   	        	<h2>PERSONAL INFORMATION</h2>
		    	<form method="post" class="formsDiv">
				</br></br>
		
		
		
		

		
			
			</br>
			</br>
			<span><b>Last Name</b></span>
							</label>

							<input style="padding:10px; width:100%;" type="name" placeholder="Enter your Last Name" name="last_name" required>
			</br>
			</br>
				<span><b>First Name</b></span>
							</label>

							<input style="padding:10px; width:100%;" type="name" placeholder="Enter your First Name" name="first_name" required>


			</br>
			</br>
				<span><b>Email</b></span>
							</label>

							<input style="padding:10px; width:100%;" size="35" type="email" placeholder="Enter your Email" name="email" required>
				
			</br>
			</br>
				<span><b>Username</b></span>
							</label>

							<input style="padding:10px; width:100%;" size="35" id="user" type="username" placeholder="Enter your Username" name="username" required>
				
			</br>
			</br>
				<span><b>Password (format: Atleast one number and one upper and lowercase letter, and at least 6 or more characters)</b></span>

							</label>

							<input style="padding:10px; width:100%;" size="35" type="password" id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Enter your Password" name="password" required>

	<td>
      <div id="ppbar" title="Strength"><div id="pbar"></div></div>
      <div id="ppbartxt"></div>
     </td>

			</br>
			</br>
				<span><b>Re-type Password</b></span>

							</label>

							<input style="padding:10px; width:100%;" size="35" type="password" id="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" placeholder="Re-type Password" name="confirm_password" required>


			</br>
			</br>
				<span><b>Enter your Mobile Number (format: 11 digit number)</b></span>

							</label>

							<input style="padding:10px; width:100%;" pattern="^\d{11}" type="tel" placeholder="Enter your Mobile No." name="contact_number" required>


									


					<br/>
					<br/>
					<br/>
				<input type="submit" class="btn btn-primary" name="submit" value="Register">


			</form>

		
		
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
        
        
								 //CHECK EMAIL
								 $sql_email="SELECT * FROM clients WHERE email='$email'";
									$query_email=mysqli_query($conn,$sql_email);
								
								 if (mysqli_num_rows($query_email) >= 1) {
			      echo "<script> alert('Email already exist!'); window.location.href = 'register.php' </script>";
        	http_redirect('register.php', [], TRUE);
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
			
			//VERIFICATION CODE
			$verification_code = md5("$username$password");

		$query = "INSERT INTO clients(last_name, first_name, username, password, email, region, contact_number, account_status, verification_code) VALUES ('$last_name', '$first_name', '$username', '$password', '$email', '$region', '$contact_number','2','$verification_code');";
		
		
		
		if(mysqli_query($conn, $query)) {
			
			//EMAIL CONFIRMATION
			$to = "<$email>";
			$subject = "Confirm your registration";
			$message = "Hi, \n\nPlease click the following link to confirm your email address. \n\nhttp://ajboutique.16mb.com/views/verify_email.php?verification_code=$verification_code";
			$from = "<ajboutiquestore@gmail.com>";
			$headers = "From: $from";
			mail($to,$subject,$message,$headers);
			
			$_SESSION['SessionSuccessEmail']= "$email";
			
			echo "<script ='text/javascript'>";
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