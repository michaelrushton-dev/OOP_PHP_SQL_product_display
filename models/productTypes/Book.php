<?php
// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type,
// Access-Control-Allow-Methods, Authorization, x-Requested-With');

// include_once '../Product.php';
// include_once '../../db/Database.php';


// $database = new Database();
// $db = $database->connect();


// $data = json_decode(file_get_contents("php://input"));

class Book extends Product {

  public function talk()
  {
    echo $this->type;
    echo 'I am a Book';
  }
}

// $newBook = new Book($db);
// $newBook->setType('Book');
// $newBook->talk();

// // print_r($data);

// $newBook->sku = $data->sku;
// $newBook->name = $data->name;
// $newBook->price = $data->price;
// //type of is added by SETTER
// $newBook->value = $data->value;

// print_r($newBook);


// if($newBook->create()){
//   echo json_encode(
//     array('message' => 'Product Created!')
//   );
// } else {
//   echo json_encode(
//     array('message' => 'Product not created')
//   );
// }








