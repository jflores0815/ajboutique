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

  <title>Paid Orders</title>

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


.btn-shipped { 
background: #c6e2ed;  
border-radius: 7px; 
font-family: Arial; 
color: #000;
font-size:15px;
padding: 5px 10px 5px 10px;
text-decoration: none;
cursor: pointer;  
cursor: hand;
}


.btn-shipped:hover { 
background-color: #c6e2ed;
cursor: pointer; 
cursor: hand;
} 

.btn-view {
background: #2b3245;
border-radius: 7px;  
font-family: Arial;  
color: #fff;
font-size:15px; 
padding: 5px 10px 5px 10px; 
text-decoration: none; 
cursor: pointer;
cursor: hand;
}


.btn-view:hover {  
background-color: #2b3245;  
cursor: pointer;
cursor: hand;
}

.btn-void {
background: #ee9d92;  
border-radius: 7px; 
font-family: Arial; 
color: #000;
font-size:15px;
padding: 5px 10px 5px 10px; 
text-decoration: none;
cursor: pointer;  
cursor: hand;
}

.btn-void:hover {
background-color: #ee9d92;
cursor: pointer;
cursor: hand;
}

    

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

  background: #b4faaa;

  text-decoration: none;

}



.btn-delete {



  background-color: #F55555;

  border: 1px solid #000;

  padding: 5px;



}



.btn-delete:hover {



  background-color: #F78080;

  cursor: pointer;

  cursor: hand;



}



.btn-edit {



  background-color: #F4ED77;

  border: 1px solid #000;

  padding: 5px;



}



.btn-edit:hover {



  background-color: #FBF596;

  cursor: pointer;

  cursor: hand;



}



.btn-ship {



  background-color: #6461E9;

  border: 1px solid #000;

  padding: 5px;



}



