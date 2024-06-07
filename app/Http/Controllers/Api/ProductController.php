<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all products
        $products = Product::latest()->paginate(5);

        //return collection of posts as a resource
        return new ProductResource(true, 'List Data products', $products);
    }
}