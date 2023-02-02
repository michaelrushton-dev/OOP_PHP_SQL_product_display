<?php 

namespace App;

class Router{

  private array $handlers;
  private const METHOD_POST = 'POST';
  private const METHOD_GET = 'GET';

public function get($path, $handler){
    echo 'get';
    $this->handlers['GET' . $path] = [
      'path' => $path,
      'method' => 'GET',
      'handler' => $handler,
    ];

}

  public function post($path, $handler){
     echo 'post';
     $this->addhandler(self::METHOD_POST, $path, $handler);
  }

  private function addHandler($method, $path, $handler){
    $this->handlers[$method . $path] = [
      'path' => $path,
      'method' => $method,
      'handler' => $handler,
    ];
  }

  public function delete($path, $handler)
  {
    echo 'delete';

  }

  public function run($path, $handler)
  {
    echo 'run';
    $requestUri = parse_url($_SERVER['REQUEST_URI']);
    $requestPath = $requestUri['path'];
    var_dump($requestPath);
  }

}