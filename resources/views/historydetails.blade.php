@extends('layouts.base')

@section('title', 'История покупок')

@section('content')
	<div class="history">
		<table>
			<tr><td>Наименование</td><td>Количество</td></tr>
			@foreach ($ordersproducts as $value)
				@php
					$product = DB::table('products')->get()->where('ID', $value->ProductID)->first();
				@endphp
				<tr>
					<td>{{$product->Name}}</td>
					<td>{{$value->Count}}</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection
