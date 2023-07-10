<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class ProductController
{
    public function show_products()
    {
        $models = new ProductsModel();
        $products = $models->getProducts((object)array('limit' => 10));
        require __DIR__ . '/../Views/Products.view.php';
    }
}
