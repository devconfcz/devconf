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
<title>Getting to Brno - DevConf.CZ 2020</title>
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
					<a href="/cz/#about" class="nav-link">About & Topics</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#news" class="nav-link">News</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#schedule" class="nav-link">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/#travel" class="nav-link">How to get here?</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/cz/faq"class="nav-link">FAQ</a>
				</li>
			</ul>
		</div>
	</nav>
</header>

<section class="secondary-menu mt-5 py-2 mx-auto w-100">
	@include('_layouts.policies')
</section>

<section class="mx-auto pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative">Getting to Brno</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#plane">Plane</a>
			<a href="#train">Train</a>
			<a href="#bus">Bus</a>
			<a href="#car">Car</a>
		</div>
	</div>
</section>
<hr>
<section id="plane" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By plane</div>

		<div class="os-400 mx-5">
			<strong class="d-block mb-3 os-600">Brno Airport (BRQ)</strong>
			<ul>
				<li>Brno airport is a small international airport near Brno. This airport is a good option if you are coming from London (Stansted - Ryanair, Luton - Wizzair), Munich 	(Lufthansa).</li>
				<li>A recently opened flight from Munich (Lufthansa) direct to Brno operates daily except Sunday!</li>
				<li>From the airport, city bus #76 will take you to the city center (30 minutes) and drop you off next to the main train station 
				    and Student Agency bus stop. You can also take a taxi: approx. 300 CZK/€11.</li>
			</ul>
			<strong class="d-block mb-3 os-600">Vienna International Airport (VIE)</strong>
			<ul>
				<li>The biggest airline hub in Central Europe, flights to many destinations all over the world.</li>
				<li>The easiest way to get from the airport to Brno are the <a href="https://jizdenky.regiojet.cz/" target="_blank">Student Agency</a> buses 
				    (online booking possible; use stop Vienna Schwechat Airport as your starting place). The direct bus takes 2 hours.</li>
				<li>Alternately, you can take a train from the airport to the city centre of Vienna and then take an EC train to Brno from there.</li>
			</ul>
			<strong class="d-block mb-3 os-600">Václav Havel Airport Prague (PRG)</strong>
			<ul>
				<li>This is the second busiest airport in the region.</li>
				<li>It is possible to book the journey as one ticket with <a href="https://jizdenky.regiojet.cz/" target="_blank">Student Agency</a> with a connection at the Prague main bus station (Florenc). 
				    Czech Railways provides shuttle buses between the airport and the Prague main train station.</li>
				<li>To get from the Prague airport to Brno takes at least 3.5 hours by public transport. Note, it is faster to get to Brno from Vienna.</li>
			</ul>
			<strong class="d-block mb-3 os-600">Bratislava Airport (BTS)</strong>
			<ul>
				<li>This airport is a good option for cheap flights within Europe. If you are flying to Brno from outside of Europe, this airport is not recommended. Bratislava Airport is a hub of Ryanair.</li>
				<li>There is no direct transport connection between the Bratislava airport and Brno. You have to take a city bus to the center and take
				    a coach or train to Brno from there. It takes at least three hours.</li>
			</ul>
			<p>There are also small international airports in <a href="http://www.airport-ostrava.cz/en/" target="_blank">Ostrava</a> (flights to Paris and London)
			   and <a href="https://www.airport-pardubice.cz/en/" target="_blank">Pardubice</a> (flights to Saint Petersburg and Moscow). Both have good train and bus connections to Brno.</p>
		</div>
	</div>
</section>
<section id="train" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By train</div>
		<div class="os-400 mx-5">
			<p>Brno has good train connections within Europe. All intercity trains arrive and depart at the main station (Brno hlavní nádraží), The Main Station is the hub of public transport in the city.</p>

			<strong class="d-block mb-3 os-600">Train Timetables</strong>
			<ul>
				<li>Prague - trains between Prague and Brno go hourly, 2.5 hours</li>
				<li>Vienna - trains between Wien Hbf and Brno go every hour, 1.5 hour</li>
				<li>Bratislava - from Bratislava Hlavna Stanica hourly, 1.5 hour</li>
				<li>Budapest - from Budapest-Keleti pu several trains every day, 5 hours</li>
				<li>Warsaw - from Warszawa Centralna several times every day (usually one connection), 7 hours</li>
				<li>Berlin - from Berlin Hauptbahnhof several trains every day, 7.5 hours</li>
			</ul>
		</div>
	</div>
</section>
<section id="bus" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By bus</div>
		<div class="os-400 mx-5">
			<p>Brno is also part of the European bus network and all connections and their prices are similar to trains.
			   <a href="https://jizdenky.regiojet.cz/" target="_blank">Student Agency</a> and <a href="https://www.eurolines.de/en/home/" target="_blank">Eurolines</a> provide buses to many European cities. 
			   Most Eurolines buses arrive at Brno-Zvonarka, Brno's main bus station. Student Agency buses arrive at a station opposite the Grand Hotel which next to the main train station.</p>
		</div>
	</div>
</section>
<section id="car" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">By car</div>
		<div class="os-400 mx-5">
			<p>Brno is well-connected to other cities by highway. You can get easily to neighboring countries by car. For using the Czech highways you have to purchase a highway sticker. 
			   The 10 day sticker costs 350 CZK/13 € and can be purchased at every gas station. Travel time examples:</p>
			<ul>
				<li>Prague - 210 km, 2 hours</li>
				<li>Bratislava - 130 km, 1.3 hours</li>
				<li>Vienna - 143 km, 1.8 hours</li>
				<li>Budapest - 326 km, 3 hours</li>
				<li>Munich - 587 km, 5.3 hours</li>
				<li>Berlin - 555 km, 5.2 hours</li>
			</ul>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
