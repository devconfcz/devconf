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
<title>Speaker Guide - DevConf.CZ</title>
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
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Speaker Guide</div>
		<div class="os-400 mx-5">
		<p>This document is a guide to people who are going to speak at a conference, and are interested in tips and tricks for composing and delivering a successful talk.</p>
		<p>It is intended to be relatively light-weight, focusing on the most common mistakes and useful tips. However, it’s not written in stone - any “rule” will have exceptions! 
		Never feel forced to hammer a talk into a set of rules if you don’t think the circumstances warrant.</p>
		</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#slide">Slide Decks</a>
			<a href="#organization">Organization</a>
			<a href="#performance">Speaking/Performance</a>
			<a href="#resources">Presentation-Making and Speaking Resources</a>
			<a href="#suggestions">Suggestions for virtual conference</a>
		</div>
	</div>
</section>
<hr>
<section id="slide" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Slide Decks</div>

		<div class="os-400 mx-5">
			<p>Following are some useful patterns (techniques that make for good slide decks) and antipatterns (mistakes to avoid).</p>
			<ul>
                	<li>Antipattern: wall of text - a slide covered with lots of small-font text (related antipattern - reading this text to the audience).</li>
                	<li>Pattern: using figures, diagrams, plots. Using non-text visuals is often the best possible way to convey information. Strive to use visuals instead of text 
			in your slide decks wherever you can. Using figures typically requires more preparation, since it forces you to talk around your slides instead of just reading them.
			 (This is a good thing! See speaking tips below.)</li>
			<li>Pattern: re-use visual conventions and metaphors. If you use a figure or symbol to represent some idea, re-use it everywhere you need it. 
			Your audience will find it much easier to follow your narrative when they can recognize recurring ideas visually.</li>
			<li>Antipattern: wall of math. Anybody in the audience who wants that much math should be referred to source material for further reading. 
			Equations or other math should be kept to a minimum: large font only! Favor diagrams when possible. When you do use math, explain terms, parameters, etc, 
			in non-technical terms. People want intuitions, not derivations.</li>
			<li>Antipattern: wall of code. Nobody can read a small-font page of code. If you can’t fit a block of code on your slide with a font smaller 
			than 14pt (even larger is better) consider some other approach to presenting your ideas.</li>
			<li>Antipattern: wall of logos. I have seen slides where people dump dozens of logos onto a slide, trying to convey some notion of large interoperability, 
			or ecosystem. Mostly it is visually confusing and overwhelming.</li>
               		<li>Antipattern: acronyms. Acronyms should generally be expanded in slides when they appear for the first time. In order not to lose audience members, 
			the speaker should provide explanations during the talk for what stands behind any acronyms and proper names (for projects, products, etc).</li>
		</div>
	</div>
</section>
<section id="organization" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Organization</div>
		<div class="os-400 mx-5">
	        <p>Talk organizational patterns and antipatterns.</p>
			<ul>
				<li>Pattern: Know your audience: at most industry conferences, you can expect your audience to have diverse backgrounds and levels of technical orientation. 
				Unless your conference is narrowly focused on some domain, plan for an audience with people who do not share your technical background.</li>
				<li>Antipattern: too much detail - new speakers often feel like they need to convey every possible detail in a talk, and obscure the important narratives. 
				Focus on strategic choices of details that tell the important story, and provide links to more detailed resources such as blog posts, papers, code repos, software documentation, etc.</li>
				<li>Pattern: build up context slowly. It is tempting to assume an audience knows all the basic context that you do, and dive right into more advanced content. 
				At most industry conferences, audiences will have varied technical (or non-technical) backgrounds and many will be unfamiliar with your topic of expertise. 
				Spending time at the beginning of your talk on “basic” context and information will actually help you go “faster” at the end, since you now have established a firm foundation to build on.</li>
				<ul>
					<li>Why is problem X or topic Y important?</li>
					<li>What are fundamental terms, definitions, concepts?</li>
				</ul>
			</ul>
		</div>
	</div>
