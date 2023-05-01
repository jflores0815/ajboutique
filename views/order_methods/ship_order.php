<?php

include_once("../../include/dbConnect.php");

if(isset($_POST['id'])) {
    $transNo = $_POST['id'];
    $tracking_no = $_POST['tracking_no'];
    $BC = $_POST['BC'];
    $statement = "UPDATE transactions
                    SET status = 3, 
                        tracking_no = '$tracking_no',
                        BC = '$BC'
                    WHERE transaction_no = '$transNo'";

    $query = mysqli_query($conn, $statement);

    if($query) {
        echo "<script>history.go(-1)</script>";
    }

}

?>