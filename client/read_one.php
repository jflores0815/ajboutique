<?php

// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare product object
$client = new Client($db);
 
// set ID property of product to be edited
$client->id = isset($_SESSION['user']) ? $_SESSION['user'] : die();
 
// read the details of product to be edited
$client->readOne();
 
// create array
$client_arr = array(
    "id" =>  $client->id,
    "name" => $client->name
 
);
 
// make it json format
print_r(json_encode($client_arr));
?>