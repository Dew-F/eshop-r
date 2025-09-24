@section('main')
<main class="main p-10">
	@yield('content')
    @if ($message = Session::get('success'))
    	<div class="block-message success b p-10">{{ $message }}</div>
    @endif
    @if ($errors->any())
    	<div class="block-message errors b p-10">
	        @foreach ($errors->all() as $error)
	            <li>{{ $error }}</li>
	        @endforeach
        </div>
    @endif
</main>
