@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.info">
<meta property="og:site_name" content="DevConf.info">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-info-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-info-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Code of Conduct - DevConf</title>
@endsection

@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/"><img src="/assets/images/devconf-logo-reverse.svg"></a></span>
	</nav>
</header>
<section class="mx-auto pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="col-lg-3 col-xl-2 mt-5 local-nav os-400 mx-5 mx-lg-0">
			<a href="/coc" class="active">Code of Conduct</a>
                        <a href="/media-policy">Media Policy</a>
                        <a href="/participation-agreement">Participation Agreement</a>
                        <a href="/privacy-statement">Privacy Statement</a>
		</div>
		<div class="col-lg-9 col-xl-10">
			<div class="row">
				<div class="h1 mx-5 mt-5 mont-700 underline position-relative">Code of Conduct</div>
			</div>

			<div class="row">
				<div class="mx-5  mt-4 os-400">
					<h3 class="mont-700 mt-3">Our Pledge</h3>
			        <p>In the interest of fostering an open and welcoming environment, we as speakers, attendees and organizers at DevConf pledge
    				 to making participation in our event and community a harassment-free experience for everyone, regardless of age, body size, disability, 
	    			 ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.</p>

					<h3 class="mont-700 mt-5">Our Standards</h3>
					<p>Examples of behavior that contributes to creating a positive environment include:</p>
					<ul>
					  <li>Using welcoming and inclusive language</li>
					  <li>Being respectful of differing viewpoints and experiences</li>
					  <li>Gracefully accepting constructive criticism</li>
					  <li>Focusing on what is best for the community</li>
					  <li>Showing empathy towards other community members</li>
					</ul>

		            <p>Examples of unacceptable behavior by participants include:</p>
           				<ul>
			              <li>The use of sexualized language or imagery and unwelcome sexual attention or advances</li>
			              <li>Trolling, insulting/derogatory comments, and personal or political attacks</li>
			              <li>Public or private harassment</li>
			              <li>Publishing others private information, such as a physical or electronic address, without explicit permission</li>
			              <li>Other conduct which could reasonably be considered inappropriate in a professional setting</li>
			        </ul>

		            <h3 class="mont-700 mt-5">Our Responsibilities</h3>
        			<p>Event organizers have the right and responsibility to remove, edit, or reject content, posts, examples and other event contributions that 
					are not aligned to this Code of Conduct, or to ban temporarily or permanently any contributor for other behaviors that they deem inappropriate, threatening, offensive, or harmful.</p>

			        <h3 class="mont-700 mt-5">Scope</h3>
			        <p>This Code of Conduct applies in physical and virtual spaces and in any interactions relating to an individual participating in or representing the event. 
				    In particular, this Code of Conduct applies to participating in speaker coaching and in attendee coaching, if it's offered by the event. Examples of representing an event
                    include using an official event e-mail address and posting to, sharing or referencing official social media channels.</p>

			        <h3 class="mont-700 mt-5">Enforcement</h3>
					<p>Instances of abusive, harassing, or otherwise unacceptable behavior may be reported to the Code of Conduct response leads of the relevant DevConf 
					event by emailing <a href="mailto:coc@devconf.cz">coc@devconf.cz</a> , <a href="mailto:coc@devconf.in">coc@devconf.in</a> or <a href="mailto:coc@devconf.us">coc@devconf.us</a>.
		            At physical events, Code of Conduct response leads will be identified at the event and information on how to contact them individually will be available at the registration desk.</p>

				    <p>All complaints will be reviewed and investigated and will result in a response that is deemed necessary and appropriate to the circumstances. 
					Event organizers are obligated to maintain confidentiality with regard to the reporter of an incident and will consult with the reporter if further 
					action on the report is likely to make it known to anyone who they are.</p>

				    <p>Event organizers who do not follow or enforce the Code of Conduct in good faith may face temporary or permanent repercussions as determined by other event organizers</p>

				    <p class="mt-5 text-right"><i>This Code of Conduct is adapted from the <a href="http://contributor-covenant.org/version/1/4" target="_blank">Contributor Covenant, version 1.4</a>.</i></p>

				    <p class="text-right"><i>Last Updated: August 31, 2020</i></p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footerinfo')
