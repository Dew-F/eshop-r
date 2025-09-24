<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;

class SubcategoryController extends Controller
{
    public function show()
    {
        $catid = $_GET['category'];
        $catname = Category::where('ID', $catid)->first()->Name;
        $subcats = Subcategory::all()->where('CategoryID', $catid);
        return view('subcategories')->with(compact('catname'))->with(compact('subcats'));
    }
}
