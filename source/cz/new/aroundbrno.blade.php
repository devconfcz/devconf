@extends('_layouts.secondary')

@section('social')
<meta property="og:title" content="DevConf.cz | Brno, Czechia">
<meta property="og:site_name" content="DevConf.cz">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-cz-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Getting around Brno - DevConf.CZ 2020</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/cz"><img src="/assets/images/devconf-logo-cz-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/cz/#about" class="nav-link">About & Topics</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#news" class="nav-link">News</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#schedule" class="nav-link">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#travel" class="nav-link">How to get here?</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/cz/faq"class="nav-link">FAQ</a>
				</li>
			</ul>
		</div>
	</nav>
</header>

@include('_layouts.secondarymenucz')

<section id="news" class="mx-auto py-5 col-lg-11 border-bottom">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Getting around Brno</div>
	</div>
	<div class="row">
</section>

<section id="plane" class="mx-auto col-lg-11"></section>
<section id="train" class="mx-auto col-lg-11"></section>
<section id="bus" class="mx-auto col-lg-11"></section>
<section id="car" class="mx-auto col-lg-11"></section>


@include('_layouts.footercz')
@endsection
