<?php

// require_once __DIR__ . '/vendor/autoload.php';
// require_once __DIR__ . '/config/config.php';

// use app\core\Router;
// use app\controllers\ProductController;
// use app\core\Database;

require_once('./db/Database.php');
require_once('./Router/Router.php');
require_once('./Controller.php');

$database = new Database();
$router = new Router();

$router->get('/', [Controller::class, 'Get']);
$router->post('/add_item', [Controller::class, 'Add']);
$router->post('/delete', [Controller::class, 'Delete']);
// $router->get('/products', [ProductController::class, 'read']);

$router->run();