<?php



  session_start();

	echo



	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");



	header("Cache-Control: post-check=0, pre-check=0", false);



	header("Pragma: no-cache");



	header('Content-Type: text/html'); 
 
 
  if(isset($_SESSION['user'])) :
      

 // header("Location:forgot_password.php");

  endif;


?>



<!DOCTYPE html>

<html lang="en">




<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">

  <title>Client Page | Forgot Password</title>

  <!-- Bootstrap core CSS-->

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">

  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->

  <link href="../css/sb-admin.css" rel="stylesheet">
  
   <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  
   <script src="../js/passchecker.js"></script>
  
  

</head>





<body class="bg-dark">

  <div class="container">

    <div class="card card-login mx-auto mt-5">

      <div class="card-header">A&J Boutique Client Forgot Password</div>

      <div class="card-body">

        <form method="POST" action="forgot_password2.php">
            
         <a href=""> <?php echo "Email: ". $_SESSION["user"]; ?> </a>
         
        <div id="user"></div>
          <div class="form-group">


              <br/>

            <span>Enter New Password</span>

            <input name="pass" class="form-control"  id="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" placeholder="Enter New Password" required>

   
          
	 <td>
      <div id="ppbar" title="Strength"><div id="pbar"></div></div>
      <div id="ppbartxt"></div>
     </td>

			</br>



            <span>Confirm New Password</span>

            <input name="pass2" class="form-control"  id="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" type="password" placeholder="Enter New Password" required>

          <br/>



          <button name="submit" type="submit" class="btn btn-primary btn-block">Submit</button>
          <br/>
          <br/>

            <center>

							<a href="forgot_exit.php">Back?</a>
            </center>

        </form>

        <div class="text-center">

        </div>

      </div>

    </div>

  </div>
  
  
  <style>
  input{
   border:none;
   padding:8px;
  }
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

<?php




include_once("../include/dbConnect.php");


	if (isset($_POST["submit"])) {







		$email = $_SESSION["user"];
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];
		
       if (strlen($pass)<6)
		{
		    echo "<script ='text/javascript'>";
			echo "alert('Password must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters!');";
        	echo "window.location.href = 'forgot_password2.php';";
        	echo "</script/>";
		}

		 if ($pass!=$pass2) 
		{
		    echo "<script ='text/javascript'>";
			echo "alert('Password Does not Match!');";
        	echo "window.location.href = 'forgot_password2.php';";
        	echo "</script/>";
		}
	

//check new pass
		if ($pass==$pass2)
		{
		//success
		//change pass in db
		

	

	
		
				$newpassword = "UPDATE clients



							  SET



							  	password = '$pass'



							  WHERE



							  	email = '$email'";

				
		if (mysqli_query($conn, $newpassword)) {





			echo "<script type='text/javascript'>";



			echo "alert('Change Password Updated!');";



			echo "window.location='home.php'";



			echo "</script>";



		} else {
		    
		    echo "<script ='text/javascript'>";
			echo "alert('Password Does not Match!');";
        	echo "window.location.href = 'forgot_password2.php';";
        	echo "</script/>";
		}


		







	}


}




?>

  
  
  

</body>



</html>


