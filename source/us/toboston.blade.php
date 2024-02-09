@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Boston, USA">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Getting to Boston - DevConf.US</title>
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
				<li class="nav-item active px-3">
					<a href="/us/aroundboston" class="nav-link">Getting around Boston</a>
				</li>
				<li class="nav-item underline active px-3">
					<a href="/us/toboston" class="nav-link">Getting to Boston</a>
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
		<div class="h1 mx-5 mont-700 underline position-relative">Getting to Boston</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
			<div class="d-block mb-3 mont-700 h2">There are many ways to travel to Boston.</div>
			<div class="d-block mb-5">
                <h5><a href="https://www.bostonusa.com/plan/transportation/getting-here/">Check out this comprehensive site</a> with information regarding air, bus, car, and train travel to and from Boston.</h5>
			</div>
			<div class="d-block mb-3 mont-700 h2">DevConf.US is held in the heart of Boston University.</div>
			<div class="d-block mb-5">
                <h5>Almost all events will be held in the George Sherman Union building. <a href="https://www.bu.edu/parentsprogram/resources/visiting-boston-hotels/">This site maintained by Boston University</a> has many relevant resources regarding hotels, maps, public transportation, and information specific to the surrounding area. This will be a valuable reference when planning your trip to DevConf.US. </h5>
			</div>
	</div>
</section>
@endsection

@include('_layouts.footerus')
