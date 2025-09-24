@extends('layouts.base')

@section('title', 'Главная страница')

@section('content')
    @foreach ($products as $product)
        @php
        $pimage = $images->where('ProductID', $product->ID)->where('Num', 0)->first()->Image;
        $pname = $product->Name;
        $pid = $product->ID;
        $pshort = $product->ShortDescription;
        $pprice = $product->Price;
        $favcount = $favs->where('ProductID', $product->ID)->count();
        $cartscount = $carts->where('ProductID', $product->ID)->count();
        $comparecount = $compares->where('ProductID', $product->ID)->count();

        @endphp
        @include('includes.product_table')
    @endforeach
    
@endsection
