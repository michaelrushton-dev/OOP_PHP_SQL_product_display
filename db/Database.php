<?php

class Database{
  //DB params
  private $host = 'sql107.epizy.com';
  private $db_name = 'epiz_33599670_ecommerce';
  private $username = 'epiz_33599670';
  private $password = 'i40uXUMBMQ8JRc';
  private $conn;
  //Connect to DB
  public function connect(){
    $this->conn = null;

  //creating new PDO object
    try {
      $this->conn = new PDO(
        'mysql:host=' . $this->host . ';port=3306;dbname=' . $this->db_name,
          $this->username, $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo 'connection error' . $e->getMessage();
    }
    return $this->conn;
  }
}
