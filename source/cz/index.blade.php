@extends('_layouts.primary')

@section('css')
<link rel="stylesheet" href="{{ mix('css/site.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/stars.css', 'assets/build') }}">
<link rel="stylesheet" href="{{ mix('css/timeline.css', 'assets/build') }}">
@endsection

@section('title')
<title>DevConf.CZ 2020</title>
@endsection


@section('body')
<header class="masthead vh-100">
<div id="stars"></div>
<div id="stars2"></div>
<div id="stars3"></div>
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
		<span class="nav-brand"></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
					<a href="#about" class="nav-link">About & Topics</a>
				</li>
				<li class="nav-item active px-3">
					<a href="#news" class="nav-link">News</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="row mr-0" style="height: 85%">
		<div class="col-lg-1 border-right text-center pr-0">
			<a href="mailto:info@devconf.cz" target="_blank" title="Mail"><img src="/assets/images/mail.svg" alt="mail" class="social-icon"></a>
			<a href="https://www.facebook.com/DevConf.CZ" target="_blank" title="Facebook"><img src="/assets/images/facebook.svg" alt="facebook" class="social-icon"></a>
			<a href="https://twitter.com/devconf_cz" target="_blank" title="Twitter"><img src="/assets/images/twitter.svg" alt="twitter" class="social-icon"></a>
			<a href="https://t.me/devconfcz" target="_blank" title="Telegram"><img src="/assets/images/telegram.svg" alt="telegram" class="social-icon"></a>
			<a href="https://www.youtube.com/channel/UCmYAQDZIQGm_kPvemBc_qwg" target="_blank" title="YouTube"><img src="/assets/images/youtube.svg" alt="youtube" class="social-icon"></a>
			<a href="https://github.com/devconfcz/devconf" target="_blank" title="Git Hub"><img src="/assets/images/github.svg" alt="github" class="social-icon"></a>
		</div>
		<div class="col-lg-10 h-100 px-0">
                	<div style="padding: 5% 0 0 0">
                        	<img src="/assets/images/devconf-logo-cz-reverse.svg" alt="DevConf logo" class="text-logo">
                        	<img src="/assets/images/devconf-abstract.svg" alt="DevConf abstract logo" class="abstract-logo">
                        </div>
			<div class="heading-text mont-400 h5 pb-5">
				open source community conference
			</div>
			<div class="heading-text mont-700 h1 pt-5">
				January 24-26, 2020
			</div>
			<div class="heading-text mont-700 h4">
				Brno, Czech Republic
			</div>
		</div>
	</div>
</header>
<section id="about" class="mx-auto col-lg-11">
	<div class="card-group py-4 col-lg-8 mx-auto">
		<div class="card-body text-center px-4">
			<a class="underline mont-600" href="https://cfp.devconf.info" target="_blank">Submit a proposal</a>
		</div>
		<div class="card-body text-center px-4">
			<a class="underline mont-600" href="https://cfp.devconf.info" target="_blank">Run a booth</a>
		</div>
		<div class="card-body text-center px-4">
			<a class="underline mont-600" href="https://cfp.devconf.info" target="_blank">Host a meetup</a>
		 </div>
	</div>

	<div class="row py-4">
		<div class="col-lg-4 mx-5 mb-5 text-center">
			<img src="/assets/images/devconf-d-brno.svg" class="mw-100" alt="Brno DevConf image asset">
		</div>
		<div class="col-lg-6 px-5">
			<h1 class="mont-700 underline pb-4">About DevConf</h1>
			<div class="os-400">
				<p>DevConf.CZ 2020 is the 12th annual, free, Red Hat sponsored community conference for developers, admins, DevOps engineers, testers, 
				documentation writers and other contributors to open source technologies such as Linux, Middleware, Virtualization, Storage, Cloud and 
				mobile where FLOSS communities sync, share, and hack on upstream projects together in the beautiful city of Brno, Czech Republic.</p>

				<p>There is no admission or ticket charge for DevConf.CZ events. Free registration is required though. Stay tuned to receive updates about registration.</p>

				<p>We are committed to fostering an open and welcoming environment at our conference. We are setting expectations for inclusive behavior 
				through our code of conduct and media policies, and are prepared to enforce these.</p>
			</div>
		</div>
	</div>
</section>
<section id="news" class="mx-auto py-5 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700">Important dates</div>
	</div>
	<div class="row">
		<!-- Keep in pairs -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Sep 24, 2019</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Open</div>
					</div>
					<div class="row">
						<div class="col os-400"><a href="https://cfp.devconf.info">Submit your proposal &rarr;</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 1, 2019</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">CfP Closed</div>
					</div>
				</div>
			</div>
                </div>

		<!-- Second pair -->
		<div class="col-10 col-md-5 mr-md-0 mx-auto py-3 border-bottom">
			<div class="row">
				<div class="col-4 h5 mont-700">Nov 19, 2019</div>
				<div class="col-8">
					<div class="row">
						<div class="col mont-600">Acceptance letters</div>
					</div>
				</div>
			</div>
                </div>
		<div class="col-10 col-md-5 ml-md-0 mx-auto py-3 border-bottom">
		</div>
        </div>
</section>
@include('_layouts.footercz')

@endsection
