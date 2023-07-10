<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Klein\Klein;
use App\Controllers\ProductController;
use App\Controllers\LoginController;

$router = new Klein();

$productController = new ProductController();
$router->respond('GET', '/[products|]', function () use ($productController) {
    $productController->index();
});

$loginController = new LoginController();
$router->respond('GET', '/login', function () use ($loginController) {
    $loginController->index();
});


$router->dispatch();
