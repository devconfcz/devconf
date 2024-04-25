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
<title>Getting around Brno - DevConf.CZ</title>
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
				<li class="nav-item active underline px-3">
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
		<div class="h1 mx-5 mont-700 underline position-relative">Getting around Brno</div>
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
			<p>Public transportation in Brno is provided by <a href="https://www.dpmb.cz/en" target="_blank">DPMB</a> which maintains trams, trolley-buses and buses that criss-cross the city. 
               At night all public transportation is provided by night buses that cover almost the entire city.</p>
               
            <p>If you want to use public transportation, you must buy a ticket. There are two options:
               <ul>
                    <li>Paper or SMS tickets you buy <strong>before</strong> you board the tram, trolleybus or bus.</li>
                    <li>E-tickets you buy using your credit card <strong>immediately after</strong> you board the tram, trolleybus or bus.</li>
               </ul>
            </p>
            
            <strong class="d-block mb-3 os-600">Paper tickets</strong>
            <p>You can buy a ticket before you board the tram, trolleybus or bus. You need to purchase a two-zone ticket for zones 100+101
             for any trip in the city of Brno. Single journey tickets can be bought from machines at many stops (coins only at most stops, 
             credit cards accepted at major stops like the train station). You may also purchase tickets with cash in Tabak stores. You need
              to validate the single journey ticket in the yellow validation machine when you enter the tram, trolleybus or bus.</p>

			<strong class="d-block mb-3 os-600">SMS tickets</strong>
            <p>The DPMB also offers <a href="https://old.dpmb.cz/en/sms-zakladni-informace" target="_blank">SMS tickets</a>.
               This service is only available for Czech SIM cards.
			   To use the service, send a message with a code to 90 206. 
               The code for a 75-minute ticket (CZK 29) is BRNO
               The code, BRNOD, is for an all-day ticket (CZK 99).
               After sending the message, you will receive a ticket via SMS within a few minutes.
               You should not enter the tram, trolleybus, or bus before you receive the SMS, so plan ahead.
               If you do not have a Czech SIM card, you can use the mobile app, Sejf, which is available in the <a href="https://apps.apple.com/us/app/sejf/id301404273" target="_blank">Apple App Store</a> 
               and <a href="https://play.google.com/store/apps/details?id=cz.edhouse.mc.android&hl=en" target="_blank">Google Play Store</a>.</p>
			
			<strong class="d-block mb-3 os-600">E-tickets paid by credit card</strong>
            <p>The easiest way is to use your credit card and the system <a href="https://www.pipniajed.cz/en.html" target="_blank">Beep and Go</a>. 
            You get on the tram, trolleybus or bus and tap your card against the yellow reader every time you board a vehicle. The system will automatically charge you 25 CZK (approximately 1 EUR). 
            If your journey is shorter than 15 minutes, check out and the system will charge you basic ticket for 20 CZK. After traveling multiple 
            times during one calendar day, the system will charge you up to the 24h ticket, which means the system will charge you 90 CZK at maximum per day. 
            For more information visit their <a href="https://www.pipniajed.cz/en.html" target="_blank">website</a>.</p>
              
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

			<strong class="d-block mb-3 os-600">From Main Bus Station by tram</strong>
            <p>From the main bus station (Zvonařka) take tram No. 12 (towards Technologický park) to main train station.
               From the main train station take tram No.1 (towards Řečkovice). You have to change platforms to get on the correct tram.
               Get off at the stop Semilasso (after approximately 15 minutes).
               Take the street on the right, Metodějova.
               After approximately 200 meters take the first street on the right, Božetěchova.
               Continue straight approximately 100 m.
               The building on your left hand side is the university.</p>

			<strong class="d-block mb-3 os-600">From the Red Hat Offices by tram and bus</strong>
			<p>From the Red Hat Office bus station Technologický park take bus No. 72 (towards Obřany). 
               Get off at the stop Semilasso (after approximately 10 minutes).
               Follow the street down for 100 m and then take the street on the right, Božetěchova.
               After approximately 400 meters you will arrive to the building of the university which is on your left side.</p>
			
			<p>Or from the Red Hat Office tram station Technologický park take tram No. 12 (towards Komárov). 
               Get off at the stop Skácelova (first stop after Červinkova, third from Technologický park).
               Take bus No. 30 or 84 or 72 from the bus stop at the corner diagonally opposite the tram stop you exited at.
               Get off at the stop Semilasso.
               Follow the street down for 100 m and then take the street on the right, Božetěchova.
               After approximately 400 meters you will arrive to the building of the university which is on your left side.</p>

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

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5828.8794114720895!2d16.593681273902156!3d49.223568069664026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471294099dc06bbb%3A0xbfcf161b01a48b0d!2sFaculty%20of%20Information%20Technology%2C%20Brno%20University%20of%20Technology!5e0!3m2!1sen!2scz!4v1569001018524!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

</section>
@endsection

@include('_layouts.footercz')
