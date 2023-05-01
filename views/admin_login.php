<?php







  session_start();



 



  



  if(isset($_SESSION['admin'])) :



  header("Location:admin_clients.php");







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



  <title>Admin Page | Login</title>



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



      <div class="card-header">A&J Boutique Admin Login</div>



      <div class="card-body">



        <form method="POST" action="admin_login.php">



          <div class="form-group">



            <label for="inputUsername">Username</label>



            <input name="username" class="form-control" id="inputUsername" type="text" placeholder="Enter username">



          </div>



          <div class="form-group">



            <label for="exampleInputPassword1">Password</label>



            <input name="password" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">



          </div>



          <div class="form-group">



            <div class="form-check">



              <label class="form-check-label">



                <input class="form-check-input" type="checkbox"> Remember Password</label>



            </div>



          </div>



          <button name="login" type="submit" class="btn btn-primary btn-block" href="index.html">Login</button>

          <br/>

          <br/>

            <center>



							<a href="login.php"> Login as Member?</a>

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







      require_once '../controller/admin_db_functions.php';



      $db = new DB_Functions();



      



      // receiving the post params



      $username = $_POST['username'];



      $password_ = $_POST['password'];



     



      // get the user by email and password



      $user = $db->getAdminLoginDetails($username, $password_);







        



        if ($user != false) {



        



          $_SESSION["admin"] = $username;



          ?>



          <script type="text/javascript">



            window.location.href = 'admin_clients.php';



          </script>



          <?php







        } else if ($user == false) {



          



          echo "<script type='text/javascript'>";



          echo "alert('Username or password is wrong!');";



          echo "window.location='admin_login.php'";



          echo "</script>";



          



        }



    }



?>