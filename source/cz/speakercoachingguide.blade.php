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
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Speaker Coaching Guide</div>
		<div class="os-400 mx-5">
			<p>The essential of the Speaker Coaching Program is to match experienced speakers with first time or less experienced speakers. The coach will be there to help the speaker before the event to better prepare the speaker for the upcoming session(s). For example, the coach can review the speaker's presentation, attend a practice talk or dry run, provide feedback etc.</p>
		</div>
	</div>
</section>
<hr>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">How should you work with your coach?</div>

		<div class="os-400 mx-5">
			<p>As a speaker, at the beginning of the program, you will receive an email about your match. <strong>You should initiate the following communication, introduce yourself and the session content 
			you will present during DevConf.cz.</strong></p>
			<p>You should <strong>schedule a video call or in-person meeting to do a dry run of your session in advance of the event.</strong> This will be how you can get practical, constructive feedback 
			from your coach. The first dry run should happen sooner rather than later, you don't need to reach a certain point in your preparation in order to get something out of the coaching session! 
			Multiple dry runs are possible too, it all depends on your communication with the coach and their and yours availability.</p>
			<p>Note: Where possible, in-person meetings would be definitely more beneficial, as you will give the presentation in-person during the event. Online is an option also, you can use for example: 
			<a href="https://talky.io" target="_blank">https://talky.io</a>, Google Hangout, BlueJeans, and Skype.</p>
			<p>You should also <strong>invite your coach to your live presentation during the event</strong> and ask them for feedback afterward. Devconf.cz is a brilliant opportunity for your first big presentation, 
			so try to benefit from it as much as you can.</p>
		</div>
	</div>
</section>
<section class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">What tasks will you perform as a coach?</div>

		<div class="os-400 mx-5">
			<p>As a coach, you will support a speaker by reviewing their presentation, attending a practice talk or dry run, providing feedback, attending their live session and providing constructive 
			feedback (focusing on the most common mistakes and useful tips).</p>
			<p>At the beginning of the program, you will receive an email with your match. Make sure you introduce yourself, and let the speaker know how you can help. <strong>Make it easy for the speaker 
			to contact you.</strong> Share the <a href="/cz/speakerguide">Speaker Guide</a> with the speaker you are coaching. Review the Speaker Guide yourself to help you spot common patterns and anti-patterns.</p>
			<p>The speaker should set up a time to do a dry run ahead of the conference. <strong>If they do not contact you one month before the conference, try to reach out to them first.</strong> 
			Some of the speakers would like to have only one session, others more.</p>
			<p>During the dry run, <strong>minimize interruptions, take notes with your feedback and provide it at the end of the dry run.</strong> However, if you feel like you are missing context and can’t 
			understand to a reasonable degree what is being presented, it’s ok to ask for more information.</p>
			<p>When coaching, always try to employ positive feedback! Some dos and don'ts:</p>
            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th class="col-6"><i class="fa fa-check text-success"></i> Do this...</th>
                    <th class="col-6"><i class="fa fa-times text-danger"></i> Don’t do this…</th>
                  </tr>
                </thead>
                <tr>
                    <td><strong>Positive feedback with a proposition about what to change</strong> such as “If you make this change, it will improve the clarity for your audience...”</td>
                    <td>Negative unconstructive feedback such as “This slide is terrible…”</td>
                </tr>    
                <tr>    
                    <td><strong>Keep the feedback as focused as possible.</strong> If you can suggest 5-7 improvements that will improve the talk significantly!</td>
                    <td>Giving more than dozens of suggestions that might become confusing or overwhelming for a new speaker.</td>
                </tr>
                <tr>
                    <td>When making smaller suggestions, try to make them very specific, e.g. make a specific recommendation for a text edit.</td>
                    <td>Uncertain suggestions, pointing out “this sentence doesn’t make sense” and leaving it at that.</td>
                </tr>
                <tr>
                    <td><strong>Respect talks given in non-native languages.</strong> The inherent challenges of trying to give a talk in a 2nd language should be taken into account 
                    when assessing a speaker. Note the repeated mispronounced words.</td>
                    <td>Pointing out every mispronunciation you notice. Interrupting the speaker when they mispronounce and waiting for them to pronounce it correctly before continuing.</td>
            </table>
            <p><strong>Try to attend the talk and sit in one of the first rows.</strong> Be supportive! Speakers appreciate seeing signs of support from their audience during their talk. 
            If you can attend their talk, getting feedback on the main talk from you might be greatly appreciated!</p>
            <p><strong>Three crucial things to remember:</strong>
            <ul>
              <li>Communication is always the key!</li>
              <li>Be respectful to each other.</li>
              <li>Open communication for discussion is the best.</li>
            </ul>
        </div>
	</div>
</section>

@endsection

@include('_layouts.footercz')
