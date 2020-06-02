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
<title>Media Policy - DevConf</title>
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
			<a href="/coc">Code of Conduct</a>
                        <a href="/media-policy "class="active">Media Policy</a>
                        <a href="/participation-agreement">Participation Agreement</a>
                        <a href="/privacy-statement">Privacy Statement</a>
		</div>
		<div class="col-lg-9 col-xl-10">
			<div class="row">
				<div class="h1 mx-5 mt-5 mont-700 underline position-relative">Media policy</div>
			</div>

			<div class="row">
				<div class="mx-5  mt-4 os-400">
					<p><em>tldr; DevConf organizers strive to create a positive environment that adheres to our <a href="/coc">Code of Conduct</a> and respects privacy of individuals. 
					That said, this is a public event and DevConf event organizers do not wish to discourage folks from taking and sharing photos and video during the event. 
					Also, all sessions to be recorded and posted on our YouTube channel for archival purposes, unless otherwise explicitly requested.</em></p>

					<h3 class="mont-700 mt-3">Speakers and session recording</h3>
					<p>When you agree to speak at any DevConf event, you consent for your talk to be recorded in audio and possibly video format. DevConf uses screen capturing hardware 
					along with audio recording equipment to broadcast presentations.</p>

					<p>We reserve the right to publicly distribute and publish these recordings under the Creative Commons Attribution 3.0 license.</p>

					<p>Your session material, including content and recordings may be used in promotional activities and other related endeavors. This material may also appear on our DevConf 
					web site, social media channels or other digital mediums controlled by the DevConf organizers or supporting partners.</p>

					<p>As conference organizers, we cannot be all places at once and it is important for us to be able to review all material presented at the conference. 
					For this reason, you may not opt out of having your talk recorded. However, if you wish, you may request that the session video not be published to the
					 public or taken down (hidden) if otherwise already published. The organizers will, to the best of their ability, respect and honors all such requests.</p>

					<p>By default, all sessions will be streamed live and archived for future playback on our <a href="https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg">DevConf YouTube channel</a>.</p>

					<h3 class="mont-700 mt-5">Recording by Attendees</h3>
					<p>All sessions are recorded by official DevConf or venue A/V staff. Additionally, you agree to permitting the recording and sharing of sessions 
					by attendees of the event at large. If you do not wish for the audience to audio/video record, you are responsible for politely asking them not to record you before you start presenting.</p>

					<h3 class="mont-700 mt-5">Staff and attendee photography</h3>
					<p>When you register to participate in DevConf events, you consent to be photographed by our official conference photographer, and to have those photographs 
					published under a Creative Commons license and possibly used in various promotional material.</p>

					<p>Additionally, We encourage attendees to take and share their own photographs. Thus, you also consent to allow attendees to take and share their own photographs, as long as the rules below are followed.</p>
					<ul>
					   <li>Any photography/recording that is legally allowed in public spaces is allowed at DevConf events.</li>
					   <li>Photography/recording should be treated like other potentially harassing interpersonal interaction. That is, when one person in the interaction says “stop” 
						or “leave me alone” (etc), the interaction must end. In this case, attendees should not attempt to photograph that individual again. Additionally, please respect 
						the no-photography indicators worn by attendees.</li>
					   <li>Photography/recording should not be done in such a way as to hide from the subject that it’s happening.</li>
					   <li>The subject may inspect the photo/recording at any time and, if requested, the photo/footage/etc must be deleted immediately, upon request.</li>
					   <li>Those who are taking photographs and/or recording must also follow our general Code of Conduct.</li>
					</ul>

					<p>We will do our best to not make or share photos, videos or audio recordings public which could cause harm to the individuals shown/heard on them. If you do find 
					such pictures/videos/audio recordings on one of our sites or accounts, please write to our <a href="mailto:info@devconf.cz">info@devconf.cz</a>,
                    <a href="mailto:info@devconf.in">info@devconf.in</a> or <a href="mailto:info@devconf.us">info@devconf.us</a> to ask for review.</p>

					<h3 class="mont-700 mt-5">How to opt-out</h3>
					<p>If you do not wish images of yourself to be published, you may opt out by <a href="mailto:hello@devconf.info">contacting us</a> and reasonable efforts will be done to accommodate your request.</p>

					<p>If you are a speaker, you may opt out of having your talk being publically distributed by <a href="mailto:hello@devconf.info">contacting us</a>.</p>

					<h3 class="mont-700 mt-5">How to report violations or issues</h3>
					<p>Please report an violations or issues with recording or photography directly to the front desk at registration, or by contacting us at <a href="mailto:info@devconf.cz">info@devconf.cz</a>, 
                    <a href="mailto:info@devconf.in">info@devconf.in</a> or <a href="mailto:info@devconf.us">info@devconf.us</a>.</p>


					<p class="mt-5 text-right"><i>Thank you to Linux Fest NorthWest, Open Source Bridge and DrupalCon, from whom this policy was heavily influenced.</a>.</i></p>

					<p class="text-right"><i>Last Updated: June 2, 2020</i></p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footerinfo')
