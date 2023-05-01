<?php
    //connect to database
    require ('../include/dbConnect.php');
    session_start();
    $request = file_get_contents('php://input');
    if(isset($request)){
        $reqq = $_POST['req'];
        switch($reqq){
            case 'update':
                global $conn;
                $lname=$_POST['lname'];
                $fname=$_POST['fname'];
                

                $address=$_POST['address'];
   
                $region=$_POST['region'];
                $contact=$_POST['contact'];

                $query = "UPDATE clients SET last_name='$lname', first_name='$fname', address='$address', region='$region', contact_number='$contact' WHERE id=".$_POST['id']."";
                // mysqli_query($conn, "SET NAMES utf8");
                if( $q = $conn->query($query)){
                    echo 'success';
                }else{
                    echo mysqli_error($conn);
                }
                break;
            case 'ship':
                global $conn;
                // echo $request;
                $type;
                $total = $_POST['item_total'];
                $shiptype = $_POST['shipadd'];
                $user = $_SESSION['client']['id'];
                $total_product = 0;
                $order_total = (float) $_POST["item_total"];

                foreach ($_SESSION["cart_item"] as $item){
                    $total_product += (float) ($item["quantity"]);
                }
                //add address2
            
                
                if($shiptype=='newadd'){
                    $shipadd = $_POST['newaddress'];
                    $newAdd = "UPDATE clients SET address2='$shipadd' WHERE id='$user'";
                    mysqli_query($conn, $newAdd);
                    $type ='ship2';
                }else{
                    $type = $shiptype;
                }
                $query = "SELECT * FROM clients WHERE id= '$user'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
        
                    //for Metro Manila users
                    if($total_product >= 0 && $total_product <= 5){
                        $shipping_fee = (float) 100.00;
                        transact($shipping_fee, $order_total, $type);
                    }else if($total_product > 5 && $total_product <= 10){
                        $shipping_fee = (float) 120.00;
                        transact($shipping_fee, $order_total, $type);
                    }else if($total_product > 10 && $total_product <= 15){
                        $shipping_fee = (float) 150.00;
                        transact($shipping_fee, $order_total, $type);
                    }else if($total_product > 15 && $total_product <= 20){
                        $shipping_fee = (float) 00.00;
                        transact($shipping_fee, $order_total, $type);
                    
                }else{
                    
                }
                break;
            case 'mark':
                $id=$_SESSION['client']['id'];
                $query = "UPDATE reserved SET remarks='Read' WHERE client_id='$id'";
                if(mysqli_query($conn, $query)){
                    echo 'success';
                }else{
                    echo 'error';
                }

            break;
            default:
                echo 'error';
        }
    }
    function transact($amt, $total, $type){
        global $conn;
        $order_total = $total + $amt;
        $query_orders = "SELECT * FROM orders";
        $result = $conn->query($query_orders);
        $row_count = $result->num_rows;
        if ($row_count == null || $row_count == 0){
            $row_count = 1;
            order($row_count, $total, $amt, $type);
        }else{
            $row_count += 1;
            order($row_count, $total, $amt, $type);
        }
    }
    function order($row_count, $order_total, $shipfee, $address){
        global $conn;
        $user = $_SESSION['client']['id'];
        $transaction_id = "000" . $row_count;
            foreach ($_SESSION["cart_item"] as $item) {
                $product_code = $item["code"];
                $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
                $result = mysqli_query($conn, $query_product_id);
                $row = mysqli_fetch_assoc($result);
                $product_id = $row["id"];
                $today = date("Y-m-d H:i:s a");;
                $quantity = $item["quantity"];
                $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity, use_address)
                            VALUES ('$transaction_id', '$user', '$product_id', '$today', '$quantity', '$address')";
               
            }
            if (mysqli_query($conn, $insert)) {
                echo 'success';
                unset($_SESSION["cart_item"]);
            }else {
                $err_no = mysqli_errno($conn);
                $err_name = mysqli_error($conn);
                echo "<div class='alert alert-success alert-dismissable'>";
                echo $err_no . ": " . $err_name;
                echo "</div>";
            }
            $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, shipping_fee, status)
                                    VALUES ('$transaction_id', '$today', '$user', '$order_total','$shipfee', 0)";
            mysqli_query($conn, $insert_transaction);
    }
    // if(isset($_POST["btn-place-order"])) {
    //     $username = $_SESSION["user"];
    //     $order_total = (float) $_POST["item_total"];
    //     $total_weight = (float) 0.00;
    //     $query = "SELECT * FROM clients WHERE username = '$username' ";
    //     $result = mysqli_query($conn, $query);
    //     $row = mysqli_fetch_assoc($result);
    //     $client_id = $row["id"];
    //     $client_region = $row["region"];
    //     if ($client_region == 'Metro Manila') {
    //         //Shipping to Metro Manila, computation of shipping fee
    //         foreach ($_SESSION["cart_item"] as $item){
    //             $total_weight += $item["weight"];
    //         }
    //         if ($total_weight < 400 && $total_weight > 0) {
    //             //Express letter (Within 400g of items)
    //             $shipping_fee = (float) 99.00;
    //             $order_total = $order_total + $shipping_fee;
    //             $query_orders = "SELECT * FROM orders";
    //             $result = mysqli_query($conn, $query_orders);
    //             $row_count = $result->num_rows;
    //             if ($row_count == null || $row_count == 0) {
    //                 $row_count = 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             }else {
    //                 $row_count += 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         mysqli_query($conn, $insert_transaction);
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             } //*** nested
    //         }else if ($total_weight > 400 && $total_weight < 1500) { // One pounder
    //             $shipping_fee = (float) 120.00;
    //             $query_orders = "SELECT * FROM orders";
    //             $result = mysqli_query($conn, $query_orders);
    //             $row_count = $result->num_rows;
    //             $order_total = $order_total + $shipping_fee;
    //             if ($row_count == null || $row_count == 0) {
    //                 $row_count = 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             }else {
    //                 $row_count += 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         mysqli_query($conn, $insert_transaction);
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             } //*** nested
    //         }else if ($total_weight >= 1500 && $total_weight < 2500) {
    //             // 3 Pounder
    //             $shipping_fee = (float) 220.00;
    //             $query_orders = "SELECT * FROM orders";
    //             $result = mysqli_query($conn, $query_orders);
    //             $row_count = $result->num_rows;
    //             $order_total = $order_total + $shipping_fee;
    //             if ($row_count == null || $row_count == 0) {
    //                 $row_count = 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', $today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             }else {
    //                 $row_count += 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         mysqli_query($conn, $insert_transaction);
    //                         unset($_SESSION["cart_item"]);
    //                     }else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             } //*** nested
    //         } else if ($total_weight >= 2500) {
    //             $shipping_fee = (float) 253.00;
    //             $query_orders = "SELECT * FROM orders";
    //             $result = mysqli_query($conn, $query_orders);
    //             $row_count = $result->num_rows;
    //             $order_total = $order_total + $shipping_fee;
    //             if ($row_count == null || $row_count == 0) {
    //                 $row_count = 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         unset($_SESSION["cart_item"]);
    //                     } else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             } else {
    //                 $row_count += 1;
    //                 $transaction_id = $row["client_id"] . "000" . $row_count;
    //                 foreach ($_SESSION["cart_item"] as $item) {
    //                     $product_code = $item["code"];
    //                     $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                     $result = mysqli_query($conn, $query_product_id);
    //                     $row = mysqli_fetch_assoc($result);
    //                     $product_id = $row["id"];
    //                     $today = date("Y-m-d H:i:s a");;
    //                     $quantity = $item["quantity"];
    //                     $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                                 VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                     if (mysqli_query($conn, $insert)) {
    //                         echo "<script type='text/javascript'>";
    //                         echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                         echo "window.location = 'shop.php';";
    //                         echo "</script>";
    //                         mysqli_query($conn, $insert_transaction);
    //                         unset($_SESSION["cart_item"]);
    //                     } else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                     }
    //                 }
    //                 $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                         VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //                 mysqli_query($conn, $insert_transaction);
    //             } //*** nested
    //         } //** weight condition
    //     } else { //Outside Metro Manila
    //     foreach ($_SESSION["cart_item"] as $item){
    //         $total_weight += $item["weight"];
    //     }
    //     if ($total_weight < 400 && $total_weight > 0) { //Express letter (Within 400g of items)
    //         $shipping_fee = (float) 109.00;
    //         $order_total = $order_total + $shipping_fee;
    //         $query_orders = "SELECT * FROM orders";
    //         $result = mysqli_query($conn, $query_orders);
    //         $row_count = $result->num_rows;
    //         if ($row_count == null || $row_count == 0) {
    //             $row_count = 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } else {
    //             $row_count += 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     mysqli_query($conn, $insert_transaction);
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } //*** nested
    //     } else if ($total_weight > 400 && $total_weight < 1499) { // One pounder
    //         $shipping_fee = (float) 132.00;
    //         $query_orders = "SELECT * FROM orders";
    //         $result = mysqli_query($conn, $query_orders);
    //         $row_count = $result->num_rows;
    //         $order_total = $order_total + $shipping_fee;
    //         if ($row_count == null || $row_count == 0) {
    //             $row_count = 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } else {
    //             $row_count += 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     mysqli_query($conn, $insert_transaction);
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } //*** nested
    //     } else if ($total_weight > 1500 && $total_weight < 2499) { // 3 Pounder
    //         $shipping_fee = (float) 242.00;
    //         $query_orders = "SELECT * FROM orders";
    //         $result = mysqli_query($conn, $query_orders);
    //         $row_count = $result->num_rows;
    //         $order_total = $order_total + $shipping_fee;
    //         if ($row_count == null || $row_count == 0) {
    //             $row_count = 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total',0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } else {
    //             $row_count += 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     mysqli_query($conn, $insert_transaction);
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                         $err_no = mysqli_errno($conn);
    //                         $err_name = mysqli_error($conn);
    //                         echo "<div class='alert alert-success alert-dismissable'>";
    //                         echo $err_no . ": " . $err_name;
    //                         echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } //*** nested
    //     } else if ($total_weight >= 2500) {
    //         $shipping_fee = (float) 278.00;
    //         $query_orders = "SELECT * FROM orders";
    //         $result = mysqli_query($conn, $query_orders);
    //         $row_count = $result->num_rows;
    //         $order_total = $order_total + $shipping_fee;
    //         if ($row_count == null || $row_count == 0) {
    //             $row_count = 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } else {
    //             $row_count += 1;
    //             $transaction_id = $row["client_id"] . "000" . $row_count;
    //             foreach ($_SESSION["cart_item"] as $item) {
    //                 $product_code = $item["code"];
    //                 $query_product_id = "SELECT * FROM products WHERE code = '$product_code'";
    //                 $result = mysqli_query($conn, $query_product_id);
    //                 $row = mysqli_fetch_assoc($result);
    //                 $product_id = $row["id"];
    //                 $today = date("Y-m-d H:i:s a");;
    //                 $quantity = $item["quantity"];
    //                 $insert = "INSERT INTO orders (transaction_no, client_id, product_id, order_date, quantity)
    //                             VALUES ('$transaction_id', '$client_id', '$product_id', '$today', '$quantity')";
    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "<script type='text/javascript'>";
    //                     echo "alert('Order has been placed! Pay within 48 hours and upload your proof of payment to complete this transaction');";
    //                     echo "window.location = 'shop.php';";
    //                     echo "</script>";
    //                     mysqli_query($conn, $insert_transaction);
    //                     unset($_SESSION["cart_item"]);
    //                 } else {
    //                     $err_no = mysqli_errno($conn);
    //                     $err_name = mysqli_error($conn);
    //                     echo "<div class='alert alert-success alert-dismissable'>";
    //                     echo $err_no . ": " . $err_name;
    //                     echo "</div>";
    //                 }
    //             }
    //             $insert_transaction = "INSERT INTO transactions (transaction_no, date, client_id, total, status)
    //                                     VALUES ('$transaction_id', '$today', '$client_id', '$order_total', 0)";
    //             mysqli_query($conn, $insert_transaction);
    //         } //*** nested
    //     } //** weight condition
    // } //*location condition
    // } //

?>