.btn-ship:hover {



  background-color: #8B89E9;

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

            <i class="fa fa-fw fa-table"></i>

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

        </li>
        
        <?php



          $numPaidOrders = "SELECT * FROM transactions WHERE status = 0 order by date desc;";

          $resultNumPaidOrders = mysqli_query($conn, $numPaidOrders);

          $new_orders_count = mysqli_num_rows($resultNumPaidOrders);



          if ($new_orders_count == 1) {



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

          } else {



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

            <?php 



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

            <a class="dropdown-item small" href="paid_orders.php">View all paid orders</a>

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

          <a href="admin_clients.php">Manage Orders</a>

        </li>

        <li class="breadcrumb-item active">Paid Orders</li>

      </ol>

      <div class="row">

        <div class="col-12">

          <h1>Paid Orders</h1>

            <div class="card mb-3">

            <div class="card-header">

              <i class="fa fa-table"></i> 

            </div>



            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered" id="dataTable tableData" width="100%" cellspacing="0">

                  <thead>

                    <tr>

                      <th>Order Details</th>

                      <th>Actions</th>

                    </tr>

                  </thead>

                  <tbody>

                    <tr>
                        

                      <?php

                        $resultTransactions = mysqli_query($conn, "SELECT a.first_name, a.last_name, b.transaction_no,                                         b.date, b.client_id, total 

                                                                    FROM transactions b, clients a 

                                                                    WHERE b.status = 2

                                                                    AND a.id = b.client_id

                                                                    ORDER BY b.date DESC");

                        while ($row = mysqli_fetch_assoc($resultTransactions)) {

                          $transaction_no = $row["transaction_no"];

                          $date = date("F d, Y h:i A", strtotime($row["date"]));

                          $client_id = $row["client_id"];

                          $total = number_format($row["total"], 2);

                          $client_last_name = $row["last_name"];

                          $client_first_name = $row["first_name"];

                          $client_name = $client_last_name . ", " . $client_first_name;



                       ?>

                        <td>

                          Client: <?php echo $client_name . "<br/>"; ?>

                          Order Date: <?php echo $date . "<br/>"; ?>

                          Total amount: <?php echo "₱" . $total . "<br/>"; ?>

                        </td>

                        <td style="width:30%;">

                          <button class="btn-shipped btn-block" data-toggle="modal" data-target="#shipOrder<?php echo $transaction_no; ?>"><i class="icon-plane"></i> Ship Order </button>

                          <button class=" btn-view btn-block" data-toggle="modal" data-target="#viewOrderedItems<?php echo $transaction_no; ?>"><i class="icon-info-sign"></i> View Items </button>

                          <button class="btn-void btn-block" data-toggle="modal" data-target="#voidOrderedItems<?php echo $transaction_no; ?>"><i class="icon-trash"></i> Void Order </button>

                        </td>

                    </tr>


                    <!-- Ship Order Modal -->

                    <div class="modal fade" id="shipOrder<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="shipOrderLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="shipOrderLabel"><i class="icon-edit"> </i>Ship Order</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>
                                   
                     

                        <div class="modal-body">
                            

                            <h6>Are you sure you want to ship this order?</h6>

                            <form method="post" action="order_methods/ship_order.php">
                                
                        
                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>
                                
                                <h6>Enter Tracking# and BC# from JRS</h6>
                        
                            <div class="row">
							<div class='col-md-4'>Tracking#:</div>									
							<div class='col-md-8'>
							<input type="tracking_no" class="form-control" value="" name="tracking_no" required>
							</div>
                            </div>
					
						    <div class="row">
							<div class='col-md-4'>BC#:</div>									
							<div class='col-md-8'>
							<input type="BC" class="form-control"  value="" name="BC" required>
							</div>
							</div>

                                <input type="submit" class="btn btn-primary" value="Ship" />

                            </form>

                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                    

                    <!-- Void Ordered Items Modal -->

                    <div class="modal fade" id="voidOrderedItems<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="voidOrderedItemsLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="voidOrderedItemsLabel"><i class="icon-edit"> </i>Void Order</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                            <h6>Are you sure you want to void this order?</h6>

                            <form method="post" action="order_methods/void_order.php"> 

                                <input type="hidden" name="id" value="<?php echo $transaction_no; ?>"/>

                                <input type="hidden" name="payment" value="true"/>

                                <input type="submit" class="btn btn-danger" value="Void" />

                            </form>

                            <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancel</button>

                        </div>

                          <div class="modal-footer">

                          </div>

                        </div>

                      </div>

                    </div>

                    

                    <!-- View Ordered Items Modal -->

                    <div class="modal fade" id="viewOrderedItems<?php echo $transaction_no; ?>" tabindex="-1" role="dialog" aria-labelledby="viewOrderedItemsLabel" aria-hidden="true">

                      <div class="modal-dialog" role="document">

                        <div class="modal-content">

                          <div class="modal-header">

                            <h5 class="modal-title" id="viewOrderedItemsLabel"><i class="icon-edit"> </i>Ordered Items</h5>

                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>

                            </button>

                          </div>

                        <div class="modal-body">

                          <?php

                            $fetchOrderedItems = "SELECT * FROM orders WHERE transaction_no = '$transaction_no'";

                            $resultOrderedItems = mysqli_query($conn, $fetchOrderedItems);



                            while ($rowOrderedItems = mysqli_fetch_assoc($resultOrderedItems)) {

                              $total_weight = (float) 0;

                              $product_id = $rowOrderedItems["product_id"];

                              $quantity = $rowOrderedItems["quantity"];

                              



                              $fetchProductDetails = "SELECT * FROM products WHERE id = '$product_id'";

                              $resultProductDetails = mysqli_query($conn, $fetchProductDetails);

                              while ($rowProducts = mysqli_fetch_assoc($resultProductDetails)) {

                                $product_name = $rowProducts["name"];

                                $product_price = $rowProducts["price"];

                                $product_weight = $rowProducts["weight"];



                                echo $quantity . " " . $product_name . "(" . $product_weight . "g) @" . $product_price . "<br/>";



                              }

                            }



                            echo "<br/>";

                            echo "Total Amount: ₱" . $total;

                          ?> 

                        </div>

                          <div class="modal-footer">

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

