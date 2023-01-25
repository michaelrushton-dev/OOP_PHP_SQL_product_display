<?php
//runs the script to actually get the data
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
//brings in Database and Post classes
include_once '../db/Database.php';
include_once '../models/Product.php';
// Instantiate DB and connect to it
$database = new Database();
$db = $database->connect();
//Instantiate a new BLOG Post object from Ppost class
$post = new Product($db);
// Blog post query
$result = $post->read();
$num = $result->rowCount();
print_r($num);
//check if any posts
if($num>0){
  //Post array
  $posts_arr = array();
  while($row = $result->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $post_item = array(
      'id' => $id,
      'sku'=>$sku,
      'name'=>$name,
      'price'=> $price,
      'type'=> $type,
      'value'=> $value,
    );
    //push to 'data'
    array_push($posts_arr, $post_item);
  }
  //turn to json and output
  echo json_encode($posts_arr);
}else{
  //no posts
  echo json_encode(
    array('message' => ' '. $num .' posts found')
  );
}
