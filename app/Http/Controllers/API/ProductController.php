<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Controllers\API\Response;
use App\Http\Resources\product as ProductResources;

class ProductController extends Controller
{
    
    public function index()
    {

        $category = Category::all();
        foreach ($category as $cat) {

        $produk = Product::select('id', 'product_name', 'short_desc', 'image', 'color')->where('category', $cat->id)->get();
        
        $list[] = array('Category'=>$cat->category_name, 
            'Product'=>$produk);

        }
                return response()->json([
                    'data' => $list
                ]);    

    }

    public function show($id)
    {   
        $products = Product::findOrFail($id);
        
        if(is_null($products)) {
            return response()->json(['error'=>'Product Not Found'], 400); 
        }
         return response()->json($products,200);
    }
}
