@extends('_layouts.blogpost')

@php
    $page->type = 'article';
@endphp

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/blogsite.css', 'assets/build') }}">
@endsection

@section('body')
<section class="mx-auto mt-5 pt-5 pb-5 col-lg-6">
	<div class="row px-3">
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="w-100 mb-2">
    @endif

    <div class="h1 mt-3 mr-5 mont-700 underline position-relative">{{ $page->title }}</div>

    <p class="mont-600 mt-3 mb-4">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    <div class="os-400">
        @yield('content')
    </div>

    <hr class="w-100">
    
    <div class="d-flex justify-content-between  w-100 mt-4">
        <div class="d-inline-block">
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}" class="mont-400 px-3 pagination">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div class="d-inline-block">
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}" class="mont-400 px-3 pagination">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </div>
    </div>
</section>
@endsection

@include('_layouts.footercz')
