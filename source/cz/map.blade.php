@extends('_layouts.page')

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
<title>Map - DevConf.CZ</title>
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
					<a href="/cz/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/aroundbrno" class="nav-link">Getting around Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/tobrno" class="nav-link">Getting to Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/faq" class="nav-link">FAQ</a>
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
		<div class="h1 mx-5 mont-700 underline position-relative">Map</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5 mt-4 os-400 row">
		    <div class="col-xl-3 container card-body my-2 ml-xl-auto mr-xl-3">
			    <div class="row h-100 align-items-center">
				    <div class="col text-center">
                        <a href="/assets/images/devconf-cz-map-underground.png"><img class="w-100" src="/assets/images/devconf-cz-map-underground.png"></a>
					    <h4 class="mont-700 mb-0">Underground level floor plan</h4>
				    </div>
			    </div>
		    </div>
		    
		    <div class="col-xl-3 container card-body my-2 mx-xl-3">
			    <div class="row h-100 align-items-center">
				    <div class="col text-center">
					    <a href="/assets/images/devconf-cz-map-street.png"><img class="w-100" src="/assets/images/devconf-cz-map-street.png"></a>
					    <h4 class="mont-700 pb-4">Street level floor plan</h4>
				    </div>
			    </div>
		    </div>
		    
		    <div class="col-xl-3 container card-body my-2 ml-xl-3 mr-xl-auto">
			    <div class="row h-100 align-items-center">
				    <div class="col text-center">
					    <a href="/assets/images/devconf-cz-map-floor.png"><img class="w-100" src="/assets/images/devconf-cz-map-floor.png"></a>
					    <h4 class="mont-700 pb-4">Upper level floor plan</h4>
				    </div>
			    </div>
		    </div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
