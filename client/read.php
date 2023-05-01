<?php

 
// include database and object files
include_once"../config/database.php";
include_once"../objects/client.php";
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$client = new Client($db);
 
// query categories
$stmt = $client->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $cli_arr=array();
    $cli_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $cli_item=array(
            "id" => $id,
            "name" => $name,
            "nickname" => $nickname,
            "username" => $username,
            "email" => $email,
            "password" => $password,
            "contact_number" => $contact_number,
            "address" => $address,
            "birthday" => $birthday,
            "status" => $status,
            "created_at" => $created_at
        );
 
        array_push($cli_arr["records"], $cli_item);
    }
 
    echo json_encode($cli_arr);

}
 
else{
    echo json_encode(
        array("message" => "No clients found.")
    );
}