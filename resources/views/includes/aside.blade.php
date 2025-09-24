@section('aside')
<aside class="aside p-10">
	<ul class="aside-sticky">
		@if (Request::is('profile') || Request::is('tables') || Request::is('edit') || Request::is('history') || Request::is('historydetails'))
			@auth
				@if (auth()->user()->RoleID == 2)
					<li class="li-nav li-br-v p-10">
						<i class="fa-solid fa-pen-to-square"></i>
						<a href="{{ route('tables') }}">Редактировать таблицы</a>
					</li>
				@endif
				<li class="li-nav li-br-v p-10">
						<i class="fa fa-history"></i>
						<a href="{{route('history')}}">История покупок</a>
				</li>
				<li class="li-nav li-br-v p-10">
						<i class="fa fa-sign-out"></i>
						<a href="{{route('logout')}}">Выйти из аккаунта</a>
				</li>
			@endif
		@else
		@php
			$num = $_GET['category'] ?? 0;
		@endphp
		@foreach ($categories as $category)
			@if ($num == $loop->iteration)
				<li class="li-nav li-br-v p-10 active">
					<i class="{{ $category->Icon }}"></i>
					<a href="{{route('subcategory.show')}}?category={{ $category->ID }}">{{ $category->Name }}</a>
				</li>
			@else
				<li class="li-nav li-br-v p-10">
					<i class="{{ $category->Icon }}"></i>
					<a href="{{route('subcategory.show')}}?category={{ $category->ID }}">{{ $category->Name }}</a>
				</li>
			@endif
		@endforeach
		@endif
	</ul>
</aside>
