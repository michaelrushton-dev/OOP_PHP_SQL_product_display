<?php

echo 'controller';

// use app\core\Database;
// use app\models\ProductTypes\Invalid;
// use app\view\ProductView;

include_once('../db/Database.php');
include_once('../models/productTypes');
include_once('../models/productTypes/Book.php');

class ProductController
{
    public static function index()
    {
        header('Content-Type: application/json');
        $db = new Database();
         $db->connect();
        echo json_encode([
            "message" => "Welcome to the product API",
      ]);
    }

    public static function create()
    {
        $errors = [];

        //checks if its a post request
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            $productData = (array) json_decode(file_get_contents("php://input"), true);
            print_r($productData);

            $type = "../models/productTypes/" . $productData['type'] . '.php';
            if (class_exists($type)) {
        print_r($type);
        echo json_encode([
          "message" => "posteyyy"
        ]);
                $product = new $type($productData);
  
            } else {
                http_response_code(422);
                echo json_encode([
                "message" => "Validity of value couldn't be confirmed due to the product type being invalid!"
            ]);
            return;
            }

            // $errors = $product->validateData();

            if (! empty($errors)) {
                http_response_code(422);
                echo json_encode(["errors" => $errors, "data" => $productData]);
            } else {
                    $db = new Database();
                    // $db->create($product);
                    http_response_code(201);
                    echo json_encode([
                    "message" => "Product with sku: " . $productData['sku'] . " added",
                ]);
            }
        }
    }

    // public static function delete()
    // {
    //     $data = (array) json_decode(file_get_contents("php://input"), true);
    //     if ($data) {
    //         $db = new Database();
    //         foreach ($data["skus"] as $sku) {
    //             $db->delete($sku);
    //         }
    //         http_response_code(201);
          
    //         echo json_encode([
    //             "message" => "Products deleted",
    //       ]);
    //     }

    // }

    // public static function read()
    // {
    //     header('Content-Type: application/json');
    //     $db = new Database();
    //     echo json_encode($db->connect());
    //     $products = new Product($db);
    // echo $products->read();
    // }
}
