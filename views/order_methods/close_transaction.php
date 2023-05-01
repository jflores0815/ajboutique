<?php


include_once("../../include/dbConnect.php");

if(isset($_POST['id'])) {

    $transNo = $_POST['id'];
    $statement = "UPDATE transactions
                    SET status = 6
                    WHERE transaction_no = '$transNo'";

    $query = mysqli_query($conn, $statement);

    if($query) {
        echo "<script>history.go(-1)</script>";
    }

}

?>