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
<title>Speaker Coaching Guide - DevConf.CZ</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Speaker Coaching Guide</div>
		<div class="os-400 mx-5">
			<p>This document is a guide to speaker coaches: anybody who is helping someone else prepare for an upcoming talk, for example by reviewing slide decks, attending a practice talk and providing feedback, 
			or attending the final conference talk.</p>
			<p>It is intended to be relatively light-weight, focusing on the most common mistakes and useful tips.</p>
			<p>This Coaching Guide is a companion to the <a href="/cz/speakerguide" target="_blank">Speaker Guide</a>.</p>
		</div>
	</div>
</section>
<hr>
<section id="slide" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Tips for Speaker Coaches</div>

		<div class="os-400 mx-5">
			<p>Share the <a href="/cz/speakerguide" target="_blank">Speaker Guide</a> with the speaker your are coaching. Review the Speaker Guide yourself to help you spot common patterns and anti-patterns.</p>
			<p>Set up a time to do a video call to rehearse ahead of the conference. Some of the options for video conferencing software you can use are: <a href="https://talky.io" target="_blank">https://talky.io</a>, 
			Google Hangout, BlueJeans, and Skype.</p>
			<p>Minimize interruptions during the rehearsal, and, instead, take notes with your feedback and provide it at the end of the rehearsal. However, if you feel like you are 
			missing some context and can’t understand to a reasonable degree what is being presented, it’s ok to ask for more information.</p>
			<p>When coaching, always try to employ positive feedback! Positive feedback such as “If you make this change, it will improve the clarity for your audience...” is much more 
			successful than negative feedback such as “This slide is terrible…”</p>
			<p>Try to keep feedback as focused as possible. If you can suggest 5-7 improvements that will improve the talk significantly, that can help more than dozens of suggestions that might 
			become confusing or overwhelming for a new speaker. When making smaller suggestions, try to make them very specific, e.g. make a specific recommendation for a text edit.</p>
			<p>Respect talks given in non-native languages. Many speakers will be delivering a talk in a 2nd language. This is hard! The inherent challenges of trying to give a talk in a 2nd language 
			should be taken into account when assessing a speaker.</p>
			<p>Try to attend the talk and sit in one of the first rows. Be supportive! Speakers appreciate seeing signs of support from their audience during their talk.</p>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footercz')
