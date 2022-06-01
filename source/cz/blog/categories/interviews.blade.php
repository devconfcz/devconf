---
title: Categories
description: The list of categories for the site
category: interviews
pagination:
    collection: posts 
    perPage: 99 
---
@extends('_layouts.blogmaster')

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/blogsite.css', 'assets/build') }}">
@endsection

@section('body')
<section class="mx-auto mt-5 pt-5 pb-5 col-lg-8">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Interviews</div>
	</div>

	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
            <hr class="border-b my-6">

    @foreach ($pagination->items as $post)
        @if ($post->categories && in_array($page->category, $post->categories))
        @include('_components.post-preview-inline')
        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
        @endif
    @endforeach

        </div>
    </div>
</section>
@stop

@include('_layouts.footercz')
