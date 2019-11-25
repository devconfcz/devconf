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
<title>Hotels</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Hotels</div>
		<div class="os-400 mx-5">
			<p>Accepted DevConf.cz 2020 <strong>primary speakers</strong> are eligible to be covered for up to three nights in single room at one of our partner hotels listed below. Other premium rooms, 
			all additional nights, “extra person” fees - when extra person is not also a speaker - and all other expenses not otherwise mentioned <strong>must be covered separately (e.g. by credit card or cash) in all cases 
			at check-out!</strong></p>
			<p>Accepted primary speakers will be covered for (up to) 3 nights of January 23, 24, 25.</p>
			<p>If the secondary speaker shares a room with the primary speaker, we can cover the extra cost associated with the second person in the double room. 
			Please let us know in which hotel do you plan to stay at <a href="mailto:speakers@devconf.cz">speakers@devconf.cz</a> before you reach out to the hotel.</p>
			<p>For secondary speakers, who room with a primary speaker, we can cover the extra cost associated with the second person in that double room. Our budget, unfortunately, does not let us buy separate rooms for secondary speakers. If secondary speaker requires a separate room we cannot pay the full price for that room. In the case where a secondary speaker needs a separate room they should contact us at <a href="mailto:speakers@devconf.cz">speakers@devconf.cz</a> for the process and permission first.</p>
			<p>Attendees can also book rooms at the same hotel as speakers (or even share rooms with them), at the same price, but again, all costs must be covered separately (by credit card or cash) at check-out.</p>
			<p>Instructions:<br><br>Send your reservation request <strong>TO: <i>hotel reservation email as listed below</i></strong>; making sure to mention:
			<ul>
				<li>your full name</li>
				<li>an ID type (e.g. passport) and ID number (recommended, but optional)</li>
				<li>that you are attending DevConf.CZ</li>
				<li>which nights you want to reserve the room for</li>
				<li>your hotel code (all primary speakers should receive a code after confirming their presence at the conference)</li>
			</ul></p>
			<p>In the case that NO HOTELS have ‘classic room’ availability or if you have any other issue, write us at <a href="mailto:speakers@devconf.cz">speakers@devconf.cz</a>.</p>
		</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Avanti</div>

		<div class="os-400 mx-5">
			<p><a href="https://www.hotelavanti.cz/en/" target="_blank">https://www.hotelavanti.cz/en/</a></p>
			<p>Single Classic room - 1.500 CZK/night<br>
			Double Classic room - 1.700 CZK/night</p>
			<p><strong>If you book a premium room you will be covered only up to the price of Classic room.</strong></p>
			<p>Single Premium room - 1.650 CZK/night<br>
			Double Premium room - 1.900 CZK/night</p>
			<p>The rate is including breakfast and all taxes.</p>
			<p>Email for making reservations is: <a href="mailto:hotel@hotelavanti.cz">hotel@hotelavanti.cz</a></p>
		</div>
	</div>
</section>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Vista</div>

		<div class="os-400 mx-5">
			<p><a href="https://www.vista-hotel.cz/" target="_blank">https://www.vista-hotel.cz/</a></p>
			<p>Single Classic room 1.450 CZK/night<br>
			Double Classic room 1.650 CZK/night</p>
			<p>The room rate is inclusive of VAT, buffet breakfast, wi-fi and parking.</p>
			<p>Email for making reservations is: <a href="mailto:hotel@vista-hotel.cz">hotel@vista-hotel.cz</a></p>
		</div>
	</div>
</section>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Hotel Continental</div>

		<div class="os-400 mx-5">
			<p><a href="https://www.continentalbrno.cz/en/" target="_blank">https://www.continentalbrno.cz/en/</a></p>
			<p>Single Classic room - 1.350 CZK/night</p>
			<p><strong>If you book a premium room you will be covered only up to the price of Classic room.</strong></p>
			<p>Single Premium room - 1.700 CZK/night<br>
			Double Premium room - 1.980 CZK/night</p>
			<p>The rate is including breakfast and all taxes.</p>
			<p>Email for making reservations is: <a href="mailto:info@continentalbrno.cz">info@continentalbrno.cz</a></p>
		</div>
	</div>
</section>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Grand Hotel</div>

		<div class="os-400 mx-5">
			<p><a href="https://grandhotelbrno.cz/en/" target="_blank">https://grandhotelbrno.cz/en/</a></p>
			<p>Single Classic room 1.650 CZK/night</p>
			<p>The rate is including breakfast and all taxes.</p>
			<p>Email for making reservations is: <a href="mailto:reservation@grandhotelbrno.cz">reservation@grandhotelbrno.cz</a></p>
		</div>
	</div>
</section>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">A-sport</div>

		<div class="os-400 mx-5">
			<p><a href="http://www.a-sporthotel.cz/en/" target="_blank">http://www.a-sporthotel.cz/en/</a></p>
			<p>Single Classic room 1.190 CZK/night</p>
			<p>The rate is including breakfast and all taxes.</p>
			<p>Email for making reservations is: <a href="mailto:brno@a-sporthotel.cz">brno@a-sporthotel.cz</a></p>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
