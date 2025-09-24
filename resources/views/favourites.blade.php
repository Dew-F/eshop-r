@extends('layouts.base')

@section('title', 'Избранное')

@section('content')
    @if ($favs->count() > 0) 
    @foreach ($favs as $fav)
        @php
        $pimage = $images->where('ProductID', $fav->ProductID)->where('Num', 0)->first()->Image;
        $pname = $products->where('ID', $fav->ProductID)->first()->Name;
        $pid = $fav->ProductID;
        $pshort = $products->where('ID', $fav->ProductID)->first()->ShortDescription;
        $pprice = $products->where('ID', $fav->ProductID)->first()->Price;
        $favcount = $favs->where('UserID', Auth::id())->where('ProductID', $fav->ProductID)->count();
        $cartscount = $carts->where('UserID', Auth::id())->where('ProductID', $fav->ProductID)->count();
        $comparecount = $compares->where('ProductID', $fav->ProductID)->count();
        @endphp
        @include('includes.product_table')
    @endforeach
    @else
        <span class="empty">Нет избранных товаров</span>
    @endif
@endsection
