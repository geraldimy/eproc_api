<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Carbon;
use App\Models\TokenManagement;
use App\OauthAccessTokens;



class UserController extends Controller
{

    public $successStatus = 200;


    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'fullname' => 'required', 
            'email' => 'required|email:rfc,dns', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
            'address'   => 'required',
            'phone'     => 'required',
            'id_role'   => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
                $input['password'] = bcrypt($input['password']);
                $user = User::create($input);
                $success['token'] =  $user->createToken('MyApp')-> accessToken;
                $success['fullname']    =  $user->fullname;
                $success['address']     =  $user->address;
                $success['phone']       =  $user->phone;
                $success['id_role']     =  $user->id_role;

        return response()->json(['success'=>$success], $this-> successStatus);
    }
 
    public function login(Request $request){ 

        
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email:rfc,dns', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) 
        { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token']       =  $user->createToken('MyApp')-> accessToken;
            $success['fullname']    =  $user->fullname;
            $success['address']     =  $user->address;
            $success['email']       =  $user->email;
            $success['phone']       =  $user->phone;
            $success['id_role']     =  $user->id_role;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function details()
    {
        $user = Auth::user();
        $userSerialize = serialize($user);
        $userUnserializeArray = (array) unserialize($userSerialize);

        $arrayKeys = array_keys($userUnserializeArray);
        foreach ($arrayKeys as $value)
        {

            if (strpos($value, 'accessToken') !== false) {

                $userAccessTokenArray = (array) $userUnserializeArray[$value];
                $arrayAccessKeys = array_keys($userAccessTokenArray);
                foreach ($arrayAccessKeys as $arrayAccessValue) {

                    if (strpos($arrayAccessValue, 'original') !== false) {

                        $userTokenId = $userAccessTokenArray[$arrayAccessValue]['id'];
                        $checkToken = OauthAccessTokens::where([
                            ['id', '=', $userTokenId],
                            ['expires_at', '>', Carbon::now()]
                        ])->first();

                        if ( !$checkToken ) {
                            return response()->json([
                                'error'=>true,
                                'msg'=> 'Token time has expired. Please log in again.'
                            ]);
                        }
                    }
                }
            }
        }
        return response()->json(['success' => $user], $this-> successStatus);
    }

    public function logout(Request $res)
    {
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     }
}
