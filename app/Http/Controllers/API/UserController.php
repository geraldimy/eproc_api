<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller
{

    public $successStatus = 200;

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'fullname' => 'required', 
            'email' => 'required|email', 
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
    
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
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
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}