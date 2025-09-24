@extends('layouts.base')

@section('title', ''.$product->Name)

@section('content')
	<div class="product">
		@php
		$pid = $product->ID;
		$favcount = $favs->where('SessionID', session()->getId())->where('ProductID', $pid)->count();
	    $cartscount = $carts->where('SessionID', session()->getId())->where('ProductID', $pid)->count();
		@endphp
		<div class="title">{{ $product->Name }}</div>
	    <div class="form b p-10">
	    	<div class="gallery">
	    		@foreach($images as $image)
	    			<img class="image b" src="storage/images/products/{{ $image->Image }}" />
	    		@endforeach
	    	</div>
	    	<img id="frameimage" class="image" src="storage/images/products/{{ $images->where('Num', 0)->first()->Image }}" />
	    	<div class="short">
	    		<b>Краткое описание:</b><br/>
	    		{{ $product->ShortDescription }}
	    	</div>
	    	<div class="module products">
	    		<span class="price">{{ $product->Price }} &#x20bd;</span>
			    @if ($favcount <= 0)
			        <form action="{{ route('fav.addToFav') }}" method="POST" class="fav p-10">
			            @csrf
			            <input type="hidden" value="{{ $product->ID }}" name="ID">
			            <button type="submit" class="button"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
			        </form>
			    @else
			        <form action="{{ route('fav.delFav') }}" method="POST" class="fav p-10">
			            @csrf
			            <input type="hidden" value="{{ $pid }}" name="ID">
			            <button type="submit" class="button activated"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
			        </form>
			    @endif
			    @if ($cartscount <= 0)
			        <form action="{{ route('cart.addToCart') }}" method="POST" class="buy p-10">
			            @csrf
			            <input type="hidden" value="{{ $pid }}" name="ID">
			            <button type="submit" class="button">Купить</button>
			        </form>
			    @else
			        <a href="cart" class="buy p-10">
			            <button type="submit" class="button activated">
			                В корзине
			            </button>
			        </a>
			    @endif
	    	</div>
	    </div>
	    <br/>
	    <div class="attributes">
		    <div class="title">Характеристики</div>
		    <div class="list b p-10">
		    	@foreach($productAttributes as $attribute)
				<div class="name">{{ $attributes->where('ID', $attribute->AttributeID)->first()->Name }}</div>
				<div class="value">{{ $attribute->Value }} {{ $units->where('ID', $attributes->where('ID', $attribute->AttributeID)->first()->UnitID)->first()->ShortName }}</div>
				@endforeach
		    </div>
		    <br/>
		    <div class="title">Описание</div>
		    <div class="description b p-10">{{ $product->FullDescription }}</div>
	    </div>
    </div>
@endsection
