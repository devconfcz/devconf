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
<title>Conference Guide - DevConf.CZ</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Conference Guide</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#preparation">In preparation for the conference</a>
			<a href="#register">Register</a>
    		<a href="#speed">Internet speed</a>
			<a href="#browsers">Web browser</a>
			<a href="#device">Device</a>
			<a href="#documentation">Documentation</a>
			<a href="#customschedule">Select sessions</a>
			<a href="#av">Audio and Video</a>
			<a href="#support">Conference support on Hopin and Discord</a>
			<a href="#session">For your session</a>
			<a href="#screen">Sharing screen</a>
			<a href="#playback">Playing audio as a part of the presentation</a>
		</div>
	</div>
</section>
<hr>
<section id="preparation" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">In preparation for the conference</div>

		<div class="os-400 mx-5">
			<p>To have the best possible experience at DevConf.CZ 2022 we have prepared the following checklist for you to prepare beforehand. Take a 
            look at the following technical requirements and things you can do to prepare before the conference so you don't need to do them during the conference.</p>
		</div>
	</div>
</section>

<section id="register" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Register</div>

		<div class="os-400 mx-5">
			<p>Be sure that you're registered for DevConf.CZ 2022 at Hopin as a speaker. If there is a message with <i>"You're in!"</i> at the beginning of the subject that means you are.
			   Take the opportunity to add the conference duration to your calendar by clicking on <i>"Add to calendar"</i>.</p>
		</div>
	</div>
</section>

<section id="speed" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Internet speed</div>

		<div class="os-400 mx-5">
			<p>Try to connect with a minimum of <b>5Mbit/s</b> download and <b>2Mbit/s</b> upload speed. The higher upload and download speeds will offer a better experience, ideally <b>30Mbit/s</b> download and <b>10Mbit/s</b>
			 upload speed. Try limiting other consumers of your Internet capacity, e.g. try running software updates a day before to prevent them from running during the conference, pause or stop any large downloads, 
			 if need be disconnect other devices from your network. Using a <b>physical</b> cable connection is recommended. You can check your Internet speed by using an online network speed test website, search for 
			 Internet speed test in the web search engine of your choice.</p>
		</div>
	</div>
</section>

<section id="browsers" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Web browser</div>

		<div class="os-400 mx-5">
			<p>Hopin <a href="https://support.hopin.to/en/articles/2559500-hopin-compatibility" target="_blank">supports</a> <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a> (preferred) and 
			<a href="https://www.mozilla.org/firefox/new/" target="_blank">Mozilla Firefox</a> (backup) other browsers are <b>not supported</b>. Please make sure that your browser version is up to date, 
			follow the instructions for <a href="https://support.google.com/chrome/answer/95414" target="_blank">Google Chrome</a> and 
			<a href="https://support.mozilla.org/en-US/kb/update-firefox-latest-release" target="_blank">Mozilla Firefox</a>.</p>
			
			<p>Note that Safari uses the same engine as Chrome, but anecdotal reports are that Safari causes problems, so please use Chrome instead.</p>
			
			<p>Reduce the number of open tabs and disable unnecessary browser extensions. Try not to open several browser tabs with Hopin, or if you need to mute all but one of the tabs.</p>
		</div>
	</div>
</section>

<section id="device" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Device</div>

		<div class="os-400 mx-5">
			<p>Do try using a desktop or laptop computer, if you're using a tablet or a mobile device make sure that you're using <a href="https://www.google.com/chrome/" target="_blank">Google Chrome</a> or 
			<a href="https://support.mozilla.org/en-US/kb/update-firefox-latest-release" target="_blank">Mozilla Firefox</a>.</p>
		</div>
	</div>
</section>

<section id="documentation" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Documentation</div>

		<div class="os-400 mx-5">
			<p>Browse the documentation on Hopin tailored for <a href="https://support.hopin.to/en/collections/1945014-using-hopin-as-an-attendee" target="_blank">attendees</a> and
			<a href="https://support.hopin.to/en/collections/2208884-using-hopin-as-a-speaker" target="_blank">speakers</a>.</p>
		</div>
	</div>
</section>

