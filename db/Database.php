<?php

class Database{

  private $cleardb_url    = parse_url(getenv('CLEARDB_DATABASE_URL'));
  private $cleardb_server = $cleardb_url['host'];
  private $cleardb_username = $cleardb_url['user'];
  private $cleardb_password = $cleardb_url['pass'];
  private $cleardb_db     = substr($cleardb_url['path'],1);

  private $active_group = 'default';
  private $query_builder = TRUE;

  private $conn;

  //DB params
  // private $host = 'localhost';
  // private $db_name = 'heroku_3483486d6599979';
  // private $username = 'b9250cb20fb3ad';
  // private $password = '500878a6';
  // private $conn;
  //Connect to DB
  public function connect(){
    $this->conn = null;
  $this->conn = mysqli_connect($this->cleardb_server, $this->cleardb_username, $this->cleardb_password, $this->cleardb_db);
  //creating new PDO object
    // try {
    //   $this->conn = new PDO(
    //     'mysql:host=' . $this->cleardb_url . ';port=8080;dbname=' . $this->cleardb_db,
    //       $this->cleardb_username, $this->cleardb_password
    //   );
    //   $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }catch(PDOException $e){
    //   echo 'connection error' . $e->getMessage();
    // }
    return $this->conn;
  }
}
