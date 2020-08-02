<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Message;
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
    function getMessageByToken(){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;
        $checkMessage = Message::where("id_seeder",$userId)->get();
        if (count($checkMessage)>0) {
            $allMessage =  Message::where("id_seeder", $userId)->orwhere("id_seeder", 1)->get();
            foreach ($allMessage as $allMessages) {
                $allMessages->users;
            }

            $responseData = array(["data"=>$allMessage,"id_user"=>$userId]);
            return response()->json($responseData, 200);
        }else{
            return response()->json(1, 200);
        }

    }
    function sendMessage(Request $request){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;

        $content = $request->content;
        $id_recipient = $request->id_recipient;
        $message = new Message();
        $message->id_seeder = $userId;
        $message->content = $content;
        $message->id_recipient = $id_recipient;
        $message->save();

        $allMessage =  Message::orwhere("id_seeder",$userId)->orwhere("id_seeder",1)->get();
        foreach($allMessage as $allMessages){
            $allMessages->users;
        }

        $responseData = array("data"=>$allMessage);
        return response()->json($responseData, 200);
    }
}
