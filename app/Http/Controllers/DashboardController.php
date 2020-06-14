<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Promotion;

class DashboardController extends Controller
{
    public function index() {
        $product_list   = Product::orderBy('product_name', 'asc');
        $jumlah_product = $product_list->count();
        $category_list  = Category::orderBy('category_name', 'asc');
        $jumlah_category = $category_list->count();
        $promo_list  = Promotion::orderBy('promo_title', 'asc');
        $jumlah_promo = $promo_list->count();
        return view('layouts.dashboard', compact('jumlah_product','jumlah_promo','jumlah_category'));
    }
}
