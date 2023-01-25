<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, x-Requested-With');
//brings in Database and Product classes
include_once '../db/Database.php';
include_once '../models/Product.php';
// Instantiate DB and connect to it
$database = new Database();
$db = $database->connect();
//Instantiate a new BLOG Product object from Pproduct class
$product = new Product($db);

// get the producted data

$data = json_decode(file_get_contents("php://input"));

$product->sku = $data->sku;
$product->name = $data->name;
$product->price = $data->price;
$product->type = $data->type;
$product->value = $data->value;

//create the product

if($product->create()){
  echo json_encode(
    array('message' => 'Product Created!')
  );
} else {
  echo json_encode(
    array('message' => 'Product not created')
  );
}
