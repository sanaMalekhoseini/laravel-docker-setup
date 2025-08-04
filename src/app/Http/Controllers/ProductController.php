<?php

namespace App\Http\Controllers;

use app\repositories\productrepository;
use illuminate\http\request;

class ProductController extends controller
{
    protected $repository;

    public function __construct(productrepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(request $request)
    {
        $product = $this->repository->getproduct($request);
        return response()->json($product,201);
    }
}
