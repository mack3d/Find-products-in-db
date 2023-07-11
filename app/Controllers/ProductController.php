<?php

namespace App\Controllers;

use App\Models\ProductsModel;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class ProductController
{
    private $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../Views/Templates');
        $this->twig = new Environment($loader, [
            'cache' => __DIR__ . '/../Views/TemplatesCache',
            'auto_reload' => true
        ]);
    }
    public function show_products()
    {
        $models = new ProductsModel();
        $products = $models->getProducts((object)array('limit' => 10));

        echo $this->twig->render('product.twig', ['products' => $products]);
        //require __DIR__ . '/../Views/Products.view.php';
    }
}