</section>
<section id="performance" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Speaking/Performance</div>
		<div class="os-400 mx-5">
			<p>Speaking patterns and antipatterns.</p>
			<ul>
				<li>Pattern: practice. Practicing your talk several time will help your presentation sound smooth and prepared and will help you be more confident. 
				People in the audience came to your talk to learn and are on your side - they want you to succeed. They will appreciate your talk if they can tell you have put time, 
				effort, and thought into it, regardless of how experienced you are as a speaker.</li>
				<li>Antipattern: reading the slides. Far more engaging to “talk around” your slides, than just reading them.The audience could do that on their own! 
				It takes more preparation and practice to talk around a deck, but it is a far more effective presentation style!</li>
				<li>Pattern: eye contact. Engage the audience by looking around - avoid staring at your screen.</li>
				<li>Pattern: occupy your stage. This is not always possible, but if you have room to walk around, and have a remote to change slides, it is a more engaging style.</li>
				<li>Antipattern: speaking too fast. A common effect of being nervous or of trying to include too much detail. This can happen even if you practiced a lot for your talk, 
				so it’s important to take a deep breathe, and speak in a conversational manner, as if you are talking to one of the audience members.</li>
				<li>Antipattern: speaking too softly. Microphones can compensate for this, but your A/V equipment may not be everything you hoped for.</li>
			</ul>
		</div>
	</div>
</section>
<section id="resources" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Presentation-Making and Speaking Resources</div>
		<div class="os-400 mx-5">
			<ul>
				<li><a href="http://blog.linuxgrrl.com/2016/06/09/sources-for-openly-licensed-content/" target="_blank">Sources for Openly-Licensed Content</a> blog post by Máirín Duffy</li>
				<li><a href="https://www.flickr.com/photos/opensourceway/" target="_blank">opensource.com Flickr account</a> with a great collection of images licensed under CC BY-SA</li>
				<li>Red Hat Brand presentation <a href="https://brand.redhat.com/applications/presentations/" target="_blank">guidelines</a> and <a href="https://brand.redhat.com/elements/" target="_blank">elements</a> 
				(while the top-level pages with concepts are available publicly, libraries of icons and images are internal to Red Hat)</li>
				<li><a href="https://femgineer.com/present-book/" target="_blank">Present! A Techie's Guide to Public Speaking</a> 
				(<a href="https://www.amazon.com/Present-Techies-Guide-Public-Speaking-ebook/dp/B01BCXHULK" target="_blank">book on Amazon</a>)</li>
			</ul>
		</div>
	</div>
</section>
<section id="suggestions" class="mx-auto col-lg-11">
    <div class="row">
        <div class="h2 pt-3 pb-4 mx-5 mont-700">Suggestions for virtual conference</div>
        <div class="os-400 mx-5">
            <ol>
                <li>Before making your final recording, first record yourself delivering part of your talk, including any demos or special situations, and watch the recording to see how you look and sound.
                    <ul>
                        <li>Avoid light sources behind you, they tend to put you in a dark shadow.</li>
                        <li>Maintain the same distance from the microphone to avoid unexpected volume changes.</li>
                        <li>Practice changing screens between your slides and anything else you are showing.</li>
                    </ul>
                </li>
                <li>If you can, try out several mics and other input devices, to see which have the best sound.</li>
                <li>If possible, use a wired network connection when delivering your talk, to minimize the risk of network issues.</li>
                <li>Make sure you attend the test event with the same hardware as you plan to use at the conference.</li>
                <li>In order to support attendee interaction, we can publish live poll questions during your talk. Think about what to ask attendees while preparing your talk and share it with the session chair before your talk.
                    These questions can help you tailor your talk to the audience as you go and provide interactivity that keeps attendees engaged.</li>
                <li>Think about questions you can ask during your talk that you can suggest your attendees answer in the chat. This gives you, if you pre-recorded your talk, or any assistants you have during a live talk,
                    the opportunity to engage with your audience.</li>
                <li>If necessary, we can pause the pre-recorded sessions and answer questions from the audience live.</li>
            </ol>
        </div>
    </div>
</section>
@endsection

@include('_layouts.footercz')
