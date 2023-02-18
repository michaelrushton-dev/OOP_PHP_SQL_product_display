<?php

class Database{
  //DB params
  private $host = 'localhost';
  private $db_name = 'id20303447_scandiweb';
  private $username = 'id20303447_user123';
  private $password = '@Xw*]+%zG#e5%A1e';
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
