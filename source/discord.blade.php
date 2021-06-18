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
<title>Discord @ DevConf</title>
@endsection


@section('body')
<header class="masthead">
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark fixed-top masthead">
		<span class="nav-brand"><a href="/"><img src="/assets/images/devconf-logo-reverse.svg"></a></span>
	</nav>
</header>

<section class="mx-auto mt-5 pt-5 pb-3 col-lg-11">
	<div class="row">
		<div class="h1 mx-5 mont-700 underline position-relative my-3">Discord @ DevConf</div>
		<div class="os-400 mx-5">
		<p>Some intro Lorem ipsum paragraph.</p>
		</div>
	</div>
	<div class="row local-nav">
		<div class="mx-5  mt-4 os-400">
			<a href="#s1">Section 1</a>
			<a href="#s2">Section 2</a>
			<a href="#s3">Section 3</a>
			<a href="#s4">Section 4</a>
			<a href="#s5">Section 5</a>
		</div>
	</div>
</section>
<hr>
<section id="s1" class="mx-auto col-lg-11">
	<div class="row">
		<div class="h2 pt-3 pb-4 mx-5 mont-700">Section 1</div>

		<div class="os-400 mx-5">
			<p>Some paragraph example</p>
			<ul>
               	<li>List option 1</li>
              	<li>List option 2</li>
    			<li>List option 3</li>
    		</ul>
            <p>Some paragraph example with <a href="#s1" class="local">local reference</a> and <a href="https://redhat.com" target="_blank">classic internet reference</a></p>
		</div>
	</div>
</section>
@endsection

@include('_layouts.footerinfo')
