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
<title>Getting around Boston - DevConf.US</title>
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
					<a href="/us/aroundboston" class="nav-link">Getting around Boston</a>
				</li>
				<li class="nav-item active px-3">
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
		<div class="h1 mx-5 mont-700 underline position-relative">Getting around Boston</div>
	</div>
</section>
<hr>

<section class="mx-auto col-lg-11">
	<div class="row">
			<div class="d-block mb-3 mont-700 h2">Venue Map</div>
			<div class="d-block mb-5">
				<img src="/assets/images/gsu-map.png" alt="Venue Map" style="width:900px;height:1000px;">
			</div>
	</div>
</section>

<section class="mx-auto col-lg-11">
	<div class="row">
			<div class="d-block mb-3 mont-700 h2">Nearby Food & Attractions</div>
			<div class="d-block mb-5">
				<img src="/assets/images/surroundings-map.png" alt="Nearby food & attractions" style="width:1200px;height:900px;">
			</div>
	</div>
</section>

<section class="mx-auto col-lg-11">
	<div class="row">
			<div class="d-block mb-3 mont-700 h2">DevConf.US is held in the heart of Boston University.</div>
			<div class="d-block mb-5">
                <h5>Almost all events will be held in the George Sherman Union building. <a href="https://www.bu.edu/parentsprogram/resources/visiting-boston-hotels/">This site maintained by Boston University</a> has many relevant resources regarding hotels, maps, public transportation, and information specific to the surrounding area. This will be a valuable reference when planning your trip to DevConf.US. </h5>
			</div>
	</div>
</section>

<section class="col-12 px-0" style="height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.6188220868894!2d-71.11119608434431!3d42.350649543688235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3799a143c678d%3A0xea29504c466d44b7!2sBoston%20University%20George%20Sherman%20Union!5e0!3m2!1sen!2scz!4v1572510484342!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</section>
@endsection

@include('_layouts.footerus')
