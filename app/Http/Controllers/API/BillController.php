<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Firebase\JWT\JWT;
use App\Bill;
class BillController extends Controller
{
    function store(Request $request){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $cart = $request->cart;

        $bills = new Bill();
        $bills->user_id = $userId;
        $bills->name = $name;
        $bills->phone = $phone;
        $bills->email = $email;
        $bills->address = $address;
        $bills->cart = $cart;
        $bills->save();
        $responseData = array("data"=>null);
        return response()->json($responseData, 200);
    }
}
