<?php
include_once("../include/dbConnect.php");

$statement = "UPDATE transactions
                SET status = 4
                WHERE datediff(now(), date) >= 2
                AND status = 0";
                
$query = mysqli_query($conn, $statement);
?>