<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bill;
class BillController extends Controller
{
    function index(){
        $bills = Bill::all();
        return view('admin.bill.index',[ 'bill'=>$bills]);
    }
}
