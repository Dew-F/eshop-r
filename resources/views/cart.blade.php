@extends('layouts.base')

@section('title', 'Корзина')

@section('content')
    <div class="cart">
        @if ($carts->count() > 0) 
        @php
        $total = 0;
        @endphp
        @foreach ($carts as $cart)
        @php
        $pid = $cart->ProductID;
        @endphp
        <div class="products b p-10">
            <img class="image" src="storage/images/products/{{$images->where('ProductID', $cart->ProductID)->first()->Image}}"/>
            <span class="name">{{$products->where('ID', $cart->ProductID)->first()->Name}}</span>
            <span class="short">{{$products->where('ID', $cart->ProductID)->first()->ShortDescription}}</span>
            <span class="price">{{$products->where('ID', $cart->ProductID)->first()->Price}} &#x20bd;</span>
            @php
            $incoming_count = $incoming->where('ProductID', $pid)->sum('Count') ?? 0;
            $outgoing_count = $outgoing->where('ProductID', $pid)->sum('Count') ?? 0;
            $total_count = $incoming_count - $outgoing_count;
            @endphp
            <div class="counter">
                <form action="{{ route('cart.countChange') }}" method="POST" class="form">
                    @csrf
                    <input type="hidden" value="{{ $cart->ID }}" name="ID">
                    <input type="number" step="1" max="{{$total_count}}" name="Count" min="0" onchange="this.form.submit(); $(this).prop('disabled', true);" class="count submit inputblocked" value="{{$cart->Count}}" />
                </form>
            </div>
            <div class="delete">
                <form action="{{ route('cart.deleteProduct') }}" method="POST" class="form">
                    @csrf
                    <input type="hidden" value="{{ $cart->ID }}" name="ID">
                    <button type="submit" class="button">Удалить</button>
                </form>
            </div>
            <span class="count">На складе: {{  $total_count  }} шт.</span>
        </div>
        @php
        $total += $products->where('ID', $cart->ProductID)->first()->Price * $cart->Count;
        @endphp
        @endforeach
        <form action="{{ route('order.showSettings') }}" method="POST">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">
            <button type="submit" class="button">Оплатить</button>
        </form>
        <form action="{{ route('cart.clear') }}" method="POST">
            @csrf
            <button type="submit" class="button">Очистить корзину</button>
        </form>
        <span class="total">Итого: {{$total}}</span>
        @else
        <span class="empty">Корзина пуста</span>
        @endif
    </div>
@endsection
