@extends('_layouts.master')

@section('title')
<title>DevConf Wi-Fi Connection</title>
<style>
.container{
	opacity: 0;
	z-index: 1;
	position: absolute;
	margin: 0px auto;
	max-width: 99%;
}

.active{
	opacity: 1;
	z-index: 3;
}

h1, h2, p{
	font-size: 450%;
	text-align: center;
	font-family: DevConfMontserrat, Montserrat, Arial, serif;
}
</style>
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
		<div class="pt-5 container active h-100" time="8000">
			<div class="row" style="padding: 10% 0 0 0">
				<img src="/assets/images/devconf-logo-reverse.svg" alt="DevConf logo" class="d-inline-block mx-auto" style="width: 42vw;">
			</div>
			<h1>Wi-Fi Connection</h1>
			<h2>SSID: <strong>VUTBRNO</strong></h2>
			<h2>USER: <strong>devconfcz</strong></h2>
			<h2>PASSWORD: <strong>Developers2020</strong></h2>
		</div>
		<div class="pt-3 container h-100" time="10000">
			<p>Come to the final session on Sunday! You can take part in our <strong>Pop Quiz and win some interesting prizes!</strong></p>
		</div>
	</header>

	<script>
		function slideSwitch(){
			var active = $("div.container.active");
			if ( active.length == 0 ) active = $("div.container:last");

			var next =  active.next().length ? active.next() : $("div.container:first") ;
			active.addClass("last-active");
			next.css({opacity: 0.0})
			     .addClass("active")
			     .animate({opacity: 1.0}, 2000);
				   
			active.animate({opacity: 0.0},2000).removeClass("active last-active");
			setTimeout( "slideSwitch()", $(".container.active").attr("time") );
		}
		$(function() {
			if($(".container").length > 1){
				setTimeout( "slideSwitch()", $(".container.active").attr("time"));
			}
		});

	</script>
</div>
@endsection
