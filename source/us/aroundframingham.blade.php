@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Virtual">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Getting around Framingham - DevConf.US</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/us"><img src="/assets/images/devconf-logo-us-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/us/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/us/aroundframingham" class="nav-link">Getting around Framingham</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/toframingham" class="nav-link">Getting to Framingham</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/faq" class="nav-link">FAQ</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/coc" target="_blank" class="nav-link">Policies</a>
				</li>
			</ul>
		</div>
	</nav>
</header>

<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Getting around Framingham</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="os-400 mx-5 text-center" style="min-height: 40vh">
			<strong class="d-block mb-3 os-600">We will post our 'Getting around Framingham' in March 2020.</strong>
		</div>
	</div>
</section>

<section class="col-12 px-0" style="height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2951.0950292770904!2d-71.48131544837175!3d42.29783767908894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e38a27a40998f7%3A0xc901f7bfb3e62eaa!2sSheraton%20Framingham%20Hotel%20%26%20Conference%20Center!5e0!3m2!1scs!2scz!4v1581493814798!5m2!1scs!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
@endsection

@include('_layouts.footerus')
