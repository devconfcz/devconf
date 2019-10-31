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
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#public">Public transport</a>
			<a href="#taxi">Taxi</a>
			<a href="#venue">Getting to the venue</a>
		</div>
	</div>
</section>
<hr>
<section id="public" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By public transport</div>

		<div class="os-400 mx-5">
			<p>Public transportation in Brno is provided by <a href="https://dpmb.cz/en/novinky/all" target="_blank">DPMB</a> which maintains trams, trolley-buses and buses that criss-cross the city. 
               At night all public transportation is provided by night buses that cover almost the entire city.
               If you want to use public transportation, you must buy a ticket before you board the tram, trolleybus or bus.
               You need to purchase a two-zone ticket for zones 100+101 for any trip in the city of Brno.
               Single journey tickets can be bought from machines (coins only at most stops, credit cards accepted at major stops like the train station) at many stops. 
               You may also purchase tickets with cash in Tabak stores.
               You need to validate the single journey ticket in the yellow validation machine when you enter the tram, trolleybus or bus.
               Instructions describing how to pay for transportation in Brno can be found <a href="https://dpmb.cz/en/pruvodce-jizdnym" target="_blank">here</a>.</p>

			<strong class="d-block mb-3 os-600">SMS tickets</strong>
            <p>The DPMB also offers <a href="https://www.dpmb.cz/en/sms-zakladni-informace" target="_blank">SMS tickets</a>.
               This service is only available for Czech SIM cards.
			   To use the service, send a message with a code to 90206. 
               The code for a 75-minute ticket (CZK 29) is BRNO
               The code, BRNOD, is for an all-day ticket (CZK 99).
               After sending the message, you will receive a ticket via SMS within a few minutes.
               You should not enter the tram, trolleybus, or bus before your receive the SMS, so plan ahead.
               If you do not have a Czech SIM card, you can use the mobile app, Sejf, which is available in the <a href="https://apps.apple.com/us/app/sejf/id301404273" target="_blank">Apple App Store</a> and <a href="https://play.google.com/store/apps/details?id=cz.edhouse.mc.android&hl=en" target="_blank">Google Play Store</a>.</p>
			
            <p>If you are staying in Brno for several days, consider buying a 5-day ticket which costs 250 CZK.
               There are several places where you can buy this ticket, but the easiest one is at the main railway station.
               You can buy it at any counter (look for the international counters because they are more likely to speak English).
               When you first use your ticket, be sure to validate it.
               You only have to validate your ticket one time, not on each trip.</p>

			<strong class="d-block mb-3 os-600">Brno local transport timetable</strong>
			<ul>
				<li>On-line: <a href="https://idos.idnes.cz/en/brno/spojeni/" target="_blank">Brno Jizdnirady (in English)</a> (Timetables)</li>
				<li>Mobile App: Brno Jizdni rady <a href="https://apps.apple.com/us/app/jizdni-rady-idos/id473503749" target="_blank">iOS</a> or 
				   <a href="https://play.google.com/store/apps/details?id=cz.mafra.jizdnirady&hl=en" target="_blank">Android</a> (also in English)</li>
			</ul>
		</div>
	</div>
</section>
<section id="taxi" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By taxi</div>
		<div class="os-400 mx-5">
			<p>We recommend downloading and using the following app if you plan to use taxis while in Brno.</p>

			<ul>
				<li><a href="https://www.liftago.com/" target="_blank">Liftago</a></li>
			</ul>
			<p>It is also possible to reserve a taxi using your mobile phone, but usually you will need to be able to speak Czech.</p>
		</div>
	</div>
</section>
<section id="venue" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Getting to the Venue</div>
		<div class="os-400 mx-5">
			<strong class="d-block mb-3 os-600">From the Main Train Station or the Hotel Grand Bus Station by tram</strong>
            <p>If you are at the Hotel Grand Bus station, walk to the tram stop in front of the main train station.
               From the main train station take tram No.1 (towards Řečkovice).
               Get off at the stop Semilasso (after approximately 15 minutes). 
               Take the street on the right, Metodějova.
               After approximately 200 meters take the first street on the right, Božetěchova.
               Continue straight approximately 100 m.
               The building on your left hand side is the university.</p>

			<strong class="d-block mb-3 os-600">From Main Bus Station by bus</strong>
            <p>From the main bus station (Zvonařka) take bus No. 44 or 67.
               Get off at the stop Semilasso.
               Follow the street for 100 m and then take the street on the right, Božetěchova.
               After approximately 400 meters you will arrive to the building of the university.</p>

			<strong class="d-block mb-3 os-600">From the Red Hat Offices by tram and bus</strong>
			<p>From the Red Hat Office tram station (Červinkova for the FBC buildings or Technologický park for TPB buildings) take tram No. 12 towards Komárov. 
               Get off at the stop Skácelova (first stop after Červinkova, third from Technologický park).
               Take bus No. 30 or 84 or 53 from the bus stop at the corner diagonally opposite the tram stop you exited at.
               Get off at the stop Semilasso.
               Follow the street for 100 m and then take the street on the right, Božetěchova.
               After approximately 400 meters you will arrive to the building of the university.</p>

<!--
            <strong class="d-block mb-3 os-600">From partner hotels</strong>
			<ul>
				<li></li>
			</ul>
-->
		</div>
	</div>
</section>
<section class="col-12 px-0" style="height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2948.6188220868894!2d-71.11119608434431!3d42.350649543688235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3799a143c678d%3A0xea29504c466d44b7!2sBoston%20University%20George%20Sherman%20Union!5e0!3m2!1sen!2scz!4v1572510484342!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</section>
@endsection

@include('_layouts.footerus')
