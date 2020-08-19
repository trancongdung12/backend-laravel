<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Bill;
use App\Product;
use App\Message;
class DashboardController extends Controller
{
    function index(){
        $user = count(User::all());
        $bill = count(Bill::all());
        $product = count(Product::all());
        $message = count(Message::all());
        $data = array(
            "user" => $user,
            "bill" => $bill,
            "product" => $product,
            "message" => $message
          );
        return view('admin.dashboard',['data'=>$data]);
    }
}
