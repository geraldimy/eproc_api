<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountsService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        $service = new SocialAccountsService;

        $isUser = $service->findOrCreate($user, "google");

        if($isUser == null) return response()->json(['error'=>'Server encountered an exception'], 500);
        
        auth()->login($isUser);

        $success["token"] = $isUser->createToken('MyApp')->accessToken;
        $success["fullname"] = $isUser->fullname;
        $success["email"] = $user->email;
        $success["is_social_user"] = true;

        return response()->json($success);
    }
}
