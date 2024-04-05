<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta http-equiv="X-Frame-Options" content="DENY">
	
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<meta name="author" content="Josef Ridky <jridky@redhat.com>">
	<meta name="description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">

	<meta property="og:title" content="DevConf.INFO">
	<meta property="og:site_name" content="DevConf.info">
	<meta property="og:description" content="DevConf are free and open, annual, open-source community conferences for community contibutors, sponsored by Red Hat.">
	<meta property="og:type" content="website">
	<meta property="og:url" content="https://devconf.info">
	<meta property="og:image" content="https://devconf.info/assets/images/devconf-icon.svg">
	<meta property="twitter:image" content="https://devconf.info/assets/images/devconf-icon.svg">

	<!-- YouTube Channel Linking Verification -->
	<meta name="google-site-verification" content="IXOh3zMePCSVZkCqKQr8dZVFfpQgPG5Og-ZpULr8MJ4" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7K9TNM6TTH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-7K9TNM6TTH');
    </script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#512954">

    <link rel="stylesheet" href="/assets/build/js/fancybox/jquery.fancybox.css">
    <script src="/assets/build/js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="/assets/build/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

	@yield('title')
    </head>
    <body>
        @yield('body')
    </body>
</html>
