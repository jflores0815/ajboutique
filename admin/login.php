	<?php
include'includes/initialize.php';

	if(isset($_POST['login'])){
	$username = $_POST['log_email'];
	$pass  = $_POST['log_pword'];
	
	 if ($username == '' OR $pass == '') {

         	message("Invalid Username and Password!", "error");
         
    } else {
	$guest = new Guest();
	$res = $guest->guest_login($username, $pass);
		if($res == true){
	
		
				echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location.href='index.php'
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
<?php if(!isset($_SESSION['admin_id'])){

			
					
							
							
							}else{ 
redirect(WEB_ROOT ."index.php");
							
			}
						?>


<!DOCTYPE html>
<html lang="en">
    
<head>
	<title>Admin | AJ Boutique </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox" style="margin-top:-60px;">            
            	<form  method="POST" action="">
				 <div class="control-group normal_text"> <h3 style="font-size: 60px;"><img src="../images/ajlogo.jpg" width="250px;"></a></h3>
                 <h2>Login</h2>
                 </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="log_email" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="log_pword" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right">
					<button type="submit" name="login" class="btn btn-primary">Login</button>
					
		</span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
