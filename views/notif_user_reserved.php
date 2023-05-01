<?php

include_once("../include/dbConnect.php");

date_default_timezone_set('Asia/Manila');

$id = $_POST['user'];

$notif = $conn->query(" SELECT reserved.client_id, reserved.product_id, products.stock FROM reserved

                      JOIN products ON products.code = reserved.product_id

                      WHERE reserved.client_id = '$id' AND products.stock >= 1 ");

$reserve = mysqli_num_rows($notif);

$dateNow = date('Y-m-d');

$timeNow = date('H');

$due = $conn->query("SELECT (HOUR(payments.date) - $timeNow)  time,

                    DATE(payments.date) dayNow, MINUTE(payments.date) min

                    FROM orders

                    JOIN payments ON payments.transaction_no = orders.transaction_no

                    JOIN products ON orders.product_id = products.id

                    WHERE orders.client_id = '$id' AND payments.status = 0 AND DATE(payments.date) = '$dateNow' AND

                    (HOUR(payments.date) - $timeNow) <= 7

                    ");


$due_count = mysqli_num_rows($due);

echo $due_count + $reserve;

?>
