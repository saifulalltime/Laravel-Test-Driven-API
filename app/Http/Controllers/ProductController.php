<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductList(){
        return Product::all();
    }
    
    public function productSingleInfo($id){
        return Product::findOrFail($id);
    }

}
