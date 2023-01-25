<?php

class Product{
  private $conn;
  private $table = 'products';
  // Post properties
  public $id;
  public $sku;
  public $name;
  public $price;
  public $type;
  public $value;
  //Constructor
 // makes the $conn variable to be $db as passed in on read.php when instantiating a new Post object
  public function __construct($db){
    $this->conn = $db;
  }
  //get posts
  public function read(){
//create query
    $query = 'SELECT * FROM ' . $this->table . '';

$stmt = $this->conn->prepare($query);
$stmt->execute();
return $stmt;
  }

  public function create(){

    $query = 'INSERT INTO '
     . $this->table . 
   ' SET
    sku = :sku,
    name = :name,
    price = :price,
    type = :type,
    value = :value';

  

  $stmt = $this->conn->prepare($query);

  // bind the data


  $stmt->bindParam('sku', $this->sku);
  $stmt->bindParam('name', $this->name);
  $stmt->bindParam('price', $this->price);
  $stmt->bindParam('type', $this->type);
  $stmt->bindParam('value', $this->value);

  // execute query or error if something goes wrong
    $stmt->execute();
  // if($stmt->execute()){
  //   return true;
  // } else {
  //   print_r($stmt->error);
  //   return false;
  // };

}

}