<?php

  
session_start();
echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');

include_once("../include/dbConnect.php");


if(!isset($_SESSION["admin"])) :

  header("Location:admin_login.php");

endif;

include_once("order_auto_cancellation.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Manage Clients</title>

  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- CSS Icons -->
  <link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">
  <link rel="stylesheet" type="text/css" href="../css/icons.css">

  <style type="text/css">

  .btn-add-new {

  background: #9adb8f;
  background-image: -webkit-linear-gradient(top, #9adb8f, #6ecf67);
  background-image: -moz-linear-gradient(top, #9adb8f, #6ecf67);
  background-image: -ms-linear-gradient(top, #9adb8f, #6ecf67);
  background-image: -o-linear-gradient(top, #9adb8f, #6ecf67);
  background-image: linear-gradient(to bottom, #9adb8f, #6ecf67);
  -webkit-border-radius: 7;
  -moz-border-radius: 7;
  border-radius: 7px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;

}

.btn-add-new:hover {

  background: #fff;
  text-decoration: none;

}



.btn-delete {

  background: #ee9d92;
  border-radius: 7px;
  font-family: Arial;
  color: #fff;
  font-size: 15px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
  cursor: pointer;
  cursor: hand;
  
}

.btn-delete:hover {
  background-color: #ee9d92;
  cursor: pointer;
  cursor: hand;

}



.btn-edit {

  background: #c6e2ed;
  border-radius: 7px;
  font-family: Arial;
  color: #fff;
  font-size: 15px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
  cursor: pointer;
  cursor: hand;

}



.btn-edit:hover {

  background-color: #c6e2ed;
  cursor: pointer;
  cursor: hand;

}

.btn-send {

  background: #c6e2ed;
  border-radius: 7px;
  font-family: Arial;
  color: #000;
  font-size: 15px;
  padding: 5px 10px 5px 10px;
  text-decoration: none;
  cursor: pointer;
  cursor: hand;

}


.btn-send:hover {

  background-color: #c6e2ed;
  cursor: pointer;
  cursor: hand;

}

  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="admin_clients.php">A &amp; J Online Boutique Admin Dashboard</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Manage Records</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="admin_clients.php">Clients</a>
            </li>
            <li>
              <a href="admin_products.php">Products</a>
            </li>

            <li>
              <a href="admin_reports.php">Reports</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrders" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Transactions</span>
          </a>

          <ul class="sidenav-second-level collapse" id="collapseOrders">
            <li>
              <a href="new_orders.php">New Orders</a>
            </li>

            <li>
              <a href="paid_orders.php">Paid Orders</a>
            </li>

            <li>
              <a href="shipped_orders.php">Shipped Orders</a>
            </li>

            <li>
              <a href="cancelled_orders.php">Cancelled Orders</a>
            </li>

            <li>
              <a href="reserved_orders.php">Reserved Orders</a>
            </li>

          </ul>

        </li>

      </ul>

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>

          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">

        </li><?php

          $numNewOrders = "SELECT * FROM transactions WHERE status = 0 order by date desc;";
          $resultNumNewOrders = mysqli_query($conn, $numNewOrders);
          $new_orders_count = mysqli_num_rows($resultNumNewOrders);

          if ($new_orders_count == 0) {

            ?>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Orders
                <span class="badge badge-pill badge-warning"><?php echo $new_orders_count . " New"; ?></span>
              </span>
              <span class="indicator text-warning d-none d-lg-block">
              </span>
            </a>

            <?php

          } 
            else {

            ?>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-fw fa-bell"></i>
                <span class="d-lg-none">Orders
                  <span class="badge badge-pill badge-warning"><?php echo $new_orders_count . " New"; ?></span>
                </span>
                <span class="indicator text-warning d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
              </a>

            <?php

          }

        ?>


          <div class="dropdown-menu" aria-labelledby="alertsDropdown" style="overflow-x:hidden;height:480px;width:500%;">
            <h6 class="dropdown-header">Transactions:</h6>
            <div class="dropdown-divider"></div>
        <?php include 'reserved_notification.php' ?>

            <!-- reservation -->
            <?php // include 'reserved_notification.php' ?>
            <?php
              // transactions 

              $fetchOrders = "SELECT * FROM transactions WHERE status = 0 order by date desc";
              $resultOrders = mysqli_query($conn, $fetchOrders);

              while ($row = mysqli_fetch_assoc($resultOrders)) {

                $transaction_no = $row["transaction_no"];
                $date = date("m/d/Y", strtotime($row["date"]));
                $client_id = $row["client_id"];
                $total = $row["total"];
                $status = $row["status"];
                $fetchClient = "SELECT * FROM clients WHERE id = '$client_id'";
                $resultClients = mysqli_query($conn, $fetchClient);
                $row = mysqli_fetch_assoc($resultClients);
                $last_name = $row["last_name"];
                $first_name = $row["first_name"];
                $nickname = $row["nickname"];

            ?>



                <a class="dropdown-item" href="#">
                  <span class="text-success">
                    <strong>
                      </i><?php echo $last_name . ", " . $first_name; ?></strong>
                  </span>
                  <span class="small float-right text-muted"><?php echo $date; ?></span>
                  <div class="dropdown-message small">A new order from <?php echo $nickname . "."; ?> Total amount: <?php echo "₱" . $total; ?></div>
                </a>
                <div class="dropdown-divider"></div>

                <?php

              }

            ?>

            <a class="dropdown-item small" href="new_orders.php">View all orders</a>
          </div>
        </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>

                </button>
              </span>
            </div>
          </form>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>

        </li>

      </ul>

    </div>

  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Breadcrumbs-->

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="admin_clients.php">Manage Records</a>
        </li>
        <li class="breadcrumb-item active">Clients</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Clients Information</h1>

          

          <?php



   if(isset($_POST["btn-del"])) { // ======================================= DELETE CLIENT =============================================

              $id = $_POST['delete_id'];
              $query = "DELETE FROM clients WHERE id = '$id'";

              if (mysqli_query($conn, $query)) {

                echo "<div class='alert alert-success alert-dismissable'>";
                echo "Client has been deleted";
                echo "</div>";
                unset($_POST);

              }

              }

?>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> List of Clients </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Client Details</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Client Details</th>
                      <th>Created At</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <?php

                      ob_start();
                      include('../client/read.php');
                      $result = ob_get_clean();
                      $id = isset($_POST['']) ? $_POST['id'] : '';
                      $name = isset($_POST['']) ? $_POST['name'] :'';
                      $nickname = isset($_POST['']) ?  $_POST['nickname'] :'';
                      $username = isset($_POST['']) ? $_POST['username'] :''; 
                      $email = isset($_POST['']) ? $_POST['email'] :''; 
                      $contact_number = isset($_POST['']) ? $_POST['contact_number'] :'';
                      $address = isset($_POST['']) ? $_POST['address'] :''; 
                      $birthday = isset($_POST['']) ? $_POST['birthday'] :''; 
                      $status = isset($_POST['']) ? $_POST['status'] :''; 
                      $json_array = json_decode($result, true);
                      foreach ($json_array['records'] as $key => $value) {

                       ?>

                      <td>

                        <strong>Client ID:</strong><?php $id = isset($_POST['']) ? $_POST['id'] : ''; ?><br/>
                        <strong>Name:</strong> <?php echo $value['name']; ?> <br/>
                        <strong>Nickname:</strong> <?php echo $value['nickname']; ?><br/>
                        <strong>Username:</strong> <?php echo $value['username']; ?><br/>
                        <strong>Email:</strong> <?php echo $value['email']; ?><br/>
                        <strong>Contact Number:</strong> <?php echo $value['contact_number']; ?><br/>
                        <strong>Address:</strong> <?php echo $value['address']; ?><br/>
                        <strong>Birthday:</strong> <?php echo $value['birthday']; ?><br/>
                        <strong>Status:</strong> <?php if($value['status'] == 1){echo "Member";} else if($value['status'] == 0){echo "New Member";}  ?>

                      </td>

                      <td>

                        <?php echo $value['created_at']; ?>

                      </td>

                      <td>

                         <button class="btn-send btn-block" data-toggle="modal" data-target="#sendMessageModal<?php echo $value['id']; ?>"><i class="fa fa-fw fa-envelope"></i>Send Message</button> 
                        <button class="btn-delete btn-block" data-toggle="modal" data-target="#deleteClientModal<?php echo $value['id']; ?>" ><i class="icon-trash"></i> Delete</button>

                      </td>

                    </tr>
                    
                    
                      <!-- Send Message Modal -->



                    <div class="modal fade" id="sendMessageModal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="sendMessageModal" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="sendMessageModal"><i class="fa fa-fw fa-envelope"> </i>Send Message</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                          <form method="POST" action="form_message.php" enctype="multipart/form-data">

                            <div class="form-group">

                              <label for="name">Client Name</label>

								<input type="HIDDEN"name="username"  value="<?php echo $value['username'];?>">
                              <input name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Client Name" value="<?php echo $value['name'];?>" required>


                            </div>


                             <div class="form-group">

                              <label for="message">Send Message to Client</label>

                              <input name="message" class="form-control" id="message" placeholder="Enter Message" value="" required>




                            </div>



                            

                            <button type="submit" name="submit" class="btn btn-primary btn-block">Send Message</button>

                          </form>

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                        

        <!-- DELETE CLIENT MODAL -->

        

         <div class="modal fade" id="deleteClientModal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteClientModalLabel" aria-hidden="true">



                      <div class="modal-dialog" role="document">



                        <div class="modal-content">



                          <div class="modal-header">



                            <h5 class="modal-title" id="deletePRoductModalLabel"><i class="icon-edit"> </i>Delete Client</h5>



                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                              <span aria-hidden="true">×</span>



                            </button>



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">



                            <input type="hidden" value="<?php echo $value['id']; ?>" name="delete_id">



                            <p>Do you want to delete this client? <br/> <strong> <?php echo $value["name"]; ?> </strong></p>



                            



                        </div>



                          <div class="modal-footer">



                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



                            <button class="btn btn-primary" type="submit" name="btn-del">Delete</button> 



                          </form>



                            



                          </div>



                        </div>



                      </div>



                    </div>

                    <?php 

                    }

                    ?>

                  </tbody>

                </table>

              </div>

            </div>







            </div>

          </div>

        </div>

    

        <!-- /.container-fluid-->

        <!-- /.content-wrapper-->

        <footer class="sticky-footer">

          <div class="container">

            <div class="text-center">

              <small>Copyright © A &amp; J Boutique 2017</small>

            </div>

          </div>

        </footer>

        <!-- Scroll to Top Button-->

        <a class="scroll-to-top rounded" href="#page-top">

          <i class="fa fa-angle-up"></i>

        </a>

        <!-- Logout Modal-->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">

            <div class="modal-content">

              <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                  <span aria-hidden="true">×</span>

                </button>

              </div>

            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

              <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <a class="btn btn-primary" href="logout_admin.php">Logout</a>

              </div>

            </div>

          </div>

        </div>

    <!-- Bootstrap core JavaScript-->

    <script src="../vendor/jquery/jquery.min.js"></script>

    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->

    <script src="../vendor/datatables/jquery.dataTables.js"></script>

    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="../js/sb-admin.min.js"></script>

    <!-- Custom scripts for this page-->

    <script src="../js/sb-admin-datatables.min.js"></script>



  </div>

</body>



</html>

