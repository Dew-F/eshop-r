<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Favourites;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Incoming;
use App\Models\OrderProduct;
use App\Models\Compare;

class FavouritesController extends Controller
{
    public function show()
    {
        $favs = Favourites::all()->where('UserID', Auth::id());
        $products = Product::all();
        $carts = Cart::all()->where('UserID', Auth::id());
        $images = ProductImages::all();
        $incoming = Incoming::all();
        $outgoing = OrderProduct::all();
        $compares = Compare::all()->where('SessionID', session()->getId());
        return view('favourites')->with(compact('favs'))->with(compact('products'))->with(compact('images'))->with(compact('carts'))->with(compact('incoming'))->with(compact('outgoing'))->with(compact('compares'));
    }

    public function addToFav(Request $request)
    {
        Favourites::create([
            'ProductID' => $request->ID,
            'UserID' => Auth::id(),
        ]);
        return redirect()->back();
    }

    public function delFav(Request $request)
    {
        Favourites::all()->where('UserID', Auth::id())->where('ProductID', $request->ID)->first()->delete();
        return redirect()->back();
    }
}
