<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MessageController extends Controller
{
    function index(){
         $collection = Message::all()->groupBy('id_seeder');

        //    echo "<pre>".json_encode($collection,JSON_PRETTY_PRINT)."</pre>";
         return view('admin.message.index',['message'=>$collection]);
    }
    function showMessage($userId){
    $collection = Message::all()->groupBy('id_seeder');
    $allMessage =  Message::where("id_seeder", $userId)->orwhere("id_recipient", $userId)->get();
    //    echo "<pre>".json_encode($allMessage,JSON_PRETTY_PRINT)."</pre>";
    return view('admin.message.send',['message'=>$collection,'allmessage'=>$allMessage,'userId'=>$userId]);

    }
    function sendMessage(Request $request){
        $userId = $request->userId;
        $content = $request->messages;
        $messages = new Message();
        $messages->id_seeder = 1;
        $messages->content = $content;
        $messages->id_recipient = $userId;
        $messages->save();
        return redirect('/admin/message/'.$userId);
    }
}
