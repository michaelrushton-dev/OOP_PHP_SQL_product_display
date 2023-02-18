<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/config.php';

// use app\core\Router;
// use app\controllers\ProductController;
// use app\core\Database;

require_once('./db/Database.php');
require_once('./Router/Router.php');

include_once('./Get.php');

$database = new Database();
$router = new Router();

$router->get('/', [Controller::class, 'Get']);
// $router->post('/add-product', [ProductController::class, 'create']);
// $router->post('/delete-product', [ProductController::class, 'delete']);
// $router->get('/products', [ProductController::class, 'read']);

$router->run();
