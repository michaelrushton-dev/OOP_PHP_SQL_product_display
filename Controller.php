<?php

//runs the script to actually fetch all of the data
//Headers

include_once './db/Database.php';
include_once './models/Product.php';
//brings in Database and Product classes
include_once './models/Product.php';
include_once './models/productTypes/Book.php';
include_once './models/productTypes/Furniture.php';
include_once './models/productTypes/Dvd.php';
class Controller{

  public static function Get(){
    $database = new Database();
    $db = $database->connect();
    //Instantiate a new product object from Product class
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
          'size'=> $size,
          'weight'=> $weight,
          'dimensions'=> $dimensions,
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
  }

public static function Add(){

// Instantiate DB and connect to it
$database = new Database();
$db = $database->connect();

// get data
$data = json_decode(file_get_contents("php://input"));

// new product called whatever type is

// $product = new $data->type($db);
// $product->talk();

// print_r($data);

// get the product data
// $product->sku = $data->sku;
// $product->name = $data->name;
// $product->price = $data->price;
// $product->type = $data->type;
// $product->value = $data->value;
// $product->size = $data->size;
// $product->weight = $data->weight;
// $product->dimensions = $data->dimensions;

//uses updateValue() from Product class to update the unique attribute
// of the incoming product (i.e wht, height or dimension)
// $product->updateValue($data->value);

// //create the product
// if($product->create()){
//   http_response_code(200);
//   echo json_encode(
//     array('message' => 'Product Created!'. $data->type)
//   );
// } else {
//   http_response_code(500);
//   echo json_encode(
//     array('message' => $data->type . ' not created')
//   );
// }

echo json_encode(
      $data
    );

}

public static function Delete(){
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
  http_response_code(200);
  echo json_encode(
    array('message' => 'Products Deleted!'. $data->type)
  );
} else {
  http_response_code(500);
  echo json_encode(
    array('message' => $data->type . ' not deleted!')
  );
}
}
}