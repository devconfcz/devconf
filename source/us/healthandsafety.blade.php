@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Boston, USA">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contributors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.svg">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Health & Safety - DevConf.US</title>
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
				<li class="nav-item active px-3">
					<a href="/us/toboston" class="nav-link">Getting to Boston</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/us/healthandsafety" class="nav-link local">Health & Safety</a>
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
		<div class="h1 mx-5 mont-700 underline position-relative">Health & Safety</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
		</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
        <div class="os-400 mx-5 text-left" style="min-height: 40vh">
		<div class="d-block mb-5">
                <h5>This page will be updated regularly with onsite health and safety protocols for the event. The health and safety of our attendees is our top priority as we continue to monitor the venue, local, state, CDC, and WHO guidelines to make informed decisions around onsite safety and requirements with regards to COVID-19.</h5>
			</div>
		    <div class="d-block mb-3 mont-700 h2">Mask Mandate</div>
			<div class="d-block mb-5">
                <h5><b>Masks will be required to be worn at the event.</b> Exceptions are outdoor spaces and while consuming food and beverage indoors when socially distanced from other attendees.
				Masks must be worn over the nose and mouth and should be made out of a tight-knit, non-permeable material. Cloth masks are acceptable, but KN95 or N95 masks are recommended. Scarfs, bandanas, and gators are not permitted to be used as masks.
				Attendees should bring their own masks to the event. Extra masks will be available throughout the event if needed. Speakers will not be required to wear masks while presenting given that social distancing protocols are being followed.</h5>
			</div>
			<div class="d-block mb-3 mont-700 h2">Vaccine Requirement</div>
			<div class="d-block mb-5">
                <h5><b>In-person attendees will be required to be fully vaccinated against the COVID-19 virus.</b> Fully vaccinated is defined as 14 full days after the final dose of a government approved vaccine. All vaccines approved for emergency or full use by the World
				Health Organization will be accepted at the event. List of accepted vaccines can be found <a href="https://covid19.trackvaccines.org/agency/who/" target="_blank">here.</a></h5>
				<h5>Event attendees will be required to show proof of vaccination in order to be admitted to the event. Details on how to present proof of vaccination will be added to this page by June 2022.</h5>
			</div>
			<div class="d-block mb-3 mont-700 h2">Attendee Social Distance Comfort Levels</div>
			<div class="d-block mb-5">
                <h5>We will provide badge stickers in red, yellow, and green for event participants in order to indicate their preference on social distancing comfort level. Please be respectful of each other's comfort level on social distance.</h5>
			</div>
        </div>
	</div>
</section>
@endsection

@include('_layouts.footerus')
