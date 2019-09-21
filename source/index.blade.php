@extends('_layouts.master')

@section('title')
<title>DevConf</title>
@endsection

@section('body')
<!-- Full Page Image Header with Vertically Centered Content -->
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
						DevConf.CZ - Brno
					</a>
				</div>
				<div class="card-body text-center px-4">
					<a class="underline" href="/in">
						<div class="d-block mx-auto pb-3"><img src="/assets/images/in-flag.svg" alt="IN flag"></div>
						DevConf.IN - Bangalore
					</a>
				</div>
				<div class="card-body text-center px-4">
					<a class="underline" href="/us">
						<div class="d-block mx-auto pb-3"><img src="/assets/images/us-flag.svg" alt="US flag"></div>
						DevConf.US - Boston
					</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Page Content -->
	<footer class="landing-footer py-4 mx-auto w-100">
		@include('_layouts.policies')
	</footer>
</div>
@endsection
