<?php


header('HTTP/1.1 200 OK');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin: http://127.0.0.1:5173');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
Access-Control-Allow-Methods, Authorization, x-Requested-With, X-Auth-Token');
function cors() {
  
  // Allow from any origin
  if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
    // you want to allow, and if so:
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
      header('Access-Control-Allow-Credentials: true');
      header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      
      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      // may also be using PUT, PATCH, HEAD etc
      header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
      
      if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
      
      exit(0);
    }
  }
  
  cors();
  
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

if(!$data->list){
  echo json_encode(
    array('message' => 'no item selected')
  );
  return;
}

if($product->delete($data->list)){
  echo json_encode(
    array('message' => 'Products Deleted!'. $data->type)
  );
} else {
  echo json_encode(
    array('message' => $data->type . ' not deleted!')
  );
}
