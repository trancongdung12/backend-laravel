<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \Firebase\JWT\JWT;
class AuthController extends Controller
{
    function register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();
        $responseData = array("data"=>null);
        return response()->json($responseData, 200);
    }
    function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $key = "example_key";

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $userId = Auth::user()->id;
            $value = array(
                "user_id"=>$userId
            );
            $token = JWT::encode($value, $key);
            $responseData = array("data"=>$token);
            return response()->json($responseData, 200);
        }else{
            $responseData = array("data"=>null);
            return response()->json($responseData, 400);
         }
    }
}
