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
<title>Party - DevConf.CZ</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative">DevConf.CZ Party!</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<p>This pin serves as a ticket to DevConf.cz party. Congratulations, you are going!</p>
			
			<p><strong>Location:</strong> Fléda - Štefánikova 24, Brno<br>
			<strong>Date:</strong> January 25, 2020<br>
			<strong>Time:</strong> 7 pm</p>
			<p>See you there!</p>	
		</div>
	</div>
</section>
<section class="col-12 px-0" style="height: 450px;">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4383.6261191292315!2d16.600562833490226!3d49.20967062323015!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47129469790532ed%3A0x916e051d60e55706!2sFleda%20club!5e0!3m2!1sen!2scz!4v1579087721584!5m2!1sen!2scz" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
</section>
@endsection

@include('_layouts.footercz')
