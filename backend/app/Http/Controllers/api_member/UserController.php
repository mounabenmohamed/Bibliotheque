<?php

namespace App\Http\Controllers\api_member;
use App\Http\Controllers\Controller;
use App\Models\membre;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function register(Request $request) {
     
     $user = User::where('email', $request['email'])->first();

     if($user) {
        $responce['status'] = 10;
        $responce['massage'] = 'Email Already Exists';
        $responce['code'] = 409;
     } else {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            
      ]);
        $membre= new membre();
        $membre->num_telephone = $request->num_telephone;
        $user->membre()->save($membre);
        $responce['status'] = 1;
        $responce['massage'] = 'User Registered Successfully';
        $responce['code'] = 200;
     }
     return response()->json($responce);

    }

    public function login(Request $request) {
        $credentials = $request->only('email','password');
        try{
            if(!JWTAuth::attempt($credentials)) {
                $responce['status'] = 0;
                $responce['code'] = 401;
                $responce['data'] = null;
                $responce['massage'] = 'Email or Password is incorrect';
                return response()->json($responce); 
            }
        } catch(JWTException $e) {
                $responce['data'] = null;
                $responce['code'] = 500;
                $responce['massage'] = 'Could Not Create Token';
                return response()->json($responce);
        }
         $user = auth()->user();
         $data['token'] = auth()->claims([
             'user_id' => $user->id,
             'email' => $user->email
         ])->attempt($credentials);

         $responce['data'] = $data;
         $responce['status'] = 1;
         $responce['code'] = 200;
         $responce['massage'] = 'Login Successfully';
         return response()->json($responce);

    }
}
