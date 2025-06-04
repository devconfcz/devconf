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
<title>Onsite information - DevConf.CZ</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative">DevConf.CZ Onsite information</div>
	</div>
	<div class="row mx-5 mt-4 os-400">
	    <div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">Schedule and venue</div>
		    <p>Schedule: <a href="/cz/schedule/">https://www.devconf.info/cz/schedule/</a><br>
            Venue map: <a href="/cz/map/">https://www.devconf.info/cz/map/</a><br>
            Virtual component: <a href="https://matrix.to/#/#2025:devconf.cz">https://matrix.to/#/#2024:devconf.cz</a><br>
            FAQ: <a href="/cz/faq/">https://www.devconf.info/cz/faq/</a></p>
        </div>

		<div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">Help from staff and code of conduct contact</div>
		    <p>Dorka Volavkova<br>
               <a href="tel:+420722078142">+420-722-078-142</a><br>
               @dvolavko:matrix.org<br>
               <a href="mailto:info@devconf.cz">info@devconf.cz</a><br>
               <a href="mailto:coc@devconf.cz">coc@devconf.cz</a>
            </p>
        </div>

		<div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">Communication preference stickers</div>
		    <p>Green - <span class="sticker d-inline-block bg-success align-bottom" style="height: 20px; width: 20px"></span> - Open to communicate<br>
               Yellow - <span class="sticker d-inline-block bg-warning align-bottom" style="height: 20px; width: 20px"></span> - Only if you know me<br>
               Red - <span class="sticker d-inline-block bg-danger align-bottom" style="height: 20px; width: 20px"></span> - Not interested at the time
            </p>
        </div>

		<div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">Lanyard colors</div>
		    <p>Black - <span class="sticker d-inline-block bg-dark align-bottom" style="height: 20px; width: 20px"></span> - OK to photograph<br>
               Red - <span class="sticker d-inline-block bg-danger align-bottom" style="height: 20px; width: 20px"></span> - Do NOT photograph</p>
		</div>

		<div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">WiFi</div>
		    <p>SSID: vutbrno<br>
               login: devconfcz<br>
               password: Brno2024</p>
		</div>

		<div class="col-xl-4 container card-body my-2 ml-xl-auto">
		    <div class="h4 mont-700 text-xl-center">Social media</div>
		    <p>Mastodon: <a href="https://fosstodon.org/@devconf_cz">@devconf_cz@fosstodon.org</a><br>
               X: <a href="https://twitter.com/devconf_cz">@devconf_cz</a><br>
               LinkedIn: <a href="https://www.linkedin.com/company/102081562/admin/feed/posts/">DevConf.CZ</a></p>
       </div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
