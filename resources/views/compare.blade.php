@extends('layouts.base')

@section('title', 'Сравнение товаров')

@section('content')
<div class="compare">
	<div class="tabs">
		@php
			$first = true;
		@endphp
		@foreach ($subcategories as $subcategory)
			@if ($first)
				<div class="tab active" title="{{ $subcategory->Name }}">
				@php
					$first = false;
				@endphp
			@else
				<div class="tab" title="{{ $subcategory->Name }}">
			@endif
					<div class="list b p-10">
						<div class="row">
							<div class="item table-title">Название</div>
							@foreach ($compares as $compare)
								@if ($products->where('ID', $compare->ProductID)->first()->SubcategoryID == $subcategory->ID)
									<div class="item table-title">
										{{ $products->where('ID', $compare->ProductID)->first()->Name }}
										<form method="post" action="{{ route('compare.del') }}">
											@csrf
											<input type="hidden" name="ID" value="{{$compare->ProductID}}" />
											<button class="close">x</button>
										</form>
									</div>
								@endif
							@endforeach
						</div>
					@foreach ($attributes->where('SubcategoryID', $subcategory->ID) as $attribute)
						<div class="row">
						<div class="item name">{{ $attribute->Name }}</div>
						@foreach ($compares as $compare)
							@if ($products->where('ID', $compare->ProductID)->first()->SubcategoryID == $subcategory->ID)
								<div class="item value">{{ $pattributes->where('ProductID', $compare->ProductID)->where('AttributeID', $attribute->ID)->first()->Value }} {{ $units->where('ID', $attribute->UnitID)->first()->ShortName }}</div>
							@endif
						@endforeach
						</div>
					@endforeach
					</div>
	               </div>
		@endforeach
    </div>
</div>
@endsection
