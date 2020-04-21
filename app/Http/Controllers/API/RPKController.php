<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\RPK;

class RPKController extends Controller
{
    //
    public function getRpkByLocation(Request $request){
        $latitude = $request->input('lat');
        $longitude = $request->input('lng');

        //maximum range finding (in km)
        $rad = '20';

        //earth radius
        $R = '6371';

        // bounding box for query optimization
        $maxLat = $latitude + rad2deg($rad/$R);
        $minLat = $latitude - rad2deg($rad/$R);
        $maxLon = $longitude + rad2deg(asin($rad/$R) / cos(deg2rad($latitude)));
        $minLon = $longitude - rad2deg(asin($rad/$R) / cos(deg2rad($latitude)));

        // SELECT id, nama_rpk, latitude, longitude, distance from (SELECT id, nama_rpk, latitude, longitude FROM rpk WHERE latitude BETWEEN minlatitude AND maxlatitude AND longitude BETWEEN minlongitude AND maxlongitude AS FirstCut) WHERE someDistance < radius ORDERBY distance

        $rpk = DB::table('rpk')
                ->selectRaw('id, nama_rpk, latitude, longitude, (? * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude ) - radians(?)) + sin( radians(?) ) * sin(radians(latitude)))) AS distance', [$R, $latitude, $longitude, $latitude])
                ->from('rpk')
                ->whereBetween('latitude', [$minLat, $maxLat])
                ->whereBetween('longitude', [$minLon, $maxLon])
                ->whereRaw('(? * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) < ?', [$R, $latitude, $longitude, $latitude, $rad])
                ->orderBy('distance')
                ->limit(5)
                ->get();

        return \response($rpk)->header('Content-Type', 'application/json');
    }

    public function getRpkById($id){

        $rpk = RPK::findOrFail($id);
        if(is_null($rpk)) {
            return response()->json(['error'=>'RPK Not Found'], 400); 
        }
         return response()->json($rpk,200);
    }

}
