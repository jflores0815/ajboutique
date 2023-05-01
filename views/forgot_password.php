<?php







  session_start();



	echo







	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");







	header("Cache-Control: post-check=0, pre-check=0", false);







	header("Pragma: no-cache");







	header('Content-Type: text/html'); 

 

 

  if(isset($_SESSION['user'])) :

      



  header("Location:forgot_password2.php");



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

  

  



</head>











<body class="bg-dark">



  <div class="container">



    <div class="card card-login mx-auto mt-5">



      <div class="card-header">A&J Boutique Client Forgot Password</div>



      <div class="card-body">



        <form method="POST" action="forgot_password.php">



          <div class="form-group">



            <label for="inputEmail">Enter Your Email</label>



            <input name="email" class="form-control" id="inputEmail" type="email" placeholder="Enter Email" required>



          </div>







          <button name="login" type="submit" class="btn btn-primary btn-block">Submit</button>

          <br/>

          <br/>

            <center>



							<a href="login.php"> Go Back?</a>

            </center>

        </form>



        <div class="text-center">



        </div>



      </div>



    </div>



  </div>



  



</body>







</html>







<?php



if (isset($_POST["login"])) {



       echo "<script type='text/javascript'>";



          echo "alert('Please Check your Email on how to retrive your password!');";



          echo "window.location='login.php'";



          echo "</script>";




      $host = "localhost";



      $user = "root";



      $password = "";



      $database = "u435243053_aj";



      



      



      $con = mysqli_connect($host,$user,$password, $database);



      mysqli_select_db($con, $database);



      



      



      if(!$con )



      {



        die('Could not connect: ' . mysqli_error($con));



      }







      require_once '../controller/forgot_db_functions.php';



      $db = new DB_Functions();



      



      // receiving the post params



      $email = $_POST['email'];





     



      // get the user by email and password



      $user = $db->getLoginDetails($email);







        



        if ($user != false) {



        



          $_SESSION["user"] = $email;



          ?>



          <script type="text/javascript">



            window.location.href = 'forgot_password2.php';



          </script>



          <?php







        } else if ($user == false) {



          



          echo "<script type='text/javascript'>";



          echo "alert('Invalid!');";



          echo "window.location='forgot_password.php'";



          echo "</script>";



          



        }



    }



?>