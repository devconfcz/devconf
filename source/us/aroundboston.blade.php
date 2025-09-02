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
			<div class="d-block mb-3 mont-700 h2">DevConf.US is held at 43 Hawes Street in Boston University.</div>
			<div class="d-block mb-5">
                <p>All events will be held in the 43 Hawes Street building. <a href="https://www.bu.edu/parentsprogram/resources/visiting-boston-hotels/">This site maintained by Boston University</a> has many relevant resources regarding hotels, maps, public transportation, and information specific to the surrounding area. This will be a valuable reference when planning your trip to DevConf.US. </p>
                
                <p>We do not offer any parking at the venue. We highly recommend using public transportation instead of arriving by car. If you arrive by car, you can use various street parking or Longwood Towers Garage at 20 Chapel Street.</p>

				<p>The best way to get to the venue via public transportation is by the Green Line. There are two stops close to the venue: <a href="https://maps.app.goo.gl/7pwcFuhcgjn5WNk37"> Hawes St on the C Line</a> and <a href="https://maps.app.goo.gl/1p2yCydMW9HVnDd3A">Longwood on the D Line</a>.</p>
			</div>
	</div>
</section>

<section class="col-12 px-0" style="height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.9424216505463!2d-71.11198962316156!3d42.34375093613075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e379ed649036eb%3A0xe26d6ed14a8fbedd!2s43%20Hawes%20St%2C%20Brookline%2C%20MA%2002446!5e0!3m2!1sen!2sus!4v1740682936461!5m2!1sen!2sus" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
@endsection

@include('_layouts.footerus')
