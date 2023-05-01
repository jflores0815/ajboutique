<?php


include_once("../../include/dbConnect.php");

if(isset($_POST['id'])) {

    $transNo = $_POST['id'];
    $statement = "UPDATE transactions
                    SET status = 2
                    WHERE transaction_no = '$transNo'";

    $query = mysqli_query($conn, $statement);

    if($query) {

        $statement = "SELECT product_id, quantity 
                        FROM orders 
                        WHERE transaction_no = '$transNo'";


        $query = mysqli_query($conn, $statement);

        while($row = mysqli_fetch_assoc($query)) {

            $prodId = $row['product_id'];
            $quantity = $row['quantity'];


            //$statement2 = "UPDATE products SET stock = stock - $quantity  WHERE id = $prodId";
           // $query2 = mysqli_query($conn, $statement2);                

        }

        echo "<script> window.location.href = '../../admin/confirm.php';</script>";

    }


}


?>