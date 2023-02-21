<?php

// namespace app\core;

class Router
{
    private array $getRoutes = [];
    private array $postRoutes = [];

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }
    public function run()
    {
        //allows cors access
        header("Content-Type: application/json; charset=UTF-8");
        header('Access-Control-Allow-Origin: https://e-commerce-michael-rushton.herokuapp.com');
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Methods: *");
        header("Allow: *");

        //get the request uri from the request
        // print_r($_SERVER["REQUEST_URI"]);
        $parts = explode("/", $_SERVER["REQUEST_URI"]);
        // print_r($parts);
        // get the path after the initial slash
        $url = "/" . $parts[1];

        // get the request method
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        
        // determine between the methods
        if ($method === 'get') {
            $fn = $this->getRoutes[$url] ?? null;
        } else {
            $fn = $this->postRoutes[$url] ?? null;
        }

        // call the function designated on the request
        if ($fn) {
            call_user_func($fn);
        } else {
           
           echo "Page Not Found";
        }
    }
}
