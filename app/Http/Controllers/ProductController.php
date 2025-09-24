<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Favourites;

class ProductController extends Controller
{
    public function show()
    {
        $product = Product::all()->where('ID', $_GET['pid'])->first();
        $images = ProductImages::all()->where('ProductID', $_GET['pid']);
        $productAttributes = ProductAttribute::all()->where('ProductID', $_GET['pid']);
        $attributes = Attribute::all();
        $units = Unit::all();
        $favs = Favourites::all()->where('UserID', Auth::id());
        $carts = Cart::all()->where('UserID', Auth::id());
        return view('product')->with(compact('product'))->with(compact('images'))->with(compact('attributes'))->with(compact('productAttributes'))->with(compact('units'))->with(compact('favs'))->with(compact('carts'));
    }
}
