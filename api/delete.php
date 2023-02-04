<?php


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

$product = new Product($db);

if($product->delete($data->list)){
  echo json_encode(
    array('message' => 'Products Deleted!'. $data->type)
  );
} else {
  echo json_encode(
    array('message' => $data->type . ' not deleted!')
  );
}
?>