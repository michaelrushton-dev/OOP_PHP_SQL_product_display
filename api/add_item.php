<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, x-Requested-With');
//brings in Database and Product classes
include_once '../db/Database.php';
include_once '../models/Product.php';
include_once '../models/productTypes/Book.php';
include_once '../models/productTypes/Furniture.php';
include_once '../models/productTypes/Dvd.php';

// Instantiate DB and connect to it
$database = new Database();
$db = $database->connect();

// get data
$data = json_decode(file_get_contents("php://input"));

// new product called whatever type is
$product = new $data->type($db);
$product->talk();

// print_r($data);

// get the product data
$product->sku = $data->sku;
$product->name = $data->name;
$product->price = $data->price;
$product->type = $data->type;
$product->value = $data->value;
$product->size = $data->size;
$product->weight = $data->weight;
$product->dimensions = $data->dimensions;

//uses updateValue() from Product class to update the unique attribute
// of the incoming product (i.e wht, height or dimension)
$product->updateValue($data->value);

//create the product
if($product->create()){
  echo json_encode(
    array('message' => 'Product Created!'. $data->type)
  );
} else {
  echo json_encode(
    array('message' => $data->type . ' not created')
  );
}
?>