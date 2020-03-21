<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\TokenManagement;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //get token via header
        $token = $request->header('Authorization');
        if(empty($token)){
            return response()->json([
                'error' => 'Authorization Header is empty'
            ]);
        }

        //format bearer token : 
        //Bearer[spasi]randomhashtoken 
        $pecah_token = explode(" ", $token);
        if(count($pecah_token) <> 2){
            return response()->json([
                'error' => 'Invalid Authorization format'
            ]);
        }

        if(trim($pecah_token[0]) <> 'Bearer'){
            return response()->json([
                'error' => 'Authorization header must be a Bearer'
            ]);
        }


        $access_token = trim($pecah_token[1]);

        //cek apakah access_token ini ada di database atau tidak
        $cek = TokenManagement::where('id', $access_token)->first();
        if(empty($cek)){
            return response()->json([
                'error' => 'Forbidden : Invalid access token'
            ]);
        }

        //cek apakah access_token expired atau tidak
        if(strtotime($cek->expired_at) < time() || $cek->is_active != 1){
            return response()->json([
                'error' => 'Forbidden : Token is already expired. '
            ]);
        }

        return $next($request);
    }
}
