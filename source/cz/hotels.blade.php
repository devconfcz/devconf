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
		<div class="os-400 mx-5">
		<div class="h1 mont-700 mb-5 underline position-relative">Hotels for speakers and attendees</div>
		<div class="h4 mont-700">Important Notice: Accommodation & MotoGP Conflict</div>
        <p>Due to the MotoGP event taking place in Brno at the same time, hotel availability is extremely limited. Please note that our partner hotels will only hold rooms for a limited period. If you plan to attend DevConf.CZ, we strongly recommend booking in advance.</p>

        <div class="h4 mont-700">Schedule Update In 2026</div>
        <p>DevConf.cz has moved to a 2-day format due to the conflict with MotoGP. Unless you plan to attend the races, we recommend ending your stay in Brno on Friday, June 19, and either traveling home or staying near your departure airport. This will help you avoid the significantly higher hotel rates and overcrowding associated with MotoGP.</p>
		</div>
	</div>
</section>
<hr>
<section id="attendees" class="mx-auto mt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="os-400 mx-5">
            <div class="h4 mont-700">Speaker and Attendee Travel Policy</div>
            <p>DevConf.cz remains a free event and does not cover travel expenses for speakers. However, we have secured a number of discounted rooms for both attendees and speakers. All participants are responsible for booking and covering their own accommodation at one of the partner hotels listed below.</p>

			<p><strong>Instructions to reserve a hotel room:</strong>
			<ol><li>Select a hotel from the list below and contact them directly using the provided email address.</li>
			<li>Use the discount code (mentioned by the hotel below) <strong>in the subject line.</strong></li>
			<li>Include your name, arrival and departure dates, and any other requirements in your email.</li></ol>
			<p><strong>Please make your reservation as soon as possible, as space is very limited.</strong><br><br>
			If you have any questions or concerns, please don't hesitate to contact at <a href="mailto:speakers@devconf.cz">speakers@devconf.cz</a>.</p>
			<div class="accordion w-100 pb-3" id="template">
    			<div class="card">
	    			<div class="card-header collapsed mont-600" id="template-heading" data-toggle="collapse" 
				     data-target="#collapse-template" aria-expanded="true" aria-controls="collapse-template">
						Email template for hotel room booking (replace &lt; ... &gt; parts with actual information)
						<i class="fa"></i>
					
				    </div>

				    <div id="collapse-template" class="collapse" aria-labelledby="template-heading" data-parent="#template">
					    <div class="card-body os-400">
						    <strong>Subject:</strong> &lt;DISCOUNT CODE&gt; Hotel room booking for &lt;NAME&gt;<br><br>
						    <strong>Text:</strong><br>
						    Dear &lt;HOTEL NAME&gt;<br><br>
                            I would like to reserve a &lt;ROOM TYPE&gt; for &lt;X&gt; nights from &lt;CHECK-IN DATE&gt; to &lt;CHECK-OUT DATE&gt;, for &lt;GUEST NAME&gt;.<br><br>
                            Additional notes regarding the booking: &lt;None / Notes from the guest&gt;<br><br>
                            Could you please confirm the booking with &lt;me / GUEST NAME&gt; directly?<br><br>
                            Many thanks,<br>
                            &lt;YOUR NAME&gt;
					    </div>
				    </div>
			    </div>
    		</div>
			
			<p>Note: <strong>Bookings through third-party sites (e.g. booking.com), even if they are for one of our partner hotels, will not have the same price.</strong></p>
            <p>All prices are <strong>per one night!</strong> The final price for accommodation depends on the partner hotel (accommodation taxes are usually charged on the spot).
            Contact the partner hotel directly to save your spot and for additional information.</p>
		</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
   <div class="row">
	    
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Hotel Continental - Mandatory departure on Friday, June 19</div>

			<div class="os-400 mx-5">
			    <p>Code: <strong>DEVCONFCZ</strong></p>
				<p><a href="https://www.continentalbrno.cz/en/" target="_blank">https://www.continentalbrno.cz/en/</a></p>
				<p>Single Design room - 4.200 CZK/night<br>
				Single Superior room - 4.200 CZK/night</p>
				<p>The rate includes breakfast.</p>
				<p>Email for making reservations is:<br><a href="mailto:info@continentalbrno.cz">info@continentalbrno.cz</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Hotel Passage - Secure until Saturday, January 31</div>

			<div class="os-400 mx-5">
				<p><a href="http://hotelpassage.eu/" target="_blank">http://hotelpassage.eu/</a></p>
                <p>Code: <strong>DEVCONF2026</strong></p>
				<p>Single Standard room 6.120 CZK/night<br>
				Double Standard room 6.610 CZK/night</p>
				<p>The rate includes breakfast and Wi-Fi.</p>
				<p>Email for making reservations is:<br><a href="mailto:rezervace@hotelpassage.eu">rezervace@hotelpassage.eu</a></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="h2 pt-3 pb-4 mx-5 mont-700">Avanti - Mandatory departure on Friday, June 19</div>

			<div class="os-400 mx-5">
				<p><a href="https://www.hotelavanti.cz/en/" target="_blank">https://www.hotelavanti.cz/en/</a></p>
                <p>Code: <strong>DEVCONF</strong></p>
				<p>Single Standard room 4.000 CZK/night<br>
				Double Standard room 4.500 CZK/night</p>
				<p>The rate includes breakfast.</p>
				<p>Email for making reservations is:<br><a href="mailto:hotel@hotelavanti.cz">hotel@hotelavanti.cz</a></p>
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
