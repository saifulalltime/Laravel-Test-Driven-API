<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Get all products list
    public function ProductList(){
        return Product::all();
    }
    
    // Get Single Product details
    public function productSingleInfo($id){
        return Product::published()->findOrFail($id);
    }
    // Create a new Product
    public function createProduct(array $products){
        return Product::firstOrCreate($products);
    }

}
