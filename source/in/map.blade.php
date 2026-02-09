@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.IN">
<meta property="og:site_name" content="DevConf.IN">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-in-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-in-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Map - DevConf.IN</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/in"><img src="/assets/images/devconf-logo-in-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/in/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/in/schedule" class="nav-link local">Schedule</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/in/faq" class="nav-link">FAQ</a>
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
		<div class="h1 mx-5 mont-700 underline position-relative">Map</div>
	</div>
	<div class="row mx-5 d-block">
        <div class="my-3 os-400">
            Venue: DevConf.IN takes place in the Vyas Building at MIT-WPU.<br><br>
            Address: Shilpa Housing Society, Rambaug Colony, Kothrud, Pune, Maharashtra 411038, India
        </div>
		<div class="d-block my-3">
			<a href="/assets/images/devconf-in-map.jpg"><img class="" src="/assets/images/devconf-in-map.jpg"></a>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footerin')
