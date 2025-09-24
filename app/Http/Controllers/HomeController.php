<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Cart;
use App\Models\Favourites;
use App\Models\Incoming;
use App\Models\OrderProduct;
use App\Models\Compare;

class HomeController extends Controller
{
    public function showProducts()
    {
        $subcatid = isset($_GET['subcategory']) ? $_GET['subcategory'] : null;
        if ($subcatid == null){
            $products = Product::all();
        } else {
            $products = Product::all()->where('SubcategoryID', $subcatid);
        }
        $images = ProductImages::all();
        $carts = Cart::all()->where('SessionID', session()->getId());
        $favs = Favourites::all()->where('UserID', Auth::id());
        $incoming = Incoming::all();
        $outgoing = OrderProduct::all();
        $compares = Compare::all()->where('SessionID', session()->getId());
        return view('index')->with(compact('products'))->with(compact('images'))->with(compact('carts'))->with(compact('favs'))->with(compact('incoming'))->with(compact('outgoing'))->with(compact('compares'));
    }

    public function search(Request $request)
    {
        $products = Product::where('Name','LIKE', '%'.$request->Name.'%')->get();
        $images = ProductImages::all();
        $carts = Cart::all();
        $favs = Favourites::all();
        $incoming = Incoming::all();
        $outgoing = OrderProduct::all();
        $compares = Compare::all()->where('SessionID', session()->getId());
        return view('index')->with(compact('products'))->with(compact('images'))->with(compact('carts'))->with(compact('favs'))->with(compact('incoming'))->with(compact('outgoing'))->with(compact('compares'));
    }
}
