<?php

class Product{
  private $conn;
  private $table = 'products';
  // Post properties
  public $id;
  public $category_id;
  public $category_name;
  public $title;
  public $author;
  public $created_at;
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
}