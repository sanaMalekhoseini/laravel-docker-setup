<?php
namespace App\Repositories;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function storeProduct(Product $product){
        return $product->save();
    }

    public function updateProduct(Product $product)
    {
        // TODO: Implement updateProduct() method.
    }

    public function deleteProduct(Product $product)
    {
        // TODO: Implement deleteProduct() method.
    }

    public function getProduct(Product $product)
    {
        return $product;
    }
}