<section id="customschedule" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Select sessions</div>

		<div class="os-400 mx-5">
			<p>Browse our schedule at <a href="http://devconfcz2022.sched.com" target="_blank">devconfcz2022.sched.com</a>. After log in, you’re able to make a selection of the sessions that interest you and create your own schedule. 
			At the beginning of each session at sched, you can find a round checkbox, clicking on it will add such a session to your personal schedule. Times shown for each session reflect times in your local timezone, 
			so make sure your computer has the correct timezone configured for your location and you have a proper time zone selected at the sched.com (select box in the right column under search field).</p>
		</div>
	</div>
</section>

<section id="av" class="mx-auto col-lg-11">
	<div class="row">
        <div class="h2 pt-3 pb-4 mx-5 mont-700 w-100">During the conference</div>

        <div class="os-400 mx-5">
			<p>During the conference you might run into some issues, we have compiled a list of most common ones, and general recommendations to avoid them.</p>
		</div>

		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Audio and Video</div>

		<div class="os-400 mx-5">
			<p>Here is a list of recommendations for the best experience with audio and video during the conference:</p>
			<ul>
			    <li>You are not able to share audio/video by default. All speakers and attendees can request to share their audio and video. The session chair will then grant you access.</li>
			    <li>To maximize speaker video or presentation video double click on that video stream, this will enlarge that portion of the video stream.</li>
			    <li>Play audio using headphones, this will help in understanding the speaker, and prevent any audio feedback.</li>
			    <li>If you have multiple input video/audio sources, be sure you set proper one.</li>
			<ul>
		</div>
	</div>
</section>

<section id="support" class="mx-auto col-lg-11">
	<div class="row">
        <div class="h2 pt-3 pb-4 mx-5 mont-700 w-100">Notes for speakers</div>

        <div class="os-400 mx-5">
			<p>As a speaker please take into consideration the points mentioned above, and also in addition to that the following.</p>
		</div>

		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Conference support on Hopin and Discord</div>

		<div class="os-400 mx-5">
			<p>Once in the hopin platform, as a speaker, you can access the Green Room and test your audio/video setup and slide sharing before your session starts. If you experience any issues, 
			we will be providing support in the same room.</p>
			<p>As a speaker access the <a href="https://discord.gg/devconf" target="_blank">Discord Server</a> and set up your account. We will be providing support on the #speakers channel.</p>
		</div>
	</div>
</section>

<section id="session" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">For your session</div>

		<div class="os-400 mx-5">
			<p>Please join the session 10 minutes before the scheduled time to connect with the session chair and prepare your slides, audio, and video setup. The same applies to pre-recorded 
			sessions, we ask you to be present during the stream and interact with the audience. Note that all live sessions are recorded, and will be shared on YouTube afterwards.</p>
		</div>
	</div>
</section>
<section id="screen" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Sharing screen</div>

		<div class="os-400 mx-5">
			<p>When you enter the session ask for permission to share your audio/video during the break. Once you are granted access, you can control screen sharing using the monitor icon in the row with 
			four buttons along the bottom. If the icon is crossed with a red line that means you're not sharing your screen, click on the icon to start sharing.</p>
			<p>On Linux desktops using Wayland sharing the screen in Firefox is somewhat involved. You might need to confirm twice what part of the screen you want to share.</p>
			<p>Similarly using Chrome (or Chromium) on Linux desktop using Wayland sharing the whole screen might end up exposing a completely black screen. In that case, make sure that you're 
			sharing the window of a single application or single tab within Chrome.</p>
			<p>On Mac, you may have to alter security preferences to allow screen sharing. <b>If you are not able to share</b>, look under SystemPreferences &rarr; Security &amp; Privacy &rarr; Screen Recording.
			 Click on Google Chrome to enable sharing application windows. Please note <b>changing the settings will close Google Chrome and you will need to open the browser again and rejoin the Hopin session</b>.</p>
		</div>
	</div>
</section>
<section id="playback" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h4 pt-3 pb-4 mx-5 mont-700 w-100">Playing audio as a part of the presentation</div>

		<div class="os-400 mx-5">
			<p>As you play sounds from videos or as a part of the presentation your operating system to prevent feedback will block that audio from the microphone. To succeed in playing audio as 
			a part of the presentation have a look at the solutions documented at Hopin support page on <a href="https://support.hopin.to/en/articles/4277212-sharing-computer-audio-during-an-event" target="_blank">Sharing 
			Computer Audio During an Event</a>.</p>
			
			<p class="text-right"><i>Derived from <a href="http://apachecon.com/acah2020/guide.html" target="_blank">ApacheCon</a>.</i></p>
		</div>
	</div>
</section>

@endsection

@include('_layouts.footercz')
