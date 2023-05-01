<?php

// include database and object files
include_once "../config/database.php";
include_once "../objects/category.php";
 
// instantiate database and category object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$category = new Category($db);
 
// query categories
$stmt = $category->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $cat_arr=array();
    $cat_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $cat_item=array(
            "category_id" => $category_id,
            "name" => $name,
            "description" => html_entity_decode($description)
        );
 
        array_push($cat_arr["records"], $cat_item);
    }
 
    echo json_encode($cat_arr);

}
 
else{
    echo json_encode(
        array("message" => "No categories found.")
    );



}