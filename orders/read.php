<?php
    
// include database and object files
include_once('../config/database.php');
include_once('../objects/order.php');

// instantiate database and order object
$database = new Database();
$db = $database->getConnection();

// initialize object
$order = new Order($db);

// query products
$stmt = $order->read();
$num = $stmt->rowCount();

if($num>0) { 
    
    $orders_arr = array();
    $orders_arr["records"] = array();
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
        extract($row);
        
        $order_item = array(
            
            "id" => $id,
            "transaction_no" => $transaction_no,
            "client" => $client,
            "product" => $product,
            "order_date" => $order_date,
            "quantity" => $quantity,
            "status" => $status
            
            );
            
        array_push($orders_arr["records"], $order_item);
        
    }
    
    echo json_encode($orders_arr);
    
} else {
    
    echo json_encode(
        array("message" => "No orders found")
        );
    
}


?>