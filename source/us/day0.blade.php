@extends('_layouts.page')

@section('social')
<meta property="og:title" content="DevConf.US Day 0 | Boston, USA">
<meta property="og:site_name" content="DevConf.US">
<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
<meta property="og:type" content="website">
<meta property="og:url" content="https://devconf.info">
<meta property="og:image" content="https://devconf.info/assets/images/devconf-us-social.png">
<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-us-social.png">
@endsection

@section('css')
<link rel="stylesheet" href="{{ mix('css/subsite.css', 'assets/build') }}">
@endsection

@section('title')
<title>Day 0 - DevConf.US</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/us"><img src="/assets/images/devconf-logo-us-reverse.svg"></a></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="/us/" class="nav-link">Home</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/aroundboston" class="nav-link">Getting around Boston</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/toboston" class="nav-link">Getting to Boston</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/schedule" class="nav-link">Schedule</a>
				</li>
				<li class="nav-item active underline px-3">
					<a href="/us/day0" class="nav-link local">Day 0</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/hotels" class="nav-link">Hotels</a>
				</li>
				<li class="nav-item active px-3">
					<a href="/us/faq" class="nav-link">FAQ</a>
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
		<div class="h1 mx-5 mont-700 underline position-relative">Day 0: Boston vLLM Meetup</div>
		
		<div class="col-12 mx-5 mt-4">
			<p class="os-400">We're excited to invite you to the Boston vLLM meetup, hosted by Red Hat and Venture Guides on September 18th at Venture Guides' office space in Boston, located by TD Garden/North Station.</p>
			
			<p class="os-400 mt-3">This meetup brings together vLLM users, developers, maintainers, and engineers to explore the latest in optimized inference. Expect deep technical talks, practical demos, and plenty of time to connect with the community.</p>
			
			<div class="mt-4">
				<h3 class="mont-600">Agenda</h3>
				<ul class="os-400 mt-3" style="line-height: 1.6;">
					<li>5:00pm – Doors Open & Meet the vLLM Team</li>
					<li>5:30pm – Opening Remarks</li>
					<li>5:40pm – Intro to vLLM and Project Update</li>
					<li>6:10pm – Model Optimization with LLM Compressor and Speculators</li>
					<li>6:40pm – Demo (vLLM and LLM Compressor)</li>
					<li>6:55pm – Distributed Inference with llm-d</li>
					<li>7:25pm – Q&A and Discussion</li>
					<li>7:40pm-8:30pm – Pizza, Refreshments, and Networking 🍕 🤝</li>
				</ul>
			</div>
			
			<p class="os-400 mt-3">Please register today to attend!</p>
		</div>
	</div>
</section>
<hr>

<section class="mx-auto mb-5 text-center">
	<iframe
	  src="https://lu.ma/embed/event/evt-ISkHIkZXVadnYES/simple"
	  width="800"
	  height="600"
	  frameborder="0"
	  style="border: 1px solid #bfcbda88; border-radius: 4px;"
	  allow="fullscreen; payment"
	  aria-hidden="false"
	  tabindex="0"
	></iframe>
</section>

<script>

    $(document).ready(function() {
        // matchHeight the contents of each .card-pf and then the .card-pf itself
        $(".row > [class*='col'] > .card .card-title").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-body").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card > .card-footer").matchHeight({property: 'min-height'});
        $(".row > [class*='col'] > .card").matchHeight({property: 'min-height'});

    });
</script>

@endsection

@include('_layouts.footerus')