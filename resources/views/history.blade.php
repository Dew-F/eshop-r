@extends('layouts.base')

@section('title', 'История покупок')

@section('content')
	<div class="history">
		<table>
			<tr><td>Номер</td><td>Дата</td><td>Статус оплаты</td><td>Статус доставки</td><td>Телефон</td><td>Адрес</td><td>Итого</td><td></td></tr>
			@foreach ($orders as $order)
				<tr>
					<td>{{$order->ID}}</td>
					<td>{{$order->CreatedAt}}</td>
					<td>
						@if ($order->PayStatus)
							Успешно
						@else
							Ожидается
						@endif
					</td>
					<td>@if ($order->DeliveryMethod == "Самовывоз")
							Самовывоз
						@else
							@if ($order->OrderStatus)
								Доставлено
							@else
								В пути
							@endif
						@endif</td>
					<td>{{$order->Telephone}}</td>
					<td>{{ $order->Address ?? "-" }}
					</td>
					<td>{{$order->Total}}</td>
					<td>
						<form action="{{ route('history.details') }}" method="GET">
							<input type="hidden" name="ID" value="{{ $order->ID }}">
							<button class="button submit" type="submit">Просмотреть товары</button>
						</form>
					</td>
				</tr>
			@endforeach
		</table>
	</div>
@endsection
