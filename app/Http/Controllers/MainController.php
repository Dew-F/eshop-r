<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function showAbout()
    {
        return view('about');
    }

    public function showPolitic()
    {
        return view('politic');
    }

    public function showRules()
    {
        return view('rules');
    }
}