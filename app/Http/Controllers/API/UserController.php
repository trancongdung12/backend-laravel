<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
class UserController extends Controller
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
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $responseData = array("data"=>Auth::user());
            return response()->json($responseData, 200);
        }else{
            $responseData = array("data"=>null);
            return response()->json($responseData, 400);
         }
    }
}
