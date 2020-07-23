<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use \Firebase\JWT\JWT;
class UserController extends Controller
{
    function getUserByToken(){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId);
        $responseData = array("data"=>$user);
        return response()->json($responseData, 200);
    }
    function getNameByToken(){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $user = User::find($userId);
        $responseData = array("data"=>$user->name);
        return response()->json($responseData, 200);
    }
}
