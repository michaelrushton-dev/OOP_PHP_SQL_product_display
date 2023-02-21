<?php

class Database{
  //DB params
  private $host = 'eu-cdbr-west-03.cleardb.net';
  private $db_name = 'heroku_3483486d6599979';
  private $username = 'b9250cb20fb3ad';
  private $password = '500878a6';
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

