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

}
