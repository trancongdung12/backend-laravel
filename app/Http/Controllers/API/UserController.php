<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
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
    function updateUserProfile(Request $request){
        $token  = request()->header('Authorization');
        $key = "example_key";
        $decoded = JWT::decode($token, $key, array('HS256'));
        $userId = $decoded->user_id;

        $name = $request->name;
        $email= $request->email;
        $user = User::find($userId);
        $image = $request->file("image");
        if($image){
            $image = $request->file("image")->store("public");      
            $user->image = '/storage/'.$image;  
        }
        $user->name = $name;
        $user->email = $email;
        $user->save();
        $responseData = array("data"=>$user);
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
