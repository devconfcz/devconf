---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.blogmaster')

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/blogsite.css', 'assets/build') }}">
@endsection

@section('body')
<section class="mx-auto mt-5 pt-5 pb-5 col-lg-8">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Blog</div>
	</div>

	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
            <hr class="border-b my-6">


    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="pagination mr-3 px-4 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="pagination mr-3 px-4 py-3 {{ $pagination->currentPage == $pageNumber ? 'current' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="pagination mr-3 px-4 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
        </div>
    </div>
</section>
@stop

@include('_layouts.footercz')
