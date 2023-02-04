<?php
class Database{
  //DB params
  private $host = 'localhost';
  private $db_name = 'myblog';
  private $username = 'root';
  private $password = 'Fw)otjct.p.iDp_u';
  private $conn;
  //Connect to DB
  public function connect(){
    $this->conn = null;
    
  //creating new PDO object
    try {
      $this->conn = new PDO(
        'mysql:host=' . $this->host . ';port=3000;dbname=' . $this->db_name,
          $this->username, $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo 'connection error' . $e->getMessage();
    }
    return $this->conn;
  }
}
