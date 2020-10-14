@extends('_layouts.master')

@section('title')
<title>DevConf</title>
@endsection

@section('body')
<!-- Full Page Image Header with Vertically Centered Content -->
<script type="text/javascript">
    path = window.location.pathname;
    if (window.location.pathname == "" || window.location.pathname == "/") {
      switch(window.location.hostname) {
        case "devconf.cz":
	case "www.devconf.cz":
          path = "/cz";
          break;
        case "devconf.in":
	case "www.devconf.in":
          path = "/in";
          break;
        case "devconf.us":
	case "www.devconf.us":
          path = "/us";
          break;
      }
    }
    if (window.location.hostname != "www.devconf.info" && window.location.hostname != "localhost") {
       window.location.href = 'https://www.devconf.info' + path; 
    }
  </script>
<div class="h-100 w-100 d-flex flex-column">
	<header class="masthead">
		<div class="container h-100">
			<div class="row align-items-center" style="padding: 10% 0 0 0">
				<div class="col-sm text-center" style="padding: 10% 0 0 0">
					<img src="/assets/images/devconf-logo-reverse.svg" alt="DevConf logo" style="width: 42vw;">
				</div>
			</div>
			<div class="card-group h-25 pt-5 justify-content-md-center align-items-center landing-flags">
				<div class="card-body text-center px-4">
					<a class="underline" href="/cz">
						<div class="d-block mx-auto pb-3"><img src="/assets/images/cz-flag.svg" alt="CZ flag"></div>
						DevConf.CZ - Virtual
					</a>
				</div>
				<div class="card-body text-center px-4">
					<a class="underline" href="/in">
						<div class="d-block mx-auto pb-3"><img src="/assets/images/in-flag.svg" alt="IN flag"></div>
						DevConf.IN - Virtual
					</a>
				</div>
				<div class="card-body text-center px-4">
					<a class="underline" href="/us">
						<div class="d-block mx-auto pb-3"><img src="/assets/images/us-flag.svg" alt="US flag"></div>
						DevConf.US - Virtual
					</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Page Content -->
	<footer class="landing-footer py-4 mx-auto w-100">
		<div class="card-group justify-content-md-center px-5">
			<div class="card-body text-center py-3 px-3 mx-auto"><a href="/coc">Code of Conduct</a></div>
			<div class="card-body text-center py-3 px-3 mx-auto"><a href="/media-policy">Media Policy</a></div>
			<div class="card-body text-center py-3 px-3 mx-auto"><a href="/participation-agreement">Participation Agreement</a></div>
			<div class="card-body text-center py-3 px-3 mx-auto"><a href="/privacy-statement">Privacy Statement</a></div>
		</div>
	</footer>
</div>
@endsection
