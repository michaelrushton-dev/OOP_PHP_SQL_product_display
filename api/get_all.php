<?php

//runs the script to actually get the data
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//brings in Database and product classes
include_once '../db/Database.php';
include_once '../models/Product.php';
// Instantiate DB and connect to it
$database = new Database();
$db = $database->connect();
//Instantiate a new BLOG product object from Product class
$product = new Product($db);
// Blog product query
$result = $product->read();
$num = $result->rowCount();

//check if any products
if($num>0){
  //product array
  $products_arr = array();
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $product_item = array(
      'id' => $id,
      'sku'=>$sku,
      'name'=>$name,
      'price'=> $price,
      'type'=> $type,
      'value'=> $value,
    );
    //push to 'data'
    array_push($products_arr, $product_item);
  }
  //turn to json and output
  echo json_encode($products_arr);
}else{
  //no products
  echo json_encode(
    array('message' => ' '. $num .' products found')
  );
}
