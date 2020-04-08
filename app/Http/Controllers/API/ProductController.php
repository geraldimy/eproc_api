<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\product as ProductResources;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::get()  ;
        return ProductResources::collection($products);

    }

    public function show($id)
    {
        $products = Product::findOrFail($id);
        
        if(is_null($products)) {
            return response()->json(['error'=>'Product Not Found'], 401); 
        }
         return response()->json($products,200);
    }
}
