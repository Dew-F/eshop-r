<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Incoming;
use App\Models\OrderProduct;

class CartController extends Controller
{
    public function show()
    {
        $userId = session()->getId();
        $carts = Cart::all()->where('SessionID', $userId);
        $products = Product::all();
        $images = ProductImages::all();
        $incoming = Incoming::all();
        $outgoing = OrderProduct::all();
        return view('cart')->with(compact('carts'))->with(compact('products'))->with(compact('images'))->with(compact('incoming'))->with(compact('outgoing'));
    }

    public function countChange(Request $request){
        $cart = Cart::all()->where('ID', $request->ID)->first();
        $count = $request->Count;
        if ($count > 0){
            $this->changeCount($request->ID, $count);
        } else {
            $this->delProduct($request->ID);
        }
        return redirect()->back();
    }

    public function deleteProduct(Request $request){
        $this->delProduct($request->ID);
        return redirect()->back();
    }

    public function changeCount($id, $count)
    {
        Cart::find($id)->update([
            'Count' => $count,
        ]);
    }

    public function delProduct($id)
    {
        Cart::find($id)->delete();
    }
    
    public function addToCart(Request $request)
    {
        Cart::create([
            'ProductID' => $request->ID,
            'SessionID' => session()->getId(),
            'Count' => '1',
        ]);
        return redirect()->back();
    }

    public function clear()
    {
        Cart::where('SessionID', session()->getId())->delete();
        return redirect()->back();
    }
}
