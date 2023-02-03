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
  public $size;
  public $weight;
  public $dimensions;
  //Constructor
 // makes the $conn variable to be $db as passed in when instantiating any new Product object
  public function __construct($db){
    $this->conn = $db;
  }
  
  //GETTERS - should they be needed

  public function getValue(){
    return $this->value;
  }

  //SETTERS - should they be needed

  public function setValue($value){
    $this->value = $value;
  }

  //GET posts
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
    value = :value,
    size = :size,
    weight = :weight,
    dimensions = :dimensions';

  $stmt = $this->conn->prepare($query);

  // bind the data

  $stmt->bindParam(':sku', $this->sku);
  $stmt->bindParam(':name', $this->name);
  $stmt->bindParam(':price', $this->price);
  $stmt->bindParam(':type', $this->type);
  $stmt->bindParam(':value', $this->value);
  $stmt->bindParam(':size', $this->size);
  $stmt->bindParam(':weight', $this->weight);
  $stmt->bindParam(':dimensions', $this->dimensions);

  // execute query or error if something goes wrong
  if($stmt->execute()){
    echo 'added';
    return true;
  } else {
      printf('error: %s. \n', $stmt->error);
    return false;
  };

}

//DELETE

public function delete($list){

    $query = 'DELETE from '
    . $this->table .  ' WHERE id IN (' . $list . ');';

 $stmt = $this->conn->prepare($query);

 // execute query or error if something goes wrong
 if($stmt->execute()){
   echo 'deleted ' . $list;
   return true;
 } else {
     printf('error: %s. \n', $stmt->error);
   return false;
 };
}
}

