<?php

 
// include database and object files
include_once('../config/database.php');
include_once('../objects/product.php');
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$product = new Product($db);
 
// query products
$stmt = $product->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $products_arr=array();
    $products_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $product_item=array(
            "id" => $id,
            "category_id" => $category_id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "image" => $image,
            "stock" => $stock,
            "code" => $code,
            "weight" => $weight
        );
 
        array_push($products_arr["records"], $product_item);
    }
 
    echo json_encode($products_arr);

}
 
else{
    echo json_encode(
        array("message" => "No products found.")
    );



}