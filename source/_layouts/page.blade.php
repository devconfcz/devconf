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

        @yield('social')

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
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="{{ mix('css/backtop.css', 'assets/build') }}">
	@yield('css')       
        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
	<link rel="stylesheet" href="{{ mix('css/cookie.css', 'assets/build') }}">

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#512954">

	@yield('title')
    </head>
    <body>
	<a href="#" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
        @yield('body')
        <footer class="background-gray">
	<div class="row py-5 w-100 mx-auto">
		<div class="mx-auto col-lg-11">
			<div class="row px-5">
				<div class="col-lg-7">
					<div class="h5 mont-600">Sponsored by</div>
					@yield('footer')
					</div>
					<div class="col-lg-5 links">
						<div class="row">
						<a class="col-md-6 col-12" target="_blank" href="/coc">Code of Conduct</a>
						<a class="col-md-6 col-12" target="_blank" href="/participation-agreement">Participation Agreement</a>
						<a class="col-md-6 col-12" target="_blank" href="/media-policy">Media Policy</a>
						<a class="col-md-6 col-12" target="_blank" href="/privacy-statement">Privacy Statement</a>
						</div>
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
	<div id="cookie">
		<div id="cookie-wrapper">
			<div id="cookie-text">
			 We use cookies on our websites to deliver our online services. Details about how we use cookies and how you may disable them are
			 set in our <a href="/privacy-statement" target="_blank">Privacy Statement</a>. By using this website you agree to our use of cookies.
			</div>
			<div id="cookie-close">&times;</div>
		</div>	
	</div>
	<script>
		var cookie = document.cookie.split('cwa=');
		if(1 < cookie.length){
			$("#cookie").remove();
		}

		$("#cookie-close").click(function(){
			var d = new Date();
			d.setTime(d.getTime() + (364*24*60*60*1000));
			var expires = "expires=" + d.toGMTString();
			document.cookie = "cwa=accept;" + expires + ";path=/";
			$("#cookie").fadeOut("slow", function (){
				$("#cookie").remove();
			});
		});
	</script>
    </body>
</html>
