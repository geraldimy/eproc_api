<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->id_role == 1) {
            return redirect()->route('user');
        }

        if (Auth::user()->id_role == 2) {
            return redirect()->route('rpk');
        }

        if (Auth::user()->id_role == 3) {
            return $next($request);
        }
        
    }
}
