@extends('_layouts.noads')

@section('title')
<title>Whoops! DevConf not found.</title>
@endsection

@section('body')
<!-- Full Page Image Header with Vertically Centered Content -->
<header class="masthead h-100">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12 text-center e404">
	<img src="/assets/images/404.png" alt="404 image" class="w-50 pb-5">
        <h1 class=>Whoops, requested page is missing!</h1>
        <p class="lead">We could't find page you were looking for. Please head back or visit our <a href="https://devconf.info" class="landing-flags">Home page</a>.</p>
      </div>
    </div>
  </div>
</header>
@endsection
