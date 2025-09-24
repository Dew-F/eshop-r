<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class HistoryController extends Controller
{
    public function show(){
        $orders = Order::all()->where('UserID', Auth::id());
        return view('history')->with(compact('orders'));
    }

    public function details(Request $request){
        $ordersproducts = OrderProduct::all()->where('OrderID', $request->ID);
        return view('historydetails')->with(compact('ordersproducts'));
    }
}
