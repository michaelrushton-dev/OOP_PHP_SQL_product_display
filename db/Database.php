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


  public function connect(){
    $this->conn = null;

    try {
      echo 'hello';
      $this->conn = new PDO(
        'mysql:host=' . $this->cleardb_url . ';port=3306;',  $this->cleardb_db,
          $this->cleardb_username, $this->cleardb_password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
      echo 'connection error' . $e->getMessage();
    }
    return $this->conn;
  }
}
