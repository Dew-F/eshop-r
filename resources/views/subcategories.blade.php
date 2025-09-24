@extends('layouts.base')

@section('title', 'Категории')

@section('content')
   <div class="subcategory-container">
      @foreach ($subcats as $sub)
         <a href="{{route('home.showProducts')}}?subcategory={{ $sub->ID }}&category={{ $sub->CategoryID}}">
            <div class="subcategory-block b p-10">
               <img class="subcategory-block-image-container" src="storage/images/subcategories/{{$sub->Image}}" />
               <span class="subcategory-block-name">{{ $sub->Name }}</span>
            </div>
         </a>
      @endforeach
   </div>
@endsection
