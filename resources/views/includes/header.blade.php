@section('header')
<header>
	<div class="header">
		<div class="logo">
			<a href="{{ route('home.showProducts') }}">
				<img src="{{asset('storage/images/logo.png')}}"/>
			</a>
		</div>
		<div class="content">
			<div class="search">
				<form class="form" method="get" action="{{ route('home.search') }}">
					<input class="input outline-none p-10" type="text" name="Name" placeholder="Искать здесь..."/>
					<button class="btn outline-none" type="submit">
					<i class="fa-solid fa-magnifying-glass"></i>
					</button>
				</form>
			</div>
			<div class="nav">
				<ul>
					<li class="li-nav li-br-h p-10">
						<i class="fa-solid fa-chart-simple"></i>
						<a href="{{ route('compare') }}">Сравнить</a>
					</li>
					<li class="li-nav li-br-h p-10">
						<i class="fa-solid fa-heart"></i>
						<a href="{{route('fav.show')}}">Избранное</a>
					</li>
					<li class="li-nav li-br-h p-10">
						<i class="fa-solid fa-cart-shopping"></i>
						<a href="{{route('cart.show')}}">Корзина</a>
					</li>
					@auth
						<li class="li-nav li-br-h p-10">
							<i class="fa-solid fa-user"></i>
							<a href="{{route('profile')}}">Личный кабинет</a>
						</li>
					@else
						<li class="li-nav li-br-h p-10">
							<i class="fa-solid fa-user"></i>
							<a href="{{route('auth.show')}}">Войти</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</header>
