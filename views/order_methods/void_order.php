<?php

include_once("../../include/dbConnect.php");

if(isset($_POST['id'])) {

    $transNo = $_POST['id'];
    $statement = "UPDATE transactions
                    SET status = 5
                    WHERE transaction_no = '$transNo'";

    $query = mysqli_query($conn, $statement);

    if(isset($_POST['payment'])) {

        $statement = "SELECT product_id, quantity 
                        FROM orders 
                        WHERE transaction_no = '$transNo'";
        $query = mysqli_query($conn, $statement);

        while($row = mysqli_fetch_assoc($query)) {

            $prodId = $row['product_id'];
            $quantity = $row['quantity'];
            $statement2 = "UPDATE products
                            SET stock = stock + $quantity
                            WHERE id = $prodId";
            $query2 = mysqli_query($conn, $statement2);                

        }

    }

    if($query) {
        echo "<script>history.go(-1)</script>";
    }

}


?>