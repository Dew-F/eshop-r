<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Ticket;

class OrderController extends Controller
{
    public function show()
    {
        return view('order');
    }

    public function showSettings(Request $request)
    {
        $total = $request->total;
        return view('orderdetails')->with(compact('total'));
    }

    public function buy(Request $request)
    {
        if ($request->paymethod == "Онлайн") {
            if ($request->paystatus) {
                    $order = Order::create([
                    'UserID' => Auth::id(),
                    'PayStatus' => $request->paystatus,
                    'DeliveryMethod' => $request->deliverymethod,
                    'PayMethod' => $request->paymethod,
                    'FullName' => $request->fullname,
                    'Telephone' => $request->telephone,
                    'Email' => $request->email,
                    'Total' => $request->total,
                    'OrderStatus' => 0
                ]);
                $carts = Cart::all()->where('SessionID', session()->getId());
                foreach($carts as $cart) {
                    OrderProduct::create([
                        'OrderID' => $order->ID,
                        'ProductID' => $cart->ProductID,
                        'Count' => $cart->Count,
                    ]);
                }
                Cart::where('SessionID', session()->getId())->delete();
                $orderid = $order->ID;
                $orderproducts = OrderProduct::select('ProductID')->where('OrderID', $orderid);
                $orderproductst = OrderProduct::where('OrderID', $orderid)->get();
                $products = Product::whereIn('ID', $orderproducts)->get();
                $ordercur = Order::where('ID', $orderid)->first();
                try {
                    Mail::to($order->Email)->send(new Ticket($ordercur, $products, $orderproductst));
                }
                catch(\Exception $e){         
                }
            }
        }
        else {
            $order = Order::create([
                'UserID' => Auth::id(),
                'PayStatus' => 0,
                'DeliveryMethod' => $request->deliverymethod,
                'PayMethod' => $request->paymethod,
                'FullName' => $request->fullname,
                'Telephone' => $request->telephone,
                'Email' => $request->email,
                'Total' => $request->total,
                'OrderStatus' => 0
            ]);
            $carts = Cart::all()->where('SessionID', session()->getId());
            foreach($carts as $cart) {
                OrderProduct::create([
                    'OrderID' => $order->ID,
                    'ProductID' => $cart->ProductID,
                    'Count' => $cart->Count,
                ]);
            }
            Cart::where('SessionID', session()->getId())->delete();
        }
        return redirect()->route('home.showProducts');
    }
}
