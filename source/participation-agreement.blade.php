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
<title>Participation Agreement - DevConf</title>
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
                        <a href="/media-policy">Media Policy</a>
                        <a href="/participation-agreement" class="active">Participation Agreement</a>
                        <a href="/privacy-statement">Privacy Statement</a>
		</div>
		<div class="col-lg-9 col-xl-10">
			<div class="row">
				<div class="h1 mx-5 mt-5 mont-700 underline position-relative">Participation Agreement</div>
			</div>

			<div class="row">
				<div class="mx-5  mt-4 os-400">
					<h3 class="mont-700 mt-3">Compensation</h3>
					<p>I understand that DevConf organizers are under no obligation to compensate me for my participation in DevConf events in any way!</p>

					<h3 class="mont-700 mt-5">Speaker Profiles</h3>
					<p>All speakers must provide user profile information, including full name, contact details and avatar, with the understanding that my information might be populated for me 
					(based on pubicaly available information) if not provided in time for the schedule.</p>
					<p><i>Speaker name, avatar, country of origin, and bio content will be published publicly along with Twitter, Facebook, G+ and other such social media handles, if provided.</i></p>
					<p><i>Email, phone number and demographic information not mentioned above will not be shared publicly.</i></p>

					<h3 class="mont-700 mt-5">Session Preparation</h3>
					<p>If I fail to confirm my participation or find later that I am unable to devote the time and energy to this effort, I will notify the DevConf event planning 
					team immediately. DevConf organizers reserve the right to replace my session at anytime, for any reason.</p>
					<p>To aid in schedule planning, I will also communicate any of the following situations with the DevConf organizers, in a timely manner:</p>
					<ul>
					  <li>Schedule conflicts</li>
					  <li>Session format</li>
					  <li>Technical requirements/requests</li>
					  <li>Changes to your speaker lineup</li>
					</ul>

					<h3 class="mont-700 mt-5">Obtaining Consent</h3>
					<p>I understand that I am responsible for obtaining any required consents, permissions, and clearances to display or otherwise use any materials (both visual and audio) that I incorporate in my session.</p>

					<h3 class="mont-700 mt-5">Promoted Content</h3>
					<p>I understand that DevConf is primarily an educational event, not a sales or marketing platform. </p>

					<h3 class="mont-700 mt-5">Staying on Topic and on time</h3>
					<p>I understand that staying focused on the topic outlined in the title and description of my session is extremely important.</p>

					<h3 class="mont-700 mt-5">Code of Conduct</h3>
					<p>I understand that my slides and on-stage remarks must abide by our Code of Conduct, which will be adhered to during this conference. </p>
					<p>I understand that my slides may be reviewed ahead of time, and that I may need to modify my presentation if it does not adhere with our Code of Conduct.</p>
					<p>I also understand that if, while I am presenting, I fail to abide by the spirit of the Code of Conduct, my session recording might not be published.</p>

					<h3 class="mont-700 mt-5">Session Recording</h3>
					<p>I have read our Media Policy and understand that my session will be recorded and made publicly available following the conference unless otherwise agreed to with the event organizers, in advance.</p>

					<p class="mt-5 text-right"><i>Thank you to Linux Fest NorthWest, Open Source Bridge and DrupalCon, from whom this policy was heavily influenced.</a>.</i></p>

					<p class="text-right"><i>Last Updated: September 1, 2017</i></p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footerinfo')
