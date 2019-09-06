@extends('_layouts.czech')

@section('title')
<title>DevConf.CZ 2020</title>
@endsection


@section('body')
<header class="masthead vh-100">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
		<span class="nav-brand"></span>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMobile"
		    aria-controls="navbarMobile" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarMobile">
			<ul class="navbar-nav ml-auto pr-5">
				<li class="nav-item active px-3">
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

<footer class="background-gray">
	<div class="row py-5 w-100 mx-auto">
		<div class="mx-auto col-lg-11">
			<div class="row px-5">
				<div class="col-lg-7">
					<div class="h5 mont-600">This event is brought to you by</div>
					<a href="https://redhat.com" target="_blank"><img class="sponsor-logo pr-3 py-3" src="/assets/images/support/logo-redhat.svg"></a>
					<a href="https://fit.vutbr.cz" target="_blank"><img class="sponsor-logo pr-3 py-3" src="/assets/images/support/logo-fit-vut.svg"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="row px-5 py-3 border-top w-100 mx-auto">
		<div class="col-lg-11 mx-auto copyright">
			Copyleft <?php echo date("Y", time()); ?> Red Hat. Some rights reserved.
		</div>
	</div>
</footer>
@endsection
