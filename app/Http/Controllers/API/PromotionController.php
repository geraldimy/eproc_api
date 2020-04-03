<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Promotion;
use App\Http\Resources\promo as PromoResources;

class PromotionController extends Controller
{
    public function index() 
    {
        $now = Carbon::now();

        $promos = Promotion::whereRaw(
            "(promo_start_date <= '$now' AND promo_end_date >= '$now')"
            )->get();
        
        return PromoResources::collection($promos);
       
    }

    public function show($id)
    {
        $now = Carbon::now();

        $promos = Promotion::where("promo_start_date", "<=", $now)
        ->where("promo_end_date", ">=", $now)
        ->findOrFail($id);
        
        if(is_null($promos)) {
            return response()->json(['error'=>'Product Not Found'], 401); 
        }
         return response()->json($promos,200);
    }
    
}
