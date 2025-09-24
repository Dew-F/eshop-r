<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Favourites;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Incoming;
use App\Models\OrderProduct;
use App\Models\Compare;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use App\Models\Unit;

class CompareController extends Controller
{
    public function show()
    {
        $userId = session()->getId();
        $carts = Cart::all()->where('SessionID', $userId);
        $compares = Compare::all()->where('SessionID', $userId);
        $favs = Favourites::all()->where('UserID', Auth::id());
        $products = Product::all();
        $images = ProductImages::all();
        $incoming = Incoming::all();
        $outgoing = OrderProduct::all();
        $pattributes = ProductAttribute::all();
        $attributes = Attribute::all();
        $units = Unit::all();
        $productssubcat = Product::select('SubcategoryID')->whereIn('ID', Compare::select('ProductID')->where('SessionID', $userId))->distinct();
        $subcategories = Subcategory::whereIn('ID', $productssubcat)->get();
        return view('compare')->with(compact('products'))->with(compact('images'))->with(compact('carts'))->with(compact('favs'))->with(compact('incoming'))->with(compact('outgoing'))->with(compact('compares'))->with(compact('subcategories'))->with(compact('pattributes'))->with(compact('attributes'))->with(compact('units'));
    }

    public function add(Request $request)
    {
        Compare::create([
            'ProductID' => $request->ID,
            'SessionID' => session()->getId(),
        ]);
        return redirect()->back();
    }

    public function del(Request $request)
    {
        Compare::all()->where('SessionID', session()->getId())->where('ProductID', $request->ID)->first()->delete();
        return redirect()->back();
    }
}
