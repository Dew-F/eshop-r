<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>
	<link rel="shortcut icon" href="{{asset('storage/images/favicon.ico')}}"/>
	<link rel="stylesheet" href="css/app.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/9c14c0aaf4.js" crossorigin="anonymous"></script>
</head>
<body>
	@include('includes.header')
	<div class="container">
		@include('includes.aside')
		@include('includes.main')
	</div>
	@include('includes.footer')
	<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
