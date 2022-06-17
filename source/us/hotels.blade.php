@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US | Boston, USA">
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
<title>Hotels - DevConf.US</title>
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
				<li class="nav-item active underline px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
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
		<div class="h1 mx-5 mont-700 underline position-relative">Suggested Hotels</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
			<div class="d-block mb-3 mont-700 h2">DevConf.US is held in the heart of Boston University.</div>
			<div class="d-block mb-5">
                <h5>Almost all events will be held in the George Sherman Union building. <a href="https://www.bu.edu/parentsprogram/resources/visiting-boston-hotels/">This site maintained by Boston University</a> has many relevant resources regarding hotels, maps, public transportation, and information specific to the surrounding area. This will be a valuable reference when planning your trip to DevConf.US. </h5>
			</div>
            <div class="d-block mb-5 mont-700 h2">Hotels Near Campus</div>
			<div class="d-block mb-5">
                <h5><a href="https://www.hotelcommonwealth.com/?_vsrefdom=commonwealth-ppc&amp;gclid=Cj0KCQiA-K2MBhC-ARIsAMtLKRuGc7MUVmJ6t8RIX0MtI6m_jzGYJSIdaxDdc39ya7-pBLqyMqQrTGIaAhrOEALw_wcB&amp;gclsrc=aw.ds">Hotel Commonwealth</a>, 0.5 miles (easily accessible by T)</h5>
                <h5><a href="https://www.reservations.com/hotel/howard-johnson-inn-fenway-park?rmcid=tophotels&amp;utm_source=googleads&amp;gclid=Cj0KCQiA-K2MBhC-ARIsAMtLKRudTil3C7M2g4uAg7j17ffUbyMpLAOVRL9D9ZnuadAj9VHPNiqQINYaAuAQEALw_wcB">The Verb Hotel</a>, 0.6 miles</h5>
                <h5><a href="https://www.hilton.com/en/book/reservation/deeplink/?&amp;ctyhocn=BOSBBGI&amp;corporateCode=6384738&amp;flexibleDates=true">Hilton Garden Inn Boston/Brookline</a>, 1.3 miles</h5>
                <h5><a href="<https://www.marriott.com/hotels/travel/bosfn-residence-inn-boston-back-bay-fenway/?scid=bb1a189a-fec3-4d19-a255-54ba596febe2&amp;y_source=1_MjgxODg3OC03MTUtbG9jYXRpb24uZ29vZ2xlX3dlYnNpdGVfb3ZlcnJpZGU%3D/">Residence Inn by Mariott</a>, 0.4 miles</h5>
                <h5><a href="https://beaconinn.com/">Beacon Inn</a>, 0.5 miles</h5>
                <h5><a href="https://www.hotels.com/ho749515008/?q-check-in=2021-11-10&amp;q-check-out=2021-11-11&amp;q-rooms=1&amp;q-room-0-adults=2&amp;q-room-0-children=0">Fenway Luxury Suites by Sonder</a>, 0.5 miles</h5>
                <h5><a href="https://www.eliothotel.com/">The Elliot Hotel</a>, 0.9 miles (easily accessible by T)</h5>
                <h5><a href="https://www.hilton.com/en/hotels/bosbhhh-hilton-boston-back-bay/">Hilton Boston Backbay</a>, 1.1 Miles (easily accessible by T)</h5>
                <h5><a href="https://www.marriott.com/hotels/travel/bosbo-sheraton-boston-hotel/">Sheraton Boston Hotel</a>, 1.1 miles (easily accessible by T)</h5>
			</div>
	</div>
</section>
@endsection

@include('_layouts.footerus')
