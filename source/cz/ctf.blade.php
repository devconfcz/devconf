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
<title>CTF - DevConf.CZ</title>
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
<!--				<li class="nav-item active px-3">
					<a href="/cz/aroundbrno" class="nav-link">Getting around Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/tobrno" class="nav-link">Getting to Brno</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/cz/hotels" class="nav-link">Hotels</a>
				</li> -->
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
		<div class="h1 mx-5 mont-700 underline position-relative">Capture The Flag - DevConf.CZ 2022!</div>
	</div>
	<div class="row">
		<div class="mx-5  mt-4 os-400">
			<p>This document contains screenshots and information, how to attend CTF event on DevConf.CZ 2022.</p>

			<ol>
				<li>Go to URL where the CTF competition is hosted: <a href="https://ctf.tunasec.com/" target="_blank">https://ctf.tunasec.com/</a></li>
				<li>Click on Registration button and complete registration (you don’t need to provide real email if you don’t want to)</li>
				<li>At first, all challenges are presented as question marks except the first one, which contains the first flag and will guide you through the submission process.</li>
				<li>Once you submit the flag, all challenges are revealed.</li>
				<li>Now choose your challenge, read it, solve it and get points. We will present tools you can use for majority of challenges at the CTF workshop.</li>
				<li>The scoreboard is public, you can see how you’re doing compared to other competitors.</li>
			</ol>
			
			<p>As part of CTF event, we have prepared even some tasks from well known BugHunting competition. Here are some basic info about, what is needed.</p>
			<p><strong>Docker install</strong><br>Take a look at <a href="https://gitlab.com/summer-camp-2021/setting_up_docker" target="_blank">https://gitlab.com/summer-camp-2021/setting_up_docker</a>.</p>
			<p><strong>How to get and run the BugHunting container</strong><br>Pull, run, and shell into the container - feel free to use podman instead of docker.<br><br>
			Input the following commands into your terminal:<br>
			<pre>docker pull quay.io/bughunting/client
mkdir bughunting
cd bughunting
docker run -dt --name bughunting -v"${PWD}:/home/bughunting/sources:z,rw" quay.io/bughunting/client
docker exec -ti bughunting zsh</pre>Alternatively, as a backup, without Bind-mounting the tasks<br>
			<pre>docker pull quay.io/bughunting/client
docker run -dt --name bughunting quay.io/bughunting/client
docker exec -ti bughunting zsh</pre></p>
			
			<p>For troubleshooting, visit <a href="https://howto.bughunting.cz/" target="_blank">https://howto.bughunting.cz/</a>.</p>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
