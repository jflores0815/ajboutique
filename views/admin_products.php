<?php







session_start();



echo



header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");



header("Cache-Control: post-check=0, pre-check=0", false);



header("Pragma: no-cache");



header('Content-Type: text/html');







include("../include/dbConnect.php");







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



  <title>Manage Products</title>



  <!-- Bootstrap core CSS-->



  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



  <!-- Custom fonts for this template-->



  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



  <!-- Page level plugin CSS-->



  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">



  <!-- Custom styles for this template-->



  <link href="../css/sb-admin.css" rel="stylesheet">



  <!-- CSS Icons -->

  <link rel="icon" type="image/png" sizes="96x96" href="../iconmoto.png">



  <link rel="stylesheet" type="text/css" href="../css/icons.css">



 



  <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>











  <style type="text/css">



    



  .btn-add-new {



  background: #ee9d92;



  border-radius: 7px;



  font-family: Arial;



  color: #ffffff;



  font-size: 12px;



  padding: 5px 10px 5px 10px;



  text-decoration: none;



  cursor: pointer;



  cursor: hand;



}







.btn-add-new:hover {



  background: #ee9d92;



  text-decoration: none;



}







.btn-delete {







  background: #ee9d92;



  border-radius: 7px;



  font-family: Arial;



  color: #fff;



  font-size: 12px;



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



  color: #000;



  font-size: 12px;



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







.btn-restock {





  background: #2b3245;



  border-radius: 7px;



  font-family: Arial;



  color: #fff;



  font-size: 12px;



  padding: 5px 10px 5px 10px;



  text-decoration: none;



  cursor: pointer;



  cursor: hand;







}







.btn-restock:hover {







  background-color: #2b3245;



  cursor: pointer;



  cursor: hand;







}







input[type=number]{



    width: 50px;



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



            <h6 class="dropdown-header">New Orders:</h6>



            <div class="dropdown-divider"></div>







  <?php include 'reserved_notification.php' ?>          <?php 







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



        <li class="breadcrumb-item active">Products</li>



      </ol>



      <div class="row">



        <div class="col-12">



          <h1>Products Information</h1>



          <?php







          if(isset($_POST["btn-update"])) { // ================== UPDATE PRODUCTS ======================







            $id = $_POST['id'];



            $name = mysqli_real_escape_string($conn, $_POST['name']);



            $price = $_POST['price'];



            $description = mysqli_real_escape_string($conn, $_POST['description']);



            $code = $_POST['code'];



            $weight = $_POST['weight'];



            $temp_name = $_FILES["file"]["tmp_name"];



            $file_name = $_FILES["file"]["name"];







            $path = $file_name;







            $actual_path = "../images/" . $path;







            if(move_uploaded_file($temp_name, "../images/" . $file_name)) {







              $query = "UPDATE products



                        SET 



                          name = '$name',



                          weight = '$weight',



                          price = '$price',



                          description = '$description',



                          image = '$actual_path',



                          code = '$code'



                        WHERE



                          id = '$id'";











              if (mysqli_query($conn, $query)) {



                echo "<div class='alert alert-success alert-dismissable'>";



                echo "Product was updated.";



                echo "</div>";



              } else {



                echo "<div class='alert alert-danger alert-dismissable'>";



                    echo "Unable to update product.";



                echo "</div>";







              }







            } else {







              $query = "UPDATE products



                        SET 



                          name = '$name',



                          weight = '$weight',



                          price = '$price',



                          description = '$description',



                          code = '$code'



                        WHERE



                          id = '$id'";











              if (mysqli_query($conn, $query)) {



                echo "<div class='alert alert-success alert-dismissable'>";



                echo "Product was updated.";



                echo "</div>";



              } else {



                      $error_no = mysqli_errno($conn);



                      



                      if ($error_no == 1062) {



                            



                            unset($_POST);



                            echo "<script type='text/javascript'>";



                            echo "  window.href.location='admin_products.php'";



                            echo "</script>";



                          



                      }



                  }















            }







            }



            



            /** ADD NEW PRODUCT **/







              if(isset($_POST["btn-new"])) {







                $name = mysqli_real_escape_string($conn, $_POST["product-name"]);



                $weight = mysqli_real_escape_string($conn, $_POST["product-weight"]);



                $description = mysqli_real_escape_string($conn, $_POST['product-description']);



                $price = $_POST["product-price"];



                $code = $_POST["product-code"];



                $category_id = $_POST["product-category"];



                $temp_name = $_FILES["product-image"]["tmp_name"];



                $file_name = $_FILES["product-image"]["name"];



                



                $path = $code . ".jpg";







                $actual_path = "../images/" . $path;







                if(move_uploaded_file($temp_name, '../images/'.$code.".jpg")) {







                  $query = "INSERT



                             INTO products (



                                            name, 



                                            weight,



                                            description, 



                                            price, 



                                            code,



                                            category_id,



                                            image



                                            )



                                    VALUES (



                                            '$name',



                                            '$weight',



                                            '$description',



                                            '$price',



                                            '$code',



                                            '$category_id',



                                            '$actual_path') ";











                  if (mysqli_query($conn, $query)) {



                    echo "<div class='alert alert-success alert-dismissable'>";



                    echo "Successfuly added new product.";



                    echo "</div>";



                    unset($_POST);



                  }



                  



                  else {



                      $error_no = mysqli_errno($conn);



                      



                      if ($error_no == 1062) {



                            



                            unset($_POST);



                            echo "<script type='text/javascript'>";



                            echo "  window.href.location='admin_products.php'";



                            echo "</script>";



                          



                      }



                  }



                }



              }







              if(isset($_POST["btn-del"])) { // ======================================= DELETE PRODUCT =============================================







              $id = $_POST['delete_id'];







              $query = "DELETE FROM products WHERE id = '$id'";











              if (mysqli_query($conn, $query)) {



                echo "<div class='alert alert-success alert-dismissable'>";



                echo "Product has been deleted";



                echo "</div>";



                unset($_POST);



              }



              }







              



              if(isset($_POST["btn-restock"])) {


                  $input_restock_num = $_POST['input-restock-num'];
                  $id = $_POST['product-id-restock'];
                  $query = "UPDATE products SET  stock = stock+$input_restock_num   WHERE   id = '$id'";

                  if (mysqli_query($conn, $query)) {



                        echo "<div class='alert alert-success alert-dismissable'>";

                        echo "Product has been restocked";



                        echo "</div>";



                        unset($_POST);



                      



                  }



              }







        ?>



          <div class="card mb-3">



            <div class="card-header">



              <i class="fa fa-table"></i> List of Products 



              <button class="btn-add-new" data-toggle="modal" data-target="#addNewProductModal">Add New Product</button> 



            </div>



            <div class="card-body">



              <div class="table-responsive">











                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">



                  <thead>



                    <tr>



                      <th>Name</th>



                      <th>Description</th>



                      <th>Price</th>



                      <th>Product Image</th>



                      <th>Product Code</th>



                      <th>Stocks</th>



                      <th>Actions</th>



                    </tr>



                  </thead>



                  <tfoot>



                    <tr>



                      <th>Name</th>



                      <th>Description</th>



                      <th>Price</th>



                      <th>Product Image</th>



                      <th>Product Code</th>



                      <th>Stocks</th>



                      <th>Actions</th>



                    </tr>



                  </tfoot>



                  <tbody id="product-data">



                    <tr>



                      <?php



                      ob_start();







                      include('../product/read.php');







                      $result = ob_get_clean();







                      $json_array = json_decode($result, true);



                      foreach ($json_array['records'] as $key => $value) {



                        



                       ?>



                      <td><?php echo $value['name'] . "(" . $value['weight'] . "g)"; ?></td>



                      <td><?php echo $value['description']; ?></td>



                      <td><?php echo "PHP " . $value['price']; ?></td>



                      <td><img src="<?php echo $value['image']; ?>" width="100" height="100"></td>



                      <td><?php echo $value['code']; ?></td>



                      <td><?php echo $value['stock']; ?></td>



                      <td>



                        <button type="button" class="btn-edit btn-block" data-toggle="modal" data-target="#editProductModal<?php echo $value['id']; ?>"><i class="icon-edit"></i> Edit</button>



                        <button type="button" data-toggle="modal" data-target="#deleteProductModal<?php echo $value['id']; ?>" class="btn-delete btn-block" ><i class="icon-trash"></i> Delete</button>



                        <button type="button" data-toggle="modal" data-target="#restockProductModal<?php echo $value['id']; ?>" class="btn-restock btn-block" ><i class="icon-plus-sign"></i> Restock</button>



                      </td>



                    </tr>







                     <!-- Edit Product Modal -->







                    <div class="modal fade" id="editProductModal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">



                      <div class="modal-dialog" role="document">



                        <div class="modal-content">



                          <div class="modal-header">



                            <h5 class="modal-title" id="editProductModalLabel"><i class="icon-edit"> </i>Edit Product</h5>



                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                              <span aria-hidden="true">×</span>



                            </button>



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">



                            <div class="form-group">



                              <label for="name">Product name</label>



                              <input name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter product name" value="<?php echo $value['name'];?>" required>



                            </div>



                            <div class="form-group">



                              <label for="weight">Product weight</label>



                              <input name="weight" class="form-control" id="weight" aria-describedby="emailHelp" placeholder="Enter product name (in grams)" value="<?php echo $value['weight'];?>" required>



                            </div>



                            <div class="form-group">



                              <label for="description">Description</label>



                              <textarea name="description" maxlength="255" style="resize: none; width: 100%; height: 100px;" class="form-control" id="description" type="text" placeholder="Description" required><?php echo $value['description']; ?></textarea> 



                            </div>



                            <div class="form-group">



                              <label for="price">Product Price</label>



                              <input name="price" class="form-control" id="price" placeholder="Enter product price" value="<?php echo $value['price'];?>" required>



                            </div>



                            <div class="form-group">



                              <label for="code">Product Code</label>



                              <input name="code" class="form-control" id="code" placeholder="Enter product code" value="<?php echo $value['code']; ?>" required>



                            </div>



                            <input name="id" type="hidden" value="<?php echo $value['id'];?>">



                            <div class="form-group">



                              <img src="<?php echo $value['image']; ?>" width="100" height="100"> <br/>



                              <label for="image">Product Image</label>



                              <input type="file" name="file" accept=".jpg, .jpeg" value="<?php echo $value['image']; ?>" placeholder="Upload Product Image">



                            </div>



                            <button type="submit" name="btn-update" class="btn btn-primary btn-block">Update</button>



                          </form>



                        </div>



                          <div class="modal-footer">



                          </div>



                        </div>



                      </div>



                    </div>



                    <!-- DELETE PRODUCT MODAL -->



                    <div class="modal fade" id="deleteProductModal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="deletePRoductModalLabel" aria-hidden="true">



                      <div class="modal-dialog" role="document">



                        <div class="modal-content">



                          <div class="modal-header">



                            <h5 class="modal-title" id="deletePRoductModalLabel"><i class="icon-edit"> </i>Delete Product</h5>



                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                              <span aria-hidden="true">×</span>



                            </button>



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">



                            <input type="hidden" value="<?php echo $value['id']; ?>" name="delete_id">



                            <p>Do you want to delete this product? <br/> <strong> <?php echo $value["name"]; ?></strong></p>



                            



                        </div>



                          <div class="modal-footer">



                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



                            <button class="btn btn-primary" type="submit" name="btn-del">Delete</button> 



                          </form>



                            



                          </div>



                        </div>



                      </div>



                    </div>



                    



                    <!-- RESTOCK PRODUCT MODAL -->



                    <div class="modal fade" id="restockProductModal<?php echo $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="restockProductModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="restockProductModalLabel"><i class="icon-plus-sign"> </i>Restock Product</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                              <span aria-hidden="true">×</span>



                            </button>



                          </div>



                        <div class="modal-body">



                          <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">



                            <label for="input-restock-num">Enter Quantity:</label>



                            <input type="number" step="1" min="0" value="0" name="input-restock-num">



                            <input type="hidden" value="<?php echo $value['id']; ?>" name="product-id-restock">



                        </div>



                          <div class="modal-footer">



                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>



                            <button class="btn btn-primary" type="submit" id="btn-restock" name="btn-restock">Done</button> 



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







        <!-- Add New Product Modal -->







        <div class="modal fade" id="addNewProductModal"  tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">



          <div class="modal-dialog" role="document">



            <div class="modal-content">



              <div class="modal-header">



                <h5 class="modal-title" id="addNewModalLabel">Add New Product</h5>



                <button class="close" type="button" data-dismiss="modal" aria-label="Close">



                  <span aria-hidden="true">×</span>



                </button>



              </div>



            <div class="modal-body">



              



              <form name="addNewProductForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" >



                <div class="form-group">



                  <label>



                    <select name="product-category" id="sort-products" required>



                      <?php







                        ob_start(); // begin collecting output







                        include('../category/read.php');







                        $result = ob_get_clean();







                        $json_array = json_decode($result, true);



                            foreach ($json_array['records'] as $key => $value) {



                            ?>



                            <option value="<?php echo $value['category_id']; ?>"> <?php echo $value["description"]; ?></option>



                            <?php



                              }



                            ?>



                    </select>



                  </label>



                </div>



                <div class="form-group">



                  <label for="inputProductName">Product name</label>



                  <input name="product-name" class="form-control" id="inputProductName" aria-describedby="emailHelp" placeholder="Enter product name" required>



                </div>



                <div class="form-group">



                  <label for="inputProductWeight">Product weight</label>



                  <input name="product-weight" class="form-control" id="inputProductWeight" aria-describedby="emailHelp" placeholder="Enter product weight (in grams)" required>



                </div>



                <div class="form-group">



                  <label for="inputProductDescription">Description</label>



                  <textarea name="product-description" maxlength="255" class="form-control" style="resize: none; width: 100%; height: 100px;" placeholder="Description" required></textarea> 



                </div>



                <div class="form-group">



                  <label for="inputProductPrice">Product Price</label>



                  <input name="product-price" class="form-control" id="inputProductPrice" placeholder="Enter product price" required>



                </div>



                <div class="form-group">



                  <label for="inputProductCode">Product Code</label>



                  <input name="product-code" class="form-control" id="inputProductCode" placeholder="Enter product code" required>



                </div>



                <div class="form-group">



                  <label for="inputProductImage">Product Image</label>



                  <input name="product-image" accept=".jpg, .jpeg" type="file" id="inputProductImage" placeholder="Upload Product Image" required>



                </div>



                <button type="submit" name="btn-new" class="btn btn-primary btn-block">Done</button>



              </form>



            </div>



              <div class="modal-footer">



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



    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap-editable/js/bootstrap-editable.min.js"></script>



  </div>



</body>







</html>





