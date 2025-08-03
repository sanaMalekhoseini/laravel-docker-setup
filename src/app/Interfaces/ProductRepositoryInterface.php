<?php

namespace App\Interfaces;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function storeProduct(Product $product);
    public function updateProduct(Product $product);
    public function deleteProduct(Product $product);
    public function getProduct(Product $product);

}
