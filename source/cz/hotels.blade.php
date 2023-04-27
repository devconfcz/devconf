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
<title>Hotels - DevConf.CZ</title>
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
				<li class="nav-item active underline px-3">
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
		<div class="h1 mx-5 mont-700 underline position-relative">Hotels</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#speakers">For speakers</a>
			<a href="#attendees">For attendees</a>
		</div>
	</div>
</section>
<hr>
<section id="speakers" class="mx-auto mt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h2 mx-5 mont-700 pb-4">For speakers</div>

		<div class="os-400 mx-5">
			<p>To make a reservation, please fill out the accommodation reservation form at <a href="https://cfp.devconf.info/acceptproposals" target="_blank">https://cfp.devconf.info/acceptproposals</a></p>

            <p>By filling out the form, we will auto-generate a reservation email directly to the hotel. If you wish to stay for more than three nights, or if you require a room upgrade beyond the scope of what we offer, please communicate directly with the hotel.</p>
            
            <p><strong>Please make your reservation as soon as possible, as space is limited.</strong></p>
            <p>Accepted DevConf.cz 2023 <strong>sponsored speakers</strong> are eligible to be covered for (up to) three nights of June 15, 16, 17 in a single room at one of our partner hotels listed below. Other premium rooms, all additional nights, “extra person” fees and all other expenses not otherwise mentioned <strong>must be covered separately (e.g. by credit card or cash) in all cases at check-out.</strong></p>

            <p>If you have any questions or concerns, please don't hesitate to contact at <a href="mailto:speakers@devconf.cz">speakers@devconf.cz</a>.</p>
		</div>
	</div>
</section>
<hr>
<section id="attendees" class="mx-auto mt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h2 mx-5 mont-700 pb-4">For attendees</div>
		<div class="os-400 mx-5">
			<p>Attendees can also book rooms at the same hotel as speakers (or even share rooms with them), at the same price, but again, all costs must be covered separately (by credit card or cash) at check-out.</p>
			<p><strong>Bookings through third-party sites (e.g. booking.com), even if they are for one of our partner hotels, will not have the same price.</strong></p>
			<p>Instructions:<br><br>Send your reservation request <strong>TO: <i>hotel reservation email as listed below</i></strong>; making sure to mention:
			<ul>
				<li>your full name</li>
				<li>an ID type (e.g. passport) and ID number (recommended, but optional)</li>
				<li>that you are attending DevConf.CZ</li>
				<li>which nights you want to reserve the room for</li>
			</ul></p>
			
			<p>All prices are per <strong>one night!</strong> The final price for accommodation depends on the partner hotel (accommodation taxes are usually charged on the spot). Contact the partner hotel directly to save your spot and for additional information.
		</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Avanti</div>

			<div class="os-400 mx-5">
				<p><a href="https://www.hotelavanti.cz/en/" target="_blank">https://www.hotelavanti.cz/en/</a></p>
				<p class="alert alert-warning d-inline-block">Less than 10 classic rooms available</p>
				<p>Single Standard room - 1.550 CZK/night<br>
				Double Standard room - 1.990 CZK/night<br>
				<p>The rate is including breakfast.</p>
				<p>Email for making reservations is:<br><a href="mailto:hotel@hotelavanti.cz">hotel@hotelavanti.cz</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Vista</div>

			<div class="os-400 mx-5">
				<p><a href="https://www.vista-hotel.cz/" target="_blank">https://www.vista-hotel.cz/</a></p>
				<p class="alert alert-success d-inline-block">10+ classic rooms available</p>
				<p>Single Standard room 1.550 CZK/night<br>
				Double Standard room 1.750 CZK/night</p>
				<p>The room rate includes buffet breakfast, Wi-Fi and parking.</p>
				<p>Email for making reservations is:<br><a href="mailto:hotel@vista-hotel.cz">hotel@vista-hotel.cz</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Hotel Continental</div>

			<div class="os-400 mx-5">
				<p><a href="https://www.continentalbrno.cz/en/" target="_blank">https://www.continentalbrno.cz/en/</a></p>
				<p class="alert alert-success d-inline-block">10+ classic rooms available</p>
				<p>Single Standard room - 1.600 CZK/night<br>
				Single Superior room - 2.000 CZK/night<br>
				Double Standard room - 2.150 CZK/night<br>
				Double Standard room (used as single room) - 1.800 CZK/night</p>
				<p>The rate is including breakfast.</p>
				<p>Email for making reservations is:<br><a href="mailto:info@continentalbrno.cz">info@continentalbrno.cz</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Grand Hotel</div>

			<div class="os-400 mx-5">
				<p><a href="https://grandhotelbrno.cz/en/" target="_blank">https://grandhotelbrno.cz/en/</a></p>
				<p class="alert alert-danger d-inline-block">No rooms available</p>
				<p>Single Standard room 2.050 CZK/night</p>
				<p>The rate is including breakfast.</p>
				<p>Email for making reservations is:<br><a href="mailto:reservation@grandhotelbrno.cz">reservation@grandhotelbrno.cz</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Hotel Passage</div>

			<div class="os-400 mx-5">
				<p><a href="http://hotelpassage.eu/" target="_blank">http://hotelpassage.eu/</a></p>
				<p class="alert alert-success d-inline-block">10+ classic rooms available</p>
				<p>Single Standard room 2.700 CZK/night<br>
				Double Classic room 3.000 CZK/night</p>
				<p>The rate is including breakfast and Wi-Fi.</p>
				<p>Email for making reservations is:<br><a href="mailto:Rezervace@hotelpassage.eu">Rezervace@hotelpassage.eu</a></p>
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
