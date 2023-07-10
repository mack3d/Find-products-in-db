<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Klein\Klein;
use App\Controllers\ProductController;
use App\Controllers\LoginController;
use App\Controllers\AuthController;
use App\Utils\DBConnection;

$db = new DBConnection();

$router = new Klein();

$productController = new ProductController();
$router->respond('GET', '/[products|]', function () use ($productController) {
    $authController = new AuthController();
    $authController->authenticate();
    $productController->show_products();
});

$loginController = new LoginController();
$router->respond('GET', '/signin', function () use ($loginController) {
    $loginController->sign_in();
});

$router->respond('GET', '/signout', function () use ($loginController) {
    $loginController->sign_out();
});


$router->dispatch();
